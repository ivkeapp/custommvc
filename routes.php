<?php
// function call for init controller
// and actions
function call($controller, $akcija) {
    // TO-DO
    // add require for controllers

    switch ($controller) {
        case 'gost':
            // TO-DO add Gost.php class
            break;
        case 'korisnik':
            // TO-DO add Gost.php class
            break;
        case 'admin':
            // TO-DO add Gost.php class
            break;
    }

    $controller->$akcija();
}

// sample array with all controllers and actions
$controllers = array('gost' => ['index', 'pretraga','autori','login','ulogujse','prikazivest'],
                    'korisnik' => ['index', 'pretraga','dodajvest','dodavanjeVesti','logout','mojevesti','izmenivest','menjajvest','obrisivest','prikazivest'],
                    'admin' => ['index', 'logout', 'obrisivest']);


?>