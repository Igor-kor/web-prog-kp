<template>
    <div class="coin-user-block">
        <carousel :autoplay="true" :per-page="1" v-if="data.coin.images">
            <slide v-for="(image, index)  in data.coin.images" :key="index">
                <img v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <p>Сохранность: {{ data.safety }}</p>
        <p>Описание: {{ data.description }}</p>
        <p>id: {{ data.coin.id }}</p>
        <coin-desc v-bind:data=data.coin></coin-desc>
        <a v-bind:href="'/coinuser/'+ data.id">Подробнее</a><br>
        Пользователь: {{data.user_id}}<br>
        <a v-bind:href="'/collectuser/'+ data.user_id">Коллекция пользователя</a><br>
        <a v-bind:href="'/user/'+ data.user_id">Профиль пользователя</a>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    name: "CoinUserBlock",
    components: {
        Carousel,
        Slide
    },
    props: {
        data: {
            images:{
                defoult: []
            }
        }
    }
}
</script>

<style scoped>
.coin-user-block {
    width: 200px;
    display: inline-block;
    border-width: 1px;
    border-color: #f5f4f4;
    border-radius: 6px;
    background-color: #f5f4f4;
    align-content: center;
    text-align: center;
}

.coin-user-block img {
    margin: 5px;
    width: 200px;
    background-size: cover;
}

.coin-user-block:hover {
    border-width: 3px;
    border-color: #5b5959;
}

</style>
