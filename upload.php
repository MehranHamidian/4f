<?php session_start() //start session ?>

<?php
    //check if a file was uploaded without errors
    if(isset($_FILES['pattern']) && $_FILES['pattern']['error'] == 0){
        //---- validate MEME type -----
        
        //define allowed MIME types 
        $allowedTypes = ['image/png','image/jpeg'];

        $fileTmpPath = $_FILES['pattern']['tmp_name']; //path of file
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE); //open the file
        $memeType = finfo_file($fileInfo, $fileTmpPath); //the actual meme type of file
        finfo_close($fileInfo); //close the file

        //validate the MEME type
        if(!in_array($memeType, $allowedTypes)){
            $_SESSION["errorsUploadPattern"] = "Invalide file type, only \"png\" and \"jpeg\" file allowedl.";
            header("Location:/index.php");
            exit();        
        }

        //---- validate file size ----
        //define Max size for upload
        $MAX_FILE_SIZE = 1024 * 1024 * 5; //5MB
        if(filesize($fileTmpPath) > $MAX_FILE_SIZE){
            $_SESSION["errorsUploadPattern"] = "File is to big, max allowed file size is *5MB*.";
            header("Location:/index.php");
            exit();
        }

    }else{
        $_SESSION["errorsUploadPattern"] = "No file uploaded";
        header('Location:/index.php');
        exit();
    }

?>