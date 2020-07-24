<?php

    require "functions.php";
    require "database.php";

    $statement = $pdo->prepare("SELECT * FROM `books` WHERE `id` = ?");

    $statement->execute([$_GET['id']]);

    $book = $statement->fetch(PDO::FETCH_OBJ);

?>
<html>
<head>
    <title>Editeaza o carte</title>
    <?php require "stylesheets.php";?>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <form action="/update.php" method="POST" >
            <input type="hidden" name="id" value="<?php echo $book->id;?>"/>
            <label for="title">Titlu</label>
            <input type="text" id="titlu" name="title" value="<?php echo $book->title;?>"/>
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" value="<?php echo $book->author_name;?>"/>
            <label for="publisher">Editura</label>
            <input type="text" id="publisher" name="publisher" value="<?php echo $book->publisher_name;?>"/>
            <label for="year">An publicare</label>
            <input type="text" id="year" name="year" value="<?php echo $book->publish_year;?>"/>
            <input type="submit" value="Salveaza"/>
        </form>
    </div>
</div>
</body>
</html>