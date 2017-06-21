<html>
<head>
	<title>Pooling</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		
function getContent(timestamp)
{
    $.ajax(
        {
            type: 'GET',
            url: 't2t15528_perl.php',
            data: {'timestamp' : timestamp},
            success: function(data){
                 var obj = jQuery.parseJSON(data);
                  $('.hh').html(data);
                  getContent(obj.timestamp);
            }
        }
    );
}

	</script>
</head>
<body>

<div class="hh">
dfgh	
</div>

<footer>
<h5>By: Nirikshan (Dj Programmer).</h5>
<a href="https://www.facebook.com/xprin.bd">https://www.facebook.com/xprin.bd</a>
</footer>

</body>
</html>