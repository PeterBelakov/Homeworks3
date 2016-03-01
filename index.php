<?php
$pageTitle = 'Форма';
include 'includes/header.php';
# slaga utf-8 encoding za da raboti kirilica
mb_internal_encoding('UTF-8');




if( key_exists('is_logged',$_SESSION) && $_SESSION['is_logged']==1){ 
         header('Location: home.php');
         die;
} 
if($_POST){
   // print_r($_POST);
    //die;
    $username = trim($_POST['username']);
    $password =trim($_POST['password']);

    $connection=mysqli_connect('localhost', 'Petyo', 'qwerty', 'homework3');
   if(!$connection){
       echo 'no datebase';
       exit;
   }
   mysqli_set_charset($connection, 'utf8');
   $q= mysqli_query($connection, 'SELECT * FROM users 
           WHERE user_name=("'.$username.'")AND password=("'.$password.'")');
   
   
   
   
    if($q->num_rows == 0){
       echo 'Грешна парола или потребителско име!';
        $error = true;
       
   }else{
       $error = false;
   }
  
      
    #proverka dalli ima namerena greshka
    if (!$error) {

        $_SESSION['is_logged']  = 1;
        while($row=$q->fetch_assoc()){
            $_SESSION['user_id']=$row['user_id'];
         //  print_r($_SESSION);die;
        }
        header('location: home.php');
    }
    else{
        $_SESSION['is_logged']  = 0;
    }
   
}

?>
<a href=>Форма за вход</a> 
<form method="POST" enctype="multipart/form-data">    
    <div>Име<input type="text"name="username"/></div>
    <div>Парола<input type="text"name="password"/></div>
    <div>
       
    </div>
    <div>
        <input type="submit" value="Login"/>
    </div>
</form>
<a href="forma.php">Регистрация на потребител</а></br>
<?php
include 'includes/footer.php';
?>
    