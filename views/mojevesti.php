<?php

foreach ($vesti as $vest) {
    echo $vest->naslov; 
    echo " <a href=\"?controller=korisnik&akcija=izmenivest&id=".$vest->id."\">Izmeni</a> ";
    echo "<a href=\"?controller=korisnik&akcija=obrisivest&id=".$vest->id."\">Obrisi</a><br>";
}

