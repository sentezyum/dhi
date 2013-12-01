<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YENİ ANKET OLUŞTUR</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
				<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Survey',Array('encoding' => Null,'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<p>
	<?php echo $this->Form->input('has_confirm',Array('label'=>Array('text' =>' Aktif'),'class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'checked' => false,'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Anket Başlığı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<?php if (isset($this->data['Secenekler'])) {?>
	<?php foreach ($this->data['Secenekler'] as $key => $secenek) {
		$a = explode("_",$key);
		$a = $a[1];
	?>
		<p id="sec_<?=$a?>"><label for="secenek_<?=$a?>" class="req">Seçenek :</label><br/><input name="data[Secenekler][secenek_<?=$a?>]" type="text" value="<?=$secenek?>" class="text medium" autocomplete="off" id="secenek_<?=$a?>" /><a href="#" onclick="secenekSil(<?=$a?>)" style="margin-left:5px;font-weight:bold;">KALDIR</a></p>
	<?php } ?>
<?php $count = count($this->data['Secenekler']);} else {$count = 0;} ?>
<p id='target'>
	<?=$this->Html->link('+ Seçenek Ekle',Array('#'),Array('class' => 'table_button tiny','onclick' => 'secenekOlustur();return false;'))?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
<script language="javascript">
var a=<?=$count?>;
var html;
function secenekOlustur(){
	a++;
	html = '<p style="display:none;" id="sec_' + a + '"><label for="secenek_'+ a + '" class="req">Seçenek :</label><br/><input name="data[Secenekler][secenek_'+ a + ']" type="text" class="text medium" autocomplete="off" id="secenek_'+ a + '" /><a href="#" onclick="secenekSil(' + a + ')" style="margin-left:5px;font-weight:bold;">KALDIR</a></p>'
	$('#target').before(html);
	$('#sec_' + a).fadeIn(400);
}
function secenekSil(id) {
	$('#sec_' + id).fadeOut(400, function() { $('#sec_' + id).remove(); });
}
</script>