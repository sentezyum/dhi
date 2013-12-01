<div class="block small center login">			
				<div class="block_head">
					<div class="bheadl"></div>

					<div class="bheadr"></div>
					
					<h2>RENKLİ PANEL V3.1 - GİRİŞ</h2>
					<ul>
						<li><a href="http://www.emin-teknik.com" title="Emin Teknik">SİTEYE GERİ DÖN</a></li>
					</ul>
				</div>	
				<div class="block_content">

					<?php if ($error) { ?>
                   	 	<div class="message errormsg"><p>Yanlış kullanıcı adı veya şifre</p></div>
                    <?php } else { if (isset($errorMsg)) {?>
	                    <div class="message warning"><p><?=$errorMsg?></p></div>
                    <?php } else { ?>
						<div class="message info"><p>Kullanıcı adı ve şifrenizi giriniz</p></div>
                    <?php } } ?>
					<?php echo $this->Form->create('User',Array('encoding' => Null,'inputDefaults' => Array('div' => false))); ?>
                        <p>
                            <?php echo $this->Form->input('User.username',Array('label'=>'Kullanıcı Adı :','class' => 'text','autocomplete' => 'off'));?>
                            </p>
						<p>
                            <?php echo $this->Form->input('User.password',Array('label'=>'Şifre :','class' => 'text','autocomplete' => 'off'));?>
						</p>
						
						<p>
                            <?php echo $this->Form->submit('GİRİŞ',Array('class' => 'submit','div' => false)); ?> 
						</p>
					<?php echo $this->Form->end(); ?>
				</div>	
				<div class="bendl"></div>
				<div class="bendr"></div>								
</div>	