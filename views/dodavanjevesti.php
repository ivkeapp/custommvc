
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=korisnik&akcija=dodavanjeVesti" method="post">   
    Naslov: <input type="text" name="naslov" value="<?php if(isset($naslov)) echo $naslov; ?>">
    <font color='red'><?php if(isset($porukanaslov)) echo $porukanaslov; ?></font> <br>
    Sadrzaj: <input type="text" name="sadrzaj" value="<?php if(isset($sadrzaj)) echo $sadrzaj; ?>">
    <font color='red'><?php if(isset($porukasadrzaj)) echo $porukasadrzaj; ?></font> <br>
    <input type="submit" value="Dodaj">
</form>