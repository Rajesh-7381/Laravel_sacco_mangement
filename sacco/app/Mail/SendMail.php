<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $save; //This property holds the data that will be passed to the Mailable class during its construction.
    public function __construct($save) //This is the constructor method of the Mailable class. It's used to initialize the Mailable class properties when an instance of the class is created.
    {
        //$save: The constructor takes a parameter $save, and the value passed to it is assigned to the $save property of the class ($this->save = $save;).
        $this->save=$save;
    }

    public function build() //This method is a required method in Laravel Mailable classes. It returns the email message.
{
    // 
// Markdown is a lightweight markup language with plain-text formatting syntax
    return $this->markdown('admin.emails.staff_account')  //return $this->markdown('admin.emails.staff_account'): This specifies the Markdown file used for the email content. It refers to the staff_account.blade.php file located in the admin/emails directory within the resources/views folder.
    // here app.name  retrives .env
    // Sets the subject of the email. config('app.name') retrieves the APP_NAME value from the .env file. It appends it with the specified subject for the email, which is "Staff Account Creation Mail".
                ->subject(config('app.name') . ', Staff Account Creation Mail');
}


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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

