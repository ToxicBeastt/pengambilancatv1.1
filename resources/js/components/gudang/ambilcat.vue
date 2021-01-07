<template>
    <div>
        <router-link to="home"><b-button>Back</b-button></router-link>
        <div>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group
                    id="input-group-1"
                    label="Tipe Gitar :"
                    label-for="input-1"
                >
                    <b-form-select
                        id="input-1"
                        v-model="temp.jenis_gitar"
                        :options="listdata"
                        required
                    ></b-form-select>
                </b-form-group>
                <b-form-group
                    id="input-group-2"
                    label="Jumlah:"
                    label-for="input-2"
                >
                    <b-form-input
                        id="input-2"
                        type="number"
                        v-model="temp.jumlah"
                        required
                        :min="0"
                        :max="100"
                    ></b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Input</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
                <b-button v-on:click="getResep(temp.jenis_gitar)"
                    >Testing</b-button
                >
                <b-card class="mt-3" header="Form Data Result">
                    <pre class="m-0">{{ temp }}</pre>
                </b-card>
            </b-form>
            <div style="margin-top:2vh">
                Keranjang
                <div v-if="!keranjang.length">
                    Kosong
                </div>
                <div v-else>
                    <b-table :items="keranjang" :fields="fields">
                        <template #cell(status)>
                            <b-button
                                size="sm"
                                @click="deletekeranjang(keranjang.id)"
                                class="mr-2"
                            >
                                Delete
                            </b-button>
                        </template>
                    </b-table>
                    <b-button type="submit" variant="primary"
                        >Submit Request</b-button
                    >
                </div>
            </div>
        </div>
        {{ groups }}
        {{ resep }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            temp: {
                jenis_gitar: null,
                jumlah: 0
            },
            fields: ["jenis_gitar", "jumlah", "status"],
            x: 1,
            keranjang: [],
            gitar: [],
            show: true,
            item: [],
            resep: []
        };
    },
    mounted() {
        this.getitem();
        this.getGitar();
    },
    computed: {
        listdata() {
            var code = [];
            if (this.gitar.length > 0) {
                for (var i = 0; i < this.gitar.length; i++) {
                    if (!code.includes(this.gitar[i].codemerk)) {
                        code.push(this.gitar[i].codemerk);
                    }
                }
            }
            return code;
        },
        groups() {
            if (this.item) {
                return _(this.item)
                    .groupBy("nama")
                    .map((g, nama) => {
                        const quantity = _.sumBy(g, "netto");

                        return {
                            Nama: nama,
                            quantity
                        };
                    })
                    .values()
                    .value();
            } else {
                return null;
            }
        }
    },
    methods: {
        deletekeranjang(index) {
            this.keranjang.splice(index, 1);
        },
        getGitar() {
            axios
                .get("./Gitar")
                .then(response => {
                    this.gitar = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getitem() {
            axios
                .get("./Item/")
                .then(response => {
                    this.item = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getResep(codemerk) {
            axios
                .get("./Gitar/" + codemerk)
                .then(response => {
                    this.resep = response.data;
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        onSubmit(evt) {
            evt.preventDefault();
            this.keranjang.push({
                id: this.x,
                jenis_gitar: this.temp.jenis_gitar,
                jumlah: this.temp.jumlah
            });
            this.temp.jenis_gitar = null;
            this.temp.jumlah = 0;
            this.x = this.x + 1;
        },
        onReset(evt) {
            evt.preventDefault();
            this.keranjang = [];
        }
    }
};
</script>
