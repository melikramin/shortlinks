<?php
    class User extends Controller {
        public function index() {

            $data = [];

            $user = $this->model('UserModel');


            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            $data['user'] = $user->getUser();
            $data['links'] = $user->getLinksCount();

            $this->view('user/index', $data);
        }
        
        public function reg() {

            $data = [];
            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['email'], $_POST['login'], $_POST['pass']);

                $isValid = $user->validForm();
                
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
        }

        public function auth() {
            $data = [];
            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['login'], $_POST['pass']);
            }

            $this->view('user/auth', $data);
        }


    }