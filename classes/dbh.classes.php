<?php
class Dbh
{
    protected function connect()
    {
        try {
            $usarname = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=useraccount', $usarname, $password);
            return $dbh;
        } catch (\Throwable $th) {
            echo "ERROR: " . $th->getMessage() . "<br>";
            die();
        }
    }
}
