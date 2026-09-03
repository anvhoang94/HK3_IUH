<?php
class login
{
	public function mylogin($user,$pass)
	{
		if($user=='abc@gmail.com' && $pass=='123456')
		{
			session_start();
			$_SESSION['user']=$user;
			$_SESSION['pass']=$pass;
			header('location:admin.php');	
			exit();
		}
		else
		{
			return 0;	
		}	
	}
	public function confirmlogin($user,$pass)
	{
		if($user!='abc@gmail.com' || $pass!='123456')
		{
			header('location:login.php');	
			exit();
		}	
	}	
}
?>