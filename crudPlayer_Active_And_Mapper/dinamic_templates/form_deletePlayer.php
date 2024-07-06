<?php
    print_r($_POST);

    $template = file_get_contents('../static_templates/index.template.html');

    $templateForm = file_get_contents('../static_templates/form_PlayerTemplate.html');
    $templateForm = str_replace('{{ID}}', '', $templateForm);
    $templateForm = str_replace('{{NOME}}', '', $templateForm);
    $templateForm = str_replace('{{EMAIL}}', '', $templateForm);
    $templateForm = str_replace('{{USERNAME}}', '', $templateForm);
    $templateForm = str_replace('{{SUBMIT}}', 'CADASTRAR', $templateForm);
    $templateForm = str_replace('{{ACTION}}', '/actions/deletePlayer.php', $templateForm);
    $templateForm = str_replace('{{METHOD}}', 'POST', $templateForm);



    $template = str_replace('{{CONTEUDO_PAGINA}}', $templateForm, $template);
    echo $template;