<!--#include file="lib-Stream.asp" -->
<!--#include file="inc.asp" -->
<%
Set v_Sobj=New Stream
'content = v_Sobj.LoadFile("code.asp")
Server.Execute("Execute.asp")

Response.Write(show_inc+"<br />Default.asp")
%>