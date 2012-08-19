<%
page_file=Request.QueryString("file_page")
Server.Transfer(page_file&".asp")
%>