new Vue({
    el: '#app',
    data: {
        chat: '',
        chats: []
    },
    methods: {
      getChats() {
        var url = '/ajax/chat';
        axios.get(url)
          .then((response) => {
            this.chats = response.data;
            this.scrollToEnd();
          });
      },
      send() {
        var id = document.getElementById("supply_user");
        var user_id = document.getElementById("login_user");
        var url = '/ajax/chat';
        var params = {
          chat: this.chat,
          id: id.value,
          user_id: user_id.value
        };
        axios.post(url, params)
          .then((response) => {
            this.chat = '';
          });
      },
      scrollToEnd() {
        this.$nextTick(function() {
          var container = this.$el.querySelector("#scroll-inner");
          container.scrollTop = container.scrollHeight;
        })
      }
    },
    mounted() {
      this.getChats();
      this.scrollToEnd();
      Echo.channel('Osagari_chat')
          .listen('ChatCreated', (e) => {
            this.getChats();
          });
    },
  });