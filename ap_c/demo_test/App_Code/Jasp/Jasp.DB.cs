using System;
using System.Collections.Generic;
using System.Web;
using System.Data;
using System.Data.OleDb;
using System.Web.UI.WebControls;
/*
namespace Jasp
{
    /// <summary>
    ///Jasp.DB 的摘要说明
    /// </summary>
    public class DB
    {
        public DB()
        {
            //
            //TODO: 在此处添加构造函数逻辑
            //
        }

        /// <summary>
        /// 定义根类型
        /// </summary>
        /// <param name="_conn">描述内容</param>
        public static void ado()
        {
            throw new NotImplementedException();
        }

        /// <summary>
        /// Access 数据连接
        /// </summary>
        public static OleDbConnection OleDbConn { get; set; }

        /// <summary>
        /// 对象输出字符串类型方法
        /// </summary>
        public static string OutPutString(Object Obj, string p)
        {
            switch (Obj.ToString())
            {
                case "System.Data.DataSet":
                    DataSet _ds = (DataSet)Obj;
                    if (_ds.Tables.Count == 0)
                    {
                        return "err";
                    }
                    else
                    {
                        JSONArray _jAry = new JSONArray();
                        for (int i = 0; i < _ds.Tables[0].Rows.Count; i++)
                        {
                            JSONObject _jobj = new JSONObject();
                            //for (int j = 0; j < _ds.Tables[0].Columns.Count;j++ ) {
                            //    _jobj.Add(_ds.Tables[0].Columns[j].ColumnName, _ds.Tables[0].Columns[j].ToString());
                            //}
                            foreach (DataColumn column in _ds.Tables[0].Columns)
                            {
                                string _temp = column.ColumnName;
                                _jobj.Add(_temp, _ds.Tables[0].Rows[i][_temp]);
                            }
                            _jAry.Add(_jobj);
                        }
                        return (string)JSONConvert.SerializeArray(_jAry);
                    }


                //break;
                case "":
                    break;
            }
            throw new NotImplementedException();
        }
    }
}*/