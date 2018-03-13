<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DHZ Zaalverhuur</title>
    <style>
        h3{
            margin-bottom: 0px;
        }
    </style>
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                   Huurovereenkomst
                    <small class="pull-right">{{ date('d/m/Y') }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div style="margin-bottom: 30px;">
            <div class="col-sm-6 invoice-col">
                <p>
                    <strong>Stichting De Heilige Zeug</strong><br>
                    Warmoesstraat 119-I<br>
                    1012 JA Amsterdam<br>
                    Tel: (020) 623 72 77<br>
                    www.zaalverhuur-amsterdam.nl<br>
                    info@zaalverhuur-amsterdam.nl
                </p>
            </div>
            <div style="position: absolute; float: right; top: 0; right: 0;">
                <img src="{{ asset('img/trans-dhz-logo@2x.png') }}" alt="">
            </div>
        </div>
        <!-- /.row -->

        <div class="col-xs-12" style="margin-bottom: 20px;">
            <h2 class="page-header">
                Ondertekenden
            </h2>
        </div>
        <p>
            Stichting De Heilige Zeug (DHZ) gevestigd aan Warmoesstraat 119-I/121, 1012 JA te Amsterdam,
            vertegenwoordigd door {{ Auth::user()->name }}
        </p>

        @if($contract->bussiness)
            <p>
               {{ $contract->name_representatieve }}
               {{ $contract->adres_representatieve }}
               {{ $contract->phone_representatieve }}
            </p>
        @else
            <p>
                {{ $contract->name }}<br>
                {{ $contract->adres }}<br>
                {{ $contract->phone}}
            </p>
        @endif

        <p>verder gezamenlijk te noemen als (<b>Partijen</b>)</p>
        <hr>
        <h2 class="page-header">
            Verklaren het volgende:
        </h2>

        <div>
            <h3>Artikel 1. Kosten</h3>
            <ol>
                <li>Op {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contract->from)->format('d-m-Y') }}, van {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contract->from)->format('H:i') }} uur tot {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contract->till)->format('H:i') }} uur stelt DHZ aan Huurder Locatie beschikbaar voor een
                    besloten feest van maximaal {{ $contract->guests }} personen. Huurder wenst Locatie vanaf {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contract->decorationtime)->format('H:i') }} uur te versieren.
                </li>
                <li>Huurder voldoet uiterlijk zeven dagen voor het evenement aan DHZ de volgende bedragen:
                    <ol>
                        <li>Zaalhuur/schoonmaakkosten: EUR 175,00.
                            <ol>
                                @if($contract->rent_sound != 0)
                                    <li>&euro;{{ $contract->rent_sound }} voor de huur van de geluidsinstallatie</li>
                                @endif
                                @if($contract->rent_dj != 0)
                                    <li>&euro;{{ $contract->rent_dj }} voor de huur van een DJ</li>
                                @endif
                                @if($contract->rent_dj_afterhours != 0)
                                    <li>&euro;{{ $contract->rent_dj_afterhours }}  nadat de DJ 4uur heeft gedraaid zal dit bedrag per uur oplopen</li>
                                @endif
                                @if($contract->rent_pioneer_cd != 0)
                                    <li>&euro;{{ $contract->rent_pioneer_cd }} voor de huur van twee Pioneer CDJ-850 CD spelers met USB ingang </li>
                                @endif
                                @if($contract->smokemachine != 0)
                                    <li>&euro;{{ $contract->smokemachine }} voor de huur van een Rookmachine </li>
                                @endif
                                @if($contract->lasermachine != 0)
                                    <li>&euro;{{ $contract->lasermachine }} voor de huur van Lasermachine </li>
                                @endif
                                @if($contract->beamer != 0)
                                    <li>&euro;{{ $contract->beamer }} voor de huur van een Beamer + scherm </li>
                                @endif
                                @if($contract->standuptables != 0)
                                    <li>&euro;{{ $contract->standuptables }} voor de huur van Statafels </li>
                                @endif
                                @if($contract->stage_parts != 0)
                                    <li>&euro;{{ $contract->stage_parts }} voor de huur van de Podiumdelen </li>
                                @endif
                                @if($contract->furniture != 0)
                                    <li>&euro;{{ $contract->furniture }} voor de huur van Tafels en banken</li>
                                @endif

                                @if($contract->buyin_coins != 0)
                                    <li>&euro;{{ $contract->buyin_coins }} voor het afkopen van munten (&euro;{{ $contract->coin_price }} per stuk, {{ $contract->buyin_coins/$contract->coin_price }} munten).</li>
                                @endif

                                @if($contract->buyin_liqour != 0)
                                    <li>&euro;{{ $contract->buyin_liqour }} voor het afkopen van drank, gebasseerd op {{ $contract->guests }} personen. Indien meer dan {{ $contract->guests }} personen aanwezig blijken te zijn, dient de huurder per persoon aanwezig meer &euro;30 bij te betalen aan Verhuurder.
                                    Indien minder dan 55 personen aanwezig blijken te zijn, dient Verhuurder per persoon minder &euro;30 terug te betalen aan Huurder.
                                    </li>
                                @endif

                                <li> Voor overziene schade dient Huurder een borg te betalen van &euro;{{ $contract->deposit }} de borg wordt geretourneerd, mits er geen schade aan de zaal is toegebracht en de minimale omzet is behaald</li>
                            </ol>
                        </li>
                        <li>Voor onvoorziene schade dient Huurder een borg te betalen van &euro;{{ $contract->deposit }}. De borg wordt
                            geretourneerd, mits er geen schade aan de zaal is toegebracht en de minimale omzet is behaald.</li>
                    </ol>
                </li>
            </ol>
        </div>

        <div>
            <h3>Artikel 2. Totale kosten</h3>
            De totale kosten betreffen &euro;{{ $contract->cost }} Op dit artikel is de borg uitgezonderd.
        </div>

        <div>
            <h3>Artikel 3. Betaling</h3>
            <ol>
                <li>
                    Het totale bedrag, betreffende de totale kosten en de borg, dient uiterlijk zeven dagen voor de aanvang
                    van het feest te worden voldaan.
                </li>
                <li>
                    Het voornoemde bedrag kan zowel contant worden betaald op ons kantoor te Warmoesstraat 119-I, als
                    worden overgemaakt op rekeningnummer NL75 RABO 0393685039 EUR t.n.v. Stichting De Heilige
                    Zeug o.v.v. naam Huurder.
                </li>
                <li>
                    De borg wordt na het evenement overgemaakt naar de rekening van Huurder mits er geen schade is
                    geleden, zoals beschreven in artikel 12.1 van de algemene voorwaarden.
                </li>
                <li>
                    Indien er afgekochte munten overblijven, wordt dit bedrag geretourneerd naar de rekening van
                    Huurder.
                </li>
                <li>
                    Drank kan vooraf door Huurder worden afgekocht. Achteraf betalen van drank is niet mogelijk.
                </li>
            </ol>
        </div>

        <div>
            <h3>Artikel 4. Omzet</h3>
            De totale kosten betreffen EUR 310,00. Op dit artikel is de borg uitgezonderd.
        </div>

        <div>
            <h3>Artikel 4. Omzet</h3>
            De minimaal te behalen omzet bedraagt &euro{{ $contract->min_bar_revenue }}. Indien de minimale besteding niet reikt tot dit bedrag,
            zal dit bedrag worden aangevuld uit de borg tot het bedrag van de minimale omzet. Indien de borg niet
            toereikend is om de minimale besteding te behalen, zal de Huurder het restant moeten betalen.
        </div>

        <div>
            <h3>Artikel 5. Drankprijzen</h3>
            Huurder is ermee bekend dat door DHZ drank wordt geleverd tegen de volgende uitschenkprijzen:
            <ul>
                <li>Bier: &euro; 2,00</li>
                <li>Fris: &euro; 2,00</li>
                <li>Wijn: &euro; 2,00</li>
                <li>Binnenlands gedistilleerd: &euro; 3,00</li>
                <li>Buitenlands gedistilleerd: &euro; 3,00</li>
                <li>Red Bull:: &euro; 3,50</li>
            </ul>
        </div>

        <div>
            <h3>Artikel 6. Algemene voorwaarden</h3>
            De algemene voorwaarden van DHZ zijn op deze overeenkomst van toepassing. Door ondertekening van
            deze overeenkomst verklaart Huurder op de hoogte te zijn van deze algemene voorwaarden en deze te
            aanvaarden.
        </div>

        <div>
            <h3>Artikel 7. Annuleren en aansprakelijkheid</h3>
            DHZ kan niet aansprakelijk worden gesteld voor vermiste of beschadigde eigendommen in de zaal en bij de
            (bemande) garderobe. Voor ons verdere beleid omtrent annulering en aansprakelijkheid verwijzen wij
            Huurder naar de algemene voorwaarden.
        </div>

        <div>
            <h3>Artikel 8. Roken</h3>
            Roken is in ons pand verboden met uitzondering van de rookruimte. De Verhuurder behoudt zich het recht
            voor een deel van de borg in te houden indien er een overtreding wordt geconstateerd betreffende het
            rookbeleid. Voor ons verdere beleid omtrent roken verwijzen wij Huurder naar de algemene voorwaarden.
        </div>

        <p>Aldus overeengekomen en in tweevoud opgemaakt en getekend te Amsterdam,</p>

        <p>{{ date('d-m-Y') }}</p>
        <div style="width: 600px;">
            <div style="float:left; overflow: hidden; margin-right: 10px;">
                Hantekening DHZ: <br>
                {{ Auth::user()->name }}
            </div>
            <div style="float: right; overflow: hidden;">
                Hantekening Huurder: <br>
                {{ $contract->name }}
            </div>
        </div>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
