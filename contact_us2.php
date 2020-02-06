<?php
include('dbconn.php');
if(empty($_SESSION['first']))
{
    header('location:index.php');
}

  if(isset($_SESSION["message"]))
    {
        $message = $_SESSION['message'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        unset($_SESSION['message']);
    }
?>

<html>
    <head>
        <title>About Us</title>
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
        <div id="content2" class="content">
             <font size="5"><p align="left"> Mail us in this e-mail id: <img src="google.png" height="20" width="20"/> officialzonalatina.com.</p>
                <p align="left">Connect us through Facebook: <img src="fb.jpg" height="20" width="20"/> Official Zona Latina.</p>
                <p align="left"> Follow us on Twitter: <img src="twitter.jpg" height="20" width="20"/> ZonaLatinaOfficial.</p>
                <p align="left">Follow us on Instagram: <img src="insta.jpg" height="20" width="20"/> ZonaLatinaOfficial.</p>
                <p align="left">Follow us on Snapchat: <img src="snap.jpg" height="20" width="20"/>  ZonaLatinaOfficial.</p></font>
            </div>
        </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>  
        </form>
    </body>
</html>