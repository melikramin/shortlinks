<?php 
if ($data['name'] !='')
    header('Location:'.$data['name']);
else
    header('Location: /');

