<template>
    <div class="navBarDemandeur">
        <a href="/">Retour</a>

        <Link as="button" id="logOut" :href="$route('logout')">Logout</Link>
    </div>
</template>
<script>
export default {
    name:"navBarRetour",
    props:{

    },
    data(){
        return{
        }
    }
}
</script>
<style scoped>
    .navBarDemandeur{
        height: 25px;
        padding-top: 5px;
        background-color: black;
        display: flex;
        position: fixed;
        width: 100%;
        align-content: center;
    }
    a{
        color: white;
        margin-left: 5px;
        font-weight: bold;
        text-decoration: none;
    }
    #logOut{
        background-color:black;
        color: white;
        border: solid 1px white;
        border-radius: 5px;
        position: absolute;
        right: 0;
        margin-right: 10px;
    }
    #logOut:hover{
        cursor: pointer;
    }
</style>
