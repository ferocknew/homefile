<!--#include file="lib/lib-tpl.asp" -->
<!--#include file="conn.asp" -->
<%
'http://bbs.itjsj.com/viewthread.php?tid=412226
Set tpl=New JaspTpl
'tpl.clearAllCache()
'可选参数,默认是 $
'tpl.setTagHead      = "cms:"'自定义头标签，不能为空，数字+字母或字符 例如:$、@、tpl: 等自定义的




tpl.setCache        = "cachenamecachename,0,120"'缓存名称,缓存方式,缓存时间(默认是秒) 1 内存缓存，2 文件缓存，3 超长缓存
tpl.setCharset      = "utf-8"'使用utf-8编码的模板，其他编码可能需要自行转换函数文件编码
tpl.setRootPath = cStr(Server.MapPath("./"))'必选设置,后面不带斜杠
'tpl.setAbsPath = 0
tpl.setTemplatePath = "./tpl/"'可选设置,设置模板目录
tpl.setTemplateFile = "index.tpl"'可选,模板文件路径相对于模板目录
'tpl.intExecuteTpl = 0


'输出的数据变量
tpl.d("doctitle")="标题在这里" '不可以用下划线
tpl.d("username")="taihom"
tpl.d("name")="梅川内酷"
tpl.d("password")="密码"
tpl.d("runtime")=tpl.RunTimer



Set rs=Conn.Execute("Select top 2 [ID],Format([DateTime],'yyyy年mm月dd日') from [test] order by rnd(id-timer())")
rs=rs.getRows()

tpl.d("data[name=nnn]")=Array(rs,"id,name")

tpl.display()'显示模板
Set tpl=Nothing



function myfn(rs)
	rs("test")=rs("id")&"123"
	Set myfn=rs
end function
%>
