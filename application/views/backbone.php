<html>
<head>
<?php echo HTML::script('js/underscore.js') ?>
<?php echo HTML::script('js/jquery.js') ?>
<?php echo HTML::script('js/backbone.js') ?>
<script>

var BASE = "<?php echo URL::base(); ?>";
Usermodel = Backbone.Model.extend({
	urlRoot: BASE + '/user',
	initialize: function(){
		//alert("Helow backbone");
	}
});

	var user = new Usermodel();
    // Notice that we haven't set an `id`
    var userDetails = {
        name: 'Thomas',
        email: 'thomasalwyndavis@gmail.com'
    };
    // Because we have not set a `id` the server will call
    // POST /user with a payload of {name:'Thomas', email: 'thomasalwyndavis@gmail.com'}
    // The server should save the data and return a response containing the new `id`
    user.save(userDetails, {
        success: function (user) {
            alert(user.toJSON());
        }
    })

</script>
</head>
<h3>Backbone here</h3>

</html>