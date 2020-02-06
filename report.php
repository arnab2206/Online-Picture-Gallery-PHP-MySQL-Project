<?php
include('dbconn.php');
$picID=$_REQUEST['id'];
/*$commentTable="comment"."$picID";
$tab=$_COOKIE['cat'];
$sql="SELECT * FROM picdetails WHERE pic_id='$picID'";
$result=mysqli_query($conn,$sql);
$rws=mysqli_fetch_array($result);
if(!empty($_REQUEST['commentBtn']))
{   $comment=$_REQUEST['comment'];
   $sql2="SHOW TABLES FROM comments";
 $res=mysqli_query($conn3,$sql2);
 $flag=0;
 while($rows=mysqli_fetch_array($res))
 {
     if($rows[0]==$commentTable)
         $flag=1;
 }
 if($flag==0)
 {
    $sql="CREATE TABLE $commentTable (
id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
comment VARCHAR(1000) NULL)";
if (mysqli_query($conn3, $sql)) {
    $sql2="INSERT INTO $commentTable VALUES('','$comment')";
    mysqli_query($conn3,$sql2);
} 
else {
    echo "Error creating table: " . mysqli_error($conn2);
}
 }
 else
 {
     $sql2="INSERT INTO $commentTable VALUES('','$comment')";
    mysqli_query($conn3,$sql2);
 }

    
}
*/

if(!empty($_REQUEST['commentBtn']))
{
    $comment=$_REQUEST['comment'];
    $user=$_COOKIE['username'];
    $date=date('y/m/d');
    $sql="INSERT INTO comments VALUES('','$picID','$comment','$user','$date')";
    mysqli_query($conn,$sql);
 
}
?>

<html>
    <head>
        <title>Report:We are Sorry for your inconvenience!</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
        <div class="wrapper">
        
        <div class="header">
        
            <div class="headerpic">
            <img src="image.jpg" height="240" width="225"/>
            </div>
            
            <div class="heading">
                <h1 align="center" style="font-weight=bold; font-height=200;">ZONA LATINA</h1>
                        
            </div>
                <div class="login">
            <table align="center">
                
                <tr><td><h3>Hello! Welcome <?php $user=$_COOKIE['username']; $sql="SELECT fname,lname FROM user WHERE username='$user'"; $result=mysqli_query($conn,$sql); $row=mysqli_fetch_array($result);
                    echo $row[0]."&nbsp;".$row[1];
                    ?> <br/></h3></td></tr>
                
                <tr><td><a href="index.php"><input type="submit" name="logoutBtn" value="Logout" class="sub"></a></td>
                    <?php
                if(!empty($_REQUEST['logoutBtn']))
                {   
                    if(empty($_COOKIE['username']))
                    {
                      $message = "Common sense, first you should login!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    else{
                    setcookie('username','',time()-3600);
                    setcookie('PHPSESSID','',time()-3600);
                    $_SESSION['message2'] = "Logged Out Successfully!";
                    header('location:index.php');
                    }
                }
                
			?>
                    </tr>    
                </table>
                     </div>
            
            </div>
        </div>
       
        <div id="left">
        <div id="left1">
            <a href="index.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Home</h1></a>
        </div>
        <div id="left2">
            <a href="about2.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">About Us</h1></a>
        </div>
        <div id="left3">
            <a href="contact_us2.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Contact</h1></a>
        </div>
            </div>
        <div id="content">
        <div id="content2">
         <!--Content of comment page!-->
            <div id="img">
          <?php
                
                $sql3="SELECT * FROM picdetails WHERE pic_id='$picID'";
                $res=mysqli_query($conn,$sql3);
                $row=mysqli_fetch_array($res);
                echo "<img src=uploads/".$row[1]." &nbsp; height=350 width=350 />";
            ?>
            </div>
            <br/>
       
            <br/><br/>
            <div id="comment">
                <h3>Reason: &nbsp;<input type="text" name="report" class="search" />
                <input type="hidden" name="id" value="<?php echo $picID ?>"/>
                    <input type="submit" name="reportBtn" value="Report" class="sub"/></h3>
                <?php
                if(!empty($_REQUEST['reportBtn']))
            {   
                $reason=$_REQUEST['report'];
                $user=$_COOKIE['username'];
                $temp="SELECT username FROM picdetails WHERE pic_id='$picID'";
                $result=mysqli_query($conn,$temp);
                $row=mysqli_fetch_array($result);
                $sql="INSERT INTO report VALUES('','$picID','$user','$reason','$row[0]')";
                if(mysqli_query($conn,$sql))
                {
                    $message = "Submitted for Review! Please be patient until the issue resolves!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                else
                {   
                    $message="Error to Report!".mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                    
                header('location:login.php');

            }
                ?>
            </div>
            <br/>
            <a href="index.php" class="sub">Back</a>    
            
            
            
                </div>
        </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>
        </form>
    </body>
</html>