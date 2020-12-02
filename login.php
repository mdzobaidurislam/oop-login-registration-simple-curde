<?php
 require_once('inc/header.php'); 
 require_once('lib/User.php');
 Session::checkLogin();
 $user=new User(); 

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']) ) {
	
	$userLogin=$user->userLogin($_POST);  
}

 ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Login</h2>
            </div>
            <div class="card-body">
               <div class="row">
               	<div class="col-md-6 offset-md-3">
               		<?php 
               			if (isset($userLogin)) {
               				echo $userLogin;
               			}
               		 ?>
               		<form action="" method="POST">
	               		<div class="row">
	               			<div class="col-md-12">
	               				<div class="form-group">
			               			<strong>Email:</strong>
			               			<input type="text" name="email" class="form-control bs-tether-element-attached-right" placeholder="Enter email">
			               		</div>
		               			</div>
		               			<div class="col-md-12">
		               				<div class="form-group">
					               			<strong>Password:</strong>
					               			<input type="text" name="password" class="form-control" placeholder="Enter Password">
					               		</div>
			               		</div>
		               			<div class="col-md-12">
		               				<div class="form-group">
				               			<input type="submit" name="login" class="btn-primary btn btn-lg" value="Login">
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