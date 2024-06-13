<?php 

session_start();
include "connect/db.php";

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $date = date("Y:m:d H:i:s");


    if(empty($fullname)){
        echo 'Please enter your full name';
    }
    elseif(empty($email)){
        echo 'please enter your email';
    }
    elseif(empty($phone)){
        echo 'please input your phone number';
    }
    elseif(empty($password)){
        echo 'input password';
    }
    else{
        $equery = mysqli_query($conn, "SELECT * FROM `comm` WHERE `email`='$email'" );
        $pquery = mysqli_query($conn, "SELECT * FROM `comm` WHERE `phone`='$phone'" );

        if(mysqli_num_rows($equery)>0){
            echo 'Email already exists, register with another one';
        }
        elseif(mysqli_num_rows($pquery)>0){
            echo 'Phone Number already exists, register with a new number';
        }
        else{

            $insert = mysqli_query($conn, "INSERT INTO `comm` (`fullname`,`email`,`phone`,`password`,`created_at`)
            VALUES ('$fullname','$email','$phone','$password','$date')");

            if(empty($insert)){
                echo 'Something went wrong';
            }
            else{
                echo 'Account created successfully';
                header('refresh:2;url=login.php');
            }
        }
    }
}



?>



<?php include 'include/nav.php' ?>

<title>Sign Up</title>

<h4>Create an account</h4>

<form action="" method="post">
    <label for="">Fullname</label> <br>
    <input type="text" name="fullname"> <br><br>
    <label for="">Email</label><br>
    <input type="text" name="email"><br><br>
    <label for="">Phone</label><br>
    <input type="text" name="phone"> <br> <br>
    <label for="">Password</label> <br>
    <input type="password" name="password"> <br> <br>
    <button type="submit" name="submit">Submit</button>

</form>

<?php include 'include/footer.php' ?>