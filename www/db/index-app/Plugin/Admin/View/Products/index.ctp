			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>ÜRÜNLER</h2>
					<ul>
						<li><?php echo $this->Html->link('YENİ ÜRÜN EKLE',Array('controller' => 'products','action' => 'add'));?></li>
					
					</ul>

				</div>		<!-- .block_head ends --> 
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				

				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('has_confirm', 'Onay');?></th>
                            <th><?php echo $this->Paginator->sort('productgroup_id', 'Ürün Grubu');?></th>
                            <th><?php echo $this->Paginator->sort('name', 'Adı');?></th>
                            <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($products as $Product): ?>
                    <tr>
                    	<td><?php echo @$this->Html->link(__($confirm[$Product['Product']['has_confirm']], true), array('action' => 'set_confirm', $Product['Product']['id'],$link[$Product['Product']['has_confirm']]));?>&nbsp</td>
                        <td><?php echo $Product['Productgroup']['name'];?>&nbsp;</td>
                        <td><?php echo substr($Product['Product']['name'],0,50) . '...'; ?>&nbsp;</td>
                        <td class="delete"><?php echo $this->Html->link(__('Fotoğraf(' . count($Product['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','product',$Product['Product']['id'])); ?> | 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $Product['Product']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $Product['Product']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $Product['Product']['id'])); ?>
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