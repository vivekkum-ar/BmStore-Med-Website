<?php

$username = "username";
$password = "password@123";

$conn = mysqli_connect("localhost", "root", "", "testing") or die("Connection Failed");
$search_term = $_POST[meds];
$sql = "SELECT distinct(meds) FROM students WHERE meds LIKE '%{$search_term}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "<ul>";
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $output .= "<li>{$row['meds']}</li>";
    }
}
else
{
    $output .= "<li>No results</li>";
}
$output .= "</ul>";

?>
