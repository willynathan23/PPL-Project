<?php
class UserDaoImpl
{
    public function userLogin($marEmail, $marPassword) {
        $link = PDOUtil::createConnection();
        $query = 'SELECT email,idAdmin FROM Account WHERE email = ? AND password = MD5(?)';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $marEmail);
        $stmt->bindParam(2, $marPassword);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}