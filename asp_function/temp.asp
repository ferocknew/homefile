<%
Response.Write(&h74)

Function jsEncode(str)
		Dim i, j, aL1, aL2, c, p

		aL1 = Array(&h22, &h5C, &h2F, &h08, &h0C, &h0A, &h0D, &h0D)
		aL2 = Array(&h22, &h5C, &h2F, &h62, &h66, &h6E, &h72, &h74)
		For i = 1 To Len(str)
			p = True
			c = Mid(str, i, 1)
			For j = 0 To 7
				If c = Chr(aL1(j)) Then
					jsEncode = jsEncode & "\" & Chr(aL2(j))
					p = False
					Exit For
				End If
			Next

			If p Then
				Dim a
				a = AscW(c)
				If a > 31 And a < 127 Then
					jsEncode = jsEncode & c
				ElseIf a > -1 Or a < 65535 Then
					jsEncode = jsEncode & "\u" & String(4 - Len(Hex(a)), "0") & Hex(a)
				End If
			End If
		Next
	End Function
%>