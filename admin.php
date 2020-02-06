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
        <title>Welcome Admin!</title>
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
                
                <tr><td><h3>Hello! Welcome Admin!<br/></h3></td></tr>
                
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
            <a href="admin.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Home</h1></a>
        </div>
        <div id="left2">
            <a href="about3.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">About Us</h1></a>
        </div>
        <div id="left3">
            <a href="contact_us3.php" style="text-decoration:none; border-bottom:5px solid white;"><h1 style="color:white;">Contact</h1></a>
        </div>
            </div>
        <div id="content">
        <div id="content2" class="content2">
        <!--CONTENT HERE!!! -->
            
          
            
            <?php
            $sql="SELECT * FROM albumdetails";
            $result=mysqli_query($conn,$sql);
            ?>
            <div id="album" class="one">
                <h2 align="center">Albums: </h2>
                <h3>
            <table align="center" class="album">
                <tr>
                <td class="album">Sl.No.</td>
                <td class="album">Album Name</td>
            <?php
            while($rws=mysqli_fetch_array($result))
            {
                echo "<tr><td class="."album".">".$rws[0]."</td><td class="."album".">".$rws[1]."</td></tr>";
            }
            ?>
            </table>
                </h3>
            </div>
            <?php
             $sql="SELECT * FROM user WHERE type='1' AND status='1'";
            $result=mysqli_query($conn,$sql);
            ?>
            <div id="users">
            <h2 align="center">Users Registered:</h2>
            <h3>
            <table align="center" class="album">
                <tr>
                <td class="album">FirstName</td>
                <td class="album">LastName</td>
                <td class="album">Username</td>
                <td class="album">Ban</td>
            <?php
            while($rws=mysqli_fetch_array($result))
            {
                echo "<tr><td class="."album".">".$rws[1]."</td><td class="."album".">".$rws[2]."</td><td class="."album".">".$rws[3]."</td><td class="."album".">"."<a href=ban.php?id=".$rws[0]." &nbsp; class="."two".">Ban</a>"."</td></tr>";
            }
            ?>
            
            </table>
            </h3>    
            </div>
             <?php
             $sql="SELECT * FROM report";
            $result=mysqli_query($conn,$sql);
            $rw=mysqli_num_rows($result);
            ?>
            <?php
                if($rw>=1){
            ?>
            <div id="reported">
            
            <h2 align="center">Reported</h2>
            <h3>
            <table align="center" class="album">
                <tr>
                <td class="album">Reported By</td>
                <td class="album">Reason</td>
                <td class="album">Uploaded By</td>
                <td class="album">Action</td>
                
            <?php
            while($rws=mysqli_fetch_array($result))
            {
                echo "<tr><td class="."album".">".$rws[2]."</td><td class="."album".">".$rws[3]."</td><td class="."album".">".$rws[4]."</td><td class="."album".">"."<a href=view.php?id=".$rws[1]." &nbsp; class="."two".">Remove Image</a>"."</td></tr>";
            }
            ?>
            
            </table>
            </h3>
                
            </div>
            <?php } ?>
        </div>
        </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div> 
            
        </form>
    </body>
</html>