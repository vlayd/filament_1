<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Enums\OrderPaymentMethod;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'payment_method',
        'payment_status',
        'payment_id',
        'payment_qr_code_image',
        'payment_qr_code_payload',
        'payment_qr_code_expiration_date',
        'paid_at',
        'total_amount' => MoneyCast::class,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'user_id' => 'integer',
            'payment_qr_code_expiration_date' => 'datetime',
            'paid_at' => 'datetime',
            'total_amount' => MoneyCast::class,
            'payment_method' => OrderPaymentMethod::class,
            'payment_status' => OrderStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
