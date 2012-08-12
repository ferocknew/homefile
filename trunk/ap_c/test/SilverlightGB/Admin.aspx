<%@ Page language="c#" Inherits="Admin" CodeFile="Admin.aspx.cs" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<title>ajax无刷新评论管理</title>
<script type="text/javascript">
var $=function()
{
	return document.getElementById?document.getElementById(arguments[0]):eval(arguments[0]);
};
function CheckAll()
{
	var BOX=$('list').getElementsByTagName("input");
	for(var i=0; i<BOX.length; i++)
	{
		if(BOX[i].type.toLowerCase() == "checkbox" )
		{
			if(BOX[i].checked==true)
			{
				BOX[i].checked=false;
			}else{
				BOX[i].checked=true;
			}
		}
	}
}

</script>
<style type="text/css">
*{margin:0;padding:0}
.clearleft{clear:left}
.template-list a{padding-left:20px;display:block;line-height:25px;text-decoration:none;color:#555}
.template-list a:hover{background:#F3F3F3;color:#555}
.top{background:#444;border-bottom:4px solid #292929}
.top a{float:left;display:block;padding:5px 10px;text-decoration:none;font:bold 14px Tahoma;color:#eee;}
.top a:hover{background:#000;color:#e2D784}
.top .select{background:#000;color:#e2D784}
ul{list-style-type:none;font:normal 12px Tahoma}
ul li{padding-left:10px;line-height:22px;}
ol{margin:10px 20px;}
ol li{line-height:22px;}
.box{margin:5px;border:1px solid #eee;}
.box-title{border-bottom:4px solid #725D00;font:bold 14px Tahoma;line-height:28px;padding-left:10px;color:#725D00}
.box-body{font:normal 12px Tahoma;line-height:28px;color:#2F411B}
.box-list{font:normal 12px Tahoma;line-height:28px;color:#2F411B}
.box-list a{display:block;padding:6px 12px;text-align:center;text-decoration:none;font:bold 14px Tahoma;color:#555;}
.box-list a:hover{background:#EFEEE1;color:#000}
.box-list .select{background:#EFEEE1;color:#000}
.focus{padding:3px;font-family: Tahoma, Verdana, Sans-Serif;font-size: 14px;border:1px solid #B2D4E8;background:#FFF;color:#0178D9}
.blur{padding:3px;font-family: tahoma, Verdana, Sans-Serif;font-size: 14px;border:1px solid #ddd;background:#fff;color:#000}
.put{padding:2px 4px;border:1px solid #CDCCB4;background:#EFEEE1;color:#767648}
.pagenav{padding:3px;margin:1px 20px;text-align:left;}
.pagenav A{float:left;display:block;border:1px solid #D5D5D5;background:#F7F7F7;font:normal 10px Arial;padding:3px 6px;margin-right:2px;text-decoration:none;color:#999;}
.pagenav A:hover{color: #008000;border:1px solid #ABCD3A;background:#F2FDDB}
.pagenav span.current{float:left;display:block;font:bold 10px Arial;padding:3px 6px;margin-right:2px;border:1px solid #E8DB97;background:#FFFFDD;color:#AE1B0D}
.pagenav span.info{float:left;display:block;border:1px solid #D5D5D5;background:#F7F7F7;padding:3px 6px;margin-right:2px;color:#999;font:normal 10px Arial;}
.comment{color:#999;}
ul.list{padding:0;list-style-type:none;}
ul.list li{position:relative;padding-left:25px;font:normal 12px tahoma;height:25px;line-height:25px;border-bottom:1px solid #E3E6EB;}
ul.list li input{position:absolute;margin:0;padding:0;left:8px;top:5px;width:13px;height:13px;}
ul.list li span{position:absolute;right:10px;top:5px;font:normal 10px tahoma;}
ul.list li a{text-decoration:none;color:#222}
ul.list li a:hover{color:#000}
ul.list .onmouseover{background:#F3F3F3;}
ul.list .onmouseout{background:#fff;}
</style>
</head>
<body>
</body>
</html>
