<?php 
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME','agenda_telefonica');

$conexao = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
