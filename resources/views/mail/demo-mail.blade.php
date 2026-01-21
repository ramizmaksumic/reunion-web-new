<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Nova narudžba</title>
</head>

<body>
    <h2>Nova narudžba usluge</h2>

    <p><strong>Ime i prezime:</strong> {{ $data['name'] }}</p>
    <p><strong>Telefon:</strong> {{ $data['phone'] }}</p>
    <p><strong>Adresa:</strong> {{ $data['adress'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Usluga:</strong> {{ $data['service'] }}</p>
    <p><strong>Usluga:</strong> {{ $data['description'] }}</p>
    <p><strong>Rok isporuke:</strong> {{ $data['date'] }}</p>

    @if(!empty($file))
    <p><em>Korisnik je dodao dokument u privitku.</em></p>
    @endif
</body>

</html>