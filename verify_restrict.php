<?php

// Inicia a sessão
if (!isset($_SESSION)){
    session_start();
}

// Verifica se não existe a variavel usuario na sessão
if(!isset($_SESSION["UserID"])){
    session_destroy();
    header("Location: index.php");
    exit();
}