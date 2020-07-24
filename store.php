<?php

require 'functions.php';
require 'database.php';

$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year = $_POST['year'];

$statement = $pdo->prepare("INSERT INTO `books` VALUES (NULL, :title, :author, :publisher, :publish_year, NOW(), NULL)");

$statement->bindParam(':title', $title);
$statement->bindParam(':author', $author);
$statement->bindParam(':publisher', $publisher);
$statement->bindParam(':publish_year', $year);

$statement->execute();

header("Location: index.php?success=create");
