<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>App Bank Mini</title>
</head>
<body>
    <div id="content" >
        <h1>Login</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="button" value="Sign In" name="signin"></td>
                    <td><input type="submit" class="button" value="Sign Up" name="signup"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
<?php
if(isset($_POST['signin'])){
    $sql = "select * from user where username='$_POST[username]' and password='$_POST[password]'";
    $query = mysqli_query($koneksi,$sql);
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $_SESSION['login'] = "true";
        
        $_SESSION['nama'] = "$row[username]";
        header('location:index.php');
    }else{
        echo "password dan username salah";
    }
}

?>