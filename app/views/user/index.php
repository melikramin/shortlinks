<!DOCTYPE html>
<html>
<head>
    <?php
        $website_title='Страница пользователья';
        require 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container">

    <?php if(isset($_COOKIE['login'])): ?>

            <h2>Привет, <b><?=$data['user']['login']?></b></h2>
            <p>У вас количество ссылок: <b><?=$data['links']['COUNT(*)']?></b> </p>
           
             <form action="/user" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn btn-danger">Выйти</button>
            </form>
        <?php else: ?>
           <?php header('Location: /user/auth');?>
        <?php endif; ?>

    
        
        
    </div>

  
</body>
</html>

