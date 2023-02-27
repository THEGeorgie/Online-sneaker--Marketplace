<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>【ＳｎｅａｋｅｒＨａｖｅｎ】</title>
</head>

<body>
    <div class="container-fluid">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <?php
        require_once("modules/pages/header.php");
        ?>
        <br>
        <div class="container-fluid my-5">
            <?php
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case "login":
                        include_once("modules/pages/login.php");
                        break;
                    case "reg":
                        include_once("modules/pages/register.php");
                        break;
                    case "home":
                        include_once("modules/pages/home.php");
                        break;
                    default:
                        # code...
                        break;
             
                    }

                    if ($_GET['page'] == 'create_post') {
                        include_once('modules/pages/create_post.php');
                    }elseif ( $_GET['page'] == 'profile') {
                        include_once('modules/pages/profile.php');
                    }elseif ($_GET['page'] == 'checkout') {
                        include_once("modules/pages/checkout.php");
                    }else {
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            include_once("modules/pages/home.php");
            
                        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
                            include_once("modules/pages/login.php");
                        }
                    }
            }
            ?>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>