<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>fadeIn demo</title>
  <style>
  p {
    position: relative;
    width: 400px;
    height: 90px;
  }
  div {
    position: absolute;
    width: 400px;
    height: 65px;
    font-size: 36px;
    text-align: center;
    color: yellow;
    background: red;
    padding-top: 25px;
    top: 0;
    left: 0;
    display: none;
  }
  span {
    display: none;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p>
  Let it be known that the party of the first part
  and the party of the second part are henceforth
  and hereto directed to assess the allegations
  for factual correctness... (<a href="#">click!</a>)
  <div>sadfsadfasfasdf asdf  f sdf saf s fs f asd<span>CENSORED!</span></div>
</p>
 
<script>
$( "a" ).click(function() {
  $( "div" ).fadeIn( 3000, function() {
    $( "span" ).fadeIn( 100 );
  });
  return false;
});
</script>
 
</body>
</html>