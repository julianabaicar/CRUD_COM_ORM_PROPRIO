<?php

    $id = $_POST['id'] ?? false ;

    if (! $id) 
    {
        header('Location: /list_Players.php');
    }

    $jogadores = json_decode(file_get_contents('players.faker.json'), JSON_OBJECT_AS_ARRAY);
    $jogadorSelecionado = null;
    foreach ($jogadores as $jogador) {
        if ($jogador['id'] == $id) {
            $jogadorSelecionado = $jogador;
            break;
        }
    }


    $template = file_get_contents('../static_templates/index.template.html');

    $templateForm = file_get_contents('../static_templates/form_PlayerTemplate.html');
    $templateForm = str_replace('{{ID}}', $jogadorSelecionado['id'], $templateForm);
    $templateForm = str_replace('{{NOME}}', $jogadorSelecionado['nome'], $templateForm);
    $templateForm = str_replace('{{EMAIL}}', $jogadorSelecionado['email'], $templateForm);
    $templateForm = str_replace('{{USERNAME}}', $jogadorSelecionado['username'], $templateForm);
    $templateForm = str_replace('{{SUBMIT}}', 'EDITAR', $templateForm);
    $templateForm = str_replace('{{ACTION}}', '/actions/updatePlayer.php', $templateForm);
    $templateForm = str_replace('{{METHOD}}', 'POST', $templateForm);



    $template = str_replace('{{CONTEUDO_PAGINA}}', $templateForm, $template);
    echo $template;