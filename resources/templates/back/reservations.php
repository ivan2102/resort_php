<?php require_once("../../resources/config.php");  ?>
<?php require_once(TEMPLATE_BACK . DS . "header.php"); ?>



        <div id="page-wrapper">

            <div class="container-fluid">


                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Reservations

</h1>
</div>

<a href="index.php?add_reservation" class="btn btn-primary">Add Reservation</a>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Arrival</th>
           <th>Departure</th>
           <th>Number of Adults</th>
           <th>Number of Kids</th>
           <th>Number of Nights at Hotel</th>
      </tr>
    </thead>
    <tbody>
    
    <?php display_reservations(); ?>
        

    </tbody>
</table>
</div>











            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php require_once(TEMPLATE_BACK . DS . "footer.php"); ?>