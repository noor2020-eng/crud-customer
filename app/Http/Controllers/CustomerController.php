<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index',compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confPassword' => 'required',
        ]);
         if ($request->password == $request->confPassword) {
             $customer = new Customer();
             $data = $request->only($customer->getFillable());
             $data['password'] = bcrypt($request->password);
             $data['confPassword'] = bcrypt($request->confPassword);
             Customer::query()->create($data);
             return redirect()->route('Customer.index');
         } else {
             echo "password mismatch";
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $customer = Customer::find($id);
        return  view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $customer = Customer::find($id);
        if(!$customer){
            abort(404);  //page not found
        }
        return view('customer.edit',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $data = $request->only($customer->getFillable());
        $data['password'] = bcrypt($request->password);
        $customer->update($data);
        return redirect()->route('Customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('Customer.index');
    }
}



