<nav id="menu-mobile">
    <img src="img/logo.png">
    <ul>
      <li v-for="menuItem in links"><a :href="menuItem.address">{{menuItem.title}}</a></li>
    </ul>
</nav>
<script src="js/vue-menu-mobile.js"></script>
