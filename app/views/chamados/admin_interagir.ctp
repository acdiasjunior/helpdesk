<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker', 'keycount'), false);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Dados do chamado');
?>
<table class="chamado">
    <tr>
        <td class="key">Chamado:</td>
        <td class="value"># <?php echo $this->data['Chamado']['id']; ?></td>
        <td class="key">Usuário:</td>
        <td class="value"><?php echo $this->data['Usuario']['nome']; ?></td>
    </tr>
    <tr>
        <td class="key">Prioridade:</td>
        <td class="value"><?php echo Subcategoria::prioridadeChamado($this->data['Subcategoria']['prioridade']); ?></td>
        <td class="key">E-mail:</td>
        <td class="value"><?php echo $this->data['Usuario']['email']; ?></td>
    </tr>
    <tr>
        <td class="key">Data abertura:</td>
        <td class="value"><?php echo $this->data['Chamado']['data_abertura']; ?></td>
        <td class="key">Telefone:</td>
        <td class="value"><?php echo $this->data['Usuario']['telefone']; ?></td>
    </tr>
    <tr>
        <td class="key">Responsável:</td>
        <td class="value">
            <?php
            if (empty($this->data['Responsavel']['nome']))
                echo 'Não atribuído';
            else
                echo $this->data['Responsavel']['id'] . ' - ' . $this->data['Responsavel']['nome'];
            ?>
        </td>
        <td class="key">Grupo:</td>
        <td class="value"><?php echo $this->data['Usuario']['Grupo']['nome']; ?></td>
    </tr>
    <tr>
        <td class="key">Assunto:</td>
        <td class="assunto" colspan="4"><?php echo $this->data['Chamado']['assunto']; ?></td>
    </tr>
    <tr>
        <td class="key">Categoria:</td>
        <td class="value"><?php echo $this->data['Subcategoria']['Categoria']['descricao']; ?></td>
        <td class="key">Subcategoria:</td>
        <td class="value"><?php echo $this->data['Subcategoria']['descricao']; ?></td>
    </tr>
    <tr>
        <td class="key">Status:</td>
        <td class="value"><?php echo Chamado::statusChamado($this->data['Chamado']['status']); ?></td>
        <td class="key">&nbsp;</td>
        <td class="value">&nbsp;</td>
    </tr>
</table>
<?php
echo $this->Html->tag('/fieldset', null);

if (count($this->data['ChamadosInteracao']) > 0) :
    echo $this->Html->tag('fieldset', null);
    echo $this->Html->tag('legend', 'Interações do chamado');
    ?>
    <table class="interacoes">
        <?php
        foreach ($this->data['ChamadosInteracao'] as $interacao):
            ?>
            <tr>
                <td class="interacao">
                    <div class="header">
                        <span class="data"><?php echo date('d/m/Y H:i:s', strtotime($interacao['data_interacao'])); ?></span><br />
                        <span class="usuario"><?php echo $interacao['Usuario']['nome']; ?> </span>
                        <span class="email">(<?php echo $interacao['Usuario']['email']; ?>)</span>
                    </div>
                    <div class="body">
                        <?php echo nl2br($interacao['interacao']); ?>
                    </div>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <?php
    echo $this->Html->tag('/fieldset', null);
endif;

echo $this->Form->create('ChamadosInteracao', array('url' => array('controller' => $this->params['controller'], 'action' => $this->params['action'])));
echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Interagir no chamado');
echo $this->Form->hidden('chamado_id', array('default' => $this->data['Chamado']['id']));
echo $this->Form->hidden('usuario_id', array('default' => $this->Session->read('Auth.Usuario.id')));
echo $this->Form->input('interacao', array('label' => 'Interação', 'type' => 'textarea', 'rows' => '7', 'maxchar' => 2048, 'class' => 'edit100 keycount'));
echo $this->Form->input('Chamado.status', array('default' => Chamado::STATUS_ANDAMENTO, 'options' => Chamado::statusChamado()));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => $this->params['controller'], 'action' => 'index')) . "';"
));
echo $this->Form->end();