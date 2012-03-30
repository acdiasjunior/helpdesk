<?php
$logado = $this->Session->check('Auth.Usuario');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            HelpDesk Virtual - <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('redmond/jquery-ui-1.8.12.custom');
        echo $this->Html->css('estilos');
        echo $this->Html->css('campos');
        echo $this->Html->css('menu');
        echo $javascript->link(array('configuracoes', 'jquery-1.6.2.min', 'jquery-ui-1.8.12.custom.min', 'jquery-ui-timepicker-addon', 'jquery.ui.datepicker-pt-BR', 'hideflash', 'focusfirst'), true);
        echo $scripts_for_layout;
        echo $viewscript->incluir();
        ?>
    </head>
    <body>
        <div id="pagecontainer">
            <div id="pageheader">
                <div style="text-decoration: none; color: #5c7492; font-size: 16pt; font-weight: bold; line-height: 70px;">
                    HelpDesk - Virtual Business
                </div>
            </div>
            <div id="pagebody">
                <div id="pagebody_menu">
                    <div id="pagebody_menu_aba">
                        <?php echo $this->Html->image('menu_aba_esq.jpg', array('id' => 'pagebody_menu_aba_esq', 'alt' => '', 'width' => 17, 'height' => 24)); ?>
                        <div class="menu">
                            <?php
                            if ($logado) {
                                if ($this->Session->read('Auth.Usuario.tipo_usuario') == Usuario::TIPO_USUARIO)
                                    echo $this->element('menu_logado_usuario');
                                else if ($this->Session->read('Auth.Usuario.tipo_usuario') == Usuario::TIPO_ADMINISTRADOR)
                                    echo $this->element('menu_logado_admin');
                                else if ($this->Session->read('Auth.Usuario.tipo_usuario') == Usuario::TIPO_SUPORTE)
                                    echo $this->element('menu_logado_suporte');
                            }
                            else
                                echo $this->element('menu_deslogado');
                            ?>
                        </div>
                        <?php echo $this->Html->image('menu_aba_dir.jpg', array('id' => 'pagebody_menu_aba_dir', 'alt' => '', 'width' => 17, 'height' => 24)); ?>
                        <span style="float: right; margin-right: 10px;">
                            <?php
                            if ($logado) {
                                echo 'Logado como: ' . $this->Session->read('Auth.Usuario.nome') . ' &nbsp;&nbsp;&nbsp;';
                                echo $this->Html->link('Sair', array('admin' => false, 'controller' => 'usuarios', 'action' => 'logout'), array('target' => '_parent', 'style' => 'color: white; text-decoration: none; font-weight: bold;'));
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div id="pagecontent">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </div>
            <div style="width: 1000px; height: 5px; position: absolute; bottom: 70px; background-color: #145a75;"></div>
            <div id="pagefooter">
                <div style="float: left; margin-right: 30px;">
                    Virtual Business - Sistemas
                </div>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
