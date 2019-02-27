<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    @foreach ($data['participants'] as $participant)
        <body>
            <div class="col-md-6">
                <div id="div-badge" class="card-body" style="text-align: center; vertical-align: middle;">
                    <img id="img-badge" src="{{ $data['layout'] }}" alt="your image"/><br>
                    <a class="text" id="text-name" style="{{ $data['details_layout'][0]['style'] }}">{{ $participant['name'] }}</a><br>
                    <a class="text" id="text-institution" style="{{ $data['details_layout'][1]['style'] }}">{{ $participant['institution'] }}</a><br>
                    <a class="text" id="text-subscription" style="{{ $data['details_layout'][2]['style'] }}">{{ $participant['subscription'] }}</a><br>
                    <a class="text" id="text-category" style="{{ $data['details_layout'][3]['style'] }}">{{ $participant['category'] }}</a><br>
                </div>
            </div>
        </body>
    @endforeach
</html>
