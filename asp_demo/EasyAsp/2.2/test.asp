<%@language="vbscript" codepage="65001"%>
<%
dim startime : startime=timer()
%>
<!--#include file="easp/easp.asp" -->
<%
dim endtime : endtime=timer()

Response.write("页面执行时间："&FormatNumber((endtime-startime)*1000,3)&"毫秒")
%>