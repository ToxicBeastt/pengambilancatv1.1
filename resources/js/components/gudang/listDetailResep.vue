<template>
    <div>
        <router-link to="/listresep"><b-button>Back</b-button></router-link>
        <b-table striped hover :items="barang" :fields="fields">
            <template #cell(status)="row">
                <b-button
                    v-on:click="editdata(row.item)"
                    variant="outline-primary"
                    size="sm"
                    class="mr-2"
                >
                    Edit {{ row.item.codemerk }}
                </b-button>
            </template>
        </b-table>
        <b-form @submit.prevent="barangInsert" @reset="onReset">
            <b-form-group
                id="input-group-1"
                label="Code Cat:"
                label-for="input-1"
                description=""
            >
                <b-form-input
                    id="input-1"
                    v-model="form.code"
                    required
                    placeholder="Masukan Code Cat"
                ></b-form-input>
            </b-form-group>
            <b-form-group
                id="input-group-1"
                label="Jumlah Pemakaian:"
                label-for="input-1"
                description=""
            >
                <b-form-input
                    id="input-1"
                    v-model="form.nama"
                    required
                    placeholder="Masukan Jumlah Pemakaian"
                ></b-form-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>

        {{ $route.params.id }}
        {{ barang }}
        {{ form }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            barang: [],
            items: [
                { age: 40, first_name: "Dickerson", last_name: "Macdonald" },
                { age: 21, first_name: "Larsen", last_name: "Shaw" },
                { age: 89, first_name: "Geneva", last_name: "Wilson" },
                { age: 38, first_name: "Jami", last_name: "Carney" }
            ],
            fields: [
                { key: "cat", sortable: true },
                { key: "pemakaian", sortable: true },
                { key: "status", sortable: false }
            ],
            form: {
                code: "",
                nama: "",
                netto: 0
            }
        };
    },
    mounted() {
        this.getitem();
    },
    methods: {
        editdata(data) {
            this.form.code = data.codemerk;
            this.form.nama = data.cat;
            this.form.netto = data.pemakaian;
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
        },
        onReset() {
            // Reset our form values
            this.form.code = "";
            this.form.nama = "";
            this.form.jenis = null;
            this.form.suplier = null;
            this.form.netto = 0;
        }
    }
};
</script>
