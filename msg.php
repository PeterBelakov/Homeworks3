 <?php
$pageTitle = 'Форма за съобщения';
include 'includes/header.php';
if( !key_exists('is_logged',$_SESSION) || $_SESSION['is_logged']==0  ){ 
         header('Location: index.php');
         die;
}
mb_internal_encoding('UTF-8');
if($_SESSION['is_logged']  == 1) ;{
echo '<a href="destroy.php">EXIT</а></br>';
    }
 ?>
<a href=>Форма за съобщения</a> 
<form method="POST">    
    <div>Заглавие<input type="text"name="title"/></div>
    <div>Съобщение<textarea name="message"/></textarea>
    <div>
       
    </div>
    <div>
        <input type="submit" value="Запиши"/>
    </div>
</form>
<?php
if($_POST){
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);
    if (mb_strlen($title) < 1) {
        echo '<p>Неозаглавено съобщение!</p>';
        exit;
    }
    if (mb_strlen($title)>50){
        echo '<p>Много дълго заглавие!</p>';
        exit;
    }
    if (mb_strlen($message) < 1) {
        echo '<p>Празно съобщение!</p>';
        exit;
    }
     if (mb_strlen($message) > 250) {
        echo '<p>Максималната дължина на съощенията е 250 символа!</p>';
        exit;
     }
$connection = mysqli_connect( $database['db_host'], $database['db_user'],$database['db_pass'],$database['db_name']);
    if (!$connection) {
        echo 'no datebase';
        $error = true;
        die;
        }
         else{
       $error = false;
   }
     mysqli_set_charset($connection, 'utf8');
    $title = mysqli_real_escape_string($connection, $title);
    $message = mysqli_real_escape_string($connection, $message);
    $sql = 'INSERT INTO msg (title, message, user_id)'
            . ' VALUES("' . $title . '","' . $message . '",'.$_SESSION['user_id'].')';
        
    if (mysqli_query($connection, $sql)) {
        echo 'Записа успешен!';
    }
   
    if (!$error) {

        $_SESSION['is_logged']  = 1;
        header('location: home.php');
    }
    else{
        $_SESSION['is_logged']  = 0;
    }
 
}
include 'includes/footer.php';
?>
    