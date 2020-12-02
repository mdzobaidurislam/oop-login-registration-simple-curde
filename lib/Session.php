<?php

class Session{
	// session start function =============
    public static function init(){
    	if (version_compare(phpversion(), '5.4.0','<')) {
    		if (session_id()==' ') {
    			session_start();
    		}
    	}else{
    		if (session_status()== PHP_SESSION_NONE) {
    			session_start();
    		}
    	}
    }
    // session set when user login ===========
    public static function set($key,$value){
    	$_SESSION[$key]=$value;
    }
    // session get the key and value
    public static function get($key){
    	if (isset($_SESSION[$key])) {
    		return $_SESSION[$key];
    	}else{
    		return false;
    	}
    }
     // If session not active user back to login.php file ================
    public static function checkSession(){
    	if (self::get('login')== false) {
    		self::destory();
    		header('location:login.php');
    	}
    	
    }
     // If session  active user back to index.php file ================
    public static function checkLogin(){
    	if (self::get('login')== true) {
    		header('location:index.php');
    	}
    	
    }
 // If session destory and logout system function  ================
    public static function destory(){
    	session_destroy();
    	session_unset();
    	header('location:login.php');
    }
}