<?php
    session_start();
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
        <a href="index.php" class="navbar-brand fs-4">【Ｓｎｅａｋｅｒ Ｈａｖｅｎ】</a>
        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon bi bi-caret-down"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <?php
                    if (isset($_SESSION['loggedin']) == true) {
                ?>
                    <?php
                        if(isset($_GET['logoutLINK'])){
                            unset($_SESSION['loggedin']);
                            unset($_SESSION['seller']);
                            unset($_SESSION['name']);
                            unset($_SESSION['id']);
                            header("refresh: 0");
                        }
                    ?>
                    <li class="nav-item">
                        <a href="index.php?logoutLINK=true" class="nav-link text-white">【Ｌｏｇｏｕｔ】</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo($_SESSION['name']);?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if ($_SESSION['seller'] == 2) { ?>
                                <li><a class="dropdown-item " href="create_post.php">Create post</a></li>
                            <?php }?>
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        </ul>
                    </li>
                <?php 
                    }
                    else{
                ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link text-white">【Ｌｏｇｉｎ】</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link text-white">【Ｊｏｉｎ】</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>