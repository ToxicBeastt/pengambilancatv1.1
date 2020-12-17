<template>
    <div>
        <router-link to="adminhome"><b-button>Back</b-button></router-link>
        <b-table striped hover :items="items"></b-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [
                { code: "C01", name:"Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek" , jenis:"Cat Kayu", satuan:"Liter", netto:5},
                { code: "C02", name:"Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek" , jenis:"Cat Kayu", satuan:"Liter", netto:5},
                { code: "C03", name:"Nippon Paint / Cat Tembok / Vinilex 300 / Vinilex putih / Ojek" , jenis:"Cat Kayu", satuan:"Liter", netto:5}
            ]
        };
    }
};
</script>
