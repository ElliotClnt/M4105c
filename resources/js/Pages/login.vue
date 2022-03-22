<template>
  <div>
      <header>
          <h1>HelpDesk</h1>
      </header>
        <h2>Merci de vous connecter</h2>
    <form @submit.prevent="form.post($route('login'))">
      <div class="champ">
        <label for="email">E-mail</label>
        <input
          class="right"
          id="email"
          name="email"
          type="email"
          v-model="form.email"
        />
      </div>
      <div class="error">
          <b v-if="form.errors.email">{{ form.errors.email }}</b>
      </div>
      <div class="separator"></div>
      <div class="champ">
        <label for="password">Mot de passe</label>
        <input
          class="right"
          type="password"
          name="password"
          id="password"
          v-model="form.password"
        />
      </div>
      <div class="error">
          <b v-if="form.errors.password">{{ form.errors.password }}</b>
      </div>
      <div class="buttonLogin">
          <input class="button-login" type="submit" value="Login" />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
      }),
      data:{}
    };
  },
  created() {
  }
};
</script>
<style scoped>
h1 {
  width: max-content;
  margin: auto;
  color: white;
  padding-top: 10px;
  padding-bottom: 10px;
}
h2 {
  width: max-content;
  margin: auto;
  margin-top: 20vh;
}
header{
    background-color: black;
}
form {
  margin-top: 20px;
}
.champ {
  width: 35vw;
  margin: auto;
}
.right {
  float: right;
  width: 25vw;
}
.separator {
  height: 10px;
}
.buttonLogin{
    width: max-content;
    margin: auto;
}
.button-login{
    width: 150px;
    color: black;
    font-weight: bold;
    margin-top: 10px;
    background-color: white;
    border: solid black 2px;
    border-radius: 10px;
}
.button-login:hover{
    width: 150px;
    color: white;
    font-weight: bold;
    margin-top: 10px;
    background-color: black;
    border: solid white 2px;
    border-radius: 10px;
}
.button-login:active{
    background-color: grey;
}
.error{
    width: max-content;
    margin: auto;
    color: red;
}
</style>