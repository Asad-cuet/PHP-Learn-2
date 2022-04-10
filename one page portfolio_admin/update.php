<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['verified']))
{
      header("location:logout.php");
}
?>
<?php
include 'function.php';
include 'config.php';


      if(!empty($_REQUEST['name']))
      {
            $name=input("name");
      }
      if(!empty($_REQUEST['email']))
      {
            $email=input("email");
      }
      if(!empty($_REQUEST['pass1']))
      {
            $pass1=input("pass1");
      }
      if(!empty($_REQUEST['pass2']))
      {
            $pass2=input("pass2");
      }


      if($pass1==$pass2) 
      {
            $final_pass=md5(md5($pass1));
            $update_query="UPDATE user SET Name='$name',Email='$email',Password='$final_pass' WHERE Id=1";
            $update=mysqli_query($connection,$update_query);
            if($update_query)
            {
                  header("location:setting.php?green_msg"); //Edit
            }
      }
      else
      {
            header("location:setting.php?red_msg");
      }



?>