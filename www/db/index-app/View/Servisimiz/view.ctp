<div class="row2">
    <div class="row2-bg">
        <div class="govde">
        
        <h3><?=$images['Imagegallery']['name_tr']?></h3>
    <div class='resimGaleri'>
    	<?php if (isset($images['Image'])) { ?>
			<?php foreach ($images['Image']['NonNamed'] as $image) { ?>
        		<a rel="galery" href="/<?=$image['galeri']?>"><?=$this->Html->image($image['galeri'],Array('alt' => 'Çorlu Kelle Tur'))?></a>
        	<?php } ?>  
        <?php } ?>  
    </div>
    
    	</div>
  	</div>
</div>