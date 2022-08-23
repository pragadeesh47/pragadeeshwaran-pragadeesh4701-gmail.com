<html>
    <body>
        <h1 style="text-align:center;">Tutor Details</h1>

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
$course=$_POST['subject'];
$subject=$_POST['topic'];
echo "<div style='text-align:center;'>";
echo "Course : ",$course,"<br>";
echo "Subject : ",$subject;
echo "</div>";
$sql = "SELECT * FROM tutortable WHERE Subjects='$subject'";
$result = mysqli_query($conn,$sql);
if(!$result){
    echo "ERROR:".mysqli_error($conn);
    exit;
}

//$row=mysqli_fetch_assoc($result);

if($result->num_rows>0){
            
    while($row=mysqli_fetch_assoc($result)){
        
    
        echo "<div style='text-align:center'>","Tutor Name : ",$row['Tutor'],"  ","<br>","Place : ",$row['place'],"</div><br>";
        
    }
    echo "<div style='text-align:center;'><a href='success.html'><button>Request</button></a></div>";
    
   
}
else{
        echo "no tutors are available";
    }
mysqli_close($conn);


        ?>
    </body>
</html>