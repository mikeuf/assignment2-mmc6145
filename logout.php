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
echo '<main>
<div class="container-fluid"><div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Signed Out</h2>
    <p>You will automatically be redirected to the QuoteMart home page.</p>
    <p>Click <a href="index.html">Home</a> to return immediately.</p>
    <div class="spinner fa-2x">
    <i class="fad fa-spinner fa-pulse"></i>
    </div>
</div> <!-- End column -->
</div> <!-- End row -->
</div> <!-- End container -->
</main>';

header("refresh:1; url=index.php");

// Insert footer
include ('templates/footer.php');
?>
