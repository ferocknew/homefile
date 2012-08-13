<%@language="vbscript" codepage="65001"%>
<%
Session.codepage=65001
%>
<!--#include file="Template.asp" -->
<%
Set tp = new Template
tp.tplpath="tpl"
tp.LoadTpl(tp.tplpath & "default.asp")
tp.assign "doc_title","模板机制的例子"
tp.assign "news_title","国内新闻"
for i=0 to 2
  call tp.assign("arts/title","金融危机导致大批失业人员")
  call tp.assign("arts/author","网易")
  tp.flush
next
tp.assign "lastest_news","最新文章"
for i=0 to 2
  tp("news/title")="政府利好消息将有助拉高股市"
  tp("news/author")="11"
  tp.flush
next
tp.bulid
Set tp = nothing
%>