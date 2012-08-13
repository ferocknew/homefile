<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="Cls_ShowoPage.asp"-->
<%
'=================================================================
'名称:			叶子asp分页类-ac调用示范
'Name:			ShowoPage(asp class)
'RCSfile:		pageAC.asp
'Revision:		0.04Beta
'Author:		yezi(叶子)
'Date:			2005-01-21 17:50:10
'Description:	ASP分页类ac调用示范,支持access/mssql/mysql/pgsql/oracle
'Contact:		QQ:311673,MSN:ishows@msn.com,http://www.showo.com
'=================================================================

'-----------------------------------------------------------------------------------------------
On Error Resume Next
DIM startime,endtime
'统计执行时间
startime=timer()
'连接数据库
DIM Db,Conn,Rs
Db = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & Server.MapPath("db.mdb")
Set Conn = Server.CreateObject("ADODB.Connection")
Conn.open Db
'-----------------------------------------------------------------------------------------------
%>
<html>
<head>
<title>叶子ASP分页类-access调用示范</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="page.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">

<table width="760" border="1" cellspacing="0" cellpadding="4" align="center" bordercolordark="#FFFFFF" bordercolorlight="#CCCCCC">
  <tr align="center">
    <td width="60">ID</td>
    <td width="150">标题</td>
    <td width="*">内容(显示前20个字)</td>
    <td width="150">时间</td>
  </tr>
  <%
Dim ors
Set ors=new Cls_ShowoPage	'创建对象
With ors
	.Conn=conn			'得到数据库连接对象
	.DbType="AC"
	'数据库类型,AC为access,MSSQL为sqlserver2000,MSSQL_SP为存储过程版,MYSQL为mysql,PGSQL为PostGreSql
	.RecType=0
	'取记录总数方法(0执行count,1自写sql语句取,2固定值)
	.RecSql=0
	'如果RecType＝1则=取记录sql语句，如果是2=数值，等于0=""
	.RecTerm=0
	'取从记录条件是否有变化(0无变化,1有变化,2不设置cookies也就是及时统计，适用于搜索时候)
	.CookieName="recac"	'如果RecTerm＝2,cookiesname="",否则写cookiesname
	.Order=0		'排序(0顺序1降序),注意要和下面sql里面主键ID的排序对应
	.PageSize=30		'每页记录条数
	.JsUrl=""			'showo_page.js的路径
	.Sql="id,aaaa,bbbb,cccc$><$table1$><$$><$$><$id" '字段,表,条件(不需要where),排序(不需要需要ORDER BY),主键ID
End With

iRecCount=ors.RecCount()'记录总数
iRs=ors.ResultSet()		'返回ResultSet
If  iRecCount<1 Then%>
<tr bgcolor="">
    <td >暂无记录</td>
  </tr>
<%
Else
    For i=0 To Ubound(iRs,2)
	bgColor="#FFFFFF"
	if i mod 2=0 then bgColor="#DFEFFF"
	%>
  <tr bgcolor="<%=bgColor%>">
    <td width="60"><%=iRs(0,i)%></td>
    <td width="150"><%=iRs(1,i)%></td>
    <td width="*"><%=left(iRs(2,i),20)%></td>
    <td width="150"><%=iRs(3,i)%></td>
  </tr><%
    Next
End If
%>
</table>
<table width="760" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td>
<%ors.ShowPage()%>
</td>
  </tr>
</table>
<table width="760" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">
      <%endtime=timer()%>
      本页面执行时间：<%=FormatNumber((endtime-startime)*1000,3)%>毫秒</td>
  </tr>
</table>
</body>
</html>
<%
iRs=NULL
ors=NULL
Set ors=NoThing
%>