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
<table style="text-align: center; width: 920px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="9" rowspan="1" style="width: 80px;">Perfil Sócio Econômico</td>
        </tr>
        <tr>
            <td colspan="9" rowspan="1" style="width: 80px;">Trabalho / Emprego</td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="width: 80px;">Faixa etária</td>
            <td colspan="2" rowspan="1" style="width: 90px;">Assalariado</td>
            <td colspan="2" rowspan="1" style="width: 90px;">Autônomo</td>
            <td colspan="1" rowspan="2" style="width: 90px;">Aposentado / Pensionista</td>
            <td colspan="1" rowspan="2" style="width: 90px;">Trabalhador Rural</td>
            <td colspan="1" rowspan="2" style="width: 90px;">Não Trabalha</td>
        </tr>
        <tr>
            <td style="width: 90px;">com CTPS</td>
            <td style="width: 90px;">sem CTPS</td>
            <td style="width: 90px;">com Previdência</td>
            <td style="width: 90px;">sem Previdência</td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="1" rowspan="5" style="width: 80px;"><span class="rotate">Crianças</span></td>
            <td style="width: 154px;">Até 1 ano</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['ate 1 ano'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_NAO_TRABALHA]['ate 1 ano'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 1 a 3 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['1 a 3 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_NAO_TRABALHA]['1 a 3 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 4 a 5 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['4 a 5 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_NAO_TRABALHA]['4 a 5 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 6 a 9 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['6 a 9 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Criança'][Pessoa::TRABALHO_NAO_TRABALHA]['6 a 9 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 154px;">Sub-total crianças</td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_TRABALHADOR_RURAL]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Criança'][Pessoa::TRABALHO_NAO_TRABALHA]) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="1" rowspan="3" style="width: 80px;"><span class="rotate">Adoles-<br />centes</span></td>
            <td style="width: 154px;">De 10 a 14 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['10 a 14 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_NAO_TRABALHA]['10 a 14 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 15 a 19 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['15 a 19 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adolescente'][Pessoa::TRABALHO_NAO_TRABALHA]['15 a 19 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 154px;">Sub-total Adolescentes</td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_TRABALHADOR_RURAL]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adolescente'][Pessoa::TRABALHO_NAO_TRABALHA]) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="1" rowspan="10" style="width: 80px;"><span class="rotate">Adultos</span></td>
            <td style="width: 154px;">De 20 a 23 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['20 a 23 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['20 a 23 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 24 a 29 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['24 a 29 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['24 a 29 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 30 a 34 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['30 a 34 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['30 a 34 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 35 a 39 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['35 a 39 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['35 a 39 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 40 a 44 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['40 a 44 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['40 a 44 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 45 a 49 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['45 a 49 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['45 a 49 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 50 a 54 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['50 a 54 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['50 a 54 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 55 a 59 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['55 a 59 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]['55 a 59 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 154px;">Sub-total Adultos</td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_TRABALHADOR_RURAL]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Adulto'][Pessoa::TRABALHO_NAO_TRABALHA]) ?></td>
        </tr>
    </tbody>
</table>
<br />
<table style="text-align: center; width: 920px;" border="1" cellpadding="2" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="1" rowspan="7" style="width: 80px;"><span class="rotate">Idosos</span></td>
            <td style="width: 154px;">De 60 a 64 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['60 a 64 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]['60 a 64 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 65 a 69 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['65 a 69 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]['65 a 69 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 70 a 74 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['70 a 74 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]['70 a 74 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">De 75 a 79 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['75 a 79 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]['75 a 79 anos'] ?></td>
        </tr>
        <tr>
            <td style="width: 154px;">Acima de 80 anos</td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]['acima de 80 anos'] ?></td>
            <td style="width: 90px;"><?php echo $faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]['acima de 80 anos'] ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td style="width: 154px;">Sub-total Idosos</td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_ASSALARIADO_SEM_CARTEIRA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_AUTONOMO_SEM_PREVIDENCIA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_APOSENTADO_PENSIONISTA]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_TRABALHADOR_RURAL]) ?></td>
            <td style="width: 90px;"><?php echo array_sum($faixaEtaria['Idoso'][Pessoa::TRABALHO_NAO_TRABALHA]) ?></td>
        </tr>
    </tbody>
</table>
<br />
Tempo de processamento: <?php echo $faixaEtaria['tempo'] ?> segundos.