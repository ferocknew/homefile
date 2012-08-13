<%option explicit%>
<%
Response.CacheControl = "no-cache" 
Response.AddHeader "Pragma", "No-Cache"
Response.CodePage="65001"
Response.Charset="utf-8"
%>
<!--#include file="Inc/think.tpl.asp"-->
<!--#include file="Inc/DBOperate.class.vbs.asp" -->
<%
'****************ACCESS数据库******************

Dim dbo
Set dbo = New DBOperateClass
    dbo.setConnString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & server.mapPath("./test.mdb")
	
Dim tpl
Set tpl = New Taihom_tpl'使用tpl模板引擎
	tpl.conn = dbo.conn'设置数据库连接
	
	'不是必须但是要设置正确
	'tpl.setRootPath     = Server.MapPath("./")'设置站点根目录路径
	
	'可选参数,可统一到include文件中
	'tpl.setTagHead      = "cms:"'自定义头标签，不能为空，数字+字母或字符 例如:$，@，tpl: 默认是 $
	tpl.setCharset      = "utf-8"'使用utf-8编码的模板，其他编码可能需要自行转换函数文件编码
	tpl.setTemplatePath = "./templates/" '模板存放路径
	
	'设置缓存
	tpl.setCache        = "cachenamecachename,0,10"'缓存名称,缓存方式,缓存时间(默认是秒)
	
	'页面参数
	tpl.setTemplateFile = "loop.html" '模板文件
	
	'读取模板标签
	'Response.Write tpl.getAttr("title[ok=2].len")
	
	'Response.Write tpl.getAttr("title:body")
	
	'Response.Write tpl.getAttr("data.sql")(1)
	'tpl.setAttr("data/loop1/loop2/loop3/loop3title.ok") = "ok111"
	'Response.Write tpl.getAttr("data/loop1/loop2/loop3/loop3title.ok")
	
	'Response.Write tpl.getAttr("title:html")(1)
	
	'新方法 '给标签设置参数
	'tpl.setAttr("data.sql") = "asdf"'给标签设置参数
	'tpl.setAttr("data.conn")=dbo.conn
	'Response.Write tpl.getAttr("class.sql")
	'tpl.setAttr("data:body") = "<asdf<>"'给标签设置参数
	'Response.Write tpl.getAttr("data:body")(1)
	'Response.Write(tpl.getLabelValues("topic"))'获取指定标签值，如果想获取所有标签值，请传入 标签头
	
    tpl.d("typeid") = 1
	tpl.d("title")  = "标题"
	tpl.d("hellow") = "HELLOW"
	tpl.d("gogogo") = "gogogo"
	
	Dim rs
	Set rs = dbo.execute("Select top 10 * From [news] Where typeid = 2")
	While Not rs.Eof
		'Response.Write(rs(0))
		'Response.Write(tpl.getAttr("news:body"))
		rs.MoveNext
	Wend
	

	'Response.Write(tpl.getAttr("news:html"))
	
	Response.Write(Asc("<"))
	
	'显示模板
	tpl.display
		
Set Tpl = Nothing
%>