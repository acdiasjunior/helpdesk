<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<?php
$options = array(
    'abertos' => 'Abertos',
    'fechados' => 'Fechados',
    'andamento' => 'Em andamento',
    'todos' => 'Todos'
);
echo $form->select('filtro', $options, 'abertos', array('empty' => false));
echo $this->Form->button('Filtrar', array('id' => 'filtrar'));
?>
<table id="flex" style="display: none"></table>