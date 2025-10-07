<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>New Application Submitted</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 32px 40px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 40px;
        }
        .info-section {
            margin-bottom: 24px;
        }
        .info-row {
            display: table;
            width: 100%;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .info-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        .info-value {
            display: block;
            font-size: 15px;
            color: #111827;
            line-height: 1.5;
        }
        .comments-section {
            margin-top: 32px;
        }
        .comments-box {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 20px;
            margin-top: 12px;
        }
        .comments-box pre {
            margin: 0;
            font-family: inherit;
            font-size: 14px;
            color: #374151;
            white-space: pre-wrap;
            word-wrap: break-word;
            line-height: 1.6;
        }
        .footer {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .footer-signature {
            margin-top: 8px;
            color: #111827;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>New Application Submitted</h1>
        </div>

        <div class="content">
            <div class="info-section">
                <div class="info-row">
                    <span class="info-label">User Info</span>
                    <span class="info-value">{{ $application->user->name }} ({{ $application->user->email }})</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Contact Email</span>
                    <span class="info-value">{{ $application->contact_email }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Contact Phone</span>
                    <span class="info-value">{{ $application->contact_phone }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Birth Date</span>
                    <span class="info-value">{{ $application->birth_date->toDateString() }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Gender</span>
                    <span class="info-value">{{ $application->gender->translate() }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Country</span>
                    <span class="info-value">{{ $application->country }}</span>
                </div>
            </div>

            <div class="comments-section">
                <span class="info-label">Comments</span>
                <div class="comments-box">
                    <pre>{{ $application->comments }}</pre>
                </div>
            </div>
        </div>
    </div>
</body>
</html>