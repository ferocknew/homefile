<%@ language = "vbscript" codepage = 936%>
<%
option explicit 'ǿ�ƶ������
'==========================================================================
'ë��Ŀ��ٷ�ҳ
'mail:mc@flashado.com
'��ҳ:http://www.flashado.com
'qq:69862476
'����ҳ����ѧ��ѧϰ,�������в���֮��,�����λ��������
'==========================================================================
dim idcount'��¼����
dim pages'ÿҳ����
dim pagec'��ҳ��
dim page'ҳ��
dim pagenc 'ÿҳ��ʾ�ķ�ҳҳ������=pagenc*2+1
pagenc=2
dim pagenmax 'ÿҳ��ʾ�ķ�ҳ�����ҳ��
dim pagenmin 'ÿҳ��ʾ�ķ�ҳ����Сҳ��
page=clng(request("page"))
dim start'����ʼ��ʱ��
dim endt'���������ʱ��
dim datafrom'���ݱ���
datafrom="table1"
dim conn,rs
dim datapath '���ݿ�·��
dim sqlid'��ҳ��Ҫ�õ���id
dim myself'��ҳ��ַ
myself = request.servervariables("path_info")
dim sql'sql���
dim taxis'��������
taxis="order by id asc"
dim i'����ѭ��������
start=timer()
datapath="db.mdb"
pages=30

'���Ӵ����ݿ�
dim db
db="db.mdb"     '�������ݿ�·��������
set conn = server.createobject("adodb.connection")
conn.open "provider=microsoft.jet.oledb.4.0;data source=" & server.mappath(db)
if err.number <> 0 then
   response.write "���ݿ����ӳ���!"
   response.end()
end if

'��ȡ��¼����
sql="select count(id) as idcount from ["& datafrom &"]"
set rs=server.createobject("adodb.recordset")
rs.open sql,conn,0,1
idcount=rs("idcount")'��ȡ��¼����

if(idcount>0) then'�����¼����=0,�򲻴���
	if(idcount mod pages=0)then'�����¼��������ÿҳ����������,��=��¼����/ÿҳ����+1
		pagec=int(idcount/pages)'��ȡ��ҳ��
	else
		pagec=int(idcount/pages)+1'��ȡ��ҳ��
	end if

	'��ȡ��ҳ��Ҫ�õ���id============================================
	'��ȡ���м�¼��id��ֵ,��Ϊֻ��id�����ٶȺܿ�
	sql="select id from ["& datafrom &"] " & taxis
	set rs=server.createobject("adodb.recordset")
	rs.open sql,conn,1,1

	   rs.pagesize = pages 'ÿҳ��ʾ��¼��
	   if page < 1 then page = 1
	   if page > pagec then page = pagec
	   if pagec > 0 then rs.absolutepage = page

	for i=1 to rs.pagesize
	if rs.eof then exit for
		if(i=1)then
			sqlid=rs("id")
		else
			sqlid=sqlid &","&rs("id")
		end if
	rs.movenext
	next
	'��ȡ��ҳ��Ҫ�õ���id����============================================
end if
%>
<!doctype html public "-//w3c//dtd html 4.01 transitional//en">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<title>ë��Ŀ��ٷ�ҳ</title>
<link rel="stylesheet" href="page.css" type="text/css">
<script language="javascript">
<!--
function gopage() {
//ë��Ŀ��ٷ�ҳ
//mail:mc@flashado.com
//��ҳ:http://www.flashado.com
//qq:69862476
//����ҳ����ѧ��ѧϰ,�������в���֮��,�����λ��������
window.location.href="<%=myself%>?page="+ page.value;
}
//-->
</script>
</head>

<body bgcolor="#f2f2f2" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="20" cellspacing="0">
  <tr>
    <td valign="middle"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
      <tr>
        <td valign="top" bgcolor="#ffffff"><br>          <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="zw">
          <tr>
            <td><strong><font color="#ff6600">ë��Ŀ��ٷ�ҳ</font></strong></td>
          </tr>
        </table>
          <br>
          <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="cccccc" class="zw">
            <tr align="center" bgcolor="#9fcb07">
              <td width="9%"><strong>ID</strong></td>
              <td width="37%"><strong>����</strong></td>
              <td width="33%"><strong>����(��ʾǰ20����)</strong></td>
              <td width="21%"><strong>ʱ��</strong></td>
            </tr>
<%
if(idcount>0 and sqlid<>"") then'�����¼����=0,�򲻴���
	'��inˢѡ��ҳ�����Ե�����,����ȡ��ҳ���������,�����ٶȿ�
	sql="select [id],[aaaa],[bbbb],[cccc] from ["& datafrom &"] where id in("& sqlid &") "&taxis
	set rs=server.createobject("adodb.recordset")
	rs.open sql,conn,0,1

	while(not rs.eof)'������ݵ����
	%>
		    <tr bgcolor="#ffffff">
		      <td align="center"><%=rs(0)%></td>
		      <td><%=rs(1)%></td>
		      <td><%=rs(2)%></td>
		      <td align="center"><%=rs(3)%></td>
		    </tr>
	<%
		rs.movenext
	wend
	%>
		  </table>
		  <br>
		  <table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="zw">
		    <tr align="center">
		      <td align="left">����<strong><font color="#ff6600"><%=idcount%></font></strong>����¼,<strong><font color="#ff6600"><%=page%></font></strong>/<%=pagec%>,ÿҳ<strong><font color="#ff6600"><%=pages%></font></strong>����</td>
		      </tr>
		  </table>
		  <table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="zw">
		    <tr align="center">
		      <td align="right">
		      <%
	'���÷�ҳҳ�뿪ʼ===============================
	pagenmin=page-pagenc'����ҳ�뿪ʼֵ
	pagenmax=page+pagenc'����ҳ�����ֵ
	if(pagenmin<1) then'���ҳ�뿪ʼֵС��1��=1
	    pagenmin=1
	end if

	if(page>1) then'���ҳ�����1����ʾ(��һҳ)
		response.write ("<a href='"& myself &"?page=1'><font color='#000000'>��һҳ</font></a>&nbsp;")
	end if
	if(pagenmin>1) then'���ҳ�뿪ʼֵ����1����ʾ(��ǰ)
		response.write ("<a href='"& myself &"?page="& page-(pagenc*2+1) &"'><font color='#000000'>��ǰ</font></a>&nbsp;")
	end if

	if(pagenmax>pagec) then'���ҳ�����ֵ������ҳ��,��=��ҳ��
	    pagenmax=pagec
	end if

	for i = pagenmin to pagenmax'ѭ�����ҳ��
	    if(i=page) then
		response.write ("<font color='#ff6600'><strong>"& i &"</strong></font>&nbsp;")
	    else
		response.write ("[&nbsp;<a href="& myself &"?page="& i &"><font color='#000000'>"& i &"</font></a>&nbsp;]&nbsp;")
	    end if
	next
	if(pagenmax<pagec) then'���ҳ�����ֵС����ҳ������ʾ(����)
		response.write ("<a href='"& myself &"?page="& page+(pagenc*2+1) &"'><font color='#000000'>����</font></a>&nbsp;")
	end if
	if(page<pagec) then'���ҳ��С����ҳ������ʾ(���ҳ)
		response.write ("<a href='"& myself &"?page="& pagec &"'><font color='#000000'>���ҳ</font></a>&nbsp;")
	end if
	'���÷�ҳҳ�����===============================
	%>
			 ת��
			<input name="page" type="text" value="<%=page%>" size="5">ҳ
			<input type="button" name="submit" value="��ת" onclick="gopage()"></td>
		      </tr>
		  </table>
<%
end if
%>
          <br>
          <table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="zw">
  <tr>
    <td align="center">
<%
endt=timer()
rs.close
set rs=nothing
conn.close
set conn=nothing
%>
      <%=formatnumber((endt-start)*1000,3)%>���� <br>
      ���������0���룬���Ⲣ����˵�ⶫ��������0�� </td>
  </tr>
</table>
<br></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>