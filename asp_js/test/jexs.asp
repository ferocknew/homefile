<%@language="vbscript" codepage="65001"%>
<script Language="JScript" runat="server" src="../lib/Jexs-json.js"></script>
<script Language="JScript" runat="server" src="../lib/jexs.js"></script>

<script Language="JScript" runat="server">
Session.CodePage=65001;
var conn1=Jexs.Ado.connection({provider:"access",dataSource:"../db/db.mdb"});
//Jexs.ado(conn1).execute("Select * From [testUser]").output("json");

//createConnection(0,"db/db.mdb")
//var rs = new ActiveXObject("ADODB.Recordset");
//var rs = new ActiveXObject("ADODB.Recordset")
//rs.Open("Select * From [testUser]",Conn,1)
////Response.Write(JSON.stringify(test_data))
////Response.Write(Jexs.DBobj(rs)[0].ID)
//rs.Open("Select * From [testUser]",Conn,1,1);
//Response.Write(JSON.stringify(Jexs.ADO2Obj("Select * From [testUser]",Conn)))
//var new_Array={list:transArray(rs.GetRows.toArray(),rs.Fields.Count)};
//Response.Write(rs.GetRows.toArray())//dd,0



function json2xml(o, tab) {
   var toXml = function(v, name, ind) {
      var xml = "";
      if (v instanceof Array) {
         for (var i=0, n=v.length; i<n; i++)
            xml += ind + toXml(v[i], name, ind+"\t") + "\n";
      }
      else if (typeof(v) == "object") {
         var hasChild = false;
         xml += ind + "<" + name;
         for (var m in v) {
            if (m.charAt(0) == "@")
               xml += " " + m.substr(1) + "=\"" + v[m].toString() + "\"";
            else
               hasChild = true;
         }
         xml += hasChild ? ">" : "/>";
         if (hasChild) {
            for (var m in v) {
               if (m == "#text")
                  xml += v[m];
               else if (m == "#cdata")
                  xml += "<![CDATA[" + v[m] + "]]>";
               else if (m.charAt(0) != "@")
                  xml += toXml(v[m], m, ind+"\t");
            }
            xml += (xml.charAt(xml.length-1)=="\n"?ind:"") + "</" + name + ">";
         }
      }
      else {
		v=String(v);
         xml += ind + "<" + name + ">" + .toString() +  "</" + name + ">";
      }
      return xml;
   }, xml="";
   for (var m in o)
      xml += toXml(o[m], m, "");
   return tab ? xml.replace(/\t/g, tab) : xml.replace(/\t|\n/g, "");
}
</script>
<script Language="vbscript" runat="server">
Function parseJSON(str)
	If Not IsObject(scriptCtrl) Then
		Set scriptCtrl = Server.CreateObject("MSScriptControl.ScriptControl")
		scriptCtrl.Language = "JScript"
		scriptCtrl.AddCode "function ActiveXObject() {}" ' 覆盖 ActiveXObject
		scriptCtrl.AddCode "function GetObject() {}" ' 覆盖 ActiveXObject
		scriptCtrl.AddCode "Array.prototype.get = function(x) { return this[x]; }; var result = null;"
	End If
On Error Resume Next
	scriptCtrl.ExecuteStatement "result = " & str & ";"
	Set parseJSON = scriptCtrl.CodeObject.result
If Err Then
	Err.Clear
	Set parseJSON = Nothing
End If
End Function

Set obj = parseJSON("{""provider"":""access"",""dataSource"":""../db/db.mdb""}")
Set conn=Jexs.Ado.connection("1")
</script>
