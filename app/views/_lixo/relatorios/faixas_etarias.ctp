<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
    }
</style>
<?php
echo $this->element('filtro');
?>
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td style="width: 388px; font-weight: bold;">Faixa etária - anos</td>
            <td style="width: 150px; font-weight: bold;">Masculino</td>
            <td style="width: 150px; font-weight: bold;">Feminino</td>
            <td style="width: 100px; font-weight: bold;">Total</td>
            <td style="width: 100px; font-weight: bold;">%</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="5" style="width: 65px; font-weight: bold;"><span class="rotate">Crianças</span></td>
            <td style="width: 317px;">até 1 ano</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_MASCULINO]['ate 1 ano'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_FEMININO]['ate 1 ano'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Criança']['ate 1 ano']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Criança']['ate 1 ano'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">1 a 3 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_MASCULINO]['1 a 3 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_FEMININO]['1 a 3 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Criança']['1 a 3 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Criança']['1 a 3 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">4 a 5 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_MASCULINO]['4 a 5 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_FEMININO]['4 a 5 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Criança']['4 a 5 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Criança']['4 a 5 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">6 a 9 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_MASCULINO]['6 a 9 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_FEMININO]['6 a 9 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Criança']['6 a 9 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Criança']['6 a 9 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total crianças</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_MASCULINO]['total'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Criança'][Pessoa::GENERO_FEMININO]['total'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Criança']['total']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Criança']['total'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="3" style="width: 65px; font-weight: bold;"><span class="rotate">Adoles-<br />centes</span></td>
            <td style="width: 317px;">10 a 14 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_MASCULINO]['10 a 14 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_FEMININO]['10 a 14 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adolescente']['10 a 14 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adolescente']['10 a 14 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">15 a 19 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_MASCULINO]['15 a 19 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_FEMININO]['15 a 19 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adolescente']['15 a 19 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adolescente']['15 a 19 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total adolescentes</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_MASCULINO]['total'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::GENERO_FEMININO]['total'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adolescente']['total']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adolescente']['total'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="9" style="width: 65px; font-weight: bold;"><span class="rotate">Adulto</span></td>
            <td style="width: 317px;">20 a 23 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['20 a 23 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['20 a 23 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['20 a 23 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['20 a 23 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">24 a 29 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['24 a 29 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['24 a 29 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['24 a 29 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['24 a 29 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">30 a 34 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['30 a 34 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['30 a 34 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['30 a 34 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['30 a 34 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">35 a 39 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['35 a 39 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['35 a 39 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['35 a 39 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['35 a 39 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">40 a 44 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['40 a 44 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['40 a 44 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['40 a 44 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['40 a 44 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">45 a 49 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['45 a 49 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['45 a 49 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['45 a 49 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['45 a 49 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">50 a 54 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['50 a 54 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['50 a 54 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['50 a 54 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['50 a 54 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">55 a 59 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['55 a 59 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['55 a 59 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['55 a 59 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['55 a 59 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total Adultos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_MASCULINO]['total'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Adulto'][Pessoa::GENERO_FEMININO]['total'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Adulto']['total']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Adulto']['total'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="6" style="width: 65px; font-weight: bold;"><span class="rotate">Idoso</span></td>
            <td style="width: 317px;">60 a 64 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['60 a 64 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['60 a 64 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['60 a 64 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['60 a 64 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">65 a 69 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['65 a 69 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['65 a 69 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['65 a 69 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['65 a 69 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">70 a 74 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['70 a 74 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['70 a 74 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['70 a 74 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['70 a 74 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">75 a 79 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['75 a 79 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['75 a 79 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['75 a 79 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['75 a 79 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">≥ 80 anos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['acima de 80 anos'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['acima de 80 anos'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['acima de 80 anos']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['acima de 80 anos'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total Idosos</td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_MASCULINO]['total'] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria['Idoso'][Pessoa::GENERO_FEMININO]['total'] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['Idoso']['total']  ?></td>
            <td style="width: 100px;"><?php echo round($faixaEtaria['Idoso']['total'] * 100 / $faixaEtaria['total'],2) ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr style="font-weight: bold;">
            <td style="width: 388px;">Total</td>
            <td style="width: 150px;"><?php echo $faixaEtaria[Pessoa::GENERO_MASCULINO] ?></td>
            <td style="width: 150px;"><?php echo $faixaEtaria[Pessoa::GENERO_FEMININO] ?></td>
            <td style="width: 100px;"><?php echo $faixaEtaria['total'] ?></td>
            <td style="width: 100px;">100 %</td>
        </tr>
    </tbody>
        <tr style="font-weight: bold;">
            <td>Total de Familias Referenciadas</td>
            <td colspan="4"><?php echo $domicilios ?></td>
        </tr>
    </tbody>
</table>
<br />
Tempo de processamento: <?php echo $faixaEtaria['tempo'] ?> segundos.