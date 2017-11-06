function Garment(a, c) {

    this.step = "";

    for (var b in c) {

        this[b] = c[b]

    }

    this.container = $(a);

    this.render = $("div.render div.render3d", this.container);

    this.render_enabled = false;

    this._fabric_block_obj = null;

    this._fabric_block = "";

    this._relations_active = {};

    this._events = {};

    this.multiple_fabric_enabled = false;

    this.allow_redirect = false;

    this.window_title = document.title;

    this.loading_layer = $(".garment_loading", this.container);

    this.mobile_enabled = window.mobile_enabled;

    this.is_mobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

    this.mobile_current_option = false;

    this.mobile_layer_extra_fabrics_visible = false;

    this.mobile_layer_extra_fabrics;

    this.fabrics_disabled = [];

    if (typeof(window.fabrics) == "undefined") {

        window.fabrics = {}

    }

    this._fabrics = window.fabrics;

    if (typeof(window.linings) == "undefined") {

        window.linings = {}

    }

    this._linings = window.linings;

    if (this.mobile_enabled && typeof(window.orientation) != "undefined") {

        window.addEventListener("orientationchange", function() {

            if (window.orientation != 0) {

                $("#vertical_please").show()

            } else {

                $("#vertical_please").hide()

            }

        }, false);

        if (window.orientation != 0) {

            $("#vertical_please").show()

        }

    }

}

Garment.prototype.initGarment = function() {

    this.loading_layer.show();

    this.initGarmentConfig();

    this.initGarmentFabric();

    this.initGarmentExtra();

    if (this.mobile_enabled) {

        this.initMobileLayers()

    }

    this.initGarmentHeader();

    this.updatePrice();

    this.renderInit();
    $fabric_id = $('.current').find('a.select').attr('rel');
    if($fabric_id == '443' || $fabric_id == '828' || $fabric_id == '922' || $fabric_id == '172' || $fabric_id == '792' || $fabric_id == '370' || $fabric_id == '264' || $fabric_id == '567') {
        //this.renderInit();
}
    
    else 
    {
        $('div.render').css('display','none');
        $p_img = $('input[name="p_img"]').val();
        $('div.render1').css('display','block');
        $('div.render1').html('<img src=" '+ $p_img + ' ">');
    }

    this.loading_layer.hide();
};

Garment.prototype.initGarmentHeader = function() {

    var e = this;

    var d = $("nav.garment_nav", this.container).on("click", "a", function() {

        e.stepSetURL(this.href.getID(true));

        return false

    });

    History.Adapter.bind(window, "statechange", function() {

        var f = History.getState();

        e.stepSwitch(typeof(f.data.step) != "undefined" ? f.data.step : "config")

    });

    $("a.step_next", this.container).click(function() {

        e.stepNext();

        return false

    });

    $("a.step_prev", this.container).click(function() {

        e.stepPrev();

        return false

    });

    if (this.mobile_enabled) {

        var a = d.find(".col-xs-5");

        this.bind("stepSwitch", function(f) {

            switch (this.step) {

                case "extra":

                    a.addClass("two_options");

                    break;

                default:

                    a.removeClass("two_options")

            }

        })

    }

    if (this.mobile_enabled) {

        this.stepScrollMobile()

    } else {

        this.stepScroll()

    }

    if (this.mobile_enabled) {

        var b = $('<span class="step_counter">1/3</span>');

        d.find(".col-xs-7").append(b);

        this.bind("stepSwitch", function(f) {

            switch (this.step) {

                case "config":

                    b.text("1/3");

                    break;

                case "fabric":

                    b.text("2/3");

                    break;

                case "extra":

                    b.text("3/3");

                    break

            }

        })

    }

    this.formInit();

    var c = parse_query_string(window.location.search);

    if (!c.step) {

        c.step = "config"

    }

    History.replaceState(c, window.title);

    $(window).trigger("statechange")

};

Garment.prototype.initGarmentConfig = function() {

    var d = this;

    var b = {};

    var c;

    $("div.config_field", this.container).each(function() {

        var f = $("input:eq(0)", this);

        if (!f.length) {

            f = $("select:eq(0)", this)

        }

        var h = f.attr("name");

        if (typeof(d.current.config[h]) != "undefined") {

            switch (f.attr("type")) {

                case "radio":

                    $('input[value="' + d.current.config[h] + '"]', this).prop("checked", true);

                    break;

                default:

                    f.val(d.current.config[h]);

                    break

            }

        }

        if (d.mobile_enabled) {

            var g = {};

            $(".option", this).each(function() {

                g[$("input", this).val()] = {

                    icon: $(".icon", this).text(),

                    text: $(".text", this).text()

                }

            });

            var e = $("div.box_opt_mobile", this).attr("icon-fixed");

            b[h] = g;

            if (!d.current.config[h] && d.current.config[h] != "0") {

                return

            }

            if (e) {

                $(this).append('<a href="#' + h + '" class="opt_trigger ' + h + ' ">' + e + "</a>").find(".mobile_layer").attr("id", h + "_opt")

            } else {

                $(this).append('<a href="#' + h + '" class="opt_trigger ' + h + ' ">' + g[d.current.config[h]].icon + "</a>").find(".mobile_layer").attr("id", h + "_opt")

            }

        }

    });

    if (d.mobile_enabled) {

        $(window).resize(function() {

            var e = $(window).height();

            var h = $(".render3d").height();

            var f = $(".render3d").css("margin-top");

            f = parseInt(f);

            var g = h + parseInt(f);

            $("div.garment_block_config ").css("height", "" + g + "px")

        });

        $(window).trigger("resize")

    }

    if (d.mobile_enabled) {

        c = $("a.opt_trigger", this.container)

    }

    var a = $("input, select", this.container).on('load change',function(event) {

        var fabric_type=true;

        if(event.originalEvent == undefined) 

            var fabric_type = false;

        if (typeof(d.config[this.name]) === "undefined") {

            return false

        }

        d.relationsApply(this.name, d.config[this.name][this.value]);

        if ($(this).is(":checkbox")) {

            if ($(this).is(":checked")) {

                d.current.config[this.name] = ($(this).val())

            } else {

                d.current.config[this.name] = false

            }

        } else {

            d.current.config[this.name] = $(this).val();

        }

        if (typeof(window.t4l_inputs_enabled) == "undefined") {

            return false

        }

        if (window.garment_opt.product_type == "woman_suitpants" || window.garment_opt.product_type == "woman_suitskirt") {

            var f = $(this).closest(".config_block").attr("data-block");

            if(fabric_type) {

            if (f == "woman_jacket") {

                $(".controls .arrow_up").click()

            } else {

                if (f == "woman_pants" || f == "woman_skirt") {

                    $(".controls .arrow_down").click()

                }

            }

          }

        }

        if (d.mobile_enabled && b[this.name] && b[this.name][d.current.config[this.name]]) {

            var e = c.filter("." + this.name).prev().attr("icon-fixed");

            if (!e) {

                c.filter("." + this.name).text(b[this.name][d.current.config[this.name]].icon)

            }

        }

        if(fabric_type) {
            d.renderSetActiveBlock(this.getAttribute("data-block"));
           
        }


        if(fabric_type) 
        {
            $o = $('.fabric_block').attr('data-block-name');
            $fabric_id = $('a.select:first').attr('rel');
            $lining_id = $('input[name="lining_id"]').val();
              if($fabric_id =='443' || $fabric_id == '828' || $fabric_id == '922' || $fabric_id == '172' || $fabric_id == '792' || $fabric_id == '370' || $fabric_id == '264' || $fabric_id == '567') 
                {
                    $fabric_price = $('.price_total:first').text();


                       if($fabric_price=='') 
                        {
                            $fabric_price = 0;
                        }
                       else 
                        {
                            $fabric_price = $fabric_price.replace(",", ".");
                            $fabric_price = parseFloat($fabric_price);
                        }
                 $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");
                 if($lining_id!='')
                    $(".lining_thumb").removeClass("current").filter(".lining_" + $lining_id).addClass("current");

                 $(".fabric_main_image").attr('src','http://otkootoor.com/assets/dimg/fabric/443_normal.jpeg');         
                 $('div.render').show();
                 $('div.render1').hide();
                 if($fabric_id=='264') {

                    d.price_detail['fabric_woman_jacket'] = $fabric_price;
                    d.price_detail['fabric_woman_pants'] = 0;
                    d.current.fabric['woman_jacket'] = $fabric_id;
                    d.current.fabric['woman_pants'] = $fabric_id;
                }
                else if($fabric_id=='567') {

                    d.price_detail['fabric_woman_jacket'] = $fabric_price;
                    d.price_detail['fabric_woman_skirt'] = 0;
                    d.current.fabric['woman_jacket'] = $fabric_id;
                    d.current.fabric['woman_skirt'] = $fabric_id;
                }
                else {
                    d.price_detail['fabric_'+$o] = $fabric_price;
                    d.current.fabric[$o] = $fabric_id;
                }
                 
                 
                 d.updatePrice();
             }
             //$('.resize_fix').removeAttr('style');
             //$('.resize_fix').attr('style','width: 140.4px; margin-top: -136.8px; margin-left: 46.8px;');
             
        }
        
        d.renderDraw();
        

   });

   if (d.mobile_enabled) {

        a.click(function(j) {

            j.stopPropagation();

            var h = $(this);

            var g = h.hasClass("current");

            var i = h.parents(".filter");

            var f = $(this).parent();

            if (h.hasClass("all")) {

                if (g) {

                    return false

                }

                i.find("input").not(this).parent().removeClass("active");

                i.find("input.all").parent().addClass("active")

            } else {

                if (f.parent().find(".active").hasClass("active")) {

                    f.parent().find(".active").removeClass("active")

                }

                f.addClass("active");

                i.find("input.all").parent().removeClass("active")

            }

        }).filter(":checked").parent().addClass("active")

    }

    $("div.config_block", this.container).each(function() {

        var e = this.getAttribute("data-block");

        $("input, select", this).attr("data-block", e)

    });

    if (document.all) {

        $("label.option", this.container).find("img").on("click", function() {

            $(this.parentNode).click().find("input").change()

        })

    }

};

Garment.prototype.getCurrentLayers = function() {

    return this.current

};

Garment.prototype.parseLayers = function(d, c) {

    var a = 1;

    if (!empty(c.render_info) && !empty(c.render_info["model"])) {

        a = c.render_info["model"]

    }

    for (k in d) {

        var b = d[k];

        for (key in c.fabric) {

            var e = c.fabric[key];

            if (strpos(key, "_") !== false) {

                d[k]["src"] = str_replace("#" + key + "#", e, d[k]["src"])

            }

        }

        d[k]["src"] = str_replace("#view#", c.view, d[k]["src"]);

        d[k]["src"] = str_replace("#model#", a, d[k]["src"]);

        d[k]["src"] = d[k]["src"].replace(/^\//, window.cdn_host)

    }

    return d

};

Garment.prototype.initGarmentFabric = function() {

    $(".body").removeClass("body_blocked");

    var h = this;

    /* Price Update onload */

     var woman_coat_price = $('input.f_woman_coat').val();
     var woman_jacket_price = $('input.f_woman_jacket').val();
     var woman_pant_price = $('input.f_woman_pants').val();
     var woman_skirt_price = $('input.f_woman_skirt').val();
     var woman_blouse_price = $('input.f_woman_blouse').val();
     var woman_shirt_price = $('input.f_woman_shirt').val();
     
     if(woman_coat_price!='' && woman_coat_price!=undefined) {
        h.price_detail['fabric_woman_coat'] = woman_coat_price;
     }

     else if(woman_jacket_price!='' && woman_jacket_price!=undefined) {
        h.price_detail['fabric_woman_jacket'] = woman_jacket_price;
       
       if(woman_skirt_price!='' && woman_skirt_price!=undefined)
         h.price_detail['fabric_woman_skirt'] = woman_skirt_price;
       
       else if(woman_pant_price!='' && woman_pant_price!=undefined)
        h.price_detail['fabric_woman_pants'] = woman_pant_price;
     }

     else if(woman_pant_price!='' && woman_pant_price!=undefined) {
       h.price_detail['fabric_woman_pants'] = woman_pant_price;        
     }

     else if(woman_skirt_price!='' && woman_skirt_price!=undefined) {

       h.price_detail['fabric_woman_skirt'] = woman_skirt_price;        
     }

      else if(woman_blouse_price!='' && woman_blouse_price!=undefined) {

       h.price_detail['fabric_woman_blouse'] = woman_blouse_price;        
     }
     else if(woman_shirt_price!='' && woman_shirt_price!=undefined) {

       h.price_detail['fabric_woman_shirt'] = woman_shirt_price;        
     }

    

     else {
        
        $fabric_price = $('.current').find('.price_total').text();
        
        if($fabric_price=='') 
            $fabric_price=0;
        else 
            $fabric_price = parseFloat($fabric_price);
       
      
      if(woman_coat_price == '') {
            h.price_detail['fabric_woman_coat'] = $fabric_price; 
        }
        else if(woman_jacket_price == '') {
            h.price_detail['fabric_woman_jacket'] = $fabric_price;

            if(woman_pant_price=='') 
              h.price_detail['fabric_woman_pants'] = 0;
        }

        else if(woman_pant_price=='') {
            h.price_detail['fabric_woman_pants'] = $fabric_price; 
        }

        else if(woman_skirt_price=='') {
            h.price_detail['fabric_woman_skirt'] = $fabric_price;        
        }
        else if(woman_blouse_price=='') {
            h.price_detail['fabric_woman_blouse'] = $fabric_price;
        }
        else if(woman_shirt_price=='') {
            h.price_detail['fabric_woman_shirt'] = $fabric_price;
        }
  }
     


    var c = $("div.fabric_block_selector", this.container);

    if (c.length) {

        c.on("click", "a.selector", function() {

            var i = this.href.getID(true).replace(/^fabric_block_/, "");

            h.fabricChangeBlock(i);

            return false

        })

    } else {

        this.multiple_fabric_enabled = false;

        this.fabricChangeBlock($("div.fabric_block:eq(0)", h.container).attr("data-block-name"))

    }

    this.bind("multiFabric", this.fabricMultiChange);

    if (typeof(Blazy) != "undefined") {

        this.bLazy = new Blazy({

            success: function(i) {

                i.parentNode.className = i.parentNode.className.replace(/\loading\b/, "")

            }

        })

    } else {

        this.bLazy = false

    }

    var d = $(".fabric_filters", h.container);

    d.find("ul.filter input").click(function() {

        var j = $(this);

        var m = $(this).prop("checked");

        var l = j.parents(".filter");

        if (j.hasClass("all")) {

            if (m) {

                l.find("input").not(j, l).removeAttr("checked")

            }

            j.attr("disabled", 1)

        } else {

            var n = l.find("input.all");

            if (m) {

                var o = n.prop("checked");

                n.removeAttr("disabled");

                if (o) {

                    n.removeAttr("checked")

                }

            } else {

                var i = true;

                l.find("input").not(j, l).each(function() {

                    if ($(this).prop("checked")) {

                        i = false

                    }

                });

                if (i) {

                    n.click()

                }

            }

        }

        if (!h.mobile_enabled) {

            h.fabricsLoad()

        }

    });

    if (this.mobile_enabled) {

        $(".fabric_filter_trigger", this.container).click(function() {

            History.pushState({

                step: h.step,

                option: "fabric_filter"

            }, h.window_title, "?step=" + h.step + "&option=fabric_filter");

            return false

        }).appendTo(".garment_header", this.container);

        $(".fabric_filters .navigate a").click(function() {

            if (this.className == "select") {

                h.fabricsLoad()

            }

            $(".body").removeClass("body_blocked");

            History.back()

        })

    } else {

        var g = false;

        var a = false;



        function f() {

            if (g) {

                g.hide();

                a.removeClass("current");

                g = false;

                a = false

            }

        }

        d.find(".fabric_filter_nav label").mouseover(function() {

            var i = $(this).attr("rel");

            f();

            a = $(this).addClass("current");

            g = $(".fabric_options." + i, this.container).show()

        }).click(function() {

            return false

        });

        $(".fabric_filters", h.container).mouseleave(f);

        $("#current_filters").on("click", "a.del", function() {

            var j = this.getAttribute("name");

            var l = this.getAttribute("value");

            var m = $(".fabric_options input[name='" + j + "'][value='" + l + "']").prop("checked", 0).closest(".fabric_options");

            var i = true;

            m.find("input:checked").not(".all").each(function() {

                i = false

            });

            if (i) {

                m.find("input.all").prop("checked", 1).prop("disabled", 1)

            }

            h.fabricsLoad()

        })

    }

    $("input.multiple_fabric", this.container).change(function() {

        h.multiple_fabric_enabled = this.checked;

        if (this.checked) {
            $('.price_total').hide();
             $('.price_part').show();
            $(this).val('checked');
            c.show()

        } else {
            $('.price_total').show();
             $('.price_part').hide();
            $(this).val('');
            c.hide().find("a.selector:eq(0)").click()

        }

        h.trigger("multiFabric", [this.checked])

    }).change();

    if (h.multiple_fabric_enabled) {

        c.find("a.selector:eq(0)").click()

    }

    $("div.fabric_filter", this.container).on("click", "a", function() {

        h.fabricsLoad()

    });

    var b = false;

    this.bind("stepSwitch", function(i) {

        $("#link_apply_samples", this.container).hide();

        switch (i) {

            case "fabric":

                if (!$(".fabric_list", h._fabric_block_obj).hasClass("loaded")) {

                    this.fabricsLoad()

                }

                $("#link_apply_samples", this.container).show();

                break

        }

    });

    for (var e in this.fabric) {

        if (typeof(this.current.fabric[e]) == "undefined") {

            continue

        }



        this.fabricSelect(e, this.current.fabric[e])

    }

    this.bind("fabricChangeBlock", function(j, i) {

        if (this.step != "fabric") {

            return false

        }

        if (!$(".fabric_list", i).hasClass("loaded")) {

            this.fabricsLoad()

        }

    })

};

Garment.prototype.initGarmentExtra = function() {

    var c = $("div.extra_block_selector", this.container);

    var e = $("div.garment_block_extra", this.container);

    var d = this;

     $l_coat_lining = $('input.l_coat_lining').val();
     $l_jacket_lining = $('input.l_jacket_lining').val();

    if($l_coat_lining!=undefined && $l_coat_lining!='') 
    {
        d.price_detail['coat_lining'] = $l_coat_lining;
    }
    else if($l_jacket_lining!=undefined && $l_jacket_lining!='') 
    {
        d.price_detail['jacket_lining'] = $l_jacket_lining;
    }


    if (c.length) { 

        $("a.selector", c).click(function() {

            var f = this.href.getID(true).replace(/^extra_block_/, "");

            d.extraChangeBlock(f);

            return false

        }).eq(0).click()

    } else {

        d.extraChangeBlock($("div.extra_block:eq(0)", d.container).attr("data-block-name"))

    }

    $("div.garment_block_extra select", this.container).selectpicker();

    e.on("click", "div.extra_title", function() {

        var f = $(this.parentNode);

        if (f.hasClass("active")) {} else {

            d.extraActivate(f.attr("data-extra-name"), f)

        }

        return false

    });

    e.find("div.extra_title").append('<span class="title_price"></span>');

    e.on("click", "a.discard", function() {

        var f = $(this.parentNode);

        d.extraDiscard(f.attr("data-extra-name"), f);

        return false

    });

    var b = $("div.extra_container", this.container).each(function() {

        var f = (this.getAttribute("data-extra-type") + "").capitalize();

        var h = this.getAttribute("data-extra-name");

        if (d.mobile_enabled) {

            var g = $("div." + h).attr("info-icon");

            $(this).append('<a href="#' + h + '" class="opt_trigger ' + h + '">' + g + "</a>").find(".mobile_layer").attr("id", h + "_opt")

        }

        d.current.extras[h] = [];

        if (typeof(d["initExtra" + f]) == "function") {

            d["initExtra" + f].apply(d, [h, this])

        }

    });

    var a = false;

    this.bind("stepSwitch", function(f) {

        if (a) {

            return

        }

        if (f == "extra") {

            b.filter(".active").each(function() {

                d.trigger("activateExtra", [this.getAttribute("data-extra-name")])

            });

            a = true

        }

    })

};

Garment.prototype.initMobileLayers = function() {

    var b = this;

    $("a.opt_trigger", this.container).click(function() {

        var c = this.getAttribute("href").replace("/^[^#]/", "");

        var d = c.replace("#", "");

        History.pushState({

            step: b.step,

            option: d

        }, b.window_title, "?step=" + b.step + "&option=" + d);

        return false

    });

    History.Adapter.bind(window, "statechange", function() {

        var d = History.getState();

        if (typeof(d.data.option) != "undefined") {

            b.mobile_current_option = d.data.option;

            var c = $("#" + d.data.option + "_opt").show();

            $("body").css("overflow", "hidden");

            if (!c.hasClass("manual_close")) {

                c.addClass("manual_close").click(function() {

                    History.back()

                })

            }

            if (d.data.option == "fabric_view") {

                c.find(".loader").html("").load("?action=fabric_view&" + jQuery.param(d.data), function() {

                    var e = b._fabric_block;

                    var l = b.fabricGetInfo(d.data.id_t4l_fabric, e);

                    var h = jQuery.extend({}, b.price_detail);

                    for (var j in b.fabric[e]["price"]) {

                        if (typeof(l[j]) != "undefined" && typeof(b.fabric[e]["price"][j][l[j]]) != "undefined") {

                            h["fabric_" + e] += b.fabric[e]["price"][j][l[j]]

                        }

                    }

                    var i = 0;

                    for (var g in h) {

                        i += h[g]

                    }

                    i = Math.round(i * 100) / 100;

                    var f = format_price(i, "small_symbol");

                    $("div.price", this).html(f)

                })

            }

            if (typeof(d.data.fabrics) != "undefined") {

                b.mobile_layer_extra_fabrics.show();

                b.mobile_layer_extra_fabrics_visible = true

            } else {

                b.mobile_layer_extra_fabrics.hide();

                b.mobile_layer_extra_fabrics_visible = false

            }

        } else {

            if (b.mobile_current_option) {

                $("#" + b.mobile_current_option + "_opt").hide();

                $("body").css("overflow", "");

                b.mobile_current_option = false

            }

            if (b.mobile_layer_extra_fabrics_visible) {

                b.mobile_layer_extra_fabrics.hide();

                b.mobile_layer_extra_fabrics_visible = false

            }

        }

        $(window).scrollTop(0);

        $(".mobile_layer").scrollTop(0)

    });

    $("div.fabric_filters", this.container).attr("id", "fabric_filter_opt").addClass("manual_close");

    var a = $('<div id="fabric_view_opt" class="fabric_preview_popup manual_close"><div class="loader"></div></div>').appendTo(this.container);

    a.append($("div.fabric_filters .navigate").clone());

    $(".fabric_preview_popup .navigate").on("click", "a", function() {

        $(".body").removeClass("body_blocked");

        if (this.className == "select") {

            var c = History.getState();

            b.fabricSelect(c.data.fabric_block, c.data.id_t4l_fabric);

            b.stepNext()

        } else {

            History.back()

        }

    });

    b.mobile_layer_extra_fabrics = $('<div class="mobile_layer extras_fabrics"></div>').appendTo(this.container);

    if (b.bLazy) {

        b.mobile_layer_extra_fabrics.bind("scroll", b.bLazy.revalidate)

    }

};

Garment.prototype.stepNext = function() {

    switch (this.step) {

        case "config":

            return this.stepSetURL("fabric");

        case "fabric":

            if (typeof(this.extra) !== "undefined") {

                return this.stepSetURL("extra")

            }

        case "extra":

            this.container.submit();

            break

    }

};

Garment.prototype.stepPrev = function() {

    switch (this.step) {

        case "config":

            return false;

        case "fabric":

            return this.stepSetURL("config");

        case "extra":

            return this.stepSetURL("fabric")

    }

};

Garment.prototype.stepSetURL = function(a) {

    History.pushState({

        step: a

    }, this.window_title, "?step=" + a)

};

Garment.prototype.stepSwitch = function(a) {

    if (!a) {

        a = "config"

    }

    if (this.step == a) {

        return

    }

    this.container.removeClass(this.step).addClass(a);

    $("nav.garment_nav li", this.container).removeClass("active").find('a[href="#' + a + '"]').parent().addClass("active");

    $("div.garment_block", this.container).hide().filter(".garment_block_" + a).show();

    this.step = a;

    this.trigger("stepSwitch", [a])

};

Garment.prototype.stepScroll = function() {

    var e = $('<header class="garment_step garment_header"><div class="container"></div></header>').appendTo(this.container);

    var c = e.find(".container");

    var d = false;

    $("a.step_next:eq(0)", this.container).clone(true).appendTo(c);

    $("div.garment_header_right", this.container).clone().appendTo(c);

    this._scroll_header = e;

    switch ($("html").attr("lang")) {

        case "es":

            var f = " VOLVER ARRIBA ";

            break;

        case "fr":

            var f = " HAUT DE LA PAGE ";

            break;

        case "de":

            var f = " ZURÃœCK NACH OBEN ";

            break;

        case "it":

            var f = " TORNA SU ";

            break;

        case "ru":

            var f = " â€‹Ð’Ð•Ð ÐÐ£Ð¢Ð¬Ð¡Ð¯ ÐÐÐ’Ð•Ð Ð¥â€‹ ";

            break;

        default:

            var f = " BACK TO TOP ";

            break

    }

    var l = $('<footer class="garment_step"><div class="container"><a class="to_top" href="javascript:;"><span class="icon">C</span><span class="txt"> ' + f + " </span></a></div></footer>").appendTo(this.container);

    var j = l.find(".container");

    var g = false;

    $("a.step_next:eq(0)", this.container).clone(true).appendTo(j);

    $("a.step_prev:eq(0)", this.container).clone(true).appendTo(j);

    this._scroll_footer = l;

    var m = 0;

    var i = $(".garment_nav", this.container).offset().top + 50;

    var h = this;

    var b = $(window);

    var a = function() {

        var o = 0;

        switch (h.step) {

            case "fabric":

                o = m;

                break;

            default:

                o = i;

                break

        }

        var n = b.scrollTop();

        if (n > 100) {

            if (!g) {

                l.css("visibility", "visible");

                g = true

            }

        } else {

            if (g) {

                l.css("visibility", "hidden");

                g = false

            }

        }

        h.bind("stepSwitch", function(p) {

            if (p == "config") {

                l.find(".step_prev").hide()

            } else {

                l.find(".step_prev").show()

            }

        });

        if (o && n >= o) {

            if (!d) {

                e.css("visibility", "visible");

                h.trigger("scrollHeaderShow", [e]);

                d = true

            }

        } else {

            if (d) {

                e.css("visibility", "hidden");

                h.trigger("scrollHeaderHide", [e]);

                d = false

            }

        }

    };

    b.bind("scroll", a).bind("touchmove", a).bind("touchend", a);

    $("a.to_top", l).click(function() {

        $("body, html").animate({

            scrollTop: i - 110

        }, "fast", a);

        return false

    });

    this.bind("scrollHeaderShow", function() {

        switch (this.step) {

            case "fabric":

                var n = $("div.fabric_filters", this._fabric_block_obj).clone(true, true).appendTo(c);

                n.find("input").unbind("change").change(function() {

                    if (this.type == "radio" || this.type == "checkbox") {

                        $('input[name="' + this.name + '"][value="' + this.value + '"]', h._fabric_block_obj).prop("checked", true).change()

                    } else {

                        $('input[name="' + this.name + '"]', h._fabric_block_obj).val(this.value).change()

                    }

                });

                break;

            default:

                $("div.fabric_filters", c).remove()

        }

    });

    this.bind("scrollHeaderHide", function() {

        $("div.fabric_filters", c).remove()

    });

    this.bind("stepSwitch", function(n) {

        $("html, body").animate({

            scrollTop: i - 110

        }, a);

        c.get(0).className = "container " + n

    });

    this.bind("fabricsBeforeLoad", function(n) {

        if (b.scrollTop() > i) {

            $("body").animate({

                scrollTop: i

            }, "fast")

        }

    });

    this.bind("fabricsLoad", function(n) {

        if (!m) {

            m = $("div.fabric_list", h.fabric_block_obj).offset().top

        }

    })

};

Garment.prototype.stepScrollMobile = function() {

    var g = this;

    var e = $(window);

    var b = false;

    var a = 40;

    var f = $(".garment_header", this.container);

    var d = $(".garment_nav", this.container);

    var c = function() {

        var i = 0;

        switch (g.step) {

            case "fabric":

                i = a;

                break;

            default:

                return true

        }

        var h = e.scrollTop();

        if (i && h >= i) {

            if (!b) {

                f.css("position", "fixed");

                b = true

            }

        } else {

            if (b) {

                f.css("position", "");

                b = false

            }

        }

    };

    e.bind("scroll", c).bind("touchmove", c).bind("touchend", c);

    this.bind("stepSwitch", function(h) {

        f.css("position", "");

        d.css("position", "")

    })

};

Garment.prototype.formInit = function() {

    var a = this;

    $(this.container).submit(function() {

        return a.formSubmit()

    });

    this.bind("discardExtra", function(c, b) {

        b.find(".extra_field").each(function() {

            a.formGetPopover(this, false)

        })

    })

};

Garment.prototype.formSubmit = function() {

    this.allow_redirect = true;

    var c = this;

    var a = "";



    function b() {

        var g = (this.tagName.toLowerCase() == "input");

        var e = g ? $(this) : $("input", this);

        var f = g ? e.parent().get(0) : this;

        if (e.length) {

            switch (e.eq(0).attr("type")) {

                case "radio":

                case "checkbox":

                    if (!e.filter(":checked").length) {

                        c.formShowError(a, f);

                        c.allow_redirect = false;

                        return false

                    }

                    break;

                default:

                    if (!e.val()) {

                        c.formShowError(a, f);

                        c.allow_redirect = false;

                        return false

                    }

            }

        } else {

            var d = $("select", this);

            if (!d.length) {

                return true

            }

            if (!d.val()) {

                c.formShowError(a, f);

                c.allow_redirect = false;

                return false

            }

        }

        return true

    }

    a = "config";

    $(".garment_block_config:visible", this.container).find(".config_field:visible").each(b);

    if (!this.allow_redirect) {

        return false

    }

    a = "fabric";

    $(".garment_block_fabric", this.container).find("input.required").each(b);

    if (!this.allow_redirect) {

        return false

    }

    $(this.container).append('<input type="hidden" name="next" value="1" />');

    return true

};

Garment.prototype.formShowError = function(c, b) {

    if (this.step != c) {

        this.stepSetURL(c)

    }

    var a = $(b).offset().top - 300;

    if (a < 0) {

        a = 0

    }

    $("html, body").animate({

        scrollTop: a

    }, "500", "swing");

    if (!b.getAttribute("popover_event_attached")) {

        var e = this;

        $(b).attr("popover_event_attached", true).find("input, select").change(function() {

            e.formGetPopover(b, false)

        })

    }

    var d = this.formGetPopover(b, true);

    $(".popover-content", d).html($.validator.messages.required);

    d.show()

};

Garment.prototype.formGetPopover = function(c, b) {

    var d, a;

    a = $(c).data("validate-popover");

    if (a == null && b) {

        a = $("<div class='popover right error-popover'><div class='arrow'></div><div class='popover-content'></div></div>").prependTo(c);

        a.click(function() {

            return $(this).hide()

        });

        $(c).data("validate-popover", a)

    }

    return a ? a.hide() : false

};

Garment.prototype.bind = function(b, a) {

    if (typeof(this._events[b]) == "undefined") {

        this._events[b] = []

    }

    this._events[b].push(a)

};

Garment.prototype.trigger = function(c, a) {

    if (typeof(this._events[c]) == "undefined") {

        return

    }

    for (var b in this._events[c]) {

        this._events[c][b].apply(this, a)

    }

};

Garment.prototype.unbind = function(c, b) {

    if (typeof(this._events[c]) == "undefined") {

        return

    }

    var a = this._events[c].indexOf(b);

    if (a > -1) {

        this._events[c].splice(a, 1)

    }

};

Garment.prototype.relationsApply = function(b, j) {

    var h = this;

    var d = [];



    function e(o, w) {

        var n = $(o.css_selector, h.container);

        if (!n.length) {

            return true

        }

        switch (o.rel_type) {

            case "require":

                if (o.field_values) {

                    n = n.filter("." + o.field_values.join(", ."))

                }

                if (w) {

                    n.removeClass("required");

                    h.formGetPopover(n, false)

                } else {

                    n.addClass("required")

                }

                break;

            case "disable":

                if (w) {

                    var m = false;

                    for (var t in h._relations_active) {

                        if (t == b) {

                            continue

                        }

                        for (var v in h._relations_active[t]) {

                            if (h._relations_active[t][v].rel_type == "disable") {

                                var p = h._relations_active[t][v];

                                if (p.block != o.block) {

                                    continue

                                }

                                if (p.field_name != o.field_name) {

                                    continue

                                }

                                if (p.field_values && o.field_values) {} else {

                                    if (p.field_values) {} else {

                                        if (o.field_values) {} else {

                                            m = true;

                                            break

                                        }

                                    }

                                }

                            }

                        }

                    }

                    if (m) {

                        break

                    }

                }

                var x = w ? "show" : "hide";

                if (o.step == "fabric") {

                    if (!w && $.inArray(o.block, d) < 0) {

                        d.push(o.block)

                    }

                } else {

                    if (o.step == "extra") {

                        if (o.field_values) {

                            for (var s in o.field_values) {

                                n.filter("." + o.field_values[s])[x]()

                            }

                        } else {

                            n[x]()

                        }

                    } else {

                        if (o.field_values) {

                            if (n.hasClass("box_opt_select")) {

                                if (w) {

                                    return false

                                }

                                var y = n.data("options");

                                if (!y) {

                                    y = {};

                                    n.find("option").each(function() {

                                        y[this.value] = this.innerHTML

                                    });

                                    n.data("options", y)

                                }

                                y = jQuery.extend({}, y);

                                for (var s in o.field_values) {

                                    delete y[o.field_values[s]]

                                }

                                var r = n.find("select");

                                var q = r.val();

                                r.empty();

                                $.each(y, function(i, z) {

                                    r.append($("<option></option>").attr("value", i).prop("selected", i == q).text(z))

                                });

                                r.change()

                            } else {

                                for (var s in o.field_values) {

                                    var u = n.find('input[value="' + o.field_values[s] + '"]');

                                    u.closest(".option")[x]();

                                    if (x == "show") {

                                        u.closest(".option").addClass("visible");

                                        u.closest(".option").removeClass("oculto")

                                    } else {

                                        u.closest(".option").addClass("oculto");

                                        u.closest(".option").removeClass("visible")

                                    }

                                    if (u.is(":checked")) {

                                        var f = u.attr("name");

                                        if (h.mobile_enabled) {

                                            $("#" + f + "_opt label").not(".oculto").first().children("input").click()

                                        } else {

                                            $("div." + f + " label:visible:first").children("input").click()

                                        }

                                    }

                                }

                            }

                        } else {

                            n[x]();

                            if (w) {

                                if (!n.find("input:checked").length) {

                                    n.find("input:eq(0)").prop("selected", 1).click()

                                }

                            }

                        }

                    }

                }

                break;

            case "default":

                break

        }

    }

    if (typeof(this._relations_active[b]) != "undefined") {

        for (var c in this._relations_active[b]) {

            e(this._relations_active[b][c], true)

        }

    }

    this._relations_active[b] = [];

    for (var c in j) {

        var a = this.relationParse(j[c]);

        e(a);

        this._relations_active[b].push(a)

    }

    var l = (d.length != this.fabrics_disabled.length);

    if (!d) {

        for (var g in d) {

            if ($.inArray(g, this.fabrics_diabled) >= 0) {

                l = true;

                break

            }

        }

    }

    if (l) {

        this.fabrics_disabled = d;

        this.fabricsUpdateDisabled()

    }

};

Garment.prototype.relationParse = function(d) {

    var b, a;

    var c = {

        rel_type: false,

        step: false,

        block: false,

        field_name: false,

        field_values: false,

        css_selector: false

    };

    b = d.split("#");

    c.rel_type = b[0];

    b = b[1].split(":");

    a = "div." + b[0] + "_block";

    c.step = b[0];

    if (b.length > 1) {

        a += "_" + b[1];

        c.block = b[1]

    }

    if (b.length > 2) {

        if (c.step == "extra") {

            a = "div.extra_container." + b[2]

        } else {

            a = "div." + b[0] + "_field." + b[2]

        }

        c.field_name = b[2]

    }

    if (b.length > 3) {

        if (c.step == "extra") {

            a += " div.extra_field"

        } else {

            a += " div.box_opt"

        }

        c.field_values = b[3].trim("[]").split(",")

    }

    c.css_selector = a;

    return c

};

Garment.prototype.parseImages = function(a, c) {

    layers = this.getLayers();

    layers = this.parseLayers(layers, c);

    final_images = [];

    for (key in a) {

        var b = a[key];

        array_push(final_images, [layers[b.layer]["src"] + b.src, b.zIndex])

    }

    return final_images

};

Garment.prototype.renderInit = function() {

    if (!window.mobile_enabled) {

        this.renderScroll()

    }

    var e = this;

    var a = $("div.render", this.container);

    if (!a.length) {

        return false

    }

    var c = $(".controls a.toggle", a);

    if (c.length) {

        var d = c.attr("data-block");

        var b = [];

        $("div.config_block", this.container).each(function() {

            b.push(this.getAttribute("data-block"))

        });

        this.bind("renderChangeActiveBlock", function(f) {

            if (d == f) {

                c.attr("data-icon", "F").find("span").hide().filter(".h").show();



            } else {

                c.attr("data-icon", "G").find("span").hide().filter(".s").show();

            }

        });

        c.click(function() {

            if (d == e.renderGetActiveBlock()) {

                var g = "";

                for (var f in b) {

                    if (b[f] != d) {

                        g = b[f];

                        break

                    }

                }

                if (g) {

                    e.renderSetActiveBlock(g)

                }

            } else {

                e.renderSetActiveBlock(d)

            }

            e.renderDraw()

        });

        e.renderSetActiveBlock(d);

        this.bind("stepSwitch", function() {

            if (e.renderGetActiveBlock() != d) {

                this.renderSetActiveBlock(d);

                this.renderDraw()

            }

        })

    }

    this.render_enabled = true;

    this.renderDraw();

};

Garment.prototype.renderSetActiveBlock = function(a) {

    if (typeof(this.current.config._active_block) == "undefined" || this.current.config._active_block != a) {

        this.current.config._active_block = a;

        this.trigger("renderChangeActiveBlock", [a])

    }

};

Garment.prototype.renderGetActiveBlock = function() {

    if (typeof(this.current.config._active_block) == "undefined") {

        return ""

    }

    return this.current.config._active_block

};

Garment.prototype.renderSetActiveExtra = function(a) {

    if (typeof(this.current.config._active_extra) == "undefined" || this.current.config._active_extra != a) {

        this.current.config._active_extra = a;

        this.trigger("renderChangeActiveExtra", [a])

    }

};

Garment.prototype.renderGetActiveExtra = function() {

    if (typeof(this.current.config._active_extra) == "undefined") {

        return ""

    }

    return this.current.config._active_extra

};

Garment.prototype.renderDraw = function() {

    if (!this.render_enabled || typeof(window.t4l_inputs_enabled) == "undefined") {

        return false

    }

    var a = this.renderGetImages();

    var d = this;
    
    this.render.find("img").attr("class", "delete");

    this.render.find("input").attr("class", "delete");

        for (var c in a) {

            var b = this.render.find("img[src$='" + a[c][0] + "']");

            var g = this.render.find("input[value$='" + a[c][0] + "']");

            var n=a[c][0].match(/\Wcoat\/linings\W/);

            var n1 = a[c][0].match(/\Wabrigo\W/);

            var n2 = a[c][0].match(/undefined/g)

            if(n2==null) {

            if (!b.length) {

                b = $('<img src="' + a[c][0] + '" alt="" width="343" />').appendTo(this.render)

            }
           if(n==null && n1==null) { 
            g = $('<input value="' + a[c][0] + '" name="img_render[]" type="hidden" />').appendTo(this.render)
           }
            b.css("zIndex", a[c][1]).attr("class", "");
        }

        }

    this.render.find("img.delete").remove()

    this.render.find("input.delete").remove()   

};

Garment.prototype.renderScroll = function() {

    var n = this;

    var a = $("div.render", this.container);

    if (!a.length) {

        return false

    }

    var g = $(".controls", a);

    var b = a.offset().top;

    var f = $("nav.garment_nav", this.container).height() + $("header.garment_header", this.container).height() + 120;

    this.render_height = a.height();

    var l = function() {

        if (!h) {

            return true

        }

        var u = j.scrollTop();

        if (u > b) {

            a.addClass("fixed")

        } else {

            a.removeClass("fixed")

        }

    };

    var j = $(window).bind("scroll", l).bind("touchmove", l);

    var h = false;



    function m() {

        var u = $(n.container).height();

        var v = (u > n.render_height - f);

        if (h && !v) {

            l()

        }

        h = v

    }

    m();

    j.resize(m);

    this.bind("stepSwitch", m);

    this.bind("fabricsLoad", m);

    this.bind("activateExtraFinish", m);

    this.bind("discardExtraFinish", m);

    var p = a.find("a.arrow_up");

    var s = a.find("a.arrow_down");

    var i = 750;

    var r = this.render.css("margin-top");

    s.click(function(x) {

        x.preventDefault();

        var u = parseInt($(window).height());

        var w = parseInt(a.find("img:eq(0)").height());

        var v = ((u - 160) - w);

        $(this).addClass("disabled");

        p.removeClass("disabled");

        n.render.animate({

            "margin-top": v + "px"

        }, i);

        return false

    });

    p.click(function(u) {

        u.preventDefault();

        $(this).addClass("disabled");

        s.removeClass("disabled");

        n.render.animate({

            "margin-top": r

        }, i);

        return false

    });

    var o = a.find("a.zoom");

    var q = a.find(".render3d");

    var t = 0.6;

    var d = {

        width: q.width(),

        "margin-top": parseInt(q.css("margin-top")),

        "margin-left": parseInt(q.css("margin-left"))

    };

    var e = {

        width: d.width * t,

        "margin-top": d["margin-top"] * t,

        "margin-left": d.width * (1 - t) / 2

    };



    function c(u) {

        switch (u) {

            case "in":

                q.css(d);

                o.hide().filter(".out").show();
                //$('.resize_fix').removeAttr('style');
                
                //$('.resize_fix').attr('style','width: 234px; margin-top: -24px; margin-left: 78px;');

                break;

            case "out":

                q.css(e);

                o.hide().filter(".in").show();
                //$('.resize_fix').removeAttr('style');
                
                //$('.resize_fix').attr('style','width: 140.4px; margin-top: -136.8px; margin-left: 46.8px;');
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

    this.bind("scrollHeaderShow", function(v) {

        if (!h) {

            return false

        }

        var u = parseInt(v.css("padding-top")) + parseInt(v.css("padding-bottom"));

        a.css("margin-top", v.outerHeight() + "px");

        a.addClass("fixed")

    });

    this.bind("scrollHeaderHide", function(u) {

        a.css("margin-top", 0);

        a.removeClass("fixed");

        s.addClass("disabled");

        p.removeClass("disabled")

    })

};

Garment.prototype.fabricChangeBlock = function(c) {

    var b = $("div.fabric_block_selector", this.container);

    var a = $("a.selector", b).removeClass("current").filter("." + c).addClass("current");

    var d = $("div.fabric_block", this.container).hide();

    this._fabric_block_obj = d.filter(".fabric_block_" + c).show();

    this._fabric_block = c;

    this.trigger("fabricChangeBlock", [c, this._fabric_block_obj])

};

Garment.prototype.fabricsLoad = function() {

    var d = this;

    this.loading_layer.show();

    this.trigger("fabricsBeforeLoad", []);

    var b = false;

    var a = {

        action: "fabric_filter",

        disable_blocks: this.fabrics_disabled.join(",")

    };

    $('input:checked, input[type="hidden"], select', this._fabric_block_obj).each(function() {

        if (this.value == "reset") {

            b = true;

            return false

        }

        if ($(this).attr("rel") != "is_filter") {

            a[this.name] = this.value

        } else {

            if (typeof(a[this.name]) == "undefined") {

                a[this.name] = []

            }

            a[this.name].push(this.value)

        }

    });

    if (b) {

        a = {

            action: "fabric_filter",

            disable_blocks: this.fabrics_disabled.join(",")

        };

        $('input[type="hidden"]', this._fabric_block_obj).each(function() {

            a[this.name] = this.value

        });

        $("select", this._fabric_block_obj).val("all").selectpicker("refresh")

    }

    var c = $("div.fabric_list", this._fabric_block_obj);

    c.addClass("loaded loading").load(window.location.href, a, function() {

        $(this).removeClass("loading");

        var g = $('input[name="fabric[' + d._fabric_block + ']"]', d._fabric_block_obj).val();

        c.find(".fabric_" + g).addClass("current");

        d.trigger("fabricsLoad", [c]);

        if (!d.mobile_enabled) {

            var e = "";

            $("div.fabric_options input:checked").not(".all").each(function() {

                var j = $(this).parent().text();

                var h = this.getAttribute("name");

                var i = this.getAttribute("value");

                e += "<li>" + j + ' <a href="javascript:;" class="del" name="' + h + '" value="' + i + '">x</a></li>'

            });

            if (e) {

                var f = "Your<br>filters";

                switch ($("html").prop("lang")) {

                    case "es":

                        f = "Tus<br>filtros";

                        break;

                    case "it":

                        f = "I tuoi<br>filtri";

                        break;

                    case "fr":

                        f = "Votre<br>filtre";

                        break;

                    case "de":

                        f = "Ihre<br>Filter";

                        break;

                    case "ru":

                        f = "Ð’Ð°ÑˆÐ¸<br>Ñ„Ð¸Ð»ÑŒÑ‚Ñ€Ñ‹";

                        break;

                    case "cn":

                        f = "æ‚¨çš„è¿‡æ»¤å™¨";

                        break

                }

                e = '<ul><li class="first">' + f + "</li>" + e + "</ul>";

                $("#current_filters").html(e).show()

            } else {

                $("#current_filters").html(e).hide()

            }

        }

        if (d.bLazy) {

            d.bLazy.revalidate()

        }

        d.loading_layer.hide()

    });

    c.on("click", "a", function(g) {

        $(".body").addClass("body_blocked");

        var f = parse_query_string(this.href.replace(/^[^?]*/, ""));

        if (d.mobile_enabled) {

            f.step = d.step;

            f.option = f.action;

            delete f.action;

            History.pushState(f, d.window_title, "?" + jQuery.param(f))

        } else {

            if (!$(this.parentNode).hasClass("current")) {

                d.fabricSelect(f.fabric_block, f.id_t4l_fabric);

                g.ctrlKey = true

            }

        }

        return false

    });

    History.Adapter.bind(window, "statechange", function() {

        var e = History.getState();

        if (e.data.option != "fabric_view") {

            $(".body").removeClass("body_blocked")

        }

    });

    if (!this.mobile_enabled) {

        c.magnificPopup({

            delegate: "a",

            type: "ajax",

            gallery: {

                enabled: true

            },

            mainClass: "magn_popup_tejidos",

            closeMarkup: '<button class="mfp-close"></button>',

            callbacks: {

                ajaxContentAdded: function() {

                    $("a.btn-success", this.content).click(function() {

                        d.fabricSelect(this.getAttribute("data-fabric-block"), this.getAttribute("data-fabric-id"));

                        $.magnificPopup.close()

                    });

                    $(this.content).css("max-height", ($(window).height() - 40) + "px")

                },

                buildControls: function() {

                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight))

                }

            }

        })

    }

};

Garment.prototype.fabricSelect = function(o, f) {



 var g = this;

    $('a.select').on('click',function(){

        $fabric_id = $(this).attr('rel');

        /*$('.resize_fix').removeAttr('style');
        $('.resize_fix').attr('style','width: 140.4px; margin-top: -136.8px; margin-left: 46.8px;');*/

        

        //$("input.fabric_input").val($fabric_id);

        $title = $(this).nextAll('.fabric_title').text();

        $composition = $(this).nextAll('.composition').text();

       $fab_prod_img = $(this).nextAll('.f_prod_img').val();


         var r = $('.multiple_fabric').val();

        if(r=='checked') {
             
             
             $fabric_price = $(this).nextAll('.price_part').text();
             $fabric_price1 = $('.current').find('.woman_skirt').text();
             $fabric_price3 = $('.current').find('.woman_pants').text();
             $fabric_price4 = $('.current').find('.woman_jacket').text();

             if($fabric_price1=='') 
            {
                $fabric_price1 = 0;
            }
            else {

                $fabric_price1 = parseFloat($fabric_price1);
            }

             if($fabric_price=='') 
            {
                $fabric_price = 0;
            }
            else {

                $fabric_price = parseFloat($fabric_price);
            }

            if($fabric_price3=='') 
            {
                $fabric_price3 = 0;
            }
            else {

                $fabric_price3 = parseFloat($fabric_price3);
            }

            if($fabric_price4=='') 
            {
                $fabric_price4 = 0;
            }
            else {

                $fabric_price4 = parseFloat($fabric_price4);
            }


            var r = $(this).parents('.fabric_block').attr('data-block-name');

            var r1 = $(this).parents('.fabric_block').attr('data-block-name1');


            if(r == 'woman_pants') {

                $(".fabric_thumb.woman_pants").removeClass("current").filter(".woman_pants.fabric_" + $fabric_id).addClass("current");

            $pants_main_img = $('.fabric_main_image').attr('src');

            $pants_main_img1 = $pants_main_img.split('_');

            $pants_main_img2 = $pants_main_img.replace($pants_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$pants_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + r + ']').val($fabric_id);

            //g.price_detail['fabric_woman_pants'] = $fabric_price;
            $('input.f_woman_pants').val($fabric_price);
             $('input.f_woman_jacket').val($fabric_price4);
            //g.updatePrice();
            //g.current.fabric[r] = $fabric_id;

            if($fabric_id =='264') {
              g.price_detail['fabric_'+r] = $fabric_price;
              g.price_detail['fabric_woman_jacket'] = $fabric_price4;
              g.current.fabric[r] = $fabric_id;
              
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_'+r] = $fabric_price;
             g.price_detail['fabric_woman_jacket'] = $fabric_price4;
             g.current.fabric[r] = '264';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }
        }

        if(r == 'woman_jacket') {

            $(".fabric_thumb.woman_jacket").removeClass("current").filter(".woman_jacket.fabric_" + $fabric_id).addClass("current");

            $jacket_main_img = $('.fabric_main_image').attr('src');

            $jacket_main_img1 = $jacket_main_img.split('_');

            $jacket_main_img2 = $jacket_main_img.replace($jacket_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$jacket_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + r + ']').val($fabric_id);

            //g.price_detail['fabric_woman_jacket'] = $fabric_price;
            $('input.f_woman_jacket').val($fabric_price);

            //g.price_detail['fabric_woman_skirt'] = $fabric_price1;
            $('input.f_woman_skirt').val($fabric_price1);
            
            /*g.price_detail['fabric_woman_pants'] = $fabric_price2;
            $('input.f_woman_pants').val($fabric_price2);*/
            
            g.current.fabric[r] = $fabric_id;

            if($fabric_id =='567') {
              g.price_detail['fabric_woman_jacket'] = $fabric_price;
              g.price_detail['fabric_woman_skirt'] = $fabric_price1;
              g.current.fabric[r] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_woman_jacket'] = $fabric_price;
             g.price_detail['fabric_woman_skirt'] = $fabric_price1;
             g.current.fabric[r] = '567';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/
            

          }


        }

        if(r1 == 'woman_jacket2') {

            $(".fabric_thumb.woman_jacket").removeClass("current").filter(".woman_jacket.fabric_" + $fabric_id).addClass("current");

            $jacket_main_img = $('.fabric_main_image').attr('src');

            $jacket_main_img1 = $jacket_main_img.split('_');

            $jacket_main_img2 = $jacket_main_img.replace($jacket_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$jacket_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + r + ']').val($fabric_id);

            $('input.f_woman_jacket').val($fabric_price);

            $('input.f_woman_pants').val($fabric_price3);

            if($fabric_id =='264') {
              g.price_detail['fabric_woman_jacket'] = $fabric_price;
              g.price_detail['fabric_woman_pants'] = $fabric_price3;
              g.current.fabric[r] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_woman_jacket'] = $fabric_price;
             g.price_detail['fabric_woman_pants'] = $fabric_price3;
             g.current.fabric[r] = '264';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

            
            
            /*g.price_detail['fabric_woman_pants'] = $fabric_price2;
            $('input.f_woman_pants').val($fabric_price2);*/
            
            //g.updatePrice();

        //g.current.fabric[r] = $fabric_id;

        }

        if(r == 'woman_skirt') {

            
            $(".fabric_thumb.woman_skirt").removeClass("current").filter(".woman_skirt.fabric_" + $fabric_id).addClass("current");
            $skirt_main_img = $('.fabric_main_image').attr('src');

            $skirt_main_img1 = $skirt_main_img.split('_');

            $skirt_main_img2 = $skirt_main_img.replace($skirt_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$skirt_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + r + ']').val($fabric_id);

            //g.price_detail['fabric_woman_skirt'] = $fabric_price;
            $('input.f_woman_skirt').val($fabric_price);
             $('input.f_woman_jacket').val($fabric_price4);
            //g.updatePrice();
            //g.current.fabric[r] = $fabric_id;

            if($fabric_id =='567') {
              g.price_detail['fabric_woman_skirt'] = $fabric_price;
              g.price_detail['fabric_woman_jacket'] = $fabric_price4;
              g.current.fabric[r] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');

           }
           else {
             g.price_detail['fabric_woman_skirt'] = $fabric_price;
             g.price_detail['fabric_woman_jacket'] = $fabric_price4;
             g.current.fabric[r] = '567';
            
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }
      }
  }

   else {
            var r = $(this).parents('.fabric_block').attr('data-block-name1');

            var r1 = $(this).parents('.fabric_block').attr('data-block-name1');

            var r2= $(this).parents('.fabric_block').attr('data-block-name2');


             $fabric_price = $(this).nextAll('.price_total').text();

             if($fabric_price=='') 
            {
                $fabric_price = 0;
            }
            else {

                $fabric_price = parseFloat($fabric_price);
            }

            if(o == 'woman_coat') {

                $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            $coat_main_img = $('.fabric_main_image').attr('src');

            $coat_main_img1 = $coat_main_img.split('_');

            $coat_main_img2 = $coat_main_img.replace($coat_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$coat_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            
            $('input.f_'+o).val($fabric_price);
            

            if($fabric_id =='443') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '443';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }
      }

        if(o == 'woman_skirt') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            

            $skirt_main_img = $('.fabric_main_image').attr('src');

            $skirt_main_img1 = $skirt_main_img.split('_');

            $skirt_main_img2 = $skirt_main_img.replace($skirt_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$skirt_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_woman_skirt'] = $fabric_price;
            $('input.f_woman_skirt').val($fabric_price);
            //g.updatePrice();

            if($fabric_id =='172') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if($fabric_id =='567') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if(r!=undefined) {
             g.price_detail['fabric_woman_skirt'] = $fabric_price;
             g.current.fabric[o] = '567';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }        
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '172';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }

         if(o == 'woman_pants') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            $pants_main_img = $('.fabric_main_image').attr('src');

            $pants_main_img1 = $pants_main_img.split('_');

            $pants_main_img2 = $pants_main_img.replace($pants_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$pants_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_'+o] = $fabric_price;
            $('input.f_'+o).val($fabric_price);
            //g.updatePrice();

            if($fabric_id =='922') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if($fabric_id=='264') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
              
           }
           else if(r!=undefined) {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '264';
             
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/
           }
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '922';
            
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }

        if(o == 'woman_blouse') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            

            $blouse_main_img = $('.fabric_main_image').attr('src');

            $blouse_main_img1 = $blouse_main_img.split('_');

            $blouse_main_img2 = $blouse_main_img.replace($blouse_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$blouse_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_'+o] = $fabric_price;
            $('input.f_'+o).val($fabric_price);
            //g.updatePrice();

             if($fabric_id =='792') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '792';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }

        if(o == 'woman_shirt') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            

            $shirt_main_img = $('.fabric_main_image').attr('src');

            $shirt_main_img1 = $shirt_main_img.split('_');

            $shirt_main_img2 = $shirt_main_img.replace($shirt_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$shirt_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_'+o] = $fabric_price;
            $('input.f_'+o).val($fabric_price);
            //g.updatePrice();

            if($fabric_id =='370') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '370';
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }


        if(o == 'woman_jacket') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            $jacket_main_img = $('.fabric_main_image').attr('src');

            $jacket_main_img1 = $jacket_main_img.split('_');

            $jacket_main_img2 = $jacket_main_img.replace($jacket_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$jacket_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_woman_jacket'] = $fabric_price;
            $('input.f_woman_jacket').val($fabric_price);
            //g.updatePrice();

            if($fabric_id =='828') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if($fabric_id =='264') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if($fabric_id =='567') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = $fabric_id;
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }
           else if(r!=undefined && r2=='woman_jacket1') {
              g.price_detail['fabric_'+o] = $fabric_price;
              g.current.fabric[o] = '567';
              
              /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/
           }
           else if(r!=undefined && r2=='woman_jacket2') {
            g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '264';
             
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/
           }
           else {
             g.price_detail['fabric_'+o] = $fabric_price;
             g.current.fabric[o] = '828';
            
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }
        }

        if(r=='woman_jacket1') {

            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            $jacket_main_img = $('.fabric_main_image').attr('src');

            $jacket_main_img1 = $jacket_main_img.split('_');

            $jacket_main_img2 = $jacket_main_img.replace($jacket_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$jacket_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_woman_jacket'] = $fabric_price;
            //g.price_detail['fabric_woman_skirt'] = 0;
            $('input.f_woman_jacket').val($fabric_price);
            $('input.f_woman_skirt').val(0);
            //g.updatePrice();

            if($fabric_id =='567') {
              g.price_detail['fabric_woman_jacket'] = $fabric_price;
              g.price_detail['fabric_woman_skirt'] = 0;
              g.current.fabric[o] = $fabric_id;
              
              $('div.render1').css('display','none');
              $('div.render').css('display','block'); 
           }
           else {
             g.price_detail['fabric_woman_jacket'] = $fabric_price;
             g.price_detail['fabric_woman_skirt'] = 0;
             g.current.fabric[o] = '567';
             
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }

        if(r=='woman_jacket2') {


            $(".fabric_thumb").removeClass("current").filter(".fabric_" + $fabric_id).addClass("current");

            $jacket_main_img = $('.fabric_main_image').attr('src');

            $jacket_main_img1 = $jacket_main_img.split('_');

            $jacket_main_img2 = $jacket_main_img.replace($jacket_main_img1[0], 'http://otkootoor.com/assets/dimg/fabric/' + $fabric_id);

            $('.fabric_main_image').attr('src',$jacket_main_img2);

            $('.fabric_main_title').text($title);

            $('.fabric_main_composition').text($composition);

            $('input[name=' + o + ']').val($fabric_id);
            //g.price_detail['fabric_woman_jacket'] = $fabric_price;
            //g.price_detail['fabric_woman_pants'] = 0;
            $('input.f_woman_jacket').val($fabric_price);
            $('input.f_woman_pants').val(0);
            //g.updatePrice();

            if($fabric_id =='264') {
              g.price_detail['fabric_woman_jacket'] = $fabric_price;
              g.price_detail['fabric_woman_pants'] = 0;
              g.current.fabric[o] = $fabric_id;
             
              $('div.render1').css('display','none');
              $('div.render').css('display','block');
           }

           else {
             g.price_detail['fabric_woman_jacket'] = $fabric_price;
             g.price_detail['fabric_woman_pants'] = 0;
             g.current.fabric[o] = '264';
            
             /*$('div.render1').css('display','block');  
             $('div.render1').html("<img src=" + $fab_prod_img + ">");
             $('div.render').css('display','none');*/

          }

        }

        

            //g.current.fabric[o] = $fabric_id;
            
        }

         g.renderDraw();
             g.updatePrice();

    });

};

Garment.prototype.fabricMultiChange = function(a) {

    if (a) {

        $("div.garment_block_fabric", this._container).addClass("multi_enabled")

    } else {

        for (var c in this.fabric) {

            break

        }

        var b = $("input.fabric_input", this.container).filter('[name="fabric[' + c + ']"]').val();

        this.fabricSelect(c, b);

        $("div.garment_block_fabric", this._container).removeClass("multi_enabled")

    }

};

Garment.prototype.fabricGetInfo = function(f, e, a) {

    var c;

    var b = e.split("_");

    if (typeof(this._fabrics[f]) == "undefined") {

        var d = this;

        $.getJSON("", "action=fabric_info&id=" + f + "&gender=" + b[0], function(g) {

            d._fabrics[f] = g;

            if (a) {

                a.apply(d, [d._fabrics[f], f])

            }

        });

        return "callback"

    }

    return this._fabrics[f]

};

Garment.prototype.fabricsUpdateDisabled = function() {

    var b = $(".fabric_block_selector", this.container);

    var a = $(".fabric_block_selector_enable", this.container);

    var c = $(".selector", b).show();

    for (var d in this.fabrics_disabled) {

        c.filter("." + d).hide()

    }

    if (Object.size(this.fabric) - this.fabrics_disabled.length > 1) {

        if (this.multiple_fabric_enabled) {

            b.show()

        }

        a.show()

    } else {

        b.hide();

        a.hide()

    }

    var e = this;

    $("input.fabric_input", this.container).each(function() {

        if (this.value) {

            e.fabricSelect(this.getAttribute("data-block-name"), this.value)

        }

    });

    $(".fabric_list", this.container).removeClass("loaded");

    if (this.step == "fabric") {

        this.fabricsLoad()

    }

};

Garment.prototype.extraChangeBlock = function(c) {

    var b = $("div.extra_block_selector", this.container);

    var a = $("a.selector", b).removeClass("current").filter("." + c).addClass("current");

    var d = $("div.extra_block", this.container).hide();

    d.filter(".extra_block_" + c).show();

    this.trigger("extraChangeBlock", [c, this._fabric_block_obj])

};

Garment.prototype.extraActivate = function(b, a) {

    if (!a) {

        a = $("div.extra_container", this.container).filter("." + b)

    }

    if (a.hasClass("active")) {

        return

    }

    var c = this;

    a.find(".extra_content").slideDown(function() {

        c.trigger("activateExtraFinish", [b])

    });

    a.addClass("active");

    this.renderSetActiveExtra(b);

    $("input[data-price!=0]:eq(0)", a).prop("checked", true).change();

    this.trigger("activateExtra", [b])

};

Garment.prototype.extraSetPrice = function(c, b, a) {


    if (!a) {

        a = $("div.extra_container", this.container).filter("." + c)

    }

    if (b) {

        a.addClass("tick");

    } else {

        a.removeClass("tick")

    }

    $(".title_price", a).text(format_price(b));
    $(".title_price1", a).val(format_price(b));
    //$(".title_price2", a).val(format_price(b));

    this.price_detail[c] = b;

    this.updatePrice()

};

Garment.prototype.extraDiscard = function(b, a) {

    if (!a) {

        a = $("div.extra_container", this.container).filter("." + b)

    }

    var c = this;

    a.removeClass("active tick");

    a.find(".extra_content").slideUp(function() {

        c.trigger("discardExtraFinish", [b])

    });

    this.price_detail[b] = 0;

    //this.price_detail=0;

    this.updatePrice();

    this.current.extras[b] = [];

    this.renderSetActiveExtra(false);

    this.trigger("discardExtra", [b, a])

};

Garment.prototype.updatePrice = function() {

    var c = 0;

    console.log(this.price_detail);

    for (var b in this.price_detail) {

        c += parseFloat(this.price_detail[b]);
    }

    c = parseFloat(Math.round(c * 100) / 100);


    var a = format_price(c, "small_symbol");

    $("span.garment_price", this.container).html("$"+c);
    $("input[name=garment_price]", this.container).val(c)
    /*$.ajax({
      type:"POST",
      url: "http://otkootoor.com/includes/action/price_update.php",
      data: {garment_price: c}
    });*/

};

Garment.prototype.initExtraInitials = function(a, i) {

    var e = $(".initials_preview", i);

    var h = this;

    var g = $("input.initials_price", i).val() * 1;

    $initial_text = $('input.title_price1').val();

    $initial_text1 = $('input.title_price2').val();

    $initial_text2 = $('input.title_price3').val();

    $initial_text3 = $('input.title_price4').val();

    if($initial_text!='' && $initial_text!=undefined) {
        h.price_detail['coat_initials'] = $initial_text;
        h.updatePrice();   
    }

    else if($initial_text1!='' && $initial_text1!=undefined) {
        h.price_detail['jacket_initials'] = $initial_text1;
        h.updatePrice();   
    }

    else if($initial_text2!='' && $initial_text2!=undefined) {
        h.price_detail['blouse_initials'] = $initial_text2;
        h.updatePrice();   
    }

    else if($initial_text3!='' && $initial_text3!=undefined) {
        h.price_detail['shirt_initials'] = $initial_text3;
        h.updatePrice();   
    }


    if (this.mobile_enabled) {

        $(".extra_title", i).append($(".extra_price", i));

        $(".extra_field_initials_text .box_opt_fix", i).append($(".discard", i).html("r"));

        $(".mobile_layer", i).addClass("manual_close");

        if (window.t4l_inputs_enabled) {

            b()

        } else {

            ready_callbacks.push(b)

        }

        $("a.discard", i).click(function() {

            d.val("").keyup();

            f();

            History.back()

        });

        $("a.close", i).click(function() {

            History.back()

        });

        var l = $("a.select", i).click(function() {

            f();

            History.pushState({

                step: "extra"

            }, window.title, "?step=extra")

        });

        var d = $("input.initials_text", i).keypress(isValidCharacterInitials).bind("paste", function(m) {

            return false

        }).keyup(function() {

            if (this.value) {

                l.show().parent().addClass("two_options")

            } else {

                l.hide().parent().removeClass("two_options")

            }

        }).keyup()

    }



    function b() {

        var m = ["font", "position", "color"];

        for (var n = 0; n < m.length; n++) {

            if (!$("input." + m[n] + ":checked", i).length) {

                $("input." + m[n] + ":eq(0)", i).prop("checked", 1).change()

            }

        }

    }



    function f() {

        var o = {

            text: j.val(),

            font: $("input.font:checked", i).val(),

            position: $("input.position:checked", i).val(),

            color: $("input.color:checked", i).attr("data-color")

        };

        e.html(JSON.stringify(o));

        var n = true;

        for (var m in o) {

            if (!o[m] && m != "position") {

                n = false;

                break

            }

        }

        if (n) {

            h.extraSetPrice(a, g, $(i))

        }

        h.current.extras[a] = o;
        h.current._show_lining= 0;

        h.renderDraw()

    }

    this.bind("discardExtra", function(m) {

        if (m == a) {
            $("input.text", i).val("");
            $(".t4l_radio",i).removeClass('checked checked1');
        }

    });

    var c = null;

    var j = $("input.text", i).keypress(function() {

        if (c) {

            clearTimeout(c)

        }

        c = setTimeout(f, 400)

    });

    $("input[type=radio]", i).change(f)

};



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

    /*var a = /[a-zA-Z0-9.\s /<>,;:"'`!@#%^&*(){}\-_+=|-~Â¬ÂºÂªÂ¡\[\]^`Â´Ã§Â¨Â·]/g;*/

    var a = /[a-zA-Z0-9.\s /<>,;:`!@#%^&*(){}\-_+=|-~Â¬ÂºÂªÂ¡\[\]^`Â´Ã§Â¨Â·]/g;



    return c.match(a) ? true : false

}

Garment.prototype.initExtraLining = function(a, f) {



    var e = this;

    var b = false;

    var g = false;

    var i = $("div.lining_slider", f);

    var d = $("div.lining_slider_contents", i);

    var h = $("div.lining_filters", f);





    var c = function() {

        if (e.mobile_enabled) {

            b = true;

            var l = {

                action: "lining_filter",

                extra_name: a

            };

            $("input, select", h).each(function() {

                l[this.name] = this.value

            });

            if (e.mobile_enabled) {

                e.mobile_layer_extra_fabrics.html("").load(window.location.href, l, function() {

                    var n = parseInt($("input.idExtra", f).val());

                    if (n) {

                        $(".fabric_thumb", this).filter(".lining_" + n).addClass("current")

                    }

                    if (e.bLazy) {

                        e.bLazy.revalidate()

                    }

                    $("a", e.mobile_layer_extra_fabrics).click(function(o) {

                        o.preventDefault();

                        e.fabricSelectExtra(a, this.getAttribute("data-id"));

                        e.liningSelect(a, this.getAttribute("data-id"));

                        History.pushState({

                            step: "extra"

                        }, window.title, "?step=extra");

                        return false

                    });

                    e.loading_layer.hide()

                })

            }

        } else {

            b = true;

            var l = {

                action: "lining_filter",

                extra_name: a

            };

            $("input, select", h).each(function() {

                l[this.name] = this.value

            });

            var m = 0;

            d.addClass("loading").load(window.location.href, l, function() {

                if (!m) {

                    m = $(".col:eq(0)", this).outerWidth(true)

                }

                if (g) {

                    var o = $(".col", this).length;

                    $(".mCSB_container", i).css("width", (m * o) + "px");

                    i.mCustomScrollbar("update")

                } else {

                    var q = {

                        horizontalScroll: true,

                        scrollButtons: {

                            enable: false

                        },

                        callbacks: {}

                    };

                    if (e.bLazy) {

                        q.callbacks.whileScrolling = e.bLazy.revalidate

                    }

                    i.mCustomScrollbar(q);

                    g = true

                }

                var n = parseInt($("input.id", f).val());

                if (n) {

                    $(".lining_thumb", f).filter(".lining_" + n).addClass("current")

                }

                if (e.bLazy) {

                    e.bLazy.revalidate()

                }

                var p = $("div.lining_thumb", d).length;

                if (p <= 8) {

                    d.closest(".extra_content").find("a.slider_move").hide()

                } else {

                    d.closest(".extra_content").find("a.slider_move").show()

                }

                $(this).removeClass("loading")

            });

            /*d.magnificPopup({

                delegate: "a",

                type: "ajax",

                gallery: {

                    enabled: true

                },

                closeBtnInside: true,

                mainClass: "magn_popup_lining",

                closeMarkup: '<button class="mfp-close"></button>',

                callbacks: {

                    ajaxContentAdded: function() {

                        $("a.btn-success", this.content).click(function() {

                            e.liningSelect(this.getAttribute("data-extra-name"), this.getAttribute("data-lining-id"));

                            $.magnificPopup.close()

                        });

                        $(this.content).css("max-height", ($(window).height() - 40) + "px")

                    },

                    buildControls: function() {

                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight))

                    }

                }

            })*/

            e.liningSelect();



        }

    };

    if (!this.is_mobile) {

        i.parent().append('<a href="javascript:;" class="slider_move left" rel="left">l</a><a href="avascript:;" class="slider_move right" rel="right">k</a>').on("click", "a.slider_move", function() {

            var n = this.getAttribute("rel");

            var l = i.find(".mCSB_container").offset().left * -1 + 36;

            var m = l;

            switch (n) {

                case "right":

                    m += 596;

                    break;

                case "left":

                    m -= 596;

                    break

            }

            i.mCustomScrollbar("scrollTo", m);

            return false

        })

    }

    if (this.mobile_enabled) {

        $("label", f).click(function(o) {

            var l = $("input", this);

            var n = parseFloat(l.attr("data-price"));

            var m = l.attr("data-field-name");

            e.current.extras[a][m] = l.val();

            if (n) {

                History.pushState({

                    step: "extra",

                    option: a,

                    fabrics: 1

                }, window.title, "?step=extra&option=" + a + "&fabrics=1");

                e.loading_layer.show();

                c()

            } else {

                $('input[name="jacket_lining[lining_id]"]').val("");

                e.extraSetPrice(a, 0, $(f));

                e.renderDraw();

                History.pushState({

                    step: "extra"

                }, window.title, "?step=extra")

            }

            o.stopPropagation()

        });

        $()

    }

    $(f).find("select").change(c);

    var j = parseFloat($("input.initial_price", f).val());

    if (j) {

        this.extraSetPrice(a, j, $(f))

    }

    this.bind("activateExtra", function(l) {

        if (!b && l == a) {

            c()

        }

    });

    this.bind("discardExtra", function(l) {

        if (l == a) {
            $("input.id", f).val("");

            $(".lining_thumb", f).removeClass("current");

        }

    })

};

Garment.prototype.liningSelect = function(c, e) {

    var d = this;



    $('a.extra_select').on('click',function(){

        $lining_name = $(this).parents('.lining_slider_contents').attr('data-name');

        $lining_price1 = $(this).parents('.extra_container_lining').attr('data-extra-name');

        $lining_id = $(this).attr('data-id');

        $(".lining_thumb").removeClass("current").filter(".lining_" + $lining_id).addClass("current");

        $lining_price = $(this).nextAll('.price').text();

        $lining_price = $lining_price.replace('$','');

        if($lining_price == null) {

            $lining_price = 0;

        }

        else {

            //$lining_price = $lining_price.replace(',','.');

            $lining_price = parseFloat($lining_price);

        }

        $('input.l_'+$lining_name).val($lining_price);


        //d.current._show_lining = 1;

        d.current.extras[$lining_name]["lining_id"] = $lining_id;

        $('.'+$lining_name).val($lining_id);

        d.price_detail[$lining_name] = $lining_price;

        d.renderDraw();

        d.updatePrice();

        d.current._show_lining = 0;

    });



    /*var a = $("div.extra_container", this.container).filter("." + c);

    var d = this;

    $(".lining_thumb", a).removeClass("current").filter(".lining_" + e).addClass("current");

    $("input.id", a).val(e).change();

    if (this.mobile_enabled) {

        var b = parseFloat($(".lining_" + e).find(".price").html().replace(",", ".").replace("$", "").replace("Â£", ""))

    } else {

        var b = parseFloat($(".lining_" + e, a).find(".price").html().replace(",", ".").replace("$", "").replace("Â£", ""))

    }

    this.extraSetPrice(c, b, a);

    d.current._show_lining = 1;

    d.current.extras[c]["lining_id"] = e;

    d.renderDraw();

    d.current._show_lining = 0*/

};

Garment.prototype.liningGetInfo = function(d, a) {

    var b;

    if (typeof(this._linings[d]) == "undefined") {

        var c = this;

        $.getJSON("", "action=lining_info&id=" + d, function(e) {

            c._linings[d] = e;

            if (a) {

                a.apply(c, [c._linings[d], d])

            }

        });

        return "callback"

    }

    return this._linings[d]

};

Garment.prototype.initExtraColors = function(g, c) {

    var h = this;

    var f = $(".extra_field", c);

    $(".mobile_layer", c).addClass("manual_close");

    $("input", c).change(function() {

        var l = parseFloat(this.getAttribute("data-price"));

        if (isNaN(l)) {

            l = 0

        }

        h.extraSetPrice(g, l, $(c));

        var j = this.getAttribute("data-field-name");

        if (typeof(h.extra[g][j]) != "undefined") {

            var i = (typeof(h.extra[g][j][this.value]) != "undefined") ? h.extra[g][j][this.value] : [];

            h.relationsApply(g, i)

        }

        h.current.extras[g][j] = this.value;

        h.renderDraw();

        return true

    });

    var a;



    function e() {
        a = {};

        f.each(function() {

            if (this.getAttribute("data-field-name") == "contrast" || this.getAttribute("data-field-name") == "type") {

                a[this.getAttribute("data-field-name")] = $("input:checked", this).val()

            } else {

                a[this.getAttribute("data-field-name")] = $("div.current", this).attr("data-id")

            }

        })

    }



    function d() {

        $("#" + g + "_opt label.checked", c).removeClass("checked");

        $("#" + g + "_opt input.checked", c).prop("checked", 0).change();

        $("#" + g + "_opt div.current", c).removeClass("current");

        f.each(function() {

            if (this.getAttribute("data-field-name") == "contrast" || this.getAttribute("data-field-name") == "type") {

                $("#" + g + "_opt input[value=" + a[this.getAttribute("data-field-name")] + "]").prop("checked", 1).change();

                $("#" + g + "_opt input[value=" + a[this.getAttribute("data-field-name")] + "]").parent().addClass("checked")

            } else {

                $("#" + g + "_opt div[data-id=" + a[this.getAttribute("data-field-name")] + "]").addClass("current")

            }

        })

    }

    $(c).on("click", ".fabric_thumb", function() {

        var i = $(this).closest(".extra_field");

        $(".fabric_thumb", i).not(this).removeClass("current");

        $(this).addClass("current");

        $("input", i).val(this.getAttribute("data-id"));

        if (h.mobile_enabled) {

            $(".extra_content .navigate").addClass("two_options")

        }

        return false

    });

    if (this.mobile_enabled) {

        $(".contrast label", c).click(function() {

            var i = parseFloat($("input", this).attr("data-price"));

            if (!i) {

                $(".extra_content .navigate").addClass("two_options")

            }

        });

        $(".extra_field_metal_button label").click(function() {

            $(".extra_content .navigate").addClass("two_options")

        });

        e();

        $("a.close", c).click(function() {

            $(".extra_content .navigate").removeClass("two_options");

            d();

            History.back()

        });

        var b = $("a.select", c).click(function() {

            e();

            $(".extra_content .navigate").removeClass("two_options");

            History.pushState({

                step: "extra"

            }, window.title, "?step=extra")

        })

    }

    this.bind("activateExtra", function(i) {

        if (i == g) {

            $("input:checked", c).change()

        }

    });

    this.bind("discardExtra", function(i) {

        if (i == g) {

            $(".fabric_thumb", c).removeClass("current");

            $("input[type=radio]:eq(0)", c).prop("checked", "1").change();

            $("input[type=hidden]", c).val("");

            $("label.metal_b", c).removeClass("checked").find("input").attr("checked", false)

        }

    })

};

Garment.prototype.initExtraFabrics = function(a, h) {

    var e = this;

    var b = false;

    var i = false;

    var f = $("div.fabric_slider", h);

    var d = $("div.fabric_slider_contents", f);

    var g = $("div.fabric_filters", h);

    var c = $(".contrast", h);

    if (this.mobile_enabled) {

        $("label", h).click(function(p) {

            var m = $("input", this);

            var o = parseFloat(m.attr("data-price"));

            var n = m.attr("data-field-name");

            e.current.extras[a][n] = m.val();

            if (o) {

                History.pushState({

                    step: "extra",

                    option: a,

                    fabrics: 1

                }, window.title, "?step=extra&option=" + a + "&fabrics=1");

                e.loading_layer.show();

                l()

            } else {

                e.extraSetPrice(a, 0, $(h));

                e.renderDraw();

                History.pushState({

                    step: "extra"

                }, window.title, "?step=extra")

            }

            p.stopPropagation()

        });

        $("input", h).change(function(p) {

            var m = $(this);

            var o = parseFloat(m.attr("data-price"));

            var n = m.attr("data-field-name");

            e.current.extras[a][n] = m.val();

            e.renderDraw()

        })

    } else {

        $("input", h).change(function() {

            var o = parseFloat(this.getAttribute("data-price"));

            if (!isNaN(o)) {

                e.extraSetPrice(a, o, $(h))

            }

            if (o && !b) {

                if (e.step == "extra") {

                    l()

                } else {

                    e.bind("stepSwitch", function(p) {

                        if (p == "extra" && !b) {

                            l()

                        }

                    })

                }

            }

            var n = this.getAttribute("data-field-name");

            if (typeof(e.extra[a][n]) != "undefined") {

                var m = (typeof(e.extra[a][n][this.value]) != "undefined") ? e.extra[a][n][this.value] : [];

                e.relationsApply(a, m)

            }

            e.current.extras[a][n] = this.value;

            e.renderDraw();

            return true

        })

    }

    var j = parseInt($("input.idExtra", h).val());

    if (j) {

        e.current.extras[a]["fabric_id"] = j

    }

    var l = function() {

        b = true;

        var m = {

            action: "fabric_filter",

            extra_name: a

        };

        $("input, select", g).each(function() {

            m[this.name] = this.value

        });

        if (e.mobile_enabled) {

            e.mobile_layer_extra_fabrics.html("").load(window.location.href, m, function() {

                var o = parseInt($("input.idExtra", h).val());

                if (o) {

                    $(".fabric_thumb", this).filter(".fabric_" + o).addClass("current")

                }

                if (e.bLazy) {

                    e.bLazy.revalidate()

                }

                $("a", e.mobile_layer_extra_fabrics).click(function() {

                    e.fabricSelectExtra(a, this.getAttribute("data-id"));

                    History.pushState({

                        step: "extra"

                    }, window.title, "?step=extra");

                    return false

                });

                e.loading_layer.hide()

            })

        } else {

            var n = 0;

            d.addClass("loading").load(window.location.href, m, function() {

                if (!n) {

                    n = $(".col:eq(0)", this).outerWidth(true)

                }

                if (i) {

                    var p = $(".col", this).length;

                    $(".mCSB_container", f).css("width", (n * p) + "px");

                    f.mCustomScrollbar("update")

                } else {

                    var r = {

                        horizontalScroll: true,

                        scrollButtons: {

                            enable: false

                        },

                        callbacks: {}

                    };

                    if (e.bLazy) {

                        r.callbacks.whileScrolling = e.bLazy.revalidate

                    }

                    f.mCustomScrollbar(r);

                    i = true

                }

                var o = parseInt($("input.idExtra", h).val());

                if (o) {

                    $(".fabric_thumb", h).filter(".fabric_" + o).addClass("current")

                }

                if (e.bLazy) {

                    e.bLazy.revalidate()

                }

                var q = $("div.fabric_thumb", d).length;

                if (q <= 8) {

                    d.closest(".extra_content").find("a.slider_move").hide()

                } else {

                    d.closest(".extra_content").find("a.slider_move").show()

                }

                $(this).removeClass("loading")

            });

            d.magnificPopup({

                delegate: "a",

                type: "ajax",

                gallery: {

                    enabled: true

                },

                mainClass: "magn_popup_lining",

                closeMarkup: '<button class="mfp-close"></button>',

                callbacks: {

                    ajaxContentAdded: function() {

                        $("a.btn-success", this.content).click(function() {

                            e.fabricSelectExtra(this.getAttribute("data-extra-name"), this.getAttribute("data-fabric-id"));

                            $.magnificPopup.close()

                        })

                    },

                    buildControls: function() {

                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight))

                    }

                }

            })

        }

    };

    if (!this.is_mobile) {

        f.parent().append('<a href="javascript:;" class="slider_move left" rel="left">l</a><a href="avascript:;" class="slider_move right" rel="right">k</a>').on("click", "a.slider_move", function() {

            var o = this.getAttribute("rel");

            var m = f.find(".mCSB_container").offset().left * -1 + 36;

            var n = m;

            switch (o) {

                case "right":

                    n += 596;

                    break;

                case "left":

                    n -= 596;

                    break

            }

            f.mCustomScrollbar("scrollTo", n);

            return false

        })

    }

    $(h).on("change", ".fabric_filters select", function() {

        l()

    });

    $(h).on("click", ".fabric_filters a, .fabric_filters input", function() {

        l()

    });

    this.bind("discardExtra", function(m) {

        if (m == a) {

            $("input.idExtra", h).val("");

            $(".fabric_thumb", h).removeClass("current");

            $("input[type=radio]:eq(0)", h).prop("checked", "1").change();

            $(".fabric_filters input[type=radio]:eq(0)", h).prop("checked", "1").change()

        }

    })

};

Garment.prototype.fabricSelectExtra = function(c, e) {

    var a = $("div.extra_container", this.container).filter("." + c);

    var d = this;

    $(".fabric_thumb", this.mobile_enabled ? this.mobile_layer_extra_fabrics : a).removeClass("current").filter(".fabric_" + e).addClass("current");

    $("input.idExtra", a).val(e).change();

    var b = parseFloat($(".option.checked input[type=radio]", a).data("price"));

    this.extraSetPrice(c, b, a);

    d.current.extras[c]["fabric_id"] = e;

    d.renderDraw()

};

Garment.prototype.fabricGetInfoExtra = function(d, a) {

    var b;

    if (typeof(this._fabrics[d]) == "undefined") {

        var c = this;

        $.getJSON("", "action=fabric_info&id=" + d, function(e) {

            c._fabrics[d] = e;

            if (a) {

                a.apply(c, [c._fabrics[d], d])

            }

        });

        return "callback"

    }

    return this._fabrics[d]

};

Garment.prototype.initExtraThreads = function(a, j) {

    var h = this;

    var e = $(".threads_preview", j);

    var c = $(".extra_field", j);

    var i = c.filter(".color");

    $("input", j).change(function() {

        if ($(this).hasClass("color")) {

            if (!h.mobile_enabled) {

                if (!h.price_detail[a]) {}

            }

        } else {

            var o = parseFloat(this.getAttribute("data-price"));

            if (!isNaN(o)) {

                h.extraSetPrice(a, o, $(j));

                if (o == 0) {

                    $("input.color:checked").prop("checked", false).parent().removeClass("checked")

                } else {}

            }

        }

        var n = this.getAttribute("data-field-name");

        if (typeof(h.extra[a][n]) != "undefined") {

            var m = (typeof(h.extra[a][n][this.value]) != "undefined") ? h.extra[a][n][this.value] : [];

            h.relationsApply(a, m)

        }

        h.current.extras[a][n] = this.value;

        if (h.mobile_enabled) {

            if (f()) {

                d.show().parent().addClass("two_options")

            } else {

                d.hide().parent().removeClass("two_options")

            }

        }

        h.renderDraw();

        return true

    });



    function f() {

        if (!h.price_detail[a]) {

            return true

        }

        return (i.find("input:checked").length == i.length)

    }

    var g;



    function l() {

        g = {};

        c.each(function() {

            g[this.getAttribute("data-field-name")] = $("input:checked", this).val()

        })

    }



    function b() {

        $("#" + a + "_opt input.checked", j).prop("checked", 0).change();

        c.each(function() {

            var m = this.getAttribute("data-field-name");

            $("#" + a + "_opt input[value=" + g[m] + "]").prop("checked", 1).change()

        })

    }

    if (this.mobile_enabled) {

        l();

        $(".mobile_layer", j).addClass("manual_close");

        var d = $("a.select", j).click(function() {

            l();

            History.pushState({

                step: "extra"

            }, window.title, "?step=extra")

        });

        $("a.close", j).click(function() {

            b();

            History.back()

        })

    }

    this.bind("discardExtra", function(m) {

        if (m == a) {

            $(".color input[type=radio]", j).prop("checked", false);


            $(".extra_field input[type=radio]", j).filter(":first").prop("checked", "1").change()

        }

    })

};