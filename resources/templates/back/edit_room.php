
<?php 

$room_title = null;
$room_description = null;


if(isset($_GET['id'])) {

$query = query("SELECT * FROM rooms WHERE room_id= " . escape_string($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)) {


$room_title = escape_string($row['room_title']);
$room_description = escape_string($row['room_description']);
$room_price = escape_string($row['room_price']);
$room_size = escape_string($row['room_size']);
$room_category = escape_string($row['room_category']);
$room_image = escape_string($row['room_image']);
                
}

  edit_room_in_admin();

}



?>

<div id="page-wrapper">

<div class="container-fluid">

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
Edit Room

</h1>
<h3 class='bg-success text-center'><?php display_message(); ?></h3>
</div>
   
<?php add_room_in_admin(); ?>

<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
<label for="title">Room Title </label>
<input type="text" name="room_title" class="form-control" value="<?php echo $room_title; ?>">

</div>


<div class="form-group">
<label for="description">Room Description</label>
<textarea name="room_description" id="" cols="30" rows="10" class="form-control"><?php echo $room_description; ?></textarea>
</div>



<div class="form-group row">
<div class="col-sm-3">
<label for="price">Room Price</label>
<input type="number" id="room_price" value="<?php echo $room_price; ?>" name="room_price" class="form-control" size="60">
</div>
</div>







</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


<div class="form-group">
<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
<input type="submit" name="edit" class="btn btn-primary btn-lg" value="Edit">
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
<label for="room_size">Room Size</label>
<input type="number" name="room_size" class="form-control" value="<?php echo $room_size; ?>">

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

