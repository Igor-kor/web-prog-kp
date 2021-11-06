<template>
    <div>
        <carousel :autoplay="true" :per-page="1" v-if="data.images" :key="newimage">
            <slide v-for="(image, index) in data.images" :key="index">
                <img class="slide-img" v-bind:src=image.url alt="coin">
                <input type="button" @click="deleteImage(index)" value="Удалить изображение">
            </slide>
        </carousel>
        <p>Добавить изображение:
            <input id="files" ref="files" type="file" @change="handleFileUploads( $event )" placeholder="отредактируй меня">
            <input @click="saveimage()" type="button" value="Сохранить">
        </p>
    </div>
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from 'vue-carousel';
export default {
name: "ImageUpload",
    data(){
        return{
            newimage:null
        }
    },
    components: {
        Carousel,
        Slide
    },
    props:{
        data:{},
    },
    methods:{
        handleFileUploads(event ){
            this.files = event.target.files;
        },
        saveimage (){
            let formData = new FormData();
            for( var i = 0; i < this.files.length; i++ ){
                let file = this.files[i];
                formData.append('files[' + i + ']', file);
            }
            axios.post('/api/image/',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                if (res.status == 200) {
                    if(this.data.images == null)
                        this.data.images = [];
                    res.data.forEach(function (image){
                        this.data.images.push(image);
                    },this);
                    this.newimage = '';
                }
            });
        },
        deleteImage(index){
            this.data.images.splice(index,1);
            this.newimage = '';
        },
    }
}
</script>

<style scoped>

</style>
