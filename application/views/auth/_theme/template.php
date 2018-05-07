<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="{charset}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{pagetitle}</title>
		<link rel="stylesheet" href="{theme_url}main.min.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="header_title">
					<h1>SMART HR</h1>
				</div>
			</div>
			<div class="main">
				<div class="main_content">
					<div class="auth_user">
						<img style="width: 25%; height: 25%;display: block;
    margin-left: auto;
    margin-right: auto;" src="<?php echo base_url();?>asets/img/logos/msi.jpg" alt="image" /><h4>PT MEGAH SEMBADA INDUSTRIES</h4>
					</div>
					{content}
				</div>
			</div>
		</div>
	</body>
</html>