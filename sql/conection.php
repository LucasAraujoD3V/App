<?php
// Conectar ao banco de dados (substitua essas informações pelos seus próprios detalhes)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar o login
    $sql = "SELECT * FROM sua_tabela WHERE nome = '$nome' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verificar se o login é válido
    if ($result->num_rows > 0) {
        // Login bem-sucedido
        echo "Login bem-sucedido!";
    } else {
        // Login inválido
        echo "Nome de usuário ou senha incorretos.";
    }
}

// Fechar a conexão
$conn->close();
?>