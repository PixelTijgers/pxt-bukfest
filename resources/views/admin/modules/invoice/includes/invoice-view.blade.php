<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@900&family=Red+Hat+Display:wght@300;400;500&display=swap" rel="stylesheet">
        <style>

            *,
            *::before,
            *::after {
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
            }

            input:focus,
            textarea:focus,
            select:focus{
                outline: none;
            }

            body {
                font-family: 'Red Hat Display', sans-serif;
                font-size: 14px;
                padding: 0 5%;
                position: relative;
                letter-spacing: .5px;
            }

            header {
                border-bottom: 1px solid #EEE;
                height: 115px;
                position: relative;
            }

            header figure {
                margin: 0;
                padding: 0;
                position: absolute;
                    top: 0;
                    left: 0;
                width: 250px;
            }

            header figure img {
                height: auto;
                width: 100%;
            }

            header ul {
                position: absolute;
                    top: 0;
                    right: 0;
            }

            ul {
                margin: 0;
                padding: 0;
            }

            ul li {
                color: #222;
                list-style: none;
                font-family: 'Red Hat Display', sans-serif;
                font-size: 14px;
                font-weight: 300;
                line-height: 110%;
                margin: 0;
                padding: 0;
                word-spacing: 1px;
            }

            strong {
                color: #0d3847;
                font-weight: 500;
            }

            main {
                padding: 35px 0 50px;
                position: relative;
            }

            main .client_details,
            main .invoice_details, {
                position: absolute;
                    top: 25px;
            }

            main .client_details {
                left: 0;
            }

            main .invoice_details, {
                position: absolute;
                    right: 0;
                text-align: right;
            }

            main .head {
                position: absolute;
                    top: 150px;
                    right: 0;
                    left: 0;
                width: 100%;
            }

            main .head span {
                color: #ec6729;
                margin-right: 10px
            }

            main .head p {
                color: #0d3847;
                font-size: 32px;
                font-weight: 500;
            }

            main .invoice_rules table {
                border-collapse: separate;
                border-spacing: 0pt;
                position: absolute;
                    top: 250px;
                width: 100%;
            }

            main .invoice_rules table thead {
                background: #ec6729;
                color: #FFF;
                width: 100%;
            }

            table thead th:first-child {
                border-top-left-radius: 5px;
                text-align: left;
            }

            table thead th:last-child {
                border-top-right-radius: 5px;
                text-align: right;
            }

            table tbody tr:last-child td {
                border-bottom-left-radius: 5px;
            }

            table tbody tr:last-child td {
                border-bottom-right-radius: 5px;
            }

            main .invoice_rules table thead tr th,
            main .invoice_rules table tbody tr td {
                font-size: 12px;
                font-weight: 500;
                padding: 0px 12px 5px;
            }

            main .invoice_rules table tbody tr:nth-child(odd) {
                background: #FAFAFA;
            }

            main .invoice_rules table tbody tr td {
                font-weight: 300;
                padding: 7px 10px 12px;
            }

            main .invoice_rules table tbody tr td {
                text-align: center;
            }

            main .invoice_rules table tfoot {
                font-size: 12px;
            }

            main .invoice_rules table tbody tr td:first-child,
            main .invoice_rules table tfoot tr td:first-child {
                text-align: left;
            }

            main .invoice_rules table tbody tr td:last-child,
            main .invoice_rules table tfoot tr td:last-child {
                text-align: right;
            }

            main .invoice_rules table tfoot tr td {
                padding-left: 10px;
                padding-right: 10px;
            }

            main .invoice_rules table tfoot tr:first-child td {
                padding-top: 25px;
            }

            main .invoice_rules table tfoot tr:nth-child(2) td {
                padding-top: 5px;
                padding-bottom: 10px;
            }

            main .invoice_rules table tfoot tr:last-child td {
                border-top: 1px solid #EEE;
                font-size: 14px;
                font-weight: 500;
                padding-top: 5px;
            }

            main .invoice_rules table .price,
            main .invoice_rules table .total {
                width: 75px;
            }

            main .invoice_rules table .amount {
                width: 50px;
            }

            footer {
                border-top: 1px solid #EEE;
                position: absolute;
                    bottom: 0;
            }

            footer p {
                font-size: 13px;
                font-weight: 300;
            }

            footer ul li{
                display: inline-block;
                font-size: 13px;
                margin-right: 25px;
            }
        </style>
    </head>
    <body>

        <header>

            <figure><img src="{{ URL::asset('img/admin/logo_invoice.png') }}" /></figure>

            <ul class="details">

                <li><strong>{{ $details['name'] }}</strong></li>
                <li>{{ $details['street'] }}</li>
                <li>{{ $details['zip_code'] }}, {{ $details['location'] }}</li>
                <li>{{ $details['country'] }}</li>

            </ul>

        </header>

        <main>

            <ul class="client_details">
                <li><strong>{{ $client['name'] }}</strong></li>
                <li>t.a.v. {{ $client['contact'] }}</li>
                <li>{{ $client['street'] }}</li>
                <li>{{ $client['zip_code'] }}, {{ $client['location'] }}</li>
                @if($client['country'] != 'Nederland')<li>{{ $client['country'] }}</li>@endif
                <li>{{ $client['vat'] }}</li>
            </ul>

            <ul class="invoice_details">
                <li><strong>Factuurdatum: </strong>{{ Carbon\Carbon::parse($invoice['invoice_date'])->formatLocalized('%d-%m-%Y') }}</li>
                <li><strong>Factuurnummer: </strong>{{ $invoice['id_invoice'] }}</li>
            </ul>

            <div class="head"><p>Factuur</p></div>

            <div class="invoice_rules">

                <table>

                    <thead>

                        <tr>

                            <th>Omschrijving</th>
                            <th class="price">Prijs</th>
                            <th class="amount">Aantal</th>
                            <th class="total">Totaal</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($invoiceRules as $invoiceRule)

                        <tr>
                            <td><strong>{{ $invoiceRule['description'] }}</strong></td>
                            <td class="price">€ {{ number_format($invoiceRule['price'], 2, ',', '.') }}</td>
                            <td class="amount">{{ $invoiceRule['amount'] }}</td>
                            <td class="total">€ {{ number_format($invoiceRule['price'] * $invoiceRule['amount'], 2, ',', '.') }}</td>
                        </tr>

                    @endforeach

                    </tbody>

                    <tfoot>

                        <tr>
                            <td>Subtotaal</td>
                            <td class="price"></td>
                            <td class="amount"></td>
                            <td class="total">€ {{ number_format($calculateTotal, 2, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <td>{{ ($invoice['vat'] > 0 ? 'BTW ' . $invoice['vat'] . '%': 'Geen / Vrijgesteld') }}</td>
                            <td class="price"></td>
                            <td class="amount"></td>
                            <td class="total">€ {{ ($invoice['vat'] > 0 ? number_format($calculateVat, 2, ',', '.') : '0,00') }}</td>
                        </tr>

                        <tr>
                            <td>Totaal</td>
                            <td class="price"></td>
                            <td class="amount"></td>
                            <td class="total">€ {{ number_format((float) $calculateTotal + $calculateVat, 2, ',', '.') }}</td>
                        </tr>

                    </tfoot>

                </table>

            </div>

        </main>

        <footer>

            <p>Gelieve de factuur te betalen binnen 14 dagen van de opgegeven factuurdatum. Dit onder vermelding van het factuurnummer <strong>{{ $invoice['id'] }}</strong> naar bankrekeningnummer: <strong>{{ $details->bank }}</strong> t.n.v. {{ $details->name }}.</p>

            <ul>
                <li><strong>Kvk:</strong> {{ $details['coc'] }}</li>
                <li><strong>Btw:</strong> {{ $details['vat'] }}</li>
                <li><strong>E:</strong> {{ $details['email'] }}</li>
                <li><strong>M:</strong> {{ $details['mobile'] }}</li>
            </ul>

        </footer>

    </body>

</html>
