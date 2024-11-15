<?php

session_start();
session_destroy();
include 'conexao.php';

header('Location: index.php'); 
exit;
?>
