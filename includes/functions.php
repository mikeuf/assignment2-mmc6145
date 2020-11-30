<?php
/**
 * functions.php
 * Verify the user is an administrator by checking cookie
 * Parameters: 2 optional
 * Return: 1 boolean
 */
function is_administrator($name = 'Mike', $value = 'Black') {
if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
  return true;
} else {
  return false;
}
}

// display access denied errors
function display_access_denied() {
echo '<div class="alert alert-danger" role="alert">
  Access Denied: Please log in to access this content.
</div>
</div> <!-- End column -->
</div> <!-- End row -->
</div> <!-- End container -->
</main>';

}
// Connect to database
$dbc = mysqli_connect('localhost','mmc6145','kq28ZBeMKH4PdI3L','assignment2');
?>
