<template>
    <div style="margin-top:2vh">
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        Error Back nya belum di FIX edit masih error frontendnya
        <b-table
            style="margin-top:2vh"
            striped
            hover
            :items="barang"
            :fields="fields"
        >
            <template #cell(action)="row">
                <router-link
                    :to="{ name: 'editresep', params: { id: row.item.id } }"
                >
                    <b-button variant="info" size="sm" class="mr-2">
                        Edit {{ row.item.id }}
                    </b-button>
                </router-link>
                <b-button
                    @click="deleteresep(row.item.id)"
                    variant="danger"
                    size="sm"
                    class="mr-2"
                >
                    Delete
                </b-button>
            </template>
        </b-table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            fields: ["id", "codemerk", "resep", "action"],
            barang: null
        };
    },
    mounted() {
        this.getitem();
    },
    computed: {
        
    },
    methods: {
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
