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
            <font size="5"><p align="left">Online Picture Proof strives to provide amateur and professional photographers with a service that best helps them to maximize their business and client base through a simple and easy to use service. We are a dedicated team of professionals who are passionate about photography. Our service offer high levels of customization for your unique creativity to be best displayed for our clients to enjoy</p>
                <p align ="left"> This Page is developed by:</p>
                <p align="left"><b><u>Arnab Ray (CEO, Founder of this Page)</u>:</b> A third Year CSE student who has always been interested in new technologies. He likes sports, especially football. He is always on the lookout for new challenges.</p>
                <p align="left"><b><u>Avik Bose (Co-Founder of this Page)</u>:</b> Avik is the co-founder of Zona Latina. He is also a third year CSE student. He enjoys reading books, watching football, and other adventures around the globe.</p>
                <p align="left"><b><u>Soumik Chatterjee (Designer)</u>:</b> Soumik lives in Kolkata and he has joined Zona Latina team recently as an online marketer and Designer. He is also a Third Year CSE student. He enjoys travelling, watching football and cricket, and any technical work in which he can express his imagination.</p></font>
            </div>
            </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>  
        </form>
    </body>
</html>