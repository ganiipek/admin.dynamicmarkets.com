<?php

namespace App\Http\Controllers;

use App\Models\Swaps;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\WebRequestController;
use Illuminate\Support\Facades\Storage;

class SumsubController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function getAvailableTokens(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "/kyc/sumsub/crypto/available_tokens");
        $json = json_decode($res->getBody());
        return response()->json($json, 200);
    }

    public function initCryptoTransferCheckPage(Request $request)
    {
        // $res = $this->ReqController->get($this->BASE_URL . "/kyc/sumsub/crypto/available_tokens");
        // $json = json_decode($res->getBody());
        // dd(public_path('files\\sumsub_available_tokens.php'));
        // $tokens = include(public_path('files\\sumsub_available_tokens.php'));
        $tokens = Storage::get('sumsub_available_tokens.txt');
        $tokens = json_decode($tokens);
        // dd($tokens);


        return view('applications.crypto_transfer_check', [
            'available_tokens' => $tokens,
        ]);
    }

    public function checkCryptoStandaloneAnalysis(Request $request)
    {
        try{
            $res = $this->ReqController->get($this->BASE_URL . "/kyc/sumsub/crypto/check_standalone_analysis", [
                'currency' => $request->input('token_currency'),
                'direction' => $request->input('tx_direction'),
                'txn' => $request->input('transaction_hash'),
                'address' => $request->input('target_address'),
                'tokenId' => $request->input('token_id'),
            ]);
            $json = json_decode($res->getBody());
            return response()->json($json, 200);
            
        }catch(\GuzzleHttp\Exception\ClientException $exception){
            $response = $e->getResponse();
            return response()->json(['error' => $e->responseBodyAsString()], $response->getStatusCode());
        }
    }
}