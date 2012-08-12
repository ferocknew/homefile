using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Xml;
public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

        if (Cache["Data"] == null)
        {
            DataTable dataTb = new DataTable("UserInfo");

            DataColumn col = new DataColumn();
            col.ColumnName = "UserID";
            col.DataType = Type.GetType("System.Int32");

            col.AllowDBNull = false;
            dataTb.Columns.Add(col);


            DataColumn colName = new DataColumn("UserName", typeof(string));
            dataTb.Columns.Add(colName);

            for (int i = 0; i < 500; i++)
            {
                DataRow dr = dataTb.NewRow();
                dr[0] = i;
                dr[1] = "黎明" + i.ToString();
                dataTb.Rows.Add(dr);
            }

            DataSet dt = new DataSet("root");
            dt.Merge(dataTb);


            Cache.Insert("Data", dt, null, DateTime.Now.AddMinutes(1), TimeSpan.Zero);
            Response.Write(Cache["Data"].GetType().Name);
            Response.Write("缓存已更新");
        }
        else
        {
            DataSet CacheDs = Cache["Data"] as DataSet;
            Response.Write(CacheDs.Tables[0].Rows.Count);
        }

        //Response.Write(dataTb.Rows.Count);
        if (Cache["txt"] == null)
        {
            Cache["txt"] = "a";
        }
        else
        {
            int Count = Cache.Count;
            Response.Write("<br />");
            Response.Write(Cache.Count);
        }


    }

}