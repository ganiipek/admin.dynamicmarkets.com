<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use GuzzleHttp\Client;
use App\Models\Clients;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\WebRequestController;
use App\Http\Controllers\MetatraderController;
use App\Http\Controllers\WithdrawalsController;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
        $this->MetatraderController = new MetatraderController();
        $this->WithdrawalsController = new WithdrawalsController();
    }
    
    public function initCustomerPage(Request $request)
    {
        return view('customers', [
            'customers' => $this->getAllClients($request),
            'statistics_information' => $this->getStatisticsCards($request),
        ]);
    }
    
    public function initCustomerDetailPage(Request $request)
    {
        $trading_accounts = $this->getTradingAccountByIds($request->get('id'));
        $withdraws = $this->WithdrawalsController->getWithdrawalByClientIds($request->get('id'))->withdraws;

        // dd($withdraws);

        return view('user', [
            'user' => $this->getCustomerByIds($request->get('id')),
            'trading_accounts' => $this->getTradingAccountByIds($request->get('id'))->getData()->accounts,
            'withdrawals' => $withdraws,
            'referenced_users' => $this->getReferencedByIds($request->get('id')),
        ]);
    }

    public function initMetatraderListPage(Request $request) 
    {
        $groups = $this->MetatraderController->getGroups();
        // dd($groups);
        return view('customers.metatrader.clients.list', [
            "metatrader_groups" => $groups
        ]);
    }

    public function getKYCStatus(string $reviewStatus, int $review_result)
    {
        if ($review_result == 1 && $reviewStatus == "completed") {
            return "Verified";
        } else {
            return "Rejected";
        }
    }

    public function getCustomerByIds(int $id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/", ['user_id' => $id]);
        $json = json_decode($res->getBody());
        
        $res = $this->ReqController->get($this->BASE_URL . "users/clients", ['user_id' => $id]);
        $json_client = json_decode($res->getBody());

        $clientID = 0; // Başlangıçta varsayılan değeri 0 olarak ayarlayın
        if ($json_client->user_clients !== null) {
            $clientID = ($json_client->user_clients->login !== null) ? $json_client->user_clients->login : 0;
        }

        $datas = [
            "status" => "200",
            "clients" => [
                "datas" => [
                    strval($json->users->id) => [
                        'Client_ID' => $clientID,
                        'Created_Date' => $json->users->created_at,
                        'Name' => $json->users->name . " " . $json->users->middlename . " " . $json->users->lastname,
                        'mail' => $json->users->email,
                        'KYC_Status' => $this->getKYCStatus($json->users->user_sumsub->review_status, strval($json->users->user_sumsub->review_result)),
                        'Nationality' => $json->users->country,
                        'Phone' => $json->users->phone,
                    ]
                ],
            ]
        ];
        return response()->json($datas)->getData()->clients->datas->$id;
    }

    public function getReferencedByIds(int $id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/referreds", ['user_id' => $id]);
        $json = json_decode($res->getBody());
        $accounts = [];
        foreach ($json->user_referreds as $user_referred) {
            $new_account = [
                strval($user_referred->user_id) => [
                    'Client_ID' => $user_referred->user_id,
                    'Created_Date' => $user_referred->user->created_at,
                    'Name' => $user_referred->user->name . " " . $user_referred->user->middlename . " " . $user_referred->user->lastname,
                    'mail' => $user_referred->user->email,
                    'KYC_Status' => $this->getKYCStatus($user_referred->user->user_sumsub->review_status, strval($user_referred->user->user_sumsub->review_result)),
                    'Nationality' => $user_referred->user->country,
                    'Phone' => $user_referred->user->phone,
                ],
            ];
            array_push($accounts, $new_account[strval($user_referred->user_id)]);
        }
        $datas = [
            "status" => "200",
            "clients" => [
                "datas" =>
                $accounts,

                "count" => 700
            ]
        ];
        return response()->json($datas)->getData()->clients->datas;
    }

    public function getTradingAccountByIds(int $id)
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/user_trading_accounts", ['user_id' => $id]);
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

            return response()->json([
                "accounts"=>$accounts
            ]);

        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            if ($exception->getCode() == 404) {
                return response()->json([
                    'message' => $exception->getResponse()->getBody(),
                    'accounts' => collect()
                ], 404);
            }

            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage()
            ], 400);
        }
    }

    public function getStatisticsCards(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "statistics/user/total");
        $json = json_decode($res->getBody());
        $datas = [
            "status" => "200",
            "datas" => [],
            "withdrawal" => [],

        ];


        $newData = [
            'total_user_count' => $json->total_user_count,
            'total_user_non_verified_email_count' => $json->total_user_non_verified_email_count,
            'total_sumsub_user_count' => $json->total_sumsub_user_count,
            'total_sumsub_user_verified_count' => $json->total_sumsub_user_verified_count,
            'total_mt5_client_count' => $json->total_mt5_client_count,
            'total_mt5_trading_account_count' => $json->total_mt5_trading_account_count,
        ];
        $datas['datas'] = $newData;

        $res = $this->ReqController->get($this->BASE_URL . "statistics/withdrawal/total");
        $json = json_decode($res->getBody());
        $newData = [
            'total_withdraw_count' => $json->total_withdraw_count,
            'total_withdraw_pending_count' => $json->total_withdraw_pending_count,
            'total_withdraw_in_review_count' => $json->total_withdraw_in_review_count,
            'total_withdraw_completed_count' => $json->total_withdraw_completed_count,
            'total_withdraw_rejected_count' => $json->total_withdraw_rejected_count,
        ];
        $datas['withdrawal'] = $newData;

        //The array_merge combines both the JSON objects.

        return response()->json($datas)->getData();
    }

    public function getAllClients(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/", ['limit' => 100, 'offset' => 0]);
        $json = json_decode($res->getBody());
        $json = $json->users;
        $datas = [
            "status" => "200",
            "clients" => [
                "datas" => [],
                "count" => 700
            ]
        ];
        foreach ($json as $key => $user) {
            $newData = [
                'Client_ID' => $user->id,
                'Created_Date' => substr($user->created_at, 0, 10),
                'Name' => $user->name,
                'mail' => $user->email,
                'KYC_Status' => $this->getKYCStatus($user->user_sumsub->review_status, $user->user_sumsub->review_result)
            ];
            $datas['clients']['datas'][$user->id] = $newData;
        }
        $datas['clients']['count'] = count($json);
        return response()->json($datas)->getData();
    }
}