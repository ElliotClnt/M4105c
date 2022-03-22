<template>
<div>
    <header>
            <h1>HelpDesk</h1>
            <form action="logout" class="logOut" >
                <input type="submit" value="Log Out" id="logOut"/>
            </form>
    </header>
    <Link as="button" class="notifs" :href="$route('displayNotification')">
        <svg viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 .64L8.23 3H5V5L2.97 6.29C2.39 6.64 2 7.27 2 8V18C2 19.11 2.9 20 4 20H20C21.11 20 22 19.11 22 18V8C22 7.27 21.61 6.64 21.03 6.29L19 5V3H15.77M7 5H17V9.88L12 13L7 9.88M8 6V7.5H16V6M5 7.38V8.63L4 8M19 7.38L20 8L19 8.63M8 8.5V10H16V8.5Z" />
        </svg>
    </Link>
    <h2>Bienvenue  {{user.name}} ! Rôle : {{user.role.rol_libelle}}</h2>
    <content>
        <div class="allButton">
            <div v-if="user.rol_id == 1">
            <form action="/ajouterTicket">
                <button class="button">Nouveau ticket</button>
            </form>
            </div>
            <form action="/vueDemandeur" >
                <button class="button">Consulter vos tickets</button>
            </form>
            <div v-if="user.rol_id == 3">
            <form action="/stats">
                <button class="button">Accéder au statistique</button>
            </form>
          </div>
        </div>
    </content>
</div>
    
</template>
<script>
export default {
    name: "accueil",
    props:{
        user:{
            type:Object,
        }
    }
}
</script>
<style scoped>
header{
    background-color: black;
    display: flex;
}
h1{
    margin: auto;
    width: 70px;
    padding: 10px;
    color: white;
}
h2{
    margin: auto;
    width: max-content;
    padding: 10px;
}
.allButton{
    display: flex;
    width: max-content;
    margin: auto;
    margin-top: 20vh;
}
.logOut{
    text-align: right;
}
#logOut{
    background-color:black;
    color: white;
    border: solid 1px white;
    border-radius: 5px;
    margin-top: 20px;
    margin-right: 20px;
}
#logOut:hover{
    cursor: pointer;
}
.button {
  appearance: none;
  background-color: transparent;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 10px;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  will-change: transform;
  width: 300px;
}

.button:disabled {
  pointer-events: none;
}

.button:hover {
  color: #fff;
  background-color: #1A1A1A;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}
.button:active {
  box-shadow: none;
  transform: translateY(0);
}
.notifs{
    width:80px;
    height:80px;
    float: right;
    margin: 10px;
    background: none;
    border: none;
}
.notifs:hover{
    cursor:pointer;
}
</style>