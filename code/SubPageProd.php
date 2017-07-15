<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cosmetic Utopia</title>
<link href="css/SubPageProd2.css" rel="stylesheet" type="text/css">
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
    if(isset($_GET['PostID'])){
        $_SESSION['PostID']=$_GET['PostID'];}
    echo $_SESSION['PostID'];



    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }

    $result =$mysqli->query("Select *, Post.Image as post_image from Post inner join User on User.UserEmail=Post.UserID where Post.id='".$_SESSION['PostID']."'");

    $row = $result->fetch_array();

    $result_Prod=$mysqli->query("Select * from Post WHERE PostTag1='".$row['PostTag1']."' and PostTag2= '".$row['PostTag2']."'");

    $result_User =$mysqli->query("Select DISTINCT User.Image,User.UserEmail from User inner join Post on User.UserEmail=Post.UserID where Post.PostTag1='".$row['PostTag1']."' and Post.PostTag2= '".$row['PostTag2']."'");

    $result_comment=$mysqli->query("Select DISTINCT User.UserEmail,Comments.CommentContent,User.Image  from Comments join User on Comments.UserID=User.UserEmail where Comments.PostID='".$_SESSION['PostID']."' ");
    if(isset($_SESSION['id'])) {
        $result_Image = $mysqli->query("Select * from User where UserEmail='" . $_SESSION['id'] . "'");
        $row_Image = $result_Image->fetch_array();
    }

    ?>
 
	<!--leftpart-->
	<section class="Prodprofile">
		
	<!--prod-->
		
	<div class="prodimgmain">
    <img src="<?php echo $row['post_image']; ?>" alt=""/>
   
    
    
    </div>
			
	<div class="prodprofile-right">
	<h1 class="prodnametext"><?php echo $row['PostTitle']; ?></h1>
    <h4>Post by
        <?php if($row['Gender']=="male"){ ?>
        <i class="fa" style="color:blue">&#xf222;</i><a class="intrtext" href="SubPageUser2.php?User=<?php echo $row['UserID'] ?>"><?php echo $row['UserName']; ?></a></h4>
        <?php }else{ ?>
            <i class="fa" style="color:red">&#xf221;</i><a class="intrtext" href="SubPageUser2.php?User=<?php echo $row['UserID'] ?>"><?php echo $row['UserName']; ?></a></h4>
        <?php } ?>
        <h2>Brand:
        <a class="intrtext" href="Search2.php?Search=<?php echo $row['Brand'] ?>"><?php echo $row['Brand'] ?></a>
        </h2>
    <!--<h2><a class="fenlei" href="#">#Beauty</a>&nbsp;<a class="fenlei" href="#">#Lip</a></h2>-->
    <h2><a class="fenlei intrtext" href="SubPageCate.php?Category=<?php echo $row['PostTag1'];?>&Sub=<?php echo $row['PostTag2']; ?>">#<?php echo $row['PostTag1'];?>&nbsp;#<?php echo $row['PostTag2'];  ?></a></h2>
    
    
    <?php
     if (isset($_SESSION['id'])) {
    ?>
     <form method="post" id="form5" name="addtowish" action="action.php">
    <button type="submit" name="addtowish" id="addtowishheart" class="addtowishheart"> <i style="font-size:24px" class="hearticon fa">&#xf004;</i></button>
    </form>
    <?php
    }else {
    ?>
         <!--  you have to change here -->
         <a class="account tooltip" >

            <i style="font-size:24px" class="hearticon fa">&#xf004;</i>

             <div class="tooltiptext">Login First</div>
         </a>

    <?php
    }
     ?>
    <div class="fb-share-button" data-href="http://playground.eca.ed.ac.uk/~s1642721/SubPageProd.html" data-layout="button" data-size="large" data-mobile-iframe="true">
        <a class="fb-xfbml-parse-ignore" target="_blank" href="http://playground.eca.ed.ac.uk/~s1642721/SubPageProd.html"></a>
    </div>
  
    </div>
    </section>
	
    <section class="prodmaininfo">
    <h1 class="haichi1" >Product Description&nbsp;
    </h1>
	
    <div class="description-box">
    <p>
    <?php echo $row['PostContent'] ?></p>
    </div>

    <h1 class="haichi1">Comments</h1>
    

    <!--comments-->
    <div class="comments-top">
    <div class="comcover">
    <?php
    if (isset($_SESSION['id'])){
    ?>
    <a href="#"><img src="<?php echo $row_Image['Image'] ?>"/></a>
    <?php }else{ ?>
    <a href="#"><img src="Pics/Default.png"/></a>
    <?php } ?>
    </div>
    <form name="comment" method="post" action="action.php">
    <textarea id="com-text" type="text"  placeholder="Comments your love!" name="com-text" class="commentsForm-input" ></textarea>
    <button type="submit" id="comment" name="comment" class="commentsForm-btn"><span>Submit</span></button>
    </form>
	</div>
        <ul class="comments-display">
	<?php
     while($row_comment = $result_comment->fetch_array())
    {
    ?>
    
        <!--<div class="comments-display">-->
    <li class="user01">
    <div class="user01cover">
    <a href="#"><img src="<?php echo $row_comment['Image'] ?>"/></a>
    </div>
    <span class="user01-comments">
    <?php echo $row_comment['CommentContent']; ?>
    </span>
        </li>
     <?php
     }
    ?>
        
  
	</ul>
        
	<h2 class="haichi2" >Product your may also wish to have...</h2> 
    <ul class="wishkuang">
      <?php
    $i=1;
    while($row_prod = $result_Prod->fetch_array() And $i<=4) {
    $i = $i + 1;
    ?>  
    <li class="wishlistprod">
    <img class="prodcover" id="prodcover" src="<?php echo $row_prod['Image']; ?>" alt="Eyeliner, Unknown Brand"/>

    <div class="wishprodtext">
    <a href="SubPageProd.php?PostID=<?php echo $row_prod['id']; ?>"><h1 class="prodname"><?php echo $row_prod['PostTitle']; ?></h1></a>
    <a href=""><h2 class="brand"><?php echo $row_prod['Brand']; ?></h2></a>
    <a href="SubPageUser2.php?User=<?php echo $row_prod['UserID']; ?>"><h3 class="user"><?php echo $row_prod['UserID']; ?></h3></a>

    </div>       
    </li>
    <?php
    }
    ?>

    </ul>

	
	<h2 class="haichi2">
	Users who have posted similar contents...
	</h2>
    <ul class="userpiclist">
    
    <?php
                        $i=1;
                        while($row_user = $result_User->fetch_array() And $i<=5) {
                            $i = $i + 1;
                            ?>
        
    <li><a href="SubPageUser2.php?User=<?php echo $row_user['UserEmail'] ?>"><img
    src="<?php echo $row_user['Image'] ?>"></a>
    </li>
<?php

                        }
        ?>
        
    
        
    </ul>
    
      
  
    </section>
        	
	<!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php"; ?>
