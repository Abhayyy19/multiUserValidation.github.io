<?php
include 'database.php';

include 'insert.php';

session_start();

error_reporting(0);


if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $erole=$_POST['erole'];


    $sql="SELECT * FROM `users3` WHERE email='$email' AND epassword='$password' AND erole='$erole' ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['username']= $row['username'];{ 
            if ($erole=="user"){  
            header("Location: Employee_Page.php");}
            else{
                header("Location: admin.php");
            }
        }
    }else{
        echo "<script>alert('Email or Password is Incorrect.')</script>";
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
            
            margin: 150px;
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
                <p class="login-text">Login</p>
                <div class="input-group">
                    <label style="font-size: 15px;">Email</label>
                    <input id="ip" type="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Password</label>
                    <input id="ip" type="password" name="password" value="<?php echo $password; ?>" required>
                </div>
                <div class="input-group">
                <label style="font-size: 15px;">Select User Type</label><br>
                    <select id="ip" name="erole" value="<?php echo $erole; ?>">
                        <option selected value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="input-group">
                    <button style="color: darkorchid;" name="submit" class="btn">Login</button>
                </div>    
                <p class="login-register-text">Don't have an account?<a href="register.php">Register Here</a></p>
            </form>
            </div>
        </div>
        
    </body>
</html>