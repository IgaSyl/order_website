<!doctype html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>order form</title>
</head>

<body>
    <nav class="navbar fixed-top container">Ankieta dotycząca realizacji strony www</nav>
    
    <div class="container resWeb-type">1. Typ strony responsywnej.</div>

    <div class="container ">
        <p class="option-description resWebTypeDes">Na wstępie wybierają Państwo typ strony z poniższych wzorów.
            Webmaster Galactica
            opracowuje formę graficzną na podstawie wybranego typu szczegółowych wytycznych, podanych w dalszej części.
            Prezentacje i przykłady dostępnych stron responsywnych umieszczono na naszej stronie:<br>
            <a href="https://virgo.galactica.pl/zintegrowane-strony-www#responsywne" target="_blank"
                title="Galactica">virgo.galactica.pl</a></p>
    </div>
    <div class="container btn-resWebType"><a class="btn btn-danger"
            href="https://virgo.galactica.pl/zintegrowane-strony-www#responsywne" target="_blank"
            role="button">Więcej</a></div>

    <div class="container">
        <form class="needs-validation" novalidate id="orderForm" method="POST" enctype="multipart/form-data"
            action="mail_db.php">

            <p>W odpowiedzi proszę zaznaczyć wybrany wzór np. <em>TYP N</em>.</p>
            <div class="container row">

                <div class="col">
                    <div class="form-check form-check-inline form-check webtype">
                        <input class="form-check-input" type="radio" id="typeM" name="web-type" value="Typ M" required>
                        <label class="form-check-label form-check-label--M" for="typeM"></label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check form-check-inline webtype">
                        <input class="form-check-input" type="radio" id="typeN" name="web-type" value="Typ N" required>
                        <label class="form-check-label form-check-label--N" for="typeN"></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline webtype">
                        <input class="form-check-input" type="radio" id="typeP" name="web-type" value="Typ P" required>
                        <label class="form-check-label form-check-label--P" for="typeP"></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-check-inline webtype">
                        <input class="form-check-input" type="radio" id="typeR" name="web-type" value="Typ R" required>
                        <label class="form-check-label form-check-label--R" for="typeR"></label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Proszę wybrać szablon</div>
                    </div>

                </div>

            </div>


            <div class="row">
                <div class="col-3 btn-presentation">
                    <div class="web-type">Typ M</div>
                    <a href="http://f.formy.net/projekty/template-m" class="show-presentation" target="_blank"
                        title="Prezentacja szablonu M">Zobacz prezentację</a>
                </div>
                <div class="col-3 btn-presentation">
                    <div class="web-type">Typ N</div>
                    <a href="http://f.formy.net/projekty/template-n" class="show-presentation" target="_blank"
                        title="Prezentacja szablonu N">Zobacz prezentację</a>
                </div>
                <div class="col-3 btn-presentation">
                    <div class="web-type">Typ P</div>
                    <a href="http://f.formy.net/projekty/template-p" class="show-presentation" target="_blank"
                        title="Prezentacja szablonu P">Zobacz prezentację</a>
                </div>
                <div class="col-3 btn-presentation ">
                    <div class="web-type">Typ R</div>
                    <a href="http://f.formy.net/projekty/template-r" class="show-presentation" target="_blank"
                        title="Prezentacja szablonu R">Zobacz prezentację</a>
                </div>
            </div>








            <div class="web-details">2. Szczegółowe wytyczne realizacji.</div>



            <div class="option">
                <p class="option-title">1) Logo firmy </p>
                <p class="option-description">- proszę przesłać nam logo w formacie jpg lub png (najlepiej w
                    maksymalnej dostępnej rozdzielczości),<br>
                    - jeżeli nie posiadają Państwo logo nasz grafik może na Państwa życzenie wykonać odpowiednio
                    zaaranżowany napis z nazwą firmy.</p>
            </div>
            <div class="form-group">
                <label for="control-logo"></label>
                <input name="attachedFile" type="file" class="form-control-file" id="control-logo"
                    enctype='multipart/form-data'>
            </div>



            <div>
                <p class="option-title">2) Kolorystyka strony</p>
                <p class="option-description">- kolor tła (ewentualnie gradient, kolor przewodni)</p>
                <p>- kolory belek nagłówkowych</p>
                <!--<p class="select-color">wybierz kolor klikając w okienko poniżej</p> -->
                <div class="row colorPicker--container">
                    <div class="col-5">
                        <div class="container"><input type="text" name="colorPicker"></div>
                    </div>
                    <div class="col-3">
                        <div class="col img-colorPicker-container">
                            <img class="img-colorPicker" src="./sources/img/color-picker.jpg">
                        </div>
                        <div class="col-2"></div>
                    </div>







                    <p class="option-description">W przypadku, gdy chcą Państwo dokładnie określić tematykę
                        kolorystyczną,
                        mogą Państwo skorzystać z narzędzia do określania kolorów i przesłać nam kody wybranych barw:
                        <a href="http://www.colorpicker.com" target="_blank" title="Colorpicker">Colorpicker</a>.
                    </p>
                </div>


                <div class="form-group">
                    <label for="web-color"></label>


                    <textarea name="colorDescription" class="form-control" id="web-color" rows="3" required
                        placeholder="kolor tła: np.#ff3900, kolor nagłówków: np. #2000ff" minlength="10"></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole. Min. 10 znaków.</div>
                </div>

                <div>
                    <p class="option-title">3) Nagłówek strony (zdjęcie bądź animacja)</p>
                    <p class="option-description">Jakie zdjęcie ma znaleźć się w nagłówku (o jakiej tematyce) np.:
                        <em>okolica
                            wiejska, wnętrze apartamentu, nowoczesny, tradycyjny, ludzie, rodzina, plac budowy,
                            nieruchomości komercyjne itp.</em><br>
                        Jeśli chcą Państwo samodzielnie poszukać zdjęć do nagłówka polecamy serwis internetowy <a
                            href="http://www.fotolia.pl" target="_blank" title="Fotolia">www.fotolia.pl</a><br>
                        - możemy w nim zakupić wskazaną grafikę. W tym przypadku prosimy o przesłanie link'u do
                        wybranego
                        zdjęcia.<br>
                        Jeśli są Państwo zainteresowani dodatkowym animowanym nagłówkiem, proszę to zasygnalizować -
                        jest
                        to usługa dodatkowo płatna. </p>
                </div>
                <div class="form-group">
                    <label for="web-header"> </label>
                    <textarea class="form-control" name="webHeader" id="web-header" rows="3" required
                        placeholder="wpisz swoją odpowiedź..." minlength="10"></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole. Min. 10 znaków.</div>
                </div>

                <div>
                    <p class="option-title">4) Treść zakładki &ldquo;Kontakt&rdquo;</p>
                    <p>Z reguły są to następujące dane:<br>
                        - nazwa firmy (slogan, hasło reklamowe),<br>
                        - dane teleadresowe,<br>
                        - godziny otwarcia biura</p>
                </div>

                <div class="form-group">
                    <label for="web-contact"></label>
                    <textarea class="form-control" id="web-contact" name="contact" rows="3" required
                        placeholder="wpisz swoją odpowiedź..." minlength="10"></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole. Min 10 znaków.</div>
                </div>
                <div>
                    <p class="option-title">5) Treść zakładki "O firmie"</p>
                    <p>Opis zakresu oferowanych usług i inne treści.</p>
                </div>
                <div class="form-group">
                    <label for="aboutCompany"></label>
                    <textarea class="form-control" id="aboutCompany" name="aboutCompany" rows="3" required
                        placeholder="wpisz swoją odpowiedź..." minlength="10"></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole. Min 10 znaków</div>
                </div>
                <div>
                    <p class="option-title">6) Dodatkowe elementy menu.</p>
                    <p>Jeśli serwis ma zawierać jakieś niestandardowe treści (np. oferty kredytów, wycen nieruchomości,
                        świadectw energetycznych itp.) umieszczone pod dodatkowymi przyciskami w menu, prosimy o
                        przesłanie
                        listy dodatkowych modyfikacji oraz zamieszczenie treści, które będą umieszczone w odpowiednich
                        zakładkach. Po okresie wdrożenia Klient ma możliwość samodzielnego zarządzania treściami
                        serwisu,
                        wobec czego nie załączenie treści dodatkowych artykułów będzie traktowane jako zlecenie
                        utworzenia
                        pustych artykułów, których treść zostanie uzupełniona przez Klienta.</p>

                </div>
                <div class="form-group">
                    <label for="web-additionalMenuEl"></label>
                    <textarea class="form-control" id="web-additionalMenuEl" name="additionalMenuEl" rows="3"
                        placeholder="wpisz swoją odpowiedź..."></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole.</div>
                </div>
                <div>
                    <p class="option-title">7) RODO - obowiązek informacyjny.</p>
                    <p>Proszę pamiętać o obowiązku informacyjnym tzn. jeśli firma przyjmuje dane klienta to musi on
                        uzyskać
                        informacje, że administratorem bazy jest firma/osoba "X", że może się wypisać z bazy i
                        zaktualizować dane. Formuły i treści muszą Państwo opracować zgodnie z przygotowaną polityką
                        bezpieczeństwa (zgodne w szczególności ze zdefiniowanym zakresem i celem
                        przechowywania/przetwarzania danych osobowych). Prosimy o dosłanie treści, jakie mają zostać
                        dodane
                        w formularzach kontaktowych.</p>
                </div>
                <div class="form-group">
                    <label for="web-rodo"></label>
                    <textarea class="form-control" id="web-rodo" name="rodo" rows="3" required
                        placeholder="wpisz swoją odpowiedź..." minlength="20"></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole. Min 20 znaków</div>
                </div>
                <div>
                    <p class="option-title">8) Mapy Google - konieczne przesłanie klucza.</p>
                    <p>W celu zapewnienia dostępu do usługi Google Maps na Państwa stronie internetowej prosimy o
                        wygenerowanie i dostarczenie nam darmowego klucza Google Api Maps, zarejestrowanego na własną
                        firmę/konto w Google. Instrukcję utworzenia klucza znajdą Państwo w pomocy:<br>
                        <a href="https://pomocvirgo.galapp.net/#143-pl" target="_blank" title="pomoc Virgo">pomoc
                            Virgo</a>.<br>
                        Od 16 lipca 2018r Google limituje tą usługę (liczbę wyświetleń map), więc jeśli nie dostarczą
                        Państwo własnego, darmowego klucza to funkcja map na stronie internetowej może zostać wyłączona
                        (limit naszego, ogólnego klucza szybko się wyczerpuje).</p>
                </div>
                <div class="form-group">
                    <label for="web-google-map">nr klucza:</label>
                    <textarea class="form-control" id="web-google-map" name="googleMapKey" rows="3" required
                        placeholder="nr klucza..."></textarea>
                    <div class="valid-feedback">Dziękuję za odpowiedź.</div>
                    <div class="invalid-feedback">Proszę uzupełnić pole.</div>
                </div>
                <button type="submit" class="btn btn-danger">Wyślij</button>



        </form>
        <!--<div class="animated">dfrds</div>-->



    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>    

    <script src="js/script.js"></script>
   
</body>

</html>