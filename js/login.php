<?php 

session_start();
include 'connect/db.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        echo 'please enter your email to login';
    }
    elseif(empty($password)){
        echo 'please enter your password to login';
    }
    else{

        $query = mysqli_query($conn, "SELECT * FROM `comm` WHERE `email`='$email' AND `password`='$password'");
        if(mysqli_num_rows($query)<1){
            echo 'account not found, kindly signup first';
        }else{
            echo 'login successful';
            header('refresh:2;url=index.php');
        }
        
    }
}

?>


<?php include 'include/nav.php' ?>

<title>Login</title>

<h3>if you haven't got an account,sign up below</h3> 
<button><a href="signup.php">Sign Up!</a></button>

<form action="" method="post">
    <label for="">Email</label><br>
    <input type="text" name="email"><br>
    <label for="">Password</label><br>
    <input type="password" name="password"><br> <br>
    <button type="submit" name="submit">Submit</button>
</form>

<?php include 'include/footer.php' ?>