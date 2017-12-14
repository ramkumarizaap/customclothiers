<?php
//Coat Vustimizer JS

if($id==14){?>
    <script type="text/javascript">
        var garment_opt = {
            "product_type": "woman_coat",
            "price_detail": {
                "base": '<?php echo $price;?>',
                "fabric_woman_coat": 0
            },
            "current": {
                "config": {
                    "coat_style": $('input[name=coat_style]:checked').val(),
                    "coat_collar": $('input[name=coat_collar]:checked').val(),
                    "coat_lapel": $('input[name=coat_lapel]:checked').val(),
                    "coat_length": $('input[name=coat_length]:checked').val(),
                    "coat_fit": $('input[name=coat_fit]:checked').val(),
                    "coat_pockets_type": $('input[name=coat_pockets_type]:checked').val(),
                    "coat_belt": $('input[name=coat_belt]:checked').val(),
                    "coat_backcut": $('input[name=coat_backcut]:checked').val(),
                    "coat_sleeves": $('input[name=coat_sleeves]:checked').val(),
                    "coat_epaulettes": $('input[name=coat_epaulettes]:checked').val()
                },
                "fabric": {
                    "woman_coat": "<?php echo $_SESSION['fabID']; ?>"
                },
                "extras": []
            },
            "errors": [],
            "render_info": {
                "model": 1,
                "size": "390x674:0x0",
                "webview": {
                    "height": 1150,
                    "top": -40,
                    "updown": false
                },
                "mobileview": {
                    "height": 200,
                    "top": -37
                }
            },
            "config": {
                "coat_style": {
                    "simple": ["disable#config:woman_coat:coat_buttons"],
                    "crossed": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_collar:[standup,lady,void]"]
                },
                "coat_collar": {
                    "standup": ["disable#config:woman_coat:coat_lapel", "disable#extra:woman_coat:coat_neck"],
                    "classic": ["disable#config:woman_coat:coat_lapel", "disable#config:woman_coat:coat_buttons:[2,4]"],
                    "lady": ["disable#config:woman_coat:coat_lapel"],
                    "void": ["disable#config:woman_coat:coat_lapel", "disable#extra:woman_coat:coat_neck"],
                    "lapel_short": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_buttons:[2,12]"],
                    "lapel_long": ["disable#config:woman_coat:coat_fastening", "disable#config:woman_coat:coat_buttons:[8,12]"]
                },
                "coat_lapel": false,
                "coat_length": false,
                "coat_fit": false,
                "coat_fastening": {
                    "hide": ["disable#extra:woman_coat:coat_threads"],
                    "horn": ["disable#extra:woman_coat:coat_threads"]
                },
                "coat_buttons": false,
                "coat_pockets_type": false,
                "coat_belt": false,
                "coat_backcut": false,
                "coat_sleeves": false,
                "coat_epaulettes": false
            },
            "fabric": {
                "woman_coat": {
                    "fabric_type": "coat",
                    "price": {
                        "thickness": {
                            "thick": 12
                        }
                    }
                }
            },
            "extra": {
                "coat_lining": {
                    "extra_type": "lining"
                },
                "coat_initials": {
                    "extra_type": "initials"
                },
                "coat_neck": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_neck:[color]"]
                    }
                },
                "coat_patches": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_patches:[color]"],
                        "custom": ["required#extra:woman_coat:coat_patches:[color]"]
                    }
                },
                "coat_threads": {
                    "extra_type": "threads",
                    "contrast": {
                        "default": ["disable#extra:woman_coat:coat_threads:[threads]", "disable#extra:woman_coat:coat_threads:[holes]"],
                        "all": ["required#extra:woman_coat:coat_threads:[threads]", "required#extra:woman_coat:coat_threads:[holes]"]
                    }
                }
            },
            "garment_id": 5427
        };


        ready_callbacks.push(function() {
            var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
            $g.initGarment();
            window.t4l_inputs_enabled = true;
            var current = $g.getCurrentLayers();
            current['render_info'] = $g.render_info;
            current['view'] = 'front';
            if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                $g.getLayers = function() {
                    return {
                        'coat_model': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '/3d/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '/3d/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '/3d/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                    };
                }
                $g.renderGetImages = function() {
                    images = [];
                    var config = current['config'];
                    var fabric = current['fabric']['woman_coat'];
                    var extras = (empty(current['extras'])) ? [] : current['extras'];
                    var model = 1;
                    if (!empty(current['model'])) {
                        var model = current['model'];
                    }
                    var coat_body_cut = '0';
                    if (current['view'] == 'front') {
                        show_lining = false;
                        if (!empty(current['_show_lining']) && !empty(extras['coat_lining']['lining_id'])) {
                            show_lining = true;
                            id_t4l_lining = extras['coat_lining']['lining_id'];
                        }
                        array_push(images, {
                            'layer': 'coat_model',
                            'src': 'model_front.png',
                            'zIndex': 10000
                        });
                        array_push(images, {
                            'layer': 'coat_pants',
                            'src': 'pants_front.png',
                            'zIndex': 10001
                        });
                        var collar_lapel = "";
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'void') collar_lapel = "+collar_" + config['coat_collar'];
                        array_push(images, {
                            'layer': 'coat_shirt',
                            'src': 'shirt_front' + collar_lapel + '.png',
                            'zIndex': 10002
                        });
                        var coat_lapel = '';
                        if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                            coat_lapel = '+lapel_' + config['coat_lapel'];
                        }
                        var coat_buttons = '';
                        var coat_fastening = '';
                        if (!empty(config['coat_style']) && config['coat_style'] == 'crossed') {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short') {
                                if (!empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                } else {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic' && !empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                if (!empty(config['coat_buttons']) && config['coat_buttons'] == '8') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '';
                                }
                            }
                        } else {
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] != 'standard') {
                                if ((!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) && (config['coat_fastening'] == 'hide' || config['coat_fastening'] == 'horn')) {
                                    coat_fastening = '+fastening_standard';
                                } else {
                                    coat_fastening = '+fastening_' + config['coat_fastening'];
                                }
                            } else {
                                coat_fastening = '+fastening_standard';
                            }
                        }
                        var coat_fit = '+fit_' + config['coat_fit'];
                        if ((!empty(config['coat_fit']) && config['coat_fit'] == 'straight') && (!empty(config['coat_belt']) && config['coat_belt'] == 'loose')) {
                            coat_fit = '+fit_waisted';
                        }
                        var neck_img = 'neck+style_' + config['coat_style'] + '+collar_' + config['coat_collar'] + coat_lapel + coat_buttons + coat_fit + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_neck',
                            'src': neck_img + '.png',
                            'zIndex': 11004
                        });
                        if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] != '0') {
                            var epaulettes_img = 'epaulettes_' + config['coat_epaulettes'];
                            array_push(images, {
                                'layer': 'coat_epaulettes',
                                'src': epaulettes_img + '.png',
                                'zIndex': 11005
                            });
                        }
                        var collar_lapel = "";
                        var coat_fastening = '';
                        var coat_buttons = '';
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                            collar_lapel = "+collar_" + config['coat_collar'];
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple') {
                            if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                                coat_fastening = '+fastening_standard';
                            } else {
                                coat_fastening = '+fastening_' + config['coat_fastening'];
                            }
                        } else {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' && !empty(config['coat_buttons'])) {
                                collar_lapel = "+collar_" + config['coat_collar'];
                                if (config['coat_buttons'] == '2' || config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic') {
                                collar_lapel = "+collar_lapel_short";
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '8' || config['coat_buttons'] == '12')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '4') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else {
                                coat_buttons = '+buttons_4';
                            }
                        }
                        var body_img = 'style_' + config['coat_style'] + collar_lapel + coat_buttons + '+length_' + config['coat_length'] + '+fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_body',
                            'src': body_img + '.png',
                            'zIndex': 11006
                        });
                        if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'wide') {
                            var parche_img = 'parche+sleeves_wide';
                            array_push(images, {
                                'layer': 'coat_parche',
                                'src': parche_img + '.png',
                                'zIndex': 11007
                            });
                        }
                        if (!empty(config['coat_pockets_type'])) {
                            var coat_fit = '';
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] != 'patched' || (config['coat_pockets_type'] == 'diagonal' && coat_body_cut == '1')) {
                                coat_fit = "+fit_" + config['coat_fit'];
                            }
                            var body_cut = '';
                            if (!empty(config['coat_fit']) && (config['coat_fit'] == 'straight' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'flap' || config['coat_pockets_type'] == 'double_welt' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button'))) {
                                body_cut = '+body_cut_' + coat_body_cut;
                                if ((config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && (config['coat_fit'] == 'straight' && coat_body_cut == '0')) {
                                    body_cut = '';
                                    coat_fit = '';
                                }
                            } else if (!empty(config['coat_fit']) && config['coat_fit'] == 'waisted' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button')) {
                                coat_fit = '';
                            }
                            var coat_sleeves = '';
                            if (!empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && !empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'wide')) {
                                coat_sleeves = '+sleeves_' + config['coat_sleeves'];
                            }
                            var pockets_img = 'pockets_' + config['coat_pockets_type'] + coat_fit + body_cut + coat_sleeves;
                            array_push(images, {
                                'layer': 'coat_pockets',
                                'src': pockets_img + '.png',
                                'zIndex': 11008
                            });
                        }
                        if (!empty(config['coat_belt']) && (config['coat_belt'] != '0' && config['coat_belt'] != 'sewed')) {
                            if (!empty(config['coat_fit'])) coat_fit = "+fit_" + config['coat_fit'];
                            var belt_img = 'belt_' + config['coat_belt'] + coat_fit;
                            array_push(images, {
                                'layer': 'coat_belt',
                                'src': belt_img + '.png',
                                'zIndex': 50000
                            });
                        }
                        array_push(images, {
                            'layer': 'coat_hand',
                            'src': 'mano_left.png',
                            'zIndex': 11010
                        });
                        var sleeve_img = 'sleeves_' + config['coat_sleeves'];
                        array_push(images, {
                            'layer': 'coat_sleeve',
                            'src': sleeve_img + '.png',
                            'zIndex': 11011
                        });
                        if (!empty(current['fabric']['_button_code'])) {
                            if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] == '1') {
                                if (!empty(epaulettes_img)) array_push(images, {
                                    'layer': 'coat_buttons_epaulettes',
                                    'src': current['fabric']['_button_code'] + '_' + epaulettes_img + '.png',
                                    'zIndex': 43005
                                });
                            }
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long' || !empty(config['coat_style']) && config['coat_style'] == 'crossed')) {
                                if (!empty(neck_img)) array_push(images, {
                                    'layer': 'coat_buttons_neck',
                                    'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                    'zIndex': 43006
                                });
                                if (!empty(body_img)) array_push(images, {
                                    'layer': 'coat_buttons_body',
                                    'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                    'zIndex': 43007
                                });
                            }
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                if (!empty(pockets_img)) array_push(images, {
                                    'layer': 'coat_buttons_pockets',
                                    'src': current['fabric']['_button_code'] + '_' + pockets_img + '.png',
                                    'zIndex': 43008
                                });
                            }
                            if (!empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'tape' || config['coat_sleeves'] == 'buttons')) {
                                if (!empty(sleeve_img)) array_push(images, {
                                    'layer': 'coat_buttons_sleeve',
                                    'src': current['fabric']['_button_code'] + '_' + sleeve_img + '.png',
                                    'zIndex': 43009
                                });
                            }
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple' && !empty(config['coat_fastening']) && config['coat_fastening'] == 'horn' && !empty(current['fabric']['_ribbon_color'])) {
                            if (!empty(config['coat_collar']) && config['coat_collar'] != 'lapel_short' && !empty(config['coat_collar']) && config['coat_collar'] != 'lapel_long') {
                                if (neck_img) array_push(images, {
                                    'layer': 'coat_ribbons_neck',
                                    'src': current['fabric']['_ribbon_color'] + '_' + neck_img + '.png',
                                    'zIndex': 43005
                                });
                                if (body_img) array_push(images, {
                                    'layer': 'coat_ribbons_body',
                                    'src': current['fabric']['_ribbon_color'] + '_' + body_img + '.png',
                                    'zIndex': 43006
                                });
                            }
                        }
                        if (show_lining) {
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'fondo.png',
                                'zIndex': 43106
                            });
                            array_push(images, {
                                'layer': 'coat_body',
                                'src': 'abrigo.png',
                                'zIndex': 43107
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': id_t4l_lining + '_coat_lining.png',
                                'zIndex': 43108
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'camisa.png',
                                'zIndex': 43109
                            });
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['threads-color'])) {
                                var threads = extras['coat_threads']['threads-color'];
                            }
                            if (!empty(extras['coat_threads']['threads'])) {
                                var threads = extras['coat_threads']['threads']['color'];
                            }
                            if (threads) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_threads_extra_neck',
                                        'src': threads + '_thread_' + neck_img + '.png',
                                        'zIndex': 43011
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')) || (config['coat_collar'] == 'lapel_long' && config['coat_buttons'] == '2'))) {} else {
                                        if ((!empty(config['coat_collar']) && config['coat_collar'] != 'simple') || (!empty(config['coat_collar']) && config['coat_collar'] != 'crossed')) {
                                            if (body_img) array_push(images, {
                                                'layer': 'coat_threads_extra_body',
                                                'src': threads + '_thread_' + body_img + '.png',
                                                'zIndex': 43012
                                            });
                                        }
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_threads_extra_pockets',
                                        'src': threads + '_thread_' + pockets_img + '.png',
                                        'zIndex': 43013
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_threads_extra_sleeve',
                                        'src': threads + '_thread_' + sleeve_img + '.png',
                                        'zIndex': 43014
                                    });
                                }
                            }
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['holes-color'])) {
                                var holes = extras['coat_threads']['holes-color'];
                            }
                            if (!empty(extras['coat_threads']['holes'])) {
                                var holes = extras['coat_threads']['holes']['color'];
                            }
                            if (holes) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_holes_extra_neck',
                                        'src': holes + '_hole_' + neck_img + '.png',
                                        'zIndex': 43001
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')))) {} else {
                                        if (body_img) array_push(images, {
                                            'layer': 'coat_holes_extra_body',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43002
                                        });
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_holes_extra_pockets',
                                        'src': holes + '_hole_' + pockets_img + '.png',
                                        'zIndex': 43003
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_holes_extra_sleeve',
                                        'src': holes + '_hole_' + sleeve_img + '.png',
                                        'zIndex': 43004
                                    });
                                }
                            }
                        }
                    } else {
                        if (!empty(config['coat_backcut']) && config['coat_backcut'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_backcut',
                                'src': 'fit_' + config['coat_fit'] + '+backcut_' + config['coat_backcut'] + '.png',
                                'zIndex': 10003
                            });
                        }
                        if (coat_body_cut == '1') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + '.png',
                                'zIndex': 10002
                            });
                        }
                        if (!empty(config['coat_belt']) && config['coat_belt'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+belt_' + config['coat_belt'] + '.png',
                                'zIndex': 10001
                            });
                        }
                        if (!empty(config['coat_fit']) && config['coat_fit']) {
                            array_push(images, {
                                'layer': 'coat_back_body',
                                'src': 'fit_' + config['coat_fit'] + '.png',
                                'zIndex': 10000
                            });
                        }
                    }
                    return this.parseImages(images, current);
                }
            } else {
                $g.getLayers = function() {
                    return {
                        'coat_model': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '/3d/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '/3d/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '/3d/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '/3d/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '/3d/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '/3d/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '/3d/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '/3d/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                    };
                }
                $g.renderGetImages = function() {
                    images = [];
                    var config = current['config'];
                    var fabric = current['fabric']['woman_coat'];
                    var extras = (empty(current['extras'])) ? [] : current['extras'];
                    var model = 1;
                    if (!empty(current['model'])) {
                        var model = current['model'];
                    }
                    var coat_body_cut = '0';
                    if (current['view'] == 'front') {
                        show_lining = false;
                        if (!empty(current['_show_lining']) && !empty(extras['coat_lining']['lining_id'])) {
                            show_lining = true;
                            id_t4l_lining = extras['coat_lining']['lining_id'];
                        }
                        array_push(images, {
                            'layer': 'coat_model',
                            'src': 'model_front.png',
                            'zIndex': 10000
                        });
                        array_push(images, {
                            'layer': 'coat_pants',
                            'src': 'pants_front.png',
                            'zIndex': 10001
                        });
                        var collar_lapel = "";
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'void') collar_lapel = "+collar_" + config['coat_collar'];
                        array_push(images, {
                            'layer': 'coat_shirt',
                            'src': 'shirt_front' + collar_lapel + '.png',
                            'zIndex': 10002
                        });
                        var coat_lapel = '';
                        if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                            coat_lapel = '+lapel_' + config['coat_lapel'];
                        }
                        var coat_buttons = '';
                        var coat_fastening = '';
                        if (!empty(config['coat_style']) && config['coat_style'] == 'crossed') {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short') {
                                if (!empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                } else {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic' && !empty(config['coat_fit']) && config['coat_fit'] == 'straight' && coat_body_cut == '1') {
                                if (!empty(config['coat_buttons']) && config['coat_buttons'] == '8') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '';
                                }
                            }
                        } else {
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] != 'standard') {
                                if ((!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) && (config['coat_fastening'] == 'hide' || config['coat_fastening'] == 'horn')) {
                                    coat_fastening = '+fastening_standard';
                                } else {
                                    coat_fastening = '+fastening_' + config['coat_fastening'];
                                }
                            } else {
                                coat_fastening = '+fastening_standard';
                            }
                        }
                        var coat_fit = '+fit_' + config['coat_fit'];
                        if ((!empty(config['coat_fit']) && config['coat_fit'] == 'straight') && (!empty(config['coat_belt']) && config['coat_belt'] == 'loose')) {
                            coat_fit = '+fit_waisted';
                        }
                        var neck_img = 'neck+style_' + config['coat_style'] + '+collar_' + config['coat_collar'] + coat_lapel + coat_buttons + coat_fit + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_neck',
                            'src': neck_img + '.png',
                            'zIndex': 11004
                        });
                        if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] != '0') {
                            var epaulettes_img = 'epaulettes_' + config['coat_epaulettes'];
                            array_push(images, {
                                'layer': 'coat_epaulettes',
                                'src': epaulettes_img + '.png',
                                'zIndex': 11005
                            });
                        }
                        var collar_lapel = "";
                        var coat_fastening = '';
                        var coat_buttons = '';
                        if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                            collar_lapel = "+collar_" + config['coat_collar'];
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple') {
                            if (!empty(config['coat_collar']) && (config['coat_collar'] == 'lapel_short' || config['coat_collar'] == 'lapel_long')) {
                                coat_fastening = '+fastening_standard';
                            } else {
                                coat_fastening = '+fastening_' + config['coat_fastening'];
                            }
                        } else {
                            if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' && !empty(config['coat_buttons'])) {
                                collar_lapel = "+collar_" + config['coat_collar'];
                                if (config['coat_buttons'] == '2' || config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_4';
                                } else {
                                    coat_buttons = '+buttons_' + config['coat_buttons'];
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'classic') {
                                collar_lapel = "+collar_lapel_short";
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '12') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else if (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long') {
                                if (!empty(config['coat_buttons']) && (config['coat_buttons'] == '2' || config['coat_buttons'] == '8' || config['coat_buttons'] == '12')) {
                                    coat_buttons = '+buttons_4';
                                } else if (!empty(config['coat_buttons']) && config['coat_buttons'] == '4') {
                                    coat_buttons = '+buttons_8';
                                }
                            } else {
                                coat_buttons = '+buttons_4';
                            }
                        }
                        var body_img = 'style_' + config['coat_style'] + collar_lapel + coat_buttons + '+length_' + config['coat_length'] + '+fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + coat_fastening;
                        array_push(images, {
                            'layer': 'coat_body',
                            'src': body_img + '.png',
                            'zIndex': 11006
                        });
                        if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'wide') {
                            var parche_img = 'parche+sleeves_wide';
                            array_push(images, {
                                'layer': 'coat_parche',
                                'src': parche_img + '.png',
                                'zIndex': 11007
                            });
                        }
                        if (!empty(config['coat_pockets_type'])) {
                            var coat_fit = '';
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] != 'patched' || (config['coat_pockets_type'] == 'diagonal' && coat_body_cut == '1')) {
                                coat_fit = "+fit_" + config['coat_fit'];
                            }
                            var body_cut = '';
                            if (!empty(config['coat_fit']) && (config['coat_fit'] == 'straight' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'flap' || config['coat_pockets_type'] == 'double_welt' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button'))) {
                                body_cut = '+body_cut_' + coat_body_cut;
                                if ((config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && (config['coat_fit'] == 'straight' && coat_body_cut == '0')) {
                                    body_cut = '';
                                    coat_fit = '';
                                }
                            } else if (!empty(config['coat_fit']) && config['coat_fit'] == 'waisted' && !empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'patched' || config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button')) {
                                coat_fit = '';
                            }
                            var coat_sleeves = '';
                            if (!empty(config['coat_pockets_type']) && (config['coat_pockets_type'] == 'diagonal' || config['coat_pockets_type'] == 'diagonal_button') && !empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'wide')) {
                                coat_sleeves = '+sleeves_' + config['coat_sleeves'];
                            }
                            var pockets_img = 'pockets_' + config['coat_pockets_type'] + coat_fit + body_cut + coat_sleeves;
                            array_push(images, {
                                'layer': 'coat_pockets',
                                'src': pockets_img + '.png',
                                'zIndex': 11008
                            });
                        }
                        if (!empty(config['coat_belt']) && (config['coat_belt'] != '0' && config['coat_belt'] != 'sewed')) {
                            if (!empty(config['coat_fit'])) coat_fit = "+fit_" + config['coat_fit'];
                            var belt_img = 'belt_' + config['coat_belt'] + coat_fit;
                            array_push(images, {
                                'layer': 'coat_belt',
                                'src': belt_img + '.png',
                                'zIndex': 50000
                            });
                        }
                        array_push(images, {
                            'layer': 'coat_hand',
                            'src': 'mano_left.png',
                            'zIndex': 11010
                        });
                        var sleeve_img = 'sleeves_' + config['coat_sleeves'];
                        array_push(images, {
                            'layer': 'coat_sleeve',
                            'src': sleeve_img + '.png',
                            'zIndex': 11011
                        });
                        if (!empty(current['fabric']['_button_code'])) {
                            if (!empty(config['coat_epaulettes']) && config['coat_epaulettes'] == '1') {
                                if (!empty(epaulettes_img)) array_push(images, {
                                    'layer': 'coat_buttons_epaulettes',
                                    'src': current['fabric']['_button_code'] + '_' + epaulettes_img + '.png',
                                    'zIndex': 43005
                                });
                            }
                            if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long' || !empty(config['coat_style']) && config['coat_style'] == 'crossed')) {
                                if (!empty(neck_img)) array_push(images, {
                                    'layer': 'coat_buttons_neck',
                                    'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                    'zIndex': 43006
                                });
                                if (!empty(body_img)) array_push(images, {
                                    'layer': 'coat_buttons_body',
                                    'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                    'zIndex': 43007
                                });
                            }
                            if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                if (!empty(pockets_img)) array_push(images, {
                                    'layer': 'coat_buttons_pockets',
                                    'src': current['fabric']['_button_code'] + '_' + pockets_img + '.png',
                                    'zIndex': 43008
                                });
                            }
                            if (!empty(config['coat_sleeves']) && (config['coat_sleeves'] == 'tape' || config['coat_sleeves'] == 'buttons')) {
                                if (!empty(sleeve_img)) array_push(images, {
                                    'layer': 'coat_buttons_sleeve',
                                    'src': current['fabric']['_button_code'] + '_' + sleeve_img + '.png',
                                    'zIndex': 43009
                                });
                            }
                        }
                        if (!empty(config['coat_style']) && config['coat_style'] == 'simple' && !empty(config['coat_fastening']) && config['coat_fastening'] == 'horn' && !empty(current['fabric']['_ribbon_color'])) {
                            if (!empty(config['coat_collar']) && config['coat_collar'] != 'lapel_short' && !empty(config['coat_collar']) && config['coat_collar'] != 'lapel_long') {
                                if (neck_img) array_push(images, {
                                    'layer': 'coat_ribbons_neck',
                                    'src': current['fabric']['_ribbon_color'] + '_' + neck_img + '.png',
                                    'zIndex': 43005
                                });
                                if (body_img) array_push(images, {
                                    'layer': 'coat_ribbons_body',
                                    'src': current['fabric']['_ribbon_color'] + '_' + body_img + '.png',
                                    'zIndex': 43006
                                });
                            }
                        }
                        if (show_lining) {
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'fondo.png',
                                'zIndex': 43106
                            });
                            array_push(images, {
                                'layer': 'coat_body',
                                'src': 'abrigo.png',
                                'zIndex': 43107
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': id_t4l_lining + '_coat_lining.png',
                                'zIndex': 43108
                            });
                            array_push(images, {
                                'layer': 'coat_extra_lining',
                                'src': 'camisa.png',
                                'zIndex': 43109
                            });
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['threads-color'])) {
                                var threads = extras['coat_threads']['threads-color'];
                            }
                            if (!empty(extras['coat_threads']['threads'])) {
                                var threads = extras['coat_threads']['threads']['color'];
                            }
                            if (threads) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_threads_extra_neck',
                                        'src': threads + '_thread_' + neck_img + '.png',
                                        'zIndex': 43011
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')) || (config['coat_collar'] == 'lapel_long' && config['coat_buttons'] == '2'))) {} else {
                                        if ((!empty(config['coat_collar']) && config['coat_collar'] != 'simple') || (!empty(config['coat_collar']) && config['coat_collar'] != 'crossed')) {
                                            if (body_img) array_push(images, {
                                                'layer': 'coat_threads_extra_body',
                                                'src': threads + '_thread_' + body_img + '.png',
                                                'zIndex': 43012
                                            });
                                        }
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_threads_extra_pockets',
                                        'src': threads + '_thread_' + pockets_img + '.png',
                                        'zIndex': 43013
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_threads_extra_sleeve',
                                        'src': threads + '_thread_' + sleeve_img + '.png',
                                        'zIndex': 43014
                                    });
                                }
                            }
                        }
                        if (!empty(extras['coat_threads']['contrast']) && extras['coat_threads']['contrast'] == 'all') {
                            if (!empty(extras['coat_threads']['holes-color'])) {
                                var holes = extras['coat_threads']['holes-color'];
                            }
                            if (!empty(extras['coat_threads']['holes'])) {
                                var holes = extras['coat_threads']['holes']['color'];
                            }
                            if (holes) {
                                if (!empty(config['coat_fastening']) && config['coat_fastening'] == 'standard' || (!empty(config['coat_collar']) && config['coat_collar'] == 'lapel_short' || !empty(config['coat_collar']) && config['coat_collar'] == 'lapel_long')) {
                                    if (neck_img) array_push(images, {
                                        'layer': 'coat_holes_extra_neck',
                                        'src': holes + '_hole_' + neck_img + '.png',
                                        'zIndex': 43001
                                    });
                                    if (!empty(config['coat_style']) && config['coat_style'] == 'crossed' && !empty(config['coat_collar']) && !empty(config['coat_buttons']) && ((config['coat_collar'] == 'classic' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '8')) || (config['coat_collar'] == 'lapel_short' && (config['coat_buttons'] == '2' || config['coat_buttons'] == '4' || config['coat_buttons'] == '12')))) {} else {
                                        if (body_img) array_push(images, {
                                            'layer': 'coat_holes_extra_body',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43002
                                        });
                                    }
                                }
                                if (!empty(config['coat_pockets_type']) && config['coat_pockets_type'] == 'diagonal_button') {
                                    if (pockets_img) array_push(images, {
                                        'layer': 'coat_holes_extra_pockets',
                                        'src': holes + '_hole_' + pockets_img + '.png',
                                        'zIndex': 43003
                                    });
                                }
                                if (!empty(config['coat_sleeves']) && config['coat_sleeves'] == 'tape') {
                                    if (sleeve_img) array_push(images, {
                                        'layer': 'coat_holes_extra_sleeve',
                                        'src': holes + '_hole_' + sleeve_img + '.png',
                                        'zIndex': 43004
                                    });
                                }
                            }
                        }
                    } else {
                        if (!empty(config['coat_backcut']) && config['coat_backcut'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_backcut',
                                'src': 'fit_' + config['coat_fit'] + '+backcut_' + config['coat_backcut'] + '.png',
                                'zIndex': 10003
                            });
                        }
                        if (coat_body_cut == '1') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+body_cut_' + coat_body_cut + '.png',
                                'zIndex': 10002
                            });
                        }
                        if (!empty(config['coat_belt']) && config['coat_belt'] != '0') {
                            array_push(images, {
                                'layer': 'coat_back_belt',
                                'src': 'fit_' + config['coat_fit'] + '+belt_' + config['coat_belt'] + '.png',
                                'zIndex': 10001
                            });
                        }
                        if (!empty(config['coat_fit']) && config['coat_fit']) {
                            array_push(images, {
                                'layer': 'coat_back_body',
                                'src': 'fit_' + config['coat_fit'] + '.png',
                                'zIndex': 10000
                            });
                        }
                    }
                    return this.parseImages(images, current);
                }
            }
        });
    </script>
<?php }

/* End Coat Customizer JS*/


/*Start Shirt Customizer JS*/
if($id==8)
{
?>

    
               <script type="text/javascript">

                var garment_opt = {
                    "product_type": "woman_shirt",
                    "price_detail": {
                        "base": <?php echo $price;?>,
                        "fabric_woman_shirt": 0
                    },
                    "current": {
                        "config": {
                            "shirt_sleeves": $("input[name=shirt_sleeves]:checked").val(),
                            "shirt_sleeve_detail": $("input[name=shirt_sleeve_detail]:checked").val(),
                            "shirt_fit": $("input[name=shirt_fit]:checked").val(),
                            "shirt_bottom_cut": $("input[name=shirt_bottom_cut]:checked").val(),
                            "shirt_necklines": $("input[name=shirt_necklines]:checked").val(),
                            "shirt_button_close": $("input[name=shirt_button_close]:checked").val(),
                            "shirt_cuffs": $("input[name=shirt_cuffs]:checked").val(),
                            "shirt_pockets": $("input[name=shirt_pockets]:checked").val(),
                            "shirt_pockets_type": $("input[name=shirt_pockets_type]:checked").val()
                            //"shirt_shoulder_piece": $("input[name=shirt_sleeves]:checked").val()
                        },
                        "fabric": {
                            "woman_shirt": "<?php echo $_SESSION['fabID']; ?>"
                        },
                        "extras": []
                    },
                    "errors": [],
                    "render_info": {
                        "model": 1,
                        "size": "390x674:0x0",
                        "webview": {
                            "height": 1150,
                            "top": -40,
                            "updown": false
                        },
                        "mobileview": {
                            "height": 200,
                            "top": -37
                        }
                    },
                    "config": {
                        "shirt_sleeves": {
                            "3_4": ["disable#config:woman_shirt:shirt_cuffs", "disable#extra:woman_shirt:shirt_patches"],
                            "short": ["disable#config:woman_shirt:shirt_cuffs", "disable#extra:woman_shirt:shirt_patches"],
                            "without":["disable#config:woman_shirt:shirt_cuffs", "disable#config:woman_shirt:shirt_sleeve_detail","disable#extra:woman_shirt:shirt_patches"]
                        },
                        "shirt_necklines": {
                            "jewel_neck": ["disable#config:woman_shirt:shirt_button_close"],
                            "boat_neck": ["disable#config:woman_shirt:shirt_button_close"],
                            "u_neck": ["disable#config:woman_shirt:shirt_button_close"],
                            "v_neck": ["disable#config:woman_shirt:shirt_button_close"]
                        },
                        "shirt_sleeve_detail": false,
                        "shirt_fit": false,
                        "shirt_bottom_cut": false,
                        "shirt_button_close": false,
                        "shirt_cuffs": false,
                        "shirt_pockets": [
                            ["disable#config:woman_shirt:shirt_pockets_type"]
                        ],
                        "shirt_pockets_type": false,
                        "shirt_shoulder_piece": false
                    },
                    "fabric": {
                        "woman_shirt": {
                            "fabric_type": "shirt",
                            "price": {
                                "category": {
                                    "limited": 7.95,
                                    "easy": 7.95,
                                    "wrinkle": 12.95
                                }
                            }
                        }
                    },
                    "extra": {
                        "shirt_initials": {
                            "extra_type": "initials"
                        },
                        "shirt_neck": {
                            "extra_type": "fabrics",
                            "contrast": {
                                "default": ["disable#extra:woman_shirt:shirt_neck:[fabrics]"],
                                "inner": ["required#extra:woman_shirt:shirt_neck:[fabrics]"],
                                "outer": ["required#extra:woman_shirt:shirt_neck:[fabrics]"],
                                "full": ["required#extra:woman_shirt:shirt_neck:[fabrics]"]
                            }
                        },
                        "shirt_cuff": {
                            "extra_type": "fabrics",
                            "contrast": {
                                "default": ["disable#extra:woman_shirt:shirt_cuff:[fabrics]"],
                                "inner": ["required#extra:woman_shirt:shirt_cuff:[fabrics]"],
                                "outer": ["required#extra:woman_shirt:shirt_cuff:[fabrics]"],
                                "full": ["required#extra:woman_shirt:shirt_cuff:[fabrics]"]
                            }
                        },
                        "shirt_patches": {
                            "extra_type": "fabrics",
                            "contrast": {
                                "default": ["disable#extra:woman_shirt:shirt_patches:[fabrics]"],
                                "custom": ["required#extra:woman_shirt:shirt_patches:[fabrics]"]
                            }
                        },
                        "shirt_threads": {
                            "extra_type": "threads",
                            "contrast": {
                                "default": ["disable#extra:woman_shirt:shirt_threads:[threads]", "disable#extra:woman_shirt:shirt_threads:[holes]"],
                                "all": ["required#extra:woman_shirt:shirt_threads:[threads]", "required#extra:woman_shirt:shirt_threads:[holes]"],
                                "cuff": ["required#extra:woman_shirt:shirt_threads:[threads]", "required#extra:woman_shirt:shirt_threads:[holes]"]
                            }
                        }
                    },
                    "garment_id": 9283
                };
                ready_callbacks.push(function() {
                    var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
                    $g.initGarment();
                    window.t4l_inputs_enabled = true;
                    var current = $g.getCurrentLayers();
                    current['render_info'] = $g.render_info;
                    current['view'] = 'front';
                    if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                        $g.getLayers = function() {
                            return {
                                'shirt_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'shirt_pants': {
                                    'src': '/3d/woman/shirt/pants/#view#/'
                                },
                                'shirt_shirt': {
                                    'src': '/3d/woman/shirt/shirt/#view#/'
                                },
                                'shirt_body': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_neck': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_sleeve': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_chest_pocket': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_shoulder': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_buttons_body': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_neck': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_sleeves': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_pockets': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_shoulder': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_hand': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'shirt_neck_extra': {
                                    'src': '/3d/woman/shirt/'
                                },
                                'shirt_cuff_extra': {
                                    'src': '/3d/woman/shirt/'
                                },
                                'shirt_threads_extra': {
                                    'src': '/3d/woman/shirt/hilos_ojales/'
                                },
                                'shirt_holes_extra': {
                                    'src': '/3d/woman/shirt/hilos_ojales/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_shirt'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            if (!empty(current['button_code'])) {
                                button_code = current['button_code'];
                            } else {
                                button_code = false;
                            }
                            var model = 1;
                            if (!empty(current['model'])) {
                                model = current['model'];
                            }
                            if (current['view'] == 'front') {
                                array_push(images, {
                                    'layer': 'shirt_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                array_push(images, {
                                    'layer': 'shirt_pants',
                                    'src': 'pants_front.png',
                                    'zIndex': 10001
                                });
                                if (config['shirt_necklines'] === 'jewel_neck' || config['shirt_necklines'] === 'boat_neck' || config['shirt_necklines'] === 'u_neck' || config['shirt_necklines'] === 'v_neck') {
                                    var shirt_position = 'back';
                                }
                                else {
                                    var shirt_position = 'outside';
                                }
                                var body_img = 'fit_' + config['shirt_fit'] + '+button_close_' + config['shirt_button_close'] + '+bottom_cut_' + config['shirt_bottom_cut'] + '+' + shirt_position;
                                array_push(images, {
                                    'layer': 'shirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 11000
                                });
                                var neck_img;
                                if (config['shirt_button_close'] == 'up_to_half_standard') {
                                    if (!empty(config['shirt_necklines']) && config['shirt_necklines'] == 'mao_round') {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "_low+button_close_standard";
                                    } else {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "+button_close_standard";
                                    }
                                } else if (config['shirt_necklines'] === 'jewel_neck' || config['shirt_necklines'] === 'boat_neck' || config['shirt_necklines'] === 'u_neck' || config['shirt_necklines'] === 'v_neck') {
                                        neck_img = 'necklines_' + config["shirt_necklines"] + '+close_back';
                                    } else {
                                    if (!empty(config['shirt_necklines']) && config['shirt_necklines'] == 'mao_round') {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "_low+button_close_" + config['shirt_button_close'];
                                    } else {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "+button_close_" + config['shirt_button_close'];
                                    }
                                }
                                array_push(images, {
                                    'layer': 'shirt_neck',
                                    'src': neck_img + '.png',
                                    'zIndex': 12000
                                });
                                var sleeves_img;
                                if (config['shirt_sleeves'] == 'short') {
                                    sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                } else if (config['shirt_sleeves'] == '3_4') {
                                    if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'normal') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic_sleeve_detail_" + config['shirt_sleeve_detail'];
                                    }
                                } else {
                                    if (config['shirt_cuffs'] == 'classic' || config['shirt_cuffs'] == 'straight_2_button' || config['shirt_cuffs'] == 'straight_3_button') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_" + config['shirt_cuffs'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else if (config['shirt_cuffs'] == 'thin') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_" + config['shirt_cuffs'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    }
                                }
                                array_push(images, {
                                    'layer': 'shirt_sleeve',
                                    'src': sleeves_img + '.png',
                                    'zIndex': 13000
                                });
                                var chest_pocket_img;
                                if (config['shirt_pockets'] != 0) {
                                    chest_pocket_img = "pockets_" + config['shirt_pockets'] + "+pockets_type_" + config['shirt_pockets_type'];
                                    array_push(images, {
                                        'layer': 'shirt_chest_pocket',
                                        'src': chest_pocket_img + '.png',
                                        'zIndex': 14000
                                    });
                                }
                                var shoulder_piece = false;
                                if (config['shirt_shoulder_piece'] == 'with') {
                                    shoulder_piece = 'shoulder_piece_with';
                                    array_push(images, {
                                        'layer': 'shirt_shoulder',
                                        'src': shoulder_piece + '.png',
                                        'zIndex': 15000
                                    });
                                }
                                if (config['shirt_button_close'] != 'hidden') {
                                    if (empty(current['fabric']['_button_code']) && !empty(button_code)) current['fabric']['_button_code'] = button_code;
                                    array_push(images, {
                                        'layer': 'shirt_buttons_body',
                                        'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                        'zIndex': 16000
                                    });
                                    array_push(images, {
                                        'layer': 'shirt_buttons_neck',
                                        'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'inner_strip') {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_sleeves',
                                        'src': current['fabric']['_button_code'] + '_' + sleeves_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (!empty(chest_pocket_img) && config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_pockets',
                                        'src': current['fabric']['_button_code'] + '_' + chest_pocket_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (shoulder_piece) {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_shoulder',
                                        'src': current['fabric']['_button_code'] + '_' + shoulder_piece + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                array_push(images, {
                                    'layer': 'shirt_hand',
                                    'src': 'mano_left.png',
                                    'zIndex': 12950
                                });
                                var contrast, fabric_id, shirt_necklines, sc, img_long;
                                var shirt_neck = extras['shirt_neck'];
                                if (!empty(shirt_neck['contrast']) && !empty(shirt_neck['fabric_id']) && (shirt_neck['contrast'] != 'default' && shirt_neck['contrast'] != 'inner')) {
                                    contrast = shirt_neck['contrast'];
                                    fabric_id = shirt_neck['fabric_id'];
                                    shirt_necklines = (config['shirt_necklines'] == 'mao_round') ? 'mao_round_low' : config['shirt_necklines'];
                                    array_push(images, {
                                        'layer': 'shirt_neck_extra',
                                        'src': fabric_id + '_fabric/' + current['view'] + '/neck_contrast_' + contrast + '_necklines_' + shirt_necklines + '.png',
                                        'zIndex': 17000
                                    });
                                }
                                var shirt_cuff = extras['shirt_cuff'];
                                if (!empty(shirt_cuff['contrast']) && !empty(shirt_cuff['fabric_id']) && (shirt_cuff['contrast'] != 'default' && shirt_cuff['contrast'] != 'inner')) {
                                    contrast = 'outer';
                                    fabric_id = shirt_cuff['fabric_id'];
                                    if (config['shirt_sleeves'] == 'short') {
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/cuff_contrast_' + contrast + '_sleeves_' + config['shirt_sleeves'] + '.png',
                                            'zIndex': 17000
                                        });
                                    } else if (config['shirt_sleeves'] == '3_4') {
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/cuff_contrast_' + contrast + '_sleeves_' + config['shirt_sleeves'] + '+cuffs_classic.png',
                                            'zIndex': 17000
                                        });
                                    } else if (config['shirt_sleeves'] == 'long') {
                                        sc = config['shirt_cuffs'];
                                        if (sc == 'straight_3_button') {
                                            img_long = 'cuff_contrast_outer_sleeves_long+sleeves_long+cuffs_straight_3_button.png';
                                        } else if (sc == 'straight_2_button' || sc == 'cut_2_buttons' || sc == 'rounded_2_button') {
                                            img_long = 'cuff_contrast_outer_sleeves_long+cuffs_straight_2_button.png';
                                        } else {
                                            img_long = 'cuff_contrast_outer_sleeves_long+cuffs_classic.png';
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + img_long,
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                var hole = false;
                                var thread = false;
                                if (!empty(extras['shirt_threads']['contrast']) && extras['shirt_threads']['contrast'] == 'all') {
                                    if (!empty(extras['shirt_threads']['threads-color'])) {
                                        thread = extras['shirt_threads']['threads-color'];
                                        if (config['shirt_button_close'] != 'hidden') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + body_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_threads_extra',
                                            'src': thread + '_thread_' + neck_img + '.png',
                                            'zIndex': 16001
                                        });
                                        if (config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + chest_pocket_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'inner_strip' && config['shirt_sleeves'] != 'short') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + sleeves_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                    }
                                    if (!empty(extras['shirt_threads']['holes-color'])) {
                                        hole = extras['shirt_threads']['holes-color'];
                                        if (config['shirt_button_close'] != 'hidden') {
                                            array_push(images, {
                                                'layer': 'shirt_holes_extra',
                                                'src': hole + '_hole_' + body_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_holes_extra',
                                            'src': hole + '_hole_' + neck_img + '.png',
                                            'zIndex': 16001
                                        });
                                        if (config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                            array_push(images, {
                                                'layer': 'shirt_holes_extra',
                                                'src': hole + '_hole_' + chest_pocket_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                    }
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    } else {
                        $g.getLayers = function() {
                            return {
                                'shirt_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'shirt_pants': {
                                    'src': '/3d/woman/shirt/pants/#view#/'
                                },
                                'shirt_shirt': {
                                    'src': '/3d/woman/shirt/shirt/#view#/'
                                },
                                'shirt_body': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_neck': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_sleeve': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_chest_pocket': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_shoulder': {
                                    'src': '/3d/woman/shirt/#woman_shirt#_fabric/#view#/'
                                },
                                'shirt_buttons_body': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_neck': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_sleeves': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_pockets': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_buttons_shoulder': {
                                    'src': '/3d/woman/shirt/buttons/'
                                },
                                'shirt_hand': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'shirt_neck_extra': {
                                    'src': '/3d/woman/shirt/'
                                },
                                'shirt_cuff_extra': {
                                    'src': '/3d/woman/shirt/'
                                },
                                'shirt_threads_extra': {
                                    'src': '/3d/woman/shirt/hilos_ojales/'
                                },
                                'shirt_holes_extra': {
                                    'src': '/3d/woman/shirt/hilos_ojales/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_shirt'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            if (!empty(current['button_code'])) {
                                button_code = current['button_code'];
                            } else {
                                button_code = false;
                            }
                            var model = 1;
                            if (!empty(current['model'])) {
                                model = current['model'];
                            }
                            if (current['view'] == 'front') {
                                array_push(images, {
                                    'layer': 'shirt_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                array_push(images, {
                                    'layer': 'shirt_pants',
                                    'src': 'pants_front.png',
                                    'zIndex': 10001
                                });
                                if (config['shirt_necklines'] === 'jewel_neck' || config['shirt_necklines'] === 'boat_neck' || config['shirt_necklines'] === 'u_neck' || config['shirt_necklines'] === 'v_neck') {
                                    var shirt_position = 'back';
                                }
                                else {
                                    var shirt_position = 'outside';
                                }
                                var body_img = 'fit_' + config['shirt_fit'] + '+button_close_' + config['shirt_button_close'] + '+bottom_cut_' + config['shirt_bottom_cut'] + '+' + shirt_position;
                                array_push(images, {
                                    'layer': 'shirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 11000
                                });
                                var neck_img;
                                if (config['shirt_button_close'] == 'up_to_half_standard') {
                                    if (!empty(config['shirt_necklines']) && config['shirt_necklines'] == 'mao_round') {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "_low+button_close_standard";
                                    } else {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "+button_close_standard";
                                    }
                                } else if (config['shirt_necklines'] === 'jewel_neck' || config['shirt_necklines'] === 'boat_neck' || config['shirt_necklines'] === 'u_neck' || config['shirt_necklines'] === 'v_neck') {
                                        neck_img = 'necklines_' + config["shirt_necklines"] + '+close_back';
                                } else {
                                    if (!empty(config['shirt_necklines']) && config['shirt_necklines'] == 'mao_round') {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "_low+button_close_" + config['shirt_button_close'];
                                } else {
                                        neck_img = "necklines_" + config['shirt_necklines'] + "+button_close_" + config['shirt_button_close'];
                                    }
                                }
                                array_push(images, {
                                    'layer': 'shirt_neck',
                                    'src': neck_img + '.png',
                                    'zIndex': 12000
                                });
                                var sleeves_img;
                                if (config['shirt_sleeves'] == 'short') {
                                    sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                } else if (config['shirt_sleeves'] == '3_4') {
                                    if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'normal') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic_sleeve_detail_" + config['shirt_sleeve_detail'];
                                    }
                                } else {
                                    if (config['shirt_cuffs'] == 'classic' || config['shirt_cuffs'] == 'straight_2_button' || config['shirt_cuffs'] == 'straight_3_button') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_" + config['shirt_cuffs'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else if (config['shirt_cuffs'] == 'thin') {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_" + config['shirt_cuffs'] + "+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    } else {
                                        sleeves_img = "sleeves_" + config['shirt_sleeves'] + "+cuffs_classic+sleeve_detail_" + config['shirt_sleeve_detail'];
                                    }
                                }
                                array_push(images, {
                                    'layer': 'shirt_sleeve',
                                    'src': sleeves_img + '.png',
                                    'zIndex': 13000
                                });
                                var chest_pocket_img;
                                if (config['shirt_pockets'] != 0) {
                                    chest_pocket_img = "pockets_" + config['shirt_pockets'] + "+pockets_type_" + config['shirt_pockets_type'];
                                    array_push(images, {
                                        'layer': 'shirt_chest_pocket',
                                        'src': chest_pocket_img + '.png',
                                        'zIndex': 14000
                                    });
                                }
                                var shoulder_piece = false;
                                if (config['shirt_shoulder_piece'] == 'with') {
                                    shoulder_piece = 'shoulder_piece_with';
                                    array_push(images, {
                                        'layer': 'shirt_shoulder',
                                        'src': shoulder_piece + '.png',
                                        'zIndex': 15000
                                    });
                                }
                                if (config['shirt_button_close'] != 'hidden') {
                                    if (empty(current['fabric']['_button_code']) && !empty(button_code)) current['fabric']['_button_code'] = button_code;
                                    array_push(images, {
                                        'layer': 'shirt_buttons_body',
                                        'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                        'zIndex': 16000
                                    });
                                    array_push(images, {
                                        'layer': 'shirt_buttons_neck',
                                        'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'inner_strip') {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_sleeves',
                                        'src': current['fabric']['_button_code'] + '_' + sleeves_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (!empty(chest_pocket_img) && config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_pockets',
                                        'src': current['fabric']['_button_code'] + '_' + chest_pocket_img + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                if (shoulder_piece) {
                                    array_push(images, {
                                        'layer': 'shirt_buttons_shoulder',
                                        'src': current['fabric']['_button_code'] + '_' + shoulder_piece + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                array_push(images, {
                                    'layer': 'shirt_hand',
                                    'src': 'mano_left.png',
                                    'zIndex': 12950
                                });
                                var contrast, fabric_id, shirt_necklines, sc, img_long;
                                var shirt_neck = extras['shirt_neck'];
                                if (!empty(shirt_neck['contrast']) && !empty(shirt_neck['fabric_id']) && (shirt_neck['contrast'] != 'default' && shirt_neck['contrast'] != 'inner')) {
                                    contrast = shirt_neck['contrast'];
                                    fabric_id = shirt_neck['fabric_id'];
                                    shirt_necklines = (config['shirt_necklines'] == 'mao_round') ? 'mao_round_low' : config['shirt_necklines'];
                                    array_push(images, {
                                        'layer': 'shirt_neck_extra',
                                        'src': fabric_id + '_fabric/' + current['view'] + '/neck_contrast_' + contrast + '_necklines_' + shirt_necklines + '.png',
                                        'zIndex': 17000
                                    });
                                }
                                var shirt_cuff = extras['shirt_cuff'];
                                if (!empty(shirt_cuff['contrast']) && !empty(shirt_cuff['fabric_id']) && (shirt_cuff['contrast'] != 'default' && shirt_cuff['contrast'] != 'inner')) {
                                    contrast = 'outer';
                                    fabric_id = shirt_cuff['fabric_id'];
                                    if (config['shirt_sleeves'] == 'short') {
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/cuff_contrast_' + contrast + '_sleeves_' + config['shirt_sleeves'] + '.png',
                                            'zIndex': 17000
                                        });
                                    } else if (config['shirt_sleeves'] == '3_4') {
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/cuff_contrast_' + contrast + '_sleeves_' + config['shirt_sleeves'] + '+cuffs_classic.png',
                                            'zIndex': 17000
                                        });
                                    } else if (config['shirt_sleeves'] == 'long') {
                                        sc = config['shirt_cuffs'];
                                        if (sc == 'straight_3_button') {
                                            img_long = 'cuff_contrast_outer_sleeves_long+sleeves_long+cuffs_straight_3_button.png';
                                        } else if (sc == 'straight_2_button' || sc == 'cut_2_buttons' || sc == 'rounded_2_button') {
                                            img_long = 'cuff_contrast_outer_sleeves_long+cuffs_straight_2_button.png';
                                        } else {
                                            img_long = 'cuff_contrast_outer_sleeves_long+cuffs_classic.png';
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + img_long,
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                var hole = false;
                                var thread = false;
                                if (!empty(extras['shirt_threads']['contrast']) && extras['shirt_threads']['contrast'] == 'all') {
                                    if (!empty(extras['shirt_threads']['threads-color'])) {
                                        thread = extras['shirt_threads']['threads-color'];
                                        if (config['shirt_button_close'] != 'hidden') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + body_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_threads_extra',
                                            'src': thread + '_thread_' + neck_img + '.png',
                                            'zIndex': 16001
                                        });
                                        if (config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + chest_pocket_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        if (!empty(config['shirt_sleeve_detail']) && config['shirt_sleeve_detail'] == 'inner_strip' && config['shirt_sleeves'] != 'short') {
                                            array_push(images, {
                                                'layer': 'shirt_threads_extra',
                                                'src': thread + '_thread_' + sleeves_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                    }
                                    if (!empty(extras['shirt_threads']['holes-color'])) {
                                        hole = extras['shirt_threads']['holes-color'];
                                        if (config['shirt_button_close'] != 'hidden') {
                                            array_push(images, {
                                                'layer': 'shirt_holes_extra',
                                                'src': hole + '_hole_' + body_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                        array_push(images, {
                                            'layer': 'shirt_holes_extra',
                                            'src': hole + '_hole_' + neck_img + '.png',
                                            'zIndex': 16001
                                        });
                                        if (config['shirt_pockets'] != 0 && config['shirt_pockets_type'] == 'peak') {
                                            array_push(images, {
                                                'layer': 'shirt_holes_extra',
                                                'src': hole + '_hole_' + chest_pocket_img + '.png',
                                                'zIndex': 16001
                                            });
                                        }
                                    }
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    }
                });
            </script>
<?php
}
/*End Shirt Customizer JS*/

/*Start Blouse Customizer JS*/
if($id==7)
{
?>
<script type="text/javascript">
                var garment_opt = {
                    "product_type": "woman_blouse",
                    "price_detail": {
                        "base": <?php echo $price;?>,
                        "fabric_woman_blouse": 0
                    },
                    "current": {
                        "config": {
                            "blouse_sleeves":  $('input[name=blouse_sleeves]:checked').val(),
                            "blouse_sleeve_detail":  $('input[name=blouse_sleeve_detail]:checked').val(),
                            "blouse_fit":  $('input[name=blouse_fit]:checked').val(),
                            "blouse_bottom_cut":  $('input[name=blouse_bottom_cut]:checked').val(),
                            "blouse_necklines":  $('input[name=blouse_necklines]:checked').val(),
                            "blouse_button_close":  $('input[name=blouse_button_close]:checked').val(),
                            "blouse_cuffs": $('input[name=blouse_cuffs]:checked').val(),
                            "blouse_pockets": $('input[name=blouse_pockets]:checked').val(),
                            "blouse_pockets_type": $('input[name=blouse_pockets_type]:checked').val(),
                            "blouse_shoulder_piece": "without"
                        },
                        "fabric": {
                            "woman_blouse": "<?php echo $_SESSION['fabID'];?>"
                        },
                        "extras": []
                    },
                    "errors": [],
                    "render_info": {
                        "model": 1,
                        "size": "390x674:0x0",
                        "webview": {
                            "height": 1150,
                            "top": -40,
                            "updown": false
                        },
                        "mobileview": {
                            "height": 200,
                            "top": -37
                        }
                    },
                    "config": {
                        "blouse_sleeves": {
                            "3_4": ["disable#config:woman_blouse:blouse_cuffs:straight_2_button", "disable#config:woman_blouse:blouse_cuffs:cut", "disable#config:woman_blouse:blouse_cuffs:cut_2_buttons", "disable#config:woman_blouse:blouse_cuffs:rounded", "disable#config:woman_blouse:blouse_cuffs:rounded_2_button", "disable#config:woman_blouse:blouse_sleeve_detail"],
                            "short": ["disable#config:woman_blouse:blouse_cuffs"],
                            "without": ["disable#config:woman_blouse:blouse_cuffs", "disable#config:woman_blouse:blouse_sleeve_detail", "disable#extra:woman_blouse:blouse_cuff"]
                        },
                        "blouse_sleeve_detail": false,
                        "blouse_fit": false,
                        "blouse_bottom_cut": false,
                        "blouse_necklines": {
                            "jewel": ["disable#extra:woman_blouse:blouse_neck"],
                            "jewel_neck": ["disable#config:woman_blouse:blouse_button_close", "disable#extra:woman_blouse:blouse_neck", "disable#extra:woman_blouse:blouse_threads"],
                            "boat_neck": ["disable#config:woman_blouse:blouse_shoulder_piece", "disable#config:woman_blouse:blouse_button_close", "disable#extra:woman_blouse:blouse_neck", "disable#extra:woman_blouse:blouse_threads"],
                            "u_neck": ["disable#config:woman_blouse:blouse_pockets", "disable#config:woman_blouse:blouse_pockets_type", "disable#config:woman_blouse:blouse_button_close", "disable#extra:woman_blouse:blouse_neck", "disable#extra:woman_blouse:blouse_threads"],
                            "v_neck": ["disable#config:woman_blouse:blouse_pockets", "disable#config:woman_blouse:blouse_pockets_type", "disable#config:woman_blouse:blouse_button_close", "disable#extra:woman_blouse:blouse_neck", "disable#extra:woman_blouse:blouse_threads"]
                        },
                        "blouse_button_close": false,
                        "blouse_cuffs": false,
                        "blouse_pockets": [
                            ["disable#config:woman_shirt:blouse_pockets_type"]
                        ],
                        "blouse_pockets_type": false,
                        "blouse_shoulder_piece": false
                    },
                    "fabric": {
                        "woman_blouse": {
                            "fabric_type": "blouse",
                            "price": {
                                "category": {
                                    "limited": 0,
                                    "easy": 0,
                                    "wrinkle": 0
                                }
                            }
                        }
                    },
                    "extra": {
                        "blouse_neck": {
                            "extra_type": "fabrics",
                            "contrast": {
                                "default": ["disable#extra:woman_blouse:blouse_neck:[fabrics]"],
                                "inner": ["required#extra:woman_blouse:blouse_neck:[fabrics]"],
                                "outer": ["required#extra:woman_blouse:blouse_neck:[fabrics]"],
                                "full": ["required#extra:woman_blouse:blouse_neck:[fabrics]"]
                            }
                        },
                        "blouse_cuff": {
                            "extra_type": "fabrics",
                            "contrast": {
                                "default": ["disable#extra:woman_blouse:blouse_cuff:[fabrics]"],
                                "inner": ["required#extra:woman_blouse:blouse_cuff:[fabrics]"],
                                "outer": ["required#extra:woman_blouse:blouse_cuff:[fabrics]"],
                                "full": ["required#extra:woman_blouse:blouse_cuff:[fabrics]"]
                            }
                        },
                        "blouse_threads": {
                            "extra_type": "threads",
                            "contrast": {
                                "default": ["disable#extra:woman_blouse:blouse_threads:[threads]", "disable#extra:woman_blouse:blouse_threads:[holes]"],
                                "all": ["required#extra:woman_blouse:blouse_threads:[threads]", "required#extra:woman_blouse:blouse_threads:[holes]"],
                                "cuff": ["required#extra:woman_blouse:blouse_threads:[threads]", "required#extra:woman_blouse:blouse_threads:[holes]"]
                            }
                        }
                    },
                    "garment_id": 8194
                };
                ready_callbacks.push(function() {
                    var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
                    $g.initGarment();
                    window.t4l_inputs_enabled = true;
                    var current = $g.getCurrentLayers();
                    current['render_info'] = $g.render_info;
                    current['view'] = 'front';
                    if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                        $g.getLayers = function() {
                            return {
                                'blouse_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'blouse_pants': {
                                    'src': '/3d/woman/blouse/pants/#view#/'
                                },
                                'blouse_blouse': {
                                    'src': '/3d/woman/blouse/blouse/#view#/'
                                },
                                'blouse_body': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_neck': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_sleeve': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_chest_pocket': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_shoulder': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_hand': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'blouse_buttons_body': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_neck': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_sleeves': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_pockets': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_shoulder': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_neck_extra': {
                                    'src': '/3d/woman/blouse/'
                                },
                                'blouse_cuff_extra': {
                                    'src': '/3d/woman/blouse/'
                                },
                                'blouse_threads_extra': {
                                    'src': '/3d/woman/blouse/hilos_ojales/'
                                },
                                'blouse_holes_extra': {
                                    'src': '/3d/woman/blouse/hilos_ojales/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_blouse'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            var model = 1;
                            if (!empty(current['model'])) {
                                model = current['model'];
                            }
                            if (!empty(current['button_code'])) {
                                button_code = current['button_code'];
                            } else {
                                button_code = false;
                            }
                            if (current['view'] == 'front') {
                                array_push(images, {
                                    'layer': 'blouse_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                array_push(images, {
                                    'layer': 'blouse_pants',
                                    'src': 'pants_front.png',
                                    'zIndex': 10001
                                });
                                var blouse_button_close = false;
                                if (config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck') {
                                    blouse_button_close = 'back';
                                } else {
                                    if (config['blouse_button_close'] == 'up_to_half') {
                                        blouse_button_close = 'standard';
                                    } else {
                                        blouse_button_close = config['blouse_button_close'];
                                    }
                                }
                                var neck_img = false;
                                neck_img = "necklines_" + config['blouse_necklines'] + "+close_" + blouse_button_close;
                                if (config['blouse_button_close'] != 'up_to_half') {
                                    array_push(images, {
                                        'layer': 'blouse_neck',
                                        'src': neck_img + '.png',
                                        'zIndex': 12000
                                    });
                                } else {
                                    if (config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck') {
                                        array_push(images, {
                                            'layer': 'blouse_neck',
                                            'src': 'necklines_' + config["blouse_necklines"] + '+close_back.png',
                                            'zIndex': 12000
                                        });
                                    } else {
                                        array_push(images, {
                                            'layer': 'blouse_neck',
                                            'src': 'necklines_' + config["blouse_necklines"] + '+close_close_up_to_half.png',
                                            'zIndex': 12000
                                        });
                                    }
                                }
                                var body_img = false;
                                if (config['blouse_necklines'] == 'jewel_neck' || config['blouse_necklines'] == 'boat_neck' || config['blouse_necklines'] == 'u_neck' || config['blouse_necklines'] == 'v_neck') {
                                    body_img = 'fit_' + config['blouse_fit'] + '+bottom_cut_' + config['blouse_bottom_cut'] + '+close_back';
                                } else {
                                    body_img = 'fit_' + config['blouse_fit'] + '+bottom_cut_' + config['blouse_bottom_cut'] + '+close_' + config['blouse_button_close'];
                                }
                                array_push(images, {
                                    'layer': 'blouse_body',
                                    'src': body_img + '.png',
                                    'zIndex': 11000
                                });
                                var sleeves_img = false;
                                if (config['blouse_sleeves'] === 'long' || config['blouse_sleeves'] === 'short') {
                                    if (config['blouse_sleeve_detail'] === 'inner_strip') {
                                        blouse_sleeve_detail = "+sleeve_detail_inner_strip";
                                    } else {
                                        blouse_sleeve_detail = "+sleeve_detail_" + config['blouse_sleeve_detail'];
                                    }
                                } else {
                                    blouse_sleeve_detail = '';
                                }
                                if (config['blouse_sleeves'] === 'short' || config['blouse_sleeves'] === 'without') {
                                    cuffs = '';
                                } else if (config['blouse_sleeves'] === 'long') {
                                    if ((config['blouse_cuffs'] === 'classic' || config['blouse_cuffs'] === 'cut' || config['blouse_cuffs'] === 'rounded') || config['blouse_sleeve_detail'] === 'inner_strip') {
                                        cuffs = "+cuffs_classic";
                                    } else if (config['blouse_cuffs'] === 'straight_2_button' || config['blouse_cuffs'] === 'rounded_2_button' || config['blouse_cuffs'] === 'cut_2_buttons') {
                                        cuffs = "+cuffs_2_button";
                                    } else if (config['blouse_cuffs'] === 'thin') {
                                        cuffs = "+cuffs_thin";
                                    }
                                } else {
                                    if (config['blouse_cuffs'] == 'straight_2_button') {
                                        cuffs = "+cuffs_thin";
                                    } else {
                                        cuffs = "+cuffs_" + config['blouse_cuffs'];
                                    }
                                }
                                sleeves_img = "sleeves_" + config['blouse_sleeves'] + blouse_sleeve_detail + cuffs;
                                array_push(images, {
                                    'layer': 'blouse_sleeve',
                                    'src': sleeves_img + '.png',
                                    'zIndex': 13000
                                });
                                var chest_pocket_img = false;
                                if (config['blouse_pockets'] != '0' && config['blouse_necklines'] != 'u_neck' && config['blouse_necklines'] != 'v_neck') {
                                    chest_pocket_img = "pockets_" + config['blouse_pockets'] + "+pockets_type_" + config['blouse_pockets_type'];
                                    array_push(images, {
                                        'layer': 'blouse_chest_pocket',
                                        'src': chest_pocket_img + '.png',
                                        'zIndex': 14000
                                    });
                                }
                                var shoulder_piece = false;
                                if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                    shoulder_piece = 'shoulder_piece_1';
                                    array_push(images, {
                                        'layer': 'blouse_shoulder',
                                        'src': shoulder_piece + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                array_push(images, {
                                    'layer': 'blouse_hand',
                                    'src': 'mano_left.png',
                                    'zIndex': 12950
                                });
                                if (!empty(current['fabric']['_button_code']) || !empty(button_code)) {
                                    if (empty(current['fabric']['_button_code'])) {
                                        current['fabric']['_button_code'] = button_code;
                                    }
                                    if ((empty(config['blouse_button_close']) || config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_body',
                                            'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                            'zIndex': 26000
                                        });
                                        if (config['blouse_necklines'] != 'pussybow') {
                                            array_push(images, {
                                                'layer': 'blouse_buttons_neck',
                                                'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                                'zIndex': 26000
                                            });
                                        }
                                    }
                                    if (!empty(config['blouse_sleeve_detail']) && config['blouse_sleeve_detail'] == 'inner_strip') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_sleeves',
                                            'src': current['fabric']['_button_code'] + '_' + sleeves_img + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                    if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_pockets',
                                            'src': current['fabric']['_button_code'] + '_' + chest_pocket_img + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                    if (!empty(shoulder_piece) && config['blouse_necklines'] != 'boat_neck') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_shoulder',
                                            'src': current['fabric']['_button_code'] + '_' + shoulder_piece + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                }
                                var contrast, fabric_id, shirt_necklines, sc, img_long;
                                var shirt_neck = extras['blouse_neck'];
                                if (!empty(shirt_neck['contrast']) && !empty(shirt_neck['fabric_id']) && (shirt_neck['contrast'] != 'default' && shirt_neck['contrast'] != 'inner')) {
                                    contrast = shirt_neck['contrast'];
                                    fabric_id = shirt_neck['fabric_id'];
                                    if (config['blouse_necklines'] == 'classic') {
                                        name_img = 'neck_contrast_necklines_classic';
                                    } else if (config['blouse_necklines'] == 'classic_low') {
                                        name_img = 'neck_contrast_necklines_classic_low';
                                    } else if (config['blouse_necklines'] == 'buttons') {
                                        name_img = 'neck_contrast';
                                        if (contrast == 'outer') {
                                            name_img += '_outer';
                                        } else if (contrast == 'full') {
                                            name_img += '_full';
                                        }
                                        name_img += '_necklines_buttons';
                                    } else if (config['blouse_necklines'] == 'lady') {
                                        name_img = 'neck_contrast';
                                        if (contrast == 'outer') {
                                            name_img += '_outer';
                                        } else if (contrast == 'full') {
                                            name_img += '_full';
                                        }
                                        name_img += '_necklines_lady';
                                    } else if (config['blouse_necklines'] == 'open') {
                                        name_img = 'neck_contrast_necklines_open';
                                    }
                                    if (config['blouse_necklines'] == 'classic' || config['blouse_necklines'] == 'classic_low' || config['blouse_necklines'] == 'buttons' || config['blouse_necklines'] == 'lady' || config['blouse_necklines'] == 'open') {
                                        array_push(images, {
                                            'layer': 'blouse_neck_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + name_img + '.png',
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                var shirt_cuff = extras['blouse_cuff'];
                                if (!empty(shirt_cuff['contrast']) && !empty(shirt_cuff['fabric_id']) && (shirt_cuff['contrast'] != 'default' && shirt_cuff['contrast'] != 'inner')) {
                                    fabric_id = shirt_cuff['fabric_id'];
                                    sc = config['blouse_cuffs'];
                                    if (config['blouse_sleeves'] == 'short') {
                                        name_img = 'cuff_contrast_sleeves_short+sleeve_detail_normal';
                                    } else if (config['blouse_sleeves'] == '3_4') {
                                        name_img = 'cuff_contrast_sleeves_3_4+cuffs';
                                        if (sc == 'thin') {
                                            name_img += '_thin';
                                        } else {
                                            name_img += '_classic';
                                        }
                                    } else if (config['blouse_sleeves'] == 'long') {
                                        name_img = 'cuff_contrast_sleeves_long+cuffs';
                                        if (sc == 'straight_2_button' || sc == 'cut_2_buttons' || sc == 'rounded_2_button') {
                                            name_img += '_2_button';
                                        } else if (sc == 'thin') {
                                            name_img += '_thin';
                                        } else {
                                            name_img += '_classic';
                                        }
                                    }
                                    if ((config['blouse_sleeves'] == 'short' || config['blouse_sleeves'] == 'long' || config['blouse_sleeves'] == '3_4') && config['blouse_sleeve_detail'] != 'inner_strip') {
                                        array_push(images, {
                                            'layer': 'blouse_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + name_img + '.png',
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                if (!empty(extras['blouse_threads'])) {
                                    contrast = (empty(extras['blouse_threads']['contrast'])) ? false : extras['blouse_threads']['contrast'];
                                    thread = (empty(extras['blouse_threads']['threads-color'])) ? false : extras['blouse_threads']['threads-color'];
                                    holes = (empty(extras['blouse_threads']['holes-color'])) ? false : extras['blouse_threads']['holes-color'];
                                    if (contrast && (contrast == 'all' || contrast == 'lapel')) {
                                        if (thread) {
                                            if ((config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_' + body_img + '.png',
                                                    'zIndex': 26001
                                                });
                                                if (config['blouse_necklines'] != 'pussybow') {
                                                    array_push(images, {
                                                        'layer': 'blouse_threads_extra',
                                                        'src': thread + '_thread_' + neck_img + '.png',
                                                        'zIndex': 26001
                                                    });
                                                }
                                            }
                                            if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_shoulder_piece_1.png',
                                                    'zIndex': 26001
                                                });
                                            }
                                            if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_pockets_' + config['blouse_pockets'] + '+pockets_type_peak.png',
                                                    'zIndex': 26000
                                                });
                                            }
                                        }
                                        if (holes) {
                                            if ((config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_' + body_img + '.png',
                                                    'zIndex': 25999
                                                });
                                                if (config['blouse_necklines'] != 'pussybow') {
                                                    array_push(images, {
                                                        'layer': 'blouse_holes_extra',
                                                        'src': holes + '_hole_' + neck_img + '.png',
                                                        'zIndex': 25999
                                                    });
                                                }
                                            }
                                            if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_shoulder_piece_1.png',
                                                    'zIndex': 25999
                                                });
                                            }
                                            if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_pockets_' + config['blouse_pockets'] + '+pockets_type_peak.png',
                                                    'zIndex': 26000
                                                });
                                            }
                                        }
                                    }
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    } else {
                        $g.getLayers = function() {
                            return {
                                'blouse_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'blouse_pants': {
                                    'src': '/3d/woman/blouse/pants/#view#/'
                                },
                                'blouse_blouse': {
                                    'src': '/3d/woman/blouse/blouse/#view#/'
                                },
                                'blouse_body': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_neck': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_sleeve': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_chest_pocket': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_shoulder': {
                                    'src': '/3d/woman/blouse/#woman_blouse#_fabric/#view#/'
                                },
                                'blouse_hand': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'blouse_buttons_body': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_neck': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_sleeves': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_pockets': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_buttons_shoulder': {
                                    'src': '/3d/woman/blouse/buttons/'
                                },
                                'blouse_neck_extra': {
                                    'src': '/3d/woman/blouse/'
                                },
                                'blouse_cuff_extra': {
                                    'src': '/3d/woman/blouse/'
                                },
                                'blouse_threads_extra': {
                                    'src': '/3d/woman/blouse/hilos_ojales/'
                                },
                                'blouse_holes_extra': {
                                    'src': '/3d/woman/blouse/hilos_ojales/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_blouse'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            var model = 1;
                            if (!empty(current['model'])) {
                                model = current['model'];
                            }
                            if (!empty(current['button_code'])) {
                                button_code = current['button_code'];
                            } else {
                                button_code = false;
                            }
                            if (current['view'] == 'front') {
                                array_push(images, {
                                    'layer': 'blouse_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                array_push(images, {
                                    'layer': 'blouse_pants',
                                    'src': 'pants_front.png',
                                    'zIndex': 10001
                                });
                                var blouse_button_close = false;
                                if (config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck') {
                                    blouse_button_close = 'back';
                                } else {
                                    if (config['blouse_button_close'] == 'up_to_half') {
                                        blouse_button_close = 'standard';
                                    } else {
                                        blouse_button_close = config['blouse_button_close'];
                                    }
                                }
                                var neck_img = false;
                                neck_img = "necklines_" + config['blouse_necklines'] + "+close_" + blouse_button_close;
                                if (config['blouse_button_close'] != 'up_to_half') {
                                    array_push(images, {
                                        'layer': 'blouse_neck',
                                        'src': neck_img + '.png',
                                        'zIndex': 12000
                                    });
                                } else {
                                    if (config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck') {
                                        array_push(images, {
                                            'layer': 'blouse_neck',
                                            'src': 'necklines_' + config["blouse_necklines"] + '+close_back.png',
                                            'zIndex': 12000
                                        });
                                    } else {
                                        array_push(images, {
                                            'layer': 'blouse_neck',
                                            'src': 'necklines_' + config["blouse_necklines"] + '+close_close_up_to_half.png',
                                            'zIndex': 12000
                                        });
                                    }
                                }
                                var body_img = false;
                                if (config['blouse_necklines'] == 'jewel_neck' || config['blouse_necklines'] == 'boat_neck' || config['blouse_necklines'] == 'u_neck' || config['blouse_necklines'] == 'v_neck') {
                                    body_img = 'fit_' + config['blouse_fit'] + '+bottom_cut_' + config['blouse_bottom_cut'] + '+close_back';
                                } else {
                                    body_img = 'fit_' + config['blouse_fit'] + '+bottom_cut_' + config['blouse_bottom_cut'] + '+close_' + config['blouse_button_close'];
                                }
                                array_push(images, {
                                    'layer': 'blouse_body',
                                    'src': body_img + '.png',
                                    'zIndex': 11000
                                });
                                var sleeves_img = false;
                                if (config['blouse_sleeves'] === 'long' || config['blouse_sleeves'] === 'short') {
                                    if (config['blouse_sleeve_detail'] === 'inner_strip') {
                                        blouse_sleeve_detail = "+sleeve_detail_inner_strip";
                                    } else {
                                        blouse_sleeve_detail = "+sleeve_detail_" + config['blouse_sleeve_detail'];
                                    }
                                } else {
                                    blouse_sleeve_detail = '';
                                }
                                if (config['blouse_sleeves'] === 'short' || config['blouse_sleeves'] === 'without') {
                                    cuffs = '';
                                } else if (config['blouse_sleeves'] === 'long') {
                                    if ((config['blouse_cuffs'] === 'classic' || config['blouse_cuffs'] === 'cut' || config['blouse_cuffs'] === 'rounded') || config['blouse_sleeve_detail'] === 'inner_strip') {
                                        cuffs = "+cuffs_classic";
                                    } else if (config['blouse_cuffs'] === 'straight_2_button' || config['blouse_cuffs'] === 'rounded_2_button' || config['blouse_cuffs'] === 'cut_2_buttons') {
                                        cuffs = "+cuffs_2_button";
                                    } else if (config['blouse_cuffs'] === 'thin') {
                                        cuffs = "+cuffs_thin";
                                    }
                                } else {
                                    if (config['blouse_cuffs'] == 'straight_2_button') {
                                        cuffs = "+cuffs_thin";
                                    } else {
                                        cuffs = "+cuffs_" + config['blouse_cuffs'];
                                    }
                                }
                                sleeves_img = "sleeves_" + config['blouse_sleeves'] + blouse_sleeve_detail + cuffs;
                                array_push(images, {
                                    'layer': 'blouse_sleeve',
                                    'src': sleeves_img + '.png',
                                    'zIndex': 13000
                                });
                                var chest_pocket_img = false;
                                if (config['blouse_pockets'] != '0' && config['blouse_necklines'] != 'u_neck' && config['blouse_necklines'] != 'v_neck') {
                                    chest_pocket_img = "pockets_" + config['blouse_pockets'] + "+pockets_type_" + config['blouse_pockets_type'];
                                    array_push(images, {
                                        'layer': 'blouse_chest_pocket',
                                        'src': chest_pocket_img + '.png',
                                        'zIndex': 14000
                                    });
                                }
                                var shoulder_piece = false;
                                if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                    shoulder_piece = 'shoulder_piece_1';
                                    array_push(images, {
                                        'layer': 'blouse_shoulder',
                                        'src': shoulder_piece + '.png',
                                        'zIndex': 16000
                                    });
                                }
                                array_push(images, {
                                    'layer': 'blouse_hand',
                                    'src': 'mano_left.png',
                                    'zIndex': 12950
                                });
                                if (!empty(current['fabric']['_button_code']) || !empty(button_code)) {
                                    if (empty(current['fabric']['_button_code'])) {
                                        current['fabric']['_button_code'] = button_code;
                                    }
                                    if ((empty(config['blouse_button_close']) || config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_body',
                                            'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                            'zIndex': 26000
                                        });
                                        if (config['blouse_necklines'] != 'pussybow') {
                                            array_push(images, {
                                                'layer': 'blouse_buttons_neck',
                                                'src': current['fabric']['_button_code'] + '_' + neck_img + '.png',
                                                'zIndex': 26000
                                            });
                                        }
                                    }
                                    if (!empty(config['blouse_sleeve_detail']) && config['blouse_sleeve_detail'] == 'inner_strip') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_sleeves',
                                            'src': current['fabric']['_button_code'] + '_' + sleeves_img + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                    if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_pockets',
                                            'src': current['fabric']['_button_code'] + '_' + chest_pocket_img + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                    if (!empty(shoulder_piece) && config['blouse_necklines'] != 'boat_neck') {
                                        array_push(images, {
                                            'layer': 'blouse_buttons_shoulder',
                                            'src': current['fabric']['_button_code'] + '_' + shoulder_piece + '.png',
                                            'zIndex': 26000
                                        });
                                    }
                                }
                                var contrast, fabric_id, shirt_necklines, sc, img_long;
                                var shirt_neck = extras['blouse_neck'];
                                if (!empty(shirt_neck['contrast']) && !empty(shirt_neck['fabric_id']) && (shirt_neck['contrast'] != 'default' && shirt_neck['contrast'] != 'inner')) {
                                    contrast = shirt_neck['contrast'];
                                    fabric_id = shirt_neck['fabric_id'];
                                    if (config['blouse_necklines'] == 'classic') {
                                        name_img = 'neck_contrast_necklines_classic';
                                    } else if (config['blouse_necklines'] == 'classic_low') {
                                        name_img = 'neck_contrast_necklines_classic_low';
                                    } else if (config['blouse_necklines'] == 'buttons') {
                                        name_img = 'neck_contrast';
                                        if (contrast == 'outer') {
                                            name_img += '_outer';
                                        } else if (contrast == 'full') {
                                            name_img += '_full';
                                        }
                                        name_img += '_necklines_buttons';
                                    } else if (config['blouse_necklines'] == 'lady') {
                                        name_img = 'neck_contrast';
                                        if (contrast == 'outer') {
                                            name_img += '_outer';
                                        } else if (contrast == 'full') {
                                            name_img += '_full';
                                        }
                                        name_img += '_necklines_lady';
                                    } else if (config['blouse_necklines'] == 'open') {
                                        name_img = 'neck_contrast_necklines_open';
                                    }
                                    if (config['blouse_necklines'] == 'classic' || config['blouse_necklines'] == 'classic_low' || config['blouse_necklines'] == 'buttons' || config['blouse_necklines'] == 'lady' || config['blouse_necklines'] == 'open') {
                                        array_push(images, {
                                            'layer': 'blouse_neck_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + name_img + '.png',
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                var shirt_cuff = extras['blouse_cuff'];
                                if (!empty(shirt_cuff['contrast']) && !empty(shirt_cuff['fabric_id']) && (shirt_cuff['contrast'] != 'default' && shirt_cuff['contrast'] != 'inner')) {
                                    fabric_id = shirt_cuff['fabric_id'];
                                    sc = config['blouse_cuffs'];
                                    if (config['blouse_sleeves'] == 'short') {
                                        name_img = 'cuff_contrast_sleeves_short+sleeve_detail_normal';
                                    } else if (config['blouse_sleeves'] == '3_4') {
                                        name_img = 'cuff_contrast_sleeves_3_4+cuffs';
                                        if (sc == 'thin') {
                                            name_img += '_thin';
                                        } else {
                                            name_img += '_classic';
                                        }
                                    } else if (config['blouse_sleeves'] == 'long') {
                                        name_img = 'cuff_contrast_sleeves_long+cuffs';
                                        if (sc == 'straight_2_button' || sc == 'cut_2_buttons' || sc == 'rounded_2_button') {
                                            name_img += '_2_button';
                                        } else if (sc == 'thin') {
                                            name_img += '_thin';
                                        } else {
                                            name_img += '_classic';
                                        }
                                    }
                                    if ((config['blouse_sleeves'] == 'short' || config['blouse_sleeves'] == 'long' || config['blouse_sleeves'] == '3_4') && config['blouse_sleeve_detail'] != 'inner_strip') {
                                        array_push(images, {
                                            'layer': 'blouse_cuff_extra',
                                            'src': fabric_id + '_fabric/' + current['view'] + '/' + name_img + '.png',
                                            'zIndex': 17000
                                        });
                                    }
                                }
                                if (!empty(extras['blouse_threads'])) {
                                    contrast = (empty(extras['blouse_threads']['contrast'])) ? false : extras['blouse_threads']['contrast'];
                                    thread = (empty(extras['blouse_threads']['threads-color'])) ? false : extras['blouse_threads']['threads-color'];
                                    holes = (empty(extras['blouse_threads']['holes-color'])) ? false : extras['blouse_threads']['holes-color'];
                                    if (contrast && (contrast == 'all' || contrast == 'lapel')) {
                                        if (thread) {
                                            if ((config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_' + body_img + '.png',
                                                    'zIndex': 26001
                                                });
                                                if (config['blouse_necklines'] != 'pussybow') {
                                                    array_push(images, {
                                                        'layer': 'blouse_threads_extra',
                                                        'src': thread + '_thread_' + neck_img + '.png',
                                                        'zIndex': 26001
                                                    });
                                                }
                                            }
                                            if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_shoulder_piece_1.png',
                                                    'zIndex': 26001
                                                });
                                            }
                                            if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                                array_push(images, {
                                                    'layer': 'blouse_threads_extra',
                                                    'src': thread + '_thread_pockets_' + config['blouse_pockets'] + '+pockets_type_peak.png',
                                                    'zIndex': 26000
                                                });
                                            }
                                        }
                                        if (holes) {
                                            if ((config['blouse_button_close'] != 'hidden') && !(config['blouse_necklines'] === 'jewel_neck' || config['blouse_necklines'] === 'boat_neck' || config['blouse_necklines'] === 'u_neck' || config['blouse_necklines'] === 'v_neck')) {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_' + body_img + '.png',
                                                    'zIndex': 25999
                                                });
                                                if (config['blouse_necklines'] != 'pussybow') {
                                                    array_push(images, {
                                                        'layer': 'blouse_holes_extra',
                                                        'src': holes + '_hole_' + neck_img + '.png',
                                                        'zIndex': 25999
                                                    });
                                                }
                                            }
                                            if (config['blouse_shoulder_piece'] == 'with' && config['blouse_necklines'] != 'boat_neck') {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_shoulder_piece_1.png',
                                                    'zIndex': 25999
                                                });
                                            }
                                            if (!empty(chest_pocket_img) && config['blouse_pockets'] != 0 && config['blouse_pockets_type'] == 'peak') {
                                                array_push(images, {
                                                    'layer': 'blouse_holes_extra',
                                                    'src': holes + '_hole_pockets_' + config['blouse_pockets'] + '+pockets_type_peak.png',
                                                    'zIndex': 26000
                                                });
                                            }
                                        }
                                    }
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    }
                });
            </script>
<?php
}
/*End Blouse Customizer JS*/


/*Start Jacket Customizer JS*/

if($id==15)
{
?>
<script type="text/javascript">
        var garment_opt = {
            "product_type": "woman_jacket",
            "price_detail": {
                "base": <?php echo $price;?>,
                "fabric_woman_jacket": 0
            },
            "current": {
                "config": {
                    "jacket_style": $("input[name=jacket_style]:checked").val(),
                    "jacket_wide_lapel": $("input[name=jacket_wide_lapel]:checked").val(),
                    "jacket_fit": $("input[name=jacket_fit]:checked").val(),
                    "jacket_style_lapel": $("input[name=jacket_style_lapel]:checked").val(),
                    "jacket_buttons": $("input[name=jacket_buttons]:checked").val(),
                    "jacket_length":$("input[name=jacket_length]:checked").val(),
                    "jacket_breast_pocket": $("input[name=jacket_breast_pocket]:checked").val(),
                    "jacket_hip_pockets": $("input[name=jacket_hip_pockets]:checked").val(),
                    "jacket_sleeves": $("input[name=jacket_sleeves]:checked").val(),
                    "jacket_finishing": $("input[name=jacket_finishing]:checked").val(),
                    "jacket_back_style": $("input[name=jacket_back_style]:checked").val()
                    //"jacket_sleeve_buttonholes":$("input[name=jacket_sleeve_buttonholes]:checked").val(),
                },
                "fabric": {
                    "woman_jacket": "<?php echo $_SESSION['fabID'];?>"
                },
                "extras": []
            },
            "errors": [],
            "render_info": {
                "model": 1,
                "size": "390x674:0x0",
                "webview": {
                    "height": 1150,
                    "top": -40,
                    "updown": false
                },
                "mobileview": {
                    "height": 200,
                    "top": -37
                }
            },
            "config": {
                "jacket_style": {
                    "simple": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]"],
                    "crossed": ["disable#config:woman_jacket:jacket_buttons:[1,2,3]", "disable#config:woman_jacket:jacket_finishing", "disable#config:woman_jacket:jacket_hip_pockets:[patched]"],
                    "no_flaps": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]", "disable#config:woman_jacket:jacket_style_lapel", "disable#config:woman_jacket:jacket_wide_lapel"]
                },
                "jacket_wide_lapel": false,
                "jacket_fit": false,
                "jacket_style_lapel": {
                    "round": ["disable#config:woman_jacket:jacket_wide_lapel:[width]", "disable#extra:woman_jacket:jacket_neck"]
                },
                "jacket_buttons": false,
                "jacket_length": false,
                "jacket_breast_pocket": false,
                "jacket_hip_pockets": false,
                "jacket_sleeves": false,
                "jacket_finishing": false,
                "jacket_back_style": false,
                "jacket_sleeve_buttonholes": false
            },
            "fabric": {
                "woman_jacket": {
                    "fabric_type": "suit",
                    "price": {
                        "rank": {
                            "bussines": 9,
                            "executive": 28,
                            "premium": 54
                        }
                    }
                }
            },
            "extra": {
                "jacket_lining": {
                    "extra_type": "lining"
                },
                "jacket_initials": {
                    "extra_type": "initials"
                },
                "jacket_neck": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_jacket:jacket_neck:[color]"],
                        "custom": ["disable#config:woman_jacket:jacket_style_lapel:[round]"]
                    }
                },
                "jacket_patches": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_jacket:jacket_patches:[color]"],
                        "custom": ["required#extra:woman_jacket:jacket_patches:[color]"]
                    }
                },
                "jacket_metal_button": {
                    "extra_type": "colors",
                    "contrast": {
                        "default": ["disable#extra:woman_jacket:jacket_metal_button:[type]", "required#extra:woman_jacket:jacket_threads"],
                        "custom": ["required#extra:woman_jacket:jacket_metal_button:[type]", "disable#extra:woman_jacket:jacket_threads"]
                    }
                },
                "jacket_threads": {
                    "extra_type": "threads",
                    "contrast": {
                        "default": ["disable#extra:woman_jacket:jacket_threads:[threads]", "disable#extra:woman_jacket:jacket_threads:[holes]"],
                        "all": ["required#extra:woman_jacket:jacket_threads:[threads]", "required#extra:woman_jacket:jacket_threads:[holes]", "disable#extra:woman_jacket:jacket_metal_button"]
                    }
                }
            },
            "garment_id": 6976
        }
            ;ready_callbacks.push(function(){
              var $g=new Garment('#garment_form_'+garment_opt.garment_id,garment_opt);
              $g.initGarment();
              window.t4l_inputs_enabled = true;
              var current=$g.getCurrentLayers();
              current['render_info']=$g.render_info;
              current['view']='front';
              if(garment_opt.product_type=='woman_suitpants'||garment_opt.product_type=='woman_suitskirt'){
                $g.getLayers=function(){
                  return{'jacket_model':{'src':'/3d/woman/models/#model#/#view#/'}
                         ,'jacket_pants':{'src':'/3d/woman/jacket/pants/#view#/'}
                         ,'jacket_shirt':{'src':'/3d/woman/jacket/shirt/#view#/'}
                         ,'jacket_body':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_chest_pocket':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_pocket':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_sleeve':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_buttons':{'src':'/3d/woman/jacket/buttons/'}
                         ,'jacket_back_style':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/','position':'back'}
                         ,'jacket_hand':{'src':'/3d/woman/models/#model#/#view#/'}
                         ,'jacket_threads_extra':{'src':'/3d/woman/jacket/hilos_ojales/'}
                         ,'jacket_holes_extra':{'src':'/3d/woman/jacket/hilos_ojales/'}
                         ,'jacket_lining':{'src':'/3d/woman/jacket/linings/'}
                        };
                }
                  $g.renderGetImages=function(){
                    images=[];
                    var config=current['config'];
                    var fabric=current['fabric']['woman_jacket'];
                    var extras=(empty(current['extras']))?[]:current['extras'];
                    if(!empty(current['render_info']['model'])){
                      model=current['render_info']['model'];
                    }else{
                      model=1;
                    }
                    if(current['view']=='front'){
                      show_lining=false;
                      if(!empty(current['_show_lining'])&&!empty(extras['jacket_lining']['lining_id'])){
                        show_lining=true;
                        id_t4l_lining=extras['jacket_lining']['lining_id'];
                      }
                      if(!show_lining){
                        array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                  );
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front.png','zIndex':10001}
                                  );
                        if(empty(current['_is_complex'])){
                          array_push(images,{'layer':'jacket_pants','src':'pants_front.png','zIndex':10001}
                                    );
                        }}
                      if(config['jacket_style']=='crossed'){
                        if(config['jacket_breast_pocket']=='yes'){
                          chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_long';
                          array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                    );
                        }
                        body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                      }else if(config['jacket_style']=='no_flaps'){
                        body_img='style_'+config['jacket_style']+'+fit_'+config['jacket_fit']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                        if(config['jacket_breast_pocket']=='yes'){
                          array_push(images,{'layer':'jacket_chest_pocket','src':'breast_pocket_yes_style_no_flaps.png','zIndex':31000}
                                    );
                        }}
                      else{
                        if(config['jacket_breast_pocket']=='yes'){
                          j_style_lapel=config['jacket_style_lapel'];
                          if(config['jacket_wide_lapel']=='width')j_style_lapel='peak';
                          chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+j_style_lapel+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                          array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                    );
                        }
                        body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                      }
                      array_push(images,{'layer':'jacket_body','src':body_img+'.png','zIndex':30000}
                                );
                      if(config['jacket_hip_pockets']!='no'){
                        if(config['jacket_length']=='short'){
                          jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+length_short';
                        }else{
                          tmp_style=config['jacket_style'];
                          if(tmp_style=='no_flaps')tmp_style='simple';
                          jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+style_'+tmp_style+'+length_long';
                        }
                        array_push(images,{'layer':'jacket_pocket','src':jacket_pocket_img+'.png','zIndex':32000}
                                  );
                      }
                      if(config['jacket_sleeves']=='rolled_up'){
                        array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_'+config['jacket_sleeves']+'.png','zIndex':33000}
                                  );
                      }else{
                        array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_no.png','zIndex':33000}
                                  );
                      }
                      if(show_lining){
                        array_push(images,{'layer':'jacket_lining','src':id_t4l_lining+'_shiny_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19001}
                                  );
                        array_push(images,{'layer':'jacket_body','src':'lining_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19000}
                                  );
                      }
                      if(config['jacket_buttons']&&!empty(current['fabric']['_button_code'])){
                        if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                          array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                    );
                        }else{
                          array_push(images,{'layer':'jacket_buttons','src':current['fabric']['_button_code']+'_'+body_img+'.png','zIndex':43000}
                                    );
                        }}
                      else if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                        array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                  );
                      }
                      if(!show_lining){
                        array_push(images,{'layer':'jacket_hand','src':'mano_left.png','zIndex':32950}
                                  );
                      }
                      if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                        if(!empty(extras['jacket_threads']['threads-color'])){
                          var threads=extras['jacket_threads']['threads-color'];
                        }
                        if(!empty(extras['jacket_threads']['threads'])){
                          var threads=extras['jacket_threads']['threads']['color'];
                        }
                        if(threads){
                          array_push(images,{'layer':'jacket_threads_extra','src':threads+'_thread_'+body_img+'.png','zIndex':43001}
                                    );
                        }}
                      if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                        if(!empty(extras['jacket_threads']['holes-color'])){
                          var holes=extras['jacket_threads']['holes-color'];
                        }
                        if(!empty(extras['jacket_threads']['holes'])){
                          var holes=extras['jacket_threads']['holes']['color'];
                        }
                        if(holes){
                          array_push(images,{'layer':'jacket_holes_extra','src':holes+'_hole_'+body_img+'.png','zIndex':43001}
                                    );
                        }}
                    }else{
                    }
                    return this.parseImages(images,current);
                  }}
              else{
                $g.getLayers=function(){
                  return{'jacket_model':{'src':'/3d/woman/models/#model#/#view#/'}
                         ,'jacket_pants':{'src':'/3d/woman/jacket/pants/#view#/'}
                         ,'jacket_shirt':{'src':'/3d/woman/jacket/shirt/#view#/'}
                         ,'jacket_body':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_chest_pocket':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_pocket':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_sleeve':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                         ,'jacket_buttons':{'src':'/3d/woman/jacket/buttons/'}
                         ,'jacket_back_style':{'src':'/3d/woman/jacket/#woman_jacket#_fabric/#view#/','position':'back'}
                         ,'jacket_hand':{'src':'/3d/woman/models/#model#/#view#/'}
                         ,'jacket_threads_extra':{'src':'/3d/woman/jacket/hilos_ojales/'}
                         ,'jacket_holes_extra':{'src':'/3d/woman/jacket/hilos_ojales/'}
                         ,'jacket_lining':{'src':'/3d/woman/jacket/linings/'}
                        };
                }
                  $g.renderGetImages=function(){
                    images=[];
                    var config=current['config'];
                    var fabric=current['fabric']['woman_jacket'];
                    var extras=(empty(current['extras']))?[]:current['extras'];
                    if(!empty(current['render_info']['model'])){
                      model=current['render_info']['model'];
                    }else{
                      model=1;
                    }
                    if(current['view']=='front'){
                      show_lining=false;
                      if(!empty(current['_show_lining'])&&!empty(extras['jacket_lining']['lining_id'])){
                        show_lining=true;
                        id_t4l_lining=extras['jacket_lining']['lining_id'];
                      }
                      if(!show_lining){
                        array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                  );
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front.png','zIndex':10001}
                                  );
                        if(empty(current['_is_complex'])){
                          array_push(images,{'layer':'jacket_pants','src':'pants_front.png','zIndex':10001}
                                    );
                        }}
                      if(config['jacket_style']=='crossed'){
                        if(config['jacket_breast_pocket']=='yes'){
                          chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_long';
                          array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                    );
                        }
                        body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                      }else if(config['jacket_style']=='no_flaps'){
                        body_img='style_'+config['jacket_style']+'+fit_'+config['jacket_fit']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                        if(config['jacket_breast_pocket']=='yes'){
                          array_push(images,{'layer':'jacket_chest_pocket','src':'breast_pocket_yes_style_no_flaps.png','zIndex':31000}
                                    );
                        }}
                      else{
                        if(config['jacket_breast_pocket']=='yes'){
                          j_style_lapel=config['jacket_style_lapel'];
                          if(config['jacket_wide_lapel']=='width')j_style_lapel='peak';
                          chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+j_style_lapel+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                          array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                    );
                        }
                        body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                      }
                      array_push(images,{'layer':'jacket_body','src':body_img+'.png','zIndex':30000}
                                );
                      if(config['jacket_hip_pockets']!='no'){
                        if(config['jacket_length']=='short'){
                          jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+length_short';
                        }else{
                          tmp_style=config['jacket_style'];
                          if(tmp_style=='no_flaps')tmp_style='simple';
                          jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+style_'+tmp_style+'+length_long';
                        }
                        array_push(images,{'layer':'jacket_pocket','src':jacket_pocket_img+'.png','zIndex':32000}
                                  );
                      }
                      if(config['jacket_sleeves']=='rolled_up'){
                        array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_'+config['jacket_sleeves']+'.png','zIndex':33000}
                                  );
                      }else{
                        array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_no.png','zIndex':33000}
                                  );
                      }
                      if(show_lining){
                        array_push(images,{'layer':'jacket_lining','src':id_t4l_lining+'_shiny_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19001}
                                  );
                        array_push(images,{'layer':'jacket_body','src':'lining_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19000}
                                  );
                      }
                      if(config['jacket_buttons']&&!empty(current['fabric']['_button_code'])){
                        if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                          array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                    );
                        }else{
                          array_push(images,{'layer':'jacket_buttons','src':current['fabric']['_button_code']+'_'+body_img+'.png','zIndex':43000}
                                    );
                        }}
                      else if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                        array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                  );
                      }
                      if(!show_lining){
                        array_push(images,{'layer':'jacket_hand','src':'mano_left.png','zIndex':32950}
                                  );
                      }
                      if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                        if(!empty(extras['jacket_threads']['threads-color'])){
                          var threads=extras['jacket_threads']['threads-color'];
                        }
                        if(!empty(extras['jacket_threads']['threads'])){
                          var threads=extras['jacket_threads']['threads']['color'];
                        }
                        if(threads){
                          array_push(images,{'layer':'jacket_threads_extra','src':threads+'_thread_'+body_img+'.png','zIndex':43001}
                                    );
                        }}
                      if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                        if(!empty(extras['jacket_threads']['holes-color'])){
                          var holes=extras['jacket_threads']['holes-color'];
                        }
                        if(!empty(extras['jacket_threads']['holes'])){
                          var holes=extras['jacket_threads']['holes']['color'];
                        }
                        if(holes){
                          array_push(images,{'layer':'jacket_holes_extra','src':holes+'_hole_'+body_img+'.png','zIndex':43001}
                                    );
                        }}
                    }else{
                    }
                    return this.parseImages(images,current);
                  }}
            });
      </script>
<?php }
/*End Jacket Customizer JS*/


/*Start Buisness Suit Customizer JS*/

else if($id==12)
{
?>

<script type="text/javascript">
        var garment_opt = {
               "product_type": "woman_suitpants",
               "price_detail": {
                   "base": <?php echo $price;?>,
                   "fabric_woman_jacket": 54,
                   "fabric_woman_pants": 17
               },
               "current": {
                   "config": {
                       "jacket_style": $('input[name=jacket_style]:checked').val(),
                       "jacket_wide_lapel": $('input[name=jacket_wide_lapel]:checked').val(),
                       "jacket_fit": $('input[name=jacket_fit]:checked').val(),
                       "jacket_style_lapel": $('input[name=jacket_style_lapel]:checked').val(),
                       "jacket_buttons": $('input[name=jacket_buttons]:checked').val(),
                       "jacket_length": $('input[name=jacket_length]:checked').val(),
                       "jacket_breast_pocket": $('input[name=jacket_breast_pocket]:checked').val(),
                       "jacket_hip_pockets": $('input[name=jacket_hip_pockets]:checked').val(),
                       "jacket_sleeves": $('input[name=jacket_sleeves]:checked').val(),
                       "jacket_finishing": $('input[name=jacket_finishing]:checked').val(),
                       "jacket_back_style":$('input[name=jacket_back_style]:checked').val(),
                      // "jacket_sleeve_buttonholes": $('input[name=coat_style]:checked').val(),
                       "pants_length": $('input[name=pants_length]:checked').val(),
                       "pants_cut": $('input[name=pants_cut]:checked').val(),
                       "pants_pleat": $('input[name=pants_pleat]:checked').val(),
                       "pants_front_closure": $('input[name=pants_front_closure]:checked').val(),
                       "pants_belt_loops": $('input[name=pants_belt_loops]:checked').val(),
                       "pants_crotch": $('input[name=pants_crotch]:checked').val(),
                       "pants_front_pocket": $('input[name=pants_front_pocket]:checked').val(),
                       "pants_back_pocket_num": $('input[name=pants_back_pocket_num]:checked').val(),
                       "pants_cuff": $('input[name=pants_cuff]:checked').val()
                   },
                   "fabric": {
                       "woman_jacket": "<?php echo $_SESSION['fabID'];?>",
                       "woman_pants": "<?php echo $_SESSION['fabID2'];?>"
                   },
                   "extras": []
               },
               "errors": [],
               "render_info": {
                   "model": 1,
                   "size": "390x674:0x0",
                   "webview": {
                       "height": 1300,
                       "top": -40,
                       "updown": true,
                       "toggle": "woman_jacket"
                   },
                   "mobileview": {
                       "height": 235,
                       "top": -37
                   }
               },
               "config": {
                   "jacket_style": {
                       "simple": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]"],
                       "crossed": ["disable#config:woman_jacket:jacket_buttons:[1,2,3]", "disable#config:woman_jacket:jacket_finishing", "disable#config:woman_jacket:jacket_hip_pockets:[patched]"],
                       "no_flaps": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]", "disable#config:woman_jacket:jacket_style_lapel", "disable#config:woman_jacket:jacket_wide_lapel"]
                   },
                   "jacket_wide_lapel": false,
                   "jacket_fit": false,
                   "jacket_style_lapel": {
                       "round": ["disable#config:woman_jacket:jacket_wide_lapel:[width]", "disable#extra:woman_jacket:jacket_neck"]
                   },
                   "jacket_buttons": false,
                   "jacket_length": false,
                   "jacket_breast_pocket": false,
                   "jacket_hip_pockets": false,
                   "jacket_sleeves": false,
                   "jacket_finishing": false,
                   "jacket_back_style": false,
                   "jacket_sleeve_buttonholes": false,
                   "pants_length": false,
                   "pants_cut": false,
                   "pants_pleat": {
                       "pleated": ["disable#config:woman_pants:pants_front_pocket:one_living"],
                       "double_pleats": ["disable#config:woman_pants:pants_front_pocket:[rounded,straight,inclined,one_living]"]
                   },
                   "pants_front_closure": false,
                   "pants_belt_loops": false,
                   "pants_belt_loops_property": false,
                   "pants_crotch": false,
                   "pants_front_pocket": false,
                   "pants_back_pocket_num": [
                       ["disable#config:woman_pants:pants_back_pocket_type"]
                   ],
                   "pants_back_pocket_type": false,
                   "pants_cuff": false
               },
               "fabric": {
                   "woman_jacket": {
                       "fabric_type": "suit",
                       "price": {
                           "rank": {
                               "bussines": 9,
                               "executive": 28,
                               "premium": 54
                           }
                       }
                   },
                   "woman_pants": {
                       "fabric_type": "suit",
                       "price": {
                           "rank": {
                               "bussines": 6,
                               "executive": 12,
                               "premium": 17
                           }
                       }
                   }
               },
               "extra": {
                   "jacket_lining": {
                       "extra_type": "lining"
                   },
                   "jacket_initials": {
                       "extra_type": "initials"
                   },
                   "jacket_neck": {
                       "extra_type": "colors",
                       "contrast": {
                           "default": ["disable#extra:woman_jacket:jacket_neck:[color]"],
                           "custom": ["disable#config:woman_jacket:jacket_style_lapel:[round]"]
                       }
                   },
                   "jacket_patches": {
                       "extra_type": "colors",
                       "contrast": {
                           "default": ["disable#extra:woman_jacket:jacket_patches:[color]"],
                           "custom": ["required#extra:woman_jacket:jacket_patches:[color]"]
                       }
                   },
                   "jacket_metal_button": {
                       "extra_type": "colors",
                       "contrast": {
                           "default": ["disable#extra:woman_jacket:jacket_metal_button:[type]", "required#extra:woman_jacket:jacket_threads"],
                           "custom": ["required#extra:woman_jacket:jacket_metal_button:[type]", "disable#extra:woman_jacket:jacket_threads"]
                       }
                   },
                   "jacket_threads": {
                       "extra_type": "threads",
                       "contrast": {
                           "default": ["disable#extra:woman_jacket:jacket_threads:[threads]", "disable#extra:woman_jacket:jacket_threads:[holes]"],
                           "all": ["required#extra:woman_jacket:jacket_threads:[threads]", "required#extra:woman_jacket:jacket_threads:[holes]", "disable#extra:woman_jacket:jacket_metal_button"]
                       }
                   }
               },
               "garment_id": 7348
           }
            ;ready_callbacks.push(function(){
              var $g=new Garment('#garment_form_'+garment_opt.garment_id,garment_opt);
              $g.initGarment();
              window.t4l_inputs_enabled = true;
              var current=$g.getCurrentLayers();
              current['render_info']=$g.render_info;
              current['view']='front';
              if(garment_opt.product_type=='woman_suitpants'||garment_opt.product_type=='woman_suitskirt'){
                $g.getLayers=function(){
                  layers1=this.renderGetLayersWomanPants();
                  layers2=this.renderGetLayersWomanJacket();
                  return array_merge(layers1,layers2);
                }
                  $g.renderGetImages=function(){
                    current['_is_complex']=true;
                    var active_block=current['config']['_active_block'];
                    if(empty(active_block))active_block='woman_jacket';
                    images=[];
                    if(active_block=='woman_jacket'){
                      render=this.renderGetImagesWomanJacket(current);
                    }else{
                      render=[];
                    }
                    render2=this.renderGetImagesWomanPants(current);
                    if(active_block=='woman_pants'){
                      array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                );
                      config=current['config'];
                      if(config['pants_crotch']=='high'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_high.png','zIndex':10001}
                                  );
                      }else if(config['pants_crotch']=='medium'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_medium.png','zIndex':10001}
                                  );
                      }else if(config['pants_crotch']=='low'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_low.png','zIndex':10001}
                                  );
                      }}
                    render3=this.parseImages(images,current);
                    return array_merge(render,render2,render3);
                  }
                    $g.parseLayers=function(layers,current){
                      model=1;
                      if(!empty(current['render_info']['model']))model=current['render_info']['model'];for(k in layers){
                        var opt=layers[k];for(key in current['fabric']){
                          var fabric_id=current['fabric'][key];
                          if(strpos(key,'_')!==false){
                            layers[k]['src']=str_replace('#'+key+'#',fabric_id,layers[k]['src']);
                          }}
                        layers[k]['src']=str_replace('#view#',current['view'],layers[k]['src']);
                        layers[k]['src']=str_replace('#model#',model,layers[k]['src']);
                      }
                      return layers;
                    }
                      $g.renderGetImagesWomanJacket=function(){
                        images=[];
                        var config=current['config'];
                        var fabric=current['fabric']['woman_jacket'];
                        var extras=(empty(current['extras']))?[]:current['extras'];
                        if(!empty(current['render_info']['model'])){
                          model=current['render_info']['model'];
                        }else{
                          model=1;
                        }
                        if(current['view']=='front'){
                          show_lining=false;
                          if(!empty(current['_show_lining'])&&!empty(extras['jacket_lining']['lining_id'])){
                            show_lining=true;
                            id_t4l_lining=extras['jacket_lining']['lining_id'];
                          }
                          if(!show_lining){
                            array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                      );
                            array_push(images,{'layer':'jacket_shirt','src':'shirt_front.png','zIndex':10001}
                                      );
                            if(empty(current['_is_complex'])){
                              array_push(images,{'layer':'jacket_pants','src':'pants_front.png','zIndex':10001}
                                        );
                            }}
                          if(config['jacket_style']=='crossed'){
                            if(config['jacket_breast_pocket']=='yes'){
                              chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_long';
                              array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                        );
                            }
                            body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                          }else if(config['jacket_style']=='no_flaps'){
                            body_img='style_'+config['jacket_style']+'+fit_'+config['jacket_fit']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                            if(config['jacket_breast_pocket']=='yes'){
                              array_push(images,{'layer':'jacket_chest_pocket','src':'breast_pocket_yes_style_no_flaps.png','zIndex':31000}
                                        );
                            }}
                          else{
                            if(config['jacket_breast_pocket']=='yes'){
                              j_style_lapel=config['jacket_style_lapel'];
                              if(config['jacket_wide_lapel']=='width')j_style_lapel='peak';
                              chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+j_style_lapel+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                              array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                        );
                            }
                            body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                          }
                          array_push(images,{'layer':'jacket_body','src':body_img+'.png','zIndex':30000}
                                    );
                          if(config['jacket_hip_pockets']!='no'){
                            if(config['jacket_length']=='short'){
                              jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+length_short';
                            }else{
                              tmp_style=config['jacket_style'];
                              if(tmp_style=='no_flaps')tmp_style='simple';
                              jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+style_'+tmp_style+'+length_long';
                            }
                            array_push(images,{'layer':'jacket_pocket','src':jacket_pocket_img+'.png','zIndex':32000}
                                      );
                          }
                          if(config['jacket_sleeves']=='rolled_up'){
                            array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_'+config['jacket_sleeves']+'.png','zIndex':33000}
                                      );
                          }else{
                            array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_no.png','zIndex':33000}
                                      );
                          }
                          if(show_lining){
                            array_push(images,{'layer':'jacket_lining','src':id_t4l_lining+'_shiny_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19001}
                                      );
                            array_push(images,{'layer':'jacket_body','src':'lining_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19000}
                                      );
                          }
                          if(config['jacket_buttons']&&!empty(current['fabric']['_button_code'])){
                            if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                              array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                        );
                            }else{
                              array_push(images,{'layer':'jacket_buttons','src':current['fabric']['_button_code']+'_'+body_img+'.png','zIndex':43000}
                                        );
                            }}
                          else if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                            array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                      );
                          }
                          if(!show_lining){
                            array_push(images,{'layer':'jacket_hand','src':'mano_left.png','zIndex':32950}
                                      );
                          }
                          if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                            if(!empty(extras['jacket_threads']['threads-color'])){
                              var threads=extras['jacket_threads']['threads-color'];
                            }
                            if(!empty(extras['jacket_threads']['threads'])){
                              var threads=extras['jacket_threads']['threads']['color'];
                            }
                            if(threads){
                              array_push(images,{'layer':'jacket_threads_extra','src':threads+'_thread_'+body_img+'.png','zIndex':43001}
                                        );
                            }}
                          if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                            if(!empty(extras['jacket_threads']['holes-color'])){
                              var holes=extras['jacket_threads']['holes-color'];
                            }
                            if(!empty(extras['jacket_threads']['holes'])){
                              var holes=extras['jacket_threads']['holes']['color'];
                            }
                            if(holes){
                              array_push(images,{'layer':'jacket_holes_extra','src':holes+'_hole_'+body_img+'.png','zIndex':43001}
                                        );
                            }}
                        }else{
                        }
                        return this.parseImages(images,current);
                      }
                        $g.renderGetImagesWomanPants=function(){
                          images=[];
                          config=current['config'];
                          fabric=current['fabric']['woman_pants'];
                          if(!empty(current['model'])){
                            model=current['model'];
                          }else{
                            model=1;
                          }
                          if(current['view']=='front'){
                            if(empty(current['_is_complex'])){
                              array_push(images,{'layer':'pants_model','src':'model_front.png','zIndex':10000}
                                        );
                              if(config['pants_crotch']=='high'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_high.png','zIndex':10001}
                                          );
                              }else if(config['pants_crotch']=='medium'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_medium.png','zIndex':10001}
                                          );
                              }else if(config['pants_crotch']=='low'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_low.png','zIndex':10001}
                                          );
                              }}
                            body_img='length_'+config['pants_length']+'+cut_'+config['pants_cut']+'+crotch_'+config['pants_crotch'];
                            array_push(images,{'layer':'pants_body','src':body_img+'.png','zIndex':20000}
                                      );
                            if(config['pants_pleat']!='no_pleats'){
                              pleat='pleat_'+config['pants_pleat']+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_pleat','src':pleat+'.png','zIndex':21000}
                                        );
                            }
                            if(!empty(config['pants_belt_loops_property'])){
                              high='high';
                            }else{
                              high='standard';
                            }
                            front_closure='front_closure_'+config['pants_front_closure']+'+belt_loops_'+high+'+crotch_'+config['pants_crotch'];
                            array_push(images,{'layer':'pants_closure','src':front_closure+'.png','zIndex':22000}
                                      );
                            if(config['pants_belt_loops']!='without'){
                              front_belt='belt_loops_'+high+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_belt','src':front_belt+'.png','zIndex':23000}
                                        );
                            }
                            if(config['pants_front_pocket']!='no'){
                              front_pocket='front_pocket_'+config['pants_front_pocket']+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_pocket','src':front_pocket+'.png','zIndex':21500}
                                        );
                            }
                            if(config['pants_cuff']!='without'){
                              cuff='cuff_'+config['pants_cuff']+'+'+'length_'+config['pants_length']+'+cut_'+config['pants_cut'];
                              array_push(images,{'layer':'pants_cuff','src':cuff+'.png','zIndex':23500}
                                        );
                            }
                            if((config['pants_front_closure']=='moved_button'||config['pants_front_closure']=='center_button')&&!empty(current['fabric']['_button_code'])){
                              array_push(images,{'layer':'pants_buttons','src':current['fabric']['_button_code']+'_'+front_closure+'.png','zIndex':24000}
                                        );
                            }}
                          else{
                          }
                          return this.parseImages(images,current);
                        }
                          $g.renderGetLayersWomanJacket=function(){
                            return{'jacket_model':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                   ,'jacket_pants':{'src':cdn_host+'3d/woman/jacket/pants/#view#/'}
                                   ,'jacket_shirt':{'src':cdn_host+'3d/woman/jacket/shirt/#view#/'}
                                   ,'jacket_body':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_chest_pocket':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_pocket':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_sleeve':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_buttons':{'src':cdn_host+'3d/woman/jacket/buttons/'}
                                   ,'jacket_back_style':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/','position':'back'}
                                   ,'jacket_hand':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                   ,'jacket_threads_extra':{'src':cdn_host+'3d/woman/jacket/hilos_ojales/'}
                                   ,'jacket_holes_extra':{'src':cdn_host+'3d/woman/jacket/hilos_ojales/'}
                                   ,'jacket_lining':{'src':cdn_host+'3d/woman/jacket/linings/'}
                                  };
                          }
                            $g.renderGetLayersWomanPants=function(){
                              return{'pants_model':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                     ,'pants_shirt':{'src':cdn_host+'/3d/woman/pants/shirt/#view#/'}
                                     ,'pants_body':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_pleat':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_closure':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_belt':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_pocket':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_cuff':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_buttons':{'src':cdn_host+'3d/woman/pants/buttons/'}
                                     ,'pants_hand':{'src':'model/#view#/'}
                                     ,}
                                ;}
              }else{
                $g.getLayers=function(){
                  layers1=this.renderGetLayersWomanPants();
                  layers2=this.renderGetLayersWomanJacket();
                  return array_merge(layers1,layers2);
                }
                  $g.renderGetImages=function(){
                    current['_is_complex']=true;
                    var active_block=current['config']['_active_block'];
                    if(empty(active_block))active_block='woman_jacket';
                    images=[];
                    if(active_block=='woman_jacket'){
                      render=this.renderGetImagesWomanJacket(current);
                    }else{
                      render=[];
                    }
                    render2=this.renderGetImagesWomanPants(current);
                    if(active_block=='woman_pants'){
                      array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                );
                      config=current['config'];
                      if(config['pants_crotch']=='high'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_high.png','zIndex':10001}
                                  );
                      }else if(config['pants_crotch']=='medium'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_medium.png','zIndex':10001}
                                  );
                      }else if(config['pants_crotch']=='low'){
                        array_push(images,{'layer':'jacket_shirt','src':'shirt_front_low.png','zIndex':10001}
                                  );
                      }}
                    render3=this.parseImages(images,current);
                    return array_merge(render,render2,render3);
                  }
                    $g.parseLayers=function(layers,current){
                      model=1;
                      if(!empty(current['render_info']['model']))model=current['render_info']['model'];for(k in layers){
                        var opt=layers[k];for(key in current['fabric']){
                          var fabric_id=current['fabric'][key];
                          if(strpos(key,'_')!==false){
                            layers[k]['src']=str_replace('#'+key+'#',fabric_id,layers[k]['src']);
                          }}
                        layers[k]['src']=str_replace('#view#',current['view'],layers[k]['src']);
                        layers[k]['src']=str_replace('#model#',model,layers[k]['src']);
                      }
                      return layers;
                    }
                      $g.renderGetImagesWomanJacket=function(){
                        images=[];
                        var config=current['config'];
                        var fabric=current['fabric']['woman_jacket'];
                        var extras=(empty(current['extras']))?[]:current['extras'];
                        if(!empty(current['render_info']['model'])){
                          model=current['render_info']['model'];
                        }else{
                          model=1;
                        }
                        if(current['view']=='front'){
                          show_lining=false;
                          if(!empty(current['_show_lining'])&&!empty(extras['jacket_lining']['lining_id'])){
                            show_lining=true;
                            id_t4l_lining=extras['jacket_lining']['lining_id'];
                          }
                          if(!show_lining){
                            array_push(images,{'layer':'jacket_model','src':'model_front.png','zIndex':10000}
                                      );
                            array_push(images,{'layer':'jacket_shirt','src':'shirt_front.png','zIndex':10001}
                                      );
                            if(empty(current['_is_complex'])){
                              array_push(images,{'layer':'jacket_pants','src':'pants_front.png','zIndex':10001}
                                        );
                            }}
                          if(config['jacket_style']=='crossed'){
                            if(config['jacket_breast_pocket']=='yes'){
                              chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_long';
                              array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                        );
                            }
                            body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                          }else if(config['jacket_style']=='no_flaps'){
                            body_img='style_'+config['jacket_style']+'+fit_'+config['jacket_fit']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                            if(config['jacket_breast_pocket']=='yes'){
                              array_push(images,{'layer':'jacket_chest_pocket','src':'breast_pocket_yes_style_no_flaps.png','zIndex':31000}
                                        );
                            }}
                          else{
                            if(config['jacket_breast_pocket']=='yes'){
                              j_style_lapel=config['jacket_style_lapel'];
                              if(config['jacket_wide_lapel']=='width')j_style_lapel='peak';
                              chest_img='breast_pocket_yes_style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+style_lapel_'+j_style_lapel+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length'];
                              array_push(images,{'layer':'jacket_chest_pocket','src':chest_img+'.png','zIndex':31000}
                                        );
                            }
                            body_img='style_'+config['jacket_style']+'+wide_lapel_'+config['jacket_wide_lapel']+'+fit_'+config['jacket_fit']+'+style_lapel_'+config['jacket_style_lapel']+'+buttons_'+config['jacket_buttons']+'+length_'+config['jacket_length']+'+finishing_'+config['jacket_finishing'];
                          }
                          array_push(images,{'layer':'jacket_body','src':body_img+'.png','zIndex':30000}
                                    );
                          if(config['jacket_hip_pockets']!='no'){
                            if(config['jacket_length']=='short'){
                              jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+length_short';
                            }else{
                              tmp_style=config['jacket_style'];
                              if(tmp_style=='no_flaps')tmp_style='simple';
                              jacket_pocket_img='hip_pockets_'+config['jacket_hip_pockets']+'+fit_'+config['jacket_fit']+'+style_'+tmp_style+'+length_long';
                            }
                            array_push(images,{'layer':'jacket_pocket','src':jacket_pocket_img+'.png','zIndex':32000}
                                      );
                          }
                          if(config['jacket_sleeves']=='rolled_up'){
                            array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_'+config['jacket_sleeves']+'.png','zIndex':33000}
                                      );
                          }else{
                            array_push(images,{'layer':'jacket_sleeve','src':'sleeves+sleeves_no.png','zIndex':33000}
                                      );
                          }
                          if(show_lining){
                            array_push(images,{'layer':'jacket_lining','src':id_t4l_lining+'_shiny_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19001}
                                      );
                            array_push(images,{'layer':'jacket_body','src':'lining_style_'+config['jacket_style']+'+length_'+config['jacket_length']+'.png','zIndex':19000}
                                      );
                          }
                          if(config['jacket_buttons']&&!empty(current['fabric']['_button_code'])){
                            if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                              array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                        );
                            }else{
                              array_push(images,{'layer':'jacket_buttons','src':current['fabric']['_button_code']+'_'+body_img+'.png','zIndex':43000}
                                        );
                            }}
                          else if(!empty(extras['jacket_metal_button']['contrast'])&&extras['jacket_metal_button']['contrast']=='custom'&&!empty(extras['jacket_metal_button']['type'])){
                            array_push(images,{'layer':'jacket_buttons','src':extras['jacket_metal_button']['type']+'_'+body_img+'.png','zIndex':43000}
                                      );
                          }
                          if(!show_lining){
                            array_push(images,{'layer':'jacket_hand','src':'mano_left.png','zIndex':32950}
                                      );
                          }
                          if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                            if(!empty(extras['jacket_threads']['threads-color'])){
                              var threads=extras['jacket_threads']['threads-color'];
                            }
                            if(!empty(extras['jacket_threads']['threads'])){
                              var threads=extras['jacket_threads']['threads']['color'];
                            }
                            if(threads){
                              array_push(images,{'layer':'jacket_threads_extra','src':threads+'_thread_'+body_img+'.png','zIndex':43001}
                                        );
                            }}
                          if(!empty(extras['jacket_threads']['contrast'])&&extras['jacket_threads']['contrast']=='all'){
                            if(!empty(extras['jacket_threads']['holes-color'])){
                              var holes=extras['jacket_threads']['holes-color'];
                            }
                            if(!empty(extras['jacket_threads']['holes'])){
                              var holes=extras['jacket_threads']['holes']['color'];
                            }
                            if(holes){
                              array_push(images,{'layer':'jacket_holes_extra','src':holes+'_hole_'+body_img+'.png','zIndex':43001}
                                        );
                            }}
                        }else{
                        }
                        return this.parseImages(images,current);
                      }
                        $g.renderGetImagesWomanPants=function(){
                          images=[];
                          config=current['config'];
                          fabric=current['fabric']['woman_pants'];
                          if(!empty(current['model'])){
                            model=current['model'];
                          }else{
                            model=1;
                          }
                          if(current['view']=='front'){
                            if(empty(current['_is_complex'])){
                              array_push(images,{'layer':'pants_model','src':'model_front.png','zIndex':10000}
                                        );
                              if(config['pants_crotch']=='high'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_high.png','zIndex':10001}
                                          );
                              }else if(config['pants_crotch']=='medium'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_medium.png','zIndex':10001}
                                          );
                              }else if(config['pants_crotch']=='low'){
                                array_push(images,{'layer':'pants_shirt','src':'shirt_front_low.png','zIndex':10001}
                                          );
                              }}
                            body_img='length_'+config['pants_length']+'+cut_'+config['pants_cut']+'+crotch_'+config['pants_crotch'];
                            array_push(images,{'layer':'pants_body','src':body_img+'.png','zIndex':20000}
                                      );
                            if(config['pants_pleat']!='no_pleats'){
                              pleat='pleat_'+config['pants_pleat']+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_pleat','src':pleat+'.png','zIndex':21000}
                                        );
                            }
                            if(!empty(config['pants_belt_loops_property'])){
                              high='high';
                            }else{
                              high='standard';
                            }
                            front_closure='front_closure_'+config['pants_front_closure']+'+belt_loops_'+high+'+crotch_'+config['pants_crotch'];
                            array_push(images,{'layer':'pants_closure','src':front_closure+'.png','zIndex':22000}
                                      );
                            if(config['pants_belt_loops']!='without'){
                              front_belt='belt_loops_'+high+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_belt','src':front_belt+'.png','zIndex':23000}
                                        );
                            }
                            if(config['pants_front_pocket']!='no'){
                              front_pocket='front_pocket_'+config['pants_front_pocket']+'+crotch_'+config['pants_crotch'];
                              array_push(images,{'layer':'pants_pocket','src':front_pocket+'.png','zIndex':21500}
                                        );
                            }
                            if(config['pants_cuff']!='without'){
                              cuff='cuff_'+config['pants_cuff']+'+'+'length_'+config['pants_length']+'+cut_'+config['pants_cut'];
                              array_push(images,{'layer':'pants_cuff','src':cuff+'.png','zIndex':23500}
                                        );
                            }
                            if((config['pants_front_closure']=='moved_button'||config['pants_front_closure']=='center_button')&&!empty(current['fabric']['_button_code'])){
                              array_push(images,{'layer':'pants_buttons','src':current['fabric']['_button_code']+'_'+front_closure+'.png','zIndex':24000}
                                        );
                            }}
                          else{
                          }
                          return this.parseImages(images,current);
                        }
                          $g.renderGetLayersWomanJacket=function(){
                            return{'jacket_model':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                   ,'jacket_pants':{'src':cdn_host+'3d/woman/jacket/pants/#view#/'}
                                   ,'jacket_shirt':{'src':cdn_host+'3d/woman/jacket/shirt/#view#/'}
                                   ,'jacket_body':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_chest_pocket':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_pocket':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_sleeve':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'}
                                   ,'jacket_buttons':{'src':cdn_host+'3d/woman/jacket/buttons/'}
                                   ,'jacket_back_style':{'src':cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/','position':'back'}
                                   ,'jacket_hand':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                   ,'jacket_threads_extra':{'src':cdn_host+'3d/woman/jacket/hilos_ojales/'}
                                   ,'jacket_holes_extra':{'src':cdn_host+'3d/woman/jacket/hilos_ojales/'}
                                   ,'jacket_lining':{'src':cdn_host+'3d/woman/jacket/linings/'}
                                  };
                          }
                            $g.renderGetLayersWomanPants=function(){
                              return{'pants_model':{'src':cdn_host+'3d/woman/models/#model#/#view#/'}
                                     ,'pants_shirt':{'src':cdn_host+'3d/woman/pants/shirt/#view#/'}
                                     ,'pants_body':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_pleat':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_closure':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_belt':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_pocket':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_cuff':{'src':cdn_host+'3d/woman/pants/#woman_pants#_fabric/#view#/'}
                                     ,'pants_buttons':{'src':cdn_host+'3d/woman/pants/buttons/'}
                                     ,'pants_hand':{'src':'model/#view#/'}
                                     ,}
                                ;}
              }}
                                 );
      </script>

<?php

}
/*End Buisness Suit Customizer JS*/

/*Start Pant Customizer JS*/
else if($id==10)
{
?>
<script type="text/javascript">
                var garment_opt = {
                    "product_type": "woman_pants",
                    "price_detail": {
                        "base": <?php echo $price;?>,
                        "fabric_woman_pants": 0
                    },
                    "current": {
                        "config": {
                            "pants_length":  $("input[name=pants_length]:checked").val(),
                            "pants_cut":  $("input[name=pants_cut]:checked").val(),
                            "pants_pleat":  $("input[name=pants_pleat]:checked").val(),
                            "pants_front_closure":  $("input[name=pants_front_closure]:checked").val(),
                            "pants_belt_loops":  $("input[name=pants_belt_loops]:checked").val(),
                            "pants_crotch":  $("input[name=pants_crotch]:checked").val(),
                            "pants_front_pocket":  $("input[name=pants_front_pocket]:checked").val(),
                            "pants_back_pocket_num":  $("input[name=pants_back_pocket_num]:checked").val(),
                            "pants_cuff":  $("input[name=pants_cuff]:checked").val(),
                            "pants_back_pocket_type":$("input[name=pants_back_pocket_type]:checked").val(),
                        },
                        "fabric": {
                            "woman_pants": "<?php echo $_SESSION['fabID']; ?>"
                        },
                        "extras": []
                    },
                    "errors": [],
                    "render_info": {
                        "model": 1,
                        "size": "390x674:0x250",
                        "webview": {
                            "height": 775,
                            "top": -380,
                            "updown": false
                        },
                        "mobileview": {
                            "height": 270,
                            "top": -115
                        }
                    },
                    "config": {
                        "pants_length": false,
                        "pants_cut": false,
                        "pants_pleat": {
                            "pleated": ["disable#config:woman_pants:pants_front_pocket:one_living"],
                            "double_pleats": ["disable#config:woman_pants:pants_front_pocket:[rounded,straight,inclined,one_living]"]
                        },
                        "pants_front_closure": false,
                        "pants_belt_loops": false,
                        "pants_belt_loops_property": false,
                        "pants_crotch": false,
                        "pants_front_pocket": false,
                        "pants_back_pocket_num": [
                            ["disable#config:woman_pants:pants_back_pocket_type"]
                        ],
                        "pants_back_pocket_type": false,
                        "pants_cuff": false
                    },
                    "fabric": {
                        "woman_pants": {
                            "fabric_type": "suit",
                            "price": {
                                "rank": {
                                    "bussines": 6,
                                    "executive": 12,
                                    "premium": 17
                                }
                            }
                        }
                    },
                    "garment_id": 9369
                };
                ready_callbacks.push(function() {
                    var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
                    $g.initGarment();
                    window.t4l_inputs_enabled = true;
                    var current = $g.getCurrentLayers();
                    current['render_info'] = $g.render_info;
                    current['view'] = 'front';
                    if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                        $g.getLayers = function() {
                            return {
                                'pants_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'pants_shirt': {
                                    'src': '/3d/woman/pants/shirt/#view#/'
                                },
                                'pants_body': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_pleat': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_closure': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_belt': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_pocket': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_cuff': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_buttons': {
                                    'src': '/3d/woman/pants/buttons/'
                                },
                                'pants_hand': {
                                    'src': 'model/#view#/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_pants'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (empty(current['_is_complex'])) {
                                    array_push(images, {
                                        'layer': 'pants_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['pants_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['pants_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['pants_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                body_img = 'length_' + config['pants_length'] + '+cut_' + config['pants_cut'] + '+crotch_' + config['pants_crotch'];
                                array_push(images, {
                                    'layer': 'pants_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (config['pants_pleat'] != 'no_pleats') {
                                    pleat = 'pleat_' + config['pants_pleat'] + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_pleat',
                                        'src': pleat + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['pants_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                front_closure = 'front_closure_' + config['pants_front_closure'] + '+belt_loops_' + high + '+crotch_' + config['pants_crotch'];
                                array_push(images, {
                                    'layer': 'pants_closure',
                                    'src': front_closure + '.png',
                                    'zIndex': 22000
                                });
                                if (config['pants_belt_loops'] != 'without') {
                                    front_belt = 'belt_loops_' + high + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_belt',
                                        'src': front_belt + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if (config['pants_front_pocket'] != 'no') {
                                    front_pocket = 'front_pocket_' + config['pants_front_pocket'] + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_pocket',
                                        'src': front_pocket + '.png',
                                        'zIndex': 21500
                                    });
                                }
                                if (config['pants_cuff'] != 'without') {
                                    cuff = 'cuff_' + config['pants_cuff'] + '+' + 'length_' + config['pants_length'] + '+cut_' + config['pants_cut'];
                                    array_push(images, {
                                        'layer': 'pants_cuff',
                                        'src': cuff + '.png',
                                        'zIndex': 23500
                                    });
                                }
                                if ((config['pants_front_closure'] == 'moved_button' || config['pants_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'pants_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + front_closure + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    } else {
                        $g.getLayers = function() {
                            return {
                                'pants_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'pants_shirt': {
                                    'src': '/3d/woman/pants/shirt/#view#/'
                                },
                                'pants_body': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_pleat': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_closure': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_belt': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_pocket': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_cuff': {
                                    'src': '/3d/woman/pants/#woman_pants#_fabric/#view#/'
                                },
                                'pants_buttons': {
                                    'src': '/3d/woman/pants/buttons/'
                                },
                                'pants_hand': {
                                    'src': 'model/#view#/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_pants'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (empty(current['_is_complex'])) {
                                    array_push(images, {
                                        'layer': 'pants_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['pants_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['pants_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['pants_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'pants_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                body_img = 'length_' + config['pants_length'] + '+cut_' + config['pants_cut'] + '+crotch_' + config['pants_crotch'];
                                array_push(images, {
                                    'layer': 'pants_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (config['pants_pleat'] != 'no_pleats') {
                                    pleat = 'pleat_' + config['pants_pleat'] + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_pleat',
                                        'src': pleat + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['pants_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                front_closure = 'front_closure_' + config['pants_front_closure'] + '+belt_loops_' + high + '+crotch_' + config['pants_crotch'];
                                array_push(images, {
                                    'layer': 'pants_closure',
                                    'src': front_closure + '.png',
                                    'zIndex': 22000
                                });
                                if (config['pants_belt_loops'] != 'without') {
                                    front_belt = 'belt_loops_' + high + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_belt',
                                        'src': front_belt + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if (config['pants_front_pocket'] != 'no') {
                                    front_pocket = 'front_pocket_' + config['pants_front_pocket'] + '+crotch_' + config['pants_crotch'];
                                    array_push(images, {
                                        'layer': 'pants_pocket',
                                        'src': front_pocket + '.png',
                                        'zIndex': 21500
                                    });
                                }
                                if (config['pants_cuff'] != 'without') {
                                    cuff = 'cuff_' + config['pants_cuff'] + '+' + 'length_' + config['pants_length'] + '+cut_' + config['pants_cut'];
                                    array_push(images, {
                                        'layer': 'pants_cuff',
                                        'src': cuff + '.png',
                                        'zIndex': 23500
                                    });
                                }
                                if ((config['pants_front_closure'] == 'moved_button' || config['pants_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'pants_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + front_closure + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    }
                });
    </script>
<?php
}
/*End Pant Customizer JS*/


/*Start Skirt Cutsomizer  JS*/

else if($id==11)
{
?>

<script type="text/javascript">
                var garment_opt = {
                    "product_type": "woman_skirt",
                    "price_detail": {
                        "base": <?php echo $price;?>,
                        "fabric_woman_skirt": 0
                    },
                    "current": {
                        "config": {
                            "skirt_style": $('input[name=skirt_style]:checked').val(),
                            "skirt_crotch": $('input[name=skirt_crotch]:checked').val(),
                            "skirt_length": $('input[name=skirt_length]:checked').val(),
                            "skirt_cut": $('input[name=skirt_cut]:checked').val(),
                            "skirt_front_closure": $('input[name=skirt_front_closure]:checked').val(),
                            "skirt_belt_loops": $('input[name=skirt_belt_loops]:checked').val(),
                            "skirt_belt_loops_property": $('input[name=skirt_belt_loops_property]:checked').val(),
                            "skirt_front_pocket": $('input[name=skirt_front_pocket]:checked').val(),
                            "skirt_back_pocket_num": $('input[name=skirt_back_pocket_num]:checked').val(),
                            "skirt_back_pocket_type": $('input[name=skirt_back_pocket_type]:checked').val()
                        },
                        "fabric": {
                            "woman_skirt": "<?php echo $_SESSION['fabID']; ?>"
                        },
                        "extras": []
                    },
                    "errors": [],
                    "render_info": {
                        "model": 1,
                        "size": "390x674:0x250",
                        "webview": {
                            "height": 750,
                            "top": -380,
                            "updown": false
                        },
                        "mobileview": {
                            "height": 240,
                            "top": -75
                        }
                    },
                    "config": {
                        "skirt_style": {
                            "flight": ["disable#config:woman_skirt:skirt_cut", "disable#config:woman_skirt:skirt_front_pocket", "disable#config:woman_skirt:skirt_back_pocket_num", "disable#config:woman_skirt:skirt_back_pocket_type"]
                        },
                        "skirt_crotch": false,
                        "skirt_length": false,
                        "skirt_cut": {
                            "side": ["disable#config:woman_skirt:skirt_front_closure:center_no_button"]
                        },
                        "skirt_front_closure": {
                            "center_no_button": ["disable#config:woman_skirt:skirt_cut:side"]
                        },
                        "skirt_belt_loops": false,
                        "skirt_belt_loops_property": false,
                        "skirt_front_pocket": false,
                        "skirt_back_pocket_num": [
                            ["disable#config:woman_skirt:skirt_back_pocket_type"]
                        ],
                        "skirt_back_pocket_type": false
                    },
                    "fabric": {
                        "woman_skirt": {
                            "fabric_type": "suit",
                            "price": {
                                "rank": {
                                    "bussines": 6,
                                    "executive": 12,
                                    "premium": 17
                                }
                            }
                        }
                    },
                    "garment_id": 454
                };
                ready_callbacks.push(function() {
                    var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
                    $g.initGarment();
                    window.t4l_inputs_enabled = true;
                    var current = $g.getCurrentLayers();
                    current['render_info'] = $g.render_info;
                    current['view'] = 'front';
                    if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                        $g.getLayers = function() {
                            return {
                                'skirt_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'skirt_shirt': {
                                    'src': '/3d/woman/skirt/shirt/#view#/'
                                },
                                'skirt_body': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_front_pocket': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_closure': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_belt_loops': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_buttons': {
                                    'src': '/3d/woman/pants/buttons/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_skirt'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (!current['_is_complex']) {
                                    array_push(images, {
                                        'layer': 'skirt_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['skirt_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['skirt_style'] == 'tube') {
                                    if (config['skirt_cut'] == 'back') config['skirt_cut'] = 'uncut';
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'] + "+cut_" + config['skirt_cut'];
                                } else if (config['skirt_style'] == 'flight') {
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'];
                                }
                                array_push(images, {
                                    'layer': 'skirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (!empty(config['skirt_front_pocket']) && config['skirt_front_pocket'] != 'no' && config['skirt_style'] != 'flight') {
                                    pocket_img = "front_pocket_" + config['skirt_front_pocket'] + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_front_pocket',
                                        'src': pocket_img + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['skirt_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                closure_img = "front_closure_" + config['skirt_front_closure'] + "+belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                array_push(images, {
                                    'layer': 'skirt_closure',
                                    'src': closure_img + '.png',
                                    'zIndex': 22000
                                });
                                if (config['skirt_belt_loops'] == 'with') {
                                    belt_loops_img = "belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_belt_loops',
                                        'src': belt_loops_img + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if ((config['skirt_front_closure'] == 'moved_button' || config['skirt_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'skirt_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + closure_img + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    } else {
                        $g.getLayers = function() {
                            return {
                                'skirt_model': {
                                    'src': '/3d/woman/models/#model#/#view#/'
                                },
                                'skirt_shirt': {
                                    'src': '/3d/woman/skirt/shirt/#view#/'
                                },
                                'skirt_body': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_front_pocket': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_closure': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_belt_loops': {
                                    'src': '/3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_buttons': {
                                    'src': '/3d/woman/pants/buttons/'
                                },
                            };
                        }
                        $g.renderGetImages = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_skirt'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (!current['_is_complex']) {
                                    array_push(images, {
                                        'layer': 'skirt_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['skirt_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['skirt_style'] == 'tube') {
                                    if (config['skirt_cut'] == 'back') config['skirt_cut'] = 'uncut';
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'] + "+cut_" + config['skirt_cut'];
                                } else if (config['skirt_style'] == 'flight') {
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'];
                                }
                                array_push(images, {
                                    'layer': 'skirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (!empty(config['skirt_front_pocket']) && config['skirt_front_pocket'] != 'no' && config['skirt_style'] != 'flight') {
                                    pocket_img = "front_pocket_" + config['skirt_front_pocket'] + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_front_pocket',
                                        'src': pocket_img + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['skirt_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                closure_img = "front_closure_" + config['skirt_front_closure'] + "+belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                array_push(images, {
                                    'layer': 'skirt_closure',
                                    'src': closure_img + '.png',
                                    'zIndex': 22000
                                });
                                if (config['skirt_belt_loops'] == 'with') {
                                    belt_loops_img = "belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_belt_loops',
                                        'src': belt_loops_img + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if ((config['skirt_front_closure'] == 'moved_button' || config['skirt_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'skirt_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + closure_img + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                    }
                });
            </script>
    <?php } 
/*End Skirt Cutsomizer  JS*/


/* Start Jacket and Suit Customizer JS*/

if($id==13)
{
?>

    <script type="text/javascript">
                var garment_opt = {
                    "product_type": "woman_suitskirt",
                    "price_detail": {
                        "base": <?php echo $price;?>,
                        "fabric_woman_jacket": 0,
                        "fabric_woman_skirt": 0
                    },
                    "current": {
                        "config": {
                            "jacket_style": $('input[name=jacket_style]:checked').val(),
                            "jacket_wide_lapel": $('input[name=jacket_wide_lapel]:checked').val(),
                            "jacket_fit": $('input[name=jacket_fit]:checked').val(),
                            "jacket_style_lapel": $('input[name=jacket_style_lapel]:checked').val(),
                            "jacket_buttons": $('input[name=jacket_buttons]:checked').val(),
                            "jacket_length": $('input[name=jacket_length]:checked').val(),
                            "jacket_breast_pocket": $('input[name=jacket_breast_pocket]:checked').val(),
                            "jacket_hip_pockets": $('input[name=jacket_hip_pockets]:checked').val(),
                            "jacket_sleeves": $('input[name=jacket_sleeves]:checked').val(),
                            "jacket_finishing": $('input[name=jacket_finishing]:checked').val(),
                            "jacket_back_style": $('input[name=jacket_back_style]:checked').val(),
                            //"jacket_sleeve_buttonholes": "fake",
                            
                            "skirt_style": $('input[name=skirt_style]:checked').val(),
                            "skirt_crotch": $('input[name=skirt_crotch]:checked').val(),
                            "skirt_length": $('input[name=skirt_length]:checked').val(),
                            "skirt_cut": $('input[name=skirt_cut]:checked').val(),
                            "skirt_front_closure": $('input[name=skirt_front_closure]:checked').val(),
                            "skirt_belt_loops": $('input[name=skirt_belt_loops]:checked').val(),
                            "skirt_belt_loops_property": $('input[name=skirt_belt_loops_property]:checked').val(),
                            "skirt_front_pocket": $('input[name=skirt_front_pocket]:checked').val(),
                            "skirt_back_pocket_num": $('input[name=skirt_back_pocket_num]:checked').val(),
                            "skirt_back_pocket_type": $('input[name=skirt_back_pocket_type]:checked').val()
                        },
                        "fabric": {
                            "woman_jacket": "<?=$_SESSION['fabID'];?>",
                            "woman_skirt": "<?=$_SESSION['fabID2'];?>"
                        },
                        "extras": []
                    },
                    "errors": [],
                    "render_info": {
                        "model": 1,
                        "size": "390x674:0x0",
                        "webview": {
                            "height": 1300,
                            "top": -40,
                            "updown": true,
                            "toggle": "woman_jacket"
                        },
                        "mobileview": {
                            "height": 235,
                            "top": -37
                        }
                    },
                    "config": {
                        "jacket_style": {
                            "simple": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]"],
                            "crossed": ["disable#config:woman_jacket:jacket_buttons:[1,2,3]", "disable#config:woman_jacket:jacket_finishing", "disable#config:woman_jacket:jacket_hip_pockets:[patched]"],
                            "no_flaps": ["disable#config:woman_jacket:jacket_buttons:[4,6,8]", "disable#config:woman_jacket:jacket_style_lapel", "disable#config:woman_jacket:jacket_wide_lapel"]
                        },
                        "jacket_wide_lapel": false,
                        "jacket_fit": false,
                        "jacket_style_lapel": {
                            "round": ["disable#config:woman_jacket:jacket_wide_lapel:[width]", "disable#extra:woman_jacket:jacket_neck"]
                        },
                        "jacket_buttons": false,
                        "jacket_length": false,
                        "jacket_breast_pocket": false,
                        "jacket_hip_pockets": false,
                        "jacket_sleeves": false,
                        "jacket_finishing": false,
                        "jacket_back_style": false,
                        "jacket_sleeve_buttonholes": false,
                        "skirt_style": {
                            "flight": ["disable#config:woman_skirt:skirt_cut", "disable#config:woman_skirt:skirt_front_pocket", "disable#config:woman_skirt:skirt_back_pocket_num", "disable#config:woman_skirt:skirt_back_pocket_type"]
                        },
                        "skirt_crotch": false,
                        "skirt_length": false,
                        "skirt_cut": {
                            "side": ["disable#config:woman_skirt:skirt_front_closure:center_no_button"]
                        },
                        "skirt_front_closure": {
                            "center_no_button": ["disable#config:woman_skirt:skirt_cut:side"]
                        },
                        "skirt_belt_loops": false,
                        "skirt_belt_loops_property": false,
                        "skirt_front_pocket": false,
                        "skirt_back_pocket_num": [
                            ["disable#config:woman_skirt:skirt_back_pocket_type"]
                        ],
                        "skirt_back_pocket_type": false
                    },
                    "fabric": {
                        "woman_jacket": {
                            "fabric_type": "suit",
                            "price": {
                                "rank": {
                                    "bussines": 9,
                                    "executive": 28,
                                    "premium": 54
                                }
                            }
                        },
                        "woman_skirt": {
                            "fabric_type": "suit",
                            "price": {
                                "rank": {
                                    "bussines": 6,
                                    "executive": 12,
                                    "premium": 17
                                }
                            }
                        }
                    },
                    "extra": {
                        "jacket_lining": {
                            "extra_type": "lining"
                        },
                        "jacket_initials": {
                            "extra_type": "initials"
                        },
                        "jacket_neck": {
                            "extra_type": "colors",
                            "contrast": {
                                "default": ["disable#extra:woman_jacket:jacket_neck:[color]"],
                                "custom": ["disable#config:woman_jacket:jacket_style_lapel:[round]"]
                            }
                        },
                        "jacket_patches": {
                            "extra_type": "colors",
                            "contrast": {
                                "default": ["disable#extra:woman_jacket:jacket_patches:[color]"],
                                "custom": ["required#extra:woman_jacket:jacket_patches:[color]"]
                            }
                        },
                        "jacket_metal_button": {
                            "extra_type": "colors",
                            "contrast": {
                                "default": ["disable#extra:woman_jacket:jacket_metal_button:[type]", "required#extra:woman_jacket:jacket_threads"],
                                "custom": ["required#extra:woman_jacket:jacket_metal_button:[type]", "disable#extra:woman_jacket:jacket_threads"]
                            }
                        },
                        "jacket_threads": {
                            "extra_type": "threads",
                            "contrast": {
                                "default": ["disable#extra:woman_jacket:jacket_threads:[threads]", "disable#extra:woman_jacket:jacket_threads:[holes]"],
                                "all": ["required#extra:woman_jacket:jacket_threads:[threads]", "required#extra:woman_jacket:jacket_threads:[holes]", "disable#extra:woman_jacket:jacket_metal_button"]
                            }
                        }
                    },
                    "garment_id": 653
                };
                ready_callbacks.push(function() {
                    var $g = new Garment('#garment_form_' + garment_opt.garment_id, garment_opt);
                    $g.initGarment();
                    window.t4l_inputs_enabled = true;
                    var current = $g.getCurrentLayers();
                    current['render_info'] = $g.render_info;
                    current['view'] = 'front';
                    if (garment_opt.product_type == 'woman_suitpants' || garment_opt.product_type == 'woman_suitskirt') {
                        $g.getLayers = function() {
                            layers1 = this.renderGetLayersWomanSkirt();
                            layers2 = this.renderGetLayersWomanJacket();
                            return array_merge(layers1, layers2);
                        }
                        $g.renderGetImages = function() {
                            current['_is_complex'] = true;
                            active_block = current['config']['_active_block'];
                            if (empty(active_block)) active_block = 'woman_jacket';
                            images = [];
                            if (active_block == 'woman_jacket') {
                                render = this.renderGetImagesWomanJacket(current);
                            } else {
                               render = [];
                            }
                            //render = this.renderGetImagesWomanJacket(current);
                            render2 = this.renderGetImagesWomanSkirt(current);
                            if (active_block == 'woman_skirt') {
                                array_push(images, {
                                    'layer': 'jacket_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                config = current['config'];
                                if (config['skirt_crotch'] == 'high') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src':'shirt_front_high.png',
                                        'zIndex': 10001
                                    });
                                } else if (config['skirt_crotch'] == 'medium') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front_medium.png',
                                        'zIndex': 10001
                                    });
                                } else if (config['skirt_crotch'] == 'low') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front_low.png',
                                        'zIndex': 10001
                                    });
                                }
                            }
                            render3 = this.parseImages(images, current);
                            return array_merge(render, render2, render3);
                        }
                        $g.parseLayers = function(layers, current) {
                            model = 1;
                            if (!empty(current['render_info']['model'])) model = current['render_info']['model'];
                            for (k in layers) {
                                var opt = layers[k];
                                for (key in current['fabric']) {
                                    var fabric_id = current['fabric'][key];
                                    if (strpos(key, '_') !== false) {
                                        layers[k]['src'] = str_replace('#' + key + '#', fabric_id, layers[k]['src']);
                                    }
                                }
                                layers[k]['src'] = str_replace('#view#', current['view'], layers[k]['src']);
                                layers[k]['src'] = str_replace('#model#', model, layers[k]['src']);
                            }
                            return layers;
                        }
                        $g.renderGetImagesWomanJacket = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_jacket'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            if (!empty(current['render_info']['model'])) {
                                model = current['render_info']['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                show_lining = false;
                                if (!empty(current['_show_lining']) && !empty(extras['jacket_lining']['lining_id'])) {
                                    show_lining = true;
                                    id_t4l_lining = extras['jacket_lining']['lining_id'];
                                }
                                if (!show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front.png',
                                        'zIndex': 10001
                                    });
                                    if (empty(current['_is_complex'])) {
                                        array_push(images, {
                                            'layer': 'jacket_pants',
                                            'src': 'pants_front.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['jacket_style'] == 'crossed') {
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        chest_img = 'breast_pocket_yes_style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_long';
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': chest_img + '.png',
                                            'zIndex': 31000
                                        });
                                    }
                                    body_img = 'style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+fit_' + config['jacket_fit'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'];
                                } else if (config['jacket_style'] == 'no_flaps') {
                                    body_img = 'style_' + config['jacket_style'] + '+fit_' + config['jacket_fit'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'] + '+finishing_' + config['jacket_finishing'];
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': 'breast_pocket_yes_style_no_flaps.png',
                                            'zIndex': 31000
                                        });
                                    }
                                } else {
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        j_style_lapel = config['jacket_style_lapel'];
                                        if (config['jacket_wide_lapel'] == 'width') j_style_lapel = 'peak';
                                        chest_img = 'breast_pocket_yes_style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+style_lapel_' + j_style_lapel + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'];
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': chest_img + '.png',
                                            'zIndex': 31000
                                        });
                                    }
                                    body_img = 'style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+fit_' + config['jacket_fit'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'] + '+finishing_' + config['jacket_finishing'];
                                }
                                array_push(images, {
                                    'layer': 'jacket_body',
                                    'src': body_img + '.png',
                                    'zIndex': 30000
                                });
                                if (config['jacket_hip_pockets'] != 'no') {
                                    if (config['jacket_length'] == 'short') {
                                        jacket_pocket_img = 'hip_pockets_' + config['jacket_hip_pockets'] + '+fit_' + config['jacket_fit'] + '+length_short';
                                    } else {
                                        tmp_style = config['jacket_style'];
                                        if (tmp_style == 'no_flaps') tmp_style = 'simple';
                                        jacket_pocket_img = 'hip_pockets_' + config['jacket_hip_pockets'] + '+fit_' + config['jacket_fit'] + '+style_' + tmp_style + '+length_long';
                                    }
                                    array_push(images, {
                                        'layer': 'jacket_pocket',
                                        'src': jacket_pocket_img + '.png',
                                        'zIndex': 32000
                                    });
                                }
                                if (config['jacket_sleeves'] == 'rolled_up') {
                                    array_push(images, {
                                        'layer': 'jacket_sleeve',
                                        'src': 'sleeves+sleeves_' + config['jacket_sleeves'] + '.png',
                                        'zIndex': 33000
                                    });
                                } else {
                                    array_push(images, {
                                        'layer': 'jacket_sleeve',
                                        'src': 'sleeves+sleeves_no.png',
                                        'zIndex': 33000
                                    });
                                }
                                if (show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_lining',
                                        'src': id_t4l_lining + '_shiny_style_' + config['jacket_style'] + '+length_' + config['jacket_length'] + '.png',
                                        'zIndex': 19001
                                    });
                                    array_push(images, {
                                        'layer': 'jacket_body',
                                        'src': 'lining_style_' + config['jacket_style'] + '+length_' + config['jacket_length'] + '.png',
                                        'zIndex': 19000
                                    });
                                }
                                if (config['jacket_buttons'] && !empty(current['fabric']['_button_code'])) {
                                    if (!empty(extras['jacket_metal_button']['contrast']) && extras['jacket_metal_button']['contrast'] == 'custom' && !empty(extras['jacket_metal_button']['type'])) {
                                        array_push(images, {
                                            'layer': 'jacket_buttons',
                                            'src': extras['jacket_metal_button']['type'] + '_' + body_img + '.png',
                                            'zIndex': 43000
                                        });
                                    } else {
                                        array_push(images, {
                                            'layer': 'jacket_buttons',
                                            'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                            'zIndex': 43000
                                        });
                                    }
                                } else if (!empty(extras['jacket_metal_button']['contrast']) && extras['jacket_metal_button']['contrast'] == 'custom' && !empty(extras['jacket_metal_button']['type'])) {
                                    array_push(images, {
                                        'layer': 'jacket_buttons',
                                        'src': extras['jacket_metal_button']['type'] + '_' + body_img + '.png',
                                        'zIndex': 43000
                                    });
                                }
                                if (!show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_hand',
                                        'src': 'mano_left.png',
                                        'zIndex': 32950
                                    });
                                }
                                if (!empty(extras['jacket_threads']['contrast']) && extras['jacket_threads']['contrast'] == 'all') {
                                    if (!empty(extras['jacket_threads']['threads-color'])) {
                                        var threads = extras['jacket_threads']['threads-color'];
                                    }
                                    if (!empty(extras['jacket_threads']['threads'])) {
                                        var threads = extras['jacket_threads']['threads']['color'];
                                    }
                                    if (threads) {
                                        array_push(images, {
                                            'layer': 'jacket_threads_extra',
                                            'src': threads + '_thread_' + body_img + '.png',
                                            'zIndex': 43001
                                        });
                                    }
                                }
                                if (!empty(extras['jacket_threads']['contrast']) && extras['jacket_threads']['contrast'] == 'all') {
                                    if (!empty(extras['jacket_threads']['holes-color'])) {
                                        var holes = extras['jacket_threads']['holes-color'];
                                    }
                                    if (!empty(extras['jacket_threads']['holes'])) {
                                        var holes = extras['jacket_threads']['holes']['color'];
                                    }
                                    if (holes) {
                                        array_push(images, {
                                            'layer': 'jacket_holes_extra',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43001
                                        });
                                    }
                                }
                            } else {}
                        return this.parseImages(images, current);
                        }
                        $g.renderGetImagesWomanSkirt = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_skirt'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (!current['_is_complex']) {
                                    array_push(images, {
                                        'layer': 'skirt_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['skirt_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['skirt_style'] == 'tube') {
                                    if (config['skirt_cut'] == 'back') config['skirt_cut'] = 'uncut';
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'] + "+cut_" + config['skirt_cut'];
                                } else if (config['skirt_style'] == 'flight') {
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'];
                                }
                                array_push(images, {
                                    'layer': 'skirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (!empty(config['skirt_front_pocket']) && config['skirt_front_pocket'] != 'no' && config['skirt_style'] != 'flight') {
                                    pocket_img = "front_pocket_" + config['skirt_front_pocket'] + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_front_pocket',
                                        'src': pocket_img + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['skirt_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                closure_img = "front_closure_" + config['skirt_front_closure'] + "+belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                array_push(images, {
                                    'layer': 'skirt_closure',
                                    'src': closure_img + '.png',
                                    'zIndex': 22000
                                });
                                if (config['skirt_belt_loops'] == 'with') {
                                    belt_loops_img = "belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_belt_loops',
                                        'src': belt_loops_img + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if ((config['skirt_front_closure'] == 'moved_button' || config['skirt_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'skirt_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + closure_img + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                        $g.renderGetLayersWomanJacket = function() {
                            return {
                                'jacket_model': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'jacket_pants': {
                                    'src': cdn_host+'3d/woman/jacket/pants/#view#/'
                                },
                                'jacket_shirt': {
                                    'src': cdn_host+'3d/woman/jacket/shirt/#view#/'
                                },
                                'jacket_body': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_chest_pocket': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_pocket': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_sleeve': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_buttons': {
                                    'src': cdn_host+'3d/woman/jacket/buttons/'
                                },
                                'jacket_back_style': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/',
                                    'position': 'back'
                                },
                                'jacket_hand': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'jacket_threads_extra': {
                                    'src': cdn_host+'3d/woman/jacket/hilos_ojales/'
                                },
                                'jacket_holes_extra': {
                                    'src': cdn_host+'3d/woman/jacket/hilos_ojales/'
                                },
                                'jacket_lining': {
                                    'src': cdn_host+'3d/woman/jacket/linings/'
                                }
                            };
                        }
                        $g.renderGetLayersWomanSkirt = function() {
                            return {
                                'skirt_model': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'skirt_shirt': {
                                    'src': cdn_host+'3d/woman/skirt/shirt/#view#/'
                                },
                                'skirt_body': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_front_pocket': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_closure': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_belt_loops': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_buttons': {
                                    'src': cdn_host+'3d/woman/pants/buttons/'
                                },
                            };
                        }
                    } else {
                        $g.getLayers = function() {
                            layers1 = this.renderGetLayersWomanSkirt();
                            layers2 = this.renderGetLayersWomanJacket();
                            return array_merge(layers1, layers2);
                        }
                        $g.renderGetImages = function() {
                            current['_is_complex'] = true;
                            active_block = current['config']['_active_block'];
                            if (empty(active_block)) active_block = 'woman_jacket';
                            images = [];
                            if (active_block == 'woman_jacket') {
                                render = this.renderGetImagesWomanJacket(current);
                            } else {
                                render = [];
                            }
                            render2 = this.renderGetImagesWomanSkirt(current);
                            if (active_block == 'woman_skirt') {
                                array_push(images, {
                                    'layer': 'jacket_model',
                                    'src': 'model_front.png',
                                    'zIndex': 10000
                                });
                                config = current['config'];
                                if (config['skirt_crotch'] == 'high') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front_high.png',
                                        'zIndex': 10001
                                    });
                                } else if (config['skirt_crotch'] == 'medium') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front_medium.png',
                                        'zIndex': 10001
                                    });
                                } else if (config['skirt_crotch'] == 'low') {
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front_low.png',
                                        'zIndex': 10001
                                    });
                                }
                            }
                            render3 = this.parseImages(images, current);
                            return array_merge(render, render2, render3);
                        }
                        $g.parseLayers = function(layers, current) {
                            model = 1;
                            if (!empty(current['render_info']['model'])) model = current['render_info']['model'];
                            for (k in layers) {
                                var opt = layers[k];
                                for (key in current['fabric']) {
                                    var fabric_id = current['fabric'][key];
                                    if (strpos(key, '_') !== false) {
                                        layers[k]['src'] = str_replace('#' + key + '#', fabric_id, layers[k]['src']);
                                    }
                                }
                                layers[k]['src'] = str_replace('#view#', current['view'], layers[k]['src']);
                                layers[k]['src'] = str_replace('#model#', model, layers[k]['src']);
                            }
                            return layers;
                        }
                        $g.renderGetImagesWomanJacket = function() {
                            images = [];
                            var config = current['config'];
                            var fabric = current['fabric']['woman_jacket'];
                            var extras = (empty(current['extras'])) ? [] : current['extras'];
                            if (!empty(current['render_info']['model'])) {
                                model = current['render_info']['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                show_lining = false;
                                if (!empty(current['_show_lining']) && !empty(extras['jacket_lining']['lining_id'])) {
                                    show_lining = true;
                                    id_t4l_lining = extras['jacket_lining']['lining_id'];
                                }
                                if (!show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    array_push(images, {
                                        'layer': 'jacket_shirt',
                                        'src': 'shirt_front.png',
                                        'zIndex': 10001
                                    });
                                    if (empty(current['_is_complex'])) {
                                        array_push(images, {
                                            'layer': 'jacket_pants',
                                            'src': 'pants_front.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['jacket_style'] == 'crossed') {
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        chest_img = 'breast_pocket_yes_style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_long';
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': chest_img + '.png',
                                            'zIndex': 31000
                                        });
                                    }
                                    body_img = 'style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+fit_' + config['jacket_fit'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'];
                                } else if (config['jacket_style'] == 'no_flaps') {
                                    body_img = 'style_' + config['jacket_style'] + '+fit_' + config['jacket_fit'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'] + '+finishing_' + config['jacket_finishing'];
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': 'breast_pocket_yes_style_no_flaps.png',
                                            'zIndex': 31000
                                        });
                                    }
                                } else {
                                    if (config['jacket_breast_pocket'] == 'yes') {
                                        j_style_lapel = config['jacket_style_lapel'];
                                        if (config['jacket_wide_lapel'] == 'width') j_style_lapel = 'peak';
                                        chest_img = 'breast_pocket_yes_style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+style_lapel_' + j_style_lapel + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'];
                                        array_push(images, {
                                            'layer': 'jacket_chest_pocket',
                                            'src': chest_img + '.png',
                                            'zIndex': 31000
                                        });
                                    }
                                    body_img = 'style_' + config['jacket_style'] + '+wide_lapel_' + config['jacket_wide_lapel'] + '+fit_' + config['jacket_fit'] + '+style_lapel_' + config['jacket_style_lapel'] + '+buttons_' + config['jacket_buttons'] + '+length_' + config['jacket_length'] + '+finishing_' + config['jacket_finishing'];
                                }
                                array_push(images, {
                                    'layer': 'jacket_body',
                                    'src': body_img + '.png',
                                    'zIndex': 30000
                                });
                                if (config['jacket_hip_pockets'] != 'no') {
                                    if (config['jacket_length'] == 'short') {
                                        jacket_pocket_img = 'hip_pockets_' + config['jacket_hip_pockets'] + '+fit_' + config['jacket_fit'] + '+length_short';
                                    } else {
                                        tmp_style = config['jacket_style'];
                                        if (tmp_style == 'no_flaps') tmp_style = 'simple';
                                        jacket_pocket_img = 'hip_pockets_' + config['jacket_hip_pockets'] + '+fit_' + config['jacket_fit'] + '+style_' + tmp_style + '+length_long';
                                    }
                                    array_push(images, {
                                        'layer': 'jacket_pocket',
                                        'src': jacket_pocket_img + '.png',
                                        'zIndex': 32000
                                    });
                                }
                                if (config['jacket_sleeves'] == 'rolled_up') {
                                    array_push(images, {
                                        'layer': 'jacket_sleeve',
                                        'src': 'sleeves+sleeves_' + config['jacket_sleeves'] + '.png',
                                        'zIndex': 33000
                                    });
                                } else {
                                    array_push(images, {
                                        'layer': 'jacket_sleeve',
                                        'src': 'sleeves+sleeves_no.png',
                                        'zIndex': 33000
                                    });
                                }
                                if (show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_lining',
                                        'src': id_t4l_lining + '_shiny_style_' + config['jacket_style'] + '+length_' + config['jacket_length'] + '.png',
                                        'zIndex': 19001
                                    });
                                    array_push(images, {
                                        'layer': 'jacket_body',
                                        'src': 'lining_style_' + config['jacket_style'] + '+length_' + config['jacket_length'] + '.png',
                                        'zIndex': 19000
                                    });
                                }
                                if (config['jacket_buttons'] && !empty(current['fabric']['_button_code'])) {
                                    if (!empty(extras['jacket_metal_button']['contrast']) && extras['jacket_metal_button']['contrast'] == 'custom' && !empty(extras['jacket_metal_button']['type'])) {
                                        array_push(images, {
                                            'layer': 'jacket_buttons',
                                            'src': extras['jacket_metal_button']['type'] + '_' + body_img + '.png',
                                            'zIndex': 43000
                                        });
                                    } else {
                                        array_push(images, {
                                            'layer': 'jacket_buttons',
                                            'src': current['fabric']['_button_code'] + '_' + body_img + '.png',
                                            'zIndex': 43000
                                        });
                                    }
                                } else if (!empty(extras['jacket_metal_button']['contrast']) && extras['jacket_metal_button']['contrast'] == 'custom' && !empty(extras['jacket_metal_button']['type'])) {
                                    array_push(images, {
                                        'layer': 'jacket_buttons',
                                        'src': extras['jacket_metal_button']['type'] + '_' + body_img + '.png',
                                        'zIndex': 43000
                                    });
                                }
                                if (!show_lining) {
                                    array_push(images, {
                                        'layer': 'jacket_hand',
                                        'src': 'mano_left.png',
                                        'zIndex': 32950
                                    });
                                }
                                if (!empty(extras['jacket_threads']['contrast']) && extras['jacket_threads']['contrast'] == 'all') {
                                    if (!empty(extras['jacket_threads']['threads-color'])) {
                                        var threads = extras['jacket_threads']['threads-color'];
                                    }
                                    if (!empty(extras['jacket_threads']['threads'])) {
                                        var threads = extras['jacket_threads']['threads']['color'];
                                    }
                                    if (threads) {
                                        array_push(images, {
                                            'layer': 'jacket_threads_extra',
                                            'src': threads + '_thread_' + body_img + '.png',
                                            'zIndex': 43001
                                        });
                                    }
                                }
                                if (!empty(extras['jacket_threads']['contrast']) && extras['jacket_threads']['contrast'] == 'all') {
                                    if (!empty(extras['jacket_threads']['holes-color'])) {
                                        var holes = extras['jacket_threads']['holes-color'];
                                    }
                                    if (!empty(extras['jacket_threads']['holes'])) {
                                        var holes = extras['jacket_threads']['holes']['color'];
                                    }
                                    if (holes) {
                                        array_push(images, {
                                            'layer': 'jacket_holes_extra',
                                            'src': holes + '_hole_' + body_img + '.png',
                                            'zIndex': 43001
                                        });
                                    }
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                        $g.renderGetImagesWomanSkirt = function() {
                            images = [];
                            config = current['config'];
                            fabric = current['fabric']['woman_skirt'];
                            if (!empty(current['model'])) {
                                model = current['model'];
                            } else {
                                model = 1;
                            }
                            if (current['view'] == 'front') {
                                if (!current['_is_complex']) {
                                    array_push(images, {
                                        'layer': 'skirt_model',
                                        'src': 'model_front.png',
                                        'zIndex': 10000
                                    });
                                    if (config['skirt_crotch'] == 'high') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_high.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'medium') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_medium.png',
                                            'zIndex': 10001
                                        });
                                    } else if (config['skirt_crotch'] == 'low') {
                                        array_push(images, {
                                            'layer': 'skirt_shirt',
                                            'src': 'shirt_front_low.png',
                                            'zIndex': 10001
                                        });
                                    }
                                }
                                if (config['skirt_style'] == 'tube') {
                                    if (config['skirt_cut'] == 'back') config['skirt_cut'] = 'uncut';
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'] + "+cut_" + config['skirt_cut'];
                                } else if (config['skirt_style'] == 'flight') {
                                    body_img = "style_" + config['skirt_style'] + "+crotch_" + config['skirt_crotch'] + "+length_" + config['skirt_length'];
                                }
                                array_push(images, {
                                    'layer': 'skirt_body',
                                    'src': body_img + '.png',
                                    'zIndex': 20000
                                });
                                if (!empty(config['skirt_front_pocket']) && config['skirt_front_pocket'] != 'no' && config['skirt_style'] != 'flight') {
                                    pocket_img = "front_pocket_" + config['skirt_front_pocket'] + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_front_pocket',
                                        'src': pocket_img + '.png',
                                        'zIndex': 21000
                                    });
                                }
                                if (!empty(config['skirt_belt_loops_property'])) {
                                    high = 'high';
                                } else {
                                    high = 'standard';
                                }
                                closure_img = "front_closure_" + config['skirt_front_closure'] + "+belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                array_push(images, {
                                    'layer': 'skirt_closure',
                                    'src': closure_img + '.png',
                                    'zIndex': 22000
                                });
                                if (config['skirt_belt_loops'] == 'with') {
                                    belt_loops_img = "belt_loops_" + high + "+crotch_" + config['skirt_crotch'];
                                    array_push(images, {
                                        'layer': 'skirt_belt_loops',
                                        'src': belt_loops_img + '.png',
                                        'zIndex': 23000
                                    });
                                }
                                if ((config['skirt_front_closure'] == 'moved_button' || config['skirt_front_closure'] == 'center_button') && !empty(current['fabric']['_button_code'])) {
                                    array_push(images, {
                                        'layer': 'skirt_buttons',
                                        'src': current['fabric']['_button_code'] + '_' + closure_img + '.png',
                                        'zIndex': 24000
                                    });
                                }
                            } else {}
                            return this.parseImages(images, current);
                        }
                        $g.renderGetLayersWomanJacket = function() {
                            return {
                                'jacket_model': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'jacket_pants': {
                                    'src': cdn_host+'3d/woman/jacket/pants/#view#/'
                                },
                                'jacket_shirt': {
                                    'src': cdn_host+'3d/woman/jacket/shirt/#view#/'
                                },
                                'jacket_body': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_chest_pocket': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_pocket': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_sleeve': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/'
                                },
                                'jacket_buttons': {
                                    'src': cdn_host+'3d/woman/jacket/buttons/'
                                },
                                'jacket_back_style': {
                                    'src': cdn_host+'3d/woman/jacket/#woman_jacket#_fabric/#view#/',
                                    'position': 'back'
                                },
                                'jacket_hand': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'jacket_threads_extra': {
                                    'src': cdn_host+'3d/woman/jacket/hilos_ojales/'
                                },
                                'jacket_holes_extra': {
                                    'src': cdn_host+'3d/woman/jacket/hilos_ojales/'
                                },
                                'jacket_lining': {
                                    'src': cdn_host+'3d/woman/jacket/linings/'
                                }
                            };
                        }
                        $g.renderGetLayersWomanSkirt = function() {
                            return {
                                'skirt_model': {
                                    'src': cdn_host+'3d/woman/models/#model#/#view#/'
                                },
                                'skirt_shirt': {
                                    'src': cdn_host+'3d/woman/skirt/shirt/#view#/'
                                },
                                'skirt_body': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_front_pocket': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_closure': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_belt_loops': {
                                    'src': cdn_host+'3d/woman/skirt/#woman_skirt#_fabric/#view#/'
                                },
                                'skirt_buttons': {
                                    'src': cdn_host+'3d/woman/pants/buttons/'
                                },
                            };
                        }
                    }
                });
            </script>
<?php
}

/* End Jacket and Suit Customizer JS*/
?>