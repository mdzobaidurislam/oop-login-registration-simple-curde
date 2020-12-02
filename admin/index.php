<?php
require_once('inc/header.php');
require_once('lib/User.php');
Session::checkSession();
$user = new User();



?>
<div class="container">
    <?php
    $loginsmg = Session::get('loginsmg');
    if (isset($loginsmg)) {
        echo $loginsmg;
    }
    Session::set('loginsmg', NULL);
    ?>
    <div class="card">
        <div class="card-header">
            <h2>User List <span class="float-right"> <strong>Welcome!</strong>
                    <?php
                    $name = Session::get('name');
                    if (isset($name)) {
                        echo $name;
                    }
                    ?>
                </span> </h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Serial N.M</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $userdata = $user->getUserData();
                    if ($userdata) {
                        foreach ($userdata as $key => $value) { ?>


                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td>
                                    <a href="profile.php?id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($value['id']))));  ?>" class="btn btn-info">View</a>
                                </td>
                            </tr>
                        <?php $i++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5">
                                <h2>No User Data Found</h2>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>