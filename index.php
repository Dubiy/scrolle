<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
    <head>
        <title>Scrolle</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="http://st1.kazantipa.net/sites/all/modules/frontpage/jquery/main/jquery-css-transform.js"></script>
        <script type="text/javascript" src="http://st1.kazantipa.net/sites/all/modules/frontpage/jquery/main/jquery-animate-css-rotate-scale.js"></script>
        <script type="text/javascript" src="http://st1.kazantipa.net/sites/all/modules/frontpage/jquery/main/jquery.event.frame.js"></script>
		
    </head>
    <body>

    	<style type="text/css">
    		.page_wrapper {
    			width: 1000px;
    			height: 3000px;
    			border: 1px solid red;
    			margin: 0 auto;
    		}
    	</style>

    	<div class="page_wrapper">
    		<div class="mad_canvas"></div>

    	</div>


<style type="text/css">
	.mad_canvas {
		position: relative;
	}

	.mad_canvas > div {
		border: 1px solid gray;
		position: fixed;
	}

</style>



<script type='text/javascript'>
  jQuery(document).ready(function() {

	var bricks = {};
    bricks.b1 = {'koef_x': 1, 'koef_y': 1, 'koef_angle': 0.5, 'angle_final': 0, 'angle': 170, 'left_final': 450, 'top_final': 100, 'left': 50, 'top': 5, 'width': 100, 'height': 50};
    bricks.b2 = {'koef_x': 0.4, 'koef_y': 0.8, 'koef_angle': 0.5, 'angle_final': 0, 'angle': 110, 'left_final': 450, 'top_final': 150, 'left': 800, 'top': 700, 'width': 50, 'height': 50};
    bricks.b3 = {'koef_x': 3, 'koef_y': 3, 'koef_angle': 0.5, 'angle_final': 0, 'angle': 140, 'left_final': 500, 'top_final': 150, 'left': 200, 'top': 900, 'width': 50, 'height': 50};

    jQuery.each(bricks, function(i, e) {
      var css_obj = {
        top: this.top,
        left: this.left,
        width: this.width,
        height: this.height,
        '-moz-transform': 'rotateZ(' + this.angle + 'deg)',
        '-webkit-transform':'rotateZ(' + this.angle + 'deg)',
        '-o-transform':'rotateZ(' + this.angle + 'deg)',
        '-ms-transform':'rotateZ(' + this.angle + 'deg)',
        'transform':'rotateZ(' + this.angle + 'deg)'
      };
      var brick = jQuery("<div></div>", {'class': 'item'}).css(css_obj);
      this.obj = brick;
      jQuery('.mad_canvas').append(brick);
    });

 	jQuery(window).scroll(function(){
        var scroll_Y = window.pageYOffset || document.documentElement.scrollTop;
        document.title = scroll_Y;
        jQuery.each(bricks, function(i, e) {
        	var offset = scroll_Y;
        	var self = this;
       	
			if (self.top_final > self.top) {
        	  var top_ = self.top + offset * self.koef_y;
        	  if (top_ > self.top_final) {
                top_ = self.top_final;
        	  }
        	} else {
        	  var top_ = self.top - offset * self.koef_y;
        	  if (top_ < self.top_final) {
                top_ = self.top_final;
        	  }
        	}

            if (self.left_final > self.left) {
              var left_ = self.left + offset * self.koef_x;
              if (left_ > self.left_final) {
                left_ = self.left_final;
              }
            } else {
              var left_ = self.left - offset * self.koef_x;
              if (left_ < self.left_final) {
                left_ = self.left_final;
              }
            }

            if (self.angle_final > self.angle) {
              var angle_ = self.angle + offset * self.koef_x;
              if (angle_ > self.angle_final) {
                angle_ = self.angle_final;
              }
            } else {
              var angle_ = self.angle - offset * self.koef_x;
              if (angle_ < self.angle_final) {
                angle_ = self.angle_final;
              }
            }            

            jQuery(self.obj).stop(true).animate({'top': top_, 'left': left_, rotate: angle_+'deg'}, 200, 'linear');
        });

    });
  });

function print_r(obj) {
    str = '';
    for (myKey in obj){
      str = str + "obj["+myKey +"] = "+obj[myKey] + "\n";
    }
    return str;
  }

    </script>


    </body>
</html>
