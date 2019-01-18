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


        if (isset($_POST['submit'])) {
            $action = $_POST['action'];
            switch ($action) {
                case 'register':
                    $this->register();
                    break;
                case 'login':
                    $this->login();
                    break;
            }
        }
        $data['err'] = $this->errors;
        $data['message'] = $this->message;
        $data['messageLogin'] = $this->messageLogin;
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    public function register() {
        $name = $_POST['name'];
        $secname = $_POST['secname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['sex'];
        $bdate = $_POST['bday'];

        if (!Model_main::checkPassword($password)) {
            $this->errors['pass'] = 'Password < 6 symbols';
        }
        if (!Model_main::checkName($name)) {
            $this->errors['name'] = 'Name < 3 symbols';
        }
        if (!Model_main::checkName($secname)) {
            $this->errors['secname'] = 'Second name < 3 symbols';
        }
        if (!Model_main::checkEmail($email)) {
            $this->errors['email'] = 'Email is not correct';
        } else {
            // Проверяем существует ли пользователь
            $checkEmail = Model_main::checkUserEmail($email);
            if ($checkEmail == true) {
                $this->errors['email'] = 'User with email is contains';
            } else {
                $hashed_password = Model_main::generateHash($password); // Сохраняем Хеш пароля
                if (!$this->model->register($name, $secname, $email, $hashed_password, $gender, $bdate)) {
                    $this->message = "Registration failed!";
                } else {
                    $this->message = "Registration succesful!";
                }
            }
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!Model_main::checkEmail($email)) {
            $this->errors['emailLogin'] = 'Email is not correct';
        } else {
            $hashed_password = Model_main::generateHash($password);
            if (!$this->model->login($email, $hashed_password)) {
                $this->messageLogin = "Login failed!";
            } else {
                $this->messageLogin = "Login succesful!";
            }
        }
    }

}
