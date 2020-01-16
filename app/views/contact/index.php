<!DOCTYPE html>
<html>
<head>
    <?php
        $website_title='Контакты';
        require 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <?php
        $pname ='';
        $pemail ='';
        $page ='';
        $pmessage ='';
        $errormessage ='';
        if(isset($_POST['name'])) $pname = $_POST['name'];
        if(isset($_POST['email'])) $pemail = $_POST['email'];
        if(isset($_POST['age'])) $page = $_POST['age'];
        if(isset($_POST['message'])) $pmessage = $_POST['message'];
        if(isset($data['message'])) $errormessage = $data['message'];
    ?>

    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">

                    <h1>Контакты</h1>
                <p>Напишите нам, если у вас есть вопросы</p>
                <form action="/contact" method="post" class="form-group">
                    <input type="text" name="name" placeholder="Введите имя" class="form-control" value="<?=$pname?>"><br>
                    <input type="email" name="email" placeholder="Введите email" class="form-control" value="<?=$pemail?>"><br>
                    <input type="text" name="age" placeholder="Введите возраст" class="form-control" value="<?=$page?>"><br>
                    <textarea name="message" rows="8" placeholder="Введите само сообщение" class="form-control" value="<?=$pmessage?>"></textarea><br>
                    <?php if ($errormessage !='') : ?>
                     <div class="alert alert-danger" role="alert"><?=$errormessage?></div>
                    <?endif;?>
                    <button class="btn btn-primary" >Отправить</button>
                </form>

            </div>
        </div>

        
    </div>

  
</body>
</html>


