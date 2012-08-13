<%@ language = "vbscript" codepage = 936%>
<%
option explicit '强制定义变量
'==========================================================================
'毛虫的快速分页
'mail:mc@flashado.com
'主页:http://www.flashado.com
'qq:69862476
'本分页供初学者学习,技术上有不当之处,还请各位大侠修正
'==========================================================================
dim idcount'记录总数
dim pages'每页条数
dim pagec'总页数
dim page'页码
dim pagenc '每页显示的分页页码数量=pagenc*2+1
pagenc=2
dim pagenmax '每页显示的分页的最大页码
dim pagenmin '每页显示的分页的最小页码
page=clng(request("page"))
dim start'程序开始的时间
dim endt'程序结束的时间
dim datafrom'数据表名
datafrom="table1"
dim conn,rs
dim datapath '数据库路经
dim sqlid'本页需要用到的id
dim myself'本页地址
myself = request.servervariables("path_info")
dim sql'sql语句
dim taxis'排序的语句
taxis="order by id asc"
dim i'用于循环的整数
start=timer()
datapath="db.mdb"
pages=30

'连接打开数据库
dim db
db="db.mdb"     '定义数据库路径及名称
set conn = server.createobject("adodb.connection")
conn.open "provider=microsoft.jet.oledb.4.0;data source=" & server.mappath(db)
if err.number <> 0 then
   response.write "数据库链接出错!"
   response.end()
end if

'获取记录总数
sql="select count(id) as idcount from ["& datafrom &"]"
set rs=server.createobject("adodb.recordset")
rs.open sql,conn,0,1
idcount=rs("idcount")'获取记录总数

if(idcount>0) then'如果记录总数=0,则不处理
	if(idcount mod pages=0)then'如果记录总数除以每页条数有余数,则=记录总数/每页条数+1
		pagec=int(idcount/pages)'获取总页数
	else
		pagec=int(idcount/pages)+1'获取总页数
	end if

	'获取本页需要用到的id============================================
	'读取所有记录的id数值,因为只有id所以速度很快
	sql="select id from ["& datafrom &"] " & taxis
	set rs=server.createobject("adodb.recordset")
	rs.open sql,conn,1,1

	   rs.pagesize = pages '每页显示记录数
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
	'获取本页需要用到的id结束============================================
end if
%>
<!doctype html public "-//w3c//dtd html 4.01 transitional//en">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<title>毛虫的快速分页</title>
<link rel="stylesheet" href="page.css" type="text/css">
<script language="javascript">
<!--
function gopage() {
//毛虫的快速分页
//mail:mc@flashado.com
//主页:http://www.flashado.com
//qq:69862476
//本分页供初学者学习,技术上有不当之处,还请各位大侠修正
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
            <td><strong><font color="#ff6600">毛虫的快速分页</font></strong></td>
          </tr>
        </table>
          <br>
          <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="cccccc" class="zw">
            <tr align="center" bgcolor="#9fcb07">
              <td width="9%"><strong>ID</strong></td>
              <td width="37%"><strong>主题</strong></td>
              <td width="33%"><strong>内容(显示前20个字)</strong></td>
              <td width="21%"><strong>时间</strong></td>
            </tr>
<%
if(idcount>0 and sqlid<>"") then'如果记录总数=0,则不处理
	'用in刷选本页所语言的数据,仅读取本页所需的数据,所以速度快
	sql="select [id],[aaaa],[bbbb],[cccc] from ["& datafrom &"] where id in("& sqlid &") "&taxis
	set rs=server.createobject("adodb.recordset")
	rs.open sql,conn,0,1

	while(not rs.eof)'填充数据到表格
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
		      <td align="left">共有<strong><font color="#ff6600"><%=idcount%></font></strong>条记录,<strong><font color="#ff6600"><%=page%></font></strong>/<%=pagec%>,每页<strong><font color="#ff6600"><%=pages%></font></strong>条。</td>
		      </tr>
		  </table>
		  <table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="zw">
		    <tr align="center">
		      <td align="right">
		      <%
	'设置分页页码开始===============================
	pagenmin=page-pagenc'计算页码开始值
	pagenmax=page+pagenc'计算页码结束值
	if(pagenmin<1) then'如果页码开始值小于1则=1
	    pagenmin=1
	end if

	if(page>1) then'如果页码大于1则显示(第一页)
		response.write ("<a href='"& myself &"?page=1'><font color='#000000'>第一页</font></a>&nbsp;")
	end if
	if(pagenmin>1) then'如果页码开始值大于1则显示(更前)
		response.write ("<a href='"& myself &"?page="& page-(pagenc*2+1) &"'><font color='#000000'>更前</font></a>&nbsp;")
	end if

	if(pagenmax>pagec) then'如果页码结束值大于总页数,则=总页数
	    pagenmax=pagec
	end if

	for i = pagenmin to pagenmax'循环输出页码
	    if(i=page) then
		response.write ("<font color='#ff6600'><strong>"& i &"</strong></font>&nbsp;")
	    else
		response.write ("[&nbsp;<a href="& myself &"?page="& i &"><font color='#000000'>"& i &"</font></a>&nbsp;]&nbsp;")
	    end if
	next
	if(pagenmax<pagec) then'如果页码结束值小于总页数则显示(更后)
		response.write ("<a href='"& myself &"?page="& page+(pagenc*2+1) &"'><font color='#000000'>更后</font></a>&nbsp;")
	end if
	if(page<pagec) then'如果页码小于总页数则显示(最后页)
		response.write ("<a href='"& myself &"?page="& pagec &"'><font color='#000000'>最后页</font></a>&nbsp;")
	end if
	'设置分页页码结束===============================
	%>
			 转到
			<input name="page" type="text" value="<%=page%>" size="5">页
			<input type="button" name="submit" value="跳转" onclick="gopage()"></td>
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
      <%=formatnumber((endt-start)*1000,3)%>毫秒 <br>
      这里可能是0毫秒，但这并不是说这东西真正的0。 </td>
  </tr>
</table>
<br></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>