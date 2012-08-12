using System;
using System.Data;
using System.Data.OleDb;

namespace _211
{
	/// <summary>
	/// DBTable 的摘要说明。
	/// </summary>
	public class DBTable:IDisposable
	{
		protected OleDbConnection conn;
		protected string TableName;
		protected OleDbCommand cmd;
		public bool HasRecord=false;

		public DBTable(string TN)
		{
			conn=DBConnection.getConn();
			conn.Open();
			TableName=TN;
		}

		public void OpenConn()
		{
			if(conn.State==ConnectionState.Closed)
				conn.Open();
		}

		public void CloseConn()
		{
			if(conn.State==ConnectionState.Open)
				conn.Close();
		}

		public void Dispose()
		{
			if(conn.State==ConnectionState.Open)
				conn.Close();
			GC.SuppressFinalize(this);
		}

		public virtual void Add()
		{
			if(HasRecord)throw new Exception("该列已经存在");
		}
		public virtual void Update()
		{
			if(!HasRecord)throw new Exception("没有该列，无法更新");
		}
		public virtual void Del()
		{
			if(!HasRecord)throw new Exception("没有该列，无法删除");
		}
	}
}
