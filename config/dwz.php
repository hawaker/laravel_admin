<?php

return [
    "debug" => true,
    "loginTitle" => "登录超时,请登录",
    "loginUrl" => "login_dialog.html",
    "keys" => [
        "statusCode" => "statusCode",
        "message" => "message",
    ],
    "pageInfo" => [
        "pageNum" => "page",
        "numPerPage" => "numPerPage",
        "orderField" => "orderField",
        "orderDirection" => "orderDirection"
    ],
    "callback" => "
        function () {
            initEnv();
            $('#themeList').theme({themeBase: 'themes'});
            // themeBase 相对于index页面的主题base路径
        }",
    "ui" => [
        "hideMode" => 'offsets'
    ],
    "statusCode" => [
        'ok' => '200',
        'error' => ' 300',
        'timeout' => '301'
    ],
];
