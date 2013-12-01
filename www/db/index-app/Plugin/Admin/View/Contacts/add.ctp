<style>
	.ui-state-highlight { height: 156px; margin-left:-5px;margin-bottom: 5px; }
</style>
<script type="text/javascript">var wbtrt = '<?=$this->webroot?>';var html;</script>
<?=$this->Html->script(Array('orderinputs','ui/jquery.ui.core.min','ui/jquery.ui.widget.min','ui/jquery.ui.mouse.min','ui/jquery.ui.sortable.min','ui/jquery.ui.dialog.min','ui/jquery.ui.position.min'));?>
<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YENİ İLETİŞİM BİLGİSİ OLUŞTUR</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
				<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Contactgroup',Array('encoding' => Null,'url' => array('controller' => 'contacts', 'action' => 'add'),'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'İletişim Başlığı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<div id="datas">
<?php if (isset($this->data['Secenekler'])) {?>

	<?php $c=1;foreach ($this->data['Secenekler'] as $key => $secenek) {
		$a = explode("_",$key);
		$a = $a[1];
	?>
	
		<p id="sec_<?=$a?>" style="background-color:#f5f5f5;border: 1px solid #dadada;padding-left:5px;margin-left:-5px;margin-bottom:5px;">
                    <label for="name_<?=$a?>" class="req" style="cursor:move;">Adı :</label>
                        <br/>
                    <input name="data[Names][name_<?=$a?>]" type="text" value="<?=$this->data['Names']['name_' . $a]?>" class="text small" autocomplete="off" id="name_<?=$a?>" />
                        <br/>
                    <label for="value_<?=$a?>" class="req">Bilgisi :</label>
                        <br/>
                    <textarea rows="3" cols="20" name="data[Values][value_<?=$a?>]" autocomplete="off" id="value_<?=$a?>" /><?=$this->data['Values']['value_' . $a]?></textarea>

                    <input type="hidden" name="data[Secenekler][secenek_<?=$a?>]" value="1">
                    <input type="hidden" id="order_<?=$a?>" name="data[Orders][order_<?=$a?>]" value="<?=$c?>">
                    
                    <a href="#" onclick="secenekSil(<?=$a?>)" style="margin-left:5px;font-weight:bold;">KALDIR</a>
                </p>
	<?php $c++;} ?>
<?php $count = count($this->data['Secenekler']);} else {$count = 0;} ?>
<span id='target'></span>
</div>
<p>
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
</script>