var app = new Vue({
    el: '#menu-mobile',
    data: {
        //Menu items stored as JS objects
        links: [
          {
            title: "home",
            address: "/"
          }
          ,
          {
            title: "sessions",
            address: "sessions"
          },
          {
            title: "blog",
            address: "/blog"
          },
          {
            title: "contact",
            address: "/contact"
          }
        ]
    }
});
