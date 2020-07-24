<?php


class BookController
{

    public function index()
    {
        $pdo = DB::getInstance();
        $statement = $pdo->prepare("SELECT * FROM books");
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_CLASS, Book::class);

        loadView('index.view.php', ['books' => $books]);
    }

    public function create()
    {
        loadView('create.view.php');
    }

    public function store()
    {
        $pdo = DB::getInstance();

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

        header("Location: /?success=create");
    }

    public function edit()
    {
        $pdo = DB::getInstance();
        $statement = $pdo->prepare("SELECT * FROM `books` WHERE `id` = ?");
        $statement->execute([$_GET['id']]);
        $book = $statement->fetchAll(PDO::FETCH_CLASS, Book::class)[0];

        loadView('edit.view.php', ['book' => $book]);
    }

    public function update()
    {
        $pdo = DB::getInstance();

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

        header("Location: /?success=update");
    }

    public function delete()
    {
        $pdo = DB::getInstance();

        $id = $_GET['id'];
        $statement = $pdo->prepare("DELETE FROM `books` WHERE `id` = :id");
        $statement->execute([
            'id' => $id
        ]);

        header("Location: /?success=delete");
    }

}