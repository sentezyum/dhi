<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>YENİ RESİM TİPİ</h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
<?php echo $this->Form->create('ImageType',Array('encoding' => Null));?>
<p>
	<?php
		echo $this->Form->input('name',Array('label' => 'Adı :','between' => '<br>','class' => 'text','div' => false));
	?>
</p>
<p>
	<?php echo $this->Form->submit('Kaydet',Array('class' => 'submit','div'=>false));?>
</p>
<?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
