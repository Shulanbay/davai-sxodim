<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HEAD -->
    <?php 
        $website_title = "Registration page";
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
                <h4>Форма регистрации</h4>
                <form action="" method="POST">
                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="login">Логин</label>
                    <input type="login" name="login" id="login" class="form-control">

                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>

                    <button type="button" id="reg_user" class="btn btn-success mt-5">
                        Зарегистрироваться
                    </button>
                </form>
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
        $('#reg_user').click(function(){
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url:'ajax/reg.php',
                type:'POST',
                cache: false,
                data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
                dataType: 'html',
                success: function(data){
                    if(data == 'Готово'){
                        $('#reg_user').text('Все готово');
                        $('#errorBlock').hide();
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