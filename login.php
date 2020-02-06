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
                    <!--<td><a href="myAccount.php"><input type="submit" name="accountBtn" value="My Account" class="sub"></a></td>-->
                    <?php
                    if(isset($_REQUEST['accountBtn']))
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
        <div id="content2">
            
               <input type="text" size="50" name="search" class="search"/>
                <input type="submit" value="Search" class="sub" name="searchBtn" default/>
                 <input type="submit" value="Upload Image" class="sub" name="uploadBtn"/>
            <?php
            if(!empty($_REQUEST['uploadBtn']))
            {
                header('location:upload.php');
            }
            ?>
                </div>

            <br/><select name="select" id="dropdown-list">
     <?php  
             $sql = "SELECT * FROM albumdetails";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "No Album Exists!";
    
}

while ($row = mysqli_fetch_array($result))
{
    echo "<option>".$row[1]."</option>";
}
   ?>
            </select>
    <input type="submit" name="sub" value="Show" class="sub"/> 
            
            <!--upload and album content here-->
            
            
            
            
            <div id="adjust">
                <br/>
            <?php if(!empty($_REQUEST['sub'])){ ?>
            <div id="display">
            <!--Content part of logged in user-->
            
            
            <?php
            
            
            if(!empty($_REQUEST['sub'])){
            $cat=$_REQUEST['select'];
            setcookie('cat',$cat,time()+3600);
            $sql="SELECT * FROM picdetails WHERE pic_cat='$cat' ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
                if(empty($row))
                {
                    echo "No image exists!";
                }
            while($rws=mysqli_fetch_array($result))
            {
            ?>    
            <div id="image">
            
            <?php  echo "<a href=updateData.php?id=".$rws[0]."><img src=uploads/".$rws[1]." &nbsp; "."height=200 width=200 />"."&nbsp; &nbsp;</a>";
            
                ?>
                
            </div>
                <?php
            }
            }
            ?>
            </div>
            <?php } elseif(!empty($_REQUEST['searchBtn'])){ ?>
            <div id="show">
                      <?php
           
                $search=$_REQUEST['search'];
                $sql="SELECT * FROM picdetails WHERE pic_des LIKE '%$search%' OR pic_cat LIKE '%$search%'";
                $result=mysqli_query($conn,$sql);
                $rws=mysqli_num_rows($result);
                if($rws>=1){
                while($rws=mysqli_fetch_array($result))
            {
            echo "<a href=updateData.php?id=".$rws[0]."><img src=uploads/".$rws[1]." &nbsp; "."height=200 width=200 />"."&nbsp; &nbsp;</a>";
            }
                }
                else
                {
                    echo "<style="."font-size:1.1em; color:red;".">No Image Found!!";
                }
            
            
            ?>
            </div>
        <?php } else { ?>
            <div id="random">
            <?php
            $sql4="SELECT * FROM picdetails ORDER BY RAND() LIMIT 10";
            $result4=mysqli_query($conn,$sql4);
            while($rws4=mysqli_fetch_array($result4))
            {
                echo "<a href=updateData.php?id=".$rws4[0]."><img src=uploads/".$rws4[1]." &nbsp; "."height=200 width=200 />"."&nbsp; &nbsp;</a>";
            }
            ?>
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