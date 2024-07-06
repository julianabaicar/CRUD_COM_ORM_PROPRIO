<?php

    $jogadores = json_decode(file_get_contents(__DIR__.'/players.faker.json'), JSON_OBJECT_AS_ARRAY);

    $template = file_get_contents('../static_templates/index.template.html');
    $tabelaListaJogadores = file_get_contents('../static_templates/tablePlayerTemplate.html');

    $templateLinha = file_get_contents('../static_templates/Lines_tablePlayerTemplate.html');
    $templateLinhasProcessado = '';
    foreach ($jogadores as $jogador) {
        $templateLinhaProcessado = str_replace('{{ID}}', $jogador['id'], $templateLinha);
        $templateLinhaProcessado = str_replace('{{NOME}}', $jogador['nome'], $templateLinhaProcessado);
        $templateLinhaProcessado = str_replace('{{USERNAME}}', $jogador['username'], $templateLinhaProcessado);
        $templateLinhaProcessado = str_replace('{{EMAIL}}', $jogador['email'], $templateLinhaProcessado);
        $templateLinhasProcessado .= $templateLinhaProcessado;
    }

    // a troca da linha estatica pelas linhas dos usarios do array
    $tabelaListaJogadores = str_replace('{{LINHAS_TABELA}}', $templateLinhasProcessado, $tabelaListaJogadores);
    $template = str_replace('{{CONTEUDO_PAGINA}}', $tabelaListaJogadores, $template);

    echo $template;