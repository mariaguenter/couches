<?php

// We don't won't to allow just anybody to have access to this page.  So we set
// a manual flag for access, or check to see if the accessor is an admin.
$update_access = TRUE; // MARIA READ THIS set true when testing, make sure to set false on hand in! 

if (empty($_SESSION)) {
  session_start();
}

if (!$update_access && empty($_SESSION['admin'])) {
  header("Location: /index");
}

require 'sql_parse.php';
require '../../connection.php';

$schema = "schema.sql";

$sql_query = trim(@fread(@fopen($schema, 'r'), @filesize($schema))) or die('problem');
remove_comments($sql_query);
$sql_query = remove_remarks($sql_query);
remove_formatting($sql_query);
$sql_query = split_sql_file($sql_query, ';');

// Populate our list of executed commands.  It's ok if the table doesn't exist
// because we'll have an empty list of executed commands, meaning we can run
// all of our queries.  Note that the sqlCommands table creation MUST be the
// first statement in the .sql file if no query has ever been run.
$executed = array();
$command = "SELECT command FROM sqlCommands";
if ($result = $connection->query($command)) {
  $result = $result->fetch_all();
  foreach($result as $row) {
    $executed[] = $row[0];
  }
}

$count = 0;
$queries = sizeof($sql_query);
foreach ($sql_query as $query) {
  $query_hash = md5($query);

  // If this command has been executed before, skip it.
  if (in_array($query_hash, $executed)) {
    $queries--;
    continue;
  }

  // If the query fails, stop execution and show the query that failed.
  if ($connection->query($query) === FALSE) {
    print "Successfully executed $count/$queries queries. <br>";
    die("Failed to execute query: <br><pre>$query</pre>");
    break;
  }

  // Add the query to our list of executed queries.
  $command = "INSERT INTO sqlCommands (command) VALUES ('$query_hash')";
  $connection->query($command);

  $count++;
}

print "Successfully executed $count/$queries queries. <br>";
