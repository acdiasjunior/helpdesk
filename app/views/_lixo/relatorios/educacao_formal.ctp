<?php
echo $javascript->link(array('preencheCombo', 'jQueryRotateCompressed.2.1'));
?>
<script type="text/javascript">
    
    $(function() {
        $('.rotate').rotate(270);
        $('.rotate').css('display', 'block');
    });
    
</script>
<?php
echo $this->element('filtro');
?>
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td colspan="13">Perfil Sócio Econômico</td>
    </tr>
    <tr style="text-align: center;">
        <td colspan="13">Educação Formal</td>
    </tr>
    <tr style="text-align: center;">
        <td width="58" rowspan="2">&nbsp;</td>
        <td width="79" rowspan="2">Faixa Etária</td>
        <td width="59" rowspan="2">Jardim</td>
        <td width="59" rowspan="2">Creche /<br />
            Maternal</td>
        <td colspan="4">Ensino Fundamental</td>
        <td colspan="3">Ensino Médio</td>
        <td width="59" rowspan="2">Ensino<br />
            Superior</td>
        <td width="59" rowspan="2">Analfa-<br />
            betos</td>
    </tr>
    <tr style="text-align: center;">
        <td width="59">1 a 2 ano</td>
        <td width="59">3 a 4 ano</td>
        <td width="59">5 a 6 ano</td>
        <td width="59">7 a 8 ano</td>
        <td width="59">1 ano</td>
        <td width="59">2 ano</td>
        <td width="59">3 ano</td>
    </tr>
</table>
<br />
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td width="59" rowspan="5"><span class="rotate">Crianças</span></td>
        <td width="79">Até 1 ano</td>
        <td width="59"><?php echo $educacaoFormal['Criança']['jardim']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['maternal']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['1 a 2 ano']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['3 a 4 ano']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['5 a 6 ano']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['7 a 8 ano']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['1 ano medio']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['2 ano medio']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['3 ano medio']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['ensino superior']['ate 1 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Criança']['analfabeto']['ate 1 ano'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="68">1 a 3 anos</td>
        <td><?php echo $educacaoFormal['Criança']['jardim']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['maternal']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 a 2 ano']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 a 4 ano']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['5 a 6 ano']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['7 a 8 ano']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 ano medio']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['2 ano medio']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 ano medio']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['ensino superior']['1 a 3 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['analfabeto']['1 a 3 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">4 a 5 anos</td>
        <td><?php echo $educacaoFormal['Criança']['jardim']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['maternal']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 a 2 ano']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 a 4 ano']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['5 a 6 ano']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['7 a 8 ano']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 ano medio']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['2 ano medio']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 ano medio']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['ensino superior']['4 a 5 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['analfabeto']['4 a 5 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">6 a 9 anos</td>
        <td><?php echo $educacaoFormal['Criança']['jardim']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['maternal']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 a 2 ano']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 a 4 ano']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['5 a 6 ano']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['7 a 8 ano']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['1 ano medio']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['2 ano medio']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['3 ano medio']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['ensino superior']['6 a 9 anos'] ?></td>
        <td><?php echo $educacaoFormal['Criança']['analfabeto']['6 a 9 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">Sub-total</td>
        <td><?php echo array_sum($educacaoFormal['Criança']['jardim']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['maternal']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['1 a 2 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['3 a 4 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['5 a 6 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['7 a 8 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['1 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['2 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['3 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['ensino superior']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Criança']['analfabeto']) ?></td>
    </tr>
</table>
<br />
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td width="59" rowspan="3"><span class="rotate">Adoles-<br />centes</span></td>
        <td width="79">10 a 14 anos</td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['jardim']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['maternal']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['1 a 2 ano']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['3 a 4 ano']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['5 a 6 ano']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['7 a 8 ano']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['1 ano medio']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['2 ano medio']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['3 ano medio']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['ensino superior']['10 a 14 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adolescente']['analfabeto']['10 a 14 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">15 a 19 anos</td>
        <td><?php echo $educacaoFormal['Adolescente']['jardim']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['maternal']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['1 a 2 ano']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['3 a 4 ano']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['5 a 6 ano']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['7 a 8 ano']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['1 ano medio']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['2 ano medio']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['3 ano medio']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['ensino superior']['15 a 19 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adolescente']['analfabeto']['15 a 19 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">Sub-total</td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['jardim']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['maternal']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['1 a 2 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['3 a 4 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['5 a 6 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['7 a 8 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['1 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['2 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['3 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['ensino superior']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adolescente']['analfabeto']) ?></td>
    </tr>
</table>
<br />
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td width="59" rowspan="9"><span class="rotate">Adultos</span></td>
        <td width="79">20 a 23 anos</td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['jardim']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['maternal']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['1 ano medio']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['2 ano medio']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['3 ano medio']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['ensino superior']['20 a 23 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Adulto']['analfabeto']['20 a 23 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">24 a 29 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['24 a 29 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['24 a 29 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">30 a 34 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['30 a 34 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['30 a 34 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">35 a 39 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['35 a 39 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['35 a 39 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">40 a 44 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['40 a 44 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['40 a 44 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">45 a 49 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['45 a 49 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['45 a 49 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">50 a 54 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['50 a 54 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['50 a 54 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">55 a 59 anos</td>
        <td><?php echo $educacaoFormal['Adulto']['jardim']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['maternal']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 a 2 ano']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 a 4 ano']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['5 a 6 ano']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['7 a 8 ano']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['1 ano medio']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['2 ano medio']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['3 ano medio']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['ensino superior']['55 a 59 anos'] ?></td>
        <td><?php echo $educacaoFormal['Adulto']['analfabeto']['55 a 59 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">Sub-total</td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['jardim']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['maternal']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['1 a 2 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['3 a 4 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['5 a 6 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['7 a 8 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['1 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['2 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['3 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['ensino superior']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Adulto']['analfabeto']) ?></td>
    </tr>
</table>
<br />
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td width="59" rowspan="6"><span class="rotate">Idosos</span></td>
        <td width="79">60 a 64 anos</td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['jardim']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['maternal']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['1 a 2 ano']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['3 a 4 ano']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['5 a 6 ano']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['7 a 8 ano']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['1 ano medio']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['2 ano medio']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['3 ano medio']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['ensino superior']['60 a 64 anos'] ?></td>
        <td width="59"><?php echo $educacaoFormal['Idoso']['analfabeto']['60 a 64 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">65 a 69 anos</td>
        <td><?php echo $educacaoFormal['Idoso']['jardim']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['maternal']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 a 2 ano']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 a 4 ano']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['5 a 6 ano']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['7 a 8 ano']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 ano medio']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['2 ano medio']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 ano medio']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['ensino superior']['65 a 69 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['analfabeto']['65 a 69 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">70 a 74 anos</td>
        <td><?php echo $educacaoFormal['Idoso']['jardim']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['maternal']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 a 2 ano']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 a 4 ano']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['5 a 6 ano']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['7 a 8 ano']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 ano medio']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['2 ano medio']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 ano medio']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['ensino superior']['70 a 74 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['analfabeto']['70 a 74 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">75 a 79 anos</td>
        <td><?php echo $educacaoFormal['Idoso']['jardim']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['maternal']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 a 2 ano']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 a 4 ano']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['5 a 6 ano']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['7 a 8 ano']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 ano medio']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['2 ano medio']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 ano medio']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['ensino superior']['75 a 79 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['analfabeto']['75 a 79 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">≥ 80 anos</td>
        <td><?php echo $educacaoFormal['Idoso']['jardim']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['maternal']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 a 2 ano']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 a 4 ano']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['5 a 6 ano']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['7 a 8 ano']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['1 ano medio']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['2 ano medio']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['3 ano medio']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['ensino superior']['acima de 80 anos'] ?></td>
        <td><?php echo $educacaoFormal['Idoso']['analfabeto']['acima de 80 anos'] ?></td>
    </tr>
    <tr style="text-align: center;">
        <td width="79">Sub-total</td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['jardim']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['maternal']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['1 a 2 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['3 a 4 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['5 a 6 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['7 a 8 ano']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['1 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['2 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['3 ano medio']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['ensino superior']) ?></td>
        <td><?php echo array_sum($educacaoFormal['Idoso']['analfabeto']) ?></td>
    </tr>
</table>
<br />
<table width="920" border="1" cellpadding="4" cellspacing="0">
    <tr style="text-align: center;">
        <td width="59" rowspan="6"></td>
        <td width="79">Total</td>
        <td width="59"><?php echo $educacaoFormal['jardim'] ?></td>
        <td width="59"><?php echo $educacaoFormal['maternal'] ?></td>
        <td width="59"><?php echo $educacaoFormal['1 a 2 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['3 a 4 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['5 a 6 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['7 a 8 ano'] ?></td>
        <td width="59"><?php echo $educacaoFormal['1 ano medio'] ?></td>
        <td width="59"><?php echo $educacaoFormal['2 ano medio'] ?></td>
        <td width="59"><?php echo $educacaoFormal['3 ano medio'] ?></td>
        <td width="59"><?php echo $educacaoFormal['ensino superior'] ?></td>
        <td width="59"><?php echo $educacaoFormal['analfabeto'] ?></td>
    </tr>
</table>