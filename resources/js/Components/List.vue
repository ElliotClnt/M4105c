<template>
    <div class="liste">
        <h1>{{title}}</h1>
        <ul>
            <li v-for="element in items" :key="element">
                {{ element }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name:"List",
    props:{
        title:{
            type: String,
            required: true
        },
        items: {
            type:Array,
            required: true
        }
    },
    data(){
        return {
        }
    }
}
</script>

<style scoped>

.liste{
    border: 2px solid black;
    border-radius: 1rem;
    padding: .5rem;
    margin-top: 1rem;
}

</style>