<?php
session_start();
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group  d-flex flex-column">
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
require_once('function.php');

if(isset($_POST['submitMail'])){
    var_dump($_SESSION);
    echo $_SESSION['zipName'];
    $zip_name = $_SESSION['zipName'];
    $m_destmail = $_POST['emailDest'];
    $m_expmail  = $_POST['emailExp'];
    $m_object   = $_POST['object'];

    $temp_path = explode('/',$_SERVER['HTTP_REFERER'],-1);

    for($i = 0; $i < count($temp_path);$i++){
        $string .= $temp_path[$i].'/';
    }

    // $m_content = '<html><a href='.$string.'upload/'.$zip_name.'>Download File</a></html>';

    $m_content = '<html><a href='.$string.'index.php?page=download&id='.$zip_name.'>Download File</a></html>';

    // $m_content = '<html><a href='.$string.'download/'.$zip_name.'>Download File</a></html>';

    sendMail($m_expmail,$m_destmail,$m_object,$m_content);
}
?>