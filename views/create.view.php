<html>
    <head>
        <title>Creaza o carte</title>
        <?php require "stylesheets.php";?>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <form action="/store" method="POST" >
                    <label for="title">Titlu</label>
                    <input type="text" id="titlu" name="title"/>
                    <label for="author">Autor</label>
                    <input type="text" id="author" name="author"/>
                    <label for="publisher">Editura</label>
                    <input type="text" id="publisher" name="publisher"/>
                    <label for="year">An publicare</label>
                    <input type="text" id="year" name="year"/>
                    <input type="submit" value="Salveaza"/>
                </form>
            </div>
        </div>
    </body>
</html>