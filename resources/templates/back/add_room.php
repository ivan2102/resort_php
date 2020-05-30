



        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Room

</h1>
<h3 class='bg-success text-center'><?php display_message(); ?></h3>
</div>
               
<?php add_room_in_admin(); ?>

<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="title">Room Title </label>
    <input type="text" name="room_title" class="form-control">
       
    </div>


    <div class="form-group">
      <label for="description">Room Description</label>
      <textarea name="room_description" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">
       <div class="col-sm-3">
       <label for="price">Room Price</label>
        <input type="number" id="room_price" value="room_price" name="room_price" class="form-control" size="60">
        </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->




<aside id="admin_sidebar" class="col-md-4">

<div class="form-group">
<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
<input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
</div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="category">Room Category</label>
          
        <select name="room_category" id="room_category" class="form-control">
            <option value="">Select Category</option>
            
            <?php show_room_category_in_add_room(); ?>
        </select>


</div>

<div class="form-group">
<label  for="room_status">Room Status</label>
 
      <select name="room_status" id="room_status" class="form-control">
      <option value="">Room Status</option>
      <option value="available">Available</option>
      <option value="occupied">Occupied</option>
      option
      </select>
    </div>



    <!-- Product Image -->
    <div class="form-group">
        <label for="room_image">Room Image</label>
        <input type="file" name="file">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   