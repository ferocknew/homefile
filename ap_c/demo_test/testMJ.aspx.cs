using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using BirdSof;
using System.Collections;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string str = "select "+EnumDescription.GetFieldText(Data.FileName)+" from "+EnumDescription.GetFieldText(Data.Tablename)+" where "+EnumDescription.GetFieldText(Data.WhereStr) ;
        Response.Write(str);

    }

    public enum Data
    {
        [EnumDescription("表名")]
        Tablename,
        [EnumDescription("id,name,password")]
        FileName,
        [EnumDescription("查询条件")]
        WhereStr
    }

}
