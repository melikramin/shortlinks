<?php
    require 'DB.php';

    class UserModel {
        private $email;
        private $login;
        private $pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($email, $login, $pass) {
            $this->email = $email;
            $this->login = $login;
            $this->pass = $pass;
        }
        

        public function validForm() {


            if(strlen($this->login) < 3)
                return "Логин слишком короткое";

            if ( $this->checkUser($this->login) != "OK")
            return  $this->checkUser($this->login);

            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else
                return "Верно";
        }

        public function checkUser($login) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['login'] == $login)
                return 'Пользователя с таким логином существует';
            else
                return 'OK';
        }

        public function addUser() {
            $sql = 'INSERT INTO users(email, login, pass) VALUES(:email, :login, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['email' => $this->email, 'login' => $this->login, 'pass' => $pass]);

            $this->setAuth($this->login);
        }

        public function getUser() {
            $login = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->login, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($login, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['login'] == '')
                return 'Пользователя с таким логином не существует';
            else if(password_verify($pass, $user['pass']))
                $this->setAuth($login);
            else
                return 'Пароль не верный';
        }

        

        public function setAuth($login) {
            setcookie('login', $login, time() + 3600, '/');
            header('Location: /user');
        }

        public function getLinksCount() {
            $user = $_COOKIE['login'];
            $result = $this->_db->query("SELECT COUNT(*) FROM links WHERE `user` = '$user'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

    }