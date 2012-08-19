/// <reference path="jquery.js"/>
/*
GPL license: http://gplv3.fsf.org
jquery catelog:plusin(function)
application type: modal dialog
author:jericho(thisnamemeansnothing[at]gmail.com)
version:1.0
pid-date:2009-4-20 01:20:00
========================================
ps:
    in order to promote efficiency, 
    you'd better place the stylesheet
    in a *.css file and add link tag in your pages 
     
bugs and updates:
    ###Jmodal bound an event to 'window.onscroll', so the jmodal'll be always displayed in the middle of pages
    ###both 'Function' and 'String' can be used as content
    #####String
    $.fn.jmodal({
        title:'Information',
        content:'Hi,you displayed me?',
        buttonText:'Yes,It\'s me',
        okEvent:function(e){
            alert('jmodal\'ll be closed after u click me:-)');
        }
    });
    #####function
    $.fn.jmodal({
        title:'Information',
        content:function(e){   //--------> e was the content placeholder
            e.html('loading...');
                //you can use ajax here,such as
            e.load('templates/templatehtml.htm',function(msg){
                // your code
            });
    },
    buttonText:'Yes,It\'s me',
    okEvent:function(e){
        alert('jmodal\'ll be closed after u click me:-)');
        }
    });
    
    ********updated in this version********************
    ####unbind 'scroll', use 'background:fixed' to fix jmodal in the middle of page
    ####use a new property:marginTop to instead of the fixed number '140'('margin-top' of the jmodal).
*/
$.extend($.fn, {
    jmodal: function(setting) {
        var ps = $.fn.extend({
            data: {},
            buttonText: 'OK',
            okEvent: function(e) { },
            initWidth: 400,
            marginTop: 100,
            title: 'JModal Dialog',
            content: 'This is a jquery plusin!',
            docWidth: $(document).width(),
            docHeight: $(document).height(),
            overlayCss: {
                'position': 'absolute',
                'left': '0',
                'top': '0',
                'background-color': '#7f7f7f',
                'opacity': '0',
                'z-index': '200'
            },
            jmodalbgCss: {
                'z-index': '201',
                'position': 'fixed',
                'background-color': '#555'
            },
            jmodalCss: {
                'z-index': '202',
                'height': 'auto',
                'position': 'fixed',
                'opacity': '0'
            },
            closeCss: {
                'position': 'absolute',
                'right': '5px',
                'top': '5px',
                'width': '16px',
                'height': '16px',
                'font-weight': 'bold',
                'color': '#fff',
                'text-align': 'center',
                'line-height': '16px',
                'display': 'block',
                'text-decoration': 'none'
            },
            titleCss: {
                'height': '30px',
                'background-color': '#87CEEB',
                'font-weight': 'bold',
                'text-indent': '10px',
                'color': '#008080',
                'line-height': '30px',
                'border-bottom': 'groove 2px #4682B4'
            },
            contentCss: {
                'height': 'auto',
                'background-color': '#F5FFFA',
                'padding': '20px 10px'
            },
            bottomCss: {
                'background-color': '#eee',
                'border-top': '1px solid #ccc',
                'padding': '5px',
                'text-align': 'right'
            },
            buttonCss: {
                'background-color': '#87CEEB',
                'border-color': '#B8D4E8 #124680 #124680 #B8D4E8',
                'border-style': 'solid',
                'border-width': '1px',
                'color': '#008080',
                'cursor': 'pointer',
                'font-size': '12px',
                'padding': '2px 15px',
                'text-align': 'center',
                'margin-right': '5px',
                'font-family': 'Calibri'
            }
        }, setting);
        function hideModal() {
            $('#jmodal-overlay').animate({ opacity: 0 }, function() { $(this).css('display', 'none') });
            $('#jquery-jmodal-bg').animate({ opacity: 0 }, function() { $(this).css('display', 'none') });
            $('#jquery-jmodal').animate({ opacity: 0 }, function() { $(this).css('display', 'none') });
        }
        if ($('#jquery-jmodal').length == 0) {
            $(document.body).append('<div id="jmodal-overlay" />' +
                '<div id="jquery-jmodal-bg" />' +
                '<div id="jquery-jmodal">' +
                '<a href="javascript:void(0)" id="jquery-jmodal-close" title="关闭">X</a>' +
                '<div id="jmodal-container-title" />' +
                '<div  id="jmodal-container-content" />' +
                '<div id="jmodal-container-bottom">' +
                '<button id="jmodal-bottom-okbutton" ></button>' +
                '</div>');
        }
        else {
            $('#jmodal-overlay').css({ opacity: 0, 'display': 'block' });
            $('#jquery-jmodal-bg').css({ opacity: 0, 'display': 'block' });
            $('#jquery-jmodal').css({ opacity: 0, 'display': 'block' });
        }
        $('#jmodal-overlay').css(ps.overlayCss).css({
            width: ps.docWidth,
            height: ps.docHeight
        }).animate({ opacity: 0.5 });
        $('#jquery-jmodal').css(ps.jmodalCss).css({
            width: ps.initWidth,
            left: (ps.docWidth - ps.initWidth) / 2,
            top: (ps.marginTop + document.documentElement.scrollTop)
        }).animate({ opacity: 1 }, function() {
            var me = this;
            $('#jquery-jmodal-bg').css(ps.jmodalbgCss).css({
                width: ps.initWidth + 20,
                left: (ps.docWidth - ps.initWidth) / 2 - 10,
                height: $(me).height() + 20,
                opacity: 0.5,
                top: (ps.marginTop - 10 + document.documentElement.scrollTop)
            });
        });
        $('#jquery-jmodal-close').css(ps.closeCss).hover(function() {
            $(this).css({ 'background-color': '#F0FFF0', 'color': '#000' });
        }, function() {
            $(this).css({ 'background-color': 'transparent', 'color': '#fff' });
        }).mouseup(hideModal);
        $('#jmodal-container-title')
                .css(ps.titleCss)
                    .html(ps.title)
                        .next()
                            .css(ps.contentCss)
                                    .next()
                                        .css(ps.bottomCss)
                                            .children('#jmodal-bottom-okbutton')
                                                .text(ps.buttonText)
                                                    .css(ps.buttonCss)
                                                        .one('click', function(e) {
                                                            ps.okEvent(ps.data); hideModal();
                                                        });
        if (typeof ps.content == 'string') {
            $('#jmodal-container-content').html(ps.content);
        }
        if (typeof ps.content == 'function') {
            var e = $('#jmodal-container-content');
            e.holder = $('#jquery-jmodal');
            e.modalBG = $('#jquery-jmodal-bg');
            ps.content(e);
        }
    }
})