<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosmetic Utopia</title>
    <link href="css/SubPageCate2.css" rel="stylesheet" type="text/css">
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

$mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
if ($mysqli->connect_errno){
    printf("connect failed",$mysqli->connect_error);
    exit();
}
if(isset($_GET['Sub'])) {
    $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' ");
    $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' ");
}else{
    $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "'  ");
    $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' ");
}

?>
        
    <!--maininfo-->
    <section class="cate-poster">
    <span class="cate-title">
        <?php echo $_GET['Category'];?> 
    </span>
    </section>
        
    <section class="cate-main">   
    <div class="left-main">
    <h3><a><?php echo $_GET['Category'] ?></a> > <?php
    if(isset($_GET['Sub'])){ echo $_GET['Sub']; }
    ?> </h3>
    <!--<h3><?php echo $_GET['Category'] ?></h3>
    <?php
    if(isset($_GET['Sub'])){
    ?>
   	<a ><h4><?php echo $_GET['Sub'] ?></h4></a>
    <?php
    }
    ?>-->
    
        
        <div class="left-down">
        <h3>Brand</h3>	
        <ul>
            <?php if(isset($_GET['Sub'])){ ?>
            <form action="SubPageCate.php?Category=<?php echo $_GET['Category'] ?>&Sub=<?php echo $_GET['Sub'] ;?>" method="post">
            <?php }else{ ?>
                <form action="SubPageCate.php?Category=<?php echo $_GET['Category'] ?>" method="post">
                    <?php }?>
           
            <?php
            while ($row_brand=$result_brand->fetch_array()) {
            ?>
            <li class="selectiontext">
            <input type="checkbox" name="formbrand[]"  value="<?php echo $row_brand['Brand'] ?>" id="checkbox">
            <label><span class="label"><?php echo $row_brand['Brand'] ?></span></label>
            </li>
            
           
           
            <?php
            }
            if(isset($_POST['formbrand'])){
            $form = $_POST['formbrand'];
            if(empty($form)) 
            {
           echo("You didn't select any brand");
            } 
           else
            {
           $N = count($form);?>
           <h1 class="selectedbrand"> You selected <?php echo  $N?> brand(s):&nbsp;</h1>

        <?php for($i=0; $i < $N; $i++) { ?>
               <h1 class="selectedbrand">  <?php echo  $form[$i] ;?> &nbsp; </h1>
          <?php }
     $ids = join("','",$form);
    if(isset($_GET['Sub'])) {
    $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' and Brand in ('$ids') ");
    $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' ");
    }else{
    $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and Brand in ('$ids') ");
    $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' ");
}
           
            }
          }
            ?>
                <input type="submit" name="formSubmit" value="submit"  id="submit" class="brandselect"/>
            </form>
	
        </ul>
        </div>   
        
    </div>
      
     <div class="right-main">  
    <div class="right-sort">
    <label class="sortbytext">Sort By</label>

        <?php if(isset($_GET['Sub'])){ ?>
        <form action="SubPageCate.php?Category=<?php echo $_GET['Category'] ?>&Sub=<?php echo $_GET['Sub'] ;?>" method="post">
            <?php }else{ ?>
            <form action="SubPageCate.php?Category=<?php echo $_GET['Category'] ?>" method="post">
                <?php }?>
    <select name="sortbyselect" id="sortbyselect" class="sortbyselect" onchange="this.form.submit()">
    <option>Please Seclect</option>
        <option>Default</option>
    <option>Latest</option>
   	<option>A-Z</option>
    </select>
                <!--<noscript><button type="submit" id="sort" value="sort"></noscript>-->
        </form>

            <?php
            if(isset($_POST['sortbyselect'])){

                if($_POST['sortbyselect']=="Latest") {
                    if (isset($_GET['Sub'])) {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' order by PostTime desc");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' order by PostTime desc ");
                    } else {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' order by PostTime desc ");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' order by PostTime desc ");
                    }
                }

                if($_POST['sortbyselect']=="Default") {
                    if (isset($_GET['Sub'])) {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' ");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "'  ");
                    } else {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' ");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "'");
                    }
                }


                if($_POST['sortbyselect']=="A-Z") {
                    if (isset($_GET['Sub'])) {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' order by PostTitle asc");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' order by PostTitle asc ");
                    } else {
                        $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' order by PostTitle asc ");
                        $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' order by PostTitle asc ");
                    }
                }

            }
            ?>
    

    </div>


         
         
    <div class="prodcontainer">
    
    <ul>
    



    <?php
    while($row = $result->fetch_array())
    {
    ?>
        <li class="prodlist">
            <a href="SubPageProd.php?PostID=<?php echo $row['id']; ?>"><img class="prodcover" id="prodcover" src="<?php echo $row['Image']; ?>" alt="Cream,Nieva"/>
            
            <div class="prodlisttext">
                <a href="SubPageProd.php?PostID=<?php echo $row['id']; ?>"><h1 class="cpmz prodname"><?php echo $row['PostTitle']; ?></h1></a>
                <a href="Search2.php?Search=<?php echo $row['Brand']; ?>"><h2 class="brand"><?php echo $row['Brand']; ?></h2></a>
                <a href="SubPageUser2.php?User=<?php echo $row['UserID']; ?>"><h3 class="user"><?php echo $row['UserID']; ?></h3></a>
                
            </div>
        </li>
        <?php
    }
    ?>
        <!---->
    </ul>
    </div>   

    </div>
    
    </section>
        

  <!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php";
$mysqli->close();
?>