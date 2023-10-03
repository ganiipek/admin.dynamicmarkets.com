<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Withdrawals;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\WebRequestController;

class WithdrawalsController extends Controller
{
    // create consutructor function 
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function initWithdrawalsPage(Request $request)
    {
        // dd($this->getWithdrawals($request));
        return view('withdrawals_requests', [
            'withdraws' => $this->getWithdrawals($request)->withdraws,
            'statistics_information' => $this->getStatisticsCards($request),
        ]);
    }

    public function initWithdrawalDetailPage(Request $request)
    {
        // dd($this->getWithdrawalStatuses()->statuses);
        return view('withdrawal_detail', [
            'withdrawal' => $this->getWithdrawalById($request->get('id'))->withdraw,
            'withdrawal_statuses' => $this->getWithdrawalStatuses()->statuses
        ]);
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
    public function getWithdrawals(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/withdraws", ['limit' => 100, 'offset' => 0]);
        $json = json_decode($res->getBody());
        return response()->json($json)->getData();


        $withdraws = [];
        foreach ($json->withdraws as $withdraw) {
            $new_withdraw = [
                $withdraw->id => [
                    'Withdrawal_ID' => $withdraw->id,
                    'User_ID' => $withdraw->user_id,
                    'Name'  => $withdraw->withdraw_logs[0]->comment,
                    'Request_Date' => $withdraw->created_at,
                    'Withdrawal_Status' => $withdraw->withdraw_status->name,
                    'Requested_Amount' => $withdraw->amount,
                    'Bank_Name' => $withdraw->bic,
                    'IBAN' => $withdraw->iban,
                    'Account_Holder' => $withdraw->holder,
                    'BIC' => $withdraw->bic,
                ],
            ];
            array_push($withdraws, $new_withdraw[$withdraw->id]);
        }

        $datas = [
            "status" => "200",
            "withdrawals" => [
                "datas" =>
                $withdraws,

                "count" => count($withdraws),
                "waiting" => 2,
            ]
        ];
        return response()->json($datas)->getData();
    }

    public function getWithdrawalById(int $id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "withdraws/", ['id' => $id]);
        $json = json_decode($res->getBody());
        return response()->json($json)->getData();
    }

    public function setWithdrawalById(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "withdraws/update", [
            'id' => $request->input('id'),
            'withdraw_status_id' => $request->input('status_id'),
            'comment' => 'Admin# ' . strval(session()->get('admin_id')) . ' changed status from ' . $request->input('last_status') . ' to ' . $request->input('status_id'),
        ]);
        $json = json_decode($res->getBody());

        return response()->json($json)->getData();
    }

    public function getWithdrawalByClientIds(int $id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/withdraws", ['user_id' => $id]);
        $json = json_decode($res->getBody());
        return response()->json($json)->getData(); 

        $withdraws = [];
        foreach ($json->withdraws as $withdraw) {
            $new_withdraw = [
                $withdraw->id => [
                    'Withdrawal_ID' => $withdraw->id,
                    'User_ID' => $withdraw->user_id,
                    'Request_Date' => $withdraw->created_at,
                    'Withdrawal_Status' => $withdraw->withdraw_status->name,
                    'Requested_Amount' => $withdraw->amount,
                    'Bank_Name' => $withdraw->bic,
                    'IBAN' => $withdraw->iban,
                    'Account_Holder' => $withdraw->holder,
                    'BIC' => $withdraw->bic,
                ],
            ];
            array_push($withdraws, $new_withdraw[$withdraw->id]);
        }

        $datas = [
            "status" => "200",
            "withdrawals" => [
                "datas" => [
                    $withdraws
                ]
            ]
        ];
        return response()->json($datas)->getData()->withdrawals->datas[0];
    }

    public function getWithdrawalStatuses()
    {
        $res = $this->ReqController->get($this->BASE_URL . "withdraws/statuses");
        $json = json_decode($res->getBody());
        return response()->json($json)->getData();
    }
}