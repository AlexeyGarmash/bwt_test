<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_main
 *
 * @author Alex
 */
class Model_main extends Model {

    public $message;

    public function get_data() {
        
    }

    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function generateHash($password) {
        return md5($password);
    }

    public static function checkUserEmail($email) {
        $mysqli = new mysqli("localhost", "root", "", "bwt_test");
        $mysqli->query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM users WHERE Mail = '$email'";

        $user = $mysqli->query($sql);
        $mysqli->close();
        if ($user->num_rows > 0)
            return true;
        else
            return false;
    }

    public function register($name, $secname, $email, $password, $gender, $bdate) {
        $mysqli = new mysqli("localhost", "root", "", "bwt_test");
        $mysqli->query("SET NAMES 'utf8'");
        $sql = "INSERT INTO users (Name, SecondName, Mail, Password, Sex, Bdate) VALUES ('$name', '$secname', '$email', '$password', '$gender', null)";
        // Получение и возврат результатов. Используется подготовленный запрос
        $res = $mysqli->query($sql);
        if ($res == true) {
            $this->message = "Registration successful!";
        } else {
            $this->message = "Registration failed!";
        }
        $mysqli->close();
        return $res;
    }

    public function login($email, $password) {
        $mysqli = new mysqli("localhost", "root", "", "bwt_test");
        $mysqli->query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM users where Mail = '$email'  AND Password = '$password'";
        $res = $mysqli->query($sql);
        $num_rows = mysqli_num_rows($res);
        $mysqli->close();
        return $num_rows > 0;
    }

}
