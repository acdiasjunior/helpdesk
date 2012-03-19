<?php

echo $javascript->link(array('ckeditor/ckeditor'));
echo $javascript->link(array('ckeditor/adapters/jquery'));
?>
<script type="text/javascript">
    $().ready(function() {

        var options = {
            extraPlugins : 'autogrow',
            autoGrow_maxHeight : 600,
            // Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
            removePlugins : 'resize'
        }

        $('#PageConteudo').ckeditor(options);
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