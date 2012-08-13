<%
'---------------------------------
'By strongwillow
'Last modified:30,Jul,2006
'---------------------------------
Class clsFileManager
Private Fso
Private Sub Class_Initialize
Set Fso=server.CreateObject("scripting.filesystemobject")
End Sub
Private Sub Class_Terminate	
Set Fso=nothing
End Sub
'---------------------------------
'Functions
'---------------------------------
Public Function getFoldersList(dir)
	Dim SubFolders
	Dim SubFolder
	Dim strList
	Set SubFolders=Fso.GetFolder(dir).SubFolders
	For Each SubFolder In SubFolders
		strList=strList & "<subfolder><![CDATA[" & SubFolder.name & "]]></subfolder>"
	Next
	getFoldersList=strList
End Function
Public Function getFilesList(dir)
	Dim Files
	Dim File
	Set Files=Fso.GetFolder(dir).Files
	For Each File In Files
		strList=strList & "<file Size=""" & FormatNumber(File.size/1024,2,-1) & """ modifiedtime="""&File.DateLastModified&"""><![CDATA[" & File.name & "]]></file>"
	Next
	getFilesList=strList
End Function
Public Function getFileInfo(path)
	Set file=fso.GetFile(path)
	getFileInfo="<fileinfo attribs=""" & ShowFileAttr(file) & """ created=""" & file.DateCreated & """ accessed=""" & file.DateLastAccessed & """ modified=""" & file.DateLastModified & """ size=""" & FormatNumber(file.size/1024,2,-1) & """><![CDATA[" & getFileName(path) & "]]></fileinfo>"
End Function
Public Function getFolderInfo(path)
	Set folder=fso.GetFolder(path)
	getFolderInfo="<fileinfo attribs=""" & ShowFileAttr(folder) & """ created=""" & folder.DateCreated & """ accessed=""" & folder.DateLastAccessed & """ modified=""" & folder.DateLastModified & """ size=""" & FormatNumber(folder.size/1024,2,-1) & """><![CDATA[" & getFileName(path) & "]]></fileinfo>"
End Function
Public Function setName(path,newname,tag)
	On Error Resume next
	If tag="file" then
	fso.GetFile(path).Name=newname
	Else
	fso.GetFolder(path).Name=newname
	End If
End Function
Public Function buildFolder(path)
	If fso.FolderExists(path) Then
		buildFolder=0
	else
		Set newFolder = fso.CreateFolder(path)
		buildFolder=1
	End If
End Function 
Public Function Rename(path,name,tag)
Select Case tag
Case "file"
	fso.GetFile(path).Name=name
Case "folder"
	fso.GetFolder(path).Name=name
End Select
End Function
Public Function Delete(path,tag)
Select Case tag
Case "file"
	fso.DeleteFile(path)
Case "folder"
	fso.DeleteFolder(path)
End Select
End Function
Public Function Copy(oPath,nPath,tag)
On Error Resume Next 
Select Case tag
	Case "folder"
	fso.CopyFolder oPath,nPath &"\"& getFileName(oPath)
	Case "file"
	fso.CopyFile oPath,nPath &"\"& getFileName(oPath)
End Select
End Function
Public Function Cut(oPath,nPath,tag)
On Error Resume Next 
Select Case tag
	Case "folder"
	Copy oPath,nPath,"folder"
	Delete oPath,"folder"
	Case "file"
	Copy oPath,nPath,"file"
	Delete oPath,"file"
End Select
End Function

Function getFileName(path)
getFileName=Mid(path,InstrRev(path,"\")+1)
End Function
Function ShowFileAttr(File)
FileAttrNormal  = 0
FileAttrReadOnly = 1
FileAttrHidden = 2
FileAttrSystem = 4
FileAttrVolume = 8
FileAttrDirectory = 16
FileAttrArchive = 32 
FileAttrAlias = 64
FileAttrCompressed = 128

Dim S
Dim Attr
Attr = File.Attributes
If Attr = 0 Then
  ShowFileAttr = "Normal"
  Exit Function
End If
If Attr And FileAttrDirectory  Then S = S & "Directory "
If Attr And FileAttrReadOnly   Then S = S & "Read-Only "
If Attr And FileAttrHidden     Then S = S & "Hidden "
If Attr And FileAttrSystem     Then S = S & "System "
If Attr And FileAttrVolume     Then S = S & "Volume "
If Attr And FileAttrArchive    Then S = S & "Archive "
If Attr And FileAttrAlias      Then S = S & "Alias "
If Attr And FileAttrCompressed Then S = S & "Compressed "
ShowFileAttr = S
End Function
End Class
%>