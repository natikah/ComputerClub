<?php
$connection = mysqli_connect('localhost', 'root', '', 'comclub');

if ($connection->connect_error) {
 die("Connection failed: " . $connection->connect_error);
}

// Check if the IC number is provided
if (isset($_GET['ic'])) {
 $ic = $_GET['ic'];

 // Retrieve the existing information based on IC number
 $sql = "SELECT * FROM register WHERE ic='$ic'";
 $result = $connection->query($sql);

 if ($result->num_rows === 0) {
 echo "Person not found.";
 } else {
 $row = $result->fetch_assoc();
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $username = $row['username'];
 $password = $row['password'];
 $gender = $row['gender'];
 $address = $row['address'];
 $email = $row['email'];
 $class = $row['class'];
 $age = $row['age'];
 $telephone = $row['telephone'];
 $interest = $row['interest'];
 $b=explode(",","$interest");
 print_r($b);


 // Display the update form with the existing information

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
 </head>
 <body>
 <div class="update-container">
 <div class="update-box">
 <form action="update_process.php"" method="post">
 <h2>Update Details Form</h2>
 <div class="update-content">
 <div class="input-box">
 <label class="form-label" for="firstname" >First name: </label>
 <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" size="25" value="<?php echo $firstname; ?>" required>
 <div class="invalid-feedback">
 Please provide your first name.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="lastname">Last name:</label>
 <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" size="25" value="<?php echo $lastname; ?>" required>
 <div class="invalid-feedback">
 Please provide your last name.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="ic">IC number:</label>
 <input type="text" id="ic" name="ic" class="form-control form-control-lg" pattern="[0-9]{12}" maxlength="12" value="<?php echo $ic; ?>" readonly
 <div class="invalid-feedback">
 Please provide your IC number (12 numbers only).
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="username">Username:</label>
 <input type="text" name="username" id="username" class="form-control form-control-lg" minlength="5" maxlength="12" value="<?php echo $username; ?>" required>
 <div class="invalid-feedback">
 Please enter a username between 5 and 12 characters.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="password">Password:</label>
 <input type="password" name="password" id="password" class="form-control form-control-lg" minlength="5" maxlength="12" value="<?php echo $password; ?>" required>
 <div class="invalid-feedback">
 Please enter a password between 5 and 12 characters.
 </div>
 </div>
 <!-- radio button -->
 <span class="gender-title">Gender</span>
 <div class="gender-category">
 <input class="form-check-input" type="radio" name="gender" id="maleGender"
 value="Male" <?php if ($gender === 'Male') echo 'checked'; ?>/>
 <label class="form-check-label" for="maleGender">Male</label>
 <input class="form-check-input" type="radio" name="gender" id="femaleGender"
 value="Female" <?php if ($gender === 'Female') echo 'checked'; ?>/>
 <label class="form-check-label" for="femaleGender">Female</label>
 </div>
 <!-- drop down -->
 <h6 class="mb-0 me-4">Class: </h6>
 <select class="select" name="class" required>
 <option value="Form 5 SC1" <?php if ($class === 'Form 5 SC1') echo 'selected'; ?>>Form 5 SC1</option>
 <option value="Form 5 SC2" <?php if ($class === 'Form 5 SC2') echo 'selected'; ?>>Form 5 SC2</option>
 <option value="Form 4 SC1" <?php if ($class === 'Form 4 SC1') echo 'selected'; ?>>Form 4 SC1</option>
 <option value="Form 4 SC2" <?php if ($class === 'Form 4 SC2') echo 'selected'; ?>>Form 4 SC2</option>
 </select>
 <div class="invalid-feedback">
 Please select a valid state.
 </div>
 <div class="input-box">
 <label class="form-label" for="address">Address:</label>
 <textarea type="text" name="address" id="address" name="address" rows="6" class="form-control md-textarea" required><?php echo $address; ?></textarea>
 <div class="invalid-feedback">
 Please provide your address.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="email">Email:</label>
 <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="@gmail.com" value="<?php echo $email; ?>" required/>
 <div class="invalid-feedback">
 Please provide right email format.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="age">Age:</label>
 <input type="number" name="age" id="age" class="form-control form-control-lg" inputmode="numeric" value="<?php echo $age; ?>" required>
 <div class="invalid-feedback">
 Please provide a valid age.
 </div>
 </div>
 <div class="input-box">
 <label class="form-label" for="phone">Phone number:</label>
 <input type="tel" name="phone" id="phone" class="form-control form-control-lg" pattern="[0-9]{9,11}" value="<?php echo $telephone; ?>" required>
 <small class="form-text text-muted">e.g. 01123456789</small>
 <div class="invalid-feedback">
 Please provide a valid phone number.
 </div>
 </div>
 <!--checkbox-->
 <div class="input-box">
 <input type="checkbox" name="interest" class="form-check-input" id="interest1" name="interest" value="Data Analysis"<?php
 if (in_array("Data Analysis", $b)) {
 echo "checked";
 }
 ?>>
 <label class="form-check-label" for="interest1">Data Analysis</label>
 </div>
 <div class="input-box">
 <input type="checkbox" name="interest" class="form-check-input" id="interest2" name="interest" value="Art Design"<?php
 if (in_array("Art Design", $b)) {
 echo "checked";
 }
 ?>>
 <label class="form-check-label" for="interest2">Art Design</label>
 </div>
 <div class="input-box">
 <input type="checkbox" name="interest" class="form-check-input" id="interest3" name="interest" value="Image Processing"<?php
 if (in_array("Image Processing", $b)) {
 echo "checked";
 }
 ?>>
 <label class="form-check-label" for="interest3">Image Processing</label>
 </div>
 <div class="input-box">
 <input type="checkbox" name="interest" class="form-check-input" id="interest4" name="interest" value="Game Development"<?php
 if (in_array("Game Development", $b)) {
 echo "checked";
 }
 ?>>
 <label class="form-check-label" for="interest4">Game Development</label>
 </div>
 <div class="input-box">
 <input type="checkbox" name="interest" class="form-check-input" id="interest5" name="interest" value="Website Development"<?php
 if (in_array("Website Development", $b)) {
 echo "checked";
 }
 ?>>
 <label class="form-check-label" for="interest5">Website Development</label>
 </div>
 <div class="invalid-feedback">
 Please select at least one interest.
 </div>

 <!-- button -->
 <div class="d-md-flex justify-content-end pt-3">
 <a class="btn btn-light btn-lg" aria-current="page" href="viewprofile.php?id=<?php echo $ic; ?>">Back</a>
 <button type="reset" class="btn btn-light btn-lg">Reset all</button>
 <button type="submit" name="update" class="btn btn-warning btn-lg ms-2">Update form</button>
 </div>
 </div>
 </form>
 </div>
 </div>

 <!-- JavaScript -->
 <!-- JavaScript -->
 <script>
 (function () {
 'use strict';

 // Fetch all the forms we want to apply custom Bootstrap validation styles to
 var forms = document.querySelectorAll('.needs-validation');

 // Loop over them and prevent submission
 Array.prototype.slice.call(forms)
 .forEach(function (form) {
 form.addEventListener('submit', function (event) {
 if (!form.checkValidity()) {
 event.preventDefault();
 event.stopPropagation();
 }


 form.classList.add('was-validated');
 }, false);
 });
 })();
 </script>

 <!-- Radio & check box-->
 <script>
 let error = 0;
 document.addEventListener('DOMContentLoaded', function() {
 const form = document.querySelector('form');
 form.addEventListener('submit', function(e) {
 e.preventDefault();

 // Check if all form fields are filled
 const inputs = form.querySelectorAll('input, select, textarea');
 let isValid = true;

 inputs.forEach(function(input) {
 if (!input.checkValidity()) {
 isValid = false;
 input.classList.add('is-invalid');
 } else {
 input.classList.remove('is-invalid');
 }
 });

 // Check if at least one checkbox is selected
 /*const checkboxes = form.querySelectorAll('input[type="checkbox"]');
 let isCheckboxSelected = false;

 checkboxes.forEach(function(checkbox) {
 if (checkbox.checked) {
 if(checkbox.length != 1)
 {
 alert('Please select at least one interest.');
 return;
 }
 else{
 isCheckboxSelected = true;
 }

 }

 });*/
 const interests = document.querySelectorAll('input[name="interest"]:checked');
 // Check if any interests are selected
 if (interests.length != 1) {
 alert("Please select at least one interest.");
 error+=1;
 }else
 {
 error = 0;
 }

 // Check if radio button is selected
 const radios = form.querySelectorAll('input[type="radio"]');
 let isRadioSelected = false;

 radios.forEach(function(radio) {
 if (radio.checked) {
 isRadioSelected = true;
 }
 });

 // Display error messages
 if (!isValid) {
 alert('Please fill in all required fields.');

 return;
 }

 /*if (isCheckboxSelected = false) {
 alert('Please select at least one interest.');
 return;
 }*/

 if (!isRadioSelected) {
 alert('Please select a gender.');
 error+=1;
 return;
 }
 //const interests = document.querySelectorAll('input[name="interest"]:checked');
 // Check if any interests are selected

 // If all validations pass, display success message and submit the form
 if(error == 0)
 {
 alert('Successfully registered');
 form.submit();
 }




 });
 });
 </script>


 <!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
 </html>

 <?php
 }
} else {
 echo "Invalid request.";
}

mysqli_close($connection);
?>
