<form name="loginform" action="<?php echo $_SERVER['PHP_SELF']; ?>?controller=gost&akcija=ulogujse" method="post">
    <font color='red'><?php if(isset($poruka)) echo $poruka; ?></font> 
    <table>
    <tr>
        <td>Korisnicko ime:</td>
        <td><input type="text" name="korime" value="<?php if(isset($korime)) echo $korime ?>"/></td>
        <td> <font color='red'><?php if(isset($porukakorime)) echo $porukakorime; ?></font></td>
    </tr>
    <tr>
        <td>Lozinka:</td>
        <td><input type="password" name="lozinka"/></td>
        <td> <font color='red'><?php if(isset($porukalozinka)) echo $porukalozinka; ?></font></td>
    </tr>
    <tr>
        <td><input type="submit" value="Log in"/></td>
    </tr>
    </table>
</form>
