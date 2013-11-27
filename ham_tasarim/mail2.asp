<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<%

if Request.Form("MailTo")<>"" and Request.Form("Subject") <>"" and request.form("adsoyad")<>"" and request.form("subject")<>"" then
	sql = "Select * From bilgi" 
			rs.open sql, conn_veri, 1, 3

	mail_adres=rs("e_mail1")
	
   Set Mail = Server.CreateObject("Persits.MailSender")
   ' enter valid SMTP host
   Mail.Host = rs("mail_server")
   Mail.From = rs("web_mail")
   
   Mail.Username =rs("web_mail")
   Mail.password =rs("web_mail_sifre")
   'Mail.FromName = mail_adres2 ' optional
   Mail.AddAddress mail_adres
   
   ' message subject

      Mail.Subject = "Siteden : " & request.form("adsoyad")  
	
	icerigi=icerigi&"<br /><b>Adi Soyadi : </b>"&request.form("adsoyad")
	icerigi=icerigi&"<br /><b>Tel : </b>"&request.form("tel")
	icerigi=icerigi&"<br/><b>E- mail Adresi : </b>"&request.form("MailTo")
	icerigi=icerigi&"<br/><b>Mesaj Basligi :</b>"&request.form("subject")
	icerigi=icerigi&"<br/><b>Mesaj : </b>"&Request.Form("body")
  
 ' message body
   Mail.IsHTML = True
   Mail.Body = icerigi
   strErr = ""
   bSuccess = False
   On Error Resume Next ' catch errors
   Mail.Send ' send message
   If Err <> 0 Then ' error occurred
      strErr = Err.Description
   else
      bSuccess = True
   End If
   
rs.close
set sql = nothing

%> <div><h1>Teşekkürler;</h1></div>
 <table  border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="100%" align="center" valign="top"> 
            <p><b> Sayın <%=request.form("adsoyad")%>, </b><br/>
              <br />
              İletiniz tarafımıza <b>gönderilmiştir</b>, en kısa 
			zamanda dikkate alınacaktır. <br />
            Bize ayırdığınız zaman için teşekkür ederiz.</p></td>
        </tr>
      </table>

<%
else
%>

<head>

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
</head>
    
        
        <form id="form2" name="form2" method="post" onSubmit="return check();">
       	
        	<table style="width:100%">
				<tr>
					<td>
						<b>Adınız Soyadınız :</b><br/>
						<input name="adsoyad" type="text" class="form_textbox" id="adsoyad" size="25" maxlength="50" style="width:90%" />
					</td>
					<td>
						<b>E-Mail Adresiniz :</b><br/>
						<input name="MailTo" type="text" class="form_textbox" id="MailTo" size="25" maxlength="50" style="width:90%" />
					</td>
					<td>
						<b>Telefon Numaranız :</b><br/>
						<input name="tel" type="text" class="form_textbox" id="tel" size="25" maxlength="50" style="width:90%" />
					</td>
					<td>
						<b>Mesaj Konusu :</b><br/>
						<input name="subject" type="text" class="form_textbox" id="subject" size="25" maxlength="50" style="width:90%" />
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
						<b>Mesajınız :</b><br/>
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
					<br/>
				

					</td>
				</tr>
			</table>         
        </form>
<%end if%>