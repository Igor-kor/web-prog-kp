<template>
    <div class="coin-block p-6 bg-white border-b border-gray-200">
        <carousel :autoplay="true" :per-page="1" v-if="data.images">
            <slide v-for="(image, index) in data.images" :key="index">
                <img v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <coin-desc v-bind:data=data></coin-desc>
        <a v-bind:href="'/coin/'+ data.id">Подробнее</a><br>
        <a v-bind:href="'/coinuserslist/'+ data.id">Все монеты у пользователей</a>
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
        data: {}
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
    margin: 15px;
}

.coin-block img {
    width: 190px;
    background-size: cover;
}

.coin-block:hover {
    background-color: #e5e4e4;
}

</style>
