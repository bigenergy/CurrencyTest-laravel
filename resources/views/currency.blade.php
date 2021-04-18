
{{--
     Дизайн в этом тестовом проекте имеет чисто формальную составляющую
     То есть, создан чисто для немного адекватного стиля)
--}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        <p>{{ session('status') }}</p>
    </div>
@endif

@if (session('data'))
    <div class="alert alert-success" role="alert">
        <h2>Курсы валют</h2>
        <ul>
            @forelse(session('data') as $result)
                <li>
                    Валюта: {{ $result->currency }}<br>
                    Цена покупки: {{ $result->buy }}<br>
                    Цена продажи: {{ $result->sell }}<br>
                    Дата начала действия: {{ $result->begins_at }}<br>
                    Офис: {{ $result->office_id }}
                </li>
            @empty
                Ничего не найдено
            @endforelse
        </ul>
    </div>
@endif

<h1>Сохранение курса валюты</h1>
{!! Form::open([
       'route' => 'currency.store',
       'method' => 'post'
          ]) !!}

<div class="form-row">
    <div class="form-group col-md-12">
        <label>Валюта</label>
        <br>
        {{ Form::text('currency', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-md-12">
        <label>Цена покупки</label>
        <br>
        {{ Form::number('buy', null, ['class' => 'form-control', 'required', 'step'=>'any']) }}
    </div>
    <div class="form-group col-md-12">
        <label>Цена продажи</label>
        <br>
        {{ Form::number('sell', null, ['class' => 'form-control', 'required', 'step'=>'any']) }}
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Дата начала действия курса</label>
            <br>
            {{ Form::date('begins_at_day', Carbon\Carbon::now()->timezone('Europe/Moscow'), ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-sm-6">
            <label>Время начала действия курса</label>
            <br>
            {{ Form::time('begins_at_time', Carbon\Carbon::now()->timezone('Europe/Moscow')->format('H:i:s'), ['class' => 'form-control', 'required', 'step' => 1]) }}
        </div>
    </div>
    <div class="form-group col-md-12">
        <label>Код или ID офиса (оставьте пустым если курс должен дейстсвовать во всех офисах)</label>
        <br>
        {{ Form::text('office_id', null, ['class' => 'form-control']) }}
    </div>
</div>
<hr>

<button type="submit" class="btn btn-primary btn-block">Добавить валюту</button>

{!! Form::close() !!}

<h1>Получение курсов валют</h1>
{!! Form::open([
       'route' => 'currency.get',
       'method' => 'get'
          ]) !!}

<div class="form-row">
    <div class="form-group col-md-12">
        <label>Код или ID офиса</label>
        <br>
        {{ Form::text('office_id', null, ['class' => 'form-control', 'required']) }}
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>День</label>
            <br>
            {{ Form::date('at_date_day', Carbon\Carbon::now()->timezone('Europe/Moscow'), ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-sm-6">
            <label>Время</label>
            <br>
            {{ Form::time('at_date_time', Carbon\Carbon::now()->timezone('Europe/Moscow')->format('H:i:s'), ['class' => 'form-control', 'required', 'step' => 1]) }}
        </div>
    </div>

<hr>

<button type="submit" class="btn btn-primary btn-block">Получить курсы валют на указанное время</button>

{!! Form::close() !!}

</div>
