<style>
	.ui-state-highlight { height: 156px; margin-left:-5px;margin-bottom: 5px; }
</style>
<script type="text/javascript">var wbtrt = '<?php echo $this->webroot?>';var html;</script>
<?php echo $this->Html->script(Array('Admin.orderinputs','Admin.ui/jquery.ui.core.min','Admin.ui/jquery.ui.widget.min','Admin.ui/jquery.ui.mouse.min','Admin.ui/jquery.ui.sortable.min','Admin.ui/jquery.ui.dialog.min','Admin.ui/jquery.ui.position.min'));?>
<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>İLETİŞİM DÜZENLE</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
				<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Contactgroup',Array('encoding' => Null,'url' => array('controller' => 'contacts', 'action' => 'edit'),'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
<?php echo $this->Form->input('id',Array('label'=>Array('text' =>' Aktif'),'type' => 'hidden','class' => 'checkbox','format' => array('before', 'input', 'label', 'error', 'between', 'after'),'error' => array('wrap' => 'span','class' => 'note error')));?>
<p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'İletişim Başlığı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
<div id="datas">
<?php if (isset($this->data['Secenekler'])) {?>

	<?php $c=1;foreach ($this->data['Secenekler'] as $key => $secenek) {
		$a = explode("_",$key);
		$a = $a[1];
	?>
	
		<p id="sec_<?php echo $a?>" style="background-color:#f5f5f5;border: 1px solid #dadada;padding-left:5px;margin-left:-5px;margin-bottom:5px;">
                    <label for="name_<?php echo $a?>" class="req" style="cursor:move;">Adı :</label>
                        <br/>
                    <input name="data[Names][name_<?php echo $a?>]" type="text" value="<?php echo $this->data['Names']['name_' . $a]?>" class="text small" autocomplete="off" id="name_<?php echo $a?>" />
                        <br/>
                    <label for="value_<?php echo $a?>" class="req">Bilgisi :</label>
                        <br/>
                    <textarea rows="3" cols="20" name="data[Values][value_<?php echo $a?>]" autocomplete="off" id="value_<?php echo $a?>" /><?php echo $this->data['Values']['value_' . $a]?></textarea>

                    <input type="hidden" name="data[Secenekler][secenek_<?php echo $a?>]" value="1">
                    <input type="hidden" id="order_<?php echo $a?>" name="data[Orders][order_<?php echo $a?>]" value="<?php echo $c?>">
                    
                    <a href="#" onclick="secenekSil(<?php echo $a?>)" style="margin-left:5px;font-weight:bold;">KALDIR</a>
                </p>
	<?php $c++;} ?>
<?php $count = count($this->data['Secenekler']);} else {$count = 0;} ?>
<span id='target'></span>
</div>
<p>
	<?php echo $this->Html->link('+ Seçenek Ekle',Array('#'),Array('class' => 'table_button tiny','onclick' => 'secenekOlustur();return false;'))?>
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
var a=<?php echo $count?>;
</script>