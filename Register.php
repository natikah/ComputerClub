<?php

$connection = mysqli_connect('localhost', 'root', '', 'comclub');

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
} else {
 echo ("connected");
 // Retrieve form data
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
 $interest = $_POST['interest'];
 // Prepare and execute the SQL query
 $sql = "INSERT INTO register (firstname, lastname, ic, username, password, address, gender, email, class, age, telephone, interest) VALUES ('$fname', '$lname', '$ic', '$username', '$password', '$address', '$gender', '$email', '$class', '$age', '$phone', '$interest')";
 if (mysqli_query($connection, $sql)) {
 header("Location: member.php");
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($connection);
 }

 // Close the database connection
 mysqli_close($connection);
}
?>

