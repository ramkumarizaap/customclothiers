/* jQuery v1.10.0 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license
//@ sourceMappingURL=jquery-1.10.0.min.map
*/
(function(e, t) {
    var n, r, i = typeof t,
        o = e.location,
        a = e.document,
        s = a.documentElement,
        l = e.jQuery,
        u = e.$,
        c = {},
        p = [],
        f = "1.10.0",
        d = p.concat,
        h = p.push,
        g = p.slice,
        m = p.indexOf,
        y = c.toString,
        v = c.hasOwnProperty,
        b = f.trim,
        x = function(e, t) {
            return new x.fn.init(e, t, r)
        },
        w = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        T = /\S+/g,
        C = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        N = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
        k = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        E = /^[\],:{}\s]*$/,
        S = /(?:^|:|,)(?:\s*\[)+/g,
        A = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
        j = /"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,
        D = /^-ms-/,
        L = /-([\da-z])/gi,
        H = function(e, t) {
            return t.toUpperCase()
        },
        q = function(e) {
            (a.addEventListener || "load" === e.type || "complete" === a.readyState) && (_(), x.ready())
        },
        _ = function() {
            a.addEventListener ? (a.removeEventListener("DOMContentLoaded", q, !1), e.removeEventListener("load", q, !1)) : (a.detachEvent("onreadystatechange", q), e.detachEvent("onload", q))
        };
    x.fn = x.prototype = {
        jquery: f,
        constructor: x,
        init: function(e, n, r) {
            var i, o;
            if (!e) {
                return this
            }
            if ("string" == typeof e) {
                if (i = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : N.exec(e), !i || !i[1] && n) {
                    return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e)
                }
                if (i[1]) {
                    if (n = n instanceof x ? n[0] : n, x.merge(this, x.parseHTML(i[1], n && n.nodeType ? n.ownerDocument || n : a, !0)), k.test(i[1]) && x.isPlainObject(n)) {
                        for (i in n) {
                            x.isFunction(this[i]) ? this[i](n[i]) : this.attr(i, n[i])
                        }
                    }
                    return this
                }
                if (o = a.getElementById(i[2]), o && o.parentNode) {
                    if (o.id !== i[2]) {
                        return r.find(e)
                    }
                    this.length = 1, this[0] = o
                }
                return this.context = a, this.selector = e, this
            }
            return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : x.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), x.makeArray(e, this))
        },
        selector: "",
        length: 0,
        toArray: function() {
            return g.call(this)
        },
        get: function(e) {
            return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
        },
        pushStack: function(e) {
            var t = x.merge(this.constructor(), e);
            return t.prevObject = this, t.context = this.context, t
        },
        each: function(e, t) {
            return x.each(this, e, t)
        },
        ready: function(e) {
            return x.ready.promise().done(e), this
        },
        slice: function() {
            return this.pushStack(g.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq(-1)
        },
        eq: function(e) {
            var t = this.length,
                n = +e + (0 > e ? t : 0);
            return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
        },
        map: function(e) {
            return this.pushStack(x.map(this, function(t, n) {
                return e.call(t, n, t)
            }))
        },
        end: function() {
            return this.prevObject || this.constructor(null)
        },
        push: h,
        sort: [].sort,
        splice: [].splice
    }, x.fn.init.prototype = x.fn, x.extend = x.fn.extend = function() {
        var e, n, r, i, o, a, s = arguments[0] || {},
            l = 1,
            u = arguments.length,
            c = !1;
        for ("boolean" == typeof s && (c = s, s = arguments[1] || {}, l = 2), "object" == typeof s || x.isFunction(s) || (s = {}), u === l && (s = this, --l); u > l; l++) {
            if (null != (o = arguments[l])) {
                for (i in o) {
                    e = s[i], r = o[i], s !== r && (c && r && (x.isPlainObject(r) || (n = x.isArray(r))) ? (n ? (n = !1, a = e && x.isArray(e) ? e : []) : a = e && x.isPlainObject(e) ? e : {}, s[i] = x.extend(c, a, r)) : r !== t && (s[i] = r))
                }
            }
        }
        return s
    }, x.extend({
        expando: "jQuery" + (f + Math.random()).replace(/\D/g, ""),
        noConflict: function(t) {
            return e.$ === x && (e.$ = u), t && e.jQuery === x && (e.jQuery = l), x
        },
        isReady: !1,
        readyWait: 1,
        holdReady: function(e) {
            e ? x.readyWait++ : x.ready(!0)
        },
        ready: function(e) {
            if (e === !0 ? !--x.readyWait : !x.isReady) {
                if (!a.body) {
                    return setTimeout(x.ready)
                }
                x.isReady = !0, e !== !0 && --x.readyWait > 0 || (n.resolveWith(a, [x]), x.fn.trigger && x(a).trigger("ready").off("ready"))
            }
        },
        isFunction: function(e) {
            return "function" === x.type(e)
        },
        isArray: Array.isArray || function(e) {
            return "array" === x.type(e)
        },
        isWindow: function(e) {
            return null != e && e == e.window
        },
        isNumeric: function(e) {
            return !isNaN(parseFloat(e)) && isFinite(e)
        },
        type: function(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? c[y.call(e)] || "object" : typeof e
        },
        isPlainObject: function(e) {
            var n;
            if (!e || "object" !== x.type(e) || e.nodeType || x.isWindow(e)) {
                return !1
            }
            try {
                if (e.constructor && !v.call(e, "constructor") && !v.call(e.constructor.prototype, "isPrototypeOf")) {
                    return !1
                }
            } catch (r) {
                return !1
            }
            if (x.support.ownLast) {
                for (n in e) {
                    return v.call(e, n)
                }
            }
            for (n in e) {}
            return n === t || v.call(e, n)
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) {
                return !1
            }
            return !0
        },
        error: function(e) {
            throw Error(e)
        },
        parseHTML: function(e, t, n) {
            if (!e || "string" != typeof e) {
                return null
            }
            "boolean" == typeof t && (n = t, t = !1), t = t || a;
            var r = k.exec(e),
                i = !n && [];
            return r ? [t.createElement(r[1])] : (r = x.buildFragment([e], t, i), i && x(i).remove(), x.merge([], r.childNodes))
        },
        parseJSON: function(n) {
            return e.JSON && e.JSON.parse ? e.JSON.parse(n) : null === n ? n : "string" == typeof n && (n = x.trim(n), n && E.test(n.replace(A, "@").replace(j, "]").replace(S, ""))) ? Function("return " + n)() : (x.error("Invalid JSON: " + n), t)
        },
        parseXML: function(n) {
            var r, i;
            if (!n || "string" != typeof n) {
                return null
            }
            try {
                e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
            } catch (o) {
                r = t
            }
            return r && r.documentElement && !r.getElementsByTagName("parsererror").length || x.error("Invalid XML: " + n), r
        },
        noop: function() {},
        globalEval: function(t) {
            t && x.trim(t) && (e.execScript || function(t) {
                e.eval.call(e, t)
            })(t)
        },
        camelCase: function(e) {
            return e.replace(D, "ms-").replace(L, H)
        },
        nodeName: function(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
        },
        each: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                a = M(e);
            if (n) {
                if (a) {
                    for (; o > i; i++) {
                        if (r = t.apply(e[i], n), r === !1) {
                            break
                        }
                    }
                } else {
                    for (i in e) {
                        if (r = t.apply(e[i], n), r === !1) {
                            break
                        }
                    }
                }
            } else {
                if (a) {
                    for (; o > i; i++) {
                        if (r = t.call(e[i], i, e[i]), r === !1) {
                            break
                        }
                    }
                } else {
                    for (i in e) {
                        if (r = t.call(e[i], i, e[i]), r === !1) {
                            break
                        }
                    }
                }
            }
            return e
        },
        trim: b && !b.call("\ufeff\u00a0") ? function(e) {
            return null == e ? "" : b.call(e)
        } : function(e) {
            return null == e ? "" : (e + "").replace(C, "")
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (M(Object(e)) ? x.merge(n, "string" == typeof e ? [e] : e) : h.call(n, e)), n
        },
        inArray: function(e, t, n) {
            var r;
            if (t) {
                if (m) {
                    return m.call(t, e, n)
                }
                for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++) {
                    if (n in t && t[n] === e) {
                        return n
                    }
                }
            }
            return -1
        },
        merge: function(e, n) {
            var r = n.length,
                i = e.length,
                o = 0;
            if ("number" == typeof r) {
                for (; r > o; o++) {
                    e[i++] = n[o]
                }
            } else {
                while (n[o] !== t) {
                    e[i++] = n[o++]
                }
            }
            return e.length = i, e
        },
        grep: function(e, t, n) {
            var r, i = [],
                o = 0,
                a = e.length;
            for (n = !!n; a > o; o++) {
                r = !!t(e[o], o), n !== r && i.push(e[o])
            }
            return i
        },
        map: function(e, t, n) {
            var r, i = 0,
                o = e.length,
                a = M(e),
                s = [];
            if (a) {
                for (; o > i; i++) {
                    r = t(e[i], i, n), null != r && (s[s.length] = r)
                }
            } else {
                for (i in e) {
                    r = t(e[i], i, n), null != r && (s[s.length] = r)
                }
            }
            return d.apply([], s)
        },
        guid: 1,
        proxy: function(e, n) {
            var r, i, o;
            return "string" == typeof n && (o = e[n], n = e, e = o), x.isFunction(e) ? (r = g.call(arguments, 2), i = function() {
                return e.apply(n || this, r.concat(g.call(arguments)))
            }, i.guid = e.guid = e.guid || x.guid++, i) : t
        },
        access: function(e, n, r, i, o, a, s) {
            var l = 0,
                u = e.length,
                c = null == r;
            if ("object" === x.type(r)) {
                o = !0;
                for (l in r) {
                    x.access(e, n, l, r[l], !0, a, s)
                }
            } else {
                if (i !== t && (o = !0, x.isFunction(i) || (s = !0), c && (s ? (n.call(e, i), n = null) : (c = n, n = function(e, t, n) {
                        return c.call(x(e), n)
                    })), n)) {
                    for (; u > l; l++) {
                        n(e[l], r, s ? i : i.call(e[l], l, n(e[l], r)))
                    }
                }
            }
            return o ? e : c ? n.call(e) : u ? n(e[0], r) : a
        },
        now: function() {
            return (new Date).getTime()
        },
        swap: function(e, t, n, r) {
            var i, o, a = {};
            for (o in t) {
                a[o] = e.style[o], e.style[o] = t[o]
            }
            i = n.apply(e, r || []);
            for (o in t) {
                e.style[o] = a[o]
            }
            return i
        }
    }), x.ready.promise = function(t) {
        if (!n) {
            if (n = x.Deferred(), "complete" === a.readyState) {
                setTimeout(x.ready)
            } else {
                if (a.addEventListener) {
                    a.addEventListener("DOMContentLoaded", q, !1), e.addEventListener("load", q, !1)
                } else {
                    a.attachEvent("onreadystatechange", q), e.attachEvent("onload", q);
                    var r = !1;
                    try {
                        r = null == e.frameElement && a.documentElement
                    } catch (i) {}
                    r && r.doScroll && function o() {
                        if (!x.isReady) {
                            try {
                                r.doScroll("left")
                            } catch (e) {
                                return setTimeout(o, 50)
                            }
                            _(), x.ready()
                        }
                    }()
                }
            }
        }
        return n.promise(t)
    }, x.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
        c["[object " + t + "]"] = t.toLowerCase()
    });

    function M(e) {
        var t = e.length,
            n = x.type(e);
        return x.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e)
    }
    r = x(a),
        function(e, t) {
            var n, r, i, o, a, s, l, u, c, p, f, d, h, g, m, y, v, b = "sizzle" + -new Date,
                w = e.document,
                T = 0,
                C = 0,
                N = lt(),
                k = lt(),
                E = lt(),
                S = !1,
                A = function() {
                    return 0
                },
                j = typeof t,
                D = 1 << 31,
                L = {}.hasOwnProperty,
                H = [],
                q = H.pop,
                _ = H.push,
                M = H.push,
                O = H.slice,
                F = H.indexOf || function(e) {
                    var t = 0,
                        n = this.length;
                    for (; n > t; t++) {
                        if (this[t] === e) {
                            return t
                        }
                    }
                    return -1
                },
                B = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                P = "[\\x20\\t\\r\\n\\f]",
                R = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                W = R.replace("w", "w#"),
                $ = "\\[" + P + "*(" + R + ")" + P + "*(?:([*^$|!~]?=)" + P + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + W + ")|)|)" + P + "*\\]",
                I = ":(" + R + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + $.replace(3, 8) + ")*)|.*)\\)|)",
                z = RegExp("^" + P + "+|((?:^|[^\\\\])(?:\\\\.)*)" + P + "+$", "g"),
                X = RegExp("^" + P + "*," + P + "*"),
                U = RegExp("^" + P + "*([>+~]|" + P + ")" + P + "*"),
                V = RegExp(P + "*[+~]"),
                Y = RegExp("=" + P + "*([^\\]'\"]*)" + P + "*\\]", "g"),
                J = RegExp(I),
                G = RegExp("^" + W + "$"),
                Q = {
                    ID: RegExp("^#(" + R + ")"),
                    CLASS: RegExp("^\\.(" + R + ")"),
                    TAG: RegExp("^(" + R.replace("w", "w*") + ")"),
                    ATTR: RegExp("^" + $),
                    PSEUDO: RegExp("^" + I),
                    CHILD: RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + P + "*(even|odd|(([+-]|)(\\d*)n|)" + P + "*(?:([+-]|)" + P + "*(\\d+)|))" + P + "*\\)|)", "i"),
                    bool: RegExp("^(?:" + B + ")$", "i"),
                    needsContext: RegExp("^" + P + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + P + "*((?:-\\d)?\\d*)" + P + "*\\)|)(?=[^-]|$)", "i")
                },
                K = /^[^{]+\{\s*\[native \w/,
                Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                et = /^(?:input|select|textarea|button)$/i,
                tt = /^h\d$/i,
                nt = /'|\\/g,
                rt = RegExp("\\\\([\\da-f]{1,6}" + P + "?|(" + P + ")|.)", "ig"),
                it = function(e, t, n) {
                    var r = "0x" + t - 65536;
                    return r !== r || n ? t : 0 > r ? String.fromCharCode(r + 65536) : String.fromCharCode(55296 | r >> 10, 56320 | 1023 & r)
                };
            try {
                M.apply(H = O.call(w.childNodes), w.childNodes), H[w.childNodes.length].nodeType
            } catch (ot) {
                M = {
                    apply: H.length ? function(e, t) {
                        _.apply(e, O.call(t))
                    } : function(e, t) {
                        var n = e.length,
                            r = 0;
                        while (e[n++] = t[r++]) {}
                        e.length = n - 1
                    }
                }
            }

            function at(e, t, n, i) {
                var o, a, s, l, u, c, d, m, y, x;
                if ((t ? t.ownerDocument || t : w) !== f && p(t), t = t || f, n = n || [], !e || "string" != typeof e) {
                    return n
                }
                if (1 !== (l = t.nodeType) && 9 !== l) {
                    return []
                }
                if (h && !i) {
                    if (o = Z.exec(e)) {
                        if (s = o[1]) {
                            if (9 === l) {
                                if (a = t.getElementById(s), !a || !a.parentNode) {
                                    return n
                                }
                                if (a.id === s) {
                                    return n.push(a), n
                                }
                            } else {
                                if (t.ownerDocument && (a = t.ownerDocument.getElementById(s)) && v(t, a) && a.id === s) {
                                    return n.push(a), n
                                }
                            }
                        } else {
                            if (o[2]) {
                                return M.apply(n, t.getElementsByTagName(e)), n
                            }
                            if ((s = o[3]) && r.getElementsByClassName && t.getElementsByClassName) {
                                return M.apply(n, t.getElementsByClassName(s)), n
                            }
                        }
                    }
                    if (r.qsa && (!g || !g.test(e))) {
                        if (m = d = b, y = t, x = 9 === l && e, 1 === l && "object" !== t.nodeName.toLowerCase()) {
                            c = bt(e), (d = t.getAttribute("id")) ? m = d.replace(nt, "\\$&") : t.setAttribute("id", m), m = "[id='" + m + "'] ", u = c.length;
                            while (u--) {
                                c[u] = m + xt(c[u])
                            }
                            y = V.test(e) && t.parentNode || t, x = c.join(",")
                        }
                        if (x) {
                            try {
                                return M.apply(n, y.querySelectorAll(x)), n
                            } catch (T) {} finally {
                                d || t.removeAttribute("id")
                            }
                        }
                    }
                }
                return At(e.replace(z, "$1"), t, n, i)
            }

            function st(e) {
                return K.test(e + "")
            }

            function lt() {
                var e = [];

                function t(n, r) {
                    return e.push(n += " ") > o.cacheLength && delete t[e.shift()], t[n] = r
                }
                return t
            }

            function ut(e) {
                return e[b] = !0, e
            }

            function ct(e) {
                var t = f.createElement("div");
                try {
                    return !!e(t)
                } catch (n) {
                    return !1
                } finally {
                    t.parentNode && t.parentNode.removeChild(t), t = null
                }
            }

            function pt(e, t, n) {
                e = e.split("|");
                var r, i = e.length,
                    a = n ? null : t;
                while (i--) {
                    (r = o.attrHandle[e[i]]) && r !== t || (o.attrHandle[e[i]] = a)
                }
            }

            function ft(e, t) {
                var n = e.getAttributeNode(t);
                return n && n.specified ? n.value : e[t] === !0 ? t.toLowerCase() : null
            }

            function dt(e, t) {
                return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
            }

            function ht(e) {
                return "input" === e.nodeName.toLowerCase() ? e.defaultValue : t
            }

            function gt(e, t) {
                var n = t && e,
                    r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || D) - (~e.sourceIndex || D);
                if (r) {
                    return r
                }
                if (n) {
                    while (n = n.nextSibling) {
                        if (n === t) {
                            return -1
                        }
                    }
                }
                return e ? 1 : -1
            }

            function mt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return "input" === n && t.type === e
                }
            }

            function yt(e) {
                return function(t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e
                }
            }

            function vt(e) {
                return ut(function(t) {
                    return t = +t, ut(function(n, r) {
                        var i, o = e([], n.length, t),
                            a = o.length;
                        while (a--) {
                            n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                        }
                    })
                })
            }
            s = at.isXML = function(e) {
                var t = e && (e.ownerDocument || e).documentElement;
                return t ? "HTML" !== t.nodeName : !1
            }, r = at.support = {}, p = at.setDocument = function(e) {
                var n = e ? e.ownerDocument || e : w;
                return n !== f && 9 === n.nodeType && n.documentElement ? (f = n, d = n.documentElement, h = !s(n), r.attributes = ct(function(e) {
                    return e.innerHTML = "<a href='#'></a>", pt("type|href|height|width", dt, "#" === e.firstChild.getAttribute("href")), pt(B, ft, null == e.getAttribute("disabled")), e.className = "i", !e.getAttribute("className")
                }), r.input = ct(function(e) {
                    return e.innerHTML = "<input>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
                }), pt("value", ht, r.attributes && r.input), r.getElementsByTagName = ct(function(e) {
                    return e.appendChild(n.createComment("")), !e.getElementsByTagName("*").length
                }), r.getElementsByClassName = ct(function(e) {
                    return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
                }), r.getById = ct(function(e) {
                    return d.appendChild(e).id = b, !n.getElementsByName || !n.getElementsByName(b).length
                }), r.getById ? (o.find.ID = function(e, t) {
                    if (typeof t.getElementById !== j && h) {
                        var n = t.getElementById(e);
                        return n && n.parentNode ? [n] : []
                    }
                }, o.filter.ID = function(e) {
                    var t = e.replace(rt, it);
                    return function(e) {
                        return e.getAttribute("id") === t
                    }
                }) : (delete o.find.ID, o.filter.ID = function(e) {
                    var t = e.replace(rt, it);
                    return function(e) {
                        var n = typeof e.getAttributeNode !== j && e.getAttributeNode("id");
                        return n && n.value === t
                    }
                }), o.find.TAG = r.getElementsByTagName ? function(e, n) {
                    return typeof n.getElementsByTagName !== j ? n.getElementsByTagName(e) : t
                } : function(e, t) {
                    var n, r = [],
                        i = 0,
                        o = t.getElementsByTagName(e);
                    if ("*" === e) {
                        while (n = o[i++]) {
                            1 === n.nodeType && r.push(n)
                        }
                        return r
                    }
                    return o
                }, o.find.CLASS = r.getElementsByClassName && function(e, n) {
                    return typeof n.getElementsByClassName !== j && h ? n.getElementsByClassName(e) : t
                }, m = [], g = [], (r.qsa = st(n.querySelectorAll)) && (ct(function(e) {
                    e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || g.push("\\[" + P + "*(?:value|" + B + ")"), e.querySelectorAll(":checked").length || g.push(":checked")
                }), ct(function(e) {
                    var t = n.createElement("input");
                    t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("t", ""), e.querySelectorAll("[t^='']").length && g.push("[*^$]=" + P + "*(?:''|\"\")"), e.querySelectorAll(":enabled").length || g.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), g.push(",.*:")
                })), (r.matchesSelector = st(y = d.webkitMatchesSelector || d.mozMatchesSelector || d.oMatchesSelector || d.msMatchesSelector)) && ct(function(e) {
                    r.disconnectedMatch = y.call(e, "div"), y.call(e, "[s!='']:x"), m.push("!=", I)
                }), g = g.length && RegExp(g.join("|")), m = m.length && RegExp(m.join("|")), v = st(d.contains) || d.compareDocumentPosition ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                } : function(e, t) {
                    if (t) {
                        while (t = t.parentNode) {
                            if (t === e) {
                                return !0
                            }
                        }
                    }
                    return !1
                }, r.sortDetached = ct(function(e) {
                    return 1 & e.compareDocumentPosition(n.createElement("div"))
                }), A = d.compareDocumentPosition ? function(e, t) {
                    if (e === t) {
                        return S = !0, 0
                    }
                    var i = t.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(t);
                    return i ? 1 & i || !r.sortDetached && t.compareDocumentPosition(e) === i ? e === n || v(w, e) ? -1 : t === n || v(w, t) ? 1 : c ? F.call(c, e) - F.call(c, t) : 0 : 4 & i ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
                } : function(e, t) {
                    var r, i = 0,
                        o = e.parentNode,
                        a = t.parentNode,
                        s = [e],
                        l = [t];
                    if (e === t) {
                        return S = !0, 0
                    }
                    if (!o || !a) {
                        return e === n ? -1 : t === n ? 1 : o ? -1 : a ? 1 : c ? F.call(c, e) - F.call(c, t) : 0
                    }
                    if (o === a) {
                        return gt(e, t)
                    }
                    r = e;
                    while (r = r.parentNode) {
                        s.unshift(r)
                    }
                    r = t;
                    while (r = r.parentNode) {
                        l.unshift(r)
                    }
                    while (s[i] === l[i]) {
                        i++
                    }
                    return i ? gt(s[i], l[i]) : s[i] === w ? -1 : l[i] === w ? 1 : 0
                }, n) : f
            }, at.matches = function(e, t) {
                return at(e, null, null, t)
            }, at.matchesSelector = function(e, t) {
                if ((e.ownerDocument || e) !== f && p(e), t = t.replace(Y, "='$1']"), !(!r.matchesSelector || !h || m && m.test(t) || g && g.test(t))) {
                    try {
                        var n = y.call(e, t);
                        if (n || r.disconnectedMatch || e.document && 11 !== e.document.nodeType) {
                            return n
                        }
                    } catch (i) {}
                }
                return at(t, f, null, [e]).length > 0
            }, at.contains = function(e, t) {
                return (e.ownerDocument || e) !== f && p(e), v(e, t)
            }, at.attr = function(e, n) {
                (e.ownerDocument || e) !== f && p(e);
                var i = o.attrHandle[n.toLowerCase()],
                    a = i && L.call(o.attrHandle, n.toLowerCase()) ? i(e, n, !h) : t;
                return a === t ? r.attributes || !h ? e.getAttribute(n) : (a = e.getAttributeNode(n)) && a.specified ? a.value : null : a
            }, at.error = function(e) {
                throw Error("Syntax error, unrecognized expression: " + e)
            }, at.uniqueSort = function(e) {
                var t, n = [],
                    i = 0,
                    o = 0;
                if (S = !r.detectDuplicates, c = !r.sortStable && e.slice(0), e.sort(A), S) {
                    while (t = e[o++]) {
                        t === e[o] && (i = n.push(o))
                    }
                    while (i--) {
                        e.splice(n[i], 1)
                    }
                }
                return e
            }, a = at.getText = function(e) {
                var t, n = "",
                    r = 0,
                    i = e.nodeType;
                if (i) {
                    if (1 === i || 9 === i || 11 === i) {
                        if ("string" == typeof e.textContent) {
                            return e.textContent
                        }
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            n += a(e)
                        }
                    } else {
                        if (3 === i || 4 === i) {
                            return e.nodeValue
                        }
                    }
                } else {
                    for (; t = e[r]; r++) {
                        n += a(t)
                    }
                }
                return n
            }, o = at.selectors = {
                cacheLength: 50,
                createPseudo: ut,
                match: Q,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(e) {
                        return e[1] = e[1].replace(rt, it), e[3] = (e[4] || e[5] || "").replace(rt, it), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                    },
                    CHILD: function(e) {
                        return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || at.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && at.error(e[0]), e
                    },
                    PSEUDO: function(e) {
                        var n, r = !e[5] && e[2];
                        return Q.CHILD.test(e[0]) ? null : (e[3] && e[4] !== t ? e[2] = e[4] : r && J.test(r) && (n = bt(r, !0)) && (n = r.indexOf(")", r.length - n) - r.length) && (e[0] = e[0].slice(0, n), e[2] = r.slice(0, n)), e.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(e) {
                        var t = e.replace(rt, it).toLowerCase();
                        return "*" === e ? function() {
                            return !0
                        } : function(e) {
                            return e.nodeName && e.nodeName.toLowerCase() === t
                        }
                    },
                    CLASS: function(e) {
                        var t = N[e + " "];
                        return t || (t = RegExp("(^|" + P + ")" + e + "(" + P + "|$)")) && N(e, function(e) {
                            return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== j && e.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(e, t, n) {
                        return function(r) {
                            var i = at.attr(r, e);
                            return null == i ? "!=" === t : t ? (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.slice(0, n.length + 1) === n + "-" : !1) : !0
                        }
                    },
                    CHILD: function(e, t, n, r, i) {
                        var o = "nth" !== e.slice(0, 3),
                            a = "last" !== e.slice(-4),
                            s = "of-type" === t;
                        return 1 === r && 0 === i ? function(e) {
                            return !!e.parentNode
                        } : function(t, n, l) {
                            var u, c, p, f, d, h, g = o !== a ? "nextSibling" : "previousSibling",
                                m = t.parentNode,
                                y = s && t.nodeName.toLowerCase(),
                                v = !l && !s;
                            if (m) {
                                if (o) {
                                    while (g) {
                                        p = t;
                                        while (p = p[g]) {
                                            if (s ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) {
                                                return !1
                                            }
                                        }
                                        h = g = "only" === e && !h && "nextSibling"
                                    }
                                    return !0
                                }
                                if (h = [a ? m.firstChild : m.lastChild], a && v) {
                                    c = m[b] || (m[b] = {}), u = c[e] || [], d = u[0] === T && u[1], f = u[0] === T && u[2], p = d && m.childNodes[d];
                                    while (p = ++d && p && p[g] || (f = d = 0) || h.pop()) {
                                        if (1 === p.nodeType && ++f && p === t) {
                                            c[e] = [T, d, f];
                                            break
                                        }
                                    }
                                } else {
                                    if (v && (u = (t[b] || (t[b] = {}))[e]) && u[0] === T) {
                                        f = u[1]
                                    } else {
                                        while (p = ++d && p && p[g] || (f = d = 0) || h.pop()) {
                                            if ((s ? p.nodeName.toLowerCase() === y : 1 === p.nodeType) && ++f && (v && ((p[b] || (p[b] = {}))[e] = [T, f]), p === t)) {
                                                break
                                            }
                                        }
                                    }
                                }
                                return f -= i, f === r || 0 === f % r && f / r >= 0
                            }
                        }
                    },
                    PSEUDO: function(e, t) {
                        var n, r = o.pseudos[e] || o.setFilters[e.toLowerCase()] || at.error("unsupported pseudo: " + e);
                        return r[b] ? r(t) : r.length > 1 ? (n = [e, e, "", t], o.setFilters.hasOwnProperty(e.toLowerCase()) ? ut(function(e, n) {
                            var i, o = r(e, t),
                                a = o.length;
                            while (a--) {
                                i = F.call(e, o[a]), e[i] = !(n[i] = o[a])
                            }
                        }) : function(e) {
                            return r(e, 0, n)
                        }) : r
                    }
                },
                pseudos: {
                    not: ut(function(e) {
                        var t = [],
                            n = [],
                            r = l(e.replace(z, "$1"));
                        return r[b] ? ut(function(e, t, n, i) {
                            var o, a = r(e, null, i, []),
                                s = e.length;
                            while (s--) {
                                (o = a[s]) && (e[s] = !(t[s] = o))
                            }
                        }) : function(e, i, o) {
                            return t[0] = e, r(t, null, o, n), !n.pop()
                        }
                    }),
                    has: ut(function(e) {
                        return function(t) {
                            return at(e, t).length > 0
                        }
                    }),
                    contains: ut(function(e) {
                        return function(t) {
                            return (t.textContent || t.innerText || a(t)).indexOf(e) > -1
                        }
                    }),
                    lang: ut(function(e) {
                        return G.test(e || "") || at.error("unsupported lang: " + e), e = e.replace(rt, it).toLowerCase(),
                            function(t) {
                                var n;
                                do {
                                    if (n = h ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) {
                                        return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-")
                                    }
                                } while ((t = t.parentNode) && 1 === t.nodeType);
                                return !1
                            }
                    }),
                    target: function(t) {
                        var n = e.location && e.location.hash;
                        return n && n.slice(1) === t.id
                    },
                    root: function(e) {
                        return e === d
                    },
                    focus: function(e) {
                        return e === f.activeElement && (!f.hasFocus || f.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                    },
                    enabled: function(e) {
                        return e.disabled === !1
                    },
                    disabled: function(e) {
                        return e.disabled === !0
                    },
                    checked: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && !!e.checked || "option" === t && !!e.selected
                    },
                    selected: function(e) {
                        return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                    },
                    empty: function(e) {
                        for (e = e.firstChild; e; e = e.nextSibling) {
                            if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) {
                                return !1
                            }
                        }
                        return !0
                    },
                    parent: function(e) {
                        return !o.pseudos.empty(e)
                    },
                    header: function(e) {
                        return tt.test(e.nodeName)
                    },
                    input: function(e) {
                        return et.test(e.nodeName)
                    },
                    button: function(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t && "button" === e.type || "button" === t
                    },
                    text: function(e) {
                        var t;
                        return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type)
                    },
                    first: vt(function() {
                        return [0]
                    }),
                    last: vt(function(e, t) {
                        return [t - 1]
                    }),
                    eq: vt(function(e, t, n) {
                        return [0 > n ? n + t : n]
                    }),
                    even: vt(function(e, t) {
                        var n = 0;
                        for (; t > n; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    odd: vt(function(e, t) {
                        var n = 1;
                        for (; t > n; n += 2) {
                            e.push(n)
                        }
                        return e
                    }),
                    lt: vt(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; --r >= 0;) {
                            e.push(r)
                        }
                        return e
                    }),
                    gt: vt(function(e, t, n) {
                        var r = 0 > n ? n + t : n;
                        for (; t > ++r;) {
                            e.push(r)
                        }
                        return e
                    })
                }
            };
            for (n in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) {
                o.pseudos[n] = mt(n)
            }
            for (n in {
                    submit: !0,
                    reset: !0
                }) {
                o.pseudos[n] = yt(n)
            }

            function bt(e, t) {
                var n, r, i, a, s, l, u, c = k[e + " "];
                if (c) {
                    return t ? 0 : c.slice(0)
                }
                s = e, l = [], u = o.preFilter;
                while (s) {
                    (!n || (r = X.exec(s))) && (r && (s = s.slice(r[0].length) || s), l.push(i = [])), n = !1, (r = U.exec(s)) && (n = r.shift(), i.push({
                        value: n,
                        type: r[0].replace(z, " ")
                    }), s = s.slice(n.length));
                    for (a in o.filter) {
                        !(r = Q[a].exec(s)) || u[a] && !(r = u[a](r)) || (n = r.shift(), i.push({
                            value: n,
                            type: a,
                            matches: r
                        }), s = s.slice(n.length))
                    }
                    if (!n) {
                        break
                    }
                }
                return t ? s.length : s ? at.error(e) : k(e, l).slice(0)
            }

            function xt(e) {
                var t = 0,
                    n = e.length,
                    r = "";
                for (; n > t; t++) {
                    r += e[t].value
                }
                return r
            }

            function wt(e, t, n) {
                var r = t.dir,
                    o = n && "parentNode" === r,
                    a = C++;
                return t.first ? function(t, n, i) {
                    while (t = t[r]) {
                        if (1 === t.nodeType || o) {
                            return e(t, n, i)
                        }
                    }
                } : function(t, n, s) {
                    var l, u, c, p = T + " " + a;
                    if (s) {
                        while (t = t[r]) {
                            if ((1 === t.nodeType || o) && e(t, n, s)) {
                                return !0
                            }
                        }
                    } else {
                        while (t = t[r]) {
                            if (1 === t.nodeType || o) {
                                if (c = t[b] || (t[b] = {}), (u = c[r]) && u[0] === p) {
                                    if ((l = u[1]) === !0 || l === i) {
                                        return l === !0
                                    }
                                } else {
                                    if (u = c[r] = [p], u[1] = e(t, n, s) || i, u[1] === !0) {
                                        return !0
                                    }
                                }
                            }
                        }
                    }
                }
            }

            function Tt(e) {
                return e.length > 1 ? function(t, n, r) {
                    var i = e.length;
                    while (i--) {
                        if (!e[i](t, n, r)) {
                            return !1
                        }
                    }
                    return !0
                } : e[0]
            }

            function Ct(e, t, n, r, i) {
                var o, a = [],
                    s = 0,
                    l = e.length,
                    u = null != t;
                for (; l > s; s++) {
                    (o = e[s]) && (!n || n(o, r, i)) && (a.push(o), u && t.push(s))
                }
                return a
            }

            function Nt(e, t, n, r, i, o) {
                return r && !r[b] && (r = Nt(r)), i && !i[b] && (i = Nt(i, o)), ut(function(o, a, s, l) {
                    var u, c, p, f = [],
                        d = [],
                        h = a.length,
                        g = o || St(t || "*", s.nodeType ? [s] : s, []),
                        m = !e || !o && t ? g : Ct(g, f, e, s, l),
                        y = n ? i || (o ? e : h || r) ? [] : a : m;
                    if (n && n(m, y, s, l), r) {
                        u = Ct(y, d), r(u, [], s, l), c = u.length;
                        while (c--) {
                            (p = u[c]) && (y[d[c]] = !(m[d[c]] = p))
                        }
                    }
                    if (o) {
                        if (i || e) {
                            if (i) {
                                u = [], c = y.length;
                                while (c--) {
                                    (p = y[c]) && u.push(m[c] = p)
                                }
                                i(null, y = [], u, l)
                            }
                            c = y.length;
                            while (c--) {
                                (p = y[c]) && (u = i ? F.call(o, p) : f[c]) > -1 && (o[u] = !(a[u] = p))
                            }
                        }
                    } else {
                        y = Ct(y === a ? y.splice(h, y.length) : y), i ? i(null, a, y, l) : M.apply(a, y)
                    }
                })
            }

            function kt(e) {
                var t, n, r, i = e.length,
                    a = o.relative[e[0].type],
                    s = a || o.relative[" "],
                    l = a ? 1 : 0,
                    c = wt(function(e) {
                        return e === t
                    }, s, !0),
                    p = wt(function(e) {
                        return F.call(t, e) > -1
                    }, s, !0),
                    f = [function(e, n, r) {
                        return !a && (r || n !== u) || ((t = n).nodeType ? c(e, n, r) : p(e, n, r))
                    }];
                for (; i > l; l++) {
                    if (n = o.relative[e[l].type]) {
                        f = [wt(Tt(f), n)]
                    } else {
                        if (n = o.filter[e[l].type].apply(null, e[l].matches), n[b]) {
                            for (r = ++l; i > r; r++) {
                                if (o.relative[e[r].type]) {
                                    break
                                }
                            }
                            return Nt(l > 1 && Tt(f), l > 1 && xt(e.slice(0, l - 1).concat({
                                value: " " === e[l - 2].type ? "*" : ""
                            })).replace(z, "$1"), n, r > l && kt(e.slice(l, r)), i > r && kt(e = e.slice(r)), i > r && xt(e))
                        }
                        f.push(n)
                    }
                }
                return Tt(f)
            }

            function Et(e, t) {
                var n = 0,
                    r = t.length > 0,
                    a = e.length > 0,
                    s = function(s, l, c, p, d) {
                        var h, g, m, y = [],
                            v = 0,
                            b = "0",
                            x = s && [],
                            w = null != d,
                            C = u,
                            N = s || a && o.find.TAG("*", d && l.parentNode || l),
                            k = T += null == C ? 1 : Math.random() || 0.1;
                        for (w && (u = l !== f && l, i = n); null != (h = N[b]); b++) {
                            if (a && h) {
                                g = 0;
                                while (m = e[g++]) {
                                    if (m(h, l, c)) {
                                        p.push(h);
                                        break
                                    }
                                }
                                w && (T = k, i = ++n)
                            }
                            r && ((h = !m && h) && v--, s && x.push(h))
                        }
                        if (v += b, r && b !== v) {
                            g = 0;
                            while (m = t[g++]) {
                                m(x, y, l, c)
                            }
                            if (s) {
                                if (v > 0) {
                                    while (b--) {
                                        x[b] || y[b] || (y[b] = q.call(p))
                                    }
                                }
                                y = Ct(y)
                            }
                            M.apply(p, y), w && !s && y.length > 0 && v + t.length > 1 && at.uniqueSort(p)
                        }
                        return w && (T = k, u = C), x
                    };
                return r ? ut(s) : s
            }
            l = at.compile = function(e, t) {
                var n, r = [],
                    i = [],
                    o = E[e + " "];
                if (!o) {
                    t || (t = bt(e)), n = t.length;
                    while (n--) {
                        o = kt(t[n]), o[b] ? r.push(o) : i.push(o)
                    }
                    o = E(e, Et(i, r))
                }
                return o
            };

            function St(e, t, n) {
                var r = 0,
                    i = t.length;
                for (; i > r; r++) {
                    at(e, t[r], n)
                }
                return n
            }

            function At(e, t, n, i) {
                var a, s, u, c, p, f = bt(e);
                if (!i && 1 === f.length) {
                    if (s = f[0] = f[0].slice(0), s.length > 2 && "ID" === (u = s[0]).type && r.getById && 9 === t.nodeType && h && o.relative[s[1].type]) {
                        if (t = (o.find.ID(u.matches[0].replace(rt, it), t) || [])[0], !t) {
                            return n
                        }
                        e = e.slice(s.shift().value.length)
                    }
                    a = Q.needsContext.test(e) ? 0 : s.length;
                    while (a--) {
                        if (u = s[a], o.relative[c = u.type]) {
                            break
                        }
                        if ((p = o.find[c]) && (i = p(u.matches[0].replace(rt, it), V.test(s[0].type) && t.parentNode || t))) {
                            if (s.splice(a, 1), e = i.length && xt(s), !e) {
                                return M.apply(n, i), n
                            }
                            break
                        }
                    }
                }
                return l(e, f)(i, t, !h, n, V.test(e)), n
            }
            o.pseudos.nth = o.pseudos.eq;

            function jt() {}
            jt.prototype = o.filters = o.pseudos, o.setFilters = new jt, r.sortStable = b.split("").sort(A).join("") === b, p(), [0, 0].sort(A), r.detectDuplicates = S, x.find = at, x.expr = at.selectors, x.expr[":"] = x.expr.pseudos, x.unique = at.uniqueSort, x.text = at.getText, x.isXMLDoc = at.isXML, x.contains = at.contains
        }(e);
    var O = {};

    function F(e) {
        var t = O[e] = {};
        return x.each(e.match(T) || [], function(e, n) {
            t[n] = !0
        }), t
    }
    x.Callbacks = function(e) {
        e = "string" == typeof e ? O[e] || F(e) : x.extend({}, e);
        var n, r, i, o, a, s, l = [],
            u = !e.once && [],
            c = function(t) {
                for (r = e.memory && t, i = !0, a = s || 0, s = 0, o = l.length, n = !0; l && o > a; a++) {
                    if (l[a].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                        r = !1;
                        break
                    }
                }
                n = !1, l && (u ? u.length && c(u.shift()) : r ? l = [] : p.disable())
            },
            p = {
                add: function() {
                    if (l) {
                        var t = l.length;
                        (function i(t) {
                            x.each(t, function(t, n) {
                                var r = x.type(n);
                                "function" === r ? e.unique && p.has(n) || l.push(n) : n && n.length && "string" !== r && i(n)
                            })
                        })(arguments), n ? o = l.length : r && (s = t, c(r))
                    }
                    return this
                },
                remove: function() {
                    return l && x.each(arguments, function(e, t) {
                        var r;
                        while ((r = x.inArray(t, l, r)) > -1) {
                            l.splice(r, 1), n && (o >= r && o--, a >= r && a--)
                        }
                    }), this
                },
                has: function(e) {
                    return e ? x.inArray(e, l) > -1 : !(!l || !l.length)
                },
                empty: function() {
                    return l = [], o = 0, this
                },
                disable: function() {
                    return l = u = r = t, this
                },
                disabled: function() {
                    return !l
                },
                lock: function() {
                    return u = t, r || p.disable(), this
                },
                locked: function() {
                    return !u
                },
                fireWith: function(e, t) {
                    return t = t || [], t = [e, t.slice ? t.slice() : t], !l || i && !u || (n ? u.push(t) : c(t)), this
                },
                fire: function() {
                    return p.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!i
                }
            };
        return p
    }, x.extend({
        Deferred: function(e) {
            var t = [
                    ["resolve", "done", x.Callbacks("once memory"), "resolved"],
                    ["reject", "fail", x.Callbacks("once memory"), "rejected"],
                    ["notify", "progress", x.Callbacks("memory")]
                ],
                n = "pending",
                r = {
                    state: function() {
                        return n
                    },
                    always: function() {
                        return i.done(arguments).fail(arguments), this
                    },
                    then: function() {
                        var e = arguments;
                        return x.Deferred(function(n) {
                            x.each(t, function(t, o) {
                                var a = o[0],
                                    s = x.isFunction(e[t]) && e[t];
                                i[o[1]](function() {
                                    var e = s && s.apply(this, arguments);
                                    e && x.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[a + "With"](this === r ? n.promise() : this, s ? [e] : arguments)
                                })
                            }), e = null
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? x.extend(e, r) : r
                    }
                },
                i = {};
            return r.pipe = r.then, x.each(t, function(e, o) {
                var a = o[2],
                    s = o[3];
                r[o[1]] = a.add, s && a.add(function() {
                    n = s
                }, t[1 ^ e][2].disable, t[2][2].lock), i[o[0]] = function() {
                    return i[o[0] + "With"](this === i ? r : this, arguments), this
                }, i[o[0] + "With"] = a.fireWith
            }), r.promise(i), e && e.call(i, i), i
        },
        when: function(e) {
            var t = 0,
                n = g.call(arguments),
                r = n.length,
                i = 1 !== r || e && x.isFunction(e.promise) ? r : 0,
                o = 1 === i ? e : x.Deferred(),
                a = function(e, t, n) {
                    return function(r) {
                        t[e] = this, n[e] = arguments.length > 1 ? g.call(arguments) : r, n === s ? o.notifyWith(t, n) : --i || o.resolveWith(t, n)
                    }
                },
                s, l, u;
            if (r > 1) {
                for (s = Array(r), l = Array(r), u = Array(r); r > t; t++) {
                    n[t] && x.isFunction(n[t].promise) ? n[t].promise().done(a(t, u, n)).fail(o.reject).progress(a(t, l, s)) : --i
                }
            }
            return i || o.resolveWith(u, n), o.promise()
        }
    }), x.support = function(t) {
        var n, r, o, s, l, u, c, p, f, d = a.createElement("div");
        if (d.setAttribute("className", "t"), d.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = d.getElementsByTagName("*") || [], r = d.getElementsByTagName("a")[0], !r || !r.style || !n.length) {
            return t
        }
        s = a.createElement("select"), u = s.appendChild(a.createElement("option")), o = d.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t.getSetAttribute = "t" !== d.className, t.leadingWhitespace = 3 === d.firstChild.nodeType, t.tbody = !d.getElementsByTagName("tbody").length, t.htmlSerialize = !!d.getElementsByTagName("link").length, t.style = /top/.test(r.getAttribute("style")), t.hrefNormalized = "/a" === r.getAttribute("href"), t.opacity = /^0.5/.test(r.style.opacity), t.cssFloat = !!r.style.cssFloat, t.checkOn = !!o.value, t.optSelected = u.selected, t.enctype = !!a.createElement("form").enctype, t.html5Clone = "<:nav></:nav>" !== a.createElement("nav").cloneNode(!0).outerHTML, t.inlineBlockNeedsLayout = !1, t.shrinkWrapBlocks = !1, t.pixelPosition = !1, t.deleteExpando = !0, t.noCloneEvent = !0, t.reliableMarginRight = !0, t.boxSizingReliable = !0, o.checked = !0, t.noCloneChecked = o.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !u.disabled;
        try {
            delete d.test
        } catch (h) {
            t.deleteExpando = !1
        }
        o = a.createElement("input"), o.setAttribute("value", ""), t.input = "" === o.getAttribute("value"), o.value = "t", o.setAttribute("type", "radio"), t.radioValue = "t" === o.value, o.setAttribute("checked", "t"), o.setAttribute("name", "t"), l = a.createDocumentFragment(), l.appendChild(o), t.appendChecked = o.checked, t.checkClone = l.cloneNode(!0).cloneNode(!0).lastChild.checked, d.attachEvent && (d.attachEvent("onclick", function() {
            t.noCloneEvent = !1
        }), d.cloneNode(!0).click());
        for (f in {
                submit: !0,
                change: !0,
                focusin: !0
            }) {
            d.setAttribute(c = "on" + f, "t"), t[f + "Bubbles"] = c in e || d.attributes[c].expando === !1
        }
        d.style.backgroundClip = "content-box", d.cloneNode(!0).style.backgroundClip = "", t.clearCloneStyle = "content-box" === d.style.backgroundClip;
        for (f in x(t)) {
            break
        }
        return t.ownLast = "0" !== f, x(function() {
            var n, r, o, s = "padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",
                l = a.getElementsByTagName("body")[0];
            l && (n = a.createElement("div"), n.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", l.appendChild(n).appendChild(d), d.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", o = d.getElementsByTagName("td"), o[0].style.cssText = "padding:0;margin:0;border:0;display:none", p = 0 === o[0].offsetHeight, o[0].style.display = "", o[1].style.display = "none", t.reliableHiddenOffsets = p && 0 === o[0].offsetHeight, d.innerHTML = "", d.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", x.swap(l, null != l.style.zoom ? {
                zoom: 1
            } : {}, function() {
                t.boxSizing = 4 === d.offsetWidth
            }), e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(d, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(d, null) || {
                width: "4px"
            }).width, r = d.appendChild(a.createElement("div")), r.style.cssText = d.style.cssText = s, r.style.marginRight = r.style.width = "0", d.style.width = "1px", t.reliableMarginRight = !parseFloat((e.getComputedStyle(r, null) || {}).marginRight)), typeof d.style.zoom !== i && (d.innerHTML = "", d.style.cssText = s + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === d.offsetWidth, d.style.display = "block", d.innerHTML = "<div></div>", d.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== d.offsetWidth, t.inlineBlockNeedsLayout && (l.style.zoom = 1)), l.removeChild(n), n = d = o = r = null)
        }), n = s = l = u = r = o = null, t
    }({});
    var B = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
        P = /([A-Z])/g;

    function R(e, n, r, i) {
        if (x.acceptData(e)) {
            var o, a, s = x.expando,
                l = e.nodeType,
                u = l ? x.cache : e,
                c = l ? e[s] : e[s] && s;
            if (c && u[c] && (i || u[c].data) || r !== t || "string" != typeof n) {
                return c || (c = l ? e[s] = p.pop() || x.guid++ : s), u[c] || (u[c] = l ? {} : {
                    toJSON: x.noop
                }), ("object" == typeof n || "function" == typeof n) && (i ? u[c] = x.extend(u[c], n) : u[c].data = x.extend(u[c].data, n)), a = u[c], i || (a.data || (a.data = {}), a = a.data), r !== t && (a[x.camelCase(n)] = r), "string" == typeof n ? (o = a[n], null == o && (o = a[x.camelCase(n)])) : o = a, o
            }
        }
    }

    function W(e, t, n) {
        if (x.acceptData(e)) {
            var r, i, o = e.nodeType,
                a = o ? x.cache : e,
                s = o ? e[x.expando] : x.expando;
            if (a[s]) {
                if (t && (r = n ? a[s] : a[s].data)) {
                    x.isArray(t) ? t = t.concat(x.map(t, x.camelCase)) : t in r ? t = [t] : (t = x.camelCase(t), t = t in r ? [t] : t.split(" ")), i = t.length;
                    while (i--) {
                        delete r[t[i]]
                    }
                    if (n ? !I(r) : !x.isEmptyObject(r)) {
                        return
                    }
                }(n || (delete a[s].data, I(a[s]))) && (o ? x.cleanData([e], !0) : x.support.deleteExpando || a != a.window ? delete a[s] : a[s] = null)
            }
        }
    }
    x.extend({
        cache: {},
        noData: {
            applet: !0,
            embed: !0,
            object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function(e) {
            return e = e.nodeType ? x.cache[e[x.expando]] : e[x.expando], !!e && !I(e)
        },
        data: function(e, t, n) {
            return R(e, t, n)
        },
        removeData: function(e, t) {
            return W(e, t)
        },
        _data: function(e, t, n) {
            return R(e, t, n, !0)
        },
        _removeData: function(e, t) {
            return W(e, t, !0)
        },
        acceptData: function(e) {
            if (e.nodeType && 1 !== e.nodeType && 9 !== e.nodeType) {
                return !1
            }
            var t = e.nodeName && x.noData[e.nodeName.toLowerCase()];
            return !t || t !== !0 && e.getAttribute("classid") === t
        }
    }), x.fn.extend({
        data: function(e, n) {
            var r, i, o = null,
                a = 0,
                s = this[0];
            if (e === t) {
                if (this.length && (o = x.data(s), 1 === s.nodeType && !x._data(s, "parsedAttrs"))) {
                    for (r = s.attributes; r.length > a; a++) {
                        i = r[a].name, 0 === i.indexOf("data-") && (i = x.camelCase(i.slice(5)), $(s, i, o[i]))
                    }
                    x._data(s, "parsedAttrs", !0)
                }
                return o
            }
            return "object" == typeof e ? this.each(function() {
                x.data(this, e)
            }) : arguments.length > 1 ? this.each(function() {
                x.data(this, e, n)
            }) : s ? $(s, e, x.data(s, e)) : null
        },
        removeData: function(e) {
            return this.each(function() {
                x.removeData(this, e)
            })
        }
    });

    function $(e, n, r) {
        if (r === t && 1 === e.nodeType) {
            var i = "data-" + n.replace(P, "-$1").toLowerCase();
            if (r = e.getAttribute(i), "string" == typeof r) {
                try {
                    r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : B.test(r) ? x.parseJSON(r) : r
                } catch (o) {}
                x.data(e, n, r)
            } else {
                r = t
            }
        }
        return r
    }

    function I(e) {
        var t;
        for (t in e) {
            if (("data" !== t || !x.isEmptyObject(e[t])) && "toJSON" !== t) {
                return !1
            }
        }
        return !0
    }
    x.extend({
        queue: function(e, n, r) {
            var i;
            return e ? (n = (n || "fx") + "queue", i = x._data(e, n), r && (!i || x.isArray(r) ? i = x._data(e, n, x.makeArray(r)) : i.push(r)), i || []) : t
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = x.queue(e, t),
                r = n.length,
                i = n.shift(),
                o = x._queueHooks(e, t),
                a = function() {
                    x.dequeue(e, t)
                };
            "inprogress" === i && (i = n.shift(), r--), o.cur = i, i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, a, o)), !r && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return x._data(e, n) || x._data(e, n, {
                empty: x.Callbacks("once memory").add(function() {
                    x._removeData(e, t + "queue"), x._removeData(e, n)
                })
            })
        }
    }), x.fn.extend({
        queue: function(e, n) {
            var r = 2;
            return "string" != typeof e && (n = e, e = "fx", r--), r > arguments.length ? x.queue(this[0], e) : n === t ? this : this.each(function() {
                var t = x.queue(this, e, n);
                x._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && x.dequeue(this, e)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                x.dequeue(this, e)
            })
        },
        delay: function(e, t) {
            return e = x.fx ? x.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                var r = setTimeout(t, e);
                n.stop = function() {
                    clearTimeout(r)
                }
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, n) {
            var r, i = 1,
                o = x.Deferred(),
                a = this,
                s = this.length,
                l = function() {
                    --i || o.resolveWith(a, [a])
                };
            "string" != typeof e && (n = e, e = t), e = e || "fx";
            while (s--) {
                r = x._data(a[s], e + "queueHooks"), r && r.empty && (i++, r.empty.add(l))
            }
            return l(), o.promise(n)
        }
    });
    var z, X, U = /[\t\r\n\f]/g,
        V = /\r/g,
        Y = /^(?:input|select|textarea|button|object)$/i,
        J = /^(?:a|area)$/i,
        G = /^(?:checked|selected)$/i,
        Q = x.support.getSetAttribute,
        K = x.support.input;
    x.fn.extend({
        attr: function(e, t) {
            return x.access(this, x.attr, e, t, arguments.length > 1)
        },
        removeAttr: function(e) {
            return this.each(function() {
                x.removeAttr(this, e)
            })
        },
        prop: function(e, t) {
            return x.access(this, x.prop, e, t, arguments.length > 1)
        },
        removeProp: function(e) {
            return e = x.propFix[e] || e, this.each(function() {
                try {
                    this[e] = t, delete this[e]
                } catch (n) {}
            })
        },
        addClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                l = "string" == typeof e && e;
            if (x.isFunction(e)) {
                return this.each(function(t) {
                    x(this).addClass(e.call(this, t, this.className))
                })
            }
            if (l) {
                for (t = (e || "").match(T) || []; s > a; a++) {
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(U, " ") : " ")) {
                        o = 0;
                        while (i = t[o++]) {
                            0 > r.indexOf(" " + i + " ") && (r += i + " ")
                        }
                        n.className = x.trim(r)
                    }
                }
            }
            return this
        },
        removeClass: function(e) {
            var t, n, r, i, o, a = 0,
                s = this.length,
                l = 0 === arguments.length || "string" == typeof e && e;
            if (x.isFunction(e)) {
                return this.each(function(t) {
                    x(this).removeClass(e.call(this, t, this.className))
                })
            }
            if (l) {
                for (t = (e || "").match(T) || []; s > a; a++) {
                    if (n = this[a], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(U, " ") : "")) {
                        o = 0;
                        while (i = t[o++]) {
                            while (r.indexOf(" " + i + " ") >= 0) {
                                r = r.replace(" " + i + " ", " ")
                            }
                        }
                        n.className = e ? x.trim(r) : ""
                    }
                }
            }
            return this
        },
        toggleClass: function(e, t) {
            var n = typeof e,
                r = "boolean" == typeof t;
            return x.isFunction(e) ? this.each(function(n) {
                x(this).toggleClass(e.call(this, n, this.className, t), t)
            }) : this.each(function() {
                if ("string" === n) {
                    var o, a = 0,
                        s = x(this),
                        l = t,
                        u = e.match(T) || [];
                    while (o = u[a++]) {
                        l = r ? l : !s.hasClass(o), s[l ? "addClass" : "removeClass"](o)
                    }
                } else {
                    (n === i || "boolean" === n) && (this.className && x._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : x._data(this, "__className__") || "")
                }
            })
        },
        hasClass: function(e) {
            var t = " " + e + " ",
                n = 0,
                r = this.length;
            for (; r > n; n++) {
                if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(U, " ").indexOf(t) >= 0) {
                    return !0
                }
            }
            return !1
        },
        val: function(e) {
            var n, r, i, o = this[0];
            if (arguments.length) {
                return i = x.isFunction(e), this.each(function(n) {
                    var o;
                    1 === this.nodeType && (o = i ? e.call(this, n, x(this).val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : x.isArray(o) && (o = x.map(o, function(e) {
                        return null == e ? "" : e + ""
                    })), r = x.valHooks[this.type] || x.valHooks[this.nodeName.toLowerCase()], r && "set" in r && r.set(this, o, "value") !== t || (this.value = o))
                })
            }
            if (o) {
                return r = x.valHooks[o.type] || x.valHooks[o.nodeName.toLowerCase()], r && "get" in r && (n = r.get(o, "value")) !== t ? n : (n = o.value, "string" == typeof n ? n.replace(V, "") : null == n ? "" : n)
            }
        }
    }), x.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = x.find.attr(e, "value");
                    return null != t ? t : e.text
                }
            },
            select: {
                get: function(e) {
                    var t, n, r = e.options,
                        i = e.selectedIndex,
                        o = "select-one" === e.type || 0 > i,
                        a = o ? null : [],
                        s = o ? i + 1 : r.length,
                        l = 0 > i ? s : o ? i : 0;
                    for (; s > l; l++) {
                        if (n = r[l], !(!n.selected && l !== i || (x.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && x.nodeName(n.parentNode, "optgroup"))) {
                            if (t = x(n).val(), o) {
                                return t
                            }
                            a.push(t)
                        }
                    }
                    return a
                },
                set: function(e, t) {
                    var n, r, i = e.options,
                        o = x.makeArray(t),
                        a = i.length;
                    while (a--) {
                        r = i[a], (r.selected = x.inArray(x(r).val(), o) >= 0) && (n = !0)
                    }
                    return n || (e.selectedIndex = -1), o
                }
            }
        },
        attr: function(e, n, r) {
            var o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) {
                return typeof e.getAttribute === i ? x.prop(e, n, r) : (1 === s && x.isXMLDoc(e) || (n = n.toLowerCase(), o = x.attrHooks[n] || (x.expr.match.bool.test(n) ? X : z)), r === t ? o && "get" in o && null !== (a = o.get(e, n)) ? a : (a = x.find.attr(e, n), null == a ? t : a) : null !== r ? o && "set" in o && (a = o.set(e, r, n)) !== t ? a : (e.setAttribute(n, r + ""), r) : (x.removeAttr(e, n), t))
            }
        },
        removeAttr: function(e, t) {
            var n, r, i = 0,
                o = t && t.match(T);
            if (o && 1 === e.nodeType) {
                while (n = o[i++]) {
                    r = x.propFix[n] || n, x.expr.match.bool.test(n) ? K && Q || !G.test(n) ? e[r] = !1 : e[x.camelCase("default-" + n)] = e[r] = !1 : x.attr(e, n, ""), e.removeAttribute(Q ? n : r)
                }
            }
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!x.support.radioValue && "radio" === t && x.nodeName(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        propFix: {
            "for": "htmlFor",
            "class": "className"
        },
        prop: function(e, n, r) {
            var i, o, a, s = e.nodeType;
            if (e && 3 !== s && 8 !== s && 2 !== s) {
                return a = 1 !== s || !x.isXMLDoc(e), a && (n = x.propFix[n] || n, o = x.propHooks[n]), r !== t ? o && "set" in o && (i = o.set(e, r, n)) !== t ? i : e[n] = r : o && "get" in o && null !== (i = o.get(e, n)) ? i : e[n]
            }
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = x.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : Y.test(e.nodeName) || J.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        }
    }), X = {
        set: function(e, t, n) {
            return t === !1 ? x.removeAttr(e, n) : K && Q || !G.test(n) ? e.setAttribute(!Q && x.propFix[n] || n, n) : e[x.camelCase("default-" + n)] = e[n] = !0, n
        }
    }, x.each(x.expr.match.bool.source.match(/\w+/g), function(e, n) {
        var r = x.expr.attrHandle[n] || x.find.attr;
        x.expr.attrHandle[n] = K && Q || !G.test(n) ? function(e, n, i) {
            var o = x.expr.attrHandle[n],
                a = i ? t : (x.expr.attrHandle[n] = t) != r(e, n, i) ? n.toLowerCase() : null;
            return x.expr.attrHandle[n] = o, a
        } : function(e, n, r) {
            return r ? t : e[x.camelCase("default-" + n)] ? n.toLowerCase() : null
        }
    }), K && Q || (x.attrHooks.value = {
        set: function(e, n, r) {
            return x.nodeName(e, "input") ? (e.defaultValue = n, t) : z && z.set(e, n, r)
        }
    }), Q || (z = {
        set: function(e, n, r) {
            var i = e.getAttributeNode(r);
            return i || e.setAttributeNode(i = e.ownerDocument.createAttribute(r)), i.value = n += "", "value" === r || n === e.getAttribute(r) ? n : t
        }
    }, x.expr.attrHandle.id = x.expr.attrHandle.name = x.expr.attrHandle.coords = function(e, n, r) {
        var i;
        return r ? t : (i = e.getAttributeNode(n)) && "" !== i.value ? i.value : null
    }, x.valHooks.button = {
        get: function(e, n) {
            var r = e.getAttributeNode(n);
            return r && r.specified ? r.value : t
        },
        set: z.set
    }, x.attrHooks.contenteditable = {
        set: function(e, t, n) {
            z.set(e, "" === t ? !1 : t, n)
        }
    }, x.each(["width", "height"], function(e, n) {
        x.attrHooks[n] = {
            set: function(e, r) {
                return "" === r ? (e.setAttribute(n, "auto"), r) : t
            }
        }
    })), x.support.hrefNormalized || x.each(["href", "src"], function(e, t) {
        x.propHooks[t] = {
            get: function(e) {
                return e.getAttribute(t, 4)
            }
        }
    }), x.support.style || (x.attrHooks.style = {
        get: function(e) {
            return e.style.cssText || t
        },
        set: function(e, t) {
            return e.style.cssText = t + ""
        }
    }), x.support.optSelected || (x.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }
    }), x.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        x.propFix[this.toLowerCase()] = this
    }), x.support.enctype || (x.propFix.enctype = "encoding"), x.each(["radio", "checkbox"], function() {
        x.valHooks[this] = {
            set: function(e, n) {
                return x.isArray(n) ? e.checked = x.inArray(x(e).val(), n) >= 0 : t
            }
        }, x.support.checkOn || (x.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    });
    var Z = /^(?:input|select|textarea)$/i,
        et = /^key/,
        tt = /^(?:mouse|contextmenu)|click/,
        nt = /^(?:focusinfocus|focusoutblur)$/,
        rt = /^([^.]*)(?:\.(.+)|)$/;

    function it() {
        return !0
    }

    function ot() {
        return !1
    }

    function at() {
        try {
            return a.activeElement
        } catch (e) {}
    }
    x.event = {
        global: {},
        add: function(e, n, r, o, a) {
            var s, l, u, c, p, f, d, h, g, m, y, v = x._data(e);
            if (v) {
                r.handler && (c = r, r = c.handler, a = c.selector), r.guid || (r.guid = x.guid++), (l = v.events) || (l = v.events = {}), (f = v.handle) || (f = v.handle = function(e) {
                    return typeof x === i || e && x.event.triggered === e.type ? t : x.event.dispatch.apply(f.elem, arguments)
                }, f.elem = e), n = (n || "").match(T) || [""], u = n.length;
                while (u--) {
                    s = rt.exec(n[u]) || [], g = y = s[1], m = (s[2] || "").split(".").sort(), g && (p = x.event.special[g] || {}, g = (a ? p.delegateType : p.bindType) || g, p = x.event.special[g] || {}, d = x.extend({
                        type: g,
                        origType: y,
                        data: o,
                        handler: r,
                        guid: r.guid,
                        selector: a,
                        needsContext: a && x.expr.match.needsContext.test(a),
                        namespace: m.join(".")
                    }, c), (h = l[g]) || (h = l[g] = [], h.delegateCount = 0, p.setup && p.setup.call(e, o, m, f) !== !1 || (e.addEventListener ? e.addEventListener(g, f, !1) : e.attachEvent && e.attachEvent("on" + g, f))), p.add && (p.add.call(e, d), d.handler.guid || (d.handler.guid = r.guid)), a ? h.splice(h.delegateCount++, 0, d) : h.push(d), x.event.global[g] = !0)
                }
                e = null
            }
        },
        remove: function(e, t, n, r, i) {
            var o, a, s, l, u, c, p, f, d, h, g, m = x.hasData(e) && x._data(e);
            if (m && (c = m.events)) {
                t = (t || "").match(T) || [""], u = t.length;
                while (u--) {
                    if (s = rt.exec(t[u]) || [], d = g = s[1], h = (s[2] || "").split(".").sort(), d) {
                        p = x.event.special[d] || {}, d = (r ? p.delegateType : p.bindType) || d, f = c[d] || [], s = s[2] && RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), l = o = f.length;
                        while (o--) {
                            a = f[o], !i && g !== a.origType || n && n.guid !== a.guid || s && !s.test(a.namespace) || r && r !== a.selector && ("**" !== r || !a.selector) || (f.splice(o, 1), a.selector && f.delegateCount--, p.remove && p.remove.call(e, a))
                        }
                        l && !f.length && (p.teardown && p.teardown.call(e, h, m.handle) !== !1 || x.removeEvent(e, d, m.handle), delete c[d])
                    } else {
                        for (d in c) {
                            x.event.remove(e, d + t[u], n, r, !0)
                        }
                    }
                }
                x.isEmptyObject(c) && (delete m.handle, x._removeData(e, "events"))
            }
        },
        trigger: function(n, r, i, o) {
            var s, l, u, c, p, f, d, h = [i || a],
                g = v.call(n, "type") ? n.type : n,
                m = v.call(n, "namespace") ? n.namespace.split(".") : [];
            if (u = f = i = i || a, 3 !== i.nodeType && 8 !== i.nodeType && !nt.test(g + x.event.triggered) && (g.indexOf(".") >= 0 && (m = g.split("."), g = m.shift(), m.sort()), l = 0 > g.indexOf(":") && "on" + g, n = n[x.expando] ? n : new x.Event(g, "object" == typeof n && n), n.isTrigger = o ? 2 : 3, n.namespace = m.join("."), n.namespace_re = n.namespace ? RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, n.result = t, n.target || (n.target = i), r = null == r ? [n] : x.makeArray(r, [n]), p = x.event.special[g] || {}, o || !p.trigger || p.trigger.apply(i, r) !== !1)) {
                if (!o && !p.noBubble && !x.isWindow(i)) {
                    for (c = p.delegateType || g, nt.test(c + g) || (u = u.parentNode); u; u = u.parentNode) {
                        h.push(u), f = u
                    }
                    f === (i.ownerDocument || a) && h.push(f.defaultView || f.parentWindow || e)
                }
                d = 0;
                while ((u = h[d++]) && !n.isPropagationStopped()) {
                    n.type = d > 1 ? c : p.bindType || g, s = (x._data(u, "events") || {})[n.type] && x._data(u, "handle"), s && s.apply(u, r), s = l && u[l], s && x.acceptData(u) && s.apply && s.apply(u, r) === !1 && n.preventDefault()
                }
                if (n.type = g, !o && !n.isDefaultPrevented() && (!p._default || p._default.apply(h.pop(), r) === !1) && x.acceptData(i) && l && i[g] && !x.isWindow(i)) {
                    f = i[l], f && (i[l] = null), x.event.triggered = g;
                    try {
                        i[g]()
                    } catch (y) {}
                    x.event.triggered = t, f && (i[l] = f)
                }
                return n.result
            }
        },
        dispatch: function(e) {
            e = x.event.fix(e);
            var n, r, i, o, a, s = [],
                l = g.call(arguments),
                u = (x._data(this, "events") || {})[e.type] || [],
                c = x.event.special[e.type] || {};
            if (l[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
                s = x.event.handlers.call(this, e, u), n = 0;
                while ((o = s[n++]) && !e.isPropagationStopped()) {
                    e.currentTarget = o.elem, a = 0;
                    while ((i = o.handlers[a++]) && !e.isImmediatePropagationStopped()) {
                        (!e.namespace_re || e.namespace_re.test(i.namespace)) && (e.handleObj = i, e.data = i.data, r = ((x.event.special[i.origType] || {}).handle || i.handler).apply(o.elem, l), r !== t && (e.result = r) === !1 && (e.preventDefault(), e.stopPropagation()))
                    }
                }
                return c.postDispatch && c.postDispatch.call(this, e), e.result
            }
        },
        handlers: function(e, n) {
            var r, i, o, a, s = [],
                l = n.delegateCount,
                u = e.target;
            if (l && u.nodeType && (!e.button || "click" !== e.type)) {
                for (; u != this; u = u.parentNode || this) {
                    if (1 === u.nodeType && (u.disabled !== !0 || "click" !== e.type)) {
                        for (o = [], a = 0; l > a; a++) {
                            i = n[a], r = i.selector + " ", o[r] === t && (o[r] = i.needsContext ? x(r, this).index(u) >= 0 : x.find(r, this, null, [u]).length), o[r] && o.push(i)
                        }
                        o.length && s.push({
                            elem: u,
                            handlers: o
                        })
                    }
                }
            }
            return n.length > l && s.push({
                elem: this,
                handlers: n.slice(l)
            }), s
        },
        fix: function(e) {
            if (e[x.expando]) {
                return e
            }
            var t, n, r, i = e.type,
                o = e,
                s = this.fixHooks[i];
            s || (this.fixHooks[i] = s = tt.test(i) ? this.mouseHooks : et.test(i) ? this.keyHooks : {}), r = s.props ? this.props.concat(s.props) : this.props, e = new x.Event(o), t = r.length;
            while (t--) {
                n = r[t], e[n] = o[n]
            }
            return e.target || (e.target = o.srcElement || a), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, o) : e
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(e, t) {
                return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(e, n) {
                var r, i, o, s = n.button,
                    l = n.fromElement;
                return null == e.pageX && null != n.clientX && (i = e.target.ownerDocument || a, o = i.documentElement, r = i.body, e.pageX = n.clientX + (o && o.scrollLeft || r && r.scrollLeft || 0) - (o && o.clientLeft || r && r.clientLeft || 0), e.pageY = n.clientY + (o && o.scrollTop || r && r.scrollTop || 0) - (o && o.clientTop || r && r.clientTop || 0)), !e.relatedTarget && l && (e.relatedTarget = l === e.target ? n.toElement : l), e.which || s === t || (e.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0), e
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== at() && this.focus) {
                        try {
                            return this.focus(), !1
                        } catch (e) {}
                    }
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    return this === at() && this.blur ? (this.blur(), !1) : t
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    return x.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : t
                },
                _default: function(e) {
                    return x.nodeName(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    e.result !== t && (e.originalEvent.returnValue = e.result)
                }
            }
        },
        simulate: function(e, t, n, r) {
            var i = x.extend(new x.Event, n, {
                type: e,
                isSimulated: !0,
                originalEvent: {}
            });
            r ? x.event.trigger(i, null, t) : x.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
        }
    }, x.removeEvent = a.removeEventListener ? function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    } : function(e, t, n) {
        var r = "on" + t;
        e.detachEvent && (typeof e[r] === i && (e[r] = null), e.detachEvent(r, n))
    }, x.Event = function(e, n) {
        return this instanceof x.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? it : ot) : this.type = e, n && x.extend(this, n), this.timeStamp = e && e.timeStamp || x.now(), this[x.expando] = !0, t) : new x.Event(e, n)
    }, x.Event.prototype = {
        isDefaultPrevented: ot,
        isPropagationStopped: ot,
        isImmediatePropagationStopped: ot,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = it, e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = it, e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = it, this.stopPropagation()
        }
    }, x.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout"
    }, function(e, t) {
        x.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function(e) {
                var n, r = this,
                    i = e.relatedTarget,
                    o = e.handleObj;
                return (!i || i !== r && !x.contains(r, i)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
            }
        }
    }), x.support.submitBubbles || (x.event.special.submit = {
        setup: function() {
            return x.nodeName(this, "form") ? !1 : (x.event.add(this, "click._submit keypress._submit", function(e) {
                var n = e.target,
                    r = x.nodeName(n, "input") || x.nodeName(n, "button") ? n.form : t;
                r && !x._data(r, "submitBubbles") && (x.event.add(r, "submit._submit", function(e) {
                    e._submit_bubble = !0
                }), x._data(r, "submitBubbles", !0))
            }), t)
        },
        postDispatch: function(e) {
            e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && x.event.simulate("submit", this.parentNode, e, !0))
        },
        teardown: function() {
            return x.nodeName(this, "form") ? !1 : (x.event.remove(this, "._submit"), t)
        }
    }), x.support.changeBubbles || (x.event.special.change = {
        setup: function() {
            return Z.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (x.event.add(this, "propertychange._change", function(e) {
                "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
            }), x.event.add(this, "click._change", function(e) {
                this._just_changed && !e.isTrigger && (this._just_changed = !1), x.event.simulate("change", this, e, !0)
            })), !1) : (x.event.add(this, "beforeactivate._change", function(e) {
                var t = e.target;
                Z.test(t.nodeName) && !x._data(t, "changeBubbles") && (x.event.add(t, "change._change", function(e) {
                    !this.parentNode || e.isSimulated || e.isTrigger || x.event.simulate("change", this.parentNode, e, !0)
                }), x._data(t, "changeBubbles", !0))
            }), t)
        },
        handle: function(e) {
            var n = e.target;
            return this !== n || e.isSimulated || e.isTrigger || "radio" !== n.type && "checkbox" !== n.type ? e.handleObj.handler.apply(this, arguments) : t
        },
        teardown: function() {
            return x.event.remove(this, "._change"), !Z.test(this.nodeName)
        }
    }), x.support.focusinBubbles || x.each({
        focus: "focusin",
        blur: "focusout"
    }, function(e, t) {
        var n = 0,
            r = function(e) {
                x.event.simulate(t, e.target, x.event.fix(e), !0)
            };
        x.event.special[t] = {
            setup: function() {
                0 === n++ && a.addEventListener(e, r, !0)
            },
            teardown: function() {
                0 === --n && a.removeEventListener(e, r, !0)
            }
        }
    }), x.fn.extend({
        on: function(e, n, r, i, o) {
            var a, s;
            if ("object" == typeof e) {
                "string" != typeof n && (r = r || n, n = t);
                for (a in e) {
                    this.on(a, n, r, e[a], o)
                }
                return this
            }
            if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) {
                i = ot
            } else {
                if (!i) {
                    return this
                }
            }
            return 1 === o && (s = i, i = function(e) {
                return x().off(e), s.apply(this, arguments)
            }, i.guid = s.guid || (s.guid = x.guid++)), this.each(function() {
                x.event.add(this, e, i, r, n)
            })
        },
        one: function(e, t, n, r) {
            return this.on(e, t, n, r, 1)
        },
        off: function(e, n, r) {
            var i, o;
            if (e && e.preventDefault && e.handleObj) {
                return i = e.handleObj, x(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this
            }
            if ("object" == typeof e) {
                for (o in e) {
                    this.off(o, n, e[o])
                }
                return this
            }
            return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = ot), this.each(function() {
                x.event.remove(this, e, r, n)
            })
        },
        trigger: function(e, t) {
            return this.each(function() {
                x.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, n) {
            var r = this[0];
            return r ? x.event.trigger(e, n, r, !0) : t
        }
    });
    var st = /^.[^:#\[\.,]*$/,
        lt = /^(?:parents|prev(?:Until|All))/,
        ut = x.expr.match.needsContext,
        ct = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };
    x.fn.extend({
        find: function(e) {
            var t, n = [],
                r = this,
                i = r.length;
            if ("string" != typeof e) {
                return this.pushStack(x(e).filter(function() {
                    for (t = 0; i > t; t++) {
                        if (x.contains(r[t], this)) {
                            return !0
                        }
                    }
                }))
            }
            for (t = 0; i > t; t++) {
                x.find(e, r[t], n)
            }
            return n = this.pushStack(i > 1 ? x.unique(n) : n), n.selector = this.selector ? this.selector + " " + e : e, n
        },
        has: function(e) {
            var t, n = x(e, this),
                r = n.length;
            return this.filter(function() {
                for (t = 0; r > t; t++) {
                    if (x.contains(this, n[t])) {
                        return !0
                    }
                }
            })
        },
        not: function(e) {
            return this.pushStack(ft(this, e || [], !0))
        },
        filter: function(e) {
            return this.pushStack(ft(this, e || [], !1))
        },
        is: function(e) {
            return !!ft(this, "string" == typeof e && ut.test(e) ? x(e) : e || [], !1).length
        },
        closest: function(e, t) {
            var n, r = 0,
                i = this.length,
                o = [],
                a = ut.test(e) || "string" != typeof e ? x(e, t || this.context) : 0;
            for (; i > r; r++) {
                for (n = this[r]; n && n !== t; n = n.parentNode) {
                    if (11 > n.nodeType && (a ? a.index(n) > -1 : 1 === n.nodeType && x.find.matchesSelector(n, e))) {
                        n = o.push(n);
                        break
                    }
                }
            }
            return this.pushStack(o.length > 1 ? x.unique(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? x.inArray(this[0], x(e)) : x.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            var n = "string" == typeof e ? x(e, t) : x.makeArray(e && e.nodeType ? [e] : e),
                r = x.merge(this.get(), n);
            return this.pushStack(x.unique(r))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    });

    function pt(e, t) {
        do {
            e = e[t]
        } while (e && 1 !== e.nodeType);
        return e
    }
    x.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return x.dir(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return x.dir(e, "parentNode", n)
        },
        next: function(e) {
            return pt(e, "nextSibling")
        },
        prev: function(e) {
            return pt(e, "previousSibling")
        },
        nextAll: function(e) {
            return x.dir(e, "nextSibling")
        },
        prevAll: function(e) {
            return x.dir(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return x.dir(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return x.dir(e, "previousSibling", n)
        },
        siblings: function(e) {
            return x.sibling((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return x.sibling(e.firstChild)
        },
        contents: function(e) {
            return x.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : x.merge([], e.childNodes)
        }
    }, function(e, t) {
        x.fn[e] = function(n, r) {
            var i = x.map(this, t, n);
            return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = x.filter(r, i)), this.length > 1 && (ct[e] || (i = x.unique(i)), lt.test(e) && (i = i.reverse())), this.pushStack(i)
        }
    }), x.extend({
        filter: function(e, t, n) {
            var r = t[0];
            return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? x.find.matchesSelector(r, e) ? [r] : [] : x.find.matches(e, x.grep(t, function(e) {
                return 1 === e.nodeType
            }))
        },
        dir: function(e, n, r) {
            var i = [],
                o = e[n];
            while (o && 9 !== o.nodeType && (r === t || 1 !== o.nodeType || !x(o).is(r))) {
                1 === o.nodeType && i.push(o), o = o[n]
            }
            return i
        },
        sibling: function(e, t) {
            var n = [];
            for (; e; e = e.nextSibling) {
                1 === e.nodeType && e !== t && n.push(e)
            }
            return n
        }
    });

    function ft(e, t, n) {
        if (x.isFunction(t)) {
            return x.grep(e, function(e, r) {
                return !!t.call(e, r, e) !== n
            })
        }
        if (t.nodeType) {
            return x.grep(e, function(e) {
                return e === t !== n
            })
        }
        if ("string" == typeof t) {
            if (st.test(t)) {
                return x.filter(t, e, n)
            }
            t = x.filter(t, e)
        }
        return x.grep(e, function(e) {
            return x.inArray(e, t) >= 0 !== n
        })
    }

    function dt(e) {
        var t = ht.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement) {
            while (t.length) {
                n.createElement(t.pop())
            }
        }
        return n
    }
    var ht = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        gt = / jQuery\d+="(?:null|\d+)"/g,
        mt = RegExp("<(?:" + ht + ")[\\s/>]", "i"),
        yt = /^\s+/,
        vt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        bt = /<([\w:]+)/,
        xt = /<tbody/i,
        wt = /<|&#?\w+;/,
        Tt = /<(?:script|style|link)/i,
        Ct = /^(?:checkbox|radio)$/i,
        Nt = /checked\s*(?:[^=]|=\s*.checked.)/i,
        kt = /^$|\/(?:java|ecma)script/i,
        Et = /^true\/(.*)/,
        St = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        At = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: x.support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
        },
        jt = dt(a),
        Dt = jt.appendChild(a.createElement("div"));
    At.optgroup = At.option, At.tbody = At.tfoot = At.colgroup = At.caption = At.thead, At.th = At.td, x.fn.extend({
        text: function(e) {
            return x.access(this, function(e) {
                return e === t ? x.text(this) : this.empty().append((this[0] && this[0].ownerDocument || a).createTextNode(e))
            }, null, e, arguments.length)
        },
        append: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Lt(this, e);
                    t.appendChild(e)
                }
            })
        },
        prepend: function() {
            return this.domManip(arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Lt(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return this.domManip(arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        remove: function(e, t) {
            var n, r = e ? x.filter(e, this) : this,
                i = 0;
            for (; null != (n = r[i]); i++) {
                t || 1 !== n.nodeType || x.cleanData(Ft(n)), n.parentNode && (t && x.contains(n.ownerDocument, n) && _t(Ft(n, "script")), n.parentNode.removeChild(n))
            }
            return this
        },
        empty: function() {
            var e, t = 0;
            for (; null != (e = this[t]); t++) {
                1 === e.nodeType && x.cleanData(Ft(e, !1));
                while (e.firstChild) {
                    e.removeChild(e.firstChild)
                }
                e.options && x.nodeName(e, "select") && (e.options.length = 0)
            }
            return this
        },
        clone: function(e, t) {
            return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                return x.clone(this, e, t)
            })
        },
        html: function(e) {
            return x.access(this, function(e) {
                var n = this[0] || {},
                    r = 0,
                    i = this.length;
                if (e === t) {
                    return 1 === n.nodeType ? n.innerHTML.replace(gt, "") : t
                }
                if (!("string" != typeof e || Tt.test(e) || !x.support.htmlSerialize && mt.test(e) || !x.support.leadingWhitespace && yt.test(e) || At[(bt.exec(e) || ["", ""])[1].toLowerCase()])) {
                    e = e.replace(vt, "<$1></$2>");
                    try {
                        for (; i > r; r++) {
                            n = this[r] || {}, 1 === n.nodeType && (x.cleanData(Ft(n, !1)), n.innerHTML = e)
                        }
                        n = 0
                    } catch (o) {}
                }
                n && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var e = x.map(this, function(e) {
                    return [e.nextSibling, e.parentNode]
                }),
                t = 0;
            return this.domManip(arguments, function(n) {
                var r = e[t++],
                    i = e[t++];
                i && (r && r.parentNode !== i && (r = this.nextSibling), x(this).remove(), i.insertBefore(n, r))
            }, !0), t ? this : this.remove()
        },
        detach: function(e) {
            return this.remove(e, !0)
        },
        domManip: function(e, t, n) {
            e = d.apply([], e);
            var r, i, o, a, s, l, u = 0,
                c = this.length,
                p = this,
                f = c - 1,
                h = e[0],
                g = x.isFunction(h);
            if (g || !(1 >= c || "string" != typeof h || x.support.checkClone) && Nt.test(h)) {
                return this.each(function(r) {
                    var i = p.eq(r);
                    g && (e[0] = h.call(this, r, i.html())), i.domManip(e, t, n)
                })
            }
            if (c && (l = x.buildFragment(e, this[0].ownerDocument, !1, !n && this), r = l.firstChild, 1 === l.childNodes.length && (l = r), r)) {
                for (a = x.map(Ft(l, "script"), Ht), o = a.length; c > u; u++) {
                    i = l, u !== f && (i = x.clone(i, !0, !0), o && x.merge(a, Ft(i, "script"))), t.call(this[u], i, u)
                }
                if (o) {
                    for (s = a[a.length - 1].ownerDocument, x.map(a, qt), u = 0; o > u; u++) {
                        i = a[u], kt.test(i.type || "") && !x._data(i, "globalEval") && x.contains(s, i) && (i.src ? x._evalUrl(i.src) : x.globalEval((i.text || i.textContent || i.innerHTML || "").replace(St, "")))
                    }
                }
                l = r = null
            }
            return this
        }
    });

    function Lt(e, t) {
        return x.nodeName(e, "table") && x.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
    }

    function Ht(e) {
        return e.type = (null !== x.find.attr(e, "type")) + "/" + e.type, e
    }

    function qt(e) {
        var t = Et.exec(e.type);
        return t ? e.type = t[1] : e.removeAttribute("type"), e
    }

    function _t(e, t) {
        var n, r = 0;
        for (; null != (n = e[r]); r++) {
            x._data(n, "globalEval", !t || x._data(t[r], "globalEval"))
        }
    }

    function Mt(e, t) {
        if (1 === t.nodeType && x.hasData(e)) {
            var n, r, i, o = x._data(e),
                a = x._data(t, o),
                s = o.events;
            if (s) {
                delete a.handle, a.events = {};
                for (n in s) {
                    for (r = 0, i = s[n].length; i > r; r++) {
                        x.event.add(t, n, s[n][r])
                    }
                }
            }
            a.data && (a.data = x.extend({}, a.data))
        }
    }

    function Ot(e, t) {
        var n, r, i;
        if (1 === t.nodeType) {
            if (n = t.nodeName.toLowerCase(), !x.support.noCloneEvent && t[x.expando]) {
                i = x._data(t);
                for (r in i.events) {
                    x.removeEvent(t, r, i.handle)
                }
                t.removeAttribute(x.expando)
            }
            "script" === n && t.text !== e.text ? (Ht(t).text = e.text, qt(t)) : "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), x.support.html5Clone && e.innerHTML && !x.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Ct.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.defaultSelected = t.selected = e.defaultSelected : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
        }
    }
    x.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, t) {
        x.fn[e] = function(e) {
            var n, r = 0,
                i = [],
                o = x(e),
                a = o.length - 1;
            for (; a >= r; r++) {
                n = r === a ? this : this.clone(!0), x(o[r])[t](n), h.apply(i, n.get())
            }
            return this.pushStack(i)
        }
    });

    function Ft(e, n) {
        var r, o, a = 0,
            s = typeof e.getElementsByTagName !== i ? e.getElementsByTagName(n || "*") : typeof e.querySelectorAll !== i ? e.querySelectorAll(n || "*") : t;
        if (!s) {
            for (s = [], r = e.childNodes || e; null != (o = r[a]); a++) {
                !n || x.nodeName(o, n) ? s.push(o) : x.merge(s, Ft(o, n))
            }
        }
        return n === t || n && x.nodeName(e, n) ? x.merge([e], s) : s
    }

    function Bt(e) {
        Ct.test(e.type) && (e.defaultChecked = e.checked)
    }
    x.extend({
        clone: function(e, t, n) {
            var r, i, o, a, s, l = x.contains(e.ownerDocument, e);
            if (x.support.html5Clone || x.isXMLDoc(e) || !mt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (Dt.innerHTML = e.outerHTML, Dt.removeChild(o = Dt.firstChild)), !(x.support.noCloneEvent && x.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || x.isXMLDoc(e))) {
                for (r = Ft(o), s = Ft(e), a = 0; null != (i = s[a]); ++a) {
                    r[a] && Ot(i, r[a])
                }
            }
            if (t) {
                if (n) {
                    for (s = s || Ft(e), r = r || Ft(o), a = 0; null != (i = s[a]); a++) {
                        Mt(i, r[a])
                    }
                } else {
                    Mt(e, o)
                }
            }
            return r = Ft(o, "script"), r.length > 0 && _t(r, !l && Ft(e, "script")), r = s = i = null, o
        },
        buildFragment: function(e, t, n, r) {
            var i, o, a, s, l, u, c, p = e.length,
                f = dt(t),
                d = [],
                h = 0;
            for (; p > h; h++) {
                if (o = e[h], o || 0 === o) {
                    if ("object" === x.type(o)) {
                        x.merge(d, o.nodeType ? [o] : o)
                    } else {
                        if (wt.test(o)) {
                            s = s || f.appendChild(t.createElement("div")), l = (bt.exec(o) || ["", ""])[1].toLowerCase(), c = At[l] || At._default, s.innerHTML = c[1] + o.replace(vt, "<$1></$2>") + c[2], i = c[0];
                            while (i--) {
                                s = s.lastChild
                            }
                            if (!x.support.leadingWhitespace && yt.test(o) && d.push(t.createTextNode(yt.exec(o)[0])), !x.support.tbody) {
                                o = "table" !== l || xt.test(o) ? "<table>" !== c[1] || xt.test(o) ? 0 : s : s.firstChild, i = o && o.childNodes.length;
                                while (i--) {
                                    x.nodeName(u = o.childNodes[i], "tbody") && !u.childNodes.length && o.removeChild(u)
                                }
                            }
                            x.merge(d, s.childNodes), s.textContent = "";
                            while (s.firstChild) {
                                s.removeChild(s.firstChild)
                            }
                            s = f.lastChild
                        } else {
                            d.push(t.createTextNode(o))
                        }
                    }
                }
            }
            s && f.removeChild(s), x.support.appendChecked || x.grep(Ft(d, "input"), Bt), h = 0;
            while (o = d[h++]) {
                if ((!r || -1 === x.inArray(o, r)) && (a = x.contains(o.ownerDocument, o), s = Ft(f.appendChild(o), "script"), a && _t(s), n)) {
                    i = 0;
                    while (o = s[i++]) {
                        kt.test(o.type || "") && n.push(o)
                    }
                }
            }
            return s = null, f
        },
        cleanData: function(e, t) {
            var n, r, o, a, s = 0,
                l = x.expando,
                u = x.cache,
                c = x.support.deleteExpando,
                f = x.event.special;
            for (; null != (n = e[s]); s++) {
                if ((t || x.acceptData(n)) && (o = n[l], a = o && u[o])) {
                    if (a.events) {
                        for (r in a.events) {
                            f[r] ? x.event.remove(n, r) : x.removeEvent(n, r, a.handle)
                        }
                    }
                    u[o] && (delete u[o], c ? delete n[l] : typeof n.removeAttribute !== i ? n.removeAttribute(l) : n[l] = null, p.push(o))
                }
            }
        },
        _evalUrl: function(e) {
            return x.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                "throws": !0
            })
        }
    }), x.fn.extend({
        wrapAll: function(e) {
            if (x.isFunction(e)) {
                return this.each(function(t) {
                    x(this).wrapAll(e.call(this, t))
                })
            }
            if (this[0]) {
                var t = x(e, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                    var e = this;
                    while (e.firstChild && 1 === e.firstChild.nodeType) {
                        e = e.firstChild
                    }
                    return e
                }).append(this)
            }
            return this
        },
        wrapInner: function(e) {
            return x.isFunction(e) ? this.each(function(t) {
                x(this).wrapInner(e.call(this, t))
            }) : this.each(function() {
                var t = x(this),
                    n = t.contents();
                n.length ? n.wrapAll(e) : t.append(e)
            })
        },
        wrap: function(e) {
            var t = x.isFunction(e);
            return this.each(function(n) {
                x(this).wrapAll(t ? e.call(this, n) : e)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                x.nodeName(this, "body") || x(this).replaceWith(this.childNodes)
            }).end()
        }
    });
    var Pt, Rt, Wt, $t = /alpha\([^)]*\)/i,
        It = /opacity\s*=\s*([^)]*)/,
        zt = /^(top|right|bottom|left)$/,
        Xt = /^(none|table(?!-c[ea]).+)/,
        Ut = /^margin/,
        Vt = RegExp("^(" + w + ")(.*)$", "i"),
        Yt = RegExp("^(" + w + ")(?!px)[a-z%]+$", "i"),
        Jt = RegExp("^([+-])=(" + w + ")", "i"),
        Gt = {
            BODY: "block"
        },
        Qt = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Kt = {
            letterSpacing: 0,
            fontWeight: 400
        },
        Zt = ["Top", "Right", "Bottom", "Left"],
        en = ["Webkit", "O", "Moz", "ms"];

    function tn(e, t) {
        if (t in e) {
            return t
        }
        var n = t.charAt(0).toUpperCase() + t.slice(1),
            r = t,
            i = en.length;
        while (i--) {
            if (t = en[i] + n, t in e) {
                return t
            }
        }
        return r
    }

    function nn(e, t) {
        return e = t || e, "none" === x.css(e, "display") || !x.contains(e.ownerDocument, e)
    }

    function rn(e, t) {
        var n, r, i, o = [],
            a = 0,
            s = e.length;
        for (; s > a; a++) {
            r = e[a], r.style && (o[a] = x._data(r, "olddisplay"), n = r.style.display, t ? (o[a] || "none" !== n || (r.style.display = ""), "" === r.style.display && nn(r) && (o[a] = x._data(r, "olddisplay", ln(r.nodeName)))) : o[a] || (i = nn(r), (n && "none" !== n || !i) && x._data(r, "olddisplay", i ? n : x.css(r, "display"))))
        }
        for (a = 0; s > a; a++) {
            r = e[a], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? o[a] || "" : "none"))
        }
        return e
    }
    x.fn.extend({
        css: function(e, n) {
            return x.access(this, function(e, n, r) {
                var i, o, a = {},
                    s = 0;
                if (x.isArray(n)) {
                    for (o = Rt(e), i = n.length; i > s; s++) {
                        a[n[s]] = x.css(e, n[s], !1, o)
                    }
                    return a
                }
                return r !== t ? x.style(e, n, r) : x.css(e, n)
            }, e, n, arguments.length > 1)
        },
        show: function() {
            return rn(this, !0)
        },
        hide: function() {
            return rn(this)
        },
        toggle: function(e) {
            var t = "boolean" == typeof e;
            return this.each(function() {
                (t ? e : nn(this)) ? x(this).show(): x(this).hide()
            })
        }
    }), x.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Wt(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            "float": x.support.cssFloat ? "cssFloat" : "styleFloat"
        },
        style: function(e, n, r, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o, a, s, l = x.camelCase(n),
                    u = e.style;
                if (n = x.cssProps[l] || (x.cssProps[l] = tn(u, l)), s = x.cssHooks[n] || x.cssHooks[l], r === t) {
                    return s && "get" in s && (o = s.get(e, !1, i)) !== t ? o : u[n]
                }
                if (a = typeof r, "string" === a && (o = Jt.exec(r)) && (r = (o[1] + 1) * o[2] + parseFloat(x.css(e, n)), a = "number"), !(null == r || "number" === a && isNaN(r) || ("number" !== a || x.cssNumber[l] || (r += "px"), x.support.clearCloneStyle || "" !== r || 0 !== n.indexOf("background") || (u[n] = "inherit"), s && "set" in s && (r = s.set(e, r, i)) === t))) {
                    try {
                        u[n] = r
                    } catch (c) {}
                }
            }
        },
        css: function(e, n, r, i) {
            var o, a, s, l = x.camelCase(n);
            return n = x.cssProps[l] || (x.cssProps[l] = tn(e.style, l)), s = x.cssHooks[n] || x.cssHooks[l], s && "get" in s && (a = s.get(e, !0, r)), a === t && (a = Wt(e, n, i)), "normal" === a && n in Kt && (a = Kt[n]), "" === r || r ? (o = parseFloat(a), r === !0 || x.isNumeric(o) ? o || 0 : a) : a
        }
    }), e.getComputedStyle ? (Rt = function(t) {
        return e.getComputedStyle(t, null)
    }, Wt = function(e, n, r) {
        var i, o, a, s = r || Rt(e),
            l = s ? s.getPropertyValue(n) || s[n] : t,
            u = e.style;
        return s && ("" !== l || x.contains(e.ownerDocument, e) || (l = x.style(e, n)), Yt.test(l) && Ut.test(n) && (i = u.width, o = u.minWidth, a = u.maxWidth, u.minWidth = u.maxWidth = u.width = l, l = s.width, u.width = i, u.minWidth = o, u.maxWidth = a)), l
    }) : a.documentElement.currentStyle && (Rt = function(e) {
        return e.currentStyle
    }, Wt = function(e, n, r) {
        var i, o, a, s = r || Rt(e),
            l = s ? s[n] : t,
            u = e.style;
        return null == l && u && u[n] && (l = u[n]), Yt.test(l) && !zt.test(n) && (i = u.left, o = e.runtimeStyle, a = o && o.left, a && (o.left = e.currentStyle.left), u.left = "fontSize" === n ? "1em" : l, l = u.pixelLeft + "px", u.left = i, a && (o.left = a)), "" === l ? "auto" : l
    });

    function on(e, t, n) {
        var r = Vt.exec(t);
        return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
    }

    function an(e, t, n, r, i) {
        var o = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0,
            a = 0;
        for (; 4 > o; o += 2) {
            "margin" === n && (a += x.css(e, n + Zt[o], !0, i)), r ? ("content" === n && (a -= x.css(e, "padding" + Zt[o], !0, i)), "margin" !== n && (a -= x.css(e, "border" + Zt[o] + "Width", !0, i))) : (a += x.css(e, "padding" + Zt[o], !0, i), "padding" !== n && (a += x.css(e, "border" + Zt[o] + "Width", !0, i)))
        }
        return a
    }

    function sn(e, t, n) {
        var r = !0,
            i = "width" === t ? e.offsetWidth : e.offsetHeight,
            o = Rt(e),
            a = x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, o);
        if (0 >= i || null == i) {
            if (i = Wt(e, t, o), (0 > i || null == i) && (i = e.style[t]), Yt.test(i)) {
                return i
            }
            r = a && (x.support.boxSizingReliable || i === e.style[t]), i = parseFloat(i) || 0
        }
        return i + an(e, t, n || (a ? "border" : "content"), r, o) + "px"
    }

    function ln(e) {
        var t = a,
            n = Gt[e];
        return n || (n = un(e, t), "none" !== n && n || (Pt = (Pt || x("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (Pt[0].contentWindow || Pt[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = un(e, t), Pt.detach()), Gt[e] = n), n
    }

    function un(e, t) {
        var n = x(t.createElement(e)).appendTo(t.body),
            r = x.css(n[0], "display");
        return n.remove(), r
    }
    x.each(["height", "width"], function(e, n) {
        x.cssHooks[n] = {
            get: function(e, r, i) {
                return r ? 0 === e.offsetWidth && Xt.test(x.css(e, "display")) ? x.swap(e, Qt, function() {
                    return sn(e, n, i)
                }) : sn(e, n, i) : t
            },
            set: function(e, t, r) {
                var i = r && Rt(e);
                return on(e, t, r ? an(e, n, r, x.support.boxSizing && "border-box" === x.css(e, "boxSizing", !1, i), i) : 0)
            }
        }
    }), x.support.opacity || (x.cssHooks.opacity = {
        get: function(e, t) {
            return It.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? 0.01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
        },
        set: function(e, t) {
            var n = e.style,
                r = e.currentStyle,
                i = x.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                o = r && r.filter || n.filter || "";
            n.zoom = 1, (t >= 1 || "" === t) && "" === x.trim(o.replace($t, "")) && n.removeAttribute && (n.removeAttribute("filter"), "" === t || r && !r.filter) || (n.filter = $t.test(o) ? o.replace($t, i) : o + " " + i)
        }
    }), x(function() {
        x.support.reliableMarginRight || (x.cssHooks.marginRight = {
            get: function(e, n) {
                return n ? x.swap(e, {
                    display: "inline-block"
                }, Wt, [e, "marginRight"]) : t
            }
        }), !x.support.pixelPosition && x.fn.position && x.each(["top", "left"], function(e, n) {
            x.cssHooks[n] = {
                get: function(e, r) {
                    return r ? (r = Wt(e, n), Yt.test(r) ? x(e).position()[n] + "px" : r) : t
                }
            }
        })
    }), x.expr && x.expr.filters && (x.expr.filters.hidden = function(e) {
        return 0 >= e.offsetWidth && 0 >= e.offsetHeight || !x.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || x.css(e, "display"))
    }, x.expr.filters.visible = function(e) {
        return !x.expr.filters.hidden(e)
    }), x.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(e, t) {
        x.cssHooks[e + t] = {
            expand: function(n) {
                var r = 0,
                    i = {},
                    o = "string" == typeof n ? n.split(" ") : [n];
                for (; 4 > r; r++) {
                    i[e + Zt[r] + t] = o[r] || o[r - 2] || o[0]
                }
                return i
            }
        }, Ut.test(e) || (x.cssHooks[e + t].set = on)
    });
    var cn = /%20/g,
        pn = /\[\]$/,
        fn = /\r?\n/g,
        dn = /^(?:submit|button|image|reset|file)$/i,
        hn = /^(?:input|select|textarea|keygen)/i;
    x.fn.extend({
        serialize: function() {
            return x.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = x.prop(this, "elements");
                return e ? x.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !x(this).is(":disabled") && hn.test(this.nodeName) && !dn.test(e) && (this.checked || !Ct.test(e))
            }).map(function(e, t) {
                var n = x(this).val();
                return null == n ? null : x.isArray(n) ? x.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(fn, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(fn, "\r\n")
                }
            }).get()
        }
    }), x.param = function(e, n) {
        var r, i = [],
            o = function(e, t) {
                t = x.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
            };
        if (n === t && (n = x.ajaxSettings && x.ajaxSettings.traditional), x.isArray(e) || e.jquery && !x.isPlainObject(e)) {
            x.each(e, function() {
                o(this.name, this.value)
            })
        } else {
            for (r in e) {
                gn(r, e[r], n, o)
            }
        }
        return i.join("&").replace(cn, "+")
    };

    function gn(e, t, n, r) {
        var i;
        if (x.isArray(t)) {
            x.each(t, function(t, i) {
                n || pn.test(e) ? r(e, i) : gn(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
            })
        } else {
            if (n || "object" !== x.type(t)) {
                r(e, t)
            } else {
                for (i in t) {
                    gn(e + "[" + i + "]", t[i], n, r)
                }
            }
        }
    }
    x.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
        x.fn[t] = function(e, n) {
            return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
        }
    }), x.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        },
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, r) {
            return this.on(t, e, n, r)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    });
    var mn, yn, vn = x.now(),
        bn = /\?/,
        xn = /#.*$/,
        wn = /([?&])_=[^&]*/,
        Tn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        Cn = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Nn = /^(?:GET|HEAD)$/,
        kn = /^\/\//,
        En = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
        Sn = x.fn.load,
        An = {},
        jn = {},
        Dn = "*/".concat("*");
    try {
        yn = o.href
    } catch (Ln) {
        yn = a.createElement("a"), yn.href = "", yn = yn.href
    }
    mn = En.exec(yn.toLowerCase()) || [];

    function Hn(e) {
        return function(t, n) {
            "string" != typeof t && (n = t, t = "*");
            var r, i = 0,
                o = t.toLowerCase().match(T) || [];
            if (x.isFunction(n)) {
                while (r = o[i++]) {
                    "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
                }
            }
        }
    }

    function qn(e, n, r, i) {
        var o = {},
            a = e === jn;

        function s(l) {
            var u;
            return o[l] = !0, x.each(e[l] || [], function(e, l) {
                var c = l(n, r, i);
                return "string" != typeof c || a || o[c] ? a ? !(u = c) : t : (n.dataTypes.unshift(c), s(c), !1)
            }), u
        }
        return s(n.dataTypes[0]) || !o["*"] && s("*")
    }

    function _n(e, n) {
        var r, i, o = x.ajaxSettings.flatOptions || {};
        for (i in n) {
            n[i] !== t && ((o[i] ? e : r || (r = {}))[i] = n[i])
        }
        return r && x.extend(!0, e, r), e
    }
    x.fn.load = function(e, n, r) {
        if ("string" != typeof e && Sn) {
            return Sn.apply(this, arguments)
        }
        var i, o, a, s = this,
            l = e.indexOf(" ");
        return l >= 0 && (i = e.slice(l, e.length), e = e.slice(0, l)), x.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (a = "POST"), s.length > 0 && x.ajax({
            url: e,
            type: a,
            dataType: "html",
            data: n
        }).done(function(e) {
            o = arguments, s.html(i ? x("<div>").append(x.parseHTML(e)).find(i) : e)
        }).complete(r && function(e, t) {
            s.each(r, o || [e.responseText, t, e])
        }), this
    }, x.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        x.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), x.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: yn,
            type: "GET",
            isLocal: Cn.test(mn[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Dn,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /xml/,
                html: /html/,
                json: /json/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": x.parseJSON,
                "text xml": x.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? _n(_n(e, x.ajaxSettings), t) : _n(x.ajaxSettings, e)
        },
        ajaxPrefilter: Hn(An),
        ajaxTransport: Hn(jn),
        ajax: function(e, n) {
            "object" == typeof e && (n = e, e = t), n = n || {};
            var r, i, o, a, s, l, u, c, p = x.ajaxSetup({}, n),
                f = p.context || p,
                d = p.context && (f.nodeType || f.jquery) ? x(f) : x.event,
                h = x.Deferred(),
                g = x.Callbacks("once memory"),
                m = p.statusCode || {},
                y = {},
                v = {},
                b = 0,
                w = "canceled",
                C = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (2 === b) {
                            if (!c) {
                                c = {};
                                while (t = Tn.exec(a)) {
                                    c[t[1].toLowerCase()] = t[2]
                                }
                            }
                            t = c[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return 2 === b ? a : null
                    },
                    setRequestHeader: function(e, t) {
                        var n = e.toLowerCase();
                        return b || (e = v[n] = v[n] || e, y[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return b || (p.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e) {
                            if (2 > b) {
                                for (t in e) {
                                    m[t] = [m[t], e[t]]
                                }
                            } else {
                                C.always(e[C.status])
                            }
                        }
                        return this
                    },
                    abort: function(e) {
                        var t = e || w;
                        return u && u.abort(t), k(0, t), this
                    }
                };
            if (h.promise(C).complete = g.add, C.success = C.done, C.error = C.fail, p.url = ((e || p.url || yn) + "").replace(xn, "").replace(kn, mn[1] + "//"), p.type = n.method || n.type || p.method || p.type, p.dataTypes = x.trim(p.dataType || "*").toLowerCase().match(T) || [""], null == p.crossDomain && (r = En.exec(p.url.toLowerCase()), p.crossDomain = !(!r || r[1] === mn[1] && r[2] === mn[2] && (r[3] || ("http:" === r[1] ? "80" : "443")) === (mn[3] || ("http:" === mn[1] ? "80" : "443")))), p.data && p.processData && "string" != typeof p.data && (p.data = x.param(p.data, p.traditional)), qn(An, p, n, C), 2 === b) {
                return C
            }
            l = p.global, l && 0 === x.active++ && x.event.trigger("ajaxStart"), p.type = p.type.toUpperCase(), p.hasContent = !Nn.test(p.type), o = p.url, p.hasContent || (p.data && (o = p.url += (bn.test(o) ? "&" : "?") + p.data, delete p.data), p.cache === !1 && (p.url = wn.test(o) ? o.replace(wn, "$1_=" + vn++) : o + (bn.test(o) ? "&" : "?") + "_=" + vn++)), p.ifModified && (x.lastModified[o] && C.setRequestHeader("If-Modified-Since", x.lastModified[o]), x.etag[o] && C.setRequestHeader("If-None-Match", x.etag[o])), (p.data && p.hasContent && p.contentType !== !1 || n.contentType) && C.setRequestHeader("Content-Type", p.contentType), C.setRequestHeader("Accept", p.dataTypes[0] && p.accepts[p.dataTypes[0]] ? p.accepts[p.dataTypes[0]] + ("*" !== p.dataTypes[0] ? ", " + Dn + "; q=0.01" : "") : p.accepts["*"]);
            for (i in p.headers) {
                C.setRequestHeader(i, p.headers[i])
            }
            if (p.beforeSend && (p.beforeSend.call(f, C, p) === !1 || 2 === b)) {
                return C.abort()
            }
            w = "abort";
            for (i in {
                    success: 1,
                    error: 1,
                    complete: 1
                }) {
                C[i](p[i])
            }
            if (u = qn(jn, p, n, C)) {
                C.readyState = 1, l && d.trigger("ajaxSend", [C, p]), p.async && p.timeout > 0 && (s = setTimeout(function() {
                    C.abort("timeout")
                }, p.timeout));
                try {
                    b = 1, u.send(y, k)
                } catch (N) {
                    if (!(2 > b)) {
                        throw N
                    }
                    k(-1, N)
                }
            } else {
                k(-1, "No Transport")
            }

            function k(e, n, r, i) {
                var c, y, v, w, T, N = n;
                2 !== b && (b = 2, s && clearTimeout(s), u = t, a = i || "", C.readyState = e > 0 ? 4 : 0, c = e >= 200 && 300 > e || 304 === e, r && (w = Mn(p, C, r)), w = On(p, w, C, c), c ? (p.ifModified && (T = C.getResponseHeader("Last-Modified"), T && (x.lastModified[o] = T), T = C.getResponseHeader("etag"), T && (x.etag[o] = T)), 204 === e || "HEAD" === p.type ? N = "nocontent" : 304 === e ? N = "notmodified" : (N = w.state, y = w.data, v = w.error, c = !v)) : (v = N, (e || !N) && (N = "error", 0 > e && (e = 0))), C.status = e, C.statusText = (n || N) + "", c ? h.resolveWith(f, [y, N, C]) : h.rejectWith(f, [C, N, v]), C.statusCode(m), m = t, l && d.trigger(c ? "ajaxSuccess" : "ajaxError", [C, p, c ? y : v]), g.fireWith(f, [C, N]), l && (d.trigger("ajaxComplete", [C, p]), --x.active || x.event.trigger("ajaxStop")))
            }
            return C
        },
        getJSON: function(e, t, n) {
            return x.get(e, t, n, "json")
        },
        getScript: function(e, n) {
            return x.get(e, t, n, "script")
        }
    }), x.each(["get", "post"], function(e, n) {
        x[n] = function(e, r, i, o) {
            return x.isFunction(r) && (o = o || i, i = r, r = t), x.ajax({
                url: e,
                type: n,
                dataType: o,
                data: r,
                success: i
            })
        }
    });

    function Mn(e, n, r) {
        var i, o, a, s, l = e.contents,
            u = e.dataTypes;
        while ("*" === u[0]) {
            u.shift(), o === t && (o = e.mimeType || n.getResponseHeader("Content-Type"))
        }
        if (o) {
            for (s in l) {
                if (l[s] && l[s].test(o)) {
                    u.unshift(s);
                    break
                }
            }
        }
        if (u[0] in r) {
            a = u[0]
        } else {
            for (s in r) {
                if (!u[0] || e.converters[s + " " + u[0]]) {
                    a = s;
                    break
                }
                i || (i = s)
            }
            a = a || i
        }
        return a ? (a !== u[0] && u.unshift(a), r[a]) : t
    }

    function On(e, t, n, r) {
        var i, o, a, s, l, u = {},
            c = e.dataTypes.slice();
        if (c[1]) {
            for (a in e.converters) {
                u[a.toLowerCase()] = e.converters[a]
            }
        }
        o = c.shift();
        while (o) {
            if (e.responseFields[o] && (n[e.responseFields[o]] = t), !l && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = o, o = c.shift()) {
                if ("*" === o) {
                    o = l
                } else {
                    if ("*" !== l && l !== o) {
                        if (a = u[l + " " + o] || u["* " + o], !a) {
                            for (i in u) {
                                if (s = i.split(" "), s[1] === o && (a = u[l + " " + s[0]] || u["* " + s[0]])) {
                                    a === !0 ? a = u[i] : u[i] !== !0 && (o = s[0], c.unshift(s[1]));
                                    break
                                }
                            }
                        }
                        if (a !== !0) {
                            if (a && e["throws"]) {
                                t = a(t)
                            } else {
                                try {
                                    t = a(t)
                                } catch (p) {
                                    return {
                                        state: "parsererror",
                                        error: a ? p : "No conversion from " + l + " to " + o
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return {
            state: "success",
            data: t
        }
    }
    x.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /(?:java|ecma)script/
        },
        converters: {
            "text script": function(e) {
                return x.globalEval(e), e
            }
        }
    }), x.ajaxPrefilter("script", function(e) {
        e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
    }), x.ajaxTransport("script", function(e) {
        if (e.crossDomain) {
            var n, r = a.head || x("head")[0] || a.documentElement;
            return {
                send: function(t, i) {
                    n = a.createElement("script"), n.async = !0, e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, t) {
                        (t || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, n.parentNode && n.parentNode.removeChild(n), n = null, t || i(200, "success"))
                    }, r.insertBefore(n, r.firstChild)
                },
                abort: function() {
                    n && n.onload(t, !0)
                }
            }
        }
    });
    var Fn = [],
        Bn = /(=)\?(?=&|$)|\?\?/;
    x.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = Fn.pop() || x.expando + "_" + vn++;
            return this[e] = !0, e
        }
    }), x.ajaxPrefilter("json jsonp", function(n, r, i) {
        var o, a, s, l = n.jsonp !== !1 && (Bn.test(n.url) ? "url" : "string" == typeof n.data && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Bn.test(n.data) && "data");
        return l || "jsonp" === n.dataTypes[0] ? (o = n.jsonpCallback = x.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, l ? n[l] = n[l].replace(Bn, "$1" + o) : n.jsonp !== !1 && (n.url += (bn.test(n.url) ? "&" : "?") + n.jsonp + "=" + o), n.converters["script json"] = function() {
            return s || x.error(o + " was not called"), s[0]
        }, n.dataTypes[0] = "json", a = e[o], e[o] = function() {
            s = arguments
        }, i.always(function() {
            e[o] = a, n[o] && (n.jsonpCallback = r.jsonpCallback, Fn.push(o)), s && x.isFunction(a) && a(s[0]), s = a = t
        }), "script") : t
    });
    var Pn, Rn, Wn = 0,
        $n = e.ActiveXObject && function() {
            var e;
            for (e in Pn) {
                Pn[e](t, !0)
            }
        };

    function In() {
        try {
            return new e.XMLHttpRequest
        } catch (t) {}
    }

    function zn() {
        try {
            return new e.ActiveXObject("Microsoft.XMLHTTP")
        } catch (t) {}
    }
    x.ajaxSettings.xhr = e.ActiveXObject ? function() {
        return !this.isLocal && In() || zn()
    } : In, Rn = x.ajaxSettings.xhr(), x.support.cors = !!Rn && "withCredentials" in Rn, Rn = x.support.ajax = !!Rn, Rn && x.ajaxTransport(function(n) {
        if (!n.crossDomain || x.support.cors) {
            var r;
            return {
                send: function(i, o) {
                    var a, s, l = n.xhr();
                    if (n.username ? l.open(n.type, n.url, n.async, n.username, n.password) : l.open(n.type, n.url, n.async), n.xhrFields) {
                        for (s in n.xhrFields) {
                            l[s] = n.xhrFields[s]
                        }
                    }
                    n.mimeType && l.overrideMimeType && l.overrideMimeType(n.mimeType), n.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (s in i) {
                            l.setRequestHeader(s, i[s])
                        }
                    } catch (u) {}
                    l.send(n.hasContent && n.data || null), r = function(e, i) {
                        var s, u, c, p;
                        try {
                            if (r && (i || 4 === l.readyState)) {
                                if (r = t, a && (l.onreadystatechange = x.noop, $n && delete Pn[a]), i) {
                                    4 !== l.readyState && l.abort()
                                } else {
                                    p = {}, s = l.status, u = l.getAllResponseHeaders(), "string" == typeof l.responseText && (p.text = l.responseText);
                                    try {
                                        c = l.statusText
                                    } catch (f) {
                                        c = ""
                                    }
                                    s || !n.isLocal || n.crossDomain ? 1223 === s && (s = 204) : s = p.text ? 200 : 404
                                }
                            }
                        } catch (d) {
                            i || o(-1, d)
                        }
                        p && o(s, c, p, u)
                    }, n.async ? 4 === l.readyState ? setTimeout(r) : (a = ++Wn, $n && (Pn || (Pn = {}, x(e).unload($n)), Pn[a] = r), l.onreadystatechange = r) : r()
                },
                abort: function() {
                    r && r(t, !0)
                }
            }
        }
    });
    var Xn, Un, Vn = /^(?:toggle|show|hide)$/,
        Yn = RegExp("^(?:([+-])=|)(" + w + ")([a-z%]*)$", "i"),
        Jn = /queueHooks$/,
        Gn = [nr],
        Qn = {
            "*": [function(e, t) {
                var n = this.createTween(e, t),
                    r = n.cur(),
                    i = Yn.exec(t),
                    o = i && i[3] || (x.cssNumber[e] ? "" : "px"),
                    a = (x.cssNumber[e] || "px" !== o && +r) && Yn.exec(x.css(n.elem, e)),
                    s = 1,
                    l = 20;
                if (a && a[3] !== o) {
                    o = o || a[3], i = i || [], a = +r || 1;
                    do {
                        s = s || ".5", a /= s, x.style(n.elem, e, a + o)
                    } while (s !== (s = n.cur() / r) && 1 !== s && --l)
                }
                return i && (n.unit = o, n.start = +a || +r || 0, n.end = i[1] ? a + (i[1] + 1) * i[2] : +i[2]), n
            }]
        };

    function Kn() {
        return setTimeout(function() {
            Xn = t
        }), Xn = x.now()
    }

    function Zn(e, t, n) {
        var r, i = (Qn[t] || []).concat(Qn["*"]),
            o = 0,
            a = i.length;
        for (; a > o; o++) {
            if (r = i[o].call(n, t, e)) {
                return r
            }
        }
    }

    function er(e, t, n) {
        var r, i, o = 0,
            a = Gn.length,
            s = x.Deferred().always(function() {
                delete l.elem
            }),
            l = function() {
                if (i) {
                    return !1
                }
                var t = Xn || Kn(),
                    n = Math.max(0, u.startTime + u.duration - t),
                    r = n / u.duration || 0,
                    o = 1 - r,
                    a = 0,
                    l = u.tweens.length;
                for (; l > a; a++) {
                    u.tweens[a].run(o)
                }
                return s.notifyWith(e, [u, o, n]), 1 > o && l ? n : (s.resolveWith(e, [u]), !1)
            },
            u = s.promise({
                elem: e,
                props: x.extend({}, t),
                opts: x.extend(!0, {
                    specialEasing: {}
                }, n),
                originalProperties: t,
                originalOptions: n,
                startTime: Xn || Kn(),
                duration: n.duration,
                tweens: [],
                createTween: function(t, n) {
                    var r = x.Tween(e, u.opts, t, n, u.opts.specialEasing[t] || u.opts.easing);
                    return u.tweens.push(r), r
                },
                stop: function(t) {
                    var n = 0,
                        r = t ? u.tweens.length : 0;
                    if (i) {
                        return this
                    }
                    for (i = !0; r > n; n++) {
                        u.tweens[n].run(1)
                    }
                    return t ? s.resolveWith(e, [u, t]) : s.rejectWith(e, [u, t]), this
                }
            }),
            c = u.props;
        for (tr(c, u.opts.specialEasing); a > o; o++) {
            if (r = Gn[o].call(u, e, c, u.opts)) {
                return r
            }
        }
        return x.map(c, Zn, u), x.isFunction(u.opts.start) && u.opts.start.call(e, u), x.fx.timer(x.extend(l, {
            elem: e,
            anim: u,
            queue: u.opts.queue
        })), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
    }

    function tr(e, t) {
        var n, r, i, o, a;
        for (n in e) {
            if (r = x.camelCase(n), i = t[r], o = e[n], x.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), a = x.cssHooks[r], a && "expand" in a) {
                o = a.expand(o), delete e[r];
                for (n in o) {
                    n in e || (e[n] = o[n], t[n] = i)
                }
            } else {
                t[r] = i
            }
        }
    }
    x.Animation = x.extend(er, {
        tweener: function(e, t) {
            x.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
            var n, r = 0,
                i = e.length;
            for (; i > r; r++) {
                n = e[r], Qn[n] = Qn[n] || [], Qn[n].unshift(t)
            }
        },
        prefilter: function(e, t) {
            t ? Gn.unshift(e) : Gn.push(e)
        }
    });

    function nr(e, t, n) {
        var r, i, o, a, s, l, u = this,
            c = {},
            p = e.style,
            f = e.nodeType && nn(e),
            d = x._data(e, "fxshow");
        n.queue || (s = x._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, l = s.empty.fire, s.empty.fire = function() {
            s.unqueued || l()
        }), s.unqueued++, u.always(function() {
            u.always(function() {
                s.unqueued--, x.queue(e, "fx").length || s.empty.fire()
            })
        })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], "inline" === x.css(e, "display") && "none" === x.css(e, "float") && (x.support.inlineBlockNeedsLayout && "inline" !== ln(e.nodeName) ? p.zoom = 1 : p.display = "inline-block")), n.overflow && (p.overflow = "hidden", x.support.shrinkWrapBlocks || u.always(function() {
            p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
        }));
        for (r in t) {
            if (i = t[r], Vn.exec(i)) {
                if (delete t[r], o = o || "toggle" === i, i === (f ? "hide" : "show")) {
                    continue
                }
                c[r] = d && d[r] || x.style(e, r)
            }
        }
        if (!x.isEmptyObject(c)) {
            d ? "hidden" in d && (f = d.hidden) : d = x._data(e, "fxshow", {}), o && (d.hidden = !f), f ? x(e).show() : u.done(function() {
                x(e).hide()
            }), u.done(function() {
                var t;
                x._removeData(e, "fxshow");
                for (t in c) {
                    x.style(e, t, c[t])
                }
            });
            for (r in c) {
                a = Zn(f ? d[r] : 0, r, u), r in d || (d[r] = a.start, f && (a.end = a.start, a.start = "width" === r || "height" === r ? 1 : 0))
            }
        }
    }

    function rr(e, t, n, r, i) {
        return new rr.prototype.init(e, t, n, r, i)
    }
    x.Tween = rr, rr.prototype = {
        constructor: rr,
        init: function(e, t, n, r, i, o) {
            this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (x.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = rr.propHooks[this.prop];
            return e && e.get ? e.get(this) : rr.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = rr.propHooks[this.prop];
            return this.pos = t = this.options.duration ? x.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : rr.propHooks._default.set(this), this
        }
    }, rr.prototype.init.prototype = rr.prototype, rr.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = x.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
            },
            set: function(e) {
                x.fx.step[e.prop] ? x.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[x.cssProps[e.prop]] || x.cssHooks[e.prop]) ? x.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
            }
        }
    }, rr.propHooks.scrollTop = rr.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, x.each(["toggle", "show", "hide"], function(e, t) {
        var n = x.fn[t];
        x.fn[t] = function(e, r, i) {
            return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ir(t, !0), e, r, i)
        }
    }), x.fn.extend({
        fadeTo: function(e, t, n, r) {
            return this.filter(nn).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, r)
        },
        animate: function(e, t, n, r) {
            var i = x.isEmptyObject(e),
                o = x.speed(t, n, r),
                a = function() {
                    var t = er(this, x.extend({}, e), o);
                    a.finish = function() {
                        t.stop(!0)
                    }, (i || x._data(this, "finish")) && t.stop(!0)
                };
            return a.finish = a, i || o.queue === !1 ? this.each(a) : this.queue(o.queue, a)
        },
        stop: function(e, n, r) {
            var i = function(e) {
                var t = e.stop;
                delete e.stop, t(r)
            };
            return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                var t = !0,
                    n = null != e && e + "queueHooks",
                    o = x.timers,
                    a = x._data(this);
                if (n) {
                    a[n] && a[n].stop && i(a[n])
                } else {
                    for (n in a) {
                        a[n] && a[n].stop && Jn.test(n) && i(a[n])
                    }
                }
                for (n = o.length; n--;) {
                    o[n].elem !== this || null != e && o[n].queue !== e || (o[n].anim.stop(r), t = !1, o.splice(n, 1))
                }(t || !r) && x.dequeue(this, e)
            })
        },
        finish: function(e) {
            return e !== !1 && (e = e || "fx"), this.each(function() {
                var t, n = x._data(this),
                    r = n[e + "queue"],
                    i = n[e + "queueHooks"],
                    o = x.timers,
                    a = r ? r.length : 0;
                for (n.finish = !0, x.queue(this, e, []), i && i.cur && i.cur.finish && i.cur.finish.call(this), t = o.length; t--;) {
                    o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1))
                }
                for (t = 0; a > t; t++) {
                    r[t] && r[t].finish && r[t].finish.call(this)
                }
                delete n.finish
            })
        }
    });

    function ir(e, t) {
        var n, r = {
                height: e
            },
            i = 0;
        for (t = t ? 1 : 0; 4 > i; i += 2 - t) {
            n = Zt[i], r["margin" + n] = r["padding" + n] = e
        }
        return t && (r.opacity = r.width = e), r
    }
    x.each({
        slideDown: ir("show"),
        slideUp: ir("hide"),
        slideToggle: ir("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, t) {
        x.fn[e] = function(e, n, r) {
            return this.animate(t, e, n, r)
        }
    }), x.speed = function(e, t, n) {
        var r = e && "object" == typeof e ? x.extend({}, e) : {
            complete: n || !n && t || x.isFunction(e) && e,
            duration: e,
            easing: n && t || t && !x.isFunction(t) && t
        };
        return r.duration = x.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in x.fx.speeds ? x.fx.speeds[r.duration] : x.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
            x.isFunction(r.old) && r.old.call(this), r.queue && x.dequeue(this, r.queue)
        }, r
    }, x.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return 0.5 - Math.cos(e * Math.PI) / 2
        }
    }, x.timers = [], x.fx = rr.prototype.init, x.fx.tick = function() {
        var e, n = x.timers,
            r = 0;
        for (Xn = x.now(); n.length > r; r++) {
            e = n[r], e() || n[r] !== e || n.splice(r--, 1)
        }
        n.length || x.fx.stop(), Xn = t
    }, x.fx.timer = function(e) {
        e() && x.timers.push(e) && x.fx.start()
    }, x.fx.interval = 13, x.fx.start = function() {
        Un || (Un = setInterval(x.fx.tick, x.fx.interval))
    }, x.fx.stop = function() {
        clearInterval(Un), Un = null
    }, x.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, x.fx.step = {}, x.expr && x.expr.filters && (x.expr.filters.animated = function(e) {
        return x.grep(x.timers, function(t) {
            return e === t.elem
        }).length
    }), x.fn.offset = function(e) {
        if (arguments.length) {
            return e === t ? this : this.each(function(t) {
                x.offset.setOffset(this, e, t)
            })
        }
        var n, r, o = {
                top: 0,
                left: 0
            },
            a = this[0],
            s = a && a.ownerDocument;
        if (s) {
            return n = s.documentElement, x.contains(n, a) ? (typeof a.getBoundingClientRect !== i && (o = a.getBoundingClientRect()), r = or(s), {
                top: o.top + (r.pageYOffset || n.scrollTop) - (n.clientTop || 0),
                left: o.left + (r.pageXOffset || n.scrollLeft) - (n.clientLeft || 0)
            }) : o
        }
    }, x.offset = {
        setOffset: function(e, t, n) {
            var r = x.css(e, "position");
            "static" === r && (e.style.position = "relative");
            var i = x(e),
                o = i.offset(),
                a = x.css(e, "top"),
                s = x.css(e, "left"),
                l = ("absolute" === r || "fixed" === r) && x.inArray("auto", [a, s]) > -1,
                u = {},
                c = {},
                p, f;
            l ? (c = i.position(), p = c.top, f = c.left) : (p = parseFloat(a) || 0, f = parseFloat(s) || 0), x.isFunction(t) && (t = t.call(e, n, o)), null != t.top && (u.top = t.top - o.top + p), null != t.left && (u.left = t.left - o.left + f), "using" in t ? t.using.call(e, u) : i.css(u)
        }
    }, x.fn.extend({
        position: function() {
            if (this[0]) {
                var e, t, n = {
                        top: 0,
                        left: 0
                    },
                    r = this[0];
                return "fixed" === x.css(r, "position") ? t = r.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), x.nodeName(e[0], "html") || (n = e.offset()), n.top += x.css(e[0], "borderTopWidth", !0), n.left += x.css(e[0], "borderLeftWidth", !0)), {
                    top: t.top - n.top - x.css(r, "marginTop", !0),
                    left: t.left - n.left - x.css(r, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                var e = this.offsetParent || s;
                while (e && !x.nodeName(e, "html") && "static" === x.css(e, "position")) {
                    e = e.offsetParent
                }
                return e || s
            })
        }
    }), x.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(e, n) {
        var r = /Y/.test(n);
        x.fn[e] = function(i) {
            return x.access(this, function(e, i, o) {
                var a = or(e);
                return o === t ? a ? n in a ? a[n] : a.document.documentElement[i] : e[i] : (a ? a.scrollTo(r ? x(a).scrollLeft() : o, r ? o : x(a).scrollTop()) : e[i] = o, t)
            }, e, i, arguments.length, null)
        }
    });

    function or(e) {
        return x.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
    }
    x.each({
        Height: "height",
        Width: "width"
    }, function(e, n) {
        x.each({
            padding: "inner" + e,
            content: n,
            "": "outer" + e
        }, function(r, i) {
            x.fn[i] = function(i, o) {
                var a = arguments.length && (r || "boolean" != typeof i),
                    s = r || (i === !0 || o === !0 ? "margin" : "border");
                return x.access(this, function(n, r, i) {
                    var o;
                    return x.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (o = n.documentElement, Math.max(n.body["scroll" + e], o["scroll" + e], n.body["offset" + e], o["offset" + e], o["client" + e])) : i === t ? x.css(n, r, s) : x.style(n, r, i, s)
                }, n, a ? i : t, a, null)
            }
        })
    }), x.fn.size = function() {
        return this.length
    }, x.fn.andSelf = x.fn.addBack, "object" == typeof module && "object" == typeof module.exports ? module.exports = x : (e.jQuery = e.$ = x, "function" == typeof define && define.amd && define("jquery", [], function() {
        return x
    }))
})(window);
jQuery.fn.labelify = function(a) {
    a = jQuery.extend({
        text: "title",
        labelledClass: ""
    }, a);
    var b = {
        title: function(e) {
            return $(e).attr("title")
        },
        label: function(e) {
            return $("label[for=" + e.id + "]").text()
        }
    };
    var d;
    var c = $(this);
    return $(this).each(function() {
        if (typeof a.text === "string") {
            d = b[a.text]
        } else {
            d = a.text
        }
        if (typeof d !== "function") {
            return
        }
        var f = d(this);
        if (!f) {
            return
        }
        $(this).data("label", d(this).replace(/\n/g, ""));
        $(this).focus(function() {
            if (this.value === $(this).data("label")) {
                this.value = this.defaultValue;
                $(this).removeClass(a.labelledClass)
            }
        }).blur(function() {
            if (this.value === this.defaultValue) {
                this.value = $(this).data("label");
                $(this).addClass(a.labelledClass)
            }
        });
        var e = function() {
            c.each(function() {
                if (this.value === $(this).data("label")) {
                    this.value = this.defaultValue;
                    $(this).removeClass(a.labelledClass)
                }
            })
        };
        $(this).parents("form").submit(e);
        $(window).unload(e);
        if (this.value !== this.defaultValue) {
            return
        }
        this.value = $(this).data("label");
        $(this).addClass(a.labelledClass)
    })
};
/* jquery.qtip. The jQuery tooltip plugin Version : 1.0.0-rc3 */
(function(f) {
    f.fn.qtip = function(B, u) {
        var y, t, A, s, x, w, v, z;
        if (typeof B == "string") {
            if (typeof f(this).data("qtip") !== "object") {
                f.fn.qtip.log.error.call(self, 1, f.fn.qtip.constants.NO_TOOLTIP_PRESENT, false)
            }
            if (B == "api") {
                return f(this).data("qtip").interfaces[f(this).data("qtip").current]
            } else {
                if (B == "interfaces") {
                    return f(this).data("qtip").interfaces
                }
            }
        } else {
            if (!B) {
                B = {}
            }
            if (typeof B.content !== "object" || (B.content.jquery && B.content.length > 0)) {
                B.content = {
                    text: B.content
                }
            }
            if (typeof B.content.title !== "object") {
                B.content.title = {
                    text: B.content.title
                }
            }
            if (typeof B.position !== "object") {
                B.position = {
                    corner: B.position
                }
            }
            if (typeof B.position.corner !== "object") {
                B.position.corner = {
                    target: B.position.corner,
                    tooltip: B.position.corner
                }
            }
            if (typeof B.show !== "object") {
                B.show = {
                    when: B.show
                }
            }
            if (typeof B.show.when !== "object") {
                B.show.when = {
                    event: B.show.when
                }
            }
            if (typeof B.show.effect !== "object") {
                B.show.effect = {
                    type: B.show.effect
                }
            }
            if (typeof B.hide !== "object") {
                B.hide = {
                    when: B.hide
                }
            }
            if (typeof B.hide.when !== "object") {
                B.hide.when = {
                    event: B.hide.when
                }
            }
            if (typeof B.hide.effect !== "object") {
                B.hide.effect = {
                    type: B.hide.effect
                }
            }
            if (typeof B.style !== "object") {
                B.style = {
                    name: B.style
                }
            }
            B.style = c(B.style);
            s = f.extend(true, {}, f.fn.qtip.defaults, B);
            s.style = a.call({
                options: s
            }, s.style);
            s.user = f.extend(true, {}, B)
        }
        return f(this).each(function() {
            if (typeof B == "string") {
                w = B.toLowerCase();
                A = f(this).qtip("interfaces");
                if (typeof A == "object") {
                    if (u === true && w == "destroy") {
                        while (A.length > 0) {
                            A[A.length - 1].destroy()
                        }
                    } else {
                        if (u !== true) {
                            A = [f(this).qtip("api")]
                        }
                        for (y = 0; y < A.length; y++) {
                            if (w == "destroy") {
                                A[y].destroy()
                            } else {
                                if (A[y].status.rendered === true) {
                                    if (w == "show") {
                                        A[y].show()
                                    } else {
                                        if (w == "hide") {
                                            A[y].hide()
                                        } else {
                                            if (w == "focus") {
                                                A[y].focus()
                                            } else {
                                                if (w == "disable") {
                                                    A[y].disable(true)
                                                } else {
                                                    if (w == "enable") {
                                                        A[y].disable(false)
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                v = f.extend(true, {}, s);
                v.hide.effect.length = s.hide.effect.length;
                v.show.effect.length = s.show.effect.length;
                if (v.position.container === false) {
                    v.position.container = f(document.body)
                }
                if (v.position.target === false) {
                    v.position.target = f(this)
                }
                if (v.show.when.target === false) {
                    v.show.when.target = f(this)
                }
                if (v.hide.when.target === false) {
                    v.hide.when.target = f(this)
                }
                t = f.fn.qtip.interfaces.length;
                for (y = 0; y < t; y++) {
                    if (typeof f.fn.qtip.interfaces[y] == "undefined") {
                        t = y;
                        break
                    }
                }
                x = new d(f(this), v, t);
                f.fn.qtip.interfaces[t] = x;
                if (typeof f(this).data("qtip") == "object" && f(this).data("qtip")) {
                    if (typeof f(this).attr("qtip") === "undefined") {
                        f(this).data("qtip").current = f(this).data("qtip").interfaces.length
                    }
                    f(this).data("qtip").interfaces.push(x)
                } else {
                    f(this).data("qtip", {
                        current: 0,
                        interfaces: [x]
                    })
                }
                if (v.content.prerender === false && v.show.when.event !== false && v.show.ready !== true) {
                    v.show.when.target.bind(v.show.when.event + ".qtip-" + t + "-create", {
                        qtip: t
                    }, function(C) {
                        z = f.fn.qtip.interfaces[C.data.qtip];
                        z.options.show.when.target.unbind(z.options.show.when.event + ".qtip-" + C.data.qtip + "-create");
                        z.cache.mouse = {
                            x: C.pageX,
                            y: C.pageY
                        };
                        p.call(z);
                        z.options.show.when.target.trigger(z.options.show.when.event)
                    })
                } else {
                    x.cache.mouse = {
                        x: v.show.when.target.offset().left,
                        y: v.show.when.target.offset().top
                    };
                    p.call(x)
                }
            }
        })
    };

    function d(u, t, v) {
        var s = this;
        s.id = v;
        s.options = t;
        s.status = {
            animated: false,
            rendered: false,
            disabled: false,
            focused: false
        };
        s.elements = {
            target: u.addClass(s.options.style.classes.target),
            tooltip: null,
            wrapper: null,
            content: null,
            contentWrapper: null,
            title: null,
            button: null,
            tip: null,
            bgiframe: null
        };
        s.cache = {
            mouse: {},
            position: {},
            toggle: 0
        };
        s.timers = {};
        f.extend(s, s.options.api, {
            show: function(y) {
                var x, z;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "show")
                }
                if (s.elements.tooltip.css("display") !== "none") {
                    return s
                }
                s.elements.tooltip.stop(true, false);
                x = s.beforeShow.call(s, y);
                if (x === false) {
                    return s
                }

                function w() {
                    if (s.options.position.type !== "static") {
                        s.focus()
                    }
                    s.onShow.call(s, y);
                    if (document.all) {
                        s.elements.tooltip.get(0).style.removeAttribute("filter")
                    }
                }
                s.cache.toggle = 1;
                if (s.options.position.type !== "static") {
                    s.updatePosition(y, (s.options.show.effect.length > 0))
                }
                if (typeof s.options.show.solo == "object") {
                    z = f(s.options.show.solo)
                } else {
                    if (s.options.show.solo === true) {
                        z = f("div.qtip").not(s.elements.tooltip)
                    }
                }
                if (z) {
                    z.each(function() {
                        if (f(this).qtip("api").status.rendered === true) {
                            f(this).qtip("api").hide()
                        }
                    })
                }
                if (typeof s.options.show.effect.type == "function") {
                    s.options.show.effect.type.call(s.elements.tooltip, s.options.show.effect.length);
                    s.elements.tooltip.queue(function() {
                        w();
                        f(this).dequeue()
                    })
                } else {
                    switch (s.options.show.effect.type.toLowerCase()) {
                        case "fade":
                            s.elements.tooltip.fadeIn(s.options.show.effect.length, w);
                            break;
                        case "slide":
                            s.elements.tooltip.slideDown(s.options.show.effect.length, function() {
                                w();
                                if (s.options.position.type !== "static") {
                                    s.updatePosition(y, true)
                                }
                            });
                            break;
                        case "grow":
                            s.elements.tooltip.show(s.options.show.effect.length, w);
                            break;
                        default:
                            s.elements.tooltip.show(null, w);
                            break
                    }
                    s.elements.tooltip.addClass(s.options.style.classes.active)
                }
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_SHOWN, "show")
            },
            hide: function(y) {
                var x;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "hide")
                } else {
                    if (s.elements.tooltip.css("display") === "none") {
                        return s
                    }
                }
                clearTimeout(s.timers.show);
                s.elements.tooltip.stop(true, false);
                x = s.beforeHide.call(s, y);
                if (x === false) {
                    return s
                }

                function w() {
                    s.onHide.call(s, y)
                }
                s.cache.toggle = 0;
                if (typeof s.options.hide.effect.type == "function") {
                    s.options.hide.effect.type.call(s.elements.tooltip, s.options.hide.effect.length);
                    s.elements.tooltip.queue(function() {
                        w();
                        f(this).dequeue()
                    })
                } else {
                    switch (s.options.hide.effect.type.toLowerCase()) {
                        case "fade":
                            s.elements.tooltip.fadeOut(s.options.hide.effect.length, w);
                            break;
                        case "slide":
                            s.elements.tooltip.slideUp(s.options.hide.effect.length, w);
                            break;
                        case "grow":
                            s.elements.tooltip.hide(s.options.hide.effect.length, w);
                            break;
                        default:
                            s.elements.tooltip.hide(null, w);
                            break
                    }
                    s.elements.tooltip.removeClass(s.options.style.classes.active)
                }
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_HIDDEN, "hide")
            },
            updatePosition: function(w, x) {
                var C, G, L, J, H, E, y, I, B, D, K, A, F, z;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "updatePosition")
                } else {
                    if (s.options.position.type == "static") {
                        return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.CANNOT_POSITION_STATIC, "updatePosition")
                    }
                }
                G = {
                    position: {
                        left: 0,
                        top: 0
                    },
                    dimensions: {
                        height: 0,
                        width: 0
                    },
                    corner: s.options.position.corner.target
                };
                L = {
                    position: s.getPosition(),
                    dimensions: s.getDimensions(),
                    corner: s.options.position.corner.tooltip
                };
                if (s.options.position.target !== "mouse") {
                    if (s.options.position.target.get(0).nodeName.toLowerCase() == "area") {
                        J = s.options.position.target.attr("coords").split(",");
                        for (C = 0; C < J.length; C++) {
                            J[C] = parseInt(J[C])
                        }
                        H = s.options.position.target.parent("map").attr("name");
                        E = f('img[usemap="#' + H + '"]:first').offset();
                        G.position = {
                            left: Math.floor(E.left + J[0]),
                            top: Math.floor(E.top + J[1])
                        };
                        switch (s.options.position.target.attr("shape").toLowerCase()) {
                            case "rect":
                                G.dimensions = {
                                    width: Math.ceil(Math.abs(J[2] - J[0])),
                                    height: Math.ceil(Math.abs(J[3] - J[1]))
                                };
                                break;
                            case "circle":
                                G.dimensions = {
                                    width: J[2] + 1,
                                    height: J[2] + 1
                                };
                                break;
                            case "poly":
                                G.dimensions = {
                                    width: J[0],
                                    height: J[1]
                                };
                                for (C = 0; C < J.length; C++) {
                                    if (C % 2 == 0) {
                                        if (J[C] > G.dimensions.width) {
                                            G.dimensions.width = J[C]
                                        }
                                        if (J[C] < J[0]) {
                                            G.position.left = Math.floor(E.left + J[C])
                                        }
                                    } else {
                                        if (J[C] > G.dimensions.height) {
                                            G.dimensions.height = J[C]
                                        }
                                        if (J[C] < J[1]) {
                                            G.position.top = Math.floor(E.top + J[C])
                                        }
                                    }
                                }
                                G.dimensions.width = G.dimensions.width - (G.position.left - E.left);
                                G.dimensions.height = G.dimensions.height - (G.position.top - E.top);
                                break;
                            default:
                                return f.fn.qtip.log.error.call(s, 4, f.fn.qtip.constants.INVALID_AREA_SHAPE, "updatePosition");
                                break
                        }
                        G.dimensions.width -= 2;
                        G.dimensions.height -= 2
                    } else {
                        if (s.options.position.target.add(document.body).length === 1) {
                            G.position = {
                                left: f(document).scrollLeft(),
                                top: f(document).scrollTop()
                            };
                            G.dimensions = {
                                height: f(window).height(),
                                width: f(window).width()
                            }
                        } else {
                            if (typeof s.options.position.target.attr("qtip") !== "undefined") {
                                G.position = s.options.position.target.qtip("api").cache.position
                            } else {
                                G.position = s.options.position.target.offset()
                            }
                            G.dimensions = {
                                height: s.options.position.target.outerHeight(),
                                width: s.options.position.target.outerWidth()
                            }
                        }
                    }
                    y = f.extend({}, G.position);
                    if (G.corner.search(/right/i) !== -1) {
                        y.left += G.dimensions.width
                    }
                    if (G.corner.search(/bottom/i) !== -1) {
                        y.top += G.dimensions.height
                    }
                    if (G.corner.search(/((top|bottom)Middle)|center/) !== -1) {
                        y.left += (G.dimensions.width / 2)
                    }
                    if (G.corner.search(/((left|right)Middle)|center/) !== -1) {
                        y.top += (G.dimensions.height / 2)
                    }
                } else {
                    G.position = y = {
                        left: s.cache.mouse.x,
                        top: s.cache.mouse.y
                    };
                    G.dimensions = {
                        height: 1,
                        width: 1
                    }
                }
                if (L.corner.search(/right/i) !== -1) {
                    y.left -= L.dimensions.width
                }
                if (L.corner.search(/bottom/i) !== -1) {
                    y.top -= L.dimensions.height
                }
                if (L.corner.search(/((top|bottom)Middle)|center/) !== -1) {
                    y.left -= (L.dimensions.width / 2)
                }
                if (L.corner.search(/((left|right)Middle)|center/) !== -1) {
                    y.top -= (L.dimensions.height / 2)
                }
                I = (document.all) ? 1 : 0;
                B = (/\bMSIE 6/.test(navigator.userAgent)) ? 1 : 0;
                if (s.options.style.border.radius > 0) {
                    if (L.corner.search(/Left/) !== -1) {
                        y.left -= s.options.style.border.radius
                    } else {
                        if (L.corner.search(/Right/) !== -1) {
                            y.left += s.options.style.border.radius
                        }
                    }
                    if (L.corner.search(/Top/) !== -1) {
                        y.top -= s.options.style.border.radius
                    } else {
                        if (L.corner.search(/Bottom/) !== -1) {
                            y.top += s.options.style.border.radius
                        }
                    }
                }
                if (I) {
                    if (L.corner.search(/top/) !== -1) {
                        y.top -= I
                    } else {
                        if (L.corner.search(/bottom/) !== -1) {
                            y.top += I
                        }
                    }
                    if (L.corner.search(/left/) !== -1) {
                        y.left -= I
                    } else {
                        if (L.corner.search(/right/) !== -1) {
                            y.left += I
                        }
                    }
                    if (L.corner.search(/leftMiddle|rightMiddle/) !== -1) {
                        y.top -= 1
                    }
                }
                if (s.options.position.adjust.screen === true) {
                    y = o.call(s, y, G, L)
                }
                if (s.options.position.target === "mouse" && s.options.position.adjust.mouse === true) {
                    if (s.options.position.adjust.screen === true && s.elements.tip) {
                        K = s.elements.tip.attr("rel")
                    } else {
                        K = s.options.position.corner.tooltip
                    }
                    y.left += (K.search(/right/i) !== -1) ? -6 : 6;
                    y.top += (K.search(/bottom/i) !== -1) ? -6 : 6
                }
                if (!s.elements.bgiframe && /\bMSIE 6/.test(navigator.userAgent)) {
                    f("select, object").each(function() {
                        A = f(this).offset();
                        A.bottom = A.top + f(this).height();
                        A.right = A.left + f(this).width();
                        if (y.top + L.dimensions.height >= A.top && y.left + L.dimensions.width >= A.left) {
                            k.call(s)
                        }
                    })
                }
                y.left += s.options.position.adjust.x;
                y.top += s.options.position.adjust.y;
                F = s.getPosition();
                if (y.left != F.left || y.top != F.top) {
                    z = s.beforePositionUpdate.call(s, w);
                    if (z === false) {
                        return s
                    }
                    s.cache.position = y;
                    if (x === true) {
                        s.status.animated = true;
                        s.elements.tooltip.animate(y, 200, "swing", function() {
                            s.status.animated = false
                        })
                    } else {
                        s.elements.tooltip.css(y)
                    }
                    s.onPositionUpdate.call(s, w);
                    if (typeof w !== "undefined" && w.type && w.type !== "mousemove") {
                        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_POSITION_UPDATED, "updatePosition")
                    }
                }
                return s
            },
            updateWidth: function(w) {
                var x;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "updateWidth")
                } else {
                    if (w && typeof w !== "number") {
                        return f.fn.qtip.log.error.call(s, 2, "newWidth must be of type number", "updateWidth")
                    }
                }
                x = s.elements.contentWrapper.siblings().add(s.elements.tip).add(s.elements.button);
                if (!w) {
                    if (typeof s.options.style.width.value == "number") {
                        w = s.options.style.width.value
                    } else {
                        s.elements.tooltip.css({
                            width: "auto"
                        });
                        x.hide();
                        if (document.all) {
                            s.elements.wrapper.add(s.elements.contentWrapper.children()).css({
                                zoom: "normal"
                            })
                        }
                        w = s.getDimensions().width + 1;
                        if (!s.options.style.width.value) {
                            if (w > s.options.style.width.max) {
                                w = s.options.style.width.max
                            }
                            if (w < s.options.style.width.min) {
                                w = s.options.style.width.min
                            }
                        }
                    }
                }
                if (w % 2 !== 0) {
                    w -= 1
                }
                s.elements.tooltip.width(w);
                x.show();
                if (s.options.style.border.radius) {
                    s.elements.tooltip.find(".qtip-betweenCorners").each(function(y) {
                        f(this).width(w - (s.options.style.border.radius * 2))
                    })
                }
                if (document.all) {
                    s.elements.wrapper.add(s.elements.contentWrapper.children()).css({
                        zoom: "1"
                    });
                    s.elements.wrapper.width(w);
                    if (s.elements.bgiframe) {
                        s.elements.bgiframe.width(w).height(s.getDimensions.height)
                    }
                }
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_WIDTH_UPDATED, "updateWidth")
            },
            updateStyle: function(w) {
                var z, A, x, y, B;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "updateStyle")
                } else {
                    if (typeof w !== "string" || !f.fn.qtip.styles[w]) {
                        return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.STYLE_NOT_DEFINED, "updateStyle")
                    }
                }
                s.options.style = a.call(s, f.fn.qtip.styles[w], s.options.user.style);
                s.elements.content.css(q(s.options.style));
                if (s.options.content.title.text !== false) {
                    s.elements.title.css(q(s.options.style.title, true))
                }
                s.elements.contentWrapper.css({
                    borderColor: s.options.style.border.color
                });
                if (s.options.style.tip.corner !== false) {
                    if (f("<canvas>").get(0).getContext) {
                        z = s.elements.tooltip.find(".qtip-tip canvas:first");
                        x = z.get(0).getContext("2d");
                        x.clearRect(0, 0, 300, 300);
                        y = z.parent("div[rel]:first").attr("rel");
                        B = b(y, s.options.style.tip.size.width, s.options.style.tip.size.height);
                        h.call(s, z, B, s.options.style.tip.color || s.options.style.border.color)
                    } else {
                        if (document.all) {
                            z = s.elements.tooltip.find('.qtip-tip [nodeName="shape"]');
                            z.attr("fillcolor", s.options.style.tip.color || s.options.style.border.color)
                        }
                    }
                }
                if (s.options.style.border.radius > 0) {
                    s.elements.tooltip.find(".qtip-betweenCorners").css({
                        backgroundColor: s.options.style.border.color
                    });
                    if (f("<canvas>").get(0).getContext) {
                        A = g(s.options.style.border.radius);
                        s.elements.tooltip.find(".qtip-wrapper canvas").each(function() {
                            x = f(this).get(0).getContext("2d");
                            x.clearRect(0, 0, 300, 300);
                            y = f(this).parent("div[rel]:first").attr("rel");
                            r.call(s, f(this), A[y], s.options.style.border.radius, s.options.style.border.color)
                        })
                    } else {
                        if (document.all) {
                            s.elements.tooltip.find('.qtip-wrapper [nodeName="arc"]').each(function() {
                                f(this).attr("fillcolor", s.options.style.border.color)
                            })
                        }
                    }
                }
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_STYLE_UPDATED, "updateStyle")
            },
            updateContent: function(A, y) {
                var z, x, w;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "updateContent")
                } else {
                    if (!A) {
                        return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.NO_CONTENT_PROVIDED, "updateContent")
                    }
                }
                z = s.beforeContentUpdate.call(s, A);
                if (typeof z == "string") {
                    A = z
                } else {
                    if (z === false) {
                        return
                    }
                }
                if (document.all) {
                    s.elements.contentWrapper.children().css({
                        zoom: "normal"
                    })
                }
                if (A.jquery && A.length > 0) {
                    A.clone(true).appendTo(s.elements.content).show()
                } else {
                    s.elements.content.html(A)
                }
                x = s.elements.content.find("img[complete=false]");
                if (x.length > 0) {
                    w = 0;
                    x.each(function(C) {
                        f('<img src="' + f(this).attr("src") + '" />').load(function() {
                            if (++w == x.length) {
                                B()
                            }
                        })
                    })
                } else {
                    B()
                }

                function B() {
                    s.updateWidth();
                    if (y !== false) {
                        if (s.options.position.type !== "static") {
                            s.updatePosition(s.elements.tooltip.is(":visible"), true)
                        }
                        if (s.options.style.tip.corner !== false) {
                            n.call(s)
                        }
                    }
                }
                s.onContentUpdate.call(s);
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_CONTENT_UPDATED, "loadContent")
            },
            loadContent: function(w, z, A) {
                var y;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "loadContent")
                }
                y = s.beforeContentLoad.call(s);
                if (y === false) {
                    return s
                }
                if (A == "post") {
                    f.post(w, z, x)
                } else {
                    f.get(w, z, x)
                }

                function x(B) {
                    s.onContentLoad.call(s);
                    f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_CONTENT_LOADED, "loadContent");
                    s.updateContent(B)
                }
                return s
            },
            updateTitle: function(w) {
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "updateTitle")
                } else {
                    if (!w) {
                        return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.NO_CONTENT_PROVIDED, "updateTitle")
                    }
                }
                returned = s.beforeTitleUpdate.call(s);
                if (returned === false) {
                    return s
                }
                if (s.elements.button) {
                    s.elements.button = s.elements.button.clone(true)
                }
                s.elements.title.html(w);
                if (s.elements.button) {
                    s.elements.title.prepend(s.elements.button)
                }
                s.onTitleUpdate.call(s);
                return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_TITLE_UPDATED, "updateTitle")
            },
            focus: function(A) {
                var y, x, w, z;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "focus")
                } else {
                    if (s.options.position.type == "static") {
                        return f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.CANNOT_FOCUS_STATIC, "focus")
                    }
                }
                y = parseInt(s.elements.tooltip.css("z-index"));
                x = 6000 + f("div.qtip[qtip]").length - 1;
                if (!s.status.focused && y !== x) {
                    z = s.beforeFocus.call(s, A);
                    if (z === false) {
                        return s
                    }
                    f("div.qtip[qtip]").not(s.elements.tooltip).each(function() {
                        if (f(this).qtip("api").status.rendered === true) {
                            w = parseInt(f(this).css("z-index"));
                            if (typeof w == "number" && w > -1) {
                                f(this).css({
                                    zIndex: parseInt(f(this).css("z-index")) - 1
                                })
                            }
                            f(this).qtip("api").status.focused = false
                        }
                    });
                    s.elements.tooltip.css({
                        zIndex: x
                    });
                    s.status.focused = true;
                    s.onFocus.call(s, A);
                    f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_FOCUSED, "focus")
                }
                return s
            },
            disable: function(w) {
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "disable")
                }
                if (w) {
                    if (!s.status.disabled) {
                        s.status.disabled = true;
                        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_DISABLED, "disable")
                    } else {
                        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.TOOLTIP_ALREADY_DISABLED, "disable")
                    }
                } else {
                    if (s.status.disabled) {
                        s.status.disabled = false;
                        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_ENABLED, "disable")
                    } else {
                        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.TOOLTIP_ALREADY_ENABLED, "disable")
                    }
                }
                return s
            },
            destroy: function() {
                var w, x, y;
                x = s.beforeDestroy.call(s);
                if (x === false) {
                    return s
                }
                if (s.status.rendered) {
                    s.options.show.when.target.unbind("mousemove.qtip", s.updatePosition);
                    s.options.show.when.target.unbind("mouseout.qtip", s.hide);
                    s.options.show.when.target.unbind(s.options.show.when.event + ".qtip");
                    s.options.hide.when.target.unbind(s.options.hide.when.event + ".qtip");
                    s.elements.tooltip.unbind(s.options.hide.when.event + ".qtip");
                    s.elements.tooltip.unbind("mouseover.qtip", s.focus);
                    s.elements.tooltip.remove()
                } else {
                    s.options.show.when.target.unbind(s.options.show.when.event + ".qtip-create")
                }
                if (typeof s.elements.target.data("qtip") == "object") {
                    y = s.elements.target.data("qtip").interfaces;
                    if (typeof y == "object" && y.length > 0) {
                        for (w = 0; w < y.length - 1; w++) {
                            if (y[w].id == s.id) {
                                y.splice(w, 1)
                            }
                        }
                    }
                }
                delete f.fn.qtip.interfaces[s.id];
                if (typeof y == "object" && y.length > 0) {
                    s.elements.target.data("qtip").current = y.length - 1
                } else {
                    s.elements.target.removeData("qtip")
                }
                s.onDestroy.call(s);
                f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_DESTROYED, "destroy");
                return s.elements.target
            },
            getPosition: function() {
                var w, x;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "getPosition")
                }
                w = (s.elements.tooltip.css("display") !== "none") ? false : true;
                if (w) {
                    s.elements.tooltip.css({
                        visiblity: "hidden"
                    }).show()
                }
                x = s.elements.tooltip.offset();
                if (w) {
                    s.elements.tooltip.css({
                        visiblity: "visible"
                    }).hide()
                }
                return x
            },
            getDimensions: function() {
                var w, x;
                if (!s.status.rendered) {
                    return f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.TOOLTIP_NOT_RENDERED, "getDimensions")
                }
                w = (!s.elements.tooltip.is(":visible")) ? true : false;
                if (w) {
                    s.elements.tooltip.css({
                        visiblity: "hidden"
                    }).show()
                }
                x = {
                    height: s.elements.tooltip.outerHeight(),
                    width: s.elements.tooltip.outerWidth()
                };
                if (w) {
                    s.elements.tooltip.css({
                        visiblity: "visible"
                    }).hide()
                }
                return x
            }
        })
    }

    function p() {
        var s, w, u, t, v, y, x;
        s = this;
        s.beforeRender.call(s);
        s.status.rendered = true;
        s.elements.tooltip = '<div qtip="' + s.id + '" class="qtip ' + (s.options.style.classes.tooltip || s.options.style) + '"style="display:none; -moz-border-radius:0; -webkit-border-radius:0; border-radius:0;position:' + s.options.position.type + ';">  <div class="qtip-wrapper" style="position:relative; overflow:hidden; text-align:left;">    <div class="qtip-contentWrapper" style="overflow:hidden;">       <div class="qtip-content ' + s.options.style.classes.content + '"></div></div></div></div>';
        s.elements.tooltip = f(s.elements.tooltip);
        s.elements.tooltip.appendTo(s.options.position.container);
        s.elements.tooltip.data("qtip", {
            current: 0,
            interfaces: [s]
        });
        s.elements.wrapper = s.elements.tooltip.children("div:first");
        s.elements.contentWrapper = s.elements.wrapper.children("div:first").css({
            background: s.options.style.background
        });
        s.elements.content = s.elements.contentWrapper.children("div:first").css(q(s.options.style));
        if (document.all) {
            s.elements.wrapper.add(s.elements.content).css({
                zoom: 1
            })
        }
        if (s.options.hide.when.event == "unfocus") {
            s.elements.tooltip.attr("unfocus", true)
        }
        if (typeof s.options.style.width.value == "number") {
            s.updateWidth()
        }
        if (f("<canvas>").get(0).getContext || document.all) {
            if (s.options.style.border.radius > 0) {
                m.call(s)
            } else {
                s.elements.contentWrapper.css({
                    border: s.options.style.border.width + "px solid " + s.options.style.border.color
                })
            }
            if (s.options.style.tip.corner !== false) {
                e.call(s)
            }
        } else {
            s.elements.contentWrapper.css({
                border: s.options.style.border.width + "px solid " + s.options.style.border.color
            });
            s.options.style.border.radius = 0;
            s.options.style.tip.corner = false;
            f.fn.qtip.log.error.call(s, 2, f.fn.qtip.constants.CANVAS_VML_NOT_SUPPORTED, "render")
        }
        if ((typeof s.options.content.text == "string" && s.options.content.text.length > 0) || (s.options.content.text.jquery && s.options.content.text.length > 0)) {
            u = s.options.content.text
        } else {
            if (typeof s.elements.target.attr("title") == "string" && s.elements.target.attr("title").length > 0) {
                u = s.elements.target.attr("title").replace("\\n", "<br />");
                s.elements.target.attr("title", "")
            } else {
                if (typeof s.elements.target.attr("alt") == "string" && s.elements.target.attr("alt").length > 0) {
                    u = s.elements.target.attr("alt").replace("\\n", "<br />");
                    s.elements.target.attr("alt", "")
                } else {
                    u = " ";
                    f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.NO_VALID_CONTENT, "render")
                }
            }
        }
        if (s.options.content.title.text !== false) {
            j.call(s)
        }
        s.updateContent(u);
        l.call(s);
        if (s.options.show.ready === true) {
            s.show()
        }
        if (s.options.content.url !== false) {
            t = s.options.content.url;
            v = s.options.content.data;
            y = s.options.content.method || "get";
            s.loadContent(t, v, y)
        }
        s.onRender.call(s);
        f.fn.qtip.log.error.call(s, 1, f.fn.qtip.constants.EVENT_RENDERED, "render")
    }

    function m() {
        var F, z, t, B, x, E, u, G, D, y, w, C, A, s, v;
        F = this;
        F.elements.wrapper.find(".qtip-borderBottom, .qtip-borderTop").remove();
        t = F.options.style.border.width;
        B = F.options.style.border.radius;
        x = F.options.style.border.color || F.options.style.tip.color;
        E = g(B);
        u = {};
        for (z in E) {
            u[z] = '<div rel="' + z + '" style="' + ((z.search(/Left/) !== -1) ? "left" : "right") + ":0; position:absolute; height:" + B + "px; width:" + B + 'px; overflow:hidden; line-height:0.1px; font-size:1px">';
            if (f("<canvas>").get(0).getContext) {
                u[z] += '<canvas height="' + B + '" width="' + B + '" style="vertical-align: top"></canvas>'
            } else {
                if (document.all) {
                    G = B * 2 + 3;
                    u[z] += '<v:arc stroked="false" fillcolor="' + x + '" startangle="' + E[z][0] + '" endangle="' + E[z][1] + '" style="width:' + G + "px; height:" + G + "px; margin-top:" + ((z.search(/bottom/) !== -1) ? -2 : -1) + "px; margin-left:" + ((z.search(/Right/) !== -1) ? E[z][2] - 3.5 : -1) + 'px; vertical-align:top; display:inline-block; behavior:url(#default#VML)"></v:arc>'
                }
            }
            u[z] += "</div>"
        }
        D = F.getDimensions().width - (Math.max(t, B) * 2);
        y = '<div class="qtip-betweenCorners" style="height:' + B + "px; width:" + D + "px; overflow:hidden; background-color:" + x + '; line-height:0.1px; font-size:1px;">';
        w = '<div class="qtip-borderTop" dir="ltr" style="height:' + B + "px; margin-left:" + B + 'px; line-height:0.1px; font-size:1px; padding:0;">' + u.topLeft + u.topRight + y;
        F.elements.wrapper.prepend(w);
        C = '<div class="qtip-borderBottom" dir="ltr" style="height:' + B + "px; margin-left:" + B + 'px; line-height:0.1px; font-size:1px; padding:0;">' + u.bottomLeft + u.bottomRight + y;
        F.elements.wrapper.append(C);
        if (f("<canvas>").get(0).getContext) {
            F.elements.wrapper.find("canvas").each(function() {
                A = E[f(this).parent("[rel]:first").attr("rel")];
                r.call(F, f(this), A, B, x)
            })
        } else {
            if (document.all) {
                F.elements.tooltip.append('<v:image style="behavior:url(#default#VML);"></v:image>')
            }
        }
        s = Math.max(B, (B + (t - B)));
        v = Math.max(t - B, 0);
        F.elements.contentWrapper.css({
            border: "0px solid " + x,
            borderWidth: v + "px " + s + "px"
        })
    }

    function r(u, w, s, t) {
        var v = u.get(0).getContext("2d");
        v.fillStyle = t;
        v.beginPath();
        v.arc(w[0], w[1], s, 0, Math.PI * 2, false);
        v.fill()
    }

    function e(v) {
        var t, s, x, u, w;
        t = this;
        if (t.elements.tip !== null) {
            t.elements.tip.remove()
        }
        s = t.options.style.tip.color || t.options.style.border.color;
        if (t.options.style.tip.corner === false) {
            return
        } else {
            if (!v) {
                v = t.options.style.tip.corner
            }
        }
        x = b(v, t.options.style.tip.size.width, t.options.style.tip.size.height);
        t.elements.tip = '<div class="' + t.options.style.classes.tip + '" dir="ltr" rel="' + v + '" style="position:absolute; height:' + t.options.style.tip.size.height + "px; width:" + t.options.style.tip.size.width + 'px; margin:0 auto; line-height:0.1px; font-size:1px;">';
        if (f("<canvas>").get(0).getContext) {
            t.elements.tip += '<canvas height="' + t.options.style.tip.size.height + '" width="' + t.options.style.tip.size.width + '"></canvas>'
        } else {
            if (document.all) {
                u = t.options.style.tip.size.width + "," + t.options.style.tip.size.height;
                w = "m" + x[0][0] + "," + x[0][1];
                w += " l" + x[1][0] + "," + x[1][1];
                w += " " + x[2][0] + "," + x[2][1];
                w += " xe";
                t.elements.tip += '<v:shape fillcolor="' + s + '" stroked="false" filled="true" path="' + w + '" coordsize="' + u + '" style="width:' + t.options.style.tip.size.width + "px; height:" + t.options.style.tip.size.height + "px; line-height:0.1px; display:inline-block; behavior:url(#default#VML); vertical-align:" + ((v.search(/top/) !== -1) ? "bottom" : "top") + '"></v:shape>';
                t.elements.tip += '<v:image style="behavior:url(#default#VML);"></v:image>';
                t.elements.contentWrapper.css("position", "relative")
            }
        }
        t.elements.tooltip.prepend(t.elements.tip + "</div>");
        t.elements.tip = t.elements.tooltip.find("." + t.options.style.classes.tip).eq(0);
        if (f("<canvas>").get(0).getContext) {
            h.call(t, t.elements.tip.find("canvas:first"), x, s)
        }
        if (v.search(/top/) !== -1 && /\bMSIE 6/.test(navigator.userAgent)) {
            t.elements.tip.css({
                marginTop: -4
            })
        }
        n.call(t, v)
    }

    function h(t, v, s) {
        var u = t.get(0).getContext("2d");
        u.fillStyle = s;
        u.beginPath();
        u.moveTo(v[0][0], v[0][1]);
        u.lineTo(v[1][0], v[1][1]);
        u.lineTo(v[2][0], v[2][1]);
        u.fill()
    }

    function n(u) {
        var t, w, s, x, v;
        t = this;
        if (t.options.style.tip.corner === false || !t.elements.tip) {
            return
        }
        if (!u) {
            u = t.elements.tip.attr("rel")
        }
        w = positionAdjust = (document.all) ? 1 : 0;
        t.elements.tip.css(u.match(/left|right|top|bottom/)[0], 0);
        if (u.search(/top|bottom/) !== -1) {
            if (document.all) {
                if (/\bMSIE 6/.test(navigator.userAgent)) {
                    positionAdjust = (u.search(/top/) !== -1) ? -3 : 1
                } else {
                    positionAdjust = (u.search(/top/) !== -1) ? 1 : 2
                }
            }
            if (u.search(/Middle/) !== -1) {
                t.elements.tip.css({
                    left: "50%",
                    marginLeft: -(t.options.style.tip.size.width / 2)
                })
            } else {
                if (u.search(/Left/) !== -1) {
                    t.elements.tip.css({
                        left: t.options.style.border.radius - w
                    })
                } else {
                    if (u.search(/Right/) !== -1) {
                        t.elements.tip.css({
                            right: t.options.style.border.radius + w
                        })
                    }
                }
            }
            if (u.search(/top/) !== -1) {
                t.elements.tip.css({
                    top: -positionAdjust
                })
            } else {
                t.elements.tip.css({
                    bottom: positionAdjust
                })
            }
        } else {
            if (u.search(/left|right/) !== -1) {
                if (document.all) {
                    positionAdjust = (/\bMSIE 6/.test(navigator.userAgent)) ? 1 : ((u.search(/left/) !== -1) ? 1 : 2)
                }
                if (u.search(/Middle/) !== -1) {
                    t.elements.tip.css({
                        top: "50%",
                        marginTop: -(t.options.style.tip.size.height / 2)
                    })
                } else {
                    if (u.search(/Top/) !== -1) {
                        t.elements.tip.css({
                            top: t.options.style.border.radius - w
                        })
                    } else {
                        if (u.search(/Bottom/) !== -1) {
                            t.elements.tip.css({
                                bottom: t.options.style.border.radius + w
                            })
                        }
                    }
                }
                if (u.search(/left/) !== -1) {
                    t.elements.tip.css({
                        left: -positionAdjust
                    })
                } else {
                    t.elements.tip.css({
                        right: positionAdjust
                    })
                }
            }
        }
        s = "padding-" + u.match(/left|right|top|bottom/)[0];
        x = t.options.style.tip.size[(s.search(/left|right/) !== -1) ? "width" : "height"];
        t.elements.tooltip.css("padding", 0);
        t.elements.tooltip.css(s, x);
        if (/\bMSIE 6/.test(navigator.userAgent)) {
            v = parseInt(t.elements.tip.css("margin-top")) || 0;
            v += parseInt(t.elements.content.css("margin-top")) || 0;
            t.elements.tip.css({
                marginTop: v
            })
        }
    }

    function j() {
        var s = this;
        if (s.elements.title !== null) {
            s.elements.title.remove()
        }
        s.elements.title = f('<div class="' + s.options.style.classes.title + '">').css(q(s.options.style.title, true)).css({
            zoom: (document.all) ? 1 : 0
        }).prependTo(s.elements.contentWrapper);
        if (s.options.content.title.text) {
            s.updateTitle.call(s, s.options.content.title.text)
        }
        if (s.options.content.title.button !== false && typeof s.options.content.title.button == "string") {
            s.elements.button = f('<a class="' + s.options.style.classes.button + '" style="float:right; position: relative"></a>').css(q(s.options.style.button, true)).html(s.options.content.title.button).prependTo(s.elements.title).click(function(t) {
                if (!s.status.disabled) {
                    s.hide(t)
                }
            })
        }
    }

    function l() {
        var t, v, u, s;
        t = this;
        v = t.options.show.when.target;
        u = t.options.hide.when.target;
        if (t.options.hide.fixed) {
            u = u.add(t.elements.tooltip)
        }
        if (t.options.hide.when.event == "inactive") {
            s = ["click", "dblclick", "mousedown", "mouseup", "mousemove", "mouseout", "mouseenter", "mouseleave", "mouseover"];

            function y(z) {
                if (t.status.disabled === true) {
                    return
                }
                clearTimeout(t.timers.inactive);
                t.timers.inactive = setTimeout(function() {
                    f(s).each(function() {
                        u.unbind(this + ".qtip-inactive");
                        t.elements.content.unbind(this + ".qtip-inactive")
                    });
                    t.hide(z)
                }, t.options.hide.delay)
            }
        } else {
            if (t.options.hide.fixed === true) {
                t.elements.tooltip.bind("mouseover.qtip", function() {
                    if (t.status.disabled === true) {
                        return
                    }
                    clearTimeout(t.timers.hide)
                })
            }
        }

        function x(z) {
            if (t.status.disabled === true) {
                return
            }
            if (t.options.hide.when.event == "inactive") {
                f(s).each(function() {
                    u.bind(this + ".qtip-inactive", y);
                    t.elements.content.bind(this + ".qtip-inactive", y)
                });
                y()
            }
            clearTimeout(t.timers.show);
            clearTimeout(t.timers.hide);
            t.timers.show = setTimeout(function() {
                t.show(z)
            }, t.options.show.delay)
        }

        function w(z) {
            if (t.status.disabled === true) {
                return
            }
            if (t.options.hide.fixed === true && t.options.hide.when.event.search(/mouse(out|leave)/i) !== -1 && f(z.relatedTarget).parents("div.qtip[qtip]").length > 0) {
                z.stopPropagation();
                z.preventDefault();
                clearTimeout(t.timers.hide);
                return false
            }
            clearTimeout(t.timers.show);
            clearTimeout(t.timers.hide);
            t.elements.tooltip.stop(true, true);
            t.timers.hide = setTimeout(function() {
                t.hide(z)
            }, t.options.hide.delay)
        }
        if ((t.options.show.when.target.add(t.options.hide.when.target).length === 1 && t.options.show.when.event == t.options.hide.when.event && t.options.hide.when.event !== "inactive") || t.options.hide.when.event == "unfocus") {
            t.cache.toggle = 0;
            v.bind(t.options.show.when.event + ".qtip", function(z) {
                if (t.cache.toggle == 0) {
                    x(z)
                } else {
                    w(z)
                }
            })
        } else {
            v.bind(t.options.show.when.event + ".qtip", x);
            if (t.options.hide.when.event !== "inactive") {
                u.bind(t.options.hide.when.event + ".qtip", w)
            }
        }
        if (t.options.position.type.search(/(fixed|absolute)/) !== -1) {
            t.elements.tooltip.bind("mouseover.qtip", t.focus)
        }
        if (t.options.position.target === "mouse" && t.options.position.type !== "static") {
            v.bind("mousemove.qtip", function(z) {
                t.cache.mouse = {
                    x: z.pageX,
                    y: z.pageY
                };
                if (t.status.disabled === false && t.options.position.adjust.mouse === true && t.options.position.type !== "static" && t.elements.tooltip.css("display") !== "none") {
                    t.updatePosition(z)
                }
            })
        }
    }

    function o(u, v, A) {
        var z, s, x, y, t, w;
        z = this;
        if (A.corner == "center") {
            return v.position
        }
        s = f.extend({}, u);
        y = {
            x: false,
            y: false
        };
        t = {
            left: (s.left < f.fn.qtip.cache.screen.scroll.left),
            right: (s.left + A.dimensions.width + 2 >= f.fn.qtip.cache.screen.width + f.fn.qtip.cache.screen.scroll.left),
            top: (s.top < f.fn.qtip.cache.screen.scroll.top),
            bottom: (s.top + A.dimensions.height + 2 >= f.fn.qtip.cache.screen.height + f.fn.qtip.cache.screen.scroll.top)
        };
        x = {
            left: (t.left && (A.corner.search(/right/i) != -1 || (A.corner.search(/right/i) == -1 && !t.right))),
            right: (t.right && (A.corner.search(/left/i) != -1 || (A.corner.search(/left/i) == -1 && !t.left))),
            top: (t.top && A.corner.search(/top/i) == -1),
            bottom: (t.bottom && A.corner.search(/bottom/i) == -1)
        };
        if (x.left) {
            if (z.options.position.target !== "mouse") {
                s.left = v.position.left + v.dimensions.width
            } else {
                s.left = z.cache.mouse.x
            }
            y.x = "Left"
        } else {
            if (x.right) {
                if (z.options.position.target !== "mouse") {
                    s.left = v.position.left - A.dimensions.width
                } else {
                    s.left = z.cache.mouse.x - A.dimensions.width
                }
                y.x = "Right"
            }
        }
        if (x.top) {
            if (z.options.position.target !== "mouse") {
                s.top = v.position.top + v.dimensions.height
            } else {
                s.top = z.cache.mouse.y
            }
            y.y = "top"
        } else {
            if (x.bottom) {
                if (z.options.position.target !== "mouse") {
                    s.top = v.position.top - A.dimensions.height
                } else {
                    s.top = z.cache.mouse.y - A.dimensions.height
                }
                y.y = "bottom"
            }
        }
        if (s.left < 0) {
            s.left = u.left;
            y.x = false
        }
        if (s.top < 0) {
            s.top = u.top;
            y.y = false
        }
        if (z.options.style.tip.corner !== false) {
            s.corner = new String(A.corner);
            if (y.x !== false) {
                s.corner = s.corner.replace(/Left|Right|Middle/, y.x)
            }
            if (y.y !== false) {
                s.corner = s.corner.replace(/top|bottom/, y.y)
            }
            if (s.corner !== z.elements.tip.attr("rel")) {
                e.call(z, s.corner)
            }
        }
        return s
    }

    function q(u, t) {
        var v, s;
        v = f.extend(true, {}, u);
        for (s in v) {
            if (t === true && s.search(/(tip|classes)/i) !== -1) {
                delete v[s]
            } else {
                if (!t && s.search(/(width|border|tip|title|classes|user)/i) !== -1) {
                    delete v[s]
                }
            }
        }
        return v
    }

    function c(s) {
        if (typeof s.tip !== "object") {
            s.tip = {
                corner: s.tip
            }
        }
        if (typeof s.tip.size !== "object") {
            s.tip.size = {
                width: s.tip.size,
                height: s.tip.size
            }
        }
        if (typeof s.border !== "object") {
            s.border = {
                width: s.border
            }
        }
        if (typeof s.width !== "object") {
            s.width = {
                value: s.width
            }
        }
        if (typeof s.width.max == "string") {
            s.width.max = parseInt(s.width.max.replace(/([0-9]+)/i, "$1"))
        }
        if (typeof s.width.min == "string") {
            s.width.min = parseInt(s.width.min.replace(/([0-9]+)/i, "$1"))
        }
        if (typeof s.tip.size.x == "number") {
            s.tip.size.width = s.tip.size.x;
            delete s.tip.size.x
        }
        if (typeof s.tip.size.y == "number") {
            s.tip.size.height = s.tip.size.y;
            delete s.tip.size.y
        }
        return s
    }

    function a() {
        var s, t, u, x, v, w;
        s = this;
        u = [true, {}];
        for (t = 0; t < arguments.length; t++) {
            u.push(arguments[t])
        }
        x = [f.extend.apply(f, u)];
        while (typeof x[0].name == "string") {
            x.unshift(c(f.fn.qtip.styles[x[0].name]))
        }
        x.unshift(true, {
            classes: {
                tooltip: "qtip-" + (arguments[0].name || "defaults")
            }
        }, f.fn.qtip.styles.defaults);
        v = f.extend.apply(f, x);
        w = (document.all) ? 1 : 0;
        v.tip.size.width += w;
        v.tip.size.height += w;
        if (v.tip.size.width % 2 > 0) {
            v.tip.size.width += 1
        }
        if (v.tip.size.height % 2 > 0) {
            v.tip.size.height += 1
        }
        if (v.tip.corner === true) {
            v.tip.corner = (s.options.position.corner.tooltip === "center") ? false : s.options.position.corner.tooltip
        }
        return v
    }

    function b(v, u, t) {
        var s = {
            bottomRight: [
                [0, 0],
                [u, t],
                [u, 0]
            ],
            bottomLeft: [
                [0, 0],
                [u, 0],
                [0, t]
            ],
            topRight: [
                [0, t],
                [u, 0],
                [u, t]
            ],
            topLeft: [
                [0, 0],
                [0, t],
                [u, t]
            ],
            topMiddle: [
                [0, t],
                [u / 2, 0],
                [u, t]
            ],
            bottomMiddle: [
                [0, 0],
                [u, 0],
                [u / 2, t]
            ],
            rightMiddle: [
                [0, 0],
                [u, t / 2],
                [0, t]
            ],
            leftMiddle: [
                [u, 0],
                [u, t],
                [0, t / 2]
            ]
        };
        s.leftTop = s.bottomRight;
        s.rightTop = s.bottomLeft;
        s.leftBottom = s.topRight;
        s.rightBottom = s.topLeft;
        return s[v]
    }

    function g(s) {
        var t;
        if (f("<canvas>").get(0).getContext) {
            t = {
                topLeft: [s, s],
                topRight: [0, s],
                bottomLeft: [s, 0],
                bottomRight: [0, 0]
            }
        } else {
            if (document.all) {
                t = {
                    topLeft: [-90, 90, 0],
                    topRight: [-90, 90, -s],
                    bottomLeft: [90, 270, 0],
                    bottomRight: [90, 270, -s]
                }
            }
        }
        return t
    }

    function k() {
        var s, t, u;
        s = this;
        u = s.getDimensions();
        t = '<iframe class="qtip-bgiframe" frameborder="0" tabindex="-1" src="javascript:false" style="display:block; position:absolute; z-index:-1; filter:alpha(opacity=\'0\'); border: 1px solid red; height:' + u.height + "px; width:" + u.width + 'px" />';
        s.elements.bgiframe = s.elements.wrapper.prepend(t).children(".qtip-bgiframe:first")
    }
    f(document).ready(function() {
        f.fn.qtip.cache = {
            screen: {
                scroll: {
                    left: f(window).scrollLeft(),
                    top: f(window).scrollTop()
                },
                width: f(window).width(),
                height: f(window).height()
            }
        };
        var s;
        f(window).bind("resize scroll", function(t) {
            clearTimeout(s);
            s = setTimeout(function() {
                if (t.type === "scroll") {
                    f.fn.qtip.cache.screen.scroll = {
                        left: f(window).scrollLeft(),
                        top: f(window).scrollTop()
                    }
                } else {
                    f.fn.qtip.cache.screen.width = f(window).width();
                    f.fn.qtip.cache.screen.height = f(window).height()
                }
                for (i = 0; i < f.fn.qtip.interfaces.length; i++) {
                    var u = f.fn.qtip.interfaces[i];
                    if (u.status.rendered === true && (u.options.position.type !== "static" || u.options.position.adjust.scroll && t.type === "scroll" || u.options.position.adjust.resize && t.type === "resize")) {
                        u.updatePosition(t, true)
                    }
                }
            }, 100)
        });
        f(document).bind("mousedown.qtip", function(t) {
            if (f(t.target).parents("div.qtip").length === 0) {
                f(".qtip[unfocus]").each(function() {
                    var u = f(this).qtip("api");
                    if (f(this).is(":visible") && !u.status.disabled && f(t.target).add(u.elements.target).length > 1) {
                        u.hide(t)
                    }
                })
            }
        })
    });
    f.fn.qtip.interfaces = [];
    f.fn.qtip.log = {
        error: function() {
            return this
        }
    };
    f.fn.qtip.constants = {};
    f.fn.qtip.defaults = {
        content: {
            prerender: false,
            text: false,
            url: false,
            data: null,
            title: {
                text: false,
                button: false
            }
        },
        position: {
            target: false,
            corner: {
                target: "bottomRight",
                tooltip: "topLeft"
            },
            adjust: {
                x: 0,
                y: 0,
                mouse: true,
                screen: false,
                scroll: true,
                resize: true
            },
            type: "absolute",
            container: false
        },
        show: {
            when: {
                target: false,
                event: "mouseover"
            },
            effect: {
                type: "fade",
                length: 100
            },
            delay: 140,
            solo: false,
            ready: false
        },
        hide: {
            when: {
                target: false,
                event: "mouseout"
            },
            effect: {
                type: "fade",
                length: 100
            },
            delay: 0,
            fixed: false
        },
        api: {
            beforeRender: function() {},
            onRender: function() {},
            beforePositionUpdate: function() {},
            onPositionUpdate: function() {},
            beforeShow: function() {},
            onShow: function() {},
            beforeHide: function() {},
            onHide: function() {},
            beforeContentUpdate: function() {},
            onContentUpdate: function() {},
            beforeContentLoad: function() {},
            onContentLoad: function() {},
            beforeTitleUpdate: function() {},
            onTitleUpdate: function() {},
            beforeDestroy: function() {},
            onDestroy: function() {},
            beforeFocus: function() {},
            onFocus: function() {}
        }
    };
    f.fn.qtip.styles = {
        defaults: {
            background: "white",
            color: "#111",
            overflow: "hidden",
            textAlign: "left",
            width: {
                min: 0,
                max: 250
            },
            padding: "5px 9px",
            border: {
                width: 1,
                radius: 0,
                color: "#d3d3d3"
            },
            tip: {
                corner: false,
                color: false,
                size: {
                    width: 13,
                    height: 13
                },
                opacity: 1
            },
            title: {
                background: "#e1e1e1",
                fontWeight: "bold",
                padding: "7px 12px"
            },
            button: {
                cursor: "pointer"
            },
            classes: {
                target: "",
                tip: "qtip-tip",
                title: "qtip-title",
                button: "qtip-button",
                content: "qtip-content",
                active: "qtip-active"
            }
        },
        cream: {
            border: {
                width: 3,
                radius: 0,
                color: "#F9E98E"
            },
            title: {
                background: "#F0DE7D",
                color: "#A27D35"
            },
            background: "#FBF7AA",
            color: "#A27D35",
            classes: {
                tooltip: "qtip-cream"
            }
        },
        light: {
            border: {
                width: 3,
                radius: 0,
                color: "#E2E2E2"
            },
            title: {
                background: "#f1f1f1",
                color: "#454545"
            },
            background: "white",
            color: "#454545",
            classes: {
                tooltip: "qtip-light"
            }
        },
        dark: {
            border: {
                width: 3,
                radius: 0,
                color: "#303030"
            },
            title: {
                background: "#404040",
                color: "#f3f3f3"
            },
            background: "#505050",
            color: "#f3f3f3",
            classes: {
                tooltip: "qtip-dark"
            }
        },
        red: {
            border: {
                width: 3,
                radius: 0,
                color: "#CE6F6F"
            },
            title: {
                background: "#f28279",
                color: "#9C2F2F"
            },
            background: "#F79992",
            color: "#9C2F2F",
            classes: {
                tooltip: "qtip-red"
            }
        },
        green: {
            border: {
                width: 3,
                radius: 0,
                color: "#A9DB66"
            },
            title: {
                background: "#b9db8c",
                color: "#58792E"
            },
            background: "#CDE6AC",
            color: "#58792E",
            classes: {
                tooltip: "qtip-green"
            }
        },
        blue: {
            border: {
                width: 3,
                radius: 0,
                color: "#ADD9ED"
            },
            title: {
                background: "#D0E9F5",
                color: "#5E99BD"
            },
            background: "#E5F6FE",
            color: "#4D9FBF",
            classes: {
                tooltip: "qtip-blue"
            }
        }
    }
})(jQuery);
window.Modernizr = function(aw, av, au) {
        function T(b) {
            am.cssText = b
        }

        function S(d, c) {
            return T(ai.join(d + ";") + (c || ""))
        }

        function R(d, c) {
            return typeof d === c
        }

        function Q(d, c) {
            return !!~("" + d).indexOf(c)
        }

        function P(f, c) {
            for (var h in f) {
                var g = f[h];
                if (!Q(g, "-") && am[g] !== au) {
                    return c == "pfx" ? g : !0
                }
            }
            return !1
        }

        function O(g, c, k) {
            for (var j in g) {
                var h = c[g[j]];
                if (h !== au) {
                    return k === !1 ? g[j] : R(h, "function") ? h.bind(k || c) : h
                }
            }
            return !1
        }

        function N(g, f, k) {
            var j = g.charAt(0).toUpperCase() + g.slice(1),
                h = (g + " " + ag.join(j + " ") + j).split(" ");
            return R(f, "string") || R(f, "undefined") ? P(h, f) : (h = (g + " " + af.join(j + " ") + j).split(" "), O(h, f, k))
        }

        function M() {
            ar.input = function(f) {
                for (var b = 0, a = f.length; b < a; b++) {
                    ab[f[b]] = f[b] in al
                }
                return ab.list && (ab.list = !!av.createElement("datalist") && !!aw.HTMLDataListElement), ab
            }("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")), ar.inputtypes = function(b) {
                for (var l = 0, k, j, g, c = b.length; l < c; l++) {
                    al.setAttribute("type", j = b[l]), k = al.type !== "text", k && (al.value = ak, al.style.cssText = "position:absolute;visibility:hidden;", /^range$/.test(j) && al.style.WebkitAppearance !== au ? (ap.appendChild(al), g = av.defaultView, k = g.getComputedStyle && g.getComputedStyle(al, null).WebkitAppearance !== "textfield" && al.offsetHeight !== 0, ap.removeChild(al)) : /^(search|tel)$/.test(j) || (/^(url|email)$/.test(j) ? k = al.checkValidity && al.checkValidity() === !1 : k = al.value != ak)), ac[b[l]] = !!k
                }
                return ac
            }("search tel url email datetime date month week time datetime-local number range color".split(" "))
        }
        var at = "2.6.2",
            ar = {},
            aq = !0,
            ap = av.documentElement,
            ao = "modernizr",
            an = av.createElement(ao),
            am = an.style,
            al = av.createElement("input"),
            ak = ":)",
            aj = {}.toString,
            ai = " -webkit- -moz- -o- -ms- ".split(" "),
            ah = "Webkit Moz O ms",
            ag = ah.split(" "),
            af = ah.toLowerCase().split(" "),
            ae = {
                svg: "http://www.w3.org/2000/svg"
            },
            ad = {},
            ac = {},
            ab = {},
            aa = [],
            Z = aa.slice,
            Y, X = function(v, u, t, s) {
                var r, q, p, o, h = av.createElement("div"),
                    g = av.body,
                    b = g || av.createElement("body");
                if (parseInt(t, 10)) {
                    while (t--) {
                        p = av.createElement("div"), p.id = s ? s[t] : ao + (t + 1), h.appendChild(p)
                    }
                }
                return r = ["&#173;", '<style id="s', ao, '">', v, "</style>"].join(""), h.id = ao, (g ? h : b).innerHTML += r, b.appendChild(h), g || (b.style.background = "", b.style.overflow = "hidden", o = ap.style.overflow, ap.style.overflow = "hidden", ap.appendChild(b)), q = u(h, v), g ? h.parentNode.removeChild(h) : (b.parentNode.removeChild(b), ap.style.overflow = o), !!q
            },
            W = function() {
                function c(h, g) {
                    g = g || av.createElement(b[h] || "div"), h = "on" + h;
                    var a = h in g;
                    return a || (g.setAttribute || (g = av.createElement("div")), g.setAttribute && g.removeAttribute && (g.setAttribute(h, ""), a = R(g[h], "function"), R(g[h], "undefined") || (g[h] = au), g.removeAttribute(h))), g = null, a
                }
                var b = {
                    select: "input",
                    change: "input",
                    submit: "form",
                    reset: "form",
                    error: "img",
                    load: "img",
                    abort: "img"
                };
                return c
            }(),
            V = {}.hasOwnProperty,
            U;
        !R(V, "undefined") && !R(V.call, "undefined") ? U = function(d, c) {
            return V.call(d, c)
        } : U = function(d, c) {
            return c in d && R(d.constructor.prototype[c], "undefined")
        }, Function.prototype.bind || (Function.prototype.bind = function(a) {
            var h = this;
            if (typeof h != "function") {
                throw new TypeError
            }
            var g = Z.call(arguments, 1),
                f = function() {
                    if (this instanceof f) {
                        var b = function() {};
                        b.prototype = h.prototype;
                        var d = new b,
                            c = h.apply(d, g.concat(Z.call(arguments)));
                        return Object(c) === c ? c : d
                    }
                    return h.apply(a, g.concat(Z.call(arguments)))
                };
            return f
        }), ad.flexbox = function() {
            return N("flexWrap")
        }, ad.flexboxlegacy = function() {
            return N("boxDirection")
        }, ad.canvas = function() {
            var b = av.createElement("canvas");
            return !!b.getContext && !!b.getContext("2d")
        }, ad.canvastext = function() {
            return !!ar.canvas && !!R(av.createElement("canvas").getContext("2d").fillText, "function")
        }, ad.webgl = function() {
            return !!aw.WebGLRenderingContext
        }, ad.touch = function() {
            var a;
            return "ontouchstart" in aw || aw.DocumentTouch && av instanceof DocumentTouch ? a = !0 : X(["@media (", ai.join("touch-enabled),("), ao, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function(b) {
                a = b.offsetTop === 9
            }), a
        }, ad.geolocation = function() {
            return "geolocation" in navigator
        }, ad.postmessage = function() {
            return !!aw.postMessage
        }, ad.websqldatabase = function() {
            return !!aw.openDatabase
        }, ad.indexedDB = function() {
            return !!N("indexedDB", aw)
        }, ad.hashchange = function() {
            return W("hashchange", aw) && (av.documentMode === au || av.documentMode > 7)
        }, ad.history = function() {
            return !!aw.history && !!history.pushState
        }, ad.draganddrop = function() {
            var b = av.createElement("div");
            return "draggable" in b || "ondragstart" in b && "ondrop" in b
        }, ad.websockets = function() {
            return "WebSocket" in aw || "MozWebSocket" in aw
        }, ad.rgba = function() {
            return T("background-color:rgba(150,255,150,.5)"), Q(am.backgroundColor, "rgba")
        }, ad.hsla = function() {
            return T("background-color:hsla(120,40%,100%,.5)"), Q(am.backgroundColor, "rgba") || Q(am.backgroundColor, "hsla")
        }, ad.multiplebgs = function() {
            return T("background:url(https://),url(https://),red url(https://)"), /(url\s*\(.*?){3}/.test(am.background)
        }, ad.backgroundsize = function() {
            return N("backgroundSize")
        }, ad.borderimage = function() {
            return N("borderImage")
        }, ad.borderradius = function() {
            return N("borderRadius")
        }, ad.boxshadow = function() {
            return N("boxShadow")
        }, ad.textshadow = function() {
            return av.createElement("div").style.textShadow === ""
        }, ad.opacity = function() {
            return S("opacity:.55"), /^0.55$/.test(am.opacity)
        }, ad.cssanimations = function() {
            return N("animationName")
        }, ad.csscolumns = function() {
            return N("columnCount")
        }, ad.cssgradients = function() {
            var e = "background-image:",
                d = "gradient(linear,left top,right bottom,from(#9f9),to(white));",
                f = "linear-gradient(left top,#9f9, white);";
            return T((e + "-webkit- ".split(" ").join(d + e) + ai.join(f + e)).slice(0, -e.length)), Q(am.backgroundImage, "gradient")
        }, ad.cssreflections = function() {
            return N("boxReflect")
        }, ad.csstransforms = function() {
            return !!N("transform")
        }, ad.csstransforms3d = function() {
            var b = !!N("perspective");
            return b && "webkitPerspective" in ap.style && X("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}", function(a, d) {
                b = a.offsetLeft === 9 && a.offsetHeight === 3
            }), b
        }, ad.csstransitions = function() {
            return N("transition")
        }, ad.fontface = function() {
            var b;
            return X('@font-face {font-family:"font";src:url("https://")}', function(l, k) {
                var j = av.getElementById("smodernizr"),
                    h = j.sheet || j.styleSheet,
                    a = h ? h.cssRules && h.cssRules[0] ? h.cssRules[0].cssText : h.cssText || "" : "";
                b = /src/i.test(a) && a.indexOf(k.split(" ")[0]) === 0
            }), b
        }, ad.generatedcontent = function() {
            var b;
            return X(["#", ao, "{font:0/0 a}#", ao, ':after{content:"', ak, '";visibility:hidden;font:3px/1 a}'].join(""), function(a) {
                b = a.offsetHeight >= 3
            }), b
        }, ad.video = function() {
            var b = av.createElement("video"),
                f = !1;
            try {
                if (f = !!b.canPlayType) {
                    f = new Boolean(f), f.ogg = b.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), f.h264 = b.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), f.webm = b.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, "")
                }
            } catch (e) {}
            return f
        }, ad.audio = function() {
            var b = av.createElement("audio"),
                f = !1;
            try {
                if (f = !!b.canPlayType) {
                    f = new Boolean(f), f.ogg = b.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, ""), f.mp3 = b.canPlayType("audio/mpeg;").replace(/^no$/, ""), f.wav = b.canPlayType('audio/wav; codecs="1"').replace(/^no$/, ""), f.m4a = (b.canPlayType("audio/x-m4a;") || b.canPlayType("audio/aac;")).replace(/^no$/, "")
                }
            } catch (e) {}
            return f
        }, ad.localstorage = function() {
            try {
                return localStorage.setItem(ao, ao), localStorage.removeItem(ao), !0
            } catch (b) {
                return !1
            }
        }, ad.sessionstorage = function() {
            try {
                return sessionStorage.setItem(ao, ao), sessionStorage.removeItem(ao), !0
            } catch (b) {
                return !1
            }
        }, ad.webworkers = function() {
            return !!aw.Worker
        }, ad.applicationcache = function() {
            return !!aw.applicationCache
        }, ad.svg = function() {
            return !!av.createElementNS && !!av.createElementNS(ae.svg, "svg").createSVGRect
        }, ad.inlinesvg = function() {
            var b = av.createElement("div");
            return b.innerHTML = "<svg/>", (b.firstChild && b.firstChild.namespaceURI) == ae.svg
        }, ad.smil = function() {
            return !!av.createElementNS && /SVGAnimate/.test(aj.call(av.createElementNS(ae.svg, "animate")))
        }, ad.svgclippaths = function() {
            return !!av.createElementNS && /SVGClipPath/.test(aj.call(av.createElementNS(ae.svg, "clipPath")))
        };
        for (var L in ad) {
            U(ad, L) && (Y = L.toLowerCase(), ar[Y] = ad[L](), aa.push((ar[Y] ? "" : "no-") + Y))
        }
        return ar.input || M(), ar.addTest = function(e, c) {
                if (typeof e == "object") {
                    for (var f in e) {
                        U(e, f) && ar.addTest(f, e[f])
                    }
                } else {
                    e = e.toLowerCase();
                    if (ar[e] !== au) {
                        return ar
                    }
                    c = typeof c == "function" ? c() : c, typeof aq != "undefined" && aq && (ap.className += " " + (c ? "" : "no-") + e), ar[e] = c
                }
                return ar
            }, T(""), an = al = null,
            function(J, I) {
                function z(f, e) {
                    var h = f.createElement("p"),
                        g = f.getElementsByTagName("head")[0] || f.documentElement;
                    return h.innerHTML = "x<style>" + e + "</style>", g.insertBefore(h.lastChild, g.firstChild)
                }

                function y() {
                    var b = s.elements;
                    return typeof b == "string" ? b.split(" ") : b
                }

                function x(d) {
                    var c = B[d[D]];
                    return c || (c = {}, C++, d[D] = C, B[C] = c), c
                }

                function w(b, h, e) {
                    h || (h = I);
                    if (A) {
                        return h.createElement(b)
                    }
                    e || (e = x(h));
                    var d;
                    return e.cache[b] ? d = e.cache[b].cloneNode() : F.test(b) ? d = (e.cache[b] = e.createElem(b)).cloneNode() : d = e.createElem(b), d.canHaveChildren && !G.test(b) ? e.frag.appendChild(d) : d
                }

                function v(b, m) {
                    b || (b = I);
                    if (A) {
                        return b.createDocumentFragment()
                    }
                    m = m || x(b);
                    var l = m.frag.cloneNode(),
                        k = 0,
                        j = y(),
                        h = j.length;
                    for (; k < h; k++) {
                        l.createElement(j[k])
                    }
                    return l
                }

                function u(d, c) {
                    c.cache || (c.cache = {}, c.createElem = d.createElement, c.createFrag = d.createDocumentFragment, c.frag = c.createFrag()), d.createElement = function(a) {
                        return s.shivMethods ? w(a, d, c) : c.createElem(a)
                    }, d.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + y().join().replace(/\w+/g, function(b) {
                        return c.createElem(b), c.frag.createElement(b), 'c("' + b + '")'
                    }) + ");return n}")(s, c.frag)
                }

                function t(b) {
                    b || (b = I);
                    var d = x(b);
                    return s.shivCSS && !E && !d.hasCSS && (d.hasCSS = !!z(b, "article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")), A || u(b, d), b
                }
                var H = J.html5 || {},
                    G = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
                    F = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
                    E, D = "_html5shiv",
                    C = 0,
                    B = {},
                    A;
                (function() {
                    try {
                        var b = I.createElement("a");
                        b.innerHTML = "<xyz></xyz>", E = "hidden" in b, A = b.childNodes.length == 1 || function() {
                            I.createElement("a");
                            var c = I.createDocumentFragment();
                            return typeof c.cloneNode == "undefined" || typeof c.createDocumentFragment == "undefined" || typeof c.createElement == "undefined"
                        }()
                    } catch (d) {
                        E = !0, A = !0
                    }
                })();
                var s = {
                    elements: H.elements || "abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",
                    shivCSS: H.shivCSS !== !1,
                    supportsUnknownElements: A,
                    shivMethods: H.shivMethods !== !1,
                    type: "default",
                    shivDocument: t,
                    createElement: w,
                    createDocumentFragment: v
                };
                J.html5 = s, t(I)
            }(this, av), ar._version = at, ar._prefixes = ai, ar._domPrefixes = af, ar._cssomPrefixes = ag, ar.hasEvent = W, ar.testProp = function(b) {
                return P([b])
            }, ar.testAllProps = N, ar.testStyles = X, ap.className = ap.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (aq ? " js " + aa.join(" ") : ""), ar
    }(this, this.document),
    function(ad, ac, ab) {
        function aa(b) {
            return "[object Function]" == P.call(b)
        }

        function Z(b) {
            return "string" == typeof b
        }

        function Y() {}

        function X(b) {
            return !b || "loaded" == b || "complete" == b || "uninitialized" == b
        }

        function W() {
            var b = O.shift();
            M = 1, b ? b.t ? R(function() {
                ("c" == b.t ? L.injectCss : L.injectJs)(b.s, 0, b.a, b.x, b.e, 1)
            }, 0) : (b(), W()) : M = 0
        }

        function V(w, v, t, s, q, p, n) {
            function m(a) {
                if (!g && X(h.readyState) && (x.r = g = 1, !M && W(), h.onload = h.onreadystatechange = null, a)) {
                    "img" != w && R(function() {
                        I.removeChild(h)
                    }, 50);
                    for (var c in D[v]) {
                        D[v].hasOwnProperty(c) && D[v][c].onload()
                    }
                }
            }
            var n = n || L.errorTimeout,
                h = ac.createElement(w),
                g = 0,
                b = 0,
                x = {
                    t: t,
                    s: v,
                    e: q,
                    a: p,
                    x: n
                };
            1 === D[v] && (b = 1, D[v] = []), "object" == w ? h.data = v : (h.src = v, h.type = w), h.width = h.height = "0", h.onerror = h.onload = h.onreadystatechange = function() {
                m.call(this, b)
            }, O.splice(s, 0, x), "img" != w && (b || 2 === D[v] ? (I.insertBefore(h, J ? null : Q), R(m, n)) : D[v].push(h))
        }

        function U(g, e, k, j, h) {
            return M = 0, e = e || "j", Z(g) ? V("c" == e ? G : H, g, e, this.i++, k, j, h) : (O.splice(this.i++, 0, g), 1 == O.length && W()), this
        }

        function T() {
            var b = L;
            return b.loader = {
                load: U,
                i: 0
            }, b
        }
        var S = ac.documentElement,
            R = ad.setTimeout,
            Q = ac.getElementsByTagName("script")[0],
            P = {}.toString,
            O = [],
            M = 0,
            K = "MozAppearance" in S.style,
            J = K && !!ac.createRange().compareNode,
            I = J ? S : Q.parentNode,
            S = ad.opera && "[object Opera]" == P.call(ad.opera),
            S = !!ac.attachEvent && !S,
            H = K ? "object" : S ? "script" : "img",
            G = S ? "script" : H,
            F = Array.isArray || function(b) {
                return "[object Array]" == P.call(b)
            },
            E = [],
            D = {},
            C = {
                timeout: function(d, c) {
                    return c.length && (d.timeout = c[0]), d
                }
            },
            N, L;
        L = function(e) {
            function c(j) {
                var j = j.split("!"),
                    h = E.length,
                    r = j.pop(),
                    q = j.length,
                    r = {
                        url: r,
                        origUrl: r,
                        prefixes: j
                    },
                    p, o, l;
                for (o = 0; o < q; o++) {
                    l = j[o].split("="), (p = C[l.shift()]) && (r = p(r, l))
                }
                for (o = 0; o < h; o++) {
                    r = E[o](r)
                }
                return r
            }

            function n(b, s, r, q, p) {
                var o = c(b),
                    l = o.autoCallback;
                o.url.split(".").pop().split("?").shift(), o.bypass || (s && (s = aa(s) ? s : s[b] || s[q] || s[b.split("/").pop().split("?")[0]]), o.instead ? o.instead(b, s, r, q, p) : (D[o.url] ? o.noexec = !0 : D[o.url] = 1, r.load(o.url, o.forceCSS || !o.forceJS && "css" == o.url.split(".").pop().split("?").shift() ? "c" : ab, o.noexec, o.attrs, o.timeout), (aa(s) || aa(l)) && r.load(function() {
                    T(), s && s(o.origUrl, p, q), l && l(o.origUrl, p, q), D[o.url] = 2
                })))
            }

            function m(w, v) {
                function u(b, h) {
                    if (b) {
                        if (Z(b)) {
                            h || (r = function() {
                                var j = [].slice.call(arguments);
                                q.apply(this, j), p()
                            }), n(b, r, v, 0, t)
                        } else {
                            if (Object(b) === b) {
                                for (g in o = function() {
                                        var a = 0,
                                            j;
                                        for (j in b) {
                                            b.hasOwnProperty(j) && a++
                                        }
                                        return a
                                    }(), b) {
                                    b.hasOwnProperty(g) && (!h && !--o && (aa(r) ? r = function() {
                                        var j = [].slice.call(arguments);
                                        q.apply(this, j), p()
                                    } : r[g] = function(j) {
                                        return function() {
                                            var a = [].slice.call(arguments);
                                            j && j.apply(this, a), p()
                                        }
                                    }(q[g])), n(b[g], r, v, g, t))
                                }
                            }
                        }
                    } else {
                        !h && p()
                    }
                }
                var t = !!w.test,
                    s = w.load || w.both,
                    r = w.callback || Y,
                    q = r,
                    p = w.complete || Y,
                    o, g;
                u(t ? w.yep : w.nope, !!s), s && u(s)
            }
            var k, f, d = this.yepnope.loader;
            if (Z(e)) {
                n(e, 0, d, 0)
            } else {
                if (F(e)) {
                    for (k = 0; k < e.length; k++) {
                        f = e[k], Z(f) ? n(f, 0, d, 0) : F(f) ? L(f) : Object(f) === f && m(f, d)
                    }
                } else {
                    Object(e) === e && m(e, d)
                }
            }
        }, L.addPrefix = function(d, c) {
            C[d] = c
        }, L.addFilter = function(b) {
            E.push(b)
        }, L.errorTimeout = 10000, null == ac.readyState && ac.addEventListener && (ac.readyState = "loading", ac.addEventListener("DOMContentLoaded", N = function() {
            ac.removeEventListener("DOMContentLoaded", N, 0), ac.readyState = "complete"
        }, 0)), ad.yepnope = T(), ad.yepnope.executeStack = W, ad.yepnope.injectJs = function(r, q, p, n, m, h) {
            var g = ac.createElement("script"),
                f, b, n = n || L.errorTimeout;
            g.src = r;
            for (b in p) {
                g.setAttribute(b, p[b])
            }
            q = h ? W : q || Y, g.onreadystatechange = g.onload = function() {
                !f && X(g.readyState) && (f = 1, q(), g.onload = g.onreadystatechange = null)
            }, R(function() {
                f || (f = 1, q(1))
            }, n), m ? g.onload() : Q.parentNode.insertBefore(g, Q)
        }, ad.yepnope.injectCss = function(b, n, m, l, k, h) {
            var l = ac.createElement("link"),
                f, n = h ? W : n || Y;
            l.href = b, l.rel = "stylesheet", l.type = "text/css";
            for (f in m) {
                l.setAttribute(f, m[f])
            }
            k || (Q.parentNode.insertBefore(l, Q), R(n, 0))
        }
    }(this, document), Modernizr.load = function() {
        yepnope.apply(window, [].slice.call(arguments, 0))
    };
(function(c) {
    c.extend(c.fn, {
        validate: function(d) {
            if (!this.length) {
                d && d.debug && window.console && console.warn("nothing selected, can't validate, returning nothing");
                return
            }
            var e = c.data(this[0], "validator");
            if (e) {
                return e
            }
            e = new c.validator(d, this[0]);
            c.data(this[0], "validator", e);
            if (e.settings.onsubmit) {
                this.find("input, button").filter(".cancel").click(function() {
                    e.cancelSubmit = true
                });
                if (e.settings.submitHandler) {
                    this.find("input, button").filter(":submit").click(function() {
                        e.submitButton = this
                    })
                }
                this.submit(function(f) {
                    if (e.settings.debug) {
                        f.preventDefault()
                    }

                    function g() {
                        if (e.settings.submitHandler) {
                            if (e.submitButton) {
                                var h = c("<input type='hidden'/>").attr("name", e.submitButton.name).val(e.submitButton.value).appendTo(e.currentForm)
                            }
                            e.settings.submitHandler.call(e, e.currentForm);
                            if (e.submitButton) {
                                h.remove()
                            }
                            return false
                        }
                        return true
                    }
                    if (e.cancelSubmit) {
                        e.cancelSubmit = false;
                        return g()
                    }
                    if (e.form()) {
                        if (e.pendingRequest) {
                            e.formSubmitted = true;
                            return false
                        }
                        return g()
                    } else {
                        e.focusInvalid();
                        return false
                    }
                })
            }
            return e
        },
        valid: function() {
            if (c(this[0]).is("form")) {
                return this.validate().form()
            } else {
                var e = true;
                var d = c(this[0].form).validate();
                this.each(function() {
                    e &= d.element(this)
                });
                return e
            }
        },
        removeAttrs: function(f) {
            var d = {},
                e = this;
            c.each(f.split(/\s/), function(g, h) {
                d[h] = e.attr(h);
                e.removeAttr(h)
            });
            return d
        },
        rules: function(g, d) {
            var j = this[0];
            if (g) {
                var f = c.data(j.form, "validator").settings;
                var l = f.rules;
                var m = c.validator.staticRules(j);
                switch (g) {
                    case "add":
                        c.extend(m, c.validator.normalizeRule(d));
                        l[j.name] = m;
                        if (d.messages) {
                            f.messages[j.name] = c.extend(f.messages[j.name], d.messages)
                        }
                        break;
                    case "remove":
                        if (!d) {
                            delete l[j.name];
                            return m
                        }
                        var k = {};
                        c.each(d.split(/\s/), function(n, o) {
                            k[o] = m[o];
                            delete m[o]
                        });
                        return k
                }
            }
            var h = c.validator.normalizeRules(c.extend({}, c.validator.metadataRules(j), c.validator.classRules(j), c.validator.attributeRules(j), c.validator.staticRules(j)), j);
            if (h.required) {
                var e = h.required;
                delete h.required;
                h = c.extend({
                    required: e
                }, h)
            }
            return h
        }
    });
    c.extend(c.expr[":"], {
        blank: function(d) {
            return !c.trim("" + d.value)
        },
        filled: function(d) {
            return !!c.trim("" + d.value)
        },
        unchecked: function(d) {
            return !d.checked
        }
    });
    c.validator = function(d, e) {
        this.settings = c.extend(true, {}, c.validator.defaults, d);
        this.currentForm = e;
        this.init()
    };
    c.validator.format = function(d, e) {
        if (arguments.length == 1) {
            return function() {
                var f = c.makeArray(arguments);
                f.unshift(d);
                return c.validator.format.apply(this, f)
            }
        }
        if (arguments.length > 2 && e.constructor != Array) {
            e = c.makeArray(arguments).slice(1)
        }
        if (e.constructor != Array) {
            e = [e]
        }
        c.each(e, function(f, g) {
            d = d.replace(new RegExp("\\{" + f + "\\}", "g"), g)
        });
        return d
    };
    var b;
    var a = c("html").attr("lang");
    switch (a.substring(0, 2)) {
        case "es":
            b = {
                required: "Este campo es obligatorio.",
                remote: "Por favor, rellene esta campo.",
                email: "Por favor, escriba una direcci&oacute;n de correo v&aacute;lida",
                url: "Por favor, escriba una URL válida.",
                date: "Por favor, escriba una fecha válida.",
                dateISO: "Por favor, escriba una fecha (ISO) válida.",
                number: "Por favor, escriba un número entero válido.",
                digits: "Por favor, escriba sólo dígitos.",
                creditcard: "Por favor, escriba un número de tarjeta válido.",
                equalTo: "Por favor, escriba el mismo valor de nuevo.",
                accept: "Por favor, escriba una valor con una extensión aceptada.",
                maxlength: jQuery.validator.format("Por favor, no escriba más de {0} caracteres."),
                minlength: jQuery.validator.format("Por favor, no escriba menos de {0} caracteres."),
                rangelength: jQuery.validator.format("Por favor, escriba un valor entre {0} y {1} caracteres."),
                range: jQuery.validator.format("Por favor, escriba un valor entre {0} y {1}."),
                max: jQuery.validator.format("Por favor, escriba un valor igual o menor que {0}."),
                min: jQuery.validator.format("Por favor, escriba un valor igual o mayor que {0}."),
                unique: "Este email ya ha sido registrado.",
                fullname: "Por favor, introduzca su nombre y apellido.",
                boxoffice: "Lo sentimos pero no podemos realizar envíos a apartados de correos. Gracias por su comprensión."
            };
            break;
        case "ru":
            b = {
                required: "Заполнить поле.",
                remote: "Пожалуйста, заполните поле.",
                email: "Пожалуйста, введите действительный эмайл",
                url: "Пожалуйста, введите действительный URL.",
                date: "Пожалуйста, введите действительное число.",
                dateISO: "Пожалуйста, введите действительное число (ISO).",
                dateDE: "Bitte geben Sie ein gültiges Datum ein.",
                number: "Пожалуйста, введите действительный полный номер.",
                numberDE: "Bitte geben Sie eine Nummer ein.",
                digits: "Пожалуйста, введите только цифры.",
                creditcard: "Пожалуйста, введите действительный номер пластиковой карты.",
                equalTo: "Пожалуйста, напишите заново.",
                accept: "Пожалуйста, введите заново.",
                maxlength: jQuery.validator.format("Пожалуйста, не вводите больше {0} символов."),
                minlength: jQuery.validator.format("Пожалуйста, не вводите меньше {0} символов."),
                rangelength: jQuery.validator.format("Пожалуйста, введите значение между {0} и {1} символов."),
                range: jQuery.validator.format("Пожалуйста, введите значение между {0} и {1}."),
                max: jQuery.validator.format("Пожалуйста, введите значение равно или меньше {0}."),
                min: jQuery.validator.format("Пожалуйста, введите значение равно или больше {0}."),
                unique: "Данный эмайл был зарегистрирован",
                fullname: "Пожалуйста, введите Ваше имя и фамилию",
                boxoffice: "К сожалению, мы не в состоянии отправить Ваш заказ в почтовый ящик."
            };
            break;
        case "fr":
            b = {
                required: "Ce champ est requis.",
                remote: "Veuillez remplir ce champ pour continuer.",
                email: "Veuillez entrer une adresse email valide.",
                url: "Veuillez entrer une URL valide.",
                date: "Veuillez entrer une date valide.",
                dateISO: "Veuillez entrer une date valide (ISO).",
                number: "Veuillez entrer un nombre valide.",
                digits: "Veuillez entrer (seulement) une valeur numérique.",
                creditcard: "Veuillez entrer un numéro de carte de crédit valide.",
                equalTo: "Veuillez entrer une nouvelle fois la même valeur.",
                accept: "Veuillez entrer une valeur avec une extension valide.",
                maxlength: jQuery.validator.format("Veuillez ne pas entrer plus de {0} caractères."),
                minlength: jQuery.validator.format("Veuillez entrer au moins {0} caractères."),
                rangelength: jQuery.validator.format("Veuillez entrer entre {0} et {1} caractères."),
                range: jQuery.validator.format("Veuillez entrer une valeur entre {0} et {1}."),
                max: jQuery.validator.format("Veuillez entrer une valeur inférieure ou égale à {0}."),
                min: jQuery.validator.format("Veuillez entrer une valeur supérieure ou égale à {0}."),
                unique: "Cet e-mail a déjà été enregistrée",
                fullname: "Merci de bien vouloir laisser votre prénom et votre nom",
                boxoffice: "Nous sommes désolés mais nous ne livrons pas aux boîtes postales.  Merci pour votre compréhension. "
            };
            break;
        case "it":
            b = {
                required: "Questo campo é obbligatorio.",
                remote: "Riempia questo campo, per favore.",
                email: "Inserisca un indirizzo di posta valido, per favore",
                url: "Inserisca un URL valido, per favore.",
                date: "Inserisca una data valida, per favore.",
                dateISO: "Inserisca una data (ISO) valida, per favore.",
                number: "Inserisca un numero intero valido, per favore.",
                digits: "Inserisca solo numeri, per favore.",
                creditcard: "Inserisca un numero di carta valido, per favore.",
                equalTo: "Inserisca di nuovo lo stesso valore, per favore.",
                accept: "Inserisca un valore con un'estenzione accettabile, per favore.",
                maxlength: jQuery.validator.format("Non inserisca più di {0} caratteri, per favore."),
                minlength: jQuery.validator.format("Non inserisca meno di {0} caratteri, per favore."),
                rangelength: jQuery.validator.format("Inserisca un valore tra {0} e {1} caratteri,per favore."),
                range: jQuery.validator.format("Inserisca un valore tra {0} e {1}, per favore."),
                max: jQuery.validator.format("Inserisca un valore ugule o minore di {0}, per favore."),
                min: jQuery.validator.format("Inserisca un valore ugule o maggiore di {0}, per favore."),
                unique: "Questa email è già stata registrata",
                fullname: "Per favore, inserisca il suo nome e cognome",
                boxoffice: "Siamo spiacenti ma non é possibile inviare il tuo ordine ad un casella postale."
            };
            break;
        case "de":
            b = {
                required: "Dieses Feld ist ein Pflichtfeld.",
                maxlength: jQuery.validator.format("Geben Sie bitte maximal {0} Zeichen ein."),
                minlength: jQuery.validator.format("Geben Sie bitte mindestens {0} Zeichen ein."),
                rangelength: jQuery.validator.format("Geben Sie bitte mindestens {0} und maximal {1} Zeichen ein."),
                email: "Geben Sie bitte eine gültige E-Mail Adresse ein.",
                url: "Geben Sie bitte eine gültige URL ein.",
                date: "Bitte geben Sie ein gültiges Datum ein.",
                number: "Geben Sie bitte eine Nummer ein.",
                digits: "Geben Sie bitte nur Ziffern ein.",
                equalTo: "Bitte denselben Wert wiederholen.",
                range: jQuery.validator.format("Geben Sie bitten einen Wert zwischen {0} und {1}."),
                max: jQuery.validator.format("Geben Sie bitte einen Wert kleiner oder gleich {0} ein."),
                min: jQuery.validator.format("Geben Sie bitte einen Wert größer oder gleich {0} ein."),
                creditcard: "Geben Sie bitte ein gültige Kreditkarten-Nummer ein.",
                unique: "Diese E-Mail ist bereits registriert",
                fullname: "Bitte geben Sie Ihren Vor- und Nachnamen ein.",
                boxoffice: "Leider ist eine Lieferung an Packstationen nicht möglich."
            };
            break;
        case "cn":
            b = {
                required: "这是必填项",
                remote: "这是必填项",
                email: "请输入有效邮箱地址。",
                url: "请输入有效网址。",
                date: "请输入有效日期。",
                dateISO: "请输入有效日期（国际标准）。",
                dateDE: "Bitte geben Sie ein gültiges Datum ein.",
                number: "请输入有效数字。",
                numberDE: "Bitte geben Sie eine Nummer ein.",
                digits: "请只输入数字。",
                creditcard: "请输入有效的卡号。",
                equalTo: "请再次输入相同的信息。",
                accept: "请输入具有有效长度的内容。",
                maxlength: c.validator.format("请不要输入字数多于{0} 的内容。"),
                minlength: c.validator.format("请至少输入{0}字的内容。"),
                rangelength: c.validator.format("请输入字数介于{0}到{1}的内容。"),
                range: c.validator.format("请输入字数介于{0}到{1}。"),
                max: c.validator.format("请输入等于或少于{0}字数的内容"),
                min: c.validator.format("请输入大于或等于{0}字数的内容"),
                unique: "这个邮箱已经注册",
                fullname: "请输入您的姓名",
                boxoffice: "We are sorry, but we are not able to send your order to a PO Box. Thanks for your understanding."
            };
            break;
        default:
            b = {
                required: "This field is required.",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date (ISO).",
                dateDE: "Bitte geben Sie ein gültiges Datum ein.",
                number: "Please enter a valid number.",
                numberDE: "Bitte geben Sie eine Nummer ein.",
                digits: "Please enter only digits",
                creditcard: "Please enter a valid credit card.",
                equalTo: "Please enter the same value again.",
                accept: "Please enter a value with a valid extension.",
                maxlength: c.validator.format("Please enter no more than {0} characters."),
                minlength: c.validator.format("Please enter at least {0} characters."),
                rangelength: c.validator.format("Please enter a value between {0} and {1} characters long."),
                range: c.validator.format("Please enter a value between {0} and {1}."),
                max: c.validator.format("Please enter a value less than or equal to {0}."),
                min: c.validator.format("Please enter a value greater than or equal to {0}."),
                unique: "This email has already been registered",
                fullname: "Please enter your name and surname",
                boxoffice: "We are sorry, but we are not able to send your order to a PO Box. Thanks for your understanding."
            }
    }
    c.extend(c.validator, {
        defaults: {
            messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusInvalid: true,
            errorContainer: c([]),
            errorLabelContainer: c([]),
            onsubmit: true,
            ignore: [],
            ignoreTitle: false,
            onfocusin: function(d) {
                this.lastActive = d;
                if (this.settings.focusCleanup && !this.blockFocusCleanup) {
                    this.settings.unhighlight && this.settings.unhighlight.call(this, d, this.settings.errorClass, this.settings.validClass);
                    this.errorsFor(d).hide()
                }
            },
            onfocusout: function(d) {
                if (!this.checkable(d) && (d.name in this.submitted || !this.optional(d))) {
                    this.element(d)
                }
            },
            onkeyup: function(d) {
                if (d.name in this.submitted || d == this.lastElement) {
                    this.element(d)
                }
            },
            onclick: function(d) {
                if (d.name in this.submitted) {
                    this.element(d)
                } else {
                    if (d.parentNode.name in this.submitted) {
                        this.element(d.parentNode)
                    }
                }
            },
            highlight: function(f, d, e) {
                c(f).addClass(d).removeClass(e)
            },
            unhighlight: function(f, d, e) {
                c(f).removeClass(d).addClass(e)
            }
        },
        setDefaults: function(d) {
            c.extend(c.validator.defaults, d)
        },
        messages: b,
        autoCreateRanges: false,
        prototype: {
            init: function() {
                this.labelContainer = c(this.settings.errorLabelContainer);
                this.errorContext = this.labelContainer.length && this.labelContainer || c(this.currentForm);
                this.containers = c(this.settings.errorContainer).add(this.settings.errorLabelContainer);
                this.submitted = {};
                this.valueCache = {};
                this.pendingRequest = 0;
                this.pending = {};
                this.invalid = {};
                this.reset();
                var d = (this.groups = {});
                c.each(this.settings.groups, function(g, h) {
                    c.each(h.split(/\s/), function(k, j) {
                        d[j] = g
                    })
                });
                var f = this.settings.rules;
                c.each(f, function(g, h) {
                    f[g] = c.validator.normalizeRule(h)
                });

                function e(j) {
                    var h = c.data(this[0].form, "validator"),
                        g = "on" + j.type.replace(/^validate/, "");
                    h.settings[g] && h.settings[g].call(h, this[0])
                }
                c(this.currentForm).validateDelegate(":text, :password, :file, select, textarea", "focusin focusout keyup", e).validateDelegate(":radio, :checkbox, select, option", "click", e);
                if (this.settings.invalidHandler) {
                    c(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler)
                }
            },
            form: function() {
                this.checkForm();
                c.extend(this.submitted, this.errorMap);
                this.invalid = c.extend({}, this.errorMap);
                if (!this.valid()) {
                    c(this.currentForm).triggerHandler("invalid-form", [this])
                }
                this.showErrors();
                return this.valid()
            },
            checkForm: function() {
                this.prepareForm();
                for (var d = 0, e = (this.currentElements = this.elements()); e[d]; d++) {
                    this.check(e[d])
                }
                return this.valid()
            },
            element: function(e) {
                e = this.clean(e);
                this.lastElement = e;
                this.prepareElement(e);
                this.currentElements = c(e);
                var d = this.check(e);
                if (d) {
                    delete this.invalid[e.name]
                } else {
                    this.invalid[e.name] = true
                }
                if (!this.numberOfInvalids()) {
                    this.toHide = this.toHide.add(this.containers)
                }
                this.showErrors();
                return d
            },
            showErrors: function(e) {
                if (e) {
                    c.extend(this.errorMap, e);
                    this.errorList = [];
                    for (var d in e) {
                        this.errorList.push({
                            message: e[d],
                            element: this.findByName(d)[0]
                        })
                    }
                    this.successList = c.grep(this.successList, function(f) {
                        return !(f.name in e)
                    })
                }
                this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors()
            },
            resetForm: function() {
                if (c.fn.resetForm) {
                    c(this.currentForm).resetForm()
                }
                this.submitted = {};
                this.prepareForm();
                this.hideErrors();
                this.elements().removeClass(this.settings.errorClass)
            },
            numberOfInvalids: function() {
                return this.objectLength(this.invalid)
            },
            objectLength: function(f) {
                var e = 0;
                for (var d in f) {
                    e++
                }
                return e
            },
            hideErrors: function() {
                this.addWrapper(this.toHide).hide()
            },
            valid: function() {
                return this.size() == 0
            },
            size: function() {
                return this.errorList.length
            },
            focusInvalid: function() {
                if (this.settings.focusInvalid) {
                    try {
                        c(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin")
                    } catch (d) {}
                }
            },
            findLastActive: function() {
                var d = this.lastActive;
                return d && c.grep(this.errorList, function(e) {
                    return e.element.name == d.name
                }).length == 1 && d
            },
            elements: function() {
                var e = this,
                    d = {};
                return c([]).add(this.currentForm.elements).filter(":input").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function() {
                    !this.name && e.settings.debug && window.console && console.error("%o has no name assigned", this);
                    if (this.name in d || !e.objectLength(c(this).rules())) {
                        return false
                    }
                    d[this.name] = true;
                    return true
                })
            },
            clean: function(d) {
                return c(d)[0]
            },
            errors: function() {
                return c(this.settings.errorElement + "." + this.settings.errorClass, this.errorContext)
            },
            reset: function() {
                this.successList = [];
                this.errorList = [];
                this.errorMap = {};
                this.toShow = c([]);
                this.toHide = c([]);
                this.currentElements = c([])
            },
            prepareForm: function() {
                this.reset();
                this.toHide = this.errors().add(this.containers)
            },
            prepareElement: function(d) {
                this.reset();
                this.toHide = this.errorsFor(d)
            },
            check: function(f) {
                f = this.clean(f);
                if (this.checkable(f)) {
                    f = this.findByName(f.name)[0]
                }
                var k = c(f).rules();
                var g = false;
                for (method in k) {
                    var j = {
                        method: method,
                        parameters: k[method]
                    };
                    try {
                        var d = c.validator.methods[method].call(this, f.value.replace(/\r/g, ""), f, j.parameters);
                        if (d == "dependency-mismatch") {
                            g = true;
                            continue
                        }
                        g = false;
                        if (d == "pending") {
                            this.toHide = this.toHide.not(this.errorsFor(f));
                            return
                        }
                        if (!d) {
                            this.formatAndAdd(f, j);
                            return false
                        }
                    } catch (h) {
                        this.settings.debug && window.console && console.log("exception occured when checking element " + f.id + ", check the '" + j.method + "' method", h);
                        throw h
                    }
                }
                if (g) {
                    return
                }
                if (this.objectLength(k)) {
                    this.successList.push(f)
                }
                return true
            },
            customMetaMessage: function(d, f) {
                if (!c.metadata) {
                    return
                }
                var e = this.settings.meta ? c(d).metadata()[this.settings.meta] : c(d).metadata();
                return e && e.messages && e.messages[f]
            },
            customMessage: function(e, f) {
                var d = this.settings.messages[e];
                return d && (d.constructor == String ? d : d[f])
            },
            findDefined: function() {
                for (var d = 0; d < arguments.length; d++) {
                    if (arguments[d] !== undefined) {
                        return arguments[d]
                    }
                }
                return undefined
            },
            defaultMessage: function(d, e) {
                return this.findDefined(this.customMessage(d.name, e), this.customMetaMessage(d, e), !this.settings.ignoreTitle && d.title || undefined, c.validator.messages[e], "<strong>Warning: No message defined for " + d.name + "</strong>")
            },
            formatAndAdd: function(e, g) {
                var f = this.defaultMessage(e, g.method),
                    d = /\$?\{(\d+)\}/g;
                if (typeof f == "function") {
                    f = f.call(this, g.parameters, e)
                } else {
                    if (d.test(f)) {
                        f = jQuery.format(f.replace(d, "{$1}"), g.parameters)
                    }
                }
                this.errorList.push({
                    message: f,
                    element: e
                });
                this.errorMap[e.name] = f;
                this.submitted[e.name] = f
            },
            addWrapper: function(d) {
                if (this.settings.wrapper) {
                    d = d.add(d.parent(this.settings.wrapper))
                }
                return d
            },
            defaultShowErrors: function() {
                for (var e = 0; this.errorList[e]; e++) {
                    var d = this.errorList[e];
                    this.settings.highlight && this.settings.highlight.call(this, d.element, this.settings.errorClass, this.settings.validClass);
                    this.showLabel(d.element, d.message)
                }
                if (this.errorList.length) {
                    this.toShow = this.toShow.add(this.containers)
                }
                if (this.settings.success) {
                    for (var e = 0; this.successList[e]; e++) {
                        this.showLabel(this.successList[e])
                    }
                }
                if (this.settings.unhighlight) {
                    for (var e = 0, f = this.validElements(); f[e]; e++) {
                        this.settings.unhighlight.call(this, f[e], this.settings.errorClass, this.settings.validClass)
                    }
                }
                this.toHide = this.toHide.not(this.toShow);
                this.hideErrors();
                this.addWrapper(this.toShow).show()
            },
            validElements: function() {
                return this.currentElements.not(this.invalidElements())
            },
            invalidElements: function() {
                return c(this.errorList).map(function() {
                    return this.element
                })
            },
            showLabel: function(e, f) {
                var d = this.errorsFor(e);
                if (d.length) {
                    d.removeClass().addClass(this.settings.errorClass);
                    d.attr("generated") && d.html(f)
                } else {
                    d = c("<" + this.settings.errorElement + "/>").attr({
                        "for": this.idOrName(e),
                        generated: true
                    }).addClass(this.settings.errorClass).html(f || "");
                    if (this.settings.wrapper) {
                        d = d.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()
                    }
                    if (!this.labelContainer.append(d).length) {
                        this.settings.errorPlacement ? this.settings.errorPlacement(d, c(e)) : d.insertAfter(e)
                    }
                }
                if (!f && this.settings.success) {
                    d.text("");
                    typeof this.settings.success == "string" ? d.addClass(this.settings.success) : this.settings.success(d)
                }
                this.toShow = this.toShow.add(d)
            },
            errorsFor: function(e) {
                var d = this.idOrName(e);
                return this.errors().filter(function() {
                    return c(this).attr("for") == d
                })
            },
            idOrName: function(d) {
                return this.groups[d.name] || (this.checkable(d) ? d.name : d.id || d.name)
            },
            checkable: function(d) {
                return /radio|checkbox/i.test(d.type)
            },
            findByName: function(d) {
                var e = this.currentForm;
                return c(document.getElementsByName(d)).map(function(f, g) {
                    return g.form == e && g.name == d && g || null
                })
            },
            getLength: function(e, d) {
                switch (d.nodeName.toLowerCase()) {
                    case "select":
                        return c("option:selected", d).length;
                    case "input":
                        if (this.checkable(d)) {
                            return this.findByName(d.name).filter(":checked").length
                        }
                }
                return e.length
            },
            depend: function(e, d) {
                return this.dependTypes[typeof e] ? this.dependTypes[typeof e](e, d) : true
            },
            dependTypes: {
                "boolean": function(e, d) {
                    return e
                },
                string: function(e, d) {
                    return !!c(e, d.form).length
                },
                "function": function(e, d) {
                    return e(d)
                }
            },
            optional: function(d) {
                return !c.validator.methods.required.call(this, c.trim(d.value), d) && "dependency-mismatch"
            },
            startRequest: function(d) {
                if (!this.pending[d.name]) {
                    this.pendingRequest++;
                    this.pending[d.name] = true
                }
            },
            stopRequest: function(d, e) {
                this.pendingRequest--;
                if (this.pendingRequest < 0) {
                    this.pendingRequest = 0
                }
                delete this.pending[d.name];
                if (e && this.pendingRequest == 0 && this.formSubmitted && this.form()) {
                    c(this.currentForm).submit();
                    this.formSubmitted = false
                } else {
                    if (!e && this.pendingRequest == 0 && this.formSubmitted) {
                        c(this.currentForm).triggerHandler("invalid-form", [this]);
                        this.formSubmitted = false
                    }
                }
            },
            previousValue: function(d) {
                return c.data(d, "previousValue") || c.data(d, "previousValue", {
                    old: null,
                    valid: true,
                    message: this.defaultMessage(d, "remote")
                })
            }
        },
        classRuleSettings: {
            required: {
                required: true
            },
            email: {
                email: true
            },
            url: {
                url: true
            },
            date: {
                date: true
            },
            dateISO: {
                dateISO: true
            },
            dateDE: {
                dateDE: true
            },
            number: {
                number: true
            },
            numberDE: {
                numberDE: true
            },
            digits: {
                digits: true
            },
            creditcard: {
                creditcard: true
            }
        },
        addClassRules: function(d, e) {
            d.constructor == String ? this.classRuleSettings[d] = e : c.extend(this.classRuleSettings, d)
        },
        classRules: function(e) {
            var f = {};
            var d = c(e).attr("class");
            d && c.each(d.split(" "), function() {
                if (this in c.validator.classRuleSettings) {
                    c.extend(f, c.validator.classRuleSettings[this])
                }
            });
            return f
        },
        attributeRules: function(e) {
            var g = {};
            var d = c(e);
            for (method in c.validator.methods) {
                var f = d.attr(method);
                if (f) {
                    g[method] = f
                }
            }
            if (g.maxlength && /-1|2147483647|524288/.test(g.maxlength)) {
                delete g.maxlength
            }
            return g
        },
        metadataRules: function(d) {
            if (!c.metadata) {
                return {}
            }
            var e = c.data(d.form, "validator").settings.meta;
            return e ? c(d).metadata()[e] : c(d).metadata()
        },
        staticRules: function(e) {
            var f = {};
            var d = c.data(e.form, "validator");
            if (d.settings.rules) {
                f = c.validator.normalizeRule(d.settings.rules[e.name]) || {}
            }
            return f
        },
        normalizeRules: function(e, d) {
            c.each(e, function(h, g) {
                if (g === false) {
                    delete e[h];
                    return
                }
                if (g.param || g.depends) {
                    var f = true;
                    switch (typeof g.depends) {
                        case "string":
                            f = !!c(g.depends, d.form).length;
                            break;
                        case "function":
                            f = g.depends.call(d, d);
                            break
                    }
                    if (f) {
                        e[h] = g.param !== undefined ? g.param : true
                    } else {
                        delete e[h]
                    }
                }
            });
            c.each(e, function(f, g) {
                e[f] = c.isFunction(g) ? g(d) : g
            });
            c.each(["minlength", "maxlength", "min", "max"], function() {
                if (e[this]) {
                    e[this] = Number(e[this])
                }
            });
            c.each(["rangelength", "range"], function() {
                if (e[this]) {
                    e[this] = [Number(e[this][0]), Number(e[this][1])]
                }
            });
            if (c.validator.autoCreateRanges) {
                if (e.min && e.max) {
                    e.range = [e.min, e.max];
                    delete e.min;
                    delete e.max
                }
                if (e.minlength && e.maxlength) {
                    e.rangelength = [e.minlength, e.maxlength];
                    delete e.minlength;
                    delete e.maxlength
                }
            }
            if (e.messages) {
                delete e.messages
            }
            return e
        },
        normalizeRule: function(e) {
            if (typeof e == "string") {
                var d = {};
                c.each(e.split(/\s/), function() {
                    d[this] = true
                });
                e = d
            }
            return e
        },
        addMethod: function(d, f, e) {
            c.validator.methods[d] = f;
            c.validator.messages[d] = e != undefined ? e : c.validator.messages[d];
            if (f.length < 3) {
                c.validator.addClassRules(d, c.validator.normalizeRule(d))
            }
        },
        methods: {
            required: function(e, d, g) {
                if (!this.depend(g, d)) {
                    return "dependency-mismatch"
                }
                switch (d.nodeName.toLowerCase()) {
                    case "select":
                        var f = c(d).val();
                        return f && f.length > 0;
                    case "input":
                        if (this.checkable(d)) {
                            return this.getLength(e, d) > 0
                        }
                    default:
                        return c.trim(e).length > 0
                }
            },
            remote: function(h, e, j) {
                if (this.optional(e)) {
                    return "dependency-mismatch"
                }
                var f = this.previousValue(e);
                if (!this.settings.messages[e.name]) {
                    this.settings.messages[e.name] = {}
                }
                f.originalMessage = this.settings.messages[e.name].remote;
                this.settings.messages[e.name].remote = f.message;
                j = typeof j == "string" && {
                    url: j
                } || j;
                if (f.old !== h) {
                    f.old = h;
                    var d = this;
                    this.startRequest(e);
                    var g = {};
                    g[e.name] = h;
                    c.ajax(c.extend(true, {
                        url: j,
                        mode: "abort",
                        port: "validate" + e.name,
                        dataType: "json",
                        data: g,
                        success: function(l) {
                            d.settings.messages[e.name].remote = f.originalMessage;
                            var n = l === true;
                            if (n) {
                                var k = d.formSubmitted;
                                d.prepareElement(e);
                                d.formSubmitted = k;
                                d.successList.push(e);
                                d.showErrors()
                            } else {
                                var o = {};
                                var m = (f.message = l || d.defaultMessage(e, "remote"));
                                o[e.name] = c.isFunction(m) ? m(h) : m;
                                d.showErrors(o)
                            }
                            f.valid = n;
                            d.stopRequest(e, n)
                        }
                    }, j));
                    return "pending"
                } else {
                    if (this.pending[e.name]) {
                        return "pending"
                    }
                }
                return f.valid
            },
            minlength: function(e, d, f) {
                return this.optional(d) || this.getLength(c.trim(e), d) >= f
            },
            maxlength: function(e, d, f) {
                return this.optional(d) || this.getLength(c.trim(e), d) <= f
            },
            rangelength: function(f, d, g) {
                var e = this.getLength(c.trim(f), d);
                return this.optional(d) || (e >= g[0] && e <= g[1])
            },
            min: function(e, d, f) {
                return this.optional(d) || e >= f
            },
            max: function(e, d, f) {
                return this.optional(d) || e <= f
            },
            range: function(e, d, f) {
                return this.optional(d) || (e >= f[0] && e <= f[1])
            },
            email: function(e, d) {
                return this.optional(d) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(e)
            },
            url: function(e, d) {
                return this.optional(d) || /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e)
            },
            date: function(e, d) {
                return this.optional(d) || !/Invalid|NaN/.test(new Date(e))
            },
            dateISO: function(e, d) {
                return this.optional(d) || /^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(e)
            },
            number: function(e, d) {
                return this.optional(d) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(e)
            },
            digits: function(e, d) {
                return this.optional(d) || /^\d+$/.test(e)
            },
            creditcard: function(h, e) {
                if (this.optional(e)) {
                    return "dependency-mismatch"
                }
                if (/[^0-9-]+/.test(h)) {
                    return false
                }
                var j = 0,
                    g = 0,
                    d = false;
                h = h.replace(/\D/g, "");
                for (var k = h.length - 1; k >= 0; k--) {
                    var f = h.charAt(k);
                    var g = parseInt(f, 10);
                    if (d) {
                        if ((g *= 2) > 9) {
                            g -= 9
                        }
                    }
                    j += g;
                    d = !d
                }
                return (j % 10) == 0
            },
            accept: function(e, d, f) {
                f = typeof f == "string" ? f.replace(/,/g, "|") : "png|jpe?g|gif";
                return this.optional(d) || e.match(new RegExp(".(" + f + ")$", "i"))
            },
            equalTo: function(e, d, g) {
                var f = c(g).unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                    c(d).valid()
                });
                return e == f.val()
            }
        }
    });
    c.format = c.validator.format
})(jQuery);
(function(c) {
    var b = c.ajax;
    var a = {};
    c.ajax = function(e) {
        e = c.extend(e, c.extend({}, c.ajaxSettings, e));
        var d = e.port;
        if (e.mode == "abort") {
            if (a[d]) {
                a[d].abort()
            }
            return (a[d] = b.apply(this, arguments))
        }
        return b.apply(this, arguments)
    }
})(jQuery);
(function(a) {
    if (!jQuery.event.special.focusin && !jQuery.event.special.focusout && document.addEventListener) {
        a.each({
            focus: "focusin",
            blur: "focusout"
        }, function(c, b) {
            a.event.special[b] = {
                setup: function() {
                    this.addEventListener(c, d, true)
                },
                teardown: function() {
                    this.removeEventListener(c, d, true)
                },
                handler: function(f) {
                    arguments[0] = a.event.fix(f);
                    arguments[0].type = b;
                    return a.event.handle.apply(this, arguments)
                }
            };

            function d(f) {
                f = a.event.fix(f);
                f.type = b;
                return a.event.handle.call(this, f)
            }
        })
    }
    a.extend(a.fn, {
        validateDelegate: function(d, c, b) {
            return this.bind(c, function(e) {
                var f = a(e.target);
                if (f.is(d)) {
                    return b.apply(f, arguments)
                }
            })
        }
    })
})(jQuery);
$.validator.addMethod("fullname", function(d, b) {
    var a = false;
    var c = /[\s]/;
    return this.optional(b) || c.test(d)
});
$.validator.addMethod("boxoffice", function(e, b) {
    var c = e.toLowerCase();
    c = c.replace(/\./g, "");
    var g = c.replace(/\s/g, "");
    var a = /\bpob\b/;
    var h = /(officebox)/;
    var f = /(postalbox)/;
    var d = /\bpo(\s|)box\b/;
    if ((c.match(a)) || (g.match(h)) || (g.match(f)) || (c.match(d))) {
        return false
    } else {
        return true
    }
});
/* Magnific Popup - v0.9.3 - 2013-07-16
 * http://dimsemenov.com/plugins/magnific-popup/
 * Copyright (c) 2013 Dmitry Semenov; */
(function(F) {
    var B = "Close",
        K = "BeforeClose",
        y = "AfterClose",
        Q = "BeforeAppend",
        f = "MarkupParse",
        m = "Open",
        h = "Change",
        G = "mfp",
        d = "." + G,
        L = "mfp-ready",
        N = "mfp-removing",
        e = "mfp-prevent-close";
    var V, C = function() {},
        M = !!(window.jQuery),
        E, a = F(window),
        A, D, I, b, O;
    var k = function(Y, Z) {
            V.ev.on(G + Y + d, Z)
        },
        p = function(ac, Z, aa, Y) {
            var ab = document.createElement("div");
            ab.className = "mfp-" + ac;
            if (aa) {
                ab.innerHTML = aa
            }
            if (!Y) {
                ab = F(ab);
                if (Z) {
                    ab.appendTo(Z)
                }
            } else {
                if (Z) {
                    Z.appendChild(ab)
                }
            }
            return ab
        },
        S = function(Z, Y) {
            V.ev.triggerHandler(G + Z, Y);
            if (V.st.callbacks) {
                Z = Z.charAt(0).toLowerCase() + Z.slice(1);
                if (V.st.callbacks[Z]) {
                    V.st.callbacks[Z].apply(V, F.isArray(Y) ? Y : [Y])
                }
            }
        },
        j = function() {
            (V.st.focus ? V.content.find(V.st.focus).eq(0) : V.wrap).trigger("focus")
        },
        H = function(Y) {
            if (Y !== O || !V.currTemplate.closeBtn) {
                V.currTemplate.closeBtn = F(V.st.closeMarkup.replace("%title%", V.st.tClose));
                O = Y
            }
            return V.currTemplate.closeBtn
        },
        v = function() {
            if (!F.magnificPopup.instance) {
                V = new C();
                V.init();
                F.magnificPopup.instance = V
            }
        },
        q = function(aa) {
            if (F(aa).hasClass(e)) {
                return
            }
            var Y = V.st.closeOnContentClick;
            var Z = V.st.closeOnBgClick;
            if (Y && Z) {
                return true
            } else {
                if (!V.content || F(aa).hasClass("mfp-close") || (V.preloader && aa === V.preloader[0])) {
                    return true
                }
                if ((aa !== V.content[0] && !F.contains(V.content[0], aa))) {
                    if (Z) {
                        if (F.contains(document, aa)) {
                            return true
                        }
                    }
                } else {
                    if (Y) {
                        return true
                    }
                }
            }
            return false
        },
        X = function() {
            var Z = document.createElement("p").style,
                Y = ["ms", "O", "Moz", "Webkit"];
            if (Z.transition !== undefined) {
                return true
            }
            while (Y.length) {
                if (Y.pop() + "Transition" in Z) {
                    return true
                }
            }
            return false
        };
    C.prototype = {
        constructor: C,
        init: function() {
            var Y = navigator.appVersion;
            V.isIE7 = Y.indexOf("MSIE 7.") !== -1;
            V.isIE8 = Y.indexOf("MSIE 8.") !== -1;
            V.isLowIE = V.isIE7 || V.isIE8;
            V.isAndroid = (/android/gi).test(Y);
            V.isIOS = (/iphone|ipad|ipod/gi).test(Y);
            V.supportsTransition = X();
            V.probablyMobile = (V.isAndroid || V.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent));
            A = F(document.body);
            D = F(document);
            V.popupsCache = {}
        },
        open: function(ad) {
            var ae;
            if (ad.isObj === false) {
                V.items = ad.items.toArray();
                V.index = 0;
                var af = ad.items,
                    ag;
                for (ae = 0; ae < af.length; ae++) {
                    ag = af[ae];
                    if (ag.parsed) {
                        ag = ag.el[0]
                    }
                    if (ag === ad.el[0]) {
                        V.index = ae;
                        break
                    }
                }
            } else {
                V.items = F.isArray(ad.items) ? ad.items : [ad.items];
                V.index = ad.index || 0
            }
            if (V.isOpen) {
                V.updateItemHTML();
                return
            }
            V.types = [];
            b = "";
            if (ad.mainEl && ad.mainEl.length) {
                V.ev = ad.mainEl.eq(0)
            } else {
                V.ev = D
            }
            if (ad.key) {
                if (!V.popupsCache[ad.key]) {
                    V.popupsCache[ad.key] = {}
                }
                V.currTemplate = V.popupsCache[ad.key]
            } else {
                V.currTemplate = {}
            }
            V.st = F.extend(true, {}, F.magnificPopup.defaults, ad);
            V.fixedContentPos = V.st.fixedContentPos === "auto" ? !V.probablyMobile : V.st.fixedContentPos;
            if (V.st.modal) {
                V.st.closeOnContentClick = false;
                V.st.closeOnBgClick = false;
                V.st.showCloseBtn = false;
                V.st.enableEscapeKey = false
            }
            if (!V.bgOverlay) {
                V.bgOverlay = p("bg").on("click" + d, function() {
                    V.close()
                });
                V.wrap = p("wrap").attr("tabindex", -1).on("click" + d, function(ai) {
                    if (q(ai.target)) {
                        V.close()
                    }
                });
                V.container = p("container", V.wrap)
            }
            V.contentContainer = p("content");
            if (V.st.preloader) {
                V.preloader = p("preloader", V.container, V.st.tLoading)
            }
            var ac = F.magnificPopup.modules;
            for (ae = 0; ae < ac.length; ae++) {
                var ab = ac[ae];
                ab = ab.charAt(0).toUpperCase() + ab.slice(1);
                V["init" + ab].call(V)
            }
            S("BeforeOpen");
            if (V.st.showCloseBtn) {
                if (!V.st.closeBtnInside) {
                    V.wrap.append(H())
                } else {
                    k(f, function(al, aj, ai, ak) {
                        ai.close_replaceWith = H(ak.type)
                    });
                    b += " mfp-close-btn-in"
                }
            }
            if (V.st.alignTop) {
                b += " mfp-align-top"
            }
            if (V.fixedContentPos) {
                V.wrap.css({
                    overflow: V.st.overflowY,
                    overflowX: "hidden",
                    overflowY: V.st.overflowY
                })
            } else {
                V.wrap.css({
                    top: a.scrollTop(),
                    position: "absolute"
                })
            }
            if (V.st.fixedBgPos === false || (V.st.fixedBgPos === "auto" && !V.fixedContentPos)) {
                V.bgOverlay.css({
                    height: D.height(),
                    position: "absolute"
                })
            }
            if (V.st.enableEscapeKey) {
                D.on("keyup" + d, function(ai) {
                    if (ai.keyCode === 27) {
                        V.close()
                    }
                })
            }
            a.on("resize" + d, function() {
                V.updateSize()
            });
            if (!V.st.closeOnContentClick) {
                b += " mfp-auto-cursor"
            }
            if (b) {
                V.wrap.addClass(b)
            }
            var Y = V.wH = a.height();
            var aa = {};
            if (V.fixedContentPos) {
                if (V._hasScrollBar(Y)) {
                    var ah = V._getScrollbarSize();
                    if (ah) {
                        aa.paddingRight = ah
                    }
                }
            }
            if (V.fixedContentPos) {
                if (!V.isIE7) {
                    aa.overflow = "hidden"
                } else {
                    F("body, html").css("overflow", "hidden")
                }
            }
            var Z = V.st.mainClass;
            if (V.isIE7) {
                Z += " mfp-ie7"
            }
            if (Z) {
                V._addClassToMFP(Z)
            }
            V.updateItemHTML();
            S("BuildControls");
            F("html").css(aa);
            V.bgOverlay.add(V.wrap).prependTo(document.body);
            V._lastFocusedEl = document.activeElement;
            setTimeout(function() {
                if (V.content) {
                    V._addClassToMFP(L);
                    j()
                } else {
                    V.bgOverlay.addClass(L)
                }
                D.on("focusin" + d, function(ai) {
                    if (ai.target !== V.wrap[0] && !F.contains(V.wrap[0], ai.target)) {
                        j();
                        return false
                    }
                })
            }, 16);
            V.isOpen = true;
            V.updateSize(Y);
            S(m)
        },
        close: function() {
            if (!V.isOpen) {
                return
            }
            S(K);
            V.isOpen = false;
            if (V.st.removalDelay && !V.isLowIE && V.supportsTransition) {
                V._addClassToMFP(N);
                setTimeout(function() {
                    V._close()
                }, V.st.removalDelay)
            } else {
                V._close()
            }
        },
        _close: function() {
            S(B);
            var Y = N + " " + L + " ";
            V.bgOverlay.detach();
            V.wrap.detach();
            V.container.empty();
            if (V.st.mainClass) {
                Y += V.st.mainClass + " "
            }
            V._removeClassFromMFP(Y);
            if (V.fixedContentPos) {
                var Z = {
                    paddingRight: ""
                };
                if (V.isIE7) {
                    F("body, html").css("overflow", "")
                } else {
                    Z.overflow = ""
                }
                F("html").css(Z)
            }
            D.off("keyup" + d + " focusin" + d);
            V.ev.off(d);
            V.wrap.attr("class", "mfp-wrap").removeAttr("style");
            V.bgOverlay.attr("class", "mfp-bg");
            V.container.attr("class", "mfp-container");
            if (V.st.showCloseBtn && (!V.st.closeBtnInside || V.currTemplate[V.currItem.type] === true)) {
                if (V.currTemplate.closeBtn) {
                    V.currTemplate.closeBtn.detach()
                }
            }
            if (V._lastFocusedEl) {
                F(V._lastFocusedEl).trigger("focus")
            }
            V.currItem = null;
            V.content = null;
            V.currTemplate = null;
            V.prevHeight = 0;
            S(y)
        },
        updateSize: function(Z) {
            if (V.isIOS) {
                var aa = document.documentElement.clientWidth / window.innerWidth;
                var Y = window.innerHeight * aa;
                V.wrap.css("height", Y);
                V.wH = Y
            } else {
                V.wH = Z || a.height()
            }
            if (!V.fixedContentPos) {
                V.wrap.css("height", V.wH)
            }
            S("Resize")
        },
        updateItemHTML: function() {
            var ab = V.items[V.index];
            V.contentContainer.detach();
            if (V.content) {
                V.content.detach()
            }
            if (!ab.parsed) {
                ab = V.parseEl(V.index)
            }
            var aa = ab.type;
            S("BeforeChange", [V.currItem ? V.currItem.type : "", aa]);
            V.currItem = ab;
            if (!V.currTemplate[aa]) {
                var Z = V.st[aa] ? V.st[aa].markup : false;
                S("FirstMarkupParse", Z);
                if (Z) {
                    V.currTemplate[aa] = F(Z)
                } else {
                    V.currTemplate[aa] = true
                }
            }
            if (I && I !== ab.type) {
                V.container.removeClass("mfp-" + I + "-holder")
            }
            var Y = V["get" + aa.charAt(0).toUpperCase() + aa.slice(1)](ab, V.currTemplate[aa]);
            V.appendContent(Y, aa);
            ab.preloaded = true;
            S(h, ab);
            I = ab.type;
            V.container.prepend(V.contentContainer);
            S("AfterChange")
        },
        appendContent: function(Y, Z) {
            V.content = Y;
            if (Y) {
                if (V.st.showCloseBtn && V.st.closeBtnInside && V.currTemplate[Z] === true) {
                    if (!V.content.find(".mfp-close").length) {
                        V.content.append(H())
                    }
                } else {
                    V.content = Y
                }
            } else {
                V.content = ""
            }
            S(Q);
            V.container.addClass("mfp-" + Z + "-holder");
            V.contentContainer.append(V.content)
        },
        parseEl: function(Y) {
            var ac = V.items[Y],
                ab = ac.type;
            if (ac.tagName) {
                ac = {
                    el: F(ac)
                }
            } else {
                ac = {
                    data: ac,
                    src: ac.src
                }
            }
            if (ac.el) {
                var aa = V.types;
                for (var Z = 0; Z < aa.length; Z++) {
                    if (ac.el.hasClass("mfp-" + aa[Z])) {
                        ab = aa[Z];
                        break
                    }
                }
                ac.src = ac.el.attr("data-mfp-src");
                if (!ac.src) {
                    ac.src = ac.el.attr("href")
                }
            }
            ac.type = ab || V.st.type || "inline";
            ac.index = Y;
            ac.parsed = true;
            V.items[Y] = ac;
            S("ElementParse", ac);
            return V.items[Y]
        },
        addGroup: function(aa, Z) {
            var ab = function(ac) {
                ac.mfpEl = this;
                V._openClick(ac, aa, Z)
            };
            if (!Z) {
                Z = {}
            }
            var Y = "click.magnificPopup";
            Z.mainEl = aa;
            if (Z.items) {
                Z.isObj = true;
                aa.off(Y).on(Y, ab)
            } else {
                Z.isObj = false;
                if (Z.delegate) {
                    aa.off(Y).on(Y, Z.delegate, ab)
                } else {
                    Z.items = aa;
                    aa.off(Y).on(Y, ab)
                }
            }
        },
        _openClick: function(ac, aa, Y) {
            var Z = Y.midClick !== undefined ? Y.midClick : F.magnificPopup.defaults.midClick;
            if (!Z && (ac.which === 2 || ac.ctrlKey || ac.metaKey)) {
                return
            }
            var ab = Y.disableOn !== undefined ? Y.disableOn : F.magnificPopup.defaults.disableOn;
            if (ab) {
                if (F.isFunction(ab)) {
                    if (!ab.call(V)) {
                        return true
                    }
                } else {
                    if (a.width() < ab) {
                        return true
                    }
                }
            }
            if (ac.type) {
                ac.preventDefault();
                if (V.isOpen) {
                    ac.stopPropagation()
                }
            }
            Y.el = F(ac.mfpEl);
            if (Y.delegate) {
                Y.items = aa.find(Y.delegate)
            }
            V.open(Y)
        },
        updateStatus: function(Y, aa) {
            if (V.preloader) {
                if (E !== Y) {
                    V.container.removeClass("mfp-s-" + E)
                }
                if (!aa && Y === "loading") {
                    aa = V.st.tLoading
                }
                var Z = {
                    status: Y,
                    text: aa
                };
                S("UpdateStatus", Z);
                Y = Z.status;
                aa = Z.text;
                V.preloader.html(aa);
                V.preloader.find("a").on("click", function(ab) {
                    ab.stopImmediatePropagation()
                });
                V.container.addClass("mfp-s-" + Y);
                E = Y
            }
        },
        _addClassToMFP: function(Y) {
            V.bgOverlay.addClass(Y);
            V.wrap.addClass(Y)
        },
        _removeClassFromMFP: function(Y) {
            this.bgOverlay.removeClass(Y);
            V.wrap.removeClass(Y)
        },
        _hasScrollBar: function(Y) {
            return ((V.isIE7 ? D.height() : document.body.scrollHeight) > (Y || a.height()))
        },
        _parseMarkup: function(aa, Z, ab) {
            var Y;
            if (ab.data) {
                Z = F.extend(ab.data, Z)
            }
            S(f, [aa, Z, ab]);
            F.each(Z, function(ad, af) {
                if (af === undefined || af === false) {
                    return true
                }
                Y = ad.split("_");
                if (Y.length > 1) {
                    var ae = aa.find(d + "-" + Y[0]);
                    if (ae.length > 0) {
                        var ac = Y[1];
                        if (ac === "replaceWith") {
                            if (ae[0] !== af[0]) {
                                ae.replaceWith(af)
                            }
                        } else {
                            if (ac === "img") {
                                if (ae.is("img")) {
                                    ae.attr("src", af)
                                } else {
                                    ae.replaceWith('<img src="' + af + '" class="' + ae.attr("class") + '" />')
                                }
                            } else {
                                ae.attr(Y[1], af)
                            }
                        }
                    }
                } else {
                    aa.find(d + "-" + ad).html(af)
                }
            })
        },
        _getScrollbarSize: function() {
            if (V.scrollbarSize === undefined) {
                var Y = document.createElement("div");
                Y.id = "mfp-sbm";
                Y.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;";
                document.body.appendChild(Y);
                V.scrollbarSize = Y.offsetWidth - Y.clientWidth;
                document.body.removeChild(Y)
            }
            return V.scrollbarSize
        }
    };
    F.magnificPopup = {
        instance: null,
        proto: C.prototype,
        modules: [],
        open: function(Z, Y) {
            v();
            if (!Z) {
                Z = {}
            }
            Z.isObj = true;
            Z.index = Y || 0;
            return this.instance.open(Z)
        },
        close: function() {
            return F.magnificPopup.instance.close()
        },
        registerModule: function(Y, Z) {
            if (Z.options) {
                F.magnificPopup.defaults[Y] = Z.options
            }
            F.extend(this.proto, Z.proto);
            this.modules.push(Y)
        },
        defaults: {
            disableOn: 0,
            key: null,
            midClick: false,
            mainClass: "",
            preloader: true,
            focus: "",
            closeOnContentClick: false,
            closeOnBgClick: true,
            closeBtnInside: true,
            showCloseBtn: true,
            enableEscapeKey: true,
            modal: false,
            alignTop: false,
            removalDelay: 0,
            fixedContentPos: "auto",
            fixedBgPos: "auto",
            overflowY: "auto",
            closeMarkup: '<button title="%title%" type="button" class="mfp-close">&times;</button>',
            tClose: "Close (Esc)",
            tLoading: "Loading..."
        }
    };
    F.fn.magnificPopup = function(aa) {
        v();
        var ab = F(this);
        if (typeof aa === "string") {
            if (aa === "open") {
                var Y, ac = M ? ab.data("magnificPopup") : ab[0].magnificPopup,
                    Z = parseInt(arguments[1], 10) || 0;
                if (ac.items) {
                    Y = ac.items[Z]
                } else {
                    Y = ab;
                    if (ac.delegate) {
                        Y = Y.find(ac.delegate)
                    }
                    Y = Y.eq(Z)
                }
                V._openClick({
                    mfpEl: Y
                }, ab, ac)
            } else {
                if (V.isOpen) {
                    V[aa].apply(V, Array.prototype.slice.call(arguments, 1))
                }
            }
        } else {
            if (M) {
                ab.data("magnificPopup", aa)
            } else {
                ab[0].magnificPopup = aa
            }
            V.addGroup(ab, aa)
        }
        return ab
    };
    var J = "inline",
        U, R, u, n = function() {
            if (u) {
                R.after(u.addClass(U)).detach();
                u = null
            }
        };
    F.magnificPopup.registerModule(J, {
        options: {
            hiddenClass: "hide",
            markup: "",
            tNotFound: "Content not found"
        },
        proto: {
            initInline: function() {
                V.types.push(J);
                k(B + "." + J, function() {
                    n()
                })
            },
            getInline: function(ac, ab) {
                n();
                if (ac.src) {
                    var Y = V.st.inline,
                        aa = F(ac.src);
                    if (aa.length) {
                        var Z = aa[0].parentNode;
                        if (Z && Z.tagName) {
                            if (!R) {
                                U = Y.hiddenClass;
                                R = p(U);
                                U = "mfp-" + U
                            }
                            u = aa.after(R).detach().removeClass(U)
                        }
                        V.updateStatus("ready")
                    } else {
                        V.updateStatus("error", Y.tNotFound);
                        aa = F("<div>")
                    }
                    ac.inlineElement = aa;
                    return aa
                }
                V.updateStatus("ready");
                V._parseMarkup(ab, {}, ac);
                return ab
            }
        }
    });
    var w = "ajax",
        W, x = function() {
            if (W) {
                A.removeClass(W)
            }
        };
    F.magnificPopup.registerModule(w, {
        options: {
            settings: null,
            cursor: "mfp-ajax-cur",
            tError: '<a href="%url%">The content</a> could not be loaded.'
        },
        proto: {
            initAjax: function() {
                V.types.push(w);
                W = V.st.ajax.cursor;
                k(B + "." + w, function() {
                    x();
                    if (V.req) {
                        V.req.abort()
                    }
                })
            },
            getAjax: function(Z) {
                if (W) {
                    A.addClass(W)
                }
                V.updateStatus("loading");
                var Y = F.extend({
                    url: Z.src,
                    success: function(ac, ad, ab) {
                        var aa = {
                            data: ac,
                            xhr: ab
                        };
                        S("ParseAjax", aa);
                        V.appendContent(F(aa.data), w);
                        Z.finished = true;
                        x();
                        j();
                        setTimeout(function() {
                            V.wrap.addClass(L)
                        }, 16);
                        V.updateStatus("ready");
                        S("AjaxContentAdded")
                    },
                    error: function() {
                        x();
                        Z.finished = Z.loadError = true;
                        V.updateStatus("error", V.st.ajax.tError.replace("%url%", Z.src))
                    }
                }, V.st.ajax.settings);
                V.req = F.ajax(Y);
                return ""
            }
        }
    });
    var g, c = function(Y) {
        if (Y.data && Y.data.title !== undefined) {
            return Y.data.title
        }
        var Z = V.st.image.titleSrc;
        if (Z) {
            if (F.isFunction(Z)) {
                return Z.call(V, Y)
            } else {
                if (Y.el) {
                    return Y.el.attr(Z) || ""
                }
            }
        }
        return ""
    };
    F.magnificPopup.registerModule("image", {
        options: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><div class="mfp-img"></div><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: true,
            tError: '<a href="%url%">The image</a> could not be loaded.'
        },
        proto: {
            initImage: function() {
                var Z = V.st.image,
                    Y = ".image";
                V.types.push("image");
                k(m + Y, function() {
                    if (V.currItem.type === "image" && Z.cursor) {
                        A.addClass(Z.cursor)
                    }
                });
                k(B + Y, function() {
                    if (Z.cursor) {
                        A.removeClass(Z.cursor)
                    }
                    a.off("resize" + d)
                });
                k("Resize" + Y, V.resizeImage);
                if (V.isLowIE) {
                    k("AfterChange", V.resizeImage)
                }
            },
            resizeImage: function() {
                var Z = V.currItem;
                if (!Z.img) {
                    return
                }
                if (V.st.image.verticalFit) {
                    var Y = 0;
                    if (V.isLowIE) {
                        Y = parseInt(Z.img.css("padding-top"), 10) + parseInt(Z.img.css("padding-bottom"), 10)
                    }
                    Z.img.css("max-height", V.wH - Y)
                }
            },
            _onImageHasSize: function(Y) {
                if (Y.img) {
                    Y.hasSize = true;
                    if (g) {
                        clearInterval(g)
                    }
                    Y.isCheckingImgSize = false;
                    S("ImageHasSize", Y);
                    if (Y.imgHidden) {
                        if (V.content) {
                            V.content.removeClass("mfp-loading")
                        }
                        Y.imgHidden = false
                    }
                }
            },
            findImageSize: function(ab) {
                var Y = 0,
                    Z = ab.img[0],
                    aa = function(ac) {
                        if (g) {
                            clearInterval(g)
                        }
                        g = setInterval(function() {
                            if (Z.naturalWidth > 0) {
                                V._onImageHasSize(ab);
                                return
                            }
                            if (Y > 200) {
                                clearInterval(g)
                            }
                            Y++;
                            if (Y === 3) {
                                aa(10)
                            } else {
                                if (Y === 40) {
                                    aa(50)
                                } else {
                                    if (Y === 100) {
                                        aa(500)
                                    }
                                }
                            }
                        }, ac)
                    };
                aa(1)
            },
            getImage: function(ae, ab) {
                var ad = 0,
                    af = function() {
                        if (ae) {
                            if (ae.img[0].complete) {
                                ae.img.off(".mfploader");
                                if (ae === V.currItem) {
                                    V._onImageHasSize(ae);
                                    V.updateStatus("ready")
                                }
                                ae.hasSize = true;
                                ae.loaded = true;
                                S("ImageLoadComplete")
                            } else {
                                ad++;
                                if (ad < 200) {
                                    setTimeout(af, 100)
                                } else {
                                    Y()
                                }
                            }
                        }
                    },
                    Y = function() {
                        if (ae) {
                            ae.img.off(".mfploader");
                            if (ae === V.currItem) {
                                V._onImageHasSize(ae);
                                V.updateStatus("error", ac.tError.replace("%url%", ae.src))
                            }
                            ae.hasSize = true;
                            ae.loaded = true;
                            ae.loadError = true
                        }
                    },
                    ac = V.st.image;
                var aa = ab.find(".mfp-img");
                if (aa.length) {
                    var Z = new Image();
                    Z.className = "mfp-img";
                    ae.img = F(Z).on("load.mfploader", af).on("error.mfploader", Y);
                    Z.src = ae.src;
                    if (aa.is("img")) {
                        ae.img = ae.img.clone()
                    }
                    if (ae.img[0].naturalWidth > 0) {
                        ae.hasSize = true
                    }
                }
                V._parseMarkup(ab, {
                    title: c(ae),
                    img_replaceWith: ae.img
                }, ae);
                V.resizeImage();
                if (ae.hasSize) {
                    if (g) {
                        clearInterval(g)
                    }
                    if (ae.loadError) {
                        ab.addClass("mfp-loading");
                        V.updateStatus("error", ac.tError.replace("%url%", ae.src))
                    } else {
                        ab.removeClass("mfp-loading");
                        V.updateStatus("ready")
                    }
                    return ab
                }
                V.updateStatus("loading");
                ae.loading = true;
                if (!ae.hasSize) {
                    ae.imgHidden = true;
                    ab.addClass("mfp-loading");
                    V.findImageSize(ae)
                }
                return ab
            }
        }
    });
    var l, P = function() {
        if (l === undefined) {
            l = document.createElement("p").style.MozTransform !== undefined
        }
        return l
    };
    F.magnificPopup.registerModule("zoom", {
        options: {
            enabled: false,
            easing: "ease-in-out",
            duration: 300,
            opener: function(Y) {
                return Y.is("img") ? Y : Y.find("img")
            }
        },
        proto: {
            initZoom: function() {
                var Z = V.st.zoom,
                    ac = ".zoom";
                if (!Z.enabled || !V.supportsTransition) {
                    return
                }
                var ae = Z.duration,
                    ad = function(ah) {
                        var ag = ah.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),
                            ai = "all " + (Z.duration / 1000) + "s " + Z.easing,
                            aj = {
                                position: "fixed",
                                zIndex: 9999,
                                left: 0,
                                top: 0,
                                "-webkit-backface-visibility": "hidden"
                            },
                            af = "transition";
                        aj["-webkit-" + af] = aj["-moz-" + af] = aj["-o-" + af] = aj[af] = ai;
                        ag.css(aj);
                        return ag
                    },
                    Y = function() {
                        V.content.css("visibility", "visible")
                    },
                    aa, ab;
                k("BuildControls" + ac, function() {
                    if (V._allowZoom()) {
                        clearTimeout(aa);
                        V.content.css("visibility", "hidden");
                        image = V._getItemToZoom();
                        if (!image) {
                            Y();
                            return
                        }
                        ab = ad(image);
                        ab.css(V._getOffset());
                        V.wrap.append(ab);
                        aa = setTimeout(function() {
                            ab.css(V._getOffset(true));
                            aa = setTimeout(function() {
                                Y();
                                setTimeout(function() {
                                    ab.remove();
                                    image = ab = null;
                                    S("ZoomAnimationEnded")
                                }, 16)
                            }, ae)
                        }, 16)
                    }
                });
                k(K + ac, function() {
                    if (V._allowZoom()) {
                        clearTimeout(aa);
                        V.st.removalDelay = ae;
                        if (!image) {
                            image = V._getItemToZoom();
                            if (!image) {
                                return
                            }
                            ab = ad(image)
                        }
                        ab.css(V._getOffset(true));
                        V.wrap.append(ab);
                        V.content.css("visibility", "hidden");
                        setTimeout(function() {
                            ab.css(V._getOffset())
                        }, 16)
                    }
                });
                k(B + ac, function() {
                    if (V._allowZoom()) {
                        Y();
                        if (ab) {
                            ab.remove()
                        }
                    }
                })
            },
            _allowZoom: function() {
                return V.currItem.type === "image"
            },
            _getItemToZoom: function() {
                if (V.currItem.hasSize) {
                    return V.currItem.img
                } else {
                    return false
                }
            },
            _getOffset: function(aa) {
                var Y;
                if (aa) {
                    Y = V.currItem.img
                } else {
                    Y = V.st.zoom.opener(V.currItem.el || V.currItem)
                }
                var ad = Y.offset();
                var Z = parseInt(Y.css("padding-top"), 10);
                var ac = parseInt(Y.css("padding-bottom"), 10);
                ad.top -= (F(window).scrollTop() - Z);
                var ab = {
                    width: Y.width(),
                    height: (M ? Y.innerHeight() : Y[0].offsetHeight) - ac - Z
                };
                if (P()) {
                    ab["-moz-transform"] = ab.transform = "translate(" + ad.left + "px," + ad.top + "px)"
                } else {
                    ab.left = ad.left;
                    ab.top = ad.top
                }
                return ab
            }
        }
    });
    var t = "iframe",
        s = "//about:blank",
        T = function(Y) {
            if (V.currTemplate[t]) {
                var Z = V.currTemplate[t].find("iframe");
                if (Z.length) {
                    if (!Y) {
                        Z[0].src = s
                    }
                    if (V.isIE8) {
                        Z.css("display", Y ? "block" : "none")
                    }
                }
            }
        };
    F.magnificPopup.registerModule(t, {
        options: {
            markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
            srcAction: "iframe_src",
            patterns: {
                youtube: {
                    index: "youtube.com",
                    id: "v=",
                    src: "//www.youtube.com/embed/%id%?autoplay=1"
                },
                vimeo: {
                    index: "vimeo.com/",
                    id: "/",
                    src: "//player.vimeo.com/video/%id%?autoplay=1"
                },
                gmaps: {
                    index: "//maps.google.",
                    src: "%id%&output=embed"
                }
            }
        },
        proto: {
            initIframe: function() {
                V.types.push(t);
                k("BeforeChange", function(aa, Y, Z) {
                    if (Y !== Z) {
                        if (Y === t) {
                            T()
                        } else {
                            if (Z === t) {
                                T(true)
                            }
                        }
                    }
                });
                k(B + "." + t, function() {
                    T()
                })
            },
            getIframe: function(ac, ab) {
                var Y = ac.src;
                var aa = V.st.iframe;
                F.each(aa.patterns, function() {
                    if (Y.indexOf(this.index) > -1) {
                        if (this.id) {
                            if (typeof this.id === "string") {
                                Y = Y.substr(Y.lastIndexOf(this.id) + this.id.length, Y.length)
                            } else {
                                Y = this.id.call(this, Y)
                            }
                        }
                        Y = this.src.replace("%id%", Y);
                        return false
                    }
                });
                var Z = {};
                if (aa.srcAction) {
                    Z[aa.srcAction] = Y
                }
                V._parseMarkup(ab, Z, ac);
                V.updateStatus("ready");
                return ab
            }
        }
    });
    var z = function(Y) {
            var Z = V.items.length;
            if (Y > Z - 1) {
                return Y - Z
            } else {
                if (Y < 0) {
                    return Z + Y
                }
            }
            return Y
        },
        r = function(aa, Z, Y) {
            return aa.replace("%curr%", Z + 1).replace("%total%", Y)
        };
    F.magnificPopup.registerModule("gallery", {
        options: {
            enabled: false,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            preload: [0, 2],
            navigateByImgClick: true,
            arrows: true,
            tPrev: "Previous (Left arrow key)",
            tNext: "Next (Right arrow key)",
            tCounter: "%curr% of %total%"
        },
        proto: {
            initGallery: function() {
                var Y = V.st.gallery,
                    aa = ".mfp-gallery",
                    Z = Boolean(F.fn.mfpFastClick);
                V.direction = true;
                if (!Y || !Y.enabled) {
                    return false
                }
                b += " mfp-gallery";
                k(m + aa, function() {
                    if (Y.navigateByImgClick) {
                        V.wrap.on("click" + aa, ".mfp-img", function() {
                            if (V.items.length > 1) {
                                V.next();
                                return false
                            }
                        })
                    }
                    D.on("keydown" + aa, function(ab) {
                        if (ab.keyCode === 37) {
                            V.prev()
                        } else {
                            if (ab.keyCode === 39) {
                                V.next()
                            }
                        }
                    })
                });
                k("UpdateStatus" + aa, function(ac, ab) {
                    if (ab.text) {
                        ab.text = r(ab.text, V.currItem.index, V.items.length)
                    }
                });
                k(f + aa, function(af, ad, ac, ae) {
                    var ab = V.items.length;
                    ac.counter = ab > 1 ? r(Y.tCounter, ae.index, ab) : ""
                });
                k("BuildControls" + aa, function() {
                    if (V.items.length > 1 && Y.arrows && !V.arrowLeft) {
                        var ad = Y.arrowMarkup,
                            ae = V.arrowLeft = F(ad.replace("%title%", Y.tPrev).replace("%dir%", "left")).addClass(e),
                            ac = V.arrowRight = F(ad.replace("%title%", Y.tNext).replace("%dir%", "right")).addClass(e);
                        var ab = Z ? "mfpFastClick" : "click";
                        ae[ab](function() {
                            V.prev()
                        });
                        ac[ab](function() {
                            V.next()
                        });
                        if (V.isIE7) {
                            p("b", ae[0], false, true);
                            p("a", ae[0], false, true);
                            p("b", ac[0], false, true);
                            p("a", ac[0], false, true)
                        }
                        V.container.append(ae.add(ac))
                    }
                });
                k(h + aa, function() {
                    if (V._preloadTimeout) {
                        clearTimeout(V._preloadTimeout)
                    }
                    V._preloadTimeout = setTimeout(function() {
                        V.preloadNearbyImages();
                        V._preloadTimeout = null
                    }, 16)
                });
                k(B + aa, function() {
                    D.off(aa);
                    V.wrap.off("click" + aa);
                    if (V.arrowLeft && Z) {
                        V.arrowLeft.add(V.arrowRight).destroyMfpFastClick()
                    }
                    V.arrowRight = V.arrowLeft = null
                })
            },
            next: function() {
                V.direction = true;
                V.index = z(V.index + 1);
                V.updateItemHTML()
            },
            prev: function() {
                V.direction = false;
                V.index = z(V.index - 1);
                V.updateItemHTML()
            },
            goTo: function(Y) {
                V.direction = (Y >= V.index);
                V.index = Y;
                V.updateItemHTML()
            },
            preloadNearbyImages: function() {
                var ab = V.st.gallery.preload,
                    Z = Math.min(ab[0], V.items.length),
                    aa = Math.min(ab[1], V.items.length),
                    Y;
                for (Y = 1; Y <= (V.direction ? aa : Z); Y++) {
                    V._preloadItem(V.index + Y)
                }
                for (Y = 1; Y <= (V.direction ? Z : aa); Y++) {
                    V._preloadItem(V.index - Y)
                }
            },
            _preloadItem: function(Y) {
                Y = z(Y);
                if (V.items[Y].preloaded) {
                    return
                }
                var Z = V.items[Y];
                if (!Z.parsed) {
                    Z = V.parseEl(Y)
                }
                S("LazyLoad", Z);
                if (Z.type === "image") {
                    Z.img = F('<img class="mfp-img" />').on("load.mfploader", function() {
                        Z.hasSize = true
                    }).on("error.mfploader", function() {
                        Z.hasSize = true;
                        Z.loadError = true;
                        S("LazyLoadError", Z)
                    }).attr("src", Z.src)
                }
                Z.preloaded = true
            }
        }
    });
    var o = "retina";
    F.magnificPopup.registerModule(o, {
        options: {
            replaceSrc: function(Y) {
                return Y.src.replace(/\.\w+$/, function(Z) {
                    return "@2x" + Z
                })
            },
            ratio: 1
        },
        proto: {
            initRetina: function() {
                if (window.devicePixelRatio > 1) {
                    var Y = V.st.retina,
                        Z = Y.ratio;
                    Z = !isNaN(Z) ? Z : Z();
                    if (Z > 1) {
                        k("ImageHasSize." + o, function(ab, aa) {
                            aa.img.css({
                                "max-width": aa.img[0].naturalWidth / Z,
                                width: "100%"
                            })
                        });
                        k("ElementParse." + o, function(ab, aa) {
                            aa.src = Y.replaceSrc(aa, Z)
                        })
                    }
                }
            }
        }
    });
    (function() {
        var Z = 1000,
            ab = "ontouchstart" in window,
            ac = function() {
                a.off("touchmove" + aa + " touchend" + aa)
            },
            Y = "mfpFastClick",
            aa = "." + Y;
        F.fn.mfpFastClick = function(ad) {
            return F(this).each(function() {
                var ak = F(this),
                    aj;
                if (ab) {
                    var al, ag, af, ai, ae, ah;
                    ak.on("touchstart" + aa, function(am) {
                        ai = false;
                        ah = 1;
                        ae = am.originalEvent ? am.originalEvent.touches[0] : am.touches[0];
                        ag = ae.clientX;
                        af = ae.clientY;
                        a.on("touchmove" + aa, function(an) {
                            ae = an.originalEvent ? an.originalEvent.touches : an.touches;
                            ah = ae.length;
                            ae = ae[0];
                            if (Math.abs(ae.clientX - ag) > 10 || Math.abs(ae.clientY - af) > 10) {
                                ai = true;
                                ac()
                            }
                        }).on("touchend" + aa, function(an) {
                            ac();
                            if (ai || ah > 1) {
                                return
                            }
                            aj = true;
                            an.preventDefault();
                            clearTimeout(al);
                            al = setTimeout(function() {
                                aj = false
                            }, Z);
                            ad()
                        })
                    })
                }
                ak.on("click" + aa, function() {
                    if (!aj) {
                        ad()
                    }
                })
            })
        };
        F.fn.destroyMfpFastClick = function() {
            F(this).off("touchstart" + aa + " click" + aa);
            if (ab) {
                a.off("touchmove" + aa + " touchend" + aa)
            }
        }
    })()
})(window.jQuery || window.Zepto);
(function(b, a) {
    window.hsCookies = {
        options: {
            cookieId: "noticeCookie",
        },
        init: function() {
            if (this.mustShowBox()) {
                this.setEvents();
                this.showBox()
            }
        },
        setEvents: function() {
            var d = this;
            var c = ["click.hsCookies", "scroll.hsCookies"];
            b(document).on(c.join(" "), function() {
                d.userAction()
            })
        },
        unsetEvents: function() {
            b(document).off(".hsCookies")
        },
        userAction: function() {
            this.createCookie(this.options.cookieId, "1", 365 * 5);
            this.unsetEvents()
        },
        showBox: function() {
            var c = "";
            switch (b("html").attr("lang")) {
                case "es":
                    c = '<div class="text"> Este sitio web utiliza cookies propias y de terceros para optimizar tu navegación, adaptarse a tus preferencias, y realizar labores analíticas. Si continúa utilizando el sitio web, usted acepta nuestra <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">política de Cookies</a>.</div>';
                    break;
                case "fr":
                    c = '<div class="text"> Ce site web installe des cookies propres et des tiers pour optimiser votre navigation et vos préférences en réalisant des travaux  analytiques.  En continuant à utiliser ce site, vous acceptez <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">le paramétrage de nos cookies</a>.</div>';
                    break;
                case "de":
                    c = '<div class="text"> Wir verwenden eigene Cookies und Cookies Dritter auf unserer Website, um Ihren Besuch effizienter zu machen, um uns Ihre persönlichen Vorlieben zu merken und um Statistiken zu erstellen. Wenn Sie unsere Website weiterhin benutzen, heißt das für uns, dass Sie mit der Verwendung <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">von Cookies einverstanden sind</a>.</div>';
                    break;
                case "it":
                    c = '<div class="text"> Questo sito utilizza i cookies al fine di agevolare la tua navigazione, fornirti un’esperienza di navigazione personalizzata ed eseguire analisi statistiche. Utilizzando e accedendo al Sito, l’utente accetta l’ <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">uso dei cookies</a>.</div>';
                    break;
                case "ru":
                    c = '<div class="text"> Наш сайт пользуется собственными и посторонними Cookies для оптимизации навигации и для анализ сайта. Если Вы продолжите навигацию, Вы соглашаетесь <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">с нашей политикой Cookies</a></div>';
                    break;
                default:
                    c = '<div class="text"> This page uses private and third-party cookies. If you continue using our website, you accept our <a class="cookie_link" href="' + region_url + 'info/legal#cookies" target="_blank">cookies policy</a>.</div>';
                    break
            }
            var d = b('<div id="cookie-box"><div class="container">' + c + ' <div class="link_close close"><span>x</span></div></div></div>');
            d.click(function(f) {
                f.stopPropagation()
            });
            b("body").prepend(d);
            d.find("a").click(function() {
                b("#cookie-box").remove()
            });
            d.find(".close").click(function() {
                b("#cookie-box").remove()
            })
        },
        mustShowBox: function() {
            if (document.domain != "www.tailor4less.com") {
                return false
            }
            var c = this.readCookie(this.options.cookieId);
            return !(c && c == "1" || /\/politica_cookies/.test(location.href))
        },
        createCookie: function(e, f, g) {
            if (g) {
                var d = new Date();
                d.setTime(d.getTime() + (g * 24 * 60 * 60 * 1000));
                var c = "; expires=" + d.toUTCString()
            } else {
                var c = ""
            }
            document.cookie = e + "=" + f + c + "; path=/"
        },
        readCookie: function(e) {
            var g = e + "=";
            var d = document.cookie.split(";");
            for (var f = 0; f < d.length; f++) {
                var h = d[f];
                while (h.charAt(0) == " ") {
                    h = h.substring(1, h.length)
                }
                if (h.indexOf(g) == 0) {
                    return h.substring(g.length, h.length)
                }
            }
            return null
        }
    };
    b(document).ready(function() {
        hsCookies.init()
    })
})(jQuery);
$.fn.iosRefresh = function() {};

function formatMoney(g, d, h, a) {
    g = g || 0;
    d = !isNaN(d = Math.abs(d)) ? d : 2;
    if (window.currency != "RUB") {
        h = h || ","
    } else {
        h = h || ""
    }
    a = a || ".";
    var c = g < 0 ? "-" : "",
        e = parseInt(g = Math.abs(+g || 0).toFixed(d), 10) + "",
        b = (b = e.length) > 3 ? b % 3 : 0;
    var f = Math.abs(g - e).toFixed(d).slice(2);
    if (f == "00") {
        return c + (b ? e.substr(0, b) + h : "") + e.substr(b).replace(/(\d{3})(?=\d)/g, "$1" + h)
    }
    return c + (b ? e.substr(0, b) + h : "") + e.substr(b).replace(/(\d{3})(?=\d)/g, "$1" + h) + (d ? a + f : "")
}

function formatPrice(b, a) {
    var c = "";
    switch (a) {
        case "configure":
        default:
            switch (window.currency) {
                case "EUR":
                    c = formatMoney(b, 2, ".", ",") + "<small>€</small>";
                    break;
                case "USD":
                    c = "<small>$</small>" + formatMoney(b, 2, ",", ".");
                    break;
                case "GBP":
                    c = "<small>£</small>" + formatMoney(b, 2, ",", ".");
                    break;
                case "RMB":
                    c = formatMoney(b, 2, "", ".") + "<small>元</small>";
                    break;
                case "AUD":
                    c = "<small>AU$</small>" + formatMoney(b, 2, ",", ".");
                    break;
                case "RUB":
                    c = formatMoney(b, 2, "", ".") + "<small>p</small>";
                    break;
                case "MXN":
                    c = "<small>MX$</small>" + formatMoney(b, 2, ",", ".");
                    break;
                default:
                    c = formatMoney(b) + "<small>" + window.currency + "</small>";
                    break
            }
    }
    return c
}

function createSlideshow(a, f, m, p) {
    var q = $(a);
    var d = q.find(".page");
    var n = q.find("div.slider_paginator");
    if (!n.length) {
        n = false
    }
    var j = q.find("div.slider_box");
    var o = d.length;
    var e = 12;
    var k = -1;
    if (!f) {
        f = d.eq(0).width()
    }

    function c(u) {
        if (u < 1) {
            return false
        }
        if (u > o) {
            return false
        }
        if (n) {
            n.find("a").each(function(w) {
                var v = this.getAttribute("rel");
                switch (v) {
                    case "back":
                        this.className = (u > 1) ? "go back" : "disabled back";
                        break;
                    case "next":
                        this.className = (u < o) ? "go next" : "disabled next";
                        break;
                    default:
                        this.className = "go"
                }
            }).get(u).className = "current"
        }
        j.animate({
            left: -(f) * (u - 1)
        }, 750);
        k = u * 1;
        var t = 25;
        var s = 10;
        if (o > e) {
            var r = (7 - k);
            if (r > 0) {
                r = 0
            }
            if (r < -(e - 4)) {
                r = -(e - 4)
            }
            n.find("div.content_pages").animate({
                left: (r * (t + s)) + "px"
            }, "fast")
        }
    }
    if (n && o) {
        if (p) {
            if (o > e) {
                var b = '<div class="box_back left"><a href="javascript:;" class="back" rel="back"><span>&lt;</span></a></div>'
            } else {
                var b = '<div class="box_back"><a href="javascript:;" class="back" rel="back"><span>&lt;</span></a></div>'
            }
            if (o > e) {
                b += '<div class="pages middle"><div class="content_pages">'
            } else {
                b += '<div class="pages">'
            }
            for (var g = 0; g < o; g++) {
                b += '<a href="javascript:;" class="go" rel="' + (g + 1) + '">' + (g + 1) + "</a>"
            }
            if (o > e) {
                b += "</div></div>"
            } else {
                b += "</div>"
            }
            if (o > e) {
                b += '<div class="box_next right"><a href="javascript:;" class="next" rel="next"><span>&gt;</span></a></div>'
            } else {
                b += '<div class="box_next"><a href="javascript:;" class="next" rel="next"><span>&gt;</span></a></div>'
            }
            n.html(b).find("a").click(function() {
                var r = $(this);
                if (r.hasClass("disabled")) {
                    return false
                }
                var s = this.getAttribute("rel");
                if (s == "back") {
                    return c(k - 1)
                }
                if (s == "next") {
                    return c(k + 1)
                }
                c(s)
            })
        } else {
            var b = '<a href="javascript:;" class="go back" rel="back"><span>&lt;</span></a>';
            for (var g = 0; g < o; g++) {
                b += '<a href="javascript:;" class="go" rel="' + (g + 1) + '">' + (g + 1) + "</a>"
            }
            b += '<a href="javascript:;" class="go next" rel="next"><span>&gt;</span></a>';
            n.html(b).find("a").click(function() {
                var r = $(this);
                if (r.hasClass("disabled")) {
                    return false
                }
                var s = this.getAttribute("rel");
                if (s == "back") {
                    return c(k - 1)
                }
                if (s == "next") {
                    return c(k + 1)
                }
                c(s)
            })
        }
    } else {
        var h;
        if (h = q.find("span.next")) {
            h.click(function() {
                return c(k + 1)
            })
        }
        if (h = q.find("span.prev")) {
            h.click(function() {
                return c(k - 1)
            })
        }
    }
    if (!m) {
        var l = q.find("div.selected").closest(".page").index();
        if (l > -1) {
            c(l + 1)
        } else {
            c(1)
        }
    } else {
        c(m)
    }
}

function isValidCharacterInitials(b) {
    if (typeof(b.charCode) != "undefined") {
        b = b.charCode
    }
    if (b == "0") {
        return true
    }
    if (typeof(b) == "object") {
        b = b.which;
        if (b == "0") {
            return true
        }
    }
    var c = String.fromCharCode(b);
    var a = /[a-zA-Z0-9.\s /<>,;:"'`!@#%^&*(){}\-_+=|-~¬ºª¡\[\]^`´ç¨·]/g;
    return c.match(a) ? true : false
}

function applyHButton(a) {
    $("a.hbutton", a).hover(function() {
        var b = this.clientHeight;
        this.style.backgroundPosition = "0 -" + b + "px"
    }, function() {
        this.style.backgroundPosition = "0 0"
    })
}

function initTooltips(a) {
    if (typeof a.tooltip == "function") {
        a.tooltip({
            html: '<table class="box"><tr><td class="tl"></td><td class="tc"></td><td class="tr"></td></tr><tr><td class="cl"></td><td class="cc" id="tooltip_content"></td><td class="cr"></td></tr><tr><td class="bl"></td><td class="bc"></td><td class="br"></td></tr></table>'
        })
    } else {
        a.each(function() {
            var b = $(this).attr("title").replace(/<br\s?\/?>/g, " ").replace(/<\/?\s?[^>]*>/g, "");
            $(this).attr("title", b)
        })
    }
}

function initQTip(a) {
    a.qtip({
        show: {
            delay: 0
        },
        style: {
            border: {
                width: 2,
                radius: 10
            },
            padding: 10,
            textAlign: "center",
            tip: true,
            name: "cream"
        },
        position: {
            corner: {
                target: "topRight",
                tooltip: "bottomLeft"
            }
        }
    })
}
if (/\bMSIE 6/.test(navigator.userAgent) && !window.opera) {
    var newUrl = window.region_url + "showMsnIe6/";
    setTimeout(function() {
        window.location = newUrl
    }, 0)
}
$.fn.disableOptions = function(a) {
    return this.each(function() {
        var b = $(this);
        if (!b.data("copy")) {
            b.data("copy", b.find("option"))
        }
        var c = b.val();
        b.empty();
        b.data("copy").each(function() {
            for (var d = a.length - 1; d >= 0; d--) {
                if (a[d] == this.value) {
                    return
                }
            }
            b.append(this)
        });
        b.val(c);
        if (b.val() == null) {
            b.val(b.children(":first").val())
        } else {
            b.val(c)
        }
    })
};
$.fn.slider_woman_t4l = function(a) {
    var c = {};
    if (a) {
        c = $.extend(c, a)
    }
    var b = $("#slider_main div").length;
    return this.each(function() {
        var d = $(this);
        $(this).find(".show_left a").click(function() {
            if ($(this).hasClass("off")) {
                return false
            }
            if (c.current > c.showing) {
                var f = c.total - (c.current * c.width);
                var e = f + c.width;
                c.current = c.current - 1;
                if (c.current == c.showing) {
                    $(this).addClass("off")
                }
                if (b > c.current) {
                    d.find(".show_right a").removeClass("off")
                }
            }
            $("#slider_main").animate({
                left: e
            })
        });
        $(this).find(".show_right a").click(function() {
            if ($(this).hasClass("off")) {
                return false
            }
            if (b >= c.current + 1) {
                c.current = c.current + 1;
                var e = c.total - (c.current * c.width);
                if (b == c.current) {
                    $(this).addClass("off")
                }
                if (c.showing < c.current) {
                    d.find(".show_left a").removeClass("off")
                }
            }
            $("#slider_main").animate({
                left: e
            })
        });
        $("#slider_main .model").click(function() {
            window.location = $(this).attr("rel");
            return false
        })
    })
};
$.fn.tabs = function(a) {
    var b = {
        use_href_hash: true
    };
    if (a) {
        b = $.extend(b, a)
    }
    return this.each(function() {
        var d = $(this);
        d.find("ul.triggers a").click(function() {
            if ($(this).hasClass("selected")) {
                return false
            }
            var f = this.getAttribute("href").replace(/^[^#]+/, "");
            d.find("div.tab").hide();
            d.find("ul.triggers a").removeClass("selected");
            $(f).show();
            $(this).addClass("selected");
            return false
        });
        var c = document.location.href.replace(/^[^#]+/, "");
        var e = false;
        if (!e) {
            e = d.find("ul.triggers a:first")
        }
        e.click()
    })
};
ready_callbacks.push(function() {
    if (!$("#toolbar").length) {
        return false
    }
    var c = $(".toolbar_login");
    c.find("a.pwd_lost").click(function() {
        var e = this.getAttribute("href").replace(/^[^#]*#/, "");
        c.find("form").hide().filter("." + e).show();
        return false
    });
    c.find("form").validate();
    c.find("a.social").click(function() {
        window.open(this.href, "login", "toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=640,height=480");
        return false
    });
    var d = 6;
    var b = 6;
    var a = 0;
    $("#toolbar li.cart .control.down a").click(function() {
        if (num_products <= b) {
            return false
        }
        if (num_products == d) {
            return false
        }
        a = a - 20;
        $("#box_slider_product .move").animate({
            top: a
        });
        d++;
        $("#toolbar li.cart .control.up a").css("display", "block");
        if (num_products == d) {
            $("#toolbar li.cart .control.down a").css("display", "none")
        }
    });
    $("#toolbar li.cart .control.up a").click(function() {
        if (b == d) {
            return false
        }
        a = a + 20;
        $("#box_slider_product .move").animate({
            top: a
        });
        d--;
        $("#toolbar li.cart .control.down a").css("display", "block");
        if (b == d) {
            $("#toolbar li.cart .control.up a").css("display", "none")
        }
    })
});
ready_callbacks.push(function() {
    if ($("#register_input_footer").length) {
        $("#register_input_footer").click(function() {
            var a = $(this).attr("rel");
            if (a == 1) {
                $(this).val("");
                $(this).attr("rel", "")
            }
        });
        $("#form_register_newsletter").validate();
        $("#register_newsletter").click(function() {
            $("#form_register_newsletter").submit();
            ga("send", "event", {
                eventCategory: "Engagement",
                eventAction: "AltaNewsletter"
            })
        })
    }
    $("#footer .magnific_conditions").magnificPopup({
        type: "iframe"
    })
});
ready_callbacks.push(function() {
    if (typeof video === "undefined") {
        video = false
    }
    if (video == "how") {
        $.magnificPopup.open({
            items: {
                src: "http://player.vimeo.com/video/" + id_video + "?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&autoplay=1",
                type: "iframe"
            }
        })
    }
    if (video == "why") {
        $.magnificPopup.open({
            items: {
                src: "http://player.vimeo.com/video/" + id_video + "?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&autoplay=1",
                type: "iframe"
            }
        })
    }
});

function force_region_callback(a) {
    $.get(window.region_url + "set_user_region/" + a.getAttribute("rel"));
    $("#redirect_to").slideUp();
    return false
}
ready_callbacks.push(function() {
    if (!$("#checkout_menu").length) {
        return false
    }
    $(".colorboxFaqs").magnificPopup({
        type: "iframe"
    });
    $(".colorboxContact").magnificPopup({
        type: "iframe"
    });
    $(".colorboxLearnMore").magnificPopup({
        type: "iframe"
    });
    $(".colorboxModifyMeasures").magnificPopup({
        type: "iframe"
    });
    $(".colorbox_login_register").magnificPopup({
        type: "iframe",
        closeOnBgClick: false,
        closeBtnInside: true,
        callbacks: {
            open: function() {}
        }
    });
    $("a.colorbox_forgot_password").magnificPopup({
        type: "iframe",
        closeOnBgClick: false
    })
});
if (window.region_url == "/cn/") {
    ready_callbacks.push(function() {
        var c = $("#info_fly");
        var a = $(window).scroll(function() {
            if (a.scrollTop() > 200) {
                c.show()
            } else {
                c.hide()
            }
        });
        c.find(".gotop").click(function() {
            $("html,body").animate({
                scrollTop: 0
            }, "fast")
        });
        var k = $("#info_fly .contact");
        var g = $("#info_fly .qr_wechat");
        var f = $("#webchat_toolbar");
        var b = $("#toolbar_webchat_img");
        var e = $("#info_fly .qq_contact");
        var j = $("#info_fly .qr_qq");
        var h = $("#qq_toolbar");
        var d = $("#toolbar_qq_img");
        k.hover(function() {
            var l = '<img src="' + cdn_host + 'images/cn_qr_we_chat.jpg" /><p>微信</p>';
            g.html(l).show(200)
        }, function() {
            g.hide(200)
        });
        e.hover(function() {
            var l = '<img src="' + cdn_host + 'images/cn_qr_qq.jpg" /><p>QQ</p>';
            j.html(l).show(200)
        }, function() {
            j.hide(200)
        });
        f.hover(function() {
            var l = '<img class="qr_img" src="' + cdn_host + 'images/cn_qr_we_chat.jpg" />';
            b.html(l).show()
        }, function() {
            b.hide()
        });
        h.hover(function() {
            var l = '<img class="qr_img" src="' + cdn_host + 'images/cn_qr_qq.jpg" />';
            d.html(l).show()
        }, function() {
            d.hide()
        })
    })
}
ready_callbacks.push(function() {
    $("#language_selector_trigger").click(function() {
        $("#language_selector").toggle()
    })
});
$(function() {
    for (var a = 0; a < ready_callbacks.length; a++) {
        ready_callbacks[a]()
    }
    if (typeof(afterJquery) == "function") {
        afterJquery()
    }
});
$("span.ds_link, div.ds_link").click(function() {
    var a = this.getAttribute("rel");
    if (a == "" || !a) {
        return false
    }
    if (this.getAttribute("target") == "_blank") {
        window.open(a);
        return false
    }
    window.location = a;
    return false
});