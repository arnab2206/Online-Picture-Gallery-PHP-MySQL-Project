<?php
include('dbconn.php');

if(!empty($_REQUEST['submitBtn']))
{   $flag=1;
	$firstName = $_REQUEST['fname'];
    setcookie('firstName',$firstName,time()+3600);
	$lastName = $_REQUEST['lname'];
    setcookie('lastName',$lastName,time()+3600);
	$userId = $_REQUEST['username'];
    setcookie('email',$userId,time()+3600);
	$password = md5($_REQUEST['pwd']);
    setcookie('password',$password,time()+3600);
    $sql2="SELECT * FROM user WHERE username='$userId'";
    $result=mysqli_query($conn,$sql2);
    $rwss=mysqli_num_rows($result);
    if($rwss>=1)
    {
    
       echo "UserName already exists!";
   
    }
    else{
    $sql="INSERT INTO user VALUES('','$firstName','$lastName','$userId','$password','$flag','$flag')";
    if(mysqli_query($conn,$sql)){
    $_SESSION['message3']="Registered Successfully!";
    header('location:index.php');
    }
    else
    {
        echo "Error".mysqli_error($conn);
    }
    }
}
                
      
?>

<html>
    <head>
        <title>Register to  Zona Latina!</title>
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
            
            
            </div>
        </div>
       
        <div id="left">
        <div id="left1">
            <a href="index.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Home</h1></a>
        </div>
        <div id="left2">
            <a href="info.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Contact Us</h1></a>
        </div>
        <div id="left3">
            <a href="info.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">About</h1></a>
        </div>
            </div>
        <div id="content">
        <div id="content2">
            <table align="center">
          
            <h1>Register to Zona Latina to join our WorldWide Community of Free Pictures!</h1>
    <table align="center">
                <tr>
                    <td width="250px"><font size="6">First Name:</font></td><td><font size="5"><input type="text" name="fname" class="search"/></font><br/><br/></td></tr>
        <tr><td><font size="6">Last Name:</font></td><td><font size="5"><input type="text" name="lname" class="search"/></font><br/><br/></td></tr><tr><td><font size="6">Username:</font><td><font size="5"><input type="text" name="username" class="search"/></font><br/><br/></td></tr>
           <tr><td><font size="6">Password:</font><td><font size="5"><input type="password" name="pwd" class="search"/></font><br/><br/></td></tr>
            </table>
        <table align="center">
        <tr><td><input type="submit" class="sub" name="submitBtn"/></td></tr>
    </table>
            </table>
                </div>
        </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>
        </form>
    </body>
</html>