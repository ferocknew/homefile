// JavaScript Document
$(function(){
    //数据
    function showJobList(json){
        var _html_temp = "";
        $(json).each(function(i){
            _html_temp += '<li>' + this.aaaa + '</li>';
        })
        this.pagebody.html(_html_temp);
    }
	var perpageSize=20;
    var jobList = $("#iphone-body").jsonPaging({
        perpage: perpageSize,
        autoPage: 1,
        url: "lib/action/webservice.asp",
        totalProperty: "pageMAX",
        itemProperty: "datalist",
        pageProperty: "pages",
        showContent: showJobList,
        jumpAble: false,
        totalInfo: false,
        param: {
            code: "json",
            act: "jobslist",
			perpageSize:perpageSize
        }
    }).data("jsonPaging");
})
