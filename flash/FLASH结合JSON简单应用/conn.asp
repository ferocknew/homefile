<%
	Set Conn=Server.CreateObject("ADODB.Connection")
	Db="data.mdb"
	Connstr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & Server.MapPath(Db)
	Conn.Open Connstr
	
	Function ReplaceBadWord(eword)
  eword = Replace(eword,"'","")
  eword = Replace(eword," ","")
  eword = Replace(eword,"(","")
  eword = Replace(eword,"\","")
  eword = Replace(eword,"^","")
  eword = Replace(eword,"%","ге")
  eword = Replace(eword,"|","")
  eword = Replace(eword,";","")
  eword = Replace(eword," = ","")
  eword = Replace(eword,"select","")
  eword = Replace(eword,"or","")
  eword = Replace(eword,"Or","")
  eword = Replace(eword,"oR","")
  eword = Replace(eword,"And","")
  eword = Replace(eword,"aNd","")
  eword = Replace(eword,"anD","")
  eword = Replace(eword,"and","")
  eword = Replace(eword,"delete","")
  eword = Replace(eword,"where","")
  html = Replace(Body,"'","")
  html = Replace(html,Chr(34),"")
  eword = Trim(Replace(eword,")",""))  
  ReplaceBadWord = eword
End Function
%>
