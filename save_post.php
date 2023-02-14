<?php
    session_start();

    require_once 'connection.php';
    
    if(isset($_POST['submit'])) {
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

        $Image = file_get_contents( $_FILES['image']['tmp_name'] );
        $querry = "INSERT INTO 'Snkr' (img) VALUES (:img)";           
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':img', $Image);
        if($stmt->execute()) {
            
            $_SESSION['success'] = "Successfully created a post";

            header('location: home.php');
        }
    }

?>
