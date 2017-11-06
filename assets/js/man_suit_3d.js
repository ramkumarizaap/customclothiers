var Man_Suit_3D = function(a, c) {

    this.container = jQuery(a);

    var d = {

        product_type: "man_suit",

        show_jacket: true,

        show_pants: true,

        show_waistcoat: true,

        fabric: {

            jacket: 0,

            jacket_lining: 0,

            pants: 0,

            waistcoat: 0,

            waistcoat_lining: 0,

            waistcoat_lining_back: 0

        },

        jacket_opened: false,

        jacket_cuff_opened: false,

        jacket_show_neck_lining: false,

        shoes_color: "black",

        jacket_button_code: 2,

        pants_button_code: 2,

        waistcoat_button_code: 2,

        id_tie: 0,

        view: "front",

        lining_radio: 0

    };

    c = jQuery.extend(d, c);

    for (var b in c) {

        this[b] = c[b]

    }

    this.initConfig();

    this.initLayerManager()

};

Man_Suit_3D.prototype.setView = function(a) {

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

Man_Suit_3D.prototype.setFabric = function(b, a, c) {

    this.fabric[b] = a;

    this.lmanager.setVar("fabric_" + b, a);

    if (c) {

        this.lmanager.redraw()

    }

    return true

};

Man_Suit_3D.prototype.setTie = function(a, b) {

    this.id_tie = a;

    this.lmanager.setVar("id_tie", a);

    if (b) {

        this.lmanager.redraw()

    }

    return true

};

Man_Suit_3D.prototype.setShoesColor = function(a, b) {

    this.shoes_color = a;

    this.lmanager.setVar("shoes_color", a);

    if (b) {

        this.lmanager.redraw(true)

    }

    return true

};

Man_Suit_3D.prototype.setJacketButtonCode = function(a, b) {

    this.jacket_button_code = a;

    this.lmanager.setVar("jacket_button_code", a);

    if (b) {

        this.lmanager.redraw()

    }

    return true

};

Man_Suit_3D.prototype.setPantsButtonCode = function(a, b) {

    this.pants_button_code = a;

    this.lmanager.setVar("pants_button_code", a);

    if (b) {

        this.lmanager.redraw()

    }

    return true

};

Man_Suit_3D.prototype.setWaistcoatButtonCode = function(a, b) {

    this.waistcoat_button_code = a;

    this.lmanager.setVar("waistcoat_button_code", a);

    if (b) {

        this.lmanager.redraw()

    }

    return true

};

Man_Suit_3D.prototype.redraw = function(b) {

    if (typeof(b) != "undefined") {

        this.importConfig(b)

    }

    this.lmanager.setVar("view", this.view);

    this.lmanager.setVar("shoes_color", this.shoes_color);

    this.lmanager.setVar("pants_button_code", this.pants_button_code);

    this.lmanager.setVar("waistcoat_button_code", this.waistcoat_button_code);

    this.lmanager.setVar("jacket_button_code", this.jacket_button_code);

    for (var a in this.fabric) {

        this.lmanager.setVar("fabric_" + a, this.fabric[a])

    }

    switch (this.product_type) {

        case "man_suit":

            if (this.config.suit_type == "man_suit2") {

                this.show_waistcoat = false

            }

            this.updateLayersVisibility();

            this.redrawJacket();

            this.redrawPants();

            this.redrawWaistcoat();

        case "man_pants":

            this.redrawPants();

            break;

        case "man_jacket":

            this.redrawJacket();

            break;

        case "man_waistcoat":

            this.redrawWaistcoat();

            break;

        default:

            alert("Invalid product_type " + this.product_tpye)

    }

};

Man_Suit_3D.prototype.initConfig = function() {

    var a = {};

    if (this.product_type == "man_suit" || this.product_type == "man_jacket") {

        jQuery.extend(a, {

            jacket_buttons: "",

            jacket_chest_pocket: "",

            jacket_fit: "",

            jacket_lapel_type: "",

            jacket_pockets: "",

            jacket_pockets_type: "",

            jacket_sleeve_buttonholes: "",

            jacket_sleeve_buttons: "",

            jacket_style: "",

            jacket_vent: "",

            patches: 0,

            handkerchief: 0,

            neck_lining: 0,

            "button_holes_threads[buttonholes_color]": 0,

            "button_holes_threads[buttonthreads_color]": 0,

            "button_holes_threads[apply_at]": "",

            "button_holes_threads_jacket[buttonholes_color]": 0,

            "button_holes_threads_jacket[buttonthreads_color]": 0,

            "button_holes_threads_jacket[apply_at]": "",

            metal_buttons: ""

        })

    }

    if (this.product_type == "man_suit" || this.product_type == "man_pants") {

        jQuery.extend(a, {

            pants_back_pocket: "",

            pants_back_pocket_type: "",

            pants_belt: "",

            pants_cuff: "",

            pants_fit: "",

            pants_front_pocket: "",

            pants_peg: ""

        })

    }

    if (this.product_type == "man_suit" || this.product_type == "man_waistcoat") {

        jQuery.extend(a, {

            waistcoat_bottom: "",

            waistcoat_buttons: "",

            waistcoat_chest_pocket: "",

            waistcoat_pockets: "",

            waistcoat_pockets_num: "",

            waistcoat_style: "",

            lining_back_radio: "",

            "button_holes_threads[buttonholes_color]": "",

            "button_holes_threads[buttonthreads_color]": "",

            "button_holes_threads_waistcoat[buttonholes_color]": "",

            "button_holes_threads_waistcoat[buttonthreads_color]": ""

        })

    }

    if (this.product_type == "man_suit") {

        jQuery.extend(a, {

            suit_type: "man_suit2"

        })

    }

    this.config = a

};

Man_Suit_3D.prototype.importConfig = function(b) {

    for (var a in b) {

        if (typeof(this.config[a]) != "undefined") {

            this.config[a] = b[a]

        }

    }

};

Man_Suit_3D.prototype.redrawJacket = function() {

    var j = (this.view == "front") ? 1 : 2;

    var a = "";

    switch (this.config.jacket_style) {

        case "crossed":

            a = "cruzada";

            break;

        case "mao":

            a = "mao";

            break;

        case "simple":

        default:

            a = "classica";

            break

    }

    var i = "";

    var c = "";

    switch (this.config.jacket_fit) {

        case "1":

            i = "estrecho";

            c = "estr";

            break;

        case "0":

        default:

            i = "ancho";

            c = "ancho";

            break

    }

    var o = (this.config.jacket_fit == "1") ? "estrecha" : "ancha";

    var h = (o == "estrecha") ? "_estrecha" : "";

    var n = (this.config.jacket_vent == 1) ? "corte" : "cortes";

    var p = "";

    var m = "";

    var d = "";

    switch (this.config.jacket_style) {

        case "crossed":

            switch (this.config.jacket_buttons) {

                case "8":

                    p = "corta";

                    m = "corta";

                    d = "short";

                    break;

                case "6":

                    p = "mediana";

                    m = "";

                    d = "medium";

                    break;

                case "4":

                case "2":

                    p = "larga";

                    m = "larga";

                    d = "long";

                    break

            }

            break;

        case "mao":

            break;

        case "simple":

        default:

            switch (this.config.jacket_buttons) {

                case "4":

                    m = "corta";

                    p = "corta";

                    d = "short";

                    break;

                case "2":

                case "3":

                    p = "mediana";

                    m = "";

                    d = "medium";

                    break;

                case "1":

                    p = "larga";

                    m = "larga";

                    d = "long";

                    break

            }

            break

    }

    var k = (this.config.jacket_lapel_type == "standard") ? "estandar" : "pico";

    if (this.product_type == "man_jacket" || this.product_type == "man_suit") {

        var g = this.config.metal_buttons;

        /*if (g != "") {

            this.lmanager.setVar("jacket_button_code", g)

        }*/

    }

    var l = [];

    if (this.view == "front") {

        if (this.jacket_opened) {

            l.push(["jacket_abierta.png", {

                zIndex: 100

            }])

        } else {

            l.push(["Front_debajo.png", {

                zIndex: 1001

            }]);

            if (this.product_type == "man_suit") {

                l.push(["sombra_chaqueta_sobre_pantalon.png", {

                    zIndex: 1002

                }])

            }

        }

    } else {

        l.push(["Back.png", {

            zIndex: 1001

        }]);

        if (this.product_type == "man_suit") {

            l.push(["sombra_chaqueta_sobre_pantalon.2.png", {

                zIndex: 1002

            }])

        }

    }

    this.lmanager.layers.jacket_shirt.setImages(l);

    this.lmanager.layers.jacket_shirt.redraw();

    l = [];

    var q = this.id_tie;

    if (this.view == "front") {

        if (q) {

            l.push([q + ".png", {

                zIndex: 1002

            }])

        }

    }

    this.lmanager.layers.jacket_tie.setImages(l);

    this.lmanager.layers.jacket_tie.redraw();

    l = [];

    if (this.view == "front") {

        if (this.jacket_opened) {

            if (this.config.jacket_style == "mao") {

                l.push(["mao_interior.1.png", {

                    zIndex: 3050

                }]);

                l.push([a + "_abierta_der_cuerpo_" + c + ".1.png", {

                    zIndex: 3050

                }])

            } else {

                l.push([a + "_abierta.1.png", {

                    zIndex: 3051

                }]);

                if (m) {

                    if ((a == "classica" && c == "estr" && m == "larga") || (a == "cruzada" && c == "estr" && m == "larga") || (a == "cruzada" && c == "estr" && m == "corta") || (a == "classica" && c == "ancho" && m == "corta")) {

                        l.push([a + "_abierta_der_cuerpo_" + c + "_" + m + ".1.png", {

                            zIndex: 3050

                        }])

                    } else {

                        l.push([a + "_abierta_der_cuerpo_" + c + "_" + m + ".png", {

                            zIndex: 3050

                        }])

                    }

                } else {

                    l.push([a + "_abierta_der_cuerpo_" + c + ".1.png", {

                        zIndex: 3050

                    }])

                }

            }

            if (a != "cruzada") {

                l.push([a + "_bolsillos_interior.1.png", {

                    zIndex: 3070

                }])

            }

            this.lmanager.layers.jacket_corpus.setImages(l);

            this.lmanager.layers.jacket_corpus.redraw();

            if (a == "cruzada") {

                this.lmanager.layers.jacket_lining.setImages([

                    [a + "_forro.1.png", {

                        zIndex: 3060

                    }]

                ])

            } else {

                this.lmanager.layers.jacket_lining.setImages([

                    [a + "_forro_interior.1.png", {

                        zIndex: 3060

                    }]

                ])

            }

            if (this.lining_radio == "unlined") {

                this.lmanager.layers.jacket_unlining.setImages([

                    ["unlined_" + a + ".png", {

                        zIndex: 3070

                    }]

                ]);

                this.lmanager.layers.jacket_unlining.redraw()

            } else {

                this.lmanager.layers.jacket_unlining.removeImages()

            }

            this.lmanager.layers.jacket_lining.redraw()

        } else {

            this.lmanager.layers.jacket_unlining.removeImages();

            if (this.config.jacket_style == "mao") {

                l.push([a + "_front_" + i + "." + j + ".png", {

                    zIndex: 3050

                }]);

                l.push(["mao_cuello." + j + ".png", {

                    zIndex: 3750

                }]);

                this.lmanager.layers.jacket_corpus.setImages(l)

            } else {

                if (a == "cruzada" && p == "mediana" && i == "estrecho") {

                    this.lmanager.layers.jacket_corpus.setImages([

                        [a + "_" + p + "_corpus_estrecha." + j + ".png", {

                            zIndex: 3050

                        }]

                    ])

                } else {

                    this.lmanager.layers.jacket_corpus.setImages([

                        [a + "_" + p + "_corpus_" + i + "." + j + ".png", {

                            zIndex: 3050

                        }]

                    ])

                }

            }

            this.lmanager.layers.jacket_lining.removeImages();

            this.lmanager.layers.jacket_corpus.redraw()

        }

        this.lmanager.layers.jacket_neck_lining.removeImages()

    } else {

        if (this.jacket_show_neck_lining && parseInt(this.config.neck_lining)) {

            if (this.config.jacket_style != "mao") {

                this.lmanager.layers.jacket_neck_lining.setImages([

                    [this.config.neck_lining + ".png", {

                        zIndex: 3550

                    }]

                ])

            }

            this.lmanager.layers.jacket_neck_lining.redraw();

            this.lmanager.layers.jacket_corpus.removeImages()

        } else {

            if (this.config.jacket_style == "mao") {

                this.lmanager.layers.jacket_corpus.setImages([

                    ["mao_cuello." + j + ".png", {

                        zIndex: 3750

                    }]

                ])

            } else {

                this.lmanager.layers.jacket_corpus.setImages([

                    ["classica_cuello_arriba." + j + ".png", {

                        zIndex: 3550

                    }]

                ])

            }

            this.lmanager.layers.jacket_neck_lining.removeImages()

        }

        this.lmanager.layers.jacket_lining.removeImages();

        this.lmanager.layers.jacket_corpus.redraw()

    }

    if (this.view == "front" && !this.jacket_opened) {

        if (this.config.jacket_style == "mao") {

            this.lmanager.layers.jacket_sides.setImages([

                ["espalda_mao_0_cortes_" + o + "." + j + ".png", {

                    zIndex: 3100

                }]

            ])

        } else {

            this.lmanager.layers.jacket_sides.setImages([

                ["espalda_0_cortes_" + o + "." + j + ".png", {

                    zIndex: 3100

                }]

            ])

        }

        this.lmanager.layers.jacket_sides.redraw()

    } else {

        this.lmanager.layers.jacket_sides.removeImages()

    }

    if (this.view == "back") {

        this.lmanager.layers.jacket_vent.setImages([

            ["espalda_" + this.config.jacket_vent + "_" + n + "_" + o + "." + j + ".png", {

                zIndex: 3150

            }]

        ]);

        this.lmanager.layers.jacket_vent.redraw()

    } else {

        this.lmanager.layers.jacket_vent.removeImages()

    }

    if (this.view == "front" && this.config.jacket_chest_pocket == 1 && !this.jacket_opened) {

        this.lmanager.layers.jacket_chest_pocket.setImages([

            ["bolsillo_pecho.1.png", {

                zIndex: 3200

            }]

        ]);

        this.lmanager.layers.jacket_chest_pocket.redraw()

    } else {

        this.lmanager.layers.jacket_chest_pocket.removeImages()

    }

    l = [];

    if (this.config.jacket_style != "mao" && this.view == "front") {

        if (this.jacket_opened) {

            if (m == "") {

                l.push([a + "_abierta_der_solapa_" + k + ".1.png", {

                    zIndex: 3300

                }])

            } else {

                if ((a == "cruzada" && k == "estandar" && m == "larga") || (a == "cruzada" && k == "estandar" && m == "corta") || (a == "cruzada" && k == "pico" && m == "larga") || (a == "cruzada" && k == "pico" && m == "corta")) {

                    l.push([a + "_abierta_der_solapa_" + k + "_" + m + ".1.png", {

                        zIndex: 3300

                    }])

                } else {

                    l.push([a + "_abierta_der_solapa_" + k + "_" + m + ".png", {

                        zIndex: 3300

                    }])

                }

            }

            l.push([a + "_abierta_solapa_" + k + "." + j + ".png", {

                zIndex: 3300

            }])

        } else {

            l.push([a + "_" + p + "_solapa_" + k + "." + j + ".png", {

                zIndex: 3300

            }]);

            l.push([a + "_cuello_arriba." + j + ".png", {

                zIndex: 3350

            }])

        }

        this.lmanager.layers.jacket_lapels.setImages(l);

        this.lmanager.layers.jacket_lapels.redraw()

    } else {

        this.lmanager.layers.jacket_lapels.removeImages()

    }

    l = [];

    if (this.view == "front" && parseInt(this.config.jacket_pockets)) {

        if (this.jacket_opened) {

            switch (this.config.jacket_pockets_type) {

                case "2":

                case "3":

                    l.push(["bolsillos_con_solapa_abajo_der" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    if (this.config.jacket_pockets_type == "3") {

                        l.push(["bolsillo_con_solapa_arriba" + h + "." + j + ".png", {

                            zIndex: 3600

                        }])

                    }

                    break;

                case "2a":

                case "3a":

                    l.push(["bolsillo_sin_solapa_abajo_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    if (this.config.jacket_pockets_type == "3a") {

                        l.push(["bolsillo_sin_solapa_arriba" + h + "." + j + ".png", {

                            zIndex: 3600

                        }])

                    }

                    break;

                case "2b":

                case "3b":

                    l.push(["bolsillo_enorme_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    if (this.config.jacket_pockets_type == "3b") {

                        l.push(["bolsillo_con_solapa_arriba" + h + "." + j + ".png", {

                            zIndex: 3600

                        }])

                    }

                    break

            }

        } else {

            switch (this.config.jacket_pockets_type) {

                case "2":

                    l.push(["bolsillos_con_solapa_abajo_der" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillos_con_solapa_abajo_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break;

                case "2a":

                    l.push(["bolsillo_sin_solapa_abajo_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_sin_solapa_abajo_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break;

                case "2b":

                    l.push(["bolsillo_enorme_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_enorme_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break;

                case "3":

                    l.push(["bolsillos_con_solapa_abajo_der" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillos_con_solapa_abajo_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_con_solapa_arriba" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break;

                case "3a":

                    l.push(["bolsillo_sin_solapa_abajo_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_sin_solapa_abajo_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_sin_solapa_arriba" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break;

                case "3b":

                    l.push(["bolsillo_enorme_der." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_enorme_izq." + j + ".png", {

                        zIndex: 3600

                    }]);

                    l.push(["bolsillo_con_solapa_arriba" + h + "." + j + ".png", {

                        zIndex: 3600

                    }]);

                    break

            }

        }

        this.lmanager.layers.jacket_pockets.setImages(l);

        this.lmanager.layers.jacket_pockets.redraw()

    } else {

        this.lmanager.layers.jacket_pockets.removeImages()

    }

    l = [];

    if (this.view == "front") {

        if (parseInt(this.config.jacket_sleeve_buttons)) {

            if (this.jacket_opened) {

                if (parseInt(this.config.jacket_sleeve_buttonholes)) {

                    this.lmanager.layers.jacket_shirt_cuff.setImages([

                        ["puno_abierta.png", {

                            zIndex: 5010

                        }]

                    ]);

                    l.push(["brazo_izq_para_chaqueta_abierta_detras.1.png", {

                        zIndex: 1700

                    }]);

                    l.push(["brazo_izq_para_chaqueta_abierta.1.png", {

                        zIndex: 1700

                    }]);

                    if (!this.jacket_cuff_opened) {

                        l.push(["brazo_der_forro_sin_botones." + j + ".png", {

                            zIndex: 2050

                        }])

                    } else {

                        l.push(["brazo_der_forro." + j + ".png", {

                            zIndex: 2050

                        }])

                    }

                } else {

                    this.lmanager.layers.jacket_shirt_cuff.setImages([

                        ["puno2_abierta.png", {

                            zIndex: 5010

                        }]

                    ]);

                    l.push(["brazo_der_forro_sin_botones." + j + ".png", {

                        zIndex: 2050

                    }]);

                    l.push(["brazo_izq_para_chaqueta_abierta_detras.1.png", {

                        zIndex: 1700

                    }]);

                    l.push(["brazo_izq_para_chaqueta_abierta.1.png", {

                        zIndex: 1700

                    }])

                }

                l.push(["brazo_der_exterior." + j + ".png", {

                    zIndex: 2100

                }]);

                this.lmanager.layers.jacket_sleeve_buttonholes.setImages(l)

            } else {

                if (parseInt(this.config.jacket_sleeve_buttonholes)) {

                    if (this.jacket_cuff_opened) {

                        this.lmanager.layers.jacket_shirt_cuff.setImages([

                            ["puno.png", {

                                zIndex: 5010

                            }]

                        ]);

                        l.push(["brazo_der_forro." + j + ".png", {

                            zIndex: 2050

                        }]);

                        l.push(["brazo_izq_abierto_forro." + j + ".png", {

                            zIndex: 3700

                        }]);

                        l.push(["brazo_izq_abierto." + j + ".png", {

                            zIndex: 3750

                        }])

                    } else {

                        this.lmanager.layers.jacket_shirt_cuff.setImages([

                            ["puno2.png", {

                                zIndex: 5010

                            }]

                        ]);

                        l.push(["brazo_der_forro_sin_botones." + j + ".png", {

                            zIndex: 2050

                        }]);

                        l.push(["brazo_izq_sin_botones_forro." + j + ".png", {

                            zIndex: 3700

                        }]);

                        l.push(["brazo_izq_sin_botones." + j + ".png", {

                            zIndex: 3750

                        }])

                    }

                } else {

                    this.lmanager.layers.jacket_shirt_cuff.setImages([

                        ["puno3.png", {

                            zIndex: 5010

                        }]

                    ]);

                    l.push(["brazo_der_forro_sin_botones." + j + ".png", {

                        zIndex: 2050

                    }]);

                    l.push(["brazo_izq_botones_forro." + j + ".png", {

                        zIndex: 3700

                    }]);

                    l.push(["brazo_izq_botones." + j + ".png", {

                        zIndex: 3750

                    }])

                }

                l.push(["brazo_der_exterior." + j + ".png", {

                    zIndex: 2100

                }]);

                this.lmanager.layers.jacket_sleeve_buttonholes.setImages(l)

            }

        } else {

            this.lmanager.layers.jacket_shirt_cuff.setImages([

                ["puno3.png", {

                    zIndex: 5010

                }]

            ]);

            l.push(["brazo_der_exterior." + j + ".png", {

                zIndex: 2100

            }]);

            l.push(["brazo_der_forro_sin_botones." + j + ".png", {

                zIndex: 2050

            }]);

            l.push(["brazo_izq_sin_botones_forro." + j + ".png", {

                zIndex: 3700

            }]);

            l.push(["brazo_izq_sin_botones." + j + ".png", {

                zIndex: 3750

            }]);

            this.lmanager.layers.jacket_sleeve_buttonholes.setImages(l)

        }

        this.lmanager.layers.jacket_sleeve_buttonholes.redraw();

        this.lmanager.layers.jacket_shirt_cuff.redraw()

    } else {

        l.push(["brazo_der_exterior." + j + ".png", {

            zIndex: 2100

        }]);

        l.push(["brazo_izq_sin_botones." + j + ".png", {

            zIndex: 3750

        }]);

        l.push(["brazo_izq_sin_botones_delante." + j + ".png", {

            zIndex: 3750

        }]);

        this.lmanager.layers.jacket_sleeve_buttonholes.setImages(l);

        this.lmanager.layers.jacket_sleeve_buttonholes.redraw();

        this.lmanager.layers.jacket_shirt_cuff.removeImages()

    }

    l = [];

    if (this.view == "front") {

        if (this.config.jacket_style == "mao") {

            /*l.push(["#jacket_button_code#_mao_cuerpo_" + this.config.jacket_buttons + ((this.config.jacket_style == "mao") ? "_abierta" : "") + ".png", {

                zIndex: 3900

            }])*/

        } else {

            l.push(["#jacket_button_code#_" + this.config.jacket_style + "_cuerpo_" + d + "_" + this.config.jacket_buttons + ((this.jacket_opened) ? "_abierta" : "") + ".png", {

                zIndex: 3900

            }])

        }

        if (parseInt(this.config.jacket_sleeve_buttons) && !this.jacket_opened) {

            l.push(["#jacket_button_code#_puno_" + this.config.jacket_sleeve_buttons + "_" + (this.jacket_cuff_opened ? this.config.jacket_sleeve_buttonholes : "0") + ".png", {

                zIndex: 3900

            }])

        }

        this.lmanager.layers.jacket_buttons.setImages(l);

        this.lmanager.layers.jacket_buttons.redraw()

    } else {

        this.lmanager.layers.jacket_buttons.removeImages()

    }

    if (parseInt(this.config.patches) && this.view == "back") {

        this.lmanager.layers.jacket_patches.setImages([

            [this.config.patches + ".png", {

                zIndex: 3751

            }]

        ]);

        this.lmanager.layers.jacket_patches.redraw()

    } else {

        this.lmanager.layers.jacket_patches.removeImages()

    }

    if (parseInt(this.config.handkerchief) && this.view == "front" && !this.jacket_opened) {

        this.lmanager.layers.jacket_handkerchief.setImages([

            [this.config.handkerchief + ".png", {

                zIndex: 3100

            }]

        ]);

        this.lmanager.layers.jacket_handkerchief.redraw()

    } else {

        this.lmanager.layers.jacket_handkerchief.removeImages()

    }



    function r(t, s) {

        if (parseInt(t)) {

            return t

        }

        if (parseInt(s)) {

            return s

        }

        return 0

    }

    var f = r(this.config["button_holes_threads_jacket[buttonholes_color]"], this.config["button_holes_threads[buttonholes_color]"]);

    var e = r(this.config["button_holes_threads_jacket[buttonthreads_color]"], this.config["button_holes_threads[buttonthreads_color]"]);

    var b = (this.config["button_holes_threads_jacket[apply_at]"] != "") ? this.config["button_holes_threads_jacket[apply_at]"] : this.config["button_holes_threads[apply_at]"];

    if (f) {

        l = [];

        if (this.jacket_opened == false) {

            if (this.view == "front") {

                if (b == "cuff") {

                    if (this.config.jacket_sleeve_buttons > 0) {

                        if (!this.jacket_cuff_opened || (this.jacket_cuff_opened && this.config.jacket_sleeve_buttonholes == 0)) {

                            l.push([f + "_puno_" + this.config.jacket_sleeve_buttons + "_0_ojal.png", {

                                zIndex: 5020

                            }])

                        } else {}

                    }

                } else {

                    if (b == "lapel" && this.config.jacket_style != "mao") {

                        l.push([f + "_" + a + "_" + p + "_solapa_" + k + ".1.png", {

                            zIndex: 5020

                        }])

                    } else {

                        if (this.config.jacket_style != "mao") {

                            l.push([f + "_" + a + "_" + p + "_solapa_" + k + ".1.png", {

                                zIndex: 5020

                            }])

                        }

                        if (!this.jacket_cuff_opened || (this.jacket_cuff_opened && this.config.jacket_sleeve_buttonholes == 0)) {

                            if (this.config.jacket_sleeve_buttons != 0) {

                                l.push([f + "_puno_" + this.config.jacket_sleeve_buttons + "_0_ojal.png", {

                                    zIndex: 5020

                                }])

                            }

                        } else {}

                        if (this.config.jacket_style != "mao") {

                            l.push([f + "_" + this.config.jacket_style + "_cuerpo_" + d + "_" + this.config.jacket_buttons + "_ojal.png", {

                                zIndex: 5020

                            }])

                        } else {

                            l.push([f + "_mao_cuerpo_5_ojal.png", {

                                zIndex: 5020

                            }])

                        }

                    }

                }

            }

            this.lmanager.layers.jacket_button_holes.setImages(l)

        } else {

            this.lmanager.layers.jacket_button_holes.removeImages(l)

        }

        this.lmanager.layers.jacket_button_holes.redraw()

    } else {

        this.lmanager.layers.jacket_button_holes.removeImages()

    }

    if (e) {

        l = [];

        if (this.jacket_opened == false) {

            if (this.view == "front") {

                if (b == "all" || b == "cuff") {

                    if (!this.jacket_cuff_opened) {

                        if (this.config.jacket_sleeve_buttons != 0) {

                            l.push([e + "_puno_" + this.config.jacket_sleeve_buttons + "_0_hilo.png", {

                                zIndex: 5020

                            }])

                        }

                    }

                }

                if (b == "all") {

                    if (this.config.jacket_style != "mao") {

                        l.push([e + "_" + this.config.jacket_style + "_cuerpo_" + d + "_" + this.config.jacket_buttons + "_hilo.png", {

                            zIndex: 5020

                        }])

                    } else {

                        l.push([e + "_mao_cuerpo_5_hilo.png", {

                            zIndex: 5020

                        }])

                    }

                }

            }

            this.lmanager.layers.jacket_button_thread.setImages(l)

        } else {

            if (this.view == "front") {

                if (b == "all") {

                    if (this.config.jacket_style != "mao") {

                        l.push([e + "_" + this.config.jacket_style + "_cuerpo_" + d + "_" + this.config.jacket_buttons + "_hilo.png", {

                            zIndex: 5020

                        }])

                    } else {

                        l.push([e + "_mao_cuerpo_5_hilo.png", {

                            zIndex: 5020

                        }])

                    }

                }

            }

            this.lmanager.layers.jacket_button_thread.setImages(l)

        }

        this.lmanager.layers.jacket_button_thread.redraw()

    } else {

        this.lmanager.layers.jacket_button_thread.removeImages()

    }

    this.jacket_opened = false;

    this.jacket_show_neck_lining = false

};

Man_Suit_3D.prototype.redrawWaistcoat = function() {

    var c = (this.config.waistcoat_lapels == "standard") ? "standar" : this.config.waistcoat_lapels;

    var e = (this.config.waistcoat_style == "simple") ? "clasico" : "cruzado";

    var d = (this.view == "front") ? 1 : 2;

    var h = [];

    if (this.view == "front") {

        h.push(["Front_debajo.png", {

            zIndex: 1001

        }])

    }

    switch (this.product_type) {

        case "man_waistcoat":

            if (this.view == "front") {

                h.push(["Front_encima.png", {

                    zIndex: 2000

                }])

            } else {

                h.push(["Back.png", {

                    zIndex: 1001

                }])

            }

            break;

        case "man_suit":

            if (this.view == "front") {

                if (!this.jacket_opened && !this.show_jacket) {

                    h.push(["Front_encima_suit3.png", {

                        zIndex: 2000

                    }])

                }

                h.push(["sombra_chaleco_sobre_pantalon.png", {

                    zIndex: 1002

                }]);

                if (this.config.suit_type == "man_suit3") {

                    h.push(["parche_chaleco.png", {

                        zIndex: 2001

                    }])

                }

            } else {

                h.push(["Back_suit3.png", {

                    zIndex: 1001

                }]);

                h.push(["sombra_chaleco_sobre_pantalon.2.png", {

                    zIndex: 1002

                }])

            }

    }

    this.lmanager.layers.waistcoat_shirt.setImages(h);

    this.lmanager.layers.waistcoat_shirt.redraw();

    if (this.view == "front") {

        this.lmanager.layers.waistcoat_style.setImages([

            [e + "_" + this.config.waistcoat_buttons + "_bot." + d + ".png", {

                zIndex: 1100

            }]

        ])

    } else {

        this.lmanager.layers.waistcoat_style.setImages([

            ["front_2.png", {

                zIndex: 2000

            }]

        ])

    }

    this.lmanager.layers.waistcoat_style.redraw();

    if (this.view == "back") {

        if (this.config.lining_back_radio == "front") {

            this.lmanager.layers.waistcoat_fabric_back.setImages([

                ["espalda.2.png", {

                    zIndex: 2000

                }]

            ]);

            this.lmanager.layers.waistcoat_fabric_back.redraw();

            this.lmanager.layers.waistcoat_lining_back.removeImages()

        } else {

            this.lmanager.layers.waistcoat_lining_back.setImages([

                ["espalda.2.png", {

                    zIndex: 2000

                }]

            ]);

            this.lmanager.layers.waistcoat_lining_back.redraw();

            this.lmanager.layers.waistcoat_fabric_back.removeImages()

        }

    } else {

        this.lmanager.layers.waistcoat_lining_back.removeImages();

        this.lmanager.layers.waistcoat_fabric_back.removeImages()

    }

    if (this.view == "front") {

        this.lmanager.layers.waistcoat_body.setImages([

            [e + "_" + this.config.waistcoat_buttons + "_bot." + d + ".png", {

                zIndex: 1300

            }]

        ]);

        this.lmanager.layers.waistcoat_body.redraw()

    } else {

        this.lmanager.layers.waistcoat_body.removeImages()

    }

    if (this.view == "front" && this.config.waistcoat_lapels_radio == 1) {

        this.lmanager.layers.waistcoat_lapels.setImages([

            ["solapa_" + e + "_" + this.config.waistcoat_buttons + "_" + c + ".png", {

                zIndex: 1425

            }]

        ]);

        this.lmanager.layers.waistcoat_lapels.redraw()

    } else {

        this.lmanager.layers.waistcoat_lapels.removeImages()

    }

    if (this.view == "front") {

        switch (this.config.waistcoat_bottom) {

            case "straight":

                this.lmanager.layers.waistcoat_bottom.setImages([

                    [e + "_recto." + d + ".png", {

                        zIndex: 1200

                    }]

                ]);

                break;

            case "rounded":

                this.lmanager.layers.waistcoat_bottom.setImages([

                    [e + "_redondeado." + d + ".png", {

                        zIndex: 1200

                    }]

                ]);

                break;

            case "cut":

            default:

                this.lmanager.layers.waistcoat_bottom.setImages([

                    [e + "_diagonal." + d + ".png", {

                        zIndex: 1200

                    }]

                ]);

                break

        }

        this.lmanager.layers.waistcoat_bottom.redraw()

    } else {

        this.lmanager.layers.waistcoat_bottom.removeImages()

    }

    if (this.view == "front" && this.config.waistcoat_chest_pocket == 1) {

        this.lmanager.layers.waistcoat_chest_pocket.setImages([

            ["bolsillo_arriba." + d + ".png", {

                zIndex: 1350

            }]

        ]);

        this.lmanager.layers.waistcoat_chest_pocket.redraw()

    } else {

        this.lmanager.layers.waistcoat_chest_pocket.removeImages()

    }

    if (this.view == "front" && this.config.waistcoat_pockets_num != 0) {

        var g = [];

        switch (this.config.waistcoat_pockets) {

            case "3":

                g.push(["bolsillo_grande_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                g.push(["bolsillo_peque_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                break;

            case "3a":

                g.push(["bolsillo_grande_sin_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                g.push(["bolsillo_peque_sin_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                break;

            case "3b":

                g.push(["bolsillo_grande_con_solapa_grande." + d + ".png", {

                    zIndex: 1400

                }]);

                g.push(["bolsillo_peque_con_solapa_grande." + d + ".png", {

                    zIndex: 1400

                }]);

                break;

            case "2a":

                g.push(["bolsillo_grande_sin_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                break;

            case "2b":

                g.push(["bolsillo_grande_con_solapa_grande." + d + ".png", {

                    zIndex: 1400

                }]);

                break;

            case "2":

            default:

                g.push(["bolsillo_grande_solapa." + d + ".png", {

                    zIndex: 1400

                }]);

                break

        }

        this.lmanager.layers.waistcoat_pockets.setImages(g);

        this.lmanager.layers.waistcoat_pockets.redraw()

    } else {

        this.lmanager.layers.waistcoat_pockets.removeImages()

    }

    if (this.view == "front") {

        this.lmanager.layers.waistcoat_buttons.setImages([

            ["#waistcoat_button_code#_" + this.config.waistcoat_style + "_" + this.config.waistcoat_buttons + ".png", {

                zIndex: 1500

            }]

        ]);

        this.lmanager.layers.waistcoat_buttons.redraw()

    } else {

        this.lmanager.layers.waistcoat_buttons.removeImages()

    }



    function b(j, i) {

        if (parseInt(j)) {

            return j

        }

        if (parseInt(i)) {

            return i

        }

        return 0

    }

    var f = b(this.config["button_holes_threads_waistcoat[buttonholes_color]"], this.config["button_holes_threads[buttonholes_color]"]);

    var a = b(this.config["button_holes_threads_waistcoat[buttonthreads_color]"], this.config["button_holes_threads[buttonthreads_color]"]);

    if (this.view == "front" && f) {

        this.lmanager.layers.waistcoat_button_holes.setImages([

            [f + "_" + this.config.waistcoat_style + "_" + this.config.waistcoat_buttons + "_ojal.png", {

                zIndex: 1450

            }]

        ]);

        this.lmanager.layers.waistcoat_button_holes.redraw()

    } else {

        this.lmanager.layers.waistcoat_button_holes.removeImages()

    }

    if (this.view == "front" && a) {

        this.lmanager.layers.waistcoat_button_thread.setImages([

            [a + "_" + this.config.waistcoat_style + "_" + this.config.waistcoat_buttons + "_hilo.png", {

                zIndex: 1550

            }]

        ]);

        this.lmanager.layers.waistcoat_button_thread.redraw()

    } else {

        this.lmanager.layers.waistcoat_button_thread.removeImages()

    }

};

Man_Suit_3D.prototype.redrawPants = function() {

    var a = (this.view == "front") ? 1 : 2;

    switch (this.product_type) {

        case "man_pants":

            this.lmanager.layers.pants_shirt.setImages([

                [a + ".png", {

                    zIndex: 100

                }]

            ]);

            break;

        case "man_suit":

            if (!this.show_jacket) {

                if (this.config.suit_type == "man_suit3") {

                    this.lmanager.layers.pants_shirt.setImages([

                        [(a == 1) ? "parche_pantSuit.png" : "parche_pantSuit_back.png", {

                            zIndex: 1010

                        }]

                    ])

                } else {

                    this.lmanager.layers.pants_shirt.setImages([

                        [a + "big.png", {

                            zIndex: 100

                        }]

                    ])

                }

            } else {

                if (a == 1 && this.show_jacket && this.config.suit_type == "man_suit2") {

                    this.lmanager.layers.pants_shirt.removeImages()

                }

            }

            break;

        default:

            this.lmanager.layers.pants_shirt.removeImages()

    }

    this.lmanager.layers.pants_shirt.redraw();

    this.lmanager.layers.pants_shoes.setImages([

        ["shoes_#shoes_color#_" + a + ".png", {

            zIndex: 100

        }]

    ]);

    this.lmanager.layers.pants_shoes.redraw();

    imgs = [];

    var b = this.id_tie;

    if (this.view == "front") {

        if (!this.show_jacket) {

            if (b) {

                imgs.push([b + ".png", {

                    zIndex: 1002

                }])

            }

        }

    }

    this.lmanager.layers.pants_tie.setImages(imgs);

    this.lmanager.layers.pants_tie.redraw();

    switch (this.config.pants_fit) {

        case "normal":

            this.lmanager.layers.pants_fit.setImages([

                ["sin_pliegues." + a + ".png", {

                    zIndex: 200

                }]

            ]);

            break;

        case "fit":

            this.lmanager.layers.pants_fit.setImages([

                ["pantalon_deportivo." + a + ".png", {

                    zIndex: 200

                }]

            ]);

            break

    }

    this.lmanager.layers.pants_fit.redraw();

    if (this.view == "front") {

        switch (parseInt(this.config.pants_peg)) {

            case 1:

                this.lmanager.layers.pants_peg.setImages([

                    ["primer_pliegue.1.png", {

                        zIndex: 300

                    }]

                ]);

                break;

            case 2:

                this.lmanager.layers.pants_peg.setImages([

                    ["segundo_pliegue1.1.png", {

                        zIndex: 300

                    }]

                ]);

                break;

            default:

                this.lmanager.layers.pants_peg.removeImages()

        }

        this.lmanager.layers.pants_peg.redraw()

    } else {

        this.lmanager.layers.pants_peg.removeImages()

    }

    if (this.view == "front") {

        if (this.config.pants_belt == 1) {

            this.lmanager.layers.pants_belt.setImages([

                ["cinturon_flecha." + a + ".png", {

                    zIndex: 400

                }]

            ])

        } else {

            this.lmanager.layers.pants_belt.setImages([

                ["cinturon_cuadrado." + a + ".png", {

                    zIndex: 400

                }]

            ])

        }

    } else {

        this.lmanager.layers.pants_belt.setImages([

            ["cinturon_cuadrado." + a + ".png", {

                zIndex: 400

            }]

        ])

    }

    this.lmanager.layers.pants_belt.redraw();

    if (this.config.pants_cuff == 1) {

        if (this.config.pants_fit == "normal") {

            this.lmanager.layers.pants_cuff.setImages([

                ["doblado_clasico." + a + ".png", {

                    zIndex: 500

                }]

            ])

        }

        if (this.config.pants_fit == "fit") {

            this.lmanager.layers.pants_cuff.setImages([

                ["doblado_deportivo." + a + ".png", {

                    zIndex: 500

                }]

            ])

        }

    } else {

        this.lmanager.layers.pants_cuff.removeImages()

    }

    this.lmanager.layers.pants_cuff.redraw();

    if (typeof(this.config.pants_ribbon) != "undefined") {

        if (this.config.pants_ribbon == 1) {

            if (this.config.pants_fit == "normal") {

                this.lmanager.layers.pants_ribbon.setImages([

                    ["franja_clasico." + a + ".png", {

                        zIndex: 600

                    }]

                ])

            }

            if (this.config.pants_fit == "fit") {

                this.lmanager.layers.pants_ribbon.setImages([

                    ["franja_deportivo." + a + ".png", {

                        zIndex: 600

                    }]

                ])

            }

        } else {

            this.lmanager.layers.pants_ribbon.removeImages()

        }

        this.lmanager.layers.pants_ribbon.redraw()

    }

    switch (this.config.pants_front_pocket) {

        case "diagonal":

            this.lmanager.layers.pants_front_pocket.setImages([

                ["bolsillo_diagonal." + a + ".png", {

                    zIndex: 700

                }]

            ]);

            break;

        case "vertical":

            this.lmanager.layers.pants_front_pocket.setImages([

                ["bolsillo_recto." + a + ".png", {

                    zIndex: 700

                }]

            ]);

            break;

        case "rounded":

            this.lmanager.layers.pants_front_pocket.setImages([

                ["bolsillo_redondeado." + a + ".png", {

                    zIndex: 700

                }]

            ]);

            break

    }

    this.lmanager.layers.pants_front_pocket.redraw();

    if (this.view == "back") {

        switch (this.config.pants_back_pocket + this.config.pants_back_pocket_type) {

            case "1A":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_der_traseros_sin_tapa." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            case "1B":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_der_traseros_grandes." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            case "1C":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_der_traseros_tapa." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            case "2A":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_traseros_sin_tapa." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            case "2B":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_traseros_grandes." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            case "2C":

                this.lmanager.layers.pants_back_pocket.setImages([

                    ["bol_traseros_tapa." + a + ".png", {

                        zIndex: 800

                    }]

                ]);

                break;

            default:

                this.lmanager.layers.pants_back_pocket.removeImages()

        }

        this.lmanager.layers.pants_back_pocket.redraw()

    } else {

        this.lmanager.layers.pants_back_pocket.removeImages()

    }

    this.lmanager.layers.pants_buttons.removeImages();

    if (this.view == "front") {

        if (this.config.pants_belt == 0) {

            this.lmanager.layers.pants_buttons.setImages([

                ["#pants_button_code#.1.png", {

                    zIndex: 900

                }]

            ])

        } else {

            this.lmanager.layers.pants_buttons.setImages([

                ["#pants_button_code#.1_b.png", {

                    zIndex: 900

                }]

            ])

        }

    } else {

        if (this.config.pants_back_pocket == 1 && this.config.pants_back_pocket_type == "A") {

            this.lmanager.layers.pants_buttons.setImages([

                ["#pants_button_code#_simple.2.png", {

                    zIndex: 900

                }]

            ])

        }

        if (this.config.pants_back_pocket == 2 && this.config.pants_back_pocket_type == "A") {

            this.lmanager.layers.pants_buttons.setImages([

                ["#pants_button_code#_doble.2.png", {

                    zIndex: 900

                }]

            ])

        }

    }

    this.lmanager.layers.pants_buttons.redraw()

};

Man_Suit_3D.prototype.updateLayersVisibility = function() {

    if (this.product_type != "man_suit") {

        return false

    }

    for (var a in this.lmanager.layers) {

        if (a.indexOf("jacket") == 0) {

            if (this.show_jacket) {

                this.lmanager.showLayer(a)

            } else {

                this.lmanager.hideLayer(a)

            }

        } else {

            if (a.indexOf("waistcoat") == 0) {

                if (this.show_waistcoat) {

                    this.lmanager.showLayer(a)

                } else {

                    this.lmanager.hideLayer(a)

                }

            } else {

                if (a.indexOf("pants") == 0) {

                    if (this.show_pants) {

                        this.lmanager.showLayer(a)

                    } else {

                        this.lmanager.hideLayer(a)

                    }

                }

            }

        }

    }

};

Man_Suit_3D.prototype.initLayerManager = function() {

    if (typeof(LManager) == "undefined") {

        alert("LManager library not loaded")

    }

    this.lmanager = new LManager(this.container);

    if (this.product_type == "man_suit" || this.product_type == "man_jacket") {

        var a = this.getBaseSRC("jacket");

        this.lmanager.addLayer("jacket_shirt", {

            base_src: a + "shirt/"

        });

        this.lmanager.addLayer("jacket_tie", {

            base_src: a + "tie/"

        });

        this.lmanager.addLayer("jacket_shirt_cuff", {

            base_src: a + "shirt/"

        });

        this.lmanager.addLayer("jacket_corpus", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_sides", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_vent", {

            base_src: a + "#fabric_jacket#_fabric/#view#/",

            position: "back"

        });

        this.lmanager.addLayer("jacket_chest_pocket", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_lapels", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_pockets", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_sleeve_buttonholes", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_patches", {

            base_src: a + "patches/",

            position: "back"

        });

        this.lmanager.addLayer("jacket_handkerchief", {

            base_src: a + "handkerchief/"

        });

        this.lmanager.addLayer("jacket_neck_lining", {

            base_src: a + "neck_lining/",

            position: "back"

        });

        this.lmanager.addLayer("jacket_lining", {

            base_src: a + "lining_#fabric_jacket_lining#/"

        });

        this.lmanager.addLayer("jacket_unlining", {

            base_src: a + "#fabric_jacket#_fabric/#view#/"

        });

        this.lmanager.addLayer("jacket_buttons", {

            base_src: a + "botones/"

        });

        this.lmanager.addLayer("jacket_button_holes", {

            base_src: a + "hilos_ojales/"

        });

        this.lmanager.addLayer("jacket_button_thread", {

            base_src: a + "hilos_ojales/"

        });

        this.lmanager.addLayer("jacket_metal_buttons", {

            base_src: a + "metal_buttons/"

        })

    }

    if (this.product_type == "man_suit" || this.product_type == "man_pants") {

        var b = this.getBaseSRC("pants");

        var a = this.getBaseSRC("jacket");

        this.lmanager.addLayer("pants_shirt", {

            base_src: b + "shirt/"

        });

        this.lmanager.addLayer("pants_tie", {

            base_src: a + "tie/"

        });

        this.lmanager.addLayer("pants_shoes", {

            base_src: b + "shoes/"

        });

        this.lmanager.addLayer("pants_buttons", {

            base_src: b + "botones/"

        });

        this.lmanager.addLayer("pants_fit", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        });

        this.lmanager.addLayer("pants_peg", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        });

        this.lmanager.addLayer("pants_belt", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        });

        this.lmanager.addLayer("pants_front_pocket", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        });

        this.lmanager.addLayer("pants_back_pocket", {

            base_src: b + "#fabric_pants#_fabric/#view#/",

            position: "back"

        });

        this.lmanager.addLayer("pants_cuff", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        });

        this.lmanager.addLayer("pants_ribbon", {

            base_src: b + "#fabric_pants#_fabric/#view#/"

        })

    }

    if (this.product_type == "man_suit" || this.product_type == "man_waistcoat") {

        var c = this.getBaseSRC("waistcoat");

        this.lmanager.addLayer("waistcoat_shirt", {

            base_src: c + "shirt/"

        });

        this.lmanager.addLayer("waistcoat_buttons", {

            base_src: c + "botones/"

        });

        this.lmanager.addLayer("waistcoat_button_holes", {

            base_src: c + "botones/"

        });

        this.lmanager.addLayer("waistcoat_button_thread", {

            base_src: c + "botones/"

        });

        this.lmanager.addLayer("waistcoat_style", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_lapels", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_body", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_bottom", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_chest_pocket", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_pockets", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/"

        });

        this.lmanager.addLayer("waistcoat_fabric_back", {

            base_src: c + "#fabric_waistcoat#_fabric/#view#/",

            position: "back"

        });

        this.lmanager.addLayer("waistcoat_lining_back", {

            base_src: c + "lining_#fabric_waistcoat_lining_back#/",

            position: "back"

        })

    }

};

Man_Suit_3D.prototype.getBaseSRC = function(a) {

    return window.cdn_host + "3d/man/" + a + "/"

};