<?php
/*
 *
 */
?>
<script type="text/javascript">

    var total = 0, desatualizados = 0;
    var limite = 200;

    $.ajax({
        async: false,
        url: "<?php echo $this->Html->url(array('controller' => 'indices', 'action' => 'atualizarIndices', 'total')); ?>",
        dataType: "json",
        success: function(retorno){
            total = retorno.total;
            $(".total").html(retorno.total);
        }
    });

    $.ajax({
        async: false,
        url: "<?php echo $this->Html->url(array('controller' => 'indices', 'action' => 'atualizarIndices', 'desatualizados')); ?>",
        dataType: "json",
        success: function(retorno){
            desatualizados = retorno.desatualizados;
            $(".desatualizados").html(retorno.desatualizados);
        }
    });

    $(function() {
        $(".total").html(total);
        $(".desatualizados").html(desatualizados);
        atualizaIndices();
    });

    function atualizaIndices()
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo $this->Html->url(array('controller' => 'indices', 'action' => 'atualizarIndices', 'atualizar')); ?>",
            dataType: "json",
            data: {
                limit: limite
            },
            success: function(retorno){
                desatualizados = parseInt(retorno.desatualizados);
                $(".desatualizados").html(retorno.desatualizados);
                if(desatualizados > 0)
                    atualizaIndices();
            }
        });
    }

</script>
<?php
echo 'Total de Domícilios: ' . $this->Html->div('total', '') . '<br />';
echo 'Domícilios Desatualizados: ' . $this->Html->div('desatualizados', '') . '<br />';