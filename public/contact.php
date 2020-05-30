<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT . DS. "header.php"); ?>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact
      <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>

    <?php display_message(); ?>

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
      </div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h3>Contact Details</h3>
        <p>
          3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </p>
        <p>
          <abbr title="Phone">P</abbr>: (123) 456-7890
        </p>
        <p>
          <abbr title="Email">E</abbr>:
          <a href="mailto:name@example.com">name@example.com
          </a>
        </p>
        <p>
          <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
        </p>
      </div>
    </div>
    <!-- /.row -->

    <?php send_message(); ?>

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3><?php echo '_SEND_MESSAGE'; ?></h3>
        <form method="get" class="navbar-form navbar-right" id="language_form" action="">
        
         <div class="form-group">
      <select name="lang" class="form-control" onchange="changeLanguage()" >
      <option value="eng"<?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng') {echo "selected";} ?>>English</option>
      <option value="srb"<?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'srb') {echo "selected";} ?>>Srpski</option>
      </select>
        
      </div>
        
      
        
        </form>
        <form name="sentMessage" id="contactForm" action="" method="post" novalidate>

          <div class="control-group form-group">
            <div class="controls">
              <label>Username:</label>
              <input type="text" class="form-control" name="username" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email:</label>
              <input type="text" name="email" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Password:</label>
              <input type="password" class="form-control" name="password" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" name="submit" class="btn btn-primary" id="SendMessageButton">Send Message</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <script>


<?php 

if(isset($_GET['lang']) && !empty($_GET['lang'])) {

  $_SESSION['lang'] = $_GET['lang'];

  if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {

    echo "<script type='text/javascript'>location.reload();</script>";
  }

}

  if(isset($_SESSION['lang'])) {

    require_once("../resources/languages/" . $_SESSION['lang'] . ".php");

  }else {
     
    require_once("../resources/languages/eng.php");

  }




?>
  
  function changeLanguage() {

    document.getElementById('language_form').submit();
  }
  
  
  
  </script>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
