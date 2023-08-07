@component('mail::message')
# Umzugsanfrage

**Von:** {{ $data['salutation'] }} {{ $data['first_name'] }} {{ $data['last_name'] }}\
**Telefonnummer:** {{ $data['phone'] }}\
**Email Adresse:** {{ $data['email'] }}

# Gewünschter Termin
**Am Datum:** {{ $data['date']}}\
**Kostenträger:** {{ $data['cost_bearer']}}\
**Bemerkungen:** {{ $data['remarks']}}

# Umzug von
**Strasse / Nr.:** {{ $data['from_street'] }}\
**Ort:** {{ $data['from_location'] }}\
**Postleitzahl:** {{ $data['from_zip'] }}\
**Land:** {{ $data['from_province'] }}\
**Etage:** {{ $data['from_floor'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['from_sq_m'] }}\
**Anzahl Räume:** {{ $data['from_rooms'] }}\
**Fahrstuhl:** {{ $data['from_elevator'] ?? '-' }}\
**Tragestrecke:** {{ $data['from_carry_distance'] }}\
**Gebäudeart:** {{ $data['from_building_type'] }}

# Umzug nach
**Strasse / Nr.:** {{ $data['to_street'] }}\
**Ort:** {{ $data['to_location'] }}\
**Postleitzahl:** {{ $data['to_zip'] }}\
**Land:** {{ $data['to_province'] }}\
**Etage:** {{ $data['to_floor'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['to_sq_m'] }}\
**Anzahl Räume:** {{ $data['to_rooms'] }}\
**Fahrstuhl:** {{ $data['to_elevator'] ?? '-' }}\
**Tragestrecke:** {{ $data['to_carry_distance'] }}\
**Gebäudeart:** {{ $data['to_building_type'] }}

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
