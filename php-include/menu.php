<nav id="menu">
    <ul>
      <li v-for="menuItem in leftSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
      <img src="img/logo.png">
      <li v-for="menuItem in rightSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
    </ul>
</nav>
<script src="js/vue-menu.js"></script>
