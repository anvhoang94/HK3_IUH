<?php
class thaotacfile
{
	public function upfile($name, $tmp_name, $folder)
	{
		$newname=$folder."/".$name;
		if(move_uploaded_file($tmp_name,$newname))
		{
			return 1;	
		}
		else
		{
			return 0;
		}
	}	
}
?>