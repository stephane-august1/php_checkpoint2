SELECT B.*,
       P.name as nameplanet,
       M.title as namemovie   
       from beast as B 
       left join planet AS P 
       on P.id = B.id 
       left join movie AS M 
       on M.id = B.id order by B.id;