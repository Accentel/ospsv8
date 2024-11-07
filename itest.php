<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

ob_start();

// HTML template begin (no output)

?>
<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}

    div.niveau
    {
        padding-left: 5mm;
    }
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 100%; text-align: left;">
                    Exemple d'utilisation des bookmarks
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
</page>


<?php
$text ='';
$text .='Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]
Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

Konidela Siva Sankara Vara Prasad (born 22 August 1955), better known by his stage name Chiranjeevi,[4] is an Indian film actor and politician. He was the Minister of State with independent charge for the Ministry of Tourism, Government of India.[5] Prior to politics, Chiranjeevi has attended the Madras Film Institute, and had worked primarily in Telugu cinema, in addition to Tamil, Kannada and Hindi films. He made his acting debut in 1978, with the film Punadhirallu.[6] However, Pranam Khareedu was released earlier at the box office.[7] Known for his break dancing skills, Chiranjeevi starred in 150 feature films in a variety of roles. In 1987, he was starred in Swayam Krushi, which was dubbed into Russian, and was screened at the Moscow International Film Festival.[8] Chiranjeevi won the 1988 Cinema Express Best Actor Award and the state Nandi Award for Best Actor awards for his performance in the film.[9][10][11] In the same year, Chiranjeevi was one of the Indian delegates at the 59th Academy Awards.[12][13] In 1988, he co-produced Rudraveena, which won the National Film Award for Best Feature Film on National Integration.[14]

 ';

    // HTML end 
    // Getting the html which was not displayed into $content var
    $content = ob_get_clean();

    require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->createIndex('Sommaire', 25, 12, false, true, 1);
         $html2pdf->writeHTML($text);
        $html2pdf->Output('bookmark.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }