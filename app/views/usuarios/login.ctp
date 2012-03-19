<?php

if($session->check('Message.flash'))
	echo $session->flash();
echo $session->flash('auth');

//echo $pass;

?>
<?php echo $form->create('Usuario', array('action' => 'login')); ?>
<table border="0" cellspacing="0" cellpadding="5" background-color="#BBB">
	<tr>
		<td rowspan="1" colspan="2">Por favor, digite seu Usuário e Senha</td>
	</tr>
	<tr>
		<td rowspan="3" colspan="1"><?php echo $html->image("cadeado.png", array('alt' => 'Cadeado')); ?></td>
		<td><?php echo $form->input('username', array('label' => 'Usuário')); ?></td>
	</tr>
	<tr>
		<td><?php echo $form->input('password', array('label' => 'Senha')); ?></td>
	</tr>
	<tr>
		<td><?php echo $this->Form->submit('Login'); ?></td>
	</tr>
</table>
<?php echo $form->end(); ?>