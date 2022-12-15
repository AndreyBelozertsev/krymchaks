<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\SendContactForm;
use App\Http\Requests\SaveSettingsRequest;
use App\Events\SendContactForm as SendContactFormEvent;

class SettingController extends Controller
{
    public function contactIndex()
    {
        return view('page.contact');
    }

    public function sendForm(SendContactForm $request)
    {
        event(new SendContactFormEvent($request));
        return response()->json(['success' => 'success']);
    }

    public function save(SaveSettingsRequest $request)
    {
        Setting::truncate();
        $data=[];
        foreach($request->input() as $k => $v){
            Cache::forget("setting.contact.$k");
            if(empty($v)){
                continue;
            }
            $data[]=[
                'key' => $k,
                'value'=>$v
            ];
        }
        
        Setting::insert($data);

        return redirect()->back()->with('success_message', "Настройки успешно обновлены");
    }

    public function policyIndex()
    {
        $policy = Setting::where('key','policy')
                    ->select('value')
                    ->firstOrFail();
        return view('page.policy', compact('policy') );
    }
}
