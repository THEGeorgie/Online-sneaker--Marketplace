<?php
    session_start();

    require_once 'connection.php';
    
    if(isset($_POST['uplaodPost'])) {
        // $file = $_FILES['Image'];

        // $fileName = $_FILES['Iamge']['name'];
        // $fileTmpName = $_FILES['Iamge']['tmp_name'];
        // $fileSize = $_FILES['Iamge']['size'];
        // $fileError = $_FILES['Iamge']['error'];
        // $fileType = $_FILES['Iamge']['type'];

        // $fileExt = explode('.', $fileName);
        // $fileActualExt = strtolower(end($fileExt));

        // $allowed + array('jpg', 'jpeg', 'png');

        // if(in_array($fileActualExt, $allowed)){
        //     if($fileError === 0){
        //         if($fileSize < 25000) {
                    
        //         }else {
        //             $_SESSION['error'] = 'Image too big!';
        //             header('location:create_post.php');
        //         }
        //     } else {
        //         $_SESSION['error'] = 'Error created while upload!';
        //         header('location:create_post.php');
        //     }
        // }else {
        //     $_SESSION['error'] = 'file type not Supported!';
        //     header('location:create_post.php');
        // }
        if(isset($_FILES['image'])){
            $filename = $_FILES['image'] ['name'];
            $filetmpname = $_FILES['image'] ['tmp_name'];
            $folder =  'upload/';

            move_uploaded_file($filetmpname, $folder.$filename);

            $querry = "INSERT INTO 'Snkr' (img) VALUES (:img)";           
            $stmt_post = $conn->prepare($query);
            $stmt_post->bindParam(':img', $filename);
            if($stmt_post->execute()) {
            
                $_SESSION['success'] = "Successfully created a post";

                header('location: home.php');
            }
            else{
                $_SESSION['error'] = "Unsuccessfully created a post";

                header('location: create_post.php');
            }
        }
        else{
            $_SESSION['error'] = "Unsuccessfully created a post";
            header('location: create_post.php');
        }
        
    }

?>
