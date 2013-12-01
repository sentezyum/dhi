<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>

					<h2>YENİ RESİM BOYUTU</h2>

				</div>		<!-- .block_head ends -->



				<div class="block_content">
<?php echo $this->Form->create('ImageSize',Array('encoding' => Null));?>
<p>
	<?php
		echo $this->Form->input('image_type_id',Array('label' => 'Resim Tipi :','between' => '<br>','class' => 'styled','div' => false));
	?>
</p>
<p>
	<?php
		echo $this->Form->input('filename',Array('label' => 'Dosya Adı :','between' => '<br>','class' => 'text','div' => false));
	?>
</p>
<p>
	<?php
		echo $this->Form->input('width',Array('label' => 'Genişlik (px) :','between' => '<br>','class' => 'text','div' => false));
	?>
</p>
<p>
	<?php
		echo $this->Form->input('height',Array('label' => 'Yükseklik (px) :','between' => '<br>','class' => 'text','div' => false));
	?>
</p>
<p>
	<?php
		echo $this->Form->input('quality',Array('label' => 'Kalite :','between' => '<br>','class' => 'text','div' => false));
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
