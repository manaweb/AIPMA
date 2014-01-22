<?php
$data = file_get_contents("form_bcash_27.html");
$name = preg_match_all('/name="(.*?)"/',$data,$names);
$data = preg_match_all('/value="(.*?)"/',$data,$matches);

unset($names[1][sizeof($names)-1]);

$data = array_combine($names[1],$matches[1]);

$fields_string = '';
foreach($data as $key=>$value) { $fields_string .= $key.'='.urlencode($value).'&'; }
rtrim($fields_string, '&');

echo sizeof($data);

ob_start();
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://www.bcash.com.br/checkout/pay/');
curl_setopt($ch,CURLOPT_POST,sizeof($data));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
curl_exec($ch);
$response = ob_get_contents();
echo $response;
curl_close($ch);
ob_end_clean();