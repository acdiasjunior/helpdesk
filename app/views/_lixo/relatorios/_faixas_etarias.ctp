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
<h2>Estratificação Familiar</h2>
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
            <td style="width: 317px;">até 11 meses</td>
            <td style="width: 150px;"><?php echo $total['crianca']['masculino']['ate1ano'] ?></td>
            <td style="width: 150px;"><?php echo $total['crianca']['feminino']['ate1ano'] ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['ate1ano']  ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['%']['ate1ano'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">1 a 3 anos</td>
            <td style="width: 150px;"><?php echo $total['crianca']['masculino']['1a3anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['crianca']['feminino']['1a3anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['1a3anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['%']['1a3anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">4 a 5 anos</td>
            <td style="width: 150px;"><?php echo $total['crianca']['masculino']['4a5anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['crianca']['feminino']['4a5anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['4a5anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['%']['4a5anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">6 a 9 anos</td>
            <td style="width: 150px;"><?php echo $total['crianca']['masculino']['6a9anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['crianca']['feminino']['6a9anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['6a9anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['%']['6a9anos'] ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total crianças</td>
            <td style="width: 150px;"><?php echo $total['crianca']['masculino']['total'] ?></td>
            <td style="width: 150px;"><?php echo $total['crianca']['feminino']['total'] ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['total']  ?></td>
            <td style="width: 100px;"><?php echo $total['crianca']['%']['total'] ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="3" style="width: 65px; font-weight: bold;"><span class="rotate">Adoles-<br />cente</span></td>
            <td style="width: 317px;">10 a 14 anos</td>
            <td style="width: 150px;"><?php echo $total['adolescente']['masculino']['10a14anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adolescente']['feminino']['10a14anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['10a14anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['%']['10a14anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">15 a 19 anos</td>
            <td style="width: 150px;"><?php echo $total['adolescente']['masculino']['15a19anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adolescente']['feminino']['15a19anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['15a19anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['%']['15a19anos'] ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total adolescentes</td>
            <td style="width: 150px;"><?php echo $total['adolescente']['masculino']['total'] ?></td>
            <td style="width: 150px;"><?php echo $total['adolescente']['feminino']['total'] ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['total']  ?></td>
            <td style="width: 100px;"><?php echo $total['adolescente']['%']['total'] ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="9" style="width: 65px; font-weight: bold;"><span class="rotate">Adulto</span></td>
            <td style="width: 317px;">20 a 23 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['20a23anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['20a23anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['20a23anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['20a23anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">24 a 29 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['24a29anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['24a29anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['24a29anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['24a29anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">30 a 34 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['30a34anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['30a34anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['30a34anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['30a34anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">35 a 39 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['35a39anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['35a39anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['35a39anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['35a39anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">40 a 44 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['40a44anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['40a44anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['40a44anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['40a44anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">45 a 49 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['45a49anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['45a49anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['45a49anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['45a49anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">50 a 54 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['50a54anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['50a54anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['50a54anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['50a54anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">55 a 59 anos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['55a59anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['55a59anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['55a59anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['55a59anos'] ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total adultos</td>
            <td style="width: 150px;"><?php echo $total['adulto']['masculino']['total'] ?></td>
            <td style="width: 150px;"><?php echo $total['adulto']['feminino']['total'] ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['total']  ?></td>
            <td style="width: 100px;"><?php echo $total['adulto']['%']['total'] ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr>
            <td rowspan="6" style="width: 65px; font-weight: bold;"><span class="rotate">Idoso</span></td>
            <td style="width: 317px;">60 a 64 anos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['60a64anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['60a64anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['60a64anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['60a64anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">65 a 69 anos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['65a69anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['65a69anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['65a69anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['65a69anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">70 a 74 anos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['70a74anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['70a74anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['70a74anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['70a74anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">75 a 79 anos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['75a79anos'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['75a79anos'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['75a79anos']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['75a79anos'] ?> %</td>
        </tr>
        <tr>
            <td style="width: 317px;">≥ 80 anos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['80acima'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['80acima'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['80acima']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['80acima'] ?> %</td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 317px;">Sub-total idosos</td>
            <td style="width: 150px;"><?php echo $total['idoso']['masculino']['total'] ?></td>
            <td style="width: 150px;"><?php echo $total['idoso']['feminino']['total'] ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['total']  ?></td>
            <td style="width: 100px;"><?php echo $total['idoso']['%']['total'] ?> %</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="4" cellspacing="0">
    <tbody>
        <tr style="font-weight: bold;">
            <td style="width: 388px;">Total</td>
            <td style="width: 150px;"><?php echo $total['masculino']['total'] ?></td>
            <td style="width: 150px;"><?php echo $total['feminino']['total'] ?></td>
            <td style="width: 100px;"><?php echo $total['total'] ?></td>
            <td style="width: 100px;">100 %</td>
        </tr>
    </tbody>
</table>
<br />
Tempo de processamento: <?php echo $tempo ?> segundos.