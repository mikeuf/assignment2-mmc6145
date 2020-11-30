<?php
/**
 * footer.php
 * Displays a menu allowing users to add quotes and log out.
 * Displays the copyright.
 */

?>
<footer>
  
<div class="container-fluid">
<div class="row justify-content-center">
  <div class="col-md-8">
<nav class="navbar navbar-expand-lg navbar-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-quotes" aria-controls="navbar-quotes" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbar-quotes">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">

<?php
// If the user is logged in, show a menu -- unless this is the logout page
$this_page = basename($_SERVER['REQUEST_URI']);
if (((is_administrator()) || (isset($loggedin) && $loggedin)) && ($this_page != 'logout.php')) {

  echo '<li class="nav-item">
    <a class="nav-link btn" role="button" href="view_quotes.php">View Quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn" role="button" href="add_quote.php">Add Quote</a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn" role="button" href="logout.php">Sign Out</a>
  </li>';

  // Don't show this button for the login/logout pages
} elseif ($this_page != 'login.php' && $this_page != 'logout.php') {
  echo '<li class="nav-item">
    <a class="nav-link btn" role="button" href="login.php">Sign In</a>
  </li>';
}

?>

</ul>
</div><!-- End navbar-collapse -->
</nav>
<p class="copyright text-muted">&copy;2020 QuoteMart Holdings, Inc. All rights reserved.</p>
</div><!-- End column -->
</div><!-- End row -->
</div><!-- End container -->
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
