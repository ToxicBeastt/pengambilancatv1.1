<template>
    <div style="margin-top:2vh">
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <b-table
            style="margin-top:2vh"
            striped
            hover
            :items="barang"
            :fields="fields"
        >
            <template #cell(status)="row">
                <b-button variant="danger" @click="deleteitem(row.item.id)" size="sm" class="mr-2">
                    Delete
                </b-button>
            </template>
        </b-table>
        {{ barang }}
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            fields: [
                { key: "nama", sortable: true },
                { key: "suplier", sortable: false },
                { key: "jenis", sortable: true },
                { key: "netto", sortable: true },
                { key: "status", sortable: false }
            ],
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
        },
        deleteitem(id){
            this.$confirm("Are you sure?").then(() => {
            axios
                .delete("./Item/"+id)
                .then(response => {
                    console.log(response);
                    this.barang = this.barang.filter(barang => {
                        return barang.id != id
                    })
                    this.$alert("Berhasil Di Delete");
                })
                .catch(error => {
                    console.log(error);
                });

            });

        }
    }
};
</script>
