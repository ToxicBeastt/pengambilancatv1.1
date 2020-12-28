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
        {{ groups}}
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
            resep:[],
        };
    },
    mounted() {
        this.getitem();
        this.getGitar();
        this.resepgitar();
    },
    computed: {
        listdata() {
            var x = [];
            if (this.gitar.length > 0) {
                for (var i = 0; i < this.gitar.length; i++) {
                    x.push(this.gitar[i].codemerk);
                }
            }
            return x;
        },
        groups() {
            if(this.item){
                return _(this.item)
                .groupBy('nama')
                .map((g, nama) => {
                const quantity = _.sumBy(g, 'netto')

                return ({
                    Nama: nama,
                    quantity,
                })
                })
                .values()
                .value()
            }
            else{
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
        resepgitar(){
            // Resep Gitar dipisah jadi array of object cat
            for(var i = 0;i< this.gitar.length;i++){
                var x = []
                x = this.gitar[i].resep.split("|");
                for (var j = 0; j < x.length; j++){
                    var y = []; 
                    y = x[j].split("+");
                }
                this.resep.push({
                    nama: this.gitar[i].nama,
                    cat:{
                        jenis: y[0],
                        net : y[1],
                    }
                })
            }
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
