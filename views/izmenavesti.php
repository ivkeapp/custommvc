<form action="<?php echo $_SERVER['PHP_SELF']."?controller=korisnik&akcija=menjajvest&id=".$vest->id; ?>" method="post">   
    Naslov: <input type="text" name="naslov" value="<?php echo  $vest->naslov ?>">
    <font color='red'><?php if(isset($porukanaslov)) echo $porukanaslov; ?></font> <br>
    Sadrzaj: <input type="text" name="sadrzaj" value="<?php echo  $vest->sadrzaj ?>">
    <font color='red'><?php if(isset($porukasadrzaj)) echo $porukasadrzaj; ?></font> <br>
    <input type="submit" value="Izmeni">
</form>