<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
Rem ================================================================================================
Rem = File Name : mlzpage.asp
Rem = Description : ASP + Access2000 ��Ч��ҳ��
Rem = Trait : �ɳ��ܰ����������ݣ������ҳЧ�ʲ���
Rem = Power by : NB����--mackyliu (���ӣ���������) ���л���������ֵ��ṩ��¼ָ���㷨
Rem = QQ:5151378��MSN:mackylxf@hotmail.com��Web:http://www.54caizi.com
Rem = Last Modify : 2004/09/20 Night
Rem = Revision : 1.3 Beta
Rem ================================================================================================

On Error Resume Next
dim startime,endtime
startime=timer()

'�������ݿ�
dim db,conn,rs
db = "provider=microsoft.jet.oledb.4.0;data source=" & server.mappath("./db.mdb")
set conn = server.createobject("adodb.connection")
set rs = server.createobject("adodb.recordset")
conn.open db
%>

<%
'**************
'��ҳ����������
'���wzpageֵ
'**************
Function pagination(pagecount)
   Dim wzpage,wzpagecount,pagenum,boardid
   boardid = Request.QueryString("board_id")
   If boardid = 0 Then boardid = 1
       If Len(Request.QueryString("page"))<>0 Then
          wzpage = clng(Request.QueryString("page"))
         Else
          wzpage =1
       End If
       If wzpage <= 0 Then wzpage =1
       pagenum = (wzpage \ 10)*10+1
       If wzpage mod 10 = 0 Then pagenum = (wzpage \ 10)*10-9
       If wzpage > 10 Then
	        Response.Write ("<font face=""webdings"">")
            Response.Write ("<a href=""?board_id="& boardid &"&page=1"" title=""��ҳ"">9</a>")
			Response.Write ("<a href=""?board_id="& boardid &"&page="& pagenum-1 &""" title=""ǰʮҳ"">7</a>")
            Response.Write ("</font>")
	   End If
       For pagenum = pagenum To pagenum + 9
           If pagenum = wzpage Then
                  Response.Write ("<font color=""#ff0000"">")
                  Response.Write (" ["& pagenum &"] ")
                  Response.Write ("</font>")
		      Else
                  Response.Write (" <a href=""?board_id="& boardid &"&page="& pagenum &""">")
                  Response.Write ("["& pagenum &"]")
                  Response.Write ("</a> ")
			End If
         If pagenum >= pagecount Then Exit For
       Next
	    If wzpage < (pagecount - (pagecount \ 10)) Then
	        Response.Write ("<font face=""webdings"">")
            Response.Write ("<a href=""?board_id="& boardid &"&page="& pagenum &"""  title=""��ʮҳ"">8</a>")
			Response.Write ("<a href=""?board_id="& boardid &"&page="& pagecount &"""  title=""ĩҳ"">:</a>")
            Response.Write ("</font>")
	  End If
End Function
%>

<%
dim rssql,getstring
getstring = clng(request.querystring("board_id"))
if getstring = 0 then getstring = 1

'******************************************
'ȡ����������ÿҳ�ظ���ʾ������׼����ҳ
'wzcount ��������
'wzrep �ظ���ʾ����
'wzpage ��ҳ����id
'wzpagecount ��ҳ��
'******************************************
dim wzcount,wzrep,wzpage,wzpagecount,wzpagerep,boardstr
wzrep = 30
'rssql = "select count(id) from `table1`"
'rs.open rssql,conn,0,1,&h0001
wzcount = conn.execute ("select count(id) from `table1`",0,1)(0)
'rs.close
wzpagecount = abs(int(-abs(wzcount/wzrep)))

Response.Write(wzpagecount)
Response.End()
wzpage = clng(request.querystring("page"))
if len(wzpage) = 0 or wzpage = 0 then wzpage = 1
%>
<html>
<head>
<title>��ҳ����</title>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="page.css" type="text/css">
</head>
<body>
<table width="760" border="1" cellspacing="0" cellpadding="4" align="center" bordercolordark="#ffffff" bordercolorlight="#cccccc">
  <tr align="center">
    <td width="60">ID</td>
    <td width="150">����</td>
    <td width="*">����(��ʾǰ20����)</td>
    <td width="150">ʱ��</td>
  </tr>
  <%
'ȡ�����б�
rssql = "select id,aaaa,bbbb,cccc from [table1] where aaaa like '%�ֶ�1%'"
rs.open rssql,conn,1,1,&h0001
'���ݷ�ҳ������ȡ��ǰҳ���¼
rs.absoluteposition=rs.absoluteposition+((abs(wzpage)-1)*wzrep)
'��ʾ���±����б�
if rs.eof or rs.bof then%>
<tr>
    <td >���޼�¼</td>
  </tr>
<% else
dim i,bgcolor
for i = 0 to wzrep-1
	if rs.eof then exit for
'while not rs.eof and i <= wzrep
	bgColor="#FFFFFF"
	if i mod 2=0 then bgColor="#DFEFFF"
%>
  <tr bgcolor="<%=bgColor%>">
    <td width="60"><%=rs(0)%></td>
    <td width="150"><%=rs(1)%></td>
    <td width="*"><%=left(rs(2),20)%></td>
    <td width="150"><%=rs(3)%></td>
  </tr>
<%
rs.movenext
'i=i+1
'wend
next
end if
%>
</table>
<table width="760" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td align="left" width="200">��<font color=red><%= wzcount%></font>�� <font color=red><%= wzrep%></font>/ҳ ��<font color=red><%= wzpagecount%></font>ҳ</td>
	<td align="right"> <%= pagination(wzpagecount)%></td>
  </tr>
</table>

<table width="760" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">
      <%endtime=timer()%>
      ��ҳ��ִ��ʱ�䣺<%=formatnumber((endtime-startime)*1000,3)%>����</td>
  </tr>
</table>
</body>
</html>
<%
'�ͷ���Դ
rs.close
set rs = nothing
conn.close
set conn = nothing
%>