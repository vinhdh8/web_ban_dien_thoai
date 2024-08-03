<?php

namespace App\Mail;

use App\Models\DonHang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonHangConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;
    /**
     * Create a new message instance.
     */
    public function __construct(DonHang $donHang)
    {
        $this->donHang = $donHang;
    }
    /**
     * Build a new message instance.
     */
    public function build(){
        return $this->subject('Xác nhận đơn hàng')
        ->markdown('client.donhang.mail')
        ->with('donHang', $this->donHang);
    }
}
