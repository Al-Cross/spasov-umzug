@component('mail::message')
# Umzugsanfrage

**Von:** {{ $data['anrede'] }} {{ $data['vorname'] }} {{ $data['nachname'] }}\
**Telefonnummer:** {{ $data['telefon'] }}\
**Email Adresse:** {{ $data['email'] }}

# Gewünschter Termin
**Am Datum:** {{ $data['date']}}\
**Kostenträger:** {{ $data['kostentraeger']}}\
**Bemerkungen:** {{ $data['bemerkungen']}}

# Umzug von
**Strasse / Nr.:** {{ $data['von_strasse'] }}\
**Ort:** {{ $data['von_ort'] }}\
**Postleitzahl:** {{ $data['von_postleitzahl'] }}\
**Land:** {{ $data['von_land'] }}\
**Etage:** {{ $data['von_etage'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['von_groesse'] }}\
**Anzahl Räume:** {{ $data['von_raume'] }}\
**Fahrstuhl:** {{ $data['von_fahrstuhl'] ?? '-' }}\
**Tragestrecke:** {{ $data['von_tragestrecke'] }}\
**Gebäudeart:** {{ $data['von_gebaudeart'] }}

# Umzug nach
**Strasse / Nr.:** {{ $data['nach_strasse'] }}\
**Ort:** {{ $data['nach_ort'] }}\
**Postleitzahl:** {{ $data['nach_postleitzahl'] }}\
**Land:** {{ $data['nach_land'] }}\
**Etage:** {{ $data['nach_etage'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['nach_groesse'] }}\
**Anzahl Räume:** {{ $data['nach_raume'] }}\
**Fahrstuhl:** {{ $data['nach_fahrstuhl'] ?? '-' }}\
**Tragestrecke:** {{ $data['nach_tragestrecke'] }}\
**Gebäudeart:** {{ $data['nach_gebaudeart'] }}

# Umzugsgüter
@if(!empty($objects))
@foreach($objects as $item)
## {{ $item['room'] }}
@component('mail::table')
| Gegenstand | Anzahl |
|:----------:|-------:|
@foreach($item['elements'] as $element)
| {{ $element['name'] }} | {{ $element['value'] }} |
@endforeach
@endcomponent
**Kubikmeter im Zimmer:** {{ $item['roomVolume'] }}
@endforeach
**Gesamte Volumen:** {{ $totalVolume }}
@else
Keine Umzugsgüter wurden angegeben.
@endif

@if(!empty($loadingPoint))
**Bitte am Beladestelle sorgen für:**
@foreach($loadingPoint as $furniture)
- {{ $furniture }}
@endforeach
@endif

@if(!empty($unloadingPoint))
**Bitte am Entladestelle sorgen für:**
@foreach($unloadingPoint as $furniture)
- {{ $furniture }}
@endforeach
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
