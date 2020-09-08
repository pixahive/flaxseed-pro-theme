/**
 * Support Plugin
 *
 * @version 2.3.4
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(n,i,t,o){var r=n("<support>").get(0).style,a="Webkit Moz O ms".split(" "),e={transition:{end:{WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",transition:"transitionend"}},animation:{end:{WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd",animation:"animationend"}}},s=function(){return!!m("transform")},u=function(){return!!m("perspective")},p=function(){return!!m("animation")};function m(i,t){var e=!1,s=i.charAt(0).toUpperCase()+i.slice(1);return n.each((i+" "+a.join(s+" ")+s).split(" "),(function(n,i){if(r[i]!==o)return e=!t||i,!1})),e}function d(n){return m(n,!0)}(function(){return!!m("transition")})()&&(n.support.transition=new String(d("transition")),n.support.transition.end=e.transition.end[n.support.transition]),p()&&(n.support.animation=new String(d("animation")),n.support.animation.end=e.animation.end[n.support.animation]),s()&&(n.support.transform=new String(d("transform")),n.support.transform3d=u())}(window.Zepto||window.jQuery,window,document);