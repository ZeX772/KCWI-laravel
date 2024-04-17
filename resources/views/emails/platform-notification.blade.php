<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
    <div style="width: 100%; font-family: Poppins, sans-serif;">
        <div style="width: 50%; margin: 0 auto; border: 1px solid #9c9c9c; border-radius: 5px; padding: 20px;">
            <h2>{{ $data->title }}</h2>
            <p>{!!html_entity_decode($data->content)!!}</p>
        </div>
    </div>
</body>

</html>