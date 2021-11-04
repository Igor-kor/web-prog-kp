<template>
    <div class="coin-block">

<!--        <vue-picture-swipe :items="[-->
<!--    {src: data.image.url, thumbnail: '/img/dogecoin-logo-thumbnail.jpg' ,w: 400,h: 400, title: 'Will be used for caption'},-->
<!--    {src: data.image.url, thumbnail:'/img/dogecoin-logo-thumbnail.jpg' ,w: 400,h: 400}-->
<!--  ]"></vue-picture-swipe>-->
        <carousel :autoplay="true" :per-page="1" >
            <slide>
                <img v-bind:src=data.image.url alt="coin">
            </slide>
            <slide>
                <img v-bind:src=data.image.url alt="coin">
            </slide>
            <slide>
                <img v-bind:src=data.image.url alt="coin">
            </slide>
        </carousel>
        <!--            <img v-bind:src=data.image.url alt="coin">-->
        <p>Год: {{ data.year }}</p>
        <p>Страна: {{ data.country.name }}</p>
        <p>Номинал: {{ data.denomination }}</p>
        <p>Тип монеты: {{ data.coin_type }}</p>
        <p>Материал: {{ data.material }}</p>
        <p>Диаметр: {{ data.diameter }}</p>
        <p>Вес монеты: {{ data.coin_weight }}</p>
        <p>Тираж: {{ data.circulation }}</p>
        <p>Гурт: {{ data.edge }}</p>
        <p>Особенности: {{ data.features }}</p>
        <a v-bind:href="'/coin/'+ data.id">Подробнее</a>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    mounted() {
    },
    components: {
        Carousel,
        Slide
    },
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

.coin-block {
    width: 200px;
    display: inline-block;
    border-width: 2px;
    border-color: #000000;
    border-radius: 6px;
    border-style: solid;
    background-color: #f5f4f4;
    align-content: center;
    text-align: center;
}

.coin-block img {
    width: 190px;
    background-size: cover;
}

.coin-block:hover {
    background-color: #e5e4e4;
}

</style>
