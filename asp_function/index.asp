<!--#include file="easp.asp" -->
<%
'Easp.rr(Easp.GetUrlWith(":-action","file_page=list&name=2222&html=/show.html"))
page_file=Request.QueryString("file_page")
Server.Transfer(page_file&".asp")
%>
