<template>
    <div>
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <div>
            <b-form @submit.prevent="barangInsert" @reset="onReset">
                <b-form-group
                    id="input-group-1"
                    label="Code Barang:"
                    label-for="input-1"
                    description=""
                >
                    <b-form-input
                        id="input-1"
                        v-model="form.code"
                        required
                        placeholder="Masukan Code Barang"
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                    id="input-group-2"
                    label="Nama Barang:"
                    label-for="input-2"
                    description=""
                >
                    <b-form-input
                        id="input-2"
                        v-model="form.nama"
                        required
                        placeholder="Masukan Nama Barang"
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-3"
                    label="Merk Barang:"
                    label-for="input-3"
                >
                    <b-form-input
                        id="input-3"
                        v-model="form.merk"
                        required
                        placeholder="Masukan Merk Barang"
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-4"
                    label="Jenis Barang:"
                    label-for="input-4"
                >
                    <b-form-select
                        id="input-4"
                        v-model="form.jenis"
                        :options="JenisBarang"
                        required
                    ></b-form-select>
                </b-form-group>
                <b-form-group
                    id="input-group-5"
                    label="Satuan:"
                    label-for="input-5"
                >
                    <b-form-select
                        id="input-5"
                        v-model="form.satuan"
                        :options="satuanNetto"
                        required
                    ></b-form-select>
                </b-form-group>
                <b-form-group
                    id="input-group-6"
                    label="Netto:"
                    label-for="input-6"
                >
                    <b-form-input
                        id="input-6"
                        type="number"
                        v-model="form.netto"
                        required
                    ></b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
            <b-card class="mt-3" header="Form Data Result">
                <pre class="m-0">{{ form }}</pre>
            </b-card>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                code: "",
                nama: "",
                merk: null,
                jenis: null,
                satuan: null,
                netto: 0
            },
            satuanNetto: [{ text: "Select One", value: null }, "L"],
            JenisBarang: [
                { text: "Select One", value: null },
                "Sealer",
                "Warna",
                "Top Coat",
                "Thinner"
            ],
        };
    },
    methods: {
        barangInsert() {
            axios
                .post("./Item/", this.form)
                .then(response => {
                    this.form.code = "";
                    this.form.nama = "";
                    this.form.jenis = null;
                    this.form.merk = null;
                    this.form.satuan = null;
                    this.form.netto = 0;
                    console.log(response);
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
            this.form.merk = null;
            this.form.satuan = null;
            this.form.netto = 0;
        }
    }
};
</script>
<style></style>
