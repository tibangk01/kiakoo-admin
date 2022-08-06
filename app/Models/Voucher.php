<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use FrittenKeeZ\Vouchers\Models\Voucher as ModelsVoucher;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Voucher
 *
 * @property int $id
 * @property string $code
 * @property string|null $owner_type
 * @property int|null $owner_id
 * @property string|null $metadata
 * @property Carbon|null $starts_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $redeemed_at
 * @property bool $is_for_discount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Redeemer[] $redeemers
 * @property Collection|VoucherEntity[] $voucher_entities
 *
 * @package App\Models
 */
class Voucher extends ModelsVoucher
{
	protected $table = 'vouchers';

	protected $casts = [
		'owner_id' => 'int',
		'is_for_discount' => 'bool'
	];

	protected $dates = [
		'starts_at',
		'expires_at',
		'redeemed_at'
	];

	protected $fillable = [
		'code',
		'owner_type',
		'owner_id',
		'metadata',
		'starts_at',
		'expires_at',
		'redeemed_at',
		'is_for_discount'
	];
}
