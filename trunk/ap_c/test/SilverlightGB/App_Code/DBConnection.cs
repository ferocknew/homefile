using System;
using System.Web;
using System.Web.Caching;
using System.Data.OleDb;
namespace _211
{
	/// <summary>
	/// DBConnection ��ժҪ˵����
	/// </summary>
	public class DBConnection
	{
		public DBConnection()
		{
			//
			// TODO: �ڴ˴���ӹ��캯���߼�
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
