<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
    <link rel="stylesheet" href="../css/style.css">
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
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<p class='success'>Cadastro deletado</p>"; /*mensagem de sucesso ao deletar*/ 
    } else {
        echo "<p class='erro'>Erro ao deletar o cadastro</p>"; /*mensagem de erro*/ 
    }
} else {
    echo "<p class='erro'>.</p>";
}
?>
<a href="index.php" class="botao-voltar">Voltar</a>

<style> /* style nao funcionou no css mesmo com o link*/ 
        body {
            font-family: Arial, sans-serif;
        }

        .botao-voltar {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #EC407A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .botao-voltar:hover {
            background-color: #D81B60;
            transform: translateY(-3px);
        }

        .botao-voltar:active {
            transform: translateY(1px);
        }

        .success {
            color: #D81B60;
            font-weight: bold;
        }

        .erro {
            color: #D81B60;
            font-weight: bold;
        }
    </style>