<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;
class InvoiceCreated extends Mailable
{
    use Queueable, SerializesModels;

    
public $invoice;
public function __construct(Invoice $invoice)
{
$this->invoice = $invoice;
}
public function build()
{ 
    $filePath = storage_path('app/private/invoices/ex2.pdf');
return $this->view('emails.invoice_created')
->subject('Nouvelle facture créée par Nisrine')
->attach($filePath, [
    'as' => 'facture.pdf',  // Nom du fichier attaché
    'mime' => 'application/pdf',  // Type MIME du fichier
])
->with(['invoice' => $this->invoice]);

}

    /**
     * Create a new message instance.
     */
 

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Created',
        );
    }

    /**
     * Get the message content definition.
     */
 

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
