<!DOCTYPE html>
<html>
<head>
    <?php
        $website_title='Главная страница';
        require 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container">
        
        <?php

        $longValue = "";
        $shortValue = "";
        $errorMessage = "";
        $linksCount = count($data['links']);

        if (isset($_POST['longLink'])) $longValue = $_POST['longLink'];
        if (isset($_POST['shortLink'])) $shortValue = $_POST['shortLink'];
        if (isset($data['message'])) $errorMessage = $data['message'];

        ?>
            
    
            <div class="pricing-header  text-center">
                <h1 class="display-4 mt-5">Сокра.тим</h1>
                <p class="lead">Вам нужно сократить ссылку? Сейчас мы это сделаем</p>
            </div>
    
            <form action="/" method="POST">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                    <form class="form-signin">
                            
                            <input type="text" name="longLink" class="form-control" placeholder="Длинная ссылка" value="<?=$longValue?>" autofocus>
                       
                            <input type="text" name="shortLink" class="form-control" placeholder="Короткое название" value="<?=$shortValue?>"> <br>
                            
                            <?php if($errorMessage!=""): ?>
                            <div class="row justify-content-center mt-1">
                                <!-- here will be error message -->
                                <div class="alert alert-danger"  role="alert">
                                    <?=$errorMessage?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <button class="btn btn-lg btn-primary btn-block" >Уменьшить</button> 
     
                    </div>
                </div>
            </form> <br>
    
           <?php if ($linksCount == 0) :  ?>

            <div  class="row justify-content-center mt-2">
                  <div class='col-8'>

                      <div class="alert alert-info" role="alert">
                      <p>Вы еще не генерировали ссылок</p>
                      </div>
                      
                  </div>
                </div>
           

            <?else :?>

              <?php for($i = 0; $i < count($data['links']); $i++): ?>

                  
                <div  class="row justify-content-center mt-2">
                  <div class='col-8'>

                      <div class="alert alert-info" role="alert">
                      <h4>Короткая: <a href="/s/<?=$data['links'][$i]['shortlink']?>" target="_blank"><?=$_SERVER['SERVER_NAME'].'/s/'.$data['links'][$i]['shortlink']?></a></h4>
                              <hr class='my-4'>
                              <p><b>Длинная:</b> <a href="<?=$data['links'][$i]['longlink']?>" target="_blank"><?=$data['links'][$i]['longlink']?></a> </p>

                              <form action="/" method="post">
                                <input type="hidden" name="del_item" value="<?=$data['links'][$i]['id']?>">
                                <button class="btn btn-dark" type="submit">Удалить</button>
                            </form>
                      </div>
                      
                  </div>
                </div>
                    

                    
                       

              
                <?php endfor; ?>

           <?endif; ?>


    
    </div>

  
</body>
</html>