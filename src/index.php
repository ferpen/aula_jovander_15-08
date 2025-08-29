<?php
// Inclui o script de conexão com o banco de dados
require_once 'conexao.php';

try {
    // Prepara e executa a consulta SQL
    $sql = "SELECT Id_Cliente, Nome, Endereco, Cidade, Telefone FROM Clientes ORDER BY Nome";
    $stmt = $conn->query($sql);

    // Busca todos os resultados em um array associativo
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Em caso de erro na consulta, exibe a mensagem
    die("Erro ao executar a consulta: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; box-shadow: 0 2px 3px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        thead { background-color: #007bff; color: white; }
        tbody tr:nth-child(even) { background-color: #f2f2f2; }
        tbody tr:nth-child(odd) { background-color: #ffffff; }
        tbody tr:hover { background-color: #e2e2e2; }
    </style>
</head>
<body>

    <h1>📋 Lista de Clientes Cadastrados</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica se o array de clientes não está vazio
            if (count($clientes) > 0) {
                // Itera sobre o array de clientes e exibe cada um em uma linha da tabela
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($cliente['Id_Cliente']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['Nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['Endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['Cidade']) . "</td>";
                    echo "<td>" . htmlspecialchars($cliente['Telefone']) . "</td>";
                    echo "</tr>";
                }
            } else {
                // Mensagem exibida se não houver clientes
                echo "<tr><td colspan='5'>Nenhum cliente encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
<?php
// Fecha a conexão
$conn = null;
?>