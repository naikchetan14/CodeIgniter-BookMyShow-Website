<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\User\User\UserModel;
use App\Models\UserTracking\UserTrackingModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $userTrackingModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userTrackingModel = new UserTrackingModel();
    }
   public function UserLoginView(){
        return view("pages/userlogin");
   }

   public function UserRegisterView(){
    return view("pages/userregister");
   }
 
   public function createNewAccount()
    {
        date_default_timezone_set('Asia/Kolkata');

        $validation = \Config\Services::validation();
        // Set validation rules
        $validation->setRules([
            'name' => 'required|min_length[5]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ]);
        $data = $this->request->getPost();


        // Validate the data
        if (!$this->validate($validation->getRules(), $data)) {
            return redirect()->to(base_url('/register'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // Check if the email already exists
        if ($this->userModel->where('email', $email)->first()) {
            session()->setFlashdata('errors', 'Email is already in use. Please choose another one.');
            return redirect()->to(base_url('/register'))->withInput();
        }

        if ($name &&  $email && $password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = $this->userModel->createAccount([
                'name' => $name,
                'email' => $email,
                'roles'=>'user',
                'password' => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            log_message('info', 'the value is' . json_encode($user));
            if ($user) {
               
                session()->set([
                    'isLoggedIn' => true,
                    'isAdmin' => false,
                    'Roles'=>$user['roles'],
                    'userID' => $user['userID'],
                    'userName' => $user['name']
                ]);
                 // Log the user information
                 $trackingUserData = [
                    'userID' => $user['userID'],
                    'user_name' => $user['name'],
                    'login_time' => date('Y-m-d H:i:s'), // Current date and time in IST
                     'date' => date('Y-m-d'),
                ];
                $this->userTrackingModel->AddLoginTrackingTime($trackingUserData); 
                session()->setFlashdata('success', 'New Account Created Successfully!');
            } else {
                session()->setFlashdata('errors', 'Failed To Add User');
                return redirect()->to(base_url('/register'))->with('message', 'Failed to add');
            }
            // session()->setFlashdata('success', 'User Added Successfully!');
            // Redirect to the index page after adding
            return redirect()->to(base_url('/'))->with('message', 'New Admin Created Successfully!');
        } else {
            session()->setFlashdata('errors', 'Failed To Add User');
            return redirect()->to(base_url('/register'))->with('message', 'Failed to add');
        }
    }

    public function getLoginUser ()
    {
        date_default_timezone_set('Asia/Kolkata');
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);
        $data = $this->request->getPost();
        log_message('info', 'User  data: 1');
    
        if (!$this->validate($validation->getRules(), $data)) {
            return redirect()->to(base_url('/signin'))->with('message', 'Validation failed!')->withInput()->with('errors', $this->validator->getErrors());
        }
        log_message('info', 'User  data: 45');
    
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Log the input data
        log_message('info', 'Admin Email: ' . $email);
        log_message('info', 'Admin Password: ' . $password);
    
        // Use the correct field name
        $user = $this->userModel->where('email', $email)->first();
    
        // Debugging: Log the user data
        log_message('info', 'User  data: ' . print_r($user, true));
    
        // Check if user exists
        if (!$user) {
            log_message('info', "No user found with email: $email");
        }
    
        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            
            log_message('info', 'User  data: 3');
           
            // Set session data
            session()->set([
                'isLoggedIn' => true,
                'isAdmin' => false,
                'Roles' => $user['roles'],
                'userID' => $user['userID'],
                'userName' => $user['name']
            ]);
              // Log the session data
              log_message('info', 'Session Data: ' . json_encode(session()->get()));
            $trackingUserData = [
                'userID' => $user['userID'],
                'user_name' => $user['name'],
                'login_time' => date('Y-m-d H:i:s'), // Current date and time in IST
                 'date' => date('Y-m-d'),
            ];
            if($this->userTrackingModel->AddLoginTrackingTime($trackingUserData)){
               log_message('info','sucess');
            }else{
                log_message('info','errro ncncnc');
            }
            return redirect()->to(base_url('/'))->with('message', 'Login Successfully!');
        } else {
            log_message('debug', "Invalid login credentials for email: $email");
            session()->setFlashdata('errors', 'Invalid Email Or Password!');
            return redirect()->to(base_url('/signin'))->with('message', 'Invalid email or password');
        }
    }
   
}



?>
