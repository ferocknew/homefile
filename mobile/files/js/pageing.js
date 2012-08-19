/* 
 * yh v0.3
 */
(function(b){function n(){return false}b.common={option:function(a,c){var d=a;if(typeof a==="string")if(c===undefined)return this.options[a];else{d={};d[a]=c}b.extend(this.options,d)}};b.My=b.YH={position:function(a,c){if(a==undefined)a=[0,0];if(a.constructor!=Array){var d=b(a);if(d.length>0){a=d.offset();a.left+=d.outerWidth();if(c){a.left+=c.left;a.top+=c.top}return a}}d=b(window);var e=b(document),f=e.scrollTop();e=e.scrollLeft();var g=f;if(a.length==1)a[1]="middle";if(a[0].constructor==Number)e+=
a[0];else switch(a[0]){case "left":e+=0;break;case "right":e+=d.width()-c.outerWidth();break;case "center":default:e+=(d.width()-c.outerWidth())/2}if(a[1].constructor==Number)f+=a[1];else switch(a[1]){case "top":f+=0;break;case "bottom":f+=d.height()-c.outerHeight();break;case "middle":default:f+=(d.height()-c.outerHeight())/2}f=Math.max(f,g);return{left:e,top:f}},implement:function(){var a=arguments.length,c=arguments[0]||{},d=false,e=1;if(typeof c=="boolean"){d=c;c=arguments[1]||{};e=2}for(;e<a;e++){var f=
arguments[e];if(typeof f=="object")for(var g in f){var h=f[g],i=c[g];if(c!==h)if(i){if(d&&typeof h=="object"&&typeof i=="object")c[g]=b.YH.implement(d,i,h)}else c[g]=h}}return c},getObj:function(a,c,d){var e=null,f;d=d||a.template;if(a)if(a instanceof jQuery)e=a;else if(a.nodeType)e=b(f);else{a=this.checkConfig(a);f=a.selector;if(typeof f=="string"){e=c.find(f);if(e.length==0){if(f!="."+a.cls)e=b(f);if(e.length==0)e=b(d).addClass(a.cls).appendTo(c)}}}return e},template:function(a,c){return a.replace(/\{([\w\.]*)\}/g,
function(d,e){return b.YH.attr(c,e)})},attr:function(a,c){if(c.indexOf(".")>-1){c=c.split(".");a=a[c[0]];for(var d=1;d<c.length;d++)a=a[c[d]]}else a=a[c];return a},setAttr:function(a,c,d){var e;if(c.indexOf(".")>-1){e=c.split(".");c=a[e[0]];for(var f=1;f<e.length;f++)c[e[f]]=d}else a[c]=d;return a},parseConfig:function(a){if(a){if(typeof a=="string")a={cls:a};if(!a.nodeType&&!(a instanceof jQuery)&&!a.selector)a.selector="."+a.cls}return a},checkConfig:function(a){if(a){if(typeof a=="string")a={cls:a};
if(!a.selector)a.selector="."+a.cls}return a},extendOriginal:function(a,c,d){if(typeof c=="object")for(var e in c)a.prototype[e]||(a.prototype[e]=c[e]);if(typeof d=="object")for(var f in d)a[f]||(a[f]=d[f])},ucfirst:function(a){a+="";return a.charAt(0).toUpperCase()+a.substr(1)},lcfirst:function(a){a+="";return a.charAt(0).toLowerCase()+a.substr(1)}};b.YH.createNameSpace=b.createNameSpace=function(a){var c=a.split(".");a=c.pop();var d=this,e;for(var f in c){e=b.YH.ucfirst(c[f]);d=e in d?d[e]:(d[e]=
{})}return{ns:d,cName:a}};b.YH.declare=b.declare=function(a,c,d){var e=b.createNameSpace(a),f=b.YH.ucfirst(e.cName);e.ns[f]=function(g,h){this.widgetBaseClass=this.constructor||d;this.namespace=this.constructor.nameSpace;this.widgetName=this.className=this.constructor.className;this.BaseClass=e.ns[f];if(g){if(g!=window&&typeof h=="undefined"&&typeof g.nodeType=="undefined"){h=g;g=document.body}}else g=document.body;this.options=b.extend({},e.ns[f].defaults,h);this.element=b(g);if(b.isFunction(this._init))return this._init()};
typeof d!="undefined"&&b.extend(e.ns[f],d);e.ns[f].nameSpace=e.ns;e.ns[f].className=e.ns[f].cName=f;b.extend(e.ns[f].prototype,c);return e.ns[f]};b.YH.widget=b.myWidget=function(a,c,d){var e,f;if(typeof c=="function"){e=c;f=b.YH.lcfirst(a)}else{e=b.YH.declare(a,c,d);f=b.YH.lcfirst(e.cName)}b.fn[f]=function(g){var h=typeof g=="string",i=Array.prototype.slice.call(arguments,1);if(h)switch(g.substring(0,1)){case "_":return this;case "@":var k=this[i.shift()||0];return(k=k&&b.data(k,f))?k[g.substring(1)].apply(k,
i):undefined}return this.each(function(){var j=b.data(this,f);if(j&&h&&b.isFunction(j[g]))j[g].apply(j,i);else if(!h&&!j){j=new e(this,g);b.data(this,f,j)}})}};b.YH.Class=function(){var a=arguments[0],c=arguments[1],d;if(arguments.length==3){d=arguments[2];if(d.prototype!=null)c=b.extend({},d.prototype,c)}else if(arguments.length==4){var e=arguments[3];d=b.extend(true,{},arguments[2],e);if(e.prototype!=null)c=b.extend({},e.prototype,c)}else{d=[true,{}];for(e=2;e<arguments.length;e++)arguments[e].prototype&&
d.push(arguments[e].prototype);d.push(c);c=b.extend.apply(this,d);arguments[0]=true;arguments[1]={};d=b.extend.apply(this,arguments)}b.YH.declare(a,c,d)};if(b.browser.msie&&b.browser.version<8){var l=[],m=false;b.hoverActive=function(a,c){a.jquery||(a=b(a));typeof c=="boolean"&&b.unselect(a,c);a.hover(function(){b(this).addClass("hover")},function(){b(this).removeClass("hover")}).mousedown(function(){b(this).addClass("active");l.push(this);m=true})};b(document).bind("mouseup.active",function(){if(m===
true){b(l).removeClass("active");m=false;l=[]}})}else b.hoverActive=function(a,c){typeof c=="boolean"&&b.unselect(a,c)};b.unselect=function(a,c){a.jquery||(a=b(a));c?a.attr("unselectable","on").css("MozUserSelect","none").bind("selectstart",n):a.attr("unselectable","").css("MozUserSelect","").unbind("selectstart",n)};b.fn.hoverActive=function(a){b.hoverActive(this,a);return this};b.fn.unselect=function(a){b.unselect(this,a);return this};b.fn.effectHover=function(a,c){function d(){var h=this,i=arguments;
clearTimeout(g);clearTimeout(f);f=setTimeout(function(){a.apply(h,i)},200)}function e(){var h=this,i=arguments;clearTimeout(g);clearTimeout(f);g=setTimeout(function(){c.apply(h,i)},200)}var f=0,g=0;this.mouseenter(d).mouseleave(e);return this};b.fn.serializeObject=function(){var a={},c=/select|textarea/i,d=/color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week/i;this.map(function(){return this.elements?jQuery.makeArray(this.elements):this}).filter(function(){return this.name&&
!this.disabled&&(this.checked||c.test(this.nodeName)||d.test(this.type))}).each(function(e,f){e=jQuery(this).val();return e==null?null:jQuery.isArray(e)?jQuery.each(e,function(g,h){a[f.name+"["+h+"]"]=g}):(a[f.name]=e)});return a};b.YH.declare("YH.Page",b.extend({},b.common,{_init:function(){var a=this.options;this.init();this.createBody();this.buildNav();a.totalnum&&this.setTotal(a.totalnum);a.autoPage&&this.showPage(a.autoPage)},init:function(){this.perpage=this.options.perpage;this.loadPages=this.options.loadPages||
this.loadPages},createBody:function(){this.pagebody=b.YH.getObj(this.options.body,this.element,"<div/>")},buildNav:function(){var a=this.options;this.createNav();this.createNavItems();a.navInfo&&this.createNavInfo();a.totalInfo&&this.createTotalInfo();a.jumpAble&&this.createJump()},createNav:function(){this.pagenav=b.YH.getObj(this.options.nav,this.element,"<div/>")},createNavItems:function(){},createNavInfo:function(){},showInfo:function(){},createTotalInfo:function(){var a=this.options;if(a.showTotalInfo)this.showTotalInfo=
a.showTotalInfo;this.totalInfo=b.YH.getObj(a.totalInfo,this.pagenav,"<span/>")},showTotalInfo:function(){this.totalInfo.html("\u4e00\u5171"+this.totalnum+"\u6761\u8bb0\u5f55")},createJump:function(){var a=this.options;this.jump=b.YH.getObj(a.jump,this.pagenav,'<span><span class="jump-lable">\u8df3\u8f6c\u5230</span></span>');this.jumpText=b.YH.getObj(a.jumpText,this.jump,'<input type="text"/>');this.jumpButton=b.YH.getObj(a.jumpButton,this.jump,'<input type="button" value="'+a.jumpButton.text+'"/>');
var c=this;this.jumpText.keydown(function(d){d.keyCode==13&&c.showPage(this.value)});this.jumpButton.click(function(){c.showPage(c.jumpText.val())})},setPerpage:function(a){this.perpage=a},setTotal:function(a){this.totalnum=a;this.initNav();this.initFlag=true;this.options.totalInfo&&this.showTotalInfo()},initNav:function(){},setNav:function(){},showPage:function(a){a=parseInt(a);if(isNaN(a)||a<1||this.initFlag&&a>this.maxpage)return false;this.lastIndex=a;this.loadPages(a)!==false&&this.setNav(a)},
reset:function(a){this.initFlag=false;this.lastIndex=0;this.showPage(a||1)},reload:function(){this.initFlag=false;var a=this.lastIndex;this.lastIndex=0;this.showPage(a)},loadPages:function(){alert("\u6ca1\u6709\u6307\u5b9ashowPages\u65b9\u6cd5")},param:function(a,c){if(typeof a=="object")this.options.param=b.extend(true,this.options.param,a);else if(typeof c=="undefined")return a?this.options.param[a]:this.options.param||{};else{var d={};d[a]=c;this.options.param=b.extend(true,this.options.param,
d)}},emptyParam:function(){this.options.param={}}}),{defaults:{body:{cls:"pagebody"},nav:{cls:"pagenav"},navInfo:{cls:"info"},totalInfo:{cls:"totalinfo"},jump:{cls:"jump"},jumpText:{cls:"jump-text"},jumpButton:{cls:"jump-button",text:"go"},perpage:10,autoPage:0,jumpAble:1,hasNavItem:true}});b.YH.widget("YH.paging",b.extend({},b.YH.Page.prototype,{createNavItems:function(){var a=this,c=lasthtml=middlehtml="";this.prev=b('<a href="#" class="prev">\u2039\u2039</a>');this.next=b('<a href="#" class="next">\u203a\u203a</a>');
this.ellipsis_l=b('<span class="ellipsis_l">...</span>');this.ellipsis_r=b('<span class="ellipsis_r">...</span>');for(var d=0;d<this.options.BENUM;d++){c+='<a href="#" class="first"></a>';lasthtml+='<a href="#" class="last"></a>'}this.firsts=b(c);this.lasts=b(lasthtml);d=0;for(c=2*this.options.OFFSET+1;d<c;d++)middlehtml+='<a href="#" class="middle"></a>';this.middles=b(middlehtml);this.pagenav.append(this.prev,this.firsts,this.ellipsis_l,this.middles,this.ellipsis_r,this.lasts,this.next).hide();
this.navs=this.firsts.add(this.lasts).add(this.middles).add(this.prev).add(this.next);this.navs.click(function(e){var f=parseInt(b(this).attr("page"));a.showPage(f);e.preventDefault();return false})},initNav:function(){this.navs.hide();this.ellipsis_l.hide();this.ellipsis_r.hide();this.maxpage=Math.ceil(this.totalnum/this.perpage);if(this.maxpage!=0){b(this.prev).hide();b(this.next).attr("page",2);var a=1;b.each(this.firsts,function(){b(this).attr("page",a).html(a++)});a=this.maxpage-this.options.BENUM+
1;b.each(this.lasts,function(){b(this).attr("page",a).html(a++)});this.pagenav.show()}},setNav:function(a){if(this.maxpage!=0){a=a||this.lastIndex;var c=a-this.options.OFFSET,d=a+this.options.OFFSET;if(c<1){d+=1-c;d=d>this.maxpage?this.maxpage:d;c=1}if(d>this.maxpage){c=c-d+this.maxpage;c=c<1?1:c;d=this.maxpage}var e=c;b.each(this.middles,function(){b(this).attr("page",e).html(e++).hide()});fts=this.middles;if(c>this.options.BENUM){b.each(this.firsts,function(){b(this).show()});c==this.options.BENUM+
1?b(this.ellipsis_l).hide():b(this.ellipsis_l).show()}else{b(this.ellipsis_l).hide();b(this.firsts).hide();fts=fts.slice(this.options.BENUM+1-c);fts=this.maxpage<this.options.BENUM?this.firsts.slice(0,this.options.BENUM-this.maxpage).add(fts):this.firsts.add(fts);c=1}if(d<=this.maxpage-this.options.BENUM){b.each(this.lasts,function(){b(this).show()});d==this.maxpage-this.options.BENUM?b(this.ellipsis_r).hide():b(this.ellipsis_r).show()}else{b(this.ellipsis_r).hide();b(this.lasts).hide();if(this.maxpage<=
2*this.options.BENUM){fts=fts.slice(0,this.options.BENUM-2*this.options.OFFSET-1);fts=fts.add(this.lasts.slice(2*this.options.BENUM-this.maxpage,this.options.BENUM))}else fts=fts.slice(0,this.maxpage-d-this.options.BENUM).add(this.lasts);d=this.maxpage}this.lastnav&&this.lastnav.removeClass("current");var f=null;b.each(fts,function(){b(this).show();if(b(this).attr("page")==a){b(this).addClass("current");f=this}});this.lastnav=b(f);a>1&&this.maxpage>1?b(this.prev).attr("page",a-1).show():b(this.prev).hide();
a<this.maxpage?b(this.next).attr("page",a+1).show():b(this.next).hide()}}}),{defaults:b.extend({},b.YH.Page.defaults,{OFFSET:2,BENUM:2})});b.YH.widget("YH.simplePaging",b.extend({},b.YH.Page.prototype,{createNavItems:function(){var a=this.options,c=this;a.hasNavItem?b.each(a.navItem,function(d,e){c.pagenav[d]=c.pagenav.find(e.selector);c.pagenav[d].click(function(f){c[d]();f.preventDefault();return false}).hoverActive(true)}):b.each(a.navItem,function(d,e){c.pagenav[d]=b('<a href="javascript:void(0);" class="'+
d+'">'+e.html+"</a>").appendTo(c.pagenav).click(function(f){c[d]();f.preventDefault();return false}).hoverActive(true)})},createNavInfo:function(){var a=this.options;if(a.showInfo)this.showInfo=a.showInfo;this.navInfo=b.YH.getObj(a.navInfo,this.element,"<span/>")},showInfo:function(a){this.navInfo.html("\u7b2c"+a+"/"+this.maxpage+"\u9875")},initNav:function(){this.maxpage=Math.ceil(this.totalnum/this.perpage)},setNav:function(a){a=a||this.lastIndex;if(a==1)this.showLast();else a==this.maxpage?this.showForward():
this.showAll();this.showInfo(a)},prev:function(){this.showPage(this.lastIndex-1)},next:function(){this.showPage(this.lastIndex+1)},first:function(){this.showPage(1)},last:function(){this.showPage(this.maxpage)},showForward:function(){this.pagenav.first.attr("disabled","");this.pagenav.prev.attr("disabled","");this.pagenav.last.attr("disabled","disabled");this.pagenav.next.attr("disabled","disabled")},showLast:function(){this.pagenav.first.attr("disabled","disabled");this.pagenav.prev.attr("disabled",
"disabled");this.pagenav.last.attr("disabled","");this.pagenav.next.attr("disabled","")},showAll:function(){this.pagenav.first.attr("disabled","");this.pagenav.prev.attr("disabled","");this.pagenav.last.attr("disabled","");this.pagenav.next.attr("disabled","")}}),{defaults:b.extend({},b.YH.Page.defaults,{navItem:{first:{selector:".first",html:"\u9996\u9875"},prev:{selector:".prev",html:"\u4e0a\u4e00\u9875"},next:{selector:".next",html:"\u4e0b\u4e00\u9875"},last:{selector:".last",html:"\u672b\u9875"}}})});
b.YH.Class("YH.jsonPaging",{init:function(){var a=this.options;this.perpage=a.perpage;this.url=a.url;this.totalProperty=a.totalProperty||"total";this.itemsProperty=a.itemProperty||"items";this.pageProperty=a.pageProperty||"page";this.showContent=a.showContent||function(){}},loadPages:function(a){var c=this,d,e=this.param();e[this.pageProperty]=a;b.getJSON(this.url,e,function(f){var g=f[c.itemsProperty];f=f[c.totalProperty];c.totalnum!=f&&c.setTotal(f);c.setNav(a);(d=c.showContent(g))&&c.pagebody.html(d)});
return false},getUrl:function(){return this.url},setUrl:function(a){this.url=a}},b.YH.Paging);b.YH.widget("jsonPaging",b.YH.JsonPaging)})(jQuery);
