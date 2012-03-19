<?php
/*
 * 
 */
?>
<script type="text/javascript">
    $(function(){
        $('#ChamadoSubcategoriaId').parent().hide();
        $('#ChamadoCategoriaId').change(function (){
            $('#ChamadoSubcategoriaId').parent().hide();
            id = $(this).val();
            $.ajax({
                url: "<?php echo $this->Html->url(array('controller' => 'subcategorias', 'action' => 'listaSubcategorias')); ?>/" + id,
                success: function(data){
                    $("#ChamadoSubcategoriaId").html(data);
                    $('#ChamadoSubcategoriaId').parent().show();
                }
            });
        });
    });
</script>
<?php
$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'keycount'), false);

echo $this->Form->create('Chamado');
echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Usuário');
echo $this->Form->input('id');
echo $this->Form->hidden('usuario_id', array('default' => $this->Session->read('Auth.Usuario.id')));
echo $this->Form->input('Usuario.nome', array('label' => 'Nome', 'disabled' => 'disabled', 'default' => $this->Session->read('Auth.Usuario.nome')));
echo $this->Form->input('Usuario.username', array('label' => 'Login', 'disabled' => 'disabled', 'default' => $this->Session->read('Auth.Usuario.username')));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Dados do Chamado');
echo $this->Form->input('categoria_id', array('label' => 'Categoria do Chamado', 'empty' => 'Selecione uma categoria'));
echo $this->Form->input('subcategoria_id', array('label' => 'Subcategoria'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('assunto', array('label' => 'Assunto (Faça uma breve descrição do problema)', 'class' => 'edit100'));
echo $this->Form->input('texto', array('label' => 'Descrição', 'type' => 'textarea', 'rows' => '7', 'maxchar' => 4096, 'class' => 'edit100 keycount'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => $this->params['controller'], 'action' => 'index')) . "';"
));
echo $this->Form->end();