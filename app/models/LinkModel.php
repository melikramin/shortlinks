<?php
    require 'DB.php';

    class LinkModel {
        private $longLink;
        private $shortLink;


        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($longLink, $shortLink) {
            $this->longLink = $longLink;
            $this->shortLink = $shortLink;
        }
        

        public function validForm() {

            if (strtolower(substr($this->longLink, 0, 4)) != "http")
            $this->longLink = 'http://'.$this->longLink;


            if(strlen($this->longLink) < 3)
                return "Длинная ссылка слишком короткое";

            if ( $this->checkLink($this->shortLink) != "OK")
            return  $this->checkLink($this->shortLink);

      
            else
                return "Верно";
        }

        public function checkLink($shortLink) {
            $result = $this->_db->query("SELECT * FROM `links` WHERE `shortlink` = '$shortLink'");
            $link = $result->fetch(PDO::FETCH_ASSOC);

            if($link['shortlink'] == $shortLink)
                return 'Ccылка с таким именим существует';
            else
                return 'OK';
        }

        public function getLink($shortLink) {
            $result = $this->_db->query("SELECT * FROM `links` WHERE `shortlink` = '$shortLink'");
            $link = $result->fetch(PDO::FETCH_ASSOC);

                return $link['longlink'];
           
        }

        public function addLink() {
            $sql = 'INSERT INTO links(longlink, shortlink, user) VALUES(:longLink, :shortLink, :user)';
            $query = $this->_db->prepare($sql);
            $query->execute(['longLink' => $this->longLink, 'shortLink' => $this->shortLink, 'user' => $_COOKIE['login']]);
        }

        public function getLinks() {
            $user = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `links` WHERE `user` = '$user' ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }


        public function delitem($id) {

            $sql = 'DELETE FROM `links` WHERE `links`.`id` = :id';
            $query = $this->_db->prepare($sql);
            $query->execute(['id' => $id]);

        }

   

    }