<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WebRequestController;

class MetatraderController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
    }

    public function initAddClientPage(Request $request)
    {
        $unbinded_users = $this->ReqController->get($this->BASE_URL . "users/clients/null", [
            'limit' => 10000,
            'offset' => 0
        ]);
        $unbinded_users = json_decode($unbinded_users->getBody())->users;

        return view('customers.metatrader.clients.add', [
            'unbinded_users' => $unbinded_users
        ]);
    }

    public function initSwapsPage(Request $request)
    {
        $swaps = $this->getSwaps();
        
        return view('customers.metatrader.swaps', [
            'swaps' => $swaps
        ]);
    }

    public function getGroups()
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/group/list");
            $json = json_decode($res->getBody());

            return $json->data;
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }
    }

    public function getClients(Request $request)
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/client/get_ids", [
                'group' => $request->get('group')
            ]);
            $json = json_decode($res->getBody());

            if($res->getStatusCode() == 200 && count($json->clients) == 0) {
                return response()->json([
                    'message' => "There is no client in this group."
                ], 400);
            }

            $str_query_list = "";
            foreach ($json->clients as $key => $value) {
                $str_query_list .= "client_ids=" . $value . "&";
            }

            $res = $this->ReqController->get($this->BASE_URL . "metatraders/clients", 
                $str_query_list
            );
            $json = json_decode($res->getBody());

            $clients_collection = collect();
            foreach ($json->clients as $key => $value) {
                $clients_collection->push([
                    'id' => $value->RecordID,
                    'citizenship' => $value->AddressCountry,
                    'name' => $value->PersonTitle . " " . $value->PersonName . " " . $value->PersonMiddleName . " " . $value->PersonLastName,
                    'mail' => $value->ContactEmail,
                    'phone' => $value->ContactPhone,
                ]);
            }
            // dd($clients_collection);

            return response()->json([
                'clients' => $clients_collection
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage()
            ], 400);
        }
    }

    public function addClient(Request $request)
    {
        try {
            $res = $this->ReqController->post($this->BASE_URL . "metatraders/client", [
                'user_id' => $request->get('user_id'),
                'title'=> $request->get('title'),
                'name'=> $request->get('name'),
                'middlename'=> $request->get('middlename'),
                'lastname'=> $request->get('lastname'),
                'gender'=> $request->get('gender'),
                'birthday'=> $request->get('birthdate'),
                'email'=> $request->get('email'),
                'phone'=> $request->get('phone'),
                'country'=> $request->get('country'),
                'city'=> $request->get('city'),
                'address'=> $request->get('address'),
                'zip'=> $request->get('zip'),
                'state'=> $request->get('state')
            ]);
            $json = json_decode($res->getBody());

            return response()->json([
                'message' => "The client has been added successfully."
            ], 200);

        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage()
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function getTradingAccountsDefaultGroup()
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/trading_accounts/default_group");
            $json = json_decode($res->getBody());

            return response()->json([
                'group' => $json->group
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage(),
                'group' => ""
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function setTradingAccountsDefaultGroup(Request $request)
    {
        try {
            $res = $this->ReqController->post($this->BASE_URL . "metatraders/trading_accounts/default_group", [
                'group' => $request->get('group')
            ]);
            $json = json_decode($res->getBody());

            return response()->json([
                'message' => "The default group has been set successfully."
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getResponse()->getBody()->getContents()
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function addTradingAccount(Request $request)
    {
        try {
            $res = $this->ReqController->post($this->BASE_URL . "metatraders/trading_accounts", [
                'user_id' => $request->get('user_id'),
                'name'=> $request->get('name'),
                'middlename'=> $request->get('middlename'),
                'lastname'=> $request->get('lastname'),
                'email'=> $request->get('email'),
                'phone'=> $request->get('phone'),
                'country'=> $request->get('country'),
                'city'=> $request->get('city'),
                'address'=> $request->get('address'),
                'zip'=> $request->get('zip'),
                'state'=> $request->get('state'),
                'group'=> $request->get('group'),
                'leverage'=> $request->get('leverage'),
                'agent'=> 0
            ]);
            $json = json_decode($res->getBody());

            return response()->json([
                'message' => "The trading account has been added successfully."
            ], 200);

        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage()
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function getSwaps() 
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/database/symbol/swaps");
            $json = json_decode($res->getBody());
            return $json->data;
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage(),
                'swaps' => []
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function setSwaps(Request $request)
    {
        try {
            $res = $this->ReqController->post($this->BASE_URL . "metatraders/database/symbol/swaps", [
                'swaps' => $request->get('data')
            ]);
            $json = json_decode($res->getBody());

            return response()->json([
                'message' => "The swaps have been set successfully."
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getResponse()->getBody()->getContents()
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function getTradingAccountRights(Request $request) 
    {
        try {
            $res = $this->ReqController->get($this->BASE_URL . "metatraders/trading_accounts/rights", [
                'login' => $request->get('login')
            ]);
            $json = json_decode($res->getBody());
            return response()->json([
                'data' => $json->data
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getMessage(),
                'rights' => []
            ], $exception->getResponse()->getStatusCode());
        }
    }

    public function setTradingAccountRights(Request $request)
    {
        try {
            $res = $this->ReqController->post($this->BASE_URL . "metatraders/trading_accounts/rights", [
                'login' => $request->get('login'),
                'rights' => $request->get('rights')
            ]);
            $json = json_decode($res->getBody());

            return response()->json([
                'message' => "The rights have been set successfully."
            ], 200);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return response()->json([
                'message' => "Unexpected error occurred",
                'error' => $exception->getResponse()->getBody()->getContents()
            ], $exception->getResponse()->getStatusCode());
        }
    }
}