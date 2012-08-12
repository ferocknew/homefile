using System;
using System.Collections;
using System.Configuration;
using System.Web;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //序列化
        Jasp.jsonObj jsonObject = new Jasp.jsonObj();
        jsonObject.Add("id", 1);
        jsonObject.Add("name", "name我 http://www.online.sh.cn");
        jsonObject.Add("name1", true);
        jsonObject.Add("time", DateTime.Now.ToString());
        Response.Write(Jasp.json.SerializeObject(jsonObject));


        //Jasp.jsonAry jsonArray = new Jasp.jsonAry();
        //jsonArray.Add(jsonObject);
        //jsonArray.Add(jsonObject);
        //Jasp.jsonObj jsonObject_out = new Jasp.jsonObj();
        //jsonObject_out.Add("msg", jsonArray);

        ////Response.ContentType="application/json";
        //Response.Write(Jasp.json.SerializeObject(jsonObject_out));
    }

}