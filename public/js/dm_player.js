/*! @vimeo/player v2.10.0 | (c) 2019 Vimeo | MIT License | https://github.com/vimeo/player.js */ ! function(e, t) { "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : ((e = e || self).Vimeo = e.Vimeo || {}, e.Vimeo.Player = t()) }(this, function() { "use strict";

    function r(e, t) { for (var n = 0; n < t.length; n++) { var r = t[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r) } } var e = "undefined" != typeof global && "[object global]" === {}.toString.call(global);

    function i(e, t) { return 0 === e.indexOf(t.toLowerCase()) ? e : "".concat(t.toLowerCase()).concat(e.substr(0, 1).toUpperCase()).concat(e.substr(1)) }

    function s(e) { return /^(https?:)?\/\/((player|www)\.)?vimeo\.com(?=$|\/)/.test(e) }

    function l() { var e, t = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {},
            n = t.id,
            r = t.url,
            o = n || r; if (!o) throw new Error("An id or url must be passed, either in an options object or as a data-vimeo-id or data-vimeo-url attribute."); if (e = o, !isNaN(parseFloat(e)) && isFinite(e) && Math.floor(e) == e) return "https://vimeo.com/".concat(o); if (s(o)) return o.replace("http:", "https:"); if (n) throw new TypeError("â€œ".concat(n, "â€ is not a valid video id.")); throw new TypeError("â€œ".concat(o, "â€ is not a vimeo.com url.")) } var t = void 0 !== Array.prototype.indexOf,
        n = "undefined" != typeof window && void 0 !== window.postMessage; if (!(e || t && n)) throw new Error("Sorry, the Vimeo Player API is not available in this browser."); var o = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : {};! function(e) { if (!e.WeakMap) { var n = Object.prototype.hasOwnProperty,
                o = function(e, t, n) { Object.defineProperty ? Object.defineProperty(e, t, { configurable: !0, writable: !0, value: n }) : e[t] = n };
            e.WeakMap = function() {
                function e() { if (void 0 === this) throw new TypeError("Constructor WeakMap requires 'new'"); if (o(this, "_id", "_WeakMap" + "_" + t() + "." + t()), 0 < arguments.length) throw new TypeError("WeakMap iterable is not supported") }

                function r(e, t) { if (!i(e) || !n.call(e, "_id")) throw new TypeError(t + " method called on incompatible receiver " + typeof e) }

                function t() { return Math.random().toString().substring(2) } return o(e.prototype, "delete", function(e) { if (r(this, "delete"), !i(e)) return !1; var t = e[this._id]; return !(!t || t[0] !== e) && (delete e[this._id], !0) }), o(e.prototype, "get", function(e) { if (r(this, "get"), i(e)) { var t = e[this._id]; return t && t[0] === e ? t[1] : void 0 } }), o(e.prototype, "has", function(e) { if (r(this, "has"), !i(e)) return !1; var t = e[this._id]; return !(!t || t[0] !== e) }), o(e.prototype, "set", function(e, t) { if (r(this, "set"), !i(e)) throw new TypeError("Invalid value used as weak map key"); var n = e[this._id]; return n && n[0] === e ? n[1] = t : o(e, this._id, [e, t]), this }), o(e, "_polyfill", !0), e }() }

        function i(e) { return Object(e) === e } }("undefined" != typeof self ? self : "undefined" != typeof window ? window : o); var a, f = (function(e) { var t, n, r;
            r = function() { var t, a, n, e = Object.prototype.toString,
                    r = "undefined" != typeof setImmediate ? function(e) { return setImmediate(e) } : setTimeout; try { Object.defineProperty({}, "x", {}), t = function(e, t, n, r) { return Object.defineProperty(e, t, { value: n, writable: !0, configurable: !1 !== r }) } } catch (e) { t = function(e, t, n) { return e[t] = n, e } }

                function i(e, t) { n.add(e, t), a || (a = r(n.drain)) }

                function u(e) { var t, n = typeof e; return null == e || "object" != n && "function" != n || (t = e.then), "function" == typeof t && t }

                function c() { for (var e = 0; e < this.chain.length; e++) o(this, 1 === this.state ? this.chain[e].success : this.chain[e].failure, this.chain[e]);
                    this.chain.length = 0 }

                function o(e, t, n) { var r, o; try {!1 === t ? n.reject(e.msg) : (r = !0 === t ? e.msg : t.call(void 0, e.msg)) === n.promise ? n.reject(TypeError("Promise-chain cycle")) : (o = u(r)) ? o.call(r, n.resolve, n.reject) : n.resolve(r) } catch (e) { n.reject(e) } }

                function s(e) { var t = this;
                    t.triggered || (t.triggered = !0, t.def && (t = t.def), t.msg = e, t.state = 2, 0 < t.chain.length && i(c, t)) }

                function l(e, n, r, o) { for (var t = 0; t < n.length; t++) ! function(t) { e.resolve(n[t]).then(function(e) { r(t, e) }, o) }(t) }

                function f(e) { this.def = e, this.triggered = !1 }

                function d(e) { this.promise = e, this.state = 0, this.triggered = !1, this.chain = [], this.msg = void 0 }

                function h(e) { if ("function" != typeof e) throw TypeError("Not a function"); if (0 !== this.__NPO__) throw TypeError("Not a promise");
                    this.__NPO__ = 1; var r = new d(this);
                    this.then = function(e, t) { var n = { success: "function" != typeof e || e, failure: "function" == typeof t && t }; return n.promise = new this.constructor(function(e, t) { if ("function" != typeof e || "function" != typeof t) throw TypeError("Not a function");
                            n.resolve = e, n.reject = t }), r.chain.push(n), 0 !== r.state && i(c, r), n.promise }, this.catch = function(e) { return this.then(void 0, e) }; try { e.call(void 0, function(e) {
                            (function e(n) { var r, o = this; if (!o.triggered) { o.triggered = !0, o.def && (o = o.def); try {
                                        (r = u(n)) ? i(function() { var t = new f(o); try { r.call(n, function() { e.apply(t, arguments) }, function() { s.apply(t, arguments) }) } catch (e) { s.call(t, e) } }): (o.msg = n, o.state = 1, 0 < o.chain.length && i(c, o)) } catch (e) { s.call(new f(o), e) } } }).call(r, e) }, function(e) { s.call(r, e) }) } catch (e) { s.call(r, e) } }
                n = function() { var n, r, o;

                    function i(e, t) { this.fn = e, this.self = t, this.next = void 0 } return { add: function(e, t) { o = new i(e, t), r ? r.next = o : n = o, r = o, o = void 0 }, drain: function() { var e = n; for (n = r = a = void 0; e;) e.fn.call(e.self), e = e.next } } }(); var v = t({}, "constructor", h, !1); return t(h.prototype = v, "__NPO__", 0, !1), t(h, "resolve", function(n) { return n && "object" == typeof n && 1 === n.__NPO__ ? n : new this(function(e, t) { if ("function" != typeof e || "function" != typeof t) throw TypeError("Not a function");
                        e(n) }) }), t(h, "reject", function(n) { return new this(function(e, t) { if ("function" != typeof e || "function" != typeof t) throw TypeError("Not a function");
                        t(n) }) }), t(h, "all", function(t) { var a = this; return "[object Array]" != e.call(t) ? a.reject(TypeError("Not an array")) : 0 === t.length ? a.resolve([]) : new a(function(n, e) { if ("function" != typeof n || "function" != typeof e) throw TypeError("Not a function"); var r = t.length,
                            o = Array(r),
                            i = 0;
                        l(a, t, function(e, t) { o[e] = t, ++i === r && n(o) }, e) }) }), t(h, "race", function(t) { var r = this; return "[object Array]" != e.call(t) ? r.reject(TypeError("Not an array")) : new r(function(n, e) { if ("function" != typeof n || "function" != typeof e) throw TypeError("Not a function");
                        l(r, t, function(e, t) { n(t) }, e) }) }), h }, (n = o)[t = "Promise"] = n[t] || r(), e.exports && (e.exports = n[t]) }(a = { exports: {} }, a.exports), a.exports),
        d = new WeakMap;

    function u(e, t, n) { var r = d.get(e.element) || {};
        t in r || (r[t] = []), r[t].push(n), d.set(e.element, r) }

    function c(e, t) { return (d.get(e.element) || {})[t] || [] }

    function h(e, t, n) { var r = d.get(e.element) || {}; if (!r[t]) return !0; if (!n) return r[t] = [], d.set(e.element, r), !0; var o = r[t].indexOf(n); return -1 !== o && r[t].splice(o, 1), d.set(e.element, r), r[t] && 0 === r[t].length } var v = ["autopause", "autoplay", "background", "byline", "color", "controls", "dnt", "height", "id", "loop", "maxheight", "maxwidth", "muted", "playsinline", "portrait", "responsive", "speed", "texttrack", "title", "transparent", "url", "width"];

    function p(r) { var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}; return v.reduce(function(e, t) { var n = r.getAttribute("data-vimeo-".concat(t)); return (n || "" === n) && (e[t] = "" === n ? 1 : n), e }, e) }

    function y(e, t) { var n = e.html; if (!t) throw new TypeError("An element must be provided"); if (null !== t.getAttribute("data-vimeo-initialized")) return t.querySelector("iframe"); var r = document.createElement("div"); return r.innerHTML = n, t.appendChild(r.firstChild), t.setAttribute("data-vimeo-initialized", "true"), t.querySelector("iframe") }

    function m(i) { var a = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
            u = 2 < arguments.length ? arguments[2] : void 0; return new Promise(function(t, n) { if (!s(i)) throw new TypeError("â€œ".concat(i, "â€ is not a vimeo.com url.")); var e = "https://vimeo.com/api/oembed.json?url=".concat(encodeURIComponent(i)); for (var r in a) a.hasOwnProperty(r) && (e += "&".concat(r, "=").concat(encodeURIComponent(a[r]))); var o = "XDomainRequest" in window ? new XDomainRequest : new XMLHttpRequest;
            o.open("GET", e, !0), o.onload = function() { if (404 !== o.status)
                    if (403 !== o.status) try { var e = JSON.parse(o.responseText); if (403 === e.domain_status_code) return y(e, u), void n(new Error("â€œ".concat(i, "â€ is not embeddable.")));
                        t(e) } catch (e) { n(e) } else n(new Error("â€œ".concat(i, "â€ is not embeddable.")));
                    else n(new Error("â€œ".concat(i, "â€ was not found."))) }, o.onerror = function() { var e = o.status ? " (".concat(o.status, ")") : "";
                n(new Error("There was an error fetching the embed code from Vimeo".concat(e, "."))) }, o.send() }) }

    function g(e) { if ("string" == typeof e) try { e = JSON.parse(e) } catch (e) { return console.warn(e), {} }
        return e }

    function w(e, t, n) { if (e.element.contentWindow && e.element.contentWindow.postMessage) { var r = { method: t };
            void 0 !== n && (r.value = n); var o = parseFloat(navigator.userAgent.toLowerCase().replace(/^.*msie (\d+).*$/, "$1"));
            8 <= o && o < 10 && (r = JSON.stringify(r)), e.element.contentWindow.postMessage(r, e.origin) } }

    function b(n, r) { var t, e = []; if ((r = g(r)).event) { if ("error" === r.event) c(n, r.data.method).forEach(function(e) { var t = new Error(r.data.message);
                t.name = r.data.name, e.reject(t), h(n, r.data.method, e) });
            e = c(n, "event:".concat(r.event)), t = r.data } else if (r.method) { var o = function(e, t) { var n = c(e, t); if (n.length < 1) return !1; var r = n.shift(); return h(e, t, r), r }(n, r.method);
            o && (e.push(o), t = r.value) }
        e.forEach(function(e) { try { if ("function" == typeof e) return void e.call(n, t);
                e.resolve(t) } catch (e) {} }) } var k = new WeakMap,
        E = new WeakMap,
        Player = function() {
            function Player(u) { var e, c = this,
                    n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}; if (function(e, t) { if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function") }(this, Player), window.jQuery && u instanceof jQuery && (1 < u.length && window.console && console.warn && console.warn("A jQuery object with multiple elements was passed, using the first element."), u = u[0]), "undefined" != typeof document && "string" == typeof u && (u = document.getElementById(u)), e = u, !Boolean(e && 1 === e.nodeType && "nodeName" in e && e.ownerDocument && e.ownerDocument.defaultView)) throw new TypeError("You must pass either a valid element or a valid id."); var r = u.ownerDocument.defaultView; if ("IFRAME" !== u.nodeName) { var t = u.querySelector("iframe");
                    t && (u = t) } if ("IFRAME" === u.nodeName && !s(u.getAttribute("src") || "")) throw new Error("The player element passed isnâ€™t a Vimeo embed."); if (k.has(u)) return k.get(u);
                this.element = u, this.origin = "*"; var o = new f(function(i, a) { var e = function(e) { if (s(e.origin) && c.element.contentWindow === e.source) { "*" === c.origin && (c.origin = e.origin); var t = g(e.data); if (t && "error" === t.event && t.data && "ready" === t.data.method) { var n = new Error(t.data.message); return n.name = t.data.name, void a(n) } var r = t && "ready" === t.event,
                                o = t && "ping" === t.method; if (r || o) return c.element.setAttribute("data-ready", "true"), void i();
                            b(c, t) } }; if (r.addEventListener ? r.addEventListener("message", e, !1) : r.attachEvent && r.attachEvent("onmessage", e), "IFRAME" !== c.element.nodeName) { var t = p(u, n);
                        m(l(t), t, u).then(function(e) { var t, n, r, o = y(e, u); return c.element = o, c._originalElement = u, t = u, n = o, r = d.get(t), d.set(n, r), d.delete(t), k.set(c.element, c), e }).catch(a) } }); return E.set(this, o), k.set(this.element, this), "IFRAME" === this.element.nodeName && w(this, "ping"), this } var e, t, n; return e = Player, (t = [{ key: "callMethod", value: function(n) { var r = this,
                        o = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}; return new f(function(e, t) { return r.ready().then(function() { u(r, n, { resolve: e, reject: t }), w(r, n, o) }).catch(t) }) } }, { key: "get", value: function(n) { var r = this; return new f(function(e, t) { return n = i(n, "get"), r.ready().then(function() { u(r, n, { resolve: e, reject: t }), w(r, n) }).catch(t) }) } }, { key: "set", value: function(n, r) { var o = this; return new f(function(e, t) { if (n = i(n, "set"), null == r) throw new TypeError("There must be a value to set."); return o.ready().then(function() { u(o, n, { resolve: e, reject: t }), w(o, n, r) }).catch(t) }) } }, { key: "on", value: function(e, t) { if (!e) throw new TypeError("You must pass an event name."); if (!t) throw new TypeError("You must pass a callback function."); if ("function" != typeof t) throw new TypeError("The callback must be a function.");
                    0 === c(this, "event:".concat(e)).length && this.callMethod("addEventListener", e).catch(function() {}), u(this, "event:".concat(e), t) } }, { key: "off", value: function(e, t) { if (!e) throw new TypeError("You must pass an event name."); if (t && "function" != typeof t) throw new TypeError("The callback must be a function.");
                    h(this, "event:".concat(e), t) && this.callMethod("removeEventListener", e).catch(function(e) {}) } }, { key: "loadVideo", value: function(e) { return this.callMethod("loadVideo", e) } }, { key: "ready", value: function() { var e = E.get(this) || new f(function(e, t) { t(new Error("Unknown player. Probably unloaded.")) }); return f.resolve(e) } }, { key: "addCuePoint", value: function(e) { var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {}; return this.callMethod("addCuePoint", { time: e, data: t }) } }, { key: "removeCuePoint", value: function(e) { return this.callMethod("removeCuePoint", e) } }, { key: "enableTextTrack", value: function(e, t) { if (!e) throw new TypeError("You must pass a language."); return this.callMethod("enableTextTrack", { language: e, kind: t }) } }, { key: "disableTextTrack", value: function() { return this.callMethod("disableTextTrack") } }, { key: "pause", value: function() { return this.callMethod("pause") } }, { key: "play", value: function() { return this.callMethod("play") } }, { key: "unload", value: function() { return this.callMethod("unload") } }, { key: "destroy", value: function() { var t = this; return new f(function(e) { E.delete(t), k.delete(t.element), t._originalElement && (k.delete(t._originalElement), t._originalElement.removeAttribute("data-vimeo-initialized")), t.element && "IFRAME" === t.element.nodeName && t.element.parentNode && t.element.parentNode.removeChild(t.element), e() }) } }, { key: "getAutopause", value: function() { return this.get("autopause") } }, { key: "setAutopause", value: function(e) { return this.set("autopause", e) } }, { key: "getBuffered", value: function() { return this.get("buffered") } }, { key: "getColor", value: function() { return this.get("color") } }, { key: "setColor", value: function(e) { return this.set("color", e) } }, { key: "getCuePoints", value: function() { return this.get("cuePoints") } }, { key: "getCurrentTime", value: function() { return this.get("currentTime") } }, { key: "setCurrentTime", value: function(e) { return this.set("currentTime", e) } }, { key: "getDuration", value: function() { return this.get("duration") } }, { key: "getEnded", value: function() { return this.get("ended") } }, { key: "getLoop", value: function() { return this.get("loop") } }, { key: "setLoop", value: function(e) { return this.set("loop", e) } }, { key: "setMuted", value: function(e) { return this.set("muted", e) } }, { key: "getMuted", value: function() { return this.get("muted") } }, { key: "getPaused", value: function() { return this.get("paused") } }, { key: "getPlaybackRate", value: function() { return this.get("playbackRate") } }, { key: "setPlaybackRate", value: function(e) { return this.set("playbackRate", e) } }, { key: "getPlayed", value: function() { return this.get("played") } }, { key: "getSeekable", value: function() { return this.get("seekable") } }, { key: "getSeeking", value: function() { return this.get("seeking") } }, { key: "getTextTracks", value: function() { return this.get("textTracks") } }, { key: "getVideoEmbedCode", value: function() { return this.get("videoEmbedCode") } }, { key: "getVideoId", value: function() { return this.get("videoId") } }, { key: "getVideoTitle", value: function() { return this.get("videoTitle") } }, { key: "getVideoWidth", value: function() { return this.get("videoWidth") } }, { key: "getVideoHeight", value: function() { return this.get("videoHeight") } }, { key: "getVideoUrl", value: function() { return this.get("videoUrl") } }, { key: "getVolume", value: function() { return this.get("volume") } }, { key: "setVolume", value: function(e) { return this.set("volume", e) } }]) && r(e.prototype, t), n && r(e, n), Player }(); return e || (function() { var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : document,
            t = [].slice.call(e.querySelectorAll("[data-vimeo-id], [data-vimeo-url]")),
            n = function(e) { "console" in window && console.error && console.error("There was an error creating an embed: ".concat(e)) };
        t.forEach(function(t) { try { if (null !== t.getAttribute("data-vimeo-defer")) return; var e = p(t);
                m(l(e), e, t).then(function(e) { return y(e, t) }).catch(n) } catch (e) { n(e) } }) }(), function() { var r = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : document; if (!window.VimeoPlayerResizeEmbeds_) { window.VimeoPlayerResizeEmbeds_ = !0; var e = function(e) { if (s(e.origin) && e.data && "spacechange" === e.data.event)
                    for (var t = r.querySelectorAll("iframe"), n = 0; n < t.length; n++)
                        if (t[n].contentWindow === e.source) { t[n].parentElement.style.paddingBottom = "".concat(e.data.data[0].bottom, "px"); break } };
            window.addEventListener ? window.addEventListener("message", e, !1) : window.attachEvent && window.attachEvent("onmessage", e) } }()), Player });