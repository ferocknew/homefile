using System;
using System.Web;
using System.Web.Caching;
using System.Data.OleDb;
namespace _211
{
	/// <summary>
	/// DBConnection 的摘要说明。
	/// </summary>
	public class DBConnection
	{
		public DBConnection()
		{
			//
			// TODO: 在此处添加构造函数逻辑
			//
		}

		public static string getConnStr()
		{
			if(HttpContext.Current.Cache["conn"]==null)
			{
				HttpContext.Current.Cache.Insert("conn", "data source="+HttpContext.Current.Server.MapPath("Data/db.asax").ToString()+";provider=microsoft.jet.oledb.4.0");
			}
			return HttpContext.Current.Cache["conn"].ToString();
		}

		public static OleDbConnection getConn()
		{
			return new OleDbConnection(getConnStr());
		}

		public static OleDbConnection getConn(string ConnStr)
		{
			return new OleDbConnection(ConnStr);
		}
	}
}
