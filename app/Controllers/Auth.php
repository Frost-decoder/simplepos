<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn') === true) {
            return redirect()->to(site_url('customers'));
        }

        return view('auth/login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user === null || ! password_verify($password, $user['password'] ?? '')) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'userId'     => $user['id'],
            'username'   => $user['username'],
            'fullName'   => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}
