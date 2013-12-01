<div class="block small center login">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2>RENKLİ PANEL : SİSTEM DURUMU</h2>
				</div>
				<div class="block_content">
	<?php
		if (is_writable(TMP)):
	?>
	    <div class="message success"><p>Temp klasörünüz yazılabilir</p></div>
    <?php
		else:
	?>
    	<div class="message errormsg"><p>Temp klasörünüz yazılabilir değil</p></div>
    <?php
		endif;
		$settings = Cache::settings();
		if (!empty($settings)):
	?>
	    <div class="message success"><p><?php printf(__('%s önbellek için kullanılıyor.',true), '<em>'. $settings['engine'] . 'Engine</em>');?></p></div>
    <?php
		else:
	?>
    	<div class="message errormsg"><p>Önbellek sistemi çalışmıyor</p></div>
    <?php
		endif;
	?>
	<?php
		$filePresent = null;
		if (file_exists(CONFIGS.'database.php')):
	?>
	    <div class="message success"><p>Database bağlantı dosyası mevcut</p></div>
    <?php
		$filePresent = 'var';
		else:
	?>
    	<div class="message errormsg"><p>Database bağlantı dosyası mevcut değil</p></div>
    <?php
		endif;
	?>
<?php
if (isset($filePresent)) {
	if (!class_exists('ConnectionManager')) {
		require LIBS . 'model' . DS . 'connection_manager.php';
	}
	$db = ConnectionManager::getInstance();
	@$connected = $db->getDataSource('default');
	if ($connected->isConnected()){
	?>
	    <div class="message success"><p>Database bağlantısı yapılabiliyor</p></div>
    <?php
	} else {
	?>
	    <div class="message errormsg"><p>Database bağlantısı yapılamıyor</p></div>
    <?php
	}
	?>
<?php }?>
                		
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->