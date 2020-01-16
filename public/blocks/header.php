<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm sticky-top">
  <h5 class="my-0 mr-md-auto font-weight-normal">Сокра.тим</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="/contact">Контакты</a>
    
 
    <?php
        if (!isset($_COOKIE['login'])):
    ?>
    <a class="btn btn-outline-primary mr-2 mb-2" href="/user/auth">Войти</a>
    <a class="btn btn-outline-primary mb-2" href="/user/reg">Регистрация</a>
    <?php
        else:
    ?>
    <a class="btn btn-outline-primary mb-2" href="/user">Кабинет пользователя</a>
    <button class="btn btn-danger mb-2" id="exit_btn_ok">Выйти</button>
    <?php
        endif;
    ?>
  </nav>
  
</div>