(function($,window,document,undefined){var name="collapser",defaults={mode:'words',speed:'slow',truncate:10,ellipsis:' ... ',controlBtn:null,showText:'Show more',hideText:'Hide text',showClass:'show-class',hideClass:'hide-class',atStart:'hide',blockTarget:'next',blockEffect:'fade',lockHide:!1,changeText:!1,beforeShow:null,afterShow:null,beforeHide:null,afterHide:null};function Collapser(el,options){var s=this;s.o=$.extend({},defaults,options);s.e=$(el);s.init()}
Collapser.prototype={init:function(){var s=this;s.mode=s.o.mode;s.remaining=null;s.ctrlButton=$.isFunction(s.o.controlBtn)?s.o.controlBtn.call(s.e):$('<a href="#" data-ctrl></a>');if(s.mode=='lines'){s.e.wrapInner('<div>')}
var atStart=$.isFunction(s.o.atStart)?s.o.atStart.call(s.e):s.o.atStart;atStart=(typeof s.e.attr('data-start')!=='undefined')?s.e.attr('data-start'):atStart;if(atStart=='hide'){s.hide(0)}else{s.show(0)}},show:function(speed){var s=this;var e=s.e;s.collapsed=!1;if(typeof speed==='undefined')speed=s.o.speed;if($.isFunction(s.o.beforeShow))
s.o.beforeShow.call(s.e,s);var afterShow=function(){if($.isFunction(s.o.afterShow))
s.o.afterShow.call(s.e,s)};e.find('[data-ctrl]').remove();if(s.mode=='block'){s.blockMode(e,'show',speed,afterShow)}else{var target=(s.mode=='lines')?e.children('div'):e;var oldHeight=target.height();if(s.mode=='lines'){target.height('auto')}else{var backupHTML=target.data('collHTML');if(typeof backupHTML!=='undefined'){target.html(backupHTML)}}
var newHeight=target.height();target.height(oldHeight);target.animate({'height':newHeight},speed,function(){target.height('auto');afterShow()});e.removeClass(s.o.hideClass).addClass(s.o.showClass);if(!$.isFunction(s.o.controlBtn)){e.append(s.ctrlButton)}
s.ctrlButton.html(s.o.hideText)}
s.bindEvent();if(s.o.lockHide){s.ctrlButton.remove()}},hide:function(speed){var s=this;var e=s.e;s.collapsed=!0;if(typeof speed==='undefined')speed=s.o.speed;if($.isFunction(s.o.beforeHide)){s.o.beforeHide.call(s.e,s)}
var afterHide=function(){if($.isFunction(s.o.afterHide))
s.o.afterHide.call(s.e,s)};e.find('[data-ctrl]').remove();if(s.mode=='chars'||s.mode=='words'){var fullHTML=e.html();var collapsedHTML=s.getCollapsedHTML(fullHTML,s.mode,s.o.truncate)
if(collapsedHTML){var plainText=e.text();s.remaining=plainText.split(s.mode=='words'?' ':'').length-s.o.truncate;e.data('collHTML',fullHTML);e.html(collapsedHTML)}else{s.remaining=0}}
if(s.mode=='lines'){var $wrapElement=e.children('div');var originalHeight=$wrapElement.outerHeight();var $lhChar=$wrapElement.find('[data-col-char]');if($lhChar.length==0){var $lhChar=$('<span style="display:none" data-col-char>.</span>');$wrapElement.prepend($lhChar)}
var lineHeight=$lhChar.height();var newHeight=(lineHeight*s.o.truncate)+lineHeight/4;if(newHeight>=originalHeight){newHeight='auto';s.remaining=0}else{s.remaining=parseInt(Math.ceil((originalHeight-newHeight)/lineHeight))}
$wrapElement.css({'overflow':'hidden','height':newHeight})}
if(s.mode=='block'){s.blockMode(e,'hide',speed,afterHide)}
afterHide();if(s.mode!='block'){e.removeClass(s.o.showClass).addClass(s.o.hideClass);if(!$.isFunction(s.o.controlBtn)&&s.remaining>0){e.append(s.ctrlButton)}
s.ctrlButton.html(s.o.showText)}
s.bindEvent()},blockMode:function(e,type,speed,callback){var s=this
var effects=['fadeOut','slideUp','fadeIn','slideDown'];var inc=(s.o.blockEffect=='fade')?0:1;var effect=(type=='hide')?effects[inc]:effects[inc+2];if(!$.isFunction(s.o.blockTarget)){if($.fn[s.o.blockTarget])
$(e)[s.o.blockTarget]()[effect](speed,callback)}else{s.o.blockTarget.call(s.e)[effect](speed,callback)}
if(type=='show'){e.removeClass(s.o.showClass).addClass(s.o.hideClass);if(s.o.changeText)
e.text(s.o.hideText)}else{e.removeClass(s.o.hideClass).addClass(s.o.showClass);if(s.o.changeText)
e.text(s.o.showText)}},getCollapsedHTML:function(fullHTML,mode,truncateAt){var inTag=!1;var itemsFound=0;var slicePoint=0;var hasLessItems=!0;for(var i=0;i<=fullHTML.length;i++){char=fullHTML.charAt(i);if(char=='<')inTag=!0;if(char=='>')inTag=!1;if(itemsFound==truncateAt){slicePoint=i;hasLessItems=!1;break}
if(!inTag){if(mode=='words'&&char==' '){itemsFound++}
if(mode=='chars'){itemsFound++}}}
if(hasLessItems)
return!1;var slicedHTML=fullHTML.slice(0,slicePoint);var balancedHTML=this.balanceTags(slicedHTML);return balancedHTML+'<span class="coll-ellipsis">'+this.o.ellipsis+'</span>'},balanceTags:function(string){if(string.lastIndexOf("<")>string.lastIndexOf(">")){string=string.substring(0,string.lastIndexOf("<"))}
var tags=string.match(/<[^>]+>/g);var stack=new Array();for(tag in tags){if(tags[tag].search("/")<=0){stack.push(tags[tag])}else if(tags[tag].search("/")==1){stack.pop()}else{}}
while(stack.length>0){var endTag=stack.pop();endTag=endTag.substring(1,endTag.search(/[>]/));string+="</"+endTag+">"}
return(string)},bindEvent:function(){var s=this;var target=(s.mode=='block')?s.e:s.ctrlButton;target.off('click').on('click',function(event){event.preventDefault();if(s.collapsed){s.show()}else{s.hide()}})}};$.fn[name]=function(options){return this.each(function(){if(!$.data(this,name)){$.data(this,name,new Collapser(this,options))}})}})(jQuery,window,document)
;