<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT . DS. "header.php"); ?>
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">E-COMMERCE CART</h1>
</div>
</section>

<?php 

if(isset($_SESSION['room_id'])) {


echo $_SESSION['item_total'];
}

?>

<h4 class="text-center bg-danger"><?php echo display_message(); ?></h4>

<div class="container mb-4">
<div class="row">
<div class="col-12">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th scope="col"> </th>
<th scope="col">Room</th>
<th scope="col">Price</th>
<th scope="col" class="text-center">Quantity</th>
<th scope="col">Sub-total</th>
<th> </th>
</tr>
</thead>
<tbody>

<?php cart(); ?>

<td></td>

<td></td>
<td></td>
<td></td>
<td></td>


</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Shipping</td>
<td class="text-right">Free Shipping</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td><strong>Total</strong></td>
<td class="text-right"><strong>&#36; <?php 
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>



</strong></td>
</tr>
</tbody>
</table>
</div>
</div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require_once(TEMPLATE_FRONT . DS. "footer.php"); ?>