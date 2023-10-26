<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\WebRequestController;
use App\Http\Controllers\MetatraderController;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
        $this->MetatraderController = new MetatraderController();
    }

    public function add(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "users/", [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'title' => $request->get('title'),
            'name' => $request->get('name'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'gender' => $request->get('gender'),
            'birthdate' => $request->get('birthdate'),
            'phone' => $request->get('phone'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'postal_code' => $request->get('zip'),
            'state' => $request->get('state')
        ]);
        $json = json_decode($res->getBody());
        return response()->json($json, 200);
    }

    public function update(Request $request)
    {
        $res = $this->ReqController->put($this->BASE_URL . "users/", [
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'name' => $request->get('name'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'gender' => $request->get('gender'),
            'birthdate' => $request->get('birthdate'),
            'phone' => $request->get('phone'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'postal_code' => $request->get('zip'),
            'state' => $request->get('state')
        ]);
        $json = json_decode($res->getBody());
        return response()->json($json, 200);
    }

    public function getAllByDate(Request $request)
    {
        $res = $this->ReqController->get($this->BASE_URL . "users/", [
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time')
        ]);
        $json = json_decode($res->getBody());

        $users_collection = collect();
        foreach ($json->users as $key => $value) {
            $users_collection->push([
                "id" => $value->id,
                "client_id" => $value->user_client ? $value->user_client->login : null,
                "email" => $value->email,
                "name" => $value->title . " " . $value->name . " " . $value->middlename . " " . $value->lastname,
                "phone" => $value->phone,
            ]);
        }

        return response()->json([
            'users' => $users_collection
        ], 200);
    }

    public function bindClient(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "users/client/bind", [
            'user_id' => $request->get('user_id'),
            'client_id' => $request->get('client_id')
        ]);
        $json = json_decode($res->getBody());
        return response()->json($json, 200);
    }

    public function unbindClient(Request $request)
    {
        $res = $this->ReqController->post($this->BASE_URL . "users/client/unbind", [
            'user_id' => $request->get('user_id'),
            'client_id' => $request->get('client_id')
        ]);
        $json = json_decode($res->getBody());
        return response()->json($json, 200);
    }

    public function getRegisteredUsers(Request $request)
    {
        $datas = [
            "status" => "200",
            "registered_user" => [
                "datas" => [
                    "last_week" => [
                        "data" => [
                            '0' => 100,
                            '1' => 100,
                            '2' => 100,
                            '3' => 100,
                            '4' => 100,
                            '5' => 100,
                            '6' => 100,
                        ],
                        "count" => 700
                    ],
                    "this_week" => [
                        "data" => [
                            '0' => 150,
                            '1' => 180,
                            '2' => 140,
                            '3' => 200,
                            '4' => 150,
                            '5' => 150,
                            '6' => 150,
                        ],
                        "count" => 1050
                    ],
                    "user_status" => [
                        "data" => [
                            'verified_user' => 40,
                            'other_user' => 150,
                        ],
                        "count" => 250
                    ]
                ]
            ]
        ];
        return response()->json($datas)->getData();
    }
}
