<?php

namespace App\Mail;

use Faker\Provider\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use function Illuminate\Mail\Mailables\from;
use function Illuminate\Mail\Mailables\subject;
use App\Models\Customer;
use Illuminate\Mail\Mailables\Address;

/**
 * Add ShouldQueue para deixar em fila
 */
class NewCustomerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public readonly Customer $customer,
        public readonly string $secret,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     * pt-br: Retorna de quem está enviando [e-mail and name application laravel].
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('app.name')),
            subject: 'Seu acesso ao Refrigerator Control',

        );
    }

    /**
     * Get the message content definition.
     * pt-br: View de MAIL | array [name application, email and secret]
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-customer',
            with: [
                'customer'  => $this->customer,
                'secret'    => $this->secret,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
