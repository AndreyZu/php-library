<?php

function filter ($data) {
    return mysqli_real_escape_string($GLOBALS['link'], htmlentities(trim($data)));
}

function addBook ($title, $author, $pubyear) {
    $sql = "INSERT INTO books (title, author, pubyear) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['link'], $sql);
    mysqli_stmt_bind_param($stmt,"ssi", $title, $author, $pubyear);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}


function updateBook ($id, $title, $author, $pubyear) {
    $sql = "UPDATE books SET title=?, author=?, pubyear=? WHERE id=?";
    $stmt = mysqli_prepare($GLOBALS['link'], $sql);
    mysqli_stmt_bind_param($stmt,"ssii", $title, $author, $pubyear, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    findBook($title);
    return true;
}


function showBooks () {
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['link'], $sql);

    echo "
        <table class='list'>
        <tr class='list__row'>
            <th class='list__column'>№</th>
            <th class='list__column'>Название</th>
            <th class='list__column'>Автор</th>
            <th class='list__column'>Год издания</th>
        </tr>
    ";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $pubyear = $row['pubyear'];

        echo "
            <tr class='list__row'>
                <td class='list__column'>$id</td>
                <td class='list__column'>$title</td>
                <td class='list__column'>$author</td>
                <td class='list__column'>$pubyear</td>
            </tr>
        ";
    }
    echo "</table>";

    return true;
}


function findBook ($title) {
    $sql = "SELECT * FROM books WHERE title = '$title'";
    $result = mysqli_query($GLOBALS['link'], $sql);

    echo "
        <table class='list'>
        <tr class='list__row'>
            <th class='list__column'>№</th>
            <th class='list__column'>Название</th>
            <th class='list__column'>Автор</th>
            <th class='list__column'>Год издания</th>
        </tr>
    ";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $pubyear = $row['pubyear'];

        echo "
            <tr class='list__row'>
                <td class='list__column'>$id</td>
                <td class='list__column'>$title</td>
                <td class='list__column'>$author</td>
                <td class='list__column'>$pubyear</td>
            </tr>
        ";
    }
    echo "</table>";

    if(isset($id)) {
        return $id;
    }
    else {
        return false;
    }
}

function editBook ($id) {
    if (isset($id) && !empty($id)) {
        echo '
            <h2>Редактирование книги</h2>
            <form class="form" action="" method="post">
                <fieldset class="form__fieldset">
                    <legend class="form__legend">Редактирование книги</legend>
                    <input class="hidden" type="text" name="edit-id" value="'.$id.'">
                    <input class="form__input" type="text" name="edit-title" placeholder="Название">
                    <input class="form__input" type="text" name="edit-author" placeholder="Автор">
                    <input class="form__input" type="text" name="edit-pubyear" placeholder="Год издания">
                    <input class="form__button" type="submit" value="Сохранить изменения">
                </fieldset>
            </form>
        ';
        return true;
    }
    else {
        return false;
    }
}