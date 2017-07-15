<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cosmetic Utopia</title>
<link href="css/SubPageProd3.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="http://playground.eca.ed.ac.uk/~s1642721/Sub2/Pics/Wishlist.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="//code.jquery.com/jquery.js"></script>
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

    $result =$mysqli->query("Select *, Post.Image as post_image from Post inner join User on User.UserEmail=Post.UserID where Post.id='".$_GET['PostID']."'");

    $row = $result->fetch_array();


    if(isset($_SESSION['id'])) {
        $result_Image = $mysqli->query("Select * from User where UserEmail='" . $_SESSION['id'] . "'");
        $row_Image = $result_Image->fetch_array();
    }

    ?>
 
	<!--leftpart-->
	<section class="Prodprofile">
		
	<!--prod-->
		
	<div class="prodimgmain">
        <img src="<?php echo $row['post_image'] ?>" alt=""/>
<form action="action.php" enctype="multipart/form-data" method="post">
    <input name="PostID" type="hidden" id="PostID" value="<?php echo $_GET['PostID'] ?>">
    <label class="changeimg">
    <input name="file" id="file" type="file">
        change
    </label>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">




    </div>
        <div class="prodprofile-right">
            <h1 class="prodnametext editcontent">
                <span class="xiangzuo mingzi">Title:&nbsp;</span>
                <textarea id="edit_title" name="edit_title"><?php echo $row['PostTitle']; ?></textarea>
                <button id="edit1" name="edit1" class="editicon fa">&#xf0c7;</button>
            </h1>
            <h2 class="editcontent"><span class="xiangzuo">Brand:&nbsp;</span>
           <textarea id="edit_brand" name="edit_brand"><?php echo $row['Brand'] ?></textarea></h2>
            <!--<h2><a class="fenlei" href="#">#Beauty</a>&nbsp;<a class="fenlei" href="#">#Lip</a></h2>-->
            <h2 class="editcontent">

                <div class="bianji tag1">
                    <span class="tagtitle">Tag1</span>
                    <select id="Tagone" name="edit_tag1" onchange="changetag()">
                        <option value="">Please select</option>
                        <option value="Beauty">Beauty</option>
                        <option value="Body">Body</option>
                        <option value="Fragrance">Fragrance</option>
                        <option value="Nail">Nail</option>
                    </select>
                </div>


                <div class="bianji tag2">
                    <span class="tagtitle">Tag2</span>
                    <select id="Tagtwo" name="edit_tag2"></select>
                </div>

            </h2>
    </div>
    </section>
	
    <section class="prodmaininfo">
    <h1 class="haichi1" >Product Description&nbsp;
    </h1>
    <div class="description-box">
    <p class="editcontent"><textarea id="edit_content" name="edit_content"><?php echo $row['PostContent'] ?></textarea></p>
    </div>


    </section>
        </form>





        <script>

            $('#save').click(function(){
                $('#save, .info').hide();
                $('textarea').each(function(){
                    var content = $(this).val();//.replace(/\n/g,"<br>");
                    $(this).html(content);
                    $(this).contents().unwrap();
                });

                $('#edit').show();
            });
        </script>
        	
	<!--include 'basicphp/footer.php'-->
        <?php include "basicphp/footer2.php"; ?>
