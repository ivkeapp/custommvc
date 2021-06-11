<?php
// function call for init controller
// and actions
function call($controller, $akcija) {
    // TO-DO
    // add require for controllers

    switch ($controller) {
        case 'gost':
            $controller = new Gost();
            break;
        case 'korisnik':
            $controller = new Korisnik();
            break;
        case 'admin':
            $controller = new Admin();
            break;
    }

    $controller->$akcija();
}

// sample array with all controllers and actions
$controllers = array('gost' => ['index', 'pretraga','autori','login','ulogujse','prikazivest'],
                    'korisnik' => ['index', 'pretraga','dodajvest','dodavanjeVesti','logout','mojevesti','izmenivest','menjajvest','obrisivest','prikazivest'],
                    'admin' => ['index', 'logout', 'obrisivest']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($akcija, $controllers[$controller])) {
        call($controller, $akcija);
    } else {
        call('gost', 'greska');
    }
} else {
    call('gost', 'greska');
}
?>