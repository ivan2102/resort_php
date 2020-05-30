<?php 

$options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
$pusher = new Pusher\Pusher('08fa89558f6648c86d3a','9a379b1fb4977428789d','943783', $options);


?>
  <h1 class="page-header">
      Add User
      <small>Page</small>
  </h1>

  <h3 class="bg-success text-center"><?php display_message(); ?></h3>

<div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-4x'></span>

</div>


<form action="" method="post" enctype="multipart/form-data">

<?php add_user_in_admin(); ?>


  <div class="col-md-6">

     <div class="form-group">
     
      <input type="file" name="file">
         
     </div>


     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" >
         
     </div>


      <div class="form-group">
          <label for="email">Email</label>
      <input type="text" name="email" class="form-control">
         
     </div>


      <div class="form-group">
          <label for="first name">First Name</label>
      <input type="text" name="first_name" class="form-control" >
         
     </div> 

      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="last_name" class="form-control">
         
     </div> 


      <div class="form-group">
          <label for="password">Password</label>
      <input type="password" name="password" class="form-control">
         
     </div>

      <div class="form-group">

      <a id="user-id" class="btn btn-danger" href="">Delete</a>

      <input type="submit" name="add_user" class="btn btn-primary pull-right" value="Add User" >
         
     </div>


      

  </div>



</form>





    