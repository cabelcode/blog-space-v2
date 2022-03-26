<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        extract($parameters);
        //@var title
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="icon" href="/images/fav.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/86082ea4a5.js" crossorigin="anonymous"></script>
    <title><?php echo $pageTitle?></title>
</head>
<body>
    <header>
        <div><h1>Blog Space</h1></div>
        <nav>
            <button class="btn-bars hamburgerToggle"><i class="fas fa-bars"></i></button>
            <div class="overlay hamburgerToggle hamburgerTarget"></div>
            <div class="link-wrapper hamburgerTarget">
                <button class="btn-times hamburgerToggle"><i class="fas fa-times"></i></button>
                <ul class="link-container">
                    <li class="link-item"><a href="/">Home</a></li>
                    <li class="link-item"><a href="/post">Today's Post</a></li>
                    <li class="link-item"><a href="/search">Search</a></li>
                </ul>
            </nav>  
            </div>
    </header>
    <div class="main-content">

