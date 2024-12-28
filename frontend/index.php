<?php
session_start();

// Capture error messages
$emailError = isset($_SESSION['IndexEmailError']) ? $_SESSION['IndexEmailError'] : '';
$passwordError = isset($_SESSION['IndexPasswordError']) ? $_SESSION['IndexPasswordError'] : '';
$IndexaditionalText = isset($_SESSION['IndexaditionalText']) ? $_SESSION['IndexaditionalText'] : '';

// Clear session messages after displaying
unset($_SESSION['emailError']);
unset($_SESSION['passwordError']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>Centrul Vieții</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="main">
        <?php include '../frontend/components/navigation.php'?>
        <div class="first_section">
            <h1 class="text_animation">Misiunea noastră</h1>
            <p class="fade_scale_animation">Centrul Vieții este un cămin creștin din Timișoara care oferă tinerilor cu posibilități materiale 
                limitate cazare și masă la prețuri accesibile. În cantina 
                noastră, pregătim zilnic mese sănătoase și gustoase, 
                asigurându-ne că studenții au energia necesară pentru a-și 
                atinge obiectivele <a href="#">...Afla mai multe</a></p>
        </div>
        <div class="second_section">
            <h1>Bordul de conducere</h1>
            <div class="leaders_cards">
                <div class="card bounce_animation">
                    <img src="../images/dumitru.jpg" alt="">
                    <span>
                        <h3>Dumitru Stroia</h3>
                        <p>Director</p>
                    </span>
                </div>
                <div class="card bounce_animation">
                    <img src="../images/john.jpg" alt="">
                    <span>
                        <h3>John Dolinschi</h3>
                        <p>Director</p>
                    </span>
                </div>
                <div class="card bounce_animation">
                    <img src="../images/noImag.jpg" alt="">
                    <span>
                        <h3>Gelu Golea</h3>
                        <p>Pedagog</p>
                    </span>
                </div>
                <div class="card bounce_animation">
                    <img src="../images/ioan.jpg" alt="">
                    <span>
                        <h3>Ioan Șerban</h3>
                        <p>Administrator</p>
                    </span>
                </div>
            </div> 
        </div>
        <div class="third_section">
            <h1 class="rotate_animation">Ai nevoie de un loc bun, și un mediu creștin pe perioada studenției?</h1>
            <a href="./verify_email.php">Solicită cămin</a>
        </div>
        <div class="forth_section">
            <div class="placesInDorm">
                <span>
                    <h2 class="h2Regular">Total locuri</h2>
                    <h2 class="Thirdnumbers h2Regular">40</h2>
                </span>
                <div class="v1"></div>
                <span>
                    <h2 class="h2Regular">Disponibile</h2>
                    <h2 class="Thirdnumbers h2Regular" id="leftPlaces">15</h2>
                </span>
            </div>
            <p id="placesUpdateDate" class="text_animation">20/10/2024</p>
        </div>
    <div class="fifth_section">
        <svg xmlns="http://www.w3.org/2000/svg" class="svgTop" id="fifthFirstSvg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L0,96L120,96L120,128L240,128L240,320L360,320L360,224L480,224L480,96L600,96L600,192L720,192L720,256L840,256L840,160L960,160L960,64L1080,64L1080,192L1200,192L1200,256L1320,256L1320,224L1440,224L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" id="fifthSecondSvg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L0,192L120,192L120,32L240,32L240,256L360,256L360,160L480,160L480,96L600,96L600,256L720,256L720,160L840,160L840,192L960,192L960,288L1080,288L1080,256L1200,256L1200,96L1320,96L1320,160L1440,160L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>
        <h1 class="text_animation">Ți-a fost acceptată cererea de cazare, si ai cont?</h1>
        <p class="fade_scale_animation">Dacă ai cererea acceptată, iți poți creea cont pe platformă, cu mailul de pe care ai solicitat un loc în cămin, pentru a sta la curent cu regulile, obligațiile dar și drepturile tale</p>
        <a href="../frontend/login.php" class="hoverCls">Login </a>
    </div>

    <div class="sixth_section">
        <div class="left_section">
            <div id="overlayOne"></div>
        </div>
        <div class="right_section">
            <div id="overlayTwo"></div>
        </div>
        <div class="SixthElements">
            <h1 class="text_animation">Galeria Centrul Vieții</h1>
            <a href="#" class="">Vizualizează</a>
        </div>
    </div>


    <div class="seventh_section">
        <h1 class="text_animation">Cuvinte din cămin</h1>
        <div class="studentsCardsDiv">
            <div class="StudentsCard">
                <svg xmlns="http://www.w3.org/2000/svg" class="svgTop" id="firstStudentSVG" viewBox="0 0 1440 320"><path fill="#D9D9D9" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" id="secondStudentSVG" viewBox="0 0 1440 320"><path fill="#f78c6b" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>

                <p>Mă numesc Ana și sunt studentă la informatică. Îmi amintesc cu drag de noaptea aceea în care am terminat proiectul final. Am muncit atât de mult, dar satisfacția când am văzut rezultatul a fost imensă. Am învățat atât de multe lucruri noi și am consolidat prietenia cu colegii mei, Mihai, Maria și Andrei.</p>
            </div>
            <div class="StudentsCard">
                <svg xmlns="http://www.w3.org/2000/svg" class="svgTop" id="firstStudentSVG" viewBox="0 0 1440 320"><path fill="#D9D9D9" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" id="secondStudentSVG" viewBox="0 0 1440 320"><path fill="#f78c6b" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>

                <p>Mă numesc Ana și sunt studentă la informatică. Îmi amintesc cu drag de noaptea aceea în care am terminat proiectul final. Am muncit atât de mult, dar satisfacția când am văzut rezultatul a fost imensă. Am învățat atât de multe lucruri noi și am consolidat prietenia cu colegii mei, Mihai, Maria și Andrei.</p>
            </div>
            <div class="StudentsCard">
                <svg xmlns="http://www.w3.org/2000/svg" class="svgTop" id="firstStudentSVG" viewBox="0 0 1440 320"><path fill="#D9D9D9" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" id="secondStudentSVG" viewBox="0 0 1440 320"><path fill="#f78c6b" fill-opacity="1" d="M0,64L0,160L120,160L120,32L240,32L240,64L360,64L360,192L480,192L480,160L600,160L600,224L720,224L720,256L840,256L840,160L960,160L960,128L1080,128L1080,160L1200,160L1200,192L1320,192L1320,128L1440,128L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>

                <p>Mă numesc Ana și sunt studentă la informatică. Îmi amintesc cu drag de noaptea aceea în care am terminat proiectul final. Am muncit atât de mult, dar satisfacția când am văzut rezultatul a fost imensă. Am învățat atât de multe lucruri noi și am consolidat prietenia cu colegii mei, Mihai, Maria și Andrei.</p>
            </div>
            
        </div>
    </div>
    <?php include '../frontend/components/footer.php'?>
</div>
    <script type="module" src="./js/index_frontend.js"></script>
    <script type="" src="./js/footer.js"></script>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php
unset($_SESSION['IndexEmailError']);
unset($_SESSION['IndexPasswordError']);
unset($_SESSION['IndexaditionalText']);
?>
</html>
