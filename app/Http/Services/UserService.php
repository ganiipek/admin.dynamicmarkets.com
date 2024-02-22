<?php

namespace App\Http\Services;

use App\Http\Services\WebRequestService;
use Carbon\Carbon;

class UserService {
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestService();
    }

    public function getTradingAccounts(int $user_id)
    {
        try {
            $role_permissions = collect(session()->get('user')['role']['role_permissions']);
            if($role_permissions->filter(function ($role_permission) {
                    if ($role_permission['permission']['slug'] == 'METATRADER5_TRADING_ACCOUNT' && $role_permission['read'] == false) {
                        return true;
                    }
                }
            )->count() > 0){
                return throw new \Exception("You don't have permission to access this page", 403);
            }

            $res = $this->ReqController->get($this->BASE_URL . "metatraders/user_trading_accounts", ['user_id' => $user_id]);
            $json = json_decode($res->getBody());
            $accounts = collect();

            if (isset($json->data)) {
                foreach ($json->data as $trading_account) {
                    $accounts->push([
                        'client_id' => $trading_account->ClientID,
                        'login' => $trading_account->Login,
                        'balance' => $trading_account->Balance,
                        'leverage' => $trading_account->Leverage,
                        'created_at' => Carbon::createFromTimestamp($trading_account->Registration)->toDateTimeString()
                    ]);
                }
            }
            
            return $accounts;

        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            $response = json_decode($exception->getResponse()->getBody());
            return throw new \Exception($response->message, $exception->getCode());
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage(), 500);
        }
    }

    public function getWithdrawals(int $user_id)
    {
        try {
            $role_permissions = collect(session()->get('user')['role']['role_permissions']);
            if($role_permissions->filter(function ($role_permission) {
                    if ($role_permission['permission']['slug'] == 'CUSTOMER_WITHDRAW' && $role_permission['read'] == false) {
                        return true;
                    }
                }
            )->count() > 0){
                return throw new \Exception("You don't have permission to access this page", 403);
            }

            $res = $this->ReqController->get($this->BASE_URL . "users/withdraws", ['user_id' => $user_id]);
            $json = json_decode($res->getBody());

            return response()->json($json)->getData()->withdraws;

        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            $response = json_decode($exception->getResponse()->getBody());
            return throw new \Exception($response->message, $exception->getCode());
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage(), 500);
        }
    }
}