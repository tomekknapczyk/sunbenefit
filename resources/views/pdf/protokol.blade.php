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
            <h5 style="text-align: center; margin-bottom: 5px; margin-top: 10px;">Załącznik nr 3</h5>
            <h4 style="text-align: center; margin-bottom: 5px; margin-top: 20px;">„WZÓR”</h4>
            <h5 style="text-align: center; margin-bottom: 25px; margin-top: 40px;">PROTOKÓŁ ODBIORU<br>do Umowy Nr {{ $calculation->code }}</h5>
            <p style="margin-bottom: 10px">
                1. Dotyczy Umowy z dnia: {{ $calculation->created_at->format('d-m-Y') }}
            </p>
            <p style="margin-bottom: 10px">
                2. Klient: {{ $calculation->name }}
            </p>
            <p style="margin-bottom: 10px">
                3. Przedmiot odbioru Instalacja Fotowoltaiczna o mocy {{ $calculation->final_power }} kWp
            </p>
            <p style="margin-bottom: 10px">
                4. Adres miejsca Montażu: {{ $calculation->invest_address }}, {{ $calculation->invest_zip_code }} {{ $calculation->invest_city }}
            </p>
            <p style="margin-bottom: 10px">
                5. Strony niniejszym potwierdzają na podstawie dokumentów, oględzin miejsca Montażu oraz oględzin Instalacji Fotowoltaicznej, że:
            </p>
            <p style="padding-left: 10px;margin-bottom: 10px">a) Instalacja Fotowoltaiczna wykonana została przez SUNBENEFIT sposób zgodny z Umową oraz Opisem Technicznym;</p>
            <p style="padding-left: 10px;margin-bottom: 10px">b) SUNBENEFIT zrealizowała wszystkie obowiązki wynikające z Umowy;</p>
            <p style="padding-left: 10px;margin-bottom: 10px">c) Klient został przeszkolony z podstawowych zasad użytkowania Instalacji Fotowoltaicznej;</p>
            <p style="padding-left: 10px;margin-bottom: 10px">d) Klient dokonuje Obioru Końcowego zgodnie z warunkami opisanymi w Umowie.</p>
            </p>
            <p style="margin-bottom: 25px">
                6. Uwagi:
            </p>
            <hr style="margin-bottom: 25px">
            <hr style="margin-bottom: 25px">
            <hr style="margin-bottom: 25px">
            <p style="margin-bottom: 25px">
                Data sporządzenia:_____________________r.
            </p>
            <div style="margin-top: 100px;">
                <table style="width: 100%" cellspacing="0">
                    <tr>
                        <td style="width: 20%; border-top:2px solid #000;">
                            <p>W imieniu</p>
                            <h5>Klienta</h5>
                        </td>
                        <td style="width: 60%;">
                            
                        </td>
                        <td style="width: 20%; border-top:2px solid #000;">
                            <p>W imieniu</p>
                            <h5>SUNBENEFIT</h5>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
</body></html>