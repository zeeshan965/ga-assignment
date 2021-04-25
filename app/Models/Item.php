<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'price', 'category' ];

    /**
     * @return BelongsTo
     */
    public function category ()
    {
        return $this -> belongsTo ( Categories::class, 'category', 'id' );
    }
}
