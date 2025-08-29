<?php
// Detalhes do servidor Azure SQL
$serverName = "aulas-jojo.database.windows.net"; // Ex: meuservidor-php-2025.database.windows.net
$connectionOptions = array(
    "Database" => "ex01",       // Ex: db_clientes_app
    "Uid" => "IFSP",             // Ex: admin_php
    "PWD" => ""                 // ta sem senha pra eu não me auto-doxxar
);

try {
    // Estabelece a conexão usando o driver SQLSRV com PDO
    $conn = new PDO("sqlsrv:server = $serverName; Database = " . $connectionOptions['Database'], $connectionOptions['Uid'], $connectionOptions['PWD']);
    
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem e encerra o script
    die("Erro na conexão: " . $e->getMessage());
}
?>