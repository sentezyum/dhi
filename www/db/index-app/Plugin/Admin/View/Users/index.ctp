			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2>KuLLANICILAR</h2> 
                    <ul> 
						<li><?=$this->Html->link('Yenİ KULLANICI EKLE',Array('controller' => 'users','action' => 'add'))?></li> 
					</ul>

				</div>		<!-- .block_head ends --> 
				
				
				<?php $confirm = Array(1 => 'Açık', 0 => 'Kapalı');$link = Array(1 => 0, 0 => 1);?>
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				<?php if (count($users) > 0) {?>				
				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                    		<th><?php echo $this->Paginator->sort('Adı Soyadı' , 'name');?></th>
                            <th><?php echo $this->Paginator->sort('Kullanıcı Adı' , 'username');?></th>
                            <th><?php echo $this->Paginator->sort('E-Mail' , 'mail');?></th>
                            <th><?php echo $this->Paginator->sort('Sistem Girişi' , 'confirm');?></th>
                            <th class="actions">&nbsp;</th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['User']['name'] . ' ' . $user['User']['surname']; ?>&nbsp;</td>
                        <td><?php echo $user['User']['username']; ?>&nbsp;</td>
                        <td><?php echo $user['User']['mail']; ?>&nbsp;</td>
                        <td><?php echo $this->Html->link(__($confirm[$user['User']['confirm']], true), array('action' => 'set_confirm', $user['User']['id'],$link[$user['User']['confirm']]));?>&nbsp</td>
                        <td class="delete">
                        <?php echo $this->Html->link(__('Fotoğraf(' . count($user['Image']) . ')', true),  array('controller'=> 'images','action' => 'index','user',$user['User']['id'])); ?> | 
                            <?php echo $this->Html->link(__('Düzenle', true), array('action' => 'edit', $user['User']['id'])); ?> |
                            <?php echo $this->Html->link(__('Sil', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('%s No\'lu Kaydı Silmek İstediğinize Emin misiniz?', true), $user['User']['id'])); ?>                            
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