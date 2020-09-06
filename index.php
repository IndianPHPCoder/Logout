<?php
    require 'db_con.php';
    session_start();

    $error="";
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);

        $query = "SELECT * FROM record WHERE email='$email' and pass='$pass'";
        $run = mysqli_query($con, $query);
        $count = mysqli_num_rows($run);
        if($count>0){
            $row = mysqli_fetch_assoc($run);
            $_SESSION['id'] = $row['id'];
            $_SESSION['email']=$row['email'];
            header('location:home.php');
            die();
        }
        else{
            $error = "Invalid";
        }
    }
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<table align="center">
    <form action="#" method="post">
            <tr>
                <td colspan="2" align="center"><h2>Login Page</h2></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email"  required></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="pass"  required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <button type="submit" name="login">Login</button></td>
                <?php echo $error;?>
            </tr>
    </form>
</table>
</body>
</html>