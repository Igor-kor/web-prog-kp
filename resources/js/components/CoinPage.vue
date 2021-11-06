<template>
    <div class="coin-page">
        <p>id: {{ data.id }}</p>
        <carousel :autoplay="true" :per-page="1" v-if="data.images" :key="newimage">
            <slide v-for="(image, index) in data.images" :key="index">
                <img class="slide-img" v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <coin-desc v-bind:data=data></coin-desc>
        <input @click="editCoin()" type="button" value="Изменить">
        <input @click="addCollection()" type="button" value="Добавить в коллекцию">
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
            window.location.href = '/coinusernew/' + this.data.id;
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
