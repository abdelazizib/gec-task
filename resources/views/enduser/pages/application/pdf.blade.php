<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Application Summary</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        td { border: 1px solid #ddd; padding: 6px; }
        .label { width: 30%; font-weight: bold; background: #f7f7f7; }
    </style>
    </head>
<body>
    <h1>Application Summary</h1>
    <table>
        <tr><td class="label">User</td><td>{{ $user->name }} ({{ $user->email }})</td></tr>
        <tr><td class="label">Contact Email</td><td>{{ $application->contact_email }}</td></tr>
        <tr><td class="label">Contact Phone</td><td>{{ $application->contact_phone }}</td></tr>
        <tr><td class="label">Date of Birth</td><td>{{ $application->birth_date?->format('Y-m-d') }}</td></tr>
        <tr><td class="label">Gender</td><td>{{ ucfirst($application->gender) }}</td></tr>
        <tr><td class="label">Country</td><td>{{ $application->country }}</td></tr>
        <tr><td class="label">Comments</td><td>{{ $application->comments }}</td></tr>
    </table>
</body>
</html>


