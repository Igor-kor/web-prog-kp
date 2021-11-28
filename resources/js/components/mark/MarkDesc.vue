<template>
    <div class="mark-desc">
        <p>Год: {{ data.year || "" }}</p>
        <p>Страна: {{  data.country?data.country.name || "":"" }}</p>
        <p>Номинал: {{ data.denomination || "" }}</p>
        <p>Материал: {{ data.material || "" }}</p>
        <p>Тираж:{{ data.circulation || "" }}</p>
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
