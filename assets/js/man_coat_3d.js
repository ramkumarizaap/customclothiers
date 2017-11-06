var Man_Coat_3D = function(a, c) {
    this.container = jQuery(a);
    var d = {
        product_type: "man_coat",
        fabric: {
            coat: 0,
            coat_lining: 0
        },
        show_neck_lining: false,
        show_lupa: false,
        button_code: 2,
        zipper_color: 0,
        ribbon_color: 0,
        view: "front"
    };
    c = jQuery.extend(d, c);
    for (var b in c) {
        this[b] = c[b]
    }
    this.initConfig();
    this.initLayerManager()
};
Man_Coat_3D.prototype.setView = function(a) {
    if (a != "front" && a != "back") {
        return false
    }
    if (this.view != a) {
        this.view = a;
        this.redraw();
        return true
    }
    return false
};
Man_Coat_3D.prototype.setFabric = function(b, a, c) {
    this.fabric[b] = a;
    this.lmanager.setVar("fabric_" + b, a);
    if (c) {
        this.lmanager.redraw()
    }
    return true
};
Man_Coat_3D.prototype.setCoatButtonCode = function(a, b) {
    this.button_code = a;
    this.lmanager.setVar("button_code", a);
    if (b) {
        this.lmanager.redraw()
    }
    return true
};
Man_Coat_3D.prototype.redraw = function(b) {
    if (typeof(b) != "undefined") {
        this.importConfig(b)
    }
    this.lmanager.setVar("view", this.view);
    this.lmanager.setVar("button_code", this.button_code);
    for (var a in this.fabric) {
        this.lmanager.setVar("fabric_" + a, this.fabric[a])
    }
    this.redrawCoat()
};
Man_Coat_3D.prototype.initConfig = function() {
    var a = {};
    jQuery.extend(a, {
        coat_length: "",
        coat_style: "",
        coat_fit: "",
        coat_neck: "",
        coat_neck_flap: "",
        coat_closure: "",
        coat_closure_type: "",
        coat_closure_type_zipper: "",
        coat_closure_type_boton: "",
        coat_chest_pocket: "",
        coat_pockets: "",
        coat_pockets_type: "",
        coat_sleeve: "",
        coat_shoulder: "",
        coat_belt: "",
        coat_backcut: "",
        "button_holes_threads[buttonholes_color]": 0,
        "button_holes_threads[buttonthreads_color]": 0,
        "button_holes_threads[apply_at]": 0,
        neck_lining: 0,
        patches: 0
    });
    this.config = a
};
Man_Coat_3D.prototype.importConfig = function(b) {
    for (var a in b) {
        if (typeof(this.config[a]) != "undefined") {
            this.config[a] = b[a]
        }
    }
};
Man_Coat_3D.prototype.redrawCoat = function() {
    var p = (this.view == "front") ? 1 : 2;
    this.lmanager.setVar("button_code", this.button_code);
    var t = "";
    switch (this.config.coat_length) {
        case "long":
            t = "long";
            break;
        case "short":
            t = "short";
            break
    }
    var g = "";
    switch (this.config.coat_style) {
        case "simple":
            g = "simple";
            break;
        case "crossed":
            g = "crossed";
            break
    }
    var a = "";
    switch (this.config.coat_fit) {
        case "1":
            a = "1";
            break;
        case "0":
            a = "0";
            break
    }
    var w = "";
    switch (this.config.coat_neck) {
        case "standup":
            w = "standup";
            break;
        case "classic":
            w = "classic";
            break;
        case "flap":
            w = "flap";
            break
    }
    var o = "";
    switch (this.config.coat_neck_flap) {
        case "wide":
            o = "wide";
            break;
        case "close":
            o = "close";
            break
    }
    if (w == "flap") {
        w = w + o
    }
    var c = "";
    switch (this.config.coat_closure) {
        case "zipper":
            c = "zipper";
            break;
        case "boton":
            c = "boton";
            break;
        case "trench":
            c = "trench";
            break
    }
    var v = "";
    switch (this.config.coat_closure_type_zipper) {
        case "hide":
            v = "hide";
            break;
        case "standard":
            v = "standard";
            break
    }
    var u = "";
    switch (this.config.coat_closure_type_boton) {
        case "hide":
            u = "hide";
            break;
        case "standard":
            u = "standard";
            break
    }
    if (c == "zipper") {
        c = c + "_" + v
    } else {
        if (c == "boton") {
            c = c + "_" + u
        } else {
            c = c + "_standard"
        }
    }
    var i = "";
    switch (this.config.coat_chest_pocket) {
        case "0":
            i = "0";
            break;
        case "life":
            i = "life";
            break;
        case "vertical":
            i = "vertical";
            break;
        case "zipper":
            i = "zipper";
            break;
        case "patched":
            i = "patched";
            break
    }
    var b = "";
    switch (this.config.coat_pockets) {
        case "0":
            b = "0";
            break;
        case "2":
            b = "2";
            break;
        case "3":
            b = "3";
            break
    }
    var q = "";
    switch (this.config.coat_pockets_type) {
        case "1":
            q = "1";
            break;
        case "2":
            q = "2";
            break;
        case "3":
            q = "3";
            break;
        case "4":
            q = "4";
            break;
        case "5":
            q = "5";
            break;
        case "6":
            q = "6";
            break;
        case "7":
            q = "7";
            break
    }
    var e = "";
    switch (this.config.coat_sleeve) {
        case "0":
            e = "0";
            break;
        case "tape":
            e = "tape";
            break;
        case "button":
            e = "button";
            break
    }
    var l = "";
    switch (this.config.coat_shoulder) {
        case "0":
            l = "0";
            break;
        case "1":
            l = "1";
            break
    }
    var x = "";
    switch (this.config.coat_belt) {
        case "0":
            x = "0";
            break;
        case "sewing":
            x = "sewing";
            break;
        case "loose":
            x = "loose";
            break
    }
    var n = "";
    switch (this.config.coat_backcut) {
        case "0":
            n = "0";
            break;
        case "1":
            n = "1";
            break;
        case "2":
            n = "2";
            break
    }
    var j = this.config["button_holes_threads[buttonholes_color]"];
    var h = this.config["button_holes_threads[buttonthreads_color]"];
    var f = this.config["button_holes_threads[apply_at]"];
    if (f == "0") {
        f = "all"
    }
    var s = this.config.neck_lining;
    var m = this.config.patches;
    var r = [];
    if (this.view == "front") {
        r.push(["suit_front.png", {
            zIndex: 100
        }])
    } else {
        r.push(["suit_back.png", {
            zIndex: 100
        }])
    }
    this.lmanager.layers.coat_suit.setImages(r);
    this.lmanager.layers.coat_suit.redraw();
    var r = [];
    if (this.view == "front") {
        if (g == "crossed" && (w == "flapwide" || w == "flapclose")) {
            w = "flapwide";
            var d = "body_" + g + "_" + w + "_" + c + "_fit" + a + "_" + t + ".png"
        } else {
            var d = "body_" + g + "_" + w + "_" + c + "_fit" + a + "_" + t + ".png"
        }
        r.push([d, {
            zIndex: 1000
        }])
    } else {
        if (w == "standup") {
            var d = n + "_cortes_fit" + a + "_" + w + "_" + t + ".png"
        } else {
            var d = n + "_cortes_fit" + a + "_" + t + ".png"
        }
        r.push([d, {
            zIndex: 1000
        }])
    }
    this.lmanager.layers.coat_style.setImages(r);
    this.lmanager.layers.coat_style.redraw();
    var r = [];
    if (this.view == "front") {
        if (x != "0") {
            var d = "belt_" + x + "_fit" + a + ".png";
            r.push([d, {
                zIndex: 18000
            }])
        }
    } else {
        if (x != "0") {
            var d = "belt_" + x + "_fit" + a + ".png";
            r.push([d, {
                zIndex: 18000
            }])
        }
    }
    this.lmanager.layers.coat_belt.setImages(r);
    this.lmanager.layers.coat_belt.redraw();
    var r = [];
    if (this.view == "front") {
        if (b != "0") {
            var d = "pockets_" + b + "_type" + q + "_fit" + a + ".png";
            r.push([d, {
                zIndex: 2000
            }])
        }
    }
    this.lmanager.layers.coat_pockets.setImages(r);
    this.lmanager.layers.coat_pockets.redraw();
    var r = [];
    if (this.view == "front") {
        if (i != "0") {
            if (w == "flapwide" && i == "patched") {
                var d = "pockets_chest_type" + i + "_" + w + "_" + g + ".png";
                r.push([d, {
                    zIndex: 4000
                }])
            } else {
                if (w == "flapwide" && i == "life" && g == "simple") {
                    var d = "pockets_chest_type" + i + "_" + w + ".png";
                    r.push([d, {
                        zIndex: 4000
                    }])
                } else {
                    var d = "pockets_chest_type" + i + ".png";
                    r.push([d, {
                        zIndex: 4000
                    }])
                }
            }
        }
    }
    this.lmanager.layers.coat_chest_pocket.setImages(r);
    this.lmanager.layers.coat_chest_pocket.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (l == "1") {
            if (w == "flapwide") {
                var d = "shoulder_flapwide_" + g + ".png"
            } else {
                var d = "shoulder_" + w + ".png"
            }
            r.push([d, {
                zIndex: 5000
            }])
        }
    }
    this.lmanager.layers.coat_shoulder.setImages(r);
    this.lmanager.layers.coat_shoulder.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (e != "0") {
            var d = "sleeve_" + e + ".png";
            r.push([d, {
                zIndex: 6000
            }])
        }
    } else {}
    this.lmanager.layers.coat_sleeve.setImages(r);
    this.lmanager.layers.coat_sleeve.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (j) {
            if (f == "all") {
                if (c != "zipper_standard" && c != "zipper_hide" && c != "trench_standard") {
                    var d = j + "_ojal_body_" + g + "_" + w + "_" + c + ".png";
                    r.push([d, {
                        zIndex: 10500
                    }]);
                    if (e == "button") {
                        var d = j + "_ojal_sleeve_button.png";
                        r.push([d, {
                            zIndex: 10000
                        }])
                    }
                    if (e == "tape") {
                        var d = j + "_ojal_sleeve_tape.png";
                        r.push([d, {
                            zIndex: 10000
                        }])
                    }
                }
            } else {
                if (f == "cuff") {
                    if (e == "button") {
                        var d = j + "_ojal_sleeve_button.png";
                        r.push([d, {
                            zIndex: 10000
                        }])
                    }
                }
            }
        }
    } else {
        if (j) {
            if (f == "all") {
                if (x == "sewing") {
                    var d = j + "_ojal_belt_sewing_fit" + a + ".png";
                    r.push([d, {
                        zIndex: 18001
                    }])
                }
            }
        }
    }
    this.lmanager.layers.button_holes_color.setImages(r);
    this.lmanager.layers.button_holes_color.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (h) {
            if (f == "all") {
                if (c != "zipper_standard" && c != "zipper_hide" && c != "trench_standard") {
                    var d = h + "_hilo_body_" + g + "_" + w + "_" + c + ".png";
                    r.push([d, {
                        zIndex: 15001
                    }]);
                    if (e == "button") {
                        var d = h + "_hilo_sleeve_button.png";
                        r.push([d, {
                            zIndex: 15001
                        }])
                    }
                    if (e == "tape") {
                        var d = h + "_hilo_sleeve_tape.png";
                        r.push([d, {
                            zIndex: 15001
                        }])
                    }
                }
            } else {
                if (f == "cuff") {
                    if (e == "button") {
                        var d = h + "_hilo_sleeve_button.png";
                        r.push([d, {
                            zIndex: 15001
                        }])
                    }
                }
            }
        }
    } else {
        if (h) {
            if (f == "all") {
                if (x == "sewing") {
                    var d = h + "_hilo_belt_sewing_fit" + a + ".png";
                    r.push([d, {
                        zIndex: 18001
                    }])
                }
            }
        }
    }
    this.lmanager.layers.button_threads_color.setImages(r);
    this.lmanager.layers.button_threads_color.redraw();
    var r = [];
    var d = "";
    var y = [];
    var k = "";
    if (this.view == "back") {
        if (this.show_neck_lining && s) {
            var d = s + ".png";
            r.push([d, {
                zIndex: 10000
            }]);
            var k = n + "_cortes_fit" + a + "_standup_" + t + ".png";
            y.push([k, {
                zIndex: 1000
            }]);
            var k = "neck_up.png";
            y.push([k, {
                zIndex: 1001
            }]);
            this.lmanager.layers.coat_style.setImages(y);
            this.lmanager.layers.coat_style.redraw()
        }
    }
    this.lmanager.layers.neck_lining.setImages(r);
    this.lmanager.layers.neck_lining.redraw();
    var r = [];
    var d = "";
    if (this.view == "back") {
        if (m != "") {
            var d = m + ".png";
            r.push([d, {
                zIndex: 12000
            }])
        }
    }
    this.lmanager.layers.patches.setImages(r);
    this.lmanager.layers.patches.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (e == "button") {
            d = "#button_code#_boton_sleeve.png";
            r.push([d, {
                zIndex: 6000
            }])
        }
        if (e == "tape") {
            d = "#button_code#_boton_sleeve_tape.png";
            r.push([d, {
                zIndex: 6000
            }])
        }
        if (c == "boton_standard" || c == "boton_hide") {
            d = "#button_code#_boton_body_" + g + "_" + w + "_" + c + ".png";
            r.push([d, {
                zIndex: 6000
            }])
        }
        if (l == "1") {
            d = "#button_code#_boton_shoulder_tape.png";
            r.push([d, {
                zIndex: 6000
            }])
        }
    } else {
        if (a && x == "sewing") {
            d = "#button_code#_boton_belt_sewing_fit" + a + ".png";
            r.push([d, {
                zIndex: 6000
            }])
        }
    }
    this.lmanager.layers.botones.setImages(r);
    this.lmanager.layers.botones.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (this.config.coat_closure == "zipper") {
            d = Man_Coat.zipper_color + "_" + g + "_" + w + "_" + c + "_" + t + ".png";
            r.push([d, {
                zIndex: 16000
            }])
        }
    }
    this.lmanager.layers.zipper_color.setImages(r);
    this.lmanager.layers.zipper_color.redraw();
    var r = [];
    var d = "";
    if (this.view == "front") {
        if (this.config.coat_closure == "trench") {
            d = Man_Coat.ribbon_color + "_" + w + ".png";
            r.push([d, {
                zIndex: 16000
            }])
        }
    }
    this.lmanager.layers.ribbon_color.setImages(r);
    this.lmanager.layers.ribbon_color.redraw();
    var r = [];
    var d = "";
    if (this.view == "front" && this.show_lupa) {
        var d = "lupa_forro.png";
        r.push([d, {
            zIndex: 19000
        }])
    }
    this.lmanager.layers.lining_fabric.setImages(r);
    this.lmanager.layers.lining_fabric.redraw();
    var r = [];
    var d = "";
    if (this.view == "front" && this.show_lupa) {
        var d = this.fabric.coat_lining + ".png";
        r.push([d, {
            zIndex: 19030
        }]);
        var d = "superior.png";
        r.push([d, {
            zIndex: 19050
        }])
    }
    this.lmanager.layers.lining.setImages(r);
    this.lmanager.layers.lining.redraw();
    this.show_neck_lining = false;
    this.show_lupa = false;
    return false
};
Man_Coat_3D.prototype.initLayerManager = function() {
    if (typeof(LManager) == "undefined") {
        alert("LManager library not loaded")
    }
    this.lmanager = new LManager(this.container);
    var a = this.getBaseSRC("coat");
    this.lmanager.addLayer("coat_suit", {
        base_src: a + "suit/"
    });
    this.lmanager.addLayer("coat_length", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_style", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_fit", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_neck", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_neck_flap", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_closure", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_closure_type", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_closure_type_zipper", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_closure_type_boton", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_chest_pocket", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_pockets", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_pockets_type", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_sleeve", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_shoulder", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    });
    this.lmanager.addLayer("coat_belt", {
        base_src: a + "#fabric_coat#_fabric/#view#/",
        position: "back"
    });
    this.lmanager.addLayer("coat_backcut", {
        base_src: a + "#fabric_coat#_fabric/#view#/",
        position: "back"
    });
    this.lmanager.addLayer("button_holes_color", {
        base_src: a + "hilos_ojales/"
    });
    this.lmanager.addLayer("button_threads_color", {
        base_src: a + "hilos_ojales/"
    });
    this.lmanager.addLayer("neck_lining", {
        base_src: a + "neck_lining/",
        position: "back"
    });
    this.lmanager.addLayer("patches", {
        base_src: a + "patches/",
        position: "back"
    });
    this.lmanager.addLayer("botones", {
        base_src: a + "botones/"
    });
    this.lmanager.addLayer("zipper_color", {
        base_src: a + "zipper/"
    });
    this.lmanager.addLayer("ribbon_color", {
        base_src: a + "cierre_trench/"
    });
    this.lmanager.addLayer("lining", {
        base_src: a + "linings/"
    });
    this.lmanager.addLayer("lining_fabric", {
        base_src: a + "#fabric_coat#_fabric/#view#/"
    })
};
Man_Coat_3D.prototype.getBaseSRC = function(a) {
    return window.cdn_host + "3d/man/" + a + "/"
};