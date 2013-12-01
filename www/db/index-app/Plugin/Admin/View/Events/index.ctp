			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>ETKİNLİKLER</h2>
					<ul>
						<li><?=$this->Html->link('YENİ ETKİNLİK',Array('controller' => 'events','action' => 'add'));?></li>
					
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Onay','has_confirm');?></th>
                            <th><?php echo $this->Paginator->sort('Etkinlik Tarihi','created');?></th>
                            <th><?php echo $this->Paginator->sort('Başlık','name');?></th>
                            <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($events as $event): ?>
                    <tr>
                    	<td><?php echo @$this->Html->link(__($confirm[$event['Event']['has_confirm']], true), array('action' => 'set_confirm', $event['Event']['id'],$link[$event['Event']['has_confirm']]));?>&nbsp</td>
                        <td class='date'><?php echo $this->Genel->tarih('gun kisaay yil',$event['Event']['date']); ?>&nbsp;</td>
                        <td><?php echo substr($event['Event']['name_tr'],0,50) . '...'; ?>&nbsp;</td>
                        <td class="delete">
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $event['Event']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $event['Event']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $event['Event']['id'])); ?>
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