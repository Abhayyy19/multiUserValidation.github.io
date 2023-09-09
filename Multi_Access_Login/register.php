<?php
include 'database.php';

include 'insert.php';
error_reporting(0);
   
if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   $cpassword=md5($_POST['cpassword']);
   $erole=$_POST['erole'];

   if($password == $cpassword){
        $sql="SELECT * FROM `users3` WHERE email='$email' AND epassword='$password' AND erole='$erole' ";
        $result= mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO `users3`(username,email,epassword,erole)
            VALUES ('$username','$email','$password','$erole')";
     $result=mysqli_query($conn,$sql);
     if($result){
         echo "<script>alert('User Registration Successful!')</script>";
         $username="";
         $email="";
         $erole="";
         $_POST['password']="";
         $_POST['cpassword']="";
     } else {
         echo "<script>alert('Something Went Wrong!')</script>";
     }
    }else{
        echo "<script>alert('Email Already Exists.')</script>";
    }
    }else{
       echo "<script>alert('Password Does not Match')</script>";
   }
}
?>
<html>
<head>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background: url("4.jpg");
                background-position:center;
            }
            div.container{
            
            margin: 80px;
            margin-left: 450px;
            }
            p{
            text-align: center;
            padding: 20px;
            font-family: sans-serif;
            }
            div.register{
            padding-left: 20px;
            padding-bottom: 10px;
            background-color: rgba(0,0,0,0.5);
            width: 400px;
            font-size: 20px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 2px 2px 15px
            rgba(0,0,0,0.3);
            color: #fff;
            }
            #ip{
            height: 25px;
        }
        .input-group{
            width: 200px;
        }
        #ip2{
            width: 173px;
            height: 25px;
        }
        .input-group{
            color:cornsilk;
        }


        </style>
    </head>
    <body>
        <div class="container">
            <div class="register">
            <form class="login-email" action="" method="POST">
                <p class="login-text">Register</p>
                <div class="input-group">
                <label style="font-size: 15px;">Username</label>
                    <input id="ip" type="text"  name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Email</label>
                    <input id="ip" type="email"  name="email" value="<?php echo $email; ?>" required>
                </div>

                <div class="input-group">
                <label style="font-size: 15px;">Phone</label>
                    <input type="number" name="phone" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Date of birth</label>
                    <input id="ip" type="date"  name="date" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">City</label>
                    <input id="ip" type="text"  name="City" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">State</label>
                    <input id="ip" type="text"  name="State" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Country</label>
                    <input id="ip" type="text"  name="country" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Select User Type</label><br>
                    <select id="ip" name="erole"  value="<?php echo $erole; ?>">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="input-group">
                <label style="font-size: 15px;">Password</label>
                    <input id="ip" type="password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Confirm Password</label>
                    <input id="ip" type="password"  name="cpassword" value="<?php echo $_POST['cpassword'] ?>" required>
                </div>
                <div class="input-group">
                    <button style="color: darkorchid;" name="submit" class="btn">Register</button>
                </div>    
                <p class="login-register-text">Already have an account?<a href="index.php">Login Here</a></p>
            </form>
            </div>
        </div>
    </body>
</html>