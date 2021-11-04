<template>
    <div class="coin-update">
        <h2>Редактировать</h2>
        <p>id: {{ data.id }}</p>
        <p>Год: <input v-model="data.year" placeholder="отредактируй меня"></p>
        <p>Страна: <multiselect v-model="countryvalue" :options="listcountry"></multiselect></p>
        <p>Добавить страну:
            <input v-model="newcountry" placeholder="отредактируй меня">
            <input @click="savecountry()" type="button" value="Сохранить">
        </p>
        <p>Номинал: <input v-model="data.denomination" placeholder="отредактируй меня"></p>
        <p>Материал: <input v-model="data.material" placeholder="отредактируй меня"></p>
        <p>Диаметр: <input v-model="data.diameter" placeholder="отредактируй меня"></p>
        <p>Вес монеты: <input v-model="data.coin_weight" placeholder="отредактируй меня"></p>
        <p>Тираж: <input v-model="data.circulation" placeholder="отредактируй меня"></p>
        <p>Гурт: <input v-model="data.edge" placeholder="отредактируй меня"></p>
        <p>Особенности: <input v-model="data.features" placeholder="отредактируй меня"></p>
        <input @click="editCoin()" type="button" value="Сохранить">
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CoinNew",
    data: function() {
        return {
            listcountry: [],
            countryvalue: null,
            newcountry: null
        }
    },
    props:{
        data:{},
    },
    mounted() {
        this.loadCountry();
    },
    methods: {
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
        editCoin() {
            this.data.country.name = this.countryvalue;
            axios.put('/api/coin/'+ this.data.id, {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/coin/' + res.data;
                    }
                });
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
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>
