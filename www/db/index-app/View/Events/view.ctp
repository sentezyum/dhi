    <div class="main">
    		<div class="left">
				<div class="left-colum">
					<div class="left-colum-title"><span>Haberler</span></div>
    				<div class="left-colum-comment"></div>
    				<div class="left-colum-footer"></div>
				</div>
        	</div>
        <div class="right">
            <div class="baslik"><h3><?=$event['Event']['name_' . $lang['Short']]?></h3></div>
            <div class="tarih"><?=$this->Genel->tarih('gun ay yil',$event['Event']['date'])?></div>
            <div class="spot"><?=$event['Event']['label_' . $lang['Short']]?></div>
            <div class="detay"><?=$event['Event']['value_' . $lang['Short']]?></div>
            <div class="okunma"><?=$event['Event']['seencount']?> Defa Okunmuştur.</div>
    </div>


