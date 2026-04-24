<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Article $article) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre article a été publié !',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.article-created',
            with: ['article' => $this->article],
        );
    }
}
