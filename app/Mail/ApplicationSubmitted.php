<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;
use Illuminate\Support\Facades\Storage;

class ApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Application $application)
    {
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Application Submitted'
        );
    }
    public function content(): Content
    {
        // ---------------- \\
        $pdfPath = "applications/application_{$this->application->id}.pdf";
        // ---------------- \\
        Storage::disk('public')->makeDirectory('applications');
        // ---------------- \\
        DomPdf::loadView('pdf.application', [
            'application' => $this->application,
        ])->save(Storage::disk('public')->path($pdfPath));
        // ---------------- \\
        return new Content(
            markdown: "mail.application.submitted",
            with: [
                'application' => $this->application,
                'pdfPath' => asset("storage/{$pdfPath}")
            ]
        );
    }
    // ---------------- \\
    public function attachments(): array
    {
        return $this->application
            ->getFiles()
            ->map(fn($file) => $file->mailAttachment())
            ->toArray();
    }
}