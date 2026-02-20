<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Editor test</title>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
</head>

<body style="padding:40px">

    <h1>Editor test</h1>

    <div id="editor" style="height:300px"></div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        console.log("EDITOR LOADED");
    </script>

</body>

</html>