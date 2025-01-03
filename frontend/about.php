<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../frontend/css/about.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
</head>
<body>
    <div class="main">
        <?php include "../frontend/components/navigation.php" ?>
        <div class="first_section">
            <h1>Misiunea noastră</h1>
            <p>Centrul Vieții este un cămin creștin din Timișoara care oferă tinerilor cu posibilități materiale limitate cazare și masă la prețuri accesibile. În cantina noastră, pregătim zilnic mese sănătoase și gustoase, asigurându-ne că studenții au energia necesară pentru a-și atinge obiectivele
            Centrul Vieții din Timișoara este mai mult decât un cămin. Este un loc de căldură și susținere pentru tineri provenind din familii cu venituri reduse. Oferim cazare la prețuri accesibile și mese calde, asigurând astfel un mediu propice studiului și dezvoltării personale.</p>
        </div>
        <div class="second_section">
            <svg xmlns="http://www.w3.org/2000/svg" class="svgTop"  viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L0,96L120,96L120,128L240,128L240,320L360,320L360,224L480,224L480,96L600,96L600,192L720,192L720,256L840,256L840,160L960,160L960,64L1080,64L1080,192L1200,192L1200,256L1320,256L1320,224L1440,224L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L0,192L120,192L120,32L240,32L240,256L360,256L360,160L480,160L480,96L600,96L600,256L720,256L720,160L840,160L840,192L960,192L960,288L1080,288L1080,256L1200,256L1200,96L1320,96L1320,160L1440,160L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>
            <div class="secondInsideDiv">
                <h1>Inceputul nostru</h1>
                <p>Într-o mică încăpere, încălzită doar de căldura inimilor lor, au pus bazele a ceea ce avea să devină Fundația Umanitară Centrul Vieții. Cu resurse limitate, dar cu o determinare infinită, au început să ofere ajutor celor aflați în nevoie. Au organizat colecte de haine și alimente, au vizitat bătrâni singuri, au oferit consiliere psihologică și au încercat să aducă un zâmbet pe fețele celor care sufereau.</p>
            </div>
            <div class="secondInsideDivType2">
                <h1>Cantina noastra</h1>
                <p>In caminul Centrul Vieții, tinerii se pot bucura de luni pana vineri de 2 mese gustoase pe zi, pentur a 
                le da energia de care au nevoie</p>
            </div>
            <div class="canteenCVImages">
                <span>
                    <img src="../images/cantina1.jpg" alt="">
                    <img src="../images/cantina2.jpg" alt="">
                </span>
                <img id="canteenImgBigOne" src="../images/cantina3.jpg" alt="">
            </div>
            <div class="secondInsideDivType2">
                <h1>Camerele studențiilor</h1>
                <p>In căminul nostru, camerele sunt de două persoane, si o baie proprie la fiecare cameră, oferind
                tinerilor locul necesar pentru a duce o viață decentă in centru </p>
            </div>
            <div class="roomsCVImages">
                <span>
                    <img src="../images/camera1.jpg" id="roomImg1" alt="">
                    <img src="../images/camera2.jpg" alt="">
                </span>
                <span>
                    <img src="../images/camera3.jpg"  alt="">
                    <img src="../images/camera4.jpg"  alt="">
                </span>
            </div>
        </div>
        <div class="secondInsideDivType2">
                <h1>Timpul de părtășie</h1>
                <p>In fiecare marți la centrul Vieții ne bucurăm de un timp în prezența Domnului, alături de invitați speciali, prin care Dumnezeu ne vorbește</p>
        </div>
        <div class="worshipTimeImages">
            <span id="WorshipSpan1">
                <img src="../images/partasie1.jpg" alt="">
                <img src="../images/partasie2.jpg" alt="">
                <img src="../images/partasie3.jpg" alt="">
            </span>
            <span id="WorshipSpan2">
                <img src="../images/partasie4.jpg" alt="">
                <img src="../images/partasie5.jpg" alt="">
                <img src="../images/partasie6.jpg" alt="">
            </span>
        </div>
        <?php include "../frontend/components/footer.php" ?>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>