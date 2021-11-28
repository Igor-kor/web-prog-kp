<template>
    <div class="mark-desc">
        <p>Год: {{ data.year || "" }}</p>
        <p>Страна: {{  data.country?data.country.name || "":"" }}</p>
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
name: "MarkDesc",
    props: {
        data: {}
    },
}
</script>

<style scoped>

</style>
