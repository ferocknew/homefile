<!--#include file="gmailAPI.asp" -->
<!--#include file="options.asp" -->
<body>
<div id="gmailP"></div>
<script>
<%
	 dim gMail,i
	 set gMail=new GMailAPI
	 gMail.Login gmailUser,gmailPass
 	 response.write "document.getElementById(""gmailP"").innerHTML="""";"  
    if gMail.getInfo.errorcode=0 then
	 	response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""\""><img src=\""Plugins/GMailNotifier/gmailLogos.gif\"" alt=\""on\"" style=\""margin:0px 0px -2px 0px\""/> <b>" & gMail.getInfo.SenderEmail & "</b></div>"";"  
	 	response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""\"" style=\""margin-top:3px;margin-bottom:6px;\""><img id=\""reloadMail\"" src=\""Plugins/GMailNotifier/loading1.gif\"" alt=\""load\"" style=\""width:48px;height:18px;float:right;visibility:hidden\""/>"
	 	if int(gMail.getInfo.inboxUnread)>0 then response.write "<b>"
	 	response.write "<img src=\""Plugins/GMailNotifier/mailbox.gif\"" alt=\""on\"" style=\""margin:0px 0px -2px 0px\""/> <a href=\""javascript:void(0)\"" onclick=\""readMail(this,'inbox')\"">收件箱(<span id=\""mailC\"">"&gMail.getInfo.inboxUnread&"</span>)</a>"
	 	if int(gMail.getInfo.inboxUnread)>0 then response.write "</b>"
	 	response.write" <a href=\""javascript:reloadMail()\"">刷新</a></div>"";"  
		
		i=0
		do until i>=showCount or i>=gMail.getMailCount
			 response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""\"" style=\""overflow:hidden;height:18px;line-height:200%;word-break:break-all;margin-top:1px;padding-left:6px;padding-right:4px\"" title=\"""&gMail.getMail(i).senderName&" 于 "&gMail.getMail(i).shortTime&" 给你发送的邮件\"">"
			 if cbool(gMail.getMail(i).star) then
				 response.write "<img src=\""Plugins/GMailNotifier/icon_star_on.gif\"" alt=\""on\"" style=\""margin:0px 2px -2px 0px\""/>"
			 else
				 response.write "<img src=\""Plugins/GMailNotifier/icon_star_off.gif\"" alt=\""off\"" style=\""margin:0px 2px -2px 0px\""/>"
			 end if
			 
			 response.write "<a href=\""javascript:void(0)\"" onclick=\""readMail(this,'"&gMail.getMail(i).id&"')\"">"
			 
			 if cbool(gMail.getMail(i).readed) then response.write "<b>"
			 response.write gMail.getMail(i).title
			 if cbool(gMail.getMail(i).readed) then response.write "</b>"
			 response.write "</a></div>"";"  
			 i=i+1
		loop
	 	response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""\"" style=\""margin-top:6px;\""><a href=\""javascript:readMore()\""><b>更多信息</b></a><img id=\""MMoreIcon\"" src=\""Plugins/GMailNotifier/triangle.gif\"" alt=\""more\""/></div>"";"  
	 	response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""MMorePanel\"" style=\""border:1px solid #a26809;background:#ffffdd;padding:4px;margin-top:4px;display:none\"">"

	 	response.write gMail.getInfo.inboxUnread & " 封未读邮件<br/>"  
	 	response.write gMail.getInfo.savedDrafts & " 封草稿<br/>"  
	 	response.write gMail.getInfo.spamUnread & " 封垃圾邮件<br/>"  
	 	response.write "已用空间 " & gMail.getInfo.spaceUsed & "("& gMail.getInfo.percentUsed &") <br/>"  
	 	response.write "总空间 " & gMail.getInfo.totalSpace &" <br/>"  
	 	response.write "</div>"";"
	else
	 	response.write "document.getElementById(""gmailP"").innerHTML+=""<div id=\""\""><img id=\""reloadMail\"" src=\""Plugins/GMailNotifier/loading1.gif\"" alt=\""load\"" style=\""width:48px;height:18px;float:right;visibility:hidden\""/><a href=\""javascript:reloadMail()\"">刷新</a></div>"";"  
	 	response.write "document.getElementById(""gmailP"").innerHTML+="""&gMail.getInfo.title&""";"  
	end if
	set gMail=nothing
%>
</script>
</body>