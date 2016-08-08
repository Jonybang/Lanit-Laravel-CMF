<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    protected $table = 'contexts';

    protected $fillable = [
        'key',
        'name',
        'description'
    ];

    /**
     * @Relation
     */
    public function settings() {
        return $this->hasMany(Setting::class, 'context_id');
    }
    public function getSettingsValuesAttribute() {
        return $this->settings->lists('value', 'key')->toArray();
    }
    /**
     * @Relation
     */
    public function pages() {
        return $this->hasMany(Page::class, 'context_id');
    }
}
