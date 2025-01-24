<?php
$connection = mysqli_connect('localhost', 'root', '', 'comclub');

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
} else {
 if (isset($_GET['id'])) {
 $id = $_GET['id'];
 $sql = "SELECT firstname, lastname, ic, username, password, address, gender, email, class, age, telephone, interest FROM register WHERE ic='$id'";
 $result = $connection->query($sql);

 if ($result->num_rows === 0) {
 $message = "Person not found.";
 } else {
 $row = $result->fetch_assoc();
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $ic = $row['ic'];
 $username = $row['username'];
 $password = $row['password'];
 $gender = $row['gender'];
 $address = $row['address'];
 $email = $row['email'];
 $class = $row['class'];
 $age = $row['age'];
 $telephone = $row['telephone'];
 $interest = $row['interest'];
 }
 } else {
 $message = "Invalid request.";
 }

 mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- Custom CSS -->
 <link rel="stylesheet" href="style.css">

 <title>SMKJK Computer Club</title>
 <style>
 .updatebutt{
 background-color: #59ff95;
 font-size: 16px;
 border-radius: 8px;
 padding: 10px;
 box-shadow: 0 2px 6px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid #59ff95;
 }
 .deletebutt{
 background-color: crimson;
 font-size: 16px;
 border-radius: 8px;
 padding: 10px;
 box-shadow: 0 2px 6px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid crimson;
 }
 .printbutt{
 background-color: darkgrey;
 font-size: 16px;
 border-radius: 8px;
 padding: 10px;
 box-shadow: 0 2px 6px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid darkgrey;
 }
 a{
 color: black;
 }
 </style>
</head>
<body>
<div class="view-container">
 <div class="view-box">
 <div class="content-box">
 <?php if (isset($message)): ?>
 <h1><?php echo $message; ?></h1>
 <?php else: ?>
 <h1 class="mb-5 text-uppercase"><?php echo $firstname . " " . $lastname; ?></h1>
 <h5>IC: <?php echo $ic; ?></h5>
 <h5>Username: <?php echo $username; ?></h5>
 <h5>Password: <?php echo $password; ?></h5>
 <h5>Gender: <?php echo $email; ?></h5>
 <h5>Class: <?php echo $class; ?></h5>
 <h5>Address: <?php echo $address; ?></h5>
 <h5>Email: <?php echo $email; ?></h5>
 <h5>Age: <?php echo $age; ?></h5>
 <h5>Phone Number: <?php echo "0" . $telephone; ?></h5>
 <h5>Interest: <?php echo $interest; ?></h5>
 <?php endif; ?>
 <br><br>
 <a class="btn btn-light btn-lg" aria-current="page" href="member.php" >Back</a>
 <a class="updatebutt" href="update.php?ic=<?php echo $ic; ?>">Edit Information</a>
 <button class="printbutt" onclick="window.print()">Print</button>
 </div>
 </div>
</div>
</body>
</html>
