<template>
    <div class="mark-list">
        <div class="blocks-mark-list">
            <mark-block
                v-for="coin in coins"
                v-bind:data="coin"
                v-bind:key="coin.id"
            ></mark-block>
        </div>
        <div class="filter-mark-list">
            <form action="">
                <label>Номинал/описание</label>
                <input type="text" name="searchname" :value="searchname">
                <label>Страна</label>
                <multiselect v-model="country" :options="listcountry" label="name" track-by="name"></multiselect>
                <label>Год от</label>
                <input name="aftereyear" type="number" :value="aftereyear" min="-2000" max="2022">
                <label>До</label>
                <input name="beforeyear" type="number" :value="beforeyear" min="-2000" max="2022">
                <input class="btn btn-success" type="submit" value="Поиск">
                <input class="btn btn-success" type="reset">
                <input name="searccountry" type="hidden" :value="this.country.id">
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "MarkList",
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
    },
    methods: {
        loadCoin() {
            axios.get('/api/mark'+window.location.search)
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
.mark-list{
    display: grid;
    grid-template-columns: 200px auto;
}
.filter-mark-list{
    grid-column-start: 1;
    grid-column-end: 2;
}
.blocks-mark-list{
    grid-column-start: 0;
    grid-column-end: 1;
}
.filter-mark-list form{
    display: grid;
    grid-row-gap: 10px;
}
</style>
