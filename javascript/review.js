var TB = function () {
    var T$ = function (id) {
        return document.getElementById(id)
    }
    var T$$ = function (r, t) {
        return (r || document).getElementsByTagName(t)
    }
    var Stars = function (cid, rid, hid, config) {
        var lis = T$$(T$(cid), 'li'), curA;
        for (var i = 0, len = lis.length; i < len; i++) {
            lis[i]._val = i;
            lis[i].onclick = function () {
                //generate score
                var score = T$$(this, 'a')[0].getAttribute('value');
                T$(rid).innerHTML = '<em>' + (T$(hid).value = score)
                    + 'star</em> - ' + config.info[this._val];
                curA = T$$(T$(cid), 'a')[T$(hid).value / config.step - 1];

                // ajax convert variable to php ,save to sql
                var xmlhttp;
                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET", "review.php?score=" + score, true);
                xmlhttp.send();

            };
            lis[i].onmouseout = function () {
                curA && (curA.className += config.curcss);
            }
            lis[i].onmouseover = function () {
                curA
                && (curA.className = curA.className.replace(
                    config.curcss, ''));
            }
        }
    };
    return {
        Stars: Stars
    }
}().Stars('stars2', 'stars2-tips', 'stars2-input', {
    'info': ['Terrible', 'Bad', 'So So', 'Good', 'Amazing'],
    'curcss': ' current-rating',
    'step': 20
});