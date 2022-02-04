<template>
    <div class="mark-user-block">
        <carousel :autoplay="true" :per-page="1" v-if="data.mark.images">
            <slide v-for="(image, index)  in data.mark.images" :key="index">
                <img v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <p>Сохранность: {{ data.safety }}</p>
        <p>Описание: {{ data.description }}</p>
        <p>id: {{ data.mark.id }}</p>
        <mark-desc v-bind:data=data.mark></mark-desc>
        <a v-bind:href="'/markuser/'+ data.id">Подробнее</a>
    </div>
</template>

<script>
import {Carousel, Slide} from "vue-carousel";

export default {
    name: "MarkUserBlock",
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
.mark-user-block {
    width: 200px;
    display: inline-block;
    border-width: 1px;
    border-color: #f5f4f4;
    border-radius: 6px;
    background-color: #f5f4f4;
    align-content: center;
    text-align: center;
}

.mark-user-block img {
    margin: 5px;
    width: 200px;
    background-size: cover;
}

.mark-user-block:hover {
    border-width: 3px;
    border-color: #5b5959;
}

</style>
