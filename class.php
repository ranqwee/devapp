<?php
session_start();
//membuat database
class database
{
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "apapk";
	
	//membuat fungsi untuk koneksi
	function koneksi()
	{
		mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->dbname);
	}
}

class pengguna
{
	function login_pengguna($uid,$pass)
	{
		$pass = $pass;
		$ambildata = mysql_query("SELECT * FROM user_login WHERE username='$uid' AND password='$pass'");
		$hitung = mysql_num_rows($ambildata);
		$pecah = mysql_fetch_array($ambildata);
		if($hitung>0)
		{
			//login
			$_SESSION['id_user'] = $pecah['id_user'];
			$_SESSION['username'] = $pecah['username'];
			$_SESSION['password'] = $pecah['password'];
			$_SESSION['departemen'] = $pecah['departemen'];
			$_SESSION['hak_akses'] = $pecah['hak_akses'];
			return true;
		}
		else
		{
			return false;
		}
			
	}
	function logout_pengguna()
	{
		session_destroy();
	}
}

$db = new database();
$db->koneksi();
$pengguna = new pengguna();
?>