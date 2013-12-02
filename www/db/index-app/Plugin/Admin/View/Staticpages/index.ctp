			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>SAYFALAR</h2>
					<ul>
						<li><?php echo $this->Html->link('YENİ SAYFA',Array('controller' => 'staticpages','action' => 'add'));?></li>
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('name', 'Başlık');?></th>
                            <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($staticpages as $staticpage): ?>
                    <tr>
                        <td><?php echo substr($staticpage['Staticpage']['name'],0,150) . '...'; ?>&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Fotoğraf(' . count($staticpage['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','staticpage',$staticpage['Staticpage']['id'])); ?> | 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $staticpage['Staticpage']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $staticpage['Staticpage']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $staticpage['Staticpage']['id'])); ?>
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