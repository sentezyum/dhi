			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>KullanIcI TÜrlerİ</h2> 
                    <ul> 
						<li><?=$this->Html->link('Yenİ KULLANICI TÜRÜ',Array('controller' => 'user_types','action' => 'add'))?></li> 
					</ul>

				</div>		<!-- .block_head ends --> 
				
				
				
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				<?php if (count($userTypes) > 0) {?>				
				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Adı' , 'name');?></th>
                            <th class="actions">&nbsp;</th>
                    </tr>
                    <?php foreach ($userTypes as $userType): ?>
                    <tr>
                        <td><?php echo $userType['UserType']['name']; ?>&nbsp;</td>
                        <td class="delete">
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $userType['UserType']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $userType['UserType']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $userType['UserType']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </table>
					
						<div class="pagination right">
		<?php echo $this->Paginator->prev('&laquo;', array('escape' => false), null, array('class'=>'link','escape' => false));?>
			<?php echo $this->Paginator->numbers(array('separator' => Null));?>
		<?php echo $this->Paginator->next('&raquo;', array('escape' => false), null, array('class' => 'link','escape' => false));?>
	</div>
					<?php } ?>
				</div>		<!-- .block_content ends --> 
				
				<div class="bendl"></div> 
				<div class="bendr"></div> 
			</div>		<!-- .block ends --> 