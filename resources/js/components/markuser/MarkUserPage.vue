<template>
    <div class="mark-user-page">
        <carousel :autoplay="true" :per-page="1" v-if="data.mark && data.mark.images">
            <slide v-for="(image, index)  in data.mark.images" :key="index">
                <img v-bind:src=image.url alt="mark">
            </slide>
        </carousel>
        <p>id: {{ data.id }}</p>
        <p>Сохранность: {{ data.safety }}</p>
        <p>Описание: {{ data.description }}</p>
        <p>id coin: {{ data.mark?data.mark.id:""}}</p>
        <mark-desc v-bind:data=data.mark></mark-desc>
        <input @click="editMark()" type="button" value="Изменить">
        <input @click="deleteMark()" type="button" value="Удалить">
        <a v-bind:href="'/mark/'+ data.mark.id">Основная марка</a>
    </div>
</template>

<script>
import {Carousel, Slide} from "vue-carousel";
import axios from "axios";
export default {
name: "MarkUserPage",
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
                mark: {
                    country: {

                    },
                },
            },
        }
    },
    mounted() {
        axios.get('/api/markuser/' + this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data = res.data;
                }
            });
    },
    methods:{
        editMark() {
            window.location.href =  window.location.href+'/edit/';
        },
        addCollection() {

        },
        deleteMark() {
            axios.delete('/api/markuser/'+this.id)
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = "/mycollectmark";
                    }
                });
        }
    }
}
</script>

<style scoped>

</style>
