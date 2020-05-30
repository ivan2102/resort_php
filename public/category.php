<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT . DS . "header.php"); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CATEGORY</h1>
        <p class="lead text-muted mb-0">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte...</p>
    </div>
</section>
<div class="container">
    <div class="row">
      
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
          
         
        </div>
        <div class="col">
            <div class="row">
              
               <?php get_room_cat_page(); ?>
                <div class="col-12">
                   
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once(TEMPLATE_FRONT . DS . "footer.php");  ?>