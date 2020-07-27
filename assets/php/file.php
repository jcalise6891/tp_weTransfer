    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="userfile[]" value="" multiple="">
    <input type="submit" name ="submit" value="Upload">
    </form>

    <?php        
        require_once('function.php');
        if(isset($_FILES['userfile']))
        {
            $file_array = reArrayFiles($_FILES['userfile']);
            pre_r($file_array);
            for ($i=0; $i <count($file_array) ; $i++) { 
                if($file_array[$i]['error']){
                    ?>
                    <div class="alert alert-danger">
                    <?php
                        echo $phpFileUploadErrors[$file_array[$i]['error']];
                    ?>
                    </div>
                    <?php
                }
            }
        }
    ?>
