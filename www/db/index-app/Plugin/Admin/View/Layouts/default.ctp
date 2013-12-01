<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Renkli Panel V3.1</title>
	<?php echo $this->Html->css(Array('Admin.style','Admin.jquery.wysiwyg.css','Admin.facebox.css','Admin.visualize.css','Admin.date_input.css'));?>
    <?php echo $this->Html->css('Admin.jquery-ui.css');?>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=7" /><![endif]-->
	<!--[if lt IE 8]><?php echo $this->Html->css('Admin.ie');?><![endif]-->
	<!--[if IE]><?php echo $this->Html->script('Admin.excanvas');?><![endif]-->
	<?php echo $this->Html->script(Array('Admin.jquery','Admin.jquery.img.preload','Admin.jquery.filestyle.mini','Admin.jquery.wysiwyg','Admin.jquery.date_input.pack','Admin.jquery.visualize','Admin.jquery.visualize.tooltip','Admin.jquery.tablesorter.min','Admin.jquery.select_skin','Admin.ajaxupload','Admin.jquery.pngfix'));?>
    <script type="text/javascript" src="<?php echo $this->Html->url('/admin/js/custom.js.php?webroot=' . $this->webroot, true); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->Html->url('/admin/js/facebox.js.php?webroot=' . $this->webroot, true); ?>"></script>
	</head>
<body>

	<div id="hld">
	
		<div class="wrapper">		
	
			
			<div id="header">
				<div class="hdrl"></div>

				<div class="hdrr"></div>
				
				<h1><?php echo $this->Html->image('Admin.logo.png')?></h1>
				
				<ul id="nav">
				
                <?php foreach ($menu as $page) { ?>
                	<li style='cursor:pointer;'><?php echo $page['Page']['name']?>
                    	<ul>
                        	<?php foreach ($page['Page']['PageLink'] as $pageLink) { ?>
                            	<li><?php echo $this->Html->link($pageLink['name'],'/admin' . $pageLink['link'])?></li>
                            <?php } ?>
                        </ul>
                    </li>
				<?php } ?>
                <?php if ($this->Session->read('User.admin') == 1) {?>
					<li style='cursor:pointer;'>Ayarlar
                    	<ul>
							<li><?php echo $this->Html->link('Panel Sayfa Ayarları',Array('controller' => 'menu','action' => 'index'))?></li>
							<li><?php echo $this->Html->link('Modül Ayarları',Array('controller' => 'modules','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Genel Ayarlar',Array('controller' => 'settings','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Resim Tipleri',Array('controller' => 'image_types','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Resim Boyutları',Array('controller' => 'image_sizes','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Kullanıcı Türleri',Array('controller' => 'user_types','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Yeni Kullanıcı Türü',Array('controller' => 'user_types','action' => 'add'))?></li>
                            <li><?php echo $this->Html->link('Sayfa İzin Ayarları',Array('controller' => 'user_permits','action' => 'index'))?></li>
                            <li><?php echo $this->Html->link('Resim Dosya Bakımı',Array('controller' => 'modules','action' => 'file_maintenance'))?></li>
						</ul>
                    </li>
                   <?php } ?>
				</ul>
			
				<p class="user">Hoşgeldiniz, <?php echo $this->Session->read('User.name')?> | <?php echo $this->Html->link('Çıkış',Array('controller' => 'users','action'=>'logout'))?></p>

			</div>
			<?php echo $this->fetch('content'); ?>
			<div id="footer">
			
				<p class="left"><a href="http://www.emin-teknik.com" title='Emin Teknik'>Emin-Teknik.com</a></p>

				<p class="right">coded by <a href="http://www.renklikalem.com" title="Renkli Kalem">RenkliKalem.com</a> v3.1</p>
				
			</div>
		
		
		</div>						
		
	</div>		
	
</body>
</html>