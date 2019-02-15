<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">


        .header {
            height: 100px;
            width: 100%;
            background-color: brown;
        }

        .content{
            height: 500px;
            width: 100%;
            background-color: aliceblue;
        }


        .footer {
            height: 100px;
            width: 100%;
            background-color: aquamarine;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">HEADER</div>
    <div class="content"><?= $content ?></div>
    <div class="footer">FOOTER</div>

</div>
</body>
</html>