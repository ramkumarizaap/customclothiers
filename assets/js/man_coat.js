var Man_Coat = {
    id_t4l_fabric: null,
    default_id_t4l_lining: null,
    current_id_t4l_lining: null,
    render: null,
    options_container: null,
    options: null,
    model_position: "front",
    filter_form: null,
    container_fabrics: null,
    button_code: null,
    ribbon_color: null,
    zipper_color: null,
    bLazy: false,
    url:"https://customclothiers.com/",
    initCommon: function(b, a, d, c, e, f) {

     window.coat_price.fabric =  window.coat_price.fabric;

     window.coat_price.base = window.coat_price.base;

     var o = $("div.controls").find("a.zoom");


     
     Man_Coat.updatePrice();

        if (window.mobile_enabled) {
            $(window).bind("pageshow", function(g) {
                if (g.originalEvent.persisted) {
                    window.location.reload();
                    return
                }
            })
        }
        Man_Coat.id_t4l_fabric = b;
        Man_Coat.options_container = (typeof(a) == "string") ? $(a) : a;
        Man_Coat.button_code = (typeof(c) != "undefined") ? c : 1;
        Man_Coat.zipper_color = (typeof(e) != "undefined") ? e : 1;
        Man_Coat.ribbon_color = (typeof(f) != "undefined") ? f : 1;


        Man_Coat.render = new Man_Coat_3D(d, {
            product_type: "man_coat",
            fabric: {
                coat: Man_Coat.id_t4l_fabric
            },
            button_code: Man_Coat.button_code,
            zipper_color: Man_Coat.zipper_color,
            ribbon_color: Man_Coat.ribbon_color
        });
        if (!window.mobile_enabled) {
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 191) {
                    $("#move").addClass("fixit");
                    $("#box_mini_next_3d").addClass("fixit")
                } else {
                    $("#move").removeClass("fixit");
                    $("#box_mini_next_3d").removeClass("fixit")
                }
            })
        }
        Man_Coat.filter_form = $("#filters");
        $("#change_position").click(function() {
            Man_Coat.setModel_position((Man_Coat.model_position == "front") ? "back" : "front")
        });
        if (typeof(Blazy) != "undefined") {
            Man_Coat.bLazy = new Blazy({
                success: function(g) {
                    g.parentNode.className = g.parentNode.className.replace(/\loading\b/, "")
                }
            })
        }

        function cinout(u) {

            switch (u) {

                case "in":

                    $("#model_3d_preview").css('width','280px');

                    o.hide().filter(".out").show();
                    break;

                case "out":

                    $("#model_3d_preview").css('width','180px');
                    o.hide().filter(".in").show();

                    break

            }
      }

       o.click(function() {


            if ($(this).hasClass("in")) {

                cinout("in")

            } else {

                cinout("out")

            }

            return false

        });

        cinout("in");


    },
    initConfigure: function() {
        if (window.mobile_enabled) {
            var b = false;

            function c() {
                if (b) {
                    b.hide();
                    b = false
                }
            }
            $(".options a").click(function() {
                var f = this.getAttribute("href").replace("/^[^#]/", "");
                var g = f.replace("#", "");
                History.pushState({
                    option: g,
                    rel: f
                }, window.title, "?option=" + g);
                return false
            });

            function e() {
                c();
                var f = History.getState();
                if (typeof(f.data.rel) != "undefined") {
                    b = $(f.data.rel).show();
                    if (!b.hasClass("manual_close")) {
                        b.addClass("manual_close").click(function() {
                            History.back()
                        })
                    }
                }
            }
            History.Adapter.bind(window, "statechange", e);
            e()
        } else {
            $("input.uniform, select.uniform").uniform()
        }
        $("#configure-form1 a.next").click(function() {
        	$("#go_to").attr('value','fabric');
        	Man_Coat.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
        	$("#go_to").attr("value", "fabric");
        	 Man_Coat.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_extras").click(function() {
            $("#go_to").attr("value", "extras");
            Man_Coat.updatePrice();
            $("#configure_form").submit();
            return false
        });
        Man_Coat.initInteractiveOptions(Man_Coat.options_container);
        Man_Coat.render.setCoatButtonCode(Man_Coat.button_code);
        Man_Coat.updateNeck();
        $("#options_coat_neck div.option_trigger").click(function() {
            Man_Coat.updateNeck()
        });
        $("#options_coat_style input").click(function() {
            Man_Coat.updateNeck()
        });
        Man_Coat.updatePocketOptions(true);
        $("#div_coat_pockets_num input.coat_pockets_num").click(function() {
            Man_Coat.updatePocketOptions()
        });
        Man_Coat.updateClosure();
        $("#options_coat_closure input.coat_closure").click(function() {
            Man_Coat.updateClosure()
        });
        if (!window.mobile_enabled) {
            Man_Coat.updateBelt();
            $("#options_coat_closure input").click(function() {
                Man_Coat.updateBelt()
            })
        }
        $("#coat_style_crossed").click(function() {
            $("#coat_neck_flap").click()
        });
        $("#coat_style_simple").click(function() {
            var f = $("#hidden_coat_neck").val();
            if (f == "flap") {
                $("#coat_neck_flap_wide").click()
            }
        });
        Man_Coat.specialCases();
        if (window.mobile_enabled) {
            $("#options_coat_neck div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_style div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_neck_flap div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_chest_pocket div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_belt div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_closure div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_pockets_type div.option_trigger").click(function() {
                Man_Coat.specialCases()
            })
        } else {
            $("#options_coat_neck div.option_trigger").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_style input").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_neck_flap input").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_chest_pocket input").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_belt input").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_chest_pocket input").click(function() {
                Man_Coat.specialCases()
            });
            $("#options_coat_closure input").click(function() {
                Man_Coat.specialCases()
            })
        }
        if (window.mobile_enabled) {
            var a = $(".options_list").find("a");
            $(".option_trigger").bind("select", function() {
                a.filter("." + this.parentNode.parentNode.id).text($(".coat-icon", this).text())
            })
        }

        function d() {
            var g = $(this).attr("layer");
            var f = Man_Coat.render.lmanager.layers[g].position;
            if (f != Man_Coat.model_position) {
                Man_Coat.setModel_position(f)
            }
            Man_Coat.redraw(true)
        }
        $("input.radio_opt , div.common_th", Man_Coat.options_container).click(d);
        $("select", Man_Coat.options_container).change(d);
        Man_Coat.redraw(true);
        $("#loading_fabric").hide()
    },
    initFabrics: function(w, c, o,def1) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

       
        
        $fab_id =  $("input[name='fabric_id']").val();
        $("input[name='fabric_id']").val($fab_id); 

        $title1 = $('a.select:first').attr("title");

         if($title1.trim()=='In-Store Fabric Selection')
            $(".instore_fab").show();

        

        $('a.select').on('click',function(event){


            event.preventDefault();

            $("input[name='custom_fabric_name']").val('');


            $fabric_id = $(this).attr('rel');

          if($(this).parents().find(".suit_fabric_"+$fabric_id+"").hasClass("selected"))
            {
                $(this).attr("data-toggle","modal");
                $(this).attr("data-target","#"+$fabric_id);
                $(".fabs").attr("id",$fabric_id);
                $(".view_fabric").attr("data-target","#"+$fabric_id);
            }
          else
           {

            $fabric_id1 = $('a.select:first').attr('rel');
            $title = $(this).nextAll().find('.title').text();
            $composition = $(this).nextAll().find('.composition').text();
            $fab_composition = $('.fab_composition');
            $fab_name = $('.fab_name');
            $fab_img = $('.fab_img');
            $fab_price = $(this).nextAll().find('.price').text();
            $fab_id_inp = $("input[name='fabric_id']").val($fabric_id);

            if($title.trim()=='In-Store Fabric Selection')
            {
                $(".instore_fab").show();
            }
            else
            {
                $(".instore_fab").hide();
                $("input[name='instore_fabric']").val('');
            }

            $(".suit_fabric").removeClass("selected").filter(".suit_fabric_" + $fabric_id).addClass("selected");
            $fab_name.html('<b>'+ $title + '</b>');
            $fab_composition.text($composition);
            $fab_img.removeAttr('style');
            //$fab_img.attr('style','background:url('+Man_Coat.url+'assets/dimg/fabric/'+$fabric_id+'_big.jpg)');
            $(".fabimgs").attr('src',""+Man_Coat.url+'assets/dimg/fabric/'+$fabric_id+'_normal.jpg');
            window.coat_price.fabric = window.fabric_prices[$fabric_id];
            Man_Coat.updatePrice();
        }
        });

        var r = $("#fabric_preview_layer");
        var l = 0;
        //Man_Coat.updateNumButtons();
        Man_Coat.redraw(true);
        Man_Coat.suit_type = w;
        Man_Coat.updatePrice();
        var m = false;
        var a = "";
        if ($("#box_fabric_waistcoat input").is(":checked")) {
            m = true;
            a = "default_fabric"
        }
        $("#fabric_form1 a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            /*if (Man_Coat.suit_type == "Man_Coat3") {
                if ($("#box_fabric_waistcoat input").is(":checked")) {
                    if (Man_Coat.id_t4l_fabric.waistcoat == c && Man_Coat.id_t4l_fabric.default_fabric != c) {
                        $("#box_tab_suit_view a.waistcoat").click();
                        $.magnificPopup.open({
                            items: {
                                src: region_url + "man/suit/alert_fabric",
                                type: "ajax"
                            }
                        });
                        return false
                    }
                }
            }*/
            $instore_fab = $("input[name='instore_fabric']").val();
            $fab_title = $(".fabric_thumb.selected").find(".title").text();

            if($instore_fab!='' && $fab_title.trim()=='In-Store Fabric Selection' || $instore_fab=='' && $fab_title.trim()!='In-Store Fabric Selection')
            {
              $("#go_to").attr('value','extras');
              Man_Coat.updatePrice();
              $("#fabric_form").submit();
              return false
            }
            else
            {
                alert("Please Enter In Store Fabric Name");
            }
        });
        $("a.back").click(function() {
            if (window.mobile_enabled) {
                $("body, html").css("overflow", "visible");
                History.back();
                $("body").scrollTop(l)
            } else {
                $("#go_to").attr("value", "configure");
                Man_Coat.updatePrice();
                $("#fabric_form").submit()
            }
            return false
        });
        $("#link_configure").click(function() {
            $instore_fab = $("input[name='instore_fabric']").val();
            $fab_title = $(".fabric_thumb.selected").find(".title").text();

            if($instore_fab!='' && $fab_title.trim()=='In-Store Fabric Selection' || $instore_fab=='' && $fab_title.trim()!='In-Store Fabric Selection')
            {
              $("#go_to").attr("value", "configure");
                Man_Coat.updatePrice();
                $("#fabric_form").submit();
                return false
            }
            else
            {
                alert("Please Enter In Store Fabric Name");
            }
            
        });
        $("#link_extras").click(function() {
            $instore_fab = $("input[name='instore_fabric']").val();
            $fab_title = $(".fabric_thumb.selected").find(".title").text();

             if($instore_fab!='' && $fab_title.trim()=='In-Store Fabric Selection' || $instore_fab=='' && $fab_title.trim()!='In-Store Fabric Selection')
            {
              $("#go_to").attr("value", "extras");
                Man_Coat.updatePrice();
                $("#fabric_form").submit();
                return false
            }
            else
            {
                alert("Please Enter In Store Fabric Name");
            }

            
        });
        if (!window.mobile_enabled) {
            initQTip($("div#filters table.btn_filter a.filter").not(".first, .other"))
        }
        Man_Coat.container_fabrics = $("#slider_fabrics");
        Man_Coat.filter_form = $("#filters");

        function t(G) {
            Man_Coat.current_t4l_fabric = G;
            var J = Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric];
            $("#slider_fabrics div.suit_fabric").removeClass("selected").find("img.selected").css("display", "none");
            $("#suit_fabric_" + J).addClass("selected").find("img.selected").show();
            if (Man_Coat.current_t4l_fabric == "waistcoat") {
                if (Man_Coat.suit_type == "Man_Coat2") {
                    Man_Coat.showCloths("parcial_suit2")
                } else {
                    if (Man_Coat.suit_type == "Man_Coat3") {
                        Man_Coat.showCloths("parcial_suit3")
                    }
                }
                $("#slider_fabrics td.season").hide()
            } else {
                if (Man_Coat.suit_type == "Man_Coat2") {
                    Man_Coat.showCloths("full_suit2")
                } else {
                    if (Man_Coat.suit_type == "Man_Coat3") {
                        Man_Coat.showCloths("full_suit3")
                    }
                }
                $("#slider_fabrics td.season").show()
            }
            if (G == "waistcoat" && $("#box_fabric_waistcoat .checker span").hasClass("checked") == false) {
                Man_Coat.id_t4l_fabric.default_fabric = J;
                Man_Coat.id_t4l_fabric.waistcoat = J;
                id_t4l_fabric.waistcoat = id_t4l_fabric.default_fabric
            } else {
                var F = $("#suit_fabric_" + J + " a");
                if (typeof(F.attr("ref")) != "undefined") {
                    var B = F.attr("ref");
                    var y = F.attr("name");
                    var E = F.attr("rank");
                    var I = F.attr("season");
                    var C = F.attr("composition");
                    var A = F.attr("simplecomposition");
                    var G = F.attr("type");
                    var D = F.attr("thread_count");
                    var z = F.attr("category");
                    var H = F.attr("brightness");
                    var x = "?action=view&id=" + J;
                    //$("#preview_fabric_3d_common div.preview").css("background", "url("+Man_Coat.url+"assets/dimg/fabric/" + J + "_big.jpg) top right no-repeat");
                    $(".fabimgs").attr('src',""+Man_Coat.url+"assets/dimg/fabric/" + J + "_normal.jpg'");
                    $("#preview_fabric_3d_common div.preview a.view_fabric").attr("href", x);
                    $(".colorbox3d").magnificPopup({
                        type: "iframe",
                        href: function() {
                            return x
                        }
                    });
                    $("#preview_fabric_3d_common #fabric_ref").html(B);
                    $("#fabric_simple_composition").html(A);
                    $("#preview_fabric_3d_common #fabric_name").html("<b>" + y + "</b>");
                    if (H != "normal") {
                        $("#fabric_simple_composition").append("");
                        $("#fabric_brightness").html('<img style="" id="is_fabric_brightness" src="/images/man/suit/ico_brillante.png"> ' + H);
                        $("#is_fabric_brightness").show()
                    } else {
                        $("#fabric_brightness").html("");
                        $("#is_fabric_brightness").hide()
                    }
                    f(id_t4l_fabric[Man_Coat.current_t4l_fabric])
                }
            }
        }
        if (Man_Coat.suit_type == "Man_Coat3") {
            $("#box_fabric_waistcoat").show();
            $("#box_fabric_waistcoat input").uniform();
            $("#box_tab_suit_view a").click(function() {
                var y = $(this).attr("rel");
                t(y);
                if (y == "default_fabric") {
                    $("#box_tab_suit_view").removeClass("waistcoat");
                    $("#box_tab_suit_view").addClass("jacket");
                    a = "default_fabric"
                } else {
                    $("#box_tab_suit_view").removeClass("jacket");
                    $("#box_tab_suit_view").addClass("waistcoat");
                    a = "waistcoat"
                }
                var x = $("#colors_filter").val();
                var z = $("#patterns_filter").val()
            });
            $("#box_fabric_waistcoat input").change(function() {
                if ($(this).is(":checked")) {
                    $("#box_tab_suit_view").show();
                    $("#box_tab_suit_view a.waistcoat").click();
                    m = true
                } else {
                    $("#box_tab_suit_view").hide();
                    t("default_fabric");
                    $("#box_tab_suit_view").removeClass("waistcoat");
                    $("#box_tab_suit_view").addClass("jacket");
                    Man_Coat.id_t4l_fabric.waistcoat = Man_Coat.id_t4l_fabric.default_fabric;
                    Man_Coat.render.setFabric("waistcoat", Man_Coat.id_t4l_fabric.waistcoat);
                    $("#id_t4l_fabric_waistcoat").val(Man_Coat.id_t4l_fabric.waistcoat);
                    Man_Coat.redraw(true);
                    m = false
                }
            })
        }
        var n = [];

        function s(x) {
            if (x) {
                if (m == true) {
                    if (a == "waistcoat") {
                        Man_Coat.render.setFabric("waistcoat_lining_back", Man_Coat.id_t4l_lining);
                        Man_Coat.render.setWaistcoatButtonCode(Man_Coat.waistcoat_button_code ? Man_Coat.waistcoat_button_code : Man_Coat.button_code);
                        Man_Coat.render.setFabric("waistcoat", Man_Coat.id_t4l_fabric.waistcoat)
                    } else {
                        Man_Coat.render.setShoesColor(Man_Coat.shoe_color);
                        Man_Coat.render.setJacketButtonCode(Man_Coat.button_code);
                        Man_Coat.render.setPantsButtonCode(Man_Coat.button_code);
                        Man_Coat.render.setFabric("jacket", Man_Coat.id_t4l_fabric.default_fabric);
                        Man_Coat.render.setFabric("pants", Man_Coat.id_t4l_fabric.default_fabric)
                    }
                } else {
                    Man_Coat.render.setFabric("waistcoat_lining_back", Man_Coat.id_t4l_lining);
                    Man_Coat.render.setShoesColor(Man_Coat.shoe_color);
                    Man_Coat.render.setJacketButtonCode(Man_Coat.button_code);
                    Man_Coat.render.setPantsButtonCode(Man_Coat.button_code);
                    Man_Coat.render.setFabric("jacket", Man_Coat.id_t4l_fabric.default_fabric);
                    Man_Coat.render.setFabric("pants", Man_Coat.id_t4l_fabric.default_fabric);
                    Man_Coat.render.setWaistcoatButtonCode(Man_Coat.waistcoat_button_code ? Man_Coat.waistcoat_button_code : Man_Coat.button_code);
                    Man_Coat.render.setFabric("waistcoat", Man_Coat.id_t4l_fabric.waistcoat)
                }
                Man_Coat.render.lmanager.redraw();
                Man_Coat.redraw()
            }
        }

        function d() {
            var y = $("#fabric_view_3d");
            var z = $(window).height() - 132;
            var x = $(window).width();
            if (x < z) {
                y.find("img").height(z)
            } else {
                y.find("img").width(x)
            }
        }

        function f(x) {
            if (window.mobile_enabled) {
                $("#id_t4l_fabric_default").val(x.id_t4l_fabric);
                $("#id_t4l_fabric_waistcoat").val(x.id_t4l_fabric)
            }
            var y = ($("html").prop("lang") == "ru" && document.all) ? encodeURI(x.href) : x.href;
            if (window.mobile_enabled) {
                l = $("body").scrollTop();
                $("body, html").css("overflow", "hidden");
                r.find(".info_box").html("").load(x.href, d);
                r.show();
                return true
            }
            if (typeof(x.name) != "undefined") {
                //$("#preview_fabric_3d_common div.preview").css("background", "url("+Man_Coat.url+"assets/dimg/fabric/" + Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric] + "_big.jpg) top right no-repeat");
                $(".fabimgs").attr('src',""+Man_Coat.url+"assets/dimg/fabric/" + Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric] + "_normal.jpg'");
                $("#preview_fabric_3d_common div.preview #rank_label").removeClass();
                $("#preview_fabric_3d_common div.preview #rank_label").addClass(x.rank);
                $("#preview_fabric_3d_common div.preview a.view_fabric").attr("href", y);
                $("#fabric_simple_composition").html(x.simple_composition);
                if (x.brightness != "normal") {
                    $("#fabric_brightness").html('<img style="" id="is_fabric_brightness" src="/images/man/suit/ico_brillante.png"> ' + x.brightness);
                    $("#is_fabric_brightness").show()
                } else {
                    $("#fabric_brightness").html("");
                    $("#is_fabric_brightness").hide()
                }
                $("#preview_fabric_3d_common #fabric_name").html("<b>" + x.name + "</b>");
                if ($("html").prop("lang") == "ru") {
                    $("#second_row_info").html(x.composition + " - " + x.fabric_weight + "гр/м - " + x.season)
                } else {
                    $("#second_row_info").html(x.composition + " - " + x.fabric_weight + "gr/m2 - " + x.season)
                }
                $(".colorbox3d").magnificPopup({
                    type: "iframe",
                    href: function() {
                        return $(this).attr("href")
                    }
                })
            }
            $(".suit_fabric.selected").removeClass("selected");
            $("#suit_fabric_" + Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric]).addClass("selected");
            s(Man_Coat.id_t4l_fabric)
        }
        var k = false;

        /*function e() {
            $("#loading_fabric").show();
            $("#current_fabric").hide();
            var D = document.location.toString();
            if ($("html").prop("lang") == "ru" && document.all) {
                D = encodeURI(D)
            }
            D = D.split("?")[0];
            var z = "default";
            if (Man_Coat.suit_type == "Man_Coat3") {
                if (Man_Coat.current_t4l_fabric == "waistcoat") {
                    z = "waistcoat"
                }
                var B = Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric]
            }
            if (window.mobile_enabled) {
                var C = {
                    type: [],
                    tone: [],
                    texture: [],
                    season: [],
                    rank: []
                };
                $("#filters div.filter").each(function() {
                    var E = this.getAttribute("name");
                    $("a.current", this).not(".all").each(function() {
                        C[E].push(this.getAttribute("rel"))
                    })
                });
                var x = C.type;
                var A = C.tone;
                var y = C.texture
            } else {
                var C = {
                    season: [],
                    rank: [],
                    tone: [],
                    texture: [],
                    type: []
                };
                $("#filters div.filter").each(function() {
                    var E = this.getAttribute("name");
                    $("input:checked", this).not(".all").each(function() {
                        C[E].push($(this).val())
                    })
                })
            }
            Man_Coat.container_fabrics.load(D + "?action=filter", C, function() {
                if (k) {
                    if (c != o) {
                        $("#tab_default_fabric").click()
                    }
                    k = false
                }
                var I = $("a.select", this).click(function() {
                    var V = {
                        ref: $(this).attr("ref"),
                        name: $(this).attr("name"),
                        composition: $(this).attr("composition"),
                        category: $(this).attr("category"),
                        rank: $(this).attr("rank"),
                        simple_composition: $(this).attr("simplecomposition"),
                        type: $(this).attr("type"),
                        brightness: $(this).attr("brightness"),
                        thread_count: $(this).attr("thread_count"),
                        fabric_weight: $(this).attr("fabric_weight"),
                        season: $(this).attr("season"),
                        id_t4l_fabric: $(this).attr("rel"),
                        href: "?action=view&id=" + $(this).attr("rel")
                    };
                    V.fabric_weight = $(this).attr("fabric_weight");
                    V.season = $(this).attr("season");
                    id_t4l_fabric[Man_Coat.current_t4l_fabric] = V;
                    if (window.mobile_enabled) {
                        V.option = "fabric";
                        History.pushState(V, window.title, "?option=fabric&id_t4l_fabric=" + V.id_t4l_fabric);
                        return false
                    }
                    var L = $(this).attr("id_tie");
                    Man_Coat.id_tie = L;
                    Man_Coat.render.setTie(L, true);
                    Man_Coat.render.id_tie = L;
                    var U = $(this).attr("id_t4l_lining");
                    var O = $(this).attr("rel");
                    if (Man_Coat.current_t4l_fabric == "default_fabric") {
                        Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric] = O;
                        Man_Coat.id_t4l_lining[Man_Coat.current_t4l_fabric] = U;
                        if (!$("#box_fabric_waistcoat input").is(":checked")) {
                            Man_Coat.id_t4l_fabric.waistcoat = O;
                            Man_Coat.id_t4l_lining.waistcoat = U
                        }
                    } else {
                        Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric] = O;
                        Man_Coat.id_t4l_lining[Man_Coat.current_t4l_fabric] = U
                    }
                    var R = $(this).attr("thread_count");
                    if (!$("#box_fabric_waistcoat input").is(":checked") || (m == true && a == "waistcoat")) {
                        Man_Coat.waistcoat_button_code = $(this).attr("button_code");
                        Man_Coat.button_code = $(this).attr("button_code");
                        Man_Coat.id_t4l_lining = U
                    } else {
                        Man_Coat.button_code = $(this).attr("button_code")
                    }
                    Man_Coat.shoe_color = $(this).attr("shoe_color");
                    var P = Man_Coat.id_t4l_fabric.default_fabric;
                    var S = Man_Coat.id_t4l_fabric.waistcoat;
                    $("#id_t4l_fabric_default").val(P);
                    $("#id_t4l_fabric_waistcoat").val(S);
                    var Q = window.fabric_prices[P];
                    var T = window.fabric_prices[S];
                    var N = 0;
                    if (Q > 0) {
                        N = Q
                    } else {
                        N = 0
                    }
                    window.coat_price.fabric = N ? N : 0;
                    Man_Coat.updatePrice();
                    V.href = "?action=view&id=" + Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric];
                    f(V);
                    $("#fabric_3d div.slider_box img.selected").hide();
                    $("#fabric_3d div.slider_box div.selected").removeClass("selected");
                    $("#slider_fabrics div.selected").removeClass("selected").find("img.selected").hide();
                    var M = $(this).closest(".fabric_box_3d");
                    M.find("img.selected").show();
                    M.children(":first").addClass("selected");
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove();
                    var H = false;
                    I.bind("touchstart", function() {
                        H = true
                    }).bind("touchmove", function() {
                        H = false
                    }).bind("touchend", function() {
                        if (H) {
                            $(this).click()
                        }
                    })
                }
                n = [];
                Man_Coat.container_fabrics.find("div.suit_fabric").each(function() {
                    n.push(this.getAttribute("rel"))
                });
                if (window.mobile_enabled) {
                    var G = 0;
                    if (!$(this).hasClass("first_load")) {
                        $(this).addClass("first_load");
                        var J = $(".selected", this);
                        if (J.length) {
                            G = J.offset().top - 200
                        }
                    }
                    $("html, body").animate({
                        scrollTop: G
                    }, 500)
                } else {
                    var K = Man_Coat.container_fabrics.find("div.suit_fabric[title], div.suit_fabric img[title]");
                    initTooltips(K)
                }
                $("#slider_fabrics .thumb_preview").magnificPopup({
                    type: "iframe"
                });
                if (k) {
                    $(window).scrollTop(480)
                } else {
                    k = true
                }
                var E = "";
                $("#filters input:checked").not(".all").each(function() {
                    var N = $(this).parent().text();
                    var L = this.getAttribute("name");
                    var M = this.getAttribute("value");
                    E += "<li>" + N + ' <a href="javascript:;" class="del" name="' + L + '" value="' + M + '">x</a></li>'
                });
                if (E) {
                    var F = "Your<br>filters";
                    switch ($("html").prop("lang")) {
                        case "es":
                            F = "Tus<br>filtros";
                            break;
                        case "it":
                            F = "I tuoi<br>filtri";
                            break;
                        case "fr":
                            F = "Votre<br>filtre";
                            break;
                        case "de":
                            F = "Ihre<br>Filter";
                            break;
                        case "ru":
                            F = "Ваши<br>фильтры";
                            break;
                        case "cn":
                            F = "您的过滤器";
                            break
                    }
                    E = '<ul><li class="first">' + F + "</li>" + E + "</ul>";
                    $("#current_filters").html(E).show()
                } else {
                    $("#current_filters").html(E).hide()
                }
                $("#loading_fabric").fadeOut("fast");
                if (!window.mobile_enabled) {
                    $(".suit_fabric.selected").removeClass("selected");
                    $("#suit_fabric_" + Man_Coat.id_t4l_fabric[Man_Coat.current_t4l_fabric]).addClass("selected")
                }
                if (Man_Coat.bLazy) {
                    Man_Coat.bLazy.revalidate()
                }
            })
        }
        e();*/
        if (window.mobile_enabled) {
            $("#fabric_filter_trigger").click(function() {
                History.pushState({
                    option: "filters"
                }, window.title, "?option=filters")
            });
            $("#filters a.close").click(function() {
                History.back()
            });
            $("#filters a.select").click(function() {
                e();
                History.back()
            });

            function q() {
                var x = History.getState();
                $("body, html").css("overflow", "visible");
                $("#body_height").css("position", "relative");
                $("#filters").hide();
                r.hide();
                switch (x.data.option) {
                    case "filters":
                        $("body, html").css("overflow", "hidden");
                        $("#body_height").css("position", "initial");
                        $("#filters").show();
                        break;
                    case "fabric":
                        f(x.data);
                        break
                }
                $(window).scroll()
            }
            History.Adapter.bind(window, "statechange", q);
            q();
            Man_Coat.filter_form.find("a.filter").click(function() {
                var z = $(this);
                var y = z.hasClass("current");
                var A = z.parents(".filter");
                if (z.hasClass("all")) {
                    if (y) {
                        return false
                    }
                    A.find("a").not(this).removeClass("current")
                } else {
                    var x = A.find("a.all");
                    if (y) {
                        if (A.find("a.current").length <= 1) {
                            x.addClass("current")
                        }
                    } else {
                        x.removeClass("current")
                    }
                }
                z.toggleClass("current")
            });
            var u = $("#sticky_header");
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 40) {
                    u.addClass("fixed")
                } else {
                    u.removeClass("fixed")
                }
            })
        } else {
            var j = false;
            var p = false;

            function v() {
                if (j) {
                    j.hide();
                    p.removeClass("current");
                    j = false;
                    p = false
                }
            }
            Man_Coat.filter_form.find("a.dropdown").mouseover(function() {
                var x = this.getAttribute("href").replace(/^[^#]/, "");
                v();
                p = $(this).addClass("current");
                j = $(x).show()
            }).click(function() {
                return false
            });
            Man_Coat.filter_form.mouseleave(v);
            $("#current_filters").on("click", "a.del", function() {
                var y = this.getAttribute("name");
                var z = this.getAttribute("value");
                current_fabric_options = $("#filters input[name='" + y + "'][value='" + z + "']").prop("checked", 0).closest(".filter");
                var x = true;
                current_fabric_options.find("input:checked").not(".all").each(function() {
                    x = false
                });
                if (x) {
                    current_fabric_options.find("input.all").prop("checked", 1).prop("disabled", 1)
                }
                e()
            });
            var u = $('<div class="fabric_sticky_header"><div class="body_box"></div></div>');
            $("body").append(u);
            var b = $(".product_title_3d:eq(0)");
            var i, h, g;
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 520) {
                    if (!i) {
                        Man_Coat.filter_form.addClass("sticky");
                        i = true
                    }
                } else {
                    if (i) {
                        Man_Coat.filter_form.removeClass("sticky");
                        i = false
                    }
                }
                if ($(window).scrollTop() >= 191) {
                    if (!h) {
                        u.show();
                        b.addClass("sticky");
                        h = true
                    }
                } else {
                    if (h) {
                        u.hide();
                        b.removeClass("sticky");
                        h = false
                    }
                }
                if ($(window).scrollTop() >= 191) {
                    if (!g) {
                        $(".test_B #move").addClass("fixit");
                        g = true
                    }
                    $(".box_right_3d.suit #model_3d_preview.Man_Coat").css("margin-top", "176px")
                } else {
                    if (g) {
                        $(".test_B #move").removeClass("fixit");
                        g = false
                    }
                    $(".box_right_3d.suit #model_3d_preview.Man_Coat").css("margin-top", "0")
                }
            });
            Man_Coat.filter_form.find("ul.filter input").click(function() {
                var y = $(this);
                var A = $(this).prop("checked");
                var z = y.parents(".filter");
                if (y.hasClass("all")) {
                    if (A) {
                        z.find("input").not(y, z).removeAttr("checked")
                    }
                    y.attr("disabled", 1)
                } else {
                    var B = z.find("input.all");
                    if (A) {
                        var C = B.prop("checked");
                        B.removeAttr("disabled");
                        if (C) {
                            B.removeAttr("checked")
                        }
                    } else {
                        var x = true;
                        z.find("input").not(y, z).each(function() {
                            if ($(this).prop("checked")) {
                                x = false
                            }
                        });
                        if (x) {
                            B.click()
                        }
                    }
                }
                e()
            });
            $(".colorbox3d").magnificPopup({
                type: "iframe",
                href: function() {
                    return $(this).attr("href")
                }
            })
        }
    },
    initExtras: function() {
        if (window.mobile_enabled) {
            return this.initExtrasMobile()
        }
        var k = ["front", "back"];
        Man_Coat.importOptions();
        if (typeof(initCollectionGenerator) == "function") {
            initCollectionGenerator(Man_Coat, k)
        }
        Man_Coat.render.setCoatButtonCode(Man_Coat.button_code);
        Man_Coat.default_id_t4l_lining = window.id_t4l_lining;
        Man_Coat.current_id_t4l_lining = $("#input_hidden_lining").val();
        $("#extra_forms a.back").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Coat.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#extra_forms a.next").click(function() {
            Man_Coat.setModel_position("front");
            Man_Coat.redraw(true);
            Man_Coat.createInputsImgs();
            $("#go_to").attr('value','extras');
            Man_Coat.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Coat.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_configure").click(function() {
            $("#go_to").attr("value", "configure");
            Man_Coat.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("input.uniform", Man_Coat.options_container).uniform();
        $("#extra_form div.box_title.main").click(function() {
            var q = $(this).find("a.btn_cancel_add");
            var l = q.attr("rel");
            var o = l;
            var n = q.attr("price") * 1;
            var m = $(this).closest("div.box_title");
            var p = $(this).closest("div.extra_opt");
            if (m.hasClass("open")) 
            {
                m.removeClass("open");
                m.addClass("close");
                p.find("div.window").hide();

                if (l == "lining_jacket" || l == "initials_jacket") 
                {
                	$("input[name='"+l+"_price']").val('');
                    $("input[name='jacket_lining_id']").val('');
                }

                if (l == "initials") {
                    $("input[name='"+l+"_jacket_price']").val('');
                    $("input[name='font_family']").val('');
                    $("input[name='initials_jacket1']").val('');
                    $(".op_initials").find(".common_color").removeClass("active");
                    $("input[name='initials_jacket']").val('');
                }

                if(l=="button_holes_threads") {

                    $("input[name='button_holes_threads_jacket2']").val('');
                    $("input[name='button_holes_threads_jacket1']").val('');
                    //$("input[name='button_holes_threads_jacket']").val('');
                     //$("input[name='button_holes_threads_jacket']").closest("label").removeClass("checked");
                     $(".suit_hole_not_default").attr("checked",false);
                     $(".suit_hole_default").attr("checked",true);
                    $("#placket_only").hide();
                    $("#cuffs_only").hide();
                    $(".not_default").removeClass("checked"); 
                    //$("input[name='button_holes_threads_jacket']").prop("checked",0);
                    //$("input[name='"+l+"_price']").val('');
                    $("input[name='placket_color']").val('');

                    window.coat_price['button_holes_threads_jacket']=0;

                }

                window.coat_price[o] = 0;

                Man_Coat.updatePrice();
                h(o);
                Man_Coat.redraw(true)
            } else {
                m.removeClass("close");
                m.addClass("open");
                p.find("div.window").show();

                if (l == "lining_jacket" || l == "initials_jacket") {
                    window.coat_price.l =0;
                    $("#uniform-lining_default_jacket").parents("label").addClass("checked");

                    $("#uniform-inp_lining_personalized_jacket").parents("label").removeClass("checked");
                    $("input[name='jacket_lining_id']").val('');
                    $("#lining_box_jacket").hide();
                    Man_Coat.cloth_open = false
                }
                else if(l == "neck_lining" || l== "metal_buttons") {
                    window.coat_price.l =0;
                }
                
                else if(l=="button_holes_threads") {

                    $btn_thread_lay = $("input[name='button_holes_threads_jacket']").attr("layer1");
                    
                    if($btn_thread_lay=='by_default')
                        window.coat_price[o + "_jacket"] = 0;
                    else
                    window.coat_price[o + "_jacket"] = window.extra_prices.btn_holes_threads;
                     //$("input[name='button_holes_threads_jacket']").closest("label").addClass("checked");
                     $(".by_default").addClass("checked");
                     $(".suit_hole_not_default").attr("checked",false);
                     $(".suit_hole_default").attr("checked",true);
                    //Man_Coat.updatePrice();
                }
            }
        });

        function a(m) {
            if (m == "initials") {
                var n = $("#txt_initial").val();
                var l = $("#extra_form .box_title.initials a.btn_cancel_add").attr("price");
                if (n != "") {
                    window.coat_price[m] = l ? l : 0
                } else {
                    window.coat_price[m] = 0
                }
            }
            if (m == "button_holes_threads") {
                var l = $("#extra_form .box_title.hilo_ojal a.btn_cancel_add").attr("price");
                //window.coat_price[m] = l ? l : 0
            }
            Man_Coat.updatePrice()
        }

        function h(l) {
            if (l == "initials") {
                $("#txt_initial").val("");
                g()
            }
            if (l == "button_holes_threads") {
                $("#hidden_button_threads").val("");
                $("#hidden_button_holes").val("");
                $("#extra_form div.window.hilo_ojal div.option_trigger.active").removeClass("active");
                $("#img_ojal_hilo").find("div.ojal").attr("class", "").addClass("ojal");
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo");
                $("#hidden_button_holes").closest("div.interactive_options").removeClass("threads_hidden");
                $("#hidden_button_threads").show()
            }
            if (l == "lining") {
                $("input#lining_default").click();
                $.uniform.update()
            }
            if (l == "neck_lining" || l == "patches") {
                var m = $("a.btn_cancel_add[rel='" + l + "']");
                m.closest(".extra_opt").find(".default_item").click();
                $.uniform.update()
            }
        }

        function g() {
            var q = $("#txt_initial_jacket").val();
            var l = $("#position_default").val();
            var o = $("#extra_form.man_coat .window.initials div.common_color.active").attr("color");
            var n = $("#extra_form div.box_opts div.extra_opt .op_initials div.box_font_initial input:checked").attr("rel");
            $("#rotate").html("");
            $("input[name='font_family']").val(n);
            
        }
        $("#txt_initial_jacket").keypress(isValidCharacterInitials).bind("paste", function(l) {
            return false
        });
        $("#txt_initial_jacket").keyup(function(l) {
            g();
            Man_Coat.redraw(true);
            a("initials")
        });
        $("#extra_form div.box_opts div.extra_opt .op_initials div.box_font_initial input").click(function() {
            g();
            Man_Coat.redraw(true)
        });
        $("#extra_form div.box_opts div.extra_opt .box_opt .list_common_color div.common_color").click(function() {
            g();
            Man_Coat.redraw(true)
        });

        function f(l) {
            createSlideshow(l, 494)
        }

        function b(l) {
            if (l.id.toLowerCase() == "all") {
                return l.text
            } else {
                return "<img class='flag' src='/images/man/suit/lining_opt/colors/" + l.id.toLowerCase() + ".png'/> " + l.text
            }
        }
        $(".colors_filter").select2({
            formatResult: b,
            formatSelection: b
        });

        function c(l) {
            if (l.id.toLowerCase() == "all") {
                return l.text
            } else {
                return "<img class='flag' src='/images/man/shirt/fabric_opt/patterns/" + l.id.toLowerCase() + ".png'/> " + l.text
            }
        }
        $(".patterns_filter").select2({
            formatResult: c,
            formatSelection: c
        });
        $("select.colors_filter, select.patterns_filter").change(function() {
            i($(this).closest("div.personalized_box"))
        });
        $("select.colors_filter, select.patterns_filter").change(function() {
            if ($(this).hasClass("colors_filter")) {
                var l = $(this).closest("div.filters");
                l.find("a.filter").removeClass("current");
                l.find('a[rel="all"]').addClass("current")
            }
            i($(this).closest("div.personalized_box"))
        });

        function i(m, r) {
            var o = m.find("select.colors_filter").val();
            var l = m.find("select.patterns_filter").val();
            var q = m.closest("div.top").find("input.getVal").val();
            var n = 0;
            if ($("#inp_lining_padded").is(":checked")) {
                n = 1
            }
            var p = {
                tone: o,
                texture: l,
                padded: n,
                id_current_lining: q
            };
            m.find("div.slider_fabrics").load(base_href + "extras?action=filter", p, function(s) {
                $("a.select", this).click(function() {

                    var u = $(this).attr("rel");
                    $(".lining_3d div.slider_box img.selected", m).hide();
                    $(".lining_3d div.slider_box div.coat_lining.selected", m).removeClass("selected");
                    var t = $(this).closest("div.fabric_box_3d");
                    t.find("img.selected").show();
                    t.find("div.coat_lining").addClass("selected");
                    $(this).closest("div.lining_3d").find(".preview_fabric_3d_common div.preview").css("background", "url(/dimg/lining/default/" + u + "_big.jpg) top right no-repeat");
                    $(this).closest("div.top").find("input.getVal").val(u);
                    $("div.info_fabric span.lining_material.coat_lining").html($(this).attr("material"));
                    Man_Coat.current_id_t4l_lining = u;
                    Man_Coat.render.show_lupa = true;
                    Man_Coat.redraw();
                    d();
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove()
                }
                f(m)
            })
        }
        $("div.lining_back.top, div.lining.top").find("a.filter").click(function() {
            var m = $(this).closest(".lining_3d").parent();
            var l = $(this).attr("rel");
            $(".filters a.filter", m).removeClass("current");
            $(this).addClass("current");
            i($(this).closest(".lining_3d").parent())
        });

        function e(m, n) {
            var l = $("#input_hidden_lining"),
                lining_id_set = $("input[name='jacket_lining_id']");

            
            /* Default Jacket Section */

            $("#lining_default_jacket").click(function() {
            	$("input[name='default_jacket_val']").val('yes');
            	lining_id_set.val('');
                $("#lining_box_jacket").hide();
                $("div.deco_lining", m).show();

                Man_Coat.current_id_t4l_lining = Man_Coat.default_id_t4l_lining;
                l.val($(this).val());
                d();
                //Man_Coat.render.show_lupa = true;
                //Man_Coat.redraw(true)
            });

            /* Jacket Lining */

            $("#inp_lining_personalized_jacket, div.deco_lining").click(function() {
                $("#lining_box div.selects_box").show();
                $("#lining_box_jacket").show();
                $("#lining_box span.prev").show();
                $("#lining_box span.next").show();
                $("#lining_box div.slider_fabrics").css("height", "226");
                $("#lining_box div.slider_fabrics").css("margin", "0px 5px");
                if ($(this).hasClass("deco_lining")) {
                    $(this).closest(".op_lining").find("input").each(function() {
                        $(this).prop("checked", false)
                    });
                    $(this).closest(".op_lining").find("input#inp_lining_personalized").prop("checked", true);
                    $.uniform.update()
                }
                n.show();

                $(".slider_fabrics img").not(":first").css("display", "none");

                $(".slider_fabrics img:first").css("display", "block");


                l_id = $("a.select:first").attr('rel'); 
                lining_id_set.val(l_id);
                $("input[name='default_jacket_val']").val('');

                $("div#lining_box_jacket div.preview").css("background", "url("+Man_Coat.url+"assets/dimg/lining/default/" + l_id + "_big.jpg) top right no-repeat")

                $("input[name='default_jacket_val']").val();
                $("div.deco_lining", m).hide();
                $lining_material = $("div.slider_fabrics div.coat_lining.selected a", n).attr("material");
                $("div.info_fabric span.lining_material.coat_lining").html($lining_material);
                Man_Coat.current_id_t4l_lining = l.val();
                $("div.preview", n).css("background", "url(/dimg/lining/default/" + Man_Coat.current_id_t4l_lining + "_big.jpg) top right no-repeat");
                d();
                //Man_Coat.render.show_lupa = true;
                //Man_Coat.redraw(true);
                i($("#lining_box"))
            });
            $("#inp_lining_padded").click(function() {
                $("#lining_box div.selects_box").hide();
                $("#lining_box span.prev").hide();
                $("#lining_box span.next").hide();
                $("#lining_box div.slider_fabrics").css("margin", "10px 10px 0px 10px");
                n.show();
                $("div.deco_lining", m).hide();
                Man_Coat.current_id_t4l_lining = l.val();
                $("div.preview", n).css("background", "url(/dimg/lining/default/" + Man_Coat.current_id_t4l_lining + "_big.jpg) top right no-repeat");
                d();
                Man_Coat.render.show_lupa = true;
                Man_Coat.redraw(true);
                i($("#lining_box"))
            })

            $("a.select").click(function() {

                    var w = $(this).attr("category");
                    var v = $(this).attr("rel");
                    var x = $(this).attr("extra");
                    var lining_price = $(this).attr('extra');
                    var lining_price_set = $("input[name='lining_jacket_price']");
                    var lining_id_set = $("input[name='jacket_lining_id']");

                    $(".lining_3d div.slider_box img.selected").hide();
                    $(".lining_3d div.slider_box div.suit_lining.selected").removeClass("selected");
                    var u = $(this).closest("div.fabric_box_3d");
                    u.find("img.selected").show();
                    u.find("div.suit_lining").addClass("selected");
                    $(this).closest("div.lining_3d").find(".preview_fabric_3d_common div.preview").css("background", "url("+Man_Coat.url+"assets/dimg/lining/default/" + v + "_big.jpg) top right no-repeat");
                    $(this).closest("div.top").find("input.getVal").val(v);
                    $("div.info_fabric span.lining_material.jacket_lining").html($(this).attr("material"));
                    Man_Coat.current_id_t4l_lining = v;
                    var t = $(this).closest("div.top").find("input.getVal").attr("layer");
                    
                    lining_price_set.val(lining_price);
                    lining_id_set.val(v);
                    window.coat_price.lining_jacket = lining_price;
                    Man_Coat.updatePrice();
                    return false
                });
        }

        function d() {
            var l = 0;
            if (Man_Coat.current_id_t4l_lining == Man_Coat.default_id_t4l_lining) {
                l = 0
            } else {
                //l = window.t4l_linings[Man_Coat.current_id_t4l_lining]["price"];
                l=0;
            }
            window.coat_price.lining = l;
            Man_Coat.updatePrice()
        }
        i($("#lining_box"));
        e($("#options_lining"), $("#lining_box"));

        


        if ($("#inp_lining_personalized_jacket:checked").length) {
            $("#lining_box").show();
            $("#options_lining div.deco_lining").hide();
            var j = $("#input_hidden_lining").val();
            //$("div.preview", lining_box).css("background", "url(/dimg/lining/default/" + j + "_big.jpg) top right no-repeat")
        }
        if ($("#inp_lining_padded:checked").length) {
            $("#lining_box").show();
            $("#options_lining div.deco_lining").hide();
            var j = $("#input_hidden_lining").val();
            //$("div.preview", lining_box).css("background", "url(/dimg/lining/default/" + j + "_big.jpg) top right no-repeat")
        }
        g();
        d();
        
        $("#extra_form a.box_color").click(function() 

        {
        	var i = $(this).parent().attr('color');
            var j = $(this).attr('layer');
            var k = $(this).attr('layer1');


            var m = $(this).closest("div.option_trigger");
            var o = $(this).closest("div.list_common_color");
            var n = o.attr("rel");
            o.each(function() {
                $(this).find("div.option_trigger").removeClass("active")
            });

            if(j=="jacket_button_holes") 
                $("input[name='button_holes_threads_jacket2']").val(i);
            if(j=="monogram_color")
                 $("input[name='initials_jacket1']").val(i);
            if(j=="jacket_neck_lining")
                 $("input[name='neck_lining']").val(i); 
            if(j=="jacket_button_holes1") 
                $("input[name='button_holes_threads_jacket1']").val(i);
            if(j=="lapel_only")
                $("input[name='placket_color']").val(i);

            m.addClass("active");
            var q = m.attr("rel");
            o.find("input.option_input").attr("value", q);
            if (n != "initials") {
                a(n);
                var p = m.attr("rel");
                var n = m.attr("type");
                var l = $(this).closest("div.window").find("#img_ojal_hilo");
                l.find("div." + n).attr("class", "").addClass("jc" + p).addClass(n)
            }
            Man_Coat.redraw(true)
        });
        $("input.thread_holes_selector").on("click load",function(event) {

            var event_type=true;

          if(event.originalEvent == undefined) 

            var event_type = false;

          var btn_thread_type = $(this).attr("layer1");

          if(btn_thread_type=='both_opt') {


            $("#button_thread_type").show();
            $("#placket_only").show();
            $("#cuffs_only").show();
            window.coat_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;

          }
          else if(btn_thread_type=='placket_only') {
             $("#button_thread_type").show();
            $("#placket_only").show();
            $("#cuffs_only").hide();
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='button_holes_threads_jacket1']").val('');
            window.coat_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;

          }
          else if(btn_thread_type=='cuffs_only') {
             $("#button_thread_type").show();
            $("#placket_only").hide();
            $("#cuffs_only").show();
            $("input[name='placket_color']").val('');
            window.coat_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;


          }
          else {
            $("#button_thread_type").hide();
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='placket_color']").val('');
            window.coat_price["button_holes_threads_jacket"] = 0;

          }

          Man_Coat.updatePrice();


          if(event_type) {
            $(".hilo_ojal").find(".common_color").removeClass("active");
            $(".hilo_ojal").find(".common_color").removeClass("active1");
            
        }
      });
         $("a.color_item").click(function() {
            var l = $(this).closest(".lateral_right");
            var m = $(this).closest(".extra_3d").find(".lateral_img");
            var s = $(this).attr('layer');
            //m.css("background-position", "0 " + (-1 * ((parseInt($(this).attr("img_index")) + 1) * m.height()) + "px"));
            $("input", l).each(function() {
                $(this).prop("checked", 0)
            });
            $("input.personalized_item", l).prop("checked", 1);
            $.uniform.update();
            $(".option_trigger.active", l).removeClass("active");
            $(this).closest(".option_trigger").addClass("active");
            $input_hidden_option = $(this).closest(".top").find(".getVal");
            
            if(s=='jacket_neck_lining')
             $input_hidden_option.val($(this).closest(".option_trigger").attr("color"));
            else
             $input_hidden_option.val($(this).closest(".option_trigger").attr("rel"));

            Man_Coat.render.jacket_show_neck_lining = false;
            var n = $(this).closest(".top").find(".personalized_item");
            if (n.attr("extra_name") == "metal_buttons") {
                var price= window.extra_prices.metal_btn;
                $("#box_button_threads_extra", e).hide();
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo");
                $("#box_button_threads_extra .common_color").removeClass("active");
                $("#hidden_button_threads").val("");
                
            }
            else if(n.attr("extra_name") == "neck_lining") {
                var price= window.extra_prices.neck_lining;
            }
            else if(n.attr("extra_name") == "patches") {
                var price= window.extra_prices.elbow_patches;
            }
            else if(n.attr("extra_name") == "handkerchief") {
                var price= window.extra_prices.pocket_square;
            }
            
            window.coat_price[n.attr("extra_name")] = price;

            Man_Coat.updatePrice();
            
            Man_Coat.cloth_open = false;
            Man_Coat.redraw(false);
            Man_Coat.render.jacket_show_neck_lining = false
        });
        $("#patches_box div.option_trigger.active").find("a.color_item").click();
        $("#neck_lining_box div.option_trigger.active").find("a.color_item").click();
        
        $("input.default_item").click(function() {
            var type=$(this).val();

            if(type=="standard_button")
              window.extra_prices.metal_buttons=0;
            if(type=="color_by_default")
              window.extra_prices.neck_lining=0;
            if(type=="elbow_no")
              window.extra_prices.elbow_patches=0;  
            if(type=="no_pocket")
              window.extra_prices.handkerchief=0;

            $("div.option_trigger.active", $(this).closest("div.lateral_right")).removeClass("active");
            var l = $(this).closest(".extra_3d").find(".lateral_img");
            //l.css("background-position", "left top");
            var m = $(this).closest("div.list_common_color");
            m.each(function() {
                $(this).find("div.option_trigger").removeClass("active")
            });
            $input_hidden_option = $(this).closest(".top").find(".getVal");
            $input_hidden_option.val($(this).val());
            var n = $(this).closest(".top").find(".personalized_item");
            if (n.attr("extra_name") == "metal_buttons") 
            {
                if (!$("#pos_bht_solapa:checked").length) 
                {
                    $("#box_button_threads_extra", e).show()
                }
                Man_Coat.redraw(false)
            }
            window.coat_price[n.attr("extra_name")] = 0;
            Man_Coat.updatePrice();
            
        });

        $("input.personalized_item").click(function() {
            $("a.color_item", $(this).closest(".top")).first().click()
        });
        $("input, label, a.box_color, div.common_color", $("#extra_form")).click(function() {

            var m = $(this).attr("layer");
            if (typeof(m) != "undefined") {
                /*var l = Man_Coat.render.lmanager.layers[m].position;
                if (l != Man_Coat.model_position) {
                    Man_Coat.setModel_position(l)
                }*/
            }
        });
        $.uniform.update();
        Man_Coat.redraw(true)
    },
    initExtrasMobile: function() {
        var l = $("#sticky_header");
        var i = false;

        function f() {
            if (i) {
                i.hide();
                i = false
            }
            $("#slider_fabrics").hide();
            l.removeClass("fixed")
        }
        $(".options a").click(function() {
            var p = this.getAttribute("href").replace("/^[^#]/", "");
            var q = p.replace("#", "");
            History.pushState({
                option: q,
                rel: p
            }, window.title, "?option=" + q);
            return false
        });

        function e() {
            f();
            window.scrollTo(0, 0);
            var p = History.getState();
            if (typeof(p.data.rel) != "undefined") {
                i = $(p.data.rel).show();
                if (!i.hasClass("manual_close")) {
                    i.addClass("manual_close").click(function() {
                        History.back()
                    })
                }
            }
            if (typeof(p.data.linings) != "undefined") {
                k();
                l.addClass("fixed")
            }
        }
        History.Adapter.bind(window, "statechange", e);
        e();
        $("a.close").click(function() {
            History.back()
        });
        Man_Coat.default_id_t4l_lining = window.id_t4l_lining;
        Man_Coat.current_id_t4l_lining = $("#input_hidden_lining").val();
        $("#extra_form a.back").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            $("#go_to").attr("value", "fabric");
            $("#extra_form").submit();
            return false
        });
        $("#extra_form a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            Man_Coat.setModel_position("front");
            Man_Coat.redraw(true);
            Man_Coat.createInputsImgs();
            $("#extra_form").submit();
            return false
        });
        $("label.t4l_radio input, label.t4l_checkbox input").change(function() {
            if (this.checked) {
                $(this.parentNode).addClass("checked");
                $("input:not(:checked)").parent().removeClass("checked")
            } else {
                $(this.parentNode).removeClass("checked")
            }
        }).filter(":checked").change();
        window.t4l_inputs_enabled = true;

        function b() {
            window.coat_price.initials = $("#txt_initial").val() ? window.extras_prices.initials : 0;
            Man_Coat.updatePrice();
            f()
        }
        var n = $("#coat_initials a.select").click(function() {
            b();
            History.pushState(null, window.title, "?ok=1")
        });
        $("#coat_initials a.remove").click(function() {
            $("#txt_initial").val("").keyup();
            b();
            History.back()
        });
        $("#coat_initials .option_trigger").click(function() {
            return false
        });
        $("#txt_initial").keypress(isValidCharacterInitials).bind("paste", function(p) {
            return false
        }).keyup(function() {
            if (this.value) {
                n.show().parent().addClass("two_options")
            } else {
                n.hide().parent().removeClass("two_options")
            }
        }).keyup();

        function c(p, t) {
            var q = $("label input:checked", p.find(".no_or_yes_two")).val();
            switch (q) {
                case "personalizado":
                    var r = $(".all_colors", p).show();
                    if (!t) {
                        var s = r.find("div.option_trigger").eq(0).addClass("active").attr("rel")
                    }
                    if (!t) {
                        $("div.all_colors input.option_input", p).val(s)
                    }
                    break;
                default:
                    var r = $(".all_colors", p).hide();
                    r.find("div.option_trigger").removeClass("active");
                    $("div.all_colors input.option_input", p).val("");
                    break
            }
        }

        function m(p, q) {
            window.coat_price[q] = p.find("div.no_or_yes_two input:checked").val() == "personalizado" ? window.extras_prices[q] : 0;
            Man_Coat.updatePrice();
            f()
        }
        $("#extra_form .navigate.common a.select").click(function() {
            var p = $(this).closest("div.extra_3d");
            var q = p.attr("extra_name");
            m(p, q);
            History.pushState(null, window.title, "?ok=1");
            switch (q) {
                case "patches":
                    Man_Coat.setModel_position("back");
                    Man_Coat.redraw(true);
                    break;
                case "neck_lining":
                    Man_Coat.setModel_position("back");
                    Man_Coat.render.show_neck_lining = true;
                    Man_Coat.redraw(true);
                    break
            }
            return false
        });
        $("#extra_form .no_or_yes_two input").change(function() {
            c($(this).closest("div.extra_3d"), false)
        });
        c($("#coat_patches"), true);
        c($("#coat_neck_lining"), true);
        var g;

        function h() {
            g = {
                position: $(".button_holes_threads_position:checked", "#all_or_cuff").val()
            };
            j.each(function() {
                g[this.name] = this.value
            });
            //window.coat_price.button_holes_threads = (g.position != "0") ? window.extras_prices.button_holes_threads : 0;
            Man_Coat.setModel_position("front");
            Man_Coat.redraw(true);
            Man_Coat.updatePrice()
        }

        function a() {
            var r = $(".button_holes_threads_position:checked", "#all_or_cuff").val();
            switch (r) {
                case "all":
                case "cuff":
                    var p = $("#coat_threads .thread_colors").show();
                    var q = 1;
                    var s = $("input.metal_buttons_radio_opt:checked", "#coat_metal_buttons").val() == "personalizado";
                    if (s) {
                        p.eq(0).hide();
                        j.eq(0).val("").parent().find(".option_trigger.active").removeClass("active");
                        q = 1
                    } else {
                        p.eq(0).show()
                    }
                    if (j.filter(function() {
                            return this.value
                        }).length >= q) {
                        d.show().parent().addClass("two_options")
                    } else {
                        d.hide().parent().removeClass("two_options")
                    }
                    break;
                case "lapel":
                    var p = $("#coat_threads .thread_colors").show();
                    p.eq(0).hide();
                    j.eq(0).val("").parent().find(".option_trigger.active").removeClass("active");
                    q = 1;
                    if (j.filter(function() {
                            return this.value
                        }).length == q) {
                        d.show().parent().addClass("two_options")
                    } else {
                        d.hide().parent().removeClass("two_options")
                    }
                    break;
                default:
                    $("#coat_threads .thread_colors").hide();
                    $("#coat_threads .option_trigger.active").removeClass("active");
                    j.val("");
                    d.show().parent().addClass("two_options");
                    break
            }
        }
        var d = $("#coat_threads a.select").click(function() {
            h();
            History.pushState(null, window.title, "?ok=1");
            Man_Coat.redraw(true);
            return false
        });
        var j = $("#coat_threads .option_input").change(a);
        $("#all_or_cuff input").change(a);
        a();
        h();
        $("#coat_threads a.close").unbind("click").click(function() {
            $(".button_holes_threads_position[value=" + g.position + "]", "#all_or_cuff").prop("checked", true).change();
            var p = $("#coat_threads .option_trigger");
            p.removeClass("active");
            j.each(function() {
                this.value = g[this.name];
                if (this.value) {
                    p.filter("[rel=" + this.value + "]").addClass("active")
                }
            });
            a();
            History.back();
            return false
        });
        $("#coat_lining").each(function() {
            var p = this.getAttribute("id");
            $(".option_trigger", this).click(function() {
                var q = this.getAttribute("rel");
                if (q == "0") {
                    o(Man_Coat.default_id_t4l_lining, 0);
                    History.back()
                } else {
                    History.pushState({
                        option: p,
                        contrast_option: q,
                        linings: true
                    }, window.title, "?option=" + p + "&linings=1")
                }
                return false
            })
        });

        function k() {
            $("#loading_lining").show();
            var p = document.location.toString();
            if ($("html").prop("lang") == "ru" && document.all) {
                p = encodeURI(p)
            }
            p = p.split("?")[0];
            var q = {
                category: "undefined",
                tone: "all",
                texture: "all",
                id_current_lining: Man_Coat.current_id_t4l_lining
            };
            $("#slider_linings").show().load(p + "?action=filter", q, function() {
                $("a.select", this).click(function() {
                    var s = History.getState();
                    var t = $(this).attr("rel");
                    var r = window.t4l_linings[t].price;
                    if (t == Man_Coat.default_id_t4l_lining) {
                        r = 0
                    }
                    o($(this).attr("rel"), r);
                    History.pushState(null, window.title, "?ok=1");
                    $("#slider_linings").fadeOut("fast");
                    return false
                });
                if (Man_Coat.bLazy) {
                    Man_Coat.bLazy.revalidate()
                }
                $("#loading_lining").fadeOut("fast")
            })
        }

        function o(r, q) {
            var p = $("#input_hidden_lining").val("");
            p.val(r);
            Man_Coat.current_id_t4l_lining = r;
            if (q) {
                window.coat_price.lining = q
            } else {
                window.coat_price.lining = 0
            }
            $("#coat_lining div.option_trigger").removeClass("active");
            if (q == 0) {
                $("#coat_lining div.option_trigger.default").addClass("active")
            } else {
                $("#coat_lining div.option_trigger.personalized").addClass("active")
            }
            Man_Coat.updatePrice();
            Man_Coat.redraw(true);
            Man_Coat.setModel_position("front");
            if (window.mobile_enabled) {
                $("body").scrollTop(0)
            }
        }
        $("#loading_lining").hide();
        $(".interactive_options").each(function() {
            var p = $("input.option_input", this);
            var q = $(".option_trigger", this).click(function() {
                q.removeClass("active");
                $(this).addClass("active");
                p.val(this.getAttribute("rel")).change()
            })
        });
        Man_Coat.redraw(true)
    },
    importOptions: function() {
        Man_Coat.options = {};
        Man_Coat.options_container.find("input:checked, input:hidden, select").each(function() {
            Man_Coat.options[this.name] = this.value
        })
    },
    createInputsImgs: function() {
        var c = $("#image_z_index");
        var b = $("#model_3d_preview");
        var a = "";
        b.find("div.layer").each(function() {
            $(this).find("img").each(function() {
                var d = $(this).attr("src");
                var e = $(this).css("z-index");
                a += "<input type='hidden' name='images[][" + e + "]' value='" + d + "'>"
            })
        });
        c.html(a)
    },
    redraw: function(a) {
        if (a) {
            Man_Coat.importOptions()
        }
        Man_Coat.render.setFabric("coat_lining", Man_Coat.current_id_t4l_lining);
        Man_Coat.render.redraw(this.options)
    },
    initInteractiveOptions: function(a) {
        $("div.interactive_options", a).each(function() {
            var b = $("input.option_input", this);
            var d = this;
            var c = $("div.option_trigger", this).click(function() {
                $("div.option_trigger", d).removeClass("active");
                $(this).addClass("active");
                b.val(this.getAttribute("rel"));
                if (window.mobile_enabled && d.getAttribute("fixed") != "fixed") {
                    $(this).trigger("select")
                }
                Man_Coat.redraw(true)
            });
            if (window.mobile_enabled && d.getAttribute("fixed") != "fixed") {
                c.filter(".active").trigger("select")
            }
        })
    },
    setModel_position: function(a) {
        Man_Coat.model_position = a;
        Man_Coat.render.setView(a)
    },
    updateNeck: function() {
        $("#options_coat_neck_flap").hide();
        var a = $("#hidden_coat_neck").val();
        if (a == "flap") {
            $("#options_coat_neck_flap").show()
        }
        if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
            $.uniform.update()
        }
        return false
    },
    updatePocketOptions: function(a) {
        $("#pocket2").hide();
        $("#pocket3").hide();
        if ($("#coat_pockets_2").is(":checked")) {
            $("#pocket2").show();
            if (!a) {
                $("#pocket2_op1").click()
            }
        } else {
            if ($("#coat_pockets_3").is(":checked")) {
                $("#pocket3").show();
                if (!a) {
                    $("#pocket3_op1").click()
                }
            }
        }
        if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
            $.uniform.update()
        }
        return false
    },
    updateBelt: function() {
        var a = ($("#coat_closure_trench").is(":checked")) ? true : false;
        if (a) {
            $("#coat_belt_loose").prop("disabled", 1);
            $("#coat_belt_0").click()
        } else {
            $("#coat_belt_loose").prop("disabled", 0)
        }
        if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
            $.uniform.update()
        }
    },
    updateClosure: function() {
        if ($("#coat_closure_zipper").is(":checked")) {
            $("#opt_closure_type_zipper").show();
            $("#opt_closure_type_boton").hide()
        } else {
            if ($("#coat_closure_boton").is(":checked")) {
                $("#opt_closure_type_boton").show();
                $("#opt_closure_type_zipper").hide()
            } else {
                if ($("#coat_closure_trench").is(":checked")) {
                    $("#opt_closure_type_boton").hide();
                    $("#opt_closure_type_zipper").hide()
                }
            }
        }
    },
    specialCases: function() {
        if (window.mobile_enabled) {
            var t = $("#hidden_coat_closure");
            var h = $("#hidden_coat_style");
            var i = $("#hidden_coat_neck");
            var g = $("#hidden_coat_neck_flap");
            var m = $("#hidden_coat_pockets");
            var n = $("#hidden_coat_pockets_type");
            var o = $("#hidden_coat_chest_pocket");
            var l = $("#hidden_coat_belt");
            var k = $("#hidden_coat_closure_type_zipper");
            var d = $("#hidden_coat_closure_type_boton");
            var b = $("#optional_front_closure");
            var r = $("#optional_neck_type");
            var q = $("#optional_type_boton");
            var e = $("#optional_type_zipper");
            var f = $("#loose_belt_2pockets");
            var c = $("#options_coat_pockets_type .3pockets_style");
            if (h.val() == "crossed") {
                if (i.val() == "flap") {
                    g.val("wide");
                    t.val("boton");
                    d.val("standard");
                    b.hide()
                } else {
                    t.val("zipper");
                    b.hide()
                }
                r.hide();
                if (t.val() == "zipper") {
                    q.hide();
                    e.show()
                } else {
                    q.hide();
                    e.hide()
                }
            } else {
                b.show();
                if (i.val() == "flap") {
                    b.hide();
                    t.val("boton");
                    r.show()
                } else {
                    r.hide()
                }
                if (t.val() == "zipper") {
                    e.show();
                    q.hide()
                } else {
                    if (t.val() == "boton") {
                        q.show();
                        e.hide()
                    } else {
                        q.hide();
                        e.hide()
                    }
                }
            }
            if (n.val() == "0") {
                m.val("0");
                f.show()
            } else {
                if (n.val() == "6" || n.val() == "7") {
                    m.val("3");
                    f.hide();
                    if (l.val() == "loose") {
                        l.val("0")
                    }
                } else {
                    m.val("2");
                    f.show()
                }
            }
            if (l.val() == "loose") {
                if (n.val() == "6") {
                    n.val("1");
                    m.val("2")
                } else {
                    if (n.val() == "7") {
                        n.val("2");
                        m.val("2")
                    }
                }
                c.hide()
            } else {
                c.show()
            }
            Man_Coat.updateClosure()
        } else {
            var h = $("#options_coat_style input:checked").val();
            var i = $("#hidden_coat_neck").val();
            $("#max_height_move div.conf_opt div.disabled").each(function(u, v) {
                $(v).parent().css("color", "#999")
            });
            var j = $("#coat_closure_trench");
            var s = $("#coat_closure_zipper");
            var a = $("#closure_type_hide_boton");
            var p = $("#closure_type_standard_boton");
            if (i == "flap") {
                if (h == "crossed") {
                    $("#options_coat_neck_flap").hide()
                } else {}
            } else {}
            if (h == "simple" && (i == "classic" || i == "standup")) {
                $("#coat_closure_boton").prop("disabled", 0);
                j.prop("disabled", 0)
            } else {
                j.prop("disabled", 1)
            }
            if (i != "flap") {
                s.prop("disabled", 0)
            } else {
                s.prop("disabled", 1);
                $("#coat_closure_boton").prop("disabled", 0)
            }
            if ($("#options_coat_style input:checked").val() == "simple") {
                a.prop("disabled", 0)
            } else {
                a.prop("disabled", 1)
            }
            if (h == "crossed" && i == "classic") {
                p.prop("disabled", 1)
            } else {
                p.prop("disabled", 0)
            }
            if ($("#closure_type_hide_boton").attr("disabled") && $("#closure_type_standard_boton").attr("disabled")) {
                $("#coat_closure_boton").attr("disabled", 1)
            }
            if ($("#coat_closure_trench").is(":checked")) {
                if ($("#coat_chest_pocket_patched").is(":checked")) {
                    $("#coat_chest_pocket_0").prop("checked", "checked")
                }
                $("#coat_chest_pocket_patched").prop("disabled", 1)
            } else {
                $("#coat_chest_pocket_patched").prop("disabled", 0)
            }
            if ($("#coat_belt_loose").is(":checked")) {
                $("#coat_pockets_3").prop("disabled", 1);
                if ($("#coat_pockets_3").is(":checked")) {
                    coat_pockets_2;
                    $("#coat_pockets_2").prop("checked", "checked");
                    $("#pocket3").hide();
                    $("#pocket2").show();
                    $("#pocket2_op1").click()
                }
            } else {
                $("#coat_pockets_3").prop("disabled", 0)
            }
            if ($("#coat_style_crossed").is(":checked") && $("#coat_style_crossed").attr("disabled")) {
                $("#coat_style_simple").prop("checked", "checked")
            } else {
                if ($("#coat_style_simple").is(":checked") && $("#coat_style_simple").attr("disabled")) {
                    $("#coat_style_crossed").prop("checked", "checked")
                }
            }
            if ($("#coat_closure_zipper").is(":checked") && (($("#closure_type_hide_zipper").attr("disabled") && $("#closure_type_standard_zipper").attr("disabled")) || $("#coat_closure_zipper").attr("disabled"))) {
                if (!$("#coat_closure_boton").attr("disabled")) {
                    if (!$("#closure_type_standard_boton").attr("disabled")) {
                        $("#coat_closure_boton").prop("checked", "checked");
                        $("#closure_type_standard_boton").prop("checked", "checked");
                        $("#opt_closure_type_zipper").hide();
                        $("#opt_closure_type_boton").show()
                    } else {
                        if (!$("#closure_type_hide_boton").attr("disabled")) {
                            $("#coat_closure_boton").prop("checked", "checked");
                            $("#closure_type_hide_boton").prop("checked", "checked");
                            $("#opt_closure_type_zipper").hide();
                            $("#opt_closure_type_boton").show()
                        } else {}
                    }
                }
            }
            if ($("#coat_closure_boton").is(":checked") && $("#closure_type_hide_boton").attr("disabled") && $("#closure_type_standard_boton").attr("disabled")) {
                if (!$("#coat_closure_zipper").attr("disabled")) {
                    if (!$("#closure_type_standard_zipper").attr("disabled")) {
                        $("#coat_closure_zipper").prop("checked", "checked");
                        $("#closure_type_standard_zipper").prop("checked", "checked");
                        $("#opt_closure_type_boton").hide();
                        $("#opt_closure_type_zipper").show()
                    } else {
                        if (!$("#closure_type_hide_zipper").attr("disabled")) {
                            $("#coat_closure_zipper").prop("checked", "checked");
                            $("#closure_type_hide_zipper").prop("checked", "checked");
                            $("#opt_closure_type_boton").hide();
                            $("#opt_closure_type_zipper").show()
                        } else {}
                    }
                }
            }
            if ($("#closure_type_hide_boton").is(":checked") && $("#closure_type_hide_boton").attr("disabled")) {
                if (!$("#closure_type_standard_boton").attr("disabled")) {
                    $("#closure_type_standard_boton").prop("checked", "checked")
                }
            }
            if ($("#coat_closure_trench").is(":checked") && $("#coat_closure_trench").attr("disabled")) {
                if (!$("#coat_closure_zipper").attr("disabled")) {
                    if (!$("#closure_type_standard_zipper").attr("disabled")) {
                        $("#coat_closure_zipper").prop("checked", "checked");
                        $("#closure_type_standard_zipper").prop("checked", "checked");
                        $("#opt_closure_type_boton").hide();
                        $("#opt_closure_type_zipper").show()
                    } else {
                        if (!$("#closure_type_hide_zipper").attr("disabled")) {
                            $("#coat_closure_zipper").prop("checked", "checked");
                            $("#closure_type_hide_zipper").prop("checked", "checked");
                            $("#opt_closure_type_boton").hide();
                            $("#opt_closure_type_zipper").show()
                        } else {}
                    }
                } else {
                    if (!$("#coat_closure_boton").attr("disabled")) {
                        if (!$("#closure_type_standard_boton").attr("disabled")) {
                            $("#coat_closure_boton").prop("checked", "checked");
                            $("#closure_type_standard_boton").prop("checked", "checked");
                            $("#opt_closure_type_zipper").hide();
                            $("#opt_closure_type_boton").show()
                        } else {
                            if (!$("#closure_type_hide_boton").attr("disabled")) {
                                $("#coat_closure_boton").prop("checked", "checked");
                                $("#closure_type_hide_boton").prop("checked", "checked");
                                $("#opt_closure_type_zipper").hide();
                                $("#opt_closure_type_boton").show()
                            } else {}
                        }
                    }
                }
            }
            if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
                $.uniform.update()
            }
            $("#max_height_move div.conf_opt div.disabled").each(function(u, v) {
                $(v).parent().css("color", "#DDD")
            })
        }
    },
    updatePrice: function() {
      /* Custom Scripts */

      var r = $("input[name='go_to']").val();

      if(r=="extras" || r=="fabric" || r=="configure") {

        $.ajax({
            type:"POST",
            async:false,
            url: "https://customclothiers.com/includes/action/price_update.php",
            data: {customizer_price: window.coat_price},
            /*success:function(data) 
            {
                alert(data);
            }*/
        });
      }

      else {

        console.log(window.coat_price);
        var b = 0;
        for (var a in window.coat_price) {
            if (Man_Coat.suit_type == "Man_Coat2" && (a == "lining_waistcoat" || a == "lining_back" || a == "initials_waistcoat")) {
                continue
            }
            b += window.coat_price[a] * 1
        }
        b = b.toFixed(2);
        if (b == parseInt(b)) {
            b = parseInt(b)
        }
        if (window.global_dsc) {
            $("#price_discount").html((b * window.global_dsc).toFixed(2) + "<small>$</small>")
        }
        $("#price_img").html(formatPrice(b, "configure"));
      }
    }
};