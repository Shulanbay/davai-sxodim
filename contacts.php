<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HEAD -->
    <?php 
        $website_title = "Контакты";
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
                <h4>Обратная связь</h4>
                <form action="" method="POST">
                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="mess">Сообщение</label>
                    <textarea name="mess" id="mess" class="form-control"></textarea>

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>

                    <button type="button" id="mess_send" class="btn btn-success mt-5">
                        Отправить сообщение
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
        $('#mess_send').click(function(){
            var name = $('#username').val();
            var email = $('#email').val();
            var mess = $('#mess').val();
         

            $.ajax({
                url:'ajax/mail.php',
                type:'POST',
                cache: false,
                data: {'username' : name, 'email' : email, 'mess' : mess},
                dataType: 'html',
                success: function(data){
                    if(data == 'Готово'){
                        $('#mess_send').text('Все готово');
                        $('#errorBlock').hide();
                        $('#username').val("");
                        $('#email').val("");
                        $('#mess').val("");
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