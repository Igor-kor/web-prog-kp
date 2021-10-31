<template>
    <div class="coin-block">
        <a v-bind:href="'/coin/'+ data.id">
            <img v-bind:src=data.image.url alt="coin">
            <p>Год {{ data.year }}</p>
            <p>Страна {{ data.country.name }}</p>
            <p>Номинал {{ data.denomination }}</p>
            <p>Тип монеты {{ data.coin_type }}</p>
            <p>Материал {{ data.material }}</p>
            <p>Диаметр {{ data.diameter }}</p>
            <p>Вес монеты {{ data.coin_weight }}</p>
            <p>Тираж {{ data.circulation }}</p>
            <p>Гурт {{ data.edge }}</p>
            <p>Особенности {{ data.features }}</p>
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
            image: {
                defoult: "NULL"
            },
            year: {
                defoult: "NULL"
            },
            country: {
                defoult: "NULL"
            },
            denomination: {
                defoult: "NULL"
            },
            coin_type: {
                defoult: "NULL"
            },
            diameter: {
                defoult: "NULL"
            },
            coin_weight: {
                defoult: "NULL"
            },
            circulation: {
                defoult: "NULL"
            },
            features: {
                defoult: "NULL"
            },
            edge: {
                defoult: "NULL"
            },
            material: {
                defoult: "NULL"
            }
        }
    }
}
</script>

<style scoped>

</style>
