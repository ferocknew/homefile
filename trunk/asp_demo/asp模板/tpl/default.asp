<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title></head><body>
{$include:head.html$}
<h1 align=center>{$doc_title$}</h1>
<h3>{$news_title$}</h3>
<ul>
<loop name="news">
  <Li style="color:#F00">新闻标题：{$news/title$}--作者：{$news/author$}</Li>
</loop>
</ul>
<h3>{$lastest_news$}</h3>
<ul>
<!-- 这里loop中的bing和count只用作测试，不是必须的，实际使用的时候请删除 -->
<loop bind="id"  name=arts count="15">
  <Li>文章标题：{$arts/title$}--作者：{$arts/author$} </Li>
</loop>
</ul>
<%
Response.Write("222222222222222")
%>
{$include:foot.asp $}
</body></html>