<template>
    <div class="coin-new">
        <h2>Создать новый</h2>
        <coin-inputs v-bind:data=data></coin-inputs>
        <input class="btn btn-primary" @click="saveNewCoin()" type="button" value="Сохранить">
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "CoinNew",
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
            files: '',
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
        },
    },
}
</script>

<style scoped>
.coin-new .slide-img{
    width: 300px;
    height: 300px;
}
</style>
