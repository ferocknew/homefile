<!--#include file="lib/lib-const.asp" -->
<!--#include file="conn.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%

Response.Write(TypeName(test()))
Response.End()

Set Cache=New JaspCache
Cache.dateTime("Page")=120
'Set rs=conn.execute("select top 10 id from table1")
'Cache.Cache("DB")=rs.GetRows()
'Cache.Clear("page")
'
'Response.Write(Cache.Exists("Page"))

If  Not Cache.Exists("Page") Then
	Set rs=conn.execute("select top 1000 id from table1")
	Cache.Cache("Page")=rs.GetRows()
End If

Call Cache.Count()

JsonDBField=Array("id")
'Cache.Cache("show")="123123"
RsNew=Cache.Cache("Page")

'Set rs3=conn.execute("select top 10 id from table1")

'Set DicTmp=Server.CreateObject("Scripting.Dictionary")
'DicTmp.Add "DicTmp",rs3
'DicTmp.Add "show",Now()

'Cache.Cache("Temp")=rs3.Clone
Response.Write(Application("Page")(1))

'Set rsDB=conn.execute("select top 1000 id from table1")

'rsDB.save  Server.MapPath("temp.txt"),adPersistXML
set rs = Server.CreateObject("Adodb.Recordset")
rs.Open Server.MapPath("temp.xml")

'Jasp.vb(ReArray(RsNew)).getRows(JsonDBField,1,1).output("json")
'Call Jasp.output(rs,"json")
''Cache.Clear("page")
'If Cache.Exists("Page") Then
'	Response.write Cache.Cache("Page") '输出
'Else
'	Cache.Cache("Page")=rs
'End IF
Cache.Clear("page")'删除缓存

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