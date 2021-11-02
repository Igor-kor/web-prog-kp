<template>
    <div class="coin-new">
<!--        <img v-bind:src=data.image.url alt="coin">-->
        <h2>Создать новый</h2>
        <p>Год: <input v-model="data.year" placeholder="отредактируй меня"></p>
        <p>Страна: <input v-model="data.country.name" placeholder="отредактируй меня"></p>
        <p>Номинал: <input v-model="data.denomination" placeholder="отредактируй меня"></p>
        <p>Материал: <input v-model="data.material" placeholder="отредактируй меня"></p>
        <p>Диаметр: <input v-model="data.diameter" placeholder="отредактируй меня"></p>
        <p>Вес монеты: <input v-model="data.coin_weight" placeholder="отредактируй меня"></p>
        <p>Тираж: <input v-model="data.circulation" placeholder="отредактируй меня"></p>
        <p>Гурт: <input v-model="data.edge" placeholder="отредактируй меня"></p>
        <p>Особенности: <input v-model="data.features" placeholder="отредактируй меня"></p>
        <input  @click="saveNewCoin()" type="button" value="Сохранить">
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CoinNew",
    data() {
        return {
            data:{
                image:{url:' '},
                year: '1999',
                country: {name:'russia'},
                denomination: 'rubl',
                material: '',
                diameter: '',
                coin_weight:'',
                circulation:'',
                edge:'',
                features:''
            }
        }
    },
    methods:{
        saveNewCoin(){
            axios.post('/api/coin/',  {
                params: this.data
                })
                .then(res => {
                    if(res.status == 200){
                        window.location.href='/coin/'+ res.data;
                    }
                    console.log(res.data);
                });
        }
    }
}
</script>

<style scoped>

</style>
