<%@language="vbscript" codepage="65001"%>
<%
Session.codepage=65001
%>
<!--#include file="easp/easp.asp" -->
<%
Set data_xml=Easp.Ext("xml").new()
Call data_xml.Create("root")
Set item_xml=data_xml.XMLRoot()
Call data_xml.AddNode("info",item_xml)
Set item_xml=data_xml.SelectXmlNode("info",0)
Call data_xml.AddAttribute("site_name","name",item_xml) '添加属性 site_name
Call data_xml.AddAttribute("com_name","com",item_xml) '添加属性 com_name
Call data_xml.AddNode("intro_abstract",item_xml)
Set item_xml=data_xml.SelectXmlNode("info/intro_abstract",0)
Call data_xml.AddText("1","111111111111111111",item_xml) '添加子节点 intro_abstract

Call data_xml.xmlheadResponse("utf-8")
data_xml.RespXml()
'Call data_xml.Save("new.xml","utf-8")
%>