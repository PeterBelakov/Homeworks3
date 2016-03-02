 <?php
$pageTitle = 'Съобщения';

include 'includes/header.php';
if( !key_exists('is_logged',$_SESSION) || $_SESSION['is_logged']==0  ){ 
         header('Location: index.php');
         die;
}
mb_internal_encoding('UTF-8');
$connection = mysqli_connect( $database['db_host'], $database['db_user'],$database['db_pass'],$database['db_name']);
if (!$connection) {
    echo 'no datebase';
    exit;
}
 mysqli_set_charset($connection, 'utf8');
 $q= mysqli_query($connection, 'SELECT *
FROM users 
INNER JOIN msg
ON users.user_id=msg.user_id ORDER BY time DESC ');
     if(!$q){
       echo 'error';
    }
echo'<table border="1px"><tr><td>time</td><td>user_name</td><td>title</td><td>message</td></tr>';
while($row=$q->fetch_assoc()){
    
echo '<tr><td>'.$row['time'].'</td>
      <td>'.$row['user_name'].'</td>   
      <td>'.$row['title'].'</td>
      <td>'.$row['message'].'</td></tr>';
}
echo '</tr>';

if($_SESSION['is_logged']  == 1 );{
echo '<a href="destroy.php">EXIT</а></br>';
    }
?> 
<a href="msg.php">Ново съобщение</а></br>
<?php
include 'includes/footer.php';
?>
    