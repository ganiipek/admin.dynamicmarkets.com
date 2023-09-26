<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\WebRequestController;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function initStatisticsPage(Request $request)
    {
        $clients = [
            "status" => "200",
            "clients" => [
                "groups" => [
                    "data" => [
                        'STN_1' => 100,
                        'STN_2' => 120,
                        'STN_3' => 125,
                        'STN_4' => 100,
                    ],
                    "colors" => [
                        'STN_1' => "#9568FF",
                        'STN_2' => "#FF3242",
                        'STN_3' => "#014502",
                        'STN_4' => "#AA3412"
                    ],
                    "count" => 200
                ],

            ],
            "statistics" => [
                "datas" => [
                    "monthly" => [
                        "data" =>
                        [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "weekly" => [
                        "data" => [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "daily" => [
                        "data" => [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "information" => [
                        'balance_difference' => 1000,
                        'equity_difference' => 2000,
                        'tf_equity' => 3000,
                        'lp_equity' => 5000,
                        'equity_percent' => 15,
                        'balance_percent' => 10
                    ]

                ],

            ]
        ];
        
        return view('index', [
            'statistics' => response()->json($clients)->getData(),
            'week_chart' => response()->json($clients)->getData(),
            'registered_user' => $this->getRegisteredUsers($request),
            'user_stat' => $this->getStatisticsCards($request),
            'lp_equity' => $this->getRegisteredUsers($request),
        ]);
    }

    public function getRegisteredUsers(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "statistics/user/daily");
        $json_ = $res->getBody();
        $apiResponse = json_decode($json_, true);
        // Get the current week's starting and ending dates
        $currentWeekStart = date('Y-m-d', strtotime('last monday'));
        $currentWeekEnd = date('Y-m-d', strtotime('next sunday'));
        // Get the previous week's starting and ending dates
        $previousWeekStart = date('Y-m-d', strtotime('-1 week', strtotime($currentWeekStart)));
        $previousWeekEnd = date('Y-m-d', strtotime('-1 week', strtotime($currentWeekEnd)));
        // Initialize arrays to store user counts for the current and previous weeks
        $currentWeekUserCounts = [];
        $previousWeekUserCounts = [];
        // Initialize an index counter
        $currentIndex = 0;

        // Loop through the dates in the current week
        $currentDate = $currentWeekStart;
        while ($currentDate <= $currentWeekEnd) {
            $userCount = 0;
            foreach ($apiResponse as $apiData) {
                if ($apiData['day'] === $currentDate) {
                    $userCount = $apiData['user_count'];
                    break;
                }
            }
            $currentWeekUserCounts[$currentIndex] = $userCount;
            $currentIndex++;
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }
        $currentIndex = 0;

        // Loop through the dates in the current week
        $currentDate = $previousWeekStart;
        while ($currentDate <= $previousWeekEnd) {
            $userCount = 0;
            foreach ($apiResponse as $apiData) {
                if ($apiData['day'] === $currentDate) {
                    $userCount = $apiData['user_count'];
                    break;
                }
            }
            $previousWeekUserCounts[$currentIndex] = $userCount;
            $currentIndex++;
            $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
        }

        $res = $this->ReqController->get($this->BASE_URL . "statistics/user/total");
        $json_ = $res->getBody();
        $json = json_decode($json_);
        $datas = [
            "status" => "200",
            "registered_user" => [
                "datas" => [
                    "last_week" => [
                        "data" => [
                            '0' => $previousWeekUserCounts[0],
                            '1' => $previousWeekUserCounts[1],
                            '2' => $previousWeekUserCounts[2],
                            '3' => $previousWeekUserCounts[3],
                            '4' => $previousWeekUserCounts[4],
                            '5' => $previousWeekUserCounts[5],
                            '6' => $previousWeekUserCounts[6],
                        ],
                        "count" => array_sum($previousWeekUserCounts)
                    ],
                    "this_week" => [
                        "data" => [
                            '0' => $currentWeekUserCounts[0],
                            '1' => $currentWeekUserCounts[0],
                            '2' => $currentWeekUserCounts[0],
                            '3' => $currentWeekUserCounts[0],
                            '4' => $currentWeekUserCounts[0],
                            '5' => $currentWeekUserCounts[0],
                            '6' => $currentWeekUserCounts[0],
                        ],
                        "count" => array_sum($currentWeekUserCounts)
                    ],
                    "user_status" => [
                        "data" => [
                            'verified_user' => $json->total_sumsub_user_verified_count,
                        ],
                        "count" => $json->total_sumsub_user_count,
                    ]
                ]
            ]
        ];
        return response()->json($datas)->getData();
    }
    public function getStatistics(Request $request)
    {
        $datas = [
            "status" => "200",
            "statistics" => [
                "datas" => [
                    "monthly" => [
                        "data" =>
                        [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "weekly" => [
                        "data" => [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "daily" => [
                        "data" => [
                            "tf_capital" =>
                            [

                                0 => 150,
                                1 => 150,
                                2 => 150,
                                3 => 150,
                                4 => 150,
                                5 => 150,
                                6 => 150,
                                7 => 150,
                                8 => 150,
                                9 => 150,
                            ],
                            "lp" =>
                            [

                                0 => 100,
                                1 => 100,
                                2 => 100,
                                3 => 100,
                                4 => 100,
                                5 => 100,
                                6 => 100,
                                7 => 100,
                                8 => 100,
                                9 => 100,
                            ]
                        ]
                    ],
                    "information" => [
                        'balance_difference' => 1000,
                        'equity_difference' => 2000,
                        'tf_equity' => 3000,
                        'lp_equity' => 5000,
                        'equity_percent' => 15,
                        'balance_percent' => 10
                    ]

                ],

            ]
        ];
        return response()->json($datas)->getData();
    }
    public function getClients(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "statistics/withdrawal/total");
        $json_ = $res->getBody();
        $json = json_decode($json_);

        $datas = [
            "status" => "200",
            "clients" => [
                "groups" => [
                    "data" => [
                        'Pending' => $json->total_withdraw_pending_count,
                        'In Review' => $json->total_withdraw_in_review_count,
                        'Completed' => $json->total_withdraw_completed_count,
                        'Rejected' => $json->total_withdraw_rejected_count,
                    ],
                    "colors" => [
                        'Pending' => "#9568FF",
                        'In Review' => "#FF3242",
                        'Completed' => "#014502",
                        'Rejected' => "#AA3412"
                    ],
                    "count" => $json->total_withdraw_count
                ],
            ]
        ];
        return response()->json($datas)->getData();
    }
    public function getStatisticsCards(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "statistics/user/total");
        $json_ = $res->getBody();
        $json = json_decode($json_);
        $datas = [
            "status" => "200",
            "datas" => [],
            "withdrawal" => [],
            "withdrawal_colors" => [
                'Pending' => "#9568FF",
                'In Review' => "#FF3242",
                'Completed' => "#014502",
                'Rejected' => "#AA3412"
            ],

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
        $json_ = $res->getBody();
        $json = json_decode($json_);
        $newData = [
            'Pending' => $json->total_withdraw_pending_count,
            'In Review' => $json->total_withdraw_in_review_count,
            'Completed' => $json->total_withdraw_completed_count,
            'Rejected' => $json->total_withdraw_rejected_count,
        ];
        $datas['withdrawal'] = $newData;



        //The array_merge combines both the JSON objects.

        return response()->json($datas)->getData();
    }
}