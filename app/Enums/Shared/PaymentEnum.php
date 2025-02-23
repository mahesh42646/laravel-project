<?php

namespace App\Enums\Shared;

enum PaymentEnum: int
{
    case MONEY = 1;
    case PIX = 2;
    case CARD = 3;
    case CHEQUE = 4;
    case OTHER = 99;

    public function getName(): string
    {
        return match($this) {
            static::MONEY => 'payment_money',
            static::PIX => 'payment_pix',
            static::CARD => 'payment_card',
            static::CHEQUE => 'payment_cheque',
            static::OTHER => 'payment_company',
        };
    }

    public function getPaidAt(): string
    {
        return match($this) {
            static::MONEY => 'payment_money_paid_at',
            static::PIX => 'payment_pix_paid_at',
            static::CARD => 'payment_card_paid_at',
            static::CHEQUE => 'payment_cheque_paid_at',
            static::OTHER => 'payment_company_paid_at',
        };
    }

    public function getTitle(): string
    {
        return match($this) {
            static::MONEY => 'Dinheiro',
            static::PIX => 'Pix',
            static::CARD => 'Cartão',
            static::CHEQUE => 'Cheque',
            static::OTHER => 'Outro',
        };
    }

    public function getSubtitle(): string
    {
        return match($this) {
            static::MONEY => 'À vista',
            static::PIX => 'À vista',
            static::CARD => 'Cartão ou Debito',
            static::CHEQUE => 'Vencimento',
            static::OTHER => 'Outra Forma',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::MONEY => asset('assets/images/payments/money.svg'),
            static::PIX => asset('assets/images/payments/pix.svg'),
            static::CARD => asset('assets/images/payments/card.svg'),
            static::CHEQUE => asset('assets/images/payments/transfer.svg'),
            static::OTHER => asset('assets/images/payments/company.svg'),
        };
    }
}
