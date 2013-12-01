			<div class="block"> 
			
				<div class="block_head"> 
					<div class="bheadl"></div> 
					<div class="bheadr"></div> 
					
					<h2><?=$this->Genel->strtoupper_tr($userType['UserType']['name'])?> SAYFA İZİNLERİ</h2>
					<form style='margin-top:2px;'>
					
					<?php
		echo $this->Form->input('UserPermit.user_type_id',Array('label' => false,'selected' => $userType['UserType']['id'],'onchange' => 'Sec()','id' => 'userTypes','div' => false,'error' => array('wrap' => 'span','class' => 'note error')));
					?>
</form>
				</div>		<!-- .block_head ends --> 
				
				
				<?php $active=Array(1=> 'Tam Kontrol Açık',0=> 'Tam Kontrol Kapalı');$link=Array(1=> 'Kapatmak için tıkla',0=> 'Açmak için tıkla');?>
				<div class="block_content"> 
                <?php echo $this->Session->flash(); ?>
				<?php if (count($pages) > 0) {?>				
				<table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                            <th><?php echo $this->Paginator->sort('Adı' , 'name');?></th>
							<th class="actions">&nbsp;</th>                            
                    </tr>
                    <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?php echo $page['Page']['name']; ?>&nbsp;</td>
                        <td class='delete'><?php echo $this->Html->link(__($active[$permits[$page['Page']['id']]], true), array('action' => 'set_control', $userType['UserType']['id'],$page['Page']['id']),Array('title'=>$link[$permits[$page['Page']['id']]])); ?>
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
			
			<script type="text/javascript">
function Sec() {
	window.location.href = "<?=$this->webroot?>user_permits/index/user_type_id:" + $('#userTypes').val();
}
</script>