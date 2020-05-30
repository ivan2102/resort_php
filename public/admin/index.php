<?php require_once("../../resources/config.php"); ?>
<?php require_once(TEMPLATE_BACK . DS . "header.php"); ?>


<?php 

if(!isset($_SESSION['username'])) {

    redirect("../../public");
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

         <?php 
         
         if($_SERVER['REQUEST_URI'] == "/resort_php/public/admin/" || $_SERVER['REQUEST_URI'] == "/resort_php/public/admin/index.php") {

            require_once(TEMPLATE_BACK . DS . "admin_content.php");
         }

         if(isset($_GET['reservations'])) {

            require_once(TEMPLATE_BACK . DS . "reservations.php");
         }

         if(isset($_GET['add_reservation'])) {

            require_once(TEMPLATE_BACK . DS . "add_reservation.php");
         }

         if(isset($_GET['add_room'])) {

            require_once(TEMPLATE_BACK . DS . "add_room.php");
         }

         if(isset($_GET['categories'])) {

            require_once(TEMPLATE_BACK . DS . "categories.php");
         }

         if(isset($_GET['edit_room'])) {

            require_once(TEMPLATE_BACK . DS . "edit_room.php");
         }

         if(isset($_GET['rooms'])) {

            require_once(TEMPLATE_BACK . DS . "rooms.php");
         }

         if(isset($_GET['users'])) {

            require_once(TEMPLATE_BACK . DS. "users.php");
         }

         if(isset($_GET['add_user'])) {

            require_once(TEMPLATE_BACK . DS . "add_user.php");
         }

         if(isset($_GET['slides'])) {

            require_once(TEMPLATE_BACK . DS . "slides.php");
         }




         
         
         ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php require_once(TEMPLATE_BACK . DS . "footer.php"); ?>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
   

   <script>

   $(document).ready(function() {

  var pusher = new Pusher('08fa89558f6648c86d3a', {

      cluster: 'eu',
      encrypted: true
   });

   var notificationChannel = pusher.subscribe('notifications');

   notificationChannel.bind('new_user', function(notification) {

   var message  = notification.message;

   toastr.success(`${message} just registred`);


   });

}); 

   
   
   
   
   
   </script>  
