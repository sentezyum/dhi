<div class="block"> 

	<div class="block_head"> 
		<div class="bheadl"></div> 
		<div class="bheadr"></div> 
		
		<h2>Resİm BoyutlarI</h2> 
        <ul> 
			<li><?php echo $this->Html->link('Resİm tİplerİ',Array('controller' => 'image_types','action' => 'index'))?></li> 
			<li><?php echo $this->Html->link('Resİm boyutu ekle',Array('controller' => 'image_sizes','action' => 'add'))?></li> 
		</ul>

	</div>		<!-- .block_head ends --> 
	
	
	
	<div class="block_content"> 
    <?php echo $this->Session->flash(); ?>
	
		
	<table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th><?php echo $this->Paginator->sort('id','No');?></th>
            <th><?php echo $this->Paginator->sort('filename', 'Dosya Adı');?></th>
            <th><?php echo $this->Paginator->sort('width', 'Genişlik');?></th>
            <th><?php echo $this->Paginator->sort('height', 'Yükseklik');?></th>
            <th><?php echo $this->Paginator->sort('quality', 'Kalite');?></th>
            <th><?php echo $this->Paginator->sort('image_type_id', 'Resim Tipi');?></th>
            <th class="actions">&nbsp;</th>
        </tr>
        <?php foreach ($imageSizes as $imageSize): ?>
        <tr>
            <td><?php echo $imageSize['ImageSize']['id']; ?>&nbsp;</td>
            <td><?php echo $imageSize['ImageSize']['filename']; ?>&nbsp;</td>
            <td><?php echo $imageSize['ImageSize']['width']; ?>&nbsp;</td>
            <td><?php echo $imageSize['ImageSize']['height']; ?>&nbsp;</td>
            <td><?php echo $imageSize['ImageSize']['quality']; ?>&nbsp;</td>
            <td><?php echo $imageSize['ImageType']['name']; ?>&nbsp;</td>
            <td class="delete">
                <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $imageSize['ImageSize']['id'])); ?> |
                <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $imageSize['ImageSize']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $imageSize['ImageSize']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
        </table>

			<div class="pagination right">
				<?php echo $this->Paginator->prev('&laquo;', array('escape' => false), null, array('class'=>'link','escape' => false));?>
					<?php echo $this->Paginator->numbers(array('separator' => Null));?>
				<?php echo $this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'link','escape' => false));?>
			</div>
	</div>		<!-- .block_content ends --> 
	<div class="bendl"></div> 
	<div class="bendr"></div> 
</div>		<!-- .block ends --> 