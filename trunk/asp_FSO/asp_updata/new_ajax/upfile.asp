<%
strFileName = Request.QueryString("fn")
Set objStream = Server.CreateObject("ADODB.Stream")
objStream.Type = 1 'adTypeBinary 二进制方式
objStream.Open
objStream.LoadFromFile strFileName
objStream.SaveToFile Server.MapPath("zslogo.gif"),2
%>