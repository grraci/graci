<?php
@session_start();

if (isset($_SESSION['user']))
    header('Location: main.php');

if ($_POST['user'] && $_POST['pass']) {
    $pUser = $_POST['user'];
    $pPass = sha1($_POST['pass']);
    $fp = @fopen('data/users.txt', 'r');
    if ($fp) {
        while (($line = fgets($fp)) !== FALSE) {
            $data = explode('|', $line);
            if ($data[1] === $pUser && $data[2] === $pPass) {
                $_SESSION['user'] = $pUser;
                fclose($fp);
                header('Location: main.php');
            }
        }
        fclose($fp);
        echo '<p>Usuário não encontrado ou senha inválida</p>';
    }
    else echo '<p>Erro ao abrir o arquivo</p>';
}

include 'static/login.html';
