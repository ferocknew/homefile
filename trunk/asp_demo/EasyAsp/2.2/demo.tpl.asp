<%@language="vbscript" codepage="65001"%><!--#include file="easp/easp.asp" --><%
Dim txt,i,j
txt = "这篇文档是Easp的模板类的测试文档和示例文件"
'加载tpl
Easp.Use "tpl"
'是否允许在模板文件中使用ASP代码
'Easp.tpl.AspEnable = True
'模板文件路径
Easp.tpl.FilePath = "/www/jonah-js-tools/asp_demo/EasyAsp/2.2/html/"
'如何处理未替换的标签
'Easp.tpl.TagUnknown = "comment"
'加载模板
Easp.tpl.Load "tpl.html"
'开始解析标签，MakeTag可以快速生成html标签
Easp.tpl "author", Easp.tpl.MakeTag("author","Coldstone, TainRay")
Easp.tpl "keywords", Easp.tpl.MakeTag("keywords", "EasyAsp, Easp, Version 2.2")
Easp.tpl "description", Easp.tpl.MakeTag("description","This is a EasyAsp TPL Sample.")
Easp.tpl "jsfile", Easp.tpl.MakeTag("js","html/inc.js")
Easp.tpl "cssfile", Easp.tpl.MakeTag("css","html/style.css")
Easp.tpl "title", "EasyAsp 模板类测试页"
Easp.tpl "subtitle", txt
Easp.tpl "color", "#FF6600"
'开始循环
For i = 1 to 3
	Easp.tpl "A.title", "A标题" & i
	Easp.tpl "A.addtime", Easp.DateTime(Now(),"y/mm/dd")
	Easp.tpl.Update "A"
Next
'嵌套循环演示，嵌套可以无限层的，这是父循环
For i = 1 to 4
	Easp.tpl "B.title", "B标题" & i & " | "
	Easp.tpl "B.id", i+10
	Easp.tpl "B.addtime", Easp.DateTime(Now()-5,"y/m/d/ h:i:s")
	'这是子循环
	For j = 20 to 23
		Easp.tpl "page.list", " "&i&">"&j
		Easp.tpl.Update "page"
	Next
	Easp.tpl.Update "B"
Next
Easp.tpl.Show

Set Easp = Nothing
%>