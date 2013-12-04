<script type="text/javascript">var wbtrt = '<?php echo $this->webroot?>';</script>
<?php echo $this->Html->script(Array('Admin.ui/jquery.ui.core.min','Admin.ui/jquery.ui.widget.min','Admin.ui/jquery.ui.mouse.min','Admin.ui/jquery.ui.dialog.min','Admin.ui/jquery.ui.position.min','Admin.ui/jquery.ui.resizable.min','Admin.ui/jquery.ui.draggable.min.js'));?>
		<?php if (@$settings['has_many_image'] == 1 OR !isset($images[0]['Image'])) { ?>
			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>YENİ FOTOĞRAF</h2>
					<ul>
						<li><?php echo $this->Html->link($links[$model]['viewp'] . ' GERİ DÖN' ,Array('controller' => $links[$model]['link'],'action' => 'index','page' => $page));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Image',Array('encoding' => Null,'action' => 'index/' . $model . '/' . $id,'type' => 'file'));?>

                <?php if (isset($settings['has_image_name'])) { ?>
                	<?php if ($settings['has_image_name'] == 1) { ?>
                <p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Dosya Adı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
					<?php } ?>
				<?php } ?>
				<?php if (isset($settings['has_image_description'])) { ?>
                	<?php if ($settings['has_image_description'] == 1) { ?>
<p>
	<?php echo $this->Form->input('description',Array('label'=>Array('text' => 'Fotoğraf Detayı :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','onKeyUp' => 'limitText(this,this.form.countdown,250);','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
	<br>
	<font size="1"><span id="countdown">250</span> karakter kaldı</font>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
		
	}
		$('#countdown').html(limitNum - limitField.value.length);
	
}
</script>
</p>
					<?php } ?>
				<?php } ?>

					<p>
<?php
			echo $this->Form->input($model . '_id',Array('label'=>Array('text' =>'Dosya (En fazla 3MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'hidden','value' => $id,'between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
			echo $this->Form->input('fileName',Array('label'=>Array('text' =>'Dosya (En fazla 3MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'file','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
		?>
		</p>
<p>
	<?php echo $this->Form->submit('EKLE',Array('onclick' => '$("#dialog-message").dialog("open");','class' => 'submit','div'=>false));?>
</p>
							
					<?php echo $this->Form->end();?>
				</div>		<!-- .block_content ends --> 
				
				<div class="bendl"></div> 
				<div class="bendr"></div> 
			</div>		<!-- .block ends --> 
			                		<?php } ?>
			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2><?php echo $links[$model]['views']?> FOTOĞRAFLARI</h2>
					<ul>
						<li><?php echo $this->Html->link($links[$model]['viewp'] . ' GERİ DÖN' ,Array('controller' => $links[$model]['link'],'action' => 'index','page' => $page));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content">
					<ul class="imglist">
						<?php foreach ($images as $image) {?>
							<li>
								<?php echo $this->Html->image('thumbs/' . $model . '_' . $image['Image']['id'] . '.' . $image['Image']['ext']);?>
								<ul>
									<?php if(isset($settings['default_image_size_name'])) { ?>
									<li class="view"><?php echo $this->Html->link('DÜZENLE','#',Array('onclick' => '$("#' . $image['Image']['id'] . '_img").dialog("open");'));?>
									<?php } ?>
								<li class="delete"><?php echo $this->Html->link(__('SİL', true), array('action' => 'delete', $model,$id,$image['Image']['id'])); ?></li>
							</ul>
							
							
							
							
							<div id="<?php echo $image['Image']['id']?>_img" class="block dlga" title="Düzenle">
				<?php echo $this->Html->image('../../img/resimler/' . $model . '_' . $settings['default_image_size_name'] . '_' . $image['Image']['id'] . '.' . $image['Image']['ext']);?>
				 <?php echo $this->Form->create('Image',Array('encoding' => Null,'action' => 'index/' . $model . '/' . $id,'type' => 'file','id' => $image['Image']['id'] . '_frm'));?>

	<?php echo $this->Form->input('Image.id',Array('label'=>Array('text' =>'Dosya Adı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','type' => 'hidden','value' => $image['Image']['id'],'error' => array('wrap' => 'span','class' => 'note error')));?>

                <?php if (isset($settings['has_image_name'])) { ?>
                	<?php if ($settings['has_image_name'] == 1) { ?>
                <p>
	<?php echo $this->Form->input('name',Array('label'=>Array('text' =>'Dosya Adı :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','value' => $image['Image']['name'],'error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
					<?php } ?>
				<?php } ?>
				<?php if (isset($settings['has_image_description'])) { ?>
                	<?php if ($settings['has_image_description'] == 1) { ?>
<p>
	<?php echo $this->Form->input('description',Array('label'=>Array('text' => 'Fotoğraf Detayı :'),'autocomplete' => 'off','rows'=>3,'type' => 'textarea','value' => $image['Image']['description'],'between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
</p>
					<?php } ?>
				<?php } ?>

					<p>
<?php
			echo $this->Form->input($model . '_id',Array('label'=>Array('text' =>'Dosya (En fazla 3MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'hidden','value' => $id,'between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
			echo $this->Form->input('fileName',Array('label'=>Array('text' =>'Dosya (En fazla 3MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'file','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
		?>
		</p>
<p>
	<?php echo $this->Form->submit('KAYDET',Array('onclick' => '$("#dialog-message").dialog("open");$("#' . $image['Image']['id'] . '_frm").submit();','class' => 'submit','div'=>false));?>
</p>
							
					<?php echo $this->Form->end();?>
							</div>
							
							
							
					<?php if (isset($settings['has_image_main'])) { ?>
                		<?php if ($settings['has_image_main'] == 1) { ?>
							<div style='position:absolute;z-index:999;margin-top:100px;width:100px;text-align:center;'>
								    <?php if ($image['Image']['main'] == 1) {?>
    Gözüken
    <?php } else { ?>
    <?php echo $this->Html->link(__('Gözüken yap', true), array('action' => 'setmain', $model,$id,$image['Image']['id']),Array('onclick' => '$("#dialog-message").dialog("open");')); ?>
    <?php } ?>
								</div>
								<?php } ?>
				<?php } ?>
							</li>
						<?php }?>
					</ul>

					
				</div>		<!-- .block_content ends --> 
				
				<div class="bendl"></div> 
				<div class="bendr"></div> 
			</div>		<!-- .block ends --> 
<div id="dialog-message" class="dlg" title="Kaydediliyor">
	<p>
		Kaydediliyor Lütfen Bekleyin
	</p>
</div>
<script type="text/javascript">
		$(".dlg").dialog({
			draggable: false,
			resizable: false,
			modal: true,
			autoOpen: false
		});
		$(".dlga").dialog({
			draggable: true,
			resizable: true,
			modal: true,
			autoOpen: false,
			height: "auto",
			width: 400
		});
</script>