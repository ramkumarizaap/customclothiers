(function(){tinymce.create("tinymce.plugins.Nonbreaking",{init:function(a,b){var c=this;c.editor=a;a.addCommand("mceNonBreaking",function(){a.execCommand("mceInsertContent",false,(a.plugins.visualchars&&a.plugins.visualchars.state)?'<span class="mceItemHidden mceVisualNbsp">&middot;</span>':"&nbsp;")});a.addButton("nonbreaking",{title:"nonbreaking.nonbreaking_desc",cmd:"mceNonBreaking"});if(a.getParam("nonbreaking_force_tab")){a.onKeyDown.add(function(d,f){if(tinymce.isIE&&f.keyCode==9){d.execCommand("mceNonBreaking");d.execCommand("mceNonBreaking");d.execCommand("mceNonBreaking");tinymce.dom.Event.cancel(f)}})}},getInfo:function(){return{longname:"Nonbreaking space",author:"Moxiecode Systems AB",authorurl:"https://tinymce.moxiecode.com",infourl:"https://wiki.moxiecode.com/index.php/TinyMCE:Plugins/nonbreaking",version:tinymce.majorVersion+"."+tinymce.minorVersion}}});tinymce.PluginManager.add("nonbreaking",tinymce.plugins.Nonbreaking)})();