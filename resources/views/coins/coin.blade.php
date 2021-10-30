<div class="coin-block">
    <a href="/coin/{{$coin->id}}">
        <img src="{{asset('/img/dogecoin-logo.jpg')}}" alt="coin">
        <p>Год {{$coin->Year}}</p>
        <p>Страна {{$coin->Country}}</p>
        <p>Сохранность {{$coin->Safety}}</p>
        <p>Номинал {{$coin->Denomination}}</p>
        <p>Тип монеты {{$coin->Coin_type}}</p>
        <p>Материал {{$coin->Material}}</p>
        <p>Диаметр {{$coin->Diameter}}</p>
        <p>Вес монеты {{$coin->Coin_weight}}</p>
        <p>Тираж {{$coin->Circulation}}</p>
        <p>Гурт {{$coin->Edge}}</p>
        <p>Особенности {{$coin->Features}}</p>
    </a>
</div>


