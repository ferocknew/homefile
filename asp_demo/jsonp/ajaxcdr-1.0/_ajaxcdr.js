
var FlashHelper_version = 1;
function storageOnLoad() { 
    //alert("storageOnLoad"); 
    FlashHelper.flashLoaded = true;
    FlashHelper.load();
}

function storageOnError() {
    //alert("storageOnError"); 
    FlashHelper.flashLoaded = true;
    FlashHelper.load();
}
function httpData(data,dataType) {
    switch (dataType) {
        case 'xml':
            data=parseXml(data);
            break;
        case 'json':
            data=parseJson(data);
            break;
        case 'script':
        case 'javascript':
            jQuery.globalEval( data );
            break;
        default:
            break;
    }
    return data;
}
function parseXml(data) {
    var doc;
    try{
        if(!-[1,]){
           doc=new ActiveXObject("Microsoft.XMLDOM");
           doc.loadXML(data)
        }else{
            doc=document.implementation.createDocument("","",null);
            var parser=new DOMParser();
            doc=parser.parseFromString(data,"text/xml");
        }  
    }catch(e){
        throw "Invalid xml: " + data;
    }
    return doc;
}
function parseJson(data) {
    if (/^[\],:{}\s]*$/.test(data.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@")
        .replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]")
        .replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) {

        // Try to use the native JSON parser first
        if ( window.JSON && window.JSON.parse ) {
            data = window.JSON.parse( data );

        } else {
            data = (new Function("return " + data))();
        }

    } else {
        throw "Invalid JSON: " + data;
    }
    return data;
}
/**************************************** FlashHelper ***************************************************/

FlashHelper={
    flashLoaded : false,
    onloadCalled:false,
    init: function(o){
        o=o||{};
        //this.documentLoaded = false;
        this.height = o.height || 0;
        this.width = o.width || 0;
        this.swf = o.swf || "../ajaxcdr.swf";
        this.id = o.id || "storage";

        this.onload=o.onload;
        this.writeFlash();
        
        //this.createGlobal();
        
        window._flash=this.getFlash();

        if(this.flashLoaded){
            this.load();
        }
    },
    load:function () {
        if(this.onloadCalled ||typeof this.onload!="function") {return;}
        this.onloadCalled=true;
        this.onload();
    },
    shouldWaitForFlash: function(){
        // todo: should return 3 values: installed, notInstalled, silentInstall
    },
    isFlashInstalled: function(){
        var ret;
        
        if (typeof(this.isFlashInstalledMemo) != "undefined") {
            return this.isFlashInstalledMemo;
        }
        
        if (typeof(ActiveXObject) != "undefined") {
            try {
                var ieObj = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
            } catch (e) {
            }
            ret = (ieObj != null);
        } else {
            var plugin = navigator.mimeTypes["application/x-shockwave-flash"];
            ret = (plugin != null) && (plugin.enabledPlugin != null);
        }
        
        this.isFlashInstalledMemo = ret;
        
        return ret;
    },
    getFlash: function(){
        return this._flash;
    },
    checkFlash: function(){
        // confirm that the Flash Storage is running
        
        try {
            return (this.getFlash().ping() == "pong");
        } catch (e) {
            return false;
        }
    },
    writeFlash: function(){
        var html = "";
        if (window.ActiveXObject && !FlashHelper.isFlashInstalled()) {
            // browser supports ActiveX
            // Create object element with 
            // download URL for IE OCX
            html += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,5,0,0"';
            html += ' height="' + this.height + '" width="' + this.width + '" id="' + this.id + '">';
            html += ' <param name="movie" value="' + this.swf + '">';
            html += ' <param name="quality" value="high">';
            html += ' <param name="swliveconnect" value="true">';
            html += '<\/object>';
        } else {
            html += '<object id="' + this.id + '" data="' + this.swf + '"';
            html += ' type="application/x-shockwave-flash"';
            html += ' height="' + this.height + '" width="' + this.width + '">';
            html += '<param name="movie" value="' + this.swf + '">';
            html += '<param name="quality" value="high">';
            html += '<param name="swliveconnect" value="true">';
            html += '<param name="pluginurl" value="http://www.macromedia.com/go/getflashplayer">';
            html += '<param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer">';
            html += '<p>You need Flash for this.';
            html += ' Get the latest version from';
            html += ' <a href="http://www.macromedia.com/software/flashplayer/">here<\/a>.';
            html += '<\/p>';
            html += '<\/object>';
        }
        var ele = document.createElement("div");
        ele.innerHTML = html;
        this._flash = ele.childNodes[0];
        document.body.appendChild(this._flash);
        ele = null;
    }
}

var ACDR ={
     get: function( url, data, callback, type ) {
		// shift arguments if data argument was omited
		if ( jQuery.isFunction( data ) ) {
			type = type || callback;
			callback = data;
			data = null;
		}

		return this.ajax({
			type: "GET",
			url: url,
			data: data,
			success: callback,
			dataType: type
		});
	},
	post: function( url, data, callback, type ) {
		// shift arguments if data argument was omited
		if ( jQuery.isFunction( data ) ) {
			type = type || callback;
			callback = data;
			data = {};
		}

		return this.ajax({
			type: "POST",
			url: url,
			data: data,
			success: callback,
			dataType: type
		});
	},

    /**
    {
        url: String,
        data:Object,
        dataType:String 'xml',
		type: String "GET",
		contentType: String "application/x-www-form-urlencoded",

		processData: true,
        global: true,
		async: true,

        success:Function,
        error:Function
        
    }
      */
      ajaxSettings: {
		url: location.href,
		global: true,
		type: "GET",
		contentType: "application/x-www-form-urlencoded",
		processData: true,
		async: true

      },
     accepts: {
        xml: "application/xml, text/xml",
        html: "text/html",
        script: "text/javascript, application/javascript",
        json: "application/json, text/javascript",
        text: "text/plain",
        _default: "*/*"
    },
    ajax:function(o){
        o=jQuery.extend({},this.ajaxSettings,o);
        this._headers=[];
        this._contentType=o.contentType;
        var type=o.type.toUpperCase();


        // convert data if not already a string
		if (o.data &&  typeof o.data !== "string" ) {
			o.data = jQuery.param( o.data, o.traditional );
		}
        if(o.dataType){
            var output="output="+encodeURIComponent(o.dataType);
            o.data=o.data?o.data+"&"+output:output;
        }
		// If data is available, append data to url for get requests
	   if ( o.data && type === "GET" ) {
			o.url += o.url.indexOf("?")>-1 ? "&" : "?" + o.data;
            o.data="";
	   }

       //Accept
     //  o.accepts=o.accepts||this.accepts;
      // this.setRequestHeader("Accept", o.dataType && o.accepts[ o.dataType ] ? 				o.accepts[ o.dataType ] + ", */*" : 				o.accepts._default );
       //X-Requested-With
      // this.setRequestHeader("X-Requested-With", "XMLHttpRequest");
       
       var gf=this._setCallback(o.success,o.dataType);
       var fs=FlashHelper.getFlash();
       fs.XmlHttp(o.url, gf, type, o.data, this._contentType,this._headers);
    },
    setRequestHeader : function(header, value) {
        if (header.toLowerCase() == "Content-Type".toLowerCase()) {
            this._contentType = value;
            return;
        }
        
        this._headers.push(header);
        this._headers.push(value);
    },
    flashAjax: function(url, method, formname, callback){
        if(typeof url=="object"){
            url=o.url;
            method=o.method;
            formname=o.formname;
            callback=o.callback;
        }
        method = method.toUpperCase();
       // this.setCallback(callback);
        
        var contentType = "application/x-www-form-urlencoded";
        var body = '';
        
        var form = document.forms[formname];
        
        for (var i = 0; i < form.length; i++) {
            if (form.elements[i].type == "radio" || form.elements[i].type == "checkbox" || form.elements[i].type == "select") {
                //如果是单选按钮、复选框、单选下拉框
                if (form.elements[i].checked && form.elements[i].name != "") {
                    body += encodeURIComponentComponent(form.elements[i].name) + '=' + encodeURIComponent(form.elements[i].value) + '&';
                }
            } else if (form.elements[i].type == "select-multiple" && form.elements[i].name != "") {
                //如果是多选下拉框
                for (var sm = 0; sm < form.elements[i].length; sm++) {
                    if (form.elements[i][sm].selected) {
                        body += encodeURIComponent(form.elements[i].name) + '=' + encodeURIComponent(form.elements[i][sm].value) + '&';
                    }
                }
            } else {
                //Button、Hidden、Password、Submit、Text、Textarea等文本类型
                if (form.elements[i].name != "") {
                    body += encodeURIComponent(form.elements[i].name) + '=' + encodeURIComponent(form.elements[i].value) + '&';
                }
            }
        }
        
        var fs = FlashHelper.getFlash();
        //fs.loadPolicyFile("http://domain/blah/crossdomain.xml");
        var gf=this._setCallback(callback);
        if (body.substr(body.length-1,1) == "&") {
            body = body.substring( 0, body.length-1);
        }
        if (method == "GET") {
            //GET
            url += url.indexOf("?")>0?(url.indexOf("=")>0?"&":''):"?"+body;
            fs.XmlHttp(url, gf, method, "", contentType);
        } else {
            //POST
            fs.XmlHttp(url,gf, method, body, contentType);
        }
    },
    //异步也不安全，共用一个flash，内容会被覆盖，修改flash，返回内容直接传给回调函数，而不是作为变量保存
    _setCallback:function(callback,dataType){
        var gf="flash"+(new Date()).getTime();
        window[gf]=function(name){
            var data=FlashHelper.getFlash().GetVariable(name);
            callback(httpData(data,dataType));
            window[ gf ] = undefined;
            try {
                delete window[ gf ];
            } catch(e) {}
        }
        return gf;
    },
    //异步不安全,共享一个返回处理
    createGlobal:function(){
        var self=this; 
        this.globalFunction="flash"+(new Date()).getTime();
        window[this.globalFunction]=function(name){
           //console.log(gf,typeof self.callback);
           self.callback(FlashHelper.getFlash().GetVariable(name));
        }
    },
    setCallback:function(callback){
        //window[this.globalFunction].callback=callback;
        this.callback=callback;
    }
}
