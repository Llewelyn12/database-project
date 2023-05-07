
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'Please login!';
        header('location: signin.php');
     
    }
    if (isset($_POST['bid'])) {
        $bid_price = $_POST['bid_price'];
        $id = $_POST['id'];
    
            $stmt = $conn->prepare("INSERT INTO bids(bid_price, p_id) VALUES(:bid_price, :id)");
            $stmt->bindParam(":bid_price", $bid_price);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
    
            
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
    <title>Product</title>
    
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
    <div class="" style="display: grid; grid-template-rows: auto; grid-template-columns: repeat(4,auto); gap: 5px; ">
    <?php
     if (isset($_POST['bid'])){
        $p_id = $_POST['id'];
        $bid = $_POST['bid_price'];
        $sql = "SELECT * FROM products_db WHERE max_price = '$bid' AND id = '$p_id' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        
        if ($sql) {
            $_SESSION['success'] = "Bid has been inserted successfully";
            echo "<script>
               $(document).ready(function(){
                   Swal.fire({
                       title: 'Success',
                       text: 'Bid successfully',
                       icon: 'success',
                       timer: 1000,
                       showConfirmButton: false
                       
                   });
               });
            </script>";
            header("refresh:2; url=user.php");
        } else {
            $_SESSION['error'] = "Bid has not been inserted successfully";
            header("location:user.php");
               // print_r($_POST);
       }
       
    ?>
   
    
    
    <?php
    }

?>
    <?php
        $sql = "SELECT * FROM products_db ";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            ?>
            <div>
                <div class="text-center">
                    <img src="upload/<?=$row['img']?>" width="250px" height="250" class="mt-5 p-2 my-2 border"> <br>
                    NAME: <?=$row['pname']?> <br>
                    START PRICE: <?=$row['price']?> <br>
                    <!-- CP: <?=$row['cp']?> <br> -->
                    <a class="btn btn-primary" href="bidding.php?id=<?=$row['id']?>" medthod="post">View</a> 
                </div>
            </div>
        <?php
        }
        mysqli_close($conn);
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>