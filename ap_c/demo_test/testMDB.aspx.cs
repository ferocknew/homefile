using System;
using System.Collections.Generic;
using System.Web;
using System.Data;
using System.Data.OleDb;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.Common;
using System.Diagnostics;
using System.Data.SqlClient;
using System.Web.Script.Serialization;

public partial class testMDB : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        String connectionString = @"Provider=Microsoft.Jet.OLEDB.4.0;Data Source="+Server.MapPath("App_Data/data.mdb");
        OleDbConnection conn = new OleDbConnection(connectionString);
        conn.Open();
        // 开始计时
        Stopwatch watch = new Stopwatch();
        watch.Start();

        //循环插入数据
        //DbCommand cmd = conn.CreateCommand();
        //cmd.Connection = conn;
        ////DbTransaction trans = conn.BeginTransaction();
        ////cmd.Transaction = trans;
        //for (int i=0; i < 2000;i++ )
        //{
        //    cmd.CommandText = "INSERT INTO [user] (username) values ("+ i +")";
        //    cmd.ExecuteNonQuery();
        //}
        ////trans.Commit();
        //cmd.Dispose();
        //trans.Dispose();


        OleDbDataAdapter _da = new OleDbDataAdapter("select top 100 id,username,password from [user] ", conn);
        DataSet _ds = new DataSet("root");
        _da.Fill(_ds,"item");
        //Response.Write(_ds.Tables[0].Columns.Count);
        //Response.End();
        //Jasp.OleDbConn=conn;
        //string _output = Jasp.DB.OutPutString(_ds, "json");

        //Response.Write(_output);
        //Response.Write(Jasp.json.parse(_ds));
        //sdf.Add("123",DateTime.Now.ToString());



        //Response.Write(conn.Provider=="Microsoft.Jet.OLEDB.4.0");

        // 停止计时
        watch.Stop();
        Response.Write(watch.Elapsed);
        conn.Close();

    }
}