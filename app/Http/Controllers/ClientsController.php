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
        // dd($this->WithdrawalsController->getWithdrawalByClientIds($request->get('id')));
        $withdraws = $this->WithdrawalsController->getWithdrawalByClientIds($request->get('id'));

        $show_cards = [
            'trading_account' => [
                "read" => false,
                "write" => false
            ],
            'withdrawal_requests' => [
                "read" => false,
                "write" => false
            ],
            'transfers' => [
                "read" => false,
                "write" => false
            ],
            'referenced_list' => [
                "read" => true,
                "write" => true
            ]
        ];

        $show_buttons = [
            "edit_customer" => false,
            "create_client" => false,
            "add_trading_account" => false,
            "change_verification" => false
        ];

        foreach (session()->get('user')['role']['role_permissions'] as $role_permission) {
            if ($role_permission['permission']['slug'] == 'METATRADER5_TRADING_ACCOUNT') {
                $show_cards['trading_account']['read'] = $role_permission['read'];
                $show_cards['trading_account']['write'] = $role_permission['write'];

                if ($role_permission['write'] == true) {
                    $show_buttons['add_trading_account'] = true;
                }
            }

            if ($role_permission['permission']['slug'] == 'METATRADER5_CLIENT') {
                $show_buttons['create_client'] = $role_permission['write'];
            }

            if ($role_permission['permission']['slug'] == 'CUSTOMER_WITHDRAW') {
                $show_cards['withdrawal_requests']['read'] = $role_permission['read'];
                $show_cards['withdrawal_requests']['write'] = $role_permission['write'];
            }

            if ($role_permission['permission']['slug'] == 'CUSTOMER_TRANSFER') {
                $show_cards['transfers']['read'] = $role_permission['read'];
                $show_cards['transfers']['write'] = $role_permission['write'];
            }

            if ($role_permission['permission']['slug'] == 'CUSTOMER_VERIFICATION') {
                $show_buttons['change_verification'] = $role_permission['write'];
            }

            if ($role_permission['permission']['slug'] == 'CUSTOMER') {
                $show_buttons['edit_customer'] = $role_permission['write'];
            }
        }
        
        return view('user', [
            'user' => $this->getUserById($request->get('id')),
            'trading_accounts' => $trading_accounts->getData()->accounts,
            'withdrawals' => $withdraws->getData()->withdraws,
            'referenced_users' => $this->getReferencedByIds($request->get('id')),
            'show_cards' => $show_cards,
            'show_buttons' => $show_buttons
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
            return "verified";
        } else if ($reviewStatus == "init") {
            return "document_waiting";
        } else if ($reviewStatus == "pending") {
            return "admin_review";
        } else {
            return "rejected";
        }
    }

    public function getUserById(int $id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/", ['user_id' => $id]);
        $json = json_decode($res->getBody());
        return $json->users;
    }

    public function getClientByUserId(int $user_id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/clients", ['user_id' => $user_id]);
        $json_client = json_decode($res->getBody());
        dd($json_client->user_clients);

        return $json_client->user_clients;
    }

    public function getCustomerByIds(int $id)
    {
        $user = $this->getUserById($id);

        return response()->json([
            'user' => $user,
            'deneme' => 'deneme'
        ])->getData();

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
            $role_permissions = collect(session()->get('user')['role']['role_permissions']);
            if($role_permissions->filter(function ($role_permission) {
                    if ($role_permission['permission']['slug'] == 'METATRADER5_TRADING_ACCOUNT' && $role_permission['read'] == false) {
                        return true;
                    }
                }
            )){
                return response()->json([
                    'message' => "You don't have permission to access this page",
                    'accounts' => collect()
                ], 403);
            }

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
                "accounts"=>$accounts->getData()->accounts
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
            $kyc_status = NULL;
            if ($user->user_sumsub !== null) {
                $kyc_status = $this->getKYCStatus($user->user_sumsub->review_status, $user->user_sumsub->review_result);
            }

            $newData = [
                'Client_ID' => $user->id,
                'Created_Date' => substr($user->created_at, 0, 10),
                'Name' => $user->name,
                'mail' => $user->email,
                'KYC_Status' => $kyc_status
            ];
            $datas['clients']['datas'][$user->id] = $newData;
        }
        $datas['clients']['count'] = count($json);
        return response()->json($datas)->getData();
    }
}