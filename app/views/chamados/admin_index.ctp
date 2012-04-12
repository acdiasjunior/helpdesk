<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<script type="text/javascript">
    var filtro = '<?php echo $this->params['action'] ?>';
</script>
<table id="flex" style="display: none"></table>