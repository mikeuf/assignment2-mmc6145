<?php
/** 
 * logout.php
 *
 * Ends user session by deleting their cookie
 */

// If the user cookie exists, delete it
if (isset($_COOKIE['Mike'])) {
  setcookie('Mike', FALSE, time() - 300);
}

// Insert header
include ('templates/header.php');

// Display message confirming logout is complete
echo "<p>Logout complete.</p>";

// Insert footer
include ('templates/footer.php');
?>
