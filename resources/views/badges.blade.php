<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Badges</title>

        <style type="text/css" media="print">
            div.page
            {
                page-break-after: always;
                page-break-inside: avoid;
            }
        </style>
    </head>
    @foreach ($data['participants'] as $participant)
        <body>
            <div class="col-md-6 page">
                <div id="div-badge" class="card-body" style="text-align: center; vertical-align: middle;">
                    <img id="img-badge" src="{{ $data['layout'] }}" alt="your image"/><br>
                    <a class="text" id="text-name" style="{{ $data['styles']['name'] }}">{{ $participant['name'] }}</a><br>
                    <a class="text" id="text-institution" style="{{ $data['styles']['institution'] }}">{{ $participant['institution'] }}</a><br>
                    <a class="text" id="text-subscription" style="{{ $data['styles']['subscription'] }}">{{ $participant['subscription'] }}</a><br>
                    <a class="text" id="text-category" style="{{ $data['styles']['category'] }}">{{ $participant['category'] }}</a><br>
                </div>
            </div>
        </body>
    @endforeach
</html>
