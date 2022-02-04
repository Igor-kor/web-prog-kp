<template>
    <div class="coins-list">

        <div class="blocks-coin-list">
            <coin-block
                v-for="coin in coins"
                v-bind:data="coin"
                v-bind:key="coin.id"
            ></coin-block>
        </div>
        <div class="filter-coin-list">
            <form action="">
                <label>Номинал/описание</label>
                <input type="text" name="searchname" :value="searchname">
                <label>Страна</label>
                <multiselect v-model="country" :options="listcountry" label="name" track-by="name"></multiselect>
                <label>Год от</label>
                <input name="aftereyear" type="number" :value="aftereyear" min="-2000" max="2022">
                <label>До</label>
                <input name="beforeyear" type="number" :value="beforeyear" min="-2000" max="2022">
                <input class="btn btn-success" type="submit"  value="Поиск">
                <input class="btn btn-success" type="reset">
                <input name="searccountry"  type="hidden" :value="this.country.id">
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            coins: [],
            listcountry: [],
            aftereyear: null,
            beforeyear: null,
            searchname: null,
            country: {
                name:null,
                id: null,
            },
        }
    },
    mounted() {
        this.loadCountry();
        this.loadCoin();
        let urlParams = new URLSearchParams(window.location.search);
        this.aftereyear = urlParams.get('aftereyear');
        this.beforeyear = urlParams.get('beforeyear');
        this.searchname = urlParams.get('searchname');
        // this.country.id = urlParams.get('searccountry');
    },
    methods: {
        loadCoin() {
            axios.get('/api/coin'+window.location.search)
                .then(res => {
                    this.coins = res.data;
                });
        },
        loadCountry() {
            let country = [];
            axios.get('/api/country')
                .then(res => {
                    this.listcountry = res.data;
                });
        },
    }
}
</script>

<style scoped>
.coins-list{
    display: grid;
    grid-template-columns: 200px auto;
}
.filter-coin-list{
    grid-column-start: 1;
    grid-column-end: 2;
}
.blocks-coin-list{
    grid-column-start: 0;
    grid-column-end: 1;
}
.filter-coin-list form{
    display: grid;
    grid-row-gap: 10px;
}
</style>
