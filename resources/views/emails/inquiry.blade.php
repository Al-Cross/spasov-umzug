@component('mail::message')
# Umzugsanfrage

**Von:** {{ $data['salutation'] }} {{ $data['first_name'] }} {{ $data['last_name'] }}\
**Telefonnummer:** {{ $data['phone'] }}\
**E-Mail Adresse:** {{ $data['email'] }}

# Gewünschter Termin
**Am Datum:** {{ \Carbon\Carbon::parse($data['date'])->format('d.m.Y') }}\
**Kostenträger:** {{ $data['cost_bearer']}}\
**Bemerkungen:** {{ $data['remarks']}}

# Umzug von
**Strasse / Nr.:** {{ $data['from_street'] }}\
**Ort:** {{ $data['from_location'] }}\
**Postleitzahl:** {{ $data['from_zip'] }}\
**Land:** {{ $data['from_province'] }}\
**Etage:** {{ $data['from_floor'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['from_sq_m'] }} m<sup>2</sup>\
**Anzahl Räume:** {{ $data['from_rooms'] }}\
**Fahrstuhl:** {{ $data['from_elevator'] ?? '-' }}\
**Tragestrecke:** {{ $data['from_carry_distance'] }} m\
**Gebäudeart:** {{ $data['from_building_type'] }}

# Umzug nach
**Strasse / Nr.:** {{ $data['to_street'] }}\
**Ort:** {{ $data['to_location'] }}\
**Postleitzahl:** {{ $data['to_zip'] }}\
**Land:** {{ $data['to_province'] }}\
**Etage:** {{ $data['to_floor'] ?? '-' }}\
**Größe der Wohnung:** {{ $data['to_sq_m'] }} m<sup>2</sup>\
**Anzahl Räume:** {{ $data['to_rooms'] }}\
**Fahrstuhl:** {{ $data['to_elevator'] ?? '-' }}\
**Tragestrecke:** {{ $data['to_carry_distance'] }} m\
**Gebäudeart:** {{ $data['to_building_type'] }}

# Umzugsgüter
@if(!empty($objects))
@foreach($objects as $room)
## {{ $room['title'] }}

@component('mail::table')
| Gegenstand | Volumen m<sup>3</sup> |
|:----------:|-------:|
@foreach($room['contents'] as $furniture)
@if(!isset($furniture['isBoxUnder80l']) && !isset($furniture['isBoxOver80l']))
| {{ $furniture['name'] }} | {{ $furniture['volume'] ?? 'nicht angegeben' }} |
@endif
@endforeach
@if(isset($room['boxesUnder80l']))
| Umzugskarton bis 80 L | {{ $room['boxesUnder80l'] }} Stück
@endif
@if(isset($room['boxesOver80l']))
| Umzugskarton über 80 L | {{ $room['boxesOver80l'] }} Stück
@endif
@endcomponent

@if(isset($room['volume']))
**Kubikmeter im Zimmer:** {{ $room['volume'] }}
@endif
@endforeach

**Gesamte Volumen:** {{ $totalVolume }} m<sup>3</sup>
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
