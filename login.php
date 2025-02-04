<?php
if (isset($_POST['submit'])) {
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
    $sql = "INSERT INTO users (username,password) values('$username','$password')";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" href="955.jpg">
    
</head>

<body>
    <marquee  direction="right to left"><h1>welcome you!</h1></marquee>
    
    <div class="signup">
        <h2>login</h2>
        <form action="welcome.php" method="post">
            <label for="user">username</label>
            <input type="text" name="username" placeholder="username" required>
            <label for="passward">password</label>
            <input type="password" name="password" placeholder="passward"  required>
            <input type="submit"name="submit" value="submit">

        </form>
        <p>not have an account? <a href="signup.php">register here </a></p>
    </div>
    <script>
        function openNewPage(event, onclick="openNewPage(event)") {
            event.preventDefault(); 
            var url = "http://localhost:3000/xampp/htdocs/register/welcome.html";
            window.open(url);
        }
    </script>
</body>

</html>
