<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo panel_fact;?></title>
	<?php echo $this->Html->css(Array('Admin.style','Admin.jquery.wysiwyg.css','Admin.facebox.css','Admin.visualize.css','Admin.date_input.css'));?>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=7" /><![endif]-->
	<!--[if lt IE 8]><?php echo $this->Html->css('Admin.ie');?><![endif]-->
	<!--[if IE]><?php echo $this->Html->script('Admin.excanvas');?><![endif]-->
	<?php echo $this->Html->script(Array('Admin.jquery','Admin.jquery.img.preload','Admin.jquery.filestyle.mini','Admin.jquery.wysiwyg','Admin.jquery.date_input.pack','Admin.jquery.visualize','Admin.jquery.visualize.tooltip','Admin.jquery.tablesorter.min','Admin.jquery.select_skin','Admin.ajaxupload','Admin.jquery.pngfix'));?>
    <script type="text/javascript" src="<?php echo $this->Html->url('/admin/js/custom.js.php?webroot=' . $this->webroot, true); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/admin/js/facebox.js.php?webroot=' . $this->webroot, true); ?>"></script>
</head>
<body>
	<div id="hld">
		<!-- wrapper begins -->
		<div class="wrapper">
			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- wrapper ends -->
	</div>	
</body>
</html>