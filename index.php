<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/listing.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
                        if ($_GET['page'] == 'create_post') {
                            include_once('modules/pages/create_post.php');
                        } elseif ($_GET['page'] == 'profile') {
                            include_once('modules/pages/profile.php');
                        } elseif ($_GET['page'] == 'checkout') {
                            include_once("modules/pages/checkout.php");
                        } elseif ($_GET['page'] == 'sneaker') {
                            include_once("modules/pages/sneaker.php");
                        } elseif ($_GET['page'] == 'listL') {
                            include_once("modules/pages/profile/listingInfo.php");
                        } else {
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                include_once("modules/pages/home.php");
                            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
                                include_once("modules/pages/login.php");
                            }
                        }
                        break;
                }
            }
            ?>
        </div>
</body>

</html>