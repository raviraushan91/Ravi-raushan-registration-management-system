<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $father_name = $_POST['father_name'];
    $father_mob = $_POST['father_no'];
    $num = $_POST['y_number'];
    $address = $_POST['address'];
    $gmail = $_POST['mail'];
    $aaddhar = $_POST['aaddhar'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = 'localhost';
    $user = 'root';
    $pass = 'Ravi@9973908573';
    $dbname = 'registerdb';
    
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); 
    }
    $sql = "INSERT INTO registration (name,gender,father_name,father_mob,y_number,address,mail,aaddhar,username,password) values('$name','$gender','$father_mob','$father_mob','$num','$address','$gmail','$aaddhar','$username','$password')";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Register Here</title>
    <link rel="icon" href="955.jpg">
    <style>
        #message {
            color: rgb(243, 4, 4);
            font-size: 14px;
            display: none;
            padding-left: 10px;
        }
        #message1{
            color: rgb(243, 4, 4);
            font-size: 14px;
            display: none;
            padding-left: 10px;
        }
    </style>

</head>

<body>
    <div class="signup">
        <h2>Sign Up</h2>
        <h4>It's free and only takes a minute</h4>
        <form action="login.php" method="POST">
            <label>name</label>
            <input type="text" name="name" placeholder="enter your first name" required>

            <label for="gender">Select your gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select an option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
                <option value="prefer-not-to-say">Prefer not to say</option>
            </select>

            <label>father name</label>
            <input type="text" name="father_name" placeholder="Please Enter father's name" required>

            <label>Father mobile No.</label>
            <input type="teliphone" name="father_no" id="mobile" maxlength="10" placeholder="123-456-7890" required>
            <p id="message2"></p>

            <label>your mobile no</label>
            <input type="teliphone" name="y_number" id="mobile" placeholder="123-456-7890" maxlength="10" oninput="validateMobile(this)" required>

            <label for="address">Address</label>
            <textarea name="address" placeholder="Enter your complete address" required></textarea>

            <label for="email">Email</label>
            <input type="email" name="mail" placeholder="abc@gmail.com" >

            <label for="aaddhar">Aaddhar No</label>
            <input type="text" name="aaddhar" id="aadhaar" placeholder="1234-5678-9012" maxlength="12" oninput="validateAadhaar(this)" required>
            <p id="message"></p>

            <label for="username">UserName</label>
            <input type="text" name="username" placeholder="username" >

            <label for="passward">password (0-9)</label>
            <input type="password" id="password" name="password" placeholder="Enter Numeric Password:" oninput="validatePassword(this)" required>
            <p id="message1"></p>

            <input type="submit" name="submit" value="Submit">

        </form>
        <p id="para">by clicking the sign up button, you agree to our <br>
            <a href="">terms and condition </a> and <a href="#">policy privacy </a>
        </p>
        <p id="para">already have an account ? <a href="login.php">Login here</a></p>
    </div>
    <script>
        function openNewPage(event) {
            event.preventDefault();
            var url = "http://localhost:3000/xampp/htdocs/register/login.php";
            window.open(url, "_blank");
        }

        // aadhaar number validation
        function validateAadhaar(input) {
            input.value = input.value.replace(/\D/g, '');

            let ad_message = document.getElementById("message");

            if (input.value.length > 12) {
                input.value = input.value.slice(0, 12);
                ad_message.style.display = "block";
                ad_message.innerText = "Aadhaar number cannot exceed 12 digits!";
            } 
            else {
                ad_message.style.display = "none";
            }
        }


        //mobile number validation

        function validateMobile(input) {
            input.value = input.value.replace(/\D/g, '');

            let mob_message = document.getElementById("message2");

            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
                mob_message.style.display = "block";
                mob_message.innerText = "Mobile number cannot exceed 10 digits!";
            }
            else {
                mob_message.style.display = "none";
            }
        }

        //password validation
        function validatePassword(input) {
            let message = document.getElementById("message1");
            
            // Remove non-numeric characters
            input.value = input.value.replace(/\D/g, '');

            // Show warning if input was changed
            if (input.value === "") {
                message.style.display = "block";
                message.innerText = "Only numbers are allowed in the password!";
            } 
            else {
                message.style.display = "none";
            }
        }
    </script>
</body>
</html>
