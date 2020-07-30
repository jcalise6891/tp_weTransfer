<?php
session_start();
if (isset($_GET['page']) && $_GET['page'] == 'download'){
    require_once('./assets/php/download.php');
}
else{
    ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="shortcut icon" href="#" />

        <link rel="stylesheet" href="./assets/css/style.css">
        <script src="./assets/js/script.js" defer></script>
    </head>
    <body>
        <div class="main h-100 w-100" id="dropZone">
        </div>
            <div class="bg-dark d-flex flex-column h-100 justify-content-center">
                <div class="container">
                    <div class="col-12 text-center mx-auto pb-5">
                    <h1>WeTransferPerso</h1>
                    </div>
                </div>
                <div class="bg-m_blue container py-5">
                    <div class="col-md-8 col-12 mx-auto flex-column">
                        <?php
                        require_once('./assets/php/file.php');
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>

<?php
}
?>