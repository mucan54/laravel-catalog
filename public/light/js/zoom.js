/*! lg-zoom - v1.3.0 - October-14-2020
* http://sachinchoolur.github.io/lightGallery
* Copyright (c) 2020 Sachin N; Licensed GPLv3 */
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(a){return b(a)}):"object"==typeof module&&module.exports?module.exports=b(require("jquery")):b(a.jQuery)}(this,function(a){!function(){"use strict";var b=function(){var a=!1,b=navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);return b&&parseInt(b[2],10)<54&&(a=!0),a},c={scale:1,zoom:!0,actualSize:!0,enableZoomAfter:300,useLeftForZoom:b()},d=function(b){return this.core=a(b).data("lightGallery"),this.core.s=a.extend({},c,this.core.s),this.core.s.zoom&&this.core.doCss()&&(this.init(),this.zoomabletimeout=!1,this.pageX=a(window).width()/2,this.pageY=a(window).height()/2+a(window).scrollTop()),this};d.prototype.init=function(){var b=this,c='<button type="button" aria-label="Zoom in" id="lg-zoom-in" class="lg-icon"></button><button type="button" aria-label="Zoom out" id="lg-zoom-out" class="lg-icon"></button>';b.core.s.actualSize&&(c+='<button type="button" aria-label="Actual size" id="lg-actual-size" class="lg-icon"></button>'),b.core.s.useLeftForZoom?b.core.$outer.addClass("lg-use-left-for-zoom"):b.core.$outer.addClass("lg-use-transition-for-zoom"),this.core.$outer.find(".lg-toolbar").append(c),b.core.$el.on("onSlideItemLoad.lg.tm.zoom",function(c,d,e){var f=b.core.s.enableZoomAfter+e;a("body").hasClass("lg-from-hash")&&e?f=0:a("body").removeClass("lg-from-hash"),b.zoomabletimeout=setTimeout(function(){b.core.$slide.eq(d).addClass("lg-zoomable")},f+30)});var d=1,e=function(c){var d,e,f=b.core.$outer.find(".lg-current .lg-image"),g=(a(window).width()-f.prop("offsetWidth"))/2,h=(a(window).height()-f.prop("offsetHeight"))/2+a(window).scrollTop();d=b.pageX-g,e=b.pageY-h;var i=(c-1)*d,j=(c-1)*e;f.css("transform","scale3d("+c+", "+c+", 1)").attr("data-scale",c),b.core.s.useLeftForZoom?f.parent().css({left:-i+"px",top:-j+"px"}).attr("data-x",i).attr("data-y",j):f.parent().css("transform","translate3d(-"+i+"px, -"+j+"px, 0)").attr("data-x",i).attr("data-y",j)},f=function(){d>1?b.core.$outer.addClass("lg-zoomed"):b.resetZoom(),d<1&&(d=1),e(d)},g=function(c,e,g,h){var i,j=e.prop("offsetWidth");i=b.core.s.dynamic?b.core.s.dynamicEl[g].width||e[0].naturalWidth||j:b.core.$items.eq(g).attr("data-width")||e[0].naturalWidth||j;var k;b.core.$outer.hasClass("lg-zoomed")?d=1:i>j&&(k=i/j,d=k||2),h?(b.pageX=a(window).width()/2,b.pageY=a(window).height()/2+a(window).scrollTop()):(b.pageX=c.pageX||c.originalEvent.targetTouches[0].pageX,b.pageY=c.pageY||c.originalEvent.targetTouches[0].pageY),f(),setTimeout(function(){b.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")},10)},h=!1;b.core.$el.on("onAferAppendSlide.lg.tm.zoom",function(a,c){var d=b.core.$slide.eq(c).find(".lg-image");d.on("dblclick",function(a){g(a,d,c)}),d.on("touchstart",function(a){h?(clearTimeout(h),h=null,g(a,d,c)):h=setTimeout(function(){h=null},300),a.preventDefault()})}),a(window).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom",function(){b.pageX=a(window).width()/2,b.pageY=a(window).height()/2+a(window).scrollTop(),e(d)}),a("#lg-zoom-out").on("click.lg",function(){b.core.$outer.find(".lg-current .lg-image").length&&(d-=b.core.s.scale,f())}),a("#lg-zoom-in").on("click.lg",function(){b.core.$outer.find(".lg-current .lg-image").length&&(d+=b.core.s.scale,f())}),a("#lg-actual-size").on("click.lg",function(a){g(a,b.core.$slide.eq(b.core.index).find(".lg-image"),b.core.index,!0)}),b.core.$el.on("onBeforeSlide.lg.tm",function(){d=1,b.resetZoom()}),b.zoomDrag(),b.zoomSwipe()},d.prototype.getCurrentTransform=function(a){if(!a)return 0;var b=window.getComputedStyle(a,null),c=b.getPropertyValue("-webkit-transform")||b.getPropertyValue("-moz-transform")||b.getPropertyValue("-ms-transform")||b.getPropertyValue("-o-transform")||b.getPropertyValue("transform")||"none";return"none"!==c?c.split("(")[1].split(")")[0].split(","):0},d.prototype.getCurrentRotation=function(a){if(!a)return 0;var b=this.getCurrentTransform(a);return b?Math.round(Math.atan2(b[1],b[0])*(180/Math.PI)):0},d.prototype.getModifier=function(a,b,c){var d=a;a=Math.abs(a);var e=this.getCurrentTransform(c);if(!e)return 1;var f=1;if("X"===b){var g=Math.sign(parseFloat(e[0]));0===a||180===a?f=1:90===a&&(f=-90===d&&1===g||90===d&&-1===g?-1:1),f*=g}else{var h=Math.sign(parseFloat(e[3]));if(0===a||180===a)f=1;else if(90===a){var i=parseFloat(e[1]),j=parseFloat(e[2]);f=Math.sign(i*j*d*h)}f*=h}return f},d.prototype.getImageSize=function(a,b,c){var d={y:"offsetHeight",x:"offsetWidth"};return 90===b&&(c="x"===c?"y":"x"),a.prop(d[c])},d.prototype.getDragCords=function(a,b){return 90===b?{x:a.pageY,y:a.pageX}:{x:a.pageX,y:a.pageY}},d.prototype.getSwipeCords=function(a,b){var c=a.originalEvent.targetTouches[0].pageX,d=a.originalEvent.targetTouches[0].pageY;return 90===b?{x:d,y:c}:{x:c,y:d}},d.prototype.getPossibleDragCords=function(a,b){var c=(this.core.$outer.find(".lg").height()-this.getImageSize(a,b,"y"))/2,d=Math.abs(this.getImageSize(a,b,"y")*Math.abs(a.attr("data-scale"))-this.core.$outer.find(".lg").height()+c),e=(this.core.$outer.find(".lg").width()-this.getImageSize(a,b,"x"))/2,f=Math.abs(this.getImageSize(a,b,"x")*Math.abs(a.attr("data-scale"))-this.core.$outer.find(".lg").width()+e);return 90===b?{minY:e,maxY:f,minX:c,maxX:d}:{minY:c,maxY:d,minX:e,maxX:f}},d.prototype.getDragAllowedAxises=function(a,b){var c=this.getImageSize(a,b,"y")*a.attr("data-scale")>this.core.$outer.find(".lg").height(),d=this.getImageSize(a,b,"x")*a.attr("data-scale")>this.core.$outer.find(".lg").width();return 90===b?{allowX:c,allowY:d}:{allowX:d,allowY:c}},d.prototype.resetZoom=function(){this.core.$outer.removeClass("lg-zoomed"),this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"),this.core.$slide.find(".lg-image").removeAttr("style data-scale"),this.pageX=a(window).width()/2,this.pageY=a(window).height()/2+a(window).scrollTop()},d.prototype.zoomSwipe=function(){var a,b=this,c={},d={},e=!1,f=!1,g=!1,h=0;b.core.$slide.on("touchstart.lg",function(d){if(b.core.$outer.hasClass("lg-zoomed")){var e=b.core.$slide.eq(b.core.index).find(".lg-object");a=b.core.$slide.eq(b.core.index).find(".lg-img-rotate")[0],h=b.getCurrentRotation(a);var i=b.getDragAllowedAxises(e,Math.abs(h));g=i.allowY,f=i.allowX,(f||g)&&(d.preventDefault(),c=b.getSwipeCords(d,Math.abs(h)))}}),b.core.$slide.on("touchmove.lg",function(i){if(b.core.$outer.hasClass("lg-zoomed")){var j,k,l=b.core.$slide.eq(b.core.index).find(".lg-img-wrap");i.preventDefault(),e=!0,d=b.getSwipeCords(i,Math.abs(h)),b.core.$outer.addClass("lg-zoom-dragging"),k=g?-Math.abs(l.attr("data-y"))+(d.y-c.y)*b.getModifier(h,"Y",a):-Math.abs(l.attr("data-y")),j=f?-Math.abs(l.attr("data-x"))+(d.x-c.x)*b.getModifier(h,"X",a):-Math.abs(l.attr("data-x")),(Math.abs(d.x-c.x)>15||Math.abs(d.y-c.y)>15)&&(b.core.s.useLeftForZoom?l.css({left:j+"px",top:k+"px"}):l.css("transform","translate3d("+j+"px, "+k+"px, 0)"))}}),b.core.$slide.on("touchend.lg",function(){b.core.$outer.hasClass("lg-zoomed")&&e&&(e=!1,b.core.$outer.removeClass("lg-zoom-dragging"),b.touchendZoom(c,d,f,g,h))})},d.prototype.zoomDrag=function(){var b,c=this,d={},e={},f=!1,g=!1,h=!1,i=!1,j=0;c.core.$slide.on("mousedown.lg.zoom",function(e){b=c.core.$slide.eq(c.core.index).find(".lg-img-rotate")[0],j=c.getCurrentRotation(b);var g=c.core.$slide.eq(c.core.index).find(".lg-object"),k=c.getDragAllowedAxises(g,Math.abs(j));i=k.allowY,h=k.allowX,c.core.$outer.hasClass("lg-zoomed")&&a(e.target).hasClass("lg-object")&&(h||i)&&(e.preventDefault(),d=c.getDragCords(e,Math.abs(j)),f=!0,c.core.$outer.scrollLeft+=1,c.core.$outer.scrollLeft-=1,c.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))}),a(window).on("mousemove.lg.zoom",function(a){if(f){var k,l,m=c.core.$slide.eq(c.core.index).find(".lg-img-wrap");g=!0,e=c.getDragCords(a,Math.abs(j)),c.core.$outer.addClass("lg-zoom-dragging"),l=i?-Math.abs(m.attr("data-y"))+(e.y-d.y)*c.getModifier(j,"Y",b):-Math.abs(m.attr("data-y")),k=h?-Math.abs(m.attr("data-x"))+(e.x-d.x)*c.getModifier(j,"X",b):-Math.abs(m.attr("data-x")),c.core.s.useLeftForZoom?m.css({left:k+"px",top:l+"px"}):m.css("transform","translate3d("+k+"px, "+l+"px, 0)")}}),a(window).on("mouseup.lg.zoom",function(a){f&&(f=!1,c.core.$outer.removeClass("lg-zoom-dragging"),!g||d.x===e.x&&d.y===e.y||(e=c.getDragCords(a,Math.abs(j)),c.touchendZoom(d,e,h,i,j)),g=!1),c.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")})},d.prototype.touchendZoom=function(a,b,c,d,e){var f=this,g=f.core.$slide.eq(f.core.index).find(".lg-img-wrap"),h=f.core.$slide.eq(f.core.index).find(".lg-object"),i=f.core.$slide.eq(f.core.index).find(".lg-img-rotate")[0],j=-Math.abs(g.attr("data-x"))+(b.x-a.x)*f.getModifier(e,"X",i),k=-Math.abs(g.attr("data-y"))+(b.y-a.y)*f.getModifier(e,"Y",i),l=f.getPossibleDragCords(h,Math.abs(e));(Math.abs(b.x-a.x)>15||Math.abs(b.y-a.y)>15)&&(d&&(k<=-l.maxY?k=-l.maxY:k>=-l.minY&&(k=-l.minY)),c&&(j<=-l.maxX?j=-l.maxX:j>=-l.minX&&(j=-l.minX)),d?g.attr("data-y",Math.abs(k)):k=-Math.abs(g.attr("data-y")),c?g.attr("data-x",Math.abs(j)):j=-Math.abs(g.attr("data-x")),f.core.s.useLeftForZoom?g.css({left:j+"px",top:k+"px"}):g.css("transform","translate3d("+j+"px, "+k+"px, 0)"))},d.prototype.destroy=function(){var b=this;b.core.$el.off(".lg.zoom"),a(window).off(".lg.zoom"),b.core.$slide.off(".lg.zoom"),b.core.$el.off(".lg.tm.zoom"),b.resetZoom(),clearTimeout(b.zoomabletimeout),b.zoomabletimeout=!1},a.fn.lightGallery.modules.zoom=d}()});