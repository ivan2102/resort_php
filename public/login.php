<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT . DS . "header.php"); ?>




<body>
	

<div class="container">
<br/>
<br/>
<br/>
<br/>

<center> <b id="login-name">LOGIN Here </b> </center>
	
<h2 class="text-center btn-danger"><?php display_message(); ?></h2>

	<div class="row">
		
<div class="col-md-6 col-md-offset-3" id="login">  

<form class="" action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
<label class="user"> UserName  </label>
<div class="input-group">
	<span class="input-group-addon" id="iconn"> <i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="username" name="username" placeholder="username">
</div>
	
</div>

<?php login_user(); ?>

<div class="form-group">
<label class="user"> Password </label>
<div class="input-group">
	<span class="input-group-addon" id="iconn1"> <i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" id="password" name="password" placeholder=" Enter Password">
</div>
</div>

<div class="form-group">

<input type="submit" name="submit" class="btn btn-success" value="login" style="border-radius:0px;">
<input type="reset" class="btn btn-danger" value="reset" style="border-radius:0px;">

    </div>
    <br/><br/><br/>
    <a href="#" style="color: white; font-size: 15px; float: right; margin-right: 10px;"> Forget Password </a>
    <a href="#" style="color: white; font-size: 15px; float: right; margin-right: 10px;"> Register </a>







</form>





  </div>



	</div>


</div>



<?php require_once(TEMPLATE_FRONT . DS . "footer.php"); ?>



</body>
	</html>