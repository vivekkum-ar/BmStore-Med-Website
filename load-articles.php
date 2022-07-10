<?php
 
// $var_json = file_get_contents('people.json');
// echo($var_json);

// $decoded_json = json_decode($people_json, false);
// echo $decoded_json->name;
// echo $decoded_json->email; 
// echo $decoded_json->age;


$queryString = http_build_query([
    'access_key' => 'a6dc0832d6c43aff3382820f88f747da',
    // 'keywords' => 'Wall street -wolf',
    'categories' => 'health',
    'sort' => 'popularity',
    'limit' => 15,
    'country' => "in",
    'language' => "en"
  ]);
  
  $ch = curl_init(sprintf('%s?%s', 'http://api.mediastack.com/v1/news', $queryString));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($ch);
  curl_close($ch);
  $apiResult = json_decode($json, true);
  print_r($json);
  $myfile = fopen("arts.json", "w") or die("Unable to open file!");
  fwrite($myfile, $json);
  fclose($myfile);
?>