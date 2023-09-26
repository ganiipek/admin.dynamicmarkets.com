<?php

namespace App\Http\Controllers;

use App\Models\Swaps;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\WebRequestController;

class SwapsController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function initSetSwapsPage(Request $request)
    {
        $initial_swaps = [
            "status" => "200",
            "swaps" => [
                "EURUSD" => [
                    'long_swap' => 0.01,
                    'short_swap' => 0.02,
                ],
                "GBPUSD" => [
                    'long_swap' => 0.03,
                    'short_swap' => 0.05,
                ],
                "XAUUSD" => [
                    'long_swap' => 0.5,
                    'short_swap' => 0.10,
                ]
            ]
        ];
        return view('set_swaps', [
            'initial_swaps' => $initial_swaps,
        ]);
    }
}
