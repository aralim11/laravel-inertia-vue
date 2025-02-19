<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $locale = $request->lang;
            if (!in_array($locale, ['en', 'bn', 'jp'])) {
                throw new \Exception('Invalid locale provided');
            }

            ## Set the application locale
            App::setLocale($locale);

            ## Store the selected locale in the session
            Session::put('locale', $locale);

            ## Redirect to the users index route
            return redirect()->back();
        } catch (\Exception $e) {

            ## Redirect with an error message
            return redirect()->back();
        }
    }
}
