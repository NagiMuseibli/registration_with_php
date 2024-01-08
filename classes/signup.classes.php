<?php
class Signup extends Dbh
{
    protected function setUser($uid, $email, $pwd)
    {
        $stmt = $this->connect()->prepare('INSERT INTO user (name, email, password) VALUES (?,?,?;');
        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);


        if (!$stmt->execute(array($uid, $email, $hashedpwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE name = ? OR email = ?;');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
