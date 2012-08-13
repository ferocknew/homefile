<%@LANGUAGE = "VBScript" CODEPAGE="936"%>
<%Option Explicit%>
<!--#include file="Cls_PageView.asp"-->
<%
	response.Buffer = True
	Dim intDateStart
	intDateStart = Timer()

	Rem ## �����ݿ�����
	Rem #################################################################
		function f__OpenConn()
			Dim strDbPath
			Dim connstr
			strDbPath = "./db.mdb"
			connstr 	= "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="
			connstr 	= connstr & Server.MapPath(strDbPath)
			Set conn 	= Server.CreateObject("Adodb.Connection")
			conn.open connstr
		End function
	Rem #################################################################

	Rem ## �ر����ݿ�����
	Rem #################################################################
		function f__CloseConn()
			If IsObject(conn) Then
				conn.close
			End If
			Set conn = nothing
		End function
	Rem #################################################################

	Rem ���ִ��ʱ��
	Rem #################################################################
	function getTimeOver(iflag)
		Dim tTimeOver
		If iflag = 1 Then
			tTimeOver = FormatNumber(Timer() - intDateStart, 6, true)
			getTimeOver = " ��ҳִ��ʱ��: " & tTimeOver & " ��"
		Else
			tTimeOver = FormatNumber((Timer() - intDateStart) * 1000, 3, true)
			getTimeOver = " ��ҳִ��ʱ��: " & tTimeOver & " ����"
		End If
	End function
	Rem #################################################################

	Dim strLocalUrl
	strLocalUrl = request.ServerVariables("SCRIPT_NAME")

	Dim intPageNow
	intPageNow = request.QueryString("page")

	Dim intPageSize, strPageInfo
	intPageSize = 30

	Dim arrRecordInfo, i
	Dim Conn, sql, sqlCount
	sql = "SELECT [ID], [aaaa], [bbbb], [cccc] FROM [table1] ORDER BY [ID] DESC"
	sqlCount = "SELECT Count([ID]) FROM [table1]"
	f__OpenConn
		Dim clsRecordInfo
		Set clsRecordInfo = New Cls_PageView

		Rem ��¼������ȡֵ����˳��: strSqlCount >>  intRecordCount
		Rem ���� strSqlCount ��ֵʱ, intRecordCount ������
		Rem ���, ��Ҫ�ֹ����ü�¼����, ������ intRecordCount, strSqlCount ����
		Rem ���������߶�û������, ��ȡ strSql ִ�к�� RecordCount ����.
			clsRecordInfo.intRecordCount = 2816
			clsRecordInfo.strSqlCount = sqlCount
		Rem �˴��������� strSqlCount, ���¼�������ɴ�������ó�.

		Rem ���� SQL ��ѯ���
			clsRecordInfo.strSql = sql

		Rem ����ÿҳ��ʾ��
			clsRecordInfo.intPageSize = intPageSize

		Rem ���õ�ǰ��ʾҳ
			clsRecordInfo.intPageNow = intPageNow

		Rem ����ת��ҳ��
			clsRecordInfo.strPageUrl = strLocalUrl

		Rem ����ҳ��ת�����
			clsRecordInfo.strPageVar = "page"

		clsRecordInfo.objConn = Conn
		arrRecordInfo = clsRecordInfo.arrRecordInfo
		strPageInfo = clsRecordInfo.strPageInfo
		Set clsRecordInfo = nothing
	f__CloseConn
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="page.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div class="PageView">
<table width="760" border="1" cellspacing="0" cellpadding="4" align="center" bordercolordark="#FFFFFF" bordercolorlight="#CCCCCC">
  <tr align="center">
    <td width="60">ID</td>
    <td width="150">����</td>
    <td width="*">����(��ʾǰ20����)</td>
    <td width="150">ʱ��</td>
  </tr>
	<%
		Dim bgColor
		If IsArray(arrRecordInfo) Then
			For i = 0 to UBound(arrRecordInfo, 2)
			bgColor="#FFFFFF"
			if i mod 2=0 then bgColor="#DFEFFF"
	%>
  <tr bgcolor="<%=bgColor%>">
    <td width="60"><%= arrRecordInfo(0, i)%></td>
    <td width="150"><%= arrRecordInfo(1, i)%></td>
    <td width="*"><%= arrRecordInfo(2, i)%></td>
    <td width="150"><%= arrRecordInfo(3, i)%></td>
  </tr>
	<%
			Next
		End If
	%>
</table>
</div>
<table width="760" border="0" cellspacing="0" cellpadding="4">
	<tr>
		<td><%= strPageInfo%></td>
	</tr>
	<tr>
		<td align="center"><%= getTimeOver(0)%></td>
	</tr>
</table>
</body>
</html>
