
<?php
$insertconf = false;

if (isset($_POST['name'])) {
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "travel website";

    $con = mysqli_connect($server, $user, $password, $dbname);

    if (!$con) {
        die("Connection with database not happening due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['Address']; // Fix the field name here
    $country = $_POST['country'];
    $state = $_POST['state'];
    $place = $_POST['place'];
    $message = $_POST['Message']; // Fix the field name here

    // Use prepared statement to prevent SQL injection
    $sql_query = "INSERT INTO `booking` (`name`, `email`, `address`, `country`, `state`, `place`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $address, $country, $state, $place, $message);

        if (mysqli_stmt_execute($stmt)) {
            $insertconf = true;
        } else {
            echo "ERROR: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Unable to prepare statement.";
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style1.css">
</head>
<body>
   
        <div class="container" >

      <div class="content">
       
        
        <div class="image" style="height="100vh"; width="100%";"></div>
          
      </div>
        <form action="" method="post" id="form">
            <div class="title">Book Now!</div>
            <div><label for="username">Name</label>
            <i class="fas fa-user"></i>
            <input
        type="text"
        name="name"
        id="username"
        placeholder="Joy Shaheb"
     />
    </div>
     <div>
     <label for="email">Email</label>
    <i class="far fa-envelope"></i>
    
    <input
        type="email"
        name="email"
        id="email"
        placeholder="abc@gmail.com"
     />
     </div> 
     <div><label for="Address">Address</label>
            <i class="fas fa-user"></i>
            <input
        type="text"
        name="Address"
        id="username"
        placeholder="123 st"</div>
    <div><label for="email">Country</label>
    <i class="far fa-envelope"></i>
    
    <input
        type="text"
        name="country"
        id="email"
        placeholder="abc@gmail.com"
     />
              </div>
              <div><label for="state">State</label>
            <i class="fas fa-user"></i>
            <input
        type="text"
        name="state"
        id="username"
        placeholder="123 st"</div>
     <div>	<label for="password">Enter place to visit</label>
    <i class="fas fa-lock"></i>
    
    <input
        type="text"
        name="place"
        id="password"
        placeholder="Paris/Maldives/Santorini"
     /></div> 
     <div><label for="uAddress">Message</label>
            <i class="fas fa-user"></i>
            <input
        type="textarea"
        name="Message"
        id="username"
        placeholder=""</div>  
           
     <button id="btn" type="submit">Book Now</button>
        </form>
    </div>
   
</body>
</html>
