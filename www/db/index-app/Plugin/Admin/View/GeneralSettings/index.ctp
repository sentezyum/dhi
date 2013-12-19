<div class="block">
	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		<h2>Genel Ayarlar</h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<?php echo $this->Form->create('GeneralSetting',Array('encoding' => Null,'type' => 'file', 'inputDefaults' => Array('div' => false,'format' => array('before', 'label', 'error', 'between', 'input', 'after'))));?>
		<?php foreach ($settings as $key => $setting) { ?>
			<p>
				<?php echo $this->Form->input('GeneralSetting.' . $key . '.id', array('type' => 'hidden', 'value' => @$setting['GeneralSetting']['id'])); ?>
				<?php echo $this->Form->input('GeneralSetting.' . $key . '.value', array('label'=>Array('text' => $setting['GeneralSetting']['name'] . ' :', 'class' => 'req'),'class' => 'text medium big','autocomplete' => 'off','value' => $setting['GeneralSetting']['value'], 'between' => '<br/>','error' => array('wrap' => 'span','class' => 'note error'))); ?>
			</p>
		<?php } ?>
		<p>
			<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
		</p>
		<?php echo $this->Form->end();?>
		</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
		
</div>		<!-- .block ends -->