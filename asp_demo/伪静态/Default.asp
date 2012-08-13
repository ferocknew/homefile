<%
dim id,id1,id2,a,b
v_RequestString=Request.ServerVariables("QUERY_STRING")
v_Request=replace(v_RequestString,".html","")
v_Request=split(v_Request,"-")
If v_RequestString="" Then Response.End()
a=Replace(v_Request(0),"/","")
b=v_Request(1)
'到这里已经获取了List.asp文件需要的a、b参数了。
'下面利用该参数，和以前一样打开数据库，获取内容。

'Server.Execute(a+".asp")
Server.Transfer(a+".asp")
Response.Write("<br />"&"111")
%>