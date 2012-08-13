<%@language="vbscript" codepage="65001"%>
<%
Session.codepage=65001
%>
<!--#include file="easp/easp.asp" -->
<%
Easp.Use "JSON"
Dim json,json1
Set json = Easp.Json.New(0) '0为JSON对象object
json("a") = "aa"
json("b") = 4
json("c")=Easp.Json.New(0)
json("c")("a")="aaaaa"

Set json1 = Easp.Json.New(0)
json1("err")=Now()
json1("b")=Easp.Json.New(1)
json1("b")("a")=json
'Easp.WN json.jsString '返回JSON字符串
json1.Flush  '直接输出JSON到浏览器

%>