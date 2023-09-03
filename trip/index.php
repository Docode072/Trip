<?php
// to make connection with database
// variabke for insert true or not
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
   // get connnect with database
    $con = mysqli_connect($server , $username, $password);
    if(!$con){ // $con returns false
        die("connection with database failed due to ".mysqli_connect_error());
    }
    // else
    //     echo "Connection is done Successfully";

    // now get the value of each column by using $_POST variables

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `contact`, `emailid`, `other`, `dt`)
    VALUES ('$name', ' $age', '$gender', '$phone', '$email', '$description', current_timestamp())";

    //echo $sql;
    // if it is true that connection id Done successfully
    // and excute the query 
    if($con->query($sql)){
          //echo "successfullt inserted!";
          // if successfully inserted then make insert =true
          $insert = true;
    }
    else{
        // if not done connection the show error
        echo "Error : $sql <br> $con->error";
    }

   // close the connnection
   $con->close(); 
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel Form </title>
    <link rel="stylesheet" href="style.css">
</head>
<link href='https://fonts.googleapis.com/css?family=Sriracha' rel='stylesheet'>

<body>
    <img class ="collegeimg" src="collegeimg.jpeg" alt="Galgotia College">
    <div class="container">
        <h1>Welcome to Galgotia college US Trip form</h1>
        
        <p>Enter your details and submit your 
        form to conform your participation in the trip</p>
        <?php
        if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form . 
                We are happi to see you joining us for the US trip</p>";
        }
        ?>


        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your good name...">
            <input type="text" name="age" id="age" placeholder="Enter your age...">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender...">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number...">
            <input type="email" name="email" id="email" placeholder="Enter your mail id...">
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <button class="btn">Submit</button>
            <!--INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `contact`, `emailid`, `other`, `dt`)
             VALUES ('1', 'testname', '21', 'male', '9355667788', 'hs.1512150@gmail.com', 'this will be amazing trip!', current_timestamp());-->

        </form>
        
    </div>
    <script src="index.js"> </script>
    
</body>
</html>