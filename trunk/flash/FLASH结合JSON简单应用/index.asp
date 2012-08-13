<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="JSON_2.0.2.asp"-->
<!--#include file="JSON_UTIL_0.1.1.asp"-->
<!--#include file="conn.asp"-->
<%
dim member
set member=jsObject()
QueryToJSON(conn,"select id,title,content from News ").flush
conn.close
set conn=nothing

%>

