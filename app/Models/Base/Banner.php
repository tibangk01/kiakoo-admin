<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Banner
 * 
 * @property int $id
 * @property string $url
 * @property Carbon $created_at
 * @property string $deleted_at
 *
 * @package App\Models\Base
 */
class Banner extends Model
{
	use SoftDeletes;
	protected $table = 'banners';
	public $timestamps = false;
}
