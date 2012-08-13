<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
Rem ================================================================================================
Rem = File Name : mlzpage.asp
Rem = Description : ASP + Access2000 高效分页法
Rem = Trait : 可承受百万以上数据，倒序分页效率不变
Rem = Power by : NB联盟--mackyliu (才子，风流才子) 另感谢联盟炼子兄弟提供记录指针算法
Rem = QQ:5151378　MSN:mackylxf@hotmail.com　Web:http://www.54caizi.com
Rem = Last Modify : 2004/09/20 Night
Rem = Revision : 1.3 Beta
Rem ================================================================================================

On Error Resume Next
dim startime,endtime
startime=timer()

'连接数据库
dim db,conn,rs
db = "provider=microsoft.jet.oledb.4.0;data source=" & server.mappath("./db.mdb")
set conn = server.createobject("adodb.connection")
set rs = server.createobject("adodb.recordset")
conn.open db
%>

<%
'**************
'分页导航栏函数
'输出wzpage值
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
            Response.Write ("<a href=""?board_id="& boardid &"&page=1"" title=""首页"">9</a>")
			Response.Write ("<a href=""?board_id="& boardid &"&page="& pagenum-1 &""" title=""前十页"">7</a>")
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
            Response.Write ("<a href=""?board_id="& boardid &"&page="& pagenum &"""  title=""后十页"">8</a>")
			Response.Write ("<a href=""?board_id="& boardid &"&page="& pagecount &"""  title=""末页"">:</a>")
            Response.Write ("</font>")
	  End If
End Function
%>

<%
dim rssql,getstring
getstring = clng(request.querystring("board_id"))
if getstring = 0 then getstring = 1

'******************************************
'取文章总数及每页重复显示条数，准备分页
'wzcount 文章总数
'wzrep 重复显示条数
'wzpage 分页参数id
'wzpagecount 总页数
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
<title>分页测试</title>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="page.css" type="text/css">
</head>
<body>
<table width="760" border="1" cellspacing="0" cellpadding="4" align="center" bordercolordark="#ffffff" bordercolorlight="#cccccc">
  <tr align="center">
    <td width="60">ID</td>
    <td width="150">标题</td>
    <td width="*">内容(显示前20个字)</td>
    <td width="150">时间</td>
  </tr>
  <%
'取文章列表
rssql = "select id,aaaa,bbbb,cccc from [table1] where aaaa like '%字段1%'"
rs.open rssql,conn,1,1,&h0001
'根据分页参数获取当前页面纪录
rs.absoluteposition=rs.absoluteposition+((abs(wzpage)-1)*wzrep)
'显示文章标题列表
if rs.eof or rs.bof then%>
<tr>
    <td >暂无记录</td>
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
    <td align="left" width="200">共<font color=red><%= wzcount%></font>条 <font color=red><%= wzrep%></font>/页 共<font color=red><%= wzpagecount%></font>页</td>
	<td align="right"> <%= pagination(wzpagecount)%></td>
  </tr>
</table>

<table width="760" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">
      <%endtime=timer()%>
      本页面执行时间：<%=formatnumber((endtime-startime)*1000,3)%>毫秒</td>
  </tr>
</table>
</body>
</html>
<%
'释放资源
rs.close
set rs = nothing
conn.close
set conn = nothing
%>