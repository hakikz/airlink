<?php

namespace App\Http\Controllers\Backend;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    public function create(){
        $setting = Setting::find(1);
        // dd($setting);
        if(!empty($setting)){
            return view('backend.settings.update', ['setting' => $setting]);
        }
        else{
            return view('backend.settings.create');
        }
    }

    public function store(Request $request){
        request()->validate([
            'vat_no' => 'required',
            'price_per_kg' => 'required',
            'vat_value' => 'required',
        ]);
        $setting = new Setting();
        $setting->id = 1;
        $setting->vat_no = request('vat_no');
        $setting->price_per_kg = request('price_per_kg');
        $setting->vat_value = request('vat_value');
        $setting->save();

        $request->session()->flash('success', 'Settings Successfully Created!');
        return redirect(route('backend.settings.create'));
    }

    public function update(Request $request, $id){
        request()->validate([
            'vat_no' => 'required',
            'price_per_kg' => 'required',
            'vat_value' => 'required',
        ]);
        $setting = Setting::find($id);
        $setting->vat_no = request('vat_no');
        $setting->price_per_kg = request('price_per_kg');
        $setting->vat_value = request('vat_value');
        $setting->save();

        $request->session()->flash('success', 'Settings Successfully Updated!');
        return redirect(route('backend.settings.create'));
    }
}
