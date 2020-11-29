<?php
/**
 * footer.php
 * Displays a menu allowing users to add quotes and log out.
 * Displays the copyright.
 */

if ((isAdministrator()) || (isset($loggedin) && $loggedin)) {

  echo '<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
<nav class="navbar navbar-expand-lg navbar-light">
<h3 class="navbar">Site Admin</h3>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-quotes" aria-controls="navbar-quotes" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbar-quotes">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
  <li class="nav-item active">
    <a class="nav-link" href="view_quotes.php">View Quotes<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="add_quote.php">Add Quote</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Sign Out</a>
  </li>
</ul>
</div><!-- End navbar-collapse -->
</nav>
</div><!-- End column -->
</div><!-- End row -->
</div><!-- End container -->';
}

?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>