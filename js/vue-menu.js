var app = new Vue({
    el: '#menu',
    data: {
        //Menu items stored as JS objects
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
            address: "/blog"
          }
          ,
          {
            title: "contact",
            address: "/contact"
          }
        ]
    }
});
