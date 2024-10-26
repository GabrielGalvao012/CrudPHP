<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $genero = $_POST['genero'];
  $ano_lancamento = $_POST['ano_lancamento'];
  $duracao_minutos = $_POST['duracao_minutos'];
  $sinopse = $_POST['sinopse'];

  $stmt = $pdo->prepare("INSERT INTO filmes (titulo, genero, ano_lancamento, duracao_minutos, sinopse) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$titulo, $genero, $ano_lancamento, $duracao_minutos, $sinopse]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Filme</title>
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
  <h1>Adicionar Filme</h1>
  <form method="POST" action="">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="genero">Gênero:</label>
    <input type="text" name="genero" id="genero" required>

    <label for="ano_lancamento">Ano de Lançamento:</label>
    <input type="number" name="ano_lancamento" id="ano_lancamento" required>

    <label for="duracao_minutos">Duração (minutos):</label>
    <input type="number" name="duracao_minutos" id="duracao_minutos" required>

    <label for="sinopse">Sinopse:</label>
    <textarea name="sinopse" id="sinopse" required></textarea>

    <button type="submit">Adicionar Filme</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>
