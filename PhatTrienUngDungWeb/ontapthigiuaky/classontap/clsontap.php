<?php
class ontap
{
	public function uploadfile($name, $tmp_name, $folder)
	{
		$name=$folder.'/'.$name;
		if(move_uploaded_file($tmp_name, $name))
		{
			return 1;	
		}
		else
		{
			return 0;	
		}	
	}	
	public function mylogin($user, $pass)
	{
		if($user=='abc@gmail.com' && $pass=='123456' )
		{
			session_start();
			$_SESSION['user']=$user;
			$_SESSION['pass']=$pass;	
			header('location:admin.php');
		}
		else
		{
			return 0;	
		}	
	}
	public function confirmlogin($user, $pass)
	{
		if($user!='abc@gmail.com' || $pass!='123456')
		{
			header('location:login.php');	
		}
		else
		{
			return 0;
		}
	}
}

?>