<table>
    <tr><th>Naslov</th><th>Autor</th>  
<?php
foreach ($vesti as $vest) {
    echo "<tr><td>".$vest->naslov."</td><td>".$vest->autor. "</td>";
    echo "<td><a href=\"?controller=admin&akcija=obrisivest&id=".$vest->id."\">Obrisi</a></td></tr>";
}
?>

</table>