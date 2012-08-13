<!--#include file="lib/lib-const.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%
'Response.Buffer = False '不加此句可能出现"超过响应缓冲区限制"错误
Set conn = Server.CreateObject("ADODB.Connection")
conn.open("DRIVER={SQLite3 ODBC Driver};Database="&Server.mappath("db.db3"))


dim startime
startime=timer()

'Set rs = Server.CreateObject("ADODB.RecordSet")
'Call rs.Open("Select * from show_1",Conn,1,3)
'rs.addnew
'rs("title")="123123123"
'rs("CDate")=FormatDT(Now(),"{Y}-{M}-{D} {H}:{N}:{S}")
'rs.update
'rs.close:Set rs=Nothing
'
'
'Response.End()

pageID=4
pageSize=30
countSQL="SELECT COUNT(*) FROM [TEST1]"
'SQL="SELECT * FROM [learning] WHERE ID BETWEEN 100 AND 200"

'
'Set pageRs=new Cls_ShowoPage		'创建对象
'	With pageRs
'		.PageNum=pageID				'页码
'		.PageSize=pageSize				'每页记录条数
'		.Conn=conn							'得到数据库连接对象
'		.RecSql=countSQL				'统计用SQL语句
'		.exeuSql=SQL						'执行的SQL语句
'		.Order=0								'排序(0顺序1降序),注意要和下面sql里面主键ID的排序对应
'	End With
'
'	rsCount=pageRs.RecCount()			'记录总数
'	rs=pageRs.ResultSet()						'返回ResultSet
'Set pageRs=Nothing
'
'Response.Write(UBound(rs,2))
'Response.Write("<br />")

PageMAX=(pageID-1)*pageSize
PageMIN=pageSize

'SQL="SELECT TEST1 FROM [TEST1] WHERE TEST1 LIKE '%33%' AND ID BETWEEN 2400027 AND 2450027 LIMIT "&PageMAX&","& PageMIN &""
SQL="SELECT * FROM [learning] LIMIT "&PageMAX&","& PageMIN &""
Response.Write(SQL)
Response.Write("<br />")

Set rs=Conn.execute(SQL)
rs=rs.getRows()

For i=0 To UBound(rs,2)
	Response.Write(rs(9,i))
	Response.Write("<br />")
Next


dim endtime
endtime=timer()
Response.Write(" <br />")
Response.Write(FormatNumber((endtime-startime)*1000,3)&"ms")
%>