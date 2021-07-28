<?php

    class Pengguna extends Controller
    {
        public function __construct()
        {
          $this->penggunaModel = $this->model('pengguna_model');
        }

        public function index()
        {
            $this->view('pengguna/index');
        }

        public function login()
        {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            // Load view
            $this->view('pengguna/login', $data);
        }

        public function do_login()
        {
            // Process form
            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            ];
            $userAuthenticated = $this->penggunaModel->login($data['username'], $data['password']);
            if ( $userAuthenticated) {
                // Create session
                $this->createUserSession($userAuthenticated);
            } else {
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => '',
                    'username_err' => 'Username or Password are incorrect',
                    'password_err' => 'Username or Password are incorrect',
                ];
                $this->view('pengguna/login', $data);
            }
        }

        public function logout()
        {
            unset($_SESSION['user_nip']);
            unset($_SESSION['user_username']);
            session_destroy();
            redirect('pengguna/login');
        }

        public function createUserSession($user)
        {
            $_SESSION['user_nip'] = $user->nip;
            $_SESSION['user_username'] = $user->username;
            redirect('transaksi');
        }

        public function isLoggedIn()
        {
            if ( isset($_SESSION['user_nip']) && isset($_SESSION['user_username']) ) {
                return true;
            } else {
                return false;
            }
        }

    }