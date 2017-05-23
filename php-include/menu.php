<nav id="menu">
    <ul>
      <li v-for="menuItem in leftSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
    </ul>
      <img alt="your cozy corner logo image" src="img/logo.png">
    <ul>
      <li v-for="menuItem in rightSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
    </ul>
</nav>
<script type="text/javascript" src="js/vue-menu.js"></script>
