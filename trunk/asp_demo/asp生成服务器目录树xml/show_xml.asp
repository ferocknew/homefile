<%@ LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="Fsosystem.asp"-->
<!--#include file="../../asp_function/system/lib/lib-function.asp"-->
<!--#include file="../../asp_function/system/lib/lib-xml.asp"-->
<%
Dim Dir_name,File_type
Dir_name=Array("data","images")

function bianli(path)
	Set fso=server.CreateObject("scripting.filesystemobject")
	on error resume next
	Set objFolder=fso.GetFolder(server.mappath(path))
	Set objSubFolders=objFolder.Subfolders
	For Each objSubFolder In objSubFolders
	If CheakExt(objSubFolder.name) Then
		nowpath=path + "\" + objSubFolder.name
		Response.Write("<PathDir path="""&nowpath&""">")
		Set objFiles=objSubFolder.Files
		For Each objFile In objFiles
			Response.Write("<file name="""&objFile.name&""" />")
		Next
		Response.Write("</PathDir>")
		bianli(nowpath)'递归
	End If

	Next
	Set objFolder=Nothing:Set objSubFolders=Nothing:Set fso=Nothing:Set objFiles=Nothing
End Function

Call xmlheadResponse("utf-8")
Response.Write("<root>")
Response.Write("<UpdateFilesList>")
bianli("\www\temp\HeroMonitor")
Response.Write("</UpdateFilesList>")
Response.Write("</root>")

function CheakExt(filename)
	for i=0 to Ubound(Dir_name)
		if filename=Dir_name(i) then
			Ext=0
			exit for
		else
			Ext=1
		end if
	next
	if Ext=1 then
		CheakExt=True
	else
		CheakExt=False
	end if
end function
%>