<?php
    $title = NULL;
    $author = NULL;
    $pubyear = NULL;
    $id = NULL;
    $msg_string = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST["find-book"])) {

            $title = filter($_POST["find-book"]);

            $id = findBook($title);
            if ($id) {
                $msg_string = "<p class='message message_success'>Книга выбрана</p>";
                editBook($id);
            }
            else {
                $msg_string = "<p class='message message_error'>При поиске возникла ошибка</p>";
            }
        }
        else if (!empty($_POST["edit-id"]) && !empty($_POST["edit-title"]) && !empty($_POST['edit-author']) && !empty($_POST['edit-pubyear'])) {

            $id = (int)filter($_POST["edit-id"]);
            $title = filter($_POST["edit-title"]);
            $author = filter($_POST["edit-author"]);
            $pubyear = (int)filter($_POST["edit-pubyear"]);

            if (updateBook($id, $title, $author, $pubyear)) {
                $msg_string = "<p class='message message_success'>Информация обновлена</p>";
            }
            else {
                $msg_string = "<p class='message message_error'>При сохранении возникла ошибка</p>";
            }
        }
        else if (!empty($_POST["add-title"]) && !empty($_POST['add-author']) && !empty($_POST['add-pubyear'])){

            $title = filter($_POST["add-title"]);
            $author = filter($_POST["add-author"]);
            $pubyear = (int)filter($_POST["add-pubyear"]);

            if (addBook($title, $author, $pubyear)) {
                $msg_string = "<p class='message message_success'>Книга добавлен</p>";
            }
            else {
                $msg_string = "<p class='message message_error'>При добавлении книги возникла ошибка</p>";
            }
        }
        else {
            $msg_string = "<p class='message message_error'>Заполните все поля</p>";
        }
    }