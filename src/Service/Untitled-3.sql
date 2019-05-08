SELECT B.*,
                P.name as nameplanet,
                M.title  as namemovie
                from beast as B 
                left join planet AS P 
                on P.id = B.id_planet
                left join movie AS M 
                on M.id = B.id_movie 
                 where B.id = 14;