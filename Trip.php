<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);


if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
//echo "Success connecting to the db";

$name = $_POST['name']; 
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['other'];
$sql = "INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
//echo $sql;

if($con->query($sql) == true){
    //echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="Trip.css">
</head>     
<body>
    <img  class="bg" src="https://res.cloudinary.com/thrillophilia/image/upload/c_fill,f_auto,fl_progressive.strip_profile,g_auto,h_600,q_auto,w_auto/v1/filestore/60zv3p7hoj9ihglp7igcbaha2zi0_1575010669_shutterstock_652879903.jpg" alt="Nandi Hills">
    <div class="container">
        <h1>Welcome to the Nandi Hills Travel Form</h1>
        <p>Enter your deatils and submit the form to confirm your participation.</p>
        <form action="Trip.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name"><br>
        <input type="text" name="age" id="age" placeholder="Enter your age"><br>
        <input type="text" name="gender" id="gender" placeholder="Enter your gender"><br>
        <input type="email" name="email" id="email" placeholder="Enter your eamil"><br>
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone"><br>
        <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea><br>
        <button class="btn">Submit</button>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form.We are happy to see you joining us for the Nandi Hills trip.</p>";
        }
        ?>
        <!-- <button class="btn">Reset</button> -->
        </form>
    </div>   
</body>
</html>
