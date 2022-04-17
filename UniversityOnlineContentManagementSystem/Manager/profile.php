<!DOCTYPE html>
<html>
<?php include('tags/header.php');
    include('validatelogin.php');
 ?>
<body>
<?php include('tags/navigation.php');?>
<div class="app-main__outer">
    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-address-book icon-gradient bg-amy-crisp">
                                        </i>
                                    </div>
                                    <div>Profile</div>
                                </div>
                            </div>
                        </div>
                    <div class="card m-3">
                        <div class="card-body">
                            <h1 class="text-center">Profile</h1>
                            <div class="container">
                                <img class="card-img-top " src="assets/images/avatars/3.jpg" alt="Card image cap" style="height: 64px; width: 64px; border-radius: 100px; margin-left: 520px;">
                                <br>
                                User Name:<input class="form-control mt-2 mb-2" type="text" name="" value="Arkar">
                                <br>

                                Role:<input class="form-control mt-2 mb-2" type="text" name="" value="SSYK">
                                <br>
                                Password:<input class="form-control mt-2 mb-2" type="text" name="" value="********">
                                <br>
                                Gender:<input class="form-control mt-2 mb-2" type="text" name="" value="Female">
                                <br>
                                <button class="btn btn-primary text-center">Edit</button>
                            </div>
                        </div>
                    </div>
<?php include('tags/footer.php');?>
    </div>
</div>
<script src="vue/app.js"></script>
</body>
</html>