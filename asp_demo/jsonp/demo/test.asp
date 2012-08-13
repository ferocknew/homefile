<!--#include file="lib/lib-const.asp" -->
<!--#include file="conn.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%
Set rs = Server.CreateObject("ADODB.RecordSet")
SQL="SELECT TOP 1000 [CL_Id],[CL_AdminName],[CL_AdminPwd],[CL_AdminPower],[CL_LastTime],[CL_LastIP],[CL_Flag]  FROM [sq_szgy].[sq_szgy].[SZ_Admin]"
Call rs.Open(SQL,conn,1,1)
Response.Write(rs("CL_AdminName"))

%>
<!--#include file="inc/inc-foot.asp" -->
