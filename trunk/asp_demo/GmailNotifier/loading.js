
			 function AddGMAILJS(){
			   var e
			   e=document.createElement("script");
			   e.type="text/javascript";
			   e.language="javascript";
			   e.src="Plugins/GMailNotifier/getGMAIL.asp?s="+Math.random();
			   document.getElementsByTagName("head")[0].appendChild(e);
			}
			 window.setTimeout("AddGMAILJS()",1)
			 	 
			function readMail(o,id){
				  if (id!="inbox" && o.childNodes[0].tagName=="B")
				  {
					  o.innerHTML=o.childNodes[0].innerHTML
					  document.getElementById("mailC").innerHTML=parseInt(document.getElementById("mailC").innerHTML) - 1
				  }
				window.open("Plugins/GMailNotifier/openGMail.asp?msgid="+id,"showMail","width=760px,height=600px,toolbar=no,status=no,scrollbars=no,resizable=yes,directories=no,menubar=no,location=no")
			}
			
			function reloadMail(){
			 	document.getElementById("reloadMail").style.visibility="visible";
				AddGMAILJS();
			}
			
			function readMore(){
			   var MMI=document.getElementById("MMoreIcon")
			   var MMP=document.getElementById("MMorePanel")
			   	   MMP.style.display=(MMP.style.display=="none")?"":"none"
			   	   MMI.src=(MMP.style.display=="none")?"Plugins/GMailNotifier/triangle.gif":"Plugins/GMailNotifier/opentriangle.gif"
			}
				