<?php foreach ($modules as $controllerName => $moduleName) { ?>
<div class="block">
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>Modül : <?php echo $controllerName?></h2>

				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
				<?php echo $this->Form->create($moduleName,Array('encoding' => Null,'url' => Array('controller' => 'modules','action' => 'index')));?>
			    	<?php foreach ($field_names[$controllerName] as $no => $columnName) { ?>
			        <p>
			        	<?php echo $this->Form->input($columnName,Array('class' => 'text','label' => __($columnName,true) . ' :','between' => '<br>','div' => False));?>
			            </p>
					<?php } ?> 
			        <p>
				    <?php echo $this->Form->submit('Kaydet',Array('class' => 'submit'));?>
			        </p>
			    <?php echo $this->Form->end();?>
    				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
					
			</div>		<!-- .block ends -->
<?php } ?>
			

				
					
					
