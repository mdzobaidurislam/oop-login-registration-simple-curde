<?php
	 require_once('inc/header.php'); 
	 require_once('lib/Note.php');
	 Session::checkSession();
?>
<?php
	
	if ( !isset($_GET['id'])) {
		
		   header('location:index.php');
	   }
	   
   

	if (isset($_GET['id'])) {
		 $userNoteid=base64_decode($_GET['id']);
		
		 echo $sessId=Session::get('id');
		if ($userNoteid!=$userNoteid) {
			header('location:index.php');
		}
		
	}
			
		
	
	 $user     = new Note();
	 $userNoteData = $user->getUserNoteByid($userNoteid);

	 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updateNote']) ) {
	
	 $UpdateUserNote=$user->UpdateUserNoteBYId($userNoteid,$_POST);
}
	
?>
<div class="container">
    <div class="row">
    	<div class="col-md-3"></div>
        <div class="col-md-6">
        	<?php 
       			if (isset($UpdateUserNote)) {
       				echo $UpdateUserNote;
       			}
       		 ?>
           <form action="" method="POST">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <strong>Title:</strong>
	                        <input type="text" name="title" class="form-control" value="<?php echo $userNoteData->title; ?>">
	                    </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                            <strong>Description:</strong> <br>
	                            <textarea class="form-control" name="des"  cols="30" rows="10"><?php echo $userNoteData->des; ?></textarea>
	                        </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <input type="submit" name="updateNote" class="btn-primary btn btn-lg" value="Add note">
	                    </div>
	                </div>
	             </div>
           </form>
        </div>
        <hr>
        <div class="col-md-3"></div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>




