<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $userModel->findAll(),
        ]);
    }

    public function new()
    {
        return view('users/new', [
            'title' => 'New User',
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'password'  => 'required|min_length[8]|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

            $userModel->insert([
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'password' => password_hash(
                (string) $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'User account created successfully.');
    }


    public function edit(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|max_length[100]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $updatedData = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $avatarRules = [
                'avatar' => [
                    'label' => 'Avatar',
                    'rules' => [
                        'uploaded[avatar]',
                        'max_size[avatar,2048]',
                        'is_image[avatar]',
                        'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                    ],
                ],
            ];

            if (! $this->validate($avatarRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadFolder = FCPATH . 'uploads/avatars';

            if (! is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0775, true);
            }

            $avatarName = $avatar->getRandomName();
            $avatar->move($uploadFolder, $avatarName);



            $updatedData['avatar'] = $avatarName;
        }

        $userModel->update($id, $updatedData);

        return redirect()->to(site_url('/users'))
            ->with('success', 'User updated successfully.');
    }
}
