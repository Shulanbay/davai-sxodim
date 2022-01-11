<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- HEAD -->
    <?php 
        $website_title = "Main page";
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
                <?php
                    require_once 'mysql_connect.php';

                    $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
                    $query = $pdo->query($sql);
                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                        echo "<h2>$row->title</h2>
                        <p>$row->intro</p>
                        <p><b>Автор: </b>$row->avtor</p>
                        <a href='news.php?id=$row->id' title='$row->title'>
                        <button class='btn btn-warning mb-5'>Прочитать больше</button>
                        </a>";
                    }
                ?>
            </div>
            <!-- ASIDE -->
            <?php include 'blocks/aside.php'; ?>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include 'blocks/footer.php'; ?>
</body>
</html>