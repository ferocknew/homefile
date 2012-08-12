using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Data.SQLite;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Data.SqlServerCe;
using System.Data.Common;
using System.Diagnostics;

public partial class testSQLite : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //string datasource = "App_Data/new_sqlite.db3";
        //System.Data.SQLite.SQLiteConnection.CreateFile(Server.MapPath(datasource));
        ////连接数据库
        //System.Data.SQLite.SQLiteConnection conn = new System.Data.SQLite.SQLiteConnection();
        //System.Data.SQLite.SQLiteConnectionStringBuilder connstr = new System.Data.SQLite.SQLiteConnectionStringBuilder();
        //connstr.DataSource = Server.MapPath(datasource);
        //connstr.Password = "admin";//设置密码，SQLite ADO.NET实现了数据库密码保护
        //conn.ConnectionString = connstr.ToString();
        //conn.Open();
        SQLiteConnection conn = new SQLiteConnection();
        SQLiteConnectionStringBuilder connstr = new SQLiteConnectionStringBuilder();
        string datasource = "App_Data/new_sqlite.db3";
        connstr.DataSource = Server.MapPath(datasource);
        conn.ConnectionString = connstr.ToString();
        conn.Open();


        DbCommand cmd = conn.CreateCommand();
        cmd.Connection = conn;
        /*//创建表
        string sql = "CREATE TABLE test(username varchar(20),password varchar(20))";
        cmd.CommandText = sql;
        cmd.Connection = conn;
        cmd.ExecuteNonQuery();*/
        // 开始计时
        Stopwatch watch = new Stopwatch();
        watch.Start();
        //插入数据
        DbTransaction trans = conn.BeginTransaction(); // <-------------------开启事务
        //string sql = "INSERT INTO [test] VALUES('ekinglong','mypassword')";
        //cmd.CommandText = sql;
        //cmd.ExecuteNonQuery();
        try
        {
            for (int i = 0; i < 60000; i++)
            {
                //cmd.CommandText = "insert into [test1] ([test1]) values (" + i + ")";
				string _sql="insert into [test1] ([test1]) values (" + i + ");insert into [test1] ([test1]) values (" + i+1 + ");insert into [test1] ([test1]) values (" + i+2 + ");insert into [test1] ([test1]) values (" + i+3 + ");insert into [test1] ([test1]) values (" + i+4 + ");insert into [test1] ([test1]) values (" + i+5 + ");insert into [test1] ([test1]) values (" + i+6 + ");insert into [test1] ([test1]) values (" + i+7 + ");insert into [test1] ([test1]) values (" + i+8 + ");insert into [test1] ([test1]) values (" + i+9 + ");insert into [test1] ([test1]) values (" + i+10 + ");";
				cmd.CommandText=_sql;
				i=i+10;

                //cmd.Parameters[0].Value = i.ToString();

                cmd.ExecuteNonQuery();
            }
            trans.Commit(); // <-------------------执行事务
        }

        catch
        {
            trans.Rollback(); // <-------------------
        }
		/*
        SQLiteDataAdapter _da = new SQLiteDataAdapter("Select ID,test1 From [test1] limit 50",conn);
        DataSet _ds = new DataSet("root");
        _da.Fill(_ds, "item");
        //string _output = Jasp.DB.OutPutString(_ds, "json");
        Response.Write(_da.ToString());
		Response.Write("<br/>");*/


        // 停止计时
        watch.Stop();
        Response.Write(watch.Elapsed);
        conn.Close();
    }
}
