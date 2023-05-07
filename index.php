<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body {
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
form{
    width: 30%;
    position:absolute;
    justify-content:center;
    background-color: rgba(255,255,255,0.13);
    border-radius: 10px;
    backdrop-filter: blur(50px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    margin-left: 420px;
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 30px;
    width: 30%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    
    
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
</style>
</head>
<body>
    
    <div class="container" style="margin-top:5px;" >
        
        <form class="form-box" action="signup_db.php"  method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
            
            <div class="mb-2">
                <h2 class="mt-3">Register</h2>
                
            </div>
            <div class="mb-2">
                <label for="firstname" class="form-label">First name</label>
                <input  type="text" class="form-control" name="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-2">
                <label for="lastname" class="form-label">Last name</label>
                <input   type="text" class="form-control" name="lastname" aria-describedby="lastname">
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input   type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input   type="password" class="form-control" name="password">
            </div>
            <div class="mb-2">
                <label for="confirm password" class="form-label">Confirm Password</label>
                <input   type="password" class="form-control" name="c_password">
            </div>
            <div class="mb-2">
                <label for="tel" class="form-label">Telephone</label>
                <input   type="text" class="form-control" name="tel">
            </div>
            
            <button type="submit" name="signup" >Sign Up</button>
            
            <p style="margin-top:10px;">Already a member?<a href="signin.php"> Sign in </a></p>
        </form>
        
    </div>
    
</body>
</html>