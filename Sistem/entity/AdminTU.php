<?php
// <!-- Desika Candra 2072018  -->
class AdminTU
{
    private $id_admin;
    private $password;

    /**
     * @return mixed
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param mixed $id_admin
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
