<?php

class LoginController
{
   private $dosenDao;
   private $adminDao;

   public function __construct()
   {
      $this->dosenDao = new DosenDaoImpl();
      $this->adminDao = new AdminDaoImpl();
   }

   public function index()
   {
      $loginSubmit = filter_input(INPUT_POST, 'btnLogin');
      if (isset($loginSubmit)) {
         $nrp = filter_input(INPUT_POST, 'txtNik');
         $password = filter_input(INPUT_POST, 'txtPassword');
         $md5password = md5($password);

         $resultDosen = $this->dosenDao->dosenLogin($nrp, $md5password);

         $resultAdmin = $this->adminDao->adminLogin($nrp, $md5password);

         if ($resultDosen) {
            $_SESSION['web_login'] = true;
            $_SESSION['nrp'] = $resultDosen->getNrp();
            $_SESSION['nama'] = $resultDosen->getNama();
            header('location:index.php?ahref=home');
         } else if ($resultAdmin) {
            $_SESSION['web_admin'] = true;
            $_SESSION['nama'] = $resultAdmin->getIdAdmin();
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
