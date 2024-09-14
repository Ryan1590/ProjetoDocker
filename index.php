<?php 
ob_start(); // Inicia o buffer de saída
header('location: src/pages/user/read.php');
ob_end_flush(); // Finaliza o buffer de saída e envia o conteúdo ao navegador ?>