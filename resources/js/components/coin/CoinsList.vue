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
                <input type="text" name="searchname">
                <multiselect v-model="country" :options="listcountry" label="name" track-by="name"></multiselect>
                <input class="btn btn-success" type="submit" value="search">
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
            country: {
                name:null,
                id: null,
            },
        }
    },
    mounted() {
        this.loadCountry();
        this.loadCoin();
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
