<?php foreach ($images as $image) { ?>
<div class="gallery">
	<h3><?=$image['Imagegallery']['name_tr']?></h3>
    	<?php if (isset($image['Image'])) { ?>
			<?php $a=1; foreach ($image['Image']['NonNamed'] as $image2) { ?>
				<div class="image <?php if($a%5){ ?>marginright10<?php } ?>">
        			<a href="/<?=$image2['galeribuyuk']?>"><?=$this->Html->image($image2['galerikucuk'],Array('alt' => 'kültür koridoru'))?></a>
        		</div>
        	<?php $a++; ?>
        	<?php } ?>  
        <?php } ?>  
</div>
<? } ?>
    
