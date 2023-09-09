<html>
    <body>
        <?php
        $servername="localhost";
        $user="root";
        $pass='';

        $conn=new mysqli($servername,$user,$pass);

        if($conn->connect_error)
        {
            echo "Connection failed:".$conn->connect_error;
            exit();
        }
        echo '';
        $sql="CREATE DATABASE IF NOT EXISTS`validation`";
        $dbname="validation";
        if($conn->query($sql)){
            echo "";
        }
        else{
            echo "<br/>Could not create database:<br/>".$conn->error;
        }
        $servername="localhost";
        $user="root";
        $pass='';
        $dbname='validation';
        $conn=new mysqli($servername,$user,$pass,$dbname);
        $sql="CREATE TABLE IF NOT EXISTS `users3`(id int(50),username varchar(50),email varchar(50),epassword varchar(50),erole varchar(50))";
        if($conn->query($sql)){
            echo "";
        }
        else{
            echo "<br/>Could not create table:<br/>".$conn->error;
        }
        $conn->close();
        ?>
    </body>
</html>