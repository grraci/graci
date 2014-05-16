<?php

if ($_POST['user'] && $_POST['pass']) {
    $users = 'data/users';
    $pUser = $_POST['user'];
    $pPass = sha1($_POST['pass']);
    if (($fp = fopen($users, (file_exists($users))? 'a+' : 'w+')) !== FALSE) {
        $next_id = 1;
        while (($line = fgets($fp)) !== FALSE) {
            $data = explode('|', $line);
            if ($data[1] === $pUser) die('<h1>Usuário já existe</h1>');
            if ($data[0] >= $next_id) $next_id = $data[0] + 1;
        }
        fprintf($fp, "%d|%s|%s|%d\n", $next_id, $pUser, $pPass, time());
        fclose($fp);
    } else die('<h1>Erro ao abrir o arquivo</h1>');
}
