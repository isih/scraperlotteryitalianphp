<?php 
/*
* Template Name: new Theme

* Template Post Type: post
*/
?>

<?php //get_header(); ?>
<?php 
	if (!defined('ABSPATH')) exit;
	get_header(); 
?>

<?php
date_default_timezone_set('Europe/Rome');
$script_tz = date_default_timezone_get();
$currentDay = date('D');
//$d = date('D');


//Block for Tuesday
if(date('D') === 'Tue' && date('G') >= 21 && date('G') < 24 || date('D') === 'Wed' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish
    

    $content = "<h2><b>Estrazioni del Lotto e del Superenalotto di oggi " .date("n/d/Y"). " in diretta: chi vincerà</b></h2>";
    $content .= "<p>Aumenta l'attesa per l'estrazione di oggi, " .date('n/d/Y')."</p>";
    $content .= "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";

    
    //SuperEnalotto
    $content .= "<h2>Estrazione 10eLotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
    $content .= "<br>";

        //For 10 e Lotto
        $content .= "Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico.'";
        $leadContent = $content;

        $data = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            'tags_input' => array('Lotto7')
        );

        $post_id = wp_insert_post($data);
        set_post_thumbnail($post_id, 101);

    if(date('D') === 'Tue' && date('G') >= 21 && date('G') < 24 || date('D') === 'Wed' && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        $postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        $categoryID = '1'; // set to category id.
        $userID = 'test'; // set to user id
        $leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
        $postStatus = 'publish';  // set to future, draft, or publish
        
        
        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
        Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
        Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";
        //Table A of VinciCasa
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
        Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";

        //Table for MillionDay
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
        Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
        Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
        A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
        $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
        $content .= "Ricordiamo come le possibilità di vincita siano decisamente basse.
        Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
        Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
        Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.";

        $leadContent = $content;

        $data = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            'tags_input' => array('VinciCasa2')
        );

        $post_id = wp_insert_post($data);
        set_post_thumbnail($post_id, 101);
    }
}


//Block for Wednesday
if(date('D') === 'Wed' && date('G') >= 21 && date('G') < 24 || date('D') === 'Thu' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni VinciCasa, MillionDay e SiVinceTutto di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish

    $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni SiVinceTutto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table A of SiVinceTutto
    $content .= "Di seguito i numeri vincenti dell'estrazione odierna di SiVinceTutto.";

    $content .= "<br>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    //Table A of VinciCasa
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For MillionDay
    //For MillionDay Extra
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
    Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
    Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
    A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
    $content .= "<br>";
    $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
    $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.
    Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
    Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
    Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
    $leadContent = $content;


    $data = array(
        'post_title' => $leadTitle,
        'post_content' => $leadContent,
        'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        'post_author' => $userID,
        'post_type' => $postType,
        'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        'tags_input' => array('VinciCasa3')
    );

    $post_id = wp_insert_post($data);
    set_post_thumbnail($post_id, 101);
}



//Block for Thursday
if(date('D') === 'Thu' && date('G') >= 21 && date('G') < 24 || date('D') === 'Fri' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish
    

    $content = "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";

    //For Del Lotto
    $content .= "<h2>Estrazioni Superenalotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For Superenalotto
    $content .= "<h2>Estrazione 10eLotto di oggi DATE</h2>";
    $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
    $content .= "<br>";


    //For 10 e Lotto
    //10 e Lotto EXTRA
    $content .= "<p>Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico'</p>";

    $leadContent = $content;

    $data = array(
        'post_title' => $leadTitle,
        'post_content' => $leadContent,
        'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        'post_author' => $userID,
        'post_type' => $postType,
        'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        'tags_input' => array('Lotto1')
    );

    $post_id = wp_insert_post($data);
    set_post_thumbnail($post_id, 101);

    if(date('D') === 'Thu' && date('G') >= 21 && date('G') < 24 || date('D') === 'Fri' && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        $postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        $categoryID = '1'; // set to category id.
        $userID = 'test'; // set to user id
        $leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
        $postStatus = 'publish';  // set to future, draft, or publish


        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
        Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
        Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";

        //Table A of VinciCasa
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
        Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";


        //Table for MillionDay
        //Table for MillionDay EXTRA
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
        Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
        Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
        A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
        $content .= "<br>";
        $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
        $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.
        Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
        Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
        Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
        $leadContent = $content;

        
        $data = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            'tags_input' => array('MillionDay')
        );

        $post_id = wp_insert_post($data);
        set_post_thumbnail($post_id, 101);
    }
}

//For Friday
if(date('D') == "Fri" && date('G') >= 21 && date('G') < 24 || date('D') == "Sat" && date('G') >= 1 && date('G') < 21){
 
    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni VinciCasa, MillionDay e EuroJackpot di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish
    
    $content = "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For EuroJackpot
    $content .= "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table A of VinciCasa
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table for MillionDay
    //Table for MillionDay EXTRA
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
    Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
    Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
    A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
    $content .= "<br>";
    $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
    $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.
    Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
    Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
    Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
    $leadContent = $content;
    
    $data = array(
        'post_title' => $leadTitle,
        'post_content' => $leadContent,
        'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        'post_author' => $userID,
        'post_type' => $postType,
        'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        'tags_input' => array('VinciCasa4')
    );

    $post_id = wp_insert_post($data);
    set_post_thumbnail($post_id, 101);
}



//For Saturday
if(date('D') == "Sat" && date('G') >= 21 && date('G') < 24 || date('D') == "Sun" && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish


    $content = "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";
    $content .= "<br>";

    //For Del Lotto
	$content .= "<br>";
    $content .= "<h2>Estrazioni Superenalotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";
    
    
    //SuperEnalotto
        $content .= "<h2>Estrazione 10eLotto di oggi " .date("n/d/Y")."</h2>";
        $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
        $content .= "<br>";

        //For 10 e Lotto
        $content .= "<p>Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico'.</p>";
        $leadContent = $content;

        $data = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            'tags_input' => array('Lotto3')
        );

        $post_id = wp_insert_post($data);
        set_post_thumbnail($post_id, 101);
    
        if(date('D') == "Sat" && date('G') >= 21 && date('G') < 24 || date('D') == "Sun" && date('G') >= 1 && date('G') < 21){

            require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
            $postType = 'post'; // set to post or page
            //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
            $categoryID = '1'; // set to category id.
            $userID = 'test'; // set to user id
            $leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
            $postStatus = 'publish';  // set to future, draft, or publish

            $content .= "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
            Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
            Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
            $content .= "<br>";
            $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
            $content .= "<br>";

            //Table A of VinciCasa
            $content .= "<br>";
            $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
            Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
            $content .= "<br>";
            $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
            $content .= "<br>";

            //Table for MillionDay
            //Table for MillionDay EXTRA
            $content .= "<br>";
            $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
            Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
            Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
            A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
            $content .= "<br>";
            $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
            $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.
            Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
            Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
            Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
            $leadContent = $content;

            $data = array(
                'post_title' => $leadTitle,
                'post_content' => $leadContent,
                'post_status' => $postStatus,
                //'post_date' => $timeStamp,
                'post_author' => $userID,
                'post_type' => $postType,
                'post_category' => array($categoryID),
                //'page_template' => 'show.php',
                'tags_input' => array('VinciCasa5')
            );

            $post_id = wp_insert_post($data);
            set_post_thumbnail($post_id, 101);
        }   
}



//For Sunday
if(date('D') == "Sun" && date('G') >= 21 && date('G') < 24 || date('D') == "Mon" && date('G') >= 1 && date('G') < 21){
    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    $postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    $categoryID = '1'; // set to category id.
    $userID = 'test'; // set to user id
    $leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
    $postStatus = 'publish';  // set to future, draft, or publish
    

    $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";


	//Table A of VinciCasa    
	//Table B
	$content .= "<br>"; 
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>"; 

	//Table for MillionDay
	//Table for MillionDay EXTRA
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.
    Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.
    Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.
    A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
    $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
    $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.
    Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.
    Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).
    Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";

    $leadContent = $content;

    $data = array(
        'post_title' => $leadTitle,
        'post_content' => $leadContent,
        'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        'post_author' => $userID,
        'post_type' => $postType,
        'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        'tags_input' => array('VinciCasa')
    );

    $post_id = wp_insert_post($data);
    set_post_thumbnail($post_id, 101);
}

   

    //For Monday
    if(date('D') == "Mon" && date('G') >= 21 && date('G') < 24 || date('D') == "Tue" && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        $postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        $categoryID = '1'; // set to category id.
        $userID = 'test'; // set to user id
        $leadTitle = "Estrazioni VinciCasa e MillionDay " .date("n/d/Y");
        $postStatus = 'publish';  // set to future, draft, or publish


        //Text for VinciCasa
        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.</p>";
        $content .= "<p>Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.</p>";
        $content .= "<p>Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.</p>";
        $content .= "<br>";


        //Table A of VinciCasa
        $content .= "<p>Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>"; //add date here
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.</p>";
        $content .= "<br>";
    
	    //Table for MillionDay
        $content .= "<p>Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.</p>";
        $content .= "<p>Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.</p>";
        $content .= "<p>A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay EXTRA di oggi " .date("n/d/Y")."</h2>"; //add date here


	    //Table for MillionDay EXTRA
	    $content .= "<br>";

        $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
        $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.</p>";
        $content .= "<p>Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.</p>";
        $content .= "<p>Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).</p>";
        $content .= "<p>Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
        $leadContent = $content;

        $data = array(
            'post_title' => $leadTitle,
            'post_content' => $leadContent,
            'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            'tags_input' => array('VinciCasa1')
        );
    
        $post_id = wp_insert_post($data);
        set_post_thumbnail($post_id, 101);
    }



?>

<?php //get_footer(); ?>
<?php 
	if (!defined('ABSPATH')) exit;
	get_footer(); 
?>