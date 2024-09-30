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
        //Verifica seos dados foram enviados via GET*/
        if (isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['email'])  && isset($_GET['curso'])) {
            //Captura os dados enviados pelo formulário*/
            $nome = htmlspecialchars($_GET['nome']);
            $idade = htmlspecialchars($_GET['idade']);
            $email = htmlspecialchars($_GET['email']);
            $curso = htmlspecialchars($_GET['curso']);

            //Exibe os dados capturados*/
            echo "<h2>Informações Recebidas:</h2>";
            echo "<p><strong>Nome:</strong> ". $nome . "</p>";
            echo "<p><strong>Idade:</strong> ". $idade. "</p>";
            echo "<p><strong>E-mail:</strong> ". $email . "</p>";
            echo "<p><strong>Curso:</strong> ". $curso . "</p>";
            //Verifica se a variável $pdo, que deve ser uma instância e PDO, está definida e é válida
            //prepara uma consulta sql para selecionar as colunas 'id' e 'nome' da tabea 'usario'
            $stmt = $pdo->prepare("insert into mensagens (nome, email, mensagem) values ('$nome',  '$idade' '$email','$curso');");

            //executa a consulta preparada
            $stmt->execute();
        } else {
            echo "Nenhum dado foi encontrado.";
        }
<?php
class Database {
    private $pdo;
    private $host;
    private $db;
    private $user;
    private $pass;

    // define as configurações do banco de dados escola_sql
    public function __construct($host, $db, $user, $pass, $port = 3307) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port; 
    }

    // conexao ao banco de dados
    public function connect() {
        try {
            //instância de PDO para MySQL
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8", $this->user, $this->pass);
            // modo de erro do PDO 
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexão com o banco de dados MySQL realizada com sucesso!<br>";
        } catch (PDOException $e) {
            // mensagem para caso de erro na conexao
            echo "Erro na conexão com o banco de dados MySQL: " . $e->getMessage() . "<br>";
        }
    }

    // retorna a instância PDO
    public function getConnection() {
        return $this->pdo;
    }
}

