<!--#include file="lib/lib-const.asp" -->
<!--#include file="conn.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%
Set Cache=New JaspCache
'Response.Write(Cache.count)
'
'If Not Cache("123").ready Then
'	Cache("123")=1111111111
'Else
'	'Response.Write(Cache("123"))
'End If
'
For Each i In Cache.List
	Response.Write(i)
	Response.Write("<br />")
Next
'
If Not Cache("123").ready Then
'	Set rs=Conn.execute("Select top 10 id from table1")
'	Cache("123")=rs
Else
	rs=Cache("123")
End If
For Each i In Cache.Files
	Response.Write(i)
Next
Response.Write(UBound (Cache.Files))


'Cache.clearAll
'Cache.clearFiles
Set Cache=Nothing

Function ReArray(aRs)
	For k=0 To UBound(aRs, 2)
		Randomize
		 p = CInt(Rnd()* UBound(aRs, 2))
		 For j=0 To UBound(aRs)
			s = aRs(j,k)
			aRs(j,k) = aRs(j,p)
			aRs(j,p) = s
		 Next
	Next
ReArray=aRs
End Function
%>