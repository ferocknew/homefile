<!--#include file="lib/lib-const.asp" -->
<!--#include file="conn.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%
Dim callback:callback=Easp.RQ("callback",0)
Dim postItem:postItem=Easp.RF("title",0)
Dim SessionID:SessionID=Easp.RQ("sessionid",1)

If Not postItem="" Then
	Call Easp.SetCookie("MyServerIP", "验证成功", 30)
	Session("ID")=Session.SessionID '创建session

	Response.Write(Session("ID"))
	Response.End()
End If

If Not callback="" And SessionID=Session("ID") And Not Easp.getCookie("MyServerIP")="" Then
	Call jsonheadResponse()
	Response.Write(callback)
	Response.Write("({""item"":"""&Easp.getCookie("MyServerIP")&"""})")
	session.abandon '注销session
End If
%>
