<form method="GET">
    <input type="hidden" name="controller" value="<?php echo $controller ?>"/>
    <input type="hidden" name="akcija" value="pretraga"/>
    Pretraga: <input type="text" name="pretraga">
    <br>
    <input type="submit" value="Trazi">
    <br>
</form>
<table>
    <tr><th>Naslov</th><th>Autor</th>  
<?php
foreach ($vesti as $vest) {
    echo "<tr><td>".$vest->naslov."</td><td>".$vest->autor. "</td>";
    echo "<td><a href=\"?controller=$controller&akcija=prikazivest&id=".$vest->id."\">Prikazi</a><td></tr>";
}
?>

</table>