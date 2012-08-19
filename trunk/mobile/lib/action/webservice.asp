<!--#include file="../lib-const.asp" -->
<!--#include file="../lib-Head.asp" -->
<%
Dim pages,perpageSize
pages=Easp.RQ("pages",1)
perpageSize=Easp.RQ("perpageSize",1)
'打开数据库
Dim oo,conn
oo="{""provider"":""access"",""dataSource"":""../../db/db.mdb""}"
Set conn=Jasp.adodb.connection(Jasp.parse(oo).Get())

'分页
Dim sql,sqlCount,DBField
DBField="ID,aaaa,bbbb,cccc"
sql = "SELECT "&DBField&" FROM [table1]"
sqlCount = "SELECT Count([ID]) FROM [table1]"

'Dim pageCls
'Set pageCls = New Cls_PageView
'
'pageCls.strSqlCount = sqlCount		'记录数
'pageCls.strSql = sql				'SQL语句
'pageCls.intPageSize = intPageSize	'每页显示记录数
'pageCls.intPageNow = intPageNow		'当前页
'
'pageCls.objConn = Conn
'rs = pageCls.arrRecordInfo
'Set pageCls=Nothing

rsCount=conn.execute(sqlCount)(0)

Set ors=new Cls_ShowoPage '创建对象
With ors
	.PageNum=pages		'页码
	.PageSize=perpageSize		'每页记录条数
	.Conn=conn					'得到数据库连接对象
	.RecSql=sqlCount				'统计用SQL语句
	.exeuSql=sql				'执行的SQL语句
	.Order=0						'排序(0顺序1降序),注意要和下面sql里面主键ID的排序对应
End With


rs=ors.ResultSet()
Set ors=Nothing

JsonDBField=Split(DBField,",")
Call jsonheadResponse()
Response.Write("{""pageMAX"":"&rsCount&",""datalist"":")
Call Jasp.vb(rs).getRows(JsonDBField,4,1).output("json")
Response.Write("}")
'Call Jasp.parse("[{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""},{""name"":""ferock""}]").output("json")

'关闭数据库
Jasp.adodb.close(conn)
%>