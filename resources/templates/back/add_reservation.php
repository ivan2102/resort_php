
  <h1 class="page-header">
      Add Reservation
      <small>Page</small>
  </h1>

  <h3 class="bg-success text-center"><?php display_message(); ?></h3>

<div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-4x'></span>

</div>


<form action="" method="post" enctype="multipart/form-data">




  <div class="col-md-6">

     <div class="form-group">
     
      <input type="file" name="file">
         
     </div>


   

    <?php add_reservation_in_admin(); ?>
   


      <div class="form-group">
          <label for="first name">First Name</label>
      <input type="text" name="first_name" class="form-control" >
         
     </div> 

      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="last_name" class="form-control">
         
     </div> 

     <div class="form-group">
      <label for="username">Arrival</label>
      <input type="date" name="arrival" class="form-control" >
         
     </div>

     <div class="form-group">
          <label for="email">Departure</label>
      <input type="date" name="departure" class="form-control">
         
     </div>


      <div class="form-group">
          <label for="password">Number of Adults</label>
      <input type="number" name="number_of_adults" class="form-control">
         
     </div>

     <div class="form-group">
          <label for="password">Number of Kids</label>
      <input type="number" name="number_of_kids" class="form-control">
         
     </div>

     <div class="form-group">
          <label for="password">Number of Nights at Hotel</label>
      <input type="number" name="number_of_nights_at_hotel" class="form-control">
         
     </div>



      <div class="form-group">

      <a id="user-id" class="btn btn-danger" href="">Delete</a>

      <input type="submit" name="add_reservation" class="btn btn-primary pull-right" value="Add Reservation" >
         
     </div>


      

  </div>



</form>





    