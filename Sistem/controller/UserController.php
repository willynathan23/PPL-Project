<?php
class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImpl();
    }

    public function index(){
        $loginSubmit = filter_input(INPUT_POST, 'btnLogin');
        if (isset($loginSubmit)) {
            $email = filter_input(INPUT_POST, 'txtEmail');
            $password = filter_input(INPUT_POST, 'txtPassword');
            $result = $this->userDao->userLogin($email, $password);
            if($result[0]['email'] == $email) {
                $_SESSION['web_login'] = true;
                header('location:index.php');
            } else {
                echo '<div class="bg-error>Invalid</div>';
            }
        }
        include_once 'view/login.php';
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location:index.php');
    }
}