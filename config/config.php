<?php
session_start();


// rubah data di bawah ini sessuai phpmyadmin
$host = 'localhost';
$user = 'root';
$pass = '4';
$db   = 'aplikasi_sman_11_banjarmasin';


function base_url($url = null ) {
	$base_url = "http://localhost/aplikasi_sman_11_banjarmasin/";
	if ($url != null ) {
		return $base_url."/".$url;
	} else  {
			return $base_url;
	}
}
