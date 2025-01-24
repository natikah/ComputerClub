<?php
$connection = mysqli_connect('localhost', 'root', '', 'comclub');

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Process the form submission and update the database here
 $fname = $_POST['firstname'];
 $lname = $_POST['lastname'];
 $ic = $_POST['ic'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $gender = $_POST['gender'];
 $class= $_POST['class'];
 $address = $_POST['address'];
 $email = $_POST['email'];
 $age = $_POST['age'];
 $phone = $_POST['phone'];
 $interest = isset($_POST['interest']) ? $_POST['interest'] : array();

 // Prepare and execute the SQL query for updating the data
 $sql = "UPDATE register SET firstname='$fname', lastname='$lname', username='$username', password='$password', address='$address', gender='$gender', email='$email', class='$class', age='$age', telephone='$phone', interest='$interest' WHERE ic='$ic'";
 $result = $connection->query($sql);

 if ($result) {
 // Update successful, redirect the user to the viewprofile.php page
 header("Location: viewprofile.php?id=$ic"); // Pass the IC number as a parameter to viewprofile.php
 exit; // Make sure to exit after sending the redirect header
 } else {
 echo "Error updating record: " . $connection->error;
 }
}

mysqli_close($connection);
?>
