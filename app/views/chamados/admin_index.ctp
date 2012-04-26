<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<?php
$options = array(
    'admin_abertos' => 'Abertos',
    'admin_fechados' => 'Fechados',
    'admin_andamento' => 'Em andamento',
    'admin_todos' => 'Todos'
);
echo $form->select('filtro', $options, 'abertos', array('empty' => false));
echo $this->Form->button('Filtrar', array('id' => 'filtrar'));
?>
<table id="flex" style="display: none"></table>