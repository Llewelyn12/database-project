<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'Please login!';
        header('location: signin.php');
    }
    
    ?>
<?php
  $conn = mysqli_connect("localhost","root","","data");
  if($conn){
      // echo "SUCCESS";
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding Page</title>
    <link rel="stylesheet" href="styles.css">
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
          <a href="profile.php"></i> Bid History</a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        </nav>
      </div>
    </div>  
</header>
    <br>
    <div class="" style="display: flex; justify-content:center; grid-template-rows: auto; grid-template-columns: repeat(4,auto); gap: 5px; ">
    <?php
        $ids = $_GET['id'];
        $sql = "SELECT * FROM products_db WHERE id = '$ids'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

    ?>
            <div>
                <div class="text-center">
                    <img src="upload/<?=$row['img']?>" width="500px" height="500"> <br>
                    NAME: <?=$row['pname']?> <br>
                    PRICE: <?=$row['price']?> <br>
                    MAX PRICE: <?=$row['max_price']?> <br>
                    CP: <?=$row['cp']?> <br> 
                </div>
                <div class="bidtest" style="display: flex;justify-content:center;">
                <form action="user.php" method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Bid now</button>   
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Start Bid</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="mb-3">
                                <label for="bid_price" class="col-form-label">Bid:</label>
                                <input type="้hidden"  required class="form-control" name="bid_price">
                                <input type="hidden"  required class="form-control" name="id" value="<?=$row['id']?>">
                                
                            </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="bid" class="btn btn-info" >bid</button>
                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            </div>
            </div>
        <?php
            mysqli_close($conn);
        ?>    
            
    </div> 
</body>
</html>