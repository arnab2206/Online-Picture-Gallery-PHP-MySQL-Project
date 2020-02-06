<?php
include('dbconn.php');
if(isset($_SESSION['first']))
{
    header('location:login.php');
}
  if(isset($_SESSION['message2']))
    {
        $message2 = $_SESSION['message2'];
        echo "<script type='text/javascript'>alert('$message2');</script>";
        unset($_SESSION['message2']);
      session_destroy();
    }

if(isset($_SESSION['message3']))
    {
        $message3 = $_SESSION['message3'];
        echo "<script type='text/javascript'>alert('$message3');</script>";
        unset($_SESSION['message3']);
      
    }
$val=1;
$val2=0;
//$_SESSION['first']=$val2;
if(!empty($_REQUEST['loginBtn'])){

    $userName = $_REQUEST['uName'];
	$userPwd = md5($_REQUEST['uPassword']);
    
        
	$sql = "SELECT username, user_pwd FROM user WHERE username='$userName' AND user_pwd='$userPwd' AND status='1' ";

	$result = mysqli_query($conn,$sql);
	if($result)
    {
         $rws = mysqli_num_rows($result);
      
		if($rws==1)
        {
            $error=0;
            $_SESSION['first']=1;
            setcookie('username',$userName,time()+3600);
            
        }        
		else
        {
            $error = 1;
        }

    }
	else
    echo mysqli_error($conn);
}

?>

<html>
    <head>
        <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <tr><td><font size="4">Username : </font></td><td><input type="text" name="uName" class="search"/><br/></td></tr>
                <tr><td><font size="4">Password : </font></td><td><input type="password" name="uPassword" class="search"/></td></tr>
                <tr><td><a href="new_user.php"><input type="submit" name="new" value="NEW USER?" class="sub"></a></td>
                    <?php
                    if(!empty($_REQUEST['new']))
                        header('Location:new_user.php');
                    ?>
                    <td align="right"><a href="reg_user.php"><input type="submit" name="loginBtn" value="LOGIN" class="sub"></a></td>
                <?php
                     
				if(!empty($_REQUEST['loginBtn'])){
                if($error==1){
                $message = "Please Check your credentials!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
               
                }else if($error==0){
                
               $_SESSION['message']="Logged In Successfully!";
			     header('location:login.php');
                
                    
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
            <a href="about.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">About Us</h1></a>
        </div>
        <div id="left3">
            <a href="contact_us.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Contact</h1></a>
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