<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="bg d-flex h-100 align-items-center ">
        <div class="container py-5">
            <div class="row mx-auto mb-3 pb-3 flex-column justify-content-center align-items-center">
                <?php
                require_once('./assets/php/file.php');
                ?>
            </div>
            <div class="row mx-auto mb-3 pb-3 justify-content-center">
                <?php
                require_once('./assets/php/mail.php');
                ?>
            </div>
        </div>
    </div>

</body>
</html>