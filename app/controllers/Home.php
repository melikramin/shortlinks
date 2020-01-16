<?php
    class Home extends Controller {
        public function index() {
            
            if (!isset($_COOKIE['login']))
                $this->view('user/auth');
                else{

                    $data = [];
                    $link = $this->model('LinkModel');

                        if(isset($_POST['longLink'])) {
                        $link->setData($_POST['longLink'], $_POST['shortLink']);
                        $isValid = $link->validForm();
                     
                        if($isValid == "Верно") {
                            $link->addLink();
                        }
                            
                        else
                            $data['message'] = $isValid;
                        }

                        //удаление ссылок
                        if(isset($_POST['del_item'])){
                            $link->delitem($_POST['del_item']);
                        }

                    $data['links'] = $link->getLinks();

                    $this->view('home/index', $data);
                }



        }
    }