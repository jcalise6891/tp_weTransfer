<?php
session_start();
?>
    
<form class="py-5 d-flex flex-column justify-content-around"name="zip" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <?php echo $error; ?>
    <input name="MAX_FILE_SIZE" value="10485760" type="hidden">
    <input class="form-control-file" type="file" name="userfile[]" value="" multiple="" onchange="handleFiles(this.files)">
    <!-- <input type="submit" name ="submitFichier" value="Upload"> -->
<!-- </form>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group  d-flex flex-column"> -->
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

<?php
    $error = "";
    
    require_once('function.php');
    if($_FILES['userfile']['error'][0] != 4){
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

        $zip_name = zipFiles($file_array,$error);        
        
        if(isset($_POST['submitMail'])){
            $m_destmail = $_POST['emailDest'];
            $m_expmail  = $_POST['emailExp'];
            $m_object   = $_POST['object'];
    
            $temp_path = explode('/',$_SERVER['HTTP_REFERER'],-1);
    
            for($i = 0; $i < count($temp_path);$i++){
                $string .= $temp_path[$i].'/';
            }
    
            // $m_content = '<html><a href='.$string.'upload/'.$zip_name.'>Download File</a></html>';
    
            // $m_content = '<html><a href='.$string.'index.php?page=download&id='.$zip_name.'>Download File</a></html>';
    
            $m_content = '<html><a href='.$string.'download/'.$zip_name.'>Download File</a></html>';
    
            sendMail($m_expmail,$m_destmail,$m_object,$m_content);
        }
    }
    else{
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
        }
    }

    
?>