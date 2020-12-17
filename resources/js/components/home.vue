<template>
    <div>
        <b-container>
            <b-row>
                <b-col><router-link to="/adminhome"><b-button class="main-navigation-button" variant="primary">Admin</b-button></router-link></b-col>
                <b-col><router-link to="/adminhome"><b-button class="main-navigation-button" variant="primary">Ambil Barang</b-button></router-link></b-col>
            </b-row>
        </b-container>

    </div>
</template>
<script> 
  export default { 
    name: 'App',
    components: {
    }
  }
</script>
<style></style>