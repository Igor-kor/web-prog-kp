<template>
    <div>
        <image-upload v-bind:data=data></image-upload>
        <p>Год: <input v-model="data.year" placeholder="отредактируй меня"></p>
        <p>Страна:
            <multiselect v-model="data.country" :options="listcountry" label="name" track-by="name"></multiselect>
        </p>
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
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "CoinInputs",
    data() {
        return {
            listcountry: [],
            newcountry: null,
        }
    },
    props: {
        data: {
            country:{
                name: {defoult:""}
            }
        },
    },
    mounted() {
        this.loadCountry();
    },
    methods: {
        loadCountry() {
            let country = [];
            axios.get('/api/country')
                .then(res => {
                    // res.data.forEach(function (el) {
                    //     if (el.name !== undefined)
                    //         country.push(el.name);
                    // });
                    this.listcountry = res.data;
                });
        },
        savecountry() {
            axios.post('/api/country/', {
                params: this.newcountry
            })
                .then(res => {
                    if (res.status == 200) {
                        this.listcountry.push(res.data.name);
                        this.data.country = res.data;
                        this.newcountry = '';
                    }
                });
        },
    }
}
</script>

<style scoped>

</style>
