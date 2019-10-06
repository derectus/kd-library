<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Barrow;
use App\Models\User;
use App\Notifications\CollectionDelayReminder;
use App\Notifications\ShippingCode;
use Illuminate\Http\Request;

class EmailController extends AdminController
{
    public function sendMail(Request $request, $userID)
    {
        // validate request
        $validated = $request->validate([
            'mailtype' => ['required', 'string', 'regex:/s[rc]-?/'],
            'code' => ['nullable', 'string', 'max:25'],
            'company' => ['nullable', 'string', 'max:25'],
        ]);

        // get barrow id from sellector string
        $barrowID = substr($validated['mailtype'], 3);

        // find user and barrow
        $user = User::findOrFail($userID);
        $barrow = Barrow::findOrFail($barrowID);

        // if mail subject is shipping code
        if (substr($validated['mailtype'], 0, 2) == "sc") {

            // shipping code if exist
            if (!is_null($validated['code'])) {
                // update sent shipping info and notify user
                $barrow->update(['sent_code' => $validated['code'], 'shippng_company' => $validated['company']]);
                $user->notify(new ShippingCode($user, $barrow));

            } else {

                return redirect()->route('admin.users.edit', $userID)
                    ->with('class', 'warning')
                    ->with('message', __('Beklenmeyen bir hata oluştu lütfen sonra tekrar deneyiniz. !'));
            }

        } else if (substr($validated['mailtype'], 0, 2) == "sr") {  // if mail subject is delay remainder
            // notify to user
            $user->notify(new CollectionDelayReminder($user, $barrow));

        } else
            return redirect()->route('admin.users.edit', $userID)
                ->with('class', 'warning')
                ->with('message', __('Beklenmeyen bir hata oluştu lütfen sonra tekrar deneyiniz. !'));

        return redirect()->route('admin.users.edit', $userID)
            ->with('class', 'success')
            ->with('message', __('E-Posta Başarıyla Gönderildi !'));
    }
}
