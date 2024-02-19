<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request_url = env('API_SERVER_BASE_URL', null) . 'auth/admin/signin';

        $response = Http::post($request_url, [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'fingerprint' => session()->get('fingerprint'),
            'recaptcha_response' => $request->input('recaptcha_response'),
        ]);
        $responseData = $response->json();

        if ($response->successful()) {
            session([
                'user' => $responseData['admin']
            ]);

            Cookie::forget('access_token');
            Cookie::forget('refresh_token');
            Cookie::queue('access_token', $responseData['accessToken'], 5, null, null, true, true);
            Cookie::queue('refresh_token', $responseData['refreshToken'], 24*60, null, null, true, true);

            return response()
            ->json([
                'session' => session()->all()
            ], 200);
            // ->cookie('access_token', $responseData['accessToken'], 5, null, null, true, true)
            // ->cookie('refresh_token', $responseData['refreshToken'], 24*60, null, null, true, true);
        }

        if ($response->status() == 403) {
            session([
                'user' => $responseData['admin']
            ]);
            
            if (in_array('message', $responseData)) {
                return response()->json([
                    'message' => $responseData['message'],
                ], 403);
            }
            
            return response()->json([
                'message' => $responseData['message']
            ], 403);
        }


        return response()->json([
            'error' => $responseData['message'],
            // 'error' => $responseData,
        ], 401);
    }

    public function logout()
    {
        session()->forget(['user']);
        // session()->flush();

        
        Cookie::forget('access_token');
        Cookie::forget('refresh_token');

        return redirect()->route('auth.login');
    }


    public function verifyDevice(Request $request)
    {
        $loginServiceUrl = env('API_SERVER_BASE_URL', null) . 'auth/admin/verify-device';
        $response = Http::post($loginServiceUrl, [
            'admin_id' => session()->get("user")["id"],
            'pincode' => $request->input('pincode'),
        ]);

        $responseData = $response->json();
        if ($response->successful()) {
            session([
                'user' => $responseData['admin'],
                'fingerprint' => $responseData['fingerprint']
            ]);

            Cookie::forget('access_token');
            Cookie::forget('refresh_token');

            Cookie::queue('access_token', $responseData['accessToken'], 5, null, null, true, true);
            Cookie::queue('refresh_token', $responseData['refreshToken'], 24*60, null, null, true, true);

            return response()
                ->json([
                    'email' => $responseData['admin']['email'],
                    'admin_id' =>  $responseData['admin']['id'],
                ], 200);
            // ->cookie('access_token', $responseData['accessToken'], 5, null, null, true, true)
            // ->cookie('refresh_token', $responseData['refreshToken'], 24*60, null, null, true, true);
        }
        if ($response->status() == 403) {
            return response()->json([
                'message' => $responseData['message'],
            ], 403);
        }

        return response()->json([
            'message' => $responseData['message']
        ], 401);
    }
}