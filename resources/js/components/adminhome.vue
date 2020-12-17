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
                    ><router-link to="/request"
                        ><b-button>List Request</b-button></router-link
                    ></b-col
                >
                <b-col
                    ><router-link to="/ambilcat"
                        ><b-button>Ambil Cat</b-button></router-link
                    ></b-col
                >
            </b-row>
        </b-container>
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
