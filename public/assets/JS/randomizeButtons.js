$.fn.randomize = function(selector){
    var $elems = selector ? $(this).find(selector) : $(this).children();
    for (var i = $elems.length; i >= 0; i--) {
        $(this).append($elems[Math.random() * i | 0]);
    }
    return this;
}


$("div.answers").randomize(".random"); //shuffle all the .item elements inside the ul
