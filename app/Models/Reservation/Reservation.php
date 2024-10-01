<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";
    protected $fillable = [
        "name",
        "phone_number",
        "num_guests",
        "check_in_date",
        "destination",
        "price",
        "user_id",
        "status",

    ];
    public $timestamps = true;
}
