$key = "PUT YOUR API KEY HERE";
$settings['file_contents'] ="@/home/Downloads/emails.txt"; //path to your file
$url = 'https://app.emaillistverify.com/api/verifApiFile?secret='.$key.'&filename=my_emails.txt';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $settings);
$file_id = curl_exec($ch); //you need to save this FILE ID for get file status and download reports in future
curl_close($ch);