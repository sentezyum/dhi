$(function() {
		$("#datas").sortable({ items: 'p' ,placeholder: "ui-state-highlight"});

		$( "#datas" ).bind( "sortstop", function(event, ui) {
			var sonuc=new Array();
			sonuc = $('#datas').sortable('toArray');
			b=1;
			$('#datas > p').each(function(index) {
				id = $(this).attr('id');
				id = id.split('_');
				$('#order_' + id[1]).val(b);
				b++;
  			});
		});

	});
function secenekOlustur(){
		a++;
		html = '<p id="sec_' + a + '" style="display:none;background-color:#f5f5f5;border: 1px solid #dadada;padding-left:5px;margin-left:-5px;margin-bottom:5px;"><label for="name_'+ a + '" class="req" style="cursor:move;">Adı :</label><br/><input name="data[Names][name_'+ a + ']" type="text" class="text small" autocomplete="off" id="name_'+ a + '" /><br/><label for="value_'+ a + '" class="req">Bilgisi :</label><br/><textarea name="data[Values][value_'+ a + ']" rows="3" cols="20" autocomplete="off" id="value_'+ a + '" /></textarea><input type="hidden" name="data[Secenekler][secenek_'+ a + ']" value="1"/><input type="hidden" id="order_' + a + '" name="data[Orders][order_' + a + ']" value="' + a + '"><a href="#" onclick="secenekSil(' + a + ')" style="margin-left:5px;font-weight:bold;">KALDIR</a></p>'
		$('#target').before(html);
		$('#sec_' + a).fadeIn(400);
		$("#datas").sortable({ items: 'p' ,placeholder: "ui-state-highlight"});
	}
function secenekSil(id) {
		$('#sec_' + id).fadeOut(400, function() { $('#sec_' + id).remove(); });
	}