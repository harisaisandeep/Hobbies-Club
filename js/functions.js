function tick(){
        $('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
    }
    setInterval(function(){ tick () }, 2500);


$(document).ready(function(e) {
    
    $("#about").click(function(e) {
        $("#aboutd").fadeIn(500);
        $("#activityd").fadeOut(400);
        $("#membersd").fadeOut(400);
        $("#eventsd").fadeOut(400);
        
    });
    
        $("#activity").click(function(e) {
        $("#aboutd").fadeOut(400);
        $("#activityd").fadeIn(500);
        $("#membersd").fadeOut(400);
         $("#eventsd").fadeOut(400);
        
    });
        $("#members").click(function(e) {
        $("#aboutd").fadeOut(400);
        $("#activityd").fadeOut(400);
        $("#membersd").fadeIn(500);
         $("#eventsd").fadeOut(400);
        
    });
        $("#events").click(function(e) {
        $("#aboutd").fadeOut(400);
        $("#activityd").fadeOut(400);
        $("#membersd").fadeOut(400);
         $("#eventsd").fadeIn(500);
        
    });
});

$(document).ready(function() {
            /*
             *  Simple image gallery. Uses default settings
             */

            $('.fancybox').fancybox();

            
            
            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'over'
                    },
                    buttons : {}
                },

                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });

        });