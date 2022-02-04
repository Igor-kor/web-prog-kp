<template>
    <div class="coin-user-inputs">
        <p>id: {{ data.id }}</p>
        <image-upload v-bind:data=data.coin></image-upload>
        <p>Сохранность:
            <multiselect v-model="data.safety" :options="safetyoption"></multiselect>
        </p>
        <p>Описание: <input v-model="data.description" placeholder="отредактируй меня"></p>
    </div>
</template>

<script>

export default {
    name: "CoinInputs",
    data() {
        return {
            safetyoption:[
                'PF','PL','BU','UNC','AU+','AU','XF+','XF','VF+','VF','F','VG','G','AG','FA','PR'
            ],
        }
    },
    props: {
        data: { },
    },
    mounted() {

    },
    methods: {

    }
}
</script>

<style scoped>

</style>
