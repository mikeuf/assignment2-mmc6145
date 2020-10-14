<?php

// View quotes in the database
include('templates/header.php');

echo "<h2>View Quotes</h2>";

// Deny access if user is not administrator
if (!isAdministrator()) {
  echo "<h2>Access Denied.</h2>";
  echo "<p>You do not have permission to access this content.</p>";
include('templates/footer.php');
exit();
}
      $query = 'SELECT id, quote, source, favorite FROM entries ORDER BY date_entered DESC';

      // Get quote from database
      if ($result = mysqli_query($dbc, $query)) {
        // Print quote
        while ($row = mysqli_fetch_array($result)) {
          echo "<div><blockquote>{$row['quote']}</blockquote>{$row['source']}\n";
            
    // Is this a favorite?
    if($row['favorite'] == 1) {
      echo "<strong>You have great taste!</strong>";
    }

echo "<p>Quote Admin Menu: <a href=\"edit_quote.php?id={$row['id']}\">Edit</a>
<a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p></div>";
  }
} else {
  echo "<p class='error'>Could not retrieve the data because: " . mysqli_error($dbc) . "</p>";
  echo "<p>The query being run was: " . $query . "</p>";
}
      mysqli_close($dbc);

    include('templates/footer.php'); 
    ?>
