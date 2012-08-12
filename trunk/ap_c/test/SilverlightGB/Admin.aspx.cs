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
public partial class Admin : System.Web.UI.Page
{
    string action = string.Empty;
    string id = string.Empty;
    string page = string.Empty;

    string pagehtml = string.Empty;
    string linkhtml = string.Empty;
    int Pages = 5;
	string pass = string.Empty;
	string act = string.Empty;

    string commentparentid = string.Empty;
    string commentuser = string.Empty;
    string commenttext = string.Empty;
    string commentvalidate = string.Empty;
	string commentreply = string.Empty;
	string deleteid = string.Empty;



    public Admin()
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

        if (action == "login")
        {
				pass = Request.Params["password"];
				if(pass == "ajax"){
					Session["admin"] = "test";
					Response.Redirect("admin.aspx?action=Home");
				}else{
					Session["admin"]	= "";
					 alert("密码错误，登陆失败！","admin.asp");
				}
        }
        else if (action == "logout")
        {
			Session["admin"] = "";
			alert("成功登出！","admin.asp");
        }
		else if (action == "Home")
        {
			CheckLogin();
			act=Request.Params["do"];
			if(act=="edit")
			{
					using (CommentBO cm = new CommentBO())
					{
						Response.Write(cm.getCommentEdit(id));
					}
			}
			else
			{
				if(id==""||id==null){
					id="1";
				}
				if(page==""||page==null){
					page="1";
				}
				using (CommentBO cm = new CommentBO())
				{
					Response.Write(cm.getAdminComment(id, Int32.Parse(page) - 1));
				}
			}

    
        }
		else if (action == "del")
        {
    		CheckLogin();
			deleteid=Request.Params["deleteid"];
			if (deleteid!=null){
				DBQuery.ExecuteScalar("delete from comment where commentid in ("+deleteid+")");
				alert("删除成功","?action=Home");
			}else{
				alert("返回选一个吧","?action=Home");
			}
        }
		else if (action == "savereply")
        {
			CheckLogin();
			commenttext= Request.Params["commenttext"];
			commentreply= Request.Params["commentreply"];
			DBQuery.ExecuteScalar("update comment set commenttext = '"+commenttext+"' ,commentreply='"+commentreply+"' where commentid = "+id);
			alert("回复成功","admin.aspx?action=Home");
         }
        else
        {
			LoginForm();
        }

    }
    private void alert(string msg, string goaddr)
    {
		Response.Write( "<script type='text/javascript'>alert('" + msg + "');</script>");
		Response.Write( "<script type='text/javascript'>window.location.href='" + goaddr + "';</script>");
    }

	 private void CheckLogin()
    {
		 if(Session["admin"] == ""){
			 Session.Abandon();
			 alert("您已经超时！请重新登陆！","admin.asp");
		 }
    }

	private void LoginForm()
    {
			Response.Write("<br /><form action=\"?action=login\" method=\"post\">");
			Response.Write("&nbsp;&nbsp;<input type=\"password\" name=\"password\"  onfocus=\"this.className='focus'\" ");
			Response.Write("onblur=\"this.className='blur'\" class=\"blur\"  />");
			Response.Write("	<input type=\"submit\" value=\" 管理 \" class=\"put\" />");
			Response.Write("	</form>");
    }

}
