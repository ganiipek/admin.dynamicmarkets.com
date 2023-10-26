<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebRequestController;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function getMT5CustomTradingAccountId()
    {
        $res = $this->ReqController->get($this->BASE_URL . "settings/mt5-custom-trading-account-id");
        $json = json_decode($res->getBody());
        return $json;
    }

    public function setMT5CustomTradingAccountId(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "settings/mt5-custom-trading-account-id", [
            'active' => $request->get('active'),
            'value' => $request->get('value')
        ]);
        $json = json_decode($res->getBody());
        return $json;
    }

    public function getUserTradingAccountsLimit()
    {
        $res = $this->ReqController->get($this->BASE_URL . "settings/user-trading-accounts-limit");
        $json = json_decode($res->getBody());
        return $json;
    }

    public function setUserTradingAccountsLimit(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "settings/user-trading-accounts-limit", [
            'value' => $request->get('value')
        ]);
        $json = json_decode($res->getBody());
        return $json;
    }
}
