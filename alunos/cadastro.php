
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $host = 'localhost';
        $db = 'escola_sql'; //banco de dados
        $user = 'luana';
        $pass = 'Luana1112';
        $port = 3307; // Porta MySQL 
        //arquivo da conexão da Database
        require_once 'db.php';
        // instância da conexao Database
        $database = new Database($host, $db, $user, $pass, $port);
        //estabelece a conexão
        $database->connect();
        //instância PDO para consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
        <?php
        //Verifica se os dados foram enviados*/
        if (isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['email'])  && isset($_GET['curso'])) {
            //Recebe dados enviados pelo form*/
            $nome = htmlspecialchars($_GET['nome']);
            $idade = htmlspecialchars($_GET['idade']);
            $email = htmlspecialchars($_GET['email']);
            $curso = htmlspecialchars($_GET['curso']);

            //Exibe os dados recebidos*/
            echo "<h2>Informações Recebidas:</h2>";
            echo "<p><strong>Nome:</strong> ". $nome . "</p>";
            echo "<p><strong>Idade:</strong> ". $idade. "</p>";
            echo "<p><strong>E-mail:</strong> ". $email . "</p>";
            echo "<p><strong>Curso:</strong> ". $curso . "</p>";
            //Verifica se a  $pdo é válida
            //prepara uma consulta sql para selecionar as colunas 'id' 'nome' 'idade' 'email' e 'curso' da tabea 'alunos'
            $stmt = $pdo->prepare("INSERT into alunos (nome, idade, email, curso) values ('$nome', '$idade', '$email','$curso');");

            //executa a consulta 
            $stmt->execute();
        } else {
            echo "Nenhum dado foi encontrado.";
        }