<script>
!function(t){var e,i,r="center",n="left",s="right",a={auto:"auto"};function h(e){this.$element=t(e),this.original_text=this.$element.html(),this.settings=t.extend({},t.fn.trunk8.defaults)}function o(){var e,r,n,s,h=this.data("trunk8"),o=h.settings,l=o.width,u=o.side,c=o.fill,f=i.getLineHeight(this)*o.lines,g=h.original_text,d=g.length,p="";if(this.html(g),l===a.auto){if(this.height()<=f)return;for(e=0,r=d-1;e<=r;)n=e+(r-e>>1),s=i.eatStr(g,u,d-n,c),this.html(s),this.height()>f?r=n-1:(e=n+1,p=p.length>s.length?p:s);this.html(""),this.html(p),o.tooltip&&this.attr("title",g)}else isNaN(l)?t.error('Invalid width "'+l+'".'):(n=d-l,s=i.eatStr(g,u,n,c),this.html(s),o.tooltip&&this.attr("title",g))}h.prototype.updateSettings=function(e){this.settings=t.extend(this.settings,e)},e={init:function(e){return this.each(function(){var i=t(this),r=i.data("trunk8");r||i.data("trunk8",r=new h(this)),r.updateSettings(e),o.call(i)})},update:function(e){return this.each(function(){var i=t(this);e&&(i.data("trunk8").original_text=e),o.call(i)})},revert:function(){return this.each(function(){var e=t(this).data("trunk8").original_text;t(this).html(e)})},getSettings:function(){return this.get(0).data("trunk8").settings}},(i={eatStr:function(e,a,h,o){var l,u,c=e.length,f=i.eatStr.generateKey.apply(null,arguments);if(i.eatStr.cache[f])return i.eatStr.cache[f];if("string"==typeof e&&0!==c||t.error('Invalid source string "'+e+'".'),h<0||h>c)t.error('Invalid bite size "'+h+'".');else if(0===h)return e;switch("string"!=typeof(o+"")&&t.error("Fill unable to be converted to a string."),a){case s:return i.eatStr.cache[f]=t.trim(e.substr(0,c-h))+o;case n:return i.eatStr.cache[f]=o+t.trim(e.substr(h));case r:return l=c>>1,u=h>>1,i.eatStr.cache[f]=t.trim(i.eatStr(e.substr(0,c-l),s,h-u,""))+o+t.trim(i.eatStr(e.substr(c-l),n,u,""));default:t.error('Invalid side "'+a+'".')}},getLineHeight:function(e){var i,r=t(e),n=r.css("float"),s=r.css("position"),a=r.html();return"none"!==n&&r.css("float","none"),"absolute"===s&&r.css("position","static"),r.html("i").wrap('<div id="line-height-test" />'),i=t("#line-height-test").innerHeight(),r.html(a).css({float:n,position:s}).unwrap(),i}}).eatStr.cache={},i.eatStr.generateKey=function(){return Array.prototype.join.call(arguments,"")},t.fn.trunk8=function(i){return e[i]?e[i].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof i&&i?void t.error("Method "+i+" does not exist on jQuery.trunk8"):e.init.apply(this,arguments)},t.fn.trunk8.defaults={fill:"&hellip;",lines:1,side:s,tooltip:!0,width:a.auto}}(jQuery);
</script>
