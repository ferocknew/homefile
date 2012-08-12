using System;
using System.Data;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using _211;

/// <summary>
/// Comment 的摘要说明
/// </summary>
public partial class Comment : System.Web.UI.Page
{
    string action = string.Empty;
    string id = string.Empty;
    string page = string.Empty;
    string pagehtml = string.Empty;
    string linkhtml = string.Empty;
    int Pages = 5;

    string commentparentid = string.Empty;
    string commentuser = string.Empty;
    string commenttext = string.Empty;
    string commentvalidate = string.Empty;


    public Comment()
    {
        //
        // TODO: 在此处添加构造函数逻辑
        //
    }

    protected void Page_Load(object sender, EventArgs e)
    {
        action = Request.Params["action"];
        id = Request.Params["id"];
        page = Request.Params["page"];

        commentparentid = Request.Params["commentparentid"];
        commentuser = Request.Params["commentuser"];
        commenttext = Request.Params["commenttext"];
        commentvalidate = Request.Params["commentvalidate"];

        if (action == "ajax_getcomment")
        {
            ajax_getcomment(id, Int32.Parse(page));
        }
        else if (action == "ajax_sendcomment")
        {

            if (Session["VerifyCode"].ToString().ToLower() != commentvalidate.ToLower())
            {
                Response.Write("ERROR!");

            }
            else
            {
                DBQuery.ExecuteScalar("insert into comment(commentparentid,commentuser,commenttext,commentreply,commentip) values('" + commentparentid + "','" + commentuser + "','" + Server.HtmlEncode(commenttext) + "','','" + Request.ServerVariables["REMOTE_ADDR"] + "')");
                Response.Write("评论发表成功!");
            }
        }
        else
        {
            Response.Write("error!");
        }

    }
    private void ajax_getcomment(string id, int page)
    {

        using (CommentBO cm = new CommentBO(id, page - 1))
        {
            Response.Write(cm.getCommentContent());
        }
    }

}
