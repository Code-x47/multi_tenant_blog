const app = Vue.createApp({
    data() {
      return {
        togglepost: false,
        toggleusers: true,
      };
    },
    methods: {
      togglePostMethod() {
        this.togglepost = !this.togglepost;
        if(this.togglepost == true) {
         this.toggleusers = false
        }
      },
      toggleUsersMethod() {
        this.toggleusers = !this.toggleusers;
        if(this.toggleusers == true) {
        this.togglepost = false;   
        }
       
      },
    }
  });
  

  app.mount("#app");
  