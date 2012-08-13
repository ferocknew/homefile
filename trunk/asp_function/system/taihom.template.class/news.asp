<%option explicit%>
<script language="vbscript" runat="server">
Response.CacheControl = "no-cache" 
Response.AddHeader "Pragma", "No-Cache"
Response.CodePage="65001"
Response.Charset="utf-8"
</script>
<!--#include file="class/Template.class.vbs.asp" -->
<!--#include file="class/DBOperate.class.vbs.asp" -->
<%
'****************ACCESS数据库******************
Dim dbo
Set dbo = New DBOperateClass
    dbo.setConnString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & server.mapPath("./test.mdb")
	
'//-------这里是使用该类的例子
Dim tpl
Set tpl = New TemplateManageClass
    '全局配置信息
    'tpl.setCharset = "utf-8" '可选设置,默认是utf-8
	tpl.setCacheType = 0 '可选设置,0=不需要缓存,1=文件缓存,2=内存缓存
    tpl.setRoot = cStr(Server.MapPath("./"))'必选设置,后面不带斜杠
    'tpl.setTemplatedir = "/templates/"'可选设置,设置模板目录
	'tpl.setCachedir = "/cache/templates/"'可选设置,设置缓存目录


	'获取新闻ID
	Dim id,sql,rs
	id=Cint(0&Request.QueryString("id"))
	sql="Select * From [news] Where newsid="&id
	Set rs = dbo.execute(sql)
	If Not rs.eof Then
		tpl.setPath = "news.html"'可选,模板文件路径相对于模板目录
	Else
		tpl.setPath = "nonews.html"'可选,模板文件路径相对于模板目录
	End If

	tpl.load() '加载模板
	
	
	
    '输出的数据变量
	tpl.add("@")=rs
	tpl.add("@runtime")=tpl.RunTimer
	tpl.add("@author")=tpl.Author


    tpl.display()'显示模板
	'Response.Write(eval(getattr("@username.eval")))
	
	'--------------清楚所有模板缓存
    'tpl.ClearCache
	
	'--------------获取输出的代码
	'html = tpl.gethtml
	
	'--------------将结果生成静态页面
	'如果需要生成静态页面，使用 .OutPutPage("路径")=文件名
	'tpl.OutPutPage(cStr(Server.MapPath("./"))) = "asdf.html"
	'tpl.clearFileCache() '清除文件缓存
	'tpl.clearAllCache() '清除所有内存缓存
	
	dbo.close
Set tpl = Nothing
Set dbo = Nothing
%>