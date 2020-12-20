<template>
    <div>
        <router-link to="/home"><b-button>Back</b-button></router-link>
        <b-container>
            <b-row>
                <b-col
                    ><router-link to="/inputbarang"
                        ><b-button>Input Cat</b-button></router-link
                    ></b-col
                >
                <b-col
                    ><router-link to="/listcat"
                        ><b-button>List Cat</b-button></router-link
                    ></b-col
                >
                <b-col
                    ><router-link to="/inputresep"
                        ><b-button>Input Resep</b-button></router-link
                    ></b-col
                >
                <b-col
                    ><router-link to="/listresep"
                        ><b-button>List Resep</b-button></router-link
                    ></b-col
                >
            </b-row>
        </b-container>

        Editnya Belum CSS bebas lah mau diganti juga button asal router-linknya dipake
        Untuk Ambil cat belum banget baru front-endnya doang. itu juga belum ada maximum ngambilnya
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {}
};
</script>
<style></style>
