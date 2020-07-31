<?php

echo json_encode($_POST);
    // $error = "";
    // var_dump($_FILES);
//     require_once('function.php');
//     if($_FILES['userfile']['error'][0] != 4){
        
//         $file_array = reArrayFiles($_FILES['userfile']);
       

//         $zip_name = zipFiles($file_array,$error);        
        
//         if(isset($_POST['submitMail'])){
//             $m_destmail = $_POST['emailDest'];
//             $m_expmail  = $_POST['emailExp'];
//             $m_object   = $_POST['object'];
    
//             $temp_path = explode('/',$_SERVER['HTTP_REFERER'],-1);
    
//             for($i = 0; $i < count($temp_path);$i++){
//                 $string .= $temp_path[$i].'/';
//             }
    
//             // $m_content = '<html><a href='.$string.'upload/'.$zip_name.'>Download File</a></html>';
    
//             // $m_content = '<html><a href='.$string.'index.php?page=download&id='.$zip_name.'>Download File</a></html>';
    
//             $m_content = '<html><a href='.$string.'download/'.$zip_name.'>Download File</a></html>';
    
//             sendMail($m_expmail,$m_destmail,$m_object,$m_content);
//         }
//     }
//     // else{
//     //     $file_array = reArrayFiles($_FILES['userfile']);
//     //     for ($i=0; $i <count($file_array) ; $i++) { 
//     //         if($file_array[$i]['error']){
//                 ?>
             <!--        <div class="alert alert-danger">
//                         <?php
//                             // echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
//                         ?>
//                     </div>
//             -->
                 <?php
//     //         }
//     //     }
//     // }

    
// ?>