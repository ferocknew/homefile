using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.IO;
using System.Security.Cryptography;
using System.Text;
using System.Diagnostics;

public partial class fileHash : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //string _filePath=Server.MapPath(@".\files\123.zip");
        string _filePath = @"D:\mov\Lady.GaGa.-.[Poker.Face].m4v";
        // 开始计时
        Stopwatch watch = new Stopwatch();
        watch.Start();

        FileStream filestream = new FileStream(_filePath, FileMode.Open, FileAccess.Read);
        System.Security.Cryptography.MD5CryptoServiceProvider get_md5 = new System.Security.Cryptography.MD5CryptoServiceProvider();
        byte[] hash_byte = get_md5.ComputeHash(filestream);
        string resule = System.BitConverter.ToString(hash_byte);
        Response.Write(resule.Replace("-", ""));

        // 停止计时
        watch.Stop();
        Response.Write("<br />");
        Response.Write(watch.Elapsed);
    }
}