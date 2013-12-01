    <div class="main">
    		<div class="left">
				<div class="left-colum">
					<div class="left-colum-title"><?=__('Haberler');?></span></div>
    				<div class="left-colum-comment"></div>
    				<div class="left-colum-footer"></div>   
				</div>
        	</div>
        <div class="right">
            <div class="imaj">
            <?php if (isset($post['Image'])) { ?>
                <?=$this->Html->image($post['Image']['Main']['detay'],Array('class' => '','alt' => $post['Post']['name_' . $lang['Short']]))?>
            <?php } ?>
				<div class="icon">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_preferred_5"></a>
                    <a class="addthis_button_preferred_6"></a>
                    <a class="addthis_button_preferred_7"></a>
                    <a class="addthis_button_preferred_8"></a>
                    <a class="addthis_button_preferred_9"></a>                  
                    <a class="addthis_counter addthis_bubble_style"></a>
                    </div>
                    <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d9f2b081018f27d"></script>
                    <!-- AddThis Button END -->
				</div>			
			</div>
            <div class="baslik"><h3><?=$post['Post']['name_' . $lang['Short']]?></h3></div>
            <div class="tarih"><?=$this->Genel->tarih('gun ay yil',$post['Post']['created'])?></div>
            <div class="spot"><?=$post['Post']['label_' . $lang['Short']]?></div>
			<div class="detay"><?=$post['Post']['value_' . $lang['Short']]?></div>
			<div class="okunma"><?=$post['Post']['seencount']?> Defa Okunmuştur.</div>
			<div class="diger">
                            <?php if (isset($post['Image'])) { ?>
				<?php foreach ($post['Image']['NonMain'] as $image) {?>
					<div class="dresim"><?=$this->Html->image($image['kucuk'],Array('class' => '','alt' => $post['Post']['name_' . $lang['Short']]))?></div>
				<?php } ?>
                            <?php } ?>
			</div>
    </div>


