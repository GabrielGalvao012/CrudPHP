<?php
require 'db.php';

$id_filme = $_GET['id_filme']; // Usando o campo 'id_filme' da tabela
$stmt = $pdo->prepare("SELECT * FROM filmes WHERE id_filme = ?");
$stmt->execute([$id_filme]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
  die("Filme não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $genero = $_POST['genero'];
  $ano_lancamento = $_POST['ano_lancamento'];
  $duracao_minutos = $_POST['duracao_minutos'];
  $sinopse = $_POST['sinopse'];

  $stmt = $pdo->prepare("UPDATE filmes SET titulo = ?, genero = ?, ano_lancamento = ?, duracao_minutos = ?, sinopse = ? WHERE id_filme = ?");
  $stmt->execute([$titulo, $genero, $ano_lancamento, $duracao_minutos, $sinopse, $id_filme]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Filme</title>
  <style> 

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
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

form {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  padding: 20px;
  width: 100%;
}

label {
  color: #333;
  display: block;
  font-weight: bold;
  margin-top: 10px;
}

input[type="text"],
input[type="number"],
textarea {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
  width: 100%;
  margin-top: 5px;
  font-size: 14px;
}

textarea {
  resize: vertical;
  min-height: 80px;
}

button[type="submit"] {
  background-color: #4a4a8b;
  border: none;
  border-radius: 4px;
  color: white;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  margin-top: 15px;
  padding: 10px 20px;
  width: 100%;
  transition: background-color 0.3s;
}

button[type="submit"]:hover {
  background-color: #3b3b6e;
}

a {
  color: #4a4a8b;
  display: inline-block;
  margin-top: 15px;
  text-align: center;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
</head>

<body>
  <h1>Editar Filme</h1>
  <form method="POST" action="">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($filme['titulo']) ?>" required><br>

    <label for="genero">Gênero:</label>
    <input type="text" name="genero" id="genero" value="<?= htmlspecialchars($filme['genero']) ?>" required><br>

    <label for="ano_lancamento">Ano de Lançamento:</label>
    <input type="number" name="ano_lancamento" id="ano_lancamento" value="<?= htmlspecialchars($filme['ano_lancamento']) ?>" required><br>

    <label for="duracao_minutos">Duração (minutos):</label>
    <input type="number" name="duracao_minutos" id="duracao_minutos" value="<?= htmlspecialchars($filme['duracao_minutos']) ?>" required><br>

    <label for="sinopse">Sinopse:</label>
    <textarea name="sinopse" id="sinopse" required><?= htmlspecialchars($filme['sinopse']) ?></textarea><br>

    <button type="submit">Atualizar Filme</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>
