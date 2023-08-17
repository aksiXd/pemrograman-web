<?php

namespace App\Http\Controllers\User;

use App\Models\GuestBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function homepage()
    {
        $session = Session::get('username');

        if (!$session) {
            return redirect(route('sign-in'));
        }

        $guestBooks = GuestBook::get();
        $today = date('l, d F Y');

        return view('user.homepage', compact('today', 'guestBooks'));
    }

    function addGuestBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|regex:/^\S*$/',
            'email' => 'required|regex:/\d/',
            'address' => 'required|max:50|regex:/\d/',
            'city' => 'required|max:50|regex:/\d/',
            'message' => 'required|max:50|regex:/\d/',
        ]);

        if ($validator->fails()) {
            Session::flash('error');
            return redirect()->back();
        }

        $guestBook = GuestBook::create([
            'posted' => now(),
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'message' => $request->message
        ]);

        $guestBook->save();
        Session::flash('addSuccess');
        return redirect(route('homepage'));
    }

    function updateGuestBook($id)
    {
        $session = Session::get('username');

        if (!$session) {
            return redirect(route('sign-in'));
        }

        $guestBook = GuestBook::findOrFail($id);
        return view('user.update', compact('guestBook'));
    }

    function saveGuestBook(Request $request, $id)
    {
        $guestBook = GuestBook::findOrFail($id);

        $guestBook->name = $request->name;
        $guestBook->email = $request->email;
        $guestBook->address = $request->address;
        $guestBook->city = $request->city;
        $guestBook->message = $request->message;

        $guestBook->save();

        Session::flash('saveSuccess');
        return redirect(route('homepage'));
    }

    function deleteGuestBook($id)
    {
        $guestBook = GuestBook::findOrFail($id);

        $guestBook->delete();
        Session::flash('deleteSuccess');
        return redirect()->back();
    }
}
