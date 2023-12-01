<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $request->validate([
            'Hno' => 'required|max:10',
            'area' => 'required|max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required|max:40',
            'zip' => 'required',
            'tel' => 'required',
            'name' => 'required|max:40',
            'email' => 'required|email|max:50',
            'payment' => 'required',
        ], [
            'Hno.required' => "Please enter House number",
            'area.required' => "Please enter Area name",
            'city.required' => "Please enter City name",
            'state.required' => "Please enter State name",
            'country.required' => "Please enter Country name",
            'zip.required' => "Please enter ZIP code",
            'tel.required' => "Please enter Telephone number",
            'name.required' => "Please enter your Name",
            'email.required' => "Please enter email Address",
            'payment.required' => "Please select Payment Method",
        ]);

        if ($request['payment'] == "COD") {
            return $next($request);
        } else {
            session()->put('payment_data', $request->all());
            return redirect('/payment/get');
        }
    }
}
