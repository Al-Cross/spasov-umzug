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

        return response([], 204);
    }

    public function sanitize($userData)
    {
        // dd($userData);
        $request = Validator::make(
            $userData,
            [
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date_format:Y-m-d',
            'cost_bearer' => 'required',
            'remarks' => 'string|nullable',
            'from_street' => 'required|string',
            'from_location' => 'required|string',
            'from_floor' => 'nullable|integer|numeric',
            'from_sq_m' => 'required|integer|numeric',
            'from_elevator' => 'string|nullable',
            'from_zip' => 'required|integer|numeric',
            'from_province' => 'required|string',
            'from_rooms' => 'required|integer|numeric',
            'from_carry_distance' => 'required|integer|numeric',
            'from_building_type' => 'string|nullable',
            'to_street' => 'required|string',
            'to_location' => 'required|string',
            'to_floor' => 'nullable|integer|numeric',
            'to_sq_m' => 'required|integer|numeric',
            'to_elevator' => 'string|nullable',
            'to_zip' => 'required|integer|numeric',
            'to_province' => 'required|string',
            'to_rooms' => 'required|integer|numeric',
            'to_carry_distance' => 'required|integer|numeric',
            'to_building_type' => 'string|nullable',
            ],
            [
            'salutation.required' => 'Das Feld Anrede ist erforderlich.',
            'anrede.string' => 'Das Feld Anrede muss eine Zeichenfolge sein',
            'first_name.required' => 'Das Feld Vorname ist erforderlich.',
            'first_name.string' => 'Das Feld Vorname muss eine Zeichenfolge sein',
            'last_name.required' => 'Das Feld Nachname ist erforderlich.',
            'last_name.string' => 'Das Feld Nachname muss eine Zeichenfolge sein',
            'phone.required' => 'Das Feld Telefon ist erforderlich.',
            'phone.string' => 'Das Feld Telefon muss eine Zeichenfolge sein',
            'email.required' => 'Das Feld Email ist erforderlich.',
            'email.string' => 'Das Feld Email muss eine Zeichenfolge sein',
            'date.required' => 'Das Feld Termin ist erforderlich.',
            'date.date_format' => 'Das Feld Termin muss im Format mm/dd/yyyy sein.',
            'cost_bearer.required' => 'Das Feld Kostenträger ist erforderlich.',
            'remarks.string' => 'Das Feld Bemerkungen muss eine Zeichenfolge sein',
            'from_street.required' => 'Das Feld Straße ist erforderlich.',
            'from_street.string' => 'Das Feld Straße muss eine Zeichenfolge sein',
            'from_location.required' => 'Das Feld Ort ist erforderlich.',
            'from_location.string' => 'Das Feld Ort muss eine Zeichenfolge sein',
            'from_floor.integer' => 'Das Feld Etage muss ein Ziffer sein.',
            'from_floor.numeric' => 'Das Feld Etage muss ein Ziffer sein.',
            'from_sq_m.required' => 'Das Feld Größe ist erforderlich.',
            'from_sq_m.integer' => 'Das Feld Größe muss ein Ziffer sein.',
            'from_sq_m.numeric' => 'Das Feld Größe muss ein Ziffer sein.',
            'from_elevator.string' => 'Das Feld Fahrstuhl muss eine Zeichenfolge sein',
            'from_zip.required' => 'Die Postleitzahl ist erforderlich.',
            'from_zip.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'from_zip.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'from_province.required' => 'Das Feld Land ist erforderlich.',
            'from_province.string' => 'Das Feld Land muss eine Zeichenfolge sein',
            'from_rooms.required' => 'Das Feld Räume ist erforderlich.',
            'from_rooms.integer' => 'Das Feld Räume muss ein Ziffer sein.',
            'from_rooms.numeric' => 'Das Feld Räume muss ein Ziffer sein.',
            'from_carry_distance.required' => 'Das Feld Tragestrecke ist erforderlich.',
            'from_carry_distance.integer' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'from_carry_distance.numeric' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'from_building_type.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            'to_street.required' => 'Das Feld Straße ist erforderlich.',
            'to_street.string' => 'Das Feld Straße muss eine Zeichenfolge sein',
            'to_location.required' => 'Das Feld Ort ist erforderlich.',
            'to_location.string' => 'Das Feld Ort muss eine Zeichenfolge sein',
            'to_floor.integer' => 'Das Feld Etage muss ein Ziffer sein.',
            'to_floor.numeric' => 'Das Feld Etage muss ein Ziffer sein.',
            'to_sq_m.required' => 'Das Feld Größe ist erforderlich.',
            'to_sq_m.integer' => 'Das Feld Größe muss ein Ziffer sein.',
            'to_sq_m.numeric' => 'Das Feld Größe muss ein Ziffer sein.',
            'to_elevator.string' => 'Das Feld Fahrstuhl muss eine Zeichenfolge sein',
            'to_zip.required' => 'Die Postleitzahl ist erforderlich.',
            'to_zip.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'to_zip.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'to_province.required' => 'Das Feld Land ist erforderlich.',
            'to_province.string' => 'Das Feld Land muss eine Zeichenfolge sein',
            'to_rooms.required' => 'Das Feld Räume ist erforderlich.',
            'to_rooms.integer' => 'Das Feld Räume muss ein Ziffer sein.',
            'to_rooms.numeric' => 'Das Feld Räume muss ein Ziffer sein.',
            'to_carry_distance.required' => 'Das Feld Tragestrecke ist erforderlich.',
            'to_carry_distance.integer' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'to_carry_distance.numeric' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'to_building_type.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            ]
        )->validate();

        return $request;
    }
}
