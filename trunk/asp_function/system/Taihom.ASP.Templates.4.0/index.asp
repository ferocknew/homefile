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
	tpl.setCache        = "cachenamecachename,0,120"'缓存名称,缓存方式,缓存时间(默认是秒)

	'页面参数
	tpl.setTemplateFile = "index.html" '模板文件

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


	'循环块赋值
	'tpl.d("class") = "循环块class"
	tpl.d("class") = dbo.execute("Select borderid,typeid,bordername From [Class] Where borderid = 2")

	Dim rs
	Set rs = dbo.execute("Select borderid,typeid,bordername From [Class] Where borderid = 2")
	tpl.d("class") = Array(rs,"bid,tid,bname")

	Dim data
	Set data = tpl.Dicary()
		data("borderid") = "块赋值ID"
		data("typeid") = 2
		data("bordername") = "块数据"
	tpl.d("data") = data

	Dim ary(3)
		ary(0) = 1
		ary(1) = 2
		ary(2) = "一维数组数据"

	tpl.d("class/type") = Array(ary,"borderid,typeid,bordername")

	Dim ary1(1,3)
		ary1(0,0) = 1
		ary1(0,1) = 2
		ary1(0,2) = "二维数组数据1"

		ary1(1,0) = 2
		ary1(1,1) = 3
		ary1(1,2) = "二维数组数据2"

	tpl.d("data[name=nnn]") = Array(ary1,"borderid,typeid,bordername")

	tpl.d("cms:") = Array(Split("2|HI你好|我是taihom","|"),"typeid,title,hellow")

	'tpl.d("class") = '可以直接给Rs，或者 Array(数组，"字段,字段,字段,字段,字段,字段") Array(RS，"字段,字段,字段,字段,字段,字段")
	'由于rs.getrows 传递的数组跟普通数组行列是相反的，所以不要传递rs.getwors，模板类已经自动处理了



	'显示模板
	tpl.display

Set Tpl = Nothing

'根据属性返回正确的SQL语句，主要作用是根据循环标签的属性构造完整的SQL
'getSql 是模板类调用的函数，如果没这个函数，那么循环赋值就完成不了工作了
'如果想改变这个函数的调用名称，搜索一下这个函数名
Function returnSql(labelName,attr)
'传参 说明
'labelName 标签名
'attr 标签的属性，字典对象：名=值
	Dim sql
	Select Case Lcase(labelName)
	Case "class"'
		Dim id
			id = attr("borderid")
			sql = "Select * From [class] Where typeid = " & id
	Case Else
		labelName = sql
	End Select
	returnSql = sql
End Function

'自定义字段数据输出
Function myclassdata(rs)
rs("bordername") = "<span style=""color:red;"">"&rs("bordername")&"</span>"
rs("taihom") = "我的字段赋值"

Set myclassdata = rs
End Function
%>