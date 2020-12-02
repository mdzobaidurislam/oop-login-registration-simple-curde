<?php
require_once('Session.php');
require_once('Database.php');

class User{

    private $db;

    public function __construct(){
        $this->db=new Databese;
    }

    // Registration user and insert data ================

    public function UserRegistration($data)
    {
    	$name        = $data['name'];
    	$username    = $data['username'];
    	$email       = $data['email'];
    	$password    = $data['password'];
    	$che_email=$this->emailCheck($email);

    	if (empty($name) OR empty($username) OR empty($email) OR empty($password)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
    		return $msg;
    	}
    	if (strlen($username) < 3) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Username is too short at least 4 word!. </div>";
    		return $msg;

    	}elseif ( preg_match('/[^a-z0-9]+/i', $username)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Username must only contain,alphanumerical,dashes and underscores!. </div>";
    		return $msg;
    	}
    	if (strlen($password) < 6) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Password to be short al lest 7 disit!. </div>";
    		return $msg;

    	}
    	if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Email not valid!. </div>";
    		return $msg;
    	}
    	if ($che_email==true) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Email is already exit!. </div>";
    		return $msg;
    	}
    	$sql="INSERT INTO user(name,username,email,password)VALUES(:name,:username,:email,:password) ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':name',$name);
    	$query->bindValue(':username',$username);
    	$query->bindValue(':email',$email);
    	$query->bindValue(':password',md5($password));
    	$result=$query->execute();
    	if ($result) {
    		$msg="<div class='alert alert-success'><strong>Success ! </strong> Thank you , You have been registered!. </div>";
    		return $msg;
    	}else{
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Sorry,There has been problem inserting datails!. </div>";
    		return $msg;
    	}
    }

    // Check Email address ================

    public function emailCheck($email)

    {
    	$sql="SELECT email FROM user WHERE email=:email ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':email',$email);
    	$query->execute();
    	if ($query->rowCount() > 0) {
    		return true;
    	}else{
    		return false;
    	}

    }
    // Check Username address ================
    public function usernameCheck($username)

    {
    	$sql="SELECT username FROM user WHERE username=:username ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':username',$username);
    	$query->execute();
    	if ($query->rowCount() > 0) {
    		return true;
    	}else{
    		return false;
    	}

    }
    // get data user table check data input and database ================
     public function getLoginUser($email,$password)
    {
    	$sql="SELECT * FROM user WHERE email=:email AND password=:password LIMIT 1";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':email',$email);
    	$query->bindValue(':password',$password);
    	$query->execute();
    	$result=$query->fetch(PDO::FETCH_OBJ);
    	return $result;
    }




    // User login function ================

    public function userLogin($data)
    {

    	$email       = $data['email'];
    	$password    = md5($data['password']);
    	$che_email=$this->emailCheck($email);

    	if (empty($email) OR empty($password)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
    		return $msg;
    	}
    	if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Email not valid!. </div>";
    		return $msg;
    	}
    	if ($che_email==false) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Email is not exit!. </div>";
    		return $msg;
    	}
    	$result=$this->getLoginUser($email,$password);
    	if ($result) {
    		Session::init();
    		Session::set('login',true);
    		Session::set('id',$result->id);
    		Session::set('name',$result->name);
    		Session::set('username',$result->username);
    		Session::set('loginsmg',"<div class='alert alert-success'><strong>Success ! </strong>You are loggedIn!. </div>");
    		header('location:index.php');
    	}else{
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong>Email and Password Invalid!. </div>";
    		return $msg;
    	}
    }

    // Get User Data user table and show the data index.php page================
    public function getUserData()
    {
    	$sql="SELECT * FROM user ORDER BY id DESC";
    	$query=$this->db->pdo->prepare($sql);
    	$query->execute();
    	$result=$query->fetchAll();
    	return $result;
    }
     // Get User Data user table and show the data profile.php page================
    public function getUserByid($userid)
    {
    	$sql="SELECT * FROM user WHERE id=:userid LIMIT 1 ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':userid',$userid);
    	$query->execute();
    	$result=$query->fetch(PDO::FETCH_OBJ);
    	return $result;
    }




    // Update User data UpdateUserBYId ================
    public function UpdateUserBYId($userid,$data)
    {
    	
    	$name        = $data['name'];
    	$username    = $data['username'];
    	$email       = $data['email'];
    	if (empty($name) OR empty($username) OR empty($email)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
    		return $msg;
    	}
    	if (strlen($username) < 3) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Username is too short at least 4 word!. </div>";
    		return $msg;

    	}elseif ( preg_match('/[^a-z0-9]+/i', $username)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Username must only contain,alphanumerical,dashes and underscores!. </div>";
    		return $msg;
    	}
    	if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Email not valid!. </div>";
    		return $msg;
    	}
    	$sql="UPDATE user SET 
						name     =:name,
						username =:username,
						email    =:email
						WHERE id=:userid
    	";

    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':name',$name);
    	$query->bindValue(':username',$username);
    	$query->bindValue(':email',$email);
    	$query->bindValue(':userid',$userid);
    	$result=$query->execute();
    	if ($result) {
    		$msg="<div class='alert alert-success'><strong>Success ! </strong> Update profile Successfully!. </div>";
    		return $msg;
    	}else{
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Profile not Updated!. </div>";
    		return $msg;
    	}

    }

     // Check Username address ================
    public function passwordCheck($userid,$oldpass)

    {
    	$password=md5($oldpass);
    	$sql="SELECT password FROM user WHERE id=:id AND password=:password ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':id',$userid);
    	$query->bindValue(':password',$password);
    	$query->execute();
    	if ($query->rowCount() > 0) {
    		return true;
    	}else{
    		return false;
    	}

    }
      // Update User data UpdateUserBYId ================
    public function UpdatePassword($userid,$data)
    {
    	
    	$oldpass        = $data['oldpass'];
    	$newpass    = $data['newpass'];
    	$ollPassCheck=$this->passwordCheck($userid,$oldpass);

    	if (empty($oldpass) OR empty($newpass)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
    		return $msg;
    	}
    	if ($ollPassCheck==false) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Old Password not exit! </div>";
    		return $msg;
    	}
    	if (strlen($newpass) < 6) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> New Password to be short al lest 7 disit! </div>";
    		return $msg;
    	}
    	$newpassword    = md5($newpass);
    	$sql="UPDATE user SET 
						password     =:password
						WHERE id=:userid
    	";

    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':userid',$userid);
    	$query->bindValue(':password',$newpassword);
    	$result=$query->execute();
    	if ($result) {
    		$msg="<div class='alert alert-success'><strong>Success ! </strong> Password Updated Successfully!. </div>";
    		return $msg;
    	}else{
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Password not Updated!. </div>";
    		return $msg;
    	}

    }

    

}