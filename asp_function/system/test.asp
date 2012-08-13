<!--#include file="lib/lib-const.asp" -->
<!--#include file="conn.asp" -->
<!--#include file="lib/lib-Head.asp" -->
<%

'Dim s,m,match
's = "<em>Scott/Tiger</em><em>Smith/Cat</em>"
'Set m = Easp.RegMatch(s, "<em>(\w+)/(\w+)</em>")
'For Each match In m
'Easp.WN ScriptEngine & " " & ScriptEngineMajorVersion & "." & ScriptEngineMinorVersion & "." & ScriptEngineBuildVersion
'Easp.WN "===="
'Easp.WN VarType(match)
'Easp.WN TypeName(match)
'Easp.WN "===="
'Easp.WN VarType(match.SubMatches)
'Easp.WN TypeName(match.SubMatches)
'Exit For
'Next
'Set m = Nothing



Set fso=new FsoSystem
fso.PathType=2
FileGet=fso.CheckFile("mdb.mdb")
'Set fso=Nothing


Dim str:str=Jasp.output("我们！","string")
Response.Write(str)

Set rs=Conn.execute("select top 10 Replace([aaaa],'字段','1111') from table1 ")

'
'Response.Write(FileGet)
'Response.End()

'If Not FileGet Then
'	dbpath = "mdb.mdb" '数据库路径
'	Set DB = CreateObject("ADOX.Catalog")
'	DB.Create("Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Server.MapPath(dbpath))
'End If

'Call createConnection(0,dbpath)
'set conn=Jasp.adodb.connection(Jasp.parse("{""provider"":""access"",""dataSource"":""mdb.mdb""}").Get())
'If Not chktable("test",conn) Then
'	conn.execute("CREATE TABLE [test] (  [id] AUTOINCREMENT PRIMARY  key ,   ItemId int, Quantity int) ")
'	conn.execute("Create Index [ItemId] ON test ([ItemId]);")
'	conn.execute("Create Index [Quantity] ON test ([Quantity]);")
'	conn.execute("")
'End If
'AccessFile="mdb.mdb"
'Call AccessComp(conn,AccessFile)
'Set s=new JaspStream
'Call s.SaveToLocal("http://pic3.soso.com/pic?fid=11763710574908298179","123.jpg")

'Call s.SaveToFile("123,我们"&CHR(10)&"1,2"&CHR(10)&"2,2","111.csv")
'xmlurl="http://code.golib.net/123.xml"
'If Not fso.CheckFile("123.xml") Then Call s.SaveToLocal(xmlurl,"123.xml")
'str="PCEtLSNpbmNsdWRlIGZpbGU9ImxpYi9saWItY29uc3QuYXNwIiAtLT4NCjwhLS0jaW5jbHVk ZSBmaWxlPSJsaWIvbGliLUhlYWQuYXNwIiAtLT4NCjEyMw=="

'Set f=new  JaspFSO
'With f
'		For each r In .GetFileInfo("index.asp")
'			Response.Write(r & "<br />")
'		Next
'End With




%>
