new Vue({
  el: '#app',
  data: {
    chat: '',
    chats: []
  },
  methods: {
    getChats() {
      const url = '/ajax/chat';
      axios.get(url)
        .then((response) => {
          this.chats = response.data;
        });
    },
    send() {
      const id = document.getElementById("supply_user");
      const user_id = document.getElementById("login_user");
      const url = '/ajax/chat';
      const params = {
        chat: this.chat,
        id: id.value,
        user_id: user_id.value
      };
      axios.post(url, params)
        .then((response) => {
          this.chat = '';
        });
    },
  },
  mounted() {
    this.getChats();
    Echo.channel('Osagari_chat')
        .listen('ChatCreated', (e) => {
          this.getChats();
        });
  }
});