<div class="grid_12 content">
            <div class="grid_3 alpha">
                <h4 style="margin-top:10px">İLETİŞİM BİLGİLERİ</h4>
                <?php foreach ($iletisimBilgileri as $iletisimBilgisi) { ?>
                    <h5><?=$iletisimBilgisi['Contactgroup']['name']?></h5>
                       <?php foreach ($iletisimBilgisi['Contact'] as $iletisimAyrintisi) { ?>
                        <h5><?=$iletisimAyrintisi['name']?></h5>
                        <p><?=$iletisimAyrintisi['value']?></p>
                       <?php } ?>
                    <div class="clear"></div>
                <?php } ?>           
            </div>
            <div class="grid_9 omega product" style="margin-top:40px;">
                <h3>HARİTA</h3>
                <div class="image"><?php echo $this->Html->image("map.png"); ?></div>
                <h3>MAİL FORMU</h3>
                <p> &nbsp;</p>

            <script type="text/javascript">
            <!--
            function check()
            {
                var errmsg;
                errmsg='';
                var abbr = document.form2;
                
                if ((abbr.adsoyad.value == ""))
                errmsg += "Lütfen AD ve SOYADINIZI Giriniz !\n";
                if ((abbr.MailTo.value == ""))
                errmsg += "Lütfen E-Mail Adresinizi Giriniz !\n";
                if ((abbr.subject.value == ""))
                errmsg += "Lütfen Mesaj Konunuzu Giriniz !\n";
                if ((abbr.tel.value == ""))
                errmsg += "Lütfen Telefon Numaranızı Giriniz !\n";
                if ((abbr.body.value == ""))
                errmsg += "Lütfen Mesajınızı Giriniz !\n";
                
                if (errmsg!="")
                {
                    alert(errmsg);
                    return false;
                }
                else
                    return true;
            }
            //-->
            </script>

    
        
        <form id="form2" name="form2" method="post" onsubmit="return check();">
        
            <table style="width:100%">
                <tbody><tr>
                    <td>
                        <b>Adınız Soyadınız :</b><br>
                        <input name="adsoyad" type="text" class="form_textbox" id="adsoyad" size="25" maxlength="50" style="width:90%">
                    </td>
                    <td>
                        <b>E-Mail Adresiniz :</b><br>
                        <input name="MailTo" type="text" class="form_textbox" id="MailTo" size="25" maxlength="50" style="width:90%">
                    </td>
                    <td>
                        <b>Telefon Numaranız :</b><br>
                        <input name="tel" type="text" class="form_textbox" id="tel" size="25" maxlength="50" style="width:90%">
                    </td>
                    <td>
                        <b>Mesaj Konusu :</b><br>
                        <input name="subject" type="text" class="form_textbox" id="subject" size="25" maxlength="50" style="width:90%">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <b>Mesajınız :</b><br>
                        <textarea name="body" rows="5" class="yazi_duz2" id="body" style="width:100%"></textarea>
                      </td>
                </tr>
                <tr>
                    <td colspan="4">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">
                    <button name="Abutton1" id="mailbutton" style="border-style: none; border-width: 0px; color:#ffffff">
                    Gönder
                    </button>
                    <br>
                

                    </td>
                </tr>
            </tbody></table>         
        </form>

            </div>
        </div>