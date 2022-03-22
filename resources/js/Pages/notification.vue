<template>
    <div>
        <header>
            <navBarRetour></navBarRetour>
        </header>
        <h1>Notifications</h1>
        <div v-for="notification in notifications" :key="notification.not_id">
            <NotificationComponent
            :notification="notification">
            </NotificationComponent>
        </div>
    </div>
    
</template>
<script>
import NotificationComponent from "..//Components/notificationComponent.vue";
import NavBarRetour from "../Components/NavBarRetour.vue";
export default {
    name: "Notification",
    components: {
        NotificationComponent,
        NavBarRetour
    },
    props: {
        notifications:{
            type: Array
        },
    },
    setup() {
        
    },
}
</script>
<style scoped>
h1 {
  margin: auto;
  width: 190px;
  padding-top: 40px;
  padding-bottom: 10px;
}
</style>


