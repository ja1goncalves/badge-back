<!doctype html>
<html>
    <head>
        {{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>--}}
        <title>Crachás</title>
        <style type="text/css">
            .image {
                position:relative;
            }
            #texts {
                position:absolute;
            }
        </style>
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
                             background-size: contain;
                             background-repeat: no-repeat;">
                    <img id="img-badge" src="{{ $data['layout'] }}" alt="your image" style="width: auto; background-size: contain; height: auto; max-width:100%; max-height:100%;"/><br>
                    <div class="text" id="texts">
                        <p id="text-name" style="position: relative; {{ $data['styles']['name'] }}">{{ $participant['name'] }}</p><br>
                        <p id="text-institution" style="position: relative; {{ $data['styles']['institution'] }}">{{ $participant['institution'] }}</p><br>
                        <p id="text-subscription" style="position: relative; {{ $data['styles']['subscription'] }}">{{ $participant['subscription'] }}</p><br>
                        <p id="text-category" style="position: relative; {{ $data['styles']['category'] }}">{{ $participant['category'] }}</p><br>
                    </div>
                </div>
            </div>
        </body>
    @endforeach
</html>
