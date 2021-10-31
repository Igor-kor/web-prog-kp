<template>
    <div class="coin-user-block">
        <a v-bind:href="'/coin/'+ data.id">
            <img v-bind:src=data.coin.image.url alt="coin">
            <p>Сохранность: {{ data.safety }}</p>
            <p>Описание: {{ data.description }}</p>
            <p>Год: {{ data.coin.year }}</p>
            <p>Страна: {{ data.coin.country.name }}</p>
            <p>Номинал: {{ data.coin.denomination }}</p>
            <p>Тип монеты: {{ data.coin.coin_type }}</p>
            <p>Материал: {{ data.coin.material }}</p>
            <p>Диаметр: {{ data.coin.diameter }}</p>
            <p>Вес монеты: {{ data.coin.coin_weight }}</p>
            <p>Тираж: {{ data.coin.circulation }}</p>
            <p>Гурт: {{ data.coin.edge }}</p>
            <p>Особенности: {{ data.coin.features }}</p>
        </a>
    </div>
</template>

<script>
export default {
name: "CoinUserBlock",
    props: {
        data: {}
    }
}
</script>

<style scoped>
.coin-user-block{
    width: 200px;
    display: inline-block;
    border-width: 1px;
    border-color: #f5f4f4;
    border-radius: 6px;
    background-color: #f5f4f4;
    align-content: center;
    text-align: center;
}

.coin-user-block img{
    margin: 5px;
    width: 200px;
    background-size:cover;
}

.coin-user-block:hover{
    border-width: 3px;
    border-color: #5b5959;
}

</style>
