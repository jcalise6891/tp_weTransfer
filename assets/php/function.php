<?php

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

function zipFiles($file_post,$error){

    // echo 'En cours de zip';
    $file_count = count($file_post);
    $zip = new ZipArchive();

    $zip_name = dirname(__DIR__,2)."/upload/".time().'.zip';
    if($zip->open($zip_name, ZipArchive::CREATE) !== TRUE){
        $error .= "Cannot create zip file";
    }

    for ($i=0; $i < $file_count ; $i++) { 

        $zip->addFile($file_post[$i]['tmp_name'],$file_post[$i]['name']);
    }
    $zip->close();
}

?>