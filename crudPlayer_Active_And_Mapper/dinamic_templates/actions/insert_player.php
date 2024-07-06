<?php

    $jogador = 
    [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'id' => (int) rand(1, 1000),
        'created_at' => date('Y-m-d H-i-s')
    ];

    $jogadores = json_decode(file_get_contents('../players.faker.json'), JSON_OBJECT_AS_ARRAY);
    $jogadores[] = $jogador;

    file_put_contents('../players.faker.json', json_encode($jogadores));

    header('Location: /list_Players.php');
