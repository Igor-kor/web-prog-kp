<template>
    <div class="coin-new">
<!--        <img v-bind:src=data.image.url alt="coin">-->
        <h2>Создать новый</h2>
        <carousel :autoplay="true" :per-page="1" v-if="data.images" :key="newimage">
            <slide v-for="(image, index) in data.images" :key="index">
                <img class="slide-img" v-bind:src=image.url alt="coin">
                <input type="button" @click="deleteImage(index)" value="Удалить изображение">
            </slide>
        </carousel>
        <p>Год: <input v-model="data.year" placeholder="отредактируй меня"></p>
        <p>Страна: <multiselect v-model="countryvalue" :options="listcountry"></multiselect></p>
        <p>Добавить страну:
            <input v-model="newcountry" placeholder="отредактируй меня">
            <input @click="savecountry()" type="button" value="Сохранить">
        </p>
        <p>Добавить изображение:
            <input id="files" ref="files" type="file" @change="handleFileUploads( $event )" placeholder="отредактируй меня">
            <input @click="saveimage()" type="button" value="Сохранить">
        </p>
        <p>Номинал: <input v-model="data.denomination" placeholder="отредактируй меня"></p>
        <p>Материал: <input v-model="data.material" placeholder="отредактируй меня"></p>
        <p>Диаметр: <input v-model="data.diameter" placeholder="отредактируй меня"></p>
        <p>Вес монеты: <input v-model="data.coin_weight" placeholder="отредактируй меня"></p>
        <p>Тираж: <input v-model="data.circulation" placeholder="отредактируй меня"></p>
        <p>Гурт: <input v-model="data.edge" placeholder="отредактируй меня"></p>
        <p>Особенности: <input v-model="data.features" placeholder="отредактируй меня"></p>
        <input @click="saveNewCoin()" type="button" value="Сохранить">
    </div>
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from 'vue-carousel';
export default {
    name: "CoinNew",
    components: {
        Carousel,
        Slide
    },
    data() {
        return {
            data:{
                year: '',
                country: {name:''},
                denomination: '',
                material: '',
                diameter: '',
                coin_weight:'',
                circulation:'',
                edge:'',
                features:'',
                images:null,
            },
            listcountry: [],
            countryvalue: null,
            newcountry: null,
            newimage: null,
            files: '',
        }
    },
    methods:{
        saveNewCoin(){
            this.data.country.name = this.countryvalue;
            axios.post('/api/coin/',  {
                params: this.data
                })
                .then(res => {
                    if(res.status == 200){
                        window.location.href='/coin/'+ res.data;
                    }
                    console.log(res.data);
                });
        },
        loadCountry() {
            let country = [];
            axios.get('/api/country')
                .then(res => {
                    res.data.forEach(function (el){
                        if(el.name !== undefined)
                            country.push(el.name);
                    });
                    this.listcountry = country;
                    this.countryvalue =  this.data.country.name;
                });
        },
        handleFileUploads(event ){
            this.files = event.target.files;
        },
        savecountry (){
            axios.post('/api/country/', {
                params: this.newcountry
            })
                .then(res => {
                    if (res.status == 200) {
                        this.listcountry.push(res.data.name) ;
                        this.countryvalue = res.data.name;
                        this.newcountry = '';
                    }
                });
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
            this.newimage = '1';
            this.data.images.splice(index,1);
            this.newimage = '';
        }
    },
    mounted() {
        this.loadCountry();
    },
}
</script>

<style scoped>
.coin-new .slide-img{
    width: 300px;
    height: 300px;
}
</style>
