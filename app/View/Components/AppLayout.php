<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use Symfony\Component\HttpFoundation\Session\Session;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $sidebar_items = $this->getSidebarData();

        return view('layouts.app', [
            'sidebar_items' => $sidebar_items
        ]);
    }

    public function getSidebarData()
    {
        $role_permissions = session()->get('user')['role']['role_permissions'];
        $sidebar = [
            "dashboard" => [
                "name" => "Dashboard",
                "route" => "index",
                "icon" => "dashboard"
            ],
            "customers" => [
                "name" => "Customers",
                "icon" => "person"
            ],
            "application" => [
                "name" => "Application",
                "icon" => "apps",
                "items" => [
                    "crypto_transfer_check" => [
                        "name" => "Crypto Transfer Check",
                        "route" => "applications.crypto_transfer_check",
                        "icon" => ""
                    ],
                ]
            ]
        ];

        foreach($role_permissions as $role_permission)
        {
            if($role_permission['permission']['slug'] == 'CUSTOMER' && $role_permission['read'] == true)
            {
                $sidebar["customers"]["items"]["create"] = [
                    "name" => "Create New Customer",
                    "route" => "customers.create",
                    "icon" => ""
                ];
                $sidebar["customers"]["items"]["list"] = [
                    "name" => "Customers List",
                    "route" => "customers",
                    "icon" => ""
                ];
            }

            if($role_permission['permission']['slug'] == 'CUSTOMER_WITHDRAW' && $role_permission['read'] == true)
            {
                $sidebar["customers"]["items"]["withdrawal_requests"] = [
                    "name" => "Withdrawal Requests",
                    "route" => "withdrawal.requests",
                    "icon" => ""
                ];
            }

            if($role_permission['permission']['slug'] == 'METATRADER5_CLIENT' && $role_permission['read'] == true)
            {
                $sidebar["customers"]["items"]["metatrader5_client"] = [
                    "name" => "Metatrader5 Clients",
                    "icon" => "",
                    "items" => [
                        "clients_list" => [
                            "name" => "Bind/Unbind Client",
                            "route" => "customers.metatrader.clients.list",
                            "icon" => ""
                        ],
                        "clients_add" => [
                            "name" => "Create New Client",
                            "route" => "customers.metatrader.clients.add",
                            "icon" => ""
                        ]
                    ]
                ];
            }
            
            if($role_permission['permission']['slug'] == 'METATRADER5_SWAPS' && $role_permission['read'] == true)
            {
                $sidebar["application"]["items"]["set_swaps"] = [
                    "name" => "Set Swaps",
                    "route" => "customers.metatrader.swaps",
                    "icon" => ""
                ];
            }

            if($role_permission['permission']['slug'] == 'ADMIN')
            {
                if(!isset($sidebar["settings"]))
                {
                    $sidebar["admin"] = [
                        "name" => "Admin",
                        "icon" => "admin_panel_settings",
                        "items" => []
                    ];
                }
                
                if($role_permission['write'])
                {
                    $sidebar["admin"]["items"]["new_admin"] = [
                        "name" => "New Admin",
                        "route" => "admins.add",
                        "icon" => ""
                    ];
                }

                if($role_permission['read'])
                {
                    $sidebar["admin"]["items"]["admin_list"] = [
                        "name" => "Admin List",
                        "route" => "admins.list",
                        "icon" => ""
                    ];
                    
                    $sidebar["admin"]["items"]["role_permissions"] = [
                        "name" => "Role Permissions",
                        "route" => "admins.role_permissions",
                        "icon" => ""
                    ];
                }
            }

            if(($role_permission['permission']['slug'] == 'SETTINGS_METATRADER5' && $role_permission['read'] == true) || ($role_permission['permission']['slug'] == 'SETTINGS_SUMSUB' && $role_permission['read'] == true))
            {
                if(!isset($sidebar["settings"]))
                {
                    $sidebar["settings"] = [
                        "name" => "Settings",
                        "icon" => "tune",
                        "items" => []
                    ];
                }

                if($role_permission['permission']['slug'] == 'SETTINGS_METATRADER5' && $role_permission['read'] == true)
                {
                    $sidebar["settings"]["items"]["metatrader5"] = [
                        "name" => "Metatrader5 Settings",
                        "route" => "settings.metatrader5",
                        "icon" => ""
                    ];
                }

                if($role_permission['permission']['slug'] == 'SETTINGS_SUMSUB' && $role_permission['read'] == true)
                {
                    $sidebar["settings"]["items"]["sumsub"] = [
                        "name" => "Sumsub Settings",
                        "route" => "settings.sumsub",
                        "icon" => ""
                    ];
                }
            }

            if($role_permission['permission']['slug'] == 'LOGGER' && $role_permission['read'] == true)
            {
                $sidebar["loggers"] = [
                    "name" => "Loggers",
                    "icon" => "logo_dev",
                    "items" => [
                        "service" => [
                            "name" => "Service Logger",
                            "route" => "loggers.service",
                            "icon" => ""
                        ],
                        "http" => [
                            "name" => "HTTP Logger",
                            "route" => "loggers.http",
                            "icon" => ""
                        ]
                    ]
                ];
            }
        }   

        return $sidebar;
    }
}