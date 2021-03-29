<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Location;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(Request $request){
        try {
            $data = $request->all();
            if(empty($data)){
                $sort_by = 'ASC';
                $customer_all_data = Customer::with('location')->orderBy('updated_at', 'DESC')->paginate(10);
            } else {
                $sort_by = $data['sortBy'];
                $customer_obj_data = Customer::with('location');
                if(in_array($data['sort'], ['firstname', 'lastname'])){
                    $customer_all_data = $customer_obj_data->orderBy('customers.'.$data['sort'], $sort_by)
                        ->paginate(10);
                } else {
                    $customer_all_data = $customer_obj_data->join('locations', 'locations.id', '=', 'customers.location_id')
                        ->orderBy('locations.location_name', $sort_by)
                        ->paginate(10);
                }
            }
                $pagination = $customer_all_data->render();
            $data['perPage'] = $customer_all_data->perPage();
            $data['pagination'] = $pagination;
            $data['customer_all_data'] = $customer_all_data;
            $data['sort_by'] = $sort_by;
            return view('customer.list', $data);
        } catch (\Exception $e) {
            \DB::rollback();
            return \Redirect::to('/customer')->with('errormessage', $e->getMessage());
        }

    }


    //add customer
    public function add(){

        return view('customer.add');
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'location_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $data = $request->all();
            \DB::beginTransaction();

            $location = Location::updateOrCreate(
                [
                    'location_name' => $data['location_name']
                ],
                [
                    'location_name' => $data['location_name']
                ]
            );

            $customer = Customer::updateOrCreate(
                [
                    'firstname' => $data['first_name'],
                    'lastname' => $data['last_name'],
                    'location_id' => $location->id
                ],
                [
                    'firstname' => $data['first_name'],
                    'lastname' => $data['last_name'],
                    'location_id' => $location->id
                ]
            );


            \DB::commit();
            return redirect('/customers')->with('message',"Customer Created Successfully !");

        } catch (\Exception $e) {
            \DB::rollback();
            return \Redirect::to('/customer')->with('errormessage', $e->getMessage());
        }
    }
}
