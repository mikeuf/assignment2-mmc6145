<?php
/**
 * login.php
 *
 * Allow users to log in to the quotes site
 */

// Initialize login state to false
$loggedin = false;
$error = false;

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

// Insert header
include ('templates/header.php');

// If an error occurs, display a message to the user
if ($error) {
  echo "<p class=\"error\">$error</p>";
}

// Display whether user is logged in or display the form
if ($loggedin) {
  echo "<p>Login successful.</p>";
} else {
  echo "<h2>Login Form</h2>
    <form action=\"login.php\" method=\"post\"> 
<p><label>Email Adresss <input type=\"email\" name=\"email\"></label></p>
<p><label>Password <input type=\"password\" name=\"password\"></label></p>
<p><input type=\"submit\" name=\"submit\" value=\"Log In!\"></p> 
</form>";
}

// Insert footer
include ('templates/footer.php');
?>
