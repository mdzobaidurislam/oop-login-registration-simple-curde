<?php
require_once('inc/header.php');
require_once('lib/Note.php');
Session::checkSession();
$user = new Note();
$UserSessId=Session::get('id');

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['note']) ) {
	
	$UserNote=$user->Usernote($UserSessId,$_POST);
}


?>
<div class="container">
    <div class="row">
    	<div class="col-md-3"></div>
        <div class="col-md-6">
        	<?php 
       			if (isset($UserNote)) {
       				echo $UserNote;
       			}
       		 ?>
           <form action="" method="POST">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <strong>Title:</strong>
	                        <input type="text" name="title" class="form-control" placeholder="Enter title">
	                    </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                            <strong>Description:</strong> <br>
	                            <textarea class="form-control" name="des"  cols="30" rows="10"></textarea>
	                        </div>
	                </div>
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <input type="submit" name="note" class="btn-primary btn btn-lg" value="Add note">
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