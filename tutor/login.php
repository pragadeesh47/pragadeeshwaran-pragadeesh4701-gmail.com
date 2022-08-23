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
        if(!$result){
            echo "ERROR:".mysqli_error($conn);
            exit;
        }
        
        $row=mysqli_fetch_assoc($result);

        if($name=="admin" && $password==123456){
            header('Location: admin.html');
        }
        else{

            if($row){
                header('Location: student.html');
            }
            else{
                echo "Invalid Credintials";
            }

        }
       
        mysqli_close($conn);
        ?>
    </body>
</html>