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
        
        $show_buttons = [
            "delete_admin" => false
        ];

        foreach (session()->get('user')['role']['role_permissions'] as $role_permission) {
            if ($role_permission['permission']['slug'] == 'ADMIN' && $role_permission['write']) {
                $show_buttons['delete_admin'] = true;
            }
        }

        $data = [
            "admins" => $admins,
            "show_buttons" => $show_buttons
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
        $groups = $this->MetatraderController->getGroups();

        $show_buttons = [
            "save" => false
        ];

        foreach (session()->get('user')['role']['role_permissions'] as $role_permission) {
            if ($role_permission['permission']['slug'] == 'SETTINGS_METATRADER5' && $role_permission['write']) {
                $show_buttons['save'] = true;
            }
        }

        return view("settings.metatrader5",[
            "metatrader_groups" => $groups,
            "settings" => $this->SettingsController->getAllSettings(),
            "show_buttons" => $show_buttons
        ]);
    }

    public function initSumsubSettingsPage(Request $request)
    {
        $show_buttons = [
            "save" => false
        ];

        foreach (session()->get('user')['role']['role_permissions'] as $role_permission) {
            if ($role_permission['permission']['slug'] == 'SETTINGS_SUMSUB' && $role_permission['write']) {
                $show_buttons['save'] = true;
            }
        }

        return view("settings.sumsub",[
            "settings" => $this->SettingsController->getAllSettings(),
            "show_buttons" => $show_buttons
        ]);
    }

    public function initRolePermissionPage(Request $request)
    {
        $permissions = $this->getPermissions();
        $roles = $this->getRolePermissions();

        $show_cards = [
            "update_role_permission" => false
        ];

        $show_buttons = [
            "update_role" => false,
            "delete_role" => false
        ];

        foreach (session()->get('user')['role']['role_permissions'] as $role_permission) {
            if ($role_permission['permission']['slug'] == 'ADMIN' && $role_permission['write']) {
                $show_cards['update_role_permission'] = true;

                $show_buttons['update_role'] = true;
                $show_buttons['delete_role'] = true;
            }
        }
        
        $data = [
            "permissions" => $permissions,
            "roles" => $roles,
            "show_cards" => $show_cards,
            "show_buttons" => $show_buttons
        ];

        return view("admins.role_permissions", $data);
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

    public function addRole(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'permissions' => $request->get('permissions') ?? '[]'
        ];

        $res = $this->ReqController->post($this->BASE_URL . "admins/roles", $data);
        $json = json_decode($res->getBody());

        return response()->json([
            'message' => "The role has been added successfully.",
            'data' => $json
        ], 200);
    }

    public function deleteRole(Request $request)
    {
        $data = [
            'role_id' => $request->get('role_id')
        ];

        $res = $this->ReqController->delete($this->BASE_URL . "admins/roles/", $data);
        $json = json_decode($res->getBody());

        return response()->json([
            'message' => "The role has been deleted successfully.",
            'data' => $json
        ], 200);
    }

    public function getPermissions()
    {
        $res = $this->ReqController->get($this->BASE_URL . "admins/permissions");
        $json = json_decode($res->getBody());

        return $json;
    }

    public function getRolePermissions()
    {
        $res = $this->ReqController->get($this->BASE_URL . "admins/role-permissions");
        $json = json_decode($res->getBody());

        return $json;
    }

    public function updateRolePermissions(Request $request)
    {
        $data = [
            'role_id' => $request->get('role_id'),
            'permissions' => $request->get('permissions') ?? '[]'
        ];

        $res = $this->ReqController->post($this->BASE_URL . "admins/role-permissions/update", $data);
        $json = json_decode($res->getBody());

        return response()->json([
            'message' => "The role has been updated successfully.",
            'data' => $json
        ], 200);
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