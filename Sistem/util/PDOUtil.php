<?php
class PDOUtil
{
    public static function createConnection() {
        $link = new PDO('mysql:host=localhost;dbname=ppl-project','root');
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
}