<?php
return [
    "layout" => "layouts.app",
    "route-prefix" => "",
    "pagination" => [
        "users" => 5,
        "roles" => 5,
        "permissions" => 5,
    ],
    "middleware" => ['web', 'entrust-gui.admin'],
    "unauthorized-url" => '/login',
    "middleware-role" => 'admin',
    "confirmable" => false,
    "users" => [
      'fieldSearchable' => [],
    ],
];
