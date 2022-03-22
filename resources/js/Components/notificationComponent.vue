<template>
    <div>
        <div class="fiche">
            <div class="content">
                <div class="two">
                        <p>{{notification.not_titre}}</p>
                        <p>{{notification.not_description}}</p>
                        <p>Date : {{notification.not_date}}</p>
                </div>
                <div class="footer">
                    <Link as="button" class="button" id="red" :href="$route('deleteNotif',notification.not_id)">Supprimer</Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "NotificationComponent",
    props: {
        notification: {
            type: Object
        },
    },
    setup() {
        
    },
}
</script>
<style scoped>
.fiche{
    border: black 1px solid;
    border-radius: 15px;
    margin: auto;
    margin-top: 10px;
    width: 600px;
}
.content{
    padding: 5px;
}
.two{
    display: grid;
    text-align: center;
}
.button{
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 15px;
    width: 150px;
    height: 25px;
    padding: 3px 0;
}
.button:hover{
    cursor: pointer;
}
#grey{
    background-color: grey
}
.footer{
    padding: 10px;
    margin: auto;
    width: fit-content
}
.image{
    height: 150px;
    width: auto;
    border-radius: 100%;
}
.first{
    padding: 10px
}
#red{
    background-color: red;

}
.footer{
    margin: auto;
    width: max-content;
}
</style>