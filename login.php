<?php
/**
 * login.php
 *
 * Allow users to log in to the quotes site
 */

// Initialize login state to false
$loggedin = false;
$error = false;

// Insert header
include ('templates/header.php');

echo '<main>
<div class="container-fluid"><div class="row">
    <div class="col-md-2 offset-md-2 form-quotes">
    <h2>Sign In</h2>';

// Is the form submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //Handle the form
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if ((strtolower($_POST['email']) == 'mblack101@ufl.edu') && ($_POST['password'] == 'YouShallNotPassword')) {
      // Add cookie
      setcookie('Mike', 'Black', time() + 3600);
      $loggedin = true;
    } else {
      $error = "<p>The email and password you entered are either incorrect or don't exist.</p>";
    }
  } else {
    $error = "<p>You must add both an email and a password.</p>";
  }
}


// If an error occurs, display a message to the user
if ($error) {
  echo "<p class=\"error\">$error</p>";
}

// Display whether user is logged in or display the form
if ($loggedin) {
  echo '<p>Login successful.</p>
  <p>You will automatically be redirected.</p>
    <p>Click <a href="view_quotes.html">View Quotes</a> to go immediately.</p>
    <div class="spinner fa-2x">
    <i class="fad fa-spinner fa-pulse"></i>
    </div>';

    header("refresh:1; url=view_quotes.php");
} else {
echo '<p>Add your email address and password.</p>
<!-- Login form -->
    <form action="login.php" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>';
}

echo '</div> <!-- End column -->
</div> <!-- End row -->
</div> <!-- End container -->
</main>';

// Insert footer
include ('templates/footer.php');
?>
