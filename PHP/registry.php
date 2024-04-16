<?php
// Parâmetros de conexão com o PostgreSQL
$host = 'localhost'; // Altere para o endereço do seu servidor PostgreSQL
$dbname = 'users'; // Altere para o nome do seu banco de dados PostgreSQL
$username = 'postgres'; // Altere para o seu usuário do PostgreSQL
$password = '654321987'; // Altere para a sua senha do PostgreSQL

// Dados do formulário
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
try {
    // Conexão com o PostgreSQL usando PDO
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    
    // Habilitar exceções PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para inserir dados
    $sql = "INSERT INTO links (title, url, suffix) VALUES (:title, :url, :suffix)";

    // Preparar a consulta
    $stmt = $conn->prepare($sql);

    // Vincular parâmetros
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':suffix', $suffix);

    // Executar a consulta
    $stmt->execute();

    echo "Link criado com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao criar o link: " . $e->getMessage();
}

// Fechar a conexão
$conn = null;
?>
