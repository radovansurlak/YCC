var app = new Vue({
    el: '#menu',
    data: {
        leftSide: [
          {
            title: "home",
            address: "/"
          }
          ,
          {
            title: "sessions",
            address: "sessions"
          }
        ],
        rightSide: [
          {
            title: "blog",
            address: "#"
          }
          ,
          {
            title: "contact",
            address: "#"
          }
        ]
    }
});