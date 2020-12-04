<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\AccountSettingsRequest;

class DashboardSettings extends Controller
{
    public function store() 
    {
        $user = Auth::user();
        return view('admin.account.dashboard-settings', [
            'user' => $user
        ]);
    }

    public function update(AccountSettingsRequest $request, $redirect)
    {
        $data = $request->all();
        $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
        // Kondisional ketika user mengubah password-nya
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
