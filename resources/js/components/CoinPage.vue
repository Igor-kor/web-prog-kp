<template>
    <div class="coin-page">
        <p>id: {{ data.id }}</p>
        <carousel :autoplay="true" :per-page="1" v-if="data.images" :key="newimage">
            <slide v-for="(image, index) in data.images" :key="index">
                <img class="slide-img" v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <p>Год: {{ data.year }}</p>
        <p>Страна: {{ data.country ? data.country.name : "" }}</p>
        <p>Номинал: {{ data.denomination }}</p>
        <p>Материал: {{ data.material }}</p>
        <p>Диаметр:{{ data.diameter }}</p>
        <p>Вес монеты: {{ data.coin_weight }}</p>
        <p>Тираж:{{ data.circulation }}</p>
        <p>Гурт: {{ data.edge }}</p>
        <p>Особенности: {{ data.features }}</p>
        <input @click="editCoin()" type="button" value="Изменить">
        <input @click="addCollection()" type="button" value="Добавить в коллекию">
        <input @click="deleteCoin()" type="button" value="Удалить">
    </div>
</template>

<script>
import axios from "axios";
import {Carousel, Slide} from 'vue-carousel';

export default {
    name: "CoinPage",
    components: {
        Carousel,
        Slide
    },
    props: {
        id: null
    },
    data() {
        return {
            data: {},
            newimage:null
        }
    },
    mounted() {
        axios.get('/api/coin/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                    this.newimage = '';
                }
            });
    },
    methods: {
        editCoin() {
            window.location.href =  window.location.href+'/edit/';
        },
        addCollection() {

        },
        deleteCoin() {
            axios.delete('/api/coin/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/coins";
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
