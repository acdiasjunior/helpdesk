--SELECT
--    count(*) as total,
--    (YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5)) as idade,
--    genero
--FROM
--    pessoas as Pessoa
--LEFT JOIN
--    domicilios AS Domicilio ON Domicilio.codigo_domiciliar = Pessoa.codigo_domiciliar
--WHERE
--    Domicilio.pessoa_count > 0
--GROUP BY
--    Pessoa.genero,
--    idade = 0,
--    idade BETWEEN 1 AND 3,
--    idade BETWEEN 4 AND 5,
--    idade BETWEEN 6 AND 9,
--    idade BETWEEN 10 AND 14,
--    idade BETWEEN 15 AND 19,
--    idade BETWEEN 20 AND 23,
--    idade BETWEEN 24 AND 29,
--    idade BETWEEN 30 AND 34,
--    idade BETWEEN 35 AND 39,
--    idade BETWEEN 40 AND 44,
--    idade BETWEEN 45 AND 49,
--    idade BETWEEN 50 AND 54,
--    idade BETWEEN 55 AND 59,
--    idade BETWEEN 60 AND 64,
--    idade BETWEEN 65 AND 69,
--    idade BETWEEN 70 AND 74,
--    idade BETWEEN 75 AND 79,
--    idade > 80,
--    idade >= 0
--ORDER BY
--    genero,
--    idade

SELECT
    (YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5)) as idade,
   genero,
   FaixasEtaria.faixa,
   FaixasEtaria.descricao
FROM
   pessoas as Pessoa
INNER JOIN
faixas_etarias AS FaixasEtaria ON
    CASE 
        WHEN
            FaixasEtaria.idade > 80 THEN 80
        ELSE
            FaixasEtaria.idade
    END
INNER JOIN
   domicilios AS Domicilio ON Domicilio.codigo_domiciliar = Pessoa.codigo_domiciliar
WHERE
   Domicilio.pessoa_count > 0
ORDER BY
   genero