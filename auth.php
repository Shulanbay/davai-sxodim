<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HEAD -->
    <?php 
        $website_title = "Авторизация на сайте";
        include 'blocks/head.php'; 
    ?>
</head>
<body>
    <!-- HEADER -->
    <?php include 'blocks/header.php'; ?>

    <!-- Main Body -->
    <main class="container mt-5"> 
        <div class="row">
            <div class="col-md-8 mb-3"> 
                <!-- Проверка cookie -->
                <?php
                    if($_COOKIE['login'] == ''):
                ?>
                <h4>Форма авторизации</h4>
                <form action="" method="POST">
                    <label for="login">Логин</label>
                    <input type="login" name="login" id="login" class="form-control">

                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>

                    <button type="button" id="auth_user" class="btn btn-success mt-5">
                        Войти
                    </button>
                </form>
                <?php
                    else:
                ?>
                <h2><?=$_COOKIE['login']?></h2>
                <button class="btn btn-danger" id="exit_btn">Выйти</button>
                <?php
                    endif;
                ?>
            </div>
            <!-- ASIDE -->
            <?php include 'blocks/aside.php';?>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'blocks/footer.php'; ?>

    <script src="css/jquery.min.js"></script>

    <script>
        $('#errorBlock').hide();
        $('#exit_btn').click(function(){
            $.ajax({
                url:'ajax/exit.php',
                type:'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data){
                    document.location.reload(true);
                }
            });
        })

        $('#errorBlock').hide();
        $('#auth_user').click(function(){
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url:'ajax/auth.php',
                type:'POST',
                cache: false,
                data: {'login' : login, 'pass' : pass},
                dataType: 'html',
                success: function(data){
                    if(data == 'Готово'){
                        $('#auth_user').text('Готово');
                        $('#errorBlock').hide();
                        document.location.reload(true);
                    }else{
                        $('#errorBlock').show();
                        $('#errorBlock').text(data); 
                    }
                }
            });
        })
    </script>
</body>
</html>