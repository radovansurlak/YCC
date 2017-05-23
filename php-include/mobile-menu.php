<nav id="menu-mobile">
    <img alt="your cozy corner logo" src="img/logo.png">
    <ul>
      <li v-for="menuItem in links"><a :href="menuItem.address">{{menuItem.title}}</a></li>
    </ul>
</nav>
<script type="text/javascript" src="js/vue-menu-mobile.js"></script>
