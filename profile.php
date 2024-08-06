<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Тархов В.Е.</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container nav_bar">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-7">
                    <div class="nav_text">Информация обо мне</div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="row my_photo"></div>
                    <div class="row">
                        <p class="title_photo">Тархов В.Е.</p>
                    </div>
                </div>
                <div class="col-4">
                    <p>
                        <strong>Тархов Владимир</strong>, студент третьего курса
                        ДВФУ направления "Математическое обеспечение и
                        администрирование информационных систем". На третьем
                        курсе понял, что нужно уже определяться с дальнейшим
                        направлением, поэтому с сентября начал активно изучать
                        язык программирования Java.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <p>
                        После нескольких месяцев самостоятельного изучения
                        увидел набор на программу АТБ Plug-In, в которой как раз
                        можно было попробовать себя Java-разработчиком. Я подал
                        заявку, прошел собеседование и тест, после чего меня
                        взяли. Я сам сначала этому не поверил. Тем не менее, уже
                        третий месяц я активно работаю в команде (таких же
                        прошедших ребят) над поставленным проектом. Совсем скоро
                        будет защита проекта. Надеемся, что потраченные усилия и
                        время оправдают себя, и мы успешно покажем наш продукт
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col_4 button_js">
                    <button id="myButton">Click me</button>
                    <p id="demo"></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col_12">
                    <h1 class="hello">
                        Привет, <?php echo $_COOKIE['User']; ?>
                    </h1>
                </div>
            </div>
            <div class="row">    
                <div class="col_12">
                    <form method="post" action="profile.php" enctype="multipart/form-data" name="upload">
                        <input class="form" type="text" name="title" placeholder="Заголовок вашего поста">
                        <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста..."></textarea>
                        <input type="file" name="file" /><br>
                        <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'root123', 'site');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    if(!empty($_FILES["file"])) {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
}
?>
