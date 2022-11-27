<?php

class LoginController
{
   private $dosenDao;

   public function __construct()
   {
      $this->dosenDao = new DosenDaoImpl();
   }

   public function index()
   {
      $loginSubmit = filter_input(INPUT_POST, 'btnLogin');
      if (isset($loginSubmit)) {
         $nrp = filter_input(INPUT_POST, 'txtNik');
         $password = filter_input(INPUT_POST, 'txtPassword');
         $md5password = md5($password);

         $result = $this->dosenDao->dosenLogin($nrp, $md5password);

         if ($result) {
            $_SESSION['web_login'] = true;
            $_SESSION['nrp'] = $result->getNrp();
            $_SESSION['nama'] = $result->getNama();
            header('location:index.php?ahref=home');
         } else {
            echo '<script>swal("Wrong Password", "Silakan coba lagi!", "error")</script>';
         }
      }

      include_once 'view/login.php';
   }

   public function logout()
   {
      session_unset();
      session_destroy();
      header('location:index.php');
   }
}
