<template>
    <div class="mark-page">
        <p>id: {{ data.id }}</p>
        <carousel :autoplay="true" :per-page="1" v-if="data.images" :key="newimage">
            <slide v-for="(image, index) in data.images" :key="index">
                <img class="slide-img" v-bind:src=image.url alt="coin">
            </slide>
        </carousel>
        <mark-desc v-bind:data=data></mark-desc>
        <input @click="editMark()" type="button" value="Изменить">
        <input @click="addCollection()" type="button" value="Добавить в коллекцию">
        <input @click="deleteMark()" type="button" value="Удалить">
    </div>
</template>

<script>
import axios from "axios";
import {Carousel, Slide} from 'vue-carousel';

export default {
name: "MarkPage",
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
        axios.get('/api/mark/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                    this.newimage = '';
                }
            });
    },
    methods: {
        editMark() {
            window.location.href =  window.location.href+'/edit/';
        },
        addCollection() {
            window.location.href = 'markusernew/' + this.data.id;
        },
        deleteMark() {
            axios.delete('/api/mark/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/marks";
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
