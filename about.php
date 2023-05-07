<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'Please login!';
        header('location: signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles-about.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>
      <div class="inner-width">
        <h1 class="logo">Poké<span style="color:#273b91;">Trade</span></h1>
        <i class="menu-toggle-btn fas fa-bars"></i>
        <nav class="navigation-menu">
          <a href="user.php"><i class="fas fa-home home"></i> Home</a>
          <a href="about.php"></i> About</a>
          <a href="profile.php"></i> Profile</a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        </nav>
      </div>
      
</header>
<div class="container" style="margin-top:10px;">
   
        <div class="card" style="margin-bottom: 50px; margin-top: 100px; margin-left:380px;">
            <div class="imgBx">
                <img src="forth.JPG "  >
            </div>
            <div class="content">
                <div class="details">
    
                    <h2>Tayanon Rodsuwan
                        <br>
                        <span>
                            Senior Developer
                        </span>
                    </h2>
    
                    <div class="data">
                        <h3>tayanonr63@nu.ac.th<br><span>E-mail</span></h3>
                        <h3>Tayanon Rodsuwan<br><span>facebook</span></h3>
                        <h3>22<br><span>Age</span></h3>
                    </div>
    
                    <div class="Btn">
                        <button>Follow</button>
                        <button>Message</button>
                    </div>
                    
                </div>
            </div>
        </div>
            <br>
        <div class="card" style="margin-bottom: 50px; margin-top: 100px; margin-left:380px;">
            <div class="imgBx">
                <img src="fair.JPG">
            </div>
            <div class="content">
                <div class="details">
    
                    <h2>Teeraphat Muaksang
                        <br>
                        <span>
                            Senior Developer
                        </span>
                    </h2>
    
                    <div class="data">
                        <h3>teeraphatm63@nu.ac.th<br><span>E-mail</span></h3>
                        <h3>Teeraphat Muaksang<br><span>facebook</span></h3>
                        <h3>22<br><span>Age</span></h3>
                    </div>
    
                    <div class="Btn">
                        <button>Follow</button>
                        <button>Message</button>
                    </div>
                    
                </div>
            </div>
        </div>
            <br>
        <div class="card" style="margin-bottom: 50px; margin-top: 100px; margin-left:380px;">
            <div class="imgBx">
                <img src="ice.JPG">
            </div>
            <div class="content">
                <div class="details">
    
                    <h2>Phongsathon Teanson
                        <br>
                        <span>
                            Senior Developer
                        </span>
                    </h2>
    
                    <div class="data">
                        <h3>phongsatornt63@nu.ac.th<br><span>E-mail</span></h3>
                        <h3>Phongsathon Teanson<br><span>facebook</span></h3>
                        <h3>22<br><span>Age</span></h3>
                    </div>
    
                    <div class="Btn">
                        <button>Follow</button>
                        <button>Message</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<script src="script.js"></script>



</body>
</html>