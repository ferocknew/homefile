<%
'######################################################################
'## easp.cache.asp
'## -------------------------------------------------------------------
'## Feature     :   EasyAsp Cache Class
'## Version     :   v0.1 beta
'## Author      :   Easp.Wise(Liaoyizhi[at]gmail.com)
'## Update Date :   2010/02/07 22:49
'## Description :   Use Cache With EasyAsp
'######################################################################
Class EasyAsp_Cache
	Private s_cacheName,s_cacheValue,s_cacheType
	Private s_cacheFolder,s_cachePath,s_cachePrefix,s_cacheSuffix,s_cacheExt
	Private i_expireTime,s_expireTimeUnits
	'构造函数
	Private Sub Class_Initialize
		'加载fso
		Easp.Use "fso"
		Easp.Fso.OverWrite = True
		'默认缓存方式（file，app）
		s_cacheType = "file"
		'缓存名称
		s_cacheName = ""
		'默认缓存文件存放目录
		s_cacheFolder = "/_Cache/"
		'默认缓存前缀
		s_cachePrefix = "EaspCache_"
		'默认缓存后缀
		s_cacheSuffix = ""
		'默认缓存文件类型
		s_cacheExt = ".cache"
		'默认过期时间（1）
		i_expireTime = 1
		'默认过期时间单位（小时）
		s_expireTimeUnits = "h"
		'出错信息
		Easp.Error(60000) = "出错文件：" & Easp.PluginPath & "easp.cache.asp (Cache插件)<br /><br />"
		Easp.Error(60001) = Easp.Error(60000) & "指定的缓存不存在。"
		Easp.Error(60002) = Easp.Error(60000) & "添加缓存错误："
		Easp.Error(60003) = Easp.Error(60000) & "读取缓存错误："
		Easp.Error(60004) = Easp.Error(60000) & "删除缓存错误："
		Easp.Error(60005) = Easp.Error(60000) & "参数设置错误："
	End Sub
	'析构函数
	Private Sub Class_Terminate : End Sub
	
	Public Property Let CacheName(ByVal s)
		s_cacheName = s
	End Property
	
	Public Property Let CacheFolder(ByVal s)
		s_cacheFolder = s
	End Property
	
	Public Property Let CachePrefix(ByVal s)
		s_cachePrefix = s
	End Property

	Public Property Let ExpireTime(ByVal i)
		i_expireTime = i
	End Property

	Public Property Let ExpireTimeUnits(ByVal s)
		s_expireTimeUnits = s
	End Property

	'添加缓存
	Public Function [Set](ByVal s, ByVal v)
		Call CheckParam(s,60002)
		Select Case LCase(s_cacheType)
			Case "file"
				Select Case VarType(v)
					Case vbEmpty,vbNull,vbError,vbDataObject,vbByte
						[Set] = False
						Easp.Error.Msg = "不支持的缓存值：" & TypeName(v) & "。"
						Easp.Error.Raise(60002)
					Case vbArray,8194,8204,8209
						Select Case GetArrayDimension(v)
							Case 1
								[Set] = Easp.Fso.CreateFile(GetCacheFilePath(),Join(v,Chrw(0)))
							Case 2
								Dim tmpStr,i,j : tmpStr = ""
								For i = 0 To UBound(v,2)
									For j = 0 To UBound(v,1)
										tmpStr = tmpStr & v(j,i)
										If j <> UBound(v,1) Then tmpStr = tmpStr & Chrw(0)
									Next
									If i <> UBound(v,2) Then  tmpStr = tmpStr & Chrw(1)
								Next
								[Set] = Easp.Fso.CreateFile(GetCacheFilePath(),tmpStr)
							Case Else
								[Set] = False
								Easp.Error.Msg = "不支持的数组维数。"
								Easp.Error.Raise(60002)
						End Select
					Case vbObject
						If TypeName(v) = "Recordset" Then
							On Error Resume Next
								If Not Easp.Fso.IsFolder(s_cacheFolder) Then Easp.Fso.MD(s_cacheFolder)
								If IsCache("") Then Easp.Fso.DelFile(GetCacheFilePath())
								v.Save GetCacheFilePath()
								[Set] = True
								If Err.Number<>0 Then
									[Set] = False
									Easp.Error.Raise (60002)
								End If
							Err.Clear()
						Else
							[Set] = False
							Easp.Error.Msg = "不支持的缓存值：" & TypeName(v) & "。"
							Easp.Error.Raise(60002)
						End If
					Case Else
						[Set] = Easp.Fso.CreateFile(GetCacheFilePath(),v)
				End Select
			Case "app"
				If VarType(v) = vbObject And TypeName(v) = "Recordset" Then
					Easp.SetApp GetCacheFullName(),v.GetRows
				Else
					Easp.SetApp GetCacheFullName(),v
				End If
				Easp.SetApp GetCacheFullName() & "_CreateTime",Now
				[Set] = True
		End Select
	End Function
	'读取缓存
	Public Function [Get](ByVal s)
		Call CheckParam(s,60003)
		Dim Data,Info(1)
		Select Case LCase(s_cacheType)
			Case "file"
				If IsCache("") Then
					Data = Easp.Fso.Read(GetCacheFilePath())
					If Easp.Test(Data,"^\u0001\u0007\u0054\u0047\u0021") Then
						Info(0) = "rs"
					ElseIf Instr(Data,Chrw(0)) > 0 Then
						Info(0) = "arr"
						Info(1) = Easp.IIF(Instr(Data,Chrw(1)) > 0,2,1)
					Else
						Info(0) = "str"
					End If
					Select Case Info(0)
						Case "str"
							[Get] = Data
						Case "arr"
							Select Case Info(1)
								Case 1
									[Get] = Split(Data,Chrw(0))
								Case 2
									Dim arrA,arrB,tmpArr(),i,j
									arrA = Split(Data,Chrw(1))
									ReDim Preserve tmpArr(UBound(Split(arrA(0),Chrw(0))),UBound(arrA))
									For i = 0 To UBound(arrA)
										arrB = Split(arrA(i),Chrw(0))
										For j = 0 To UBound(arrB)
											tmpArr(j,i) = arrB(j)
										Next
									Next
									[Get] = tmpArr
							End Select
						Case "rs"
							Dim tmpRs
							Set tmpRs = Server.CreateObject("ADODB.Recordset")
							tmpRs.Open GetCacheFilePath()
							Set [Get] = tmpRs
					End Select
				Else
					[Get] = False
				End If
			Case "app"
				[Get] = Easp.GetApp(GetCacheFullName())
		End Select
	End Function
	'删除缓存
	Public Function Del(ByVal s)
		Call CheckParam(s,60004)
		Del = False
		If IsCache("") Then
			Select Case LCase(s_cacheType)
				Case "file"
					Del = Easp.Fso.DelFile(GetCacheFilePath())
				Case "app"
					Easp.RemoveApp(GetCacheFullName())
					Easp.RemoveApp(GetCacheFullName() & "_CreateTime")
					Del = True
			End Select
		End If
	End Function
	'判断缓存是否存在
	Public Function IsCache(ByVal s)
		Call CheckParam(s,60003)
		IsCache = False
		Select Case LCase(s_cacheType)
			Case "file"
				IsCache = Easp.Fso.IsFile(GetCacheFilePath())
			Case "app"
				IsCache = Easp.IIF(Easp.Has(Easp.GetApp(GetCacheFullName())),True,False)
		End Select
	End Function
	'判断缓存是否过期
	Public Function IsExpire(ByVal s)
		If Easp.Has(s) Then
			Dim o,p,q : o = Easp_Param(s)
			'是否有参数
			'是否指定过期时间
			If Easp.Has(o(1)) Then
				s_cacheName = o(0)
				p = Easp_Param(o(1))
				'是否指定时间单位
				If Easp.Has(p(1)) Then
					If Easp.Has(p(0)) Then i_expireTime = p(0)
					q = Easp_Param(p(1))
					'是否指定缓存类型
					If Easp.Has(q(1)) Then
						If Easp.Has(q(0)) Then s_expireTimeUnits = q(0)
						s_cacheType = q(1)
					Else
						s_expireTimeUnits = p(1)
					End If
				Else
					i_expireTime = o(1)
				End If
			Else
				s_cacheName = s
			End If
		End If
		i_expireTime = Int(i_expireTime)
		If IsCache("") Then
			Select Case LCase(s_expireTimeUnits)
				Case "s" : IsExpire = DateDiff("s"	 ,GetCacheTime(),Now()) >= i_expireTime	'秒
				Case "n" : IsExpire = DateDiff("n"	 ,GetCacheTime(),Now()) >= i_expireTime	'分
				Case "h" : IsExpire = DateDiff("h"	 ,GetCacheTime(),Now()) >= i_expireTime	'时
				Case "d" : IsExpire = DateDiff("d"	 ,GetCacheTime(),Now()) >= i_expireTime	'日
				Case "w" : IsExpire = DateDiff("ww"	 ,GetCacheTime(),Now()) >= i_expireTime	'周
				Case "m" : IsExpire = DateDiff("m"	 ,GetCacheTime(),Now()) >= i_expireTime	'月
				Case "q" : IsExpire = DateDiff("q"	 ,GetCacheTime(),Now()) >= i_expireTime	'季
				Case "y" : IsExpire = DateDiff("yyyy",GetCacheTime(),Now()) >= i_expireTime	'年
			End Select
		Else
			IsExpire = True
		End If
	End Function
	'缓存是否可用，与IsExpire相反
	Public Function IsValid(ByVal s)
		IsValid = Not IsExpire(s)
	End Function
	
	'私有方法：取缓存生成时间
	Private Function GetCacheTime()
		If IsCache("") Then
			Select Case LCase(s_cacheType)
				Case "file" GetCacheTime = Easp.Fso.GetAttr(GetCacheFilePath(),"date")
				Case "app" GetCacheTime = Easp.GetApp(GetCacheFullName() & "_CreateTime")
			End Select
		End If
	End Function
	'私有方法：取缓存全名
	Private Function GetCacheFullName()
		GetCacheFullName = s_cachePrefix & s_cacheName & s_cacheSuffix
	End Function
	'私有方法：取缓存文件路径
	Private Function GetCacheFilePath()
		GetCacheFilePath = absPath(s_cacheFolder) & GetCacheFullName() & s_cacheExt
	End Function
	'私有方法：取目录绝对路径
	Private Function absPath(ByVal s)
		If Easp.IsN(s) Then s = "."
		s = Easp.IIF(Instr(s,":")=2, s, Server.MapPath(s))
		If Right(s,1)<>"\" Then s = s & "\"
		absPath = s
	End Function
	'私有方法：取数组维数
	Private Function GetArrayDimension(ByVal arr)
		Dim i,i_ReallyDo
		On Error Resume Next
		GetArrayDimension = -1
		If Not IsArray(arr) Then
			Exit Function
		Else
			For i = 1 To 60
				i_ReallyDo = UBound(arr, i)
				If Err Then
					Err.Clear
					Exit Function
				Else
					GetArrayDimension = i
				End If
			Next
		End If
	End Function
	'私有方法：处理参数并检测
	Private Sub CheckParam(ByVal s,ByVal n)
		If Easp.Has(s) Then
			Dim o : o = Easp_Param(s)
			If Easp.Has(o(1)) Then
				s_cacheName = o(0)
				s_cacheType = o(1)
			Else
				s_cacheName = s
			End If
			o = ""
		End If
		Dim ErrMsg,ErrNum
		ErrNum = Easp.IIF(Easp.Has(n),n,60005)
		If Easp.IsN(s_cacheName) Then ErrMsg = "缓存名称不能为空。"
		If Easp.IsN(s_cacheType) Then ErrMsg = "缓存方式不能为空。"
		If Instr("file,app",s_cacheType) = 0 Then ErrMsg = "不支持的缓存方式：" & s_cacheType & "。"
		If Easp.Has(ErrMsg) Then
			Easp.Error.Msg = ErrMsg
			Easp.Error.Raise(ErrNum)
		End If
	End Sub
End Class
%>
