<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;

class ApiController extends Controller
{
    public function getFetchUsers()
    {
        $users = User::with('contracts')->where('role', '!=', 0)->orderBy('created_at', 'desc')->get();

        foreach ($users as $user) {
            $user->role = $user->transRole();
        }

        return response([
            'status' => 200,
            'message' => [
                'title' => 'Gebruikers',
                'body' => 'Gebruikers gevonden en worden getoond',
                'type' => 'success'
            ],
            'data' => $users
        ], 200);
    }

    public function postCreateUser(Request $request)
    {
        $validator = Validator::make($request->user, [
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'role' => 'required|numeric'
        ],[
            'email.required' => 'Een E-mail is een verplicht veld...',
            'email.email' => 'Dit is geen correct e-email adres feutneus...',
            'name' => 'Heeft deze feut geen naam ofzo?',
            'role.required' => 'is dit nog een feut of jaarsch?'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 203,
                'message' => [
                    'title' => 'Gebruiker aanmaken Mislukt!',
                    'body' => $validator->getMessageBag()->first(),
                    'type' => 'error'
                ],
                'data' => $request->user
            ], 203);
        }

        $user = new User();
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->password = Hash::make('deheiligezeug%%');
        $user->role = $request->user['role'];
        $user->save();

        return response([
            'status' => 200,
            'message' => [
                'title' => 'Aangemaakt!',
                'body' => $user->name . " is aangemaakt, er is een email verzonden naar zijn/haar adres met het wachtwoord",
                'type' => 'success'
            ],
            'data' => $request->user
        ], 200);

        # TODO: Send mail with password
    }

    public function postSaveUser(Request $request)
    {
        $validator = Validator::make($request->user, [
            'id' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 203,
                'message' => [
                    'title' => 'Aanpassing Mislukt!',
                    'body' => 'Vereiste parameters niet meegegeven.',
                    'type' => 'error'
                ],
                'data' => $request->user
            ], 203);
        }

        $user = User::find($request->user['id']);
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];

        if ($user->isDirty()) {
            if (User::where('email', '=', $request->user['email'])->exists()) {
                return response([
                    'status' => 203,
                    'message' => [
                        'title' => 'Aanpassing Mislukt!',
                        'body' => 'Email bestaat al.',
                        'type' => 'error'
                    ],
                    'data' => $request->user
                ], 203);
            }

            $user->save();

            $message = [
                'title' => 'Aanpassing',
                'body' => $user->name . " is aangepast, er is een email verzonden naar zijn/haar adres",
                'type' => 'success'
            ];
        } else {
            $message = [
                'title' => 'Geen aanpassing',
                'body' => "Er was geen aanpassing doorgevoerd",
                'type' => 'info'
            ];
        }

        return response([
            'status' => 200,
            'message' => $message,
            'data' => $request->user
        ], 200);
    }
}
