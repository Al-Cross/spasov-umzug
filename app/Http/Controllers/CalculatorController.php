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
            'anrede' => 'required|string',
            'vorname' => 'required|string',
            'nachname' => 'required|string',
            'telefon' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date_format:Y-m-d',
            'kostentraeger' => 'required',
            'bemerkungen' => 'string|nullable',
            'von_strasse' => 'required|string',
            'von_ort' => 'required|string',
            'von_etage' => 'nullable|integer|numeric',
            'von_groesse' => 'required|integer|numeric',
            'von_fahrstuhl' => 'string|nullable',
            'von_postleitzahl' => 'required|integer|numeric',
            'von_land' => 'required|string',
            'von_raume' => 'required|integer|numeric',
            'von_tragestrecke' => 'required|integer|numeric',
            'von_gebaudeart' => 'string|nullable',
            'nach_strasse' => 'required|string',
            'nach_ort' => 'required|string',
            'nach_etage' => 'nullable|integer|numeric',
            'nach_groesse' => 'required|integer|numeric',
            'nach_fahrstuhl' => 'string|nullable',
            'nach_postleitzahl' => 'required|integer|numeric',
            'nach_land' => 'required|string',
            'nach_raume' => 'required|integer|numeric',
            'nach_tragestrecke' => 'required|integer|numeric',
            'nach_gebaudeart' => 'string|nullable',
            ],
            [
            'anrede.required' => 'Das Feld Anrede ist erforderlich.',
            'anrede.string' => 'Das Feld Anrede muss eine Zeichenfolge sein',
            'vorname.required' => 'Das Feld Vorname ist erforderlich.',
            'vorname.string' => 'Das Feld Vorname muss eine Zeichenfolge sein',
            'nachname.required' => 'Das Feld Nachname ist erforderlich.',
            'nachname.string' => 'Das Feld Nachname muss eine Zeichenfolge sein',
            'telefon.required' => 'Das Feld Telefon ist erforderlich.',
            'telefon.string' => 'Das Feld Telefon muss eine Zeichenfolge sein',
            'email.required' => 'Das Feld Email ist erforderlich.',
            'email.string' => 'Das Feld Email muss eine Zeichenfolge sein',
            'date.required' => 'Das Feld Termin ist erforderlich.',
            'date.date_format' => 'Das Feld Termin muss im Format mm/dd/yyyy sein.',
            'kostentraeger.required' => 'Das Feld Kostenträger ist erforderlich.',
            'bemerkungen.string' => 'Das Feld Bemerkungen muss eine Zeichenfolge sein',
            'von_strasse.required' => 'Das Feld Straße ist erforderlich.',
            'von_strasse.string' => 'Das Feld Straße muss eine Zeichenfolge sein',
            'von_ort.required' => 'Das Feld Ort ist erforderlich.',
            'von_ort.string' => 'Das Feld Ort muss eine Zeichenfolge sein',
            'von_etage.integer' => 'Das Feld Etage muss ein Ziffer sein.',
            'von_etage.numeric' => 'Das Feld Etage muss ein Ziffer sein.',
            'von_groesse.required' => 'Das Feld Größe ist erforderlich.',
            'von_groesse.integer' => 'Das Feld Größe muss ein Ziffer sein.',
            'von_groesse.numeric' => 'Das Feld Größe muss ein Ziffer sein.',
            'von_fahrstuhl.string' => 'Das Feld Fahrstuhl muss eine Zeichenfolge sein',
            'von_postleitzahl.required' => 'Die Postleitzahl ist erforderlich.',
            'von_postleitzahl.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'von_postleitzahl.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'von_land.required' => 'Das Feld Land ist erforderlich.',
            'von_land.string' => 'Das Feld Land muss eine Zeichenfolge sein',
            'von_raume.required' => 'Das Feld Räume ist erforderlich.',
            'von_raume.integer' => 'Das Feld Räume muss ein Ziffer sein.',
            'von_raume.numeric' => 'Das Feld Räume muss ein Ziffer sein.',
            'von_tragestrecke.required' => 'Das Feld Tragestrecke ist erforderlich.',
            'von_tragestrecke.integer' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'von_tragestrecke.numeric' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'von_gebaudeart.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            'nach_strasse.required' => 'Das Feld Straße ist erforderlich.',
            'nach_strasse.string' => 'Das Feld Straße muss eine Zeichenfolge sein',
            'nach_ort.required' => 'Das Feld Ort ist erforderlich.',
            'nach_ort.string' => 'Das Feld Ort muss eine Zeichenfolge sein',
            'nach_etage.integer' => 'Das Feld Etage muss ein Ziffer sein.',
            'nach_etage.numeric' => 'Das Feld Etage muss ein Ziffer sein.',
            'nach_groesse.required' => 'Das Feld Größe ist erforderlich.',
            'nach_groesse.integer' => 'Das Feld Größe muss ein Ziffer sein.',
            'nach_groesse.numeric' => 'Das Feld Größe muss ein Ziffer sein.',
            'nach_fahrstuhl.string' => 'Das Feld Fahrstuhl muss eine Zeichenfolge sein',
            'nach_postleitzahl.required' => 'Die Postleitzahl ist erforderlich.',
            'nach_postleitzahl.integer' => 'Die Postleitzahl muss ein Ziffer sein.',
            'nach_postleitzahl.numeric' => 'Die Postleitzahl muss ein Ziffer sein.',
            'nach_land.required' => 'Das Feld Land ist erforderlich.',
            'nach_land.string' => 'Das Feld Land muss eine Zeichenfolge sein',
            'nach_raume.required' => 'Das Feld Räume ist erforderlich.',
            'nach_raume.integer' => 'Das Feld Räume muss ein Ziffer sein.',
            'nach_raume.numeric' => 'Das Feld Räume muss ein Ziffer sein.',
            'nach_tragestrecke.required' => 'Das Feld Tragestrecke ist erforderlich.',
            'nach_tragestrecke.integer' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'nach_tragestrecke.numeric' => 'Das Feld Tragestrecke muss ein Ziffer sein.',
            'nach_gebaudeart.string' => 'Die Gebäudeart muss eine Zeichenfolge sein',
            ]
        )->validate();

        return $request;
    }
}
