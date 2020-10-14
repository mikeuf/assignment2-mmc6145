<?php
// Create quotes table to perform CRUD operations
if ($dbc = mysqli_connect('localhost','root','root','assignment2')) {
  echo "Successfully connected to the database.";
  $query = 'CREATE TABLE quotes (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    quote TEXT NOT NULL,
    source VARCHAR(100) NOT NULL,
    favorite TINYINT(1) UNSIGNED NOT NULL,
    date_entered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id))
    CHARACTER SET utf8';
    // Execute query and evaluate results
    if (mysqli_query($dbc, $query)) {
      echo "<p>Table created.</p>";
    } else {
      echo "<p>The following error occured while attempting to create the table: " . mysqli_error($dbc) . "</p>";
      echo "<p>Executing the following query: " . $query . "</p>";
    }
    } else {
      echo "<p>An error occured while attempting to connect to the database.</p>";
    }
?>