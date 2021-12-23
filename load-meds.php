<?php

$conn = mysqli_connect("localhost", "root", "password@123", "testing") or die("Connection Failed");
$search_term = $_POST['meds'];
$sql = "SELECT distinct(meds) FROM medicines WHERE meds LIKE '{$search_term}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "<ul class="."list-group".">";
if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $output .= "<li class="."list-group-item".">{$row['meds']}</li>";
    }
}
else
{
    $output .= "<li class="."list-group-item".">No results</li>";
}
$output .= "</ul>";
echo $output; //returns output as a list of distinct results
?>
