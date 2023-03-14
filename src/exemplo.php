<?php
include_once(dirname(__FILE__) . '/gerarhtml.php');

$tpl = new \GerarHTML\gerarhtml();

/* DOCTYPE HTML5 */
echo $tpl->doctype();

/* HTML */
echo $tpl->html(
    $tpl->head(
        $tpl->meta(['charset' => 'utf8']),
        $tpl->meta([
            'http-equiv' => "X-UA-Compatible",
            'content' => 'IE=edge'
        ]),
        $tpl->meta([
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1.0'
        ]),
        $tpl->title('Exemplo')
    ),
    $tpl->body(
        $tpl->div(
            ['style' => 'font-size:12px;'],
            'Este é um exemplo de como usar a classe ',
            $tpl->span(
                ['style' => 'font-size:11px;font-weight:bold;'],
                'GerarHTML!'
            )
        )
    )
);
