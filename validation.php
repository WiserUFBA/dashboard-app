<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty(filter_input_array(INPUT_POST)) AND (empty(filter_input(INPUT_POST, "user"))) OR empty(filter_input(INPUT_POST, "pass"))) {
    header("Location: index.php"); exit;
}

// Configurações de sistema
$server = "localhost";
$username = "wiser-db";
$password = "b0t3c0@admin";

// Conecta ao servidor MySql
mysql_connect($server, $username, $password);
mysql_select_db("wiser-db") or trigger_error(mysql_error());

// Usuarios vindos do post
$usuario = mysql_real_escape_string(filter_input(INPUT_POST, "user"));
$senha = mysql_real_escape_string(filter_input(INPUT_POST, "pass"));

// Realiza a query no banco de dados
$sql_string =   "SELECT `id`, `name`, `level` FROM `usuarios` WHERE (`user` = '". $usuario ."')"
                ."AND (`pass` = '". sha1($senha) ."') LIMIT 1";
$sql_query = mysql_query($sql_string);

// Valida o usuario da senha
if(mysql_num_rows($sql_query) != 1){
    echo "Invalid Login!";
    //header("Location: index.php");
    //exit;
}
else{
    $result = mysql_fetch_assoc($sql_query);

    // Se a sessão não existir inicie
    if (!isset($_SESSION)){
        session_start ();
    }
    
    // Salva os dados do usuario da sessão
    $_SESSION["UserID"] = $result["id"];
    $_SESSION["UserName"] = $result["name"];
    $_SESSION["UserLevel"] = $result["level"];
    
    // Redireciona o usuario
    header("Location: dashboard.php");
    exit();
}