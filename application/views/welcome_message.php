<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//samsulhuda.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
  
  <div id="test-list">
    <input type="text" class="search" />
    <ul class="list">
      <li><p class="name">Guybrush Threepwood</p></li>
      <li><p class="name">Elaine Marley</p></li>
      <li><p class="name">LeChuck</p></li>
      <li><p class="name">Stan</p></li>
      <li><p class="name">Voodoo Lady</p></li>
      <li><p class="name">Herman Toothrot</p></li>
      <li><p class="name">Meathook</p></li>
      <li><p class="name">Carla</p></li>
      <li><p class="name">Otis</p></li>
      <li><p class="name">Rapp Scallion</p></li>
      <li><p class="name">Rum Rogers Sr.</p></li>
      <li><p class="name">Men of Low Moral Fiber</p></li>
      <li><p class="name">Murray</p></li>
      <li><p class="name">Cannibals</p></li>
    </ul>
    <ul class="pagination"></ul>
  </div>


  <script type="text/javascript">
  	var monkeyList = new List('test-list', {
  valueNames: ['name'],
  page: 3,
  pagination: true
});
  </script>
</body>
</html>