<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller_main
 *
 * @author Alex
 */
require_once 'application/models/model_main.php';

class Controller_main extends Controller {

    public $errors;
    public $message;
    public $messageLogin;

    function __construct() {
        $this->model = new Model_main();
        $this->view = new View();
    }

    function action_index() {
        session_start();
        $post = false;
        if (isset($_POST['submit'])) {

            /* if (isset($_SESSION['messageReg'])) {
              echo 'MESSAGE';
              echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';
              unset($_SESSION['messageReg']);
              } */
            $action = $_POST['action'];
            switch ($action) {
                case 'register':
                    if ($this->register()) {
                        $data['message'] = $this->message;
                        $title = "Register information";
                        $data['title'] = $title;
                        $post = true;
                    }
                    break;
                case 'login':

                    if ($this->login() === true) {
                        header('Location: ./weather');
                    } else {
                        $post = true;
                        $title = "Login information";
                    }
                    break;
            }
        }
        $data['post'] = $post;
        $data['err'] = $this->errors;
        $data['message'] = $this->message;
        $data['title'] = $title;

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    public function register() {
        $name = $_POST['name'];
        $secname = $_POST['secname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['sex'];
        $bdate = $_POST['bday'];
        $checkErr = false;
        if (!Model_main::checkPassword($password)) {
            $this->errors['pass'] = 'Password < 6 symbols';
            $checkErr = true;
        }
        if (!Model_main::checkName($name)) {
            $this->errors['name'] = 'Name < 3 symbols';
            $checkErr = true;
        }
        if (!Model_main::checkName($secname)) {
            $this->errors['secname'] = 'Second name < 3 symbols';
            $checkErr = true;
        }
        if (!Model_main::checkEmail($email)) {
            $this->errors['email'] = 'Email is not correct';
            $checkErr = true;
        }
        if (!$checkErr) {
            // Проверяем существует ли пользователь
            $checkEmail = Model_main::checkUserEmail($email);
            if ($checkEmail == true) {
                $this->errors['email'] = 'User with email is contains';
            } else {
                $hashed_password = Model_main::generateHash($password); // Сохраняем Хеш пароля
                if (!$this->model->register($name, $secname, $email, $hashed_password, $gender, $bdate)) {
                    $this->message = "Registration failed!";
                    return false;
                } else {
                    $this->message = "Registration succesful!";
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!Model_main::checkEmail($email)) {
            $this->errors['emailLogin'] = 'Email is not correct';
            return false;
        } else {
            $hashed_password = Model_main::generateHash($password);
            $ret_data = $this->model->login($email, $hashed_password);
            if (!$ret_data['ret']) {
                $this->message = "Login failed!";
                return false;
            } else {
                $this->message = "Login succesful!";
                $this->saveLogData($ret_data['data']);
                //echo $ret_data['data'];
                return true;
            }
        }
    }

    private function saveLogData($data) {
        $row = mysqli_fetch_array($data);
        $_SESSION['logData'] = $row;
    }

}
