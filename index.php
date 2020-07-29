<?php
session_start();
if (isset($_GET['page']) && $_GET['page'] == 'download'){
    require_once('./assets/php/download.php');
}
else{
    ?>

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
        <div class="bg-light container py-5">
            <div class="col-md-5 col-12 mx-auto flex-column">
                <?php
                require_once('./assets/php/file.php');
                echo '
                </div>
                <div class="col-md-5 col-12 mx-auto mb-3 pb-3">';
           
                require_once('./assets/php/mail.php');
                ?>
            </div>
        </div>
    </div>

</body>
</html>

<?php
}
?>