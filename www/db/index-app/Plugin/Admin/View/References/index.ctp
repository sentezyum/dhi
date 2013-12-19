			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>Referanslar</h2>
					<ul>
						<li><?php echo $this->Html->link('YENİ REFERANS',Array('controller' => 'references','action' => 'add'));?></li>
					
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th><?php echo $this->Paginator->sort('has_confirm','Onay');?></th>
                        <th><?php echo $this->Paginator->sort('name','Başlık');?></th>
                        <th><?php echo $this->Paginator->sort('created','Eklendiği Tarih');?></th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($references as $Reference): ?>
                    <tr>
                    	<td><?php echo @$this->Html->link(__($confirm[$Reference['Reference']['has_confirm']], true), array('action' => 'set_confirm', $Reference['Reference']['id'],$link[$Reference['Reference']['has_confirm']]));?>&nbsp</td>
                        <td><?php echo substr($Reference['Reference']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$Reference['Reference']['created']); ?><br><?php echo $this->Genel->tarih('saat:dakika',$Reference['Reference']['created']); ?>&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Fotoğraf(' . count($Reference['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','reference',$Reference['Reference']['id'])); ?> | <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Reference['Reference']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Reference['Reference']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Reference['Reference']['id'])); ?>
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