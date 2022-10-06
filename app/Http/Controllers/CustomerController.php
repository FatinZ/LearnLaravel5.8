<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerRegisteredEvent;

class CustomerController extends Controller
{
    public function __construct()
    {
        // ->except('[]') to not include specified method under middleware
        // ->only('[]') to include only specified method under middleware
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        // dd(request('name', 'no name'));
        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerRegisteredEvent($customer));

        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        // use firstOrFail() instead of find() so that if the record
        // does not exist, it will return 404 page instead of crashing
        // $customer = Customer::where('id', $cid)->firstOrFail();

        /* BUT if you put Customer in param, it will use route-model binding
        ** so no need for extra codes */

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect(url('/customers\/') . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'bail|required|min:3',
            // 'optionalvalue' => 'nullable|min:3'
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required'
        ]);
    }
}
