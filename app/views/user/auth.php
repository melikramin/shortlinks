<!DOCTYPE html>
<html>
<head>
    <?php
        $website_title='Авторизация';
        require 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container">

    <?php

        $loginValue = "";
        $errorMessage = "";

        if (isset($_POST['login'])) $loginValue = $_POST['login'];
        if (isset($data['message'])) $errorMessage = $data['message'];

    ?>
        
        <?php
              if (!isset($_COOKIE['login'])):
        ?>
    
            <div class="pricing-header  text-center">
                <h1 class="display-4 mt-5">Авторизация</h1>
                <p class="lead">После авторизации Вы можете добавить ссылку</p>
            </div>
    
            <form action="/user/auth" method="POST">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                    <form class="form-signin">
                            
                            <input type="login" name="login" class="form-control" placeholder="Укажите логин" value="<?=$loginValue?>" autofocus>
                       
                            <input type="password" name="pass" class="form-control" placeholder="Введите пароль" > <br>
                            
                            <?php if($errorMessage!=""): ?>
                            <div class="row justify-content-center mt-1">
                                <!-- here will be error message -->
                                <div class="alert alert-danger"  role="alert">
                                    <?=$errorMessage?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <button class="btn btn-lg btn-primary btn-block" >Авторизоваться</button>

                            <p>Не зарегистированы? <a href="/user/reg"> Регистрация</a> </p> <a href=""></a>
    
                            
                    </div>
                </div>
            </form>
    
            <?php
              else:
            ?>
    
                <?php header('Location: /user');?>
    
            <?php
              endif;
            ?>
    
        </div>

  
</body>
</html>