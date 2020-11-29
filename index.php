<?php
/** 
 * index.php
 *
 * Default landing page
 */

// Insert header
include('templates/header.php'); 

echo '<main>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-4 offset-md-2 form-quotes">
    <h2>Welcome to QuoteMart!</h2>';

// If "random" query parameter is submitted, display random quote.
// Otherwise, display a one favorite randomly.
// If no favorites, display all quotes.
if (isset($_GET['random'])) { 
$query = "SELECT id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1";
} elseif (isset($_GET['favorite'])) { 
$query = "SELECT id, quote, source, favorite FROM quotes WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1"; 
} else { 
  $query = "SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1";
  }
  if ($result = mysqli_query($dbc, $query)) { 
    $row = mysqli_fetch_array($result); 
    echo "<div><blockquote>{$row['quote']}</blockquote>{$row['source']}";

    if($row['favorite'] == 1){ 
      echo "<strong>Favorite!</strong>"; 
    }
    echo "</div>"; 

    if (is_administrator()) {
      echo "<p>Quote Admin: <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> | <a href=\"delete_quote.php?id={$row['id']}\">Delete</a>";

  }
} else {
    echo "<p class=\"error\">An error occured while getting a quote: " . mysqli_error($dbc) . "</p>";
    echo "<p>Attempted query: " . $query . "</p>";
}
  mysqli_close($dbc);

  echo "<p><a href=\"index.php\">Latest</a> | <a href=\"index.php?random=true\">Random</a> | <a href=\"index.php?favorite=\"true\">Favorite</a></p>";

  echo '</div><!-- End column -->
</div><!-- End row -->
  </div><!-- End container -->
  </main>';
    
include ('templates/footer.php'); 
?>
