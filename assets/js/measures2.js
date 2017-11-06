(function(z) {
    var y = z("#measure_wizard");
    var N = y.find(".wizard_step");
    var O = y.find(".start_form");
    var d = y.find(".instruction");
    var F = false;
    var n = false;
    var h = {};
    var I = {};
    var l = false;
    var q = -1;
    var Q = [];
    var C = false;
    var i = false;
    var a = {
        height: [130, 230],
        weight: [50, 280]
    };
    var e = 6;
    var B = e;
    var v = 9;
    var K = false;
    var R = false;
    var j = false;

    function r(T, S) {
        if (T != n) {
            N.hide();
            N.filter("." + T).show();
            n = T
        }
        if (T == "measures") {
            if (window.mobile_enabled) {
                if (!S) {
                    s(Q[0], true)
                } else {
                    J(S)
                }
            } else {
                y.find(".measures .inputs input:eq(0)").focus()
            }
        } else {
            l = false
        }
        if (T == "summary") {
            D()
        }
    }

    function G(S) {
        /*var r = $("input[name='measurement_id']").val();
        if(r!='') {
            var q = "?step=" + S + "&id=" +r;
        }
        else {*/
            var q = "?step=" + S;
        //}
        if (S == n) {
            return false
        }
        if (S == "measures") {
            if (n == "start" || !n) {
                if (!A()) {
                    return G("start")
                }
                $('.start').css('display','none');
                $('.'+S).css('display','block');
                m();
                c(true)
            }
        }
        else {
            $('.measures').css('display','none');
            $('.'+S).css('display','block');
        }

        History.pushState({
            step: S
        }, window.title, q)
    }

    function J(V) {
        if (V == l) {
            return false
        }
        if (V) {
            l = V;
            d.hide().filter(".instruction_" + V).show();
            q = Q.indexOf(l);
            z(".current_measure_index", y).text(q + 1);
            var T = I[l];
            var U = T.completed ? T.value : C[l];
            var S = [T.min - 11, T.max + 11];
            if (V == "pants_position") {
                S = [T.min - 16, T.max + 16]
            }
            R(S, U)
        }
    }

    function s(T, S) {
        if (S) {
            History.replaceState({
                step: "measures",
                measure: T
            }, window.title, "?step=measures&measure=" + T)
        } else {
            History.pushState({
                step: "measures",
                measure: T
            }, window.title, "?step=measures&measure=" + T)
        }
    }

    function p() {
        var S = History.getState();
        var T = false;
        if (typeof(S.data.measure) != "undefined") {
            T = S.data.measure
        }
        if (typeof(S.data.step) != "undefined") {
            r(S.data.step, T)
        }
    }

    function f(V) {
        console.log('test'+V);

        var mp_height = $('input[name="mp_height"]').val();
        var mp_weight = $('input[name="mp_weight"]').val();
        
        if(V == "en" && mp_height == "cm") {
            $('input[name="weight"]').val("");
        }
        else if(V == "iso" && mp_height == " feet  inches") {
            $('input[name="weight"]').val("");
            $('input[name="height"]').val("");
        }

        else {
            $('input[name="weight"]').val(mp_weight);
        }

        if (V != "iso" && V != "en" && V == F) {
            return false
        }
        /*O.find(".height_en").val("");
        O.find(".height_en").val("");
        O.find(".height_en").val("");
        O.find(".height_cm").val("");
        O.find(".weight").val("");*/
        for (var S in I) {
            if (I[S].imported) {
                I[S].imported = ""
            }
            if (I[S].completed) {
                I[S].completed = false
            }
        }
        var U = z(".units", y);
        U.filter(".weight").text(V == "en" ? "lb" : "kg");
        U.not(".weight").text(V == "en" ? "in" : "cm");
        F = V;
        z("#inp_current_units").val(F);
        y.removeClass("units_en units_iso").addClass("units_" + V);
        if (F == "en") {
            O.find(".height_en").show();
            O.find(".height_cm").hide();
            O.find(".switch span.en").hide();
            O.find(".switch span.iso").show();
            $('input[name="switch_opt"]').val('imperial');
            B = e / 2.54
        } else {
            O.find(".height_en").hide();
            O.find(".height_cm").show();
            O.find(".switch span.en").show();
            O.find(".switch span.iso").hide();
            $('input[name="switch_opt"]').val('meteric');
            B = e
        }
        if (mobile_enabled) {
            var T = (F == "en") ? 2.20462262 : 1;
            M(O.find("select.weight"), Math.floor(a.weight[0] * T), Math.floor(a.weight[1] * T)).val(Math.floor(80 * T))
        }
    }

    function m() {
        var S = y.find(".summary .value");
        O.find("input, select").each(function() {
            S.filter("." + this.name).text(this.value);
            h[this.name] = this.value
        });
        if (F == "en") {
            S.filter(".height").text(h.feet + "feet " + h.height_in)
        }
        y.find(".constitution input:checked").each(function() {
            h[this.name] = this.value;
            S.filter("." + this.name).text(z(this.parentNode).text())
        });
        y.find(".profile_name").val(O.find(".profile_name").val())
    }

    function D() {
        var T = y.find(".summary_table");
        for (var S in I) {
            z("span." + S, T).text(I[S].value)
        }
        m()
    }

    function c(S) {
        var U = {
            weight_units: (F == "en" ? "lb" : "kg"),
            length_units: (F == "en" ? "in" : "cm"),
            weight: h.weight,
            height: h.height,
            param_stance: h.param_stance,
            param_chest: h.param_chest,
            param_abdomen: h.param_abdomen,
            param_shoulders: h.param_shoulders,
            age: h.age
        };

        if (U.length_units == "in") {
            U.height = h.feet + "x" + h.height_in
        }
        var Y = false;
        for (var T in I) {
            if ((I[T].imported || I[T].completed) && !S) {
                U[T] = I[T].value
            } else {
                Y = true;
                U[T] = 0
            }
        }
        if (!Y) {
            return true
        }
        var ac = jQuery.param(U);
        if (C && C.query == ac) {
            return true
        }
        var Z = z.ajax({
            url: "/" + options.region + "/" + options.gender + "/measures/estimate",
            async: false,
            data: U
        });
        /*var V = jQuery.parseJSON(Z.responseText);
        var X = mobile_enabled ? y.find(".instructions input") : y.find(".process").find(".input input");
        for (var T in I) {
            if (typeof(V[T]) == "undefined") {
                continue
            }
            if (!I[T].completed && !I[T].imported) {
                X.filter("[name=" + T + "]").val(V[T]);
                if (mobile_enabled && S) {
                    I[T].value = V[T]
                }
            }
            if (S) {
                V[T] = V[T] * 1;
                var aa = Math.round(V[T] + B);
                var W = Math.round(V[T] - B);
                I[T].max = aa;
                I[T].min = W;
                if (!mobile_enabled) {
                    var ab = X.filter("[name=" + T + "]");
                    ab.parent().find("span.min").text(W);
                    ab.parent().find("span.max").text(aa)
                }
            }
        }
        V.query = ac;
        C = V;
        if (S) {
            i = {};
            jQuery.extend(i, C)
        }*/
        return true
    }

    function A() {
        O.find(".invalid_imc").hide();
        var T = O.find("input, select").removeClass("error");
        var U = {};
        T.each(function() {
            U[this.name] = this.value
        });
        var Y = [];
        if (F == "iso") {
            U.height = parseFloat(U.height.replace(",", "."));
            if (isNaN(U.height) || !U.height) {
                Y.push("height")
            }
        } else {
            U.feet = parseFloat(U.feet.replace(",", "."));
            U.height_in = parseFloat(U.height_in.replace(",", "."));
            if (isNaN(U.feet) || !U.feet) {
                Y.push("feet")
            }
        }
        U.weight = parseFloat(U.weight.replace(",", "."));
        if (isNaN(U.weight) || !U.weight) {
            Y.push("weight")
        }
        var W = (F == "iso") ? U.height : (U.feet * 30.48 + U.height_in * 2.54);
        W = W / 100;
        var S = U.weight * (F == "iso" ? 1 : 0.4536);
        var X = S / (W * W);
        if (X >= 80 || X < 16) {
            Y.push("imc")
        }
        if (Y.length) {
            O.find(".invalid_imc").show();
            for (var V in Y) {
                if (Y[V] == "imc") {} else {
                    T.filter('[name="' + Y[V] + '"]').addClass("error")
                }
            }
            return false
        }
        return true
    }

    function g(V) {
        var S = V.name;
        var aa = parseFloat(V.value);
        var Z = Math.abs(aa - i[S]);
        var U = (aa == i[S]);
        var X = false;
        if (S == "skirt_length" || S == "pants_length" || S == "crotch") {
            var ab = z(V).closest(".input").addClass("completed");
            ab.removeClass("warning error");
            if (aa <= 0) {
                I[S].error = "error";
                ab.addClass("error")
            }
            return true
        } else {
            if (aa != I[S].imported) {
                if (Z > (i[S] * v / 100)) {
                    X = "error"
                } else {
                    if (aa > I[S].max || aa < I[S].min) {
                        X = "warning"
                    }
                }
            }
            I[S].completed = true;
            I[S].error = X;
            I[S].value = aa;
            var ab = z(V).closest(".input").addClass("completed");
            ab.removeClass("warning error");
            if (X) {
                ab.addClass(X)
            }
        }
        if (!K && X) {
            var T = false;
            if (X == "error") {
                T = true
            } else {
                var Y = 0;
                for (var W in I) {
                    if (I[W].error) {
                        Y++
                    }
                }
                if (Y >= 3) {
                    T = true
                }
            }
            if (T) {
                w()
            }
        }
    }

    function w() {
        if (!K) {
            z("#warning-measures a.popup-modal-dismiss").click(function() {
                z.magnificPopup.close()
            })
        }
        K = true;
        z.magnificPopup.open({
            items: {
                src: "#warning-measures",
                type: "inline"
            },
            modal: true
        })
    }

    function M(S, V, X, W) {
        if (!W) {
            W = 1
        }
        var U = "";
        for (var T = V; T <= X; T += W) {
            U += '<option value="' + T + '">' + T + "</option>"
        }
        return S.html(U)
    }

    function o() {
        if (mobile_enabled) {
            O.find("input.height_cm").replaceWith('<select class="text num height_cm" name="height"></select>');
            M(O.find("select.height_cm"), a.height[0], a.height[1]).val(180);
            O.find("input.weight").replaceWith('<select class="text num weight" name="weight"></select>')
        }
    }

    function k() {
        z("#sign_in_starthere").click(function() {
            G("start");
            return false
        });
        if (mobile_enabled) {
            var S = z("#sign_in");
            var U = S.find(".social_buttons");
            var T = S.find(".split");
            S.append(T).append(U)
        }
    }

    function u() {
        var S = N.filter(".load");
        z("a.new_profile", S).click(function() {
            G("start");
            return false
        });
        z("a.delete").click(function() {
            var T = z(this).attr("id_profile");
            var W = z(this).attr("profile_name");
            var U = "/" + options.region + "/checkout/measures?delete_profile=" + T;
            switch (options.region) {
                case "es":
                case "es-mx":
                case "es-us":
                    var V = "¿ Está seguro que desea eliminar el perfil de medidas " + W + "?";
                    break;
                case "fr":
                case "fr-ca":
                case "fr-be":
                case "fr-ch":
                    var V = "Êtes-vous sûr de vouloir supprimer ce profil?";
                    break;
                case "de":
                case "de-ch":
                case "de-at":
                    var V = "Sind Sie sicher, dass Sie dieses Profil löschen wollen?";
                    break;
                case "it":
                    var V = "Sei sicuro di voler cancellare il profilo?";
                    break;
                case "ru":
                    var V = "Вы действительно хотите удалить этот профиль?";
                    break;
                case "cn":
                    var V = "难道你真的要删除此配置文件？";
                    break;
                case "en":
                case "en-uk":
                case "en-us":
                case "en-ca":
                case "en-ie":
                case "en-au":
                default:
                    var V = "Do you really want to delete this profile?";
                    break
            }
            if (confirm(V)) {
                window.location.replace(U)
            }
            return false
        })
    }

    function b() {
        var S = N.filter(".start");
        if (mobile_enabled) {
            z(".constitution input").click(function() {
                var V = this.getAttribute("img");
                var W = this.getAttribute("name");
                if (!V) {
                    return true
                }
                z("#models_woman").find("img." + W).attr("src", V);
                if (W == "param_chest" || W == "param_abdomen" || W == "param_buttocks") {
                    z("#models_woman .model_side").show();
                    z("#models_woman .model_front").hide()
                } else {
                    z("#models_woman .model_front").show();
                    z("#models_woman .model_side").hide()
                }
            }).filter(":checked").click();
            z("#models_woman .model_side").show();
            z("#models_woman .model_front").hide();
            var U = z(document);
            U.scroll(function() {
                if (U.scrollTop() >= 170) {
                    z("#models_woman .col.side").css("position", "fixed");
                    z("#models_woman .col.side").css("right", "25px");
                    z("#models_woman .col.side").css("bottom", "20px");
                    if (U.scrollTop() >= 650) {
                        z("#models_woman .col.side").css("top", "auto");
                        z("#models_woman .col.side").css("bottom", "120px")
                    } else {
                        z("#models_woman .col.side").css("bottom", "20px")
                    }
                } else {
                    z("#models_woman .col.side").css("position", "absolute");
                    z("#models_woman .col.side").css("top", "auto");
                    z("#models_woman .col.side").css("bottom", "auto");
                    z("#models_woman .col.side").css("right", "5px")
                }
            })
        } else {
            z(".constitution input").click(function() {
                var V = this.getAttribute("img");
                var W = this.getAttribute("name");
                if (!V) {
                    return true
                }
                z("#models_woman").find("img." + W).attr("src", V)
            }).filter(":checked").click()
        }
        z("a.switch", S).click(function() {
            var V = "iso";
            if (F == "iso") {
                V = "en"
            }
            f(V);
            z("#inp_imperial_metric").val(V);
            return false
        });
        z("a.measure", S).click(function() {
            G("measures");
            return false
        });
        if (options.profile) {
            var T = z("input, select", O);
            if (options.profile.length_units == "in") {
                f("en");
                T.filter(".height_en", O).eq(0).val(options.profile.height);
                T.filter(".height_en", O).eq(1).val(options.profile.height2)
            } else {
                T.filter(".height_cm", O).val(options.profile.height)
            }
            T.filter(".profile_name", O).val(options.profile.title);
            T.filter(".weight", O).val(options.profile.weight)
        }
    }

    function H() {
        var af = N.filter(".measures");
        if (mobile_enabled) {
            d.each(function() {
                Q.push(this.getAttribute("measure"))
            });
            z("a.next", af).click(function() {
                var an = I[l];
                an.completed = true;
                an.value = 1 * V.text();
                Y.find('input[name="' + l + '"]').val(an.value);
                q++;
                if (j || q >= Q.length) {
                    G("summary");
                    j = false
                } else {
                    s(Q[q])
                }
                return false
            });
            var Y = af.find(".instruction").each(function() {
                var an = z("input", this);
                var ao = an.attr("name");
                var ap = {
                    name: z(".measure_title", this).text(),
                    imported: false,
                    completed: false,
                    value: an.val(),
                    error: false
                };
                if (options.profile && typeof(options.profile[ao]) != "undefined") {
                    an.val(options.profile[ao]);
                    ap.imported = an.val();
                    ap.value = ap.imported
                }
                I[ao] = ap
            });
            var W = z(".measure_tape", af);
            var V = z(".tape_input span", af);
            var aj = z(".tape_slider", W);
            var ae = 60;
            var ab = -15;
            var T, ah, Z, X, am;
            var aa;

            function S() {
                var an = z(window).width() - 42;
                an = Math.floor(an / (ae / 2)) * (ae / 2);
                W.width(an);
                ah = (X[1] - X[0] + 1) * ae;
                Z = ae;
                X[2] = (X[0] + ((an / 2) + ab) / Z);
                if (am) {
                    z.pep.unbind(am)
                }
                am = aj.pep({
                    axis: "x",
                    easeDuration: 500,
                    useCSSTranslation: false,
                    grid: [ae / 4, 0],
                    constrainTo: [0, an / 2, 0, an / 2 - ah],
                    drag: function(ap, aq) {
                        var ao = -aq.$el.position().left;
                        ad(ao)
                    },
                    rest: U
                })
            }

            function ad(ap) {
                var ao = X[2] + (ap / Z);
                var an = (Math.round(ao * 4) / 4).toFixed(2);
                V.text(an)
            }

            function al(ao) {
                var an = (Math.round(ao * 4) / 4).toFixed(2);
                V.text(an);
                var ap = (an - X[2]) * Z;
                aj.css({
                    left: -ap
                })
            }

            function U(ap, aq) {
                var ao = aq.$el.position().left;
                var an = ae / 4;
                ao = Math.round(ao / an) * an;
                aq.$el.css({
                    left: ao
                });
                ad(-ao)
            }
            R = function(ar, aq) {
                X = ar;
                var ao = "<ul>";
                for (var an = ar[0]; an <= ar[1]; an++) {
                    ao += "<li><span>" + an + "</span></li>"
                }
                ao += "</ul>";
                aj.html(ao);
                var ap = 1110;
                if ((ar[1] - ar[0]) > 16) {
                    ap = 1650
                }
                if ((ar[1] - ar[0]) > 27) {
                    ap = 2500
                }
                aj.css("width", ap + "px");
                S();
                if (aq) {
                    al(aq)
                } else {
                    ad(0)
                }
            };
            z(window).resize(S)
        } else {
            z(document).keypress(function(an) {
                if (an.which == 13) {
                    return false
                }
            });
            z("a.edit", af).click(function() {
                var an = History.getCurrentIndex() - 1;
                if (an > 0 && History.getStateByIndex(an).data.step == "start") {
                    History.back()
                } else {
                    G("start")
                }
                return false
            });
            z("a.load_profiles", af).click(function() {
                G("load");
                return false
            });
            var Y = af.find(".inputs input").focus(function() {
                af.find(".input").removeClass("current");
                z(this).closest(".input").addClass("current");
                var an = this.getAttribute("name");
                l = an;
                d.hide().filter(".instruction_" + an).show()
            }).blur(function() {
                g(this)
            }).each(function() {
                var an = z(this).closest(".input");
                var ao = {
                    name: an.find(".name").text(),
                    imported: false,
                    completed: false,
                    value: this.value,
                    error: false
                };
                if (options.profile && typeof(options.profile[this.name]) != "undefined") {
                    this.value = options.profile[this.name];
                    an.addClass("completed");
                    ao.imported = this.value
                }
                I[this.name] = ao
            });
            var ai = af.find(".inputs .tooltip");
            af.find(".inputs .input").click(function(an) {
                if (an.offsetX > 198 && this.className.match(/error|warning/)) {
                    w()
                }
            }).mousemove(function(an) {
                if ((an.offsetX > 190 && an.offsetX < 215) && (an.offsetY > 5 && an.offsetY < 35) && this.className.match(/error|warning/)) {
                    ai.show().css("top", an.offsetY + z(this).offset().top).attr("class", "tooltip " + (this.className.match(/error/) ? "error" : "warning"))
                } else {
                    ai.hide()
                }
            }).mouseout(function(an) {
                ai.hide()
            })
        }
        var ak = window.navigator.userAgent;
        var ac = ak.indexOf("MSIE ");

        function ag(an) {
            return !isNaN(parseFloat(an)) && isFinite(an)
        }
        if (ac > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            y.find("input.num").keypress(function(ao) {
                var an = ao.keyCode;
                if (z.inArray(ao.keyCode, [0, 44, 46, 8, 9, 27, 13, 110, 188, 190]) !== -1 || (ao.keyCode == 65 && ao.ctrlKey === true)) {
                    return
                }
                var ap = String.fromCharCode(an);
                if (!ag(ap)) {
                    ao.preventDefault(ao)
                }
            })
        } else {
            y.find("input.num").keypress(function(ao) {
                var an = ao.charCode;
                if (z.inArray(ao.charCode, [0, 44, 46, 8, 9, 27, 13, 110, 188, 190]) !== -1 || (ao.charCode == 65 && ao.ctrlKey === true)) {
                    return
                }
                var ap = String.fromCharCode(an);
                if (!ag(ap)) {
                    ao.preventDefault(ao)
                }
            })
        }
        if (options.profile) {
            m();
            c(true)
        }
       
    }

    function t() {
        if (!mobile_enabled) {
            return false
        }
        var S = N.filter(".summary");
        z("a.edit", S).click(function() {
            var U = this.href.replace(/^[^\?]*/, "");
            var X = U.substring(1).split("&");
            var W = {};
            for (var V in X) {
                var T = X[V].split("=");
                W[decodeURIComponent(T[0])] = decodeURIComponent(T[1])
            }
            History.pushState(W, window.title, U);
            j = true;
            return false
        });
        z("div.continue", S).click(function() {
            z("#measure_wizard_form").submit();
            return false
        })
    }

    function L() {
y.find("a.save4later").magnificPopup({
            type: "iframe"
        });
        z("a.modify_order").magnificPopup({
            type: "iframe",
            iframe: {
                markup: '<div class="mfp-iframe-scaler cart_checkout"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe></div>',
            },
            callbacks: {
                beforeOpen: function() {
                    var S = z("#inline_04_finish_form").serialize();
                    S = S + "&modify_order=1";
                    z.post(region_url + "checkout/measures", S)
                },
                open: function() {
                    z(".mfp-content").addClass("white-popup-cart")
                }
            },
            closeOnContentClick: false,
            closeOnBgClick: false,
            showCloseBtn: true,
            enableEscapeKey: false
        })
    }
    if (mobile_enabled) {
        o()
    }
    var P = "iso";
    switch (options.region_metric_system) {
        case "en":
            P = "en";
            break;
        case "iso":
            P = "iso";
            break
    }
    if (options.profile) {
        P = (options.profile.length_units == "in") ? "en" : "iso"
    }
    f('en');
    k();
    u();
    b();
    H();
    t();
    L();
    History.Adapter.bind(window, "statechange", p);
    var x = "login";
    if (options.is_customer) {
        if (options.profile) {
            x = "measures"
        } else {
            if (y.find(".profiles .profile").length) {
                x = "load"
            } else {
                x = "start"
            }
        }
    }
    if (mobile_enabled && options.profile) {
        x = "summary";
        c(true)
    }
    var E = History.getState();
    if (typeof(E.data.step) != "undefined") {
        if (E.data.step == "measures" && options.profile) {
            x = false
        }
    }
    if (x) {
        History.replaceState({
            step: x
        }, window.title, "?step=" + x)
    }
    p()
})(jQuery);