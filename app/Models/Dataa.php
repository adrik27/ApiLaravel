<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function scopeFilter($query, array $filter)
    // {
    //     $query->when(
    //         $filter['search'] ?? false,
    //         fn ($query, $search) => $query->where('name', 'like', '%' . $search  . '%')
    //             ->orWhere('username', 'like', '%' . $search . '%')
    //     );
    // }
}
