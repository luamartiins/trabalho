<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<h2>Cadastro</h2>
        <form action="db.php" method="GET">

            <input type="text" id="nome" name="nome" placeholder="Nome" required><br><br> 
            <input type="text" id="idade" name="idade" placeholder="Idade" required><br><br> 
            <input type="text" id="email" name="email" placeholder="Email" required><br><br> 
            <input type="text" id="curso" name="curso" placeholder="Curso" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>