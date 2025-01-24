<?php
$connection = mysqli_connect('localhost', 'root', '', 'comclub');

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
} else {
if (isset($_GET['search'])) {
 $search = $_GET['search'];

 // Prepare the SQL query with a search condition
 $sql = "SELECT firstname, lastname, ic, email, class, telephone FROM register WHERE ic LIKE '%$search%' ";
 $result = $connection->query($sql);

 if ($result->num_rows === 0) {
 $message = "No results found for '$search'.";
 }
} else {
 $sql = "SELECT firstname, lastname, ic, email, class, telephone FROM register";
 $result = $connection->query($sql);

 }
 if(isset($_GET['delete']))
 {
 $id = $_GET['delete'];
 $stmt = $connection->prepare("DELETE FROM register WHERE ic = ?");
 $stmt->bind_param("s", $id);
 $stmt->execute();

 if ($stmt->affected_rows > 0) {
 $deleteMessage = "Record deleted successfully.";
 header("Location: member.php");
 exit();
 } else {
 $deleteMessage = "Error deleting the record: " . $connection->error;
 }
 }

}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <!-- Custom CSS -->
 <link rel="stylesheet" href="style.css">
 <style>
 .updatebutt{
 background-color: #59ff95;
 border-radius: 8px;
 padding: 10px;
 box-shadow: 0 2px 6px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid #59ff95;
 }
 .deletebutt{
 background-color: crimson;
 border-radius: 8px;
 padding: 10px;
 box-shadow: 0 2px 4px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid crimson;
 }
 .printbutt{
 background-color: darkgrey;
 font-size: 16px;
 border-radius: 8px;
 box-shadow: 0 2px 4px 0 rgba(0,0,0,0.24), 0 15px 50px 0 rgba(0,0,0,0.19);
 border: 2px solid darkgrey;
 }
 a{
 color: black;
 }
 </style>
 <title>Member's List</title>
</head>
<body>
<div class="table-container">
 <div class="table">
 <div class="table_header">
 <h1>List of Computer Club's Member</h1><br><br>
 <form method="get" action="">
 <input type="search" placeholder="Search by IC No." name="search">
 <button class="btn-search" type="submit">Search</button>
 </form>
 </div>
 <div class="table_section">
 <table>
 <thead>
 <tr>
 <th>Name</th>
 <th>IC No.</th>
 <th>Email</th>
 <th>Class</th>
 <th>Phone Number</th>
 <th colspan="2">Action</th>
 </tr>
 </thead>

 <?php while ($rows = $result->fetch_assoc()) : ?>
 <tr>
 <td><?php echo $rows['firstname']; echo " "; echo $rows['lastname']; ?></td>
 <td><?php echo $rows['ic']; ?></td>
 <td><?php echo $rows['email']; ?></td>
 <td><?php echo $rows['class']; ?></td>
 <td><?php echo $rows['telephone']; ?></td>
 <td><a class="updatebutt"href="viewprofile.php?id=<?php echo $rows['ic']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
 <td><a class="deletebutt" href="member.php?delete=<?php echo $rows['ic']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
 </tr>
 <?php endwhile; ?>
 </table>
 <br><br>
 <a class="btn btn-light btn-lg" aria-current="page" href="index.html" >Back</a>
 </div>
 </div>

</div>
</body>
</html>
