<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel ="stylesheet" href="style.css">
</head>
<body>
<h2>Cadastro</h2>
        <form action="cadastro.php" method="GET">

            <input type="text" id="nome" name="nome" placeholder="Nome" required><br><br> 
            <input type="text" id="idade" name="idade" placeholder="Idade" required><br><br> 
            <input type="text" id="email" name="email" placeholder="Email" required><br><br> 
            <input type="text" id="curso" name="curso" placeholder="Curso" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
<style> /* style nao estava funcionando no css */
h2 {
    color: #D81B60;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #F8BBD0;
}

table th, table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #EC407A;
}

table th {
    background-color: #F48FB1;
    color: white;
}

table tr:nth-child(even) {
    background-color: #FCE4EC;
}

table tr:hover {
    background-color: #F06292;
    color: white;
}

.botao-cadastrar {
    display: block;
    text-align: center;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #EC407A;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.botao-cadastrar:hover {
    background-color: #D81B60;
}
.botao-excluir {
            display: inline-block;
            padding: 8px 15px;
            background-color: #F06292;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .botao-excluir:hover {
            background-color: #EC407A;
            transform: scale(1.05);
        }


        .botao-excluir:active {
            transform: scale(0.95);
        }
</style>
<?php 
    $host = 'localhost';
    $db = 'escola_sql';
    $user = 'luana';
    $pass = 'Luana1112';
    $port = 3307;
    require_once 'db.php';
    $database = new Database($host, $db, $user, $pass, $port);
    $database->connect();
    $pdo = $database->getConnection();
    $stmt = $pdo->query("SELECT * FROM alunos"); 
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2>Alunos Cadastrados</h2>
    <table border="2"> 
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>E-mail</th>
        <th>Curso</th>
        <th>Deletar</th>
    <?php foreach ($alunos as $aluno): ?>
    <tr>
        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
        <td><?php echo htmlspecialchars($aluno['idade']); ?></td>
        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
        <td><?php echo htmlspecialchars($aluno['curso']); ?></td>
        <td>
            <a href="deletar.php?id=<?php echo $aluno['id']; ?>" class="botao-excluir" onclick="return confirm('Deseja excluir este cadastro?');">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>