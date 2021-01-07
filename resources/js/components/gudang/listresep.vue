<template>
    <div style="margin-top:2vh">
        <router-link to="home"><b-button>Back</b-button></router-link>
        Error Back nya belum di FIX edit masih error frontendnya
        <b-table
            style="margin-top:2vh"
            striped
            hover
            :items="listdata"
            :fields="fields"
        >
            <template #cell(status)="row">
                <router-link
                    :to="{ name: 'detailresep', params: { id: row.item.codemerk } }"
                >
                    <b-button
                        variant="outline-primary"
                        size="sm"
                        class="mr-2"
                    >
                        Edit {{ row.item.codemerk }}
                    </b-button>
                </router-link>
            </template>
        </b-table>
        {{ listdata }}
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            fields: [
                { key: "id", sortable: true },
                { key: "codemerk", sortable: true },
                { key: "status", sortable: false }
            ],
            barang: []
        };
    },
    mounted() {
        this.getitem();
    },
    computed: {
        listdata() {
            var x = [];
            var code = [];
            if (this.barang.length > 0) {
                for (var i = 0; i < this.barang.length; i++) {
                    if (!code.includes(this.barang[i].codemerk)) {
                        code.push(this.barang[i].codemerk);
                        x.push({
                            id: this.barang[i].id,
                            codemerk: this.barang[i].codemerk
                        });
                    }
                }
            }
            return x;
        }
    },
    methods: {
        DetailResep(code) {
            this.$router.push({ path: `/detailresep/` });
        },
        getitem() {
            axios
                .get("./Gitar/")
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
