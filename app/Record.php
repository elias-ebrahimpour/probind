<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     * The database table used by the model.
     */
    protected $table = 'records';
    protected $fillable = [
        'name',
        'ttl',
        'type',
        'priority',
        'data'
    ];

    /**
     * Valid Record Types. These will be used to validation.
     * @var array
     */
    public static $validInputTypes = [
        'A'     => 'A',
        'AAAA'  => 'AAAA',
        'CNAME' => 'CNAME',
        'MX'    => 'MX',
        'NS'    => 'NS',
        'PTR'   => 'PTR',
        'SRV'   => 'SRV',
        'TXT'   => 'TXT'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'     => 'string',
        'ttl'      => 'integer',
        'type'     => 'string',
        'priority' => 'integer',
        'data'     => 'string'
    ];

    /**
     * Set the Record's type uppercase.
     *
     * @param  string $value
     * @return string
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtoupper($value);
    }

    /**
     * Set the Record's name lowercase.
     *
     * @param  string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Set the Record's data lowercase.
     *
     * @param  string $value
     * @return string
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = strtolower($value);
    }

    /**
     * A record belongs to a zone.
     */
    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }
}
