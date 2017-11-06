var Man_Suit = {
    id_t4l_fabric: null,
    default_id_t4l_lining: null,
    current_id_t4l_lining: null,
    id_t4l_lining: null,
    render: null,
    options_container: null,
    options: null,
    config: null,
    extras: null,
    model_position: "front",
    filter_form: "#filters",
    container_fabrics: null,
    button_code: null,
    waistcoat_button_code: null,
    shoe_color: null,
    model_status: null,
    suit_type: null,
    current_t4l_fabric: "default_fabric",
    cloth_open: false,
    id_tie: false,
    bLazy: false,
    url:"https://customclothiers.com/",
    jacket_lining_radio: "",
    initCommon: function(b, f, d, e, a, g, c, h,z) {

        var o = $("div.controls").find("a.zoom");
        
        window.suit_price.metal_buttons= window.suit_price.metal_buttons;

        window.suit_price.lining_jacket=0;

        window.suit_price.patches= window.suit_price.patches;

        window.suit_price.handkerchief= window.suit_price.handkerchief;

        window.suit_price.button_holes_threads_jacket= window.suit_price.button_holes_threads_jacket;

        window.suit_price.fabric =  window.suit_price.fabric;

        window.suit_price.base = window.suit_price.base;

        window.suit_price.waistcoat = window.suit_price.waistcoat;

        window.suit_price.extra_pant = window.suit_price.extra_pant;

        Man_Suit.updatePrice();
        
        Man_Suit.options_container = (typeof(b) == "string") ? $(b) : b;
        Man_Suit.id_t4l_fabric = d;
        Man_Suit.id_t4l_lining = g;
        Man_Suit.shoe_color = a;
        Man_Suit.button_code = e;
        Man_Suit.waistcoat_button_code = c;
        Man_Suit.id_tie = h;

        if(product_type=='man_suit2') {
            Man_Suit.render = new Man_Suit_3D(f, {
                product_type: "man_suit",
                fabric: {
                    jacket: "141",
                    pants: "141",
                    waistcoat: "141",
                    waistcoat_lining_back: g.waistcoat
                },
                pants_button_code: Man_Suit.button_code,
                waistcoat_button_code: Man_Suit.waistcoat_button_code,
                jacket_button_code: Man_Suit.button_code,
                shoes_color: Man_Suit.shoe_color,
                id_tie: Man_Suit.id_tie
            });
        }
        else if(product_type=='man_jacket') {
            Man_Suit.render = new Man_Suit_3D(f, {
                product_type: "man_jacket",
                fabric: {
                    jacket: "141",
                    pants: "141",
                    waistcoat: "141",
                    waistcoat_lining_back: g.waistcoat
                },
                pants_button_code: Man_Suit.button_code,
                waistcoat_button_code: Man_Suit.waistcoat_button_code,
                jacket_button_code: Man_Suit.button_code,
                id_tie: Man_Suit.id_tie
            });

        }
        if (!window.mobile_enabled) {
            $("input.uniform, select.uniform").uniform()
        }
        $("#show_hide_pieces a.show_full_parcial").click(function() {
            var i = this.rel;
            Man_Suit.showCloths(i)
        });
        $("#change_position").click(function() {
            Man_Suit.setModel_position((Man_Suit.model_position == "front") ? "back" : "front")
        });
        if (typeof(Blazy) != "undefined") {
            Man_Suit.bLazy = new Blazy({
                success: function(i) {
                    i.parentNode.className = i.parentNode.className.replace(/\loading\b/, "")
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
    initConfigure: function(def) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        
        /*if(def_fab_id == def.default_fabric && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show();    
       }
        else if(def_fab_id != def.default_fabric && action=="update") {
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

        var lining_jacket_price = $("input[name='lining_jacket_price']").val();
        window.suit_price.lining_jacket=0;

        $("input[name='extra_pants']").on("click",function(){
             var extra_pant_type = $(this).val();
             if(extra_pant_type=='Yes')
             {
                
                 window.suit_price.extra_pant = window.price_extra_pant;
                 Man_Suit.updatePrice();
             }
             else
             {
                
                window.suit_price.extra_pant = 0;
                Man_Suit.updatePrice();
             }

        });

        if (window.mobile_enabled) {
            var b = false;

            function c() {
                if (b) {
                    b.hide();
                    b = false;
                    $("#body_height").css("overflow", "")
                }
            }
            $(".options a").click(function() {
                var i = this.getAttribute("href").replace("/^[^#]/", "");
                var j = i.replace("#", "");
                History.pushState({
                    option: j,
                    rel: i
                }, window.title, "?option=" + j);
                return false
            });

            function g() {
                c();
                var i = History.getState();
                if (typeof(i.data.rel) != "undefined") {
                    b = $(i.data.rel).show();
                    if (!b.hasClass("manual_close")) {
                        b.addClass("manual_close").click(function() {
                            History.back()
                        })
                    }
                    $("#body_height").css("overflow", "hidden")
                }
            }
            History.Adapter.bind(window, "statechange", g);
            g()
        }
        $("#configure-form1 a.next").click(function() {
            
            $(this).addClass("icon-loading").iosRefresh();
            $("#go_to").attr('value','fabric');
            Man_Suit.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Suit.updatePrice();
            $("#configure_form").submit();
            return false
        });
        $("#link_extras").click(function() {
            $("#go_to").attr("value", "extras");
            Man_Suit.updatePrice();
            $("#configure_form").submit();
            return false
        });
        if (window.mobile_enabled) {
            var a = $(".options_list").find("a");
            $(".option_trigger").bind("select", function() {
                a.filter("." + this.parentNode.parentNode.id).text($(".suit-icon", this).text())
            })
        }
        Man_Suit.initInteractiveOptions(Man_Suit.options_container);
        if (window.mobile_enabled) {
            $("#suit_type div.option_trigger").click(function() {
                Man_Suit.change_suit_type($("#input_suit_type").val())
            });
            Man_Suit.change_suit_type($("#input_suit_type").val())
        } else {
            $("div.select_suit_type input").click(function() {
                /*$("#model_3d_preview1").css('display','none');
                $("#model_3d_preview").css('display','block');*/
                $("#box_change_position").show();
                $("#show_hide_pieces").show();
                $(".controls").show();
                Man_Suit.change_suit_type(this.value)
            });
            Man_Suit.change_suit_type($("div.select_suit_type input:checked").val())
        }
        if (window.mobile_enabled) {
            $("#pants_back_pocket div.option_trigger").click(function() {
                var i = $(this).attr("num_pockets");
                $("#input_pants_back_pocket").val(i);
                Man_Suit.redraw(true)
            })
        } else {
            function h() {
                var i = $("#box_back_pocket input.num_b:checked").val();
                if (i == 0) {
                    $("#box_back_pocket_img .box_pocket").hide()
                } else {
                    if (i == 1) {
                        $("#box_back_pocket_img .box_pocket").show()
                    } else {
                        if (i == 2) {
                            $("#box_back_pocket_img .box_pocket").show()
                        }
                    }
                }
            }
            $("#box_back_pocket input").click(h);
            h()
        }
        if (window.mobile_enabled) {
            if ($("#input_jacket_sleeve_buttons").val() == 0) {
                $("#li_jacket_sleeve_buttonholes").hide()
            }
            $("#jacket_sleeve_buttons div.common_th").click(function() {
                if ($(this).attr("rel") == 0) {
                    $("#li_jacket_sleeve_buttonholes").hide()
                } else {
                    $("#li_jacket_sleeve_buttonholes").show()
                }
            })
        } else {
            if ($("select#jacket_sleeve_buttons").find(":selected").val() == "0") {
                $("div#sleeve_buttonholes").hide()
            }
            $("select#jacket_sleeve_buttons").change(function() {
                if ($(this).find(":selected").val() == "0") {
                    $("div#sleeve_buttonholes").find("input[value=0]").attr("checked", "checked");
                    if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
                        $.uniform.update()
                    }
                    $("div#sleeve_buttonholes").hide()
                } else {
                    $("div#sleeve_buttonholes").show()
                }
            })
        }
        if (window.mobile_enabled) {
            if ($("#input_jacket_style").val() == "mao") {
                $("#li_jacket_lapel_type").hide();
                $("#li_jacket_buttons").hide()
            }
            $("#jacket_style div.common_th").click(function() {
                if ($(this).attr("rel") != "mao") {
                    $("#li_jacket_lapel_type").show();
                    $("#li_jacket_buttons").show()
                } else {
                    $("#li_jacket_lapel_type").hide();
                    $("#li_jacket_buttons").hide()
                }
            })
        } else {
            if ($("input#jacket_style_mao:checked").length) {
                $("div#lapel_options").hide()
            }
            $("div#options_jacket_style input").click(function() {
                if ($(this).val() == "mao") {
                    $("div#lapel_options").hide()
                } else {
                    $("div#lapel_options").show()
                }
            })
        }
        Man_Suit.updateNumButtons();
        if (window.mobile_enabled) {
            $("#jacket_style div.option_trigger").click(function() {
                Man_Suit.updateNumButtons()
            })
        } else {
            $("input.jacket_style").click(function() {
                Man_Suit.updateNumButtons()
            })
        }

        function d() {
            var j = $(this).attr("layer");
            if (typeof(j) !== "undefined") {
                var i = Man_Suit.render.lmanager.layers[j].position;
                if (i != Man_Suit.model_position) {
                    Man_Suit.setModel_position(i)
                }
            }
            Man_Suit.redraw(true)
        }
        $("input.radio_opt , div.common_th", Man_Suit.options_container).click(d);
        $("select", Man_Suit.options_container).change(d);
        if (!window.mobile_enabled) {
            Man_Suit.updatePocketOptions($("input.num_b.jacket:checked"), true);
            $("div.labels_jacket_pockets_num input.num_b.jacket").click(function() {
                Man_Suit.updatePocketOptions($(this), false)
            })
        }
        if (window.mobile_enabled) {
            $("#waistcoat_style div.option_trigger").click(function() {
                var j = $(this).attr("rel");
                if (j == "simple") {
                    var i = []
                } else {
                    if (j == "crossed") {
                        var i = [3, 5]
                    }
                }
                $("#waistcoat_buttons div.option_trigger").show().addClass("visible").removeClass("hide");
                var k = false;
                $.each(i, function(l, m) {
                    if ($("#waistcoat_buttons div.bttn" + m).hasClass("active")) {
                        k = true
                    }
                    $("#waistcoat_buttons div.bttn" + m).hide().addClass("hide").removeClass("visible")
                });
                if (k) {
                    $("#waistcoat_buttons div.option_trigger").removeClass("active");
                    $("#waistcoat_buttons div.option_trigger.visible").eq(0).addClass("active");
                    $("#waistcoat_buttons input[type='hidden']").val($("#waistcoat_buttons div.option_trigger.active").attr("rel"))
                }
            })
        } else {
            $("input.waistcoat_style").click(function() {
                if (this.value == "crossed") {
                    $("#waistcoat_buttons").disableOptions([3, 5])
                } else {
                    $("#waistcoat_buttons").disableOptions([])
                }
                $("#waistcoat_buttons option").removeAttr("selected");
                $("#waistcoat_buttons option:eq(0)").attr("selected", "selected");
                $.uniform.update()
            });
            var e = $("input.waistcoat_style:checked").val();
            if (e == "crossed") {
                $("#waistcoat_buttons").disableOptions([3, 5])
            }
        }
        $("input.lapel_bool").click(function() {
            if (this.value == 0) {
                $(".all_lapels_options").hide();
                $("#hidden_waistcoat_lapels").val("")
            } else {
                $(".all_lapels_options").show();
                $("div.lapels_images div.option_trigger:first-child").click()
            }
        });
        $("input.num_w.waistcoat").click(function() {
            if (this.value == 0) {
                $(".all_waistcoat_pockets").hide();
                $("#hidden_waistcoat_pockets").val("")
            } else {
                if (this.value == 2) {
                    $(".all_waistcoat_pockets").show();
                    $(".all_waistcoat_pockets div.1pocket").show();
                    $(".all_waistcoat_pockets div.2pocket").hide();
                    var i = $("#hidden_waistcoat_pockets").val();
                    switch (i) {
                        case "2":
                            $(".all_waistcoat_pockets div.1pocket div.option_trigger[rel=2]").click();
                            break;
                        case "2a":
                            $(".all_waistcoat_pockets div.1pocket div.option_trigger[rel=2a]").click();
                            break;
                        case "2b":
                            $(".all_waistcoat_pockets div.1pocket div.option_trigger[rel=2b]").click();
                            break;
                        default:
                            $(".all_waistcoat_pockets div.1pocket div.option_trigger:first-child").click()
                    }
                } else {
                    $(".all_waistcoat_pockets").show();
                    $(".all_waistcoat_pockets div.1pocket").hide();
                    $(".all_waistcoat_pockets div.2pocket").show();
                    var i = $("#hidden_waistcoat_pockets").val();
                    switch (i) {
                        case "3":
                            $(".all_waistcoat_pockets div.2pocket div.option_trigger[rel=3]").click();
                            break;
                        case "3a":
                            $(".all_waistcoat_pockets div.2pocket div.option_trigger[rel=3a]").click();
                            break;
                        case "3b":
                            $(".all_waistcoat_pockets div.2pocket div.option_trigger[rel=3b]").click();
                            break;
                        default:
                            $(".all_waistcoat_pockets div.2pocket div.option_trigger:first-child").click()
                    }
                }
            }
        });
        $("div.labels_waistcoat_pockets_num").find("input.num_b:checked").click();

        function f(k) {
            var m = k.closest("div.box_opts").attr("product_type");
            var j = k.attr("layer");
            if (window.mobile_enabled) {
                if (j == "jacket_sleeve_buttonholes") {
                    var l = k.val();
                    if (l == 0) {
                        Man_Suit.render.jacket_cuff_opened = true
                    } else {
                        Man_Suit.render.jacket_cuff_opened = false
                    }
                }
            } else {
                if (j == "jacket_sleeve_buttonholes") {
                    var l = k.val();
                    if (l == 0) {
                        Man_Suit.render.jacket_cuff_opened = false
                    } else {
                        Man_Suit.render.jacket_cuff_opened = true
                    }
                }
            }
            if (typeof(j) != "undefined") {
                if (typeof(Man_Suit.render.lmanager.layers[j]) != "undefined") {
                    var i = Man_Suit.render.lmanager.layers[j].position;
                    if (i != Man_Suit.model_position) {
                        Man_Suit.setModel_position(i)
                    }
                }
            }
            if (typeof(Man_Suit.render.lmanager.layers[j]) != "undefined") {
                if (typeof(m) != "undefined") {
                    switch (m) {
                        case "jacket":
                            if (!k.hasClass("suit_type")) {
                                var i = Man_Suit.render.lmanager.layers[j].position;
                                if (i != Man_Suit.model_position) {
                                    Man_Suit.setModel_position(i)
                                }
                                if (Man_Suit.suit_type == "man_suit3") {
                                    Man_Suit.showCloths("full_suit3", true)
                                }
                                if (Man_Suit.suit_type == "man_suit2") {
                                    Man_Suit.showCloths("full_suit2", true)
                                }
                                /*$("#model_3d_preview1").css('display','none');
                                $("#model_3d_preview").css('display','block');*/
                                $("#box_change_position").show();
                                $("#show_hide_pieces").show();
                                $(".controls").show();
                            }
                            break;
                        case "waistcoat":
                            var i = Man_Suit.render.lmanager.layers[j].position;
                            if (i != Man_Suit.model_position) {
                                Man_Suit.setModel_position(i)
                            }
                            if (Man_Suit.suit_type == "man_suit3") {
                                Man_Suit.showCloths("parcial_suit3", true)
                            }
                            if (Man_Suit.suit_type == "man_suit2") {
                                Man_Suit.showCloths("parcial_suit2", true)
                            }
                                /*$("#model_3d_preview1").css('display','none');
                                $("#model_3d_preview").css('display','block');*/
                                $("#box_change_position").show();
                                $("#show_hide_pieces").show();
                                $(".controls").show();
                            break;
                        case "pants":
                            var i = Man_Suit.render.lmanager.layers[j].position;
                            if (i != Man_Suit.model_position) {
                                Man_Suit.setModel_position(i)
                            }
                            if (Man_Suit.suit_type == "man_suit3") {
                                Man_Suit.showCloths("parcial_suit3", true)
                            }
                            if (Man_Suit.suit_type == "man_suit2") {
                                Man_Suit.showCloths("parcial_suit2", true)
                            }
                                /*$("#model_3d_preview1").css('display','none');
                                $("#model_3d_preview").css('display','block');*/
                                                                                                                                                                                                                                                                          $("#box_change_position").show();
                                $("#show_hide_pieces").show();
                                $(".controls").show();
                            break;
                        default:
                            break
                    }
                }
            }
        }
        $("input.uniform, div.option_trigger").click(function() {
            f($(this))
        });
        $("select.uniform").change(function() {
            f($(this))
        });
        $("#loading_fabric").hide()
    },
    initFabrics: function(w, c, o,def1) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        
        /*if(def_fab_id == def1.default_fabric && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show(); 
        }
        else if(def_fab_id != def1.default_fabric && action=="update") {
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
        
        $fab_id =  $("input[name='fabric_id']").val();
        $("input[name='fabric_id']").val($fab_id); 

        $title1 = $('a.select:first').attr("title");

         if($title1.trim()=='In-Store Fabric Selection')
            $(".instore_fab").show();

        var lining_jacket_price = $("input[name='lining_jacket_price']").val();
        window.suit_price.lining_jacket=0;

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
            
             

            $(".suit_fabric").removeClass("selected").filter(".suit_fabric_" + $fabric_id).addClass("selected");
            $fab_name.html('<b>'+ $title + '</b>');
            $fab_composition.text($composition);
            $fab_img.removeAttr('style');
            //$fab_img.attr('style','background:url('+Man_Suit.url+'assets/dimg/fabric/'+$fabric_id+'_big.jpg)');
            $(".fabimgs").attr('src',""+Man_Suit.url+'assets/dimg/fabric/'+$fabric_id+'_normal.jpg');
            window.suit_price.fabric = window.fabric_prices[$fabric_id];
            Man_Suit.updatePrice();
        }
        });

        var r = $("#fabric_preview_layer");
        var l = 0;
        Man_Suit.updateNumButtons();
        Man_Suit.redraw(true);
        Man_Suit.suit_type = w;
        Man_Suit.updatePrice();
        var m = false;
        var a = "";
        if ($("#box_fabric_waistcoat input").is(":checked")) {
            m = true;
            a = "default_fabric"
        }
        $("#fabric_form1 a.next").click(function() {
            $(this).addClass("icon-loading").iosRefresh();
            /*if (Man_Suit.suit_type == "man_suit3") {
                if ($("#box_fabric_waistcoat input").is(":checked")) {
                    if (Man_Suit.id_t4l_fabric.waistcoat == c && Man_Suit.id_t4l_fabric.default_fabric != c) {
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
              Man_Suit.updatePrice();
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
                Man_Suit.updatePrice();
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
                Man_Suit.updatePrice();
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
                Man_Suit.updatePrice();
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
        Man_Suit.container_fabrics = $("#slider_fabrics");
        Man_Suit.filter_form = $("#filters");

        function t(G) {
            Man_Suit.current_t4l_fabric = G;
            var J = Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric];
            $("#slider_fabrics div.suit_fabric").removeClass("selected").find("img.selected").css("display", "none");
            $("#suit_fabric_" + J).addClass("selected").find("img.selected").show();
            if (Man_Suit.current_t4l_fabric == "waistcoat") {
                if (Man_Suit.suit_type == "man_suit2") {
                    Man_Suit.showCloths("parcial_suit2")
                } else {
                    if (Man_Suit.suit_type == "man_suit3") {
                        Man_Suit.showCloths("parcial_suit3")
                    }
                }
                $("#slider_fabrics td.season").hide()
            } else {
                if (Man_Suit.suit_type == "man_suit2") {
                    Man_Suit.showCloths("full_suit2")
                } else {
                    if (Man_Suit.suit_type == "man_suit3") {
                        Man_Suit.showCloths("full_suit3")
                    }
                }
                $("#slider_fabrics td.season").show()
            }
            if (G == "waistcoat" && $("#box_fabric_waistcoat .checker span").hasClass("checked") == false) {
                Man_Suit.id_t4l_fabric.default_fabric = J;
                Man_Suit.id_t4l_fabric.waistcoat = J;
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
                    //$("#preview_fabric_3d_common div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/fabric/" + J + "_big.jpg) top right no-repeat");
                    $(".fabimgs").attr('src',""+Man_Suit.url+"assets/dimg/fabric/" + J + "_normal.jpg'");
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
                    f(id_t4l_fabric[Man_Suit.current_t4l_fabric])
                }
            }
        }
        if (Man_Suit.suit_type == "man_suit3") {
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
                    Man_Suit.id_t4l_fabric.waistcoat = Man_Suit.id_t4l_fabric.default_fabric;
                    Man_Suit.render.setFabric("waistcoat", Man_Suit.id_t4l_fabric.waistcoat);
                    $("#id_t4l_fabric_waistcoat").val(Man_Suit.id_t4l_fabric.waistcoat);
                    Man_Suit.redraw(true);
                    m = false
                }
            })
        }
        var n = [];

        function s(x) {
            if (x) {
                if (m == true) {
                    if (a == "waistcoat") {
                        Man_Suit.render.setFabric("waistcoat_lining_back", Man_Suit.id_t4l_lining);
                        Man_Suit.render.setWaistcoatButtonCode(Man_Suit.waistcoat_button_code ? Man_Suit.waistcoat_button_code : Man_Suit.button_code);
                        Man_Suit.render.setFabric("waistcoat", Man_Suit.id_t4l_fabric.waistcoat)
                    } else {
                        Man_Suit.render.setShoesColor(Man_Suit.shoe_color);
                        Man_Suit.render.setJacketButtonCode(Man_Suit.button_code);
                        Man_Suit.render.setPantsButtonCode(Man_Suit.button_code);
                        Man_Suit.render.setFabric("jacket", Man_Suit.id_t4l_fabric.default_fabric);
                        Man_Suit.render.setFabric("pants", Man_Suit.id_t4l_fabric.default_fabric)
                    }
                } else {
                    Man_Suit.render.setFabric("waistcoat_lining_back", Man_Suit.id_t4l_lining);
                    Man_Suit.render.setShoesColor(Man_Suit.shoe_color);
                    Man_Suit.render.setJacketButtonCode(Man_Suit.button_code);
                    Man_Suit.render.setPantsButtonCode(Man_Suit.button_code);
                    Man_Suit.render.setFabric("jacket", Man_Suit.id_t4l_fabric.default_fabric);
                    Man_Suit.render.setFabric("pants", Man_Suit.id_t4l_fabric.default_fabric);
                    Man_Suit.render.setWaistcoatButtonCode(Man_Suit.waistcoat_button_code ? Man_Suit.waistcoat_button_code : Man_Suit.button_code);
                    Man_Suit.render.setFabric("waistcoat", Man_Suit.id_t4l_fabric.waistcoat)
                }
                Man_Suit.render.lmanager.redraw();
                Man_Suit.redraw()
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
                //$("#preview_fabric_3d_common div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/fabric/" + Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric] + "_big.jpg) top right no-repeat");
                $(".fabimgs").attr('src',""+Man_Suit.url+"assets/dimg/fabric/" + Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric] + "_normal.jpg'");
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
            $("#suit_fabric_" + Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric]).addClass("selected");
            s(Man_Suit.id_t4l_fabric)
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
            if (Man_Suit.suit_type == "man_suit3") {
                if (Man_Suit.current_t4l_fabric == "waistcoat") {
                    z = "waistcoat"
                }
                var B = Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric]
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
            Man_Suit.container_fabrics.load(D + "?action=filter", C, function() {
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
                    id_t4l_fabric[Man_Suit.current_t4l_fabric] = V;
                    if (window.mobile_enabled) {
                        V.option = "fabric";
                        History.pushState(V, window.title, "?option=fabric&id_t4l_fabric=" + V.id_t4l_fabric);
                        return false
                    }
                    var L = $(this).attr("id_tie");
                    Man_Suit.id_tie = L;
                    Man_Suit.render.setTie(L, true);
                    Man_Suit.render.id_tie = L;
                    var U = $(this).attr("id_t4l_lining");
                    var O = $(this).attr("rel");
                    if (Man_Suit.current_t4l_fabric == "default_fabric") {
                        Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric] = O;
                        Man_Suit.id_t4l_lining[Man_Suit.current_t4l_fabric] = U;
                        if (!$("#box_fabric_waistcoat input").is(":checked")) {
                            Man_Suit.id_t4l_fabric.waistcoat = O;
                            Man_Suit.id_t4l_lining.waistcoat = U
                        }
                    } else {
                        Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric] = O;
                        Man_Suit.id_t4l_lining[Man_Suit.current_t4l_fabric] = U
                    }
                    var R = $(this).attr("thread_count");
                    if (!$("#box_fabric_waistcoat input").is(":checked") || (m == true && a == "waistcoat")) {
                        Man_Suit.waistcoat_button_code = $(this).attr("button_code");
                        Man_Suit.button_code = $(this).attr("button_code");
                        Man_Suit.id_t4l_lining = U
                    } else {
                        Man_Suit.button_code = $(this).attr("button_code")
                    }
                    Man_Suit.shoe_color = $(this).attr("shoe_color");
                    var P = Man_Suit.id_t4l_fabric.default_fabric;
                    var S = Man_Suit.id_t4l_fabric.waistcoat;
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
                    window.suit_price.fabric = N ? N : 0;
                    Man_Suit.updatePrice();
                    V.href = "?action=view&id=" + Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric];
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
                Man_Suit.container_fabrics.find("div.suit_fabric").each(function() {
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
                    var K = Man_Suit.container_fabrics.find("div.suit_fabric[title], div.suit_fabric img[title]");
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
                    $("#suit_fabric_" + Man_Suit.id_t4l_fabric[Man_Suit.current_t4l_fabric]).addClass("selected")
                }
                if (Man_Suit.bLazy) {
                    Man_Suit.bLazy.revalidate()
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
            Man_Suit.filter_form.find("a.filter").click(function() {
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
            Man_Suit.filter_form.find("a.dropdown").mouseover(function() {
                var x = this.getAttribute("href").replace(/^[^#]/, "");
                v();
                p = $(this).addClass("current");
                j = $(x).show()
            }).click(function() {
                return false
            });
            Man_Suit.filter_form.mouseleave(v);
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
                        Man_Suit.filter_form.addClass("sticky");
                        i = true
                    }
                } else {
                    if (i) {
                        Man_Suit.filter_form.removeClass("sticky");
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
                    $(".box_right_3d.suit #model_3d_preview.man_suit").css("margin-top", "176px")
                } else {
                    if (g) {
                        $(".test_B #move").removeClass("fixit");
                        g = false
                    }
                    $(".box_right_3d.suit #model_3d_preview.man_suit").css("margin-top", "0")
                }
            });
            Man_Suit.filter_form.find("ul.filter input").click(function() {
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
    initExtrasMobile: function() {
        var l = $("#sticky_header");
        var j = false;

        function g() {
            if (j) {
                j.hide();
                j = false;
                $("#body_height").css("overflow", "")
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

        function f() {
            g();
            $("#model_3d_preview").removeClass("extra_open");
            window.scrollTo(0, 0);
            var p = History.getState();
            if (typeof(p.data.rel) != "undefined") {
                j = $(p.data.rel).show();
                $("#model_3d_preview").addClass("extra_open");
                if (!j.hasClass("manual_close")) {
                    j.addClass("manual_close").click(function() {
                        History.back()
                    })
                }
                $("#body_height").css("overflow", "hidden")
            }
            if (typeof(p.data.linings) != "undefined") {
                if (p.data.option == "waistcoat_lining_back" && p.data.contrast_option == "front") {
                    b()
                } else {
                    m(p)
                }
                l.addClass("fixed")
            }
        }
        History.Adapter.bind(window, "statechange", f);
        f();
        $("a.close").click(function() {
            History.back()
        });
        $("#extra_forms a.next").click(function() {
            if (Man_Suit.suit_type == "man_suit2") {
                Man_Suit.showCloths("full_suit2")
            } else {
                Man_Suit.showCloths("full_suit3")
            }
            Man_Suit.setModel_position("front");
            Man_Suit.createInputsImgs();
            $("#go_to").attr("value", "extras");
            Man_Suit.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#extra_form a.back").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Suit.updatePrice();
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
        $("#loading_lining").hide();
        $("#jacket_lining,#waistcoat_lining,#waistcoat_lining_back").each(function() {
            var p = this.getAttribute("id");
            $(".option_trigger", this).click(function() {
                var r = this.getAttribute("rel");
                Man_Suit.render.lining_radio = "";
                Man_Suit.lining_radio = "";
                if (r == "0") {
                    if (p == "jacket_lining") {
                        var t = "jacket"
                    } else {
                        if (p == "waistcoat_lining") {
                            var t = "waistcoat"
                        } else {
                            if (p == "waistcoat_lining_back") {
                                var t = "waistcoat_back"
                            }
                        }
                    }
                    if (t != "waistcoat_back") {
                        Man_Suit.id_t4l_lining[t] = window.linings_default[t]
                    } else {
                        $("#input_hidden_waistcoat_lining_back").val(window.linings_default[t])
                    }
                    o(window.linings_default[t], 0);
                    History.back()
                } else {
                    if (r == "unlined") {
                        Man_Suit.render.lining_radio = "unlined";
                        Man_Suit.lining_radio = "unlined";
                        var s = $(".option_trigger.unlined").attr("price");
                        var q = window.linings_default.jacket;
                        if (typeof(window.unlined_linings[Man_Suit.id_t4l_fabric.default_fabric]) != "undefined") {
                            q = window.unlined_linings[Man_Suit.id_t4l_fabric.default_fabric]
                        }
                        o(q, s, true);
                        History.back()
                    } else {
                        History.pushState({
                            option: p,
                            contrast_option: r,
                            linings: true
                        }, window.title, "?option=" + p + "&linings=1")
                    }
                }
                return false
            })
        });

        function m(v) {
            $("#loading_lining").show();
            var r = document.location.toString();
            if ($("html").prop("lang") == "ru" && document.all) {
                r = encodeURI(r)
            }
            r = r.split("?")[0];
            var t = v.data.option;
            if (t == "jacket_lining") {
                var q = $("#input_hidden_jacket_lining").val();
                var u = {
                    category: "undefined",
                    tone: "all",
                    texture: "all",
                    id_current_lining: q
                };
                var p = base_href + "extras?product_type=man_jacket&action=filter"
            } else {
                if (t == "waistcoat_lining") {
                    var w = $("#input_hidden_waistcoat_lining").val();
                    var u = {
                        category: "undefined",
                        tone: "all",
                        texture: "all",
                        id_current_lining: w,
                        product_type: "man_waistcoat"
                    };
                    var p = base_href + "extras?product_type=man_waistcoat&action=filter"
                } else {
                    if (t == "waistcoat_lining_back") {
                        var s = $("#input_hidden_waistcoat_lining_back").val();
                        var u = {
                            category: "undefined",
                            tone: "all",
                            texture: "all",
                            id_current_lining: s,
                            product_type: "man_waistcoat"
                        };
                        var p = base_href + "extras?product_type=man_waistcoat&action=filter"
                    }
                }
            }
            $("#slider_linings").show().load(p, u, function() {
                $("a.select", this).click(function() {

                    var y = History.getState();
                    var A = $(this).attr("rel");
                    if (y.data.option == "jacket_lining") {
                        var z = "jacket"
                    } else {
                        if (y.data.option == "waistcoat_lining") {
                            var z = "waistcoat"
                        } else {
                            var z = "waistcoat"
                        }
                    }
                    var x = window.t4l_linings[z][A].price;
                    if (A == window.linings_default[z]) {
                        x = 0
                    }
                    if (y.data.option != "waistcoat_lining_back") {
                        Man_Suit.id_t4l_lining[z] = A
                    }
                    o(A, x);
                    History.pushState(null, window.title, "?ok=1");
                    $("#slider_linings").fadeOut("fast");
                    return false
                });
                if (Man_Suit.bLazy) {
                    Man_Suit.bLazy.revalidate()
                }
                $("#loading_lining").fadeOut("fast")
            })
        }

        function b() {
            $("#input_hidden_waistcoat_lining_back").val("front");
            $("#input_hidden_waistcoat_lining_back_radio").val("front");
            $("#waistcoat_lining_back div.option_trigger").removeClass("active");
            $("#waistcoat_lining_back div.option_trigger.front").addClass("active");
            var p = $("#trigger_fabric_back").attr("price");
            window.suit_price.lining_back = p;
            Man_Suit.updatePrice();
            Man_Suit.showCloths("parcial_suit3", false);
            Man_Suit.setModel_position("back");
            Man_Suit.redraw(false);
            History.pushState(null, window.title, "?ok=1")
        }

        function o(v, s, r) {
            var t = History.getState();
            var u = t.data.option;
            var q = t.data.contrast_option;
            var p = $("#input_hidden_" + u).val("");
            p.val(v);
            if (q == 0) {
                $("#input_hidden_" + u + "_radio").val("")
            } else {
                if (typeof(r) !== "undefined") {
                    $("#input_hidden_" + u + "_radio").val("unlined")
                } else {
                    $("#input_hidden_" + u + "_radio").val(q)
                }
            }
            Man_Suit.current_id_t4l_lining = v;
            if (s) {
                if (u == "jacket_lining") {
                    window.suit_price.lining_jacket = s
                }
                if (u == "waistcoat_lining") {
                    window.suit_price.lining_waistcoat = s
                }
                if (u == "waistcoat_lining_back") {
                    window.suit_price.lining_back = s
                }
            } else {
                if (u == "jacket_lining") {
                    window.suit_price.lining_jacket = 0
                }
                if (u == "waistcoat_lining") {
                    window.suit_price.lining_waistcoat = 0
                }
                if (u == "waistcoat_lining_back") {
                    window.suit_price.lining_back = 0
                }
            }
            $("#" + u + " div.option_trigger").removeClass("active");
            if (s == 0) {
                $("#" + u + " div.option_trigger.default").addClass("active")
            } else {
                if (typeof(r) !== "undefined") {
                    $("#" + u + " div.option_trigger.unlined").addClass("active")
                } else {
                    $("#" + u + " div.option_trigger.personalized").addClass("active")
                }
            }
            Man_Suit.updatePrice();
            Man_Suit.cloth_open = false;
            if (u == "jacket_lining") {
                Man_Suit.showCloths("full_suit3", false);
                Man_Suit.cloth_open = false;
                Man_Suit.setModel_position("front");
                Man_Suit.render.jacket_opened = false
            } else {
                if (u == "waistcoat_lining") {
                    Man_Suit.setModel_position("front");
                    Man_Suit.showCloths("parcial_suit3", true)
                } else {
                    if (u == "waistcoat_lining_back") {
                        Man_Suit.showCloths("parcial_suit3", true);
                        Man_Suit.setModel_position("back");
                        Man_Suit.render.setFabric("waistcoat_lining_back", v)
                    }
                }
            }
            if (window.mobile_enabled) {
                $("body").scrollTop(0)
            }
            Man_Suit.redraw(false)
        }

        function c(p) {
            var q = "man_" + p;
            window.suit_price["initials_" + p] = $("#txt_initial_" + p).val() ? window.extras_prices[q].initials : 0;
            Man_Suit.updatePrice();
            if (p == "jacket") {
                if (Man_Suit.suit_type == "man_suit3") {
                    Man_Suit.showCloths("full_suit3", false)
                } else {
                    Man_Suit.showCloths("full_suit2", false)
                }
            } else {
                Man_Suit.showCloths("parcial_suit3", false)
            }
            Man_Suit.setModel_position("front");
            g()
        }
        $("#jacket_initials a.select,#waistcoat_initials a.select").click(function() {
            c($(this).attr("rel"));
            History.pushState(null, window.title, "?ok=1")
        });
        $("#jacket_initials a.remove,#waistcoat_initials a.remove").click(function() {
            var p = $(this).attr("rel");
            $("#txt_initial_" + p).val("").keyup();
            c(p);
            History.back()
        });
        $("#jacket_initials .option_trigger,#waistcoat_initials .option_trigger").click(function() {
            return false
        });
        $("#txt_initial_jacket,#txt_initial_waistcoat").keypress(isValidCharacterInitials).bind("paste", function(p) {
            return false
        }).keyup(function() {
            var p = $(this).closest("div.common_initials").find("div.navigate a.select");
            if (this.value) {
                p.show().parent().addClass("two_options")
            } else {
                p.hide().parent().removeClass("two_options")
            }
        }).keyup();

        function d(p, t) {
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

        function n(p, q) {
            window.suit_price[q] = p.find("div.no_or_yes_two input:checked").val() == "personalizado" ? window.extras_prices.man_jacket[q] : 0;
            Man_Suit.updatePrice();
            g()
        }
        $("#extra_form .navigate.common a.select").click(function() {
            var q = $(this).closest("div.extra_3d");
            var r = q.attr("extra_name");
            n(q, r);
            History.pushState(null, window.title, "?ok=1");
            if (r == "metal_buttons" && q.find("input.metal_buttons_radio_opt:checked").val() == "personalizado") {
                if ($("#all_or_cuff input.button_holes_threads_position:checked").val() != "0") {
                    var p = $("#jacket_threads .thread_colors").show();
                    p.eq(0).hide();
                    k.eq(0).val("").parent().find(".option_trigger.active").removeClass("active")
                }
            } else {
                if (r == "metal_buttons" && q.find("input.metal_buttons_radio_opt:checked").val() != "personalizado") {
                    if ($("#all_or_cuff input.button_holes_threads_position:checked").val() != "0") {
                        var p = $("#jacket_threads .thread_colors").show()
                    }
                }
            }
            switch (r) {
                case "patches":
                    Man_Suit.showCloths("full_" + Man_Suit.suit_type.replace("man_", ""), false);
                    Man_Suit.setModel_position("front");
                    break;
                case "neck_lining":
                    Man_Suit.showCloths("full_" + Man_Suit.suit_type.replace("man_", ""), false);
                    Man_Suit.setModel_position("front");
                    Man_Suit.render.jacket_show_neck_lining = false;
                    break;
                case "handkerchief":
                    Man_Suit.showCloths("full_" + Man_Suit.suit_type.replace("man_", ""), false);
                    Man_Suit.setModel_position("front");
                    Man_Suit.render.jacket_show_neck_lining = false;
                    break;
                case "metal_buttons":
                    Man_Suit.showCloths("full_" + Man_Suit.suit_type.replace("man_", ""), false);
                    Man_Suit.setModel_position("front");
                    Man_Suit.cloth_open = false;
                    Man_Suit.render.jacket_opened = false;
                    break
            }
            Man_Suit.redraw(false);
            return false
        });
        $("#extra_form .no_or_yes_two input").change(function() {
            d($(this).closest("div.extra_3d"), false)
        });
        d($("#jacket_metal_buttons"), true);
        d($("#jacket_neck_lining"), true);
        d($("#jacket_patches"), true);
        d($("#jacket_handkerchief"), true);
        var h;
        if (window.config.jacket_style == "mao") {
            if ($(".button_holes_threads_position:checked", "#all_or_cuff").val() == "lapel") {
                $("#all_or_cuff input").eq(0).click()
            }
            $("#all_or_cuff label.t4l_radio").eq(2).hide()
        }

        function i() {
            h = {
                position: $(".button_holes_threads_position:checked", "#all_or_cuff").val()
            };
            k.each(function() {
                h[this.name] = this.value
            });
            window.suit_price.button_holes_threads_jacket = (h.position != "0") ? window.extras_prices.man_jacket["button_holes_threads"] : 0;
            Man_Suit.updatePrice()
        }

        function a() {
            var r = $(".button_holes_threads_position:checked", "#all_or_cuff").val();
            switch (r) {
                case "all":
                case "cuff":
                    var p = $("#jacket_threads .thread_colors").show();
                    var q = 1;
                    var s = $("input.metal_buttons_radio_opt:checked", "#jacket_metal_buttons").val() == "personalizado";
                    if (s) {
                        p.eq(0).hide();
                        k.eq(0).val("").parent().find(".option_trigger.active").removeClass("active");
                        q = 1
                    } else {
                        p.eq(0).show()
                    }
                    if (k.filter(function() {
                            return this.value
                        }).length >= q) {
                        e.show().parent().addClass("two_options")
                    } else {
                        e.hide().parent().removeClass("two_options")
                    }
                    break;
                case "lapel":
                    var p = $("#jacket_threads .thread_colors").show();
                    p.eq(0).hide();
                    k.eq(0).val("").parent().find(".option_trigger.active").removeClass("active");
                    q = 1;
                    if (k.filter(function() {
                            return this.value
                        }).length == q) {
                        e.show().parent().addClass("two_options")
                    } else {
                        e.hide().parent().removeClass("two_options")
                    }
                    break;
                default:
                    $("#jacket_threads .thread_colors").hide();
                    $("#jacket_threads .option_trigger.active").removeClass("active");
                    k.val("");
                    e.show().parent().addClass("two_options");
                    break
            }
        }
        var e = $("#jacket_threads a.select").click(function() {
            i();
            History.pushState(null, window.title, "?ok=1");
            Man_Suit.showCloths("full_" + Man_Suit.suit_type.replace("man_", ""), true);
            Man_Suit.setModel_position("front");
            Man_Suit.render.jacket_show_neck_lining = false;
            Man_Suit.redraw(false);
            return false
        });
        var k = $("#jacket_threads .option_input").change(a);
        $("#all_or_cuff input").change(a);
        a();
        i();
        $("#jacket_threads a.close").unbind("click").click(function() {
            $(".button_holes_threads_position[value=" + h.position + "]", "#all_or_cuff").prop("checked", true).change();
            var p = $("#jacket_threads .option_trigger");
            p.removeClass("active");
            k.each(function() {
                this.value = h[this.name];
                if (this.value) {
                    p.filter("[rel=" + this.value + "]").addClass("active")
                }
            });
            a();
            History.back();
            return false
        });
        $(".interactive_options").each(function() {
            var p = $("input.option_input", this);
            var q = $(".option_trigger", this).click(function() {
                q.removeClass("active");
                $(this).addClass("active");
                p.val(this.getAttribute("rel")).change()
            })
        });
        if (Man_Suit.suit_type == "man_suit3") {
            Man_Suit.showCloths("full_suit3", true)
        } else {
            Man_Suit.showCloths("full_suit2", true)
        }
    },
    initExtras: function(e, c, d,def2) {

        var def_fab_id = $("input[name='def_fab_id']").val(),
            p_img_dtl = $("input[name='p_img_dtl']").val(),
            current_fab_id = $("input[name='fabric_id']").val(),
            action = $("input[name='action']").val();

        
        /*if(def_fab_id == def2.default_fabric && action=="update") {
            $("#model_3d_preview").css('display','block');
            $("#model_3d_preview1").css('display','none');
            $("#box_change_position").show();
            $("#show_hide_pieces").show();
            $(".controls").show(); 
        }
        else if(def_fab_id != def2.default_fabric && action=="update") {
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

        Man_Suit.suit_type = e;
        Man_Suit.importOptions();
        if (window.mobile_enabled) {
            return this.initExtrasMobile()
        }
        if (Man_Suit.suit_type == "man_suit2") {
            var a = ["front", "back", "front_open"];
            if (parseInt(Man_Suit.options.neck_lining)) {
                var a = ["front", "back", "front_open", "back_neck_lining"]
            }
        }
        if (Man_Suit.suit_type == "man_suit3") {
            var a = ["front", "back", "front_open", "front_waistcoat", "back_waistcoat"];
            if (parseInt(Man_Suit.options.neck_lining)) {
                var a = ["front", "back", "front_open", "front_waistcoat", "back_waistcoat", "back_neck_lining"]
            }
        }
        if (typeof(initCollectionGenerator) == "function") {
            initCollectionGenerator(Man_Suit, a)
        }
        $("#extra_forms a.next").click(function() {
            if (e == "man_suit2") {
                Man_Suit.showCloths("full_suit2")
            } else {
                Man_Suit.showCloths("full_suit3")
            }
            Man_Suit.setModel_position("front");
            Man_Suit.createInputsImgs();
            $("#go_to").attr('value','extras');
            Man_Suit.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_configure").click(function() {
            $("#go_to").attr("value", "configure");
            Man_Suit.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#link_fabric").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Suit.updatePrice();
            $("#extra_form").submit();
            return false
        });
        $("#extra_form a.back").click(function() {
            $("#go_to").attr("value", "fabric");
            Man_Suit.updatePrice();
            $("#extra_form").submit();
            return false
        });
        Man_Suit.initExtrasJacket();
        if (Man_Suit.suit_type == "man_suit3") {
            b("jacket");
            Man_Suit.initExtrasWaistcoat()
        } else {
            d.hide();
            c.show()
        }

        function b(f) {
            if (f == "jacket") {
                $("#box_tab_suit_view").removeClass("waistcoat");
                $("#box_tab_suit_view").addClass("jacket");
                d.hide();
                c.show()
            } else {
                $("#box_tab_suit_view").removeClass("jacket");
                $("#box_tab_suit_view").addClass("waistcoat");
                c.hide();
                d.show()
            }
        }
        $("#box_tab_suit_view a").click(function() {
            var f = $(this).attr("rel");
            if (f == "default") {
                b("jacket");
                Man_Suit.showCloths("full_suit3")
            } else {
                b("waistcoat");
                Man_Suit.cloth_open = false;
                Man_Suit.showCloths("parcial_suit3")
            }
        });
        if (Man_Suit.suit_type == "man_suit3") {
            Man_Suit.showCloths("full_suit3")
        } else {
            Man_Suit.showCloths("full_suit2")
        }
    },
    updateNumButtons: function() {
        if (window.mobile_enabled) {
            var c = $("#input_jacket_style").val();
            if (c == "simple") {
                var a = [5, 6, 8];
                var b = [1, 2, 3, 4]
            } else {
                if (c == "crossed") {
                    var a = [1, 3, 5];
                    var b = [2, 4, 6, 8]
                } else {
                    var a = [1, 2, 3, 4, 6, 8]
                }
            }
            $("#jacket_buttons div.option_trigger").show().addClass("visible").removeClass("hide");
            var d = false;
            $.each(a, function(e, f) {
                if ($("#jacket_buttons div.bttn" + f).hasClass("active")) {
                    d = true
                }
                $("#jacket_buttons div.bttn" + f).hide().addClass("hide").removeClass("visible")
            });
            if (d) {
                $("#jacket_buttons div.option_trigger").removeClass("active");
                $("#jacket_buttons div.option_trigger.visible").eq(0).addClass("active");
                $("#jacket_buttons input[type='hidden']").val($("#jacket_buttons div.option_trigger.active").attr("rel"))
            }
        } else {
            if ($("#jacket_style_simple").is(":checked")) {
                $("#jacket_buttons").disableOptions([5, 6, 8]);
                $("#global_jacket_buttons").show()
            } else {
                if ($("#jacket_style_crossed").is(":checked")) {
                    $("#jacket_buttons").disableOptions([1, 3, 5]);
                    $("#global_jacket_buttons").show()
                } else {
                    $("#jacket_buttons").disableOptions([1, 2, 3, 4, 6, 8]);
                    $("#global_jacket_buttons").hide()
                }
            }
            if (typeof($.uniform) != "undefined" && typeof($.uniform.update) != "undefined") {
                $.uniform.update()
            }
        }
    },
    updatePocketOptions: function(a, b) {
        if (a.val() == 0) {
            $(".all_jacket_pockets").hide();
            $("#hidden_jacket_pockets").val("")
        } else {
            if (a.val() == 2) {
                $(".all_jacket_pockets").show();
                $(".all_jacket_pockets div.1pocket").show();
                $(".all_jacket_pockets div.2pocket").hide();
                if (!b) {
                    $(".all_jacket_pockets div.1pocket div.option_trigger:first-child").click()
                }
            } else {
                $(".all_jacket_pockets").show();
                $(".all_jacket_pockets div.1pocket").hide();
                $(".all_jacket_pockets div.2pocket").show();
                if (!b) {
                    $(".all_jacket_pockets div.2pocket div.option_trigger:first-child").click()
                }
            }
        }
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
                Man_Suit.redraw(true)
            });
            if (window.mobile_enabled && d.getAttribute("fixed") != "fixed") {
                c.filter(".active").trigger("select")
            }
        })
    },
    showCloths: function(b, c) {
        Man_Suit.render.show_jacket = true;
        Man_Suit.render.show_pants = true;
        Man_Suit.render.show_waistcoat = true;
        switch (b) {
            case "full_suit2":
                Man_Suit.render.show_waistcoat = false;
                break;
            case "parcial_suit2":
                Man_Suit.render.show_waistcoat = false;
                Man_Suit.render.show_jacket = false;
                break;
            case "full_suit3":
                break;
            case "parcial_suit3":
                Man_Suit.render.show_jacket = false;
                break
        }
        Man_Suit.model_status = b;
        if (c) {
            Man_Suit.redraw(true)
        } else {
            Man_Suit.render.redraw()
        }
        var a = $("#show_hide_pieces a.show_full_parcial");
        if (Man_Suit.suit_type == "man_suit2") {
            if (Man_Suit.model_status == "full_suit2") {
                a.attr("rel", "parcial_suit2");
                $("div#show_hide_pieces").removeClass("full");
                $("div#show_hide_pieces").addClass("parcial")
            } else {
                a.attr("rel", "full_suit2");
                $("div#show_hide_pieces").removeClass("parcial");
                $("div#show_hide_pieces").addClass("full")
            }
        } else {
            if (Man_Suit.model_status == "full_suit3") {
                a.attr("rel", "parcial_suit3");
                $("div#show_hide_pieces").removeClass("full");
                $("div#show_hide_pieces").addClass("parcial")
            } else {
                a.attr("rel", "full_suit3");
                $("div#show_hide_pieces").removeClass("parcial");
                $("div#show_hide_pieces").addClass("full")
            }
        }
    },
    change_suit_type: function(a) {
        Man_Suit.suit_type = a;
        if (a == "man_suit2") {
            $("div.common_waistcoat_config").hide();
            Man_Suit.showCloths("full_suit2", true);
            $("#show_hide_pieces a.show_full_parcial").attr("rel", "parcial_suit2");
            $("input[name='waistcoat']").val('');
            window.suit_price.waistcoat = 0;
            //window.suit_price.fabric = price_fabric_extra.man_suit2;
            Man_Suit.updatePrice()
        } else {
            $("div.common_waistcoat_config").show();
            Man_Suit.showCloths("full_suit3", true);
            $("#show_hide_pieces a.show_full_parcial").attr("rel", "parcial_suit3");
            window.suit_price.waistcoat = window.price_extra_waistcoat;
            $("input[name='waistcoat']").val(window.price_extra_waistcoat);
            //window.suit_price.fabric = price_fabric_extra.man_suit3;
            Man_Suit.updatePrice()
        }
        if (Man_Suit.model_position == "back") {
            Man_Suit.setModel_position("front")
        }
        Man_Suit.render.redraw({
            suit_type: a
        })
    },
    setModel_position: function(a) {
        Man_Suit.model_position = a;
        Man_Suit.render.setView(a)
    },
    importOptions: function() {
        Man_Suit.options = {};
        if (window.mobile_enabled) {
            Man_Suit.options_container.find('input:checked, input[type="hidden"], select').each(function() {
                Man_Suit.options[this.name] = this.value
            })
        } else {
            Man_Suit.options_container.find("input:checked, input:hidden, select").each(function() {
                Man_Suit.options[this.name] = this.value
            })
        }
        if (typeof(Man_Suit.options.lining_jacket_radio) !== "undefined" && Man_Suit.options.lining_jacket_radio == "unlined") {
            Man_Suit.render.lining_radio = "unlined";
            Man_Suit.lining_radio = "unlined"
        }

    },
    redraw: function(a) {
        if (a) {
            Man_Suit.importOptions()
        }
        Man_Suit.render.setFabric("jacket_lining", Man_Suit.current_id_t4l_lining);
        Man_Suit.render.redraw(Man_Suit.options)
    },
    init_scroll: function() {},
    
    updatePrice: function() {
      /* Custom Scripts */

      var r = $("input[name='go_to']").val();
      if(r=="extras" || r=="fabric" || r=="configure") {
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
            if (Man_Suit.suit_type == "man_suit2" && (a == "lining_waistcoat" || a == "lining_back" || a == "initials_waistcoat")) {
                continue
            }
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
    },
    createInputsImgs: function() {
        var c = $("#image_z_index");
        var b = $("#model_3d_preview");
        var a = "";
        b.find("div.layer").each(function() {
            if ($(this).css("display") == "block") {
                $(this).find("img").each(function() {
                    var d = $(this).attr("src");
                    var e = $(this).css("z-index");
                    a += "<input type='hidden' name='images[][" + e + "]' value='" + d + "'>"
                })
            }
        });

        c.html(a)
    },
    initExtrasWaistcoat: function() {
        var a = $("#extras_waistcoat");
        $("div.list_common_color a.box_color", a).click(function() {
            var p = $(this).closest("div.option_trigger");
            var r = $(this).closest("div.list_common_color");
            var q = r.attr("rel");
            r.each(function() {
                $(this).find("div.option_trigger").removeClass("active")
            });
            p.addClass("active");
            var t = p.attr("rel");
            r.find("input.option_input").attr("value", t);
            if (q != "initials") {
                b(q);
                var s = p.attr("rel");
                var q = p.attr("type");
                var o = $(this).closest("div.window").find("#img_ojal_hilo");
                o.find("div." + q).attr("class", "").addClass("jc" + s).addClass(q)
            } else {
                Man_Suit.cloth_open = false
            }
        });
        $("div.box_title.main", a).click(function() {
            var t = $(this).find("a.btn_cancel_add");
            var o = t.attr("rel");
            var r = o;
            var q = t.attr("price") * 1;
            var p = $(this).closest("div.box_title");
            var s = $(this).closest("div.extra_opt");
            if (p.hasClass("open")) {
                p.removeClass("open");
                p.addClass("close");
                s.find("div.window").hide();
                $("#extra_form input.status_" + o).val(0);
                window.suit_price[r] = 0;
                Man_Suit.updatePrice();
                l(r)
            } else {
                p.removeClass("close");
                p.addClass("open");
                s.find("div.window").show();
                $("#extra_form input.status_" + o).val(1)
            }
        });

        function k() {
            var t = $("#txt_initial_waistcoat", a).val();
            var o = $("#position_default", a).val();
            var r = $(".window.initials div.common_color.active", a).attr("color");
            var q = $(".op_initials div.box_font_initial input:checked", a).attr("rel");
            $("#rotate").html("");
            var s = Raphael("rotate", 300, 180);
            if (o == "interior") {
                var p = s.text(170, 115, t).attr("font-family", q).attr("font-size", "8px").attr("fill", "#" + r);
                p.rotate(-11, 110, -80)
            }
        }
        $("#txt_initial_waistcoat", a).keypress(isValidCharacterInitials).bind("paste", function(o) {
            return false
        });
        $("#txt_initial_waistcoat", a).keyup(function() {
            k();
            b("initials_waistcoat")
        });
        $(".op_initials div.box_font_initial input", a).click(function() {
            k()
        });
        $(".box_opt .list_common_color div.common_color", a).click(function() {
            k()
        });
        if ($("#txt_initial_waistcoat", a).val().length) {
            $(".window.initials input.posini:checked", a).click();
            b("initials_waistcoat")
        }

        function b(p) {
            if (p == "initials_waistcoat") {
                var q = $("#txt_initial_waistcoat").val();
                var o = $(".box_title.initials a.btn_cancel_add", a).attr("price");
                if (q != "") {
                    window.suit_price.initials_waistcoat = o ? o : 0
                } else {
                    window.suit_price.initials_waistcoat = 0
                }
            }
            if (p == "button_holes_threads") {
                var o = $(".box_title.hilo_ojal a.btn_cancel_add", a).attr("price");
                window.suit_price.button_holes_threads_waistcoat = o ? o : 0
            }
            Man_Suit.updatePrice()
        }

        function l(o) {
            if (o == "initials_waistcoat") {
                $("#txt_initial_waistcoat", a).val("");
                k()
            }
            if (o == "button_holes_threads_waistcoat") {
                $("#hidden_button_threads", a).val("");
                $("#hidden_button_holes", a).val("");
                $("div.window.hilo_ojal div.option_trigger.active", a).removeClass("active");
                $("#img_ojal_hilo").find("div.ojal").attr("class", "").addClass("ojal");
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo")
            }
            if (o == "lining_waistcoat" || o == "lining_back") {
                var p = $("." + o);
                p.closest(".extra_opt").find(".default").click();
                p.closest(".extra_opt").find(".checked").each(function() {
                    $(this).removeClass("checked")
                });
                p.closest(".extra_opt").find(".default").parent().addClass("checked")
            }
        }

        function i(o) {
            if (o) {
                Man_Suit.render.setFabric("waistcoat_lining_back", o);
                Man_Suit.redraw(false)
            }
        }

        function j(o) {
            createSlideshow(o, 494)
        }

        function c(o) {
            if (o.id.toLowerCase() == "all") {
                return o.text
            } else {
                return "<img class='flag' src='/images/man/suit/lining_opt/colors/" + o.id.toLowerCase() + ".png'/> " + o.text
            }
        }
        $(".colors_filter", a).select2({
            formatResult: c,
            formatSelection: c
        });

        function d(o) {
            if (o.id.toLowerCase() == "all") {
                return o.text
            } else {
                return "<img class='flag' src='/images/man/shirt/fabric_opt/patterns/" + o.id.toLowerCase() + ".png'/> " + o.text
            }
        }
        $(".patterns_filter", a).select2({
            formatResult: d,
            formatSelection: d
        });
        $("select.colors_filter, select.patterns_filter", a).change(function() {
            m($(this).closest("div.personalized_box"))
        });
        $("div.hilo_ojal_opt div.option_trigger.active", a).find("a.box_color").each(function() {
            $(this).click()
        });

        function m(q, u) {
            var o = q.find("div.filters a.filter.current").attr("rel");
            var r = q.find("select.colors_filter").val();
            var p = q.find("select.patterns_filter").val();
            var t = q.closest("div.top").find("input.getVal").val();
            var s = {
                category: o,
                tone: r,
                texture: p,
                id_current_lining: t,
                product_type: "man_waistcoat"
            };
            q.find("div.slider_fabrics").load(base_href + "extras?product_type=man_waistcoat&action=filter", s, function(v) {
                $("a.select", this).click(function() {
                    var z = $(this).attr("category");
                    var y = $(this).attr("rel");
                    var A = $(this).attr("extra");
                    $(".lining_3d div.slider_box img.selected", q).hide();
                    $(".lining_3d div.slider_box div.suit_lining.selected", q).removeClass("selected");
                    var x = $(this).closest("div.fabric_box_3d");
                    x.find("img.selected").show();
                    x.find("div.suit_lining").addClass("selected");
                    $(this).closest("div.lining_3d").find(".preview_fabric_3d_common div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + y + "_big.jpg) top right no-repeat");
                    $(this).closest("div.top").find("input.getVal").val(y);
                    var w = $(this).closest("div.top").find("input.getVal").attr("layer");
                    layer_position = Man_Suit.render.lmanager.layers[w].position;
                    if (layer_position != Man_Suit.model_position) {
                        Man_Suit.setModel_position(layer_position)
                    }
                    if ($(this).closest("div.top").find("input.getVal").attr("id") == "input_hidden_lining_back") {
                        i($("input#input_hidden_lining_back").val());
                        Man_Suit.showCloths("parcial_suit3")
                    }
                    g();
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove()
                }
                j(q)
            })
        }
        $("input, label, a.box_color", a).click(function() {
            var p = "front";
            if (typeof($(this).attr("layer")) != "undefined") {
                var o = $(this).attr("layer");
                p = Man_Suit.render.lmanager.layers[o].position
            }
            if (p != Man_Suit.model_position) {
                Man_Suit.setModel_position()
            }
        });
        $("div.lining_back.top, div.lining.top", a).find("a.filter").click(function() {
            var p = $(this).closest(".lining_3d").parent();
            var o = $(this).attr("rel");
            $(".filters a.filter", p).removeClass("current");
            $(this).addClass("current");
            m($(this).closest(".lining_3d").parent())
        });

        function h(p, q, s, r) {
            var o = $("#input_hidden_lining", a);
            $("#lining_default_waistcoat", p).click(function() {
                s.hide();
                $("div.deco_lining", p).hide();
                if ($("input#same_lining:checked", q).length) {
                    $("#lining_back_default", q).click();
                    $.uniform.update()
                }
                $("#lbl_same_lining", q).hide();
                o.val($(this).val());
                g()
            });
            $("#inp_lining_personalized_waistcoat, div.deco_lining", p).click(function() {
                s.show();
                if ($(this).hasClass("deco_lining")) {
                    p.find("input").each(function() {
                        $(this).prop("checked", false)
                    });
                    p.find("input#inp_lining_personalized_waistcoat").prop("checked", true);
                    $.uniform.update()
                }
                $("div.deco_lining", p).hide();
                $("#lbl_same_lining", q).show();
                o.val($("div.slider_fabrics div.suit_lining.selected", s).attr("rel"));
                $("div.preview", p).css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + o.val() + "_big.jpg) top right no-repeat");
                g()
            });
            var t = $("#input_hidden_lining_back", a);
            $("#lining_back_default", q).click(function() {
                r.hide();
                $("div.deco_lining", q).hide();
                t.val($("#lining_default_waistcoat").val());
                i($("input#input_hidden_lining_back", a).val());
                g();
                Man_Suit.showCloths("parcial_suit3")
            });
            $("input#same_lining", q).click(function() {
                r.hide();
                $("div.deco_lining", q).hide();
                t.val(o.val());
                i($("input#input_hidden_lining_back", a).val());
                g();
                Man_Suit.showCloths("parcial_suit3")
            });
            $("#inp_lining_back_personalized, div.deco_lining", q).click(function() {
                r.show();
                if ($(this).hasClass("deco_lining")) {
                    q.find("input").each(function() {
                        $(this).prop("checked", false)
                    });
                    q.find("input#inp_lining_back_personalized").prop("checked", true);
                    $.uniform.update()
                }
                $("div.deco_lining", q).hide();
                t.val($("div.slider_fabrics div.suit_lining.selected", r).attr("rel"));
                i($("input#input_hidden_lining_back", a).val());
                g();
                $("div#lining_box_back div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + t.val() + "_big.jpg) top right no-repeat");
                Man_Suit.showCloths("parcial_suit3")
            });
            $("#use_fabric", q).click(function() {
                r.hide();
                t.val("front");
                i($("input#input_hidden_lining_back", a).val());
                g();
                Man_Suit.showCloths("parcial_suit3")
            })
        }

        function g() {
            var p = $("#lining_default_waistcoat", a).val();
            var t = $("#input_hidden_lining", a).val();
            var u = 0;
            if (t == p) {
                u = 0
            } else {
                u = window.t4l_linings.waistcoat[t]["price"]
            }
            var r = $("#input_hidden_lining_back", a).val();
            var o = $("#same_lining:checked", a).length;
            var q = $("#use_fabric:checked", a).length;
            var s = 0;
            if (r == p) {
                s = 0
            } else {
                if (o) {
                    s = 0
                } else {
                    if (q) {
                        s = window.user_fabric_price
                    } else {
                        s = window.t4l_linings.waistcoat[r]["price"]
                    }
                }
            }
            window.suit_price.lining_waistcoat = u;
            window.suit_price.lining_back = s;
            Man_Suit.updatePrice()
        }
        var f = $("#lining_box_waistcoat", a);
        var e = $("#lining_box_back", a);
        m(f);
        m(e);
        h($("#options_lining_waistcoat", a), $("#options_lining_back", a), f, e);
        if ($("#inp_lining_personalized_waistcoat:checked", a).length) {
            f.show();
            $("div.deco_lining, #options_lining").hide();
            var n = $("#input_hidden_lining", a).val();
            $("#lbl_same_lining", a).show();
            $("div#lining_box_waistcoat div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + n + "_big.jpg) top right no-repeat")
        }
        if ($("#inp_lining_back_personalized:checked", a).length) {
            e.show();
            $("div.deco_lining").hide();
            var n = $("#input_hidden_lining_back", a).val();
            $("div#lining_box_back div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + n + "_big.jpg) top right no-repeat")
        }
        k();
        g()
    },
    initExtrasJacket: function() {
        var e = $("#extras_jacket");
        Man_Suit.default_id_t4l_lining = Man_Suit.id_t4l_lining.jacket;
        Man_Suit.current_id_t4l_lining = $("#input_hidden_lining_jacket").val();
        Man_Suit.render.jacket_show_neck_lining = false;
        $("div.apply_at input").click(function() {
            var l = $(this).attr("id");
            if (l == "pos_bht_solapa") {
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo");
                $("#hidden_button_threads").closest("div.interactive_options").hide();
                $("#hidden_button_threads").val("");
                $("#box_button_threads_extra .common_color").removeClass("active")
            } else {
                $("#hidden_button_threads").closest("div.interactive_options").show();
                color_activo = $("#hidden_button_threads").closest("div.interactive_options").find("div.common_color.active").attr("rel");
                if (color_activo != "") {
                    $("#hidden_button_threads").val(color_activo)
                }
            }
            if ($("#inp_metal_buttons_personalized:checked").val() == "personalizado") {
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo");
                $("#box_button_threads_extra", e).hide();
                $("#hidden_button_threads").val("")
            }
            Man_Suit.redraw(false)
        });
        $("div.list_common_color a.box_color", e).click(function() {
            var m = $(this).closest("div.option_trigger");
            var o = $(this).closest("div.list_common_color");
            var n = o.attr("rel");
            o.each(function() {
                $(this).find("div.option_trigger").removeClass("active")
            });
            m.addClass("active");
            var q = m.attr("rel");
            o.find("input.option_input").attr("value", q);
            if (n != "initials") {
                a(n);
                var p = m.attr("rel");
                var n = m.attr("type");
                var l = $(this).closest("div.window").find("#img_ojal_hilo");
                l.find("div." + n).attr("class", "").addClass("jc" + p).addClass(n)
            } else {
                Man_Suit.cloth_open = false
            }
            //Man_Suit.redraw(true)
        });
        
        $("input.thread_holes_selector", e).on("click load",function(event) {

            var event_type=true;

          if(event.originalEvent == undefined) 

            var event_type = false;

          var btn_thread_type = $(this).attr("layer1");

          if(btn_thread_type=='both_opt') {


            $("#button_thread_type").show();
            $("#placket_only").show();
            $("#cuffs_only").show();
            window.suit_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;

          }
          else if(btn_thread_type=='placket_only') {
             $("#button_thread_type").show();
            $("#placket_only").show();
            $("#cuffs_only").hide();
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='button_holes_threads_jacket1']").val('');
            window.suit_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;

          }
          else if(btn_thread_type=='cuffs_only') {
             $("#button_thread_type").show();
            $("#placket_only").hide();
            $("#cuffs_only").show();
            $("input[name='placket_color']").val('');
            window.suit_price["button_holes_threads_jacket"] = window.extra_prices.btn_holes_threads;


          }
          else {
            $("#button_thread_type").hide();
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='button_holes_threads_jacket1']").val('');
            $("input[name='placket_color']").val('');
            window.suit_price["button_holes_threads_jacket"] = 0;

          }

          Man_Suit.updatePrice();


          if(event_type) {
            $(".hilo_ojal").find(".common_color").removeClass("active");
            $(".hilo_ojal").find(".common_color").removeClass("active1");
            
        }
      });

        $("div.box_title.main", e).click(function() {
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
                if (l == "lining_jacket" || l == "initials_jacket") {
                    $("input[name='"+l+"_price']").val('');
                    $("input[name='jacket_lining_id']").val('');
                    
                    Man_Suit.cloth_open = false
                }
                if (l == "initials") {
                    $("input[name='"+l+"_jacket_price']").val('');
                    $("input[name='font_family']").val('');
                    $("input[name='initials_jacket1']").val('');
                    $(".op_initials").find(".common_color").removeClass("active");
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
                    //$("input[name='button_holes_threads_jacket']").prop("checked",0);
                    //$("input[name='"+l+"_price']").val('');
                    $("input[name='placket_color']").val('');
                }
                $("#extra_form input.status_" + l).val(0);
                window.suit_price[o + "_jacket"] = 0;

                //Man_Suit.updatePrice();
                i(o);
                if (l == "patches" || l == "handkerchief") {
                     //$("input[name='"+l+"_price']").val('');
                    window.suit_price.l =0;
                    Man_Suit.redraw(false)
                }
                
            } else {
                q.css("display","block","float","right");
                m.removeClass("open");
                m.addClass("close");
                if (l == "lining_jacket" || l == "initials_jacket") {
                    window.suit_price.l =0;
                    $("#uniform-lining_default_jacket").parents("label").addClass("checked");
                    $("input[name='jacket_lining_id']").val('');
                    Man_Suit.cloth_open = false
                }
                else if(l == "neck_lining" || l== "metal_buttons") {
                    window.suit_price.l =0;
                }
                
                else if(l=="button_holes_threads") {

                    $btn_thread_lay = $("input[name='button_holes_threads_jacket']").attr("layer1");
                    
                    if($btn_thread_lay=='by_default')
                        window.suit_price[o + "_jacket"] = 0;
                    else
                    window.suit_price[o + "_jacket"] = window.extra_prices.btn_holes_threads;
                     //$("input[name='button_holes_threads_jacket']").closest("label").addClass("checked");
                     $(".by_default").addClass("checked");
                     $(".suit_hole_not_default").attr("checked",false);
                     $(".suit_hole_default").attr("checked",true);
                    //Man_Suit.updatePrice();
                }

                m.removeClass("close");
                m.addClass("open");
                p.find("div.window").show();
                $("#extra_form input.status_" + l).val(1)
            }
            Man_Suit.updatePrice()
        });

        function i(l) {
            if (l == "metal_buttons") {
                $("#metal_buttons_default").click();
                $.uniform.update();
                if (!$("#pos_bht_solapa:checked").length) {
                    $("#box_button_threads_extra", e).show()
                }
            }
            if (l == "initials") {
                $("#txt_initial_jacket", e).val("")
            }
            if (l == "button_holes_threads") {
                $("#hidden_button_threads", e).val("");
                $("#hidden_button_holes", e).val("");
                $("div.window.hilo_ojal div.option_trigger.active", e).removeClass("active");
                $("#img_ojal_hilo").find("div.ojal").attr("class", "").addClass("ojal");
                $("#img_ojal_hilo").find("div.hilo").attr("class", "").addClass("hilo");
                $("#hidden_button_holes", e).closest("div.interactive_options").removeClass("threads_hidden");
                $("#hidden_button_threads", e).show()
            }
            if (l == "lining_jacket") {
                var m = $("." + l);
                m.closest(".extra_opt").find(".default").click();
                m.closest(".extra_opt").find(".checked").each(function() {
                    $(this).removeClass("checked")
                });
                m.closest(".extra_opt").find(".default").parent().addClass("checked")
            }
            if (l == "neck_lining" || l == "patches" || l == "handkerchief") {
                var m = $("a.btn_cancel_add[rel='" + l + "']");
                m.closest(".extra_opt").find(".default_item").click();
                $.uniform.update()
            }
            d()
        }
         

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

            Man_Suit.render.jacket_show_neck_lining = false;
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
            
            window.suit_price[n.attr("extra_name")] = price;
            Man_Suit.updatePrice();
            /*if ($(this).closest("div.top").find("input.getVal").attr("name") == "handkerchief") {
                pos_extra = "front"
            } else {
                pos_extra = "back"
            }*/
            Man_Suit.cloth_open = false;
            Man_Suit.redraw(false);
            Man_Suit.render.jacket_show_neck_lining = false
        });
        $("#patches_box div.option_trigger.active").find("a.color_item").click();
        $("#neck_lining_box div.option_trigger.active").find("a.color_item").click();
        $("div.hilo_ojal_opt div.option_trigger.active", e).find("a.box_color").each(function() {
            $(this).click()
        });
        $("div.apply_at input:checked").click();
        $("input.default_item").click(function() {
            var type=$(this).val();

            if(type=="standard_button")
              window.suit_price.metal_buttons=0;
            if(type=="color_by_default")
              window.suit_price.neck_lining=0;
            if(type=="elbow_no")
              window.suit_price.elbow_patches=0;  
            if(type=="no_pocket")
              window.suit_price.handkerchief=0;

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
                Man_Suit.redraw(false)
            }
            window.suit_price[n.attr("extra_name")] = 0;
            Man_Suit.updatePrice();
            Man_Suit.cloth_open = false;
            /*if ($(this).closest("div.top").find("input.getVal").attr("name") == "handkerchief") {
                pos_extra = "front"
            } else {
                pos_extra = "back"
            }*/
            var o = $(this).attr("name");
            if (o == "patches_radio" || o == "handkerchief_radio") {
                Man_Suit.redraw(false)
            }
        });
        $("input.personalized_item").click(function() {
            $("a.color_item", $(this).closest(".top")).first().click()
        });

        function d() {
            
            var q = $("#txt_initial_jacket").val();
            var l = $("#position_default", e).val();
            var o = $(".window.initials div.common_color.active", e).attr("color");
            var n = $("div.op_initials.all_family input:checked", e).attr("rel");
            
            $(this).prop('checked',true);
            $("#rotate_jacket").html("");
            $("input[name='font_family']").val(n);
            var p = Raphael("rotate_jacket", 250, 300);
            if (l == "interior") {
                //var m = p.text(195, 115, q).attr("font-family", n).attr("font-size", "10px").attr("fill", "#" + o);
                //m.rotate(-16, 120, 250)
            }
        }
        $("#txt_initial_jacket", e).keypress(isValidCharacterInitials).bind("paste", function(l) {
            return false
        });
        $("#txt_initial_jacket", e).on('keyup', function() {
            d();
            Man_Suit.cloth_open = false;
            var event_type=true;
            a("initials_jacket");
        });
        $("div.op_initials div.box_font_initial input", e).click(function() {
            d();
            Man_Suit.cloth_open = false
        });
        $("div.box_opt .list_common_color div.common_color", e).click(function() {
            d();
            Man_Suit.cloth_open = false
        });

        function a(m) {
            if (m == "initials_jacket") {
                var n = $("#txt_initial_jacket").val();
                var l = $(".box_title.initials a.btn_cancel_add", e).attr("price");
                if (n != "") {
                    window.suit_price[m] = l ? l : 0;
                    $("input[name='initials_jacket_price']").val(l);
                } else {
                    window.suit_price[m] = 0;
                    $("input[name='initials_jacket_price']").val('');
                }
            }
            if (m == "button_holes_threads") {
                var l = $(".box_title.hilo_ojal a.btn_cancel_add", e).attr("price");
                var price1 = window.extra_prices.btn_holes_threads;
                window.suit_price[m + "_jacket"] = price1 ? price1 : 0
            }
            Man_Suit.updatePrice()
        }

        function h(l) {
            createSlideshow(l, 494)
        }

        function b(l) {
            if (l.id.toLowerCase() == "all") {
                return l.text
            } else {
                return "<img class='flag' src='/images/man/suit/lining_opt/colors/" + l.id.toLowerCase() + ".png'/> " + l.text
            }
        }
        $(".colors_filter", e).select2({
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
        $(".patterns_filter", e).select2({
            formatResult: c,
            formatSelection: c
        });
        $("select.colors_filter, select.patterns_filter", e).change(function() {
            j($(this).closest("div.personalized_box"))
        });
        $("input, label, a.box_color", e).click(function() {
            var m = "front";
            var n = $(this).parent().attr('color');
            var j = $(this).attr('layer');
            var k = $(this).attr('layer1');

            if(j=="jacket_button_holes") 
                $("input[name='button_holes_threads_jacket2']").val(n);
            if(j=="monogram_color")
                 $("input[name='initials_jacket1']").val(n);
            if(j=="jacket_button_holes1") 
                $("input[name='button_holes_threads_jacket1']").val(n);
            if(j=="lapel_only")
                $("input[name='placket_color']").val(n);

            if (typeof($(this).attr("layer")) != "undefined") {
                var l = $(this).attr("layer");
                m = Man_Suit.render.lmanager.layers[l].position
            }
            if (m != Man_Suit.model_position) {
                //Man_Suit.setModel_position(m)
            }
        });

        function j(n, r) {
            var l = n.find("div.filters a.filter.current").attr("rel");
            var o = n.find("select.colors_filter").val();
            var m = n.find("select.patterns_filter").val();
            var q = n.closest("div.top").find("input.getVal").val();

            $("a.select").click(function() {
                    var w = $(this).attr("category");
                    var v = $(this).attr("rel");
                    var x = $(this).attr("extra");
                    var lining_price = $(this).attr('extra');
                    var lining_price_set = $("input[name='lining_jacket_price']");
                    var lining_id_set = $("input[name='jacket_lining_id']");

                    $(".lining_3d div.slider_box img.selected", n).hide();
                    $(".lining_3d div.slider_box div.suit_lining.selected", n).removeClass("selected");
                    var u = $(this).closest("div.fabric_box_3d");
                    u.find("img.selected").show();
                    u.find("div.suit_lining").addClass("selected");
                    $(this).closest("div.lining_3d").find(".preview_fabric_3d_common div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + v + "_big.jpg) top right no-repeat");
                    $(this).closest("div.top").find("input.getVal").val(v);
                    $("div.info_fabric span.lining_material.jacket_lining").html($(this).attr("material"));
                    Man_Suit.current_id_t4l_lining = v;
                    var t = $(this).closest("div.top").find("input.getVal").attr("layer");
                    layer_position = Man_Suit.render.lmanager.layers[t].position;
                    if (layer_position != Man_Suit.model_position) {
                        Man_Suit.setModel_position()
                    }
                    lining_price_set.val(lining_price);
                    lining_id_set.val(v);
                    Man_Suit.cloth_open = false;
                    Man_Suit.render.jacket_opened = false;
                    //Man_Suit.redraw();
                    window.suit_price.lining_jacket = lining_price;
                    Man_Suit.updatePrice();
                    f();
                    return false
                });

            var p = {
                category: l,
                tone: o,
                texture: m,
                id_current_lining: q
            };
            /*n.find("div.slider_fabrics").load(base_href + "extras?product_type=man_jacket&action=filter", p, function(s) {
                $("a.select", this).click(function() {
                    var w = $(this).attr("category");
                    var v = $(this).attr("rel");
                    var x = $(this).attr("extra");
                    $(".lining_3d div.slider_box img.selected", n).hide();
                    $(".lining_3d div.slider_box div.suit_lining.selected", n).removeClass("selected");
                    var u = $(this).closest("div.fabric_box_3d");
                    u.find("img.selected").show();
                    u.find("div.suit_lining").addClass("selected");
                    $(this).closest("div.lining_3d").find(".preview_fabric_3d_common div.preview").css("background", "url(../dimg/lining/default/" + v + "_big.jpg) top right no-repeat");
                    $(this).closest("div.top").find("input.getVal").val(v);
                    $("div.info_fabric span.lining_material.jacket_lining").html($(this).attr("material"));
                    Man_Suit.current_id_t4l_lining = v;
                    var t = $(this).closest("div.top").find("input.getVal").attr("layer");
                    layer_position = Man_Suit.render.lmanager.layers[t].position;
                    if (layer_position != Man_Suit.model_position) {
                        Man_Suit.setModel_position()
                    }
                    Man_Suit.cloth_open = true;
                    Man_Suit.render.jacket_opened = true;
                    Man_Suit.redraw();
                    f();
                    return false
                });
                if ($("html.touch").length) {
                    $("img.selected", this).remove()
                }
                h(n)
            })*/
        }

        function g(m, n) {
            var l = $("#input_hidden_lining_jacket"),
            lining_id_set = $("input[name='jacket_lining_id']");

            $("#lining_default_jacket").click(function() {
                $("input[name='default_jacket_val']").val('yes');
                lining_id_set.val('');
                n.hide();
                $("div.deco_lining", m).hide();
                Man_Suit.current_id_t4l_lining = Man_Suit.default_id_t4l_lining;
                l.val($(this).val());
                Man_Suit.render.lining_radio = "";
                Man_Suit.lining_radio = "";
                f();
                Man_Suit.cloth_open = false;
                Man_Suit.render.jacket_opened = false;
                Man_Suit.redraw(false);
                
            });
            $("#inp_lining_personalized_jacket, div.deco_lining").click(function() {
                if ($(this).hasClass("deco_lining")) {
                    $(this).closest(".op_lining").find("input").each(function() {
                        $(this).prop("checked", false)
                    });
                    $(this).closest(".op_lining").find("input#inp_lining_personalized_jacket").prop("checked", true);
                    $.uniform.update()
                }
                l_id = $("a.select:first").attr('rel'); 
                lining_id_set.val(l_id);
                $("input[name='default_jacket_val']").val('');
                n.show();
                $("div.deco_lining", m).hide();
                l.val($("div.slider_fabrics div.suit_lining.selected a",n).attr("rel"));
                $lining_material = $("div.slider_fabrics div.suit_lining.selected a", n).attr("material");
                $("div.info_fabric span.lining_material.jacket_lining").html($lining_material);

                Man_Suit.current_id_t4l_lining = l.val();
                Man_Suit.render.lining_radio = "";
                Man_Suit.lining_radio = "";
                f();
                $("div#lining_box_jacket div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + l.val() + "_big.jpg) top right no-repeat");
                //lining_price_set.val(lining_price);
                Man_Suit.cloth_open = false;
                Man_Suit.render.jacket_opened = false;
                //Man_Suit.redraw(true)
                //window.suit_price.lining_jacket = lining_price;
                Man_Suit.updatePrice()
            });
            $("#inp_lining_unlined_jacket").click(function() {
                n.hide();
                $("div.deco_lining", m).hide();
                $("input[name='default_jacket_val']").val('');
                Man_Suit.current_id_t4l_lining = Man_Suit.default_id_t4l_lining;
                if (typeof(window.unlined_linings[Man_Suit.id_t4l_fabric.default_fabric]) != "undefined") {
                    Man_Suit.current_id_t4l_lining = window.unlined_linings[Man_Suit.id_t4l_fabric.default_fabric]
                }
                l.val(Man_Suit.current_id_t4l_lining);
                Man_Suit.render.lining_radio = "unlined";
                Man_Suit.lining_radio = "unlined";
                f();
                Man_Suit.cloth_open = false;
                Man_Suit.render.jacket_opened = false;
                //Man_Suit.redraw(true)
            })
        }

        function f() {
            var m = 0;
            lining_price_set = $("input[name='lining_jacket_price']");
            if (Man_Suit.lining_radio == "unlined") {
                var l = $("#inp_lining_unlined_jacket:checked").attr("price");          
                lining_price_set.val(l);
                //lining_price_set.val('');
                m = l;
            } 

            else {
                
                if (Man_Suit.current_id_t4l_lining == Man_Suit.default_id_t4l_lining && $("input[name='default_jacket_val']").val()=='yes') {
                    m = 0;

                } else if (Man_Suit.current_id_t4l_lining == Man_Suit.default_id_t4l_lining ) {
                    
                    m = window.t4l_linings.jacket[Man_Suit.current_id_t4l_lining]["price"];

                }
                 else {
                    m = window.t4l_linings.jacket[Man_Suit.current_id_t4l_lining]["price"];
                    
                }

                //lining_price_set1.val('');
                lining_price_set.val(m);
            }
             window.suit_price.lining_jacket = m;
             Man_Suit.updatePrice();
            
        }
        j($("#lining_box_jacket"));
        g($("#options_lining_jacket"), $("#lining_box_jacket"));
        if ($("#inp_lining_personalized_jacket:checked").length) {
            $("#lining_box_jacket").show();
            $("#options_lining_jacket div.deco_lining").hide();
            var k = $("#input_hidden_lining_jacket").val();
            $("div#lining_box_jacket div.preview").css("background", "url("+Man_Suit.url+"assets/dimg/lining/default/" + k + "_big.jpg) top right no-repeat")
        }
        $lining_material = $("#lining_box_jacket").find("div.slider_box").find("div.selected").find("a.select").attr("material");
        $("div.info_fabric span.lining_material.jacket_lining").html($lining_material);
        d();
        f();
        $.uniform.update();
        Man_Suit.cloth_open = false
    }
};