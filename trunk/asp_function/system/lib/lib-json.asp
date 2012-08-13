<%
class Aien_Json
	private mCollection,mJsonType
	Public Property Get Collection()
		set Collection = mCollection
	End Property

 	Public Property Let JsonType(mData)
		if lcase(mData)="object" then
			mJsonType = true
		elseif lcase(mData)="array" then
			mJsonType = false
		end if
	End Property

 	Public Property Get JsonType()
			JsonType=mJsonType
	End Property

	Private Sub Class_Initialize()
		set mCollection=server.createobject("scripting.dictionary")
	End Sub

	Private Sub Class_Terminate()
		mCollection.removeAll()
		set mCollection=nothing
	End Sub

	public function addData(vars,values)
		if mCollection.exists(vars) then
			mCollection(vars)=mCollection(vars) & "," & values
		else
			mCollection.add vars,values
		end if
	end function

	Private function toJson(vars)
		dim values
		if lcase(typename(vars))="aien_json" then
			set values=vars
		else
			values=vars
		end if
		dim aryStr
		dim vType:vType=lcase(typename(values))
		select case vType
			case "string"
				toJson="""" & jsEncode(values) & """"
			case "boolean"
				toJson="" & lcase(values) & ""
			case "date"
				toJson="""" & cstr(values) & """"
			case "empty"
				toJson="""Empty"""
			case "null"
				toJson="""Null"""
			case "nothing"
				toJson="""Nothing"""
			case "aien_json"
				toJson=getJson(values)
			case else
				if isnumeric(values) then
					toJson="" & cstr(values) & ""
				elseif isarray(values) then
					dim aStr:aStr="["
					for i=0 to ubound(values)
						aStr=aStr & toJson(values(i))
						if i<ubound(values) then aStr=aStr & ","
					next
					toJson="" & aStr & "]"
				else
					toJson="""" & cstr(values) & """"
				end if
		end select
	end function

	public function getJson(byval jsonObj)
		dim col:set col=jsonObj.Collection
		dim mJson
		if jsonObj.JsonType then mJson="{" else mJson="["
		for each vars in col
			if jsonObj.JsonType then
				mJson=mJson &""""& vars & """:" & toJson(col(vars))
			else
				mJson=mJson & toJson(col(vars))
			end if
			col.remove(vars)
			if col.count>0 then  mJson=mJson & ","
		next
		if jsonObj.JsonType then mJson=mJson & "}" else mJson=mJson & "]"
		getJson=mJson
	end function

	Private 	Function jsEncode(str)
		Dim charmap(127), haystack()
		charmap(8)  = "\b"
		charmap(9)  = "\t"
		charmap(10) = "\n"
		charmap(12) = "\f"
		charmap(13) = "\r"
		charmap(34) = "\"""
		charmap(47) = "\/"
		charmap(92) = "\\"

		Dim strlen : strlen = Len(str) - 1
		ReDim haystack(strlen)

		Dim i, charcode
		For i = 0 To strlen
			haystack(i) = Mid(str, i + 1, 1)

			charcode = AscW(haystack(i)) And 65535
			If charcode < 127 Then
				If Not IsEmpty(charmap(charcode)) Then
					haystack(i) = charmap(charcode)
				ElseIf charcode < 32 Then
					haystack(i) = "\u" & Right("000" & Hex(charcode), 4)
				End If
			Else
				haystack(i) = "\u" & Right("000" & Hex(charcode), 4)
			End If
		Next

		jsEncode = Join(haystack, "")
	End Function
End Class
%>