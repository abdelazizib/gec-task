<?php

namespace App\Models;

use App\Enums\Gender;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Application extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];
    protected $casts = [
        'birth_date' => 'date',
        'gender' => Gender::class,
        'contact_phone' => E164PhoneNumberCast::class,
    ];

    // ---------------  \\
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files');
    }
    // ---------------  \\
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


