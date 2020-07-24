<?php

require 'functions.php';
require 'database.php';

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year = $_POST['year'];

$statement = $pdo->prepare("
    UPDATE `books` 
        SET 
            `title` = :title, 
            `author_name` = :author,
            `publisher_name` = :publisher, 
            `publish_year` = :publish_year, 
            `updated_at` = NOW()
        WHERE 
            `id` = :id
    ");

$statement->bindParam(':id', $id);
$statement->bindParam(':author', $author);
$statement->bindParam(':title', $title);
$statement->bindParam(':publisher', $publisher);
$statement->bindParam(':publish_year', $year);

$statement->execute();

header("Location: index.php?success=update");
