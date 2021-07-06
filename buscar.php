<?php
session_start();    
include('conexao.php');

$codigo_denuncia = mysqli_real_escape_string($conexao, $_POST['num_denuncia']);
$codigo = $_POST['num_denuncia'];
$query = "SELECT COUNT(1) FROM denuncia WHERE codigo = '{$codigo_denuncia}';";
$result = mysqli_query($conexao, $query);

if($result == 1){
    $_SESSION['encontrado'] = $codigo;
    header("location:relatorio.php");
    exit();
} else {
    $_SESSION['nao_encontrado'] = true;
    header('Location: index.php');
    exit();
}
$conexao->close();