<template>
    <div class="coin-user-page">
        <carousel :autoplay="true" :per-page="1" v-if="data.coin && data.coin.images">
            <slide v-for="(image, index)  in data.coin.images" :key="index">
                <img v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <p>id: {{ data.id }}</p>
        <p>Сохранность: {{ data.safety }}</p>
        <p>Описание: {{ data.description }}</p>
        <p>id coin: {{ data.coin?data.coin.id:""}}</p>
        <coin-desc v-bind:data=data.coin></coin-desc>
        <input @click="editCoin()" type="button" value="Изменить">
        <input @click="deleteCoin()" type="button" value="Удалить">
    </div>
</template>

<script>
import {Carousel, Slide} from "vue-carousel";
import axios from "axios";

export default {
    name: "CoinUserPage",
    components: {
        Carousel,
        Slide
    },
    props: {
        id: null
    },
    data() {
        return {
            data: {
                coin: {
                    country: {

                    },
                },
            },
        }
    },
    mounted() {
        axios.get('/api/coinuser/' + this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods:{
        editCoin() {
            window.location.href =  window.location.href+'/edit/';
        },
        addCollection() {

        },
        deleteCoin() {
            axios.delete('/api/coinuser/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/mycollectcoin";
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
