using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Xml;
using System.Xml.XPath;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        XmlDocument doc = new XmlDocument();
        doc.Load(Server.MapPath("test.xml"));
        /*XmlNodeList nodes = doc.GetElementsByTagName("info");
        XmlNodeList nodes = doc.SelectSingleNode("//root").ChildNodes;
        Response.Write(nodes[0].InnerXml);
        Response.Write(nodes[0].Attributes["name"].Value);*/
        XmlNode nodes = doc.SelectSingleNode("//root/info[@name]");
        Response.Write(nodes.InnerText);
        Response.Write(nodes.Attributes["name"].Value);
    }
}
