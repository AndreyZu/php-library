<?php
$menu = [
    'index'=>'Посмотреть список книг',
    'add'=>'Добавить книгу',
    'edit'=>'Редактировать книгу'
];
?>

<aside class="left-menu">
    <h2 class="left-menu__header">Библиотека</h2>
    <nav class="left-menu__links">
        <?php
        foreach ($menu as $link => $text) {
            print_r("<a class='left-menu__link' href='$link.php'>$text</a>", 0);
        }
        ?>
    </nav>
</aside>