<template>
    <div style="margin-top:2vh">
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <b-table style="margin-top:2vh" striped hover :items="barang" :fields="fields">
        </b-table>
        {{barang}}
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            fields: ['id', 'code','nama','suplier','jenis','netto'],
            barang: null
        };
    },
    mounted() {
        this.getitem();
    },
    methods: {
        getitem() {
            axios
                .get("./Item/")
                .then(response => {
                    this.barang = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
