<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WebRequestController extends Controller
{
    public function __construct()
    {
        if (session()->has('user')) {
            $this->BASE_URL = env("API_SERVER_BASE_URL");
        }
    }

    public function getClient() : Client
    {
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => "application/json"], 
                'verify' => false
            ]);

        return $client;
    }

    public function getAuthClient($access_token = null, $refresh_token = null) : Client
    {
        // dd(Cookie::get('access_token'), Cookie::get('refresh_token'));
        $client = new \GuzzleHttp\Client([
                'headers' => [
                    'x-admin-id' => session()->get('user')['id'], 
                    'x-admin-mail' => session()->get('user')['email'], 
                    'accessToken' => $access_token ?? Cookie::get('access_token'),
                    'refreshToken' => $refresh_token ?? Cookie::get('refresh_token'),
                    'Content-Type' => "application/json"], 
                    'verify' => false
                ]);

        return $client;
    }

    function _get($url, $data = null, $access_token = null, $refresh_token = null)
    {
        try {
            $client = $this->getAuthClient($access_token, $refresh_token);
            return $client->get($url, [
                'query' => $data
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            throw $exception;
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            throw $exception;
        }
    }

    public function get($url, $data = null, $access_token = null, $refresh_token = null)
    {
        try {
            return $this->_get($url, $data, $access_token, $refresh_token);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() == 401) {
                $res = $this->getClient()->post($this->BASE_URL . 'auth/admin/accesstoken/refresh', [
                    'json' => [
                        'refreshToken' => request()->cookie('refresh_token'),
                        'fingerprint' => session()->get('fingerprint'),
                        'admin-id' => session()->get("user")["id"],
                        'admin-mail' => session()->get("user")["email"],
                    ]
                ]);
                $json = json_decode($res->getBody());
                $access_token = $json->accessToken;
                $refresh_token = $json->refreshToken;
                // $expires_in = $json->expiresIn;
                // $expires_at = Carbon::now()->addSeconds($expires_in);
                Cookie::queue('access_token', $json->accessToken, 5, null, null, true, true);
                Cookie::queue('refresh_token', $json->refreshToken, 24*60, null, null, true, true);
                
                return $this->_get($url, $data, $access_token, $refresh_token);
            } else {
                throw $e;
            }
        }
    }

    function _post($url, $data = null, $access_token = null, $refresh_token = null)
    {
        $client = $this->getAuthClient($access_token, $refresh_token);
        return $client->post($url, [
            'form_params' => $data
        ]);
    }

    public function post($url, $data = null, $access_token = null, $refresh_token = null)
    {
        try {
            return $this->_post($url, $data, $access_token, $refresh_token);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() == 401) {
                $res = $this->getClient()->post($this->BASE_URL . 'auth/admin/accesstoken/refresh', [
                    'json' => [
                        'refreshToken' => request()->cookie('refresh_token'),
                        'fingerprint' => session()->get('fingerprint'),
                        'admin-id' => session()->get("user")["id"],
                        'admin-mail' => session()->get("user")["email"],
                    ]
                ]);
                $json = json_decode($res->getBody());
                $access_token = $json->accessToken;
                $refresh_token = $json->refreshToken;
                // $expires_in = $json->expiresIn;
                // $expires_at = Carbon::now()->addSeconds($expires_in);
                Cookie::queue('access_token', $json->accessToken, 5, null, null, true, true);
                Cookie::queue('refresh_token', $json->refreshToken, 24*60, null, null, true, true);
                
                return $this->_post($url, $data, $access_token, $refresh_token);
            } else {
                throw $e;
            }
        }
    }

    function _delete($url, $data = null, $access_token = null, $refresh_token = null)
    {
        $client = $this->getAuthClient($access_token, $refresh_token);
        return $client->delete($url, [
            'form_params' => $data
        ]);
    }

    public function delete($url, $data = null, $access_token = null, $refresh_token = null)
    {
        try {
            return $this->_delete($url, $data, $access_token, $refresh_token);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() == 401) {
                $res = $this->getClient()->post($this->BASE_URL . 'auth/admin/accesstoken/refresh', [
                    'json' => [
                        'refreshToken' => request()->cookie('refresh_token'),
                        'fingerprint' => session()->get('fingerprint'),
                        'admin-id' => session()->get("user")["id"],
                        'admin-mail' => session()->get("user")["email"],
                    ]
                ]);
                $json = json_decode($res->getBody());
                $access_token = $json->accessToken;
                $refresh_token = $json->refreshToken;
                // $expires_in = $json->expiresIn;
                // $expires_at = Carbon::now()->addSeconds($expires_in);
                Cookie::queue('access_token', $json->accessToken, 5, null, null, true, true);
                Cookie::queue('refresh_token', $json->refreshToken, 24*60, null, null, true, true);
                
                return $this->_delete($url, $data, $access_token, $refresh_token);
            } else {
                throw $e;
            }
        }
    }
}