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
                        :min=0
                        :max=5
                    ></b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Input</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
            <div style="margin-top:2vh">
            Keranjang
            <div v-if="!keranjang.length">
                Kosong
            </div>
            <div v-else>
                <b-table :items="keranjang"></b-table>
                <b-button type="submit" variant="primary">Submit Request</b-button>
                </div>
            </div>
            
        </div>
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
