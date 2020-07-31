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
        <video autoplay loop muted id="bgvid">
        <source src="./assets/video/bg-video.mp4" type="video/mp4">
        </video>
        <div class="main h-100 w-100" id="dropZone">
        </div>
            <div class="d-flex flex-column justify-content-center" id="page">
                <div class="container justify-content-start" id="titre">
                    <div class=" col-lg-4 col-md-8 col-12 text-center">
                    <h1>WeTransferPerso</h1>
                    </div>
                </div>
                <div class="container py-5" id="content">
                    <div class="col-lg-4 col-md-8 col-12 flex-column" id="cartouche">
                    <form id='formulaire' class="py-5 d-flex flex-column justify-content-around"name="zip" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo $error; ?>
                        <input name="MAX_FILE_SIZE" value="10485760" type="hidden">
                        <input class="form-control-file" type="file" name="userfile[]" value="" multiple="" onchange="handleFiles(this.files)">
                        <!-- <input type="submit" name ="submitFichier" value="Upload"> -->
                    <!-- </form>

                    <form action="" method="POST" class="form-group  d-flex flex-column"> -->
                        <label for="emailExp">Your Email address
                            <input type="email" class="form-control" name="emailExp" aria-describedby="emailHelp" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </label>
                        <label for="emailDest">Reciever Email address
                            <input type="email" class="form-control" name="emailDest" aria-describedby="emailHelp" required>
                        </label>
                        <label for="object">Object
                            <input type="text" name="object" class="form-control" id="" required>
                        </label>
                        <input class="align-self-center" id="sendMail" type="submit" name="submitMail" value="Envoyer">
                    </form>
                    </div>
                </div>
            </div>
    </body>
</html>

<?php
}
?>