$(function() {
		$('#sayfalar > li > ul').before('<span class="closez" title="Sil"> - Sayfayı sil</span>');
		$('#sayfalar > li > ul > li').append('<span class="closez" title="Sil"> - Sil</span>');
		$('#sayfalar > li > span').click(function() {
			sayfaSil($(this).parent().attr('id'),$(this).parent());
		});
		$('#sayfalar > li > ul > li > span').click(function() {
			subSil($(this).parent().attr('id'),$(this).parent());
		});
		$( "#sayfalar" ).sortable();
		$( "#sayfalar" ).disableSelection();
		$( ".subpages" ).sortable();
		$( ".subpages" ).disableSelection();
		$( "#sayfalar" ).bind( "sortstop", function(event, ui) {
			$( "#dialog-message" ).dialog( "open" );
			var sonuc=new Array();
			sonuc = $('#sayfalar').sortable('toArray');
			a = 0;
			$('.subpages').each(function(index) {
				id = $(this).attr('id');
				id = id.split('-');
    			sonuc[a] = 'pg_' + id[1] + ':' + $(this).sortable('toArray').join(',');
				a++;
  			});
			$.ajax({
			  type: 'POST',
			  url: wbtrt + 'admin/menu/order',
			  data: {order: sonuc},
			  success:(function(data){
					if (data == 'OK') {

					}
					$('.text').val('');
					$( "#dialog-message" ).dialog( "close" );
				})
			});
		});
		$( "#dialog-message" ).dialog({
			draggable: false,
			resizable: false,
			modal: true,
			autoOpen: false
		});
	});
function sayfaSil(id,delli){
	$( "#dialog-message" ).dialog( "open" );
	id = id.split('_');
	$.ajax({
			  type: 'POST',
			  url: wbtrt + 'admin/menu/del',
			  data: {type: 'Page',id: id[1]},
			  success:(function(data){
					delli.remove();
					$('#pages').load(wbtrt + 'admin/menu/pages',function(){$("form select.styled").select_unskin();$("form select.styled").select_skin();});
					$('.text').val('');
					$( "#dialog-message" ).dialog( "close" );
					if ($('#sayfalar > li').length == 0) {$('#altsayfa').hide();}
				})
			});
}
function subSil(id,delli){
	$( "#dialog-message" ).dialog( "open" );
	id = id.split('_');
	$.ajax({
			  type: 'POST',
			  url: wbtrt + 'admin/menu/del',
			  data: {type: 'PageLink',id: id[1]},
			  success:(function(data){
					delli.remove();
					$('.text').val('');
					$( "#dialog-message" ).dialog( "close" );
				})
			});
}
function subOrder(komut) {
	if (komut == 'kapa') {
		$( "#sayfalar" ).sortable( "option", "disabled", true );
	} else {
		$( "#sayfalar" ).sortable( "option", "disabled", false );
	}
}
function ekle(webroot) {
	$( "#dialog-message" ).dialog( "open" );
	$.ajax({
		  type: 'POST',
		  url: webroot + 'admin/menu/add',
		  data: $('#yenisayfa').serialize(),
		  success:(function(data){
				$('#pages').load(webroot + 'admin/menu/pages',function(){$("form select.styled").select_unskin();$("form select.styled").select_skin();});
				$('#altsayfa').show();
				if (data != '') {
					data = data.split('1010101');
					$('#sayfalar').append('<li style="cursor:pointer;" id="pg_' + data[0] + '">' + data[1] + ' - ' + data[2] + '<ul class="subpages" id="pgsub-' + data[0] +'"></ul></li>');
					$('#sayfalar > li:last > ul').before('<span class="closez" title="Sil"> - Sayfayı sil</span>');
					$('#sayfalar > li:last > span').click(function() {
						sayfaSil($(this).parent().attr('id'),$(this).parent());
					});
					$( "#sayfalar" ).sortable();
					$( "#sayfalar" ).disableSelection();
					$( ".subpages" ).sortable();
					$( ".subpages" ).disableSelection();
				}
				$('.text').val('');
				$( "#dialog-message" ).dialog( "close" );
				$('#msg').hide();
			})
	});
}
function ekleSub(webroot) {
	$( "#dialog-message" ).dialog( "open" );
	$.ajax({
		  type: 'POST',
		  url: webroot + 'admin/menu/add',
		  data: $('#yenisayfalink').serialize(),
		  success:(function(data){
				if (data != '') {
					data = data.split('1010101');
					id = parseInt(data[3]);
					var page = $("#" + "pgsub-" + id);
					page.append('<li onmousedown="subOrder(\'kapa\');" onmouseup="subOrder(\'ac\');" id=sub_' + data[0] + '>' + data[1] + ' - ' + data[2] + '</li>');
					$("#pgsub-" + id  + " > li:last").append('<span class="closez" title="Sil"> - Sil</span>');
					$("#pgsub-" + id  + " > li:last > span").click(function() {
						subSil($(this).parent().attr('id'),$(this).parent());
					});
				}
				$('.text').val('');
				$( "#dialog-message" ).dialog( "close" );
			})
	});
}