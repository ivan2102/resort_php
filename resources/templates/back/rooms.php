

<div id="page-wrapper">

<div class="container-fluid">

   <div class="row">

<h1 class="page-header">
   All Rooms
</h1>

<h3 class='btn-danger text-center'><?php display_message(); ?></h3>
<table class="table table-hover">

<form action="" method="post">
    <thead>

    <div id="bulkOptionContainer" class="col-xs-4">
<select class="form-control" name="bulk_options" id="">
<option value="">Select Options</option>
<option value="available">Available</option>
<option value="occupied">Occupied</option>
<option value="delete">Delete</option>
<option value="clone">Clone</option>
</select>
</div>

<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="index.php?add_room">Add New</a>
</div>

      <tr>
           <th><input type="checkbox" name="" id="selectAllBoxes"></th>
           <th>Id</th>
           <th>Title</th>
           <th>Description</th>
           <th>Price</th>
           <th>Status</th>
           <th>Category</th>
           <th>Image</th>
      </tr>
    </thead>
    <tbody>

    <?php get_rooms_in_admin(); ?>
      


  </tbody>
</table>

</form>










                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->







   