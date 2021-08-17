$(document).ready(function(){

    $('.text,h1,h2,h3,h4,h5').html(function(i, html) {
        var chars = $.trim(html).split("");
        return '<span>' + chars.join('</span><span>') + '</span>';
      });

  });