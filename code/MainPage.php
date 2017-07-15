<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cosmetic Utopia</title>
<link href="css/MainPage2.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="http://playground.eca.ed.ac.uk/~s1642721/Sub2/Pics/Wishlist.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>

<body>
 <div id="page-wrap">
 
 
         <!--basicphp/header.php'-->
        <?php include "basicphp/header2.php"; ?>
     <?php
     $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }

    $result1 =$mysqli->query("select * from Post order by PostTime desc");
    $result =$mysqli->query("Select *, Post.id as post_id ,Count(*) as count , Post.Image as post_image, User.Image as user_image from Post inner join Collect  on Post.id=Collect.PostID inner join User on User.UserEmail = Post.UserID group by Collect.PostID order by count desc");
    ?>
     
 
 
  <!--carousel-->
  
  <div class="container2">
      
  <div class="carousel">
    <?php
     $i=1;
    while($row1 = $result1->fetch_array() And $i<=6)
    {
    if ($i==1){
     ?>
    <div class="item1 a"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
    <?php
    }if ($i==2){    ?>
    <div class="item1 b"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
      <?php
    }if ($i==3){    ?>
    <div class="item1 c"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
    <?php
    }if ($i==4){    ?>
    <div class="item1 d"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
    <?php
    }if ($i==5){    ?>
    <div class="item1 e"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
      <?php
    }if ($i==6){    ?>
    <div class="item1 f"><a href="SubPageProd.php?PostID=<?php echo $row1['id']; ?>"><img src="<?php echo $row1['Image']; ?>"/></a></div>
    <?php
    }
    $i=$i+1;
    }
    ?>
  </div>
</div>
  
<div class="button">
<i style="font-size:2em" class="prev fa">&#xf190;</i>
<i style="font-size:2em" class="next fa">&#xf18e;</i>
</div>


 
  <!--main-->
 
 <div class="main">
	 <div class="text"><h2>Our Favourite Wishlist</h2></div>
	 <div class="text"><h3>Let's share our beauty!</h3></div>
 	
     <?php
     $i=1;
    while($row = $result->fetch_array() And $i<=3)
    {
     ?>

 	
 	<!--left-->
     <?php if($i==1){ ?>
 	<div class="item left">
    <?php } else if($i==2){ ?>
    <div class="item middle">
    <?php }else if($i==3){?>
    <div class="item right">
    <?php } ?>
 		<div class="userimage">
 			<a href="SubPageUser2.php?User=<?php echo $row['UserEmail']; ?>"><img src="<?php echo $row['user_image']; ?>"/></a>
 		</div>
 		<h4 class="first"><a href="#"><strong><?php echo $row['UserName']; ?></strong></a> posted on <?php echo date('Y-m-d',$row['PostTime']); ?></h4>
 		<div class="star">
 		<i class="fa fa-star"></i>
<span><?php echo $row['count']; ?> people add to their wishlist </span>
 		<i class="fa fa-star"></i>
 		</div>
 		<h4 class="second descriofpord">No.<?php echo $i; ?></h4>
 		<div class="prodimg2"><a href="SubPageProd.php?PostID=<?php echo $row['post_id']; ?>"><img src="<?php echo $row['post_image']; ?>"></a></div>
 		<h5><a href="SubPageProd.php?PostID=<?php echo $row['post_id']; ?>"><?php echo $row['PostTitle']; ?></a></h5>
 	</div>
 	
 	<?php
     $i=$i+1;   
    }
        ?>
 	 	<!--middle-->
 	 	<!--right-->
 	
 	
 	
 	
 	
 </div>
 
 
 
 
 
 
 
 
 <!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php"; ?>
 
 