<?php
include('dbconn.php');
/*if(empty($_SESSION['first']))
{
    header('location:index.php');
}
*/
  if(isset($_SESSION["message"]))
    {
        $message = $_SESSION['message'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        unset($_SESSION['message']);
    }
?>

<html>
    <head>
        <title>Welcome User!</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
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
                    setcookie('username','',time()-3600);
                    setcookie('PHPSESSID','',time()-3600);
                    session_destroy();
                    header('location:index.php');
                    
                }
                
			?>
                    <td><a href="myAccount.php"><input type="submit" name="accountBtn" value="My Account" class="sub"></a></td>
                    <?php
                    if(!empty($_REQUEST['accountBtn']))
                       {
                           header('location:myAccount.php');
                       }
                    ?>
                    </tr>    
                </table>
                     </div>
                
            </div>
        </div>
       
        <div id="left">
        <div id="left1">
            <a href="login.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Home</h1></a>
        </div>
        <div id="left2">
            <a href="about2.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">About Us</h1></a>
        </div>
        <div id="left3">
            <a href="contact_us2.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Contact</h1></a>
        </div>
            </div>
        <div id="content">
      <!--
        content here of my account
        -->
            <div id="content2">
            <h1>Your Commented Images</h1>
                <br/>
                <div id="comment">
                <?php
                $user=$_COOKIE['username'];
                $sql="SELECT * FROM comments WHERE username='$user'";
                $result=mysqli_query($conn,$sql);
                $rws=mysqli_fetch_array($result);
                
                    /*
                    $users=array("Vito","Joey","Vinny");
                    // glue them together with ', '
                    $userStr = implode("', '", $users);
                    $query="SELECT * FROM users WHERE name in ('$userStr')";
                    */
                $rwsString=implode("','",$rws);
                $sql2="SELECT * FROM picdetails WHERE pic_id IN ('SELECT * FROM comments WHERE username="."'$user'"."')";
                $result2=mysqli_query($conn,$sql2);
                
                ?>
                <table>
                <tr>
                <td>
                <?php
                while($rws2=mysqli_fetch_array($result2))
                {
                    echo "<a href=updateData.php?id=".$rws2[0]."><img src=uploads/".$rws2[1]." &nbsp; "."height=200 width=200 />"."&nbsp; &nbsp;</a>";
                    print_r($rws2);
                }    
                ?>
                </td>
                <td>
                <?php
                while($rws2)
                {
                    echo "$rws[2]";
                } 
                ?>
                </td>
                </tr>    
                </table>
                </div>
            </div>
        </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>  
        </form>
    </body>
</html>