<?php
/*
*
*/
?>
<script type="text/javascript">
    
    var chart;
    $(document).ready(function() {
        var colors = Highcharts.getOptions().colors,
        categories = [
            'Vulnerabilidade Familiar',
            'Acesso ao Conhecimento',
            'Acesso ao Trabalho',
            'Disponibilidade de Recursos',
            'Desenvolvimento Infantil',
            'Condições Habitacionais'
        ],
        name = 'Valores por Dimensão',
        data = [{ 
                y: <?php echo round($indices[0][0]['vulnerabilidade'], 2) ?>,
                color: colors[0],
                drilldown: {
                    name: 'Vulnerabilidade Familiar',
                    categories: ['v1', 'v2', 'v3', 'v4', 'v5', 'v6', 'v7', 'v8', 'v9'],
                    data: [
                        <?php echo round($indices[0][0]['v1'], 2) ?>,
                        <?php echo round($indices[0][0]['v2'], 2) ?>,
                        <?php echo round($indices[0][0]['v3'], 2) ?>,
                        <?php echo round($indices[0][0]['v4'], 2) ?>,
                        <?php echo round($indices[0][0]['v5'], 2) ?>,
                        <?php echo round($indices[0][0]['v6'], 2) ?>,
                        <?php echo round($indices[0][0]['v7'], 2) ?>,
                        <?php echo round($indices[0][0]['v8'], 2) ?>,
                        <?php echo round($indices[0][0]['v9'], 2) ?>
                    ],
                    color: colors[0]
                }
            }, {
                y: <?php echo round($indices[0][0]['conhecimento'], 2) ?>,
                color: colors[1],
                drilldown: {
                    name: 'Acesso ao Conhecimento',
                    categories: ['c1', 'c2', 'c3', 'c4', 'c5'],
                    data: [
                        <?php echo round($indices[0][0]['c1'], 2) ?>,
                        <?php echo round($indices[0][0]['c2'], 2) ?>,
                        <?php echo round($indices[0][0]['c3'], 2) ?>,
                        <?php echo round($indices[0][0]['c4'], 2) ?>,
                        <?php echo round($indices[0][0]['c5'], 2) ?>
                    ],
                    color: colors[1]
                }
            }, {
                y: <?php echo round($indices[0][0]['trabalho'], 2) ?>,
                color: colors[2],
                drilldown: {
                    name: 'Acesso ao Trabalho',
                    categories: ['t1', 't2', 't3', 't4', 't5'],
                    data: [
                        <?php echo round($indices[0][0]['t1'], 2) ?>,
                        <?php echo round($indices[0][0]['t2'], 2) ?>,
                        <?php echo round($indices[0][0]['t3'], 2) ?>,
                        <?php echo round($indices[0][0]['t4'], 2) ?>,
                        <?php echo round($indices[0][0]['t5'], 2) ?>
                    ],
                    color: colors[2]
                }
            }, {
                y: <?php echo round($indices[0][0]['recursos'], 2) ?>,
                color: colors[3],
                drilldown: {
                    name: 'Disponibilidade de Recursos',
                    categories: ['r1', 'r2', 'r3', 'r4', 'r5', 'r6'],
                    data: [
                        <?php echo round($indices[0][0]['r1'], 2) ?>,
                        <?php echo round($indices[0][0]['r2'], 2) ?>,
                        <?php echo round($indices[0][0]['r3'], 2) ?>,
                        <?php echo round($indices[0][0]['r4'], 2) ?>,
                        <?php echo round($indices[0][0]['r5'], 2) ?>,
                        <?php echo round($indices[0][0]['r6'], 2) ?>
                    ],
                    color: colors[3]
                }
            }, {
                y: <?php echo round($indices[0][0]['desenvolvimento'], 2) ?>,
                color: '#F4FA58',
                drilldown: {
                    name: 'Desenvolvimento Infantil',
                    categories: ['d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8'],
                    data: [
                        <?php echo round($indices[0][0]['d1'], 2) ?>,
                        <?php echo round($indices[0][0]['d2'], 2) ?>,
                        <?php echo round($indices[0][0]['d3'], 2) ?>,
                        <?php echo round($indices[0][0]['d4'], 2) ?>,
                        <?php echo round($indices[0][0]['d5'], 2) ?>,
                        <?php echo round($indices[0][0]['d6'], 2) ?>,
                        <?php echo round($indices[0][0]['d7'], 2) ?>,
                        <?php echo round($indices[0][0]['d8'], 2) ?>
                    ],
                    color: '#F4FA58'
                }
            }, {
                y: <?php echo round($indices[0][0]['habitacao'], 2) ?>,
                color: '#FE9A2E',
                drilldown: {
                    name: 'Condições Habitacionais',
                    categories: ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8'],
                    data: [
                        <?php echo round($indices[0][0]['h1'], 2) ?>,
                        <?php echo round($indices[0][0]['h2'], 2) ?>,
                        <?php echo round($indices[0][0]['h3'], 2) ?>,
                        <?php echo round($indices[0][0]['h4'], 2) ?>,
                        <?php echo round($indices[0][0]['h5'], 2) ?>,
                        <?php echo round($indices[0][0]['h6'], 2) ?>,
                        <?php echo round($indices[0][0]['h7'], 2) ?>,
                        <?php echo round($indices[0][0]['h8'], 2) ?>
                    ],
                    color: '#FE9A2E'
                }
            }];
			
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories);
            chart.series[0].remove();
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            });
        }
			
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container', 
                type: 'column'
            },
            legend: {
                enabled: false
            },
            title: {
                text: 'Índice do Desenvolvimento Familiar por Dimensão'
            },
            subtitle: {
                //text: 'Clique para ver por indicador. Clique novamente para ver por dimensão.'
            },
            xAxis: {
                categories: categories							
            },
            yAxis: {
                title: {
                    text: 'Valor'
                },
                max : 1,
                min : 0
            },
            plotOptions: {
                column: {
                    //cursor: 'pointer',
                    point: {
                        events: {
                            //                            click: function() {
                            //                                var drilldown = this.drilldown;
                            //                                if (drilldown) { // drill down
                            //                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                            //                                } else { // restore
                            //                                    setChart(name, categories, data);
                            //                                }
                            //                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y + '';
                        }
                    }					
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                    s = this.x +':<b>'+ this.y +'</b><br/>';
                    if (point.drilldown) {
                        //s += 'Click to view '+ point.category +' versions';
                    } else {
                        //s += 'Click to return to browser brands';
                    }
                    return s;
                }
            },
            series: [{
                    name: name,
                    data: data,
                    color: 'white'
                }],
            exporting: {
                enabled: false
            }
        });
    });
    
    $(function() {
        $('.rotate').rotate(270);
        $('.rotate').css('display', 'block');
        $("text:contains('Highcharts.com')").hide();
    });

</script>
<?php
echo $this->element('filtro');
?>
<table border="0" cellspacing="0" cellpadding="5">
    <tr>
        <td width="50"></td>
        <td width="90" style="background-color: #666; color: #fff;">Classificação</td>
        <td width="100" style="background-color: #666; color: #fff;">Agrupamento</td>
        <td width="72" style="background-color: #666; color: #fff;">Famílias</td>
        <td width="2" rowspan="7"></td>
        <td width="94" style="background-color: #666; color: #fff; text-align: center;">%</td>
        <td width="2" rowspan="7"></td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">10</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">20</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">30</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">40</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">50</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">60</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">70</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">80</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">90</td>
        <td width="24" style="background-color: #666; color: #fff; text-align: right;">100</td>
    </tr>
    <tr>
        <td width="50" rowspan="5" style="background-color: #666; color: #fff;"><span class="rotate">Índice de<br />Desenvolvimento<br />Familiar</span></td>
        <td style="background-color: blue;"></td>
        <td style="background-color: #fff;">0.91 a 1.00</td>
        <td style="background-color: #fff;"><?php echo $totais['maior09'] ?></td>
        <td width="94" style="text-align: center; background-color: #fff;"><?php echo round(($totais['maior09'] * 100) / $totais['total'], 2) ?> %</td>
        <td colspan="10" style="background-color: #fff;"><div style="background-color: blue; width: <?php echo round((($totais['maior09'] * 100) / $totais['total']) * 330 / 100) ?>px; height: 10px;"></div></td>
    </tr>
    <tr>
        <td style="background-color: green;"></td>
        <td style="background-color: #fff;">0.81 a 0.90</td>
        <td style="background-color: #fff;"><?php echo $totais['de08a09'] ?></td>
        <td width="94" style="text-align: center; background-color: #fff;"><?php echo round(($totais['de08a09'] * 100) / $totais['total'], 2) ?> %</td>
        <td colspan="10" style="background-color: #fff;"><div style="background-color: green; width: <?php echo round((($totais['de08a09'] * 100) / $totais['total']) * 330 / 100) ?>px; height: 10px;"></div></td>
    </tr>
    <tr>
        <td style="background-color: yellow;"></td>
        <td style="background-color: #fff;">0.71 a 0.80</td>
        <td style="background-color: #fff;"><?php echo $totais['de07a08'] ?></td>
        <td width="94" style="text-align: center; background-color: #fff;"><?php echo round(($totais['de07a08'] * 100) / $totais['total'], 2) ?> %</td>
        <td colspan="10" style="background-color: #fff;"><div style="background-color: yellow; width: <?php echo round((($totais['de07a08'] * 100) / $totais['total']) * 330 / 100) ?>px; height: 10px;"></div></td>
    </tr>
    <tr>
        <td style="background-color: orange;"></td>
        <td style="background-color: #fff;">0.61 a 0.70</td>
        <td style="background-color: #fff;"><?php echo $totais['de06a07'] ?></td>
        <td width="94" style="text-align: center; background-color: #fff;"><?php echo round(($totais['de06a07'] * 100) / $totais['total'], 2) ?> %</td>
        <td colspan="10" style="background-color: #fff;"><div style="background-color: orange; width: <?php echo round((($totais['de06a07'] * 100) / $totais['total']) * 330 / 100) ?>px; height: 10px;"></div></td>
    </tr>
    <tr>
        <td style="background-color: red;"></td>
        <td style="background-color: #fff;">0 a 0.60</td>
        <td style="background-color: #fff;"><?php echo $totais['ate06'] ?></td>
        <td width="94" style="text-align: center; background-color: #fff;"><?php echo round(($totais['ate06'] * 100) / $totais['total'], 2) ?> %</td>
        <td colspan="10" style="background-color: #fff;"><div style="background-color: red; width: <?php echo round((($totais['ate06'] * 100) / $totais['total']) * 330 / 100) ?>px; height: 10px;"></div></td>
    </tr>
    <tr>
        <td width="50"></td>
        <td colspan="2" style="background-color: #666; color: #fff;">Total Famílias Referenciadas</td>
        <td style="background-color: #666; color: #fff;"><?php echo $totais['total'] ?></td>
        <td width="94" style="background-color: #666; color: #fff; text-align: center;">100 %</td>
        <td colspan="10"></td>
    </tr>
</table>
<div id="container" style="width: 700px; height: 300px; margin: 30px auto 0px auto"></div>
<?php
echo $javascript->link(array('highcharts/highcharts', 'jQueryRotateCompressed.2.1'));
echo 'Média: ' . round($indices[0][0]['idf_media'], 2) . '<br />';
echo 'Máximo: ' . round($indices[0][0]['idf_max'], 2) . '<br />';
echo 'Mínimo: ' . round($indices[0][0]['idf_min'], 2) . '<br />';
echo '<br />';