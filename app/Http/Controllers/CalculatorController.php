<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MovingCostInquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function send(Request $request)
    {
        $validated = $this->sanitize($request->userData);

        Mail::to(config('spasov_umzug.email'))
            ->send(new MovingCostInquiry(
                $validated,
                $request->objects,
                $request->totalVolume,
                $request->loadingPoint,
                $request->unloadingPoint
            ));

        return response(['Email sent successfully.'], 204);
    }

    public function sanitize($userData)
    {
        $request = Validator::make(
            $userData,
            [
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date_format:Y-m-d|after:today',
            'cost_bearer' => 'required',
            'remarks' => 'string|nullable',
            'from_street' => 'required|string',
            'from_location' => 'required|string',
            'from_floor' => 'nullable|integer|numeric',
            'from_sq_m' => 'required|integer|numeric',
            'from_elevator' => 'string|nullable',
            'from_zip' => 'required|integer|numeric',
            'from_province' => 'string',
            'from_rooms' => 'required|integer|numeric',
            'from_carry_distance' => 'required|integer|numeric',
            'from_building_type' => 'string|nullable',
            'to_street' => 'required|string',
            'to_location' => 'required|string',
            'to_floor' => 'nullable|integer|numeric',
            'to_sq_m' => 'required|integer|numeric',
            'to_elevator' => 'string|nullable',
            'to_zip' => 'required|integer|numeric',
            'to_province' => 'string',
            'to_rooms' => 'required|integer|numeric',
            'to_carry_distance' => 'required|integer|numeric',
            'to_building_type' => 'string|nullable',
            ],
            [
            'salutation.required' => 'Die Anrede ist erforderlich.',
            'anrede.string' => 'Die Anrede muss eine Zeichenfolge sein',
            'first_name.required' => 'Der Vorname ist erforderlich.',
            'first_name.string' => 'Der Vorname muss eine Zeichenfolge sein',
            'last_name.required' => 'Der Nachname ist erforderlich.',
            'last_name.string' => 'Der Nachname muss eine Zeichenfolge sein',
            'phone.required' => 'Das Telefon ist erforderlich.',
            'phone.string' => 'Das Telefon muss eine Zeichenfolge sein',
            'email.required' => 'Die E-Mail ist erforderlich.',
            'email.string' => 'Die E-Mail muss eine Zeichenfolge sein',
            'date.required' => 'Der Termin ist erforderlich.',
            'date.date_format' => 'Der Termin muss im Format mm/dd/yyyy sein.',
            'date.after' => 'Bitte wählen Sie ein Datum ab morgen.',
            'cost_bearer.required' => 'Der Kostenträger ist erforderlich.',
            'remarks.string' => 'Die Bemerkungen müssen eine Zeichenfolge sein',
            'from_street.required' => 'Die Straße ist erforderlich.',
            'from_street.string' => 'Die Straße muss eine Zeichenfolge sein',
            'from_location.required' => 'Der Ort ist erforderlich.',
            'from_location.string' => 'Der Ort muss eine Zeichenfolge sein',
            'from_floor.integer' => 'Die Etage muss ein Ziffer sein.',
            'from_floor.numeric' => 'Die Etage muss ein Ziffer sein.',
            'from_sq_m.required' => 'Die Größe ist erforderlich.',
            'from_sq_m.integer' => 'Die Größe muss ein Ziffer sein.',
            'from_sq_m.numeric' => 'Die Größe muss ein Ziffer sein.',
            'from_elevator.string' => 'Der Fahrstuhl muss eine Zeichenfolge sein',
            'from_zip.required' => 'Die Postleitzahl ist erforderlich.',
            'from_zip.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'from_zip.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'from_province.string' => 'Das Land muss eine Zeichenfolge sein',
            'from_rooms.required' => 'Die Räume sind erforderlich.',
            'from_rooms.integer' => 'Die Räume müssen ein Ziffer sein.',
            'from_rooms.numeric' => 'Die Räume müssen ein Ziffer sein.',
            'from_carry_distance.required' => 'Die Tragestrecke ist erforderlich.',
            'from_carry_distance.integer' => 'Die Tragestrecke muss ein Ziffer sein.',
            'from_carry_distance.numeric' => 'Die Tragestrecke muss ein Ziffer sein.',
            'from_building_type.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            'to_street.required' => 'Die Straße ist erforderlich.',
            'to_street.string' => 'Die Straße muss eine Zeichenfolge sein',
            'to_location.required' => 'Der Ort ist erforderlich.',
            'to_location.string' => 'Der Ort muss eine Zeichenfolge sein',
            'to_floor.integer' => 'Die Etage muss ein Ziffer sein.',
            'to_floor.numeric' => 'Die Etage muss ein Ziffer sein.',
            'to_sq_m.required' => 'Die Größe ist erforderlich.',
            'to_sq_m.integer' => 'Die Größe muss ein Ziffer sein.',
            'to_sq_m.numeric' => 'Die Größe muss ein Ziffer sein.',
            'to_elevator.string' => 'Der Fahrstuhl muss eine Zeichenfolge sein',
            'to_zip.required' => 'Die Postleitzahl ist erforderlich.',
            'to_zip.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'to_zip.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'to_province.string' => 'Das Land muss eine Zeichenfolge sein',
            'to_rooms.required' => 'Die Räume sind erforderlich.',
            'to_rooms.integer' => 'Die Räume müssen ein Ziffer sein.',
            'to_rooms.numeric' => 'Die Räume müssen ein Ziffer sein.',
            'to_carry_distance.required' => 'Die Tragestrecke ist erforderlich.',
            'to_carry_distance.integer' => 'Die Tragestrecke muss ein Ziffer sein.',
            'to_carry_distance.numeric' => 'Die Tragestrecke muss ein Ziffer sein.',
            'to_building_type.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            ]
        )->validate();

        return $request;
    }
}
