<?php


namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use GuzzleHttp\Client;
use App\Models\Clients;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\WebRequestController;

class  LoggerController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }
    
    public function initLoggerHTTPPage(Request $request)
    {
        return view('loggers.http', [
            'logs' => $this->getAllHTTP($request),
        ]);
    }

    public function initLoggerServicePage(Request $request)
    {
        return view('loggers.service', [
            'logs' => $this->getAllService($request),
        ]);
    }

    public function getAllService(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "logs/services", ['limit' => 1000, 'offset' => 0]);
        $json = json_decode($res->getBody());
        $datas = [
            "status" => "200",
            "logs" => [
                "datas" => [],
                "count" => 700
            ]
        ];

        foreach ($json as $key => $user) {
            $message = "";

            if (property_exists($user, "message") == false) {
                $message = "";
            } else if (is_array($user->message)) {
                $message = json_encode($user->message);
            } else {
                $message = $user->message ?? "";
            }

            $newData = [
                'service' => $user->service,
                'datetime' => substr($user->datetime, 0, 25),
                'level' => $user->level,
                'message' => $message,
            ];
            $datas['logs']['datas'][$user->_id] = $newData;
        }
        $datas['logs']['count'] = count($json);
        return response()->json($datas)->getData();
    }

    public function getAllHTTP(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "logs/http", ['limit' => 1000, 'offset' => 0]);
        $json = json_decode($res->getBody());
        $datas = [
            "status" => "200",
            "logs" => [
                "datas" => [],
                "count" => 700
            ]
        ];
        foreach ($json as $key => $user) {
            $newData = [
                'service' => $user->service,
                'datetime' => substr($user->datetime, 0, 25),
                'method' => $user->method,
                'url' => $user->url,
                'body' => json_encode($user->body, true),
                'status_code' => $user->status_code,
                'status_message' => $user->status_message,
            ];
            $datas['logs']['datas'][$user->_id] = $newData;
        }
        $datas['logs']['count'] = count($json);
        return response()->json($datas)->getData();
    }
}
