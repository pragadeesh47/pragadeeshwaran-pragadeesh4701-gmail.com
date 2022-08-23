<html>
    <body>
    <?php
        $db_hostname="127.0.0.1";
        $db_username="root";
        $db_password="";
        $db_name="heloo";
        $conn =mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            echo "Connection failed: ".mysqli_connect_error();
            exit;
        }
        $name=$_POST['username'];
        $password=$_POST['password'];

        $sql = "SELECT * FROM data where username='$name' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        
        $row=mysqli_fetch_assoc($result);
        if(isset($row['username']) || isset($row['password'])){
            echo '<script type="text/JavaScript"> 
     alert("username already exists!");
     </script>';

        }

        else{

            $sql = "INSERT INTO data (username,password) VALUES ('$name','$password')";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo "ERROR:".mysqli_error($conn);
                exit;
            }
            echo "Registration Successful";


        }

       
        mysqli_close($conn);
        ?>
        <p><a href="studentlogin.html">Login</a> to continue</p> 

    </body>
</html>