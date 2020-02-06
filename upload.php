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
        <title>Upload Image</title>
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
        <div id="content2">
           
                </div>
            <div id="album">
                <h3>Album Name:<input type="text" name="albumName" class="search"/></h3>
            &nbsp;&nbsp;&nbsp;<input type="submit" name="albumBtn" value="Create New Album" class="sub"/>
            <?php
            
           
            if(!empty($_REQUEST['albumBtn']))
            {
                $albumName=$_REQUEST['albumName'];
                $sql="INSERT INTO albumdetails VALUES('','$albumName')";
                if (mysqli_query($conn, $sql))
                {
                     $message = "Album created Successfully!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
            ?>
            </div>
            <div id="upload">
            <br/>
                <h3>Upload an Image:<input type="file" name="upload" class="sub"/></h3>
                <h3>Picture Description:<input type="text" name="des" class="search"/></h3>
                <h3>Choose Album to Upload:<select name="cat" id="dropdown-list">
                            <?php $sql = "SELECT * FROM albumdetails";
                $result = mysqli_query($conn,$sql);

                if (!$result) {
                    echo "No Album Exists!";

                }

                while ($row = mysqli_fetch_array($result))
                {
                    echo "<option>".$row[1]."</option>";
                }
                                ?>
                    </select></h3>
                    <input type="submit" name="uploadBtn" value="Upload" class="sub"/>
             <?php 
            if(!empty($_REQUEST['uploadBtn'])){ 
         if($_FILES['upload']['type']=='image/jpeg' || $_FILES['upload']['type']=='image/png'){         
        $name=$_FILES['upload']['name'];
        $file_basename = substr($name, 0, strrpos($name, '.')); // get file name
	    $file_ext = substr($name, strrpos($name, '.')); // get file extention
        $des=$_REQUEST['des'];
        $cat=$_REQUEST['cat'];
        $user=$_COOKIE['username'];
        $newName=md5($file_basename).$file_ext;
        $sql="INSERT INTO picdetails VALUES('','$newName','$des','$cat','$user') ";
        mysqli_query($conn,$sql);
        if(file_exists("uploads/".$newName))
        {
            echo "Image already exists!";
        }

        else{
       
        move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$newName);
        echo "<h3>File uploaded Successfully!</h3>";
        }
    }
    else if(empty($_SESSION['first'])){
        echo "PLEASE LOG-IN FIRST!";
    }
     else{echo "invalid file type";}
    } 
            ?>
                
            </div>
            <br/>
        <a href="index.php" class="sub">Back</a>
      
            </div>
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>  
        </form>
    </body>
</html>