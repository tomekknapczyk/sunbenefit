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
            <h5 style="text-align: center; margin-bottom: 5px; margin-top: 10px;">Załącznik nr 2</h5>
            <p style="margin-bottom: 10px">
                <strong>Imię i nazwisko przedstawiciela:</strong> {{ $calculation->user->name }} {{ $calculation->user->lastname }}
            </p>
            <p style="margin-bottom: 10px">
                <strong>Telefon:</strong> {{ $calculation->user->phone }} <strong>Email:</strong> {{ $calculation->user->email }}
            </p>
            <h4 style="text-align: center; margin-bottom: 5px;">Arkusz ustaleń montażowych pod instalację fotowoltaiczną</h4>

            <div style="background: #ddd; margin-top:10px">
                <h3 style="margin: 0; background: #000; color: #fff; padding: 10px;">Inwestor</h3>
                <div style="padding: 10px;">
                    <p style="margin-bottom: 10px"><strong>Imię i nazwisko / Nazwa firmy:</strong> {{ $calculation->name }}</p>
                    <p style="margin-bottom: 10px"><strong>Adres zamieszkania / Adres siedziby firmy:</strong> {{ $calculation->address }}</p>
                    <p style="margin-bottom: 10px"><strong>Kod pocztowy:</strong> {{ $calculation->zip_code }}</p>
                    <p style="margin-bottom: 10px"><strong>Miejscowość:</strong> {{ $calculation->city }}</p>
                    <p style="margin-bottom: 10px"><strong>Telefon:</strong> {{ $calculation->phone }}</p>
                    <p style="margin-bottom: 10px"><strong>Email:</strong> {{ $calculation->email }}</p>
                </div>
            </div>

            <div style="margin-top: 40px;">
                <table style="width: 100%" cellspacing="0" class="border-table">
                    <tr><td style="width: 40%"><strong>Lokalizacja instalacji</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->location)
                                @foreach($calculation->aum->location as $key => $location)
                                    @if($key == 4 && $location)
                                        <p>Działka, numer i obręb: {{ $location }}</p>
                                    @elseif($key == 5 && $location)
                                        <p>Inny rodzaj budynku: {{ $location }}</p>
                                    @else
                                        <p>{{ $location }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Azymut</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->azimuth }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Status nieruchomości</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->status)
                                @foreach($calculation->aum->status as $status)
                                    <p>{{ $status }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Poszycie dachu</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->roof)
                                @foreach($calculation->aum->roof as $key => $roof)
                                    @if($key == 11 && $roof)
                                        <p>Blacha trapezowa - rozstaw trapezu: {{ $roof }}</p>
                                    @elseif($key == 12 && $roof)
                                        <p>Inne: {{ $roof }}</p>
                                    @else
                                        <p>{{ $roof }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Producent poszycia dachu</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->roofManufacturer }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Poszycie dachu dodatkowe uwagi</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->rootAdditionalNotes }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Konstrukcja dachu</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->construction)
                                @foreach($calculation->aum->construction as $key => $construction)
                                    @if($key == 3 && $construction)
                                        <p>Inna: {{ $construction }}</p>
                                    @else
                                        <p>{{ $construction }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Materiał</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->constructionMaterial)
                                @foreach($calculation->aum->constructionMaterial as $key => $constructionMaterial)
                                    @if($key == 4 && $constructionMaterial)
                                        <p>Inny: {{ $constructionMaterial }}</p>
                                    @else
                                        <p>{{ $constructionMaterial }}</p>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Rodzaj konstrukcji na gruncie:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->constructionGround)
                                @foreach($calculation->aum->constructionGround as $constructionGround)
                                    <p>{{ $constructionGround }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Konstrukcja dachu dodatkowe uwagi</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->constructionAdditionalNotes }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Wysokość budynku [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingHeight }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Wysokość do okapu [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingHeight2 }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Długość dachu [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingRoofLength }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Długość krawędzi dachu [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingRoofLength2 }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Długość grzbietu [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingTopLength }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Kąt pochylenia dachu [˚]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingRoofAngle }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Długość [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingLength }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Szerokość [m]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->buildingWidth }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Typ dachu:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->roofType)
                                @foreach($calculation->aum->roofType as $roofType)
                                    <p>{{ $roofType }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Numer licznika 1:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->counterNr }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Lokalizacja skrzynki z licznikiem:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->counterLocation }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Numer PPE 1:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->ppe1 }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Rodzaj konstrukcji montażowej na dachu płaskim:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->constructionRoofType)
                                @foreach($calculation->aum->constructionRoofType as $constructionRoofType)
                                    <p>{{ $constructionRoofType }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Informacje o gruncie:</strong></td>
                        <td style="width: 60%;">
                            <p>Długość [m]:{{ $calculation->aum->groundWidth }}</p>
                            <p>Szerokość [m]:{{ $calculation->aum->groundLength }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Wymagany przekop:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->piercing?'Tak':'Nie' }}</p>
                            <p>Długość przekopu [m]:{{ $calculation->aum->piercingLength }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Informacje o gruncie dodatkowe uwagi</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->groundAdditionalNotes }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Obecne przyłączenie do sieci:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->connection)
                                @foreach($calculation->aum->connection as $connection)
                                    <p>{{ $connection }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Rodzaje przyłącza:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->connectionType)
                                @foreach($calculation->aum->connectionType as $connectionType)
                                    <p>{{ $connectionType }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Obecna moc przyłączeniowa:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->connectionPower }} kW</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Instalacja fotowoltaiczna:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->pvType)
                                @foreach($calculation->aum->pvType as $pvType)
                                    <p>{{ $pvType }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Zabezpieczenie przeciwprzepięciowe po stronie AC:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->protection?'Tak':'Nie' }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Bezpieczniki przy liczniku głównym:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->fuse }} A</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Instalacja odgromowa:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->lightning?'Tak':'Nie' }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Przyłącze dodatkowe uwagi</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->connectionAdditionalNotes }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Izolacja dachu:</strong></td>
                        <td style="width: 60%;">
                            @if($calculation->aum->insulation)
                                @foreach($calculation->aum->insulation as $insulation)
                                    <p>{{ $insulation }}</p>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Grubość izolacji [mm]:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->insulationSize }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Panele fotowoltaiczne</strong></td>
                        <td style="width: 60%;">
                            <p>Wskazanie pożądanej mocy: {{ $calculation->aum->pvPower }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Inwertery</strong></td>
                        <td style="width: 60%;">
                            <p>Miejsce montażu: {{ $calculation->aum->inverter }}</p>
                            <p>Dodatkowe uwagi: {{ $calculation->aum->inverterAdditionalNotes }}</p>
                        </td>
                    </tr>
                    <tr><td style="width: 40%"><strong>Dodatkowe materiały:</strong></td>
                        <td style="width: 60%;">
                            <p>{{ $calculation->aum->additionalNotes }}</p>
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 80px;">
                <table style="width: 100%" cellspacing="0">
                    <tr>
                        <td style="width: 20%; border-top:1px dotted #000;">
                            <p>Data i miejsce</p>
                        </td>
                        <td style="width: 60%;">
                            
                        </td>
                        <td style="width: 20%; border-top:1px dotted #000;">
                            <p>Czytelny podpis</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
</body></html>