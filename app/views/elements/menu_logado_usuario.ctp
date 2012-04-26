<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul>
    <li><a href="#" class="hide pai">Chamados</a>
        <ul>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'chamados', 'action' => 'abrir')); ?>" class="hide">Abrir Chamado</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'chamados', 'action' => 'index')); ?>" class="hide">Exibir Chamados</a>
            </li>
        </ul>
    </li>
    <li><a href="#" class="hide pai">Usuário</a>
        <ul>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'usuarios', 'action' => 'mudarSenha')); ?>" class="hide">Mudar Senha</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'usuarios', 'action' => 'logout')); ?>" class="hide">Sair</a>
            </li>
        </ul>
    </li>
</ul>