<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CampaignNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name='';
    protected $email='';
    protected $shop_name='';
    protected $productName='';
    protected $campaignName='';
    public function __construct($name, $email, $shop_name,$productName,$campaignName)
    {
        $this->name=$name;
        $this->email=$email;
        $this->shop_name=$shop_name;
        $this->productName=$productName;
        $this->campaignName=$campaignName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Campaign Notification- $this->campaignName",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.campaignNotification',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'shop_name' => $this->shop_name,
                'productName' => $this->productName,
                'campaignName' => $this->campaignName,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
