<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create() {
        $companies = Company::all();

        return view('customers.create', compact('companies'));
    }

    public function store() {
        // dd(request('name', 'no name'));
        $data = request()->validate([
            'name' => 'bail|required|min:3',
            // 'optionalvalue' => 'nullable|min:3'
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required'
        ]);

        Customer::create($data);

        return redirect('/customers');
    }

    public function show(Customer $customer) {
        // use firstOrFail() instead of find() so that if the record
        // does not exist, it will return 404 page instead of crashing
        // $customer = Customer::where('id', $cid)->firstOrFail();

        /* BUT if you put Customer in param, it will use route-model binding
        ** so no need for extra codes */

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {
        $data = request()->validate([
            'name' => 'bail|required|min:3',
            'email' => 'required|email',
        ]);
        $customer->update($data);

        return redirect(url('/customers\/') . $customer->id);
    }
}
