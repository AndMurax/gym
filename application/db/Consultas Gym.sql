SELECT m.MembroID, m.Nome, amp.DataTermino FROM membro m
LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID ;



/*Levantar dados de membros por ano(total do ano)*/
SELECT sum(pt.PrecoPlano) FROM membro m
INNER JOIN planostreino pt on pt.PlanoID = m.PlanoID
INNER JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID 
INNER JOIN (SELECT MembroID, year(amp.DataTermino) as ano
from associacao_membro_plano amp where year(amp.DataTermino) = year(now())) dias on dias.MembroID = m.MembroID
WHERE m.Ativo = 1 ;




SELECT * FROM planostreino;


SELECT MembroID, dateDIFF(, year(amp.DataTermino)) as dias_restante 
from associacao_membro_plano amp;
