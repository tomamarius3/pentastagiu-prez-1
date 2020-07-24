<?php

require 'functions.php';
require 'database.php';

$id = $_GET['id'];

$statement = $pdo->prepare("DELETE FROM `books` WHERE `id` = :id");

$statement->execute([
    'id' => $id
]);

header("Location: /index.php?success=delete");
