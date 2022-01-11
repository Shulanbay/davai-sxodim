<?php
    if($_COOKIE['login'] == ''){
        header('Location: /reg.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HEAD -->
    <?php 
        $website_title = "Добавление статьи";
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
                <h4>Добавление статьи</h4> 
                <form action="" method="POST">
                    <label for="title">Заголовок статьи</label>
                    <input type="text" name="title" id="title" class="form-control">
                    
                    <label for="intro">Интро статьи</label>
                    <textarea name="intro" id="intro" class="form-control"></textarea>

                    <label for="text">Текст статьи</label>
                    <textarea name="text" id="text" class="form-control"></textarea>


                    <div class="alert alert-danger mt-2" id="errorBlock"></div>

                    <button type="button" id="article_send" class="btn btn-success mt-5">
                        Добавить
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
        $('#article_send').click(function(){
            var title = $('#title').val();
            var intro = $('#intro').val();
            var text = $('#text').val();

            $.ajax({
                url:'ajax/add_article.php',
                type:'POST',
                cache: false,
                data: {'title' : title, 'intro' : intro, 'text' : text},
                dataType: 'html',
                success: function(data){
                    if(data == 'Готово'){
                        $('#article_send').text('Все готово');
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