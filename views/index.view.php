<html lang="ro">
<head>
    <title>Librarie Stagiu</title>
    <?php require "stylesheets.php";?>
</head>
<body>
<div class="container">

    <br>
    <div class="col-md-12">
        <h1 class="h1">Librarie</h1>
    </div>
    <div class="col-md-12 text-right">
        <a class="btn btn-success" href="/create">Creaza o carte</a>
    </div>
    <br>
    <?php if(isset($_GET['success'])):?>
        <div class="col-md-12">
            <p class="alert-success">
                <?php switch($_GET['success']){
                    case "create":
                        echo "Ai adaugat o carte noua!";
                        break;
                    case "update":
                        echo "Ai editat o carte!";
                        break;
                    case "delete":
                        echo "Ai sters o carte!";
                        break;
                    default:
                        break;
                }?>
            </p>
        </div>
    <?php endif;?>

    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Titlu</th>
                <th>Autor</th>
                <th>Editura</th>
                <th>An</th>
                <th>Data Adaugare</th>
                <th>Actiuni</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($books as $book):?>
                <tr>
                    <td><?php echo $book->id;?></td>
                    <td><?php echo $book->title;?></td>
                    <td><?php echo $book->author_name;?></td>
                    <td><?php echo $book->publisher_name;?></td>
                    <td><?php echo $book->publish_year;?></td>
                    <td><?php echo $book->created_at;?></td>
                    <td>
                        <a href="/edit?id=<?php echo $book->id;?>">Editeaza</a> |
                        <a href="/delete?id=<?php echo $book->id;?>">Sterge</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>