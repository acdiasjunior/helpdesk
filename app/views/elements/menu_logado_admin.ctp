<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul>
    <li><a href="#" class="hide pai">Cadastros</a>
        <ul>
            <li>
                <a href="#" class="hide">Categorias »</a>
                <ul>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'index')); ?>">Lista</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'incluir')); ?>">Incluir</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="hide">Subcategorias »</a>
                <ul>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'index')); ?>">Lista</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'incluir')); ?>">Incluir</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="hide">Grupos »</a>
                <ul>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'grupos', 'action' => 'index')); ?>">Lista</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'grupos', 'action' => 'incluir')); ?>">Incluir</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" class="hide pai">Chamados</a>
        <ul>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'chamados', 'action' => 'abertos')); ?>">Abertos</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'chamados', 'action' => 'andamento')); ?>">Em andamento</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'chamados', 'action' => 'fechados')); ?>">Fechados</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'chamados', 'action' => 'index')); ?>">Todos</a>
            </li>
        </ul>
    </li>
    <li><a href="#" class="hide pai">Usuário</a>
        <ul>
            <li>
                <a href="#" class="hide">Usuários »</a>
                <ul>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'index')); ?>">Lista</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'incluir')); ?>">Incluir</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => false, 'controller' => 'usuarios', 'action' => 'mudarSenha')); ?>" class="hide">Mudar Senha</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('admin' => false,'controller' => 'usuarios', 'action' => 'logout')); ?>" class="hide">Sair</a>
            </li>
        </ul>
    </li>
</ul>