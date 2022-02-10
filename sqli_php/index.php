
<?php

$connection = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'name' => 'challenges'
];

$mysqli = new mysqli($connection['host'],$connection['user'],$connection['password'],$connection['name']);
 
if($mysqli-> connect_error){
    die("Error :". $mysqli-> connect_error );
}

$ms = '';



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $uesrExists = $mysqli->query("select id, name, password, role from users where name='$username' AND password ='$password' limit 1");
        
        if(!$uesrExists->num_rows){
            $ms = 'Error, user not found!';
        }else{
            header('location: s3c3rtflag.php');  
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <div id="login">
        
        
        <h4 class="text-info">Login</h4>
        <hr>
        <form action="" method="post" >

            <div class="form-group">
                <label for="email">Your name</label>
                <input type="text" name="username" class="form-control" placeholder="your username" id="username">
            </div>


            <div class="form-group">
                <label for="password">Your password</label>
                <input type="password" name="password" class="form-control" placeholder="your password" id="password">
            </div>

            <div class="form-group">
                <button class="btn btn-success">Login</button>
            </div>
        </form>
        <span class="badge rounded-pill bg-danger"><?php echo $ms; ?></span>
    </div>
</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>