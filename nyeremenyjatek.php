<?php
    include_once "common/fuggvenyek.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Gameter</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/flameicon_with_letters.png"/>
</head>
<body>
<!-- FEJLÉC/MENÜ -->

<?php
    include_once "common/header.php";
?>

<!-- FŐ TARTALOM -->
<main>
    <section>
        <h2>Az e heti nyereményjátékunk...</h2>
        <div class="slideshowelement"></div>
        <p>keretében a tied lehet három vadonatúj <span class="kiemeltSzoveg">Piatnik Activity Club Edition</span> felnőtt társasjáték egyike! De ez még nem minden...</p>
        <p>Ha márciusban minden héten teljesíted az alapvető követelményeket, esélyed lehet nyerni egy <span class="kiemeltSzoveg">Xbox Series X</span>-et is!</p>
        <p>És végül, az aktuális feladat! Ezen a héten a résztvevőktől olyan képeket várunk, ahol a család minél több tagja, esetleg ismerősök játszanak klasszikus társasjátékkal! </p>
        <hr class="invisiblepagebreak">
    </section>

    <hr>

    <section>
        <h2 class="withoutlargemrgns">A nevezés feltételei...</h2>
        <img src="assets/img/ny_socials.png" alt="socials" class="rightimage">
        <ul class="egyszerulist">
            <li>Az elvárásokat bizonyító legalább közepes minőségű kép vagy videó. Kép esetében - ha szükséges - akár több szögből is!</li>
            <li>Kövesd a Gametert Instagramon!</li>
            <li>Kövesd a Gametert Facebookon!</li>
            <li>Iratkozz fel a Gameter Youtube csatornájára!</li>
            <li>Ha ez az első alkalom, amikor részt veszel, csatold az adataidat is!</li>
        </ul>
        <hr class="invisiblepagebreak">
    </section>
    <section>
        <h2>Eddigi nyerteseink...</h2>
        <div class="tableandimage">
            <table>
                <caption>Nyertesek</caption>
                <tr>
                    <th id="honap">Hónap</th>
                    <th id="het">Hét</th>
                    <th id="nyertes">Nyertes</th>
                    <th id="nyeremeny">Nyeremény</th>
                </tr>
                <tr>
                    <td headers="honap" rowspan="12">február</td>
                    <td headers="het" rowspan="3">4.</td>
                    <td headers="nyertes">Abrosz Tisztakosz</td>
                    <td headers="nyeremeny" rowspan="3">Calico társasjáték</td>
                </tr>
                <tr>
                    <td headers="nyertes">Ebéd Elek</td>
                </tr>
                <tr>
                    <td headers="nyertes">Gaz Ella</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">3.</td>
                    <td headers="nyertes">Ipsz Ilonka</td>
                    <td headers="nyeremeny" rowspan="3">Egyedi telefontok</td>
                </tr>
                <tr>
                    <td headers="nyertes">Lopez de Futasztán</td>
                </tr>
                <tr>
                    <td headers="nyertes">Igor Mikornyiczki</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">2.</td>
                    <td headers="nyertes">Eszet Lenke</td>
                    <td headers="nyeremeny" rowspan="3">Sennheiser fejhallgató</td>
                </tr>
                <tr>
                    <td headers="nyertes">Boro Zoltán</td>
                </tr>
                <tr>
                    <td headers="nyertes">Cset Elek</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">1.</td>
                    <td headers="nyertes">Gá Zóra</td>
                    <td headers="nyeremeny" rowspan="3">Kingdomino társasjáték</td>
                </tr>
                <tr>
                    <td headers="nyertes">Körm Ödön</td>
                </tr>
                <tr>
                    <td headers="nyertes">Fá Zoltán</td>
                </tr>
                <tr>
                    <td headers="honap" rowspan="12">január</td>
                    <td headers="het" rowspan="3">4.</td>
                    <td headers="nyertes">Kukor Ica</td>
                    <td headers="nyeremeny" rowspan="3">Uno kártyajáték</td>
                </tr>
                <tr>
                    <td headers="nyertes">Mangal Ica</td>
                </tr>
                <tr>
                    <td headers="nyertes">Hatá Sára</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">3.</td>
                    <td headers="nyertes">Kaktuszné Cserepes Virág</td>
                    <td headers="nyeremeny" rowspan="3">Kijelzővédő fólia</td>
                </tr>
                <tr>
                    <td headers="nyertes">Görk Orsolya</td>
                </tr>
                <tr>
                    <td headers="nyertes">Fekete Mercédesz</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">2.</td>
                    <td headers="nyertes">Go Jóska</td>
                    <td headers="nyeremeny" rowspan="3">Matchify kártyajáték</td>
                </tr>
                <tr>
                    <td headers="nyertes">Bekő Tóni</td>
                </tr>
                <tr>
                    <td headers="nyertes">Alle Glória</td>
                </tr>
                <tr>
                    <td headers="het" rowspan="3">1.</td>
                    <td headers="nyertes">Heppi Endre</td>
                    <td headers="nyeremeny" rowspan="3">Azul társasjáték</td>
                </tr>
                <tr>
                    <td headers="nyertes">Bac Ilus</td>
                </tr>
                <tr>
                    <td headers="nyertes">Dűszerné Major Anna</td>
                </tr>
            </table>
            <img src="assets/img/nyj_winner.png" alt="nyertes" id="tableimage">
        </div>
        <hr class="invisiblepagebreak">
        <p class="insidearticledisclaimer">(*) Ha esetleg a nevek közé becsúszott olyan is, amely offenzív/nincs itt helye, elnézést. Nem az a cél.</p>
    </section>

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>