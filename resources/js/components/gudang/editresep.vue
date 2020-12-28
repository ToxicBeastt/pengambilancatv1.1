<template>
    <div>
        <router-link to="listresep"><b-button>Back</b-button></router-link>
        <b-form @submit.prevent="submitresep">
            <b-form-group
                id="input-group-1"
                label="Code Gitar:"
                label-for="input-1"
                description=""
            >
                <b-form-input
                    id="input-1"
                    :v-model="inputs.name"
                    required
                    placeholder="Masukan Code Gitar"
                ></b-form-input>
            </b-form-group>
            <div class="form-group" v-for="(input, k) in inputs.cat" :key="k">
                <b-form-group
                    id="input-group-2"
                    label="Cat :"
                    label-for="input-2"
                >
                    <b-form-input
                        id="input-4"
                        :v-model="inputs.cat[k].name"
                        required
                    ></b-form-input>
                    {{k}}
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
        {{ resep }}
        {{ isiform }}
    </div>
</template>
<script>
export default {
    data() {
        return {
            inputs: {
                name: "",
                cat: [
                ]
            },
            forms: {
                codemerk: "",
                resep: ""
            },
            resep: [],
            barang:[]
        };
    },
    created() {
        this.getitem()
        let id = this.$route.params.id;
        axios
            .get("./Gitar/" + id)
            .then(response => {
                this.resep = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        if (this.resep) {
            this.editform();
        }
    },
    mounted() {
        this.inputs.name = this.isiform.name;
    },
    computed: {
        form() {
            return this.combinedata(this.inputs.cat);
        },
        listdata() {
            var x = [];
            if (this.barang.length > 0) {
                for (var i = 0; i < this.barang.length; i++) {
                    x.push(this.barang[i].nama);
                }
            }

            return x;
        },
        isiform() {
            if (!this.resep) {
                return null;
            } else {
                return this.editform();
            }
        }
    },
    methods: {
        editform() {
            this.inputs.name = this.resep.codemerk;
            let s = [];
            s = this.resep.resep.split("|");
            for (let i = 0; i < s.length; i++) {
                let x = [];
                x = s[i].split("+");
                this.inputs.cat.push({
                    name: x[0],
                    use: x[1]
                });
            }
        },
        add() {
            this.inputs.cat.push({
                name: "",
                use: 0
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
        splitedList() {
            let newArr = [...this.barang];

            this.test = newArr;
        }
    }
};
</script>
<style></style>
