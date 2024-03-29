<?php

namespace Aic\Hub\Foundation;

use Aic\Hub\Foundation\Models\Concerns\CanValidateId;
use Aic\Hub\Foundation\Models\Concerns\HasByLastModScope;
use Aic\Hub\Foundation\Models\Concerns\Singletonable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    use CanValidateId;
    use HasByLastModScope;
    use Singletonable;
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing. We don't want this in most cases.
     * Whenever possible, we want to preserve the IDs as found in the source system.
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that aren't mass assignable. Contrary to Laravel's defaults, we want all attributes
     * to be mass assignable for import. This is safe, because we never use user input to modify models.
     *
     * @var array
     */
    protected $guarded = [];
}
