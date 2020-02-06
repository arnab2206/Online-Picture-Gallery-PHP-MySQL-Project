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