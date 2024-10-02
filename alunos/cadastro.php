
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="style.css">
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
            echo "<h2>Cadastro realizado com sucesso</h2>";
            echo "<p><strong>Nome:</strong> ". $nome . "</p>";
            echo "<p><strong>Idade:</strong> ". $idade. "</p>";
            echo "<p><strong>E-mail:</strong> ". $email . "</p>";
            echo "<p><strong>Curso:</strong> ". $curso . "</p>";
            //Verifica se a  $pdo é válida
            //seleciona as colunas 'id' 'nome' 'idade' 'email' e 'curso' da tabela 'alunos'
            $stmt = $pdo->prepare("INSERT into alunos (nome, idade, email, curso) values ('$nome', '$idade', '$email','$curso');");

            //executa
            $stmt->execute();
        } else {
            echo "Nenhum dado encontrado.";
        }
        ?>

        <a href="index.php" class="btn-cadastrar">Voltar</a>

<style> /*permite a estlização fora da pagina style.css*/
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

.btn-cadastrar {
    display: block;
    text-align: center;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #EC407A;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn-cadastrar:hover {
    background-color: #D81B60;
}

</style>
