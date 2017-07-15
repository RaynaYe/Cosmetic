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
$_SESSION['search']=$_GET['Search'];
$mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
if ($mysqli->connect_errno){
    printf("connect failed",$mysqli->connect_error);
    exit();
}
$result = $mysqli->query("Select * from Post where (PostTag1 like '%".$_SESSION['search']."%' or PostTag2 like '%".$_SESSION['search']."%'or PostTitle like '%".$_SESSION['search']."%' or Brand like '%".$_SESSION['search']."%' or PostContent like'%".$_SESSION['search']."%' or UserID like'%".$_SESSION['search']."%' 
)");

$result_brand =$mysqli->query("Select distinct(Brand) from Post where (PostTag1 like '%".$_SESSION['search']."%' or PostTag2 like '%".$_SESSION['search']."%'or PostTitle like '%".$_SESSION['search']."%' or Brand like '%".$_SESSION['search']."%' or PostContent like'%".$_SESSION['search']."%' or UserID like'%".$_SESSION['search']."%'
)");

?>
       
        
    <!--maininfo-->
    <section class="cate-poster">
    <span class="cate-title">
       <?php echo $_SESSION['search'];?>
    </span>
    </section>
        
    <section class="cate-main">   
    <div class="left-main">
    <h3><a><?php echo  $_SESSION['search']; ?></a> > </h3>
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
            <form action="Search2.php?Search=<?php echo $_SESSION['search']  ?>" method="post">
           
            <?php
            while ($row2=$result_brand->fetch_array()) {
            ?>
            
            <li class="selectiontext">
            <input type="checkbox" name="formbrand[]"  value="<?php echo $row2['Brand'] ?>" id="checkbox">
            <label><span class="label"><?php echo $row2['Brand'] ?></span></label>
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
           $N = count($form);
           echo("You selected $N brand(s): ");
        for($i=0; $i < $N; $i++)
           {
         echo($form[$i] . " ");
           }
    $ids = join("','",$form);
   // $result = $mysqli->query("Select * from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' and Brand in ('$ids') ");
   // $result_brand = $mysqli->query("Select DISTINCT Brand from Post where PostTag1='" . $_GET['Category'] . "' and PostTag2='" . $_GET['Sub'] . "' ");

    $result = $mysqli->query("Select * from Post where (PostTag1 like '%".$_SESSION['search']."%' or PostTag2 like '%".$_SESSION['search']."%'or PostTitle like '%".$_SESSION['search']."%' or Brand like '%".$_SESSION['search']."%' or PostContent like'%".$_SESSION['search']."%' or UserID like'%".$_SESSION['search']."%' ) and Brand in ('$ids')
");

$result_brand =$mysqli->query("Select distinct(Brand) from Post where (PostTag1 like '%".$_SESSION['search']."%' or PostTag2 like '%".$_SESSION['search']."%'or PostTitle like '%".$_SESSION['search']."%' or Brand like '%".$_SESSION['search']."%' or PostContent like'%".$_SESSION['search']."%' or UserID like'%".$_SESSION['search']."%') and Brand in ('$ids')
");
            }
          }
            //if (isset($_POST['mac'])) {
            //echo $_POST['mac'];
             //}
            ?>
                <input type="submit" name="formSubmit" value="submit"  id="submit" />
            </form>
	
        </ul>
        </div>   
        
    </div>
      
     <div class="right-main">  
    <div class="right-sort">
    <label class="sortbytext">Sort By</label>
    <select name="sortbyselect" class="sortbyselect">
    <option>Default</option>
    <option>Latest</option>
   	<option>A-Z</option>
    </select>
    
    <div class="pagination">
    <a href="#">&laquo;</a>
    <a class="active" href="#">1</a>
    <a href="#">&raquo;</a>
    </div>     
    </div>


         
         
    <div class="prodcontainer">
    
    <ul>
    
       


    <?php
    while($row = $result->fetch_array())
    {
    ?>
        <li class="prodlist">
            <img class="prodcover" id="prodcover" src="<?php echo $row['Image']; ?>" alt="Cream,Nieva"/>
            
            <div class="prodlisttext">
                <a href="SubPageProd.php?PostID=<?php echo $row['id']; ?>"><h1 class="prodname"><str><?php echo $row['PostTitle']; ?></str></h1></a>
                <a href=""><h2 class="brand"><?php echo $row['Brand']; ?></h2></a>
                <i class="fa" style="color:blue">&#xf222;</i><a href=""><h3 class="user"><?php echo $row['UserID']; ?></h3></a>
            </div>
        </li>
        <?php
    }
    ?>
        
    </ul>
    </div>   
    
    </div>
    
    </section>
        

  <!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php"; ?>