<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Maria Lopez',
                'role' => 'Administrator'
            ],
            [
                'username' => 'manager01',
                'full_name' => 'John Ramos',
                'role' => 'Manager'
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Ana Flores',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Mark Villanueva',
                'role' => 'Cashier'
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Liza Aquino',
                'role' => 'Staff'
            ]
        ];

        $data = [
            'title' => 'User Accounts',
            'users' => $users
        ];

        return view('users/index', $data);
    }
}
