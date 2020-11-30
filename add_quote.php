<?php
/**
 * add_quote.php
 * Enable users to add quotes to the database
 *
 */

// Insert header
 include ('templates/header.php');

 echo '<main>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 offset-md-2">
    <h2>Add a Quote</h2>';

// Deny access if user is not administrator
if (!is_administrator()) {
  display_access_denied();
  include ('templates/footer.php');
  exit();
}

// Handle form 
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Check that the user added both the quote and the source
  if (!empty($_POST['quote']) && !empty($_POST['source'])) {
    $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
    $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

    // Record if user indicates that this is a favorite quote
    if (isset($_POST['favorite'])) {
      $favorite = 1;
    } else {
      $favorite = 0;
    }
    
    // Insert user submission into database
    $query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quote', '$source', '$favorite')";
    mysqli_query($dbc, $query);

    // Was a row in the database actually modified?
    if (mysqli_affected_rows($dbc) == 1) {
      echo "<p>Quote added.</p>
      <p>You will automatically be redirected.</p>
      <p>Click <a href=\"view_quotes.html\">View Quotes</a> to go immediately.</p>";
      header("refresh:1; url=view_quotes.php");
    } else {
      echo "<p class=\"error\">An error occured while adding the quote: " . mysqli_error($dbc) . "</p>";
      echo "<p>Attempted query: " . $query . "</p>";
    }
    mysqli_close($dbc);
  }
  else {
    echo "<p class=\"error\">You must add both a quote and its source.</p>";
  }
}
?>
    <p>Submit a famous quote and include its source. Select <b>Favorite</b> if this is a favorite quote.</p>
<!-- Quote submission form -->
    <form action="add_quote.php" method="POST">
  <div class="form-group">
    <label for="quote">Quote</label>
    <textarea class="form-control" name="quote"></textarea>
    <label for="source">Source</label>
    <input type="text" class="form-control" name="source" id="id">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="favorite">
    <label class="form-check-label" for="favorite">Favorite</label>
  </div>
  <button type="submit" class="btn">Submit</button>
</form>
</div><!-- End column -->
</div><!-- End row -->
</div><!-- End container -->
</main>

<!-- Insert footer -->
<?php include ('templates/footer.php'); ?>
