<!--#include file="gmailAPI.asp" -->
<!--#include file="options.asp" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<%
    dim conUL,query
    select case request.QueryString("msgid")
    case "inbox":
		 conUL="http://mail.google.com/mail"
    case else
		 conUL="http://mail.google.com/mail?account_id="&Server.URLEncode(gmailUser)&"@gmail.com&message_id="&request.QueryString("msgid")&"&view=conv&extsrc=pjblog"
    end select
    
	 query = "ltmpl=wsad&ltmplcache=2&continue="&Server.URLEncode(conUL)&"&service=mail&rm=false" &_
    		 "&Email=" & Server.URLEncode(gmailUser) &_
     		 "&Passwd=" & Server.URLEncode(gmailPass) &_
    	     "&null=Sign+in"
	 'Server.Transfer("https://www.google.com/accounts/ServiceLoginAuth?"&query)
	 %>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
	<head>
	<title><%=toUnicode("转接 GMail...")%></title>
	</head>
	<body>
	<%=toUnicode("请稍候...")%>
	 <form action="https://www.google.com/accounts/ServiceLoginAuth?" method="post">
	  	<input type="hidden" name="continue" value="<%=conUL%>">
	  	<input type="hidden" name="service" value="mail">
	  	<input type="hidden" name="rm" value="false">
	  	<input type="hidden" name="Email" value="<%=gmailUser%>">
	  	<input type="hidden" name="Passwd" value="<%=gmailPass%>">
	  	<input type="hidden" name="null" value="Sign in">
	 </form>
	 <script>document.forms[0].submit()</script>
	 </body>
	 </html>
	 <%
	 'Response.Redirect("https://www.google.com/accounts/ServiceLoginAuth?"&query)
 

function toUnicode(str) 'To Unicode
    dim i,a
	For i = 1 to Len (str)
		a=Mid(str, i, 1)
		toUnicode=toUnicode & "&#x" & Hex(Ascw(a)) & ";"
	next
end function
%>
