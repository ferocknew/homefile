<%@language="vbscript" codepage="65001"%>
<script Language="JScript" runat="server">
function createConnection(IsSqlDataBase,strPath,SqlUsername,SqlPassword,SqlDatabaseName,SqlLocalName){
		try{
			Conn = Server.CreateObject("ADODB.Connection");
			if(IsSqlDataBase=="0"){
				Conn.connectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" + Server.MapPath(strPath);
			}else{
				Conn.connectionString = "Provider = Sqloledb; User ID = "+ SqlUsername+"; Password = " + SqlPassword +"; Initial Catalog = " +SqlDatabaseName + "; Data Source = " +SqlLocalName+ ";"

			}
			Conn.open();
		}catch(e){
		    Response.Write('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />数据库连接出错，请检查连接字串!');
		    Response.End
		}
	}
//*************************************
//关闭数据库
//*************************************
function CloseDB(){
    try{
        Conn.close();
        Conn = null;
    }catch(e){}
}
</script>
<!--#include file="lib-easp.asp" -->
<%
Session.codepage=65001
Const AccessFile="fluency.mdb"
Call createConnection(0,AccessFile)

Dim v_act : v_act=Easp.RQ("act",0)
Dim v_SumNum : v_SumNum=Easp.RF("SumNum",1) '总分
Dim v_val : v_val=Split(Easp.RF("val",0),",") '每到题目


Select Case v_act
	Case "getsum"
	Dim v_c1,v_c2,v_c3,v_c4
	v_c1=0 '100分
	v_c2=1 '92分以上（包含）
	v_c3=1 '85分以上（包含）
	v_c4=1 '84分以下（包含）

	v_c1=Conn.Execute("Select count(*) From [OnlineTestPerson] Where SumNum >=100")(0)
	v_c2=Conn.Execute("Select count(*) From [OnlineTestPerson] Where SumNum >= 92")(0)
	v_c3=Conn.Execute("Select count(*) From [OnlineTestPerson] Where SumNum >= 85")(0)
	v_c4=Conn.Execute("Select count(*) From [OnlineTestPerson] Where SumNum <= 84")(0)

	Call jsonheadResponse()
	Response.Write("{""err"":0,""data"":[{""id"":""c1"",""num"":"&v_c1&"},{""id"":""c2"",""num"":"&v_c2&"},{""id"":""c3"",""num"":"&v_c3&"},{""id"":""c4"",""num"":"&v_c4&"}]}")

	Case Else
		'添加总分
		Dim v_SQL : v_SQL="Select * From [OnlineTestPerson]"
		Set rs = server.CreateObject("adodb.recordset")
		Call rs.Open(v_SQL,conn,1,3)
		rs.addnew
		rs("SumNum")=v_SumNum
		rs.update
		Dim v_RsID : v_RsID=rs("ID")
		rs.close:Set rs=Nothing

		'记录每到题目的分数
		For i=0 To UBound(v_val)
			conn.Execute("INSERT INTO [OnlineTestItem] ([PersonID],[QID],[AnswerN]) VALUES ("&v_RsID&","&i+1&","&v_val(i)&")")
		Next

		Call jsonheadResponse()
		Response.Write("{""err"":0,""msg"":""ok！""}")
End Select

'*************************************
'生成json头
'*************************************
Sub jsonheadResponse()
Response.Buffer =True
Response.Charset = "utf-8"
Response.ContentType="application/json"
Response.Expires=0
Response.ExpiresAbsolute =Now()
Response.CacheControl="no cache"
End Sub
%>

