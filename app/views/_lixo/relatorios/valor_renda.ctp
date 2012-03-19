<?php
echo $javascript->link(array('preencheCombo'));
?>
<style type="text/css">
    .rotate {
        display: block;
        -webkit-transform: rotate(270deg);
        -moz-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        -o-transform: rotate(270deg);
        writing-mode: lr-bt;
        text-align: center;
        font-weight: bold;
    }
</style>
<?php
echo $this->element('filtro');
?>
<table style="text-align: center; margin-left: 0px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr style="font-weight: bold;">
            <td colspan="8">Perfil Sócio Econômico</td>
        </tr>
        <tr style="font-weight: bold;">
            <td colspan="8">Valor Renda</td>
        </tr>
        <tr>
            <td style="width: 255px;" colspan="2">Faixa etária</td>
            <td style="width: 105px;">0,00</td>
            <td style="width: 105px;">0,01 a 70,00</td>
            <td style="width: 105px;">70,01 a 140,00</td>
            <td style="width: 105px;">140,01 a 240,00</td>
            <td style="width: 105px;">240,01 a 545,00</td>
            <td style="width: 105px;">&gt; 545,00</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; margin-left: 0px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td style="width: 60px;" rowspan="5"><span class="rotate">Crianças</span></td>
            <td style="width: 200px;">até 1 ano</td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['0 reais']['ate 1 ano'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['ate 70 reais']['ate 1 ano'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['70 a 140 reais']['ate 1 ano'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['140 a 240 reais']['ate 1 ano'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['240 a 545 reais']['ate 1 ano'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['acima 545 reais']['ate 1 ano'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 1 a 3 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['0 reais']['1 a 3 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['ate 70 reais']['1 a 3 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['70 a 140 reais']['1 a 3 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['140 a 240 reais']['1 a 3 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['240 a 545 reais']['1 a 3 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['acima 545 reais']['1 a 3 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 4 a 5 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['0 reais']['4 a 5 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['ate 70 reais']['4 a 5 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['70 a 140 reais']['4 a 5 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['140 a 240 reais']['4 a 5 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['240 a 545 reais']['4 a 5 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['acima 545 reais']['4 a 5 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 6 a 9 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['0 reais']['6 a 9 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['ate 70 reais']['6 a 9 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['70 a 140 reais']['6 a 9 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['140 a 240 reais']['6 a 9 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['240 a 545 reais']['6 a 9 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Criança']['acima 545 reais']['6 a 9 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 200px;">Sub-total Crianças</td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['0 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['ate 70 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['70 a 140 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['140 a 240 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['240 a 545 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Criança']['acima 545 reais']) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; margin-left: 0px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td style="width: 60px;" rowspan="3"><span class="rotate">Adoles-<br />centes</span></td>
            <td style="width: 200px;">De 10 a 14 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['0 reais']['10 a 14 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['ate 70 reais']['10 a 14 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['70 a 140 reais']['10 a 14 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['140 a 240 reais']['10 a 14 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['240 a 545 reais']['10 a 14 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['acima 545 reais']['10 a 14 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 15 a 19 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['0 reais']['15 a 19 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['ate 70 reais']['15 a 19 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['70 a 140 reais']['15 a 19 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['140 a 240 reais']['15 a 19 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['240 a 545 reais']['15 a 19 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adolescente']['acima 545 reais']['15 a 19 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 200px;">Sub-total Adolescentes</td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['0 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['ate 70 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['70 a 140 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['140 a 240 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['240 a 545 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adolescente']['acima 545 reais']) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; margin-left: 0px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td style="width: 60px;" rowspan="10"><span class="rotate">Adultos</span></td>
            <td style="width: 200px;">de 20 a 23 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['20 a 23 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['20 a 23 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['20 a 23 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['20 a 23 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['20 a 23 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['20 a 23 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 24 a 29 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['24 a 29 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['24 a 29 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['24 a 29 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['24 a 29 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['24 a 29 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['24 a 29 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 30 a 34 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['30 a 34 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['30 a 34 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['30 a 34 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['30 a 34 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['30 a 34 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['30 a 34 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 35 a 39 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['35 a 39 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['35 a 39 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['35 a 39 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['35 a 39 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['35 a 39 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['35 a 39 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 40 a 44 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['40 a 44 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['40 a 44 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['40 a 44 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['40 a 44 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['40 a 44 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['40 a 44 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 45 a 49 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['45 a 49 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['45 a 49 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['45 a 49 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['45 a 49 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['45 a 49 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['45 a 49 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 50 a 54 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['50 a 54 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['50 a 54 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['50 a 54 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['50 a 54 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['50 a 54 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['50 a 54 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 55 a 59 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['0 reais']['55 a 59 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['ate 70 reais']['55 a 59 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['70 a 140 reais']['55 a 59 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['140 a 240 reais']['55 a 59 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['240 a 545 reais']['55 a 59 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Adulto']['acima 545 reais']['55 a 59 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 200px;">Sub-total Adultos</td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['0 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['ate 70 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['70 a 140 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['140 a 240 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['240 a 545 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Adulto']['acima 545 reais']) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; margin-left: 0px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td style="width: 60px;" rowspan="7"><span class="rotate">Idosos</span></td>
            <td style="width: 200px;">De 60 a 64 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['0 reais']['60 a 64 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['ate 70 reais']['60 a 64 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['70 a 140 reais']['60 a 64 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['140 a 240 reais']['60 a 64 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['240 a 545 reais']['60 a 64 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['acima 545 reais']['60 a 64 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 65 a 69 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['0 reais']['65 a 69 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['ate 70 reais']['65 a 69 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['70 a 140 reais']['65 a 69 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['140 a 240 reais']['65 a 69 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['240 a 545 reais']['65 a 69 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['acima 545 reais']['65 a 69 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 70 a 74 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['0 reais']['70 a 74 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['ate 70 reais']['70 a 74 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['70 a 140 reais']['70 a 74 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['140 a 240 reais']['70 a 74 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['240 a 545 reais']['70 a 74 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['acima 545 reais']['70 a 74 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">De 75 a 79 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['0 reais']['75 a 79 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['ate 70 reais']['75 a 79 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['70 a 140 reais']['75 a 79 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['140 a 240 reais']['75 a 79 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['240 a 545 reais']['75 a 79 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['acima 545 reais']['75 a 79 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Acima de 80 anos</td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['0 reais']['acima de 80 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['ate 70 reais']['acima de 80 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['70 a 140 reais']['acima de 80 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['140 a 240 reais']['acima de 80 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['240 a 545 reais']['acima de 80 anos'] ?></td>
            <td style="width: 110px;"><?php echo $valorRenda['Idoso']['acima 545 reais']['acima de 80 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 200px;">Sub-total Idosos</td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['0 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['ate 70 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['70 a 140 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['140 a 240 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['240 a 545 reais']) ?></td>
            <td style="width: 110px;"><?php echo array_sum($valorRenda['Idoso']['acima 545 reais']) ?></td>
        </tr>
    </tbody>
</table>
<br />
Tempo de processamento: <?php echo $valorRenda['tempo'] ?> segundos.