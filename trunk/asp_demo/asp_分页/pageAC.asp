<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="Cls_ShowoPage.asp"-->
<%
'=================================================================
'����:			Ҷ��asp��ҳ��-ac����ʾ��
'Name:			ShowoPage(asp class)
'RCSfile:		pageAC.asp
'Revision:		0.04Beta
'Author:		yezi(Ҷ��)
'Date:			2005-01-21 17:50:10
'Description:	ASP��ҳ��ac����ʾ��,֧��access/mssql/mysql/pgsql/oracle
'Contact:		QQ:311673,MSN:ishows@msn.com,http://www.showo.com
'=================================================================

'-----------------------------------------------------------------------------------------------
On Error Resume Next
DIM startime,endtime
'ͳ��ִ��ʱ��
startime=timer()
'�������ݿ�
DIM Db,Conn,Rs
Db = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & Server.MapPath("db.mdb")
Set Conn = Server.CreateObject("ADODB.Connection")
Conn.open Db
'-----------------------------------------------------------------------------------------------
%>
<html>
<head>
<title>Ҷ��ASP��ҳ��-access����ʾ��</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="page.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">

<table width="760" border="1" cellspacing="0" cellpadding="4" align="center" bordercolordark="#FFFFFF" bordercolorlight="#CCCCCC">
  <tr align="center">
    <td width="60">ID</td>
    <td width="150">����</td>
    <td width="*">����(��ʾǰ20����)</td>
    <td width="150">ʱ��</td>
  </tr>
  <%
Dim ors
Set ors=new Cls_ShowoPage	'��������
With ors
	.Conn=conn			'�õ����ݿ����Ӷ���
	.DbType="AC"
	'���ݿ�����,ACΪaccess,MSSQLΪsqlserver2000,MSSQL_SPΪ�洢���̰�,MYSQLΪmysql,PGSQLΪPostGreSql
	.RecType=0
	'ȡ��¼��������(0ִ��count,1��дsql���ȡ,2�̶�ֵ)
	.RecSql=0
	'���RecType��1��=ȡ��¼sql��䣬�����2=��ֵ������0=""
	.RecTerm=0
	'ȡ�Ӽ�¼�����Ƿ��б仯(0�ޱ仯,1�б仯,2������cookiesҲ���Ǽ�ʱͳ�ƣ�����������ʱ��)
	.CookieName="recac"	'���RecTerm��2,cookiesname="",����дcookiesname
	.Order=0		'����(0˳��1����),ע��Ҫ������sql��������ID�������Ӧ
	.PageSize=30		'ÿҳ��¼����
	.JsUrl=""			'showo_page.js��·��
	.Sql="id,aaaa,bbbb,cccc$><$table1$><$$><$$><$id" '�ֶ�,��,����(����Ҫwhere),����(����Ҫ��ҪORDER BY),����ID
End With

iRecCount=ors.RecCount()'��¼����
iRs=ors.ResultSet()		'����ResultSet
If  iRecCount<1 Then%>
<tr bgcolor="">
    <td >���޼�¼</td>
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
      ��ҳ��ִ��ʱ�䣺<%=FormatNumber((endtime-startime)*1000,3)%>����</td>
  </tr>
</table>
</body>
</html>
<%
iRs=NULL
ors=NULL
Set ors=NoThing
%>