<?php
    // requires php5
    $fileName = 'pruebaT.jpg';//nombre del archivo
    //define('UPLOAD_DIR', "prueba");//nombre del archivo alternativo
    //if (isset($_POST['data'])) 
    //{ 
        $img = $_POST['data'];
        $img = str_replace('data:image/jpg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        //saving
        $data = base64_decode($img);
        //$file = UPLOAD_DIR . uniqid() . '.jpg'; --Nombre alternativo
        $success = file_put_contents($fileName, $data);
        print $success ? $file : 'Unable to save the file.';
    //} 
 ?>