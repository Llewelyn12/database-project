<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $tel = $_POST['tel'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION['error'] = 'Please enter your name';
            header("location: index.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'Please enter your lastname';
            header("location: index.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'Please enter your email';
            header("location: index.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email format';
            header("location: index.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'Please enter your password';
            header("location: index.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'Password must be between 5 and 20 characters';
            header("location: index.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'Confirm your password';
            header("location: index.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'Passwords do not match';
            header("location: index.php");
        } else if (empty($tel)) {
            $_SESSION['error'] = 'Please enter your phone';
            header("location: index.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "This email is already <a href='signin.php'>Click</a> to login";
                    header("location: index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, urole, tel) 
                                            VALUES(:firstname, :lastname, :email, :password, :urole, :tel)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":tel", $tel);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "Successfully subscribed! <a href='signin.php' class='alert-link'>Click!</a> to login";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "something went wrong";
                    header("location: index.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>