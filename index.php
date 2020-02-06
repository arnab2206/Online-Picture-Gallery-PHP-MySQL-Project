<?php
include('dbconn.php');
/*if(isset($_SESSION['first']))
{
    header('location:login.php');
}*/

if(isset($_SESSION['first']) && !empty($_COOKIE['username']))
{
    header('location:login.php');
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
 
	$sql = "SELECT username, user_pwd,type FROM user WHERE username='$userName' AND user_pwd='$userPwd' AND status='1' ";

	$result = mysqli_query($conn,$sql);
	if($result)
    {
        $row=mysqli_fetch_array($result);
        if($row[2]==0)
        {
           $admin=1;
        }
      $rws=mysqli_num_rows($result);
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
        <title>Welcome to Zona Latina!</title>
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
                if($admin==1){
                    header('location:admin.php');
                }
               //$_SESSION['message']="Logged In Successfully!";
			     else{
                    header('location:login.php');
                 }
                    
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
            <div id="searchbar">
            <table align="center">
          
                <tr><td>
               <input type="text" size="50" class="search" name="search"/>
                <input type="submit" value="SEARCH" class="sub" name="searchBtn"/>
                    </td></tr>
            </table>
            </div>
            <?php if(!empty($_REQUEST['searchBtn'])) { ?>
        <div id="content2">
            
                    <?php
            
            if(!empty($_REQUEST['searchBtn']))
            {   
                $search=$_REQUEST['search'];
                $sql="SELECT * FROM picdetails WHERE pic_des LIKE '%$search%' OR pic_cat LIKE '%$search%'";
                $result=mysqli_query($conn,$sql);
                $rws=mysqli_num_rows($result);
                if($rws>=1){
                while($rws=mysqli_fetch_array($result))
            {
            echo "<img src=uploads/".$rws[1]." &nbsp; height=200 width=200 />"."&nbsp &nbsp;";
            }
                }
                else
                {
                    echo "No Image Found!!";
                }
            }
            
            ?>
                   
                </div>
            
            <?php } else { ?>
            <div id="display">
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
            <div id="footer">
        
        <h3 align="right" style="margin-top:70px;">Zona Latina Inc. &copy; 2010-2018</h3>
    </div>  
        </form>
    </body>
</html>