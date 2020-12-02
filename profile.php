<?php
	 require_once('inc/header.php'); 
	 require_once('lib/User.php');
	 Session::checkSession();
?>
<?php
	
	if ( !isset($_GET['id'])) {
		
		   header('location:index.php');
	   }
	   
   

	if (isset($_GET['id'])) {
		 $userid=base64_decode(base64_decode(base64_decode(base64_decode($_GET['id']))));
		
		 $sessId=Session::get('id');
		if ($userid!=$sessId) {
			header('location:index.php');
		}
		
	}
			
		
	
	 $user     = new User();
	 $userData = $user->getUserByid($userid);

	 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Update']) ) {
	
	 $UpdateUser=$user->UpdateUserBYId($userid,$_POST);
}
	
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Profile <span class="float-right"> <a class="btn btn-secondary " href="index.php">Back</a></h2>
            </div>
            <div class="card-body">
               <div class="row">
               	<div class="col-md-6 offset-md-3">
               		<?php
               			if (isset($UpdateUser)) {
               				echo $UpdateUser;
               			}
               		?>
               		<?php 
               			if ($userData) { ?>
               			
               		<form action="" method="POST">
	               		<div class="row">
	               			<div class="col-md-12">
	               				<div class="form-group">
			               			<strong>Name:</strong>
			               			<input type="text" name="name" class="form-control bs-tether-element-attached-right" value="<?php echo $userData->name; ?>" >
			               		</div>
		               		</div>
	               			<div class="col-md-12">
	               				<div class="form-group">
				               			<strong>Username:</strong>
				               			<input type="text" name="username" class="form-control" value="<?php echo $userData->username; ?>" >
				               		</div>
		               		</div>
	               			<div class="col-md-12">
	               				<div class="form-group">
				               			<strong>Email:</strong>
				               			<input type="text" name="email" class="form-control" value="<?php echo $userData->email; ?>" >
				               		</div>
		               		</div>
		               		<?php
		               			$sessId=Session::get('id');
		               			if ($userid==$sessId) {
		               		?>
	               			<div class="col-md-6">
	               				<div class="form-group">
			               			<input type="submit" name="Update" class="btn-primary btn btn-lg" value="Update">
			               		</div>
	               			</div>
	               			<div class="col-md-6">
	               				<a class="btn btn-info" href="changepass.php?id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($userid))));  ?>">Change Password</a>
	               			</div>
	               		<?php } ?>
		               		</div>
		               </form>
		           <?php } ?>
	               	</div>
               </div>
            </div>
        </div>
    </div>
<?php require_once('inc/footer.php'); ?>