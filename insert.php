<?php 

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
    $pokename = $_POST['pname'];
    $price = $_POST['price'];
    $cp = $_POST['cp'];
    $img = $_FILES['img'];
    $bidtime = $_POST['bidtime'];
    $max_price = $_POST['max_price'];

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $filePath)) {
                    $sql = $conn->prepare("INSERT INTO products_db(pname, price, cp,img , max_price, datetime , bidtime) VALUES(:pname, :price, :cp, :img, :max_price,  NOW(),:bidtime) ");
                    $sql->bindParam(":pname", $pokename);
                    $sql->bindParam(":price", $price);
                    $sql->bindParam(":cp", $cp);
                    $sql->bindParam(":max_price", $max_price);
                    $sql->bindParam(":bidtime", $bidtime);
                    $sql->bindParam(":img", $fileNew);
                    $sql->execute();

                    if ($sql) {
                        $_SESSION['success'] = "Data has been inserted successfully";
                        header("location: admin.php");
                    } else {
                        $_SESSION['error'] = "Data has not been inserted successfully";
                        header("location: admin.php");
                    }
                }
            }
        }
}