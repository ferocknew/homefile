<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include FILE="UpLoadClass.asp"-->
<%
Session.codepage=65001
%>
<form action="" enctype="multipart/form-data" name="form1" method="post">
<input id="strFile0" type="file" name="strFile0"/>
<input id="strFile1" type="file" name="strFile1"/>
<input type="submit" id="test_do" />
</form>
<%
'�����ϴ�����
Set upfile_obj=new UpLoadClass
upfile_obj.FileType=""
upfile_obj.MaxSize=3000000
upfile_obj.SavePath="upfile/"
upfile_obj.Charset="UTF-8"
upfile_obj.AutoSave=2

upfile_obj.Open()
file_=upfile_obj.FileItem(1)
Call upfile_obj.Save(file_,0)
file_name=upfile_obj.Form(file_)
If upfile_obj.Form(file_&"_Err")=0 Then
	Response.write "{""err"":"""",""msg"":'"&GetLocationURLdri(0)&upfile_obj.SavePath&file_name&"'}"
Else
	Response.write "{""err"":'"&upfile_obj.Form(file_&"_Err")&"',""msg"":''}"
End If

Set upfile_obj=Nothing
'*************************************
'��ȡ��ҳ��ַ��Ŀ¼ GetLocationURLdri(dir_num) dir_num=0Ϊͬ��Ŀ¼��dir_num=1Ϊ�ϼ�Ŀ¼���˺�������ʹForѭ��ʧЧ
'*************************************
Function GetLocationURLdri(dir_num)
If Not IsNumeric(dir_num) Then dir_num=0
Dim URLadr,URLadr_new,URLadr_xml
URLadr=GetLocationURL()
URLadr=Split(URLadr,"/")
For i=0 To UBound(URLadr,1)-1-dir_num
	URLadr_new=URLadr_new&URLadr(i)&"/"
Next
GetLocationURLdri=URLadr_new
End Function

'*************************************
'��ȡ��ҳ��ַ��
'*************************************
Function GetLocationURL()
Dim Url
Dim ServerPort,ServerName,ScriptName,QueryString
ServerName=Request.ServerVariables("SERVER_NAME")
ServerPort=Request.ServerVariables("SERVER_PORT")
ScriptName=Request.ServerVariables("SCRIPT_NAME")
QueryString=Request.ServerVariables("QUERY_STRING")
Url="http://"&ServerName
If ServerPort <> "80" Then Url = Url & ":" & ServerPort
Url=Url&ScriptName
If QueryString <>"" Then Url=Url&"?"& QueryString
GetLocationURL=Url
End Function
%>
