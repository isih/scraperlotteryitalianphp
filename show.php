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
//function runShowFile() {
	//require_once('C:/xampp/htdocs/wordPressSite/wp-content/themes/mag-dark/show.php');
//}
//runShowFile();
//require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/functions.php");
//require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/parts/header.html");
//require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/footer.html");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.controcampus.it/estrazioni/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);

$dom = new DOMDocument();
@ $dom->loadHTML($html);


//For Names and Dates This Block targets h3

$h3s = $dom->getElementsByTagName("h3"); //Raw titles
$h3_array = array(); //name
$final_h3 = array(); //all the names
$h3_date = array(); //date
$final_h3_date = array(); //all dates

$outerMostArray = array();

foreach($h3s as $h3){
    $text_title = $h3->textContent;
    $complete = explode(' ', $text_title);
    $date = '';
    foreach($complete as $i => $part){
        if(is_numeric($part)){
            if($complete[$i+1]!="e"){ //10 e lotto
            $date = $complete[$i] . ' ' . $complete[$i+1] . ' ' .$complete[$i+2];
            unset($complete[$i], $complete[$i+1], $complete[$i+2]);
            break;
        }
    }

}
    $text_title = implode(' ', $complete);

    $word1 = "VinciCasa";
    $word2 = "MillionDAY";
    $word3 = "MillionDAY EXTRA";
    $word4 = "del Lotto";
    $word5 = "Superenalotto";
    $word6 = "10 e lotto";
    $word7 = "EuroJackpot";
    $word8 = "Simbolotto";
    $word9 = "SuperEnalotto";
    $word10 = "10 e Lotto";
    $word11 = "del lotto";
    $word12 = "SiVinceTutto";

    if(strpos($text_title, $word1) !== FALSE){
        $text_title = $word1;
    }
    elseif(strpos($text_title, $word2) !== FALSE){
        $text_title = $word2;
    }
    elseif(strpos($text_title, $word3) !== FALSE){
        $text_title = "MillionDAY EXTRA";
    }
    elseif(strpos($text_title, $word4) !== FALSE){
        $text_title = $word4;
    }
    elseif(strpos($text_title, $word5) !== FALSE){
        $text_title = $word5;
    }
    elseif(strpos($text_title, $word6) !== FALSE){
        $text_title = $word6;
    }
    elseif(strpos($text_title, $word7) !== FALSE){
        $text_title = $word7;
    }
    elseif(strpos($text_title, $word8) !== FALSE){
        $text_title = $word8;
    }
    elseif(strpos($text_title, $word9) !== FALSE){
        $text_title = $word9;
    }
    elseif(strpos($text_title, $word10) !== FALSE){
        $text_title = $word10;
    }
    elseif(strpos($text_title, $word11) !== FALSE){
        $text_title = $word11;
    }
    elseif(strpos($text_title, $word12) !== FALSE){
        $text_title = $word12;
    }
    else{
        $content .= "Term Not Recognized!";
    }
    
    //Assigning the name in the array
    $h3_array = [
        'Name' => $text_title,
    ];
    //Assigning the date in the array
    $h3_date = [
        'Date' => $date
    ];

    //Getting all the names in one array
    foreach($h3_array as $v){
        $final_h3[] = $v;
        //$content .= $v;
    }

    //Getting all the dates in one array
    foreach($h3_date as $u){
        $final_h3_date[] = $u;
    }
}
//Printing the names and dates arrays separately
//print_r($final_h3);
//print_r($final_h3_date);


//For Table Data

$table = array();
$table = $dom->getElementsByTagName('table');
$rows = $dom->getElementsByTagName("tr");

$rowData = array();

foreach($table as $row) {
    $keeper = array();

    foreach($row->getElementsByTagName('td') as $cell) {
        if  (strpos($cell->nodeValue, "Aggiorna") !== true) {
            $keeper[] = $cell->nodeValue;
        }
    }
    $rowData[] = $keeper;
}
//print_r($rowData);
//print_r($final_h3);

//$outerMostArray = [
    //"names" => $final_h3,
    //'dates' => $final_h3_date,
    //"Taable Data" => $table
//];

//print_r($outerMostArray);

date_default_timezone_set('Europe/Rome');
$script_tz = date_default_timezone_get();
$currentDay = date('D');
//$d = date('D');


//Block for Tuesday
if(date('D') === 'Tue' && date('G') >= 21 && date('G') < 24 || date('D') === 'Wed' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish
    

    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();
    //$tab5 = array();
    //$tab6 = array();
    //$tab7 = array();
    //$tab8 = array();

    $tab0 = $rowData[0];
    //print_r($tab0);

    $tab1 = $rowData[1];
    //print_r($tab1);

    $tab2 = $rowData[2];
    //print_r($tab2);

    $tab3 = $rowData[3];
    //print_r($tab3);

    $tab4 = $rowData[4];
    //print_r($tab4);

    //$tab5 = $rowData[5];
    //print_r($tab5);

    //$tab6 = $rowData[6];
    //print_r($tab6);

    //$tab7 = $rowData[7];
    //print_r($tab7);

    //$tab8 = $rowData[8];
    //print_r($tab8);
    unset($tab0[0]);
    unset($tab0[1]);
    $tab0 = array_values($tab0);
    //print_r($tab0);
    $chuk_array = array_chunk($tab0, (ceil(count($tab0)/11)));
    //print_r($chuk_array);

    $content = "<h2><b>Estrazioni del Lotto e del Superenalotto di oggi " .date("n/d/Y"). " in diretta: chi vincerà</b></h2>";
    $content .= "<p>Aumenta l'attesa per l'estrazione di oggi, " .date('n/d/Y')."</p>";
    $content .= "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";

    //For Del Lotto
    $content .= "<table>";
    $content .= "<caption>Lotto</caption>";
    $content .= "<tr>";
    foreach($chuk_array[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[5] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[6] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[7] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[8] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[9] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[10] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
	$content .= "<br>";
    
    $content .= "<h2>Estrazioni Superenalotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";
    
    //SuperEnalotto
    unset($tab1[0]);
    unset($tab1[1]);
    //$chuk_array1 = array_chunk($tab1, (ceil(count($tab1)/1)));
    //print_r($chuk_array1);
    $new_array = array_slice($tab1, 0, 7);
    //print_r($new_array);
    $new_array1 = array_slice($tab1, 7, 2);
    //print_r($new_array1);
    $new_array2 = array_slice($tab1, 9, 2);
    //print_r($new_array2);
    $content .= "<table>";
	$content .= "<caption>Superenalotto</caption>";
    $content .= "<tr>";
    foreach($new_array as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array1 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array2 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
	$content .= "</table>";
	$content .= "<br>";

    $content .= "<h2>Estrazione 10eLotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
    $content .= "<br>";

        //For 10 e Lotto
        unset($tab2[0]);
        unset($tab2[1]);
        //$chuk_array1 = array_chunk($tab1, (ceil(count($tab1)/1)));
        //print_r($chuk_array1);
        $new_array = array_slice($tab2, 0, 6);
        //print_r($new_array);
        $new_array1 = array_slice($tab2, 6, 6);
        //print_r($new_array1);
        $new_array2 = array_slice($tab2, 12, 6);
        //print_r($new_array2);
        $new_array3 = array_slice($tab2, 18, 6);
        //print_r($new_array3);
        $new_array4 = array_slice($tab2, 24, 2);
        //print_r($new_array4);
        $new_array5 = array_slice($tab2, 26, 3);
        //print_r($new_array5);
        $content .= "<table>";
        $content .= "<caption>10 e Lotto</caption>";
        $content .= "<tr>";
        foreach($new_array as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
    
        $content .= "<tr>";
        foreach($new_array1 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
    
        $content .= "<tr>";
        foreach($new_array2 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array3 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array4 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array5 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";

        //10 e Lotto EXTRA
        unset($tab3[0]);
        $content .= "<table>";
        $content .= "<caption>10 e Lotto EXTRA</caption>";
        $content .= "<tr>";
        foreach($tab3 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";

        $content .= "Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico.'";
        $leadContent = $content;

        $query = new WP_Query( array( 
            'numberposts' => 1,
            'offset' => 0,
            //'category' => $cat->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'tag' => 'Lotto7' ) );
            //$query->the_post();
        if($query->have_posts()){
            while ( $query->have_posts() ) {
                $query->the_post(); 
                //$recent['title'] = get_the_title();
                $recentid = get_the_ID();
                //wp_reset_postdata();
            }
        }

        $data = array(
            'ID' => $recentid,
            //'post_title' => $leadTitle,
            'post_content' => $leadContent,
            //'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            //'post_author' => $userID,
            //'post_type' => $postType,
            //'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            //'tags_input' => array('Lotto, Superenalotto, 10elotto')
        );
        wp_update_post($data);
        //$post_id = wp_insert_post($new_post);
        //set_post_thumbnail($post_id, 101);

    if(date('D') === 'Tue' && date('G') >= 21 && date('G') < 24 || date('D') === 'Wed' && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        //$postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        //$categoryID = '1'; // set to category id.
        //$userID = 'test'; // set to user id
        //$leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
        //$postStatus = 'publish';  // set to future, draft, or publish
        
    
        //Assigning Separate arrays for each table.
        $tab5 = array();
        $tab6 = array();
        $tab7 = array();
        $tab8 = array();

    
        $tab5 = $rowData[5];
        //print_r($tab5);
    
        $tab6 = $rowData[6];
        //print_r($tab6);
    
        $tab7 = $rowData[7];
        //print_r($tab7);
    
        $tab8 = $rowData[8];
        
        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
        Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
        Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";
        //Table A of VinciCasa
        $chuk_array5 = array_chunk($tab6, (ceil(count($tab6)/5)));
        //print_r($chuk_array5);
        unset($tab5[0]);
        $content .= "<table>";
	    $content .= "<caption>VinciCasa</caption>";
        $content .= "<tr>";
        foreach ($tab5 as $row) {
            $content .= "<td>$row </td>";
        }
        $content .= "</tr>";
	    $content .= "</table>";
	    $content .= "<br>";    

	    //Table B
        $content .= "<table>";
        $content .= "<tr>";
        foreach($chuk_array5[0] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        
        $content .= "<tr>";
        foreach($chuk_array5[1] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[2] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[3] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[4] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
	    $content .= "<br>";
        
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
        Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";

        //Table for MillionDay
	    $content .= "<table>";
	    $content .= "<caption>MillionDay</caption>";
        $content .= "<tr>";
	    foreach ($tab7 as $row) {
            foreach (array($row) as $column) {
                $content .= "<td>$column </td>";
            }
        }   
        $content .= "</tr>"; 
        $content .= "</table>";
	    $content .= "<br>"; 

        
	    //Table for MillionDay EXTRA
	    $content .= "<table>";
	    $content .= "<caption>MillionDay EXTRA</caption>";
        $content .= "<tr>";
	    foreach ($tab8 as $row) {
		    foreach (array($row) as $column) {
			    $content .= "<td>$column </td>";
		    }
	    }   
        $content .= "</tr>"; 
	    $content .= "</table>";
	    $content .= "<br>";

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

        $query = new WP_Query( array( 
            'numberposts' => 1,
            'offset' => 0,
            //'category' => $cat->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'tag' => 'VinciCasa2' ) );
            //$query->the_post();
        if($query->have_posts()){
            while ( $query->have_posts() ) {
                $query->the_post(); 
                //$recent['title'] = get_the_title();
                $recentid = get_the_ID();
                //wp_reset_postdata();
            }
        }

        $data = array(
            'ID' => $recentid,
            //'post_title' => $leadTitle,
            'post_content' => $leadContent,
            //'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            //'post_author' => $userID,
            //'post_type' => $postType,
            //'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            //'tags_input' => array('VinciCasa, MillionDAY')
        );
        wp_update_post($data);
        //$post_id = wp_insert_post($new_post);
        //set_post_thumbnail($post_id, 101);
    }


    /*$outerArray0 = array();
    $outerArray0['Name'] = $final_h3[0];
    $outerArray0['Date'] = $final_h3_date[0];
    $outerArray0['Table Data'] = $tab0;
    print_r($outerArray0);

    $outerArray1 = array();
    if (($final_h3[0]!="del Lotto")){
        $outerArray1['Name'] = $final_h3[1];
        $outerArray1['Date'] = $final_h3_date[1];
        $outerArray1['Table Data'] = $tab1;
        print_r($outerArray1);
    }

    $outerArray2 = array();
    if (($final_h3[1]!="del Lotto")){
        $outerArray2['Name'] = $final_h3[2];
        $outerArray2['Date'] = $final_h3_date[2];
        $outerArray2['Table Data'] = $tab2;
        print_r($outerArray2);
    }

    $outerArray3 = array();
    if (($final_h3[2]!="del Lotto")){
        $outerArray3['Name'] = $final_h3[3];
        $outerArray3['Date'] = $final_h3_date[3];
        $outerArray3['Table Data'] = $tab3;
        print_r($outerArray3);
    }
    $outerArray4 = array();
    if (($final_h3[1]!="del Lotto")){
        $outerArray4['Name'] = $final_h3[4];
        $outerArray4['Date'] = $final_h3_date[4];
        $outerArray4['Table Data'] = $tab4;
        print_r($outerArray4);
    }

    //$outerArray5 = array();
    //$outerArray5['Name'] = $final_h3[5];
    //$outerArray5['Date'] = $final_h3_date[];
    //$outerArray5['Table Data'] = $tab;
    //print_r($outerArray5);

    $outerArray6 = array();
    $outerArray6['Name'] = $final_h3[6];
    $outerArray6['Date'] = $final_h3_date[6];
    $outerArray6['Table Data'] = $tab1;
    print_r($outerArray6);

    $outerArray7 = array();
    $outerArray7['Name'] = $final_h3[7];
    $outerArray7['Date'] = $final_h3_date[7];
    $outerArray7['Table Data'] = $tab2;
    print_r($outerArray7);

    $outerArray8 = array();
    $outerArray8['Name'] = $final_h3[8];
    $outerArray8['Date'] = $final_h3_date[8];
    $outerArray8['Table Data'] = $tab3;
    print_r($outerArray8);

    $outerArray9 = array();
    if($final_h3[9] == "VinciCasa"){
        $outerArray9['Name'] = $final_h3[9];
        $outerArray9['Date'] = $final_h3_date[9];
        $outerArray9['Table Data A'] = $tab5;
        $outerArray9['Table Data B'] = $tab6;
        print_r($outerArray9);

        $outerArray10 = array();
        $outerArray10['Name'] = $final_h3[10];
        $outerArray10['Date'] = $final_h3_date[10];
        $outerArray10['Table Data'] = $tab7;
        print_r($outerArray10);

        $outerArray11 = array();
        $outerArray11['Name'] = $final_h3[11];
        $outerArray11['Date'] = $final_h3_date[11];
        $outerArray11['Table Data'] = $tab8;
        print_r($outerArray11);
    } */
}


//Block for Wednesday
if(date('D') === 'Wed' && date('G') >= 21 && date('G') < 24 || date('D') === 'Thu' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni VinciCasa, MillionDay e SiVinceTutto di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish
    

    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();
    $tab5 = array();

    $tab0 = $rowData[0];
    //print_r($tab0);

    $tab1 = $rowData[1];
    //print_r($tab1);

    $tab2 = $rowData[2];
    //print_r($tab2);

    $tab3 = $rowData[3];
    //print_r($tab3);

    $tab4 = $rowData[4];
    //print_r($tab4);

    $tab5 = $rowData[5];
    //print_r($tab5);

    $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni SiVinceTutto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table A of SiVinceTutto
    unset($tab0[0]);
    $chuk_array = array_chunk($tab1, (ceil(count($tab1)/7)));
    $content .= "<table>";
	$content .= "<caption>SiVinceTutto</caption>";
    $content .= "<tr>";
    foreach ($tab0 as $row) {
        foreach (array($row) as $column) {
            $content .= "<td>$column </td>";
        }
    }
    $content .= "</tr>";
	$content .= "</table>";
	$content .= "<br>";    

	//Table B
    $content .= "<table>";
    $content .= "<tr>";
    foreach($chuk_array[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[5] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[6] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
	$content .= "<br>";

    $content .= "Di seguito i numeri vincenti dell'estrazione odierna di SiVinceTutto.";

    $content .= "<br>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    //Table A of VinciCasa
    unset($tab0[0]);
    $chuk_array1 = array_chunk($tab3, (ceil(count($tab3)/5)));
    $content .= "<table>";
	$content .= "<caption>VinciCasa</caption>";
    $content .= "<tr>";
    foreach ($tab2 as $row) {
        foreach (array($row) as $column) {
            if(strlen($column) !== 25){
                $content .= "<td>$column </td>";
            }
        }
    }
    $content .= "</tr>";
	$content .= "</table>";
	$content .= "<br>";    

	//Table B
    $content .= "<table>";
    $content .= "<tr>";
    foreach($chuk_array1[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array1[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array1[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array1[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array1[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";

    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For MillionDay
    unset($tab4[0]);
    $content .= "<table>";
    $content .= "<caption>MillionDay</caption>";
    $content .= "<tr>";
    foreach($tab4 as $rows){
        $content .= "<td>$rows</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";

    //For MillionDay Extra
    unset($tab5[0]);
    $content .= "<table>";
    $content .= "<caption>MillionDay EXTRA</caption>";
    $content .= "<tr>";
    foreach($tab5 as $rows){
        $content .= "<td>$rows</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
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

    $query = new WP_Query( array( 
        'numberposts' => 1,
        'offset' => 0,
        //'category' => $cat->cat_ID,
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag' => 'VinciCasa3' ) );
        //$query->the_post();
    if($query->have_posts()){
        while ( $query->have_posts() ) {
            $query->the_post(); 
            //$recent['title'] = get_the_title();
            $recentid = get_the_ID();
            //wp_reset_postdata();
        }
    }


    $data = array(
        'ID' => $recentid,
        //'post_title' => $leadTitle,
        'post_content' => $leadContent,
        //'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        //'post_author' => $userID,
        //'post_type' => $postType,
        //'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        //'tags_input' => array('SiVinceTutto, VinciCasa, MillionDay')
    );
    wp_update_post($data);
    //$post_id = wp_insert_post($new_post);
    //set_post_thumbnail($post_id, 101);


    /*$outerArray0 = array();
    $outerArray0["Name"] = $final_h3[0];
    $outerArray0["Date"] = $final_h3_date[0];
    $outerArray0["Table Data A"] = $tab0;
    $outerArray0["Table Data B"] = $tab1;
    print_r($outerArray0);

    $outerArray1 = array();
    $outerArray1["Name"] = $final_h3[1];
    $outerArray1["Date"] = $final_h3_date[1];
    $outerArray1["Table Data A"] = $tab2;
    $outerArray1["Table Data B"] = $tab3;
    print_r($outerArray1);

    $outerArray2 = array();
    $outerArray2["Name"] = $final_h3[2];
    $outerArray2["Date"] = $final_h3_date[2];
    $outerArray2["Table Data"] = $tab4;
    print_r($outerArray2);

    $outerArray3 = array();
    $outerArray3["Name"] = $final_h3[3];
    $outerArray3["Date"] = $final_h3_date[3];
    $outerArray3["Table Data"] = $tab5;
    print_r($outerArray3);*/
}



//Block for Thursday
if(date('D') === 'Thu' && date('G') >= 21 && date('G') < 24 || date('D') === 'Fri' && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish
    

    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();

    $tab0 = $rowData[0];
    //print_r($tab0);

    $tab1 = $rowData[1];
    //print_r($tab1);

    $tab2 = $rowData[2];
    //print_r($tab2);

    $tab3 = $rowData[3];
    //print_r($tab3);

    $tab4 = $rowData[4];
    //print_r($tab4);

    
    $content = "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";

    //For Del Lotto
    unset($tab0[0]);
    unset($tab0[1]);
    $chuk_array = array_chunk($tab0, (ceil(count($tab0)/11)));
    //print_r($chuk_array);
    $content .= "<table>";
    $content .= "<caption>Del Lotto</caption>";
    foreach($chuk_array as $bits){
        $content .= "<tr>";
        foreach($bits as $rows){
            $content .= "<td>$rows</td>";
        }
        $content .= "</tr>";
    }
    $content .= "</table>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni Superenalotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For Superenalotto
    unset($tab1[0]);
    //unset($tab1[1]);
    //print_r($chuk_array);
    $content .= "<table>";
    $content .= "<caption>Superenalotto</caption>";
    $content .= "<tr>";
    foreach($tab1 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";
    $content .= "<h2>Estrazione 10eLotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
    $content .= "<br>";


    //For 10 e Lotto
    unset($tab2[0]);
    unset($tab2[1]);
    //$chuk_array1 = array_chunk($tab1, (ceil(count($tab1)/1)));
    //print_r($chuk_array1);
    $new_array = array_slice($tab2, 0, 6);
    //print_r($new_array);
    $new_array1 = array_slice($tab2, 6, 6);
    //print_r($new_array1);
    $new_array2 = array_slice($tab2, 12, 6);
    //print_r($new_array2);
    $new_array3 = array_slice($tab2, 18, 6);
    //print_r($new_array3);
    $new_array4 = array_slice($tab2, 24, 2);
    //print_r($new_array4);
    $new_array5 = array_slice($tab2, 26, 3);
    //print_r($new_array5);
    $content .= "<table>";
    $content .= "<caption>10 e Lotto</caption>";
    $content .= "<tr>";
    foreach($new_array as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array1 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array2 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array3 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array4 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array5 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";


    //10 e Lotto EXTRA
    unset($tab3[0]);
    $content .= "<table>";
    $content .= "<caption>10 e Lotto EXTRA</caption>";
    $content .= "<tr>";
    foreach($tab3 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";
    $content .= "<p>Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico'</p>";

    $leadContent = $content;

    
    //$query = new WP_Query( array( 'tag' => 'Lotto' ) );
    $query = new WP_Query( array( 
        'numberposts' => 1,
        'offset' => 0,
        //'category' => $cat->cat_ID,
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag' => 'Lotto1' ) );
        //$query->the_post();
    if($query->have_posts()){
        while ( $query->have_posts() ) {
            $query->the_post(); 
            //$recent['title'] = get_the_title();
            $recentid = get_the_ID();
            //wp_reset_postdata();
        }
    }

    $data = array(
        'ID' => $recentid,
        //'post_title' => $leadTitle,
        'post_content' => $leadContent,
        //'post_status' => $postStatus,
        //'post_date' => $timeStamp,
       // 'post_author' => $userID,
        //'post_type' => $postType,
        //'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        //'tags_input' => array('Lotto, Superenalotto, 10elotto')
    );
    wp_update_post($data);

    //$post_id = wp_insert_post($new_post);
    //set_post_thumbnail($post_id, 101);

    if(date('D') === 'Thu' && date('G') >= 21 && date('G') < 24 || date('D') === 'Fri' && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        //$postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        //$categoryID = '1'; // set to category id.
        //$userID = 'test'; // set to user id
        //$leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
        //$postStatus = 'publish';  // set to future, draft, or publish


        $tab5 = array();
        $tab6 = array();
        $tab7 = array();
        $tab8 = array();

        $tab5 = $rowData[5];
        //print_r($tab5);

        $tab6 = $rowData[6];
        //print_r($tab6);

        $tab7 = $rowData[7];
        //print_r($tab7);

        $tab8 = $rowData[8];
        //print_r($tab8);

        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
        Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
        Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";

        //Table A of VinciCasa
        $chuk_array5 = array_chunk($tab6, (ceil(count($tab6)/5)));
        //print_r($chuk_array5);
        unset($tab5[0]);
        $content .= "<table>";
        $content .= "<caption>VinciCasa</caption>";
        $content .= "<tr>";
        foreach ($tab5 as $row) {
            $content .= "<td>$row </td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";    

        //Table B
        $content .= "<table>";
        $content .= "<tr>";
        foreach($chuk_array5[0] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
            
        $content .= "<tr>";
        foreach($chuk_array5[1] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[2] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[3] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array5[4] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
        Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";


        //Table for MillionDay
        $content .= "<table>";
        $content .= "<caption>MillionDay</caption>";
        $content .= "<tr>";
        foreach ($tab7 as $row) {
            foreach (array($row) as $column) {
                $content .= "<td>$column </td>";
            }
        }   
        $content .= "</tr>"; 
        $content .= "</table>";
        $content .= "<br>"; 


        //Table for MillionDay EXTRA
        $content .= "<table>";
        $content .= "<caption>MillionDay EXTRA</caption>";
        $content .= "<tr>";
        foreach ($tab8 as $row) {
            foreach (array($row) as $column) {
                $content .= "<td>$column </td>";
            }
        }   
        $content .= "</tr>"; 
        $content .= "</table>";
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
        //$query = new WP_Query( array( 'tag' => 'VinciCasa' ) );
        
        $query = new WP_Query( array( 
            'numberposts' => 1,
            'offset' => 0,
            //'category' => $cat->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'tag' => 'MillionDay' ) );
            //$query->the_post();
        if($query->have_posts()){
            while ( $query->have_posts() ) {
                $query->the_post(); 
                //$recent['title'] = get_the_title();
                $recentid = get_the_ID();
                //wp_reset_postdata();
            }
        }
    
        $data = array(
            'ID' => $recentid,
            //'post_title' => $leadTitle,
            'post_content' => $leadContent,
            //'post_status' => $postStatus,
            //'post_date' => $timeStamp,
           // 'post_author' => $userID,
            //'post_type' => $postType,
            //'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            //'tags_input' => array('Lotto, Superenalotto, 10elotto')
        );
        wp_update_post($data);
        //$post_id = wp_insert_post($new_post);
        //set_post_thumbnail($post_id, 101);
    }

    /*$outerArray0 = array();
    $outerArray0['Name'] = $final_h3[0];
    $outerArray0['Date'] = $final_h3_date[0];
    $outerArray0['Table Data'] = $tab0;
    print_r($outerArray0);

    $outerArray1 = array();
    if (($final_h3[0]!="del Lotto")){
        $outerArray1['Name'] = $final_h3[1];
        $outerArray1['Date'] = $final_h3_date[1];
        $outerArray1['Table Data'] = $tab1;
        print_r($outerArray1);
    }

    $outerArray2 = array();
    if (($final_h3[1]!="del Lotto")){
        $outerArray2['Name'] = $final_h3[2];
        $outerArray2['Date'] = $final_h3_date[2];
        $outerArray2['Table Data'] = $tab2;
        print_r($outerArray2);
    }

    $outerArray3 = array();
    if (($final_h3[2]!="del Lotto")){
        $outerArray3['Name'] = $final_h3[3];
        $outerArray3['Date'] = $final_h3_date[3];
        $outerArray3['Table Data'] = $tab3;
        print_r($outerArray3);
    }
    $outerArray4 = array();
    if (($final_h3[1]!="del Lotto")){
        $outerArray4['Name'] = $final_h3[4];
        $outerArray4['Date'] = $final_h3_date[4];
        $outerArray4['Table Data'] = $tab4;
        print_r($outerArray4);
    }

    //$outerArray5 = array();
    //$outerArray5['Name'] = $final_h3[5];
    //$outerArray5['Date'] = $final_h3_date[];
    //$outerArray5['Table Data'] = $tab;
    //print_r($outerArray5);

    $outerArray6 = array();
    $outerArray6['Name'] = $final_h3[6];
    $outerArray6['Date'] = $final_h3_date[6];
    $outerArray6['Table Data'] = $tab1;
    print_r($outerArray6);

    $outerArray7 = array();
    $outerArray7['Name'] = $final_h3[7];
    $outerArray7['Date'] = $final_h3_date[7];
    $outerArray7['Table Data'] = $tab2;
    print_r($outerArray7);

    $outerArray8 = array();
    $outerArray8['Name'] = $final_h3[8];
    $outerArray8['Date'] = $final_h3_date[8];
    $outerArray8['Table Data'] = $tab3;
    print_r($outerArray8);

    $outerArray9 = array();
    if($final_h3[9] == "VinciCasa"){
        $outerArray9['Name'] = $final_h3[9];
        $outerArray9['Date'] = $final_h3_date[9];
        $outerArray9['Table Data A'] = $tab5;
        $outerArray9['Table Data B'] = $tab6;
        print_r($outerArray9);

        $outerArray10 = array();
        $outerArray10['Name'] = $final_h3[10];
        $outerArray10['Date'] = $final_h3_date[10];
        $outerArray10['Table Data'] = $tab7;
        print_r($outerArray10);

        $outerArray11 = array();
        $outerArray11['Name'] = $final_h3[11];
        $outerArray11['Date'] = $final_h3_date[11];
        $outerArray11['Table Data'] = $tab8;
        print_r($outerArray11);
    }*/
}

//For Friday
if(date('D') == "Fri" && date('G') >= 21 && date('G') < 24 || date('D') == "Sat" && date('G') >= 1 && date('G') < 21){
 
    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni VinciCasa, MillionDay e EuroJackpot di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish


    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();

    $tab0 = $rowData[0];
    //print_r($tab0);

    $tab1 = $rowData[1];
    //print_r($tab1);

    $tab2 = $rowData[2];
    //print_r($tab2);

    $tab3 = $rowData[3];
    //print_r($tab3);

    $tab4 = $rowData[4];
    //print_r($tab4);
    
    $content = "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //For EuroJackpot
    $content .= "<table>";
    $content .= "<caption>EuroJackpot</caption>";
    $content .= "<tr>";
    foreach($tab0 as $rows){
        $content .= "<td>$rows</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";

    $content .= "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table A of VinciCasa
    $chuk_array = array_chunk($tab2, (ceil(count($tab2)/5)));
    //print_r($chuk_array5);
    unset($tab1[0]);
    $content .= "<table>";
    $content .= "<caption>VinciCasa</caption>";
    $content .= "<tr>";
    foreach ($tab1 as $row) {
        $content .= "<td>$row </td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";    

    //Table B
    $content .= "<table>";
    $content .= "<tr>";
    foreach($chuk_array[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
    $content .= "<br>";

    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";

    //Table for MillionDay
    $content .= "<table>";
    $content .= "<caption>MillionDay</caption>";
    $content .= "<tr>";
    foreach ($tab3 as $row) {
        foreach (array($row) as $column) {
            $content .= "<td>$column </td>";
        }
    }   
    $content .= "</tr>"; 
    $content .= "</table>";
    $content .= "<br>"; 


    //Table for MillionDay EXTRA
    $content .= "<table>";
    $content .= "<caption>MillionDay EXTRA</caption>";
    $content .= "<tr>";
    foreach ($tab4 as $row) {
        foreach (array($row) as $column) {
            $content .= "<td>$column </td>";
        }
    }   
    $content .= "</tr>"; 
    $content .= "</table>";
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

    $query = new WP_Query( array( 
        'numberposts' => 1,
        'offset' => 0,
        //'category' => $cat->cat_ID,
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag' => 'VinciCasa4' ) );
        //$query->the_post();
    if($query->have_posts()){
        while ( $query->have_posts() ) {
            $query->the_post(); 
            //$recent['title'] = get_the_title();
            $recentid = get_the_ID();
            //wp_reset_postdata();
        }
    }
    
    $data = array(
        'ID' => $recentid,
        //'post_title' => $leadTitle,
        'post_content' => $leadContent,
        //'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        //'post_author' => $userID,
        //'post_type' => $postType,
        //'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        //'tags_input' => array('EuroJackpot, VinciCasa, MillionDay')
    );
    wp_update_post($data);
    //$post_id = wp_insert_post($new_post);
    //set_post_thumbnail($post_id, 101);



}



//For Saturday
if(date('D') == "Sat" && date('G') >= 21 && date('G') < 24 || date('D') == "Sun" && date('G') >= 1 && date('G') < 21){

    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni Lotto, SuperEnalotto e 10eLotto di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish


    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();
    $tab4 = array();

    $tab0 = $rowData[0];
    //print_r($tab0);

    $tab1 = $rowData[1];
    //print_r($tab1);

    $tab2 = $rowData[2];
    //print_r($tab2);

    $tab3 = $rowData[3];
    //print_r($tab3);

    $tab4 = $rowData[4];
    //print_r($tab4);


    //print_r($tab8);
    unset($tab0[0]);
    unset($tab0[1]);
    $tab0 = array_values($tab0);
    //print_r($tab0);
    $chuk_array = array_chunk($tab0, (ceil(count($tab0)/11)));
    //print_r($chuk_array);

    $content = "<p>In occasione di questa estrazione qualche fortunato riuscirà a portarsi a casa il ricco premio?
    Ricordiamo come la più alta vincita di tutti i tempi sia stata di 209.106.441,54 € e sia stata ralizzata a Lodi il 13 agosto 2019: riuscirà questa volta il montepremi a scalare la classifica dei premi più ricchi della storia (ricordiamo come il SuperEnalotto detenga il primato della più alta vincita mai aggiudicata a una sola persona in Europa).
    In attesa di scoprirlo a partire dalle 20, pubblicheremo di seguito i numeri vincenti dell’estrazione odierna - che avviene come sempre presso la sede di Piazza Mastai a Roma.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazione Lotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<p>Di seguito i proponiamo inoltre, sempre aggiornati in diretta, i numeri del lotto.</p>";
    $content .= "<br>";

    //For Del Lotto
    $content .= "<table>";
    $content .= "<caption>Del Lotto</caption>";
    $content .= "<tr>";
    foreach($chuk_array[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[5] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[6] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[7] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[8] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[9] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[10] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
	$content .= "<br>";
    $content .= "<h2>Estrazioni Superenalotto di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";
    
    
    //SuperEnalotto
    unset($tab1[0]);
    unset($tab1[1]);
    //$chuk_array1 = array_chunk($tab1, (ceil(count($tab1)/1)));
    //print_r($chuk_array1);
    $new_array = array_slice($tab1, 0, 7);
    //print_r($new_array);
    $new_array1 = array_slice($tab1, 7, 2);
    //print_r($new_array1);
    $new_array2 = array_slice($tab1, 9, 2);
    //print_r($new_array2);
    $content .= "<table>";
	$content .= "<caption>Superenalotto</caption>";
    $content .= "<tr>";
    foreach($new_array as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array1 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($new_array2 as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
	$content .= "</table>";
	$content .= "<br>";

        $content .= "<h2>Estrazione 10eLotto di oggi " .date("n/d/Y")."</h2>";
        $content .= "<p>Infine, vi proponiamo anche i numeri del 10eLotto, nella versone collegata all'estrazone del Lotto.</p>";
        $content .= "<br>";

        //For 10 e Lotto
        unset($tab2[0]);
        unset($tab2[1]);
        //$chuk_array1 = array_chunk($tab1, (ceil(count($tab1)/1)));
        //print_r($chuk_array1);
        $new_array = array_slice($tab2, 0, 6);
        //print_r($new_array);
        $new_array1 = array_slice($tab2, 6, 6);
        //print_r($new_array1);
        $new_array2 = array_slice($tab2, 12, 6);
        //print_r($new_array2);
        $new_array3 = array_slice($tab2, 18, 6);
        //print_r($new_array3);
        $new_array4 = array_slice($tab2, 24, 2);
        //print_r($new_array4);
        $new_array5 = array_slice($tab2, 26, 3);
        //print_r($new_array5);
        $content .= "<table>";
        $content .= "<caption>10 e Lotto</caption>";
        $content .= "<tr>";
        foreach($new_array as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
    
        $content .= "<tr>";
        foreach($new_array1 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
    
        $content .= "<tr>";
        foreach($new_array2 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array3 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array4 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($new_array5 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";

        //10 e Lotto EXTRA
        unset($tab3[0]);
        $content .= "<table>";
        $content .= "<caption>10 e Lotto EXTRA</caption>";
        $content .= "<tr>";
        foreach($tab3 as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
        $content .= "<br>";
        $content .= "<p>Per chi non conoscesse il funzionamento, ci rifacciamo al regolamento riportato da Wikipedia: 'la combinazione vincente viene determinata dai primi due numeri delle ruote del Lotto, esclusa la ruota Nazionale; in caso di numeri ripetuti si partirà dalla terza colonna iniziando dalla ruota di Bari e proseguendo in ordine alfabetico'.</p>";
        $leadContent = $content;

        $query = new WP_Query( array( 
            'numberposts' => 1,
            'offset' => 0,
            //'category' => $cat->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'tag' => 'Lotto3' ) );
            //$query->the_post();
        if($query->have_posts()){
            while ( $query->have_posts() ) {
                $query->the_post(); 
                //$recent['title'] = get_the_title();
                $recentid = get_the_ID();
                //wp_reset_postdata();
            }
        }

        $data = array(
            'ID' => $recentid,
            //'post_title' => $leadTitle,
            'post_content' => $leadContent,
            //'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            //'post_author' => $userID,
            //'post_type' => $postType,
            //'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            //'tags_input' => array('Lotto, SuperEnalotto, 10eLotto')
        );
        wp_update_post($data);
        //$post_id = wp_insert_post($new_post);
        //set_post_thumbnail($post_id, 101);
    
        if(date('D') == "Sat" && date('G') >= 21 && date('G') < 24 || date('D') == "Sun" && date('G') >= 1 && date('G') < 21){

            require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
            //$postType = 'post'; // set to post or page
            //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
            //$categoryID = '1'; // set to category id.
            //$userID = 'test'; // set to user id
            //$leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
            //$postStatus = 'publish';  // set to future, draft, or publish

            $tab5 = array();
            $tab6 = array();
            $tab7 = array();
            $tab8 = array();

            $tab5 = $rowData[5];
            //print_r($tab5);

            $tab6 = $rowData[6];
            //print_r($tab6);

            $tab7 = $rowData[7];
            //print_r($tab7);
            
            $tab8 = $rowData[8];

            $content .= "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
            Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
            Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
            $content .= "<br>";
            $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
            $content .= "<br>";

            //Table A of VinciCasa
            $chuk_array5 = array_chunk($tab6, (ceil(count($tab6)/5)));
            //print_r($chuk_array5);
            unset($tab5[0]);
            $content .= "<table>";
            $content .= "<caption>VinciCasa</caption>";
            $content .= "<tr>";
            foreach ($tab5 as $row) {
                $content .= "<td>$row </td>";
            }
            $content .= "</tr>";
            $content .= "</table>";
            $content .= "<br>";    

            //Table B
            $content .= "<table>";
            $content .= "<tr>";
            foreach($chuk_array5[0] as $bits){
                $content .= "<td>$bits</td>";
            }
            $content .= "</tr>";
                
            $content .= "<tr>";
            foreach($chuk_array5[1] as $bits){
                $content .= "<td>$bits</td>";
            }
            $content .= "</tr>";

            $content .= "<tr>";
            foreach($chuk_array5[2] as $bits){
                $content .= "<td>$bits</td>";
            }
            $content .= "</tr>";

            $content .= "<tr>";
            foreach($chuk_array5[3] as $bits){
                $content .= "<td>$bits</td>";
            }
            $content .= "</tr>";

            $content .= "<tr>";
            foreach($chuk_array5[4] as $bits){
                $content .= "<td>$bits</td>";
            }
            $content .= "</tr>";
            $content .= "</table>";
            $content .= "<br>";
            $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
            Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
            $content .= "<br>";
            $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
            $content .= "<br>";

            //Table for MillionDay
            $content .= "<table>";
            $content .= "<caption>MillionDay</caption>";
            $content .= "<tr>";
            foreach ($tab7 as $row) {
                foreach (array($row) as $column) {
                    $content .= "<td>$column </td>";
                }
            }   
            $content .= "</tr>"; 
            $content .= "</table>";
            $content .= "<br>"; 


            //Table for MillionDay EXTRA
            $content .= "<table>";
            $content .= "<caption>MillionDay EXTRA</caption>";
            $content .= "<tr>";
            foreach ($tab8 as $row) {
                foreach (array($row) as $column) {
                    $content .= "<td>$column </td>";
                }
            }   
            $content .= "</tr>"; 
            $content .= "</table>";
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

            $query = new WP_Query( array( 
                'numberposts' => 1,
                'offset' => 0,
                //'category' => $cat->cat_ID,
                'orderby' => 'ID',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
                'tag' => 'VinciCasa5' ) );
                //$query->the_post();
            if($query->have_posts()){
                while ( $query->have_posts() ) {
                    $query->the_post(); 
                    //$recent['title'] = get_the_title();
                    $recentid = get_the_ID();
                    //wp_reset_postdata();
                }
            }

            $data = array(
                'ID' => $recentid,
                //'post_title' => $leadTitle,
                'post_content' => $leadContent,
                //'post_status' => $postStatus,
                //'post_date' => $timeStamp,
                //'post_author' => $userID,
                //'post_type' => $postType,
                //'post_category' => array($categoryID),
                //'page_template' => 'show.php',
                //'tags_input' => array('VinciCasa, MillionDay')
            );
            wp_update_post($data);
            //$post_id = wp_insert_post($new_post);
            //set_post_thumbnail($post_id, 101);
        }   
}



//For Sunday
if(date('D') == "Sun" && date('G') >= 21 && date('G') < 24 || date('D') == "Mon" && date('G') >= 1 && date('G') < 21){
    require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
    //$postType = 'post'; // set to post or page
    //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
    //$categoryID = '1'; // set to category id.
    //$userID = 'test'; // set to user id
    //$leadTitle = "Estrazioni VinciCasa e MillionDay di oggi " .date("n/d/Y");
    //$postStatus = 'publish';  // set to future, draft, or publish
    


    //Assigning Separate arrays for each table.
    $tab0 = array();
    $tab1 = array();
    $tab2 = array();
    $tab3 = array();

    $tab0[] = $rowData[0];
    //print_r($tab0);

    $tab1[] = $rowData[1];
    //print_r($tab1);

    $tab2[] = $rowData[2];
    //print_r($tab2);

    $tab3[] = $rowData[3];
    //print_r($tab3);
    $chuk_array = array_chunk($tab1[0], (ceil(count($tab1[0])/5)));

    $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.
    Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.
    Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
    $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>";


	//Table A of VinciCasa
    $content .= "<table>";
	$content .= "<caption><b>VinciCasa</b></caption>";
    foreach ($tab0 as $row) {
        $content .= "<tr>";
        foreach($row as $column){
            if(strlen($column) !== 25){
                $content .= "<td>$column </td>";
            }
        }
        $content .= "</tr>";
    }
	$content .= "</table>";
	$content .= "<br>";    

	//Table B
    $content .= "<table>";
    $content .= "<tr>";
    foreach($chuk_array[0] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
        
    $content .= "<tr>";
    foreach($chuk_array[1] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[2] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[3] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";

    $content .= "<tr>";
    foreach($chuk_array[4] as $bits){
        $content .= "<td>$bits</td>";
    }
    $content .= "</tr>";
    $content .= "</table>";
	$content .= "<br>"; 
    $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.
    Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
    $content .= "<br>";
    $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>";
    $content .= "<br>"; 

	//Table for MillionDay
	$content .= "<table>";
	$content .= "<caption><b>MillionDay</b></caption>";
    $content .= "<tr>";
	foreach ($tab2 as $row) {
        foreach ($row as $column) {
            if(strlen($column) !== 25){
                $content .= "<td>$column </td>";
            }
        }
    }
    $content .= "</tr>";    
    $content .= "</table>";
	$content .= "<br>";

    
	//Table for MillionDay EXTRA
	$content .= "<table>";
	$content .= "<caption><b>MillionDay EXTRA</b></caption>";
    $content .= "<tr>";
	foreach ($tab3 as $row) {
        foreach ($row as $column) {
            if(strlen($column) !== 25){
                $content .= "<td>$column </td>";
            }
        }
	}   
    $content .= "</tr>"; 
	$content .= "</table>";
	$content .= "<br>"; 
    
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

    $query = new WP_Query( array( 
        'numberposts' => 1,
        'offset' => 0,
        //'category' => $cat->cat_ID,
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag' => 'VinciCasa' ) );
        //$query->the_post();
    if($query->have_posts()){
        while ( $query->have_posts() ) {
            $query->the_post(); 
            //$recent['title'] = get_the_title();
            $recentid = get_the_ID();
            //wp_reset_postdata();
        }
    }

    $data = array(
        'ID' => $recentid,
        //'post_title' => $leadTitle,
        'post_content' => $leadContent,
        //'post_status' => $postStatus,
        //'post_date' => $timeStamp,
        //'post_author' => $userID,
        //'post_type' => $postType,
        //'post_category' => array($categoryID),
        //'page_template' => 'show.php',
        //'tags_input' => array('VinciCasa, MillionDay')
    );
     
    wp_update_post($data); 
    //$post_id = wp_insert_post($data);
    //set_post_thumbnail($post_id, 101);
}

   

    //For Monday
    if(date('D') == "Mon" && date('G') >= 21 && date('G') < 24 || date('D') == "Tue" && date('G') >= 1 && date('G') < 21){
        require_once("C:/xampp/htdocs/wordPressSite/wp-load.php");
        //$postType = 'post'; // set to post or page
        //require_once("C:/xampp/htdocs/wordPressSite/wp-content/themes/twentytwentytwo/show.php");
        //$categoryID = '1'; // set to category id.
        //$userID = 'test'; // set to user id
        //$leadTitle = "Estrazioni VinciCasa e MillionDay " .date("n/d/Y");
        //$postStatus = 'publish';  // set to future, draft, or publish


        $tab0 = array();
        $tab1 = array();
        $tab2 = array();
        $tab3 = array();
        $tab4 = array();
    
        $tab0[] = $rowData[0];
        //print_r($tab0);
    
        $tab1[] = $rowData[1];
        //print_r($tab1);
    
        $tab2[] = $rowData[2];
        //print_r($tab2);
    
        $tab3[] = $rowData[3];
        //print_r($tab3);

        $tab4[] = $rowData[4];
        //print_r($tab4);

        $chuk_array = array_chunk($tab2[0], (ceil(count($tab2[0])/5)));
        //print_r($chuk_array);

        //Text for VinciCasa
        $content = "<p>A differenza di Lotto e Superenalotto, ci sono due <b>estrazioni che avvengono tutti i giorni e che possono portare alla vincita di un premio massimo di 500.000 euro e di un milione: parliamo rispettivamente di VinciCasa e MillionDay</b>, giochi a premi lanciati nel 2014 e nel 2018.</p>";
        $content .= "<p>Nel primo caso si tratta di un gioco della SISAL, nel secondo di IGT Italia.</p>";
        $content .= "<p>Di seguito vi proponiamo i numeri vincenti di entrambe le lotterie.</p>";
        $content .= "<h2>Estrazioni VinciCasa di oggi " .date("n/d/Y")."</h2>";
        $content .= "<br>";
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di VinciCasa.</p>";
        $content .= "<br>";


        //Table A of VinciCasa
        $content .= "<table>";
	    $content .= "<caption><b>VinciCasa</b></caption>";
        foreach ($tab1 as $row) {
            $content .= "<tr>";
            foreach ($row as $column) {
                if(strlen($column)!==25) {
                    $content .= "<td>$column </td>"; 
                }
            }
            $content .= "</tr>";
        }
	    $content .= "</table>";
	    $content .= "<br>";    

	    //Table B
        $content .= "<table>";
        $content .= "<tr>";
        foreach($chuk_array[0] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        
        $content .= "<tr>";
        foreach($chuk_array[1] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array[2] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array[3] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";

        $content .= "<tr>";
        foreach($chuk_array[4] as $bits){
            $content .= "<td>$bits</td>";
        }
        $content .= "</tr>";
        $content .= "</table>";
	    $content .= "<br>"; 

        $content .= "<p>Ricordiamo come nel caso di VinciCasa si debbano scegliere 5 numeri su 40 e che nel caso di vincita del premio di prima categoria il montepremi deve essere impiegato per l'acquisto di un'abitazione.</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay di oggi " .date("n/d/Y")."</h2>"; //add date here
        $content .= "<p>Di seguito i 5 numeri vincenti dell'estrazione odierna di MillionDay.</p>";
        $content .= "<br>";
    
	    //Table for MillionDay
	    $content .= "<table>";
	    $content .= "<caption><b>MillionDay</b></caption>";
	    foreach ($tab3 as $row) {
            $content .= "<tr>";
            foreach ($row as $column) {
                if(strlen($column)!==25) {
                    $content .= "<td>$column </td>"; 
                }
            }
            $content .= "</tr>";
        }    
        $content .= "</table>";
	    $content .= "<br>"; 

        $content .= "<p>Ricordiamo come nel caso di MillionDay si debbano scegliere 5 numeri su 55.</p>";
        $content .= "<p>Nel caso di vincita del premio di prima categoria si vincerebbe un milione da impiegare come meglio si preferisce.</p>";
        $content .= "<p>A differenza di VinciCasa, inoltre, la schedina costa un euro (contro i due euro della giocata semplice di VinciCasa).</p>";
        $content .= "<br>";
        $content .= "<h2>Estrazioni MillionDay EXTRA di oggi " .date("n/d/Y")."</h2>"; //add date here


	    //Table for MillionDay EXTRA
	    $content .= "<table>";
	    $content .= "<caption><b>MillionDay EXTRA</b></caption>";
	    foreach ($tab4 as $row) {
		    $content .= "<tr>";
		    foreach ($row as $column) {
                if(strlen($column)!==25) {
                    $content .= "<td>$column </td>"; 
                }
		    }
		    $content .= "</tr>";
	    }    
	    $content .= "</table>";
	    $content .= "<br>";

        $content .= "<h2>VinciCasa e MillionDay, probabilità di vincita</h2>";
        $content .= "<p>Ricordiamo come le possibilità di vincita siano decisamente basse.</p>";
        $content .= "<p>Nel caso di VinciCasa si ha una possibilità su 658.008 di indovinare i 5 numeri.</p>";
        $content .= "<p>Nel caso di MillionDay la possibilità è ancora più bassa (dovendo indovinare 5 numeri su 55 e non su 40).</p>";
        $content .= "<p>Per questo motivo vi consigliamo di giocare con moderazione e prendere le estrazioni per quello che sono, cioè un gioco.</p>";
        $leadContent = $content;

        $query = new WP_Query( array( 
            'numberposts' => 1,
            'offset' => 0,
            //'category' => $cat->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'tag' => 'VinciCasa1' ) );
            //$query->the_post();
        if($query->have_posts()){
            while ( $query->have_posts() ) {
                $query->the_post(); 
                //$recent['title'] = get_the_title();
                $recentid = get_the_ID();
                //wp_reset_postdata();
            }
        }

        $data = array(
            'ID' => $recentid,
            //'post_title' => $leadTitle,
            'post_content' => $leadContent,
            //'post_status' => $postStatus,
            //'post_date' => $timeStamp,
            //'post_author' => $userID,
            //'post_type' => $postType,
            //'post_category' => array($categoryID),
            //'page_template' => 'show.php',
            //'tags_input' => array('VinciCasa, MillionDay')
        );
        wp_update_post($data);
        //$post_id = wp_insert_post($new_post);
        //set_post_thumbnail($post_id, 101);
    }



?>

<?php //get_footer(); ?>
<?php 
	if (!defined('ABSPATH')) exit;
	get_footer(); 
?>