<?php
session_start();
?>
<?php
if (isset($_POST["register"])){
    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }
    $stmt = $mysqli->prepare("INSERT INTO User(UserEmail,Password,UserName,Gender) VALUES('$_POST[inputemail]','$_POST[inputpassword]','$_POST[inputusername]','$_POST[gender]')");
    $stmt->execute();
    echo "<h3>register successfully,thank you<h3>";
    header("refresh:1;url=MainPage.php");

}
?>

<?php
if (isset($_POST["search"])){
    $_SESSION['search']=$_POST['searchname'];
    $search=$_POST['searchname'];
   // echo '<script language="javascript">;document.location="http://playground.eca.ed.ac.uk/~s1626266/Search.php?";</script>';
    header("refresh:0;url=Search2.php?Search=".$search);

}
    ?>



<?php


    if (isset($_POST["login"])){
    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
    printf("connect failed",$mysqli->connect_error);
    exit();
    }
    $stmt2 = $mysqli->query("SELECT id from User where (UserEmail='$_POST[loginemail]'and Password='$_POST[loginpassword]')");
    $row=$stmt2->fetch_array();
    if(isset($row['id'])){
    $_SESSION['id']=$_POST['loginemail'];
    echo "<h3>login successfully,thank you<h3>";
    header("refresh:1;url=MainPage.php");
    }else{
    echo "login failed";
        header("refresh:0.5;url=MainPage.php");
    }
    }
?>

<?php


    if (isset($_POST["logout"])){
    
    echo "<h3>logout successfully,thank you<h3>";
    unset($_SESSION['id']);
    header("refresh:1;url=MainPage.php");
    
    }
?>



<?php
if (isset($_POST["addtowish"])){
    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }
    $stmt = $mysqli->prepare("INSERT INTO Collect(UserID,PostID) VALUES('".$_SESSION['id']."','".$_SESSION['PostID']."')");
    if($stmt->execute()){
        echo "successfully added";
    }
   // echo '<script language="javascript">;document.location="SubPageProd.php";</script>';
    header("refresh:0.5;url=SubPageProd.php?PostID=".$_SESSION['PostID']);

}
?>

<?php
if (isset($_POST["comment"])){
    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }
    $stmt = $mysqli->query("INSERT INTO Comments(UserID,PostID,CommentContent) VALUES('".$_SESSION['id']."','".$_SESSION['PostID']."','".$_POST['com-text']."')");
    echo "comment successfully";
    header("refresh:0.5;url=SubPageProd.php");

}
?>



<?php
if (isset($_POST["post"])) {

    $time = time();
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "Pics/" . $time);
    }

    $url = "Pics/" .$time;
    $mysqli = new MySQLi("127.0.0.1", "s1626266", "8WkFQFXtWl", "s1626266");
    if ($mysqli->connect_errno) {
        printf("connect failed", $mysqli->connect_error);
        exit();
    }
    $id=$_SESSION['id'];
    $stmt = $mysqli->prepare("INSERT INTO Post(UserID,PostTitle,PostContent,Brand,PostTag1,PostTag2,PostTime,Image) VALUES('$id','".$_POST['PostTitle']."','".$_POST['PostContent']."','".$_POST['Brand']."','".$_POST['Tag1']."','".$_POST['Tag2']."','$time','$url')");
    if($stmt->execute()){
        echo 'succussfully comment';
        header("refresh:0.5;url=MainPage.php");
    }
    header("refresh:0.5;url=MainPage.php");
        //echo "<h3>register successfully,thank you<h3>";

}

        ?>


<?php
if (isset($_POST["UserImage"])) {
    $time = time();
    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "UserImage/" . $time);
    }

    $url = "UserImage/" .$time;
    $mysqli = new MySQLi("127.0.0.1", "s1626266", "8WkFQFXtWl", "s1626266");
    if ($mysqli->connect_errno) {
        printf("connect failed", $mysqli->connect_error);
        exit();
    }
    echo $_SESSION['id'];
    $stmt = $mysqli->prepare("Update User Set Image = '$url' WHERE UserEmail = '".$_SESSION['id']."' ");
    if($stmt->execute()){
        echo 'succuss';
    };
    echo '<script language="javascript">;document.location="SubPageUser.php";</script>';


}

?>

<?php
if (isset($_POST["delete_wish"])) {
    $mysqli = new MySQLi("127.0.0.1","s1626266","8WkFQFXtWl","s1626266");
    if ($mysqli->connect_errno){
        printf("connect failed",$mysqli->connect_error);
        exit();
    }
    $stmt = $mysqli->prepare("delete from Collect where PostID='".$_POST['wish_post']."' and UserID='".$_SESSION['id']."' ");
    if ($stmt->execute()) {
        echo 'succussfully delete';

    }
    header("refresh:0.5 ;url=SubPageUser.php");

}
?>

<?php
if (isset($_POST["edit"])) {
    header("refresh:0.5 ;url=SubPageProd3.php?PostID=".$_POST['edit_post']);
}
?>
<?php
if(isset($_POST['edit1'])){
    $time = time();
    $mysqli = new MySQLi("127.0.0.1", "s1626266", "8WkFQFXtWl", "s1626266");
    if ($mysqli->connect_errno) {
        printf("connect failed", $mysqli->connect_error);
        exit();
    }
    if(isset($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "Pics/" . $time);
        }
        $url = "Pics/" .$time;
        $stmt = $mysqli->prepare("Update Post Set Image = '$url', PostTitle='" . $_POST['edit_title'] . "', PostContent='" . $_POST['edit_content'] . "', Brand='" . $_POST['edit_brand'] . "', PostTag1='" . $_POST['edit_tag1'] . "', PostTag2='" . $_POST['edit_tag2'] . "'
            WHERE id = '" . $_POST['PostID'] . "' ");
    }else{
        $stmt = $mysqli->prepare("Update Post Set PostTitle='" . $_POST['edit_title'] . "', PostContent='" . $_POST['edit_content'] . "', Brand='" . $_POST['edit_brand'] . "', PostTag1='" . $_POST['edit_tag1'] . "', PostTag2='" . $_POST['edit_tag2'] . "'
            WHERE id = '" . $_POST['PostID'] . "' ");
    }
    if($stmt->execute()){
        echo 'succussfully edit';
        header("refresh:0.5 ;url=SubPageUser.php");
    }
}

?>

<?php
if(isset($_POST['email'])){
    $to=$_POST['emailadd'];
    $subject="Thank you for your suggestion";
    $message="Thank you for your suggestion, we'll take your suggestion into consideration. From Cosmetic Utopia";
    $headers = 'From: yesi199408@gmail.com' . "\r\n" .
        'Reply-To: yesi199408@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
   if(mail($to, $subject, $message)){
       echo "We've sent an email to you, Thanks!" ;
   }
    header("refresh:0.5 ;url=MainPage.php");
}

?>
