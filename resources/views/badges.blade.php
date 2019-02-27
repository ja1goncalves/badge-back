<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crachás</title>
    </head>
    @foreach ($data['participants'] as $participant)
        <body>
            <div class="container col-md-6" style="text-align: center;">
                <div id="div-badge"
                     class="container"
                     style= "float:left;
                             vertical-align: middle;
                             position: relative;
                             width: 100%;
                             height: 100%;
                             background-image: url({{$data['layout']}});
                             background-size: 50%;">
                    {{--<img id="img-badge" src="{{ $data['layout'] }}" alt="your image" style="width: auto; height: auto; max-width:50%; max-height:100%;"/><br>--}}
                    <a class="text" id="text-name" style="position: relative; {{ $data['styles']['name'] }}">{{ $participant['name'] }}</a><br>
                    <a class="text" id="text-institution" style="position: relative; {{ $data['styles']['institution'] }}">{{ $participant['institution'] }}</a><br>
                    <a class="text" id="text-subscription" style="position: relative; {{ $data['styles']['subscription'] }}">{{ $participant['subscription'] }}</a><br>
                    <a class="text" id="text-category" style="position: relative; {{ $data['styles']['category'] }}">{{ $participant['category'] }}</a><br>
                </div>
            </div>
        </body>
    @endforeach
</html>
