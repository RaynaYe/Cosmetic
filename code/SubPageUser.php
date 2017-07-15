<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cosmetic Utopia</title>
<link href="css/SubPageUser2.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="http://playground.eca.ed.ac.uk/~s1642721/Sub2/Pics/Wishlist.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    </head>

    <body>
    <div id="page-wrap">
        
    
    <!--basicphp/header.php'-->

        <!--Header-->
        <?php include "basicphp/header2.php"; ?>
        <?php
$id=$_SESSION['id'];
$mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
if ($mysqli->connect_errno){
    printf("connect failed",$mysqli->connect_error);
    exit();
}
$result = $mysqli->query("Select * from Post where (UserID='$id') ");
        $result_number = $mysqli->query("Select count(*) as count from Post where (UserID='$id') ");
        $row_number=$result_number->fetch_array();
$result_User = $mysqli->query("Select * from User where (UserEmail='$id') ");
$row_User=$result_User->fetch_array();
$result_wish=$mysqli->query("Select DISTINCT Post.* from Post JOIN Collect ON Post.id=Collect.PostID where Collect.UserID='$id'");
$result_wish_number=$mysqli->query("Select count(*) as count from Post JOIN Collect ON Post.id=Collect.PostID where Collect.UserID='$id'");
        $row_wish_number=$result_wish_number->fetch_array();
?>

    <!--maininfo-->
    <section class="userprofile">
        <div class="profleft">
                <div class="profileimg">
                    <img src="<?php echo $row_User['Image']?>" />
                    <form enctype="multipart/form-data" action="action.php" method="post">
                    <label class="changeimg">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input name="file" id="file" type="file">
                        Change Picture
                    </label>
                    <button type="submit" class="userimguploadbtn" id="UserImage" name="UserImage">Submit</button>
                </div>
            </form>
        </div>
   
    <div class="profiledescri">
    <h1 class="userpageusername"><?php echo $row_User['UserName']; ?>&nbsp;

        <?php if($row_User['Gender']=="male"){ ?>
            <i class="fa" style="color:blue">&#xf222;</i>
        <?php }else{ ?>
            <i class="fa" style="color:red">&#xf221;</i>
        <?php } ?>
    </h1>

    </div>   
    </section> 
    
    <section class="productlist">
        
    <h1>My Cosmetic&nbsp;<span class="mycosnum">(<?php echo $row_number['count']; ?>)</span></h1>
    <div class="coskuang">
    <ul>
  <?php

    while($row = $result->fetch_array() ) {
        ?>
    <li class="coslistprod">
    <img src="<?php echo $row['Image']; ?>"/>
    <div class="cosprodtext">
    <a href="SubPageProd.php?PostID=<?php echo $row['id']; ?>"><h1 class="prodname"><?php echo $row['PostTitle'] ?></h1></a>
    <a href=""><h2 class="brand"><?php echo $row['Brand'] ?></h2></a>
        <form action="action.php" method="post">
            <input type="hidden" id="edit_post" name="edit_post" value="<?php echo $row['id'] ?>">
    <button  name="edit" id="edit" class="editbtn fa">&#xf044;</button>
        </form>

    </div> 
    <?php
    }
    ?>
    </ul>
    </div>

 

    <h1>My Wishlist&nbsp;<span class="mywishnum">(<?php echo $row_wish_number['count'] ?>)</span></h1>
    <div class="wishkuang">
    <ul>

        <?php
    while($row_wish = $result_wish->fetch_array()) {

        ?>
        
    <li class="wishlistprod">
    <img class="prodcover" id="prodcover" src="<?php echo $row_wish['Image'] ?>" alt="Eyeliner, Unknown Brand"/>

    <div class="wishprodtext">
    <a href="SubPageProd.php?PostID=<?php echo $row_wish['id']; ?>"><h1 class="prodname"><?php echo $row_wish['PostTitle'] ?></h1></a>
    <a href=""><h2 class="brand"><?php echo $row_wish['Brand'] ?></h2></a>
            <a href="SubPageUser2.php?User=<?php echo $row_wish['UserID'] ?>">
                <h3 class="user"><?php echo $row_wish['UserID'] ?></h3></a>
                <form action="action.php" method="post">
                    <input type="hidden" id="wish_post" name="wish_post" value="<?php echo $row_wish['id'] ?>">
    <button id="delete_wish" name="delete_wish" style="font-size:24px" class="fa">&#xf014;</button>
        </form>
    </div>       
    </li>
    <?php
    }
    ?>
        
        
    </ul>
    </div>

        
    </section>
        

        
     <!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php"; ?>