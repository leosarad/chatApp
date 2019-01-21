function pos_random(){ $('.bg-icons i').each(function(){

    var top2=Math.floor(Math.random() * ($(document).width() + 200)-200);   
    var top=Math.floor(Math.random() * ($(document).height() + 200)-200);
    $(this).css({'display':'block','top': top, 'left' :top2});
});}
$(document).ready(pos_random);
$(document).ready(pos_random);
setInterval(pos_random,15000)