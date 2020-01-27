<?php
    require_once "inc/header.php";
    require_once "inc/indb.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Редактирование книги</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Поиск книги</h1>
    <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset class="form__fieldset">
            <legend class="form__legend">Поиск книги</legend>
            <input class="form__input" type="text" name="find-book" placeholder="Название">
            <input class="form__button" type="submit" value="Найти книгу">
        </fieldset>
	</form>
    <?php echo $msg_string ?>
    <?php include_once "inc/left-menu.php"?>
</body>
</html>