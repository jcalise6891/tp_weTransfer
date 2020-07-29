<?php
session_start();
?>
    
    <form class="d-flex justify-content-around"name="zip" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <?php echo $error; ?>
    <input type="file" name="userfile[]" value="" multiple="">
    <input type="submit" name ="submitFichier" value="Upload">
    </form>

    <?php
        $error = "";
        
        require_once('function.php');
        if(isset($_FILES['userfile'])){
            $file_array = reArrayFiles($_FILES['userfile']);
            for ($i=0; $i <count($file_array) ; $i++) { 
                if($file_array[$i]['error']){
                    ?>
                        <div class="alert alert-danger">
                            <?php
                                echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                            ?>
                        </div>
                    <?php
                }
                else{
                    ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                            ?>
                        </div>
                    <?php
                }
            }
            $_SESSION['zipName'] = zipFiles($file_array,$error);
            pre_r($_SESSION);           
        }
    ?>
