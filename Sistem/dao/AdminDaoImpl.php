<?php
class AdminDaoImpl
{
   public function adminLogin($id, $password)
   {
      $link = PDOUtil::createConnection();
      $query = 'SELECT * FROM adminTU WHERE id_admin = ? AND password = ?';

      $stmt = $link->prepare($query);

      $stmt->bindParam(1, $id);
      $stmt->bindParam(2, $password);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $link = null;

      return $stmt->fetchObject('AdminTU');
   }
}
