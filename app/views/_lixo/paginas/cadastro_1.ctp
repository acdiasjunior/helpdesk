<?php

echo $javascript->link(array('tiny_mce/jquery.tinymce'));

?>
<script type="text/javascript">
    $().ready(function() {
        $('#PageConteudo').tinymce({
            // Location of TinyMCE script
            //script_url : '../jscripts/tiny_mce/tiny_mce.js',
            script_url : "<?php echo $this->Html->url(array('controller' => 'js', 'action' => 'tiny_mce/tiny_mce', 'ext' => 'js')); ?>",

            // General options
            language: "pt",
            theme : "advanced",
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    });
</script>
<?php

echo $this->Form->create('Page', array('url' => array('controller' => 'paginas', 'action' => 'cadastro')));

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Dados da página');
echo $this->Form->hidden('id');
echo $this->Form->input('link', array('label' => 'Link'));
echo $this->Form->input('titulo', array('label' => 'Título'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('conteudo', array('type' => 'textarea', 'label' => 'Conteúdo', 'style' => 'width: 850px; height: 600px;'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'paginas', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();