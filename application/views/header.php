<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="support/sign_in/landing-img/logo.png">
<script type="text/javascript">
	site_url = '<?php echo site_url(); ?>'
</script>
<?php
	echo $css.$js;
?>
</head>
<body>
<?php
	if($content_header){
		$this->load->view($content_header);	
	}
?>