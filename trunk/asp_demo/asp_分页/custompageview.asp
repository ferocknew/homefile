<%@LANGUAGE = "VBScript" CODEPAGE="936"%>
<%Option Explicit%>
<!--#include file="Cls_PageView.asp"-->
<%
	response.Buffer = True
	Dim intDateStart
	intDateStart = Timer()

	Rem ## 打开数据库连接
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

	Rem ## 关闭数据库连接
	Rem #################################################################
		function f__CloseConn()
			If IsObject(conn) Then
				conn.close
			End If
			Set conn = nothing
		End function
	Rem #################################################################

	Rem 获得执行时间
	Rem #################################################################
	function getTimeOver(iflag)
		Dim tTimeOver
		If iflag = 1 Then
			tTimeOver = FormatNumber(Timer() - intDateStart, 6, true)
			getTimeOver = " 本页执行时间: " & tTimeOver & " 秒"
		Else
			tTimeOver = FormatNumber((Timer() - intDateStart) * 1000, 3, true)
			getTimeOver = " 本页执行时间: " & tTimeOver & " 毫秒"
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

		Rem 记录集总数取值优先顺序: strSqlCount >>  intRecordCount
		Rem 即当 strSqlCount 有值时, intRecordCount 无作用
		Rem 因此, 若要手工设置记录总数, 请设置 intRecordCount, strSqlCount 留空
		Rem 若以上两者都没有设置, 则取 strSql 执行后的 RecordCount 属性.
			clsRecordInfo.intRecordCount = 2816
			clsRecordInfo.strSqlCount = sqlCount
		Rem 此处因设置了 strSqlCount, 则记录总数将由此语句计算得出.

		Rem 设置 SQL 查询语句
			clsRecordInfo.strSql = sql

		Rem 设置每页显示数
			clsRecordInfo.intPageSize = intPageSize

		Rem 设置当前显示页
			clsRecordInfo.intPageNow = intPageNow

		Rem 设置转向页面
			clsRecordInfo.strPageUrl = strLocalUrl

		Rem 设置页面转向参数
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
    <td width="150">标题</td>
    <td width="*">内容(显示前20个字)</td>
    <td width="150">时间</td>
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
