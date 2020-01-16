<?php
    class S extends Controller {
        public function index($name = '') {

            $realLink = '';
            $link = $this->model('LinkModel');
            if ($name != ''){
                $realLink = $link->getLink($name);
            }

            $this->view('link/index',
            ['name' => $realLink]
        
        );
        }

        
       
        
    }