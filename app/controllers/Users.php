<?php
class Users extends Controller
{
    public function __construct()
    {
         $this->userModel = $this->Model('User');
    }
    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            } else {
                if ($this->userModel->findUserbyEmail($data['email'])) {
                    $data['email_err'] = 'email deja kayn';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }



            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated
                // hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data))
                {
                    flash('register_success', 'you are register and you can login');
                    redirect('/users/login');
                }else {
                    die('something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        }else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Pleae enter email';
            }



            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // check for email
            if ($this->userModel->findUserbyEmail($data['email'])) {
                // user kayn
            }else {
                // user makaynch
                $data['email_err'] = 'NO user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err'])) {
                // Validated
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                  // Create Session
                  $this->createUserSession($loggedInUser);
                } else {
                  $data['password_err'] = 'Password incorrect';
      
                  $this->view('users/login', $data);
                }
                
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            // load view
            $this->view('users/login', $data);
        }
    }


    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id_u;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;
        if ($_SESSION['user_role']==1) {
            redirect('admin');
        }else{
            redirect('client');
        }

    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_emaild']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
    
}
