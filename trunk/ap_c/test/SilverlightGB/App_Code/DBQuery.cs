using System;
using System.Data.OleDb;
using System.Data;

namespace _211
{
	/// <summary>
	/// DBQuery 的摘要说明。
	/// </summary>
	public sealed class DBQuery
	{
		static OleDbConnection conn=DBConnection.getConn();
		static DataTable dt;

		public static DataTable OpenQuery(string sql)
		{
			OleDbDataAdapter da=new OleDbDataAdapter(sql,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName)
		{
			OleDbDataAdapter da=new OleDbDataAdapter("select * from "+TableName,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count)
		{
			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" * from "+TableName,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,string IndexColumn,bool IsAsc)
		{
			OleDbDataAdapter da=new OleDbDataAdapter("select * from "+TableName+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc"),conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count,string IndexColumn,bool IsAsc)
		{
			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" * from "+TableName+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc"),conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,string[] column,bool IsCondition)
		{
			string tempsql="";
			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)
				{
					if(IsCondition)
						tempsql+=" and ";
					else
						tempsql+=",";
				}
			}

			;
			string sql="";
			if(IsCondition)
				sql="select * from "+TableName+" where "+tempsql;
			else
				sql="select "+tempsql+" from "+TableName;

			OleDbDataAdapter da=new OleDbDataAdapter(sql,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}


		public static DataTable OpenTable(string TableName,string[] column,string[] condition)
		{
			string tempsql="";
			string tempsql2="";

			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			for(int i=0;i<condition.Length;i++)
			{
				tempsql2+=condition[i];
				if(i<condition.Length-1)tempsql2+=" and ";
			}

			OleDbDataAdapter da=new OleDbDataAdapter("select "+tempsql+" from "+TableName+" where "+tempsql2,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count,string[] column)
		{
			string tempsql="";
			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" "+tempsql+" from "+TableName,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count,string[] column,string[] condition)
		{
			string tempsql="";
			string tempsql2="";

			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			for(int i=0;i<condition.Length;i++)
			{
				tempsql2+=condition[i];
				if(i<condition.Length-1)tempsql2+=" and ";
			}

			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" "+tempsql+" from "+TableName+" where "+tempsql2,conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count,string[] column,string IndexColumn,bool IsAsc)
		{
			string tempsql="";
			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" "+tempsql+" from "+TableName+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc"),conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,int count,string[] column,string[] condition,string IndexColumn,bool IsAsc)
		{
			string tempsql="";
			string tempsql2="";

			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			for(int i=0;i<condition.Length;i++)
			{
				tempsql2+=condition[i];
				if(i<condition.Length-1)tempsql2+=" and ";
			}

			OleDbDataAdapter da=new OleDbDataAdapter("select top "+count.ToString()+" "+tempsql+" from "+TableName+" where "+tempsql2+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc"),conn);
			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,string[] column,string IndexColumn,bool IsAsc,int PageSize,int Page)
		{
			string tempsql="";
			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			string sql="";
			if(Page==0)
				sql="select top "+PageSize.ToString()+" "+tempsql+" from "+TableName+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc");
			else
				sql="select top "+PageSize.ToString()+" "+tempsql+" from "+TableName+" where "+IndexColumn+(IsAsc?">":"<")+"(select "+(IsAsc?"max":"min")+"("+IndexColumn+") from "+TableName+" where "+IndexColumn+" in (select top "+(Page*PageSize)+" "+IndexColumn+" from "+TableName+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc")+")) order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc");

			OleDbDataAdapter da=new OleDbDataAdapter(sql,conn);

			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static DataTable OpenTable(string TableName,string[] column,string[] condition,string IndexColumn,bool IsAsc,int PageSize,int Page)
		{
			string tempsql="";
			string tempsql2="";

			for(int i=0;i<column.Length;i++)
			{
				tempsql+=column[i];
				if(i<column.Length-1)tempsql+=",";
			}

			for(int i=0;i<condition.Length;i++)
			{
				tempsql2+=condition[i];
				if(i<condition.Length-1)tempsql2+=" and ";
			}

			string sql="";
			if(Page==0)
				sql="select top "+PageSize.ToString()+" "+tempsql+" from "+TableName+" where "+tempsql2+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc");
			else
				sql="select top "+PageSize.ToString()+" "+tempsql+" from "+TableName+" where "+tempsql2+" and "+IndexColumn+(IsAsc?">":"<")+"(select "+(IsAsc?"max":"min")+"("+IndexColumn+") from "+TableName+" where "+IndexColumn+" in (select top "+(Page*PageSize)+" "+IndexColumn+" from "+TableName+" where "+tempsql2+" order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc")+")) order by "+IndexColumn+" "+(IsAsc?"Asc":"Desc");

			OleDbDataAdapter da=new OleDbDataAdapter(sql,conn);

			dt=new DataTable();
			try
			{
				da.Fill(dt);
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				da.Dispose();
			}

			return dt;
		}

		public static void ExceuteNonQuery(string sql)
		{
			OleDbCommand cmd=new OleDbCommand(sql,conn);
			conn.Open();
			try
			{
				cmd.ExecuteNonQuery();
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				cmd.Dispose();
				conn.Close();
			}
		}

		public static object ExecuteScalar(string sql)
		{
			object o;

			OleDbCommand cmd=new OleDbCommand(sql,conn);
			conn.Open();
			try
			{
				o=cmd.ExecuteScalar();
			}
			catch(Exception ex)
			{
				throw ex;
			}
			finally
			{
				cmd.Dispose();
				conn.Close();
			}

			return o;
		}
	}
}
