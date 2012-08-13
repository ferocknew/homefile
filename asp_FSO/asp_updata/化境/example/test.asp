<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%
Session.codepage=65001
%>
<!--#include FILE="../upload_5xsoft.inc"-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<%
Set upload=new upload_5xsoft '建立上传对象 '显示上传类的版本 upload.Version
for each formName in upload.objFile  ''列出所有form数据
 response.write formName&"="&upload.form(formName)&"<br>"
next
%>