<?php



	$file = 'mysetup.exe';

	 

	if (file_exists($file)) {

	 header('Content-Description: File Transfer');

	 header('Content-Type: application/octet-stream');

	 header('Content-Disposition: attachment; filename='.basename($file));

	 header('Content-Transfer-Encoding: binary');

	 header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

	 header('Pragma: public');

	 header('Content-Length: ' . filesize($file));

	 ob_clean();

	 flush();

	 readfile($file);

   exit;
   /*
header('Content-Type: application/exe');
header('Content-Disposition: attachment; filename="mysetup.exe"');
header("Content-Length: " . filesize("mysetup.exe"));

header('Cache-control: private');

$fp = fopen("mysetup.exe", "r");
fpassthru($fp);
header('Location: D:\xampp\htdocs\Website\mysetup.exe');
//fclose($fp);
*/

	}

	?>

