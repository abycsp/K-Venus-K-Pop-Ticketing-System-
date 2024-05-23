<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location: admin/reservation.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location: reserved.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/59c8d2dc7b.js" crossorigin="anonymous"></script>
</head>
<body>
   <style>
      /*loginmaintenance*/
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
 .container{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding:20px;
  padding-bottom: 60px;
}

.container .content{
  text-align: center;
}

.container .content h3{
  font-size: 30px;
  color:#333;
}

.container .content h3 span{
  background: #333;
  color:#fff;
  border-radius: 5px;
  padding:0 15px;
}

.container .content h1{
  font-size: 50px;
  color:#333;
}

.container .content h1 span{
  color:#333
}

.container .content p{
  font-size: 25px;
  margin-bottom: 20px;
}

.container .content .btn{
  display: inline-block;
  padding:10px 30px;
  font-size: 20px;
  background: #333;
  color:#fff;
  margin:0 5px;
  text-transform: capitalize;
}

.container .content .btn:hover{
  background: #333
}

.form-container{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding:20px;
  padding-bottom: 60px;
  background: pink;
}

.form-container form{
  padding:20px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  background: #fff;
  text-align: center;
  width: 500px;
}

.form-container form h3{
  font-size: 30px;
  text-transform: uppercase;
  margin-bottom: 10px;
  color:#333;
}

.form-container form input,
.form-container form select{
  width: 100%;
  padding:10px 15px;
  font-size: 17px;
  margin:8px 0;
  background: #eee;
  border-radius: 5px;
}

.form-container form select option{
  background: #fff;
}

.form-container form .form-btn{
  background: #333;
  color:#fff;
  text-transform: capitalize;
  font-size: 20px;
  cursor: pointer;
}

.form-container form .form-btn:hover{
  background: #333;
  color:#fff;
}

.form-container form p{
  margin-top: 10px;
  font-size: 20px;
  color:#333;
}

.form-container form p a{
  color:#333;
}

.form-container form .error-msg{
  margin:10px 0;
  display: block;
  background: #333;
  color:#fff;
  border-radius: 5px;
  font-size: 20px;
  padding:10px;
}

   </style>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>