<?php

if(isset($argv[1])) {
    $file = $argv[1]; 

    $xmlContent = file_get_contents($file);
    
    $url = 'https://pointdata.villartechnologies.com.ve/api/uploadXml';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);

$post_data = array(
    'xmldata' => new CURLFile($file) 
);

curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

$response = curl_exec($curl);
if ($response === false) {
    echo 'Error de cURL: ' . curl_error($curl);
} else {
    echo 'Completed: ' . $response;
}

curl_close($curl);
} else {
    echo "Please enter the path of the file you want to upload";
}
?>

