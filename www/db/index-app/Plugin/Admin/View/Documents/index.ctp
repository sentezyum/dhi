<script type="text/javascript">var wbtrt = '<?php echo $this->webroot?>';</script>
<?php echo $this->Html->script(Array('Admin.ui/jquery.ui.core.min','Admin.ui/jquery.ui.widget.min','Admin.ui/jquery.ui.mouse.min','Admin.ui/jquery.ui.dialog.min','Admin.ui/jquery.ui.position.min','Admin.ui/jquery.ui.resizable.min','Admin.ui/jquery.ui.draggable.min.js'));?>
			<div class="block"> 
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					<h2>YENİ DÖKÜMAN</h2>
					<ul>
						<li><?php echo $this->Html->link($links[$model]['viewp'] . ' GERİ DÖN' ,Array('controller' => $links[$model]['link'],'action' => 'index','page' => $page));?></li>
					</ul>
				</div>		<!-- .block_head ends --> 
				<div class="block_content"> 
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->Form->create('Document',Array('encoding' => Null,'action' => 'index/' . $model . '/' . $id,'type' => 'file'));?>
					<p>
					<?php
						echo $this->Form->input($model . '_id',Array('type'=>'hidden','value' => $id));
						echo $this->Form->input('filename',Array('label'=>Array('text' =>'Dosya (En fazla 3MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'file','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
					?>
					</p>

					<?php foreach (Configure::read('lang') as $lang) { ?>
					<p>
						<?php echo $this->Form->input('name' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''),Array('label'=>Array('text' =>'Dosya Adı (' . $lang . '):','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));?>
					</p>
					<?php } ?>
					<p>
						<?php echo $this->Form->submit('EKLE',Array('onclick' => '$("#dialog-message").dialog("open");','class' => 'submit','div'=>false));?>
					</p>
					<?php echo $this->Form->end();?>
				</div>		<!-- .block_content ends --> 
				<div class="bendl"></div> 
				<div class="bendr"></div> 
			</div>		<!-- .block ends --> 
			<div class="block"> 
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					<h2><?php echo $links[$model]['views']?> DÖKÜMANLARI</h2>
					<ul>
						<li><?php echo $this->Html->link($links[$model]['viewp'] . ' GERİ DÖN' ,Array('controller' => $links[$model]['link'],'action' => 'index','page' => $page));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				<div class="block_content">
					<ul class="imglist">
						<?php foreach ($documents as $document) {?>
							<li>
								<?php echo $this->Html->image('Admin.document-icon.png');?>
								<ul>
									<li class="view"><?php echo $this->Html->link('DÜZENLE','javascript:void(0);',Array('onclick' => '$("#' . $document['Document']['id'] . '_img").dialog("open");'));?>
									
									<li class="delete"><?php echo $this->Html->link(__('SİL', true), array('action' => 'delete', $model,$id,$document['Document']['id'])); ?></li>
								</ul>
								<div id="<?php echo $document['Document']['id']?>_img" class="block dlga" title="Düzenle">
									<?php echo $this->Form->create('Document',Array('encoding' => Null,'action' => 'index/' . $model . '/' . $id,'type' => 'file','id' => $document['Document']['id'] . '_frm'));?>
										<?php echo $this->Form->input('Document.id',Array('type'=>'hidden','value' => $document['Document']['id']));?>

										<?php foreach (Configure::read('lang') as $lang) { ?>
						                <p>
											<?php echo $this->Form->input('Document.name' . ($lang != Configure::read('base_lang') ? '_' . $lang : ''),Array('label'=>Array('text' =>'Dosya Adı (' . $lang . ') :','class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','between' => '<br/>','value' => $document['Document']['name'],'error' => array('wrap' => 'span','class' => 'note error')));?>
										</p>
										<?php } ?>
					<p>
		<?php
			echo $this->Form->input($model . '_id',Array('type'=>'hidden','value' => $id));
			echo $this->Form->input('filename',Array('label'=>Array('text' =>'Dosya (En fazla 20MB) :','class' => 'req'),'autocomplete' => 'off','type' => 'file','between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error')));
		?>
		</p>
<p>
	<?php echo $this->Form->submit('KAYDET',Array('onclick' => '$("#dialog-message").dialog("open"); $("#' . $document['Document']['id'] . '_frm").submit();','class' => 'submit','div'=>false));?>
</p>
							
					<?php echo $this->Form->end();?>
							</div>
<div style='position:absolute;z-index:999;margin-top:100px;width:100px;text-align:center;font-size:10px;'>
								    
    <?php echo $document['Document']['name']; ?>
								</div>

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