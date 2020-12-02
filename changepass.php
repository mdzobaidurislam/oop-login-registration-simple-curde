<?php
	  require_once('inc/header.php'); 
	 require_once('lib/User.php');
	 Session::checkSession();
?>
<?php

	if (isset($_GET['id'])) {
		$userid=base64_decode(base64_decode(base64_decode(base64_decode($_GET['id']))));
		$sessId=Session::get('id');
		if ($userid!=$sessId) {
			header('location:index.php');
		}
	}
	 $user = new User();

	 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Updatepass']) ) {
	
	 $UpdatePassword=$user->UpdatePassword($userid,$_POST);
}
	
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Change Password <span class="float-right"> <a href="profile.php?id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($userid))));  ?>" class="btn btn-info">Back</a></h2>
            </div>
            <div class="card-body">
               <div class="row">
               	<div class="col-md-6 offset-md-3">
               		<?php
               			if (isset($UpdatePassword)) {
               				echo $UpdatePassword;
               			}
               		?>
               		<form action="" method="POST">
	               		<div class="row">
	               			<div class="col-md-12">
	               				<div class="form-group">
			               			<strong>Old Password:</strong>
			               			<input type="text" name="oldpass" class="form-control bs-tether-element-attached-right" placeholder="Old password" >
			               		</div>
		               		</div>
	               			<div class="col-md-12">
	               				<div class="form-group">
				               			<strong>New Password:</strong>
				               			<input type="text" name="newpass" class="form-control" placeholder="New Password" >
				               		</div>
		               		</div>
	               			<div class="col-md-6">
	               				<div class="form-group">
			               			<input type="submit" name="Updatepass" class="btn-primary btn btn-lg" value="Update">
			               		</div>
	               			</div>
		               		</div>
		               </form>
	               	</div>
               </div>
            </div>
        </div>
    </div>
<?php require_once('inc/footer.php'); ?>