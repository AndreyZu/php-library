<?php
    require_once "inc/header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Список книг</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Список книг</h1>
    <?php showBooks(); ?>
    <?php include_once "inc/left-menu.php"?>
</body>
</html>