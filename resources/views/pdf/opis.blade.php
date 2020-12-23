<!DOCTYPE html>
<html lang="pl"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        @page { margin: 110px 50px 130px; }
        header { position: fixed; top: -85px; left: 0px; right: 0px;}
        footer { position: fixed; bottom: -40px; left: 0px; right: 0px; }
        footer .pagenum:before {content: counter(page);}
        html {font-size: 12px;}
        body {font-family: DejaVu Sans;font-weight: 400;color: #000;padding: 0;margin: 0;font-size: 1rem;width: 100%;}
        

        .bg-green{background: #3AB558;}
        .text-green{color: #3AB558;}
        .text-white{color: #fff;}

        ol { counter-reset: item; padding-left: 25px;}
        li{ display: block; margin-top: 2px; }
        li:before { content: counters(item, ".") ". "; counter-increment: item;}

        .border-table td{border: 1px solid #000;}

        h1{font-size: 24px;line-height: 1;}

        h2{font-size: 20px;line-height: 1;}

        h3{font-size: 18px;line-height: 1;}

        h4{font-size: 16px;line-height: 1;}

        h5{font-size: 14px;line-height: 1;}

        h6{font-size: 12px;line-height: 1;}

        p{line-height: 1.25;margin: 0 0 2px;}

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
            <h5 style="text-align: center; margin-bottom: 5px; margin-top: 10px;">Załącznik nr 1</h5>
            <h4 style="text-align: center; margin-bottom: 5px; margin-top: 20px;">OPIS TECHNICZNY INSTALACJI FOTOWOLTAICZNEJ</h4>
            <p style="margin-bottom: 10px">
                1. Instalacja fotowoltaiczna o mocy: <strong>{{ $calculation->final_power }}</strong> kWp składająca się z: 
            </p>

            @php
                $i = 1;   
            @endphp

            <table style="width: 100%;margin-top:20px" cellspacing="0" class="border-table">
                <tr>
                    <td style="width: 10%;">
                        <strong>LP.</strong>
                    </td>
                    <td style="width: 75%;">
                        <strong>Nazwa produktu</strong>
                    </td>
                    <td style="width: 15%;">
                        <strong>Liczba szt.:</strong>
                    </td>
                </tr>
                <tr>
                    <td>{{ $i++ }})</td>
                    <td><strong>Panele fotowoltaiczne:</strong> {{ $calculation->module_name }} <strong>Moc</strong> {{ $calculation->module_power }} W</td>
                    <td>{{ $calculation->module_qty }}</td>
                </tr>
                <tr>
                    <td>{{ $i++ }})</td>
                    <td><strong>Falownik:</strong></td>
                    <td>1</td>
                </tr>
                
                {{-- surcharges --}}

                <tr>
                    <td>{{ $i++ }})</td>
                    <td><strong>Dokumentacja: Schemat, wniosek:</strong></td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>{{ $i++ }})</td>
                    <td><strong>Inne (wymienić):</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $i++ }})</td>
                    <td><strong>Sposób finansowania:</strong> {{ $calculation->financing_method }}</td>
                    <td></td>
                </tr>
            </table>

            <p style="margin: 20px 0 10px">
                2. W przypadku gdy z przyczyn leżących po Stronie producenta sprzętu/urządzeń, brak będzie możliwości Montażu Instalacji Fotowoltaicznej, z wykorzystaniem sprzętu/urządzeń wskazanych w pkt 1 powyżej, SUNBENEFIT niezwłocznie poinformuje o tym Klienta oraz zobowiązana jest zapewnić realizację Montażu Instalacji Fotowoltaicznej z wykorzystaniem sprzętu/urządzeń pochodzących od innego producenta, którego <strong>jakość oraz parametry techniczne będą takie same lub lepsze niż jakość oraz parametry techniczne sprzętu/urządzeń wskazanych w pkt 1 powyżej.</strong> Zmiana, o której mowa w zdaniu poprzednim, w przypadku spełnienia warunków w nim opisanych nie będzie przez Strony traktowana jako zmiana Umowy, oraz <strong>nie będzie stanowić podstawy do żądania przez SUNBENEFIT od Klienta jakiegokolwiek dodatkowego wynagrodzenia wyższego niż Wynagrodzenie ustalone przez Strony w treści Umowy.</strong>
            </p>

            <div style="margin-top: 150px;">
                <table style="width: 100%" cellspacing="0">
                    <tr>
                        <td style="width: 55%; border-top:2px solid #000;">
                            <h6>Data / Podpis Klienta</h6>
                        </td>
                        <td style="width: 45%;">
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
</body></html>