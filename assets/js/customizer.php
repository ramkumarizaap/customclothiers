 <script type="text/javascript">
        var garment_opt = {
            "product_type": "woman_coat",
            "price_detail": {
                "base": 159,
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
                            'src': '<?php echo $homeurl;?>assets/images/3d/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
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
                            'src': '<?php echo $homeurl;?>assets/images/woman/models/#model#/#view#/'
                        },
                        'coat_pants': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/pants/#view#/'
                        },
                        'coat_shirt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/shirt/#view#/'
                        },
                        'coat_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_parche': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_belt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_hand': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/models/#model#/#view#/'
                        },
                        'coat_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_epaulettes': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_buttons_epaulettes': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_buttons_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/buttons/'
                        },
                        'coat_ribbons_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/cierre_trench/'
                        },
                        'coat_ribbons_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/cierre_trench/'
                        },
                        'coat_threads_extra_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_threads_extra_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_neck': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_pockets': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_holes_extra_sleeve': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/hilos_ojales/'
                        },
                        'coat_extra_lining': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/linings/'
                        },
                        'coat_back_body': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_belt': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_body_cut': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
                        },
                        'coat_back_backcut': {
                            'src': '<?php echo $homeurl;?>assets/images/woman/coat/#woman_coat#_fabric/#view#/'
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

 

