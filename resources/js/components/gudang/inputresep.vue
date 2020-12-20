<template>
    <div>
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <b-form @submit.prevent="submitresep">
            <b-form-group
                id="input-group-1"
                label="Code Gitar:"
                label-for="input-1"
                description=""
            >
                <b-form-input
                    id="input-1"
                    v-model="inputs.name"
                    required
                    placeholder="Masukan Code Gitar"
                ></b-form-input>
            </b-form-group>

            <div class="form-group" v-for="(input, k) in inputs.cat" :key="k">
                <b-form-group
                    id="input-group-4"
                    label="Cat :"
                    label-for="input-4"
                >
                    <b-form-select
                        id="input-4"
                        v-model="inputs.cat[k].name"
                        :options="listdata"
                        required
                    ></b-form-select>
                </b-form-group>
                <b-form-group
                    id="input-group-5"
                    label="Pemakaian :"
                    label-for="input-5"
                >
                    <b-form-input
                        id="input-5"
                        type="number"
                        v-model="inputs.cat[k].use"
                        required
                    ></b-form-input>
                </b-form-group>
                <span>
                    <i
                        class="fas fa-minus-circle"
                        @click="remove(k)"
                        v-show="k || (!k && inputs.cat.length > 1)"
                        >Remove</i
                    >
                    <i
                        class="fas fa-plus-circle"
                        @click="add(k)"
                        v-show="k == inputs.cat.length - 1"
                        >Add fields</i
                    >
                </span>
            </div>
            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
        <b-card class="mt-3" header="Form Data Result">
            <pre class="m-0">{{ inputs }}</pre>
        </b-card>
        {{form}}
    </div>
</template>
<script>
export default {
    data() {
        return {
            inputs:{
                name: "",
                cat: [{
                    name: "",
                    use:0,
                    }]
            },
            forms:{
                codemerk: "",
                resep: ""
            },
            barang:[],
        };
    },
    mounted() {
        this.getitem();
    },
    computed: {
        form() {
            return this.combinedata(this.inputs.cat);
        },
        listdata(){
            var x = []
            if(this.barang.length > 0){
                for (var i = 0; i < this.barang.length; i++) {
                    x.push(this.barang[i].nama);
                }
            }

            return x
        },
    },
    methods: {
        add() {
            this.inputs.cat.push({
                name: "",
                use:0,
            });
            console.log(this.inputs);
        },
         combinedata(x) {
            var result = "";
            var temp = "";
            for (var i = 0; i < x.length; i++) {
                temp = "";
                temp = x[i].name + "+" + x[i].use + "|";
                result = result + temp;
            }
            return result;
        },
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
        remove(index) {
            this.inputs.cat.splice(index, 1);
        },
        submitresep(){
            this.forms.codemerk = this.inputs.name;
            this.forms.resep = this.combinedata(this.inputs.cat);
            axios
                .post("./Gitar/", this.forms)
                .then(response => {
                    console.log(response);
                    this.$alert("Resep Berhasil di Input");
                    this.$router.push({ name: 'adminhome' });
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
<style></style>
