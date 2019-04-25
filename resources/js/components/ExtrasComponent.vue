<template>
  <transition name="fade">
    <li class="dropdown tasks-menu" v-on:click="myEvent" id="id-one" v-show="test">
      
    </li>
  </transition>
</template>

<script>
export default {
  props: {
    user_name : "",
  },
  data: function() {
    return {
      test: false,
    }
  },
  mounted() {
    this.test = true;
  },
  methods: {
    myEvent: function (e) {
      this.count++;
      //Load user card
      axios
        .get("/user")
        .then(response => {
          this.user = response.data;
          // console.log(this.user);
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
};
</script>
