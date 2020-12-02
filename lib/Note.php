<?php
require_once('Session.php');
require_once('Database.php');

class Note{
	private $db;

    public function __construct(){
        $this->db=new Databese;
    }
	//===============================================
    // Registration user and insert data ================

    public function Usernote($UserSessId,$data)
    {
       
        $title     = $data['title'];
        $des       = $data['des'];

        if (empty($title) OR empty($des)) {
            $msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
            return $msg;
        }
        $sql="INSERT INTO note(uid,title,des,status)VALUES(:uid,:title,:des,:status) ";
        $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':uid',$UserSessId);
        $query->bindValue(':title',$title);
        $query->bindValue(':des',$des);
        $query->bindValue(':status','1');
        $result=$query->execute();
        if ($result) {
            $msg="<div class='alert alert-success'><strong>Success ! </strong> Note Added Successfully!. </div>";
            return $msg;
        }else{
            $msg="<div class='alert alert-danger'><strong>Error ! </strong> Note note added!. </div>";
            return $msg;
        }
    }

    // Get User Data user table and show the data index.php page================
    public function getUserNote($id)
    {
    	$sql="SELECT note.id,note.title,note.des,user.name FROM user INNER JOIN note ON note.uid=user.id WHERE user.id='$id'";
    	$query=$this->db->pdo->prepare($sql);
    	$query->execute();
    	$result=$query->fetchAll();
    	return $result;
    }
     // Get User Data user table and show the data profile.php page================
    public function getUserNoteByid($userNoteid)
    {
    	$sql="SELECT * FROM note WHERE id=:userNoteid LIMIT 1 ";
    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':userNoteid',$userNoteid);
    	$query->execute();
    	$result=$query->fetch(PDO::FETCH_OBJ);
    	return $result;
    }




    // Update User data UpdateUserBYId ================
    public function UpdateUserNoteBYId($userNoteid,$data)
    {
    	
    	$title        = $data['title'];
    	$des          = $data['des'];
    	if (empty($title) OR empty($des)) {
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Field must no be empty. </div>";
    		return $msg;
    	}
    	$sql="UPDATE note SET 
						title     =:title,
						des       =:des
						WHERE id=:userNoteid
    	";

    	$query=$this->db->pdo->prepare($sql);
    	$query->bindValue(':userNoteid',$userNoteid);
    	$query->bindValue(':title',$title);
    	$query->bindValue(':des',$des);
    	$result=$query->execute();
    	if ($result) {
    		$msg="<div class='alert alert-success'><strong>Success ! </strong> Update Note Successfully!. </div>";
    		return $msg;
    	}else{
    		$msg="<div class='alert alert-danger'><strong>Error ! </strong> Note not Updated!. </div>";
    		return $msg;
    	}

    }



}