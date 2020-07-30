<?php

require_once('./vendor/autoload.php');

$phpFileUploadErrors = array( // Attribue un code erreur
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded files exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded files exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk',
    8 => 'A PHP extension stopped the file upload',
);

// Methode pour afficher l'array $_FILES
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

//Methode pour réaranger l'array $_FILES 
function reArrayFiles($file_post){
    $file_array = array();
    $file_count = count($file_post['name']);
    $file_keys  = array_keys($file_post);

    for($i = 0; $i < $file_count;$i++){
        foreach($file_keys as $key){
            $file_array[$i][$key] = $file_post[$key][$i];
        }
    }
    
    return $file_array;
}

//Methode création de zip à partir de fichier POST / Retourne une chaîne de caractère avec le nom du fichier créer
function zipFiles($file_post,$error){

    $file_count = count($file_post);
    $zip = new ZipArchive();

    $zip_name = dirname(__DIR__,2)."\\assets\\upload\\".time().'.zip';
    if($zip->open($zip_name, ZipArchive::CREATE) !== TRUE){
        $error .= "Cannot create zip file";
    }
    for ($i=0; $i < $file_count ; $i++) { 

        $zip->addFile($file_post[$i]['tmp_name'],$file_post[$i]['name']);
    }
    $temp_zipName = explode("\\",$zip_name);    
    $zip->close(); 

    return end($temp_zipName);
}

//Methode de création et d'envoie d'email
function sendMail($m_adresseExp,$m_adresseDest,$m_object,$m_content){

    if($_SERVER['SERVER_NAME'] == 'localhost'){

        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 465))
            ->setUsername('9a060fbc2717cb')
            ->setPassword('9ed3f5e7c06994')
        ;
    }
    else{
        $transport = new Swift_SendmailTransport();
    }    
    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message($m_object))
        ->setFrom($m_adresseExp)
        ->setTo($m_adresseDest)
        ->setBody($m_content,'text/html')
    ;

    $result = $mailer->send($message);
    return $result;
}   

?>