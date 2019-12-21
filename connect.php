<?php
$conn_mysql=mysql_connect('localhost', 'root', '');
$select_db=mysql_select_db('apapk');

if(!$select_db) {
	die ('connection failed');
	}
?>