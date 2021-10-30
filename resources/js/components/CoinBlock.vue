<template>
    <div class="coin-block">
        <a v-bind:href="'/coin/'+ data.id">
            <img src="/img/dogecoin-logo.jpg" alt="coin">
            <p>Год {{ data.Year }}</p>
            <p>Страна {{ data.Country }}</p>
            <p>Сохранность {{ data.Safety }}</p>
            <p>Номинал {{ data.Denomination }}</p>
            <p>Тип монеты {{ data.Coin_type }}</p>
            <p>Материал {{ data.Material }}</p>
            <p>Диаметр {{ data.Diameter }}</p>
            <p>Вес монеты {{ data.Coin_weight }}</p>
            <p>Тираж {{ data.Circulation }}</p>
            <p>Гурт {{ data.Edge }}</p>
            <p>Особенности {{ data.Features }}</p>
        </a>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        data: {
            id: {
                defoult: "NULL"
            },
            Year: {
                type: String,
                defoult: "NULL"
            },
            Country: {
                type: String,
                defoult: "NULL"
            },
            Safety: {
                type: String,
                defoult: "NULL"
            },
            Denomination: {
                type: String,
                defoult: "NULL"
            },
            Coin_type: {
                type: String,
                defoult: "NULL"
            },
            Diameter: {
                type: String,
                defoult: "NULL"
            },
            Coin_weight: {
                type: String,
                defoult: "NULL"
            },
            Circulation: {
                type: String,
                defoult: "NULL"
            },
            Features: {
                type: String,
                defoult: "NULL"
            },
            Edge: {
                type: String,
                defoult: "NULL"
            },
            Material: {
                type: String,
                defoult: "NULL"
            }
        }
    }
}
</script>

<style scoped>

</style>
