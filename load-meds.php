<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { 
    if(!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']== "http://localhost/test/bmStore/index.html" || $_SERVER['HTTP_REFERER']== "http://192.168.1.9/test/bmStore/index.html"){
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
    } 
}
else{
    header("Location: http://localhost/test/bmStore/index.html");
    die();
} 
?>
