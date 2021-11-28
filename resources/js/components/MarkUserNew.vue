<template>
    <div class="mark-user-new">
        <h2>Редактировать</h2>
        <coin-desc v-if="data.mark" :key="desc" v-bind:data=data.mark></coin-desc>
        <mark-user-inputs v-if="data.mark" :key="inputs" v-bind:data=data ></mark-user-inputs>
        <input @click="editMark()" type="button" value="Сохранить">
        <a v-bind:href="'/mark/'+ id">Основная монета</a>
    </div>
</template>

<script>
import axios from "axios";
export default {
name: "MarkUserNew",
    props:{
        id:null
    },
    data() {
        return {
            data: {
                mark:{
                    id:null
                }
            },
            desc:null,
            inputs:null,
        }
    },
    methods: {
        editMark() {
            axios.post('/api/markuser/', {
                params: this.data
            })
                .then(res => {
                    if (res.status == 200) {
                        window.location.href = '/markuser/' + res.data.id;
                    }
                });
        }
    },
    mounted() {
        axios.get('/api/mark/'+this.id)
            .then(res => {
                if (res.status == 200) {
                    this.data.mark = res.data;
                    this.desc = res.data.id + 'desc';
                    this.inputs =  res.data.id + 'inputs';
                }
            });
    }
}
</script>

<style scoped>

</style>
