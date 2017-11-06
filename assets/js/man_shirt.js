var Man_Shirt = {
    base_src: window.cdn_host + "3d/man/shirt/",
    lmanager: null,
    length_units: length_units,
    id_t4l_fabric: default_fabric_id,
    id_t4l_fabric1: "1340",
    button_color: button_color,
    container: container,
    config: config,
    extras: extras,
    filter_form: "#filters",
    bLazy: false,
    url:"https://customclothiers.com/",
    sample:"",
    initLanding: function(a) {
        $("#t4l_landing.shirt .imgLinkShirt").click(function() {
            window.location = a
        })
    },
    initCommon: function() {

        var o = $("div.controls").find("a.zoom");

        window.shirt_price.fabric =  window.shirt_price.fabric;
        window.shirt_price.button_holes_threads_jacket= window.shirt_price.button_holes_threads_jacket;
        window.shirt_price.handkerchief= window.shirt_price.handkerchief;
        window.shirt_price.neck_lining= window.shirt_price.neck_lining;
        window.shirt_price.patches_jacket= window.shirt_price.patches_jacket;
        window.shirt_price.initials_jacket= 0;
        Man_Shirt.updatePrice();


        if (window.mobile_enabled) {
            $(window).bind("pageshow", function(c) {
                if (c.originalEvent.persisted) {
                    window.location.reload();
                    return
                }
            })
        }
        if ($("#configure_form").length) {
            var b = {};
            jQuery.each(jQuery("#configure_form").serializeArray(), function(c, d) {
                b[d.name] = d.value
            });
            Man_Shirt.config = $.merge(b, Man_Shirt.config)
        }
        if ($("#fabric_form").length) {}
        if ($("#extra_form").length) {
            var a = {};
            jQuery.each(jQuery("#extra_form").serializeArray(), function(c, d) {
                a[d.name] = d.value
            });
            Man_Shirt.extras = $.merge(a, Man_Shirt.extras)
        }
        if (typeof(Blazy) != "undefined") {
            Man_Shirt.bLazy = new Blazy({
                success: function(c) {
                    c.parentNode.className = c.parentNode.className.replace(/\loading\b/, "")
                }
            })
        }

        function c(u) {

                switch (u) {

                    case "in":

                        $("#model_3d_preview").css('width','299px');
                        o.hide().filter(".out").show();
                        break;

                    case "out":

                        $("#model_3d_preview").css('width','200px');
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
            $("#show_hide_pieces").show();
            $(".controls").show(); 
        }
        else if(def_fab_id != def && action=="update") {
          $("#model_3d_preview").css('display','none');
          $("#model_3d_preview1").html("<img src='"+p_img_dtl+"'>");
          $("#box_change_position").hide();
            $("#show_hide_pieces").hide(); 
            $(".controls").hide();
       }
       else {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show(); 
            $(".controls").show();
       }*/

        if (/\bMSIE 7/.test(navigator.userAgent)) {
            $("div.body_product_box_3d div.box_opts .all_cuffs").css("height", "100%");
        }
        Man_Shirt.load3dCommon();
        if (window.mobile_enabled) {
            var b = false;

            function e() {
                if (b) {
                    b.hide();
                    b = false;
                    $("body").css("overflow", "")
                }
            }
            $(".options a").click(function() {
                var h = this.getAttribute("href").replace("/^[^#]/", "");
                var i = h.replace("#", "");
                History.pushState({
                    option: i,
                    rel: h
                }, window.title, "?option=" + i);
                return false
            });

            function g() {
                e();
                var h = History.getState();
                if (typeof(h.data.rel) != "undefined") {
                    b = $(h.data.rel).show();
                    if (!b.hasClass("manual_close")) {
                        b.addClass("manual_close").click(function() {
                            History.back()
                        })
                    }
                    $("body").css("overflow", "hidden")
                }
            }
            History.Adapter.bind(window, "statechange", g);
            g()
        } else {
            initQTip($("a.ico.tooltip"));
            $("input.uniform", Man_Shirt.container).uniform();
            $("select.uniform", Man_Shirt.container).uniform()
        }
        $("a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            $("#go_to").attr("value","fabric");
            Man_Shirt.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
        	$("#go_to").attr("value","fabric");
            Man_Shirt.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_extras").click(function() {
            $("#go_to").attr("value", "extras");
            Man_Shirt.updatePrice();
            $("#configure_form").submit();
            return false
        });
        if (window.mobile_enabled) {
            var a = $(".options_list").find("a");
            $(".option_trigger").bind("select", function() {
                var h = this.parentNode.parentNode.id;
                if (h == "box_chest_pocket_imgs") {
                    h = "shirt_chest_pocket"
                }
                a.filter("." + h).text($(".shirt-icon", this).text())
            })
        }
        Man_Shirt.initInteractiveOptions(Man_Shirt.container);

        function d() {
            var h = $("#neck_buttons").val();
            var i = 0;
            switch (Man_Shirt.length_units) {
                case "in":
                    i = (h == 1) ? 1.5 : 2;
                    break;
                default:
                    i = (h == 1) ? 4 : 5;
                    break
            }
            $("#collar_height").text(i)
        }
        $("#neck_buttons").change(d);
        d();
        if (window.mobile_enabled) {
            $("#box_chest_pocket_imgs .option_trigger").click(function() {
                var h = $(this).attr("rel");
                var i = 0;
                if (h == 1 || h == 2) {
                    i = 1
                } else {
                    if (h == 3 || h == 4) {
                        i = 2
                    }
                }
                $("#hidden_chest_pocket_num").val(i)
            })
        } else {
            function f() {
                var h = $("#box_chest_pocket input.num_b:checked").val();
                if (h == 0) {
                    $("#box_chest_pocket_imgs .1pocket").hide();
                    $("#box_chest_pocket_imgs .2pocket").hide()
                } else {
                    if (h == 1) {
                        $("#box_chest_pocket_imgs .1pocket").show();
                        $("#box_chest_pocket_imgs .2pocket").hide()
                    } else {
                        if (h == 2) {
                            $("#box_chest_pocket_imgs .2pocket").show();
                            $("#box_chest_pocket_imgs .1pocket").hide()
                        }
                    }
                }
            }
            $("#box_chest_pocket input").click(f);
            f()
        }
        $("a.view_all", Man_Shirt.container).click(function() {
            var h = $(this).attr("rel");
            $("div.conf_opt ." + h, Man_Shirt.container).css("height", "100%");
            $(this).hide()
        });
        $("div.radio_opt input", Man_Shirt.container).click(function() {

            /*$("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show(); 
            $(".controls").show();*/

            var h = $(this).attr("value");
            $(this).closest("div.radio_opt").find("label").removeClass("checked");
            $(this).closest("label").addClass("checked");
            switch (h) {
                case "0":
                    $(this).closest("div.box_opt").find("div.list_common_th input.option_input").attr("value", "");
                    $(this).closest("div.box_opt").find("div.list_common_th div.option_trigger").removeClass("active");
                    $(this).closest("div.box_opt").find("div.list_common_th").removeClass("open").addClass("close");
                    break;
                case "1":
                case "2":
                    $(this).closest("div.box_opt").find("div.list_common_th").removeClass("close").addClass("open");
                    break;
                default:
                    break
            }
        });
        $("div.radio_opt input, div.common_th ", Man_Shirt.container).click(Man_Shirt.load3dCommon);
        $("#neck_buttons").change(Man_Shirt.load3dCommon);

        function c() {
            var i = ".always_hard";
            var j = 0;
            if ($("#shirt_neck_no_interfacing").prop("checked")) {
                j = 1
            } else {
                j = 0
            }
            if (j == 1) {
                $(i).hide()
            }
            $("#shirt_neck_no_interfacing").click(function() {
                if ($(this).prop("checked")) {
                    console.log("checked");
                    $(i).hide();
                    var k = $("div.body_product_box_3d div.box_opts .list_common_th.all_necks div.option_trigger.active").attr("rel");
                    if (k == 6 || k == 5) {
                        $("#neck_default_interfacing").click()
                    }
                    var l = $("div.body_product_box_3d div.box_opts .list_common_th.all_cuffs div.option_trigger.active").attr("rel");
                    if (l == 5 || l == 6 || l == 9 || l == 10) {
                        $("#cuff_default_interfacing").click()
                    }
                } else {
                    console.log("not checked");
                    $(this).prop("checked",0);
                    $("#uniform-shirt_neck_no_interfacing").parents("label").removeClass("checked");
                    $(i).show()
                }
            });
            $("div.body_product_box_3d div.box_opts .list_common_th.all_necks div.option_trigger").click(function() {
                var k = $(this).attr("rel");
                var l = $("div.body_product_box_3d div.box_opts .list_common_th.all_cuffs div.option_trigger.active").attr("rel");
                if (k == 6) {
                    $("#neck_buttons").disableOptions([2]);
                    $("#opt_1_btn").attr("selected", "selected").click();
                    $("#global_neck_buttons").hide();
                    if (Man_Shirt.length_units == "in") {
                        $("#collar_height").html("1.5")
                    } else {
                        $("#collar_height").html("4")
                    }
                    $("#box_shirt_neck_type").hide();
                    $.uniform.update();
                    Man_Shirt.load3dCommon()
                } else {
                    if (k == 5) {
                        $("#box_shirt_neck_type").hide();
                        $("#neck_buttons").disableOptions([]);
                        $("#global_neck_buttons").show();
                        $.uniform.update()
                    } else {
                        $("#neck_buttons").disableOptions([]);
                        $("#global_neck_buttons").show();
                        if (l != 5 && l != 6 && l != 9 && l != 10) {
                            $("#box_shirt_neck_type").show()
                        }
                        $.uniform.update()
                    }
                }
            });
            if ($("#opt_smoking").hasClass("active")) {
                $("#neck_buttons").disableOptions([2]);
                $("#global_neck_buttons").hide()
            }
            $("#shirt_sleeve_short").click(function() {
                $("#box_shirt_cuffs").hide()
            });
            $("#shirt_sleeve_long").click(function() {
                $("#box_shirt_cuffs").show()
            });
            $("#shirt_chest_pocket_0").click(function() {
                $("#box_chest_pocket_imgs").hide()
            });
            $("#shirt_chest_pocket1").click(function() {
                $("#box_chest_pocket_imgs").show()
            });
            $("#shirt_chest_pocket2").click(function() {
                $("#box_chest_pocket_imgs").show()
            });
            if ($("#shirt_sleeve_short").is(":checked")) {
                $("#box_shirt_cuffs").hide()
            }
            $("#shirt_sleeve_short").click(function() {
                $("#cuff_default_interfacing").click();
                $("#box_shirt_cuffs_type").hide()
            });
            $("#shirt_sleeve_long").click(function() {
                $("#box_shirt_cuffs_type").show()
            });
            if ($("#shirt_sleeve_short").is(":checked")) {
                $("#box_shirt_cuffs_type").hide()
            }
            $("div.body_product_box_3d div.box_opts .list_common_th.all_cuffs div.option_trigger").click(function() {
                var k = $(this).attr("rel");
                var l = $("div.body_product_box_3d div.box_opts .list_common_th.all_necks div.option_trigger.active").attr("rel");
                if (k == 5 || k == 6 || k == 9 || k == 10 || l == 6 || l == 5) {
                    $("#box_shirt_neck_type").hide()
                } else {
                    $("#box_shirt_neck_type").show()
                }
                $.uniform.update()
            });
            if (window.mobile_enabled) {
                var h = $("#inp_shirt_sleeve");
                $("#shirt_cuffs .option_trigger").click(function() {
                    var k = $(this).attr("rel");
                    if (k != "short") {
                        k = "long"
                    }
                    h.val(k);
                    Man_Shirt.load3dCommon()
                })
            }
        }
        c();
        $("#loading_fabric").hide()
    },
    initFabric: function(def1) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        
        /*if(def_fab_id == def1 && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show(); 
        }
        else if(def_fab_id != def1 && action=="update") {
          $("#model_3d_preview").css('display','none');
          $("#model_3d_preview1").html("<img src='"+p_img_dtl+"'>");
          $("#box_change_position").hide();
            $("#show_hide_pieces").hide();
            $(".controls").hide(); 
       }
       else {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show(); 
       }*/

    	$fab_price = $("input[name='fabric_price']").val();
        $fab_id =  $("input[name='fabric_id']").val();
        $("input[name='fabric_price']").val($fab_price);
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

            /*if($fabric_id == $fabric_id1) {
              $("#model_3d_preview").css('display','block');
              $("#model_3d_preview1").css('display','none');
              $("#box_change_position").show();
              $("#show_hide_pieces").show();
              $(".controls").show(); 
            }*/
            

            
            if($fab_price!='')
               $fab_price = parseFloat($fab_price);
            else
               $fab_price=0;

            $("input[name='fabric_price']").val($fab_price);  

            $(".suit_fabric").removeClass("selected").filter(".suit_fabric_" + $fabric_id).addClass("selected");
            $fab_name.html('<b>'+ $title + '</b>');
            $fab_composition.text($composition);
            $fab_img.removeAttr('style');
            //$fab_img.attr('style','background:url('+Man_Shirt.url+'assets/dimg/fabric/'+$fabric_id+'_big.jpg)');
            $(".fabimgs").attr('src',""+Man_Shirt.url+'assets/dimg/fabric/'+$fabric_id+'_normal.jpg');
            window.shirt_price.fabric = window.fabric_prices[$fabric_id];
            Man_Shirt.updatePrice();
          }
        });

        var q = $("#fabric_preview_layer");
        var k = 0;
        $("a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
           
            $instore_fab = $("input[name='instore_fabric']").val();
            $fab_title = $(".fabric_thumb.selected").find(".title").text();
            
            if($instore_fab!='' && $fab_title.trim()=='In-Store Fabric Selection' || $instore_fab=='' && $fab_title.trim()!='In-Store Fabric Selection')
            {
               $("#go_to").attr('value','extras');
                Man_Shirt.updatePrice();
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
                Man_Shirt.updatePrice();
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
                Man_Shirt.updatePrice();
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
               $("#go_to").attr("value","extras");
                Man_Shirt.updatePrice();
                $("#fabric_form").submit();
                return false
            }
            else
            {
                alert("Please Enter In Store Fabric Name");
            }
            
        	
        });
        if (!window.mobile_enabled) {
            initQTip($("div#filters table.btn_filter a.filter").not(".first"))
        }
        if (!window.mobile_enabled) {
            Man_Shirt.load3dCommon()
        }
        if (typeof(Man_Shirt.container) == "string") {
            Man_Shirt.container = $(Man_Shirt.container)
        }
        if (typeof(Man_Shirt.filter_form) == "string") {
            Man_Shirt.filter_form = $(Man_Shirt.filter_form)
        }
        var o = [];

        function a(r) {
            if (Man_Shirt.config) {
                Man_Shirt.id_t4l_fabric = "1340";
                Man_Shirt.load3dCommon()
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

        /*function e(r) {
            $("#id_t4l_fabric").attr("value", r.id_t4l_fabric);
            var s = "?action=view&id=" + r.id_t4l_fabric;
            var v = ($("html").prop("lang") == "ru" && document.all) ? encodeURI(s) : s;
            if (window.mobile_enabled) {
                k = $("body").scrollTop();
                $("body, html").css("overflow", "hidden");
                q.find(".info_box").html("").load(s, j);
                q.show();
                return true
            }
            $("#preview_fabric_3d_common div.preview").css("background", "url(/dimg/fabric/shirt/" + r.id_t4l_fabric + "_big.jpg) top right no-repeat");
            $("#preview_fabric_3d_common div.preview a.view_fabric").attr("href", v);
            $("#preview_fabric_3d_common #fabric_ref").html(r.ref);
            if ($("html").prop("lang") == "ru") {
                var t = "<span><b>" + r.name + "</b></span>, " + r.composition + " - " + r.fabric_weight + "гр/м - " + r.season
            } else {
                var t = "<span><b>" + r.name + "</b></span>, " + r.composition + " - " + r.fabric_weight + "gr/m2 - " + r.season
            }
            $("#preview_fabric_3d_common #fabric_name").html(t);
            $("#preview_fabric_3d_common .category").html(r.category);
            $("#fabric_simple_composition").html(r.simple_composition);
            if (r.thread_style == "Fil Coupé") {
                $("#fabric_thread_style").show();
                $("#fabric_thread_style").html(r.thread_style)
            } else {
                $("#fabric_thread_style").hide()
            }
            $(".colorbox3d").magnificPopup({
                type: "iframe"
            });
            Man_Shirt.button_color = r.button_color;
            window.shirt_price.fabric = r.extra_fabric ? r.extra_fabric : 0;
            Man_Shirt.updatePrice();
            $("#slider_fabrics div.selected").removeClass("selected").find("img.selected").hide();
            var u = $("#shirt_fabric_" + r.id_t4l_fabric).closest(".fabric_box_3d");
            u.find("img.selected").show();
            u.find("div.shirt_fabric").addClass("selected");
            a(r.id_t4l_fabric)
        }
        var d = false;*/

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
                    season: [],
                    type: [],
                    tone: [],
                    texture: [],
                    simple_composition: []
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
                    category: [],
                    tone: [],
                    texture: [],
                    simple_composition: []
                };
                $("#filters div.filter").each(function() {
                    var t = this.getAttribute("name");
                    $("input:checked", this).not(".all").each(function() {
                        r[t].push($(this).val())
                    })
                })
            }
            Man_Shirt.container.load(s + "?action=filter", r, function() {
                var x = $("a.select", this).bind("click", function() {
                    var A = {
                        ref: $(this).attr("ref"),
                        name: $(this).attr("name"),
                        simple_composition: $(this).attr("simple_composition"),
                        thread_style: $(this).attr("thread_style"),
                        composition: $(this).attr("composition"),
                        category: $(this).attr("category"),
                        id_t4l_fabric: $(this).attr("rel"),
                        extra_fabric: $(this).attr("extra"),
                        button_color: $(this).attr("btn_color")
                    };
                    A.fabric_weight = $(this).attr("fabric_weight");
                    A.season = $(this).attr("season");
                    if (window.mobile_enabled) {
                        A.option = "fabric";
                        History.pushState(A, window.title, "?option=fabric&id_t4l_fabric=" + A.id_t4l_fabric)
                    } else {
                        e(A)
                    }
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove();
                    var w = false;
                    x.bind("touchstart", function() {
                        w = true
                    }).bind("touchfmove", function() {
                        w = false
                    }).bind("touchend", function() {
                        if (w) {
                            $(this).click()
                        }
                    })
                }
                o = [];
                Man_Shirt.container.find("div.shirt_fabric").each(function() {
                    o.push(this.getAttribute("rel"))
                });
                if (window.mobile_enabled) {
                    var v = 0;
                    if (!$(this).hasClass("first_load")) {
                        $(this).addClass("first_load");
                        var y = $(".selected", this);
                        if (y.length) {
                            v = y.offset().top - 200
                        }
                    }
                    $("html, body").animate({
                        scrollTop: v
                    }, 500)
                } else {
                    var z = Man_Shirt.container.find("div.shirt_fabric[title], div.shirt_fabric img[title]");
                    initTooltips(z)
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
                    var C = $(this).parent().text();
                    var A = this.getAttribute("name");
                    var B = this.getAttribute("value");
                    t += "<li>" + C + ' <a href="javascript:;" class="del" name="' + A + '" value="' + B + '">x</a></li>'
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
                if (Man_Shirt.bLazy) {
                    Man_Shirt.bLazy.revalidate()
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
            Man_Shirt.filter_form.find("a.filter").click(function() {
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
            Man_Shirt.filter_form.find("a.dropdown").mouseover(function() {
                var r = this.getAttribute("href").replace(/^[^#]/, "");
                m();
                f = $(this).addClass("current");
                n = $(r).show()
            }).click(function() {
                return false
            });
            Man_Shirt.filter_form.mouseleave(m);
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
                        Man_Shirt.filter_form.addClass("sticky");
                        i = true
                    }
                } else {
                    if (i) {
                        Man_Shirt.filter_form.removeClass("sticky");
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
                        g = true
                    }
                } else {
                    if (g) {
                        $(".test_B #move").removeClass("fixit");
                        g = false
                    }
                }
            });
            Man_Shirt.filter_form.find("ul.filter input").click(function() {
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
    initExtrasMobile: function() {
        var m = $("#sticky_header");
        var i = false;

        function f() {
            if (i) {
                i.hide();
                i = false;
                $("#body_height").css("overflow", "")
            }
            $("#slider_fabrics").hide();
            m.removeClass("fixed")
        }
        $(".options a").click(function() {
            var o = this.getAttribute("href").replace("/^[^#]/", "");
            var p = o.replace("#", "");
            History.pushState({
                option: p,
                rel: o
            }, window.title, "?option=" + p);
            return false
        });

        function e() {
            f();
            var o = History.getState();
            if (typeof(o.data.rel) != "undefined") {
                i = $(o.data.rel).show();
                if (!i.hasClass("manual_close")) {
                    i.addClass("manual_close").click(function() {
                        History.back()
                    })
                }
                $("#body_height").css("overflow", "hidden")
            }
            if (typeof(o.data.fabrics) != "undefined") {
                c();
                m.addClass("fixed")
            }
        }
        History.Adapter.bind(window, "statechange", e);
        e();
        $("a.close").click(function() {
            History.back()
        });
        Man_Shirt.load3dCommon();
        $("#extra_form a.back").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            $("#go_to").attr("value", "fabric");
            Man_Shirt.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#extra_forms1 a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            Man_Shirt.createInputsImgs();
            $("#go_to").attr("value","extras");
            Man_Shirt.updatePrice();
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
            window.shirt_price.initials = $("#txt_initial").val() ? window.extras_prices.initials : 0;
            Man_Shirt.updatePrice();
            f();
            Man_Shirt.load3dCommon()
        }
        var n = $("#shirt_initials a.select").click(function() {
            b();
            History.pushState(null, window.title, "?ok=1")
        });
        $("#shirt_initials a.remove").click(function() {
            $("#txt_initial").val("").keyup();
            b();
            History.back()
        });
        $("#shirt_initials .option_trigger").click(function() {
            return false
        });
        $("#txt_initial").keypress(isValidCharacterInitials).bind("paste", function(o) {
            return false
        }).keyup(function() {
            if (this.value) {
                n.show().parent().addClass("two_options")
            } else {
                n.hide().parent().removeClass("two_options")
            }
        }).keyup();
        $("#shirt_tuxedo .option_trigger").click(function() {
            var o = this.getAttribute("rel");
            var p = $("#shirt_tuxedo .option_trigger").removeClass("active");
            $(this).addClass("active");
            var q = "tuxedo";
            if (o == 1) {
                window.shirt_price[q] = window.extras_prices[q]
            } else {
                window.shirt_price[q] = 0
            }
            $("#shirt_tuxedo_in").val(o);
            Man_Shirt.updatePrice();
            Man_Shirt.load3dCommon();
            History.pushState(null, window.title, "?ok=1");
            return false
        });
        $("#shirt_neck_contrast, #shirt_cuff_contrast, #shirt_patches").each(function() {
            var o = this.getAttribute("id");
            $(".option_trigger", this).click(function() {
                var p = this.getAttribute("rel");
                if (p == "0") {
                    k(o, 0, "");
                    History.back()
                } else {
                    History.pushState({
                        option: o,
                        contrast_option: p,
                        fabrics: true
                    }, window.title, "?option=" + o + "&fabrics=1")
                }
                return false
            })
        });

        function c() {
            $("#loading_fabric").show();
            var p = document.location.toString();
            if ($("html").prop("lang") == "ru" && document.all) {
                p = encodeURI(p)
            }
            p = p.split("?")[0];
            var o = {
                type: [],
                tone: [],
                texture: []
            };
            $("#filters div.filter").each(function() {
                var q = this.getAttribute("name");
                $("a.current", this).not(".all").each(function() {
                    o[q].push(this.getAttribute("rel"))
                })
            });
            $("#slider_fabrics").show().load(p + "?action=filter", o, function() {
                $("a.select", this).click(function() {
                    var q = History.getState();
                    k(q.data.option, q.data.contrast_option, $(this).attr("rel"));
                    History.pushState(null, window.title, "?ok=1");
                    return false
                });
                $("#loading_fabric").fadeOut("fast");
                if (Man_Shirt.bLazy) {
                    Man_Shirt.bLazy.revalidate()
                }
            })
        }

        function k(u, p, q) {
            var s = $("#" + u + "_in").val("");
            var o = $("#" + u + "_out").val("");
            switch (p) {
                case "inner":
                    s.val(q);
                    break;
                case "outer":
                    o.val(q);
                    break;
                case "full":
                    s.val(q);
                    o.val(q);
                    break
            }
            var r = $("#" + u + " .option_trigger").removeClass("active");
            var t = "";
            switch (u) {
                case "shirt_neck_contrast":
                    t = "neck_fabric";
                    break;
                case "shirt_cuff_contrast":
                    t = "cuffs_fabric";
                    break;
                case "shirt_patches":
                    t = "patches";
                    break
            }
            if (p) {
                r.filter("." + p).addClass("active");
                window.shirt_price[t] = window.extras_prices[t]
            } else {
                window.shirt_price[t] = 0
            }
            Man_Shirt.updatePrice();
            Man_Shirt.load3dCommon()
        }
        $("#loading_fabric").hide();
        var g;
        var l = (Man_Shirt.config.shirt_cuffs == 5 || Man_Shirt.config.shirt_cuffs == 6 || Man_Shirt.config.shirt_cuffs == 9 || Man_Shirt.config.shirt_cuffs == 10);

        function h() {
            g = {
                position: $(".button_holes_threads_position:checked", "#all_or_cuff").val()
            };
            j.each(function() {
                g[this.name] = this.value
            });
            window.shirt_price.button_holes_threads = (g.position != "0") ? window.extras_prices.button_holes_threads : 0;
            Man_Shirt.updatePrice()
        }

        function a() {
            var q = $(".button_holes_threads_position:checked", "#all_or_cuff").val();
            switch (q) {
                case "all":
                case "cuff":
                    var o = $("#shirt_threads .thread_colors").show();
                    var p = 2;
                    if (q == "cuff" && l) {
                        o.eq(0).hide();
                        j.eq(0).val("").parent().find(".option_trigger.active").removeClass("active");
                        p = 1
                    } else {
                        o.eq(0).show()
                    }
                    if (j.filter(function() {
                            return this.value
                        }).length == p) {
                        d.show().parent().addClass("two_options")
                    } else {
                        d.hide().parent().removeClass("two_options")
                    }
                    break;
                default:
                    $("#shirt_threads .thread_colors").hide();
                    $("#shirt_threads .option_trigger.active").removeClass("active");
                    j.val("");
                    d.show().parent().addClass("two_options");
                    break
            }
        }
        var d = $("#shirt_threads a.select").click(function() {
            h();
            History.pushState(null, window.title, "?ok=1");
            Man_Shirt.load3dCommon();
            return false
        });
        var j = $("#shirt_threads .option_input").change(a);
        $("#all_or_cuff input").change(a);
        a();
        h();
        $("#shirt_threads a.close").unbind("click").click(function() {
            $(".button_holes_threads_position[value=" + g.position + "]", "#all_or_cuff").prop("checked", true).change();
            var o = $("#shirt_threads .option_trigger");
            o.removeClass("active");
            j.each(function() {
                this.value = g[this.name];
                if (this.value) {
                    o.filter("[rel=" + this.value + "]").addClass("active")
                }
            });
            a();
            History.back();
            return false
        });
        $(".interactive_options").each(function() {
            var o = $("input.option_input", this);
            var p = $(".option_trigger", this).click(function() {
                p.removeClass("active");
                $(this).addClass("active");
                o.val(this.getAttribute("rel")).change()
            })
        });
        $("#extra_form").submit(function() {
            var o = History.getState();
            if (typeof(o.data.rel) != "undefined" || typeof(o.data.fabrics) != "undefined") {
                return false
            }
            Man_Shirt.createInputsImgs()
        })
    },
    initExtras: function(def2) {

         var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        /*if(def_fab_id == def2 && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show(); 
        }
        else if(def_fab_id != def2 && action=="update") {
          $("#model_3d_preview").css('display','none');
          $("#model_3d_preview1").html("<img src='"+p_img_dtl+"'>");
          $("#box_change_position").hide();
            $("#show_hide_pieces").hide(); 
            $(".controls").hide();
       }
       else {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show(); 
            $(".controls").show();
       }*/

        if (window.mobile_enabled) {
            return this.initExtrasMobile()
        }
        if (typeof(initCollectionGenerator) == "function") {
            initCollectionGenerator(Man_Shirt, ["front"])
        }
        $("input.uniform", Man_Shirt.container).uniform();
        $("#extra_form a.back").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Shirt.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#extra_forms1 a.next").click(function() {
            Man_Shirt.createInputsImgs();
            $("#go_to").attr("value", "extras");
            Man_Shirt.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Shirt.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_configure").click(function() {
            $("#go_to").attr("value", "configure");
            Man_Shirt.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#inp_tuxedo_0").click(function() {
            $("#extra_form input.status_tuxedo").val(0);
            b("tuxedo")
        });
        $("#inp_tuxedo_1").click(function() {
            $("#extra_form input.status_tuxedo").val(1);
            b("tuxedo")
        });

        $(".collar_inner_fabric").click(function() {
            var neck_type = $(this).attr("rel");
             $(".common_th.collar_outer_fabric").removeClass("active");
            $(this).addClass("active");
             $("input[name='neck_type']").val('inner_fabric');
        });
        $(".collar_outer_fabric").click(function() {
            var neck_type = $(this).attr("rel");
             $(".common_th.collar_inner_fabric").removeClass("active");
            $(this).addClass("active");
             $("input[name='neck_type']").val('outer_fabric');
        });

        $(".cuff_inner_fabric").click(function() {
            var cuff_type = $(this).attr("rel");
             $(".common_th.cuff_outer_fabric").removeClass("active");
            $(this).addClass("active");
             $("input[name='cuff_type']").val('inner_fabric');
        });
        $(".cuff_outer_fabric").click(function() {
            var cuff_type = $(this).attr("rel");
             $(".common_th.cuff_inner_fabric").removeClass("active");
            $(this).addClass("active");
             $("input[name='cuff_type']").val('outer_fabric');
        });

        
        

        Man_Shirt.load3dCommon();

        
        /* Monogram Custom js Section */

        
        $("#txt_initial_jacket").keypress(isValidCharacterInitials).bind("paste", function(l) {
            return false
        });

        $("#txt_initial_jacket").on('keyup', function() {

            var n = $("#txt_initial_jacket").val();
            var l = $(".box_title.initials a.btn_cancel_add", e).attr("price");
              if (n != "") {
                window.shirt_price.initials_jacket = l ? l : 0;
                $("input[name='initials_jacket_price']").val(l);
            } else {
                window.shirt_price.initials_jacket = 0;
                $("input[name='initials_jacket_price']").val('');
            }
          Man_Shirt.updatePrice();
        });

        $("div.op_initials div.box_font_initial input").click(function() {
            var n = $("div.op_initials.all_family input:checked").attr("rel");
            
            $(this).prop('checked',true);
            $("input[name='font_family']").val(n);
        });

        $("input.thread_holes_selector").on("click",function(event) {

          var btn_thread_type = $(this).attr("layer1");

          if (btn_thread_type=='by_default'){
            $("#button_thread_type").hide();
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='button_holes_threads_jacket2']").val('');
            window.shirt_price["button_holes_threads_jacket"] = 0;
            
          }
          else {
            $("#button_thread_type").show();
            window.shirt_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;
          }
          Man_Shirt.updatePrice();
      });


        

        $(".extra_opt input.radio_opt").on("click",function(){
            var price = $(this).attr('price');
            var shirt_type = $(this).attr("rel");
            var shirt_type1 = $(this).attr("rel");
            if(shirt_type1=="handkerchief") {
             var price =  window.extra_prices.pocket_square
             $("input[name='cuff_type']").val(shirt_type);
            }
            else if(shirt_type1=="neck_lining") {
              var price =  window.extra_prices.neck_lining
              $("input[name='neck_type']").val(shirt_type);
            }
            if(price!=undefined)
              window.shirt_price[shirt_type1] = price;
            Man_Shirt.updatePrice();
        });

        


        function a(j, k) {
            $("#fabrics_popup a.select").click(function() {
                var l = this.getAttribute("rel");
                $("#" + j).val(l);
                $("#" + k).attr("src", "/dimg/fabric/" + l + "_normal.jpg");
                $("#" + k).css("display", "block");
                if (k == "neck_out" || k == "neck_in" || k == "cuff_out" || k == "cuff_in") {
                    var m = false;
                    if (k == "neck_out" || k == "neck_in") {
                        b("neck_fabric");
                        Man_Shirt.load3dCommon()
                    } else {
                        b("cuffs_fabric");
                        Man_Shirt.load3dCommon()
                    }
                } else {
                    b("patches");
                    $("#img_patches_extra").attr("src", Man_Shirt.base_src + "fabric_" + l + "/front/camisa_coderas_camisa.2.png");
                    Man_Shirt.load3dCommon()
                }
                $.magnificPopup.close();
                return false
            })
        }

        function e(j, k) {
            $("#fabric_colorbox_man_shirt input").click(function() {
                var l = $(this).closest("table");
                if (this.value == "all") {
                    var m = $("input", l);
                    m.not(this).prop("checked", 0);
                    $(this).prop("checked", 1);
                    $.uniform.update(m)
                } else {
                    var n = $("input.all", l).prop("checked", $("input:checked:not(.all)", l).length ? 0 : 1);
                    if ($(this).closest("div.checker").find("span").hasClass("checked")) {
                        $(this).prop("checked", 0);
                        $.uniform.update($(this))
                    } else {
                        $(this).prop("checked", 1);
                        $.uniform.update($(this))
                    }
                    $.uniform.update(n)
                }
                $("#fabrics_popup").load(base_href + "extras?action=filter", $("#fabrics_filter_form").serializeArray(), function() {
                    createSlideshow("#fabrics_popup");
                    $("#fabrics_popup div.slider_paginator").css({
                        "margin-top": $("#fabrics_popup div.slider_box").height()
                    });
                    fabric_list = [];
                    $("#fabrics_popup").find("div.shirt_fabric").each(function() {
                        fabric_list.push(this.getAttribute("rel"))
                    });
                    $("#loading_fabric").fadeOut("fast");
                    a(j, k)
                })
            })
        }

        function c(j, k) {
            $.magnificPopup.open({
                items: {
                    src: base_href + "extras?action=fabrics"
                },
                type: "ajax",
                showCloseBtn: false,
                callbacks: {
                    updateStatus: function(l) {
                        if (l.status == "ready") {
                            a(j, k);
                            e(j, k);
                            createSlideshow("#fabrics_popup");
                            $("#fabrics_popup div.slider_paginator").css({
                                "margin-top": $("#fabrics_popup div.slider_box").height()
                            });
                            $("#shirt_filters_popup input").uniform()
                        }
                    }
                }
            })
        }
        $("#extra_form a.select_fabric").click(function() {
            var j = $(this).attr("rel");
            var k = $(this).attr("box");
            c(j, k)
        });
        $("#extra_form div.lanzadera").click(function() {
            var j = $(this).attr("rel");
            $("#extra_form #" + j).click().eq(0)
        });
        var h = (Man_Shirt.config.shirt_cuffs == 5 || Man_Shirt.config.shirt_cuffs == 6 || Man_Shirt.config.shirt_cuffs == 9 || Man_Shirt.config.shirt_cuffs == 10);
        $("#all_or_cuff input[name='button_holes_threads[position]']").click(function() {
            var k = $(this).val();
            if (h) {
                if (k == "cuff") {
                    var j = $("#img_ojal_hilo").next().find(".option_trigger.active").attr("rel");
                    $("#img_ojal_hilo div.hilo").removeClass("jc" + j);
                    $("#img_ojal_hilo").next().find(".option_trigger.active").removeClass("active");
                    $("#img_ojal_hilo").next().hide();
                    $("#hidden_button_threads").val("")
                } else {
                    $("#img_ojal_hilo").next().show()
                }
            }
        });
        if (h) {
            var g = $("#all_or_cuff input[name='button_holes_threads[position]']:checked").val();
            if (g == "cuff") {
                var d = $("#img_ojal_hilo").next().find(".option_trigger.active").attr("rel");
                $("#img_ojal_hilo div.hilo").removeClass("jc" + d);
                $("#img_ojal_hilo").next().find(".option_trigger.active").removeClass("active");
                $("#img_ojal_hilo").next().hide();
                $("#hidden_button_threads").val("")
            }
        }
        $("#extra_form div.list_common_color a.box_color").click(function() {


            var k = $(this).closest("div.option_trigger");
            var m = $(this).closest("div.list_common_color");
            var l = m.attr("rel");

            var n = $(this).parent().attr('color');
            var price = $(".collar_neck_col").attr('price');
            var neck_lining = $(".collar_neck_col").attr("rel1");
            var j = $(this).attr('layer');


            if(j=="jacket_button_holes") 
                $("input[name='button_holes_threads_jacket2']").val(n);
            if(j=="monogram_color") 
                 $("input[name='initials_jacket1']").val(n);

             if(j=="collar_color") {

                 $("input[name='collar_neck_color']").val(n);
                 //$("input[name='neck_lining_price']").val(price);
                  console.log("price"+price);
                 if(price!=undefined)
                   window.shirt_price.neck_lining = window.extra_prices.neck_lining;
                   Man_Shirt.updatePrice();
                 }

            if(j=="cuff_color") {

                 $("input[name='cuff_color']").val(n);
                 $("input[name='handkerchief_price']").val(price);
                 if(price!=undefined)
                   window.shirt_price.handkerchief = window.extra_prices.pocket_square;
                   Man_Shirt.updatePrice();
                 }
            if(j=="jacket_button_holes1") {
                //window.shirt_price.button_holes_threads_jacket=window.extra_prices.btn_holes_threads;
                $("input[name='button_holes_threads_jacket1']").val(n);
                //Man_Shirt.updatePrice();
            }

            m.each(function() {
                $(this).find("div.option_trigger").removeClass("active")
            });
            k.addClass("active");
            var o = k.attr("rel");
            m.find("input.option_input").attr("value", o);
            if (l != "initials") {
                b(l);
                var n = k.attr("rel");
                var l = k.attr("type");
                var j = $(this).closest("div.window").find("#img_ojal_hilo");
                j.find("div." + l).attr("class", "").addClass("jc" + n).addClass(l)
            }
            Man_Shirt.load3dCommon()
        });
        $("#all_or_cuff input.button_holes_threads_position").click(function() {
            Man_Shirt.load3dCommon()
        });
        $("#inp_tuxedo_0,#inp_tuxedo_1").click(function() {
            Man_Shirt.load3dCommon()
        });
        
        /* Click the Delte Button */
        $("div.box_title.main").click(function() {
            var q = $(this).find("a.btn_cancel_add");
            var l = q.attr("rel");
            var o = l;
            var n = q.attr("price") * 1;
            var m = $(this).closest("div.box_title");
            var p = $(this).closest("div.extra_opt");
            if (m.hasClass("open")) {
                q.css("display","none");
                m.removeClass("open");
                m.addClass("close");
                p.find("div.window").hide();
                if ( o== "neck_styling") {
                    $("input[name='neck_styling']").parent().removeClass("checked");
                    $("input[name='collar_neck_color']").val('');
                    $("input[name='neck_type']").val('');
                    $(".collar_outer_fabric,.collar_inner_fabric").removeClass("active");
                    $(".collar_neck_col").find(".common_color").removeClass("active");
                    window.shirt_price.neck_lining = 0;
                }
                if ( o== "cuff_styling") {
                    $("input[name='cuff_styling']").parent().removeClass("checked");
                    $("input[name='cuff_type']").val('');
                    $("input[name='cuff_color']").val('');
                    $(".cuff_outer_fabric,.cuff_inner_fabric").removeClass("active");
                    $(".cuff_col").find(".common_color").removeClass("active");
                    window.shirt_price.handkerchief = 0;
                }
                if (l == "initials") {
                    $("input[name='"+l+"_jacket_price']").val('');
                    $("input[name='font_family']").val('');
                    $("input[name='initials_jacket']").val('');
                }

                if(o=="button_holes_threads") {
                    $("input[name='button_holes_threads_jacket1']").val('');
                    $("input[name='button_holes_threads_jacket2']").val('');
                    //$("input[name='button_holes_threads_jacket']").val('');
                     //$("input[name='button_holes_threads_jacket']").closest("label").removeClass("checked");
                    $(".suit_hole_not_default").attr("checked",false);
                     $(".suit_hole_default").attr("checked",true);
                    $("#button_thread_type").hide();
                }
                if(l=="patches") {
                    $("#patches_default").parent().addClass("checked");
                    $("#inp_patches_personalized").parent().removeClass("checked");
                    $("#patches_box").find(".common_color").removeClass("active");
                    //$("input[name='"+l+"_price']").val('');
                    $("input[name='"+l+"']").val('');
                    $("input[name='patches_type']").val("elbow_no");
                    window.shirt_price.patches_jacket = 0;
                }

                
                $("#extra_form input.status_" + l).val(0);
                window.shirt_price[o + "_jacket"] = 0;
                Man_Shirt.updatePrice();
                i(o);
                if (l == "handkerchief" || l == "button_holes_threads") {
                    $("input[name='"+l+"_price']").val('');
                    $("input[name='"+l+"']").val('');
                    //Man_Shirt.redraw(true)
                }

                
            } else {
                q.css("display","block","float","right");
                m.removeClass("open");
                m.addClass("close");
                
                if (l == "lining_jacket" || l == "initials_jacket") {
                    $("input[name='"+l+"_price']").val('');
                    $("input[name='"+l+"']").val('');
                    $("input[name='font_family']").val('');
                }
                if(l == "neck_lining" || l== "metal_buttons") {
                    $("input[name='"+l+"_price']").val('');
                    window.shirt_price.l=0;
                }
                if(l=="patches") {
                    $("#patches_default").parent().addClass("checked");
                    $("#inp_patches_personalized").parent().removeClass("checked");
                    $("#patches_box").find(".common_color").removeClass("active");
                    //$("input[name='"+l+"_price']").val('');
                    $("input[name='"+l+"']").val('');
                    $("input[name='patches_type']").val("elbow_no");
                    window.shirt_price.patches_jacket=0;
                }
                if(l=="button_holes_threads") {

                    $btn_thread_lay = $("input[name='button_holes_threads_jacket']").attr("layer1");
                    
                    if($btn_thread_lay=='by_default')
                        window.shirt_price[o + "_jacket"] = 0;
                    else
                    window.shirt_price[o + "_jacket"] = window.extra_prices.btn_holes_threads;
                     //$("input[name='button_holes_threads_jacket']").closest("label").addClass("checked");
                     $(".by_default").addClass("checked");
                     $(".suit_hole_not_default").attr("checked",false);
                     $(".suit_hole_default").attr("checked",true);

                    /*$(".by_default").addClass("checked");

                    window.shirt_price[o + "_jacket"] = window.extra_prices.btn_holes_threads;*/

                    Man_Shirt.updatePrice();
                }
                
                m.removeClass("close");
                m.addClass("open");
                p.find("div.window").show();
                $("#extra_form input.status_" + l).val(1)
            }
            Man_Shirt.updatePrice()
        });
        
        /* Click Default Options */
        $("input.default_item").click(function() {
            var type=$(this).val();

            if(type=="standard_button")
              window.shirt_price.metal_buttons=0;
            if(type=="color_by_default")
              window.shirt_price.neck_lining=0;
            if(type=="elbow_no") {
              $("input[name='patches_type']").val(type);  
              window.shirt_price.patches=0; 
            }
            if(type=="no_pocket")
              window.shirt_price.handkerchief=0; 

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
            if (n.attr("extra_name") == "metal_buttons") {
                if (!$("#pos_bht_solapa:checked").length) {
                    $("#box_button_threads_extra", e).show()
                }
                Man_Shirt.redraw(true)
            }
            window.shirt_price.patches_jacket = 0;
            Man_Shirt.updatePrice();
            if ($(this).closest("div.top").find("input.getVal").attr("name") == "handkerchief") {
                pos_extra = "front"
            } else {
                pos_extra = "back"
            }
            var o = $(this).attr("name");
            if (o == "patches_radio" || o == "handkerchief_radio") {
                Man_Shirt.redraw(true)
            }
        });

       
        /* Click Color Item */

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
            
            if(s=='jacket_patches') {
              $("input[name='patches_type']").val("elbow_yes");
            }
            if(s=='jacket_neck_lining')
             $input_hidden_option.val($(this).closest(".option_trigger").attr("color"));
            else
             $input_hidden_option.val($(this).closest(".option_trigger").attr("rel"));

            var n = $(this).closest(".top").find(".personalized_item");
            
            
            window.shirt_price.patches_jacket = window.extra_prices.elbow_patches;
            Man_Shirt.updatePrice();
            if ($(this).closest("div.top").find("input.getVal").attr("name") == "handkerchief") {
                pos_extra = "front"
            } else {
                pos_extra = "back"
            }
            //Man_Shirt.cloth_open = false;
            //Man_Shirt.redraw(true);
        });
        
        $("#patches_box div.option_trigger.active").find("a.color_item").click();



        /*function f() {
            var o = $("#txt_initial").val();
            var j = $("#extra_form.man_shirt .window.initials input:checked").val();
            var m = $("#extra_form.man_shirt .window.initials div.common_color.active").attr("color");
            var l = $("#extra_form div.box_opts div.extra_opt .op_initials div.box_font_initial input:checked").attr("color");
            $("#rotate").html("");
            var n = Raphael("rotate", 500, 500);
            if (j == "sleeve") {
                var k = n.text(100, 100, o).attr("font-family", l).attr("font-size", "13px").attr("fill", "#" + m);
                k.rotate(48, 170, 155)
            } else {
                if (j == "top") {
                    var k = n.text(160, 115, o).attr("font-family", l).attr("font-size", "10px").attr("fill", "#" + m);
                    k.rotate(3, 170, 155)
                } else {
                    if (j == "middle") {
                        var k = n.text(154, 115, o).attr("font-family", l).attr("font-size", "10px").attr("fill", "#" + m);
                        k.rotate(2, 170, 155)
                    } else {
                        if (j == "bottom") {
                            var k = n.text(160, 115, o).attr("font-family", l).attr("font-size", "10px").attr("fill", "#" + m);
                            k.rotate(-3, 170, 155)
                        }
                    }
                }
            }
        }
        /*$("#extra_form.man_shirt .window.initials div.common_color").click(function() {
            f()
        });
        $("#extra_form div.box_opts div.extra_opt input.posini").click(function() {
            $("#extra_form.man_shirt .window.initials div.img_position_initials").removeClass("sleeve").removeClass("top").removeClass("middle").removeClass("bottom");
            $("#extra_form.man_shirt .window.initials div.img_position_initials").addClass($(this).val());
            $("#extra_form div.box_opts div.extra_opt label.positions").each(function() {
                $(this).removeClass("checked")
            });
            $(this).closest("label.positions").addClass("checked");
            f();
            Man_Shirt.load3dCommon()
        });
        $("#txt_initial").keypress(isValidCharacterInitials).bind("paste", function(j) {
            return false
        });
        $("#txt_initial").keyup(function() {
            f();
            Man_Shirt.load3dCommon();
            b("initials")
        });
        $("#extra_form div.box_opts div.extra_opt .op_initials div.box_font_initial input").click(function() {
            f();
            Man_Shirt.load3dCommon()
        });
        $("#extra_form div.box_opts div.extra_opt .box_opt .list_common_color div.common_color").click(function() {
            f();
            Man_Shirt.load3dCommon()
        });*/
        if (extras.initials) {
            $("#extra_form.man_shirt .window.initials input.posini:checked").click();
            b("initials");
            Man_Shirt.load3dCommon()
        }
        $("#inp_tuxedo_0").click(function() {
            window.shirt_price.tuxedo = 0;
            Man_Shirt.updatePrice()
        });

        function b(k) {
            if (k == "initials") {
                var l = $("#txt_initial").val();
                var j = $("#extra_form .box_title.initials a.btn_cancel_add").attr("price");
                if (l != "") {
                    window.shirt_price[k] = j ? j : 0
                } else {
                    window.shirt_price[k] = 0
                }
            }
            /*if (k == "neck_fabric") {
                var j = $("#extra_form .box_title.neck a.btn_cancel_add").attr("price");
                window.shirt_price[k] = j ? j : 0
            }
            if (k == "cuffs_fabric") {
                var j = $("#extra_form .box_title.cuff a.btn_cancel_add").attr("price");
                window.shirt_price[k] = j ? j : 0
            }*/
            if (k == "patches") {
                var j = window.extra_prices.elbow_patches;
                window.shirt_price[k] = j ? j : 0
            }
            if (k == "button_holes_threads") {
                //var price = window.extra_prices.btn_holes_threads;
                //window.shirt_price[k+'_jacket'] = j ? j : 0
            }
            if (k == "tuxedo") {
                var j = $("#extra_form .box_title.pliegue_pecho a.btn_cancel_add").attr("price");
                window.shirt_price[k] = j ? j : 0
            }
            //Man_Shirt.updatePrice()
        }

        function i(j) {
            if (j == "tuxedo") {
                $("#inp_tuxedo_0").click();
                $.uniform.update();
                window.shirt_price.tuxedo = 0;
                Man_Shirt.updatePrice()
            }
            if (j == "initials") {
                $("#txt_initial").val("");
                f()
            }
            if (j == "neck_fabric") {
                $("#neck_fabric_id_t4l_fabric_in").val("");
                $("#neck_fabric_id_t4l_fabric_out").val("");
                $("#neck_out").attr("src", "/images/man/shirt/extras/neck/ico_empty.jpg");
                $("#neck_in").attr("src", "/images/man/shirt/extras/neck/ico_empty.jpg")
            }
            if (j == "cuffs_fabric") {
                $("#cuffs_fabric_id_t4l_fabric_in").val("");
                $("#cuffs_fabric_id_t4l_fabric_out").val("");
                $("#cuff_out").attr("src", "/images/man/shirt/extras/cuff/ico_empty.jpg");
                $("#cuff_in").attr("src", "/images/man/shirt/extras/cuff/ico_empty.jpg")
            }
            if (j == "patches") {
                $("#patches_id_t4l_fabric").val("");
                $("#patches_img").attr("src", "/images/man/shirt/extras/patches/ico_empty.jpg");
                $("img#img_patches_extra").attr("src", "/images/man/shirt/extras/patches/patchesDefault.jpg")
            }
            if (j == "button_holes_threads") {
                $("#hidden_button_threads").val("");
                $("#hidden_button_holes").val("");
                $("#extra_form div.window.hilo_ojal div.option_trigger.active").removeClass("active");
                $("#img_ojal_hilo").find("div.ojal").attr("class", "").addClass("ojal");
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo")
            }
        }
    },
    init3d: function() {
        var b = new layerManager("#model_3d_preview", {
            base_src: Man_Shirt.base_src
        });
        var a = $("#model_3d_preview").html("");
        b.addLayerGroup("shadow", {
            base_src: Man_Shirt.base_src + "sombras/"
        });
        b.addLayerGroup("body_up", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("body_medium", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("body_low", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("base_neck", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("neck", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("sleeves", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("cuff", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("pocket", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("tuxedo", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("cutoff", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("patches", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayerGroup("buttons_cuff", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("buttons_neck", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("buttons_base_neck", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("buttons_body", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("buttons_chest", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("cufflink_cuff", {
            base_src: Man_Shirt.base_src + "botones/"
        });
        b.addLayerGroup("button_close", {
            base_src: Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/"
        });
        b.addLayer("shirt_shadow", "shadow");
        b.addLayer("shirt_body_up", "body_up");
        b.addLayer("shirt_body_medium", "body_medium");
        b.addLayer("shirt_body_low", "body_low");
        b.addLayer("shirt_base_neck", "base_neck");
        b.addLayer("shirt_neck", "neck");
        b.addLayer("shirt_sleeve", "sleeves");
        b.addLayer("shirt_cuff", "cuff");
        b.addLayer("shirt_pocket", "pocket");
        b.addLayer("shirt_tuxedo", "tuxedo");
        b.addLayer("shirt_cutoff", "cutoff");
        b.addLayer("shirt_patches", "patches");
        b.addLayer("shirt_buttons_cuff", "buttons_cuff");
        b.addLayer("shirt_buttons_neck", "buttons_neck");
        b.addLayer("shirt_buttons_base_neck", "buttons_base_neck");
        b.addLayer("shirt_buttons_body", "buttons_body");
        b.addLayer("shirt_buttons_chest", "buttons_chest");
        b.addLayer("shirt_cufflink_cuff", "cufflink_cuff");
        b.addLayer("shirt_button_close", "button_close");
        if (window.mobile_enabled) {
            $(window).resize(function() {
                var c = a.width();
                a.height(c * 1.2)
            }).resize()
        } else {
            Man_Shirt.init_scroll()
        }
        Man_Shirt.lmanager = b
    },
    initInteractiveOptions: function(a) {
        $("div.interactive_options", a).each(function() {
            var b = $("input.option_input", this);
            var d = this;
            var c = $("div.option_trigger", this).click(function() {
                $("div.option_trigger", d).removeClass("active");
                $(this).addClass("active");
                b.val(this.getAttribute("rel"));
                if (window.mobile_enabled) {
                    $(this).trigger("select")
                }
            });
            if (window.mobile_enabled) {
                c.filter(".active").trigger("select")
            }
        })
    },
    load3dCommon: function(n, x, C) {
        Man_Shirt.init3d(Man_Shirt.container);
        var n = Man_Shirt.lmanager;
        n.change_base_src(Man_Shirt.base_src + "fabric_" + Man_Shirt.id_t4l_fabric1 + "/front/", "default");
        Man_Shirt.initCommon();
        var h = false;
        var G = Man_Shirt.button_color;
        var r = false;
        var F = false;
        var m = false;
        var a = false;
        if (typeof Man_Shirt.extras["patches[id_t4l_fabric]"] != "undefined") {
            a = Man_Shirt.extras["patches[id_t4l_fabric]"]
        }
        if (typeof Man_Shirt.extras.patches != "undefined") {
            a = Man_Shirt.extras.patches.id_t4l_fabric
        }
        if (a) {
            n.layers.shirt_patches.removeImages();
            var I = Man_Shirt.base_src + "fabric_" + a + "/front/";
            n.layers.shirt_patches.setImages([
                ["camisa_coderas_camisa.1.png", {
                    zIndex: 1000,
                    base_src: I
                }]
            ]);
            n.layers.shirt_patches.redraw()
        }
        var o = Man_Shirt.extras["button_holes_threads"];
        if (!o) {
            if (typeof o == "undefined") {
                o = {}
            }
            if (Man_Shirt.extras["button_holes_threads[buttonholes_color]"] || Man_Shirt.extras["button_holes_threads[buttonthreads_color]"]) {
                o.buttonholes_color = Man_Shirt.extras["button_holes_threads[buttonholes_color]"];
                o.buttonthreads_color = Man_Shirt.extras["button_holes_threads[buttonthreads_color]"];
                o.position = Man_Shirt.extras["button_holes_threads[position]"]
            }
        }
        if (o) {
            h = true;
            if (o.buttonholes_color) {
                r = Man_Shirt.get_name_color(o.buttonholes_color)
            }
            if (o.buttonthreads_color) {
                F = Man_Shirt.get_name_color(o.buttonthreads_color)
            }
            m = o.position
        }
        if (typeof(Man_Shirt.config.shirt_sleeve) != "undefined") {
            n.layers.shirt_shadow.removeImages();
            n.layers.shirt_sleeve.removeImages();
            images_sleeve = [];
            if (Man_Shirt.config.shirt_sleeve == "long") {
                if (Man_Shirt.config.shirt_cut == "straight") {
                    n.layers.shirt_shadow.setImages([
                        ["shadow_front.png", {
                            zIndex: 80
                        }]
                    ])
                }
                if (Man_Shirt.config.shirt_cut == "classic") {
                    n.layers.shirt_shadow.setImages([
                        ["shadow_front_clasic.png", {
                            zIndex: 80
                        }]
                    ])
                }
                images_sleeve.push(["camisa_manga_left_larga1.1.png", {
                    zIndex: 220
                }]);
                images_sleeve.push(["camisa_manga_right_larga1.1.png", {
                    zIndex: 85
                }])
            }
            if (Man_Shirt.config.shirt_sleeve == "short") {
                if (Man_Shirt.config.shirt_cut == "straight") {
                    n.layers.shirt_shadow.setImages([
                        ["shadow_front_cut.png", {
                            zIndex: 80
                        }]
                    ])
                }
                if (Man_Shirt.config.shirt_cut == "classic") {
                    n.layers.shirt_shadow.setImages([
                        ["shadow_front_cut_clasic.png", {
                            zIndex: 80
                        }]
                    ])
                }
                images_sleeve.push(["camisa_manga_left_corta.1.png", {
                    zIndex: 220
                }]);
                images_sleeve.push(["camisa_manga_right_corta.1.png", {
                    zIndex: 85
                }])
            }
            n.layers.shirt_sleeve.setImages(images_sleeve);
            n.layers.shirt_shadow.redraw();
            n.layers.shirt_sleeve.redraw()
        }
        if (typeof(Man_Shirt.config.shirt_fit) != "undefined") {
            if (typeof(Man_Shirt.config.shirt_cut) != "undefined") {
                var H = Man_Shirt.config.shirt_cut
            } else {
                var H = "classic"
            }
            if (Man_Shirt.config.shirt_fit == "fit") {
                if (H == "straight") {
                    n.layers.shirt_body_up.setImages([
                        ["estrecho_cortado.1.png", {
                            zIndex: 100
                        }]
                    ])
                } else {
                    if (H == "classic") {
                        n.layers.shirt_body_up.setImages([
                            ["estrecho_clasico.1.png", {
                                zIndex: 100
                            }]
                        ])
                    }
                }
            }
            if (Man_Shirt.config.shirt_fit == "normal") {
                if (H == "straight") {
                    n.layers.shirt_body_up.setImages([
                        ["normal_cortado.1.png", {
                            zIndex: 100
                        }]
                    ])
                } else {
                    if (H == "classic") {
                        n.layers.shirt_body_up.setImages([
                            ["normal_clasico.1.png", {
                                zIndex: 100
                            }]
                        ])
                    }
                }
            }
            if (Man_Shirt.config.shirt_fit == "loose") {
                if (H == "straight") {
                    n.layers.shirt_body_up.setImages([
                        ["ancho_cortado.1.png", {
                            zIndex: 100
                        }]
                    ])
                } else {
                    if (H == "classic") {
                        n.layers.shirt_body_up.setImages([
                            ["ancho_clasico.1.png", {
                                zIndex: 100
                            }]
                        ])
                    }
                }
            }
            n.layers.shirt_body_up.redraw()
        }
        if (typeof(Man_Shirt.config.shirt_button_close) != "undefined") {
            n.layers.shirt_buttons_body.removeImages();
            n.layers.shirt_button_close.removeImages();
            images_button_close = [];
            zindexs_button_close = [];
            if (Man_Shirt.config.shirt_button_close == 1 || Man_Shirt.config.shirt_button_close == 3) {
                img_shirt_buttons_body = [];
                if (h) {
                    if (F && m == "all") {
                        img_shirt_buttons_body.push([F + "_cierre_hilo.png"]);
                        zindexs_button_close.push([602])
                    }
                    img_shirt_buttons_body.push([G + "_cierre_boton.png"]);
                    zindexs_button_close.push([601]);
                    if (r && m == "all") {
                        img_shirt_buttons_body.push([r + "_cierre_ojal.png"]);
                        zindexs_button_close.push([600])
                    }
                } else {
                    img_shirt_buttons_body.push([G + "_cierre_boton.png"]);
                    zindexs_button_close.push([600])
                }
                Man_Shirt.updateButtons("shirt_buttons_body", img_shirt_buttons_body, zindexs_button_close)
            }
            if (Man_Shirt.config.shirt_button_close == 1) {} else {
                if (Man_Shirt.config.shirt_button_close == 2) {
                    images_button_close.push(["camisa_cierre_up.1.png", {
                        zIndex: 450
                    }]);
                    images_button_close.push(["camisa_cierre_medium.1.png", {
                        zIndex: 451
                    }]);
                    images_button_close.push(["camisa_cierre_low.1.png", {
                        zIndex: 452
                    }])
                } else {
                    if (Man_Shirt.config.shirt_button_close == 3) {
                        images_button_close.push(["camisa_cierre_up.1.png", {
                            zIndex: 450
                        }]);
                        images_button_close.push(["camisa_cierre_medium.1.png", {
                            zIndex: 451
                        }]);
                        images_button_close.push(["camisa_cierre_low.1.png", {
                            zIndex: 452
                        }])
                    }
                }
            }
            n.layers.shirt_button_close.setImages(images_button_close);
            n.layers.shirt_button_close.redraw()
        }
        if (typeof(Man_Shirt.config.shirt_chest_pocket_type) != "undefined") {
            n.layers.shirt_pocket.removeImages();
            images_pockets = [];
            if (Man_Shirt.config.shirt_chest_pocket_type == 1 || Man_Shirt.config.shirt_chest_pocket_type == 3) {
                img_shirt_buttons_chest = [];
                zindexs_shirt_buttons_chest = [];
                if (h) {
                    if (F && m == "all") {
                        img_shirt_buttons_chest.push([F + "_bolsillo_izq_hilo.png"]);
                        zindexs_shirt_buttons_chest.push([477])
                    }
                    img_shirt_buttons_chest.push([G + "_bolsillo_izq_boton.png"]);
                    zindexs_shirt_buttons_chest.push([476]);
                    if (r && m == "all") {
                        img_shirt_buttons_chest.push([r + "_bolsillo_izq_ojal.png"]);
                        zindexs_shirt_buttons_chest.push([475])
                    }
                    if (Man_Shirt.config.shirt_chest_pocket_type == 3) {
                        if (F && m == "all") {
                            img_shirt_buttons_chest.push([F + "_bolsillo_der_hilo.png"]);
                            zindexs_shirt_buttons_chest.push([477])
                        }
                        img_shirt_buttons_chest.push([G + "_bolsillo_der_boton.png"]);
                        zindexs_shirt_buttons_chest.push([476]);
                        if (r && m == "all") {
                            img_shirt_buttons_chest.push([r + "_bolsillo_der_ojal.png"]);
                            zindexs_shirt_buttons_chest.push([475])
                        }
                    }
                } else {
                    img_shirt_buttons_chest.push([G + "_bolsillo_izq_boton.png"]);
                    zindexs_shirt_buttons_chest.push([476]);
                    if (Man_Shirt.config.shirt_chest_pocket_type == 3) {
                        img_shirt_buttons_chest.push([G + "_bolsillo_der_boton.png"]);
                        zindexs_shirt_buttons_chest.push([476])
                    }
                }
                Man_Shirt.updateButtons("shirt_buttons_chest", img_shirt_buttons_chest, zindexs_shirt_buttons_chest)
            }
            if (Man_Shirt.config.shirt_chest_pocket_type == 1) {
                images_pockets.push(["camisa_bolsillo_left_simple.1.png", {
                    zIndex: 450
                }]);
                images_pockets.push(["camisa_bolsillo_left_tapa.1.png", {
                    zIndex: 451
                }])
            } else {
                if (Man_Shirt.config.shirt_chest_pocket_type == 2) {
                    images_pockets.push(["camisa_bolsillo_left_simple.1.png", {
                        zIndex: 450
                    }])
                } else {
                    if (Man_Shirt.config.shirt_chest_pocket_type == 3) {
                        images_pockets.push(["camisa_bolsillo_left_simple.1.png", {
                            zIndex: 450
                        }]);
                        images_pockets.push(["camisa_bolsillo_right_simple.1.png", {
                            zIndex: 450
                        }]);
                        images_pockets.push(["camisa_bolsillo_left_tapa.1.png", {
                            zIndex: 451
                        }]);
                        images_pockets.push(["camisa_bolsillo_right_tapa.1.png", {
                            zIndex: 451
                        }])
                    } else {
                        if (Man_Shirt.config.shirt_chest_pocket_type == 4) {
                            images_pockets.push(["camisa_bolsillo_left_simple.1.png", {
                                zIndex: 450
                            }]);
                            images_pockets.push(["camisa_bolsillo_right_simple.1.png", {
                                zIndex: 450
                            }])
                        }
                    }
                }
            }
            n.layers.shirt_pocket.setImages(images_pockets);
            n.layers.shirt_pocket.redraw()
        }
        if (typeof(Man_Shirt.config.shirt_neck) != "undefined") {
            var v = Man_Shirt.config.shirt_neck_buttons;
            images_neck_base = [];
            var f = [];
            var J = Man_Shirt.extras["neck_fabric[id_t4l_fabric][out]"];
            var g = Man_Shirt.extras["neck_fabric[id_t4l_fabric][in]"];
            if (typeof Man_Shirt.extras.neck_fabric != "undefined") {
                J = Man_Shirt.extras.neck_fabric["id_t4l_fabric"]["out"]
            }
            if (typeof Man_Shirt.extras.neck_fabric != "undefined") {
                g = Man_Shirt.extras.neck_fabric["id_t4l_fabric"]["in"]
            }
            var y = Man_Shirt.base_src + "fabric_" + J + "/front/";
            var j = Man_Shirt.base_src + "fabric_" + g + "/front/";
            var k = [];
            var u = [];
            if (v == 1) {
                if (h) {
                    if (F && m == "all") {
                        k.push([F + "_cuello_simple_boton_hilo.png"]);
                        u.push([699])
                    }
                    k.push([G + "_cuello_simple_boton_boton.png"]);
                    u.push([698]);
                    if (r && m == "all") {
                        k.push([r + "_cuello_simple_boton_ojal.png"]);
                        u.push([697])
                    }
                } else {
                    k.push([G + "_cuello_simple_boton_boton.png"]);
                    u.push([698])
                }
            } else {
                if (v == 2) {
                    if (h) {
                        if (F && m == "all") {
                            k.push([F + "_cuello_dos_botones_hilo.png"]);
                            u.push([699])
                        }
                        k.push([G + "_cuello_dos_botones_boton.png"]);
                        u.push([698]);
                        if (r && m == "all") {
                            k.push([r + "_cuello_dos_botones_ojal.png"]);
                            u.push([697])
                        }
                    } else {
                        k.push([G + "_cuello_dos_botones_boton.png"]);
                        u.push([698])
                    }
                }
            }
            Man_Shirt.updateButtons("shirt_buttons_base_neck", k, u);
            if (v == 1) {
                if (Man_Shirt.config.shirt_neck != 6) {
                    if (Man_Shirt.config.shirt_neck != 5) {
                        if (g) {
                            images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                zIndex: 600,
                                base_src: j
                            }])
                        } else {
                            images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                zIndex: 600
                            }])
                        }
                        images_neck_base.push(["camisa_base_cuello_un_boton_ext.1.png", {
                            zIndex: 601
                        }])
                    } else {
                        if (g && J) {
                            images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                zIndex: 600,
                                base_src: j
                            }]);
                            images_neck_base.push(["camisa_base_cuello_un_boton_ext.1.png", {
                                zIndex: 601,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                    zIndex: 600,
                                    base_src: j
                                }]);
                                images_neck_base.push(["camisa_base_cuello_un_boton_ext.1.png", {
                                    zIndex: 601
                                }])
                            } else {
                                if (J) {
                                    images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                        zIndex: 600
                                    }]);
                                    images_neck_base.push(["camisa_base_cuello_un_boton_ext.1.png", {
                                        zIndex: 601,
                                        base_src: y
                                    }])
                                } else {
                                    images_neck_base.push(["camisa_base_cuello_un_boton_int.1.png", {
                                        zIndex: 600
                                    }]);
                                    images_neck_base.push(["camisa_base_cuello_un_boton_ext.1.png", {
                                        zIndex: 601
                                    }])
                                }
                            }
                        }
                    }
                }
            } else {
                if (v == 2) {
                    if (Man_Shirt.config.shirt_neck != 5) {
                        if (g) {
                            images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                zIndex: 600,
                                base_src: j
                            }])
                        } else {
                            images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                zIndex: 600
                            }])
                        }
                        images_neck_base.push(["camisa_base_cuello_dos_botones_ext.1.png", {
                            zIndex: 601
                        }])
                    } else {
                        if (g && J) {
                            images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                zIndex: 600,
                                base_src: j
                            }]);
                            images_neck_base.push(["camisa_base_cuello_dos_botones_ext.1.png", {
                                zIndex: 601,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                    zIndex: 600,
                                    base_src: j
                                }]);
                                images_neck_base.push(["camisa_base_cuello_dos_botones_ext.1.png", {
                                    zIndex: 601
                                }])
                            } else {
                                if (J) {
                                    images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                        zIndex: 600
                                    }]);
                                    images_neck_base.push(["camisa_base_cuello_dos_botones_ext.1.png", {
                                        zIndex: 601,
                                        base_src: y
                                    }])
                                } else {
                                    images_neck_base.push(["camisa_base_cuello_dos_botones_int.1.png", {
                                        zIndex: 600
                                    }]);
                                    images_neck_base.push(["camisa_base_cuello_dos_botones_ext.1.png", {
                                        zIndex: 601
                                    }])
                                }
                            }
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_neck == 1) {
                if (v == 1) {
                    if (J && g) {
                        f.push(["camisa_cuello_clasico_dbl.1.png", {
                            zIndex: 701,
                            base_src: j
                        }]);
                        f.push(["camisa_cuello_clasico_con_alpha.1.png", {
                            zIndex: 700,
                            base_src: y
                        }])
                    } else {
                        if (J) {
                            f.push(["camisa_cuello_clasico.1.png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                f.push(["camisa_cuello_clasico_dbl.1.png", {
                                    zIndex: 701,
                                    base_src: j
                                }]);
                                f.push(["camisa_cuello_clasico_con_alpha.1.png", {
                                    zIndex: 700
                                }])
                            } else {
                                f.push(["camisa_cuello_clasico.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                } else {
                    if (v == 2) {
                        if (J && g) {
                            f.push(["camisa_cuello_clasico_dbl.1(2).png", {
                                zIndex: 701,
                                base_src: j
                            }]);
                            f.push(["camisa_cuello_clasico_con_alpha.1(2).png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (J) {
                                f.push(["camisa_cuello_clasico.1(2).png", {
                                    zIndex: 700,
                                    base_src: y
                                }])
                            } else {
                                if (g) {
                                    f.push(["camisa_cuello_clasico_dbl.1(2).png", {
                                        zIndex: 701,
                                        base_src: j
                                    }]);
                                    f.push(["camisa_cuello_clasico_con_alpha.1(2).png", {
                                        zIndex: 700
                                    }])
                                } else {
                                    f.push(["camisa_cuello_clasico.1(2).png", {
                                        zIndex: 700
                                    }])
                                }
                            }
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_neck == 2) {
                if (v == 1) {
                    if (J && g) {
                        f.push(["camisa_cuello_abierto_dbl.1.png", {
                            zIndex: 701,
                            base_src: j
                        }]);
                        f.push(["camisa_cuello_abierto_con_alpha.1.png", {
                            zIndex: 700,
                            base_src: y
                        }])
                    } else {
                        if (J) {
                            f.push(["camisa_cuello_abierto.1.png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                f.push(["camisa_cuello_abierto_dbl.1.png", {
                                    zIndex: 701,
                                    base_src: j
                                }]);
                                f.push(["camisa_cuello_abierto_con_alpha.1.png", {
                                    zIndex: 700
                                }])
                            } else {
                                f.push(["camisa_cuello_abierto.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                } else {
                    if (v == 2) {
                        if (J && g) {
                            f.push(["camisa_cuello_abierto_dbl.1(2).png", {
                                zIndex: 701,
                                base_src: j
                            }]);
                            f.push(["camisa_cuello_abierto_con_alpha.1(2).png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (J) {
                                f.push(["camisa_cuello_abierto.1(2).png", {
                                    zIndex: 700,
                                    base_src: y
                                }])
                            } else {
                                if (g) {
                                    f.push(["camisa_cuello_abierto_dbl.1(2).png", {
                                        zIndex: 701,
                                        base_src: j
                                    }]);
                                    f.push(["camisa_cuello_abierto_con_alpha.1(2).png", {
                                        zIndex: 700
                                    }])
                                } else {
                                    f.push(["camisa_cuello_abierto.1(2).png", {
                                        zIndex: 700
                                    }])
                                }
                            }
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_neck == 3) {
                if (v == 1) {
                    if (J && g) {
                        f.push(["camisa_cuello_largo_dbl.1.png", {
                            zIndex: 701,
                            base_src: j
                        }]);
                        f.push(["camisa_cuello_largo_con_alpha.1.png", {
                            zIndex: 700,
                            base_src: y
                        }])
                    } else {
                        if (J) {
                            f.push(["camisa_cuello_largo.1.png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                f.push(["camisa_cuello_largo_dbl.1.png", {
                                    zIndex: 701,
                                    base_src: j
                                }]);
                                f.push(["camisa_cuello_largo_con_alpha.1.png", {
                                    zIndex: 700
                                }])
                            } else {
                                f.push(["camisa_cuello_largo.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                } else {
                    if (v == 2) {
                        if (J && g) {
                            f.push(["camisa_cuello_largo_dbl.1(2).png", {
                                zIndex: 701,
                                base_src: j
                            }]);
                            f.push(["camisa_cuello_largo_con_alpha.1(2).png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (J) {
                                f.push(["camisa_cuello_largo.1(2).png", {
                                    zIndex: 700,
                                    base_src: y
                                }])
                            } else {
                                if (g) {
                                    f.push(["camisa_cuello_largo_dbl.1(2).png", {
                                        zIndex: 701,
                                        base_src: j
                                    }]);
                                    f.push(["camisa_cuello_largo_con_alpha.1(2).png", {
                                        zIndex: 700
                                    }])
                                } else {
                                    f.push(["camisa_cuello_largo.1(2).png", {
                                        zIndex: 700
                                    }])
                                }
                            }
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_neck == 4) {
                var d = [];
                var i = [];
                if (v == 1) {
                    if (g && J) {
                        if (h) {
                            if (F && m == "all") {
                                d.push([F + "_cuello_botones_abierto_hilo.png"]);
                                i.push([802])
                            }
                            d.push([G + "_cuello_botones_abierto_boton.png"]);
                            i.push([801]);
                            if (r && m == "all") {
                                d.push([r + "_cuello_botones_abierto_ojal.png"]);
                                i.push([800])
                            }
                        } else {
                            d.push([G + "_cuello_botones_abierto_boton.png"]);
                            i.push([801])
                        }
                        f.push(["camisa_cuello_con_botones_dbl.1.png", {
                            zIndex: 701,
                            base_src: j
                        }]);
                        f.push(["camisa_cuello_con_bottones_con_alpha.1.png", {
                            zIndex: 700,
                            base_src: y
                        }])
                    } else {
                        if (J) {
                            if (h) {
                                if (F && m == "all") {
                                    d.push([F + "_cuello_botones_hilo.png"]);
                                    i.push([802])
                                }
                                d.push([G + "_cuello_botones_boton.png"]);
                                i.push([801]);
                                if (r && m == "all") {
                                    d.push([r + "_cuello_botones_ojal.png"]);
                                    i.push([800])
                                }
                            } else {
                                d.push([G + "_cuello_botones_boton.png"]);
                                i.push([801])
                            }
                            f.push(["camisa_cuello_con_botones.1.png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                if (h) {
                                    if (F && m == "all") {
                                        d.push([F + "_cuello_botones_abierto_hilo.png"]);
                                        i.push([802])
                                    }
                                    d.push([G + "_cuello_botones_abierto_boton.png"]);
                                    i.push([801]);
                                    if (r && m == "all") {
                                        d.push([r + "_cuello_botones_abierto_ojal.png"]);
                                        i.push([800])
                                    }
                                } else {
                                    d.push([G + "_cuello_botones_abierto_boton.png"]);
                                    i.push([801])
                                }
                                f.push(["camisa_cuello_con_botones_dbl.1.png", {
                                    zIndex: 701,
                                    base_src: j
                                }]);
                                f.push(["camisa_cuello_con_bottones_con_alpha.1.png", {
                                    zIndex: 700
                                }])
                            } else {
                                if (h) {
                                    if (F && m == "all") {
                                        d.push([F + "_cuello_botones_hilo.png"]);
                                        i.push([802])
                                    }
                                    d.push([G + "_cuello_botones_boton.png"]);
                                    i.push([801]);
                                    if (r && m == "all") {
                                        d.push([r + "_cuello_botones_ojal.png"]);
                                        i.push([800])
                                    }
                                } else {
                                    d.push([G + "_cuello_botones_boton.png"]);
                                    i.push([801])
                                }
                                f.push(["camisa_cuello_con_botones.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                } else {
                    if (v == 2) {
                        if (g && J) {
                            if (h) {
                                if (F && m == "all") {
                                    d.push([F + "_cuello_botones_abierto_hilo.png"]);
                                    i.push([802])
                                }
                                d.push([G + "_cuello_botones_abierto_boton.png"]);
                                i.push([801]);
                                if (r && m == "all") {
                                    d.push([r + "_cuello_botones_abierto_ojal.png"]);
                                    i.push([800])
                                }
                            } else {
                                d.push([G + "_cuello_botones_abierto_boton.png"]);
                                i.push([801])
                            }
                            f.push(["camisa_cuello_con_botones_dbl.1(2).png", {
                                zIndex: 701,
                                base_src: j
                            }]);
                            f.push(["camisa_cuello_con_bottones_con_alpha.1(2).png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (J) {
                                if (h) {
                                    if (F && m == "all") {
                                        d.push([F + "_cuello_botones_hilo.png"]);
                                        i.push([802])
                                    }
                                    d.push([G + "_cuello_botones_boton.png"]);
                                    i.push([801]);
                                    if (r && m == "all") {
                                        d.push([r + "_cuello_botones_ojal.png"]);
                                        i.push([800])
                                    }
                                } else {
                                    d.push([G + "_cuello_botones_boton.png"]);
                                    i.push([801])
                                }
                                f.push(["camisa_cuello_con_botones.1(2).png", {
                                    zIndex: 700,
                                    base_src: y
                                }])
                            } else {
                                if (g) {
                                    if (h) {
                                        if (F && m == "all") {
                                            d.push([F + "_cuello_botones_abierto_hilo.png"]);
                                            i.push([802])
                                        }
                                        d.push([G + "_cuello_botones_abierto_boton.png"]);
                                        i.push([801]);
                                        if (r && m == "all") {
                                            d.push([r + "_cuello_botones_abierto_ojal.png"]);
                                            i.push([800])
                                        }
                                    } else {
                                        d.push([G + "_cuello_botones_abierto_boton.png"]);
                                        i.push([801])
                                    }
                                    f.push(["camisa_cuello_con_botones_dbl.1(2).png", {
                                        zIndex: 701,
                                        base_src: j
                                    }]);
                                    f.push(["camisa_cuello_con_bottones_con_alpha.1(2).png", {
                                        zIndex: 700
                                    }])
                                } else {
                                    if (h) {
                                        if (F && m == "all") {
                                            d.push([F + "_cuello_botones_hilo.png"]);
                                            i.push([802])
                                        }
                                        d.push([G + "_cuello_botones_boton.png"]);
                                        i.push([801]);
                                        if (r && m == "all") {
                                            d.push([r + "_cuello_botones_ojal.png"]);
                                            i.push([800])
                                        }
                                    } else {
                                        d.push([G + "_cuello_botones_boton.png"]);
                                        i.push([801])
                                    }
                                    f.push(["camisa_cuello_con_botones.1(2).png", {
                                        zIndex: 700
                                    }])
                                }
                            }
                        }
                    }
                }
                Man_Shirt.updateButtons("shirt_buttons_neck", d, i)
            }
            if (Man_Shirt.config.shirt_neck != 3 && Man_Shirt.config.shirt_neck != 4 && Man_Shirt.config.shirt_neck != 5) {
                if (Man_Shirt.extras.tuxedo == "1") {
                    $("#shirt_chest_pocket1").attr("disabled", "disabled");
                    $("#shirt_chest_pocket2").attr("disabled", "disabled");
                    $("#shirt_button_close_french").attr("disabled", "disabled")
                }
            } else {
                $("#shirt_chest_pocket1").removeAttr("disabled");
                $("#shirt_chest_pocket2").removeAttr("disabled");
                $("#shirt_button_close_french").removeAttr("disabled")
            }
            if (Man_Shirt.config.shirt_neck == 5) {}
            if (Man_Shirt.config.shirt_neck == 6) {
                if (v == 1) {
                    n.layers.shirt_base_neck.removeImages();
                    n.layers.shirt_base_neck.redraw();
                    if (J && g) {
                        f.push(["camisa_cuello_smoking_ext.1.png", {
                            zIndex: 690,
                            base_src: y
                        }]);
                        f.push(["camisa_cuello_smoking_int.1.png", {
                            zIndex: 700,
                            base_src: j
                        }])
                    } else {
                        if (J) {
                            f.push(["camisa_cuello_smoking_ext.1.png", {
                                zIndex: 690,
                                base_src: y
                            }]);
                            f.push(["camisa_cuello_smoking_int.1.png", {
                                zIndex: 690
                            }])
                        } else {
                            if (g) {
                                f.push(["camisa_cuello_smoking_ext.1.png", {
                                    zIndex: 690
                                }]);
                                f.push(["camisa_cuello_smoking_int.1.png", {
                                    zIndex: 690,
                                    base_src: j
                                }])
                            } else {
                                f.push(["camisa_cuello_smoking_ext.1.png", {
                                    zIndex: 690
                                }]);
                                f.push(["camisa_cuello_smoking_int.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_neck == 7) {
                if (v == 1) {
                    if (g && J) {
                        f.push(["camisa_cuello_redondeado_dbl.1.png", {
                            zIndex: 701,
                            base_src: j
                        }]);
                        f.push(["camisa_cuello_redondeado_con_alpha.1.png", {
                            zIndex: 700,
                            base_src: y
                        }])
                    } else {
                        if (J) {
                            f.push(["camisa_cuello_redondeado.1.png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (g) {
                                f.push(["camisa_cuello_redondeado_dbl.1.png", {
                                    zIndex: 701,
                                    base_src: j
                                }]);
                                f.push(["camisa_cuello_redondeado_con_alpha.1.png", {
                                    zIndex: 700
                                }])
                            } else {
                                f.push(["camisa_cuello_redondeado.1.png", {
                                    zIndex: 700
                                }])
                            }
                        }
                    }
                } else {
                    if (v == 2) {
                        if (g && J) {
                            f.push(["camisa_cuello_redondeado_dbl.1(2).png", {
                                zIndex: 701,
                                base_src: j
                            }]);
                            f.push(["camisa_cuello_redondeado_con_alpha.1(2).png", {
                                zIndex: 700,
                                base_src: y
                            }])
                        } else {
                            if (J) {
                                f.push(["camisa_cuello_redondeado.1(2).png", {
                                    zIndex: 700,
                                    base_src: y
                                }])
                            } else {
                                if (g) {
                                    f.push(["camisa_cuello_redondeado_dbl.1(2).png", {
                                        zIndex: 701,
                                        base_src: j
                                    }]);
                                    f.push(["camisa_cuello_redondeado_con_alpha.1(2).png", {
                                        zIndex: 700
                                    }])
                                } else {
                                    f.push(["camisa_cuello_redondeado.1(2).png", {
                                        zIndex: 700
                                    }])
                                }
                            }
                        }
                    }
                }
            }
            n.layers.shirt_base_neck.setImages(images_neck_base);
            n.layers.shirt_base_neck.redraw();
            n.layers.shirt_neck.setImages(f);
            n.layers.shirt_neck.redraw();
            n.layers.shirt_buttons_neck.redraw()
        }
        if (typeof(Man_Shirt.extras.tuxedo) != "undefined") {
            n.layers.shirt_tuxedo.removeImages();
            if (Man_Shirt.extras.tuxedo == 1) {
                n.layers.shirt_tuxedo.setImages([
                    ["camisa_pliegues_frontales.1.png", {
                        zIndex: 400
                    }]
                ]);
                n.layers.shirt_tuxedo.redraw()
            }
        }
        if (typeof(Man_Shirt.config.shirt_cuffs) != "undefined") {
            var b = [];
            n.layers.shirt_buttons_cuff.removeImages();
            var J = Man_Shirt.extras["cuffs_fabric[id_t4l_fabric][out]"];
            if (typeof Man_Shirt.extras.cuffs_fabric != "undefined") {
                J = Man_Shirt.extras.cuffs_fabric["id_t4l_fabric"]["out"]
            }
            var g = Man_Shirt.extras["cuffs_fabric[id_t4l_fabric][in]"];
            if (typeof Man_Shirt.extras.cuffs_fabric != "undefined") {
                g = Man_Shirt.extras.cuffs_fabric["id_t4l_fabric"]["in"]
            }
            var y = Man_Shirt.base_src + "fabric_" + J + "/front/";
            var j = Man_Shirt.base_src + "fabric_" + g + "/front/";
            var B = [];
            var A = [];
            if (Man_Shirt.config.shirt_cuffs == 1) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_un_boton_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_un_boton_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_un_boton_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_un_boton_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_un_bot_clasic_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_un_bot_clasic_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }]);
                    b.push(["camisa_flecha_clasico.1.png", {
                        zIndex: 250
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_un_bot_clasic_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_un_bot_clasic_int.1.png", {
                            zIndex: 150
                        }]);
                        b.push(["camisa_flecha_clasico.1.png", {
                            zIndex: 250
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_un_bot_clasic_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_clasic_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }]);
                            b.push(["camisa_flecha_clasico.1.png", {
                                zIndex: 250
                            }])
                        } else {
                            b.push(["camisa_puno_un_bot_clasic_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_clasic_int.1.png", {
                                zIndex: 150
                            }]);
                            b.push(["camisa_flecha_clasico.1.png", {
                                zIndex: 250
                            }])
                        }
                    }
                }
            }
            if (Man_Shirt.config.shirt_cuffs == 2) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_dos_botones_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_dos_botones_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_dos_botones_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_dos_botones_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_dos_bot_clasic_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_dos_bot_clasic_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_dos_bot_clasic_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_dos_bot_clasic_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_dos_bot_clasic_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_clasic_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_dos_bot_clasic_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_clasic_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_clasico.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 3) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_un_boton_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_un_boton_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_un_boton_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_un_boton_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_un_bot_cortado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_un_bot_cortado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_un_bot_cortado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_un_bot_cortado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_un_bot_cortado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_cortado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_un_bot_cortado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_cortado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_clasico.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 4) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_dos_botones_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_dos_botones_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_dos_botones_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_dos_botones_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_dos_bot_cortado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_dos_bot_cortado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_dos_bot_cortado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_dos_bot_cortado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_dos_bot_cortado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_cortado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_dos_bot_cortado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_cortado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_clasico.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 7) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_un_boton_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_un_boton_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_un_boton_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_un_boton_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_un_boton_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_un_bot_redondeado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_un_bot_redondeado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_un_bot_redondeado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_un_bot_redondeado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_un_bot_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_redondeado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_un_bot_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_redondeado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_clasico.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 8) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_dos_botones_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_dos_botones_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_dos_botones_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_dos_botones_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_dos_botones_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_dos_bot_redondeado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_dos_bot_redondeado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_dos_bot_redondeado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_dos_bot_redondeado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_dos_bot_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_redondeado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_dos_bot_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_dos_bot_redondeado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_clasico.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 5) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_gemelo_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_gemelo_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_gemelo_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_gemelo_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_un_bot_gemelo_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_un_bot_gemelo_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_un_bot_gemelo_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_un_bot_gemelo_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_un_bot_gemelo_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_gemelo_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_un_bot_gemelo_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_gemelo_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_gemelos.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 6) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_gemelo_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_gemelo_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_gemelo_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_gemelo_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_doble_gemelo_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_doble_gemelo_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_doble_gemelo_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_doble_gemelo_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_doble_gemelo_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_doble_gemelo_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_doble_gemelo_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_doble_gemelo_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_gemelos.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 9) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_gemelo_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_gemelo_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_gemelo_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_gemelo_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_un_bot_gemel_redondeado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_un_bot_gemel_redondeado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_un_bot_gemel_redondeado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_un_bot_gemel_redondeado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_un_bot_gemel_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_gemel_redondeado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_un_bot_gemel_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_un_bot_gemel_redondeado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_gemelos.1.png", {
                    zIndex: 250
                }])
            }
            if (Man_Shirt.config.shirt_cuffs == 10) {
                if (h) {
                    if (F && m == "all") {
                        B.push([F + "_puno_gemelo_hilo.png"]);
                        A.push([902])
                    } else {
                        if (F && m == "cuff") {
                            B.push([F + "_flecha_gemelo_hilo.png"]);
                            A.push([902])
                        }
                    }
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901]);
                    if (r && m == "all") {
                        B.push([r + "_puno_gemelo_ojal.png"]);
                        A.push([900])
                    } else {
                        if (r && m == "cuff") {
                            B.push([r + "_flecha_gemelo_ojal.png"]);
                            A.push([900])
                        }
                    }
                } else {
                    B.push([G + "_puno_gemelo_boton.png"]);
                    A.push([901])
                }
                if (J && g) {
                    b.push(["camisa_puno_doble_gemelo_redondeado_ext.1.png", {
                        zIndex: 300,
                        base_src: y
                    }]);
                    b.push(["camisa_puno_doble_gemelo_redondeado_int.1.png", {
                        zIndex: 150,
                        base_src: j
                    }])
                } else {
                    if (J) {
                        b.push(["camisa_puno_doble_gemelo_redondeado_ext.1.png", {
                            zIndex: 300,
                            base_src: y
                        }]);
                        b.push(["camisa_puno_doble_gemelo_redondeado_int.1.png", {
                            zIndex: 150
                        }])
                    } else {
                        if (g) {
                            b.push(["camisa_puno_doble_gemelo_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_doble_gemelo_redondeado_int.1.png", {
                                zIndex: 150,
                                base_src: j
                            }])
                        } else {
                            b.push(["camisa_puno_doble_gemelo_redondeado_ext.1.png", {
                                zIndex: 300
                            }]);
                            b.push(["camisa_puno_doble_gemelo_redondeado_int.1.png", {
                                zIndex: 150
                            }])
                        }
                    }
                }
                b.push(["camisa_flecha_gemelos.1.png", {
                    zIndex: 250
                }])
            }
            Man_Shirt.updateButtons("shirt_buttons_cuff", B, A);
            n.layers.shirt_cuff.setImages(b);
            n.layers.shirt_cuff.redraw();
            n.layers.shirt_buttons_cuff.redraw();
            if (Man_Shirt.config.shirt_sleeve == "short") {
                n.layers.shirt_buttons_cuff.removeImages();
                n.layers.shirt_cuff.removeImages()
            }
        }
        var q = false;
        if (Man_Shirt.extras.initials) {
            var l = Man_Shirt.extras.initials;
            q = l.text;
            var p = l.color_custom;
            var s = l.pos;
            var D = l.type
        } else {
            if (Man_Shirt.extras["initials[text]"]) {
                q = Man_Shirt.extras["initials[text]"];
                var p = Man_Shirt.extras["initials[color_custom]"];
                var s = Man_Shirt.extras["initials[pos]"];
                var D = Man_Shirt.extras["initials[type]"]
            }
        }
        if (q) {
            if (D == 24) {
                D = "Arial"
            } else {
                if (D == 19) {
                    D = "Monotype Corsiva"
                } else {
                    if (D == 74) {
                        D = "Times New Roman"
                    } else {
                        if (D == 77) {
                            D = "Rockwell"
                        }
                    }
                }
            }
            if (p == 20) {
                p = "2361ad"
            } else {
                if (p == 21) {
                    p = "ffcf10"
                } else {
                    if (p == 22) {
                        p = "a48239"
                    } else {
                        if (p == 23) {
                            p = "e63b85"
                        } else {
                            if (p == 26) {
                                p = "dd2535"
                            } else {
                                if (p == 27) {
                                    p = "ffffff"
                                } else {
                                    if (p == 28) {
                                        p = "34a547"
                                    } else {
                                        if (p == 29) {
                                            p = "000000"
                                        } else {
                                            if (p == 24) {
                                                p = "b3b3b3"
                                            } else {
                                                if (p == 35) {
                                                    p = "ff7912"
                                                } else {
                                                    if (p == 36) {
                                                        p = "731422"
                                                    } else {
                                                        if (p == 37) {
                                                            p = "5d1970"
                                                        } else {
                                                            if (p == 38) {
                                                                p = "b8f2f2"
                                                            } else {
                                                                if (p == 39) {
                                                                    p = "3d2a26"
                                                                } else {
                                                                    if (p == 40) {
                                                                        p = "4477cf"
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
                            }
                        }
                    }
                }
            }
            var e = "<div id='initials_3d'></div>";
            $("#model_3d_preview").append(e);

            function z(M, K) {
                for (var L in K) {
                    M.setAttribute(L, K[L])
                }
            }
            if (window.mobile_enabled) {
                var c = $("#shirt_initials_svg").empty().get(0);
                c.setAttribute("width", $("#model_3d_preview").width());
                var E = document.createElementNS("http://www.w3.org/2000/svg", "text");
                E.textContent = q;
                z(E, {
                    "font-family": D,
                    "font-size": "8px",
                    fill: "#" + p
                });
                switch (s) {
                    case "sleeve":
                        z(E, {
                            x: 354,
                            y: 221,
                            transform: "rotate(48,170,155)"
                        });
                        break;
                    case "top":
                        z(E, {
                            x: 223,
                            y: 145,
                            transform: "rotate(3,170,155)"
                        });
                        break;
                    case "middle":
                        z(E, {
                            x: 216,
                            y: 244,
                            transform: "rotate(2,170,155)"
                        });
                        break;
                    case "bottom":
                        z(E, {
                            x: 216,
                            y: 349,
                            transform: "rotate(3,170,155)"
                        });
                        break
                }
                c.appendChild(E)
            } else {
                var w = Raphael("initials_3d", 400, 465);
                if (s == "sleeve") {
                    var t = w.text(354, 221, q).attr("font-family", D).attr("font-size", "6px").attr("fill", "#" + p);
                    t.rotate(48, 170, 155)
                } else {
                    if (s == "top") {
                        var t = w.text(223, 145, q).attr("font-family", D).attr("font-size", "8px").attr("fill", "#" + p);
                        t.rotate(3, 170, 155)
                    } else {
                        if (s == "middle") {
                            var t = w.text(216, 244, q).attr("font-family", D).attr("font-size", "8px").attr("fill", "#" + p);
                            t.rotate(2, 170, 155)
                        } else {
                            if (s == "bottom") {
                                var t = w.text(216, 349, q).attr("font-family", D).attr("font-size", "8px").attr("fill", "#" + p);
                                t.rotate(3, 170, 155)
                            }
                        }
                    }
                }
                $("#initials_3d svg").css("z-index", 9000)
            }
        } else {
            if (window.mobile_enabled) {
                $("#shirt_initials_svg").empty()
            }
        }
    },
    init_scroll: function() {},
    updateButtons: function(d, a, b) {
        var e = Man_Shirt.lmanager;
        var c = [];
        for (idx = 0; idx < a.length; idx++) {
            c.push([a[idx], {
                zIndex: b[idx]
            }])
        }
        e.layers[d].setImages(c);
        e.layers[d].redraw()
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
    get_name_color: function(a) {
        color = Man_Shirt.button_color;
        if (a == 20) {
            color = "blue"
        } else {
            if (a == 21) {
                color = "yellow"
            } else {
                if (a == 22) {
                    color = "gold"
                } else {
                    if (a == 23) {
                        color = "pink"
                    } else {
                        if (a == 26) {
                            color = "red"
                        } else {
                            if (a == 27) {
                                color = "white"
                            } else {
                                if (a == 28) {
                                    color = "green"
                                } else {
                                    if (a == 29) {
                                        color = "black"
                                    } else {
                                        if (a == 24) {
                                            color = "gray"
                                        } else {
                                            if (a == 35) {
                                                color = "orange"
                                            } else {
                                                if (a == 36) {
                                                    color = "maroon"
                                                } else {
                                                    if (a == 37) {
                                                        color = "purple"
                                                    } else {
                                                        if (a == 38) {
                                                            color = "pastelblue"
                                                        } else {
                                                            if (a == 39) {
                                                                color = "brown"
                                                            } else {
                                                                if (a == 40) {
                                                                    color = "steelblue"
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
                        }
                    }
                }
            }
        }
        return color
    },
    updatePrice: function() {

        var r = $("input[name='go_to']").val();
      if(r=="extras" || r=="fabric" || r=="configure") {
        $.ajax({
            type:"POST",
            async:false,
            url: "https://customclothiers.com/includes/action/price_update.php",
            data: {customizer_price: window.shirt_price},
            /*success:function(data) {
                alert(data);

      }*/
        });
      }

      else {

        console.log(window.shirt_price);
        var b = 0;
        for (var a in window.shirt_price) {
            b += window.shirt_price[a] * 1
        }
        b = b.toFixed(2);
        if (b == parseInt(b)) {
            b = parseInt(b)
        }
        if (window.global_dsc) {
            $("#price_discount").html((b * window.global_dsc).toFixed(2) + "<small>$</small>")
        }
        $("#price_img").html(formatPrice(b, "configure"))
    }
 }
};