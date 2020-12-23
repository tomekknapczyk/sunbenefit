<!DOCTYPE html>
<html lang="pl"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        @page { margin: 110px 50px 130px; }
        header { position: fixed; top: -85px; left: 0px; right: 0px;}
        footer { position: fixed; bottom: -40px; left: 0px; right: 0px; }
        footer .pagenum:before {content: counter(page);}
        html {font-size: 11px;}
        body {font-family: DejaVu Sans;font-weight: 400;color: #000;padding: 0;margin: 0;font-size: 1rem;width: 100%;}
        

        .bg-green{background: #3AB558;}
        .text-green{color: #3AB558;}
        .text-white{color: #fff;}

        ol { counter-reset: item; padding-left: 25px;}
        li{ display: block; margin-top: 2px; }
        li:before { content: counters(item, ".") ". "; counter-increment: item;}

        h1{font-size: 24px;line-height: 1;}

        h2{font-size: 20px;line-height: 1;}

        h3{font-size: 18px;line-height: 1;}

        h4{font-size: 16px;line-height: 1;}

        h5{font-size: 14px;line-height: 1;}

        h6{font-size: 12px;line-height: 1;}

        p{line-height: 1;margin: 0 0 2px;}

        td{padding: 2px 5px;}
    </style>
</head><body>
    <header>
        <table style="width: 100%" cellspacing="0">
            <tr>
                <td style="width: 30%; padding-top: 8px; vertical-align:top">
                    <img src="{{ asset('images/logo.png')}}" style="width: 80%; height: auto;" />
                </td>
                <td style="width: 70%; padding: 10px 20px; text-align:left" class="bg-green text-white">
                    <table style="width: 100%" cellspacing="0">
                        <tr>
                            <td style="width: 25px;"><img src="{{ asset('images/mail.png')}}" style="width: 20px; height: 20px;" /></td>
                            <td style="text-align: left;"><p>www.sunbenefit.pl</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 25px;"><img src="{{ asset('images/phone.png')}}" style="width: 20px; height: 20px;" /></td>
                            <td style="text-align: left;"><p>+48 33 5000 900</p></td>
                            <td style="text-align: right;">bok@sunbenefit.pl</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </header>
    <footer>
        <table style="width: 100%" cellspacing="0">
            <tr>
                <td style="width: 10%;">
                    <img src="{{ asset('images/logo_ico.png')}}" style="width: 80%; height: auto;" />
                </td>
                <td style="width: 25%;">
                    <p>SUNBENEFIT</p>
                    <p>www.sunbenefit.pl</p>
                    <p>bok@sunbenefit.pl</p>
                </td>
                <td style="width: 25%;">
                    <p><span class="text-green">NIP:</span> 553 000 94 83</p>
                    <p><span class="text-green">REGON:</span> 070936856</p>
                </td>
                <td style="width: 40%;">
                    <p><span class="text-green">Konta bankowe PKO BP</span></p>
                    <p>PLN: 72 1020 1390 0000 6402 0107 2073</p>
                </td>
            </tr>
        </table>
        <div style="text-align: center;"><span class="pagenum"></span></div>
    </footer>

    <div class="section">
        <div style="clear: both;margin-top: 0px;">
            <h5 style="text-align: center; margin-bottom: 5px; margin-top: 10px;">UMOWA SPRZEDAŻY I MONTAŻU<br>INSTALACJI FOTOWOLTAICZNEJ<br>Nr {{ $calculation->code }}</h5>
            <p style="text-align: center; margin-bottom: 10px">
                zawarta w dniu {{ $calculation->created_at->format('d-m-Y') }} r. w Bielsku-Białej<br>
                (dalej <strong>„Umowa”</strong>)<br>
                pomiędzy
            </p>

            <p style="margin-bottom: 10px">SUNBENEFIT Zdzisław Kos siedzibą w Bielsku-Białej ul. Karpacka 24, 43-300 Bielsko-Biała, posiadającą nr NIP:553-000-94-83 oraz REGON: 070936856, reprezentowaną przez:</p>
            <p style="margin-bottom: 10px;"><strong>-Certyfikowanego Przedstawiciela Handlowego: {{ $calculation->user->name }} {{ $calculation->user->lastname }}</strong></p>
            <p style="margin-bottom: 10px;">zwaną dalej <strong>„SUNBENEFIT” lub „SUN”</strong></p>
            <p style="margin-bottom: 10px;">a</p>
            <p style="margin-bottom: 10px;"><strong>{{ $calculation->name }}</strong> działającym osobiście.</p>
            <p style="margin-bottom: 10px;">Zwanym/ą dalej <strong>„Klientem”</strong></p>
            <p style="margin-bottom: 10px;">zwanymi dalej każda z osobna <strong>„Stroną”</strong> a łącznie <strong>„Stronami”</strong></p>

            <h6 style="text-align: center; margin-bottom: 10px;">§1 PRZEDMIOT UMOWY</h6>

            <table style="width: 100%" cellspacing="0">
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Instalacja Fotowoltaiczna o mocy:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p><strong>{{ $calculation->final_power }}</strong> kWp</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Rodzaj modułów fotowoltaicznych:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p><strong>{{ $calculation->module_name }}</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Cena Instalacji:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p>
                            <strong>{{ $calculation->final_price }}</strong> złotych brutto<br><br>
                            (słownie: {{ $calculation->inWords('final_price') }} 0/100 groszy) brutto
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Stawka VAT:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p>{{ $calculation->company? "8%":"23%" }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Sposób finansowania:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p>{{ $calculation->financing_method }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%; vertical-align:top;">
                        <p><strong>Adres/miejsce montażu:</strong></p>
                    </td>
                    <td style="width: 60%;">
                        <p>{{ $calculation->invest_address }},<br>{{ $calculation->invest_zip_code }} {{ $calculation->invest_city }}</p>
                    </td>
                </tr>
            </table>

            <h6 style="text-align: center; margin-bottom: 10px;">§2 PODSTAWOWE WARUNKI UMOWY</h6>
            <ol>
                <li>
                    W wykonaniu Umowy <strong>SUNBENEFIT</strong> zobowiązuje się do:
                    <ol>
                        <li>sprzedaży na rzecz Klienta kompletnej instalacji fotowoltaicznej określonej w <strong>§1</strong> Umowy (<strong>„Instalacja Fotowoltaiczna”</strong>), zgodnej z opisem technicznym stanowiącym <strong>Załącznik nr 1</strong> do Umowy (<strong>„Opis Techniczny Instalacji Fotowoltaicznej”</strong>);</li>
                        <li>realizacji montażu Instalacji Fotowoltaicznej (dalej <strong>„Montaż”</strong>), zgodnie mającymi zastosowanie zaleceniami producentów poszczególnych urządzeń wchodzących w skład Instalacji Fotowoltaicznej, w sposób uwzględniający aktualne zasady wiedzy techniczne i obowiązujące w tym zakresie przepisy prawa oraz w sposób zgodny z ustaleniami montażowymi i odpowiadający uzgodnionej pomiędzy Stronami koncepcyjnej montażu Instalacji Fotowoltaicznej, które łącznie stanowią <strong>Załącznik nr 2</strong> do Umowy (<strong>„Arkusz ustaleń montażowych”</strong>);</li>
                        <li>[ ] przygotowania i przekazania Klientowi w formie pisemnej lub w formie elektronicznej (korespondencja e-mail), projektu dokumentacji zgłoszenia przyłączenia Instalacji Fotowoltaicznej do sieci elektroenergetycznej właściwego operatora systemu dystrybucyjnego (<strong>„Dokumentacja OSD”</strong>);<br>
                            [ ] przygotowanie w imieniu Klienta, na podstawie udzielonego SUNBENEFIT przez Klienta pełnomocnictwa zgodnego z wzorem pełnomocnictwa przekazanym Klientowi przez SUNBENEFIT w formie pisemnej lub w formie elektronicznej (korespondencja e-mail) oraz złożenie w imieniu Klienta, na podstawie ważnie udzielonego przez niego ww. pełnomocnictwa dokumentacji zgłoszenia przyłączenia Instalacji Fotowoltaicznej do sieci elektroenergetycznej właściwego operatora systemu dystrybucyjnego (<strong>„Zgłoszenie OSD”</strong>).</li>
                    </ol>
                </li>
                <li>
                    W wykonaniu Umowy <strong>Klient</strong> zobowiązuje się do:
                    <ol>
                        <li>Współdziałania z SUNBENEFIT w dobrej wierze, w celu umożliwienia jej realizacji przedmiotu Umowy, w szczególności do:
                            <ol>
                                <li>odbioru dostarczonego przez SUNBENEFIT sprzętu wchodzącego w skład instalacji fotowoltaicznej, w tym potwierdzenia dostawy sprzętu podpisem Klienta lub jego przedstawiciela na liście przewozowym;</li>
                                <li>zabezpieczenia dostarczonego sprzętu do momentu ustalonej pomiędzy Stronami daty jego montażu, przed jego przypadkową utratą lub zniszczeniem;</li>
                                <li>potwierdzenia uzgodnionego z SUNBENEFIT terminu montażu oraz udostępnienia SUNBENEFIT miejsca Montażu Instalacji Fotowoltaicznej w terminie wynikającym z Umowy i uzgodnień Stron w tym umożliwienia realizacji prac montażowych we wskazane przez SUNBENEFIT terminach w dni robocze oraz soboty, w godzinach pomiędzy 6 a 22;</li>
                                <li>udzielenia SUNBENEFIT pełnomocnictw w przypadkach wynikających z Umowy, przekazywania SUNBENEFIT wskazanych przez nią, informacji oraz dokumentów, niezbędnych dla prawidłowego wykonania przedmiotu Umowy;</li>
                            </ol>
                        </li>
                        <li>przystąpienia do Odbioru Końcowego oraz podpisania Protokołu Odbioru wykonanej zgodnie z Umową Instalacji Fotowoltaicznej, niezwłocznie po zakończeniu Montażu;</li>
                        <li>w przypadku finansowania zakupu Instalacji Fotowoltaicznej ze środków zewnętrznych, współdziałania z wybraną przez Klienta instytucją finansującą, w celu realizacji procedury pozyskania finansowania bez nieuzasadnionej zwłoki;</li>
                        <li>zapłaty na rzecz SUNBENEFIT Wynagrodzenia z tytułu prawidłowego wykonania przedmiotu Umowy, zgodnie z warunkami oraz w terminach określonych w Umowie.</li>
                    </ol>
                </li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§3 OŚWIADCZENIA STRON</h6>
            <ol>
                <li><strong>SUNBENEFIT</strong> oświadcza, że:
                    <ol>
                        <li>posiada wymagane przepisami prawa uprawnienia i zezwolenia, posiada fachową wiedzę, doświadczenie, wykwalifikowany personel oraz narzędzia niezbędne do profesjonalnego wykonania przedmiotu Umowy;</li>
                        <li>wykona Instalację Fotowoltaiczną będącą przedmiotem Umowy zgodnie z obowiązującą wiedzą techniczną, zgodnie z obowiązującymi przepisami prawa oraz z uwzględnieniem zaleceń poszczególnych producentów sprzętu i urządzeń wchodzących w skład Instalacji Fotowoltaicznej;</li>
                        <li>Instalacja Fotowoltaiczna wykonana w ramach realizacji przedmiotu Umowy będzie zgodna z Umową, nowa, kompletna i nieużywana, wolna od wad fizycznych i prawnych.</li>
                    </ol>
                </li>
                <li><strong>Klient</strong> oświadcza, że:
                    <ol>
                        <li>nie jest w stanie upadłości ani w likwidacji i nie zachodzą przesłanki do ich zgłoszenia; nie jest w stosunku do niego prowadzone postępowanie naprawcze oraz nie jest zagrożony niewypłacalnością;</li>
                        <li>miejsce Montażu Instalacji Fotowoltaicznej posiada wystarczającą moc przyłączeniową do realizacji inwestycji lub Klient zapewni ją według własnego wyboru przed przystąpieniem do montażu Instalacji Fotowoltaicznej lub przed zgłoszeniem przyłączenia Instalacji Fotowoltaicznej do sieci elektroenergetycznej właściwego OSD;</li>
                        <li>udzieli SUNBENEFIT lub wskazanemu przez nią Przedstawicielowi Handlowemu odrębnego od Umowy pełnomocnictwa do reprezentowania Klienta przed OSD wcelu umożliwienia zgłoszenia przyłączenia Instalacji Fotowoltaicznej do sieci elektroenergetycznej OSD;</li>
                        <li>w związku z zawarciem Umowy otrzymał od SUNBENEFIT szczegółowe informacje dotyczące wynikających z Umowy warunków Montażu oraz użytkowania Instalacji Fotowoltaicznej;</li>
                        <li>jest właścicielem, współwłaścicielem, użytkownikiem wieczystym lub ma prawo do dysponowania nieruchomością, na której nastąpić ma montaż Instalacji Fotowoltaicznej;</li>
                        <li>obiekt stanowiący miejsce Montażu Instalacji Fotowoltaicznej znajduje się w dobrym stanie technicznym pozwalającym na zgodny z warunkami Umowy, bezpieczny montaż Instalacji Fotowoltaicznej;</li>
                        <li>obiekt stanowiący miejsce Montażu Instalacji Fotowoltaicznej nie znajduje się pod nadzorem lub w obszarze ochrony konserwatora zabytków.</li>
                    </ol>
                </li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§4 DODATKOWE USTALENIA UMOWNE</h6>
            <ol>
                <li>Strony zgodnie ustalają i potwierdzają, że po dokonaniu Montażu Instalacji Fotowoltaicznej oraz przeszkleniu Klienta z podstawowych zasad użytkowania Instalacji Fotowoltaicznej zakończonego podpisaniem przez Strony Protokołu Odbioru, Instalacja Fotowoltaiczna zostanie przez SUNBENEFIT wyłączona w celu zgłoszenia jej przyłączenia do sieci elektroenergetycznej OSD.</li>
                <li>Wykonanie przez SUNBENEFIT zobowiązań dotyczących Dokumentacji OSD / Zgłoszenia OSD nastąpi w terminie 14 dni, od dnia zapłaty przez Klienta na rzecz SUNBENEFIT pełnej kwoty Wynagrodzenia z tytułu wykonania przedmiotu Umowy. Warunkiem dokonania Zgłoszenia OSD jest udzielenie przez Klienta na rzecz SUNBENEFIT lub na rzecz wskazanego przez nią Przedstawiciela Handlowego stosownego pełnomocnictwa do złożenia przedmiotowej dokumentacji.</li>
                <li>SUNBENEFIT nie jest zobowiązana do podejmowania w imieniu Klienta jakichkolwiek dodatkowych działań, poza wprost opisanymi w Umowie, w szczególności nie jest zobowiązana do podejmowania działań mających na celu zmiany techniczne dot. obiektu lub dostosowanie mocy przyłączeniowej obiektu stanowiącego miejsce Montażu Instalacji Fotowoltaicznej, do uzgodnionej pomiędzy Stronami w Umowie mocy Instalacji Fotowoltaicznej, jak również nie jest zobowiązana do ponoszenia z tego tytułu jakichkolwiek kosztów. Brak wystarczającej mocy przyłączeniowej obiektu stanowiącego miejsce Montażu Instalacji Fotowoltaicznej jest okolicznością obciążającą Klienta i pozostaje bez wpływu na rozliczenia Stron wynikające z Umowy.</li>
                <li>Zmiana potwierdzonego przez Strony terminu montażu, dokonana na wniosek Klienta zgłoszony na mniej niż 3 (słownie: trzy) dni przed ustaloną pierwotnie datą montażu, skutkować będzie wydłużeniem terminu realizacji Umowy oraz możliwością dochodzenia przez SUNBENEFIT zwrotu poniesionych i udokumentowanych kosztów ponownej organizacji montażu.</li>
                <li>Konfiguracja przez SUNBENEFIT falownika wchodzącego w skład Instalacji Fotowoltaicznej, w celu umożliwienia korzystania przez Klienta z aplikacji monitorującej działanie Instalacji Fotowoltaicznej nastąpi w dniu zakończenia Montażu, pod warunkiem zapewnienia przez Klienta w momencie zakończenia Montażu i w miejscu zamontowania Instalacji Fotowoltaicznej dostępu do sieci Internet, za pośrednictwem WiFi. Sieć WiFi musi posiadać parametry wystarczające do zapewnienia transferu danych z falownika na potrzeby działania aplikacji monitorującej. Klient zobowiązany jest udostępnić przedstawicielowi SUNBENEFIT w dniu zakończenia montażu klucz sieci WiFi, w celu konfiguracji falownika (klucz sieci WiFi spełniać musi wymagania określone przez producenta falownika). W celu uchylenia wątpliwości Strony potwierdzają, że SUNBENEFIT nie jest zobowiązana do przeprowadzania instalacji i konfiguracji aplikacji monitorującej na urządzeniach Klienta typu tablet, laptop, smartfon.</li>
                <li>W przypadku niezapewnienia przez Klienta w dacie zakończenia Montażu dostępu do sieci Internet za pośrednictwem WiFi lub niespełnienia innych warunków zgodnie z postanowieniami ust. 4 powyżej, SUNBENEFIT nie jest zobowiązana do dokonywania konfiguracji w innym terminie. W sytuacji, o której mowa w zdaniu pierwszym brak konfiguracji falownika na potrzeby korzystania przez Klienta z aplikacji monitorującej działanie Instalacji Fotowoltaicznej nie może stanowić podstawy odmowy podpisania przez Klienta Protokołu Odbioru prawidłowo wykonanej Instalacji Fotowoltaicznej. W przypadku, o którym mowa w zdaniu poprzednim SUNBENEFIT uprawniona jest do jednostronnego dokonania odbioru.</li>
                <li>Konfiguracja falownika w celu umożliwienia korzystania przez Klienta z aplikacji monitorującej działanie Instalacji Fotowoltaicznej, w późniejszym terminie niż data zakończenia jej Montażu, nastąpić może po uprzednim ustaleniu przez Strony terminu, w którym nastąpić ma konfiguracja. Z tytułu wykonania usługi konfiguracji falownika, w warunkach opisanych w niniejszym ust. 6 Klient zobowiązany jest zapłacić SUNBENEFIT wynagrodzenie w zryczałtowanej kwocie 500 zł netto (słownie: pięćset), na podstawie wystawionej przez Zieloną Energia, dostarczonej Klientowi w formie pisemnej lub formie elektronicznej faktury VAT.</li>
                <li>Ryzyko utraty Instalacji Fotowoltaicznej lub uszkodzenia sprzętu oraz urządzeń wchodzących w skład Instalacji Fotowoltaicznej przechodzi na Klienta z chwilą zakończenia przez SUNBENEFIT jej Montażu, przy czym SUNBENEFIT zachowuje prawo do Instalacji Fotowoltaicznej, w tym wszelkich materiałów oraz urządzeń dostarczonych Klientowi aż do zapłaty pełnej kwoty Wynagrodzenia. Do zapłaty pełnej kwoty Wynagrodzenia Instalacja Fotowoltaiczna pozostaje własnością SUNBENEFIT.</li>
                <li>Do dnia zapłaty na rzecz SUNBENEFIT pełnej kwoty Wynagrodzenia określonego w Umowie, Klient zobowiązuje się nie uruchamiać lub nie korzystać z Instalacji Fotowoltaicznej w jakikolwiek inny sposób.</li>
                <li>Nadto, Strony postanawiają, że w przypadku braku odbioru Instalacji Fotowoltaicznej, Klient ani żaden inny podmiot nie jest uprawniony do uruchomienia lub korzystania z Instalacji Fotowoltaicznej, w tym także z jej części. Uruchomienie lub korzystanie z Instalacji Fotowoltaicznej w takim przypadku jest równoznaczne z Odbiorem Końcowym Instalacji Fotowoltaicznej.</li>
                <li>Strony zgodnie ustalają, że wszelka dokumentacja dotycząca przedmiotu Umowy może być przesyłana pomiędzy Stronami w formie pisemnej lub w formie elektronicznej, z wykorzystaniem adresów e-mail Stron, wskazanych w treści Umowy.</li>
                <li>W przypadku gdy podczas montażu systemu fotowoltaiczne zajdą okoliczności uniemożliwiające posadowienie założonej ilości modułów, <strong>Wykonawca</strong> pomniejszy tą ilość do wolumenu , który można bezpiecznie zamontować i odejmie proporcjonalnie kwotę należności z uzgodnionej do zapłaty przez <strong>Inwestora</strong> wg. wzoru : <strong>kwota zapłaty pomniejszona o 30% dzielona przez ilość modułów * ilość modułów odjętych</strong></li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§5 TERMIN WYKONANIA PRZEDMIOTU UMOWY</h6>
            <ol>
                <li>Montaż Instalacji Fotowoltaicznej w wykonaniu Umowy nastąpi w 30 <strong>(słownie: trzydzieści) dni od</strong> dnia zapłaty przez Klienta Wpłaty Własnej, zgodnie z warunkami Umowy oraz z zastrzeżeniem ustalenia przez Strony daty realizacji Montażu, po dniu zapłaty przez Klienta Wpłaty Własnej i udostępnienia SUNBENEFIT przez Klienta miejsca Montażu w dacie ustalonej pomiędzy Stronami.</li>
                <li>Strony zgodnie postanawiają, iż termin Montażu Instalacji Fotowoltaicznej określony w pkt. 1 powyżej może ulec wydłużeniu w przypadku:
                    <ol>
                        <li>gdy realizacja przez SUNBENEFIT Montażu nie będzie możliwa z przyczyn leżących po stronie Klienta, w szczególności w przypadku zmiany na wniosek Klienta, pierwotnie ustalonego terminu Montażu;</li>
                        <li>gdy realizacja przez SUNBENEFIT Montażu nie będzie możliwa z innych przyczyn niż wskazane w pkt. 2.1. powyżej, niezależnych od SUNBENEFIT i wpływających na zachowanie ww. terminu;</li>
                        <li>wystąpienia okoliczności Siły Wyższej;</li>
                        <li>gdy Klient nie dokona wpłaty Zaliczki zgodnie z warunkami Umowy, w przypadku finansowania ze środków własnych;</li>
                        <li>opóźnień wynikających z działań lub zaniechań innych podmiotów niezależnych od SUNBENEFIT;</li>
                        <li>w przypadku gdy Instalacja Fotowoltaiczna finansowana jest przez Klienta ze źródeł zewnętrznych oraz Klient opóźnia się z dostarczeniem niezbędnych dokumentów, zawarciem umowy o finansowanie lub dokonaniem Wpłaty Własnej zgodnie z umową o leasing/pożyczkę zawartej z instytucją finansującą.</li>
                    </ol>
                </li>
                <li>Termin określony zgodnie z ust. 1 ulega automatycznemu przesunięciu o okres trwania przeszkody, o której mowa w ust. 2.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§6 ODBIÓR PRZEDMIOTU UMOWY</h6>
            <ol>
                <li>Niezwłocznie po zakończeniu Montażu, w dniu jego zakończenia, Strony zobowiązują się do przystąpienia do czynności odbioru Instalacji Fotowoltaicznej (dalej <strong>„Odbiór Końcowy”</strong>).</li>
                <li>Termin zakończenia Montażu Instalacji Fotowoltaicznej oraz Odbioru Końcowego zostanie określony przez SUNBENEFIT i przekazany Klientowi z minimum 1 dniowym wyprzedzeniem.</li>
                <li>Zakończenie przedmiotu umowy zostanie potwierdzone wykonaniem przez wykonawcę testu końcowego potwierdzającego działanie instalacji fotowoltaicznej . Umowę uznaje się za wykonaną jeżeli test końcowy będzie prawidłowy, co jest podstawą do wystawienia faktury końcowej.</li>
                <li>Odbiór Końcowy nastąpi na podstawie sporządzonego oraz zaakceptowanego przez Strony bez zastrzeżeń Protokołu Odbioru (dalej <strong>„Protokół Odbioru”</strong>), którego wzór określa <strong>Załącznik nr 3</strong> do Umowy. Czynności Odbioru Końcowego połączone będą z próbami i testami Instalacji Fotowoltaicznej.</li>
                <li>Akceptacja przez Strony Protokołu Odbioru oznacza potwierdzenie prawidłowości wykonania przedmiotu Umowy przez SUNBENEFIT. W trakcie czynności Odbioru Końcowego Klient zobowiązany jest zgłosić oraz opisać w Protokole Odbioru wszelkie uwagi dotyczące widocznych wad lub usterek Instalacji Fotowoltaicznej i jej Montażu, pod rygorem braku możliwości ich skutecznego zgłaszania w przyszłości.</li>
                <li>SUNBENEFIT zobowiązana będzie do niezwłocznego usunięcia wskazanych w treści Protokołu Obioru wad lub usterek, nie później niż w terminie 14 dni roboczych od dnia podpisania przez Strony Protokołu Odbioru z zastrzeżeniami.</li>
                <li>Niestawienie się Klienta w dacie oraz miejscu Odbioru Końcowego, jak również bezpodstawna odmowa zaakceptowania Protokołu Odbioru, w szczególności w przypadku opisanym w §4 ust. 5 Umowy,uprawniać będzie SUNBENEFIT do dokonania Odbioru Końcowego jednostronnie wraz ze wskazaniem przyczyn braku akceptacji Klienta.</li>
                <li>W przypadku braku możliwości uruchomienia przez SUNBENEFIT zamontowanej i zgłoszonej do odbioru Instalacji Fotowoltaicznej, z przyczyn zależnych od Klienta lub od podmiotu za działanie lub za zaniechanie którego Klient odpowiada (np. brak zapewnienia przez Klienta wystarczającej mocy przyłączeniowej) przez okres co najmniej 1 miesiąca od terminu Odbioru Końcowego wynikającego z ust. 1 powyżej, uznaje się że Instalacja Fotowoltaiczna została wykonana prawidłowo, a SUNBENEFIT uprawniona jest do samodzielnego dokonania Odbioru Końcowego i podpisania Protokołu Odbioru.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§7 WYNAGRODZENIE I WARUNKI PŁATNOŚCI</h6>
            <ol>
                <li>Z tytułu wykonania przedmiotu Umowy Klient zapłaci na rzecz SUNBENEFIT wynagrodzenie w odpowiadającej <strong>Cenie Instalacji Fotowoltaicznej</strong> opisanej w §1 Umowy (<strong>„Wynagrodzenie”</strong>).</li>
                <li>Kwota Wynagrodzenie obejmuje wszelkie koszty i wydatki SUNBENEFIT związane z wykonaniem przedmiotu Umowy, zgodnie z jej warunkami.</li>
                <li>W związku z finansowaniem przez Klienta zakupu Instalacji Fotowoltaicznej środkami pozyskiwanymi od zewnętrznych podmiotów finansujących, zapłata na rzecz SUNBENEFIT Wynagrodzenia dokonana będzie w następujący sposób:
                    <ol>
                        <li>Klient dokona na rzecz SUNBENEFIT zapłaty części Wynagrodzenia w kwocie {{ $calculation->deposit }} zł brutto (słownie: {{ $calculation->inWords('deposit') }} 0/100 groszy) brutto (dalej <strong>„Wpłata Własna”</strong>) na podstawie wystawionej przez SUNBENEFIT faktury pro-forma, w terminie  3  dni (słownie: trzy) dni od dnia otrzymania faktury pro-forma. Po dokonaniu przez Klienta płatności zgodnie ze zdaniem pierwszym, SUNBENEFIT wystawi oraz przekaże Klientowi fakturą VAT na pełną kwotę Wpłaty Własnej;</li>
                        <li>płatność pozostałej części Wynagrodzenia, tj. pomniejszonej o wpłaconą przez Klienta Wpłatę Własną dokonana zostanie przez instytucję finansującą, zgodnie z warunkami wynikającymi umowy pomiędzy Klientem a instytucją finansującą uwzględniającymi warunki oraz terminy określone w niniejszej Umowie.</li>
                        <li>W przypadku wystąpienia jakichkolwiek zmian dotyczących kredytowania, Inwestor jest zobowiązany do zapłaty za wykonaną instalację ze środków własnych w terminie oznaczonym na fakturze końcowej.</li>
                    </ol>
                </li>
                <li>Wszelkie płatności związane z przedmiotem Umowy Klient lub instytucja finansująca realizować będą zgodnie z treścią wystawianych faktur VAT, w złotych polskich, przelewem bankowym na rachunek bankowy SUNBENEFIT prowadzony w <strong>PKO BP SA</strong> o numerze:<br>
                    <p style="text-align:center;"><strong>72 1020 1390 0000 6402 0107 2073</strong></p>
                </li>
                <li>Klient niniejszym akceptuje wystawianie i doręczanie faktur w formie elektronicznej. Faktura w formie elektronicznej powinna być wystawiona oraz przesłana z adresu e-mail SUNBENEFIT na adres e-mail Klienta wskazany w Umowie.</li>
                <li>Jeżeli opóźnienie w zapłacie Zaliczki przekroczy 30 dni, SUNBENEFIT może po uprzednim wezwaniu Klienta do zapłaty i wyznaczeniu mu dodatkowego, nie krótszego niż 7 (słownie: siedem) dni terminu na powyższe, rozwiązać Umowę ze skutkiem natychmiastowym zachowując prawo do dochodzenia od Klienta naprawienia szkody wynikającej z niewykonania przez Klienta jego zobowiązania. Uprawnienie, o którym mowa w niniejszym ustępie przysługuje SUNBENEFIT w terminie 30 dni od dnia bezskutecznego upływu dodatkowego terminu na dokonanie płatności.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§8 GWARANCJA</h6>
            <ol>
                <li>Sprzęt wchodzący w skład Instalacji Fotowoltaicznej objęty jest gwarancją jego producentów:
                    <ol>
                        <li>okres gwarancji producenta na panele fotowoltaiczne wynosi: <strong>{{ $calculation->module_warranty }}</strong></li>
                        <li>okres gwarancji producenta na falownik wynosi: <strong>....... lat</strong></li>
                    </ol>
                </li>
                <li>SUNBENEFIT udziela Klientowi <strong>24 miesięcznej</strong> gwarancji na wykonane prace montażowe oraz materiały wykorzystane przy budowie Instalacji Fotowoltaicznej. Gwarancja na wykonane prace montażowe oraz materiały dotyczy odpowiedzialności SUNBENEFIT z tytułu wad tkwiących w użytych materiałach, z tytułu wadliwego wykonania prac i obejmuje szkody rzeczywiste z wyłączeniem utraconych korzyści powstałych w związku z wystąpieniem wady.</li>
                <li>Bieg okresu gwarancji w odniesieniu do prac montażowych oraz gwarancji producentów dotyczącej sprzętu wchodzącego w skład Instalacji Fotowoltaicznej rozpoczyna się z dniem dokonania przez Strony Odbioru Końcowego.</li>
                <li>Wykonawca zobowiązuje się, że podczas okresu gwarancyjnego, w odniesieniu do prac montażowych oraz urządzeń, na własny koszt i ryzyko usunie wadę fizyczną Instalacji Fotowoltaicznej poprzez jej naprawę lub wymianę jej elementów.</li>
                <li>Klient zobowiązany jest do utrzymywania Instalacji Fotowoltaicznej w stanie technicznym pozwalającym na jej bezawaryjne funkcjonowanie oraz zobowiązuje się do niezwłocznego zgłaszania SUNBENEFIT, wykrytych wad lub usterek Instalacji Fotowoltaicznej, każdorazowo w terminie nie dłuższym niż <strong>3 (słownie: trzy) dni robocze</strong> od dnia stwierdzenia występowania danej wady lub usterki.</li>
                <li>Gwarantowany przez SUNBENEFIT czas przystąpienia do naprawy Instalacji Fotowoltaicznej wynosi <strong>14 dni (słownie: czternaście)</strong> od dokonania przez Zamawiającego pisemnego lub w formie elektronicznej zgłoszenia wady Instalacji Fotowoltaicznej.</li>
                <li>SUNBENEFIT nie ponosi odpowiedzialności za nieprawidłowe działanie Instalacji Fotowoltaicznej będące skutkiem jej uszkodzeń mechanicznych, jak również będące wynikiem działań lub zaniechań jakichkolwiek osób trzecich. W przypadku stwierdzenia nieuprawnionej ingerencji osób trzecich w Instalacje Fotowoltaiczną Klient traci uprawnienia wynikające z gwarancji opisane w niniejszym §8 Umowy.</li>
                <li>W przypadkach nieuzasadnionych zgłoszeń gwarancyjnych/serwisowych, w szczególności w sytuacji gdy brak prawidłowego funkcjonowania Instalacji Fotowoltaicznej wynikać będzie z przyczyn opisanych w ust. 7 powyżej, Klient zobowiązany będzie do pokrycia kosztów poniesionych przez SUNBENEFIT związanych z przyjazdem serwisanta, w zryczałtowanej kwocie 500 zł netto (słownie: pięćset), na podstawie wystawionej przez SUNBENEFIT, dostarczonej Klientowi w formie pisemnej lub formie elektronicznej faktury VAT.</li>
                <li>Jeżeli Klient nie dokona płatności pełnego Wynagrodzenia, wówczas zawieszeniu ulegają ww. obowiązki SUNBENEFIT wynikające z gwarancji, przy czym nie zostaje zawieszony bieg terminu gwarancji (termin gwarancji biegnie dalej).</li>
                <li>Strony wyłączają odpowiedzialność SUNBENEFIT za utracone korzyści Klienta.</li>
                <li>W zakresie innym niż wskazany w ust. 10 powyżej, odpowiedzialność SUNBENEFIT z tytułu Umowy, w tym także z tytułu gwarancji, jest ograniczona do wysokości szkody rzeczywistej poniesionej przez Klienta w wyniku niewykonania lub nienależytego wykonania Umowy, ale łącznie nie więcej niż do kwoty stanowiącej równowartość 100 % otrzymanego Wynagrodzenia.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§9 PRZETWARZANIE DANYCH OSOBOWYCH</h6>
            <ol>
                <li>Zgodnie z art. 13 ust. 1 i ust. 2 Rozporządzenia Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych (dalej RODO) informuję, że:
                    <ol>
                        <li>SUNBENEFIT Zdzisław Kos siedzibą w Bielsku-Białej ul. Karpacka 24, 43-300 Bielsko-Biała, posiadającą nr NIP: 553-000-94-83 oraz REGON: 070936856jest Administratorem danych osobowych Klienta zawartych w Umowie.</li>
                        <li>Dane kontaktowe Administratora e-mail: dane-osobowe@zielona-energia.com.</li>
                        <li>Podstawą przetwarzania danych osobowych są przepisy krajowe dotyczące ochrony danych osobowych oraz art. 6 ust. 1 pkt b, f) RODO tj. przetwarzanie jest niezbędne do wykonania Umowy oraz do celów wynikających z prawnie uzasadnionych interesów realizowanych przez Administratora.</li>
                        <li>Dane osobowe przetwarzane będą w zakresie wskazanym w Umowie oraz w dokumentach powstałych w wyniku jej realizacji i będą ujawniane wyłącznie upoważnionym do przetwarzania danych osobowych podmiotom obsługującym Administratora lub jego podwykonawcom oraz odbiorcom uprawnionym na podstawie przepisów prawa.</li>
                        <li>Dane osobowe będą przetwarzane przez okres trwania Umowy oraz przechowywane do momentu wygaśnięcia obowiązku przechowywania danych wynikającego z przepisów prawa, w szczególności z obowiązku przechowywania dokumentów księgowych dotyczących Umowy, w tym na czas wygaśnięcia roszczeń tj. okres konieczny do zabezpieczenia i dochodzenia roszczeń z umów.</li>
                        <li>Osoba, której dane są przetwarzane ma prawo do: żądania od Administratora dostępu do swoich danych osobowych, ich sprostowania, usunięcia lub ograniczenia przetwarzania danych osobowych, wniesienia sprzeciwu wobec przetwarzania, przenoszenia danych, wniesienia skargi do organu nadzorczego - Prezesa Urzędu Ochrony Danych Osobowych, gdy przetwarzanie danych osobowych narusza przepisy RODO.</li>
                        <li>Prawa wskazane w pkt 1.6 powyżej można zrealizować kierując korespondencję na adres SUNBENEFIT podany w komparycji Umowy lub drogą elektroniczną: bok@sunbenefit.pl. Administrator zrealizuje wskazane prawa, jeżeli nie będą istniały okoliczności uprawniające Administratora do ich przetwarzania o czym zostanie poinformowana osoba, której dane dotyczą.</li>
                        <li>Dane osobowe nie podlegają zautomatyzowanemu podejmowaniu decyzji, w tym profilowaniu oraz nie będą przekazywane poza EOG.</li>
                        <li>Podanie Danych osobowych jest dobrowolne, jednak niezbędne do realizacji w/w celu.</li>
                    </ol>
                </li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§10 ZMIANY UMOWY</h6>
            <ol>
                <li>Wszelkie zmiany oraz uzupełnienia Umowy, z zastrzeżeniem jej odrębnych postanowień, wymagają dla swej ważności formy pisemnej w postaci aneksu, pod rygorem nieważności.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§11 DANE KONTAKTOWE STRON</h6>
            <ol>
                <li>Strony wskazują następujące telefony i e-maile kontaktowe do wykonywania Umowy:
                    <ol>
                        <li>
                            <strong>SUNBENEFIT:</strong>
                            <p style="padding-left: 30px;">telefon:+48 33 5000 900 ; 33 496 99 11</p>
                            <p style="padding-left: 30px;">formularz kontaktowy na stronie www.sunbenefit.pl</p>
                        </li>
                        <li>
                            <strong>Klient:</strong>
                            <p style="padding-left: 30px;">telefon: {{ $calculation->phone }}</p>
                            <p style="padding-left: 30px;">e-mail: {{ $calculation->email }}</p>
                        </li>
                    </ol>
                </li>
                <li>W kwestiach operacyjnych związanych z bieżącym wykonywaniem umowy Klient kontaktować się może również opiekunem handlowym
                    <ol>
                        <li>
                            <strong>Opiekun Handlowy:</strong>
                            <p style="padding-left: 30px;">telefon: {{ $calculation->user->phone }}</p>
                            <p style="padding-left: 30px;">e-mail: {{ $calculation->user->email }}</p>
                        </li>
                    </ol>
                </li>
                <li>W przypadku zmiany danych kontaktowych każda ze Stron zobowiązuje się poinformować drugą Stronę o aktualnych danych.</li>
            </ol>

            <h6 style="text-align: center; margin-bottom: 10px;">§12 POSTANOWIENIA KOŃCOWE</h6>
            <ol>
                <li>W sprawach nieuregulowanych w Umowie mają zastosowanie przepisy Ustawy z dnia 23 kwietnia 1964 r. Kodeks Cywilny.</li>
                <li>Właściwym do rozstrzygania sporów wynikłych na tle realizacji Umowy jest Sąd Powszechny właściwy rzeczowo i miejscowo dla siedziby SUNBENEFIT.</li>
                <li>Załączniki do Umowy stanowią jej integralną część, w przypadku rozbieżności pomiędzy treścią Umowy a treścią poszczególnych Załączników, Załącznik będzie miał znaczenie rozstrzygające.</li>
                <li>Umowę sporządzono w dwóch jednobrzmiących egzemplarzach po jednym dla każdej ze Stron.</li>
            </ol>

            <div style="margin-top:50px;">
                <p style="margin-bottom: 10px;"><strong>Lista Załączników:</strong></p>
                <p><strong>Załącznik nr 1</strong> Opis Techniczny Instalacji Fotowoltaicznej</p>
                <p><strong>Załącznik nr 2</strong> Arkusz ustaleń montażowych</p>
                <p><strong>Załącznik nr 3</strong> Wzór Protokołu Odbioru Końcowego Instalacji Fotowoltaicznej</p>
            </div>

            <div style="margin-top: 150px;">
                <table style="width: 100%" cellspacing="0">
                    <tr>
                        <td style="width: 20%; border-top:2px solid #000;">
                            <h6>Klient</h6>
                        </td>
                        <td style="width: 60%;">
                            
                        </td>
                        <td style="width: 20%; border-top:2px solid #000;">
                            <h6>SUNBENEFIT</h6>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
</body></html>