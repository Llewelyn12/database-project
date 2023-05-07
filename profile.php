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
    <title>Profile</title>
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
          <a href="#"></i> About</a>
          <a href="profile.php"></i> Bid History</a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        </nav>
      </div>
</header>
<script src="script.js"></script>

    <table class="table table-primary table-striped">
  <thead>
                    <th scope="col">NO</th>
                    <th scope="col">Pokéid</th>
                    <th scope="col">Bid Price</th>
                </tr>
            </thead>
            <tbody>
<?php
        $sql = "SELECT * FROM bids";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
        ?>
            <tr>
                <th scope="row"><?=$row['id']?></th>
                <td><?=$row['p_id']?></td>
                <td><?=$row['bid_price']?></td>
                
            </tr>
            
         
        <?php
        }
        mysqli_close($conn);
        ?>  
</table>



</body>
</html>