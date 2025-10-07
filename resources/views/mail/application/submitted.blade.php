<x-mail::message>
# A new application has been submitted

<p><strong>User Info</strong>: {{ $application->user->name }} ({{ $application->user->email }})</p>

<p><strong>Contact Email</strong>: {{ $application->contact_email }}</p>
<p><strong>Contact Phone</strong>: {{ $application->contact_phone }}</p>
<p><strong>Birth Date</strong>: {{ $application->birth_date->toDateString() }}</p>
<p><strong>Gender</strong>: {{ $application->gender->translate() }}</p>
<p><strong>Country</strong>: {{ $application->country }}</p>

<p><strong>Comments</strong>:</p>
<pre>
    {{ $application->comments }}
</pre>
You can view the application details in the PDF attachment.
<x-mail::button :url="$pdfPath">
Download PDF
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
