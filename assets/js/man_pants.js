var Man_Pants = {
    id_t4l_fabric: null,
    render: null,
    options_container: null,
    options: null,
    model_position: "front",
    filter_form: null,
    container_fabrics: null,
    button_code: null,
    shoe_color: null,
    bLazy: false,
     url:"https://customclothiers.com/",
    initCommon: function(c, b, e, d, a,z) {

        var o = $("div.controls").find("a.zoom");

         window.suit_price.base = window.suit_price.base;
        window.suit_price.fabric = window.suit_price.fabric;
        Man_Pants.updatePrice();

        Man_Pants.id_t4l_fabric = c;
        Man_Pants.options_container = (typeof(b) == "string") ? $(b) : b;
        Man_Pants.canvas = (typeof(e) == "string") ? $(e) : e;
        Man_Pants.button_code = (typeof(d) != "undefined") ? d : 1;
        Man_Pants.shoe_color = (typeof(a) != "undefined") ? a : "black";
        Man_Pants.render = new Man_Suit_3D(e, {
            product_type: "man_pants",
            fabric: {
                pants: "141"
            },
            pants_button_code: Man_Pants.button_code,
            shoes_color: Man_Pants.shoe_color
        });
        $("#change_position").click(function() {
            Man_Pants.setModel_position((Man_Pants.model_position == "front") ? "back" : "front")
        });
        if (typeof(Blazy) != "undefined") {
            Man_Pants.bLazy = new Blazy({
                success: function(f) {
                    f.parentNode.className = f.parentNode.className.replace(/\loading\b/, "")
                }
            })
        }

        function c(u) {

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

                c("in")

            } else {

                c("out")

            }

            return false

        });

        c("in");
    },
    initConfigure: function(def) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        
        /*if(def_fab_id == def && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $(".controls").show();
        }
        else if(def_fab_id != def && action=="update") {
          $("#model_3d_preview").css('display','none');
          $("#model_3d_preview1").html("<img src='"+p_img_dtl+"'>");
          $("#box_change_position").hide();
          $(".controls").hide();
       }
       else {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $(".controls").show();
       }*/

        $("a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            $("#go_to").attr('value','fabric');
            Man_Pants.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
            $("#go_to").attr('value','fabric');
            Man_Pants.updatePrice();
            $("#configure_form").submit();
            return false
        });
        if (window.mobile_enabled) {
            var b = false;

            function c() {
                if (b) {
                    b.hide();
                    b = false;
                    $("body").css("overflow", "")
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

            function d() {
                c();
                var f = History.getState();
                if (typeof(f.data.rel) != "undefined") {
                    b = $(f.data.rel).show();
                    if (!b.hasClass("manual_close")) {
                        b.addClass("manual_close").click(function() {
                            History.back()
                        })
                    }
                    $("body").css("overflow", "hidden")
                }
            }
            History.Adapter.bind(window, "statechange", d);
            d()
        } else {
            $("input.uniform").uniform()
        }
        if (window.mobile_enabled) {
            var a = $(".options_list").find("a");
            $(".option_trigger").bind("select", function() {
                a.filter("." + this.parentNode.parentNode.id).text($(".pants-icon", this).text())
            })
        }
        Man_Pants.initInteractiveOptions(Man_Pants.options_container);
        $("div.radio_opt input, div.common_th ", Man_Pants.options_container).click(function() {

            /*$("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $(".controls").show();*/
        
            var g = $(this).attr("layer");
            var f = Man_Pants.render.lmanager.layers[g].position;
            if (f != Man_Pants.model_position) {
                Man_Pants.setModel_position(f)
            }
            Man_Pants.redraw(true)
        });
        if (window.mobile_enabled) {
            $("#pants_back_pocket div.option_trigger").click(function() {
                var f = $(this).attr("num_pockets");
                $("#input_pants_back_pocket").val(f);
                Man_Pants.redraw(true)
            })
        } else {
            function e() {
                var f = $("#box_back_pocket input.num_b:checked").val();
                if (f == 0) {
                    $("#box_back_pocket_img .box_pocket").hide()
                } else {
                    if (f == 1) {
                        $("#box_back_pocket_img .box_pocket").show()
                    } else {
                        if (f == 2) {
                            $("#box_back_pocket_img .box_pocket").show()
                        }
                    }
                }
            }
            $("#box_back_pocket input").click(e);
            e()
        }
        Man_Pants.redraw(true);
        $("#loading_fabric").hide()
    },
    initFabrics: function(def1) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        
        /*if(def_fab_id == def1 && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $(".controls").show();
        }
        else if(def_fab_id != def1 && action=="update") {
          $("#model_3d_preview").css('display','none');
          $("#model_3d_preview1").html("<img src='"+p_img_dtl+"'>");
          $("#box_change_position").hide();
          $(".controls").hide();
       }
       else {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $(".controls").show();
       }*/
        
        $fab_price = $("input[name='fabric_price']").val();
        $fab_id =  $("input[name='fabric_id']").val();
        $("input[name='fabric_price']").val($fab_price);
        $("input[name='fabric_id']").val($fab_id); 

        $title1 = $('a.select:first').attr("title");

         if($title1.trim()=='In-Store Fabric Selection')
            $(".instore_fab").show();

        var q = $("#fabric_preview_layer");
        var k = 0;
        Man_Pants.redraw(true);
        if (typeof(initCollectionGenerator) == "function") {
            initCollectionGenerator(Man_Pants, ["front", "back"])
        }

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

             /*if($fabric_id == $fabric_id1) {
              $("#model_3d_preview").css('display','block');
              $("#model_3d_preview1").css('display','none');
              $("#box_change_position").show();
              $(".controls").show();
            }*/
            

            $(".suit_fabric").removeClass("selected").filter(".suit_fabric_" + $fabric_id).addClass("selected");
            $fab_name.html('<b>'+ $title + '</b>');
            $fab_composition.text($composition);
            $fab_img.removeAttr('style');
            //$fab_img.attr('style','background:url('+Man_Pants.url+'assets/dimg/fabric/'+$fabric_id+'_big.jpg)');
            $(".fabimgs").attr('src',""+Man_Pants.url+'assets/dimg/fabric/'+$fabric_id+'_normal.jpg');
            window.suit_price.fabric = window.fabric_prices[$fabric_id];
            Man_Pants.updatePrice();
        }
        });

        $("a.next").click(function() {
            if (window.mobile_enabled) {
                var s = $("input#id_t4l_fabric").val();
                var r = $("#slider_fabrics div.suit_fabric_" + s);
                Man_Pants.render.setFabric("pants", s);
                Man_Pants.render.setPantsButtonCode(r.attr("button_code"));
                Man_Pants.render.setShoesColor(r.attr("shoe_color"));
                Man_Pants.redraw(true)
            }
            Man_Pants.setModel_position("front");
            Man_Pants.createInputsImgs();
            $(this).addClass("icon-loading").iosRefresh();

             $instore_fab = $("input[name='instore_fabric']").val();
            $fab_title = $(".fabric_thumb.selected").find(".title").text();

            if($instore_fab!='' && $fab_title.trim()=='In-Store Fabric Selection' || $instore_fab=='' && $fab_title.trim()!='In-Store Fabric Selection')
            {
              $("#go_to").attr("value","fabric");
                Man_Pants.updatePrice();
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
                $("body").scrollTop(k)
            } else {
                $("#go_to").attr("value", "configure");
                Man_Pants.updatePrice();
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
                Man_Pants.updatePrice();
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
        Man_Pants.container_fabrics = $("#slider_fabrics");
        Man_Pants.filter_form = $("#filters");
        var o = [];

        function a(r) {
            if (r) {
                Man_Pants.id_t4l_fabric = r;
                Man_Pants.render.setFabric("pants", r);
                Man_Pants.render.setPantsButtonCode(Man_Pants.button_code);
                Man_Pants.render.setShoesColor(Man_Pants.shoe_color);
                Man_Pants.render.redraw()
            }
        }

        function j() {
            var s = $("#fabric_view_3d");
            var t = $(window).height() - 132;
            var r = $(window).width();
            if (r < t) {
                s.find("img").height(t)
            } else {
                s.find("img").width(r)
            }
        }

        function e(r) {
            $("#id_t4l_fabric").attr("value", r.id_t4l_fabric);
            var s = "?action=view&id=" + r.id_t4l_fabric;
            var u = ($("html").prop("lang") == "ru" && document.all) ? encodeURI(s) : s;
            if (window.mobile_enabled) {
                k = $("body").scrollTop();
                $("body, html").css("overflow", "hidden");
                q.find(".info_box").html("").load(s, j);
                q.show();
                return true
            }
            //$("#preview_fabric_3d_common div.preview").css("background", "url(/dimg/fabric/" + r.id_t4l_fabric + "_big.jpg) top right no-repeat");
            $(".fabimgs").attr('src',""+Man_Pants.url+'assets/dimg/fabric/'+ r.id_t4l_fabric +'_normal.jpg');
            $("#preview_fabric_3d_common div.preview a.view_fabric").attr("href", s);
            $("#preview_fabric_3d_common div.preview #rank_label").removeClass();
            $("#preview_fabric_3d_common div.preview #rank_label").addClass(r.rank);
            $("#fabric_simple_composition").html(r.simple_composition);
            if (r.brightness != "normal") {
                $("#fabric_brightness span").html(r.brightness);
                $("#is_fabric_brightness").show()
            } else {
                $("#fabric_brightness span").html("");
                $("#is_fabric_brightness").hide()
            }
            $("#preview_fabric_3d_common #fabric_name").html("<b>" + r.name + "</b>");
            if ($("html").prop("lang") == "ru") {
                $("#second_row_info").html(r.composition + " - " + r.fabric_weight + "гр/м - " + r.season)
            } else {
                $("#second_row_info").html(r.composition + " - " + r.fabric_weight + "gr/m2 - " + r.season)
            }
            $(".colorbox3d").magnificPopup({
                type: "iframe"
            });
            $("#slider_fabrics div.selected").removeClass("selected").find("img.selected").hide();
            var t = $("#shirt_fabric_" + r.id_t4l_fabric).closest(".fabric_box_3d");
            t.find("img.selected").show();
            t.find("div.shirt_fabric").addClass("selected");
            a(r.id_t4l_fabric)
        }
        var d = false;

        /*function b() {
            $("#loading_fabric").show();
            $("#current_fabric").hide();
            var s = document.location.toString();
            if ($("html").prop("lang") == "ru" && document.all) {
                s = encodeURI(s)
            }
            s = s.split("?")[0];
            if (window.mobile_enabled) {
                var r = {
                    type: [],
                    tone: [],
                    texture: [],
                    thread_style: []
                };
                $("#filters div.filter").each(function() {
                    var t = this.getAttribute("name");
                    $("a.current", this).not(".all").each(function() {
                        r[t].push(this.getAttribute("rel"))
                    })
                })
            } else {
                var r = {
                    season: [],
                    rank: [],
                    tone: [],
                    texture: [],
                    type: []
                };
                $("#filters div.filter").each(function() {
                    var t = this.getAttribute("name");
                    $("input:checked", this).not(".all").each(function() {
                        r[t].push($(this).val())
                    })
                })
            }
            Man_Pants.container_fabrics.load(s + "?action=filter", r, function() {
                $("a.select", this).click(function() {
                    var y = {
                        ref: $(this).attr("ref"),
                        name: $(this).attr("name"),
                        composition: $(this).attr("composition"),
                        category: $(this).attr("category"),
                        id_t4l_fabric: $(this).attr("rel"),
                        type: $(this).attr("type"),
                        thread_count: $(this).attr("thread_count"),
                        extra_fabric: $(this).attr("extra"),
                        rank: $(this).attr("rank"),
                        simple_composition: $(this).attr("simplecomposition"),
                        brightness: $(this).attr("brightness"),
                        fabric_weight: $(this).attr("fabric_weight"),
                        season: $(this).attr("season")
                    };
                    y.fabric_weight = $(this).attr("fabric_weight");
                    y.season = $(this).attr("season");
                    if (window.mobile_enabled) {
                        y.option = "fabric";
                        History.pushState(y, window.title, "?option=fabric&id_t4l_fabric=" + y.id_t4l_fabric);
                        return false
                    }
                    Man_Pants.button_code = $(this).attr("button_code");
                    Man_Pants.shoe_color = $(this).attr("shoe_color");
                    window.suit_price.fabric = y.extra_fabric ? y.extra_fabric : 0;
                    Man_Pants.updatePrice();
                    e(y);
                    $("#fabric_3d div.slider_box img.selected").hide();
                    $("#fabric_3d div.slider_box div.selected").removeClass("selected");
                    var z = $(this).closest(".fabric_box_3d");
                    z.find("img.selected").show();
                    z.children(":first").addClass("selected");
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove()
                }
                if (!window.mobile_enabled) {
                    createSlideshow(Man_Pants.container_fabrics.parent(), false, false, true)
                }
                o = [];
                Man_Pants.container_fabrics.find("div.suit_fabric").each(function() {
                    o.push(this.getAttribute("rel"))
                });
                if (window.mobile_enabled) {
                    var v = 0;
                    if (!$(this).hasClass("first_load")) {
                        $(this).addClass("first_load");
                        var w = $(".selected", this);
                        if (w.length) {
                            v = w.offset().top - 200
                        }
                    }
                    $("html, body").animate({
                        scrollTop: v
                    }, 500)
                } else {
                    var x = Man_Pants.container_fabrics.find("div.suit_fabric[title], div.suit_fabric img[title]");
                    initTooltips(x)
                }
                if (Man_Pants.bLazy) {
                    Man_Pants.bLazy.revalidate()
                }
                $("#slider_fabrics .thumb_preview").magnificPopup({
                    type: "iframe"
                });
                if (d) {
                    $(window).scrollTop(480)
                } else {
                    d = true
                }
                var t = "";
                $("#filters input:checked").not(".all").each(function() {
                    var A = $(this).parent().text();
                    var y = this.getAttribute("name");
                    var z = this.getAttribute("value");
                    t += "<li>" + A + ' <a href="javascript:;" class="del" name="' + y + '" value="' + z + '">x</a></li>'
                });
                if (t) {
                    var u = "Your<br>filters";
                    switch ($("html").prop("lang")) {
                        case "es":
                            u = "Tus<br>filtros";
                            break;
                        case "it":
                            u = "I tuoi<br>filtri";
                            break;
                        case "fr":
                            u = "Votre<br>filtre";
                            break;
                        case "de":
                            u = "Ihre<br>Filter";
                            break;
                        case "ru":
                            u = "Ваши<br>фильтры";
                            break;
                        case "cn":
                            u = "您的过滤器";
                            break
                    }
                    t = '<ul><li class="first">' + u + "</li>" + t + "</ul>";
                    $("#current_filters").html(t).show()
                } else {
                    $("#current_filters").html(t).hide()
                }
                $("#loading_fabric").fadeOut("fast")
            })
        }
        b();*/
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
                b();
                History.back()
            });

            function c() {
                var r = History.getState();
                $("body, html").css("overflow", "visible");
                $("#body_height").css("position", "relative");
                $("#filters").hide();
                q.hide();
                switch (r.data.option) {
                    case "filters":
                        $("body, html").css("overflow", "hidden");
                        $("#body_height").css("position", "initial");
                        $("#filters").show();
                        break;
                    case "fabric":
                        e(r.data);
                        break
                }
                $(window).scroll()
            }
            History.Adapter.bind(window, "statechange", c);
            c();
            Man_Pants.filter_form.find("a.filter").click(function() {
                var u = $(this);
                var s = u.hasClass("current");
                var v = u.parents(".filter");
                if (u.hasClass("all")) {
                    if (s) {
                        return false
                    }
                    v.find("a").not(this).removeClass("current")
                } else {
                    var r = v.find("a.all");
                    if (s) {
                        if (v.find("a.current").length <= 1) {
                            r.addClass("current")
                        }
                    } else {
                        r.removeClass("current")
                    }
                }
                u.toggleClass("current")
            });
            var p = $("#sticky_header");
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 40) {
                    p.addClass("fixed")
                } else {
                    p.removeClass("fixed")
                }
            })
        } else {
            var n = false;
            var f = false;

            function m() {
                if (n) {
                    n.hide();
                    f.removeClass("current");
                    n = false;
                    f = false
                }
            }
            Man_Pants.filter_form.find("a.dropdown").mouseover(function() {
                var r = this.getAttribute("href").replace(/^[^#]/, "");
                m();
                f = $(this).addClass("current");
                n = $(r).show()
            }).click(function() {
                return false
            });
            Man_Pants.filter_form.mouseleave(m);
            $("#current_filters").on("click", "a.del", function() {
                var s = this.getAttribute("name");
                var t = this.getAttribute("value");
                current_fabric_options = $("#filters input[name='" + s + "'][value='" + t + "']").prop("checked", 0).closest(".filter");
                var r = true;
                current_fabric_options.find("input:checked").not(".all").each(function() {
                    r = false
                });
                if (r) {
                    current_fabric_options.find("input.all").prop("checked", 1).prop("disabled", 1)
                }
                b()
            });
            var p = $('<div class="fabric_sticky_header"><div class="body_box"></div></div>');
            $("body").append(p);
            var l = $(".product_title_3d:eq(0)");
            var i, h, g;
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 520) {
                    if (!i) {
                        Man_Pants.filter_form.addClass("sticky");
                        i = true
                    }
                } else {
                    if (i) {
                        Man_Pants.filter_form.removeClass("sticky");
                        i = false
                    }
                }
                if ($(window).scrollTop() >= 191) {
                    if (!h) {
                        p.show();
                        l.addClass("sticky");
                        h = true
                    }
                } else {
                    if (h) {
                        p.hide();
                        l.removeClass("sticky");
                        h = false
                    }
                }
                if ($(window).scrollTop() >= 191) {
                    if (!g) {
                        $(".test_B #move").addClass("fixit");
                        $(".test_B #box_mini_next_3d").addClass("fixit");
                        g = true
                    }
                } else {
                    if (g) {
                        $(".test_B #move").removeClass("fixit");
                        $(".test_B #box_mini_next_3d").removeClass("fixit");
                        g = false
                    }
                }
            });
            Man_Pants.filter_form.find("ul.filter input").click(function() {
                var s = $(this);
                var v = $(this).prop("checked");
                var u = s.parents(".filter");
                if (s.hasClass("all")) {
                    if (v) {
                        u.find("input").not(s, u).removeAttr("checked")
                    }
                    s.attr("disabled", 1)
                } else {
                    var w = u.find("input.all");
                    if (v) {
                        var x = w.prop("checked");
                        w.removeAttr("disabled");
                        if (x) {
                            w.removeAttr("checked")
                        }
                    } else {
                        var r = true;
                        u.find("input").not(s, u).each(function() {
                            if ($(this).prop("checked")) {
                                r = false
                            }
                        });
                        if (r) {
                            w.click()
                        }
                    }
                }
                b()
            });
            $(".colorbox3d").magnificPopup({
                type: "iframe"
            })
        }
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
    initExtras: function() {},
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
            });
            if (window.mobile_enabled && d.getAttribute("fixed") != "fixed") {
                c.filter(".active").trigger("select")
            }
        })
    },
    setModel_position: function(a) {
        Man_Pants.model_position = a;
        Man_Pants.render.setView(a)
    },
    importOptions: function() {
        Man_Pants.options = {};
        Man_Pants.options_container.find("input:checked, input:hidden").each(function() {
            Man_Pants.options[this.name] = this.value
        })
    },
    redraw: function(a) {
        if (a) {
            Man_Pants.importOptions()
        }
        Man_Pants.render.redraw(this.options);
        Man_Pants.cloth_open = false
    },
    updatePrice: function() {

        var r = $("input[name='go_to']").val();
      if(r=="fabric" || r=="configure") {
        $.ajax({
            type:"POST",
            async:false,
            url: "https://customclothiers.com/includes/action/price_update.php",
            data: {customizer_price: window.suit_price},
            /*success:function(data) {
                alert(data);

      }*/
        });
      }

      else {
        console.log(window.suit_price);
        var b = 0;
        for (var a in window.suit_price) {
            b += window.suit_price[a] * 1
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