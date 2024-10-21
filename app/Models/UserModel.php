<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user'; 
    protected $primaryKey = 'user_id';
    protected $fillable = ['image', 'username', 'password', 'nama', 'level_id', 'created_id', 'updated_at'];

    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

    /**
     * Relasi ke tabel level
     */
    public function level(): BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Mendapatkan nama role
     */
    public function GetRoleName(): string {
        return $this->level->level_nama;
    }

    public function hasRole($role): bool {
        return $this->level->level_kode == $role;
    }

    public function getRole() {
        return $this->level->level_kode;
    }
};