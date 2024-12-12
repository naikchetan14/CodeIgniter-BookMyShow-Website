<?php

namespace App\Controllers;

use App\Models\Admin\AdminUser\AdminUserModel;

class AdminUserController extends BaseController
{
    protected $adminUserModel;
    public function __construct()
    {
        $this->adminUserModel = new AdminUserModel();
    }
    public function signInView()
    {
        return view("pages/login");
    }

    public function registerView()
    {
        return view("pages/register");
    }

    public function createNewAdminAccount()
    {
        $validation = \Config\Services::validation();
        // Set validation rules
        $validation->setRules([
            'adminName' => 'required|min_length[5]|max_length[20]',
            'adminEmail' => 'required|valid_email',
            'adminPassword' => 'required|min_length[6]',
        ]);
        $data = $this->request->getPost();


        // Validate the data
        if (!$this->validate($validation->getRules(), $data)) {
            return redirect()->to(base_url('/admin/register'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $adminName = $this->request->getPost('adminName');
        $adminEmail = $this->request->getPost('adminEmail');
        $adminPassword = $this->request->getPost('adminPassword');
        // Check if the email already exists
        if ($this->adminUserModel->where('adminEmail', $adminEmail)->first()) {
            session()->setFlashdata('errors', 'Email is already in use. Please choose another one.');
            return redirect()->to(base_url('/admin/register'))->withInput();
        }

        if ($adminName &&  $adminEmail && $adminPassword) {
            $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
            $user = $this->adminUserModel->createAdminAccount([
                'adminName' => $adminName,
                'adminEmail' => $adminEmail,
                'roles'=>'admin',
                'adminPassword' => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            log_message('info', 'the value is' . json_encode($user));
            if ($user) {
                // Log the user information
                session()->set([
                    'isLoggedIn' => true,
                    'isAdmin' => true,
                    'Roles'=>$user['roles'],
                    'userID' => $user['id'],
                    'userName' => $user['adminName']
                ]);
                session()->setFlashdata('success', 'Created New Admin Successfully!');
            } else {
                session()->setFlashdata('errors', 'Failed To Add User');
                return redirect()->to(base_url('/admin/register'))->with('message', 'Failed to add');
            }
            // session()->setFlashdata('success', 'User Added Successfully!');
            // Redirect to the index page after adding
            return redirect()->to(base_url('/'))->with('message', 'New Admin Created Successfully!');
        } else {
            session()->setFlashdata('errors', 'Failed To Add User');
            return redirect()->to(base_url('/admin/register'))->with('message', 'Failed to add');
        }
    }

    public function getAdminLoginUser ()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'adminEmail' => 'required|valid_email',
            'adminPassword' => 'required',
        ]);
        $data = $this->request->getPost();
        log_message('info', 'User  data: 1');
    
        if (!$this->validate($validation->getRules(), $data)) {
            return redirect()->to(base_url('/admin/signin'))->with('message', 'Validation failed!')->withInput()->with('errors', $this->validator->getErrors());
        }
        log_message('info', 'User  data: 45');
    
        $adminEmail = $this->request->getPost('adminEmail');
        $adminPassword = $this->request->getPost('adminPassword');
    
        // Log the input data
        log_message('info', 'Admin Email: ' . $adminEmail);
        log_message('info', 'Admin Password: ' . $adminPassword);
    
        // Use the correct field name
        $user = $this->adminUserModel->where('adminEmail', $adminEmail)->first();
    
        // Debugging: Log the user data
        log_message('info', 'User  data: ' . print_r($user, true));
    
        // Check if user exists
        if (!$user) {
            log_message('info', "No user found with email: $adminEmail");
        }
    
        // Check if user exists and verify password
        if ($user && password_verify($adminPassword, $user['adminPassword'])) {
            log_message('info', 'User  data: 3');
    
            // Set session data
            session()->set([
                'isLoggedIn' => true,
                'isAdmin' => true,
                'Roles' => $user['roles'],
                'userID' => $user['id'],
                'userName' => $user['adminName']
            ]);
            return redirect()->to(base_url('/'))->with('message', 'Login Successfully!');
        } else {
            log_message('debug', "Invalid login credentials for email: $adminEmail");
            session()->setFlashdata('errors', 'Invalid Email Or Password!');
            return redirect()->to(base_url('/admin/signin'))->with('message', 'Invalid email or password');
        }
    }
}
