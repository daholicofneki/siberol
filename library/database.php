<?php
class DB
{
	public static function koneksi() {
		@mysql_pconnect ('localhost' , 'root', '') or die ('failed to connect');
		@mysql_select_db ('siberol') or die ('database does not exist');
	}
	
	public static function get_all ($query = FALSE)
	{
		DB::koneksi();
		$q = mysql_query ($query);

		if ($q)
		{
			$q = mysql_fetch_object ($q);
			$arr = array();

			foreach ($q as $data)
			{
				$arr[] = $data;
			}
			return $arr;
		}
	}
	
	public static function query ($query = FALSE)
	{
		DB::koneksi();

		$q = mysql_query ($query);
		if ($q)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}
}


