<footer>

  <nav>
      <ul id="footer-nav">
        <li v-for="item in menuItems"><a :href="item.address">{{item.title}}</a></li>
      </ul>
  </nav>

  <aside id="social-icons-bar">

    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>

  </aside>

</footer>


<script src="../js/footer-nav.js"></script>
