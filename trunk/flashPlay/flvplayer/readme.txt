Vcastr 2.2 flv 网络播放器
2006-12-31 13:24:29
Vcastr2.2 是一款FLV网络播放器，可以用于各种新闻系统或者blog系统，Vcastr 拥有众多特点和自定义设置,经过不断升级修正，已经具备用户需要的大多数基本功能。








免费下载

http://www.ruochi.com/product/vcastr2/vcastr22.zip 

功能

.可以读取xml设置播放列表
.可以直接读取出flv地址进行播放
.多影片连续播放
.自定义尺寸，自动适应
.简洁播放器风格
.自定义循环播放
.支持最大化播放
.支持直接js嵌入

2.2更新
修正了只能读取.flv扩展名文件，可以修改文件名以适应win2003主机
修该了功能栏的隐藏方式
修正了直接在地址栏传递参数的问题


2.1更新
.修正了一些bug
.支持双击全屏
.支持播放前广告设置
.增加缓冲时间设置
.使用新的参数传递设置


2.0新增更多的自定义选项，和界面设计
.自定义是否自动播放
.自定义是否连续
.自定义默认音量
.2种控制栏位置选择
.3种控制显示方式
.自定义色彩搭配
.支持加入网站logo和文字
.支持影片结尾swf扩展功能

使用方法

1.js嵌入 

方法一，直接copy下面代码，修改其中的 swf_width，swf_height，files，texts 参数
<script type="text/javascript">
var swf_width=240
var swf_height=240
var texts='幸福的脚丫预告片|变形金刚预告片|江南MV|魔兽世界-晚安部落'
var files='http://www.ruochi.com/product/vcastr/flv/happy_feet.flv|http://www.transformersmovie.com/transformers_640.flv|http://www.ruochi.com/product/vcastr/flv/江南.flv|http://www.ruochi.com/product/vcastr/flv/晚安部落.flv'
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="http://www.ruochi.com/product/vcastr2/vcastr22.swf"><param name="quality" value="high">');
document.write('<param name="menu" value="false"><param name="allowFullScreen" value="true" />');
document.write('<param name="FlashVars" value="vcastr_file='+files+'&vcastr_title='+texts+'">');
document.write('<embed src="http://www.ruochi.com/product/vcastr2/vcastr22.swf" allowFullScreen="true" FlashVars="vcastr_file='+files+'&vcastr_title='+texts+'" menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>');
</script>



2,方法二，简单直接传递影片地址

其中
vcastr_flie =http://www.ruochi.com/product/vcastr/flv/happy_feet.flv|http://www.ruochi.com/product/vcastr/flv/江南.flv|http://www.ruochi.com/product/vcastr/flv/晚安部落.flv
直接给出flv文件地址，多个使用|分开

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="240" height="180">
<param name="movie" value="http://www.ruochi.com/product/vcastr2/vcastr22.swf">
<param name="quality" value="high">
<param name="allowFullScreen" value="true" />
<param name="FlashVars" value="vcastr_file=http://www.ruochi.com/product/vcastr/flv/happy_feet.flv" />
<embed src="http://www.ruochi.com/product/vcastr2/vcastr22.swf" allowFullScreen="true" FlashVars="vcastr_file=http://www.ruochi.com/product/vcastr/flv/happy_feet.flv" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="180"></embed>
</object>


3,方法三，读取影片xml 

其中/product/vcastr2/vcastr2.swf?vcastr_xml_url =http://www.ruochi.com/product/vcastr/vcastr.xml
是播放列表的xml地址

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="240" height="120">
<param name="movie" value="http://www.ruochi.com/product/vcastr2/vcastr22.swf">
<param name="quality" value="high">
<param name="allowFullScreen" value="true" />
<param name="FlashVars" value="vcastr_xml=http://www.ruochi.com/product/vcastr2/vcastr.xml" />
<embed src="http://www.ruochi.com/product/vcastr2/vcastr22.swf" allowFullScreen="true" FlashVars="vcastr_xml=http://www.ruochi.com/product/vcastr2/vcastr.xml" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="240" height="120"></embed>
</object>



4.高级选项


<param name="FlashVars" value="*" />

FlashVars="*"


在以上2处*部分添加参数，使用 参数=值 的格式，多个参数用&连接，参数数量不限制

例如

value="vcastr_file=http://www.transformersmovie.com/transformers_640.flv&vcastr_title=变形金刚预告片&BarColor=0xFF6600&BarPosition=1"

表示影片地址是"http://www.transformersmovie.com/transformers_640.flv"，标题是"变形金刚预告片",控制栏颜色是0xFF6600，控制栏位置在下方

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="500" height="224">
<param name="movie" value="http://www.ruochi.com/product/vcastr2/vcastr22.swf">
<param name="quality" value="high">
<param name="allowFullScreen" value="true" />
<param name="FlashVars" value="vcastr_file=http://www.transformersmovie.com/transformers_640.flv&vcastr_title=变形金刚预告片&BarColor=0xFF6600&BarPosition=1" />
<embed src="http://www.ruochi.com/product/vcastr2/vcastr22.swf" allowFullScreen="true" FlashVars="vcastr_file=http://www.transformersmovie.com/transformers_640.flv&vcastr_title=变形金刚预告片&BarColor=0xFF6600&BarPosition=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500" height="224"></embed>
</object>



参数名称
 参数说明 默认值 
vcastr_file 方法2传递影片flv文件地址参数，多个使用|分开 空 
vcastr_title 影片标题参数，多个使用|分开，与方法2配合使用 空 
vcastr_xml 方法3 传递影片flv文件地址参数，样板参考 http://www.ruochi.com/product/vcastr2/vcastr.xml  vcastr.xml 
IsAutoPlay 影片自动播放参数：0表示不自动播放，1表示自动播放 0 
IsContinue 影片连续播放参数：0表示不连续播放，1表示连续循环播 1 
IsRandom 影片随机播放参数：0表示不随机播放，1表示随机播放 0 
DefaultVolume 默认音量参数 ：0-100 的数值，设置影片开始默认音量大小 100 
BarPosition 控制栏位置参数 ：0表示在影片上浮动显示，1表示在影片下方显示 0 
IsShowBar 控制栏显示参数 ：0表示不显示；1表示一直显示；2表示鼠标悬停时显示；3表示开始不显示，鼠标悬停后显示 2 
BarColor 播放控制栏颜色，颜色都以0x开始16进制数字表示 0x000033 
BarTransparent 播放控制栏透明度 60 
GlowColor 按键图标颜色，颜色都以0x开始16进制数字表示 0x66ff00 
IconColor 鼠标悬停时光晕颜色，颜色都以0x开始16进制数字表示 0xFFFFFF 
TextColor 播放器文字颜色，颜色都以0x开始16进制数字表示 0xFFFFFF 
LogoText 可以添加自己网站名称等信息(英文) 空 
LogoUrl 可以从外部读取logo图片,注意自己调整logo大小,支持图片格式和swf格式 空 
EndSwf 影片播放结束后,从外部读取swf文件，可以添加相关影片信息，影片分享等信息，需自己制作 空 
BeginSwf 影片开始播放之前,从外部读取swf文件，可以添加广告，或者网站信息，需自己制作 空 
IsShowTime 是否显示时间 : 0表示不显示时间，1表示显示时间 1 
BufferTime 影片缓冲时间，单位（秒） 2 


常见问题

问:Logo 文字无法显示
答:Logo 文字不能支持中文，可以用LogoUrl参数将Logo做成.swf文件或者.png文件。

问:xml 如何设置高级参数
答:如下

<param name="FlashVars" value="vcastr_xml=http://www.ruochi.com/product/vcastr2/vcastr.xml&vcastr_title=幸福的脚丫预告片|变形金刚预告片|江南MV|魔兽世界-晚安部落&BarColor=0xFF6600&BarPosition=1" /> 
<embed src="http://www.ruochi.com/product/vcastr2/vcastr2.swf" allowFullScreen="true" FlashVars="vcastr_xml=http://www.ruochi.com/product/vcastr2/vcastr.xml&vcastr_title=幸福的脚丫预告片|变形金刚预告片|江南MV|魔兽世界-晚安部落&BarColor=0xFF6600&BarPosition=1"


问:不能全屏
答:需要升级到flashplayer9.0以上

问:不能退出全屏
答:双击可以进入或退出全屏

问:影片不能拖动进度
答:是由于转换文件格式时候有一些信息丢失,可以使用FLV MetaData Injector修复, 载地址: http://www.buraks.com/flvmdi ; 

问:flv放在自己服务器上就不能播放了
答:是由于您的服务器不支持.flv文件格式下载，修改成其他格式比如.swf，当然，相应的vcastr_file或者vcastr_xml中的flv文件名也要修改成.swf

服务
提供付费定制或者修改播放器服务



使用条款:
本软件完全免费,甚至可用作商业用途。
但不可对本软件进行反编译,修改和再次分发。
提供付费的个性化修改服务


有任何建议,可以发到:
http://www.ruochi.com/main/post/24.html
或者ruochi_com@163.com

Created By Ruochi.com
http://www.Ruochi.com
2007-1-1






