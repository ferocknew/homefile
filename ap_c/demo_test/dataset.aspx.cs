using System;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.OleDb;

public partial class _Default : System.Web.UI.Page
{
    //string action = string.Empty;
    //public OleDbConnection CONN
    //{
    //    //------------建立连接--------------------
    //    get { return new OleDbConnection("Provider=Microsoft.jet.Oledb.4.0;data source=" + Server.MapPath("app_data/data.mdb")); }
    //    //------------建立连接--------------------
    //}
    protected void Page_Load(object sender, EventArgs e)
    {
        //using (OleDbConnection conn = CONN) {
        //    conn.Open();
        //}
		//Response.Write(System.Web.Security.FormsAuthentication.HashPasswordForStoringInConfigFile("_liang5210", "sha1"));
        //Response.End();

        string strConnection = "Provider=Microsoft.Jet.OleDb.4.0;";
        strConnection += @"Data Source=" + Server.MapPath("app_data/data.mdb");
        OleDbConnection conn = new OleDbConnection(strConnection);

        conn.Open();
        OleDbDataAdapter da = new OleDbDataAdapter("select id,username,password from [user]", conn);
        DataSet ds = new DataSet("root");
        da.Fill(ds,"item");

        //记录数
        int tbCount = 0;
        tbCount = ds.Tables[0].Rows.Count;
        Response.Write(tbCount);
        Response.End();

        //单条记录
        DataRow myRow;
        myRow = ds.Tables[0].Rows[0];
        //Response.Write(myRow["username"]);
		//Response.Write(ds.Tables[0].Rows[0]["username"]);
        //int[] array2;
        Response.ContentType = "text/xml";
        Response.Charset = "utf-8";
		Response.Write("<?xml version=\"1.0\" encoding=\"utf-8\"?>");
        Response.Write(ds.GetXml());

        conn.Close();
        Response.End();
    }

}
