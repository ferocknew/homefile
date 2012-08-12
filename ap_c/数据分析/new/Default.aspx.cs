using System;
using System.Collections.Generic;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SQLite;
using System.IO;
using System.Data.Common;
using System.Xml;
using System.Diagnostics;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Stopwatch watch = new Stopwatch();
        watch.Start();
        SQLiteConnection conn = new SQLiteConnection();
        SQLiteConnectionStringBuilder connstr = new SQLiteConnectionStringBuilder();
        string datasource = @"App_Data/getCount.SQLite.db3";
        connstr.DataSource = Server.MapPath(datasource);
        conn.ConnectionString = connstr.ToString();
        conn.Open();

        string _SyncPath = Server.MapPath(@"./xmldata"); //目录名
        string[] _sFiles = Directory.GetFiles(_SyncPath); //遍历文件

        foreach (var _item in _sFiles)
        {
            //获取文件物理
            string _filePath = (string)_item;
            //获取网吧ID
            string _BarID = _filePath.Substring(_filePath.LastIndexOf(@"\") + 1, _filePath.IndexOf(".") - _filePath.LastIndexOf(@"\") - 1);
            string _Date = "2011-06-03";

            XmlDocument _doc = new XmlDocument();
            _doc.Load(_filePath);
            XmlNode _node = _doc.SelectSingleNode("//info ");
            Response.Write("BarID= " + _node.Attributes["BarID "].Value);
            Response.Write("<br />");

            _doc = null;
        }


        conn.Close();
        // 停止计时
        watch.Stop();
        Response.Write("<br />"+watch.Elapsed);
    }
}
