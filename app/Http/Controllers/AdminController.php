<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\WebRequestController;
use App\Http\Controllers\MetatraderController;
use App\Http\Controllers\SettingsController;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->BASE_URL = env("API_SERVER_BASE_URL");
        $this->ReqController = new WebRequestController();
        $this->MetatraderController = new MetatraderController();
        $this->SettingsController = new SettingsController();
    }

    public function initAdminListPage(Request $request)
    {
        $admins = $this->getAll($request);
        // dd($admins);
        $data = [
            "admins" => $admins
        ];

        return view("admins.list", $data);
    }

    public function initAdminAddPage(Request $request)
    {
        $admin_role_types = $this->getRoles();
        
        $data = [
            "admin_role_types" => $admin_role_types
        ];

        return view("admins.add", $data);
    }

    public function initAdminEditPage(Request $request)
    {
        $admin = $this->getById($request->get('id'));

        $data = [
            "admin" => $admin
        ];

        return view("admins.edit", $data);
    }

    public function initMetatrader5SettingsPage(Request $request)
    {
        // dd($this->SettingsController->getAllSettings());
        $groups = $this->MetatraderController->getGroups();

        return view("settings.metatrader5",[
            "metatrader_groups" => $groups,
            "settings" => $this->SettingsController->getAllSettings()
        ]);
    }

    public function initSumsubSettingsPage(Request $request)
    {
        // dd($this->SettingsController->getAllSettings());
        $groups = $this->MetatraderController->getGroups();

        return view("settings.sumsub",[
            "settings" => $this->SettingsController->getAllSettings()
        ]);
    }

    public function getById($id)
    {
        $res = $this->ReqController->get($this->BASE_URL . "admins/" . $id);
        $json = json_decode($res->getBody());
        $datas = [
            "status" => "200",
            "datas" => [],
        ];

        $newData = [
            'id' => $json->id,
            'email' => $json->email,
            'name' => $json->name,
            'lastname' => $json->lastname,
            'role' => $json->role,
            'created_at' => $json->created_at,
            'updated_at' => $json->updated_at,
        ];

        array_push($datas['datas'], $newData);
        return $datas;
    }

    public function getAll()
    {
        $res = $this->ReqController->get($this->BASE_URL . "admins");
        $json = json_decode($res->getBody());

        return $json;
    }

    public function getRoles()
    {
        $res = $this->ReqController->get($this->BASE_URL . "admins/roles");
        $json = json_decode($res->getBody());

        return $json;
    }

    public function addAdmin(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'role_type_id' => $request->get('role_type_id'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
        ];

        $res = $this->ReqController->post($this->BASE_URL . "admins/", $data);
        $json = json_decode($res->getBody());

        return response()->json([
            'message' => "The admin has been added successfully.",
            'data' => $json
        ], 200);
    }

    public function deleteAdmin(Request $request)
    {
        $res = $this->ReqController->delete($this->BASE_URL . "admins/" . $request->get('id'));
        $json = json_decode($res->getBody());

        return response()->json([
            'message' => "The admin has been deleted successfully.",
            'data' => $json
        ], 200);
    }
}