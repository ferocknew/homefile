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
'http://bbs.itjsj.com/thread-412226-1-1.html
Dim tpl
Set tpl = New TemplateManageClass
    '全局配置信息
    'tpl.setCharset = "utf-8" '可选设置,默认是utf-8
	tpl.setCacheType = 0 '可选设置,0=不需要缓存,1=文件缓存,2=内存缓存
    tpl.setRoot = cStr(Server.MapPath("./"))'必选设置,后面不带斜杠
    'tpl.setTemplatedir = "/templates/"'可选设置,设置模板目录
	'tpl.setCachedir = "/cache/templates/"'可选设置,设置缓存目录
	'tpl.setAbsPath = 1 '可选设置,模板绝对路径,默认是开的,作用是输出的时候将模板相对路径替换成绝对路径,已经是绝对路径或者描点等不受影响，此开关只是转换那些不是绝对路径的页面设置(影响到单个页面的设置)

	'页面参数
    'tpl.setPageTimeout=0
	tpl.setPath = "index.html"'可选,模板文件路径相对于模板目录
	'tpl.setHtml = "html{@name}"'加载模板代码，如果不指定tpl.setPath,程序自动使用这里,反正 tpl.setPath/tpl.setHtml二选其一,使用这个之后模板缓存自动关闭
	tpl.load() '加载模板


    '输出的数据变量
	tpl.add("@title")="标题在这里"
	tpl.add("@username")="taihom"
	tpl.add("@name")="梅川内酷"
	tpl.add("@password")="密码"
	tpl.add("@runtime")=tpl.RunTimer
	tpl.add("@author")=tpl.Author

    '获得循环块的参数
	Dim block,getattr
	Set block = tpl.getblock'获得块列表,返回dic对象，key = 循环块,items = 块的属性(数组，0=属性名称,1=值)
	Set getattr = tpl.getattr'获得属性列表,返回dic对象


	Dim sql1 : sql1 = getattr("loop1.sql")'获取loop1块的sql属性
	Dim sql2 : sql2 = getattr("loop2.sql")'获取loop2块的sql属性
	Dim sql3 : sql3 = getattr("loop3.sql")'获取loop3块的sql属性



    '循环块内容输出
	tpl.add("loop1") = dbo.execute(sql1)'直接给loop1块数据
	tpl.add("loop2") = dbo.execute(sql2)'直接给loop2块数据
	tpl.add("loop3") = dbo.execute(sql3)'直接给loop3块数据

	'嵌套循环的支持--仅仅是例子，可根据自己的实际情况编写
	Dim sql4,borderid
	borderid = getattr("loop4.borderid")'获取borderid
	sql4 = "select * from [class] where typeid="&cint(borderid)

	'Response.Write(sql4)
	tpl.add("loop4") = dbo.execute(sql4)'直接给loop3块数据

	tpl.add("@tagattr") =getattr("@username.show")

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
'--------------------------下面是调用的函数部分
	function myfn(str)
		myfn=str
	end function

	function getnews(borderid)'后台调用函数
		dim s
		s = "select * from [news] where borderid="&borderid

		Set getnews = dbo.execute(s)
	end Function


	Function test(str)
		Dim v_temp : v_temp=Array(1,1)
		v_temp(0,0)=str
		Set test=v_temp(0,0)
	End Function
%>