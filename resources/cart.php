<?php require_once("config.php"); ?>

<?php 

if(isset($_GET['add'])) {


    $query = query("SELECT * FROM room WHERE room_id=" . escape_string($_GET['add']) . " ");
    confirm($query);

    while($row = fetch_array($query)) {

        if($row['room_quantity'] != $_SESSION['room_' . $_GET['add']]) {

            $_SESSION['room_' . $_GET['add']] +=1;
            redirect("../public/checkout.php");
        }else {

            set_message("We only have " . $row['room_quantity'] .  " " . "{$row['room_title']}" .  " room available");
            redirect("../public/checkout.php");
        }
    }

   // $_SESSION['room_' . $_GET['add']] +=1;
}


if(isset($_GET['minus'])) {

    $_SESSION['room_' . $_GET['minus']]--;

    if($_SESSION['room_' . $_GET['minus']] < 1) {
        unset($_SESSION['item_total']);
        redirect("../public/checkout.php");
    }else {

        redirect("../public/checkout.php");
    }
}

if(isset($_GET['delete'])) {

    $_SESSION['room_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    redirect("../public/checkout.php");
}


function cart() {

    $total = 0;
   

 foreach($_SESSION as $name => $value) {

if($value > 0) {

if(substr($name, 0, 5) == "room_") {

$length = strlen($name - 5);
$id = substr($name, 5, $length);

$query = query("SELECT * FROM room WHERE room_id = " . escape_string($id) . " ");
confirm($query);

while($row = fetch_array($query)) {

$subtotal = $row['room_price'] * $value;

$room_image = display_image($row['room_image']);

 $cart = <<<DELIMETER
            
<tr>
<td><img width='70' src="../resources/{$room_image}" /> </td>
<td>{$row['room_title']}</td>
<td>&#36;{$row['room_price']}</td>
<td class="text-center">{$value}</td>
<td>{$subtotal}</td>
<td><a class='btn btn-warning text-left' href="../resources/cart.php?minus={$row['room_id']}"><i class='far fa-minus-square'></i></a></td>
<td><a class='btn btn-success text-left' href="../resources/cart.php?add={$row['room_id']}"><i class='far fa-plus-square'></i></span></a></td>
<td><a class='btn btn-danger text-left' href="../resources/cart.php?delete={$row['room_id']}"><i class='fas fa-trash'></i></span></a></td>  

                    
</tr>
                                
                    
                    
DELIMETER;

 echo $cart;
            
         }

 $_SESSION['item_total'] = $total = $total + $subtotal;
 
            
            
     }



  }

  
    }

    
}





?>