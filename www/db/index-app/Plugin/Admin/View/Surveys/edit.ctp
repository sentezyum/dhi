<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>ANKET DÜZENLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
				<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Survey',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>' Aktif'),'type' => 'hidden','class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>' Aktif'),'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'checked' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Anket Başlığı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<?php foreach ($this->data['Secenekler'] as $key => $secenek) {
		$a = explode("_",$key);
		$a = $a[1];
	?>
		<p id="sec_<?=$a?>"><label for="secenek_<?=$a?>" class="req">Seçenek :</label><br/><input name="data[Secenekler][secenek_<?=$a?>]" type="text" value="<?=$secenek?>" class="text medium" autocomplete="off" id="secenek_<?=$a?>" /></p>
<?php } ?>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->