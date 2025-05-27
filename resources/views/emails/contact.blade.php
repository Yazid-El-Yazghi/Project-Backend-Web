<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>
    
    <p><strong>From:</strong> {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
    <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
    <p><strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y H:i') }}</p>
    
    <h3>Message:</h3>
    <p>{{ $contactMessage->message }}</p>
</body>
</html>