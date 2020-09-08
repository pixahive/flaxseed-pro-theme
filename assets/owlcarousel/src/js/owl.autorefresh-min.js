/**
 * AutoRefresh Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(t,e,i,s){var o=function(e){this._core=e,this._interval=null,this._visible=null,this._handlers={"initialized.owl.carousel":t.proxy((function(t){t.namespace&&this._core.settings.autoRefresh&&this.watch()}),this)},this._core.options=t.extend({},o.Defaults,this._core.options),this._core.$element.on(this._handlers)};o.Defaults={autoRefresh:!0,autoRefreshInterval:500},o.prototype.watch=function(){this._interval||(this._visible=this._core.isVisible(),this._interval=e.setInterval(t.proxy(this.refresh,this),this._core.settings.autoRefreshInterval))},o.prototype.refresh=function(){this._core.isVisible()!==this._visible&&(this._visible=!this._visible,this._core.$element.toggleClass("owl-hidden",!this._visible),this._visible&&this._core.invalidate("width")&&this._core.refresh())},o.prototype.destroy=function(){var t,i;for(t in e.clearInterval(this._interval),this._handlers)this._core.$element.off(t,this._handlers[t]);for(i in Object.getOwnPropertyNames(this))"function"!=typeof this[i]&&(this[i]=null)},t.fn.owlCarousel.Constructor.Plugins.AutoRefresh=o}(window.Zepto||window.jQuery,window,document);