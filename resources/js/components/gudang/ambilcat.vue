<template>
    <div>
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <div>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group
                    id="input-group-1"
                    label="Jenis Gitar:"
                    label-for="input-1"
                    description=""
                >
                    <b-form-input
                        id="input-1"
                        v-model="temp.jenis_gitar"
                        required
                        placeholder="Masukan Jenis Gitar"
                    ></b-form-input>
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
                    ></b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
            Keranjang
            <div v-if="!keranjang.length">
                Kosong
            </div>
            <div v-else><b-table :items="keranjang"></b-table><b-button type="submit" variant="primary">Submit</b-button></div>
        </div>
        Data Barang
        <b-table striped hover :items="items"></b-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    code: "C01",
                    name:
                        "Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek",
                    jenis: "Cat Kayu",
                    satuan: "Liter",
                    netto: 5
                },
                {
                    code: "C02",
                    name:
                        "Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek",
                    jenis: "Cat Kayu",
                    satuan: "Liter",
                    netto: 5
                },
                {
                    code: "C03",
                    name:
                        "Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek",
                    jenis: "Cat Kayu",
                    satuan: "Liter",
                    netto: 5
                }
            ],
            temp: {
                jenis_gitar: null,
                jumlah: 0
            },
            keranjang: [],
            show: true
        };
    },
    methods: {
        onSubmit(evt) {
            evt.preventDefault();
            this.keranjang.push({ jenis_gitar: this.temp.jenis_gitar , jumlah: this.temp.jumlah });
            this.temp.jenis_gitar = null;
            this.temp.jumlah = 0;
        },
        onReset(evt) {
            evt.preventDefault();
            this.keranjang = [];
        }
    }
};
</script>
