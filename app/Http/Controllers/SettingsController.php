<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings()
    {
        $settings = Settings::first();
        return view('adminlte.settings.settings')
            ->with('settings', $settings);
    }

    public function update(Request $request)
    {
        $settings = Settings::first();

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'email'   => 'email',
            'logo'    => 'image',
            'icon'    => 'image',
            'status'  => 'in:1,0',
        ]);

        foreach(['logo', 'icon'] as $file) {
            if($request->hasFile($file)) {
                $ext = $request->file($file)->getClientOriginalExtension();
                $path = $request->file($file)->storeAs('settings', "$file.$ext");
                $settings->$file = $path;
                $settings->save();
            }
        }

        $settings->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'email'   => $request->email,
            'status'  => $request->status,
        ]);

        return redirect()->route('admin.settings')
            ->with('success', 'Settings were updated successfully!');
    }
}
