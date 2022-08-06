<?php

namespace App\Repositories;

use Carbon\Carbon;

use App\Models\Voucher;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use AwesIO\Repository\Eloquent\BaseRepository;

class VoucherRepository extends BaseRepository
{
    public function entity()
    {
        return Voucher::class;
    }

    /** simple voucher methods */

    public function countSimpleVoucher()
    {
        return $this
            ->entity
            ->where('is_for_discount', false)
            ->get()
            ->count();
    }

    public function whereIsSimpleVoucher()
    {
        return $this
            ->entity
            ->where('is_for_discount', false)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function add($expires_at, $metadata, $amount)
    {
        return Vouchers::withMetadata($metadata)
            ->withExpireDate(Carbon::parse($expires_at))
            ->withMetadata($metadata)
            ->withPrefix(config('kiakoo.coupon_prefix.simple'))
            ->create($amount);
    }

    /** discount voucher methods */

    public function countDiscountVoucher()
    {
        return $this
            ->entity
            ->where('is_for_discount', true)
            ->get()
            ->count();
    }

    public function whereIsDiscountVoucher()
    {
        return $this
            ->entity
            ->where('is_for_discount', true)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
