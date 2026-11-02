<!DOCTYPE html>
<html lang="bs"><head><meta charset="utf-8"><title>Novi upit za ponudu</title></head>
<body style="font-family:Arial,sans-serif;color:#202020;line-height:1.6">
<h1 style="color:#5230e5">Novi upit za ponudu</h1>
<p><strong>Usluga:</strong> {{ $service }}<br><strong>Vrijeme slanja:</strong> {{ $submittedAt }}</p>
<h2>Detalji projekta</h2>
@foreach($answers as $label => $answer)
<p><strong>{{ $label }}</strong><br>{!! nl2br(e($answer)) !!}</p>
@endforeach
<h2>Kontakt podaci</h2>
<p><strong>Ime i prezime:</strong> {{ $contact['name'] }}<br>
<strong>Naziv firme:</strong> {{ $contact['company'] ?: 'Nije navedeno' }}<br>
<strong>Email:</strong> {{ $contact['email'] }}<br>
<strong>Telefon:</strong> {{ $contact['phone'] ?: 'Nije navedeno' }}</p>
</body></html>
