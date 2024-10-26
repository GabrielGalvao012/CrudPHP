<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM filmes");
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listar Filmes</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9fc;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      margin: 0;
    }

    h1 {
      color: #4a4a8b;
    }

    a {
      color: #4a4a8b;
      text-decoration: none;
      font-weight: bold;
      margin-bottom: 15px;
    }

    a:hover {
      text-decoration: underline;
    }

    table {
      width: 100%;
      max-width: 800px;
      border-collapse: collapse;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      margin-top: 20px;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
    }

    th {
      background-color: #4a4a8b;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f4f4f9;
    }

    tr:hover {
      background-color: #e8e8f2;
    }

    td {
      color: #333;
      font-size: 14px;
    }

    td a {
      color: #4a4a8b;
      font-weight: bold;
      margin-right: 10px;
    }

    td a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <h1>Filmes</h1>
  <a href="create.php">Adicionar Novo Filme</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Gênero</th>
      <th>Ano de Lançamento</th>
      <th>Duração (minutos)</th>
      <th>Sinopse</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($filmes as $filme): ?>
      <tr>
        <td><?= $filme['id_filme'] ?></td>
        <td><?= htmlspecialchars($filme['titulo']) ?></td>
        <td><?= htmlspecialchars($filme['genero']) ?></td>
        <td><?= htmlspecialchars($filme['ano_lancamento']) ?></td>
        <td><?= htmlspecialchars($filme['duracao_minutos']) ?></td>
        <td><?= nl2br(htmlspecialchars($filme['sinopse'])) ?></td>
        <td>
          <a href="edit.php?id_filme=<?= $filme['id_filme'] ?>">Editar</a>
          <a href="delete.php?id_filme=<?= $filme['id_filme'] ?>" onclick="return confirm('Tem certeza que deseja deletar este filme?')">Deletar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
