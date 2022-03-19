<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { 
    if(!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']== "http://localhost/test/bmStore/index.html" || $_SERVER['HTTP_REFERER']== "http://192.168.1.9/test/bmStore/index.html"){
        $conn = mysqli_connect("localhost", "root", "password@123", "testing") or die("Connection Failed");
        $type = $_POST['type'];
        if($type == "category"){
            $sql = "SELECT * FROM medsdemo ";//WHERE company LIKE 'ECOSPRIN'
        }
        elseif ($type == "offer") {
            $sql = "SELECT * FROM medsdemo WHERE offer > 20 ORDER BY CAST(offer AS INT) DESC";
        }
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
         $output = array();
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            { $i = sizeof($output);
                if($i != 0){
                    $i = $i+1;
                }
                $output[$i] = array_merge(
                    array_combine(array('label'),@array($row['label']))
                    ,array_combine(array('company'),@array($row['company']))
                    ,array_combine(array('price'),@array($row['price']))
                    ,array_combine(array('star'),@array($row['star']))
                    ,array_combine(array('sale'),@array($row['sale']))
                    ,array_combine(array('offer'),@array($row['offer']))
                    ,array_combine(array('stock'),@array($row['stock']))
                    ,array_combine(array('image'),@array($row['image'])));
            }
        }
        echo json_encode($output); //returns output as a list of distinct results 
    } 
}
else{
    header("Location: http://localhost/test/bmStore/index.html");
    die();
}
?>