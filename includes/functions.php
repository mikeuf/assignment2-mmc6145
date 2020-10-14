<?php
// Verify the user is an administrator by checking cookie
// Parameters: 2 optional
// Return: 1 boolean
function isAdministrator($name = 'Mike', $value = 'Black') {
if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
  return true;
} else {
  return false;
}
}
// Connect to database
$dbc = mysqli_connect('localhost','root','root','assignment2');
?>