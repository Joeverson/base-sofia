<?php
echo SESSION::user('pass');

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .title{
            position: absolute;
            width: 60%;
            left: 20%;
            top:10%;
            font-size: 2cm;
        }
    </style>
</head>
<body>
    <div class="title">
        <input type="text" name="user" value="askdaolskdmaskdmasld"/>
        <input type="password" name="pass"/>
    </div>
</body>
</html>