(function(e, c) {
    function f(D) {
        var C = Array.prototype.slice.call(arguments, 1);
        if (D.prop) {
            return D.prop.apply(D, C)
        }
        return D.attr.apply(D, C)
    }

    function y(G, E, F) {
        var D, C;
        for (D in F) {
            if (F.hasOwnProperty(D)) {
                C = D.replace(/ |$/g, E.eventNamespace);
                G.bind(C, F[D])
            }
        }
    }

    function d(E, C, D) {
        y(E, D, {
            focus: function() {
                C.addClass(D.focusClass)
            },
            blur: function() {
                C.removeClass(D.focusClass);
                C.removeClass(D.activeClass)
            },
            mouseenter: function() {
                C.addClass(D.hoverClass)
            },
            mouseleave: function() {
                C.removeClass(D.hoverClass);
                C.removeClass(D.activeClass)
            },
            "mousedown touchbegin": function() {
                if (!E.is(":disabled")) {
                    C.addClass(D.activeClass)
                }
            },
            "mouseup touchend": function() {
                C.removeClass(D.activeClass)
            }
        })
    }

    function x(D, C) {
        D.removeClass(C.hoverClass + " " + C.focusClass + " " + C.activeClass)
    }

    function v(D, E, C) {
        if (C) {
            D.addClass(E);
            D.parents("label").addClass(E);
        } else {
            D.removeClass(E);
            D.parents("label").removeClass(E);
        }
    }

    function A(C, E, D) {
        var G = "checked",
            F = E.is(":" + G);
        if (E.prop) {
            E.prop(G, F)
        } else {
            if (F) {
                E.attr(G, G)
            } else {
                E.removeAttr(G)
            }
        }
        v(C, D.checkedClass, F)
    }

    function o(C, E, D) {
        v(C, D.disabledClass, E.is(":disabled"))
    }

    function m(C, D, E) {
        switch (E) {
            case "after":
                C.after(D);
                return C.next();
            case "before":
                C.before(D);
                return C.prev();
            case "wrap":
                C.wrap(D);
                return C.parent()
        }
        return null
    }

    function s(F, E, G) {
        var D, C, H;
        if (!G) {
            G = {}
        }
        G = e.extend({
            bind: {},
            divClass: null,
            divWrap: "wrap",
            spanClass: null,
            spanHtml: null,
            spanWrap: "wrap"
        }, G);
        D = e("<div />");
        C = e("<span />");
        if (E.autoHide && F.is(":hidden") && F.css("display") === "none") {
            D.hide()
        }
        if (G.divClass) {
            D.addClass(G.divClass)
        }
        if (E.wrapperClass) {
            D.addClass(E.wrapperClass)
        }
        if (G.spanClass) {
            C.addClass(G.spanClass)
        }
        H = f(F, "id");
        if (E.useID && H) {
            f(D, "id", E.idPrefix + "-" + H)
        }
        if (G.spanHtml) {
            C.html(G.spanHtml)
        }
        D = m(F, D, G.divWrap);
        C = m(F, C, G.spanWrap);
        o(D, F, E);
        return {
            div: D,
            span: C
        }
    }

    function r(E, D) {
        var C;
        if (!D.wrapperClass) {
            return null
        }
        C = e("<span />").addClass(D.wrapperClass);
        C = m(E, C, "wrap");
        return C
    }

    function i() {
        var F, C, E, D;
        D = "rgb(120,2,153)";
        C = e('<div style="width:0;height:0;color:' + D + '">');
        e("body").append(C);
        E = C.get(0);
        if (window.getComputedStyle) {
            F = window.getComputedStyle(E, "").color
        } else {
            F = (E.currentStyle || E.style || {}).color
        }
        C.remove();
        return F.replace(/ /g, "") !== D
    }

    function p(C) {
        if (!C) {
            return ""
        }
        return e("<span />").text(C).html()
    }

    function k() {
        return navigator.cpuClass && !navigator.product
    }

    function l() {
        if (typeof window.XMLHttpRequest !== "undefined") {
            return true
        }
        return false
    }

    function q() {
        return (navigator.appName == "Microsoft Internet Explorer") ? parseFloat((new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})")).exec(navigator.userAgent)[1]) : -1
    }

    function g() {
        var C = q();
        if (C >= 9) {
            return true
        }
        return false
    }

    function a(D) {
        var C;
        if (D[0].multiple) {
            return true
        }
        C = f(D, "size");
        if (!C || C <= 1) {
            return false
        }
        return true
    }

    function h() {
        return false
    }

    function w(C, D) {
        var E = "none";
        y(C, D, {
            "selectstart dragstart mousedown": h
        });
        C.css({
            MozUserSelect: E,
            msUserSelect: E,
            webkitUserSelect: E,
            userSelect: E
        })
    }

    function z(F, D, E) {
        var C = F.val();
        if (C === "") {
            C = E.fileDefaultHtml
        } else {
            C = C.split(/[\/\\]+/);
            C = C[(C.length - 1)]
        }
        D.text(C)
    }

    function n(D, F, G) {
        var C, E;
        C = [];
        D.each(function() {
            var H;
            for (H in F) {
                if (Object.prototype.hasOwnProperty.call(F, H)) {
                    C.push({
                        el: this,
                        name: H,
                        old: this.style[H]
                    });
                    this.style[H] = F[H]
                }
            }
        });
        G();
        while (C.length) {
            E = C.pop();
            E.el.style[E.name] = E.old
        }
    }

    function b(D, E) {
        var C;
        C = D.parents();
        C.push(D[0]);
        C = C.not(":visible");
        n(C, {
            visibility: "hidden",
            display: "block",
            position: "absolute"
        }, E)
    }

    function B(D, C) {
        return function() {
            D.unwrap().unwrap().unbind(C.eventNamespace)
        }
    }
    var j = true,
        u = false,
        t = [{
            match: function(C) {
                return C.is("a, button, :submit, :reset, input[type='button']")
            },
            apply: function(F, E) {
                var C, D, G, I, H;
                D = E.submitDefaultHtml;
                if (F.is(":reset")) {
                    D = E.resetDefaultHtml
                }
                if (F.is("a, button")) {
                    I = function() {
                        return F.html() || D
                    }
                } else {
                    I = function() {
                        return p(f(F, "value")) || D
                    }
                }
                G = s(F, E, {
                    divClass: E.buttonClass,
                    spanHtml: I()
                });
                C = G.div;
                d(F, C, E);
                H = false;
                y(C, E, {
                    "click touchend": function() {
                        var L, K, M, J;
                        if (H) {
                            return
                        }
                        if (F.is(":disabled")) {
                            return
                        }
                        H = true;
                        if (F[0].dispatchEvent) {
                            L = document.createEvent("MouseEvents");
                            L.initEvent("click", true, true);
                            K = F[0].dispatchEvent(L);
                            if (F.is("a") && K) {
                                M = f(F, "target");
                                J = f(F, "href");
                                if (!M || M === "_self") {
                                    document.location.href = J
                                } else {
                                    window.open(J, M)
                                }
                            }
                        } else {
                            F.click()
                        }
                        H = false
                    }
                });
                w(C, E);
                return {
                    remove: function() {
                        C.after(F);
                        C.remove();
                        F.unbind(E.eventNamespace);
                        return F
                    },
                    update: function() {
                        x(C, E);
                        o(C, F, E);
                        F.detach();
                        G.span.html(I()).append(F)
                    }
                }
            }
        }, {
            match: function(C) {
                return C.is(":checkbox")
            },
            apply: function(F, E) {
                var G, D, C;
                G = s(F, E, {
                    divClass: E.checkboxClass
                });
                D = G.div;
                C = G.span;
                d(F, D, E);
                y(F, E, {
                    "click touchend": function() {
                        A(C, F, E)
                    }
                });
                A(C, F, E);
                return {
                    remove: B(F, E),
                    update: function() {
                        x(D, E);
                        C.removeClass(E.checkedClass);
                        A(C, F, E);
                        o(D, F, E)
                    }
                }
            }
        }, {
            match: function(C) {
                return C.is(":file")
            },
            apply: function(G, F) {
                var I, E, D, H;
                I = s(G, F, {
                    divClass: F.fileClass,
                    spanClass: F.fileButtonClass,
                    spanHtml: F.fileButtonHtml,
                    spanWrap: "after"
                });
                E = I.div;
                H = I.span;
                D = e("<span />").html(F.fileDefaultHtml);
                D.addClass(F.filenameClass);
                D = m(G, D, "after");
                if (!f(G, "size")) {
                    f(G, "size", E.width() / 10)
                }

                function C() {
                    z(G, D, F)
                }
                d(G, E, F);
                C();
                if (k()) {
                    y(G, F, {
                        click: function() {
                            G.trigger("change");
                            setTimeout(C, 0)
                        }
                    })
                } else {
                    y(G, F, {
                        change: C
                    })
                }
                w(D, F);
                w(H, F);
                return {
                    remove: function() {
                        D.remove();
                        H.remove();
                        return G.unwrap().unbind(F.eventNamespace)
                    },
                    update: function() {
                        x(E, F);
                        z(G, D, F);
                        o(E, G, F)
                    }
                }
            }
        }, {
            match: function(D) {
                if (D.is("input")) {
                    var C = (" " + f(D, "type") + " ").toLowerCase(),
                        E = " color date datetime datetime-local email month number password search tel text time url week ";
                    return E.indexOf(C) >= 0
                }
                return false
            },
            apply: function(E, D) {
                var C, F;
                C = f(E, "type");
                E.addClass(D.inputClass);
                F = r(E, D);
                d(E, E, D);
                if (D.inputAddTypeAsClass) {
                    E.addClass(C)
                }
                return {
                    remove: function() {
                        E.removeClass(D.inputClass);
                        if (D.inputAddTypeAsClass) {
                            E.removeClass(C)
                        }
                        if (F) {
                            E.unwrap()
                        }
                    },
                    update: h
                }
            }
        }, {
            match: function(C) {
                return C.is(":radio")
            },
            apply: function(F, E) {
                var G, D, C;
                G = s(F, E, {
                    divClass: E.radioClass
                });
                D = G.div;
                C = G.span;
                d(F, D, E);
                y(F, E, {
                    "click touchend": function() {
                        e.uniform.update(e(':radio[name="' + f(F, "name") + '"]'))
                    }
                });
                A(C, F, E);
                return {
                    remove: B(F, E),
                    update: function() {
                        x(D, E);
                        A(C, F, E);
                        o(D, F, E)
                    }
                }
            }
        }, {
            match: function(C) {
                if (C.is("select") && !a(C)) {
                    return true
                }
                return false
            },
            apply: function(G, F) {
                var H, D, C, E;
                if (F.selectAutoWidth) {
                    b(G, function() {
                        E = G.width()
                    })
                }
                H = s(G, F, {
                    divClass: F.selectClass,
                    spanHtml: (G.find(":selected:first") || G.find("option:first")).html(),
                    spanWrap: "before"
                });
                D = H.div;
                C = H.span;
                if (F.selectAutoWidth) {
                    b(G, function() {
                        n(e([C[0], D[0]]), {
                            display: "block"
                        }, function() {
                            var I;
                            I = C.outerWidth() - C.width();
                            D.width(E + I);
                            C.width(E)
                        })
                    })
                } else {
                    D.addClass("fixedWidth")
                }
                d(G, D, F);
                y(G, F, {
                    change: function() {
                        C.html(G.find(":selected").html());
                        D.removeClass(F.activeClass)
                    },
                    "click touchend": function() {
                        var I = G.find(":selected").html();
                        if (C.html() !== I) {
                            G.trigger("change")
                        }
                    },
                    keyup: function() {
                        C.html(G.find(":selected").html())
                    }
                });
                w(C, F);
                return {
                    remove: function() {
                        C.remove();
                        G.unwrap().unbind(F.eventNamespace);
                        return G
                    },
                    update: function() {
                        if (F.selectAutoWidth) {
                            e.uniform.restore(G);
                            G.uniform(F)
                        } else {
                            x(D, F);
                            C.html(G.find(":selected").html());
                            o(D, G, F)
                        }
                    }
                }
            }
        }, {
            match: function(C) {
                if (C.is("select") && a(C)) {
                    return true
                }
                return false
            },
            apply: function(D, C) {
                var E;
                D.addClass(C.selectMultiClass);
                E = r(D, C);
                d(D, D, C);
                return {
                    remove: function() {
                        D.removeClass(C.selectMultiClass);
                        if (E) {
                            D.unwrap()
                        }
                    },
                    update: h
                }
            }
        }, {
            match: function(C) {
                return C.is("textarea")
            },
            apply: function(D, C) {
                var E;
                D.addClass(C.textareaClass);
                E = r(D, C);
                d(D, D, C);
                return {
                    remove: function() {
                        D.removeClass(C.textareaClass);
                        if (E) {
                            D.unwrap()
                        }
                    },
                    update: h
                }
            }
        }];
    if (k() && !g()) {
        j = false
    }
    e.uniform = {
        defaults: {
            activeClass: "active",
            autoHide: true,
            buttonClass: "button",
            checkboxClass: "checker",
            checkedClass: "checked",
            disabledClass: "disabled",
            eventNamespace: ".uniform",
            fileButtonClass: "action",
            fileButtonHtml: "Choose File",
            fileClass: "uploader",
            fileDefaultHtml: "No file selected",
            filenameClass: "filename",
            focusClass: "focus",
            hoverClass: "hover",
            idPrefix: "uniform",
            inputAddTypeAsClass: true,
            inputClass: "uniform-input",
            radioClass: "radio",
            resetDefaultHtml: "Reset",
            resetSelector: false,
            selectAutoWidth: true,
            selectClass: "selector",
            selectMultiClass: "uniform-multiselect",
            submitDefaultHtml: "Submit",
            textareaClass: "uniform",
            useID: true,
            wrapperClass: null
        },
        elements: []
    };
    e.fn.uniform = function(C) {
        var D = this;
        C = e.extend({}, e.uniform.defaults, C);
        if (!u) {
            u = true;
            if (i()) {
                j = false
            }
        }
        if (!j) {
            return this
        }
        if (C.resetSelector) {
            e(C.resetSelector).mouseup(function() {
                window.setTimeout(function() {
                    e.uniform.update(D)
                }, 10)
            })
        }
        return this.each(function() {
            var F = e(this),
                E, G, H;
            if (F.data("uniformed")) {
                e.uniform.update(F);
                return
            }
            for (E = 0; E < t.length; E = E + 1) {
                G = t[E];
                if (G.match(F, C)) {
                    H = G.apply(F, C);
                    F.data("uniformed", H);
                    e.uniform.elements.push(F.get(0));
                    return
                }
            }
        })
    };
    e.uniform.restore = e.fn.uniform.restore = function(C) {
        if (C === c) {
            C = e.uniform.elements
        }
        e(C).each(function() {
            var F = e(this),
                D, E;
            E = F.data("uniformed");
            if (!E) {
                return
            }
            E.remove();
            D = e.inArray(this, e.uniform.elements);
            if (D >= 0) {
                e.uniform.elements.splice(D, 1)
            }
            F.removeData("uniformed")
        })
    };
    e.uniform.update = e.fn.uniform.update = function(C) {
        if (C === c) {
            C = e.uniform.elements
        }
        e(C).each(function() {
            var E = e(this),
                D;
            D = E.data("uniformed");
            if (!D) {
                return
            }
            D.update(E, D.options)
        })
    }
}(jQuery));