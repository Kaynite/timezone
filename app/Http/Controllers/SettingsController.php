<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings()
    {
        $settings = Settings::first();
        if ($settings) {
            return view('adminlte.settings.settings')
                ->with('settings', $settings);
        } else {
            return view('adminlte.settings.first');
        }
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

        foreach (['logo', 'icon'] as $file) {
            if ($request->hasFile($file)) {
                $ext             = $request->file($file)->getClientOriginalExtension();
                $path            = $request->file($file)->storeAs('settings', "$file.$ext");
                $settings->$file = $path;
                $settings->save();
            }
        }

        if ($settings) {
            $settings->update([
                'name_ar'        => $request->name_ar,
                'name_en'        => $request->name_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'keywords'       => $request->keywords,
                'email'          => $request->email,
                'status'         => $request->status,
                'message'        => $request->message,
            ]);
        } else {
            Settings::create([
                'name_ar'        => $request->name_ar,
                'name_en'        => $request->name_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'keywords'       => $request->keywords,
                'email'          => $request->email,
                'status'         => $request->status,
                'message'        => $request->message,
            ]);
        }

        return redirect()->route('admin.settings')
            ->with('success', 'Settings were updated successfully!');
    }
}
