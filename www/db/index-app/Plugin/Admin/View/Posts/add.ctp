<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YENİ HABER EKLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('Post',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>

<?php foreach (Configure::read('lang') as $lang) { ?>
	<p>
		<?php echo $this->Form->input('name' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''), array('label'=>Array('text' =>'Başlık (' . $lang . ') :', 'class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	</p>	
<?php } ?>

<?php foreach (Configure::read('lang') as $lang) { ?>
	<p>
		<?php echo $this->Form->input('label' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''), array('label'=>Array('text' => 'Haber Kısa Detayı (' . $lang . ') :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','onKeyUp' => 'limitText(this, 250);','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
		<br>
		<font size="1"><span>250</span> karakter kaldı</font>
	</p>	
<?php } ?>

<?php foreach (Configure::read('lang') as $lang) { ?>
	<p>
		<?php echo $this->Form->input('value_' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''), array('label' => array('text' =>'Haber Detayı (' . $lang . ') :','class' => 'req'),'class' => 'wysiwyg','type' => 'textarea', 'autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	</p>	
<?php } ?>

<p>
	<?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>' Aktif'),'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'checked' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
<script language="javascript" type="text/javascript">
	function limitText(limitField, limitNum) {
		limitField = $(limitField);
		if (limitField.val().length > limitNum) {
			limitField.val(limitField.val().substring(0, limitNum));
		}
		limitField.next().next().children("span").html(limitNum - limitField.val().length)
	}
</script>