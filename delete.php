<?php
require 'db.php';

$id_filme = $_GET['id_filme']; 
$stmt = $pdo->prepare("DELETE FROM filmes WHERE id_filme = ?");
$stmt->execute([$id_filme]);

header('Location: index.php');
exit;
?>
