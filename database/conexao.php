<?php

const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "cadastro";

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if($conexao === false)
{
    die(mysqli_connect_error());
}
