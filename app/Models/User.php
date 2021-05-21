<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable, HasMedia
{
    use HasFactory, HasMediaTrait, Notifiable, SoftDeletes, HasRoles, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'surname',
        'email',
        'password',
        'community',
        'province',
        'cp',
        'tlfNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d/m/Y');
    }

    /**
     * Relacion One to Many con Announces
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function announces() {
        return $this->hasMany(Announce::class);
    }

    /*
     * Metodo que nos permite registrar una nueva colección en el mediaLibrary y darle varias opciones.
     */
    public function registerMediaCollections()
    {
        // Coleccion avatar
        $this->addMediaCollection('avatar')
            // Esta colección solo permitirá un unico fichero, si subimos varios, subirá el ultimo dado.
            ->singleFile()
            // Indicamos el disco en el que se va a guardar las imagenes
            ->useDisk('users_avatar')
            // Filtro que permite solo subida de imagenes tipo jpg, png y jpeg
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg']);
    }

    /*
     * Método que nos permite crear una variación para las imagenes, en este caso, crear una imagen
     * de menor resolución
     */
    public function registerMediaConversions(Media $media = null)
    {
        // Colección avatar dummy
        try {
            $this->addMediaConversion('avatar-thumb')
                ->width(200) // Ancho de 50px
                ->height(200) // Alto de 50px
                ->sharpen(10) // Nitidez de 10
                // Añadimos la colección sobre la que se va a crear el dummy
                ->performOnCollections('avatar')
                ->nonQueued();
        }catch(\Exception $exception) {
            print($exception);
        }
    }
}
