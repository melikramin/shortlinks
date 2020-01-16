<!DOCTYPE html>
<html>
<head>
    <?php
        $website_title='Регистрация';
        require 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container">

    <?php
        $emailValue = "";
        $loginValue = "";
        $errorMessage = "";

        if (isset($_POST['email'])) $emailValue = $_POST['email'];
        if (isset($_POST['login'])) $loginValue = $_POST['login'];
        if (isset($data['message'])) $errorMessage = $data['message'];

    ?>

        
        <?php
              if (!isset($_COOKIE['login'])):
        ?>
    
            <div class="pricing-header  text-center">
                <h1 class="display-4 mt-5">Регистрация</h1>
                <p class="lead">Запольните ниже форму чтобы регистрироваться</p>
            </div>
    
            <form action="/user/reg" method="POST">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                    <form class="form-signin">

                             <input type="email" name="email" class="form-control" placeholder="Укажите почту" value="<?=$emailValue?>" autofocus>
                             <input type="login" name="login" class="form-control" placeholder="Придумайте логин" value="<?=$loginValue?>">
                             <input type="password" name="pass" class="form-control" placeholder="Введите пароль" > <br>
                            
    
                             <?php if($errorMessage!=""): ?>
                            <div class="row justify-content-center mt-1">
                                <!-- here will be error message -->
                                <div class="alert alert-danger"  role="alert">
                                    <?=$errorMessage?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <button class="btn btn-lg btn-primary btn-block">Регистрироваться</button>

                            <p>Уже зарегистрированы? <a href="/user/auth">Войдите в систему</a> </p> <a href=""></a>
    
                            
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