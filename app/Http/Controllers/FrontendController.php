<?php

namespace App\Http\Controllers;

use App\Library\Pancard;
use App\Models\Log;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request): View
    {
        return view('frontend.welcome');
    }

    public function create(Request $request)
    {
        try {
            $pancard = Pancard::create();
            $formValue = [
                "encryptedRequest"  => $pancard['encryptionOutput'],
                "Signature"         => $pancard['signature'],
                "entityCode"        => config('ayt.pan-card-service.entityCode'),
                "transactionId"     => $pancard['transactionId'],
                "authKey"           => $pancard['authKey'],
            ];

            Log::create([
                'ip'        => $request->ip(),
                'txn_id'    => str($pancard['transactionId'])->explode(':')->get(1),
            ]);

            return view('frontend.redirect', compact('formValue'));
        } catch (\Throwable $th) {
            return to_route('home')->withError($th->getMessage());
        }
    }

    public function return(Request $request)
    {
        dd($request->except('site_settings'));
    }
}
