<?php

// Namespacing.
namespace Database\Seeders\Menu;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Page;

// Enums
use App\Enums\PublishedState;

class StandAloneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'page_title' => 'Disclaimer',
                'menu_title' => 'Disclaimer',
                'slug' => '/disclaimer',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '
                <p>Toegang tot en gebruik van de <strong>Pixeltijgers</strong> internetsite <strong>www.pixeltijgers.nl</strong> (hierna “site”) zijn onderworpen aan onderstaande voorwaarden, tenzij anders bepaald in aanvullende voorwaarden in betreffende applicatie of ander gedeelte van de site gesteld. Gebruik van deze site betekent de volledige aanvaarding van deze voorwaarden en aanvullende voorwaarden gesteld in de applicaties en andere delen van de site.</p>

                <p>1. Deze site en de informatie, namen, beelden, afbeeldingen, logo’s en iconen betreffende of verband houdend met <strong>Pixeltijgers</strong> of haar producten en diensten worden verstrekt “zoals zij zijn” zonder enige verklaring of bevestiging en zonder enigerlei garantie, al dan niet expliciet of impliciet, met inbegrip van, echter niet beperkt tot, de impliciete garantie van verhandelbaarheid, geschiktheid voor een bepaald doel of geen inbreuk vormend. De informatie die op deze site aangeboden wordt, is niet geschreven om aan uw persoonlijke behoeften te voldoen en u bent degene die ervoor verantwoordelijk is uzelf ervan te vergewissen of deze informatie voor uw doel geschikt is voordat u er gebruik van maakt.</p>

                <p>2. <strong>Pixeltijgers</strong> noch een van haar contractpartijen of werknemers is aansprakelijk voor enige schade van welke aard dan ook, met inbegrip van directe, bijzondere door de rechter toegewezen, indirecte of gevolgschade, die voortvloeit uit of in verband met de toegang tot of het gebruik van deze site of het gebruik en verspreiding van informatie die op deze site aanwezig is.</p>

                <p>3. Deze site kan onjuistheden of typefouten bevatten, die na de ontdekking ervan door <strong>Pixeltijgers</strong> gecorrigeerd zullen worden naar <strong>Pixeltijgers</strong>’ goeddunken. Ook wordt de informatie op deze site regelmatig bijgewerkt. <strong>Pixeltijgers</strong> behoudt zich het recht voor te allen tijde en zonder vooraankondiging wijzigingen, verbeteringen en/of veranderingen aan te brengen in de informatie, deze voorwaarden, namen, beelden, afbeeldingen, logo’s en iconen of de producten en diensten, waarnaar op deze site verwezen wordt. Aangezien Internet onafhankelijk in stand wordt gehouden op duizenden sites overal ter wereld, is het mogelijk dat de informatie, namen, beelden, afbeeldingen, logo’s en iconen waartoe deze site toegang verleent afkomstig zijn van buiten de grenzen van deze site. Om deze reden sluit <strong>Pixeltijgers</strong> alle verplichtingen of verantwoordelijkheid uit inzake de gegevens die hetzij verkregen of verworven worden, hetzij toegankelijk zijn binnen, via of buiten deze site.</p>

                <p>4. De handelsmerken, handelsnamen, beelden, logo’s en afbeeldingen die de producten en diensten van <strong>Pixeltijgers</strong> herkenbaar maken, alsmede het ontwerp, tekst en grafische mogelijkheden van de website zijn het eigendom van <strong>Pixeltijgers</strong>. Tenzij dit uitdrukkelijk is bepaald, zal niets van hetgeen hierin is vervat, worden uitgelegd als het verlenen van een licentie of recht uit hoofde van het auteursrecht of enig ander intellectueel eigendomsrecht van <strong>Pixeltijgers</strong>.</p>

                <p>5. De op deze site genoemde producten en diensten zijn te allen tijde onderworpen aan de <a href="'. url('/algemene-voorwaarden'). '">algemene voorwaarden</a>.</p>

                <p>6. Alhoewel <strong>Pixeltijgers</strong> al het redelijkerwijs mogelijke in het werk stelt om deze site virusvrij te houden, kan zij hiervoor geen garantie geven en aansprakelijkheid voor virussen is uitgesloten. U wordt daarom geadviseerd alle op het Internet algemeen gangbare en mogelijke veiligheidsmaatregelen te nemen voordat u informatie van deze site ophaalt.</p>',

                'meta_title' => 'Disclaimer',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Disclaimer',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/disclaimer',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Algemene voorwaarden',
                'menu_title' => 'Algemene voorwaarden',
                'slug' => '/algemene-voorwaarden',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '
                <h3>Contactgegevens</h3>
                <ul>
                    <li><span>E-mail:</span> <a href="mailto:info@pixeltijgers.nl">info@pixeltijgers.nl</a></li>
                    <li><span>Website:</span> <a href="www.pixeltijgers.nl">www.pixeltijgers.nl</a></li>
                </ul>
                <h3>Definities</h3>
                    <ol>
                        <li><span>Pixeltijgers:</span> Pixeltijgers, gevestigd te Sas van Gent onder KvK nr. 80856772</li>
                        <li><span>Klant:</span> Degene met wie Pixeltijgers een overeenkomst is aangegaan</li>
                        <li><span>Partijen:</span> Pixeltijgers klant samen</li>
                        <li><span>Consument:</span> Een klant die tevens een individu is en die als privépersoon handelt</li>
                    </ol>
                <h3>Toepasselijkheid algemene voorwaarden</h3>
                <ol>
                	<li>
                	Deze voorwaarden zijn van toepassing op alle offertes, aanbiedingen, werkzaamheden, bestellingen, overeenkomsten en leveringen van diensten of producten door of namens Pixeltijgers.
                	</li>
                	<li>
                	Partijen kunnen alleen afwijken van deze voorwaarden als zij dat uitdrukkelijk en schriftelijk zijn overeengekomen.
                	</li>
                	<li>
                	Partijen sluiten de toepasselijkheid van aanvullende en/of afwijkende algemene voorwaarden van de klant of van derden uitdrukkelijk uit.
                	</li>
                </ol>
                <h3>Aanbiedingen en offertes</h3>
                <ol>
                	<li>
                	Aanbiedingen en offertes van Pixeltijgers zijn vrijblijvend, tenzij daarin uitdrukkelijk anders vermeld.
                	</li>
                	<li>
                	Een aanbod of offerte is maximaal 1 maand geldig, tenzij een andere aanvaardingstermijn in het aanbod of de offerte staat vermeld.
                	</li>
                	<li>
                	Als de klant een aanbod of offerte niet binnen de geldende termijn aanvaardt, dan vervalt het aanbod of de offerte.
                	</li>
                	<li>
                	Aanbiedingen en offertes gelden niet voor nabestellingen, tenzij partijen dit uitdrukkelijk en schriftelijk zijn overeengekomen.
                	</li>
                </ol>
                <h3>Aanvaarding</h3>
                <ol>
                	<li>
                	Bij aanvaarding van een vrijblijvende offerte of aanbieding, behoudt Pixeltijgers zich het recht voor de offerte of het aanbod alsnog binnen 3 dagen na ontvangst van de aanvaarding in te trekken, zonder dat de klant hieraan enige rechten kan ontlenen.
                	</li>
                	<li>
                	Mondelinge aanvaarding van de klant verbindt Pixeltijgers slechts, nadat de klant deze schriftelijk (of elektronisch) heeft bevestigd.
                	</li>
                </ol>
                <h3>Prijzen</h3>
                <ol>
                	<li>
                	Alle prijzen die Pixeltijgers  hanteert zijn in euro’s, zijn btw en exclusief eventuele overige kosten zoals administratiekosten, heffingen en reis-, verzend- of transportkosten, tenzij uitdrukkelijk anders vermeld of anders overeengekomen.
                	</li>
                	<li>
                	Alle prijzen die Pixeltijgers  hanteert voor zijn diensten, op zijn website of die anderszins kenbaar zijn gemaakt, kan Pixeltijgers  te allen tijde wijzigen.
                	</li>
                	<li>
                	De prijs met betrekking tot een dienstverlening wordt door Pixeltijgers vastgesteld op grond van de werkelijk bestede uren.
                	</li>
                	<li>
                	De prijs wordt berekend volgens de gebruikelijke uurtarieven van Pixeltijgers, geldend voor de periode waarin hij de werkzaamheden verricht, tenzij een afwijkend uurtarief is overeengekomen.
                	</li>
                	<li>
                	Indien partijen voor een dienstverlening door Pixeltijgers een totaalbedrag zijn overeengekomen, is dit altijd een richtprijs, tenzij partijen uitdrukkelijk en schriftelijk een vaste prijs, waarvan niet kan worden afgeweken, zijn overeengekomen.
                	</li>
                	<li>
                	Pixeltijgers is gerechtigd om tot 10% van de richtprijs af te wijken.
                	</li>
                	<li>
                	Indien de richtprijs meer dan 10% hoger uit gaat vallen, dient Pixeltijgers de klant tijdig te laten weten waarom een hogere prijs gerechtvaardigd is.
                	</li>
                	<li>
                	Indien de richtprijs meer dan 10% hoger uit gaat vallen, heeft de klant het recht om het deel van de opdracht te laten vervallen, dat boven de richtprijs vermeerderd met 10% uitkomt.
                	</li>
                	<li>
                	Pixeltijgers heeft het recht de prijzen jaarlijks aan te passen.
                	</li>
                	<li>
                	Voorafgaand aan de ingang ervan zal Pixeltijgers prijsaanpassingen meedelen aan de klant.
                	</li>
                	<li>
                	De consument heeft het recht om de overeenkomst met Pixeltijgers op te zeggen indien hij niet akkoord gaat met de prijsverhoging.
                	</li>
                </ol>
                <h3>Betalingen en betalingstermijn</h3>
                <ol>
                	<li>
                	Pixeltijgers mag bij het aangaan van de overeenkomst een aanbetaling tot 15% van het overeengekomen bedrag verlangen.
                	</li>
                	<li>
                	De klant dient betalingen achteraf binnen 14 dagen na levering te hebben voldaan.
                	</li>
                	<li>
                	Betalingstermijnen worden beschouwd als fatale betalingstermijnen. Dat betekent dat indien de klant het overeengekomen bedrag niet uiterlijk op de laatste dag van de betalingstermijn heeft voldaan, hij van rechtswege in verzuim en in gebreke is, zonder dat Pixeltijgers de klant een aanmaning hoeft te sturen c.q. in gebreke hoeft te stellen.
                	</li>
                	<li>
                	Pixeltijgers behoudt zich het recht voor om een levering afhankelijk te stellen van onmiddellijke betaling dan wel een zekerheidstelling te eisen voor het totale bedrag van de diensten of producten.
                	</li>
                </ol>
                <h3>Gevolgen niet tijdig betalen</h3>
                <ol>
                	<li>
                	Betaalt de klant niet binnen de overeengekomen termijn, dan is Pixeltijgers  gerechtigd de wettelijke rente van 2% per maand voorniet-handelstransacties en de wettelijke rente van 8% per maand voor handelstransacties in rekening te brengen vanaf de dag dat de klant in verzuim is, waarbij een gedeelte van een maand voor een hele maand wordt gerekend.
                	</li>
                	<li>
                	Wanneer de klant in verzuim is, is hij bovendien buitengerechtelijke incassokosten en eventuele schadevergoeding verschuldigd aan Pixeltijgers.
                	</li>
                	<li>
                	De incassokosten worden berekend aan de hand van het besluit vergoeding voor buitengerechtelijke incassokosten.
                	</li>
                	<li>
                	Wanneer de klant niet tijdig betaalt, mag Pixeltijgers zijn verplichtingen opschorten totdat de klant aan zijn betalingsverplichting heeft voldaan.
                	</li>
                	<li>
                	In geval van liquidatie, faillissement, beslag of surseance van betaling aan de zijde van de klant, zijn de vorderingen van Pixeltijgers op de klant onmiddellijk opeisbaar.
                	</li>
                	<li>
                	Weigert de klant zijn medewerking aan de uitvoering van de overeenkomst door Pixeltijgers, dan is hij nog steeds verplicht de afgesproken prijs aan Pixeltijgers te betalen.
                	</li>
                </ol>
                <h3>Opschortingsrecht</h3>
                <p>Tenzij de klant een consument is, doet de klant afstand van het recht om de nakoming van enige uit deze overeenkomst voortvloeiende verbintenis op te schorten.</p>
                <h3>Verrekening</h3>
                <p>Tenzij de klant een consument is, doet de klant afstand van zijn recht om een schuld aan Pixeltijgers  te verrekenen met een vordering op Pixeltijgers.</p>
                <h3>Verzekering</h3>
                <ol>
                	<li>
                	De klant verplicht zich de volgende zaken voldoende te verzekeren en verzekerd te houden tegen onder andere brand, ontploffings- en waterschade evenals diefstal:

                	<ul>
                		<li>
                		Geleverde zaken die noodzakelijk zijn voor de uitvoering van de onderliggende overeenkomst.
                		</li>
                		<li>
                		Zaken van Pixeltijgers die bij de klant aanwezig zijn.
                		</li>
                		<li>
                		Zaken die onder eigendomsvoorbehoud zijn geleverd.
                		</li>
                	</ul>
                	</li>
                	<li>
                	De klant geeft op eerste verzoek van Pixeltijgers de polis van deze verzekeringen ter inzage.
                	</li>
                </ol>
                <h3>Garantie</h3>
                <p>Wanneer partijen een overeenkomst met een dienstverlenend karakter zijn aangegaan, bevat deze voor Pixeltijgers enkel een inspanningsverplichtingen dus geen resultaatsverplichting.</p>
                <h3>Uitvoering van de overeenkomst</h3>
                <ol>
                	<li>
                	Pixeltijgers  voert de overeenkomst naar beste inzicht en vermogen en overeenkomstig de eisen van goed vakmanschap uit.
                	</li>
                	<li>
                	Pixeltijgers  heeft het recht om de overeengekomen dienstverlening (gedeeltelijk) te laten verrichten door derden.
                	</li>
                	<li>
                	De uitvoering van de overeenkomst geschiedt in onderling overleg en na schriftelijk akkoord en betaling van het eventueel afgesproken voorschot door de klant.
                	</li>
                	<li>
                	Het is de verantwoordelijkheid van de klant dat Pixeltijgers tijdig kan beginnen aan de uitvoering van de overeenkomst.
                	</li>
                	<li>
                	Indien de klant er niet voor heeft gezorgd dat Pixeltijgers tijdig kan beginnen aan de uitvoering van de overeenkomst, komen de daaruit voortvloeiende extra kosten en/of extra uren voor rekening van de klant.
                	</li>
                </ol>
                <h3>Informatieverstrekking door de klant</h3>
                <ol>
                	<li>
                	De klant stelt alle informatie, gegevens en bescheiden die relevant zijn voor de correcte uitvoering van de overeenkomst tijdig en in gewenste vorm en op gewenste wijze beschik­baar aan Pixeltijgers.
                	</li>
                	<li>
                	De klant staat in voor de juistheid, volledigheid en betrouwbaarheid van de ter beschikking gestelde informatie, gegevens en bescheiden, ook indien deze van derden afkomstig zijn, voor zover uit de aard van de overeenkomst niet anders voortvloeit.
                	</li>
                	<li>
                	Indien en voor zover de klant dit verzoekt, retourneert Pixeltijgers de betreffende bescheiden.
                	</li>
                	<li>
                	Stelt de klant niet, niet tijdig of niet behoorlijk de door Pixeltijgers redelijkerwijs verlangde informatie, gegevens of bescheiden beschikbaar en loopt de uitvoering van de overeenkomst hierdoor vertraging op, dan komen de daaruit voortvloeiende extra kosten en extra uren voor rekening van de klant.
                	</li>
                </ol>
                <h3>Duur van de overeenkomst betreffende een dienst</h3>
                <ol>
                	<li>
                	De overeenkomst tussen Pixeltijgers  en de klant betreffende een dienst of diensten wordt aangegaan voor de duur van 1jaar, tenzij uit de aard van de overeenkomst iets anders voortvloeit of partijen uitdrukkelijk en schriftelijk anders zijn overeengekomen.
                	</li>
                	<li>
                	Na afloop van de termijn genoemd in lid 1 van dit artikel wordt de overeenkomst stilzwijgend omgezet in een overeenkomst voor onbepaalde tijd, tenzij 1 van de partijen de overeenkomst opzegt met inachtneming van een opzegtermijn van 2 maanden, c.q. een consument de overeenkomst opzegt met inachtneming van een opzegtermijn van 1 (één) maand, waardoorde overeenkomst van rechtswege eindigt.
                	</li>
                	<li>
                	Zijn partijen binnen de looptijd van de overeenkomst voor de voltooiing van bepaalde werk­zaamheden een termijn overeengekomen, dan is dit nooit een fatale termijn. Bij over­schrijding van deze termijn moet de klant Pixeltijgers  schriftelijk in gebreke stellen.
                	</li>
                </ol>
                <h3>Opzeggen overeenkomst dienst voor bepaalde tijd</h3>
                <ol>
                	<li>
                	De klant of consument kan een overeenkomst betreffende een dienst die voor bepaalde tijd is aangegaan niet eerder dan na 1 (één) jaar opzeggen.
                	</li>
                	<li>
                	Na afloop van de minimum looptijd van 1 (één) jaar kan voornoemde overeenkomst opgezegd worden door deklant met inachtneming van een opzegtermijn van 3 maanden.
                	</li>
                	<li>
                	Na afloop van de minimum looptijd van 1 (één)jaar kan voornoemde overeenkomst opgezegd worden door een consument met inachtneming van een opzegtermijn van 1 (één) maand.
                	</li>
                	<li>
                	Indien de overeenkomst betreffende een dienstvoor minder dan 1 (één) jaar is aangegaan, dan is de overeenkomst tussentijds niet opzegbaar.
                	</li>
                </ol>
                <h3>Intellectueel eigendom</h3>
                <ol>
                	<li>
                	Pixeltijgers behoudt alle intellectuele eigendomsrechten (waaronder auteursrecht, octrooirecht, merkenrecht, tekeningen- en modellen­recht, etc.) op alle ontwerpen, tekeningen, geschriften, dragers met gegevens of andere informatie, offertes, afbeeldingen, schetsen, modellen, maquettes, etc., tenzij partijen schriftelijk anders zijn overeengekomen.
                	</li>
                	<li>
                	De klant mag genoemde intellectuele eigendomsrechten niet zonder voorafgaande schriftelijke toestemming van Pixeltijgers (laten) kopiëren, aan derden tonen en/of ter beschikking stellen of op andere wijze gebruiken.
                	</li>
                </ol>
                <h3>Geheimhouding</h3>
                <ol>
                	<li>
                	De klant houdt iedere informatie (in welke vorm dan ook) die hij van Pixeltijgers ontvangt geheim.
                	</li>
                	<li>
                	Hetzelfde geldt voor alle andere informatie betreffende Pixeltijgers waarvan de klant weet of redelijker­wijs kan vermoeden dat deze geheim of vertrouwelijk is, dan wel waarvan hij kan verwachten dat verspreiding ervan Pixeltijgers schade kan berokkenen.
                	</li>
                	<li>
                	De klant neemt alle nodige maatregelen om te waarborgen dat hij de in lid 1 en 2 genoemde informatie ook geheimhoudt.
                	</li>
                	<li>
                	De in dit artikel omschreven geheimhoudingsplicht geldt niet voor informatie:
                	<ul>
                		<li>
                		Die al openbaar was voordat de klant deze informatie vernam of die later openbaar is geworden zonder dat dit het gevolg was van een schending van de geheimhoudingsplicht van de klant.
                		</li>
                		<li>
                		Die door de klant openbaar gemaakt wordt op grond van een wettelijke plicht.
                		</li>
                	</ul>
                	</li>
                	<li>De in dit artikel omschreven geheimhoudingsplicht geldt voor de duur van de onderliggende overeenkomst en voor een periode van 3 jaar na afloop daarvan</li>
                </ol>
                <h3>Boetebeding</h3>
                <ol>
                	<li>
                	Indien de andere partij het artikel van deze algemene voorwaarden over geheimhouding of over intellectueel eigendom overtreedt, dan verbeurt hij voor elke overtreding ten behoeve van handelsnaam een onmiddellijk opeisbare boete.

                <ul>
                	<li>Is de andere partij een consument dan bedraagt deze boete € 1.000.</li>
                	<li>Is de andere partij een rechtspersoon dan bedraagt deze boete € 5.000.</li>
                </ul>
              </li>
                	<li>
                	Daarnaast verbeurt de andere partij een bedrag ad 5% van het in lid 1 genoemde bedrag voor elke dag dat die overtreding voortduurt.
                	</li>
                	<li>
                	Voor het verbeuren van deze boete is geen voorafgaande ingebrekestelling of gerechtelijke procedure nodig. Ook hoeft er geen sprake te zijn van enige vorm van schade.
                	</li>
                	<li>
                	Het verbeuren van de in het eerste lid van dit artikel bedoelde boete doet geen afbreuk aan de overige rechten van Pixeltijgers  waaronder zijn recht om naast de boete schadevergoeding te vorderen.
                	</li>
                </ol>
                <h3>Vrijwaring</h3>
                <p>De klant vrijwaart Pixeltijgers  tegen alle aanspraken van derden die verband houden met de door Pixeltijgers  geleverde producten en/of diensten. </p>
                <h3>Klachten</h3>
                <ol>
                    <li>
                	De klant dient een door Pixeltijgers  geleverd product of verleende dienst zo spoedig mogelijk te onderzoeken op eventuele tekortkomingen.
                	</li>
                	<li>
                	Beantwoordt een geleverd product of verleende dienst niet aan hetgeen de klant redelijkerwijs van de overeenkomst mocht verwachten, dan dient de klant Pixeltijgers  daarvan zo spoedig mogelijk, doch in ieder geval binnen 1 maand na constatering van de tekortkomingen, op de hoogte te stellen.
                	</li>
                	<li>
                	Consumenten dienen Pixeltijgers  uiterlijk binnen 2 maanden na constatering van de tekortkomingen hiervan op de hoogte te stellen.
                	</li>
                	<li>
                	De klant geeft daarbij een zo gedetailleerd mogelijke omschrijving van de tekort­koming, zodat Pixeltijgers in staat is hierop adequaat te reageren.
                	</li>
                	<li>
                	De klant dient aan te tonen dat de klacht betrekking heeft op een overeenkomst tussen partijen.
                	</li>
                	<li>
                	Indien een klacht betrekking heeft op lopende werkzaamheden, kan dit er in ieder geval niet toe leiden dat Pixeltijgers gehouden kan worden om andere werkzaamheden te verrichten dan zijn overeengekomen.
                	</li>
                </ol>
                <h3>Ingebrekestelling</h3>
                <ol>
                	<li>
                	De klant dient ingebrekestellingen schriftelijk kenbaar te maken aanPixeltijgers.
                	</li>
                	<li>
                	Het is de verantwoordelijkheid van de klant dat een ingebrekestelling Pixeltijgers ook daadwerkelijk (tijdig) bereikt.
                	</li>
                </ol>
                <h3>Hoofdelijke aansprakelijkheid klant</h3>
                <p>Als Pixeltijgers  een overeenkomst aangaat met meerdere klanten, is ieder van hen hoofdelijk aansprakelijk voor de volledige bedragen die zij op grond van die overeenkomst aan Pixeltijgers  verschuldigd zijn. </p>
                <h3>Aansprakelijkheid Pixeltijgers </h3>
                <ol>
                	<li>
                	Pixeltijgers is uitsluitend aansprakelijk voor enige schade die de klant lijdt indien en voor zover die schade is veroorzaakt door opzet of bewuste roekeloosheid.
                	</li>
                	<li>
                	Indien Pixeltijgers aansprakelijk is voor enige schade, is het slechts aansprakelijk voor directe schade die voortvloeit uit of verband houdt met de uitvoering van een overeenkomst.
                	</li>
                	<li>
                	Pixeltijgers is nooit aansprakelijk voor indirecte schade, zoals gevolgschade, gederfde winst, gemiste besparingen of schade aan derden.
                	</li>
                	<li>
                	Indien Pixeltijgers aansprakelijk is, is deze aansprakelijkheid beperkt tot het bedrag dat door een gesloten (beroeps)aansprakelijkheidsverzekering wordt uitbetaald en bij gebreke van (volledige) uitkering door een verzekeringsmaatschappij van het schadebedrag is de aansprakelijkheid beperkt tot het (gedeelte van het) factuurbedrag waarop de aansprakelijkheid betrekking heeft.
                	</li>
                	<li>
                	Alle afbeeldingen, foto’s, kleuren, tekeningen, omschrijvingen op de website of in een catalogus zijn slechts indicatief en gelden slechts bij benadering en kunnen geen aanleiding zijn tot schadevergoeding en/of (gedeeltelijke) ontbinding van de overeenkomst en/of opschorting van enige verplichting.
                	</li>
                </ol>
                <h3>Vervaltermijn</h3>
                <p>Elk recht van de klant op schadevergoeding van Pixeltijgers  vervalt in elk geval 12 maanden na de gebeurtenis waaruit de aansprakelijkheid direct of indirect voortvloeit. Hiermee wordt niet uitgesloten het bepaalde in artikel 6:89 van het Burgerlijk Wetboek. </p>
                <h3> Recht op ontbinding</h3>
                <ol>
                	<li>
                	De klant heeft het recht de overeenkomst te ontbinden wanneerPixeltijgers toerekenbaar tekortschiet in de nakoming van zijn verplichtingen, tenzij deze tekortkoming, gezien haar bijzondere aard of geringe betekenis, de ontbinding niet rechtvaardigt.
                	</li>
                	<li>
                	Is de nakoming van de verplichtingen door Pixeltijgers niet blijvend of tijdelijk onmogelijk, dan kan ontbinding pas plaatsvinden nadat Pixeltijgers in verzuim is.
                	</li>
                	<li>
                	Pixeltijgers heeft het recht de overeenkomst met de klant te ontbinden, indien de klant zijn verplichtingen uit de overeenkomst niet volledig of niet tijdig nakomt, dan wel indien Pixeltijgers kennisheeft genomen van omstandigheden die hem goede grond geven om te vrezen dat de klant zijn verplichtingen niet behoorlijk zal kunnen nakomen.
                	</li>
                </ol>
                <h3>Overmacht</h3>
                <ol>
                	<li>
                	In aanvulling op het bepaalde in artikel 6:75 Burgerlijk Wetboek geldt dat een tekortkoming van Pixeltijgers in de nakoming van enige verplichting ten aanzien van de klant niet aan Pixeltijgers kan worden toegerekend in een van de wil van Pixeltijgers onafhankelijke situatie, waardoor de nakoming van zijn verplichtingen ten aanzien van de klant geheel of gedeeltelijk wordt verhinderd of waardoor de nakoming van zijn verplichtingen in redelijk­heid niet van Pixeltijgers kan worden verlangd.
                	</li>
                	<li>
                	Tot de in lid 1 genoemde overmachtsituatie worden ook - doch niet uitsluitend - gerekend: noodtoestand (zoals burgeroorlog, opstand, rellen, natuurrampen, etc.); wanprestaties en overmacht van toeleveranciers, bezorgers of andere derden; onverwachte stroom-, elektriciteits- internet-, computer- en telecomstoringen; computer­virussen, stakingen, overheidsmaatregelen, onvoorziene vervoersproblemen, slechte weersomstandigheden en werkonderbrekingen.
                	</li>
                	<li>
                	Indien zich een overmachtsituatie voordoet waardoor Pixeltijgers 1 of meer verplichtingen naar de klant niet kan nakomen, dan worden die verplichtingen opgeschort totdat Pixeltijgers er weer aan kan voldoen.
                	</li>
                	<li>
                	Vanaf het moment dat een overmachtsituatie ten minste 30 kalenderdagen heeft geduurd, mogen beide partijen de overeenkomst schriftelijk geheel of gedeeltelijk ontbinden.
                	</li>
                	<li>
                	Pixeltijgers  is in een overmachtsituatie geen enkele (schade)vergoeding verschuldigd, ook niet als het als gevolg van de overmachttoestand enig voordeel geniet.
                	</li>
                </ol>
                <h3>Wijziging van de overeenkomst</h3>
                <ol>
                	<li >Indien na het afsluiten van de overeenkomst voor de uitvoering ervan het nodig blijkt om de inhoud ervan te wijzigen of aan te vullen, passen partijen tijdig en in onderling overleg de overeenkomst dienovereenkomstig aan.</li>
                	<li >Voorgaand lid is niet van toepassing bij producten die zijn afgenomen in een fysieke winkel.</li>
                </ol>
                <h3>Wijziging algemene voorwaarden</h3>
                <ol>
                	<li>
                	Pixeltijgers is gerechtigd deze algemene voorwaarden te wijzigen of aan te vullen.
                	</li>
                	<li>
                	Wijzigingen van ondergeschikt belang kunnen te allen tijde worden doorgevoerd.
                	</li>
                	<li>
                	Grote inhoudelijke wijzigingen zal Pixeltijgers zoveel mogelijk vooraf met de klant bespreken.
                	</li>
                	<li>
                	Consumenten zijn gerechtigd bij een wezenlijke wijziging van de algemene voorwaarden de overeenkomst op te zeggen.
                	</li>
                </ol>
                <h3>Overgang van rechten</h3>
                <ol>
                	<li>
                	Rechten van de klant uit een overeenkomst tussen partijen kunnen niet aan derden worden overgedragen zonder de voorafgaande schriftelijke instemming van Pixeltijgers.
                	</li>
                	<li>
                	Deze bepaling geldt als een beding met goederenrechtelijke werking zoals bedoeld in artikel 3:83, tweede lid, Burgerlijk Wetboek.
                	</li>
                </ol>
                <h3>Gevolgen nietigheid of vernietigbaarheid</h3>
                <ol>
                	<li>
                	Wanneer één of meerdere bepalingen van deze algemene voorwaarden nietig of vernietigbaar blijken, dan tast dit de overige bepalingen van deze voorwaarden niet aan.
                	</li>
                	<li>
                	Een bepaling die nietig of vernietigbaar is, wordt in dat geval vervangen door een bepaling die het dichtst in de buurt komt van wat Pixeltijgers bij het opstellen van de voorwaarden op dat punt voor ogen had.
                	</li>
                </ol>
                <h3>Toepasselijk recht en bevoegde rechter</h3>
                <ol>
                	<li>
                	Op iedere overeenkomst tussen partijen is uitsluitend het Nederlands recht van toepassing.
                	</li>
                	<li>
                	De Nederlandse rechter in het arrondissement waar Pixeltijgers is gevestigd / praktijk houdt / kantoor houdt is exclusief bevoegd om kennis te nemen van eventuele geschillen tussen partijen, tenzij de wet dwingend anders voorschrijft.
                	</li>
                </ol>
                <h4>Opgesteld op 01 juni 2022.</h4>

',

                'meta_title' => 'Algemene voorwaarden',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Algemene voorwaarden',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/algemene-voorwaarden',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Privacybeleid',
                'menu_title' => 'Privacybeleid',
                'slug' => '/privacybeleid',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '
                <p>Pixeltijgers geeft veel om uw privacy. Wij verwerken daarom uitsluitend gegevens die wij nodig hebben voor (het verbeteren van) onze dienstverlening en gaan zorgvuldig om met de informatie die wij over u en uw gebruik van onze diensten hebben verzameld. Wij stellen uw gegevens nooit voor commerciële doelstellingen ter beschikking aan derden.</p>
                <p>Dit privacybeleid is van toepassing op het gebruik van de website en de daarop ontsloten dienstverlening van Pixeltijgers. De ingangsdatum voor de geldigheid van deze voorwaarden is <strong>01/06/2022</strong>, met het publiceren van een nieuwe versie vervalt de geldigheid van alle voorgaande versies. Dit privacybeleid beschrijft welke gegevens over u door ons worden verzameld, waar deze gegevens voor worden gebruikt en met wie en onder welke voorwaarden deze gegevens eventueel met derden kunnen worden gedeeld. Ook leggen wij aan u uit op welke wijze wij uw gegevens opslaan en hoe wij uw gegevens tegen misbruik beschermen en welke rechten u heeft met betrekking tot de door u aan ons verstrekte persoonsgegevens.</p>
                <p>Als u vragen heeft over ons privacybeleid kunt u contact opnemen met onze contactpersoon voor privacyzaken, u vindt de contactgegevens aan het einde van ons privacybeleid.</p>
                <h2>Over de gegevensverwerking</h2>
                <p>Hieronder kunt u lezen op welke wijze wij uw gegevens verwerken, waar wij deze (laten) opslaan, welke beveiligingstechnieken wij gebruiken en voor wie de gegevens inzichtelijk zijn.</p>
                <h3>Doel van de gegevensverwerking</h3>
                <h4>Algemeen doel van de verwerking</h4>
                <p>Wij gebruiken uw gegevens uitsluitend ten behoeve van onze dienstverlening. Dat wil zeggen dat het doel van de verwerking altijd direct verband houdt met de opdracht die u verstrekt. Wij gebruiken uw gegevens niet voor (gerichte) marketing. Als u gegevens met ons deelt en wij gebruiken deze gegevens om &#8211; anders dan op uw verzoek &#8211; op een later moment contact met u op te nemen, vragen wij u hiervoor expliciet toestemming. Uw gegevens worden niet met derden gedeeld, anders dan om aan boekhoudkundige en overige administratieve verplichtingen te voldoen. Deze derden zijn allemaal tot geheimhouding gehouden op grond van de overeenkomst tussen hen en ons of een eed of wettelijke verplichting.</p>
                <h4>Automatisch verzamelde gegevens</h4>
                <p>Gegevens die automatisch worden verzameld door onze website worden verwerkt met het doel onze dienstverlening verder te verbeteren. Deze gegevens (bijvoorbeeld uw IP-adres, webbrowser en besturingssysteem) zijn geen persoonsgegevens.</p>
                <h4>Medewerking aan fiscaal en strafrechtelijk onderzoek</h4>
                <p>In voorkomende gevallen kan Pixeltijgers op grond van een wettelijke verplichting worden gehouden tot het delen van uw gegevens in verband met fiscaal of strafrechtelijk onderzoek van overheidswege. In een dergelijk geval zijn wij gedwongen uw gegevens te delen, maar wij zullen ons binnen de mogelijkheden die de wet ons biedt daartegen verzetten.</p>
                <h4>Bewaartermijnen</h4>
                <p>Wij bewaren uw gegevens zolang u cliënt van ons bent. Dit betekent dat wij uw klantprofiel bewaren totdat u aangeeft dat u niet langer van onze diensten gebruik wenst te maken. Als u dit bij ons aangeeft zullen wij dit tevens opvatten als een vergeetverzoek. Op grond van toepasselijke administratieve verplichtingen dienen wij facturen met uw (persoons)gegevens te bewaren, deze gegevens zullen wij dus voor zolang de toepasselijke termijn loopt bewaren. Medewerkers hebben echter geen toegang meer tot uw cliëntprofiel en documenten die wij naar aanleiding van uw opdracht hebben vervaardigd.</p>
                <h3>Uw rechten</h3>
                <p>Op grond van de geldende Nederlandse en Europese wetgeving heeft u als betrokkene bepaalde rechten met betrekking tot de persoonsgegevens die door of namens ons worden verwerkt. Wij leggen u hieronder uit welke rechten dit zijn en hoe u zich op deze rechten kunt beroepen.</p>
                <p>In beginsel sturen wij om misbruik te voorkomen afschriften en kopieën van uw gegevens enkel naar uw bij ons reeds bekende e-mailadres. In het geval dat u de gegevens op een ander e-mailadres of bijvoorbeeld per post wenst te ontvangen, zullen wij u vragen zich te legitimeren. Wij houden een administratie bij van afgehandelde verzoeken, in het geval van een vergeetverzoek administreren wij geanonimiseerde gegevens. Alle afschriften en kopieën van gegevens ontvangt u in de machineleesbare gegevensindeling die wij binnen onze systemen hanteren.</p>
                <p>U heeft te allen tijde het recht om een klacht in te dienen bij de Autoriteit Persoonsgegevens als u vermoedt dat wij uw persoonsgegevens op een verkeerde manier gebruiken.</p>
                <h4>Inzagerecht</h4>
                <p>U heeft altijd het recht om de gegevens die wij (laten) verwerken en die betrekking hebben op uw persoon of daartoe herleidbaar zijn, in te zien. U kunt een verzoek met die strekking doen aan onze contactpersoon voor privacyzaken. U ontvangt dan binnen 30 dagen een reactie op uw verzoek. Als uw verzoek wordt ingewilligd sturen wij u op het bij ons bekende e-mailadres een kopie van alle gegevens met een overzicht van de verwerkers die deze gegevens onder zich hebben, onder vermelding van de categorie waaronder wij deze gegevens hebben opgeslagen.</p>
                <h4>Rectificatierecht</h4>
                <p>U heeft altijd het recht om de gegevens die wij (laten) verwerken en die betrekking hebben op uw persoon of daartoe herleidbaar zijn, te laten aanpassen. U kunt een verzoek met die strekking doen aan onze contactpersoon voor privacyzaken. U ontvangt dan binnen 30 dagen een reactie op uw verzoek. Als uw verzoek wordt ingewilligd sturen wij u op het bij ons bekende e-mailadres een bevestiging dat de gegevens zijn aangepast.</p>
                <h4>Recht op beperking van de verwerking</h4>
                <p>U heeft altijd het recht om de gegevens die wij (laten) verwerken die betrekking hebben op uw persoon of daartoe herleidbaar zijn, te beperken. U kunt een verzoek met die strekking doen aan onze contactpersoon voor privacyzaken. U ontvangt dan binnen 30 dagen een reactie op uw verzoek. Als uw verzoek wordt ingewilligd sturen wij u op het bij ons bekende e-mailadres een bevestiging dat de gegevens tot u de beperking opheft niet langer worden verwerkt.</p>
                <h4>Recht op overdraagbaarheid</h4>
                <p>U heeft altijd het recht om de gegevens die wij (laten) verwerken en die betrekking hebben op uw persoon of daartoe herleidbaar zijn, door een andere partij te laten uitvoeren. U kunt een verzoek met die strekking doen aan onze contactpersoon voor privacyzaken. U ontvangt dan binnen 30 dagen een reactie op uw verzoek. Als uw verzoek wordt ingewilligd sturen wij u op het bij ons bekende e-mailadres afschriften of kopieën van alle gegevens over u die wij hebben verwerkt of in opdracht van ons door andere verwerkers of derden zijn verwerkt. Naar alle waarschijnlijkheid kunnen wij in een dergelijk geval de dienstverlening niet langer voortzetten, omdat de veilige koppeling van databestanden dan niet langer kan worden gegarandeerd.</p>
                <h4>Recht van bezwaar en overige rechten</h4>
                <p>U heeft in voorkomende gevallen het recht bezwaar te maken tegen de verwerking van uw persoonsgegevens door of in opdracht van Pixeltijgers. Als u bezwaar maakt zullen wij onmiddellijk de gegevensverwerking staken in afwachting van de afhandeling van uw bezwaar. Is uw bezwaar gegrond dat zullen wij afschriften en/of kopieën van gegevens die wij (laten) verwerken aan u ter beschikking stellen en daarna de verwerking blijvend staken.</p>
                <p>U heeft bovendien het recht om niet aan geautomatiseerde individuele besluitvorming of profiling te worden onderworpen. Wij verwerken uw gegevens niet op zodanige wijze dat dit recht van toepassing is. Bent u van mening dat dit wel zo is, neem dan contact op met onze contactpersoon voor privacyzaken.</p>
                <h3>Cookies</h3>
                <p>Deze cookies zijn verplicht en kunnen niet uitgezet worden. Ze worden alleen geplaatst door gebruikersacties. Het gaat hier bijvoorbeeld om privacy settings, inloggen of het invullen van formulieren. Je kan met je browser deze settings blokkeren. Dit kan het gevolg hebben dat sommige onderdelen van Gamekings.tv niet meer functioneren.</p>
                <h4>Google Analytics</h4>
                <p>Cookies: <em>__gads</em>, <em>_ga</em>, <em>_gat</em>, <em>_gid</em>.</p>
                <p>Via onze website worden cookies geplaatst van het Amerikaanse bedrijf Google, als deel van de “Analytics”-dienst. Wij gebruiken deze dienst om bij te houden en rapportages te krijgen over hoe bezoekers de website gebruiken. Deze verwerker is mogelijk verplicht op grond van geldende wet- en regelgeving inzage te geven in deze gegevens. Wij verzamelen informatie over uw surfgedrag en delen deze gegevens met Google. Google kan deze informatie in samenhang met andere datasets interpreteren en op die manier uw bewegingen op het internet volgen. Google gebruikt deze informatie voor het aanbieden van onder andere gerichte advertenties (Adwords) en overige Google- diensten en producten.</p>
                <h4>VIMEO</h4>
                <p>Cookies: <em>player, vuid, __qca, __ssid, _abexps, _ceg.s, _ceg.u, search_click_position, vimeo,<br />
                vimeo_gdpr_optin, continuous_play_v3, has_logged_in, is_logged_in.<br />
                </em></p>
                <p>Via onze website worden cookies geplaatst van het bedrijf Vimeo, als deel van de “Video”-dienst. Wij gebruiken deze dienst om videos te tonen. De Vimeo kan cookies plaatsten om instellingen i.v.m. de Vimeo Video Player op te kunnen slaan. Deze cookies kunnen niet uitgezet worden.</p>
                <h4>Cookies van derde partijen</h4>
                <p>In het geval dat softwareoplossingen van derde partijen gebruik maken van cookies is dit vermeld in deze privacyverklaring.</p>
                <h3>Wijzigingen in het privacybeleid</h3>
                <p>Wij behouden te allen tijde het recht ons privacybeleid te wijzigen. Op deze pagina vindt u echter altijd de meest recente versie. Als het nieuwe privacybeleid gevolgen heeft voor de wijze waarop wij reeds verzamelde gegevens met betrekking tot u verwerken, dan brengen wij u daarvan per e-mail op de hoogte.</p>
                <h3>Contactgegevens</h3>
                <ul>
                    <li><span>E-mail:</span> <a href="mailto:info@pixeltijgers.nl">info@pixeltijgers.nl</a></li>
                    <li><span>Website:</span> <a href="www.pixeltijgers.nl">www.pixeltijgers.nl</a></li>
                </ul>',

                'meta_title' => 'Privacybeleid',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Privacybeleid',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/privacybeleid',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Cookie Policy',
                'menu_title' => 'Cookie Policy',
                'slug' => '/cookie-policy',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '
                <h3>1. Het gebruik van cookies</h3>
                <p><strong>www.pixeltijgers.nl</strong>  maakt gebruik van cookies. Een cookie is een eenvoudig klein bestandje dat met pagina’s van deze website en/of Flash-applicaties wordt meegestuurd en door je browser op je harde schijf van je computer, mobiele telefoon, smart watch of tablet wordt opgeslagen. De daarin opgeslagen informatie kan bij een volgend bezoek weer naar onze servers teruggestuurd worden.</p>
                <p>Het gebruik van cookies is van groot belang voor het goed laten draaien van onze website, maar ook cookies waarvan je niet direct het effect ziet zijn zeer belangrijk. Dankzij de (anonieme) input van bezoekers kunnen we het gebruik van de website verbeteren en deze gebruiksvriendelijker maken.</p>

                <h3>2. Toestemming voor het gebruik van cookies</h3>
                <p>Voor het gebruik van bepaalde cookies is jouw toestemming vereist.</p>

                <h3>3. Type cookies en hun doelstellingen</h3>
                <p>Wij gebruiken de volgende type cookies:</p>
                <p><strong>Functionele cookies:</strong> hiermee kunnen we de website beter laten functioneren en is die gebruiksvriendelijker voor de bezoeker. Bijvoorbeeld: we slaan je inloggegevens op of wat je in je winkelmandje hebt gestopt.</p>
                <p><strong>Geanonimiseerde analytische cookies:</strong> deze zorgen ervoor dat iedere keer wanneer je een website bezoekt er een anonieme cookie wordt gegenereerd. Deze cookies weten of je de site al eerder bezocht hebt of niet. Alleen bij het eerste bezoek, wordt er een cookie aangemaakt, bij volgende bezoeken wordt er gebruikgemaakt van de reeds bestaande cookie. Deze cookie dient enkel voor statistische doeleinden. Zo kunnen daarmee de volgende data verzameld worden:</p>
                <ul>
                    <li>Het aantal unieke bezoekers</li>
                    <li>Hoe vaak gebruikers de site bezoeken</li>
                    <li>Welke pagina’s gebruikers bekijken</li>
                    <li>Hoelang gebruikers een bepaalde pagina bekijken</li>
                    <li>Bij welke pagina bezoekers de site verlaten</li>
                </ul>
                <p><strong>Analytische cookies:</strong> deze zorgen ervoor dat iedere keer wanneer je een website bezoekt er een cookie wordt gegenereerd. Deze cookies weten of je de site al eerder bezocht hebt of niet. Alleen bij het eerste bezoek, wordt er een cookie aangemaakt, bij volgende bezoeken wordt er gebruikgemaakt van de reeds bestaande cookie. Deze cookie dient enkel voor statistische doeleinden. Zo kunnen daarmee de volgende data verzameld worden, zoals:</p>
                <ul>
                    <li>Welke pagina\'s je hebt bekeken</li>
                    <li>Hoelang je op een bepaalde pagina bent gebleven</li>
                    <li>Bij welke pagina je de site hebt verlaten</li>
                </ul>
                <p><strong>Eigen tracking cookies:</strong> hierdoor kunnen wij te weten komen dat je naast onze website ook op de betreffende andere website(s) uit ons netwerk bent geweest. Het daardoor opgebouwde profiel is niet gekoppeld aan jouw naam, adres, e-mailadres en dergelijke, maar dient alleen om advertenties af te stemmen op jouw profiel, zodat deze zo veel mogelijk relevant voor je zijn. Voor deze cookies vragen wij jouw toestemming. Zonder jouw toestemming worden deze cookies dus niet geplaatst.</p>
                <p><strong>Tracking cookies van anderen:</strong> hiermee wordt bijgehouden welke pagina’s je bezoekt op internet om je persoonlijke profiel op te kunnen bouwen. Dit profiel wordt niet gekoppeld aan jouw naam, adres, e-mailadres en dergelijke zoals bij ons bekend, maar dient alleen om advertenties af te stemmen op jouw profiel zodat deze zo veel mogelijk relevant voor je zijn. Voor deze cookies vragen wij jouw toestemming. Zonder jouw toestemming worden deze cookies dus niet geplaatst.</p>
                <p><strong>Social media gerelateerde cookies:</strong> hiermee registreren social media zoals Facebook en LinkedIn welke artikels en pagina’s je deelt via hun sociale media sharing buttons. Ze kunnen ook tracking cookies bevatten die je surfgedrag op het web volgen.</p>
                <p><strong>site verbetering cookies / optimalisatie cookies:</strong> hiermee kunnen we verschillende versies van een webpagina testen om te kijken welke pagina het beste wordt bezocht.</p>
                <h3>4. Je rechten met betrekking tot je gegevens</h3>
                <p>Je hebt het recht op inzage, rectificatie, beperking en verwijdering van persoonsgegevens. Daarnaast heb je recht van bezwaar tegen verwerking van persoonsgegevens en recht op gegevensoverdraagbaarheid. Je kunt deze rechten uitoefenen door ons een mail te sturen via <a href="mailto:info@pixeltijgers.nl">info@pixeltijgers.nl</a>. Om misbruik te voorkomen kunnen wij je daarbij vragen om je adequaat te identificeren. Wanneer het gaat om inzage in persoonsgegevens gekoppeld aan een cookie, vragen we je een kopie van het cookie in kwestie mee te sturen. Je kunt deze terugvinden in de instellingen van je browser.</p>
                <h3>5. Cookies blokkeren en verwijderen</h3>
                <p>Je kunt cookies te allen tijde eenvoudig zelf blokkeren en verwijderen via je internetbrowser. Ook kun je je internetbrowser zodanig instellen dat je een bericht ontvangt als er een cookie wordt geplaatst. Je kunt ook aangeven dat bepaalde cookies niet geplaatst mogen worden. Bekijk voor deze mogelijkheid de helpfunctie van je browser. Als je de cookies in je browser verwijdert, kan dat gevolgen hebben voor het prettige gebruik van deze website.</p>
                <p>Sommige tracking cookies worden geplaatst door derden die onder meer via onze website advertenties aan je vertonen. Deze cookies kan je centraal verwijderen via <a href="https://youronlinechoices.com/" target="_blank">youronlinechoices.com</a></p>
                <p>Wees je er wel van bewust dat als je geen cookies wilt, wij niet meer kunnen garanderen dat onze Website helemaal goed werkt. Het kan zijn dat enkele functies van de site verloren gaan of zelfs dat je de website helemaal niet meer kunt bezoeken. Daarnaast betekent het weigeren van cookies ook niet dat je helemaal geen advertenties meer te zien krijgt. De advertenties zijn dan alleen niet meer toegesneden op jouw interesses en kun daardoor vaker worden herhaald.</p>
                <p>Hoe je je instellingen kunt aanpassen, verschilt per browser. Raadpleeg indien nodig de helpfunctie van jouw browser, of klik op één van de onderstaande links om direct naar de handleiding van je browser te gaan.</p>
                <ul>
                    <li>Firefox: <a href="https://support.mozilla.org/nl/kb/cookies-verwijderen-gegevens-wissen-websites-opgeslagen" target="_blank">https://support.mozilla.org/nl/kb/cookies-verwijderen-gegevens-wissen-websites-opgeslagen</a></li>
                    <li>Google Chrome: <a href="https://support.google.com/chrome/answer/95647?co=GENIE.Platform=Desktop&hl=nl" target="_blank">https://support.google.com/chrome/answer/95647?co=GENIE.Platform=Desktop&hl=nl</a></li>
                    <li>Internet Explorer: <a href="https://support.microsoft.com/nl-nl/kb/278835" target="_blank">https://support.microsoft.com/nl-nl/kb/278835</a></li>
                    <li>Safari op smart phone: <a href="https://support.apple.com/nl-nl/HT201265" target="_blank">https://support.apple.com/nl-nl/HT201265</a></li>
                    <li>Safari op Mac: <a href="https://support.apple.com/nl-be/guide/safari/sfri11471/mac" target="_blank">https://support.apple.com/nl-be/guide/safari/sfri11471/mac</a></li>
                </ul>
                <h3>6. Nieuwe ontwikkelingen en onvoorziene cookies</h3>
                <p>De teksten van onze website kunnen op ieder moment worden aangepast door voortdurende ontwikkelingen. Dit geldt ook voor onze cookieverklaring. Neem deze verklaring daarom regelmatig door om op de hoogte te blijven van eventuele wijzigingen.</p>
                <p>In blogartikelen kan gebruik worden gemaakt van content die op andere sites wordt gehost en op <strong>www.pixeltijgers.nl</strong> wordt ontsloten door middel van bepaalde codes (embedded content). Denk hierbij aan bijvoorbeeld YouTube video\'s. Deze codes maken vaak gebruik van cookies. Wij hebben echter geen controle op wat deze derde partijen met hun cookies doen.</p>
                <p>Het kan ook voorkomen dat via onze websites cookies worden geplaatst door anderen, waarvan wijzelf niet altijd op de hoogte zijn. Kom je op onze website onvoorziene cookies tegen die je niet kunt terugvinden in ons overzicht? Laat het ons weten via <a href="mailto:info@pixeltijgers.nl">info@pixeltijgers.nl</a>. Je kan ook rechtstreeks contact opnemen met de derde partij en vraag welke cookies ze plaatsten, wat de reden daarvoor is, wat de levensduur van de cookie is en op welke manier ze je privacy gewaarborgd hebben.</p>
                <h3>7. Slotopmerkingen</h3>
                <p>Wij zullen deze verklaringen af en toe aan moeten passen, bijvoorbeeld wanneer we onze website aanpassen of de regels rondom cookies wijzigen. Je kunt deze webpagina raadplegen voor de laatste versie.</p>
                <p>Mocht je nog vragen en/of opmerkingen hebben neem dan contact op met <a href="mailto:info@pixeltijgers.nl">info@pixeltijgers.nl</a></p>
                ',

                'meta_title' => 'Cookie Policy',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Cookie Policy',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/cookie-policy',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Sitemap',
                'menu_title' => 'Sitemap',
                'slug' => '/sitemap',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Sitemap',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Sitemap',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/sitemap',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
        ];

        foreach($pages as $page) {

            // Create page in the database.
            $createPage = Page::create([
                    'status' => PublishedState::Published,
                    'published_at' => now(),

                    'last_edited_administrator_id' => 1,
                    'last_edit_at' => now(),
                ] + $page);

            // Sync with the navigation menu.
            $createPage->navigation_menus()->sync([3,4]);

        }

    }

}
