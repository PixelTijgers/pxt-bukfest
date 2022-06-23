@component('mail::message')
# Nieuw bericht via contactformulier

<p class="intro">Via de website is er een bericht verstuurd. Bekijk onder de streep de inhoud.</p>

### Gegevens verzender
<ul>
    <li><strong>Naam:</strong> {{ $name }}</li>
    <li><strong>Email:</strong> {{ $email }}</li>
    <li><strong>Bedrijf:</strong> {{ ($company !== null ? $company : 'N.v.t.') }}</li>
    <li><strong>Website:</strong> @if($website !== null) <a href="{{ $website }}" target="_blank">{{ $website }}</a> @else N.v.t. @endif</li>
    <li><strong>Onderwerp:</strong> {{ $subject }}</li>
    <li><strong>Bericht:</strong> {{ $message }}</li>
</ul>


### Locatie
<ul>
    <li><strong>IP:</strong> {{ $ip }}</li>
    <li><strong>Plaats:</strong> {{ $city }}</li>
    <li><strong>Regio:</strong> {{ $region }}</li>
    <li><strong>Land:</strong> {{ $country }}</li>
    <li><strong>Landcode:</strong> {{ $countryCode }}</li>
</ul>

@endcomponent
