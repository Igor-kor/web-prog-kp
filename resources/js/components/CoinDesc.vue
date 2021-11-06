<template>
    <div class="coin-desc">
        <p>Год: {{ data.year || "" }}</p>
        <p>Страна: {{ data.country.name || "" }}</p>
        <p>Номинал: {{ data.denomination || "" }}</p>
        <p>Материал: {{ data.material || "" }}</p>
        <p>Диаметр:{{ data.diameter || "" }}</p>
        <p>Вес монеты: {{ data.coin_weight || "" }}</p>
        <p>Тираж:{{ data.circulation || "" }}</p>
        <p>Гурт: {{ data.edge || "" }}</p>
        <p>Особенности: {{ data.features || "" }}</p>
    </div>

</template>

<script>
export default {
    name: "CoinDesc",
    props: {
        data: {}
    },
}
</script>

<style scoped>

</style>
