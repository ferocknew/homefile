<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include virtual="/_Easp/easp.asp" -->
<%
'######################################################################
'## EasyASP 缓存插件 Demo，使用UTF-8编码
'######################################################################
'## @@属性设置，建议在插件中设置好，使用的时候省事@@
'## ------------------------------------------------------------------- 
'## @默认缓存方式，建议设置，有效值为“file”或“app”
'## .CacheType = "file"
'## 
'## @缓存名称，在实际使用中可以不必设置
'## .CacheName = "TestName"
'## 
'## @缓存文件存放目录，必须设置，可以是绝对路径或相对路径
'## .CacheFolder = "/_Cache/"
'## 
'## @默认缓存文件前缀，可选
'## .CachePrefix = ""
'## 
'## @默认缓存文件后缀，可选
'## .CacheSuffix = ""
'## 
'## @默认缓存文件类型，必须
'## .CacheExt = ".cache"
'## 
'## @默认过期时间，建议设置，有效值为正整数
'## .ExpireTime = 1
'## 
'## @默认过期时间单位，建议设置，可选值为：s(秒),n(分),h(小时),d(天),w(周),m(月),q(季度),y(年)
'## .ExpireTimeUnits = "h"
'## 
'######################################################################
'## @@主要方法@@
'## ------------------------------------------------------------------- 
'## @添加缓存，返回True或者False
'## .Set name[:type],value
'## --name：缓存名称
'## --type：缓存方式
'## --value：缓存值
'## 
'## @读取缓存，存入什么返回什么（如果缓存方式为app，存入记录集对象返回的是二维数组，既Rs.GetRows得到的数组）
'## .Get name[:type]
'## --name：缓存名称
'## --type：缓存方式
'## 
'## @删除缓存，返回True或者False
'## .Del name[:type]
'## --name：缓存名称
'## --type：缓存方式
'## 
'## @判断缓存是否存在，返回True或者False
'## .IsCache name[:type]
'## --name：缓存名称
'## --type：缓存方式
'## 
'## @判断缓存是否过期，返回True或者False
'## .IsExpire name[:expiretime[:expireTimeUnits[:type]]]
'## --name：缓存名称
'## --expiretime：过期时间
'## --expireTimeUnits：时间单位
'## --type：缓存方式
'## 
'## @缓存是否可用，与IsExpire相反，返回True或者False
'## .IsValid name[:expiretime[:expireTimeUnits[:type]]]
'## --name：缓存名称
'## --expiretime：过期时间
'## --expireTimeUnits：时间单位
'## --type：缓存方式
'## 
'######################################################################

'示例1：字符串
Dim TestStr : TestStr = "我是字符串"
	'存入
	Easp.Ext("cache").Set "TestStr",TestStr
	'读取并输出
	Easp.WN Easp.Ext("cache").Get("TestStr")
	'删除
	Easp.Ext("cache").Del "TestStr"
Easp.W "<hr />"	

'示例2：一维数组
Dim Arr1(2),Brr1,i,j
	Arr1(0) = "一维"
	Arr1(1) = "数组"
	Arr1(2) = Now
	'存入
	Easp.Ext("cache").Set "TestArr1",Arr1
	'读取
	Brr1 = Easp.Ext("cache").Get("TestArr1")
	'循环输出
	For i = 0 To UBound(Brr1)
		Easp.WN Brr1(i)
	Next
	'删除
	Easp.Ext("cache").Del "TestArr1"
Easp.W "<hr />"	

'示例3：二维数组
Dim Arr2(2,2),Brr2
	Arr2(0,0) = "00"
	Arr2(1,0) = "10"
	Arr2(2,0) = "20"
	Arr2(0,1) = "01"
	Arr2(1,1) = "11"
	Arr2(2,1) = "21"
	Arr2(0,2) = "02"
	Arr2(1,2) = "12"
	Arr2(2,2) = "22"
	'存入（app方式）
	Easp.Ext("cache").Set "TestArr2:app",Arr2
	'读取（app方式）
	Brr2 = Easp.Ext("cache").Get("TestArr2:app")
	'循环输出
	For i = 0 To UBound(Brr2,2)
		For j = 0 To Ubound(Brr2,1)
			Easp.WN Brr2(j,i)
		Next
	Next
	'删除（app方式）
	Easp.Ext("cache").Del "TestArr2:app"
Easp.W "<hr />"	

'示例4：记录集对象
'转为file方式
Easp.Ext("cache").CacheType = "file"
Dim Rs,Rs1
	Set Rs = Easp.db.GR("City:CityId,CityName","","")
	'存入
	Easp.Ext("cache").Set "TestRs",Rs
	Easp.db.C(Rs)
	'读取
	Set Rs1 = Easp.Ext("cache").Get("TestRs")
	'循环输出
	While Not Rs1.Eof
		Easp.WN Rs1("CName")
	Rs1.MoveNext() : Wend : Easp.db.C(Rs1)
	'删除
	Easp.Ext("cache").Del "TestRs"
Easp.W "<hr />"	

'示例5：场景应用
Dim RsCity
With Easp.Ext("cache")
	'判断缓存是否可用
	If .IsValid("CityList") Then
		'可用则直接读取，因为是存入记录集，而且是用file的方式缓存，所以可以直接Set为记录集
		Set RsCity = .Get("CityList")
	Else
		'缓存不可用（已过期），读取数据库
		Set RsCity = Easp.db.GR("City:CityId,CityName","","")
		'更新缓存内容
		.Set "CityList",RsCity
	End If
End With
'循环输出
While Not RsCity.Eof
	Easp.WN RsCity("CityId") & "," & RsCity("CityName")
RsCity.MoveNext() : Wend : Easp.db.C(RsCity)

'==========================缓存插件示例结束===========================
Easp.WN "运行时间：" & Easp.ScriptTime & " 秒"
Easp.WN "数据查询：" & Easp.DbQueryTimes & " 次"
Set Easp = Nothing
%>
