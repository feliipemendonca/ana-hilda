<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = "contacts";

    public function setData(&$contact, $request)
    {
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->phone = $request['phone'];
        $contact->message = $request['message'];
    }
}
