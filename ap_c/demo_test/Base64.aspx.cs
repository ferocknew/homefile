using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Base64 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //Response.Write(EncodingForFile(Server.MapPath(@"App_Data\data.mdb")));

        #region 读取文本文件
        string txt = "";
        System.IO.StreamReader sr = new System.IO.StreamReader(Server.MapPath(@"App_Data\data.mdb.txt"));
        while (!sr.EndOfStream)
        {
            string str = sr.ReadLine();
            txt += str + "\r\n";
        }
        sr.Close();
        
        //Response.Write(txt);

        //Console.Read();
        SaveDecodingToFile(txt, Server.MapPath("test.mdb"));
        #endregion
    }
    //--------------------------------------------------------------------------------------

    /// <summary>
    /// 对任意类型的文件进行base64加码
    /// </summary>
    /// <param name="fileName">文件的路径和文件名</param>
    /// <returns>对文件进行base64编码后的字符串</returns>
    public static string EncodingForFile(string fileName)
    {
        System.IO.FileStream fs = System.IO.File.OpenRead(fileName);
        System.IO.BinaryReader br = new System.IO.BinaryReader(fs);
        string base64String = Convert.ToBase64String(br.ReadBytes((int)fs.Length));
        br.Close();
        fs.Close();
        return base64String;
    }
    /// <summary>
    /// 把经过base64编码的字符串保存为文件
    /// </summary>
    /// <param name="base64String">经base64加码后的字符串</param>
    /// <param name="fileName">保存文件的路径和文件名</param>
    /// <returns>保存文件是否成功</returns>
    public static bool SaveDecodingToFile(string base64String, string fileName)
    {
        System.IO.FileStream fs = new System.IO.FileStream(fileName, System.IO.FileMode.Create);
        System.IO.BinaryWriter bw = new System.IO.BinaryWriter(fs);
        bw.Write(Convert.FromBase64String(base64String));
        bw.Close();
        fs.Close();
        return true;
    }
}